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
    header("Location: ../InicioSesion/InicioSesion.html");
    exit();
}
?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Admin | Estudiante Programador</title>
    <link rel="stylesheet" href="../css/Admin.css" />
    <script src="admin.js"></script>
    <script src="App.js"></script>
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
          <li><a href="HomeAdmin.php">Inicio</a></li>
          <li><a href="#h2TablaUsuarios">Registro de Usuarios</a></li>
          <li><a href="#">Mis Certificados</a></li>
          <li>
            <div class="cerrarSesion">
              <a href="../php/logout.php">Cerrar Sesión</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>

    <div
      id="welcome-message"
      style="font-weight: bold; color: #090643; font-size: 30px; padding: 15px"
    ></div>

    <main>
      <div id="welcome-popup" class="welcome-popup">
        <div class="popup-content">
          <span id="close-popup" class="close">&times;</span>
          <h2>Has accedido como Administrador</h2>
        </div>
      </div>

      <section class="hero-banner">
        <div class="banner-content">
          <h1>
            Panel de <br />
            Administrador
          </h1>
          <h3 id="totalUsuarios">Total de usuarios: Cargando...</h3>
          <script src="cargarTotalUsuarios.js"></script>

        </div>
        <div class="progreso-usuario">
          <h3>Estado de la Sesión:</h3>
          <h3 style="color: green">Activa</h3>
        </div>
      </section>
      <section class="h2TablaUsuarios" id="h2TablaUsuarios">
        <h2>Registro de Usuarios</h2>
        <button class="btn" id="btNuevaPersona">Nueva persona</button>
      
      </section>
      
      <section class="tablaAjax-usuarios">
        

        <!-- Formulario para agregar usuarios -->
        <div id="formPersonas" class="formPersonas">
          <fieldset>
            <legend>Alta en el servicio</legend>
            <div>
              <label for="nombre">Nombre</label>
              <input type="text" id="nombre" />
            </div>
            <div>
              <label for="email">Correo Electrónico</label>
              <input type="email" id="email" />
            </div>
            <div>
              <label for="password">Contraseña</label>
              <input type="password" id="password" />
            </div>
            <div>
              <label for="numero_telefono">Número de Teléfono</label>
              <input type="text" id="numero_telefono" maxlength="15" />
            </div>
            <div>
              <label for="fecha_nacimiento">Fecha de Nacimiento</label>
              <input type="date" id="fecha_nacimiento" />
            </div>
            <div>
              <label for="user">Usuario Normal</label>
              <input type="radio" id="user" name="tipo_usuario" checked />
            </div>
            <div>
              <label for="admin">Administrador</label>
              <input type="radio" id="admin" name="tipo_usuario" />
            </div>            
            <div class="btn">
              <button id="btAnade">Añadir</button>
              <button id="btCancelar">Cancelar</button>
            </div>
          </fieldset>
        </div>

        <!-- Formulario para modificar usuarios -->
        <div id="formPersonasMOD" class="formPersonas">
          <fieldset>
            <legend>Modificar Usuario</legend>
            <div>
              <label for="nombreMOD">Nombre</label>
              <input type="text" id="nombreMOD" />
            </div>
            <div>
              <label for="emailMOD">Correo Electrónico</label>
              <input type="email" id="emailMOD" />
            </div>
            <div>
              <label for="numero_telefonoMOD">Número de Teléfono</label>
              <input type="text" id="numero_telefonoMOD" maxlength="15" />
            </div>
            <div>
              <label for="fecha_nacimientoMOD">Fecha de Nacimiento</label>
              <input type="date" id="fecha_nacimientoMOD" />
            </div>
            <div>
              <label for="userMOD">Usuario Normal</label>
              <input type="radio" id="userMOD" name="tipo_usuarioMOD" />
            </div>
            <div>
              <label for="adminMOD">Administrador</label>
              <input type="radio" id="adminMOD" name="tipo_usuarioMOD" />
            </div>          
            <div class="btn">
              <button id="btModificar">Modificar</button>
              <button id="btCancelarMOD" onclick="ocultarFormularioMOD()">Cancelar</button>
            </div>
          </fieldset>
        </div>

        
        <table id="tabla_personas" border="1" class="tabla_personas">
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th>Número de Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Usuario Normal</th>
            <th>Administrador</th>
            <th>Borrar</th>
            <th>Editar</th>
          </tr>
          <tbody id="filas_tabla"></tbody>
        </table>

        <br /><br />
      </section>
    </main>
    <script src="../App.js"></script>
    <script src="../App.js?v=1.0"></script>
    <script>

    window.onload = function() {
          history.pushState(null, null, location.href);
          window.onpopstate = function() {
              history.go(1);
          };
    };

    </script>
    
  </body>
  
  <footer>
    <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
  </footer>
</html>
