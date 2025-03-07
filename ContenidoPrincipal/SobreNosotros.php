<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros | Estudiante Programador</title>
    <link rel="stylesheet" href="../css/sobreNosotros.css">
    <link rel="stylesheet" href="../css/SobreNosotros.css?v=1.0" />
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">




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
        <!-- Sección de bienvenida mejorada -->
        <section class="hero">
            <h1>Conoce a Estudiante Programador</h1>
            <p>Tu plataforma para aprender desarrollo web con un enfoque práctico y una comunidad vibrante.</p>
        </section>

        <!-- Sección sobre valores -->
        <section class="about">
            <h2>Nuestros Valores</h2>
            <div class="values-container">
                <div class="value-item">
                    <img src="../imagenes/Innovacion.jpg" alt="Innovación">
                    <h3>Innovación</h3>
                    <p>Estamos en la vanguardia de la tecnología, ofreciendo contenido actualizado y adaptado a las
                        necesidades del mercado.</p>
                </div>
                <div class="value-item">
                    <img src="../imagenes/Compromiso.jpg" alt="Compromiso">
                    <h3>Compromiso</h3>
                    <p>Apoyamos el crecimiento profesional de nuestros estudiantes con recursos y asistencia
                        personalizada.</p>
                </div>
                <div class="value-item">
                    <img src="../imagenes/Calidad.jpg" alt="Calidad">
                    <h3>Calidad</h3>
                    <p>Nuestros cursos están creados y revisados por expertos para garantizar conocimientos relevantes y
                        útiles.</p>
                </div>
            </div>

            <h2>+5.200 Seguidores en TikTok</h2>

            <div class="values-container">
                <div class="value-item-BannerTiktok">
                    <!-- Imagen de estadísticas -->
                    <img src="../imagenes/estadisticasTikTok.jpg"
                        alt="Estadísticas de redes sociales"
                        class="stats-image" />

                    <!-- Texto descriptivo -->
                    <p>
                        Hemos ayudado a más de 300.000 personas a mejorar sus conocimientos cada día gracias a las redes
                        sociales, nos mantenemos actualizados y ofrecemos cursos de alta calidad a quien necesite aprender algo
                        nuevo, repasar conceptos, mejorar su currículum o simplemente tenga interés en la tecnología.
                    </p>
                </div>
            </div>

            


            <!-- Nueva presentación del equipo con efectos de tarjeta -->
            <h2>Nuestro Equipo</h2>
            <div class="team-container">
                <div class="team-member">
                    <img src="../imagenes/JaviFotoPerfil.jpg" alt="Javier Muñoz">
                    <h3>Javier Muñoz</h3>
                    <p>CEO Estudiante Programador y Desarrollador Web Full Stack</p>
                </div>
                <!--
                <div class="team-member">
                    <img src="../imagenes/joven2.jpg" alt="Leandro Ligero">
                    <h3>Leandro Ligero</h3>
                    <p>Desarrollador Web Full Stack experto en Backend</p>
                </div>
                <div class="team-member">
                    <img src="../imagenes/joven2.jpg" alt="Manuel del Cuvillo">
                    <h3>Manuel del Cuvillo</h3>
                    <p>Experto en Inteligencia Artificial y Desarrollador Web Full Stack</p>
                </div>
                <div class="team-member">
                    <img src="../imagenes/joven3.jpg" alt="Laura García">
                    <h3>Marcos Ligero</h3>
                    <p>Experto en Ciberseguridad y Hacking Ético</p>
                </div> -->
            </div>
        </section>

        <!-- Sección de CTA final -->
        <section class="cta-final">
            <h2>¡Únete hoy a nuestra comunidad!</h2>
            <p>Desarrolla tus habilidades con nuestros cursos de alta calidad y el apoyo de una comunidad activa.</p>
            <a href="Cursos.php" class="cta-btn-final">Comenzar</a>
        </section>
    </main>




    <?php include '../php/footer.php'; ?>
    <script src="../js/AppInfoCurso.js"></script>
</body>

</html>