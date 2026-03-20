<?php
// register_backend.php - recibe POST de formulario de registro
session_start();
require_once 'conexion.php';

// datos llegados por POST
$nombre = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$pass   = $_POST['password'] ?? '';

if (!$nombre || !$email || !$pass) {
    $_SESSION['error'] = 'Por favor completa todos los campos.';
    header('Location: ../frontend/register.php');
    exit;
}

// validar que el usuario (email) no exista
$stmt = $conn->prepare('SELECT id FROM usuarios WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $_SESSION['error'] = 'El correo ya está registrado.';
    header('Location: ../frontend/register.php');
    exit;
}
$stmt->close();

// insertar nuevo usuario (rol 2 cliente, estado 1 activo)
$hash = password_hash($pass, PASSWORD_DEFAULT);
$stmt = $conn->prepare('INSERT INTO usuarios (nombre, email, password, rol_id, estado) VALUES (?, ?, ?, 2, 1)');
$stmt->bind_param('sss', $nombre, $email, $hash);
if ($stmt->execute()) {
    $_SESSION['user_id'] = $conn->insert_id;
    $_SESSION['user_name'] = $nombre;
    header('Location: ../frontend/productos.php');
} else {
    $_SESSION['error'] = 'Error al registrar: ' . $stmt->error;
    header('Location: ../frontend/register.php');
}
$stmt->close();
