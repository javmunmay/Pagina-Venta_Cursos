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
    header("Location: ../../InicioSesion/InicioSesion.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización del Curso</title>
    <link rel="stylesheet" href="../css/cssVideoCurso.css">
    <script src="../js/videoCurso.js"></script>
</head>
<body>

<header>
    <nav>
      <img
        src="../../imagenes/LogoFondoAzul.jpg"
        alt="Logo Estudiante Programador"
        class="logo" />
      <button class="menu-toggle" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul class="nav-links">
        <li><a href="../../InicioSesion/MiAcademia.php">Inicio</a></li>
        <li>
          <a href="../../InicioSesion/InformacionPersonal.php">Mi Perfil</a>
        </li>
        <li><a href="../../InicioSesion/CursosDentroSesion.php">Cursos</a></li>
        <li><a href="../../InicioSesion/MisCertificados.php">Mis Certificados</a></li>
        <li><a href="../../InicioSesion/ContactoSesionIniciada.php">Ayuda</a></li>
        <li>
          <a class="cerrarSesion" href="../../php/logout.php">Cerrar Sesión</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="video-content">
      <!-- Contenedor del vídeo -->
      <div class="video-player">
        <video id="cursoVideo" controls autoplay playsinline>
          <source src="https://41095220.servicio-online.net/VideosCursos/videos/IntroEstudianteProgramadorSonido.MP4" type="video/mp4">
          Tu navegador no soporta el vídeo, por favor Inicia sesión en otro navegador o contactanos a través del formulario de Contacto.
        </video>
        <div class="video-controls">
          <button id="prevVideo" class="nav-btn">Anterior</button>
          <button id="nextVideo" class="nav-btn">Siguiente</button>
        </div>
        <br>
        <h3>Archivos descargables / Apuntes:</h3>
        <p>A continuación se muestra el material descargable para estudiar El curso de HTML de Lenguaje de Marca.</p>
        <button id="matDescargable" class="matDescargable">📥PDF Unidad HTML</button>
        <button id="matDescargable" class="matDescargable">📥Flyer Curso HTML</button>
      </div>

      <!-- Rúbrica de temas al lado del vídeo -->
      <aside class="course-outline">
        <h3>Curso HTML desde Cero</h3>
        <div class="course-outline">
          <ul>
            <li><a href="introduccion.html"><span class="circle"></span>Introducción a HTML</a></li>
            <li><a href="estructura-documento.html"><span class="circle"></span>Estructura de un Documento HTML</a></li>
            <li><a href="etiquetas-basicas.html"><span class="circle"></span>Etiquetas Básicas y Formato de Texto</a></li>
            <li><a href="enlaces.html"><span class="circle"></span>Enlaces e Hipervínculos</a></li>
            <li><a href="imagenes.html"><span class="circle"></span>Insertar Imágenes</a></li>
            <li><a href="listas.html"><span class="circle"></span>Listas (Ordenadas y Desordenadas)</a></li>
            <li><a href="tablas.html"><span class="circle"></span>Tablas y Estructuración de Datos</a></li>
            <li><a href="formularios.html"><span class="circle"></span>Creación de Formularios</a></li>
            <li><a href="multimedia.html"><span class="circle"></span>Multimedia: Audio y Video</a></li>
            <li><a href="atributos-avanzados.html"><span class="circle"></span>Atributos Avanzados y SEO</a></li>
            <li><a href="semantica.html"><span class="circle"></span>Etiquetas Semánticas</a></li>
            <li><a href="estructura-web.html"><span class="circle"></span>Estructura de una Página Web Completa</a></li>
            <li><a href="proyectos-practicos.html"><span class="circle"></span>Proyecto Práctico: Página Web Simple</a></li>
          </ul>
        </div>
        <button id="examBtn" class="exam-btn" disabled>🔒 Hacer Examen</button>
        <p>*El botón <b>"Hacer Examen"</b> estará disponible <b>una vez completado el 80%</b> de los temas de este curso."</p>
      </aside>
    </div>
  </main>

  <?php include '../../php/footerSesion.php'; ?>

<script src="js/videoCurso.js"></script>
</body>
</html>
