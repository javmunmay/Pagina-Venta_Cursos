<?php
session_start();

// Datos de la conexión a la base de datos
$host = "localhost";  // Para XAMPP o servidores locales
$dbname = "estudiante_programador";  // Nombre de la base de datos
$username = "root";  // Nombre de usuario de MySQL, generalmente 'root' en XAMPP
$password = "";  // Contraseña, normalmente vacía para 'root' en XAMPP

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prevenir inyecciones SQL
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Buscar el usuario por email
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if ($password == $user['password']) {  // Comparación simple, mejor usar password_hash() y password_verify()
            // Login exitoso
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];  // Guarda el nombre en la sesión
            
            // Redirigir a MiAcademia.html con el nombre en la URL
            header("Location: ../InicioSesion/MiAcademia.html?nombre=" . urlencode($user['nombre']));
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../InicioSesion/InicioSesion.html?error=Contraseña incorrecta.");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../InicioSesion/InicioSesion.html?error=Usuario no encontrado.");
        exit();
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
}
?>
