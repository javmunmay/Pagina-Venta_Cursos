// JavaScript para ocultar el logo después de la animación
window.onload = function () {
    setTimeout(function () {
        document.querySelector('.logo-container-animacion').style.display = 'none'; // Oculta el logo
    }, 3000); // El tiempo en milisegundos (3000ms = 3 segundos)
};


document.addEventListener("DOMContentLoaded", function () {
    // Esperar 3 segundos (el tiempo de la animación de entrada) y luego iniciar la salida
    setTimeout(function () {
        const overlay = document.querySelector('.overlay');
        const logoContainer = document.querySelector('.logo-container-animacion');

        // Aplicar la animación de salida al fondo oscuro y al logo
        if (overlay && logoContainer) {
            overlay.classList.add('fade-out');
            logoContainer.classList.add('fade-out');

            // Eliminar los elementos del DOM después de que termine la animación
            setTimeout(function () {
                overlay.remove();
                logoContainer.remove();
            }, 1000); // 1000 ms = 1 segundo (duración de la animación de salida)
        }
    }, 3000); // 3000 ms = 3 segundos (tiempo de la animación de entrada)
});




document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const navLinks = document.querySelector(".nav-links");

    // Alternar el menú al hacer clic en el botón
    menuToggle.addEventListener("click", function (e) {
        e.stopPropagation(); // Evitar que el clic se propague al documento
        navLinks.classList.toggle("show");
    });

    // Cerrar el menú al hacer clic fuera de él
    document.addEventListener("click", function (e) {
        if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
            navLinks.classList.remove("show");
        }
    });

    // Cerrar el menú al hacer clic en un enlace
    navLinks.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", () => {
            navLinks.classList.remove("show");
        });
    });
});