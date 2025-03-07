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
  header("Location: InicioSesion.php");
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
  
  
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <header>
    <nav>
      <img
        src="../imagenes/LogoFondoAzul.jpg"
        alt="Logo Estudiante Programador"
        class="logo" />
      <button class="menu-toggle" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul class="nav-links">
        <li><a href="MiAcademia.php">Inicio</a></li>
        <li>
          <a href="InformacionPersonal.php">Mi Perfil</a>
        </li>
        <li><a href="CursosDentroSesion.php">Cursos</a></li>
        <li><a href="MisCertificados.php">Mis Certificados</a></li>
        <li><a href="ContactoSesionIniciada.php">Ayuda</a></li>
        <li>
          <a class="cerrarSesion" href="../php/logout.php">Cerrar Sesión</a>
        </li>
      </ul>
    </nav>
  </header>


  <!-- Contenedor para el mensaje de bienvenida -->
  <main class="container-fluid">
    <div id="welcome-popup" class="welcome-popup">
      <div class="popup-content">
        <span id="close-popup" class="close">&times;</span>
        <h2>Bienvenido a tu Academia</h2>
        <p>Para salir pulse <br> <b>"Mi Pefil" > "Cerrar Sesión"</b></p>
      </div>
    </div>

    <section class="hero-banner bg-light p-5 mb-4">
      <div class="container">
        <div class="row align-items-center"> <!-- Fila para organizar el contenido -->
          <!-- Columna izquierda (Título y botones) -->
          <div class="col-md-7">
            <h1 style="font-weight: bold; color: #090643;">Bienvenido</h1>
            <h1>
              <div id="welcome-message" style="font-weight: bold; color: #090643;">
              </div>
              <p class="lead mt-2" style="font-weight: bold; color: rgb(119, 119, 119);">
                Desarrolla tus habilidades al siguiente nivel.
              </p>
            </h1>
            <div class="mt-3 text-center">
              <a href="CursosDentroSesion.php" class="btn btn-primary btn-lg " style="background-color: #090643; border-color: #090643;">
                Todos los cursos
              </a>
            </div>
          </div>

          <!-- Columna derecha (Texto y botón) -->
          <div class="col-md-5 text-center mt-5">
            <h2 style="font-weight: bold; color: #090643;">+40 Cursos</h2>
            <p style="font-weight: bold; color: rgb(119, 119, 119);">
              Completa lecciones y finaliza los cursos para subir tu
              nivel formativo y obtener certificados que validen lo aprendido.
            </p>
            <a href="MisCertificados.php" class="btn btn-primary btn-lg" style="background-color: #090643; border-color: #090643;">
              Mis certificados
            </a>
          </div>
        </div>
      </div>
    </section>




    <section class="hero-banner bg-light p-5 mb-4">
      <div class="container text-center">
        <!-- Título -->
        <h1 class="mb-4" style="font-weight: bold; color: #090643;">Descubre nuestros cursos</h1>

        <div id="autoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <!-- Indicadores (puntos debajo del carrusel) -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#autoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#autoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#autoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <!-- Contenedor de las imágenes -->
          <div class="carousel-inner">
            <!-- Primera imagen -->
            <div class="carousel-item active">
              <img src="../imagenes/CursoHtmlBanner.jpg" class="d-block w-100" alt="Imagen 1">
              <div class="carousel-caption d-none d-md-block">
                <h5>Curso HTML desde cero</h5>
                <p>Aprende desde cero hasta avanzado el lenguaje de marcado más famoso en creación de webs</p>
              </div>
            </div>
            <!-- Segunda imagen -->
            <div class="carousel-item">
              <img src="../imagenes/CursoAngularBanner.jpg" class="d-block w-100" alt="Imagen 2">
              <div class="carousel-caption d-none d-md-block">
                <h5>Curso Angular</h5>
                <p>Descripción de la segunda imagen.</p>
              </div>
            </div>
            <!-- Tercera imagen -->
            <div class="carousel-item">
              <img src="../imagenes/CursoCiberSeguridadBanner.jpg" class="d-block w-100" alt="Imagen 3">
              <div class="carousel-caption d-none d-md-block">
                <h5>Tercera Imagen</h5>
                <p>Descripción de la tercera imagen.</p>
              </div>
            </div>
          </div>

          <!-- Controles (flechas de navegación) -->
          <button class="carousel-control-prev" type="button" data-bs-target="#autoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#autoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </section>



  </main>

  <?php include '../php/footerSesion.php'; ?>
  <script src="../js/AppMiAcademia.js?v=1.0"></script>
  <!-- Bootstrap JS y dependencias -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


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


  // Guardar el nombre en localStorage
  if (nombre) {
    localStorage.setItem("nombreUsuario", nombre);
  }

  // Recuperar el nombre de localStorage
  const nombreGuardado = localStorage.getItem("nombreUsuario");

  // Mostrar el nombre en la página
  if (nombreGuardado) {
    const welcomeMessage = document.getElementById("welcome-message");
    if (welcomeMessage) {
      welcomeMessage.innerHTML = `${nombreGuardado}`;
    }
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