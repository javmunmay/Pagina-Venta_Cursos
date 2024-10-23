
document.addEventListener("DOMContentLoaded", function () {
    // Seleccionamos el input de búsqueda y la lista de cursos
    const searchBar = document.getElementById('buscador');
    const courses = document.querySelectorAll('.curso');

    // Añadimos un evento para cuando el usuario escribe en el campo de búsqueda
    searchBar.addEventListener('keyup', function (e) {
        const searchString = e.target.value.toLowerCase();

        // Filtramos los cursos que coincidan con el texto
        courses.forEach(course => {
            const courseTitle = course.querySelector('h3').textContent.toLowerCase();
            if (courseTitle.includes(searchString)) {
                course.style.display = 'block'; // Mostrar si coincide
            } else {
                course.style.display = 'none'; // Ocultar si no coincide
            }
        });
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






  






