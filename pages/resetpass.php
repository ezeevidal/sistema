<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/resetpass.css">
    <title>Restablecer Contraseña</title>
    <!-- Agrega aquí tus enlaces a hojas de estilos CSS u otros recursos -->
</head>
<body>
    <h3>Restablecer Contraseña</h3>
    <p>Enviaremos un email con un link para reestablecer su contraseña.</p>
    
    <?php
    // Aquí puedes manejar la lógica de restablecimiento de contraseña si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        // Aquí puedes procesar los datos del formulario, como enviar un correo electrónico con un enlace de restablecimiento
        // También puedes realizar validaciones y operaciones con la base de datos si es necesario
        // Aquí se asume que se ha enviado un correo electrónico al usuario con instrucciones para restablecer la contraseña
        
        // Aquí se muestra un mensaje indicando que se ha enviado un correo electrónico para restablecer la contraseña
        echo "<p>Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.</p>";
    } else {}
        // Si no se ha enviado el formulario, muestra el formulario para restablecer la contraseña
    ?>
    
    <form action="" method="POST">
        <div class="contenedor">
            <div class="login">
                <span aria-required="true">Ingrese su email</span>
                <input type="text" name="email" id="email" required>
            </div>
        </div>
        <div class="contenedor">
            <div class="login">
                <br>
                <div class="section2">
                <input type="submit" name="submit" value="Enviar">
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>
