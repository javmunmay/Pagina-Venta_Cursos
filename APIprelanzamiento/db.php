<?php
// Configuración de la base de datos
$servername = "PMYSQL181.dns-servicio.com:3306"; // Dirección del servidor de la base de datos
$username = "Javier";        // Usuario de la base de datos (cambia según tu configuración)
$password = "u70q0Z2p@";            // Contraseña de la base de datos (cambia según tu configuración)
$dbname = "10718674_prelanzamiento"; // Nombre de tu base de datos (cambia por el nombre real)

// Crear una nueva conexión usando mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    // Si hay un error, detener el script y mostrar un mensaje de error
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Si todo está bien, la conexión se establece correctamente
// No necesitas hacer nada más aquí, solo usar $conn en otros archivos
?>