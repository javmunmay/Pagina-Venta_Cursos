
// JavaScript para ocultar el logo después de la animación
window.onload = function() {
    setTimeout(function() {
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
    }, 5000); // 5 segundos
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
  


