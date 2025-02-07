<?php
// Archivo: process_form.php

// Habilitar CORS si es necesario (ajustar según tu entorno)
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
}
header("Access-Control-Allow-Methods: GET, HEAD, OPTIONS, POST, PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization");

// Lista de dominios de correos temporales a bloquear
$disposable_domains = ['mailinator.com', 'tempmail.com', '10minutemail.com'];

// Verificar si se ha enviado el formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit;
}

// Obtener datos del formulario
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$honeypot = isset($_POST['honeypot']) ? $_POST['honeypot'] : ''; // Campo oculto para evitar bots

// Validaciones básicas
if (empty($name) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/u", $name)) {
    echo json_encode(['success' => false, 'message' => 'El nombre solo debe contener letras y espacios.']);
    exit;
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'El correo electrónico no es válido.']);
    exit;
}

// Extraer el dominio del correo electrónico
$email_domain = substr(strrchr($email, "@"), 1);
if (in_array(strtolower($email_domain), array_map('strtolower', $disposable_domains))) {
    echo json_encode(['success' => false, 'message' => 'No se permiten correos temporales.']);
    exit;
}

// Verificar si el campo honeypot está vacío (si no, es un bot)
if (!empty($honeypot)) {
    echo json_encode(['success' => false, 'message' => 'Acción no permitida.']);
    exit;
}

try {
    // Configuración de la conexión a la base de datos
    $dsn = 'mysql:host=PMYSQL181.dns-servicio.com;port=3306;dbname=10718674_prelanzamiento;charset=utf8mb4';
    $username = 'Javier';
    $password = 'u70q0Z2p@';

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // Preparar la consulta SQL
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirección segura sin conflicto con la salida JSON
        session_start();
        $_SESSION['registration_success'] = true;
        header("Location: https://patreon.com/EstudianteProgramador");
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar los datos.']);
        exit;
    }
} catch (PDOException $e) {
    // Registrar el error en el servidor para depuración
    error_log("Error de base de datos: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos. Por favor, inténtalo de nuevo.']);
    exit;
}