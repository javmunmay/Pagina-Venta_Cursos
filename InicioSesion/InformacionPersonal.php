<?php
// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Configuración de caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
  header("Location: InicioSesion.php");
  exit();
}

// Conectar a la base de datos (usando un archivo de conexión común)
include '../php/conexion.php';

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Consulta para obtener la información del usuario
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Información Personal | Estudiante Programador</title>
  <link rel="stylesheet" href="../css/cssinfoPersonal.css" />
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <li class="dropdown">
          <a href="InformacionPersonal.php">Mi Perfil</a>
          <div class="dropdown-content">
            <a href="InformacionPersonal.php">Información Personal</a>
            <a href="InformacionPersonal.php#h2Seguridad">Configuración de Seguridad</a>
            <a href="#certificados-logros">Certificados y Logros</a>
            <a href="#suscripciones-pagos">Suscripciones y Pagos</a>
            <div class="cerrarSesion">
              <a href="../php/logout.php">Cerrar Sesión</a>
            </div>
          </div>
        </li>
        <li><a href="CursosDentroSesion.php">Cursos</a></li>
        <li><a href="MisCertificados.php">Mis Certificados</a></li>
        <li><a href="ContactoSesionIniciada.php">Ayuda</a></li>
      </ul>
    </nav>
  </header>



  <main>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Editar Información</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm" onsubmit="guardarCambios(event)">
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
              </div>
              <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
              </div>
              <button type="submit" class="btn " style="background-color: #090643; border-color: #090643; color: white;">Guardar Cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Sección de Información Personal -->
    <section id="info-personal" class="hero-banner">
      <div class="banner-content">
        <h1>Información Personal</h1>
        <img src="../imagenes/<?php echo $row['foto_perfil'] ?? 'Usuario.jpg'; ?>"
          alt="Foto de Perfil" class="foto-perfil" />

        <p><strong>Nombre Completo:</strong> <?php echo htmlspecialchars($row['nombre']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($row['numero_telefono']); ?></p>
        <p><strong>Edad:</strong>
          <?php
          $fechaNacimiento = new DateTime($row['fecha_nacimiento']);
          $hoy = new DateTime();
          echo $hoy->diff($fechaNacimiento)->y;
          ?>
          años
        </p>
        <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($row['fecha_nacimiento']); ?></p>
        <p><strong>Fecha de Registro:</strong> <?php echo htmlspecialchars($row['fecha_registro']); ?></p>
        <p>
          <strong>Aceptó Política de Privacidad:</strong>
          <?php echo $row['politica_privacidad'] ? 'Sí' : 'No'; ?>
        </p>
        <a class="btn btn-primary btn-lg" data-bs-toggle="modal"  data-bs-target="#editModal" style="background-color: #090643; border-color: #090643;" onclick="editarInformacion()">Actualizar Información</a>
      </div>
    </section>

    <!-- Sección con Progreso, Preferencias, etc. -->
    <section class="hero-banner">
      <div class="banner-content">
        <h2>Progreso en Cursos</h2>
        <p>Cursos Completados: 3</p>
        <p>Cursos en Progreso: 2</p>
        <a class="btn btn-primary btn-lg" style="background-color: #090643; border-color: #090643;" href="MisCertificados.php">Ver Certificados</a>

        <h3>Preferencias de Cuenta</h3>
        <p><strong>Idioma:</strong> Español</p>
        <p><strong>Notificaciones por correo:</strong> Activadas</p>
        <a class="btn btn-primary btn-lg" style="background-color: #090643; border-color: #090643;" onclick="configurarPreferencias()">Modificar Preferencias</a>
      </div>
    </section>

    <!-- Sección de Seguridad -->
    <section id="seguridad" class="hero-banner">
      <div class="banner-content">
        <h2>Seguridad</h2>
        <a class="btn btn-primary btn-lg" style="background-color: #090643; border-color: #090643;" href="CambiarContrasena.php">Cambiar Contraseña</a>

        <h3>Historial de Sesiones Recientes</h3>
        <ul>
          <li>Fecha: 2024-10-24 20:36:56 - Dispositivo: Chrome en Windows</li>
          <li>Fecha: 2024-10-22 18:22:34 - Dispositivo: Safari en iOS</li>
        </ul>
      </div>
    </section>

    <!-- Sección Certificados y Logros -->
    <section id="certificados-logros" class="hero-banner">
      <div class="banner-content">
        <h2>Certificados y Logros</h2>
        <p>Aquí irían los logros o certificados que tenga el usuario.</p>
      </div>
    </section>

    <!-- Sección Suscripciones y Pagos -->
    <section id="suscripciones-pagos" class="hero-banner">
      <div class="banner-content">
        <h2>Suscripción</h2>
        <p><strong>Tipo de Suscripción:</strong> Mensual</p>
        <p><strong>Fecha de Expiración:</strong> 2024-12-31</p>
        <p><a class="btn btn-primary btn-lg" style="background-color: #090643; border-color: #090643;" href="PoliticaPrivacidad.php">Política de Privacidad</a></p>
        <p><a class="btn btn-primary btn-lg" style="background-color: #090643; border-color: #090643;" href="#">Consejos de Seguridad</a></p>
      </div>
    </section>

    <section class="hero-banner">
      <div class="cerrarSesion">
        <a class="btn btn-danger" href="../php/logout.php">Cerrar Sesión</a>
      </div>
    </section>

  </main>

  <footer>
    <div class="footer-container">
      <div class="footer-menu">
        <ul>
          <li><a href="../Inicio.html">Inicio</a></li>
          <li><a href="../PoliticaPrivacidad.html">Política de privacidad</a></li>
          <li><a href="../TerminosCondiciones.html">Términos y condiciones</a></li>
        </ul>
      </div>
      <div class="footer-social">
        <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank"><img src="../iconos/tik-tok.png" alt="TikTok" /></a>
        <a href="https://www.instagram.com" target="_blank"><img src="../iconos/instagram.png" alt="Instagram" /></a>
        <a href="https://www.patreon.com" target="_blank"><img src="../iconos/patreon.png" alt="Patreon" /></a>
        <a href="https://www.youtube.com" target="_blank"><img src="../iconos/youtube.png" alt="YouTube" /></a>
      </div>
    </div>
    <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
  </footer>

  <script>
    function editarInformacion() {
      // Obtener los datos del usuario desde el HTML
      const nombre = document.querySelector('#info-personal p:nth-child(3)').textContent.replace('Nombre Completo: ', '');
      const email = document.querySelector('#info-personal p:nth-child(4)').textContent.replace('Email: ', '');
      const telefono = document.querySelector('#info-personal p:nth-child(5)').textContent.replace('Teléfono: ', '');
      const fechaNacimiento = document.querySelector('#info-personal p:nth-child(7)').textContent.replace('Fecha de Nacimiento: ', '');

      // Rellenar los inputs del formulario con los datos del usuario
      document.getElementById('nombre').value = nombre;
      document.getElementById('email').value = email;
      document.getElementById('telefono').value = telefono;
      document.getElementById('fecha_nacimiento').value = fechaNacimiento;

      // Mostrar el modal
      document.getElementById('editModal').style.display = 'block';
    }

    // Función para cerrar el modal
    function cerrarModal() {
      document.getElementById('editModal').style.display = 'none';
    }

    // Función para enviar los datos del formulario
    function guardarCambios(event) {
      event.preventDefault(); // Evita que el formulario se envíe de forma tradicional

      // Obtener los datos del formulario
      const formData = new FormData(document.getElementById('editForm'));

      // Enviar los datos al servidor usando Fetch API
      fetch('../php/actualizar_usuario.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Información actualizada correctamente.');
            cerrarModal();
          } else {
            alert('Error al actualizar la información: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }

    function configurarPreferencias() {
      // lógica para abrir modal o redirigir a preferencias
      alert("Configurar preferencias");
    }
  </script>

  <!-- Bootstrap JS y dependencias -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>