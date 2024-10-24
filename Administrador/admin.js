// Codigo mediante Ajax para recibir información de los usuarios registrados en la plataforma y CRUD Admin

let peticion;

class pAJAX {
  constructor() {
    this.p = new XMLHttpRequest();
  }

  // Defino el método:
  peticion(url, metodo, fRes = null, param = "") {
    metodo = metodo.toUpperCase();
    // Hago una copia (por referencia) del atributo p, para hacerlo público en todo el método:
    var p = this.p;

    if (fRes != null) {
      this.p.onreadystatechange = function() {
        if ((this.readyState == 4) && (this.status == 200)) {
          fRes(this.responseText);
        }
      };
    }

    if (metodo == "GET") {
      if (param.trim().length > 0) {
        url += "?" + param;
      }
      this.p.open(metodo, url);
      this.p.send(null);
    }

    if (metodo == "POST") {
      this.p.open(metodo, url);
      this.p.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      this.p.send(param);
    }
  }
}

window.onload = () => {
  peticion = new pAJAX();

  cargarUsuarios("servidor.php");

  // Asignar eventos a los botones de agregar y cancelar
  document.getElementById("btNuevaPersona").onclick = mostrarFormulario;
  document.getElementById("btCancelar").onclick = ocultarFormulario;
  document.getElementById("btAnade").onclick = annadirUsuario;
};



// Función para cargar la lista de usuarios
const cargarUsuarios = (url) => {
  let pintar = { servicio: "listar" };
  peticion.peticion(url, "POST", pintaUsuarios, JSON.stringify(pintar));
};

// Función para pintar la tabla de usuarios
const pintaUsuarios = (response) => {
  let resp = JSON.parse(response);
  llenarTabla(resp);
};

// Función para llenar la tabla con los usuarios
function llenarTabla(usuarios) {
  let cuerpoUsuarios = document.getElementById("filas_tabla");
  cuerpoUsuarios.innerHTML = ""; // Limpiar contenido previo

  // Iterar sobre cada usuario y crear filas en la tabla
  usuarios.forEach((usuario) => {
    let fila = document.createElement("tr");

    // Crear celdas con la información del usuario
    let celdaID = document.createElement("td");
    celdaID.textContent = usuario.id;

    let celdaNombre = document.createElement("td");
    celdaNombre.textContent = usuario.nombre;

    let celdaEmail = document.createElement("td");
    celdaEmail.textContent = usuario.email;

    let celdaTelefono = document.createElement("td");
    celdaTelefono.textContent = usuario.numero_telefono;

    let celdaNacimiento = document.createElement("td");
    celdaNacimiento.textContent = usuario.fecha_nacimiento;

    let celdaUser = document.createElement("td");
    // Convertir el valor de usuario.User en número o booleano
    celdaUser.textContent = parseInt(usuario.User) ? "Sí" : "No";

    let celdaAdmin = document.createElement("td");
    // Convertir el valor de usuario.Admin en número o booleano
    celdaAdmin.textContent = parseInt(usuario.Admin) ? "Sí" : "No";

    // Agregar celdas a la fila
    fila.appendChild(celdaID);
    fila.appendChild(celdaNombre);
    fila.appendChild(celdaEmail);
    fila.appendChild(celdaTelefono);
    fila.appendChild(celdaNacimiento);
    fila.appendChild(celdaUser);
    fila.appendChild(celdaAdmin);

    // Crear una celda para el botón de "Borrar"
    let celdaBorrar = document.createElement("td");
    var btnBorrar = document.createElement("button");
    btnBorrar.innerHTML = "Borrar";
    btnBorrar.classList.add("btnBorrar");
    btnBorrar.onclick = () => borrarUsuario(usuario.id);
    celdaBorrar.appendChild(btnBorrar);

    // Crear una celda para el botón de "Editar"
    let celdaEditar = document.createElement("td");
    var btModificar = document.createElement("button");
    btModificar.innerHTML = "Editar";
    btModificar.classList.add("btModificar");
    btModificar.onclick = () => modificarUsuario(usuario);
    celdaEditar.appendChild(btModificar);

    // Agregar las celdas de botones a la fila
    fila.appendChild(celdaBorrar);
    fila.appendChild(celdaEditar);

    // Agregar la fila al cuerpo de la tabla
    cuerpoUsuarios.appendChild(fila);
  });
}

