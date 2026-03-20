<?php
// guardar_rewiew.php
// Este script recibe la información de la reseña enviada desde catalogo.js
// y la inserta en la tabla `calificaciones`.

header('Content-Type: text/plain; charset=utf-8');

// Ajusta la ruta para llegar a tu archivo de conexión según dónde esté ubicado
require_once __DIR__ . '/../../backend/conexion.php';

// Recibir campos
$producto_id = intval($_POST['producto_id'] ?? 0);
$usuario_id  = intval($_POST['usuario_id'] ?? 0);
$puntuacion  = intval($_POST['puntuacion'] ?? 0);
$comentario  = trim($_POST['comentario'] ?? '');

if (!$producto_id || !$usuario_id || $puntuacion <= 0) {
    echo 'error: datos incompletos';
    exit;
}

// Insertar en la tabla calificaciones
$stmt = $conn->prepare(
    "INSERT INTO calificaciones (puntuacion, comentario, producto_id, usuario_id, estado, created_at, updated_at) " .
    "VALUES (?, ?, ?, ?, 1, NOW(), NOW())"
);
if (!$stmt) {
    echo 'error preparar: ' . $conn->error;
    exit;
}
$stmt->bind_param('isii', $puntuacion, $comentario, $producto_id, $usuario_id);
if ($stmt->execute()) {
    echo 'ok';
} else {
    echo 'error ejecutar: ' . $stmt->error;
}
