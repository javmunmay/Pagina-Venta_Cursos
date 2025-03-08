<?php
ini_set('openssl.cafile', __DIR__ . '/cacert.pem');

// 1. Conectarse a la base de datos
require_once 'conexion.php';

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

        // Deshabilitar la verificación del certificado SSL
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];

        // Habilitar el modo de depuración (opcional, para ver errores detallados)
        $mail->SMTPDebug = 2; // Nivel de depuración (2 = mensajes detallados)

        // Configuración del correo
        $mail->CharSet = 'UTF-8'; // Configurar la codificación de caracteres
        $mail->setFrom('noreply@estudianteprogramador.com', 'Estudiante Programador'); // Remitente
        $mail->addAddress($email); // Destinatario
        $mail->isHTML(true); // Formato HTML

        // Agregar imagen incrustada
        $mail->addEmbeddedImage('../imagenes/LogoEstudianteAzul.png', 'logo', 'LogoEstudianteProgramador.png');

        // Cuerpo del correo en HTML
        $mail->Subject = 'Restablecer contraseña';
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Restablecer contraseña</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .header {
                    text-align: center;
                    padding: 20px 0;
                }
                .header img {
                    max-width: 100px;
                    height: auto;
                }
                .content {
                    padding: 20px;
                }
                .content h1 {
                    font-size: 24px;
                    color: #090643;
                }
                .content p {
                    font-size: 16px;
                    line-height: 1.6;
                }
                .content a {
                    display: inline-block;
                    margin: 20px 0;
                    padding: 10px 20px;
                    background-color: #090643;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                }
                .footer {
                    text-align: center;
                    padding: 20px;
                    font-size: 14px;
                    color: #777;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <img src='cid:logo' alt='Logo Estudiante Programador'>
                </div>
                <div class='content'>
                    <h1>Restablecer contraseña</h1>
                    <p>Hola,</p>
                    <p>Has solicitado restablecer tu contraseña. Por favor, haz clic en el siguiente enlace para continuar:</p>
                    <a href='$link'>Restablecer contraseña</a>
                    <p>Este enlace expira en <strong>1 hora</strong>.</p>
                    <p>Si no has solicitado este cambio, puedes ignorar este mensaje.</p>
                </div>
                <div class='footer'>
                    <p>&copy; 2023 Estudiante Programador. Todos los derechos reservados.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        // Enviar el correo
        $mail->send();
    } catch (Exception $e) {
        // Redirigir en caso de error
        header("Location: ../ContenidoPrincipal/Contacto.php?mensaje=error_enviar_correo#recuperarcontrasena");
        exit;
    }
}

// 7. Redirigir a una página que diga: "Si existe una cuenta con ese correo, te hemos enviado un enlace."
header("Location: ../ContenidoPrincipal/Contacto.php?mensaje=Recuperar_Contrasena_Enviado#recuperarcontrasena");
exit;
?>