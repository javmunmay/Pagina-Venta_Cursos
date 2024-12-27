<?php
// listar_incidencias.php

// Verificar si el usuario tiene sesión de admin iniciada
// (Podrías tener algo como):
session_start();
if (!isset($_SESSION['admin_id'])) {
    // Redirige a la página de login o muestra error
    header('Location: admin_login.php');
    exit();
}

// Conexión a la base de datos
include '../php/conexion.php'; // <--- ajusta la ruta a tu archivo de conexión

// Consulta para obtener todas las incidencias
$sql = "SELECT * FROM incidencias ORDER BY fecha_reportada DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración - Incidencias</title>
  <style>
    table {
      width: 90%;
      margin: 0 auto;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f5f5f5;
    }
    /* Estilos de ejemplo */
    .container {
      width: 95%;
      max-width: 1200px;
      margin: 20px auto;
      font-family: Arial, sans-serif;
    }
    h1 {
      text-align: center;
    }
    .estado-abierta {
      color: green;
      font-weight: bold;
    }
    .estado-cerrada {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Listado de Incidencias</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Fecha Reportada</th>
        <th>Estado</th>
        <th>Usuario ID</th>
        <!-- Aquí podrías añadir más columnas, como prioridad, categoría, etc. -->
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['titulo']); ?></td>
            <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
            <td><?php echo $row['fecha_reportada']; ?></td>
            <td>
              <?php if ($row['estado'] === 'Abierta'): ?>
                <span class="estado-abierta"><?php echo $row['estado']; ?></span>
              <?php else: ?>
                <span class="estado-cerrada"><?php echo $row['estado']; ?></span>
              <?php endif; ?>
            </td>
            <td><?php echo $row['usuario_id']; ?></td>
            <!-- Más columnas aquí -->
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6">No hay incidencias reportadas.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
