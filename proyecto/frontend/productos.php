<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/../backend/conexion.php';

// comprobar conexión
if (!isset($conn) || $conn->connect_errno) {
    die('Error de conexión: ' . ($conn->connect_error ?? 'desconocido'));
}

// consultar productos
$sql = 'SELECT id, nombre, precio, imagen FROM productos';
$res = $conn->query($sql);
$productos = [];
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="../../style.css">
    <script>
    function addToCart(id) {
        fetch('../backend/carrito.php?action=add', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: 'product_id='+id+'&quantity=1'
        }).then(r=>r.json()).then(j=>{
            if (j.success) alert('Agregado al carrito');
        });
    }
    </script>
</head>
<body>
    <h2>Catálogo</h2>
    <a href="carrito.php">Ver carrito</a> | <a href="login.php?logout=1">Cerrar sesión</a>
    <div class="products-grid">
        <?php foreach ($productos as $p): ?>
            <div class="product-card">
                <?php if ($p['imagen']): ?><img src="<?=htmlspecialchars($p['imagen'])?>" alt="<?=htmlspecialchars($p['nombre'])?>"><?php endif; ?>
                <h3><?=htmlspecialchars($p['nombre'])?></h3>
                <p class="price">$<?=number_format($p['precio'],2)?></p>
                <button onclick="addToCart(<?= $p['id']?>)">Agregar al carrito</button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>