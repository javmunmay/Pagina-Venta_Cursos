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


  <!-- Versión Black Friday -->





  <script>
    // Fecha y hora en que finaliza la oferta (Año, Mes-1, Día, Hora, Minutos)
    const blackFridayEnd = new Date(2025, 11, 31, 59, 59, 59);
    // Ejemplo: 29 de Noviembre de 2024 a las 23:59:59
    // Ojo: meses en JS van de 0 a 11 (Enero=0, Noviembre=10)

    function actualizarContadorBF() {
      const now = new Date();
      const tiempoRestante = blackFridayEnd - now;

      if (tiempoRestante <= 0) {
        document.getElementById("bf-countdown").innerHTML = "¡Oferta finalizada!";
        return;
      }

      const segundos = Math.floor(tiempoRestante / 1000) % 60;
      const minutos = Math.floor(tiempoRestante / 1000 / 60) % 60;
      const horas = Math.floor(tiempoRestante / 1000 / 60 / 60) % 24;
      const dias = Math.floor(tiempoRestante / 1000 / 60 / 60 / 24);

      document.getElementById("bf-days").textContent = dias;
      document.getElementById("bf-hours").textContent = ("0" + horas).slice(-2);
      document.getElementById("bf-minutes").textContent = ("0" + minutos).slice(-2);
      document.getElementById("bf-seconds").textContent = ("0" + segundos).slice(-2);
    }

    // Actualiza cada segundo
    setInterval(actualizarContadorBF, 1000);



    function abrirModal() {
      const modal = document.getElementById("modal-cupon");
      if (modal) {
        modal.style.display = "flex";
        // 'flex' para centrar con justify-content y align-items
      }
    }

    function cerrarModal() {
      const modal = document.getElementById("modal-cupon");
      if (modal) {
        modal.style.display = "none";
      }
    }

    // (Opcional) cerrar con 'Esc'
    window.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        cerrarModal();
      }
    });
  </script>



</head>

<body>
  <!-- Banner Black Friday -->
  <div class="blackfriday-banner">
    <span class="bf-highlight">BLACK FRIDAY</span>
    <span>¡Descuentos de hasta el 70% por tiempo limitado!</span>
  </div>


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

    <!-- Cinta / Pin de Black Friday en la esquina -->
    <div class="bf-ribbon">
      <span>BLACK FRIDAY</span>
    </div>




    <section class="hero">
      <h1>Impulsa tu carrera con habilidades en desarrollo web</h1>
      <p>
        Aprende de expertos y mejora tu futuro con acceso a más de 40 cursos
        prácticos y actualizados. ¡Empieza ahora!
      </p>
      <a href="ContenidoPrincipal/Cursos.html" class="cta-btn">Comienza tu primera lección</a>
    </section>

    <!-- Botón o enlace para mostrar el modal (opcional) -->
    <button onclick="abrirModal()" class="btn-show-modal">¡Ver cupón Black Friday!</button>

    <!-- Contenedor del modal -->
    <div id="modal-cupon" class="modal-container">
      <!-- Contenido del modal -->
      <div class="modal-content">
        <span class="modal-close" onclick="cerrarModal()">&times;</span>
        <h2>¡Descuento Especial Black Friday!</h2>
        <p>Utiliza el cupón <strong>BLACKFRIDAY</strong> para obtener un 50% de descuento en tus cursos.</p>
        <p>¡Solo por tiempo limitado!</p>
        <button onclick="cerrarModal()" class="btn-accept">¡Aprovechar Ahora!</button>
      </div>
    </div>

    <!-- Sección del contador -->
    <div class="bf-countdown-container">
      <h2>La oferta termina en:</h2>
      <div id="bf-countdown" class="bf-countdown">
        <div class="time-box">
          <span id="bf-days">0</span>
          <small>Días</small>
        </div>
        <div class="time-box">
          <span id="bf-hours">0</span>
          <small>Horas</small>
        </div>
        <div class="time-box">
          <span id="bf-minutes">0</span>
          <small>Min</small>
        </div>
        <div class="time-box">
          <span id="bf-seconds">0</span>
          <small>Seg</small>
        </div>
      </div>
    </div>




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
          <a href="https://41095220.servicio-online.net/InformacionCursos/CursoJava.html" class="btn-curso">Ver
            Curso</a>
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
          <a href="https://41095220.servicio-online.net/InformacionCursos/CursoHtml.html" class="btn-curso">Ver
            Curso</a>
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
          <img src="imagenes/ComunidadDeApoyo.PNG" alt="Comunidad de estudiantes" />
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