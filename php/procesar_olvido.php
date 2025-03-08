<?php
// 1. Conectarse a la base de datos
require_once 'conexion.php';
ini_set('openssl.cafile', __DIR__ . '/cacert.pem');

// Verificar que $conn esté definido
if (!isset($conn)) {
    die("Error: No se pudo establecer la conexión a la base de datos.");
}

// 2. Incluir PHPMailer
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 2. Recoger el email del formulario
$email = $_POST['email'] ?? '';

// 3. Verificar si el correo existe en la BD
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    // 4. Generar un token único
    $token = bin2hex(random_bytes(50)); // ejemplo

    // 5. Guardar el token en la tabla de "reseteo" o en la tabla "usuarios" con un campo `reset_token` y `reset_expires`
    $expire_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // 1 hora de validez
    $stmt2 = $conn->prepare("UPDATE usuarios SET reset_token = ?, reset_expires = ? WHERE id = ?");
    $stmt2->bind_param("ssi", $token, $expire_time, $usuario['id']);
    $stmt2->execute();

    // 6. Enviar email al usuario con el link de restablecimiento
    $link = "https://41095220.servicio-online.net/php/restablecer.php?token=$token";
    $mensaje = "Hola, \n\nHas solicitado restablecer tu contraseña. 
    Por favor, haz clic en el siguiente enlace (o pégalo en tu navegador): \n\n$link\n\nEste enlace expira en 1 hora.";
    
    // 7. Enviar email al usuario con el link de restablecimiento usando PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.ionos.es'; // Servidor SMTP de IONOS
        $mail->SMTPAuth = true; // Habilitar autenticación SMTP
        $mail->Username = 'noreply@estudianteprogramador.com'; // Tu correo
        $mail->Password = 'diGqyn-dagges-tyfgo5'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Cifrado TLS
        $mail->Port = 587; // Puerto SMTP para TLS
    
        // Habilitar el modo de depuración (opcional, para ver errores detallados)
        $mail->SMTPDebug = 2; // Nivel de depuración (2 = mensajes detallados)
    
        // Configuración del correo
        $mail->setFrom('noreply@estudianteprogramador.com', 'Estudiante Programador'); // Remitente
        $mail->addAddress($email); // Destinatario
        $mail->isHTML(true); // Formato HTML
        $mail->Subject = 'Restablecer contraseña';
        $mail->Body = "Hola, <br><br>Has solicitado restablecer tu contraseña. 
            Por favor, haz clic en el siguiente enlace (o pégalo en tu navegador): 
            <br><br><a href='https://41095220.servicio-online.net/php/restablecer.php?token=$token'>Restablecer contraseña</a>
            <br><br>Este enlace expira en 1 hora.";
    
        // Enviar el correo
        $mail->send();
    } catch (Exception $e) {
        // Capturar el mensaje de error
        $error_message = "Error al enviar el correo: " . $e->getMessage();
        error_log($error_message); // Guardar el error en el log del servidor
    
        // Mostrar el mensaje de error en pantalla (para depuración)
        echo "Error: " . $e->getMessage();
        exit;
        /*header("Location: ../ContenidoPrincipal/Contacto.php?mensaje=error_enviar_correo#recuperarcontrasena");
        exit;*/
    }
}

// 7. Redirigir a una página que diga: "Si existe una cuenta con ese correo, te hemos enviado un enlace."
header("Location: ../ContenidoPrincipal/Contacto.php?mensaje=Recuperar_Contrasena_Enviado");
exit;
?>