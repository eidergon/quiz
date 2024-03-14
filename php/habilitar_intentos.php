<?php
require_once 'conexion.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql_update = "UPDATE login SET intentos = 1 WHERE intentos = 0";
    if ($conn->query($sql_update) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = "Intentos habilitados.";
    } else {
        $response['status'] = 'error';
        $response['message'] = "Error a habilitar intentos: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $response['status'] = 'error';
    $response['message'] = "Método de solicitud no válido";
}

header('Content-Type: application/json');
echo json_encode($response);
