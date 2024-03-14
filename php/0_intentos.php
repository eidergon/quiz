<?php
session_start();
require_once 'conexion.php';
$nombre = $_SESSION["nombre"];
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql_update = "UPDATE login SET intentos = 0 WHERE nombre = '$nombre'";
    if ($conn->query($sql_update) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = "Esta accion le quita los intentos.";
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