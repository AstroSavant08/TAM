<?php
include '../conexion.php'; // archivo con la conexión a la base de datos

// Consulta pedidos activos con productos asociados
$sql = "SELECT v.id AS pedido_id, v.cod_factura, v.fecha, v.valor,
               p.nombre AS producto, p.imagen, dv.cantidad, dv.subtotal
        FROM pedidos v
        JOIN detalle_pedido dv ON v.id = dv.venta_id
        JOIN productos p ON dv.producto_id = p.id
        ORDER BY v.fecha DESC";

$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mis Pedidos Activos</title>
  <link rel="stylesheet" href="header-footer.css">
  <link rel="stylesheet" href="pedidos.css">
</head>
<body>
  <?php include 'header.php'; ?>

  <h2>Mis Pedidos Activos</h2>

  <div class="pedidos-container">
    <?php if ($resultado && $resultado->num_rows > 0): ?>
      <?php while($pedido = $resultado->fetch_assoc()): ?>
        <div class="pedido-card">
          <img src="../<?php echo $pedido['imagen'] ?: 'imagenes/default.png'; ?>" 
               alt="Imagen del producto">
          <div class="pedido-info">
            <h4>Pedido #<?php echo $pedido['pedido_id']; ?></h4>
            <p>Factura: <?php echo htmlspecialchars($pedido['cod_factura']); ?></p>
            <p>Producto: <?php echo htmlspecialchars($pedido['producto']); ?></p>
            <p>Cantidad: <?php echo $pedido['cantidad']; ?></p>
            <p>Fecha: <?php echo htmlspecialchars($pedido['fecha']); ?></p>
            <p>Total: $<?php echo number_format($pedido['valor'], 0, ',', '.'); ?></p>
            
            <a href="informacion_producto.php?id=<?php echo $pedido['pedido_id']; ?>">Ver más información</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No tienes pedidos activos.</p>
    <?php endif; ?>
  </div>

  <div class="historial-btn-container">
    <a href="historial_pedidos.php" class="historial-btn">Ver historial de pedidos</a>
  </div>
 <?php include 'footer.php'; ?>
</body>
<link rel="stylesheet" href="pedidos.css">

</html>
