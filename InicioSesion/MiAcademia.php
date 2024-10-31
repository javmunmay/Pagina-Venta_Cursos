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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi Academia - Estudiante Programador</title>
    <link rel="stylesheet" href="../css/miAcademia.css" />
    <script src="../App.js"></script>
  <script src="../App.js?v=1.0"></script>
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
    
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
              <a href="InformacionPersonal.php">Información Personal</a>
              <a href="InformacionPersonal.php#h2Seguridad">Configuración de Seguridad</a>
              <a href="#certificados-logros">Certificados y Logros</a>
              <a href="#suscripciones-pagos">Suscripciones y Pagos</a>
              <div class="cerrarSesion">
                <a href="../php/logout.php">Cerrar Sesión</a>
              </div>
            </div>
          </li>
          <li><a href="CursosDentroSesion.php">Cursos</a></li>
          <li><a href="#">Mis Certificados</a></li>
          <li><a href="ContactoSesionIniciada.php">Ayuda</a></li>
        </ul>
      </nav>
    </header>
    <!-- Contenedor para el mensaje de bienvenida -->
    <div
      id="welcome-message"
      style="font-weight: bold; color: #090643; font-size: 30px; padding: 15px"
    ></div>

    <main>
      <div id="welcome-popup" class="welcome-popup">
        <div class="popup-content">
          <span id="close-popup" class="close">&times;</span>
          <h2>Bienvenido a tu Academia</h2>
          <p>Para salir pulse <br> <b>"Mi Pefil" > "Cerrar Sesión"</b></p>
        </div>
      </div>

      <section class="hero-banner">
        <div class="banner-content">
          <h1>
            Continuar con: <br />
            Curso de HTML5 y CSS3
          </h1>
          <p>Etiquetas relacionadas con texto</p>
          <a href="#" class="btn-banner"
            >Continuar Curso</a
          >
        </div>
        <div class="progreso-usuario">
          <h3>Estado del curso</h3>
          <p>
            Completa lecciones y finaliza el curso actual para subir tu nivel
            formativo.
          </p>
          <div class="barra-progreso">
            <div class="barra" style="width: 50%"></div>
          </div>
          <p>Estado: 50% Completado</p>
        </div>
      </section>

      <section class="hero-banner">
        <div class="banner-content">
          <h1>
            Tus Cursos: 
          </h1>
          <p>Tus cursos aparecerán aquí...</p>

        </div>
      
      </section>

      <section class="hero-banner">
        <div class="banner-content">
          <h1>Todos nuestros Cursos: </h1>
          
          

        </div>
      
      </section>
    


      

    </main>

    <footer>
      <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
    </footer>
    <script src="../App.js"></script>
    <script src="../App.js?v=1.0"></script>
  </body>

  

  <!-- Script para capturar el parámetro de nombre y mostrar el mensaje de bienvenida -->
  <script>
    // Función para obtener el valor de un parámetro en la URL
    function getParameterByName(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }

    // Obtener el nombre de la URL
    const nombre = getParameterByName("nombre");

    // Mostrar el mensaje de bienvenida si el nombre existe
    if (nombre) {
      const welcomeMessage = document.getElementById("welcome-message");
      welcomeMessage.innerHTML = "Hola, " + nombre + ". ¡Elige tu siguiente reto! ";
    }

    //Carrusel de cursos

    function moveCarousel(direction) {
  const carousel = document.querySelector('.carousel');
  const cardWidth = document.querySelector('.course-card').offsetWidth + 15; // Ancho del curso + margen derecho
  const scrollDistance = cardWidth * 3; // Desplaza tres cursos a la vez
  carousel.scrollBy({
    left: scrollDistance * direction,
    behavior: 'smooth'
  });
}




    //Desabilita el botón de atrás del navegador

  window.onload = function() {
      history.pushState(null, null, location.href);
      window.onpopstate = function() {
          history.go(1);
      };
  };



  </script>
</html>
