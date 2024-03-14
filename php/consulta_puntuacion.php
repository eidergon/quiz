<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../');
    exit();
}
$perfil = $_SESSION["cargo"];
$nombre = $_SESSION["nombre"];

if (isset($_POST['fecha'])) {
    $termino = $_POST['fecha'];

    if ($perfil == 'admin') {
        $sql = "SELECT * FROM resultados WHERE fecha = '$termino' order by fecha DESC";
    } else {
        $sql = "SELECT * FROM resultados WHERE nombre = '$nombre' AND fecha = '$termino' order by fecha DESC";
    }
}


$result = $conn->query($sql);

$conn->close();
?>

<?php if ($result->num_rows > 0) : ?>
    <form class="visualizar" id="puntuacion">
        <div class="container-input">
            <input type="date" name="fecha" class="input date">
            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
            </svg>
            <button class="envia" type="submit">enviar</button>
        </div>
    </form>
    <table class='table'>
        <thead>
            <tr>
                <th>Día</th>
                <th>Nombre</th>
                <th>Correctas</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr scope='row'>
                    <td><?php echo $row["fecha"]; ?></td>
                    <td><?php echo $row["nombre"]; ?></td>
                    <td><?php echo $row["correctas"]; ?></td>
                    <td><?php echo $row["porcentaje"]; ?>%</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else : ?>
    <form class="visualizar" id="puntuacion">
        <div class="container-input">
            <input type="date" name="fecha" class="input date">
            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
            </svg>
            <button class="envia" type="submit">enviar</button>
        </div>
    </form>
    <table class='table'>
        <thead>
            <tr>
                <th>Día</th>
                <th>Asesor</th>
                <th>Correctas</th>
            </tr>
        </thead>
        <tbody>
            <tr scope='row'>
                <td colspan='3' class='no-data'>Sin Datos</td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>
<script src="../js/script.js"></script>