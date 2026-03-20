<?php
session_start();
require_once 'conexion.php';

header('Content-Type: application/json');

// Obtener la acción del usuario
$action = $_GET['action'] ?? null;

// Crear carrito temporal para invitados si no existe
if (!isset($_SESSION['carrito_temporal'])) {
    $_SESSION['carrito_temporal'] = [];
}

// Verificar si el usuario está logueado
$isLoggedIn = isset($_SESSION['user_id']);

response_header($action);

switch ($action) {
    case 'add':
        addToCart($conn, $isLoggedIn);
        break;
    case 'remove':
        removeFromCart($conn, $isLoggedIn);
        break;
    case 'list':
        listCart($conn, $isLoggedIn);
        break;
    case 'clear':
        clearCart($conn, $isLoggedIn);
        break;
    default:
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Acción no válida']);
        break;
}

function response_header($action) {
    // Validar que action no esté vacío
    if (empty($action)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Acción requerida']);
        exit();
    }
}

function addToCart($conn, $isLoggedIn) {
    $producto_id = $_POST['producto_id'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $cantidad = $_POST['cantidad'] ?? 1;

    if (!$producto_id || !$nombre || !$precio) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
        return;
    }

    if ($isLoggedIn) {
        // Usuario logueado: agregar a base de datos
        $user_id = $_SESSION['user_id'];
        
        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare("INSERT INTO carrito_usuarios (usuario_id, producto, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");
        
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error en la consulta']);
            return;
        }

        $stmt->bind_param('is', $user_id, $producto_id);
        
        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al agregar al carrito']);
        }
        
        $stmt->close();
    } else {
        // Invitado: agregar a sesión
        $exist = false;
        
        // Buscar si el producto ya existe
        foreach ($_SESSION['carrito_temporal'] as &$item) {
            if ($item['id'] == $producto_id) {
                $item['cantidad'] += $cantidad;
                $exist = true;
                break;
            }
        }
        unset($item);
        
        // Si no existe, agregarlo
        if (!$exist) {
            $_SESSION['carrito_temporal'][] = [
                'id' => $producto_id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad
            ];
        }
        
        http_response_code(200);
        echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
    }
}

function removeFromCart($conn, $isLoggedIn) {
    $producto_id = $_POST['producto_id'] ?? null;

    if (!$producto_id) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'ID de producto requerido']);
        return;
    }

    if ($isLoggedIn) {
        // Usuario logueado: eliminar de base de datos
        $user_id = $_SESSION['user_id'];
        
        $stmt = $conn->prepare("DELETE FROM carrito_usuarios WHERE usuario_id = ? AND producto = ?");
        
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error en la consulta']);
            return;
        }

        $stmt->bind_param('is', $user_id, $producto_id);
        
        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(['success' => true, 'message' => 'Producto removido del carrito']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al remover del carrito']);
        }
        
        $stmt->close();
    } else {
        // Invitado: eliminar de sesión
        foreach ($_SESSION['carrito_temporal'] as $key => $item) {
            if ($item['id'] == $producto_id) {
                unset($_SESSION['carrito_temporal'][$key]);
                break;
            }
        }
        
        // Re-indexar el array
        $_SESSION['carrito_temporal'] = array_values($_SESSION['carrito_temporal']);
        
        http_response_code(200);
        echo json_encode(['success' => true, 'message' => 'Producto removido del carrito']);
    }
}

function listCart($conn, $isLoggedIn) {
    if ($isLoggedIn) {
        // Usuario logueado: obtener de base de datos
        $user_id = $_SESSION['user_id'];
        
        $stmt = $conn->prepare("
            SELECT cu.id, cu.producto, p.nombre, p.precio, p.caracteristicas 
            FROM carrito_usuarios cu
            JOIN productos p ON cu.producto = p.id
            WHERE cu.usuario_id = ?
        ");
        
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error en la consulta']);
            return;
        }

        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = [
                'id' => $row['producto'],
                'nombre' => $row['nombre'],
                'precio' => $row['precio'],
                'caracteristicas' => $row['caracteristicas'],
                'cantidad' => 1
            ];
        }
        
        $stmt->close();
        
        http_response_code(200);
        echo json_encode(['success' => true, 'items' => $items, 'is_guest' => false]);
    } else {
        // Invitado: obtener de sesión
        http_response_code(200);
        echo json_encode(['success' => true, 'items' => $_SESSION['carrito_temporal'], 'is_guest' => true]);
    }
}

function clearCart($conn, $isLoggedIn) {
    if ($isLoggedIn) {
        // Usuario logueado: limpiar base de datos
        $user_id = $_SESSION['user_id'];
        
        $stmt = $conn->prepare("DELETE FROM carrito_usuarios WHERE usuario_id = ?");
        
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error en la consulta']);
            return;
        }

        $stmt->bind_param('i', $user_id);
        
        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(['success' => true, 'message' => 'Carrito vaciado']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error al vaciar el carrito']);
        }
        
        $stmt->close();
    } else {
        // Invitado: limpiar sesión
        $_SESSION['carrito_temporal'] = [];
        
        http_response_code(200);
        echo json_encode(['success' => true, 'message' => 'Carrito vaciado']);
    }
}
?>
