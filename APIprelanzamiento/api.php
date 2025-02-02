<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Permitir solicitudes desde cualquier origen

// Incluir el archivo de conexión
include 'db.php';

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT id, nombre, correo, fecha_registro FROM usuarios ORDER BY fecha_registro DESC";
$result = $conn->query($sql);

$usuarios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = [
            'id' => htmlspecialchars($row['id']),
            'nombre' => htmlspecialchars($row['nombre']),
            'correo' => htmlspecialchars($row['correo']),
            'fecha_registro' => htmlspecialchars($row['fecha_registro'])
        ];
    }
}

// Cerrar la conexión
$conn->close();

// Devolver los datos en formato JSON
echo json_encode(['usuarios' => $usuarios]);
?>