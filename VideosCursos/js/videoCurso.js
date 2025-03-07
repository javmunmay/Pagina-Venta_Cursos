
//javascript para que se active el boton examen con un 80% del curso completo
document.addEventListener("DOMContentLoaded", function() {
    const cursoVideo = document.getElementById("cursoVideo");
    const examBtn = document.getElementById("examBtn");

    // Variable para almacenar el progreso del curso
    let videoProgress = 0;

    // Verifica el progreso de visualización
    cursoVideo.addEventListener("timeupdate", function() {
        const percent = (cursoVideo.currentTime / cursoVideo.duration) * 100;

        if (percent >= 80 && !examBtn.classList.contains("enabled")) {
            // Habilita el botón cuando se haya visto el 80%
            examBtn.classList.add("enabled");
            examBtn.disabled = false;
            examBtn.classList.remove("disabled");
            examBtn.textContent = "Hacer Examen";
        }
    });

    // Redirecciona al examen
    examBtn.addEventListener("click", function() {
        if (examBtn.classList.contains("enabled")) {
            window.location.href = "examenCurso.html";
        }
    });
});


//JavaScript Mejorado para Control de Progreso
document.addEventListener("DOMContentLoaded", function() {
    const courseItems = document.querySelectorAll(".course-outline li");

    // Cargar progreso guardado
    courseItems.forEach((item, index) => {
        const isCompleted = localStorage.getItem(`courseItem${index}`);
        if (isCompleted === "true") {
            const circle = item.querySelector(".circle");
            circle.classList.add("completed");
            circle.textContent = "✔"; // Muestra tick
        }

        // Evento de clic para marcar como completado
        item.addEventListener("click", function() {
            const circle = item.querySelector(".circle");
            circle.classList.add("completed");
            circle.textContent = "✔";
            localStorage.setItem(`courseItem${index}`, "true");
        });
    });
});


//Verificar si se reproduce automático
document.addEventListener("DOMContentLoaded", function() {
    const cursoVideo = document.getElementById("cursoVideo");
    cursoVideo.muted = true; // Asegura que esté en silencio para permitir autoplay
    cursoVideo.play().then(() => {
        console.log("El vídeo se está reproduciendo automáticamente.");
    }).catch(error => {
        console.log("El navegador bloqueó el autoplay:", error);
    });
});





//Menu desplegable header
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