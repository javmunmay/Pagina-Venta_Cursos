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
            <li><a href="#">Cursos</a></li>
            <li><a href="#">Mis Certificados</a></li>
            <li><a href="ContactoSesionIniciada.php">Ayuda</a></li>
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
          placeholder="Busca un curso..."
        />

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
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoJavaBanner.jpg"
              alt="Curso Java Orientado a Objetos"
            />
            <div class="curso-info">
              <h3>Introducción a Java Orientado a Objetos</h3>
              <p>Aprende a dominar Java Orientado a Objetos desde cero hasta un nivel intermedio.</p>
              <a href="../informacionCursos/CursoJava.html" class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img src="../imagenes/CursoPhpBanner.jpg" alt="Curso PHP" />
            <div class="curso-info">
              <h3>Introducción a PHP</h3>
              <p>Aprende PHP desde cero con nuestro curso para principiantes</p>
              <a href="../informacionCursos/CursoPhp.html" class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoHtmlBanner.jpg"
              alt="Curso de HTML y CSS"
            />
            <div class="curso-info">
              <h3>Curso de HTML desde Cero hasta Avanzado</h3>
              <p>
                Aprende HTML con este curso completo desde cero hasta avanzado.
              </p>
              <a href="https://41095220.servicio-online.net/InfoCursosSesion/Curso.php?id=1" class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="ciberseguridad"
          >
            <img
              src="../imagenes/CursoCiberSeguridadBanner.jpg"
              alt="Curso de Ciberseguridad"
            />
            <div class="curso-info">
              <h3>Introducción a Ciberseguridad</h3>
              <p>Aprende los conceptos clave para proteger sistemas y datos.</p>
              <a
                href="../informacionCursos/CursoCiberseguridad.html"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoPythonBanner.jpg"
              alt="Python: Fundamentos"
            />
            <div class="curso-info">
              <h3>Python: Fundamentos</h3>
              <p>Aprende los fundamentos de Python.</p>
              <a href="../informacionCursos/CursoPython.html" class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article class="curso" data-nivel="intermedio" data-categoria="ia">
            <img src="../imagenes/CursoIAiBanner.jpg" alt="IA: Algoritmos" />
            <div class="curso-info">
              <h3>IA: Algoritmos</h3>
              <p>Aprende a crear algoritmos de IA con Python.</p>
              <a href="../informacionCursos/CursoIA.html" class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoLinuxBanner.jpg"
              alt="Linux: Comandos terminal"
            />
            <div class="curso-info">
              <h3>Linux: Comandos terminal</h3>
              <p>Aprende a usar los comandos de Linux como un experto.</p>
              <a
                href="../informacionCursos/CursoLinuxComandos.html"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoFundamentosJSBanner.jpg"
              alt="JavaScript: Fundamentos"
            />
            <div class="curso-info">
              <h3>JavaScript: Fundamentos</h3>
              <p>Aprende los fundamentos básicos de Javascript</p>
              <a
                href="../informacionCursos/CursoJSFundamentos.html"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoIntroduccionProgramacionBanner.jpg"
              alt="Introducción a la Programación"
            />
            <div class="curso-info">
              <h3>Introducción a la Programación</h3>
              <p>
                Aprende las bases de programación para saber pensar como un
                programador profesional.
              </p>
              <a
                href="../informacionCursos/CursoIntroduccionProg.html"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoPhpFundamentosBanner.jpg"
              alt="PHP Fundamentos"
            />
            <div class="curso-info">
              <h3>PHP: Fundamentos</h3>
              <p>Aprende los fundamentos básicos de PHP</p>
              <a
                href="https://41095220.servicio-online.net/InfoCursosSesion/Curso.php?id=2"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoAngularBanner.jpg"
              alt="PHP Fundamentos"
            />
            <div class="curso-info">
              <h3>Angular: Fundamentos</h3>
              <p>Aprende los fundamentos básicos de Angular</p>
              <a
                href="../informacionCursos/CursoAngularFundamentos.html"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img
              src="../imagenes/CursoAngularBanner.jpg"
              alt="PHP Fundamentos"
            />
            <div class="curso-info">
              <h3>TypeScript: Fundamentos</h3>
              <p>Aprende los fundamentos básicos de TypeScript</p>
              <a
                href="../informacionCursos/CursoAngularFundamentos.html"
                class="btn-curso"
                >Ver Curso</a
              >
            </div>
          </article>

          <article
            class="curso"
            data-nivel="principiante"
            data-categoria="desarrollo"
          >
            <img src="../imagenes/CursoSqlBanner.jpg" alt="PHP Fundamentos" />
            <div class="curso-info">
              <h3>SQL desde 0 hasta Avanzado</h3>
              <p>Aprende a manejar bases de datos SQL desde cero hasta Avanzado como un profesional en la gestion, administración... de las bases de datos SQL.</p>
              <a
                href="../informacionCursos/CursoSqlDesdeCero.html"
                class="btn-curso"
                >Ver Curso</a
              >
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

    <footer>
      <div class="footer-container">
        <div class="footer-menu">
          <ul>
            <li><a href="../Index.html">Inicio</a></li>
            <li>
              <a href="PoliticaPrivacidad.html">Política de privacidad</a>
            </li>
            <li>
              <a href="TerminosCondiciones.html">Términos y condiciones</a>
            </li>
          </ul>
        </div>
        <div class="footer-social">
          <a
            href="https://www.tiktok.com/@estudianteprogramador"
            target="_blank"
            ><img src="../iconos/tik-tok.png" alt="TikTok"
          /></a>
          <a href="https://www.instagram.com" target="_blank"
            ><img src="../iconos/instagram.png" alt="Instagram"
          /></a>
          <a href="https://www.patreon.com" target="_blank"
            ><img src="../iconos/patreon.png" alt="Patreon"
          /></a>
          <a href="https://www.youtube.com" target="_blank"
            ><img src="../iconos/youtube.png" alt="YouTube"
          /></a>
        </div>
      </div>
      <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
    </footer>
    <script src="App.js"></script>
  </body>
</html>
