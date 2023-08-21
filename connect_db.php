<?php
// Establecer los parámetros de conexión
$host = 'localhost';
$database = 'check_device';
$user = 'root';
$password = '1q2w3e4r';

// Crear una conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
