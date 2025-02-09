<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión - Estudiante Programador</title>
    <link rel="stylesheet" href="../css/InicioSesion.css" />
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="css/InicioSesion.css?v=1.0">
    
  </head>

  <body>
    <header>
      <nav>
        <a href="/">
          <img src="../imagenes/LogoFondoAzul.jpg" alt="Logo Estudiante Programador" class="logo" />
        </a>
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
        <h1>Crear una cuenta</h1>
        <form action="../php/registro.php" method="POST" id="registroForm">

          <label for="nombre">Nombre y Apellidos <span class="required">*</span></label></label>
          <input
            type="text"
            id="nombre"
            name="nombre"
            required
            placeholder="Nombre y Apellidos (Importante para los certificados)"
          />

          <label for="email">Correo Electrónico <span class="required">*</span></label></label>
          <input
            type="email"
            id="email"
            name="email"
            required
            placeholder="Introduce tu correo"
          />

          <label for="password">Contraseña <span class="required">*</span></label></label>
          <input
            type="password"
            id="password"
            name="password"
            required
            placeholder="Introduce tu contraseña"
          />

          <label for="passwordConfirm">Confirma Contraseña <span class="required">*</span></label></label>
          <input
            type="password"
            id="passwordConfirm"
            name="passwordConfirm"
            required
            placeholder="Confirma tu contraseña"
          />

          <label for="telefono">Número de Teléfono <span class="required">*</span></label></label>
          <div class="prefijo">
            <select id="prefijo" name="prefijo" class="select-prefijo">
              <optgroup label="Seleccione un prefijo"></optgroup>
              
              <optgroup label="Regiones Destacadas">
                <option value="+34">+34 (España)</option>
                <option value="+1">+1 (Estados Unidos)</option>
                <option value="+39">+39 (Italia)</option>
                <option value="+33">+33 (Francia)</option>
                <option value="+41">+41 (Suiza)</option>
                <option value="+54">+54 (Argentina)</option>
                <option value="+52">+52 (México)</option>
                <option value="+57">+57 (Colombia)</option>
                <option value="+51">+51 (Perú)</option>
                <option value="+591">+591 (Bolivia)</option>
                <option value="+56">+56 (Chile)</option>
                <option value="+593">+593 (Ecuador)</option>
                <option value="+40">+40 (Rumanía)</option>
                <option value="+502">+502 (Guatemala)</option>
                <option value="+39">+39 (Italia)</option>
                <option value="+351">+351 (Portugal)</option>
                
                <option value="">Otro (introduce prefijo)</option>
            </optgroup>
              
              <optgroup label="Europa">
                <option value="+355">+355 (Albania)</option>
                <option value="+49">+49 (Alemania)</option>
                <option value="+376">+376 (Andorra)</option>
                <option value="+43">+43 (Austria)</option>
                <option value="+32">+32 (Bélgica)</option>
                <option value="+375">+375 (Bielorrusia)</option>
                <option value="+387">+387 (Bosnia y Herzegovina)</option>
                <option value="+359">+359 (Bulgaria)</option>
                <option value="+357">+357 (Chipre)</option>
                <option value="+39">+39 (Ciudad del Vaticano)</option>
                <option value="+385">+385 (Croacia)</option>
                <option value="+45">+45 (Dinamarca)</option>
                <option value="+421">+421 (Eslovaquia)</option>
                <option value="+386">+386 (Eslovenia)</option>
                <option value="+34">+34 (España)</option>
                <option value="+372">+372 (Estonia)</option>
                <option value="+358">+358 (Finlandia)</option>
                <option value="+33">+33 (Francia)</option>
                <option value="+995">+995 (Georgia)</option>
                <option value="+30">+30 (Grecia)</option>
                <option value="+36">+36 (Hungría)</option>
                <option value="+353">+353 (Irlanda)</option>
                <option value="+354">+354 (Islandia)</option>
                <option value="+39">+39 (Italia)</option>
                <option value="+7">+7 (Kazajistán - parte en Europa)</option>
                <option value="+383">+383 (Kosovo)</option>
                <option value="+371">+371 (Letonia)</option>
                <option value="+423">+423 (Liechtenstein)</option>
                <option value="+370">+370 (Lituania)</option>
                <option value="+352">+352 (Luxemburgo)</option>
                <option value="+356">+356 (Malta)</option>
                <option value="+373">+373 (Moldavia)</option>
                <option value="+377">+377 (Mónaco)</option>
                <option value="+382">+382 (Montenegro)</option>
                <option value="+47">+47 (Noruega)</option>
                <option value="+31">+31 (Países Bajos)</option>
                <option value="+48">+48 (Polonia)</option>
                <option value="+351">+351 (Portugal)</option>
                <option value="+44">+44 (Reino Unido)</option>
                <option value="+420">+420 (República Checa)</option>
                <option value="+40">+40 (Rumanía)</option>
                <option value="+7">+7 (Rusia - parte en Europa)</option>
                <option value="+378">+378 (San Marino)</option>
                <option value="+381">+381 (Serbia)</option>
                <option value="+46">+46 (Suecia)</option>
                <option value="+41">+41 (Suiza)</option>
                <option value="+90">+90 (Turquía - parte en Europa)</option>
                <option value="+380">+380 (Ucrania)</option>
            </optgroup>
            
          
            <optgroup label="América">
              <option value="+1-268">+1-268 (Antigua y Barbuda)</option>
              <option value="+54">+54 (Argentina)</option>
              <option value="+1-242">+1-242 (Bahamas)</option>
              <option value="+1-246">+1-246 (Barbados)</option>
              <option value="+501">+501 (Belice)</option>
              <option value="+591">+591 (Bolivia)</option>
              <option value="+55">+55 (Brasil)</option>
              <option value="+1">+1 (Canadá)</option>
              <option value="+56">+56 (Chile)</option>
              <option value="+57">+57 (Colombia)</option>
              <option value="+506">+506 (Costa Rica)</option>
              <option value="+53">+53 (Cuba)</option>
              <option value="+1-767">+1-767 (Dominica)</option>
              <option value="+593">+593 (Ecuador)</option>
              <option value="+503">+503 (El Salvador)</option>
              <option value="+1">+1 (Estados Unidos)</option>
              <option value="+1-473">+1-473 (Granada)</option>
              <option value="+502">+502 (Guatemala)</option>
              <option value="+592">+592 (Guyana)</option>
              <option value="+509">+509 (Haití)</option>
              <option value="+504">+504 (Honduras)</option>
              <option value="+1-876">+1-876 (Jamaica)</option>
              <option value="+52">+52 (México)</option>
              <option value="+505">+505 (Nicaragua)</option>
              <option value="+507">+507 (Panamá)</option>
              <option value="+595">+595 (Paraguay)</option>
              <option value="+51">+51 (Perú)</option>
              <option value="+1-809">+1-809 (República Dominicana)</option>
              <option value="+1-869">+1-869 (San Cristóbal y Nieves)</option>
              <option value="+1-784">+1-784 (San Vicente y las Granadinas)</option>
              <option value="+1-758">+1-758 (Santa Lucía)</option>
              <option value="+597">+597 (Surinam)</option>
              <option value="+1-868">+1-868 (Trinidad y Tobago)</option>
              <option value="+598">+598 (Uruguay)</option>
              <option value="+58">+58 (Venezuela)</option>
          </optgroup>
          
          
          <optgroup label="Asia y Oriente Medio">
            <option value="+93">+93 (Afganistán)</option>
            <option value="+966">+966 (Arabia Saudita)</option>
            <option value="+374">+374 (Armenia)</option>
            <option value="+994">+994 (Azerbaiyán)</option>
            <option value="+880">+880 (Bangladés)</option>
            <option value="+973">+973 (Baréin)</option>
            <option value="+95">+95 (Birmania - Myanmar)</option>
            <option value="+673">+673 (Brunéi)</option>
            <option value="+975">+975 (Bután)</option>
            <option value="+855">+855 (Camboya)</option>
            <option value="+86">+86 (China)</option>
            <option value="+357">+357 (Chipre)</option>
            <option value="+850">+850 (Corea del Norte)</option>
            <option value="+82">+82 (Corea del Sur)</option>
            <option value="+971">+971 (Emiratos Árabes Unidos)</option>
            <option value="+63">+63 (Filipinas)</option>
            <option value="+995">+995 (Georgia)</option>
            <option value="+91">+91 (India)</option>
            <option value="+62">+62 (Indonesia)</option>
            <option value="+964">+964 (Irak)</option>
            <option value="+98">+98 (Irán)</option>
            <option value="+972">+972 (Israel)</option>
            <option value="+81">+81 (Japón)</option>
            <option value="+962">+962 (Jordania)</option>
            <option value="+7">+7 (Kazajistán - parte en Asia)</option>
            <option value="+996">+996 (Kirguistán)</option>
            <option value="+965">+965 (Kuwait)</option>
            <option value="+856">+856 (Laos)</option>
            <option value="+961">+961 (Líbano)</option>
            <option value="+60">+60 (Malasia)</option>
            <option value="+960">+960 (Maldivas)</option>
            <option value="+976">+976 (Mongolia)</option>
            <option value="+977">+977 (Nepal)</option>
            <option value="+968">+968 (Omán)</option>
            <option value="+92">+92 (Pakistán)</option>
            <option value="+970">+970 (Palestina)</option>
            <option value="+974">+974 (Catar)</option>
            <option value="+7">+7 (Rusia - parte en Asia)</option>
            <option value="+65">+65 (Singapur)</option>
            <option value="+963">+963 (Siria)</option>
            <option value="+94">+94 (Sri Lanka)</option>
            <option value="+66">+66 (Tailandia)</option>
            <option value="+992">+992 (Tayikistán)</option>
            <option value="+670">+670 (Timor Oriental)</option>
            <option value="+993">+993 (Turkmenistán)</option>
            <option value="+90">+90 (Turquía - parte en Asia)</option>
            <option value="+998">+998 (Uzbekistán)</option>
            <option value="+84">+84 (Vietnam)</option>
            <option value="+967">+967 (Yemen)</option>
        </optgroup>
        
          
              <option value="">Otro (introduce prefijo)</option>
          </select>
          
            <input
              type="tel"
              id="telefono"
              name="telefono"
              required
              placeholder="Número de teléfono"
              style="flex: 1"
            />
          </div>

          <label for="fecha_nacimiento">Fecha de Nacimiento <span class="required">*</span></label></label>
          <input
            type="date"
            id="fecha_nacimiento"
            name="fecha_nacimiento"
            required
          />

          <div class="checkbox-container">
            <input type="checkbox" id="politica" name="politica" value="1" required />
            <label for="politica"
              >Acepto la
              <a
                href="../ContenidoPrincipal/PoliticaPrivacidad.php"
                target="_blank"
                >política de privacidad</a
              >
              <span class="required">*</span></label>
            </label>
          </div>

          <button type="submit" class="btn-login">Registrarse</button>
          <p class="registro">
            ¿Tienes una cuenta?
            <a href="InicioSesion.php">Inicia Sesión aquí</a>
          </p>
        </form>
      </section>
      <!-- Sección de CTA Final -->
      <section class="cta-final">
        <h2>¡Estás a un paso de comenzar a aprender algo nuevo!</h2>
        <p>
          Es la primera vez que te veo por aquí. Es hora de demostrar lo que
          vales, tus habilidades no volverán a ser las mismas con nuestros
          cursos de alta calidad.
        </p>
      </section>
    </main>

    <?php include '../php/footer.php'; ?>
    
  </body>
  <script>
    //Error login
    window.onload = function () {
      const urlParams = new URLSearchParams(window.location.search);
      const error = urlParams.get("error");
      console.log("Parámetro de error detectado:", error); // Debugging

      if (error) {
        const mensajeDiv = document.createElement("div");
        mensajeDiv.textContent = error;
        mensajeDiv.style.backgroundColor = "#f8d7da";
        mensajeDiv.style.color = "#721c24";
        mensajeDiv.style.padding = "10px";
        mensajeDiv.style.border = "1px solid #f5c6cb";
        mensajeDiv.style.borderRadius = "5px";
        mensajeDiv.style.marginBottom = "15px";

        const formContainer = document.querySelector(".login-container");
        formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
      }
      // Establecer la restricción de la fecha de nacimiento para no permitir fechas futuras
      const fechaNacimiento = document.getElementById("fecha_nacimiento");
      const hoy = new Date().toISOString().split("T")[0];
      fechaNacimiento.setAttribute("max", hoy); // Establece el máximo en la fecha actual
    };

    // Capitalizar la primera letra en Nombre Usuario
    document.getElementById("nombre").addEventListener("input", function () {
      let nombre = this.value;
      this.value = nombre.charAt(0).toUpperCase() + nombre.slice(1);
    });
  </script>
</html>
