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
          class="logo"
        />
        <ul class="nav-links">
          <li><a href="MiAcademia.php">Inicio</a></li>
          <li class="dropdown">
            <a href="#">Mi Perfil</a>
            <div class="dropdown-content">
              <a href="InformacionPersonal.php">Información Personal</a>
              <a href="#configuracion-seguridad">Configuración de Seguridad</a>
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
      <section class="hero">
        <h1>Contáctanos</h1>
        <p>Si tienes alguna pregunta o necesitas más información, no dudes en escribirnos. Estamos aquí para ayudarte.</p>
      </section>
    
      <!-- Formulario de contacto mejorado -->
      <section class="contact-form">
        <h2>Formulario de Contacto</h2>
        <form action="registro.php" method="POST">
          <div class="form-group">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required />
          </div><br>
          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" required />
          </div><br>
          <div class="form-group">
            <label for="telefono">Teléfono (Opcional):</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Tu número de teléfono" />
          </div><br>
          <div class="form-group">
            <label for="asunto">Asunto:</label>
            <select id="asunto" name="asunto" required>
              <option value="" disabled selected>Selecciona un asunto</option>
              <option value="videos_no_puede_verlo">No puedo ver los vídeos de los cursos</option>
              <option value="ayuda_para_iniciar_sesion">Necesito ayuda para iniciar sesión</option>
              <option value="error_al_comprar_plan">Me muestra un error al comprar un plan</option>
              <option value="quiero_darme_de_baja">Quiero darme de baja</option>
              <option value="sugerencia">Sugerencia</option>
              <option value="otros">Otros</option>
            </select>
          </div><br>
          <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
          </div> <br>
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
            <label for="politica">Acepto la <a href="PoliticaPrivacidad.html" target="_blank" rel="noopener noreferrer">política de privacidad</a></label>
          </div>
          <button type="submit" class="btn-submit">Enviar mensaje</button>
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
      
      <!-- Sección de CTA Final -->
      <section class="cta-final">
        <h2>¡Únete a nuestra comunidad hoy!</h2>
        <p>No pierdas la oportunidad de desarrollar tus habilidades con nuestros cursos de alta calidad y el apoyo de una comunidad activa.</p>
        <a href="Cursos.html" class="cta-btn-final">Comenzar</a>
      </section>
    </main>
    
    <footer>
      <div class="footer-container">
        <div class="footer-menu">
          <ul>
            <li><a href="../Inicio.html">Inicio</a></li> 
            <li><a href="PoliticaPrivacidad.html" rel="noopener noreferrer">Política de privacidad</a></li>
            <li><a href="TerminosCondiciones.html" rel="noopener noreferrer">Términos y condiciones</a></li>
          </ul>
        </div>
        <div class="footer-social">
          <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank" rel="noopener noreferrer"><img src="../iconos/tik-tok.png" alt="TikTok" /></a>
          <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><img src="../iconos/instagram.png" alt="Instagram" /></a>
          <a href="https://www.patreon.com" target="_blank" rel="noopener noreferrer"><img src="../iconos/patreon.png" alt="Patreon" /></a>
          <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer"><img src="../iconos/youtube.png" alt="YouTube" /></a>
        </div>
      </div>
      <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
