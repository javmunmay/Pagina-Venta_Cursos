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
  <title>Contacto | Estudiante Programador</title>
  <link rel="stylesheet" href="../css/contactoSesionIniciada.css" />
  <link rel="stylesheet" href="../css/contactoSesionIniciada.css?v=1.0" />
  <script src="../App.js?v=1.0"></script>
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
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
    <section class="hero">
      <h1>Contáctanos</h1>
      <p>Si tienes alguna pregunta o necesitas más información, no dudes en escribirnos. Estamos aquí para ayudarte.</p>
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


    <!-- Redes sociales -->
    <section class="redes-sociales">
      <h2>Síguenos en nuestras redes</h2>
      <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank" rel="noopener noreferrer"><img src="../iconos/tik-tok.png" alt="TikTok" /></a>
      <a href="#" target="_blank" rel="noopener noreferrer"><img src="../iconos/instagram.png" alt="Instagram" /></a>
      <a href="#" target="_blank" rel="noopener noreferrer"><img src="../iconos/patreon.png" alt="Patreon" /></a>
      <a href="#" target="_blank" rel="noopener noreferrer"><img src="../iconos/youtube.png" alt="YouTube" /></a>
    </section>

    <!-- Información de contacto -->
    <section class="info-contacto">
      <h2>Información de contacto</h2>
      <p>📧 Correo: estudianteprogramador0@gmail.com</p>
    </section>

    
  </main>

  <?php include '../php/footerSesion.php'; ?>

  <script src="../js/App.js?v=1.0"></script>
</body>

</html>