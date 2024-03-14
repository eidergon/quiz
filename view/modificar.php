<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../');
    exit();
}

$perfil = $_SESSION["cargo"];
$nombre = $_SESSION["nombre"];

require_once '../php/conexion.php';

// Número de resultados por página
$resultados_por_pagina = 9;

// Página actual, si no se especifica, es la primera página
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcula el inicio de los resultados para la consulta SQL
$inicio_limit = ($pagina - 1) * $resultados_por_pagina;

// Consulta SQL con la paginación
$sql = "SELECT * FROM preguntas LIMIT $inicio_limit, $resultados_por_pagina";
$result = $conn->query($sql);

?>
<?php if ($result->num_rows > 0) : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Opcion 1</th>
                <th>Opcion 2</th>
                <th>Opcion 3</th>
                <th>Opcion 4</th>
                <th>Opcion 5</th>
                <th>Respuesta</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr scope='row'>
                    <td class="td"><?php echo $row["pregunta"]; ?></td>
                    <td><?php echo $row["opcion1"]; ?></td>
                    <td><?php echo $row["opcion2"]; ?></td>
                    <td><?php echo $row["opcion3"]; ?></td>
                    <td><?php echo $row["opcion4"]; ?></td>
                    <td><?php echo $row["opcion5"]; ?></td>
                    <td><?php echo $row["respuesta"]; ?></td>
                    <td><button class="btn link" data-form="editar_pregunta" data-id='<?= $row['id'] ?>'>Editar <i class="fa-solid fa-pencil"></i></button></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?php
        // Consulta SQL para contar el total de registros
        $sql = "SELECT COUNT(*) as total FROM preguntas";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_resultados = $row['total'];

        // Calcula el total de páginas
        $total_paginas = ceil($total_resultados / $resultados_por_pagina);

        // Muestra los enlaces de paginación
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo "<button class='btn btn-pagination' data-pagina='$i'>$i</button>";
        }
        ?>
    </div>
<?php else : ?>
    <table class='table'>
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Opcion 1</th>
                <th>Opcion 2</th>
                <th>Opcion 3</th>
                <th>Opcion 4</th>
                <th>Opcion 5</th>
                <th>Respuesta</th>
            </tr>
        </thead>
        <tbody>
            <tr scope='row'>
                <td colspan='7' class='no-data'>Sin Datos</td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>
<script src="../js/script.js"></script>