<?php
// Conectar a la base de datos
$servername = "localhost";  // Cambiar según la configuración
$username = "root";         // Cambiar según la configuración
$password = "";             // Cambiar según la configuración
$dbname = "estudiante_programador";  // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos enviados desde la petición AJAX
$input = json_decode(file_get_contents('php://input'), true);

// Verificar la acción a realizar
if (isset($input['servicio'])) {
    $servicio = $input['servicio'];

    switch ($servicio) {
        case 'listar':
            // Consulta SQL para obtener todos los usuarios
            $sql = "SELECT id, nombre, email, numero_telefono, fecha_nacimiento, User, Admin FROM usuarios";
            $result = $conn->query($sql);
        
            $usuarios = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
            }
            echo json_encode($usuarios);
            break;

        case 'insertar':
            // Insertar un nuevo usuario
            $nombre = $input['nombre'];
            $email = $input['email'];
            $password = password_hash($input['password'], PASSWORD_DEFAULT);
            $telefono = $input['numero_telefono'];
            $fecha_nacimiento = $input['fecha_nacimiento'];
            $user = $input['User'];
            $admin = $input['Admin'];
            
            $sql = "INSERT INTO usuarios (nombre, email, password, numero_telefono, fecha_nacimiento, user, admin)
                    VALUES ('$nombre', '$email', '$password', '$telefono', '$fecha_nacimiento', '$user', '$admin')";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "Usuario agregado exitosamente"]);
            } else {
                echo json_encode(["error" => "Error: " . $conn->error]);
            }
            break;

        case 'modificar':
            // Modificar un usuario existente
            $id = $input['id'];
            $nombre = $input['nombre'];
            $email = $input['email'];
            $telefono = $input['numero_telefono'];
            $fecha_nacimiento = $input['fecha_nacimiento'];

            $sql = "UPDATE usuarios 
                    SET nombre='$nombre', email='$email', numero_telefono='$telefono', fecha_nacimiento='$fecha_nacimiento'
                    WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "Usuario modificado exitosamente"]);
            } else {
                echo json_encode(["error" => "Error: " . $conn->error]);
            }
            break;

        case 'borrar':
            // Borrar un usuario
            $id = $input['id'];

            $sql = "DELETE FROM usuarios WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "Usuario eliminado exitosamente"]);
            } else {
                echo json_encode(["error" => "Error: " . $conn->error]);
            }
            break;

        case 'contarUsuarios':
            // Contar el número total de usuarios
            $sql = "SELECT COUNT(*) as total FROM usuarios";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo json_encode($row['total']);
            break;

        default:
            echo json_encode(["error" => "Servicio no reconocido"]);
    }
}

$conn->close();
?>
