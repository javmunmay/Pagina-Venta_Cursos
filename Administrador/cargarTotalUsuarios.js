document.addEventListener("DOMContentLoaded", function() {
  const cargarTotalUsuarios = () => {
      let peticion = new XMLHttpRequest();
      peticion.open("POST", "contarUsuarios.php", true);
      peticion.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
              document.getElementById("totalUsuarios").textContent = `Total de usuarios: ${this.responseText}`;
          }
      };
      peticion.send();
  };

  // Llamar a cargarTotalUsuarios al cargar la página
  cargarTotalUsuarios();
  setInterval(cargarTotalUsuarios, 10000); // 10000 ms = 10 segundos
});
