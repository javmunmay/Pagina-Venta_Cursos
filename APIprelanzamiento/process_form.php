<?php
// Datos de conexión a la base de datos
$host = "PMYSQL181.dns-servicio.com:3306";  // Cambia esto si tu DB está en otro servidor
$dbname = "10718674_prelanzamiento";
$username = "Javier";
$password = "u70q0Z2p@";

try {
    // Conectar a la base de datos con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);

        // Validar que no estén vacíos
        if (empty($name) || empty($email)) {
            die("Error: Todos los campos son obligatorios.");
        }

        // Verificar si el email ya está registrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            die("Error: Este correo ya está registrado.");
        }

        // Insertar en la base de datos
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);

        echo "Registro exitoso. ¡Gracias por registrarte!";
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
