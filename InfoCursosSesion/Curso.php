<?php
// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: InicioSesion.html");
    exit();
}

// Configuración de la base de datos
$host = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";

// Conectar a la base de datos
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del curso desde la URL
$cursoId = $_GET['id'] ?? null;

// Consultar la información del curso en la base de datos
if ($cursoId) {
    $sql = "SELECT * FROM cursos WHERE id_curso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cursoId);
    $stmt->execute();
    $result = $stmt->get_result();
    $curso = $result->fetch_assoc();
    $stmt->close();
    
    if (!$curso) {
        echo "Curso no encontrado.";
        exit();
    }
} else {
    echo "ID de curso no especificado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($curso["titulo"]); ?></title>
    <link rel="stylesheet" href="../css/InformacionCursos.css">
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico">
</head>
<body>

<header>
    <nav>
        <img src="../imagenes/LogoFondoAzul.jpg" alt="Logo Estudiante Programador" class="logo">
        <ul class="nav-links">
            <li><a href="../Inicio.html">Inicio</a></li>
            <li><a href="../ContenidoPrincipal/Cursos.html">Cursos</a></li>
            <li><a href="../ContenidoPrincipal/Planes.html">Planes</a></li>
            <li><a href="../ContenidoPrincipal/SobreNosotros.html">Sobre Nosotros</a></li>
            <li><a href="../ContenidoPrincipal/Contacto.html">Contacto</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="main-content">
        <section class="curso-info">
            <h1><?php echo htmlspecialchars($curso["titulo"]); ?></h1>
            <p><?php echo htmlspecialchars($curso["descripcion"]); ?></p>
            <div class="info-extra">
                <p><?php echo htmlspecialchars($curso["alumnos_inscritos"]); ?>+ Alumnos matriculados ⭐ <?php echo htmlspecialchars($curso["valoracion"]); ?>/5</p>
            </div>

            <a class="btn-solicitar" href="../VideosCursos/CursoHtml/VideoCursos.php">Comenzar</a>

            <section class="contenido-curso">
                <h2>Contenido del Curso</h2>
                <p>Duración total: <?php echo htmlspecialchars($curso["duracion"]); ?> horas</p>
                
                <?php
                // Decodificar el contenido del curso almacenado en JSON
                $contenido = json_decode($curso["contenido"], true);
                if (!empty($contenido)) {
                    echo "<ul>";
                    foreach ($contenido as $seccion) {
                        echo "<li>" . htmlspecialchars($seccion["tema"]) . " - " . htmlspecialchars($seccion["duracion"]) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No hay contenido disponible.</p>";
                }
                ?>
            </section>
        </section>
        
        <aside class="informacion-lateral">
            <section class="banner">
                <img src="<?php echo htmlspecialchars($curso["imagen"]); ?>" alt="Banner Curso" style="max-width: 300px;">
            </section>
            <div class="habilidades">
                <h3>Habilidades que obtendrás</h3>
                
                <?php
                // Decodificar las habilidades almacenadas en JSON
                $habilidades = json_decode($curso["habilidades"], true);
                if (!empty($habilidades)) {
                    echo "<ul>";
                    foreach ($habilidades as $habilidad) {
                        echo "<li>" . htmlspecialchars($habilidad) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No se especificaron habilidades.</p>";
                }
                ?>
            </div>

            <div class="requisitos">
                <h3>Requisitos Mínimos</h3>
                <p><?php echo htmlspecialchars($curso["requisitos"]); ?></p>
            </div>
        </aside>
    </div>
</main>

<footer>
    <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
</footer>

</body>
</html>
