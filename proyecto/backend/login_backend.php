<?php
// login_backend.php - procesa formulario de inicio de sesión
session_start();
require_once 'conexion.php';

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if (!$email || !$pass) {
    $_SESSION['error'] = 'Por favor escribe tus credenciales.';
    header('Location: ../frontend/login.php');
    exit;
}

$stmt = $conn->prepare('SELECT id, nombre, password FROM usuarios WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($pass, $row['password'])) {
        // credenciales correctas
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['nombre'];
        header('Location: ../frontend/productos.php');
        exit;
    }
}

$_SESSION['error'] = 'Usuario o contraseña incorrectos.';
header('Location: ../frontend/login.php');
