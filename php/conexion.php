<?php
$conn = new mysqli('localhost', 'root', '', 'quiz');

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
