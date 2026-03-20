<?php
$host = "localhost";
$user = "root";      // Usuario por defecto de XAMPP
$pass = "";          // Contraseña por defecto de XAMPP (vacía)
$db = "tam";         // Nombre corregido según tu archivo SQL

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    // al devolver JSON evitamos que el front termine en parse error
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'message' => 'Conexión fallida: ' . $conn->connect_error]);
    exit;
}
?>