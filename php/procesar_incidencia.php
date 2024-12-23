<?php
// Datos de conexión a la base de datos
$servername = "PMYSQL181.dns-servicio.com:3306";
$username = "Javier";
$password = "u70q0Z2p@";
$dbname = "10718674_estudiante_programador";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Log para depuración
    file_put_contents("log.txt", "POST Data: " . print_r($_POST, true) . PHP_EOL, FILE_APPEND);

    // Validar campos obligatorios uno por uno
    if (!isset($_POST['nombre'])) {
        die("El campo nombre es obligatorio.");
    }
    if (!isset($_POST['email'])) {
        die("El campo email es obligatorio.");
    }
    if (!isset($_POST['asunto'])) {
        die("El campo asunto es obligatorio.");
    }
    if (!isset($_POST['mensaje'])) {
        die("El campo mensaje es obligatorio.");
    }
    if (!isset($_POST['preferencia_contacto'])) {
        die("El campo preferencia_contacto es obligatorio.");
    }
    if (!isset($_POST['politica'])) {
        die("Debe aceptar la política de privacidad.");
    }

    // Sanitizar datos
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['email']);
    $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : NULL;
    $asunto = $conn->real_escape_string($_POST['asunto']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);
    $preferencia_contacto = $conn->real_escape_string($_POST['preferencia_contacto']);
    $politica = isset($_POST['politica']) ? 1 : 0;

    // Buscar el id del usuario en la tabla Usuarios basado en el correo
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($id_usuario);
    $stmt->fetch();
    $stmt->close();

    // Verificar si se encontró el usuario
    if (!$id_usuario) {
        header("Location: ../ContenidoPrincipal/Contacto.html?mensaje=usuario_no_encontrado");
        exit();
    }

    // Inserción en la tabla Incidencias con el id_usuario obtenido
    $stmt = $conn->prepare("INSERT INTO Incidencias (id_usuario, email_usuario, telefono_usuario, asunto, mensaje, preferencia_contacto, politica_privacidad) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi", $id_usuario, $correo, $telefono, $asunto, $mensaje, $preferencia_contacto, $politica);

    if ($stmt->execute()) {
        file_put_contents("log.txt", "Consulta ejecutada correctamente." . PHP_EOL, FILE_APPEND);
        header("Location: ../ContenidoPrincipal/Contacto.html?mensaje=incidencia_exitosa");
        exit();
    } else {
        echo "Error al registrar la incidencia: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Método de solicitud incorrecto.";
}

// Cerrar conexión
$conn->close();
?>
