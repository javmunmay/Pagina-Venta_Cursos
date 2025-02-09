<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Suscríbete a Estudiante Programador para acceder a cursos de alta calidad. Planes mensuales y anuales disponibles. ¡Elige el tuyo!">

  <title>Planes | Estudiante Programador</title>
  <link rel="stylesheet" href="../css/cssInicio.css" />

  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <script src="../js/App.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/cssInicio.css?v=1.0">
  
  


  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const botones = document.querySelectorAll('.pregunta-btn');
      if (botones.length > 0) {
        botones.forEach(button => {
          button.addEventListener('click', () => {
            const respuesta = button.nextElementSibling;
            button.classList.toggle('active');
            if (button.classList.contains('active')) {
              respuesta.style.maxHeight = respuesta.scrollHeight + 'px';
            } else {
              respuesta.style.maxHeight = '0';
            }

            // Cambiar el icono
            const icono = button.querySelector('.icono');
            icono.textContent = button.classList.contains('active') ? '+' : '+';
          });
        });
      } else {
        console.error('No se encontraron elementos con la clase .pregunta-btn');
      }
    });



  </script>



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
    <section class="heroPlanes">
      <h1>Elige el plan perfecto para ti</h1>
      <p>
        Accede a contenido exclusivo y conviértete en un desarrollador web de
        éxito.
      </p>
    </section>

    <section class="planes">
      <!-- Plan Mensual -->
      <div class="plan">
        <h2>Plan Mensual</h2>
        <p>
          Ideal para quienes quieren probar antes de comprometerse.
        </p>
        <p class="precio">19,90 € / mes</p>
        <p class="ahorro">Sin compromiso, paga mes a mes.</p>
        <ul>
          <li>Acceso 24/7 a +40 cursos especializados y actualizados</li>
          <li>Acceso completo a todos los cursos</li>
          <li>Soporte prioritario</li>
          <li>Actualizaciones semanales</li>
          <li>Certificados de finalización</li>
          <li>Ejercicios prácticos y proyectos guiados</li>
          <li>Material de estudio descargable</li>
          <li>Contenido exclusivo para miembros</li>
          <li>Descuentos en futuros cursos y eventos</li>
        </ul>
        <a href="../InicioSesion/InicioSesion.html" class="btn-plan">Elegir Plan</a>
      </div>

      <!-- Plan Anual -->
      <div class="plan destacado">
        <h2>Plan Anual</h2>
        <p>
          Para quienes quieren el máximo ahorro y compromiso en su aprendizaje.
        </p>
        <p class="precio">162 € / año</p>
        <p class="ahorro">Equivalente a 13,50 €/mes.</p>
        <ul>
          <li>Acceso 24/7 a +40 cursos especializados y actualizados</li>
          <li>Acceso completo a todos los cursos</li>
          <li>Soporte premium</li>
          <li>Actualizaciones diarias</li>
          <li>Certificados de finalización</li>
          <li>Ejercicios prácticos y proyectos guiados</li>
          <li>Material de estudio descargable</li>
          <li>Contenido exclusivo para miembros</li>
          <li>Descuentos en futuros cursos y eventos</li>
        </ul>
        <a href="../InicioSesion/InicioSesion.html" class="btn-plan">Elegir Plan</a>
        <div class="badge-popular">Más popular</div>
      </div>
    </section>
    <!-- Sección de Preguntas Frecuentes Mejorada -->
    <section class="preguntas-frecuentes">
      <h2>Preguntas frecuentes</h2>
      <div class="pregunta">
        <button class="pregunta-btn">
          ¿Hay certificaciones disponibles al finalizar los cursos?
          <span class="icono">+</span>
        </button>
        <div class="respuesta">
          <p>Sí, ofrecemos certificaciones al finalizar cada curso que hayas completado satisfactoriamente.</p>
        </div>
      </div>
      <div class="pregunta">
        <button class="pregunta-btn">
          ¿Qué nivel de experiencia previa requieren los cursos?
          <span class="icono">+</span>
        </button>
        <div class="respuesta">
          <p>Los cursos están diseñados para todos los niveles, desde principiantes hasta expertos.</p>
        </div>
      </div>
      <div class="pregunta">
        <button class="pregunta-btn">
          ¿Puedo comunicarme con el equipo docente para resolver dudas?
          <span class="icono">+</span>
        </button>
        <div class="respuesta">
          <p>Sí, contamos con un sistema de soporte para que puedas comunicarte directamente con los instructores o
            personal cualificado.</p>
        </div>
      </div>
      <div class="pregunta">
        <button class="pregunta-btn">
          ¿Cómo funcionan los planes profesionales (suscripciones) de Estudiante Programador?
          <span class="icono">+</span>
        </button>
        <div class="respuesta">
          <p>Los planes ofrecen acceso a todos los cursos y contenidos adicionales según la modalidad elegida (mensual o
            anual).</p>
        </div>
      </div>
      <div class="pregunta">
        <button class="pregunta-btn">
          ¿Puedo cancelar en cualquier momento?
          <span class="icono">+</span>
        </button>
        <div class="respuesta">
          <p>Sí, puedes cancelar tu suscripción en cualquier momento sin penalización.</p>
        </div>
      </div>
    </section>



    <!-- Sección de CTA Final -->
    <section class="cta-final">
      <h2>¡Elige tu plan ideal y comienza a crecer!</h2>
      <p>
        No pierdas la oportunidad de desarrollar tus habilidades con nuestros
        cursos de alta calidad y el apoyo de una comunidad activa.
      </p>


    </section>
  </main>

  <?php include '../php/footer.php'; ?>


  <script src="../App.js"></script>
</body>

</html>