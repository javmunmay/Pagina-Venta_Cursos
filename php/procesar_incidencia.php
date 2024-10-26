<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php/libs/PHPMailer/src/Exception.php';
require '../php/libs/PHPMailer/src/PHPMailer.php';
require '../php/libs/PHPMailer/src/SMTP.php';
*/

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);

    if (isset($_POST['nombre'], $_POST['email'], $_POST['asunto'], $_POST['mensaje'], $_POST['preferencia_contacto'], $_POST['politica'])) {
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $correo = $conn->real_escape_string($_POST['email']);
        $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : NULL;
        $asunto = $conn->real_escape_string($_POST['asunto']);
        $mensaje = $conn->real_escape_string($_POST['mensaje']);
        $preferencia_contacto = $conn->real_escape_string($_POST['preferencia_contacto']);
        $politica = isset($_POST['politica']) ? 1 : 0;

        // Consulta SQL
        $sql = "INSERT INTO Incidencias (nombre_completo, correo, telefono, asunto, mensaje, preferencia_contacto, politica_privacidad) 
                VALUES ('$nombre', '$correo', '$telefono', '$asunto', '$mensaje', '$preferencia_contacto', '$politica')";

        if ($conn->query($sql) === TRUE) {
            // Configuración de PHPMailer
            /*$mail = new PHPMailer(true);*/

            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Cambia al servidor SMTP que prefieras
                $mail->SMTPAuth = true;
                $mail->Username = 'tucorreo@gmail.com'; // Cambia a tu correo
                $mail->Password = 'tucontraseña'; // Cambia a tu contraseña
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Configuración del correo
                $mail->setFrom('no-reply@tuempresa.com', 'Nombre Empresa');
                $mail->addAddress('soporte@tuempresa.com', 'Soporte'); // Correo de destino

                // Contenido del mensaje
                $mail->isHTML(true);
                $mail->Subject = 'Nueva Incidencia de Usuario';
                $mail->Body = "<p><strong>Nombre:</strong> $nombre</p>
                               <p><strong>Correo:</strong> $correo</p>
                               <p><strong>Teléfono:</strong> " . ($telefono ? $telefono : "No proporcionado") . "</p>
                               <p><strong>Asunto:</strong> $asunto</p>
                               <p><strong>Mensaje:</strong><br>$mensaje</p>
                               <p><strong>Preferencia de Contacto:</strong> $preferencia_contacto</p>
                               <p><strong>Política de Privacidad:</strong> " . ($politica ? "Sí" : "No") . "</p>";

                // Enviar el correo
                $mail->send();
                header("Location: ../ContenidoPrincipal/Contacto.html?mensaje=incidencia_exitosa");
                exit();
            } catch (Exception $e) {
                echo "La incidencia se registró, pero no se pudo enviar el correo. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error al registrar la incidencia: " . $conn->error;
        }
    } else {
        echo "Todos los campos obligatorios deben ser completados.";
    }
} else {
    echo "Método de solicitud incorrecto.";
}

// Cerrar conexión
$conn->close();
?>
