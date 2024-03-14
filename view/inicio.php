<?php
    session_start();

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: ../');
        exit();
    }
    require_once '../php/conexion.php';
    $nombre = $_SESSION["nombre"];
    $cargo = $_SESSION["cargo"];

    $sql = "SELECT intentos FROM login WHERE nombre = '$nombre'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $intentos = $row['intentos'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../img/logo-removebg-preview 2.ico" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header>
        <h3><?php echo $nombre; ?></h3>
        <nav class="navbar">
            <ul class="nav-links">
                <li class="nav-link service">
                    <a href="#">Certificación <span class="drop-icon"><i class="fa-solid fa-caret-down"></i></span></a>
                    <ul class="drop-down">
                        <?php if ($intentos == 0) : ?>
                            <li id="0_intentos">Preguntas</li>
                        <?php else : ?>
                            <li id="preguntas">Preguntas</li>
                        <?php endif; ?>
                        <li class="php" data-form="ver_resultados">Ver resultados</li>
                    </ul>
                </li>

                <li class="nav-link service">
                    <a href="#">Preguntas <span class="drop-icon"><i class="fa-solid fa-caret-down"></i></span></a>
                    <ul class="drop-down">
                        <?php if ($cargo == 'agente' || $cargo == 'staff') : ?>
                            <li id="no_valido">Creacion</li>
                            <li id="no_valido2">Modificacion</li>
                            <li id="no_valido3">Habilitar intentos</li>
                        <?php else : ?>
                            <li class="php" data-form="crear">Creacion</li>
                            <li class="php" data-form="modificar">Modificacion</li>
                            <li id="habilitar_intentos">Habilitar intentos</li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="icon">
            <a href="../php/cerrar.php"><i class="fa-solid fa-right-to-bracket"></i></a>
        </div>
    </header>

    <main id="resultado"></main>

    <script src="../js/script.js"></script>
</body>
</html>