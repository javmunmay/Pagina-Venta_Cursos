<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trabaja con Nosotros - Estudiante Programador</title>
  <link rel="stylesheet" href="../css/cssInicio.css" />
  <script src="../js/App.js"></script>
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <link rel="stylesheet" href="css/cssInicio.css?v=1.0">
  


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
    <section class="trabaja-container">
      <h1>¡Trabaja con Nosotros!</h1>
      <p>
        ¿Tienes conocimientos en desarrollo y quieres compartirlos? Consulta
        las oportunidades disponibles y envíanos tu curso. Cada propuesta será
        valorada y revisada por un comité de profesores expertos.
      </p>

      <div class="anuncios">
        <div class="anuncio">
          <h2>Únete a Estudiante Programador</h2>
          <p>
            En Estudiante Programador, estamos en la búsqueda de un <strong>Programador Full Stack entusiasta</strong> que posea una verdadera pasión por la programación. Buscamos alguien creativo, con experiencia en proyectos personales o profesionales, capaz de trabajar con tecnologías como HTML, CSS, JavaScript, PHP, y herramientas de hosting y XAMPP.
          </p>
          <p>
            Requisitos:
            <ul>
              <li>Capacidad para programar sin depender exclusivamente de asistentes como ChatGPT.</li>
              <li>Experiencia en proyectos, ya sean personales o profesionales (no requerida pero valorada).</li>
              <li>Formación en Desarrollo de Aplicaciones Web (DAW), Desarrollo de Aplicaciones Multiplataforma (DAM) o similar.</li>
              <li>Conocimientos en HTML, CSS, JavaScript, PHP, manejo de servidores y XAMPP.</li>
            </ul>
          </p>
          <p class="precio"><strong>Sueldo: Hasta €/mes</strong></p>
          <p style="color: red;"><strong>Posición Actualmente No Disponible</strong></p>
          <button class="btn-solicitar"
            onclick="window.location.href='mailto:estudianteprogramador0@gmail.com?subject=Solicitud de Trabajo: Full Stack Developer'">
            Solicitar Trabajo</button>
        </div>
        
      </div>

      <br>
      <h1>Buscamos Cursos Tecnológicos: </h1>
      <p>
        ¿Tienes conocimientos en desarrollo y quieres compartirlos? Consulta
        las oportunidades disponibles y envíanos tu curso. Cada propuesta será
        valorada y revisada por un comité de profesores expertos.
      </p>
      <!-- Lista de Anuncios -->
      <div class="anuncios">
        <div class="anuncio">
          <h2>Curso de Desarrollo en PHP Avanzado</h2>
          <p>
            Estamos buscando un curso que cubra temas avanzados de PHP, como
            MVC, validaciones seguras y conexión con bases de datos.
          </p>

          <p class="precio"><strong>Hasta 70€</strong></p>
          <b>
            <p style="color: green;">Disponible</p>
          </b>
          <button class="btn-solicitar"
            onclick="window.location.href='mailto:estudianteprogramador0@gmail.com?subject=Solicitud de Trabajo: Curso PHP Avanzado'">
            Solicitar Trabajo</button>
        </div>

        <div class="anuncio">
          <h2>Curso de Angular para Principiantes</h2>
          <p>
            Necesitamos un curso práctico que introduzca los conceptos
            fundamentales de Angular, con ejemplos y ejercicios.
          </p>

          <p class="precio"><strong>Hasta 55€</strong></p>
          <b>
            <p style="color: green;">Disponible</p>
          </b>
          <button class="btn-solicitar"
            onclick="window.location.href='mailto:estudianteprogramador0@gmail.com?subject=Solicitud de Trabajo: Curso Angular Principiantes'">Solicitar
            Trabajo</button>
        </div>

        <div class="anuncio">
          <h2>Curso de Iniciación en Ciberseguridad</h2>
          <p>
            Buscamos un curso introductorio que enseñe las bases de ciberseguridad, protección de datos y prevención de
            amenazas, ideal para principiantes.
          </p>

          <p class="precio"><strong>Hasta 55€</strong></p>
          <b>
            <p style="color: green;">Disponible</p>
          </b>
          <button class="btn-solicitar"
            onclick="window.location.href='mailto:estudianteprogramador0@gmail.com?subject=Solicitud de Trabajo: Curso Iniciación en Ciberseguridad'">
            Solicitar Trabajo
          </button>
        </div>

        <div class="anuncio">
          <h2>Curso de SQL Bases de Datos</h2>
          <p>
            Buscamos un curso que enseñe desde lo más básico de SQL, incluyendo la creación y gestión de bases de datos,
            hasta niveles avanzados.
          </p>
          <p class="precio"><strong>Hasta 70€</strong></p>
          <b>
            <p style="color: green;">Disponible</p>
          </b>
          <button class="btn-solicitar"
            onclick="window.location.href='mailto:estudianteprogramador0@gmail.com?subject=Solicitud de Trabajo: Curso SQL Bases de Datos'">
            Solicitar Trabajo
          </button>
        </div>


        <div class="anuncio">
          <h2>Curso de Seguridad Web y Ciberseguridad</h2>
          <p>
            Buscamos un curso completo sobre prácticas seguras en desarrollo
            web, prevención de ataques y herramientas de auditoría.
          </p>
          <p class="precio"><strong>Hasta 60€</strong></p>
          <b>
            <p style="color: green;">Disponible</p>
          </b>
          <button class="btn-solicitar"
            onclick="window.location.href='mailto:estudianteprogramador0@gmail.com?subject=Solicitud de Trabajo: Curso Seguridad Web'">Solicitar
            Trabajo</button>
        </div>


      </div>

      <!-- Información adicional -->
      <section class="preguntas-frecuentes">
        <h3>¿Cómo funciona el proceso?</h3>
        <div class="pregunta">
          <ul>
            <li><span>📩</span> Envía tu solicitud haciendo clic en <b>"Solicitar Trabajo"</b>.</li>
            <li><span>🧐</span> Tu curso será evaluado por nuestro comité de profesores expertos.</li>
            <li><span>✅</span> Recibirás una notificación si tu curso ha sido aprobado.</li>
            <li><span>💰</span> El pago se realizará tras la revisión y aceptación del curso.</li>
          </ul>
          <p>
            <b>Importante:</b> Si no puede solicitar el trabajo mediante el botón, mande un correo a
            <b>estudianteprogramador0@gmail.com</b>.
          </p>
        </div>
      </section>



  </main>

  <?php include '../php/footer.php'; ?>
</body>

</html>