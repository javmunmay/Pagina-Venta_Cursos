<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: InicioSesion.php");
    exit();
}

// Conectar a la base de datos
include '../php/conexion.php';

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Consulta para obtener los certificados del usuario
$sql = "SELECT * FROM certificados WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Certificados | Estudiante Programador</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../css/cssinfoPersonal.css">
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico">
</head>

<body>
    <header>
        <nav>
            <img
                src="../imagenes/LogoFondoAzul.jpg"
                alt="Logo Estudiante Programador"
                class="logo" />
            <ul class="nav-links">
                <li><a href="MiAcademia.php">Inicio</a></li>
                <li class="dropdown">
                    <a href="#">Mi Perfil</a>
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

    <!-- Contenido Principal -->
    <main class="container my-5">
        <h1 class="text-center mb-4" style="font-weight: bold; color: #090643;">Mis Certificados</h1>

        <!-- Listado de Certificados -->
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($certificado = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($certificado['nombre_curso']); ?></h5>
                                <p class="card-text">
                                    <strong>Fecha de Emisión:</strong> <?php echo htmlspecialchars($certificado['fecha_emision']); ?>
                                </p>
                                <p class="card-text">
                                    <strong>Código del Certificado:</strong> <?php echo htmlspecialchars($certificado['codigo']); ?>
                                </p>
                                <a href="../certificados/<?php echo htmlspecialchars($certificado['archivo']); ?>" class="btn btn-primary" target="_blank">
                                    Ver Certificado
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info" role="alert" style="font-weight: bold; color: #090643; background-color: #03fa6e;">
                        No tienes certificados registrados.
                    </div>
                </div>

                <section class="hero-banner bg-light p-5 mb-4">
                    <div class="container">
                        <div class="row align-items-center"> <!-- Fila para organizar el contenido -->
                            <!-- Columna izquierda (Título y botones) -->
                            <div class="col-md-7">
                                <h1>
                                    <span style="font-weight: bold; color: #090643;">
                                    Comienza uno de nuestros cursos
                                    </span>
                                    
                                    <p class="lead" style="font-weight: bold; color: rgb(119, 119, 119);">
                                        Desarrolla tus habilidades al siguiente nivel.
                                    </p>
                                </h1>
                                <div class="mt-3">
                                    <a href="CursosDentroSesion.php" class="btn btn-primary btn-lg me-3" style="background-color: #090643; border-color: #090643;">
                                        Todos los cursos
                                    </a>
                                </div>
                            </div>

                            <!-- Columna derecha (Texto y botón) -->
                            <div class="col-md-5 text-center">
                                <h2 style="font-weight: bold; color: #090643;">+40 Cursos</h2>
                                <p style="font-weight: bold; color: rgb(119, 119, 119);">
                                    Completa lecciones y finaliza los cursos para subir tu
                                    nivel formativo y obtener certificados que validen lo aprendido.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </section>

            <?php endif; ?>
        </div>







    </main>

    <footer>
        <p>© 2025 Estudiante Programador - Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>