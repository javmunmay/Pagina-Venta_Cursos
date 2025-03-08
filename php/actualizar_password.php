<?php
require_once 'conexion.php';

$token = $_POST['token'] ?? '';
$pass = $_POST['pass'] ?? '';
$pass2 = $_POST['pass2'] ?? '';

// Verificar que las contraseñas coincidan
if ($pass !== $pass2) {
    header("Location: php/restablecer.php?mensaje=Contrasena_no_coinciden");
    exit;
}

// Verificar que el token sigue siendo válido
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE reset_token = ? AND reset_expires > NOW()");
$stmt->bind_param("s", $token); // Vincular el parámetro
$stmt->execute();
$result = $stmt->get_result(); // Obtener el resultado
$usuario = $result->fetch_assoc(); // Obtener la fila como un array asociativo

if (!$usuario) {
    header("Location: php/restablecer.php?mensaje=Token_invalido");
    exit;
}

// Encriptar la nueva contraseña
$nuevaPassHash = password_hash($pass, PASSWORD_DEFAULT);

// Actualizar en la base de datos
$stmt2 = $conn->prepare("UPDATE usuarios 
                        SET password = ?, reset_token = NULL, reset_expires = NULL 
                        WHERE id = ?");
$stmt2->bind_param("si", $nuevaPassHash, $usuario['id']); // Vincular los parámetros
$stmt2->execute();

header("Location: ../InicioSesion/InicioSesion.php?mensaje=Contrasena_actualizada");
exit;
?>