<?php
// 1. Conectarse a la base de datos
require_once 'conexion.php';

// 2. Recoger el email del formulario
$email = $_POST['email'] ?? '';

// 3. Verificar si el correo existe en la BD
$stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
$stmt->execute(['email' => $email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    // 4. Generar un token único
    $token = bin2hex(random_bytes(50)); // ejemplo

    // 5. Guardar el token en la tabla de "reseteo" o en la tabla "usuarios" con un campo `reset_token` y `reset_expires`
    $expire_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // 1 hora de validez
    $stmt2 = $pdo->prepare("UPDATE usuarios SET reset_token = :token, reset_expires = :expire WHERE id = :id");
    $stmt2->execute([
        'token' => $token,
        'expire' => $expire_time,
        'id' => $usuario['id']
    ]);

    // 6. Enviar email al usuario con el link de restablecimiento
    $link = "https://tudominio.com/restablecer.php?token=$token";
    $mensaje = "Hola, \n\nHas solicitado restablecer tu contraseña. 
    Por favor, haz clic en el siguiente enlace (o pégalo en tu navegador): \n\n$link\n\nEste enlace expira en 1 hora.";
    
    // Asumiendo una función mail() simple (en producción usarías PHPMailer u otra librería)
    mail($email, "Restablecer contraseña", $mensaje);
}

// 7. Redirigir a una página que diga: "Si existe una cuenta con ese correo, te hemos enviado un enlace."
header("Location: mensaje_confirmacion.php");
exit;
?>
