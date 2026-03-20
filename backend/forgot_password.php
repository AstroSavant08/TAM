<?php
// forgot_password.php - Manejar recuperación de contraseña
header('Content-Type: application/json');

// Conectar a la base de datos
require_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';

if (empty($email)) {
    echo json_encode(['success' => false, 'message' => 'Email requerido']);
    exit;
}

// Verificar si el email existe
$stmt = $conn->prepare("SELECT id, username FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Por seguridad, no revelar si el email existe o no
    echo json_encode(['success' => true, 'message' => 'Si el email está registrado, recibirás un enlace para recuperar tu contraseña.']);
    exit;
}

$user = $result->fetch_assoc();

// Generar token de recuperación
$token = bin2hex(random_bytes(32));
$expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

// Guardar token en la base de datos (asumiendo que hay una tabla password_resets)
$stmt = $conn->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE token = ?, expires_at = ?");
$stmt->bind_param("issss", $user['id'], $token, $expires, $token, $expires);
$stmt->execute();

// Enviar email (simulado)
$resetLink = "http://localhost/academia/reset_password.php?token=" . $token;
$subject = "Recuperación de Contraseña - TAM";
$message = "Hola " . $user['username'] . ",\n\nPara recuperar tu contraseña, haz clic en el siguiente enlace:\n" . $resetLink . "\n\nEste enlace expira en 1 hora.\n\nSi no solicitaste esto, ignora este email.";

mail($email, $subject, $message);

echo json_encode(['success' => true, 'message' => 'Si el email está registrado, recibirás un enlace para recuperar tu contraseña.']);
?></content>
<parameter name="filePath">c:\xampp\htdocs\academia\backend\forgot_password.php