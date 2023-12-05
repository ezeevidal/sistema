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
    <link rel="shortcut icon" href="../assets/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/desktop.css">
    <title>Escritorio</title>
</head>
<body>
<?php
    require_once "../partials/menu.php";
?>
<hr>
<?php
    require_once "../partials/calendario.php";
?>
</body>
</html>