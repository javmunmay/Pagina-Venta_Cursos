<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estudiante_programador";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos requeridos están en POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm'], $_POST['fecha_nacimiento'], $_POST['politica'])) {

    // Verificar que las contraseñas coincidan
    if ($_POST['password'] !== $_POST['passwordConfirm']) {
        // Redirigir a la página de registro con un mensaje de error
        header("Location: ../InicioSesion/Registrarse.html?error=Las contraseñas no coinciden");
        exit();
    }


    
    // Recibir y sanitizar los datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $telefono = isset($_POST['telefono']) ? $conn->real_escape_string($_POST['telefono']) : NULL;
    $fecha_nacimiento = $conn->real_escape_string($_POST['fecha_nacimiento']);



    // Verificar si el correo ya existe en la base de datos
    $sql = "SELECT id FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirigir con mensaje de error si el correo ya existe
        header("Location: ../InicioSesion/Registrarse.html?error=El correo ya está registrado");
        exit();
    }


    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password, numero_telefono, fecha_nacimiento) 
            VALUES ('$nombre', '$email', '$password', '$telefono', '$fecha_nacimiento')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../InicioSesion/InicioSesion.html?mensaje=registro_exitoso");
    } else {
        echo "Error en el registro: " . $conn->error;
    }
} else {
    echo "Todos los campos son obligatorios.";
}

// Cerrar conexión
$conn->close();
?>
