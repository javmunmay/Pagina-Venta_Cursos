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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de HTML desde Cero</title>
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

<!-- Contenido principal -->
<main>
    <div class="main-content">
        <section class="curso-info">
            <h1>Curso de HTML desde Cero: Introducción</h1>
            <p>Este curso te enseñará los fundamentos de HTML, el lenguaje de marcado estándar para crear páginas web. Aprende cómo estructurar el contenido en la web y crea tus propios proyectos desde cero.</p>
            <div class="info-extra">
                <p>1800+ Alumnos matriculados ⭐ 4.7/5 (1050 valoraciones)</p>
            </div>

            <a class="btn-solicitar" href="../VideosCursos/CursoHtml/VideoCursos.php">Comenzar</a>

            <section class="contenido-curso">
                <h2>Contenido del Curso</h2>
                <p>5 Secciones - 45 Lecciones - 6h en total</p>
                <ul>
                    <li>Introducción a HTML y su historia - 30 min</li>
                    <li>Etiquetas y Estructura básica de una página - 1h</li>
                    <li>Listas, enlaces e imágenes - 1h 20 min</li>
                    <li>Formularios y Tablas - 1h 15 min</li>
                    <li>Proyectos prácticos: Crear tu primer sitio web - 1h 55 min</li>
                </ul>
            </section>
        </section>
        
        <!-- Información lateral -->
        <aside class="informacion-lateral">
            <section class="banner">
                <img src="../imagenes/CursoHtmlBanner.jpg" alt="Banner Curso HTML">
            </section>
            <div class="habilidades">
                <h3>Habilidades que obtendrás</h3>
                <ul>
                    <li>Comprender la estructura básica de HTML</li>
                    <li>Crear y enlazar páginas web</li>
                    <li>Diseñar formularios y tablas en HTML</li>
                    <li>Añadir imágenes y otros medios a tus proyectos</li>
                    <li>Desarrollar proyectos web básicos</li>
                </ul>
            </div>

            <div class="requisitos">
                <h3>Requisitos Mínimos</h3>
                <p>No se requieren conocimientos previos de programación. Este curso es ideal para principiantes que desean aprender a crear sitios web desde cero con HTML.</p>
            </div>
        </aside>
    </div>
</main>

<footer>
    <p>© 2024 Estudiante Programador - Todos los derechos reservados.</p>
</footer>

</body>
</html>