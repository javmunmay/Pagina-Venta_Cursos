<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Permite peticiones desde cualquier origen
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS'); // Métodos permitidos
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Cabeceras permitidas

include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Obtener todos los usuarios
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

    echo json_encode(['usuarios' => $usuarios]);
} elseif ($method === 'DELETE') {
    // Eliminar un usuario
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['id'])) {
        echo json_encode(['error' => 'ID requerido']);
        exit;
    }

    $id = $data['id'];
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['mensaje' => 'Usuario eliminado']);
    } else {
        echo json_encode(['error' => 'Error al eliminar usuario']);
    }

    $stmt->close();
}

$conn->close();
?>
