<?php
session_start();
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

// Clave secreta de reCAPTCHA v3
$recaptcha_secret = "6Lcd0NAqAAAAAK-iUg4BAgUvAbtRfQo5IZOQIikQ";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['recaptcha_response'])) {
            header("Location: https://www.estudianteprogramador.com/?error=Faltan datos en el formulario");
            exit;
        }

        $name = trim($_POST['name']);
        $correo = trim($_POST['email']);
        $captcha_response = $_POST['recaptcha_response'];

        if (empty($name) || empty($correo)) {
            header("Location: https://www.estudianteprogramador.com/?error=Todos los campos son obligatorios");
            exit;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: https://www.estudianteprogramador.com/?error=Correo electrónico no válido");
            exit;
        }

        // Verificar reCAPTCHA v3
        $verify_url = "https://www.google.com/recaptcha/api/siteverify";
        $response = file_get_contents($verify_url . "?secret=" . $recaptcha_secret . "&response=" . $captcha_response);
        $response_data = json_decode($response);

        if (!$response_data->success || $response_data->score < 0.7) {
            header("Location: https://www.estudianteprogramador.com/?error=Error en la verificación de reCAPTCHA");
            exit;
        }

        // Verificar si el email ya está registrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            header("Location: https://www.estudianteprogramador.com/?error=Este correo ya está registrado");
            exit;
        }

        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (?, ?)");
        $stmt->execute([$name, $correo]);

        // Redirigir con éxito
        header("Location: https://www.estudianteprogramador.com/?success=Registro exitoso");
        exit;
    }
} catch (PDOException $e) {
    header("Location: https://www.estudianteprogramador.com/?error=Error de conexión");
    exit;
}

?>
