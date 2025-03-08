<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto | Estudiante Programador</title>
  <link rel="stylesheet" href="../css/cssContacto.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />



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
    <section class="hero">
      <h1>Contáctanos</h1>
      <p>
        Si tienes alguna pregunta o necesitas más información, no dudes en
        escribirnos. Estamos aquí para ayudarte.
      </p>
    </section>

    <!-- Formulario de contacto mejorado -->
    <section class="contact-form">
      <h2>Formulario de Contacto</h2>
      <form action="../php/procesar_incidencia.php" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre Completo:</label>
          <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required />
        </div>
        <br />
        <div class="form-group">
          <label for="email">Correo electrónico:</label>
          <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" required />
        </div>
        <br />
        <div class="form-group">
          <label for="telefono">Teléfono (Opcional):</label>
          <input type="tel" id="telefono" name="telefono" placeholder="Tu número de teléfono" />
        </div>
        <br />
        <div class="form-group">
          <label for="asunto">Asunto:</label>
          <select id="asunto" name="asunto" required>
            <option value="" disabled selected>Selecciona un asunto</option>
            <option value="videos_no_puede_verlo">
              No puedo ver los vídeos de los cursos
            </option>
            <option value="ayuda_para_iniciar_sesion">
              Necesito ayuda para iniciar sesión
            </option>
            <option value="error_al_comprar_plan">
              Me muestra un error al comprar un plan
            </option>
            <option value="quiero_darme_de_baja">Quiero darme de baja</option>
            <option value="error_carga_pagina">
              Error en la carga de la página
            </option>
            <option value="no_puedo_descargar_material">
              No puedo descargar el material del curso
            </option>
            <option value="error_al_completar_curso">
              No se registra como completado el curso
            </option>
            <option value="problema_calidad_video">
              Problemas con la calidad de los vídeos
            </option>
            <option value="problema_cambio_contrasena">
              No puedo cambiar mi contraseña
            </option>
            <option value="problema_activacion_cuenta">
              No se activó mi cuenta tras el pago
            </option>
            <option value="problema_certificado">
              Problema con la descarga del certificado
            </option>
            <option value="problema_conexion_cuenta">
              Problema al conectar con mi cuenta
            </option>
            <option value="asistencia_tecnica">Asistencia técnica</option>
            <option value="solicitud_de_reembolso">
              Solicitud de reembolso
            </option>
            <option value="problema_contenido">
              Contenido del curso desactualizado o incorrecto
            </option>
            <option value="no_aparece_suscripcion">
              No aparece mi suscripción activa
            </option>
            <option value="sugerencia">Sugerencia</option>
            <option value="otros">Otros</option>
          </select>
        </div>
        <br />
        <div class="form-group">
          <label for="mensaje">Mensaje:</label>
          <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
        </div>
        <br />
        <div class="form-group">
          <label for="preferencia-contacto"><b>Preferencia de contacto:</b></label>
          <div>
            <input type="radio" id="contacto-email" name="preferencia_contacto" value="email" checked />
            <label for="contacto-email">Correo electrónico</label>
          </div>
          <div>
            <input type="radio" id="contacto-telefono" name="preferencia_contacto" value="telefono" />
            <label for="contacto-telefono">Teléfono</label>
          </div>
        </div>
        <div class="form-group">
          <input type="checkbox" id="politica" name="politica" required />
          <label for="politica">Acepto la
            <a href="PoliticaPrivacidad.php" target="_blank" rel="noopener noreferrer">política de
              privacidad</a></label>
        </div>
        <button type="submit" class="btn-submit" id="recuperarcontrasena">Enviar mensaje</button>

      </form>
    </section>

    <section class="recuperar-contrasena">
      <h2>Recuperar contraseña</h2>
      <form action="../php/procesar_olvido.php" method="post" id="form-recuperar">
        <label for="email">Introduce tu correo electrónico:</label>
        <input type="email" name="email" id="email" required>
        <p style="color: #090643; background-color: #f9f9f9; border: 1px solid #03fa6e; padding: 10px; border-radius: 5px; font-weight: bold;">
          Recibirás un correo con las instrucciones para restablecer tu contraseña.
          <br>Por favor, revisa tu bandeja de entrada, incluida la carpeta de spam.
        </p>
        <button type="submit" class="btn-submit">Recuperar contraseña</button>
      </form>
    </section>

    <section class="redes-sociales">
      <h2>Síguenos en nuestras redes</h2>
      <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank" rel="noopener noreferrer"><img
          src="../iconos/tik-tok.png" alt="TikTok" /></a>
      <a href="https://www.instagram.com/estudianteprogramador/" target="_blank" rel="noopener noreferrer"><img src="../iconos/instagram.png" alt="Instagram" /></a>
      <a href="https://www.patreon.com/c/EstudianteProgramador?utm_medium=clipboard_copy&utm_source=copyLink&utm_campaign=creatorshare_fan&utm_content=join_link" target="_blank" rel="noopener noreferrer"><img src="../iconos/patreon.png" alt="Patreon" /></a>
      <a href="https://www.youtube.com/@ElEstudianteProgramador" target="_blank" rel="noopener noreferrer"><img src="../iconos/youtube.png" alt="YouTube" /></a>
    </section>

    <!-- Información de contacto -->
    <section class="info-contacto">
      <h2>Información de contacto</h2>
      <p>📧 Correo: estudianteprogramador0@gmail.com</p>
    </section>

    <!-- Sección de CTA Final -->
    <section class="cta-final">
      <h2>¡Únete a nuestra comunidad hoy!</h2>
      <p>
        No pierdas la oportunidad de desarrollar tus habilidades con nuestros
        cursos de alta calidad y el apoyo de una comunidad activa.
      </p>
      <a href="Cursos.php" class="cta-btn-final">Comenzar</a>
    </section>
  </main>

  <?php include '../php/footer.php'; ?>

  <script src="../js/AppInfoCurso.js"></script>
