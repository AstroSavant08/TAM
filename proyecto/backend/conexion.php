<?php
// conexion.php - configura y abre la conexión a MySQL
$host     = '127.0.0.1';
$port     = 3306;
$dbname   = 'proyectotam';
$user     = 'root';
$password = '';            // XAMPP por defecto no tiene contraseña

// Usamos mysqli en este ejemplo, pero podrías cambiar a PDO fácilmente
$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_errno) {
    // Si la conexión falla se detiene el script con un mensaje
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => false,
        'message' => 'Conexión fallida: ' . $conn->connect_error
    ]);
    exit;
}

// opcional: establecer charset UTF-8
$conn->set_charset('utf8mb4');