// Función para añadir un nuevo usuario
function annadirUsuario() {
  var nombre = document.getElementById("nombre").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var telefono = document.getElementById("numero_telefono").value;
  var fechaNacimiento = document.getElementById("fecha_nacimiento").value;
  var user = document.getElementById("user").checked ? true : false;
  var admin = document.getElementById("admin").checked ? true : false;

  if (!user && !admin) {
    alert("Por favor selecciona un tipo de usuario (Usuario o Administrador)");
    return;
  }

  var usuario = {
    servicio: "insertar",
    nombre: nombre,
    email: email,
    password: password,
    numero_telefono: telefono,
    fecha_nacimiento: fechaNacimiento,
    User: user,
    Admin: admin
  };


  var datosJSON = JSON.stringify(usuario);
  peticion.peticion(
    "servidor.php",
    "POST",
    (datos) => {
      cargarUsuarios("servidor.php"); // Recargar la tabla
      ocultarFormulario();
    },
    datosJSON
  );
}

// Función para mostrar el formulario de agregar
function mostrarFormulario() {
  document.getElementById("formPersonas").style.visibility = "visible";
}

// Función para ocultar el formulario de agregar
function ocultarFormulario() {
  document.getElementById("formPersonas").style.visibility = "hidden";
}

// Función para modificar un usuario
let idSeleccionado = null; // Variable para guardar el ID del usuario a modificar

function modificarUsuario(usuario) {
  idSeleccionado = usuario.id;
  mostrarFormularioMOD();

  document.getElementById("nombreMOD").value = usuario.nombre;
  document.getElementById("emailMOD").value = usuario.email;
  document.getElementById("numero_telefonoMOD").value = usuario.numero_telefono;
  document.getElementById("fecha_nacimientoMOD").value = usuario.fecha_nacimiento;
  document.getElementById("userMOD").checked = usuario.User;
  document.getElementById("adminMOD").checked = usuario.Admin;

  // Configurar el botón "Modificar" para actualizar los datos
  document.getElementById("btModificar").onclick = actualizarUsuario;
}

// Función para actualizar un usuario
function actualizarUsuario() {
  var nombre = document.getElementById("nombreMOD").value;
  var email = document.getElementById("emailMOD").value;
  var telefono = document.getElementById("numero_telefonoMOD").value;
  var fechaNacimiento = document.getElementById("fecha_nacimientoMOD").value;
  var user = document.getElementById("userMOD").checked ? true : false;
  var admin = document.getElementById("adminMOD").checked ? true : false;

  if (!user && !admin) {
    alert("Por favor selecciona un tipo de usuario (Usuario o Administrador)");
    return;
  }

  var usuarioModificado = {
    servicio: "modificar",
    id: idSeleccionado,
    nombre: nombre,
    email: email,
    numero_telefono: telefono,
    fecha_nacimiento: fechaNacimiento,
    User: user,
    Admin: admin
  };

  var datosJSON = JSON.stringify(usuarioModificado);

  peticion.peticion(
    "servidor.php",
    "POST",
    (datos) => {
      cargarUsuarios("servidor.php"); // Recargar la tabla
      ocultarFormularioMOD();
    },
    datosJSON
  );
}

// Función para mostrar el formulario de modificación
function mostrarFormularioMOD() {
  document.getElementById("formPersonasMOD").style.visibility = "visible";
}

// Función para ocultar el formulario de modificación
function ocultarFormularioMOD() {
  document.getElementById("formPersonasMOD").style.visibility = "hidden";
}

// Función para borrar un usuario
function borrarUsuario(id) {
  if (confirm("¿Está seguro que quiere eliminar a este usuario?")) {
    var usuarioBorrar = {
      servicio: "borrar",
      id: id
    };

    var datosJSON = JSON.stringify(usuarioBorrar);

    peticion.peticion(
      "servidor.php",
      "POST",
      (datos) => {
        cargarUsuarios("servidor.php"); // Recargar la tabla
      },
      datosJSON
    );
  }
}
