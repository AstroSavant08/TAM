<?php
// test.php - Archivo para probar la conexión a la BD
include 'conexion.php';
header('Content-Type: application/json; charset=utf-8');

echo json_encode([
    'status' => 'OK',
    'message' => 'Conexión a la base de datos exitosa',
    'database' => 'tam',
    'connection' => $conn ? 'Activa' : 'Fallida'
]);
?>
