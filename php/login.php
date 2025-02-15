<?php
session_start();

// Datos de la conexión a la base de datos
$host = "PMYSQL181.dns-servicio.com:3306";  // Para XAMPP o servidores locales
$dbname = "10718674_estudiante_programador";  // Nombre de la base de datos
$username = "Javier";  // Nombre de usuario de MySQL, generalmente 'root' en XAMPP
$password = "u70q0Z2p@";  // Contraseña, normalmente vacía para 'root' en XAMPP

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

    // Buscar el usuario por email
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $user = $result->fetch_assoc();
        $hashed_password = $user['password']; // Contraseña cifrada o sin cifrar en la base de datos

        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Login exitoso con contraseña cifrada
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['profesor'] = $user['profesor'];
            $_SESSION['user'] = $user['user'];

            // Redirigir según el rol del usuario
            if ($user['admin'] == 1) {
                header("Location: ../Administrador/HomeAdmin.php");
            } elseif ($user['profesor'] == 1) {
                header("Location: ../Profesores/Profesores.php");
            } else {
                header("Location: ../InicioSesion/MiAcademia.php?nombre=" . urlencode($user['nombre']));
            }
            exit();

        } elseif ($password == $hashed_password) {
            // Si la contraseña está sin cifrar, es correcta, y se debe cifrar ahora
            $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $update_sql = "UPDATE usuarios SET password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $new_hashed_password, $user['id']);
            $update_stmt->execute();
            $update_stmt->close();

            // Login exitoso después de actualizar la contraseña
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['profesor'] = $user['profesor'];
            $_SESSION['user'] = $user['user'];

            // Redirigir según el rol del usuario
            if ($user['admin'] == 1) {
                header("Location: ../Administrador/HomeAdmin.php");
            } elseif ($user['profesor'] == 1) {
                header("Location: ../Profesores/Profesores.php");
            } else {
                header("Location: ../InicioSesion/MiAcademia.php?nombre=" . urlencode($user['nombre']));
            }
            exit();

        } else {
            // Contraseña incorrecta
            header("Location: ../InicioSesion/InicioSesion.php?mensaje=contrasena_incorrecta");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../InicioSesion/InicioSesion.php?mensaje=usuario_no_encontrado");
        exit();
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
}
?>
