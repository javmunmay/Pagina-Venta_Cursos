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
  <title>Cursos | Estudiante Programador</title>
  <link rel="stylesheet" href="../css/CursosDentroSesion.css" />
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <script src="../js/App.js"></script>
  <script src="app.js?v=1.0"></script>
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

  <main>
    <!-- Sección de bienvenida -->
    <section class="hero">
      <h1>Cursos de Desarrollo, IA, Ciberseguridad...</h1>
      <p>¿Qué quieres aprender hoy?</p>
      <input
        type="text"
        id="buscador"
        class="search-bar"
        placeholder="Busca un curso..." />

      <div class="filtros-container">

        <!-- Filtros adicionales -->
        <div class="custom-select filtro-nivel" id="nivel-select">
          <div class="selected-option">Todos los niveles</div>
          <ul class="options">
            <li data-value="">Todos los niveles</li>
            <li data-value="principiante">Principiante</li>
            <li data-value="intermedio">Intermedio</li>
            <li data-value="avanzado">Avanzado</li>
          </ul>
        </div>
        <div class="custom-select filtro-nivel" id="categoria-select">
          <div class="selected-option">Todas las categorías</div>
          <ul class="options">
            <li data-value="">Todas las categorías</li>
            <li data-value="desarrollo">Desarrollo</li>
            <li data-value="ia">Inteligencia Artificial</li>
            <li data-value="ciberseguridad">Ciberseguridad</li>
          </ul>
        </div>

      </div>

    </section>

    <!-- Sección de todos nuestros cursos -->
    <section class="cursos">
      <h2>Todos nuestros cursos</h2>
      <div class="grid-cursos">
        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoJavaBanner.jpg"
            alt="Curso Java Orientado a Objetos" />
          <div class="curso-info">
            <h3>Introducción a Java Orientado a Objetos</h3>
            <p>Aprende a dominar Java Orientado a Objetos desde cero hasta un nivel intermedio.</p>
            <a href="../InfoCursosSesion/Curso.php?id=4" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img src="../imagenes/CursoPhpFundamentosBanner.jpg" alt="Curso PHP" />
          <div class="curso-info">
            <h3>Fundamentos de PHP</h3>
            <p>Aprende los fundamentos de PHP desde cero con nuestro curso para principiantes</p>
            <a href="../InfoCursosSesion/Curso.php?id=2" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoHtmlBanner.jpg"
            alt="Curso de HTML y CSS" />
          <div class="curso-info">
            <h3>Curso de HTML desde Cero hasta Avanzado</h3>
            <p>
              Aprende HTML con este curso completo desde cero hasta avanzado.
            </p>
            <a href="../InfoCursosSesion/Curso.php?id=1" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoCSSBanner.jpg"
            alt="Curso de HTML y CSS" />
          <div class="curso-info">
            <h3>Curso de CSS desde Cero hasta Avanzado</h3>
            <p>
              Aprende CSS con este curso completo desde cero hasta avanzado.
            </p>
            <a href="../InfoCursosSesion/Curso.php?id=3" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="ciberseguridad">
          <img
            src="../imagenes/CursoCiberSeguridadBanner.jpg"
            alt="Curso de Ciberseguridad" />
          <div class="curso-info">
            <h3>Introducción a Ciberseguridad</h3>
            <p>Aprende los conceptos clave para proteger sistemas y datos.</p>
            <a
              href="../InfoCursosSesion/Curso.php?id=5"
              class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoPythonBanner.jpg"
            alt="Python: Fundamentos" />
          <div class="curso-info">
            <h3>Python: Fundamentos</h3>
            <p>Aprende los fundamentos de Python.</p>
            <a href="../InfoCursosSesion/Curso.php?id=6" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="intermedio" data-categoria="ia">
          <img src="../imagenes/CursoIAiBanner.jpg" alt="IA: Algoritmos" />
          <div class="curso-info">
            <h3>Curso Iniciación IA: Algoritmos</h3>
            <p>Aprende a crear algoritmos de IA con Python.</p>
            <a href="../InfoCursosSesion/Curso.php?id=7" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoLinuxBanner.jpg"
            alt="Linux: Comandos terminal" />
          <div class="curso-info">
            <h3>Linux: Comandos terminal</h3>
            <p>Aprende a usar los comandos de Linux como un experto.</p>
            <a
              href="../InfoCursosSesion/Curso.php?id=8"
              class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoFundamentosJSBanner.jpg"
            alt="JavaScript: Fundamentos" />
          <div class="curso-info">
            <h3>JavaScript: Fundamentos</h3>
            <p>Aprende los fundamentos básicos de Javascript</p>
            <a
              href="../InfoCursosSesion/Curso.php?id=9"
              class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoIntroduccionProgramacionBanner.jpg"
            alt="Introducción a la Programación" />
          <div class="curso-info">
            <h3>Introducción a la Programación</h3>
            <p>
              Aprende las bases de programación para saber pensar como un
              programador profesional.
            </p>
            <a
              href="../InfoCursosSesion/Curso.php?id=10"
              class="btn-curso">Ver Curso</a>
          </div>
        </article>


        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img
            src="../imagenes/CursoAngularBanner.jpg"
            alt="PHP Fundamentos" />
          <div class="curso-info">
            <h3>Angular: Fundamentos</h3>
            <p>Aprende los fundamentos básicos de Angular</p>
            <a
              href="../InfoCursosSesion/Curso.php?id=11"
              class="btn-curso">Ver Curso</a>
          </div>
        </article>


        <article
          class="curso"
          data-nivel="principiante"
          data-categoria="desarrollo">
          <img src="../imagenes/CursoSqlBanner.jpg" alt="PHP Fundamentos" />
          <div class="curso-info">
            <h3>SQL desde 0 hasta Avanzado</h3>
            <p>Aprende a manejar bases de datos SQL desde cero hasta Avanzado como un profesional en la gestion, administración... de las bases de datos SQL.</p>
            <a
              href="../InfoCursosSesion/Curso.php?id=12"
              class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <!-- Agregar más cursos aquí -->
      </div>
    </section>

    <!-- Sección de CTA Final -->
    <section class="cta-final">
      <h2>Diseñado para potenciar tus habilidades</h2>
      <p>
        Comienza uno de nuestros cursos y no pierdas la oportunidad de
        desarrollar tus habilidades con el apoyo de una comunidad activa.
      </p>
    </section>
  </main>

  <?php include '../php/footerSesion.php'; ?>
  <script src="js/App.js"></script>
</body>

</html>