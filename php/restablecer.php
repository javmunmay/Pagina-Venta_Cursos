<?php
// restablecer.php
require_once 'conexion.php';

// 1. Recibir el token por GET
$token = $_GET['token'] ?? '';

// 2. Verificar si existe un usuario con ese token y que no haya expirado
$stmt = $pdo->prepare("SELECT id, reset_expires FROM usuarios WHERE reset_token = :token");
$stmt->execute(['token' => $token]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Validar fecha de expiración
$ahora = date('Y-m-d H:i:s');

if ($usuario && $usuario['reset_expires'] > $ahora) {
    // Mostrar formulario para ingresar nueva contraseña
    ?>
    <form action="actualizar_password.php" method="post">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
      <label for="pass">Nueva contraseña:</label>
      <input type="password" id="pass" name="pass" required>
      <label for="pass2">Repite contraseña:</label>
      <input type="password" id="pass2" name="pass2" required>
      <button type="submit">Actualizar</button>
    </form>
    <?php
} else {
    echo "El token es inválido o ha expirado.";
}
?>
