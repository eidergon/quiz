<?php
session_start();
require_once 'conexion.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $pregunta = !empty($_POST['pregunta']) ? $_POST['pregunta'] : null;
    $opcion1 = !empty($_POST['opcion1']) ? $_POST['opcion1'] : null;
    $opcion2 = !empty($_POST['opcion2']) ? $_POST['opcion2'] : null;
    $opcion3 = !empty($_POST['opcion3']) ? $_POST['opcion3'] : null;
    $opcion4 = !empty($_POST['opcion4']) ? $_POST['opcion4'] : null;
    $opcion5 = !empty($_POST['opcion5']) ? $_POST['opcion5'] : null;
    $respuesta = !empty($_POST['respuesta']) ? $_POST['respuesta'] : null;

    $sql_update = "UPDATE preguntas SET pregunta = ?, opcion1 = ?, opcion2 = ?, opcion3 = ?, opcion4 = ?, opcion5 = ?, respuesta = ? WHERE id = ?";
    $stmt = $conn->prepare($sql_update);
    if ($stmt) {
        $stmt->bind_param("sssssssi", $pregunta, $opcion1, $opcion2, $opcion3, $opcion4, $opcion5, $respuesta, $id);
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = "Pregunta Cambiada.";
        } else {
            $response['status'] = 'error';
            $response['message'] = "Error al actualizar la pregunta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = "Método de solicitud no válido";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
