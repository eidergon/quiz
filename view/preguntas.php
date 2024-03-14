<?php
require_once '../php/conexion.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../');
    exit();
}
$cargo = $_SESSION["cargo"];
$nombre = $_SESSION["nombre"];
$campaña = $_SESSION["campaña"];

if ($campaña == 'Hogar' || $campaña == 'Movil') {
    $query = "SELECT * FROM preguntas WHERE campaña = '$campaña' ORDER BY RAND() LIMIT 5";
} else {
    $query = "SELECT * FROM preguntas ORDER BY RAND() LIMIT 5";
}

$resultado = $conn->query($query);

$conn->close();
$contador = 1;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../img/logo-removebg-preview 2.ico" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <button type="button" id="volver" class="btn volver">Volver</button>
    <form class="form" id="verificar_respuesta">
        <h1>Preguntas:</h1>
        <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
        <?php while ($fila = $resultado->fetch_assoc()) : ?>
            <div class="container-pre">
                <h2>Pregunta <?php echo $contador ?>: <?php echo $fila['pregunta']; ?></h2>
                <h3>Opciones:</h3>
                <?php
                $opciones = array_filter([$fila['opcion1'], $fila['opcion2'], $fila['opcion3'], $fila['opcion4'], $fila['opcion5']]);
                $contador++;
                ?>
                <?php foreach ($opciones as $indice => $opcion) : ?>
                    <label>
                        <input required type="radio" name="respuestas[<?php echo $fila['id']; ?>]" value="<?php echo $indice + 1; ?>"> <?php echo $opcion; ?><br>
                    </label>
                <?php endforeach; ?>
                <input type="hidden" name="respuestas_correctas[<?php echo $fila['id']; ?>]" value="<?php echo $fila['respuesta']; ?>">
            </div>
        <?php endwhile; ?>
        <button type="submit" class="btn">Enviar</button>
    </form>

    <script src="../js/script.js"></script>
    <script src="../js/0_intentos.js"></script>
</body>

</html>