</body>


<script>
  window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');

    if (mensaje === 'incidencia_exitosa') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Gracias por comunicarse con nosotros. Hemos registrado su incidencia exitosamente y nuestro equipo se pondrá en contacto con usted a la brevedad para brindarle asistencia.';
      mensajeDiv.style.backgroundColor = '#d4edda';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #c3e6cb';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';
      mensajeDiv.style.textAlign = 'center';

      // Inserta el mensaje en el contenedor del formulario de contacto
      const formContainer = document.querySelector('.contact-form'); // Cambia '.contact-container' al contenedor adecuado
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);

    } else if (mensaje === 'usuario_no_encontrado') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Usuario no encontrado, por favor introduzca un correo registrado.';
      mensajeDiv.style.backgroundColor = '#F8D7DA';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #F8D7DA';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';
      mensajeDiv.style.textAlign = 'center';

      // Inserta el mensaje en el contenedor del formulario de contacto
      const formContainer = document.querySelector('.contact-form'); // Cambia '.contact-container' al contenedor adecuado
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);

    } else if (mensaje === 'Recuperar_Contrasena_Enviado') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Hemos enviado un correo de recuperación de contraseña, por favor verifique su correo tanto en la bandeja principal como en spam, el proceso es valido durante 1 hora.';
      mensajeDiv.style.backgroundColor = '#d4edda';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #c3e6cb';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';
      mensajeDiv.style.textAlign = 'center';

      // Inserta el mensaje en el contenedor del formulario de contacto
      const formContainer = document.querySelector('.recuperar-contrasena'); // Cambia '.contact-container' al contenedor adecuado
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    } else if (mensaje === 'error_enviar_correo') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'Se ha producido un error al enviar el correo de recuperación. Por favor intentelo de nuevo o mandenos un mensaje de lo ocurrido mediante nuestro formulario de contacto.';
      mensajeDiv.style.backgroundColor = '#F8D7DA';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #F8D7DA';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';
      mensajeDiv.style.textAlign = 'center';

      // Inserta el mensaje en el contenedor del formulario de contacto
      const formContainer = document.querySelector('.recuperar-contrasena'); // Cambia '.contact-container' al contenedor adecuado
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    }
  };
</script>

</html>