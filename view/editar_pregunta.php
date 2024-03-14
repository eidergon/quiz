<?php
require_once '../php/conexion.php';
$id = $_GET['id'];

$sql = "SELECT * FROM preguntas WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<form class="form" id="editar">
    <h2>Editar Pregunta</h2>
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <label>
        <textarea class="select" name="pregunta" id="pregunta" cols="50" rows="30"><?php echo $row['pregunta']?></textarea>
    </label>

    <label>
        <input class="select" type="text" name="opcion1" id="opcion1" value="<?php echo $row['opcion1'] ?>" required>
    </label>

    <label>
        <input class="select" type="text" name="opcion2" id="opcion2" value="<?php echo $row['opcion2'] ?>" required>
    </label>

    <label>
        <input class="select" type="text" name="opcion3" id="opcion3" value="<?php echo $row['opcion3'] ?>">
    </label>

    <label>
        <input class="select" type="text" name="opcion4" id="opcion4" value="<?php echo $row['opcion4'] ?>">
    </label>

    <label>
        <input class="select" type="text" name="opcion5" id="opcion5" value="<?php echo $row['opcion5'] ?>">
    </label>

    <label>
        <input class="select" type="number" name="respuesta" id="respuesta" title="solo mumero" value="<?php echo $row['respuesta'] ?>" required>
    </label>
    <div class="container-btn">
        <button type="submit" class="btn">Enviar</button>
        <button class="btn php" data-form="modificar">Volver</button>
    </div>
</form>

<script src="../js/script.js"></script>