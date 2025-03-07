<?php


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión - Estudiante Programador</title>
  <link rel="stylesheet" href="../css/InicioSesion.css" />
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="../css/InicioSesion.css?v=1.0">
  
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
      </ul>
    </nav>
  </header>

  <main>
    <section class="login-container">
      <h1>¡Bienvenido Estudiante!</h1>
      <form action="../php/login.php" method="POST">
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" required placeholder="Introduce tu correo" />

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required placeholder="Introduce tu contraseña" />

        <!-- Cambié el enlace por un botón de envío del formulario -->

        <button type="submit" class="btn-login">Iniciar Sesión</button>
        <!--<button type="#" class="btn-login">Iniciar Sesión</button>-->

        <!--<p class="registro" style="color: red; text-align: center; font-weight: bold; font-size: 1.2rem;">
          <b>Inicio de Sesión no disponible</b><br>
          Estamos realizando trabajos de mantenimiento. <br><br>Gracias por su paciencia.
        </p>-->

        <p class="registro">
          ¿No tienes una cuenta?
          <a href="Registrarse.php">Regístrate aquí</a>
        </p>
        <p class="registro">
          ¿Has olvidado tu contraseña?
          <a href="../ContenidoPrincipal/Contacto.php#recuperarcontrasena">Restaurar contraseña</a>
        </p>
      </form>

      <!-- Utilización de JavaScript para el error de Login-->

      <!-- Script para manejar los errores desde la URL -->
      <script>
        const params = new URLSearchParams(window.location.search);
        if (params.has("error")) {
          alert(params.get("error"));
        }
      </script>
    </section>

    <!-- Sección de CTA Final -->
    <section class="cta-final">
      <h2>¡Estás a un paso de comenzar a aprender algo nuevo!</h2>
      <p>
        Bienvenido de nuevo, es hora de desarrollar tus habilidades con
        nuestros cursos de alta calidad y el apoyo de una comunidad activa.
      </p>
    </section>
  </main>

  <?php include '../php/footer.php'; ?>
  <script src="../js/AppInfoCurso.js"></script>
</body>
<script>
  // Función para mostrar un mensaje si hay un parámetro en la URL
  window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');

    if (mensaje === 'registro_exitoso') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Registro completado con éxito. Ahora puedes iniciar sesión.';
      mensajeDiv.style.backgroundColor = '#d4edda';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #c3e6cb';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';

      const formContainer = document.querySelector('.login-container');
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    } else if (mensaje === 'cierre_sesion_exitoso') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Sesión cerrada correctamente.';
      mensajeDiv.style.backgroundColor = '#d4edda';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #c3e6cb';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';

      const formContainer = document.querySelector('.login-container');
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    } else if (mensaje === 'contrasena_coincide') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'El correo introducido ya tiene una cuenta creada, por favor inicia sesión.';
      mensajeDiv.style.backgroundColor = '#d4edda';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #c3e6cb';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';

      const formContainer = document.querySelector('.login-container');
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    } else if (mensaje === 'contrasena_incorrecta') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Contraseña Incorrecta.';
      mensajeDiv.style.backgroundColor = '#F8D7DA';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #F8D7DA';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';

      const formContainer = document.querySelector('.login-container');
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    } else if (mensaje === 'usuario_no_encontrado') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Usuario no encontrado.';
      mensajeDiv.style.backgroundColor = '#F8D7DA';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #F8D7DA';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';

      const formContainer = document.querySelector('.login-container');
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    }
  };
</script>


</html>