<?php
header('Content-Type: application/json; charset=utf-8');
include 'backend/conexion.php';

$result = $conn->query("SELECT id, nombre, user_name, email, password FROM usuarios ORDER BY id");

if (!$result) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error en la base de datos: ' . $conn->error
    ]);
    $conn->close();
    exit;
}

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = [
        'id' => $row['id'],
        'nombre' => htmlspecialchars($row['nombre']),
        'user_name' => htmlspecialchars($row['user_name']),
        'email' => htmlspecialchars($row['email']),
        'contrasena' => '(encriptada)' // No mostrar contraseñas reales
    ];
}

echo json_encode([
    'success' => true,
    'users' => $users,
    'count' => count($users)
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

$conn->close();
?>
