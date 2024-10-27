<?php
// Verificar si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuraciones para deshabilitar el caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Verificar si el usuario ha iniciado sesión y si es profesor
if (!isset($_SESSION['user_id']) || $_SESSION['Profesor'] !== 1) {
    header("Location: ../InicioSesion/InicioSesion.html");
    exit();
}

// Conectar a la base de datos para obtener estadísticas
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener el total de usuarios registrados
$sqlUsuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);
$totalUsuarios = ($resultUsuarios->num_rows > 0) ? $resultUsuarios->fetch_assoc()['total_usuarios'] : 0;

// Consulta para obtener los datos completos del profesor
$idProfesor = $_SESSION['user_id'];
$sqlProfesor = "SELECT ID_Profesor, Nombre, Apellido, Email, Telefono, Especializacion, Experiencia, Calificacion, 
Numero_Cursos, Horas_Totales, Salario_Base, Bonificaciones, Fecha_Inicio, Fecha_Renovacion, Estado 
                FROM profesores 
                WHERE ID_Profesor = ?";
$stmt = $conn->prepare($sqlProfesor);
$stmt->bind_param("i", $idProfesor);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $profesor = $result->fetch_assoc();
} else {
    $profesor = [
        "ID_Profesor" => "No disponible",
        "Nombre" => "No disponible",
        "Apellido" => "No disponible",
        "Email" => "No disponible",
        "Telefono" => "No disponible",
        "Especializacion" => "No disponible",
        "Experiencia" => "No disponible",
        "Calificacion" => "No disponible",
        "Numero_Cursos" => "No disponible",
        "Horas_Totales" => "No disponible",
        "Salario_Base" => "No disponible",
        "Bonificaciones" => "No disponible",
        "Fecha_Inicio" => "No disponible",
        "Fecha_Renovacion" => "No disponible",
        "Estado" => "No disponible"
    ];
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel Profesores | Estudiante Programador</title>
    <link rel="stylesheet" href="../css/Admin.css" />
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
    <script src="../App.js?v=1.0"></script>
</head>
<body>
    <header>
      <nav>
        <img src="../imagenes/LogoFondoAzul.jpg" alt="Logo Estudiante Programador" class="logo" />
        <ul class="nav-links">
          <li><a href="Profesores.php">Inicio</a></li>
          <li><a href="#">Registro de Usuarios</a></li>
          <li><a href="#">Mis Certificados</a></li>
          <li>
            <div class="cerrarSesion">
              <a href="../php/logout.php">Cerrar Sesión</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>

    <main>
      <div id="welcome-popup" class="welcome-popup">
        <div class="popup-content">
          <span id="close-popup" class="close">&times;</span>
          <h2>Has accedido como Profesor</h2>
          <p>Para salir pulse <b>"Cerrar Sesión"</b></p>
        </div>
      </div>

      <section class="hero-banner">
        <div class="banner-content">
          <h1>Panel del <br />Profesor <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
          <h3 id="totalUsuarios">Total de usuarios: <?php echo $totalUsuarios; ?></h3>
        </div>
        <div class="progreso-usuario">
          <h3>Estado del profesor en la plataforma:</h3>
          <h3 style="color: <?php echo ($profesor['Estado'] === 'Activo') ? 'green' : 'red'; ?>">
            <?php echo htmlspecialchars($profesor['Estado']); ?>
          </h3>

        </div>
      </section>

      <section class="hero-banner">
        <div class="banner-content">
          <h2>Profesor Especializado en <br /><?php echo htmlspecialchars($profesor['Especializacion']); ?></h2>
          <h3><u>Información Personal:</u></h3>
          <h4>Nombre: <?php echo htmlspecialchars($profesor['Nombre']); ?></h4>
          <h4>Apellidos: <?php echo htmlspecialchars($profesor['Apellido']); ?></h4>
          <h4>Email: <?php echo htmlspecialchars($profesor['Email']); ?></h4>
          <h4>Teléfono de contacto: <?php echo htmlspecialchars($profesor['Telefono']); ?></h4>
          <h4>Especialización: <?php echo htmlspecialchars($profesor['Especializacion']); ?></h4>
          <h4>Experiencia: <?php echo htmlspecialchars($profesor['Experiencia']); ?> años</h4>
          <h4>Calificación: <?php echo htmlspecialchars($profesor['Calificacion']); ?> / 10</h4>
          <h4>Salario Base: <?php echo htmlspecialchars($profesor['Salario_Base']); ?>€ / mes</h4>
          <h4>Bonificaciones: <?php echo htmlspecialchars($profesor['Bonificaciones']); ?>€ / mes</h4>
          <h4>Fecha de incorporación: <?php echo htmlspecialchars($profesor['Fecha_Inicio']); ?></h4>
          <h4>Fecha de renovación: <?php echo htmlspecialchars($profesor['Fecha_Renovacion']); ?></h4>
          <h4>Estado: <?php echo htmlspecialchars($profesor['Estado']); ?></h4>
        </div>
      </section>

      <section class="hero-banner">
        <div class="progreso-usuario">
          <h3>Número de cursos:</h3>
          <h3><?php echo htmlspecialchars($profesor['Numero_Cursos']); ?></h3>
        </div>
        <div class="progreso-usuario">
          <h3>Horas totales de tus cursos:</h3>
          <h3><?php echo htmlspecialchars($profesor['Horas_Totales']); ?> horas</h3>
        </div>
        <div class="progreso-usuario">
          <h3>Renueva con nosotros el:</h3>
          <h3><?php echo htmlspecialchars($profesor['Fecha_Renovacion']); ?></h3>
        </div>
        <div class="progreso-usuario">
          <h3>Su ID es el:</h3>
          <h3><?php echo htmlspecialchars($profesor['ID_Profesor']); ?></h3>
        </div>
      </section>
    </main>

    <footer>
      <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
    </footer>

    <script>
      // Evitar retroceder con la flecha de atrás
      window.onload = function() {
          history.pushState(null, null, location.href);
          window.onpopstate = function() {
              history.go(1);
          };
      };
    </script>
</body>
</html>
