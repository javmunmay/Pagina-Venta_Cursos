
<?php
// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión solo si no está ya iniciada
}

// Configuraciones para deshabilitar el caché
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Redirigir al login si no está autenticado
    header("Location: InicioSesion.html");
    exit();
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Peresonal | Estudiante Programador</title>
    <link rel="stylesheet" href="../css/cssinfoPersonal.css">
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico">
</head>
<body>
    <header>
        <nav>
            <img
              src="../imagenes/LogoFondoAzul.jpg"
              alt="Logo Estudiante Programador"
              class="logo"
            />
            <ul class="nav-links">
              <li><a href="MiAcademia.php">Inicio</a></li>
              <li class="dropdown">
                  <a href="#">Mi Perfil</a>
                  <div class="dropdown-content">
                      <a href="#informacion-personal">Información Personal</a>
                      <a href="#configuracion-seguridad">Configuración de Seguridad</a>
                      <a href="#certificados-logros">Certificados y Logros</a>
                      <a href="#suscripciones-pagos">Suscripciones y Pagos</a>
                      <div class="cerrarSesion">
                      <a href="../php/logout.php">Cerrar Sesión</a>
                      </div>
                      
                  </div>
              </li>
              <li><a href="#">Cursos</a></li>
              <li><a href="#">Mis Certificados</a></li>
              <li><a href="../Contacto.html">Ayuda</a></li>
          </ul>
            
          
        </nav>
    </header>

    <main>
        <div class="info">
            <h1>Información Personal</h1>
            <p><strong>Nombre:</strong> Juan Pérez</p>
            <p><strong>Edad:</strong> 30 años</p>
            <p><strong>Email:</strong> juan.perez@email.com</p>
            <p><strong>Teléfono:</strong> +34 600 123 456</p>
            <p><strong>Dirección:</strong> Calle Falsa 123, Madrid, España</p>
            <p><strong>Intereses:</strong> Programación, fotografía, viajes</p>
        </div>
    

    <footer>
        <div class="footer-container">
          <div class="footer-menu">
            <ul>
              <li><a href="../Inicio.html">Inicio</a></li> 
              <li><a href="../PoliticaPrivacidad.html">Política de privacidad</a></li>
              <li><a href="../TerminosCondiciones.html">Términos y condiciones</a></li>
            </ul>
          </div>
          <div class="footer-social">
            <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank"><img src="../iconos/tik-tok.png" alt="TikTok" /></a>
            <a href="https://www.instagram.com" target="_blank"><img src="../iconos/instagram.png" alt="Instagram" /></a>
            <a href="https://www.patreon.com" target="_blank"><img src="../iconos/patreon.png" alt="Patreon" /></a>
            <a href="https://www.youtube.com" target="_blank"><img src="../iconos/youtube.png" alt="YouTube" /></a>
          </div>
        </div>
        <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
      </footer>
</body>
</html>