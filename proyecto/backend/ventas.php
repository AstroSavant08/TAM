<?php
// ventas.php - genera una venta a partir del carrito
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'No autenticado']);
    exit;
}
$userId = $_SESSION['user_id'];

// obtener items del carrito
$sql = 'SELECT c.producto_id, c.cantidad, p.precio ' .
       'FROM carrito_usuarios c JOIN productos p ON c.producto_id = p.id ' .
       'WHERE c.usuario_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$res = $stmt->get_result();
$items = [];
$total = 0;
while ($row = $res->fetch_assoc()) {
    $items[] = $row;
    $total += $row['precio'] * $row['cantidad'];
}

if (empty($items)) {
    echo json_encode(['success' => false, 'message' => 'Carrito vacío']);
    exit;
}

// insertar venta
$stmt = $conn->prepare('INSERT INTO ventas (usuario_id, total, fecha) VALUES (?, ?, NOW())');
$stmt->bind_param('id', $userId, $total);
$stmt->execute();
$ventaId = $conn->insert_id;

// detalle_venta
$stmt = $conn->prepare('INSERT INTO detalle_venta (venta_id, producto_id, cantidad, precio) VALUES (?,?,?,?)');
foreach ($items as $it) {
    $stmt->bind_param('iiid', $ventaId, $it['producto_id'], $it['cantidad'], $it['precio']);
    $stmt->execute();
}

// vaciar carrito
$stmt = $conn->prepare('DELETE FROM carrito_usuarios WHERE usuario_id = ?');
$stmt->bind_param('i', $userId);
$stmt->execute();

echo json_encode(['success' => true, 'venta_id' => $ventaId]);
