<?php
// Habilitar visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de conexión
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

// Verificar si los datos requeridos están en POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm'], $_POST['fecha_nacimiento'], $_POST['politica'])) {

    // Verificar que las contraseñas coincidan
    if ($_POST['password'] !== $_POST['passwordConfirm']) {
        header("Location: ../InicioSesion/Registrarse.html?error=Las contraseñas no coinciden");
        exit();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Preparar la consulta para evitar inyecciones SQL
        $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            header("Location: ../InicioSesion/InicioSesion.html?error=contrasena_coincide");
            exit();
        }
    }



    // Recibir y sanitizar los datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : NULL;
    $prefijo = isset($_POST['prefijo']) ? $conn->real_escape_string($_POST['prefijo']) : NULL;
    $fecha_nacimiento = date("Y-m-d", strtotime($_POST['fecha_nacimiento']));
    $politica = isset($_POST['politica']) ? 1 : 0;

    // Concatenar el prefijo y el número de teléfono si ambos están presentes
    $numero_telefono = ($prefijo && $telefono) ? $prefijo . ' ' . $telefono : NULL;

    // Obtener el próximo valor de id
    $result = $conn->query("SELECT MAX(id) AS max_id FROM usuarios");
    $row = $result->fetch_assoc();
    $nuevo_id = $row['max_id'] + 1;

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (
        id,
        nombre,  
        password, 
        numero_telefono, 
        email,
        fecha_nacimiento, 
        user, 
        admin, 
        profesor, 
        politica_privacidad
    ) 
    VALUES (?, ?, ?, ?, ?, ?, 1, 0, 0, ?)";

    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param(
        "isssssi", // Tipos: 1 integer (id) + 5 strings + 1 integer
        $nuevo_id,
        $nombre,
        $password,
        $numero_telefono,
        $email,
        $fecha_nacimiento,
        $politica
    );

    if ($stmt->execute()) {
        header("Location: ../InicioSesion/InicioSesion.html?mensaje=registro_exitoso");
    } else {
        echo "Error en el registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Todos los campos son obligatorios.";
}

$conn->close();
?>