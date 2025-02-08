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
            header("Location: https://www.estudianteprogramador.com/?error=No llegaron los datos.");
            exit;
        }

        $name = trim($_POST['name']);
        $correo = trim($_POST['email']);

        if (empty($name) || empty($correo)) {
            header("Location: https://www.estudianteprogramador.com/?error=Todos los campos son obligatorios.");
            exit;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: https://www.estudianteprogramador.com/?error=Correo electrónico no válido.");
            exit;
        }

        // Verificación de reCAPTCHA
        if (!isset($_POST['g-recaptcha-response'])) {
            header("Location: https://www.estudianteprogramador.com/?error=No se detectó reCAPTCHA.");
            exit;
        }

        $recaptcha = $_POST['g-recaptcha-response'];
        $secretKey = "6Lcd0NAqAAAAAK-iUg4BAgUvAbtRfQo5IZOQIikQ"; // Tu clave secreta

        // Validar con la API de Google
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptcha");
        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) {
            header("Location: https://www.estudianteprogramador.com/?error=reCAPTCHA falló, intenta de nuevo.");
            exit;
        }

        // Verificar si el email ya está registrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            header("Location: https://www.estudianteprogramador.com/?error=Este correo ya está registrado.");
            exit;
        }

        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
        $stmt->execute([$name, $correo]);

        // Redirigir con mensaje de éxito
        header("Location: https://www.estudianteprogramador.com/?success=Todo correcto, gracias por registrarte.");
        exit;
    }
} catch (PDOException $e) {
    header("Location: https://www.estudianteprogramador.com/?error=Error de conexión: " . urlencode($e->getMessage()));
    exit;
}
?>
