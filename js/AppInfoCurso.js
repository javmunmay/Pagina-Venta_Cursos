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