<?php
// Datos de conexión a la base de datos
$servername = "PMYSQL181.dns-servicio.com:3306";
$username = "Javier";
$password = "u70q0Z2p@";
$dbname = "10718674_estudiante_programador";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
