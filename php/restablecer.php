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

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restablecer Contraseña</title>
  <link rel="icon" type="image/png" href="../imagenes/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
      /* Añadir padding para móviles */
    }

    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .logo {
      max-width: 100%;
      /* Hacer el logo responsive */
      height: auto;
      margin-bottom: 20px;
    }

    h1 {
      font-size: 1.5rem;
      /* Tamaño de fuente responsive */
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #555;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
      /* Tamaño de fuente responsive */
    }

    button {
      background-color: #090643;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 1rem;
      /* Tamaño de fuente responsive */
      cursor: pointer;
      width: 100%;
      /* Botón de ancho completo en móviles */
    }

    button:hover {
      background-color: rgb(10, 4, 110);
    }

    .error {
      color: red;
      margin-bottom: 15px;
    }

    /* Media Queries para ajustes específicos */
    @media (max-width: 576px) {
      h1 {
        font-size: 1.25rem;
        /* Reducir tamaño de fuente en móviles */
      }

      .container {
        padding: 15px;
        /* Reducir padding en móviles */
      }
    }
  </style>
</head>

<body>
  <div class="container d-flex flex-column align-items-center" style="max-width: 400px; margin: 0 auto;">
    <!-- Logo de la página (centrado con Flexbox) -->
    <img src="../imagenes/LogoEstudianteAzul.png" alt="Logo de la página" class="logo">

    <div class="recuperarContra container d-flex flex-column align-items-center">
      <!-- Título -->
      <h1>Restablecer Contraseña</h1>

      <?php if ($usuario && $usuario['reset_expires'] > $ahora): ?>
        <!-- Formulario para restablecer contraseña -->
        <form action="actualizar_password.php" method="post">
          <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
          <label for="pass">Nueva contraseña:</label>
          <input type="password" id="pass" name="pass" required>
          <label for="pass2">Repite contraseña:</label>
          <input type="password" id="pass2" name="pass2" required>
          <button type="submit">Actualizar</button>
        </form>
      <?php else: ?>
        <!-- Mensaje de error si el token es inválido o ha expirado -->
        <p class="error">El token es inválido o ha expirado.</p>
        <a
          class="btn btn-primary btn-lg me-3" style="background-color: #090643; border-color: #090643;" href="../ContenidoPrincipal/Contacto.php#recuperarcontrasena">Volver a intentarlo</a>
      <?php endif; ?>
    </div>
  </div>

  <!-- Bootstrap JS y dependencias -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
<script>
  window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');

    if (mensaje === 'Contrasena_no_coinciden') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'La contraseña no coincide, por favor asegúrese que haya introducido la misma.';
      mensajeDiv.style.backgroundColor = '#F8D7DA';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #F8D7DA';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';
      mensajeDiv.style.textAlign = 'center';

      // Inserta el mensaje en el contenedor del formulario de contacto
      const formContainer = document.querySelector('.recuperarContra'); // Cambia '.contact-container' al contenedor adecuado
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);

    }else if (mensaje === 'Token_invalido') {
      const mensajeDiv = document.createElement('div');
      mensajeDiv.textContent = 'El Token ha expirado, ha pasado más de 1 hora, debe de registrar su correo de nuevo en "Recuperar Contraseña".';
      mensajeDiv.style.backgroundColor = '#F8D7DA';
      mensajeDiv.style.color = '#155724';
      mensajeDiv.style.padding = '10px';
      mensajeDiv.style.border = '1px solid #F8D7DA';
      mensajeDiv.style.borderRadius = '5px';
      mensajeDiv.style.marginBottom = '15px';
      mensajeDiv.style.textAlign = 'center';

      // Inserta el mensaje en el contenedor del formulario de contacto
      const formContainer = document.querySelector('.recuperarContra'); // Cambia '.contact-container' al contenedor adecuado
      formContainer.insertBefore(mensajeDiv, formContainer.firstChild);
    }
  };
</script>

</html>