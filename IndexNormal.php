<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Cursos online para desarrolladores web en Estudiante Programador" />
  <meta name="keywords" content="cursos online, desarrollo web, programación, JavaScript, PHP" />
  <title>Estudiante Programador</title>
  <link rel="stylesheet" href="css/cssInicio.css" />
  <link rel="icon" type="image/png" href="imagenes/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <link rel="stylesheet" href="css/cssInicio.css?v=1.0">

  <script src="js/App.js"></script>

  <!-- ************* -->
  <!--  Versión 2.7  -->
  <!-- ************* -->

</head>

<body>
  <header>
    <nav>
      <a href="/">
        <img src="imagenes/LogoFondoAzul.jpg" alt="Logo Estudiante Programador" class="logo" />
      </a>
      <button class="menu-toggle" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul class="nav-links">
        <li><a href="/">Inicio</a></li>
        <li><a href="ContenidoPrincipal/Cursos.php">Cursos</a></li>
        <li><a href="ContenidoPrincipal/Planes.php">Planes</a></li>
        <li><a href="ContenidoPrincipal/SobreNosotros.php">Sobre Nosotros</a></li>
        <li><a href="ContenidoPrincipal/Contacto.php">Contacto</a></li>
        <li><a href="InicioSesion/InicioSesion.php" class="login-btn">Iniciar Sesión</a></li>
      </ul>
    </nav>
  </header>



  <!-- Onda principal -->
  <div class="wave"></div>

  <!-- Segunda onda para dar más profundidad -->
  <div class="wave"></div>

  <main>
    <!-- Sección de bienvenida -->



    <section class="hero">
      <h1>Impulsa tu carrera con habilidades en desarrollo web</h1>
      <p>
        Aprende de expertos y mejora tu futuro con acceso a más de 40 cursos
        prácticos y actualizados. ¡Empieza ahora!
      </p>
      <a href="ContenidoPrincipal/Cursos.php" class="cta-btn">Comienza tu primera lección</a>
    </section>

    <!-- Sección de Nuevos Cursos -->
    <section class="new-courses">
      <h2>Explora nuestros nuevos cursos</h2>
      <div class="courses-container">
        <div class="course">
          <img src="imagenes/CursoJavaBanner.jpg" alt="Curso de Java" />
          <h3>Java Orientado a Objetos</h3>
          <p>
            Domina los principios de la programación orientada a objetos con
            uno de los lenguajes más usados en la industria.
          </p>
          <a href="https://41095220.servicio-online.net/InformacionCursos/CursoJava.html" class="btn-curso">Ver Curso</a>
        </div>
        <div class="course">
          <img src="imagenes/CursoPhpBanner.jpg" alt="Curso de PHP" />
          <h3>PHP desde Cero</h3>
          <p>
            Aprende a crear aplicaciones web dinámicas con PHP y domina este
            poderoso lenguaje del lado del servidor.
          </p>
          <a href="https://41095220.servicio-online.net/InformacionCursos/CursoPhp.html" class="btn-curso">Ver Curso</a>
        </div>
        <div class="course">
          <img src="imagenes/CursoHtmlBanner.jpg" alt="Curso de HTML" />
          <h3>HTML y CSS desde Cero</h3>
          <p>
            Crea páginas web modernas y adaptables usando las mejores
            prácticas de HTML5 y CSS3.
          </p>
          <a href="https://41095220.servicio-online.net/InformacionCursos/CursoHtml.html" class="btn-curso">Ver Curso</a>
        </div>
      </div>
    </section>

    <!-- Sección de Beneficios Mejorada -->
    <section class="benefits">
      <h2>Beneficios</h2>
      <div class="benefits-container">
        <div class="benefit">
          <img src="imagenes/PerfilCursoEspecializado.jpg" alt="Curso especializado" />
          <h3>Aprende a tu ritmo</h3>
          <p>
            Con más de 40 cursos disponibles, elige cuándo y cómo aprender,
            sin fechas límite ni presiones.
          </p>
        </div>

        <div class="benefit">
          <img src="imagenes/materialDeCalidad.PNG" alt="Material descargable" />
          <h3>Material de calidad</h3>
          <p>
            Accede a una gran variedad de cursos de calidad verificados
            por expertos.
          </p>
        </div>

        <div class="benefit">
          <img src="imagenes/EnfocadosEnProyectos.PNG" alt="Ejercicios prácticos" />
          <h3>Enfocado en proyectos</h3>
          <p>
            Realiza proyectos prácticos desde el primer día. Enfréntate a
            desafíos reales que simulan problemas de la industria.
          </p>
        </div>

        <div class="benefit">
          <img src="imagenes/Certificados.png" alt="Comunidad de estudiantes" />
          <h3>Certificados</h3>
          <p>
            Finaliza nuestros cursos y obtén certificados que
            validen tus nuevas aptitudes.
          </p>
        </div>
      </div>
    </section>

    <!-- Sección de Testimonios Mejorada -->

    <section class="testimonials">
      <h2>Lo que dicen nuestros estudiantes</h2>
      <div class="testimonials-container">
        <div class="testimonial">
          <p class="quote">
            "Estudiante Programador me ayudó a entender JavaScript desde cero
            y gracias a ello, conseguí mi primer empleo como desarrolladora
            junior. ¡Altamente recomendable!"
          </p>
          <h3>- Laura García, Desarrolladora Junior</h3>
        </div>

        <div class="testimonial">
          <p class="quote">
            "Los cursos están muy bien estructurados y los ejercicios
            prácticos me ayudaron a afianzar mis conocimientos."
          </p>
          <h3>- Miguel Ortiz, Freelance</h3>
        </div>

        <div class="testimonial">
          <p class="quote">
            "Gracias a Estudiante Programador, ahora puedo crear proyectos
            completos de desarrollo web y estoy más que preparado para los
            retos de la industria."
          </p>
          <h3>- Ana López, Desarrolladora Full Stack</h3>
        </div>

        <div class="testimonial">
          <p class="quote">
            "Los cursos están muy bien, incluyen certificados y los profesores son muy buenos, lo recomiendo."
          </p>
          <h3>- Carlos Martínez, Estudiante</h3>
        </div>
      </div>
    </section>

    <section class="redes-sociales">
      <h2>Síguenos en nuestras redes</h2>
      <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank" rel="noopener noreferrer"><img
          src="iconos/tik-tok.png" alt="TikTok" /></a>
      <a href="https://www.instagram.com/estudianteprogramador/" target="_blank" rel="noopener noreferrer"><img src="iconos/instagram.png" alt="Instagram" /></a>
      <a href="https://www.patreon.com/c/EstudianteProgramador?utm_medium=clipboard_copy&utm_source=copyLink&utm_campaign=creatorshare_fan&utm_content=join_link" target="_blank" rel="noopener noreferrer"><img src="iconos/patreon.png" alt="Patreon" /></a>
      <a href="https://www.youtube.com/@ElEstudianteProgramador" target="_blank" rel="noopener noreferrer"><img src="iconos/youtube.png" alt="YouTube" /></a>
    </section>

    <!-- Sección de CTA Final -->
    <section class="cta-final">
      <h2>¡Únete a nuestra comunidad hoy!</h2>
      <p>
        No pierdas la oportunidad de desarrollar tus habilidades con nuestros
        cursos de alta calidad y el apoyo de una comunidad activa.
      </p>
      <a href="ContenidoPrincipal/Cursos.html" class="cta-btn-final">Comenzar</a>

    </section>
  </main>

  <?php include 'php/footer.php'; ?>

</body>

</html>