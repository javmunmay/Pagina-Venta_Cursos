<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);

    if (isset($_POST['nombre'], $_POST['email'], $_POST['asunto'], $_POST['mensaje'], $_POST['preferencia_contacto'], $_POST['politica'])) {
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $correo = $conn->real_escape_string($_POST['email']);
        $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : NULL;
        $asunto = $conn->real_escape_string($_POST['asunto']);
        $mensaje = $conn->real_escape_string($_POST['mensaje']);
        $preferencia_contacto = $conn->real_escape_string($_POST['preferencia_contacto']);
        $politica = isset($_POST['politica']) ? 1 : 0;

        // Consulta SQL
        $sql = "INSERT INTO Incidencias (nombre_completo, correo, telefono, asunto, mensaje, preferencia_contacto, politica_privacidad) 
                VALUES ('$nombre', '$correo', '$telefono', '$asunto', '$mensaje', '$preferencia_contacto', '$politica')";

        if ($conn->query($sql) === TRUE) {
            // Redirigir con mensaje de éxito si el registro en la base de datos es exitoso
            header("Location: ../ContenidoPrincipal/Contacto.html?mensaje=incidencia_exitosa");
            exit();
        } else {
            echo "Error al registrar la incidencia: " . $conn->error;
        }
    } else {
        echo "Todos los campos obligatorios deben ser completados.";
    }
} else {
    echo "Método de solicitud incorrecto.";
}

// Cerrar conexión
$conn->close();
?>
