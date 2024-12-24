<?php
// Habilitar visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Registrar el método de solicitud
file_put_contents("log.txt", "Método de solicitud: " . $_SERVER['REQUEST_METHOD'] . PHP_EOL, FILE_APPEND);

// Verificar el método de solicitud
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("El formulario no fue enviado correctamente. Método recibido: " . $_SERVER["REQUEST_METHOD"]);
}

// Log para depuración
file_put_contents("log.txt", "POST Data: " . print_r($_POST, true) . PHP_EOL, FILE_APPEND);

// Validar campos obligatorios uno por uno
if (!isset($_POST['nombre'], $_POST['email'], $_POST['asunto'], $_POST['mensaje'], $_POST['preferencia_contacto'], $_POST['politica'])) {
    die("Todos los campos obligatorios deben ser completados.");
}

// Sanitizar datos
$correo = $conn->real_escape_string($_POST['email']);

// Verificar si el correo existe en la base de datos
$stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count == 0) {
    header("Location: ../ContenidoPrincipal/Contacto.html?mensaje=usuario_no_encontrado");
    exit();
}

// Obtener el id del usuario
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->bind_result($id_usuario);
$stmt->fetch();
$stmt->close();

// Continuar con la inserción en la tabla Incidencias
$nombre = $conn->real_escape_string($_POST['nombre']);
$telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : NULL;
$asunto = $conn->real_escape_string($_POST['asunto']);
$mensaje = $conn->real_escape_string($_POST['mensaje']);
$preferencia_contacto = $conn->real_escape_string($_POST['preferencia_contacto']);
$politica = isset($_POST['politica']) ? 1 : 0;

$stmt = $conn->prepare("INSERT INTO incidencias (id_usuario, email_usuario, telefono_usuario, asunto, mensaje, preferencia_contacto, politica_privacidad) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssi", $id_usuario, $correo, $telefono, $asunto, $mensaje, $preferencia_contacto, $politica);

if ($stmt->execute()) {
    header("Location: ../ContenidoPrincipal/Contacto.html?mensaje=incidencia_exitosa");
    exit();
} else {
    echo "Error al registrar la incidencia: " . $stmt->error;
}

$conn->close();
?>
