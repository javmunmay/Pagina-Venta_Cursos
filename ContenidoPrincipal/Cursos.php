<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cursos | Estudiante Programador</title>
  <link rel="stylesheet" href="../css/cssInicio.css" />
  <link rel="stylesheet" href="../css/cssInicio.css?v=1.0" />
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <script src="../js/App.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  
  


</head>

<body>

  <header>
    <nav>
      <a href="/">
        <img src="../imagenes/LogoFondoAzul.jpg" alt="Logo Estudiante Programador" class="logo" />
      </a>
      <button class="menu-toggle" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul class="nav-links">
        <li><a href="/">Inicio</a></li>
        <li><a href="../ContenidoPrincipal/Cursos.php">Cursos</a></li>
        <li><a href="../ContenidoPrincipal/Planes.php">Planes</a></li>
        <li><a href="../ContenidoPrincipal/SobreNosotros.php">Sobre Nosotros</a></li>
        <li><a href="../ContenidoPrincipal/Contacto.php">Contacto</a></li>
        <li><a href="../InicioSesion/InicioSesion.php" class="login-btn">Iniciar Sesión</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- Sección de bienvenida -->
    <section class="heroCursos">
      <h1>Cursos de Desarrollo, IA, Ciberseguridad...</h1>
      <p>¿Qué quieres aprender hoy?</p>
      <input type="text" id="buscador" class="search-bar" placeholder="Busca un curso..." />

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
        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoJavaBanner.jpg" alt="Curso Java Orientado a Objetos" />
          <div class="curso-info">
            <h3>Java Orientado a Objetos desde 0</h3>
            <p>Aprende a dominar Java Orientado a Objetos desde cero.</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoJava.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>
        <!--
          <article class="curso">
            <img
              src="imagenes/CursoPythonBanner.jpg"
              alt="Curso de Python e IA"
            />
            <div class="curso-info">
              <h3>Python: Fundamentos</h3>
              <p>Aprende los fundamentos de Python.</p>
              <button class="btn-curso">Ver Curso</button>
            </div>
          </article>
          -->

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoPhpBanner.jpg" alt="Curso PHP" />
          <div class="curso-info">
            <h3>Curso de PHP Desde Cero</h3>
            <p>Aprende PHP desde cero con nuestro curso para principiantes</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoPhp.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoHtmlBanner.jpg" alt="Curso de HTML y CSS" />
          <div class="curso-info">
            <h3>Curso de HTML desde Cero</h3>
            <p>
              Aprende HTML con este curso completo desde cero hasta avanzado.
            </p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoHtml.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="ciberseguridad">
          <img src="../imagenes/CursoCiberSeguridadBanner.jpg" alt="Curso de Ciberseguridad" />
          <div class="curso-info">
            <h3>Curso de Ciberseguridad: Inicios</h3>
            <p>Aprende los conceptos clave para proteger sistemas y datos.</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoCiberseguridad.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoPythonBanner.jpg" alt="Python: Fundamentos" />
          <div class="curso-info">
            <h3>Python: Fundamentos</h3>
            <p>Aprende los fundamentos de Python.</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoPython.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="intermedio" data-categoria="ia">
          <img src="../imagenes/CursoIAiBanner.jpg" alt="IA: Algoritmos" />
          <div class="curso-info">
            <h3>IA: Algoritmos</h3>
            <p>Aprende a crear algoritmos de IA con Python.</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoIA.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoLinuxBanner.jpg" alt="Linux: Comandos terminal" />
          <div class="curso-info">
            <h3>Linux: Comandos terminal</h3>
            <p>Aprende a usar los comandos de Linux como un experto.</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoLinuxComandos.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoFundamentosJSBanner.jpg" alt="JavaScript: Fundamentos" />
          <div class="curso-info">
            <h3>JavaScript: Fundamentos</h3>
            <p>Aprende los fundamentos básicos de Javascript</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoJSFundamentos.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoIntroduccionProgramacionBanner.jpg" alt="Introducción a la Programación" />
          <div class="curso-info">
            <h3>Introducción a la Programación</h3>
            <p>
              Aprende todo lo necesario para saber programar como un
              profesional.
            </p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoIntroduccionProg.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoPhpFundamentosBanner.jpg" alt="PHP Fundamentos" />
          <div class="curso-info">
            <h3>PHP: Fundamentos</h3>
            <p>Aprende los fundamentos básicos de PHP</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoPhpFundamentos.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoAngularBanner.jpg" alt="PHP Fundamentos" />
          <div class="curso-info">
            <h3>Angular: Fundamentos</h3>
            <p>Aprende los fundamentos básicos de Angular</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoAngularFundamentos.html" class="btn-curso">Ver Curso</a>
          </div>
        </article>

        <article class="curso" data-nivel="principiante" data-categoria="desarrollo">
          <img src="../imagenes/CursoSqlBanner.jpg" alt="PHP Fundamentos" />
          <div class="curso-info">
            <h3>SQL desde 0</h3>
            <p>Aprende a manejar bases de datos SQL desde cero</p>
            <a href="https://41095220.servicio-online.net/InformacionCursos/CursoSqlDesdeCero.html" class="btn-curso">Ver Curso</a>
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

  <?php include '../php/footer.php'; ?>

  <script src="App.js"></script>
</body>

</html>