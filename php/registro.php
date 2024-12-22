<?php
// Datos de conexión
$servername = "PMYSQL181.dns-servicio.com:3306";
$username = "Javier";
$password = "u70q0Z2p@";
$dbname = "10718674_estudiante_programador";

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
    $prefijo = isset($_POST['prefijo']) ? $conn->real_escape_string($_POST['prefijo']) : NULL;
    $fecha_nacimiento = $conn->real_escape_string($_POST['fecha_nacimiento']);
    $politica = isset($_POST['politica']) ? 1 : 0; // Captura el valor de la política de privacidad (1 si está marcada, 0 si no)

    // Concatenar el prefijo y el número de teléfono si ambos están presentes
    $numero_telefono = ($prefijo && $telefono) ? $prefijo . ' ' . $telefono : $telefono;

    // Verificar si el correo ya existe en la base de datos usando una consulta preparada
    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirigir con mensaje de error si el correo ya existe
        header("Location: ../InicioSesion/Registrarse.html?error=El correo ya está registrado");
        exit();
    }

    // Insertar en la base de datos, asignando roles predeterminados y política de privacidad
    $sql = "INSERT INTO usuarios (
    nombre, 
    email, 
    password, 
    numero_telefono, 
    fecha_nacimiento, 
    user, 
    admin, 
    profesor, 
    politica_privacidad
) 
VALUES (?, ?, ?, ?, ?, 1, 0, 0, 1)";

    $stmt = $conn->prepare($sql);

    // 'sssssi' = 5 cadenas (s) + 1 entero (i)
// Ajusta la 'i' a 's' si 'politica_privacidad' se almacena como VARCHAR/CHAR en tu BD
    $stmt->bind_param(
        "sssssi",
        $nombre,
        $email,
        $password,
        $numero_telefono,
        $fecha_nacimiento,
        $politica
    );
    if ($stmt->execute()) {
        header("Location: ../InicioSesion/InicioSesion.html?mensaje=registro_exitoso");
    } else {
        echo "Error en el registro: " . $stmt->error;
        
        
    }
} else {
    echo "Todos los campos son obligatorios.";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>