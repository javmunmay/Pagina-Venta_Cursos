<?php
session_start();
session_unset();  // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión actual
header("Location: ../InicioSesion/InicioSesion.php?mensaje=cierre_sesion_exitoso"); // Redirigir a la página de inicio de sesión
exit();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cerrar sesión</title>
</head>
<body>
  <h1>Cerrando sesión...</h1>

  <script>
    // Eliminar el nombre de localStorage
    localStorage.removeItem("nombreUsuario");

  </script>
</body>
</html>