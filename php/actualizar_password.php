<?php
require_once 'conexion.php';

$token = $_POST['token'] ?? '';
$pass = $_POST['pass'] ?? '';
$pass2 = $_POST['pass2'] ?? '';

if ($pass !== $pass2) {
    die("Las contraseñas no coinciden. <a href='javascript:history.back()'>Regresar</a>");
}

// Verificar que el token sigue siendo válido
$stmt = $pdo->prepare("SELECT id FROM usuarios WHERE reset_token = :token AND reset_expires > NOW()");
$stmt->execute(['token' => $token]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("El token es inválido o ha expirado.");
}

// Encriptar la nueva contraseña
$nuevaPassHash = password_hash($pass, PASSWORD_DEFAULT);

// Actualizar en la base de datos
$stmt2 = $pdo->prepare("UPDATE usuarios 
                        SET password = :pass, reset_token = NULL, reset_expires = NULL 
                        WHERE id = :id");
$stmt2->execute([
    'pass' => $nuevaPassHash,
    'id' => $usuario['id']
]);

header("Location: ../InicioSesion/InicioSesion.php?mensaje=Contrasena_actualizada");
?>
