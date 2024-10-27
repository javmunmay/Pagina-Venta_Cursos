<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener todos los profesores
$sql = "SELECT * FROM usuarios WHERE Profesor = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Profesores</title>
    <link rel="stylesheet" href="../css/Estilos.css">
</head>
<body>
    <h2>Listado de Profesores</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha de Registro</th>
        </tr>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['numero_telefono']; ?></td>
                    <td><?php echo $row['fecha_registro']; ?></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="5">No hay profesores registrados.</td>
            </tr>
        <?php } ?>
    </table>
    <?php $conn->close(); ?>
</body>
</html>
