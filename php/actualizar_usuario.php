<?php
header('Content-Type: application/json');
// 1. Conectarse a la base de datos
require_once 'conexion.php';




// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

// Suponiendo que tienes el ID del usuario (puedes obtenerlo de la sesión o enviarlo desde el formulario)
session_start();
$id_usuario = $_SESSION['id_usuario']; // Asegúrate de que el ID del usuario esté disponible en la sesión

// Consulta SQL para actualizar la información
$sql = "UPDATE usuarios SET 
        nombre = ?, 
        email = ?, 
        numero_telefono = ?, 
        fecha_nacimiento = ? 
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nombre, $email, $telefono, $fecha_nacimiento, $id_usuario);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Información actualizada correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar la información: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
