<?php
session_start(); // Iniciar sesión para almacenar el mensaje de éxito

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit;
}

// Datos de conexión a la base de datos
$host = "PMYSQL181.dns-servicio.com:3306";
$dbname = "10718674_prelanzamiento";
$username = "Javier";
$password = "u70q0Z2p@";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST['name']) || !isset($_POST['email'])) {
            die("Error: No llegaron los datos.");
        }

        $name = trim($_POST['name']);
        $correo = trim($_POST['email']);

        if (empty($name) || empty($correo)) {
            die("Error: Todos los campos son obligatorios.");
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            die("Error: Correo electrónico no válido.");
        }

        // Verificación de reCAPTCHA
        if (!isset($_POST['g-recaptcha-response'])) {
            die("Error: No se detectó reCAPTCHA.");
        }

        $recaptcha = $_POST['g-recaptcha-response'];
        $secretKey = "6Lcd0NAqAAAAAK-iUg4BAgUvAbtRfQo5IZOQIikQ"; // Tu clave secreta

        // Validar con la API de Google
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptcha");
        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            die("Error: reCAPTCHA falló, intenta de nuevo.");
        }

        // Verificar si el email ya está registrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            die("Error: Este correo ya está registrado.");
        }

        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
        $stmt->execute([$name, $correo]);

        // Guardar mensaje de éxito en sesión
        $_SESSION['mensaje_exito'] = "Todo correcto, gracias por registrarte.";

        // Redirigir de vuelta a index.html
        header("Location: https://www.estudianteprogramador.com/?success=1");
        exit;
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
