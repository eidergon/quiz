<?php
require_once 'conexion.php';
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta = !empty($_POST['pregunta']) ? $_POST['pregunta'] : null;
    $opcion1 = !empty($_POST['opcion1']) ? $_POST['opcion1'] : null;
    $opcion2 = !empty($_POST['opcion2']) ? $_POST['opcion2'] : null;
    $opcion3 = !empty($_POST['opcion3']) ? $_POST['opcion3'] : null;
    $opcion4 = !empty($_POST['opcion4']) ? $_POST['opcion4'] : null;
    $opcion5 = !empty($_POST['opcion5']) ? $_POST['opcion5'] : null;
    $respuesta = !empty($_POST['respuesta']) ? $_POST['respuesta'] : null;
    $campaña = !empty($_POST['campaña']) ? $_POST['campaña'] : null;

    $sql = "INSERT INTO preguntas (pregunta, opcion1, opcion2, opcion3, opcion4, opcion5, respuesta, campaña) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $pregunta, $opcion1, $opcion2, $opcion3, $opcion4, $opcion5, $respuesta, $campaña);
    
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = "Pregunta agregada.";
    } else {
        $response['status'] = 'error';
        $response['message'] = "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = "Método de solicitud no válido";
}

header('Content-Type: application/json');
echo json_encode($response);
