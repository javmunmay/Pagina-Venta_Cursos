<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para contar usuarios
$sql = "SELECT COUNT(*) as total FROM usuarios";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Devolver el resultado en formato JSON
header('Content-Type: application/json');
echo json_encode((int)$row['total']); // Asegúrate de que devuelve un número entero

$conn->close();
?>