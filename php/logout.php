<?php
session_start();
session_unset();  // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión actual
header("Location: ../InicioSesion/InicioSesion.html?mensaje=cierre_sesion_exitoso"); // Redirigir a la página de inicio de sesión
exit();
?>
