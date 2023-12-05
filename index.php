<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Assets/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/index.css">
    <title>Iniciar sesión</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #888;
            width: 20%;
            height: auto;
            
        }

    .close {
        color: #000;
        position: fixed;
        font-size: 16px;
        font-weight: bold;
        top:0;
        margin-left:92%;
        background-color: transparent;
    }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="./assets/logo.png" alt="">
    </div>
    <br>
    <p class="parrafo1">Queremos asegurarnos de que realmente seas vos quien está tratando de acceder al sistema.</p>
    <br>
    <p class="parrafo1">Para continuar, primero debes verificar tu identidad.</p>
    <br>

    <?php
    session_start();
    include_once 'database.php';

    if(isset($_POST['email'], $_POST['pass'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            header("Location: ./pages/desktop.php");
            exit();
        } else {
            // Si las credenciales son incorrectas, se muestra el modal
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("myModal").style.display = "block";
                    });
                </script>';
        }
    }
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
                <span>Ingrese su contraseña</span>
                <input type="password" name="pass" id="pass" required>
                <div class="resetpass">
                    <a href="#"> (?) Olvidé mi contraseña</a>
                </div>
                <br>
                <div class="section2">
                    <button type="submit">Siguiente</button>
                </div>
            </div>
        </div>
    </form>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p style="color: red; font-weight: bold;">Usuario y contraseña incorrectos</p>
        </div>
    </div>

    <script>
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
</body>
</html>
