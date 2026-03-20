<?php
// carrito.php - operaciones básicas del carrito usando POST/GET
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'No autenticado']);
    exit;
}
$userId = $_SESSION['user_id'];

$action = $_REQUEST['action'] ?? '';

switch ($action) {
    case 'add':
        $prod = intval($_POST['product_id'] ?? 0);
        $qty  = intval($_POST['quantity'] ?? 1);
        if ($prod <= 0) {
            echo json_encode(['success' => false]);
            exit;
        }
        // ver si ya existe línea
        $stmt = $conn->prepare('SELECT cantidad FROM carrito_usuarios WHERE usuario_id = ? AND producto_id = ?');
        $stmt->bind_param('ii', $userId, $prod);
        $stmt->execute();
        $stmt->bind_result($existing);
        if ($stmt->fetch()) {
            $stmt->close();
            $qty += $existing;
            $stmt = $conn->prepare('UPDATE carrito_usuarios SET cantidad = ? WHERE usuario_id=? AND producto_id=?');
            $stmt->bind_param('iii', $qty, $userId, $prod);
            $stmt->execute();
        } else {
            $stmt->close();
            $stmt = $conn->prepare('INSERT INTO carrito_usuarios (usuario_id, producto_id, cantidad) VALUES (?,?,?)');
            $stmt->bind_param('iii', $userId, $prod, $qty);
            $stmt->execute();
        }
        echo json_encode(['success' => true]);
        break;

    case 'remove':
        $prod = intval($_POST['product_id'] ?? 0);
        $stmt = $conn->prepare('DELETE FROM carrito_usuarios WHERE usuario_id = ? AND producto_id = ?');
        $stmt->bind_param('ii', $userId, $prod);
        $stmt->execute();
        echo json_encode(['success' => true]);
        break;

    case 'list':
        $sql = 'SELECT c.producto_id, c.cantidad, p.nombre, p.precio, p.imagen ' .
               'FROM carrito_usuarios c JOIN productos p ON c.producto_id = p.id ' .
               'WHERE c.usuario_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $res = $stmt->get_result();
        $items = [];
        while ($row = $res->fetch_assoc()) {
            $items[] = $row;
        }
        echo json_encode(['success' => true, 'items' => $items]);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Acción no válida']);
}
