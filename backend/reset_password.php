<?php
// reset_password.php - Restablecer contraseña con token
header('Content-Type: application/json');

// Conectar a la base de datos
require_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);
$token = $data['token'] ?? '';
$password = $data['password'] ?? '';

if (empty($token) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Token y contraseña requeridos']);
    exit;
}

// Verificar token
$stmt = $conn->prepare("SELECT user_id FROM password_resets WHERE token = ? AND expires_at > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Token inválido o expirado']);
    exit;
}

$user = $result->fetch_assoc();
$userId = $user['user_id'];

// Actualizar contraseña
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
$stmt->bind_param("si", $hashedPassword, $userId);
$stmt->execute();

// Eliminar token usado
$stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();

echo json_encode(['success' => true, 'message' => 'Contraseña restablecida exitosamente']);
?></content>
<parameter name="filePath">c:\xampp\htdocs\academia\backend\reset_password.php