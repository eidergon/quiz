<?php
require_once 'conexion.php';
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultados = array();
    $correctas = 0;
    $porcentaje = 0;
    $nombre = $_POST["nombre"];

    foreach ($_POST['respuestas'] as $pregunta_id => $respuesta_usuario) {
        $respuesta_correcta = $_POST['respuestas_correctas'][$pregunta_id];

        if ($respuesta_usuario == $respuesta_correcta) {
            $resultados[$pregunta_id] = "Correcta";
            $correctas++;
            $porcentaje += 20;
        } else {
            $resultados[$pregunta_id] = "Incorrecta";
        }
    }

    $sql = "INSERT INTO resultados (nombre, correctas, porcentaje) VALUES ('$nombre', '$correctas', '$porcentaje')";
    if ($conn->query($sql) === TRUE) {
        $sql_update = "UPDATE login SET intentos = 0 WHERE nombre = '$nombre'";
        if ($conn->query($sql_update) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = "Resultado: " . $correctas . "/5" . " porcentaje: " . $porcentaje . "%";
        } else {
            $response['status'] = 'error';
            $response['message'] = "Error: " . mysqli_error($conn);
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    $response['status'] = 'error';
    $response['message'] = "Método de solicitud no válido";
}

header('Content-Type: application/json');
echo json_encode($response);
