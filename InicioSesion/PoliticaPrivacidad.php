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

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Política de Privacidad | Estudiante Programador</title>
    <link rel="stylesheet" href="../css/politicaPrivacidad.css" />
    <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
    <script src="../js/App.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="../css/politicaPrivacidad.css?v=1.0">





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
        <!-- Sección de Política de Privacidad -->
        <section class="hero">
            <h1>Política de Privacidad</h1>
            <p>
                En Estudiante Programador, valoramos y protegemos tu privacidad.
                Nos tomamos muy en serio la protección de tus datos personales,
                por lo que esta política de privacidad detalla cómo recopilamos,
                utilizamos y resguardamos tu información cuando accedes a nuestros
                servicios a través de nuestra plataforma.
            </p>
        </section>

        <section class="privacy-content">
            <div class="container">
                <h2>Información que recopilamos</h2>
                <p>
                    Recopilamos información personal cuando te registras en nuestra
                    plataforma, te suscribes a un plan o interactúas con nuestros
                    contenidos, como nombre, correo electrónico y detalles de pago.
                </p>

                <h2>Uso de la información</h2>
                <p>
                    Utilizamos la información para mejorar nuestros servicios, gestionar
                    tu cuenta y personalizar tu experiencia en la plataforma. Tus datos
                    no serán compartidos con terceros sin tu consentimiento.
                </p>

                <h2>Protección de datos</h2>
                <p>
                    Implementamos medidas de seguridad para proteger tu información
                    personal. Sin embargo, ninguna transmisión de datos por Internet es
                    completamente segura, por lo que no podemos garantizar la seguridad
                    absoluta de tus datos.
                </p>

                <h2>Sus derechos</h2>
                <p>
                    Tienes derecho a acceder, rectificar o eliminar sus datos
                    personales. Si deseas ejercer alguno de estos derechos, por favor
                    contáctanos.
                </p>

                <h2>Retención de Datos</h2>
                <p>
                    Retenemos su información personal durante el tiempo que sea necesario para proporcionar
                    los servicios, cumplir con nuestras obligaciones legales, resolver disputas y hacer
                    cumplir nuestros acuerdos.
                </p>

                <h2>Cookies y Tecnologías Similares</h2>
                <p>
                    Nuestra web puede utilizar cookies y tecnologías similares para mejorar
                    la funcionalidad del sitio, analizar el uso del servicio y personalizar la
                    experiencia del usuario. Puede controlar el uso de cookies a través de la
                    configuración de su navegador.
                </p>

                <h2>Enlaces a Otros Sitios</h2>
                <p>
                    Nuestra web puede contener enlaces a otros sitios que no son operados por nosotros.
                    No tenemos control sobre el contenido y las prácticas de privacidad de estos sitios
                    y no somos responsables de ellos.
                </p>

                <h2>Cambios en la política</h2>
                <p>
                    Nos reservamos el derecho de actualizar esta política de privacidad en cualquier momento.
                    Cualquier cambio será publicado en esta página y, si los cambios son significativos,
                    proporcionaremos una notificación más prominente.
                </p>

                <h2>Contacto</h2>
                <p>
                    Si tiene alguna pregunta sobre nuestra Política de privacidad, por favor contáctenos a través de
                    Ayuda/Soporte en nuestra web, por correo: info@estudianteprogramador.com o a traves de nuestro formulário de
                    contacto: <a href="ContactoSesionIniciada.php">Necesito Ayuda</a>.
                    Estamos aquí para ayudarte en cada paso del camino. No dude en ponerse en contacto con nosotros si necesita
                    asistencia adicional.
                </p>
                <h3>Gracias por utilizar nuestra plataforma y suscribirse a nuestros servicios.</h3>

                <section class="redes-sociales">
                    <h2>Síguenos en nuestras redes</h2>
                    <a href="https://www.tiktok.com/@estudianteprogramador" target="_blank" rel="noopener noreferrer"><img
                            src="../iconos/tik-tok.png" alt="TikTok" /></a>
                    <a href="https://www.instagram.com/estudianteprogramador/" target="_blank" rel="noopener noreferrer"><img src="../iconos/instagram.png" alt="Instagram" /></a>
                    <a href="https://www.patreon.com/c/EstudianteProgramador?utm_medium=clipboard_copy&utm_source=copyLink&utm_campaign=creatorshare_fan&utm_content=join_link" target="_blank" rel="noopener noreferrer"><img src="../iconos/patreon.png" alt="Patreon" /></a>
                    <a href="https://www.youtube.com/@ElEstudianteProgramador" target="_blank" rel="noopener noreferrer"><img src="../iconos/youtube.png" alt="YouTube" /></a>
                </section>

            </div>
        </section>
        <!-- Sección de CTA Final -->

    </main>

    <footer>
        <p>© 2025 Estudiante Programador - Todos los derechos reservados.</p>
    </footer>
</body>

</html>