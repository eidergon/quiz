<?php
session_start();

session_destroy();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/logo-removebg-preview 2.ico" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <form class="form" method="POST">
        <a href="#"><img src="img/logo-removebg-preview 2.ico" alt="Logo" class="logo"></a>
        <div class="form-container">
            <input type="text" name="username" class="input" placeholder="Usuario" required>
            <input type="password" name="password" class="input" placeholder="Contraseña" required>
            <button class="btn"> Ingresar </button>
        </div>
        <p class="message" id="mensaje">¿Se te olvido la contraseña?</p>
        <p class="message" id="developer">&copy; Desarrollo creado para One Contact</p>
    </form>

    <?php
    require 'php/conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM login WHERE username = '$username' AND pass = '$password'";
        $resultado = $conn->query($query);

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            session_start();
            $_SESSION["nombre"] = $row["nombre"];
            $_SESSION["cargo"] = $row["cargo"];
            $_SESSION["campaña"] = $row["campaña"];
            $_SESSION['logged_in'] = true;
            header("Location: view/inicio.php");
            exit;
        } else {
            echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Error de autenticación",
                            text: "Usuario o contraseña incorrectos",
                        });
                    </script>';
        }

        $conn->close();
    }
    ?>

    <script src="js/script.js"></script>
</body>

</html>