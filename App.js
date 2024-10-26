











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
            const courseLevel = course.getAttribute('data-nivel');
            const courseCategory = course.getAttribute('data-categoria');

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

    // Evento para seleccionar una opción de nivel
    levelSelect.querySelector('.selected-option').addEventListener('click', () => {
        levelSelect.classList.toggle('open');
    });

    levelSelect.querySelector('.options').addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            selectedLevel = e.target.getAttribute('data-value');
            levelSelect.querySelector('.selected-option').textContent = e.target.textContent;
            levelSelect.classList.remove('open');
            applyFilters(); // Aplicar filtros cuando cambia la selección
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
            applyFilters(); // Aplicar filtros cuando cambia la selección
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




/*
// Control del slider para cambiar automáticamente de curso
document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelector('.slides');
    let index = 0;
    setInterval(() => {
        index = (index + 1) % 3; // Ciclo entre 0, 1 y 2 para los tres cursos
        slides.style.transform = `translateX(${-index * 100}%)`;
    }, 5000); // Cambia de curso cada 5 segundos
});*/ 





// Mostrar el popup
document.addEventListener("DOMContentLoaded", function() {
    const popup = document.getElementById('welcome-popup');
    const closeButton = document.getElementById('close-popup');

    // Mostrar el popup cuando se cargue la página
    popup.style.display = 'flex';

    // Cerrar el popup al hacer clic en la "X"
    closeButton.onclick = function() {
        popup.style.display = 'none';
    }

    // Cerrar el popup automáticamente después de 8 segundos
    setTimeout(function() {
        popup.style.display = 'none';
    }, 3000); // 3 segundos
});





  






