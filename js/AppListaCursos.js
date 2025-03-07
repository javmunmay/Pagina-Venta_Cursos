

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




document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById('buscador');
    const levelSelect = document.getElementById('nivel-select');
    const categorySelect = document.getElementById('categoria-select');
    const courses = document.querySelectorAll('.curso');

    let selectedLevel = "";
    let selectedCategory = "";

    // Función para aplicar los filtros
    function applyFilters() {
        const searchString = searchBar.value.toLowerCase();

        courses.forEach(course => {
            const courseTitle = course.querySelector('h3').textContent.toLowerCase();
            const courseLevel = course.getAttribute('data-nivel') || "";
            const courseCategory = course.getAttribute('data-categoria') || "";

            const matchesSearch = courseTitle.includes(searchString);
            const matchesLevel = selectedLevel === "" || courseLevel === selectedLevel;
            const matchesCategory = selectedCategory === "" || courseCategory === selectedCategory;

            if (matchesSearch && matchesLevel && matchesCategory) {
                course.style.display = 'block';
            } else {
                course.style.display = 'none';
            }
        });
    }

    // Evento para el buscador
    searchBar.addEventListener('input', () => {
        applyFilters();
    });

    // Evento para seleccionar una opción de nivel
    levelSelect.querySelector('.selected-option').addEventListener('click', () => {
        levelSelect.classList.toggle('open');
    });

    levelSelect.querySelector('.options').addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            selectedLevel = e.target.getAttribute('data-value');
            levelSelect.querySelector('.selected-option').textContent = e.target.textContent;
            levelSelect.classList.remove('open');
            applyFilters();
        }
    });

    // Evento para seleccionar una opción de categoría
    categorySelect.querySelector('.selected-option').addEventListener('click', () => {
        categorySelect.classList.toggle('open');
    });

    categorySelect.querySelector('.options').addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            selectedCategory = e.target.getAttribute('data-value');
            categorySelect.querySelector('.selected-option').textContent = e.target.textContent;
            categorySelect.classList.remove('open');
            applyFilters();
        }
    });

    // Cerrar el menú si se hace clic fuera
    document.addEventListener('click', (e) => {
        if (!levelSelect.contains(e.target)) {
            levelSelect.classList.remove('open');
        }
        if (!categorySelect.contains(e.target)) {
            categorySelect.classList.remove('open');
        }
    });
});