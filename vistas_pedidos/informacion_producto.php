<?php
include '../conexion.php'; // conexión a la base de datos

// Obtener el ID de la venta desde la URL
if (isset($_GET['id'])) {
    $venta_id = intval($_GET['id']);

    // Consulta para traer los productos de la venta
    $sql = "SELECT v.id AS pedido_id, v.cod_factura, v.fecha, v.valor,
                   dv.cantidad, dv.subtotal,
                   p.nombre AS producto, p.caracteristicas_basicas AS caracteristicas, p.imagen,
                   u.nombre AS cliente
            FROM pedidos v
            JOIN detalle_pedido dv ON v.id = dv.venta_id
            JOIN productos p ON dv.producto_id = p.id
            JOIN usuarios u ON v.usuario_id = u.id
            WHERE v.id = $venta_id";

    $resultado = $conn->query($sql);

    $productos = [];
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        $pedido = $productos[0]; // datos generales de la venta
    } else {
        $pedido = null;
    }
} else {
    $pedido = null;
}


?>
<!DOCTYPE html>
<html lang="es">
  
<head>
  <?php include 'header.php'; ?>
  
  <meta charset="UTF-8">
  <title>Información del Pedido</title>
  <!-- Importar Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <h2>Información detallada del pedido</h2>


<div class="barra-seguimiento">
  <div class="linea-progreso"></div>
  <div class="icono-seguimiento">
    <i class=""></i>
  </div>
  <div class="estado-paso activo">Pendiente</div>
  <div class="estado-paso">Enviado</div>
  <div class="estado-paso">Entregado</div>
</div>


  <!-- Detalles del pedido -->
  <div class="pedido-detalle">
    <?php if ($pedido): ?>
      <?php foreach ($productos as $prod): ?>
        <div class="producto-card">
          <img src="../<?php echo $prod['imagen'] ?: 'imagenes/default.png'; ?>" alt="Imagen del producto">
          <div class="producto-info">
            <h4><?php echo htmlspecialchars($prod['producto']); ?></h4>
            <p>Especificaciones: <?php echo htmlspecialchars($prod['caracteristicas']); ?></p>
            <p>Cantidad: <?php echo $prod['cantidad']; ?></p>
            <p>Precio: $<?php echo number_format($prod['subtotal'], 0, ',', '.'); ?></p>
            <p class="estado">Estado: Pendiente</p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>No se encontró información para este pedido.</p>
    <?php endif; ?>
  </div>

  <!-- Resumen del pedido -->
  <?php if ($pedido): ?>
    <div class="resumen-pedido">
      <h3>Resumen del Pedido</h3>
      <p>Cliente: <?php echo htmlspecialchars($pedido['cliente']); ?></p>
      <p>Factura: <?php echo htmlspecialchars($pedido['cod_factura']); ?></p>
      <p>Fecha: <?php echo htmlspecialchars($pedido['fecha']); ?></p>
      <p>Total: $<?php echo number_format($pedido['valor'], 0, ',', '.'); ?></p>
      <p>Estado actual: Pendiente</p>
    </div>
  <?php endif; ?>

  <!-- Botón para volver -->
  <div class="volver-btn-container">
    <a href="pedidos.php" class="volver-btn">Volver a pedidos activos</a>
  </div>

  <?php include 'footer.php'; ?>

</body>

<style> 
/* HEADER  CSS ()*/

:root {
    --primary-blue: #0d47a1;
    --secondary-red: #f44336;
    --text-color: #333;
}

/* Reset básico */
* {
    box-sizing: border-box;
}
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    color: var(--text-color);
}

/* HEADER */
.header {
    background-color: var(--primary-blue);
    color: white;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.header .logo {
    font-weight: 700;
    font-size: 28px;
    display: flex;
    align-items: center;
}
.header .logo img {
    height: 40px;
    width: auto;
    display: block;
}

.header .menu {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 18px;
    padding: 5px 10px;
    border: 1px solid rgba(255,255,255,0.5);
    border-radius: 4px;
    cursor: pointer;
}
.header .menu-toggle {
    display: none;
    font-size: 24px;
    cursor: pointer;
}

.header .search-bar {
    flex-grow: 1;
    max-width: 500px;
    display: flex;
    border-radius: 5px;
    overflow: hidden;
    background-color: white;
}
.header .search-bar input {
    width: 100%;
    padding: 10px 15px;
    border: none;
    outline: none;
    font-size: 16px;
    color: var(--text-color);
}
.header .search-bar button {
    background-color: var(--secondary-red);
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

.header .user-icons {
    display: flex;
    gap: 20px;
}
.header .user-icons svg {
    fill: white;
    width: 24px;
    height: 24px;
    cursor: pointer;
}

/* FOOTER */
.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    margin-top: 20px; /* opcional, si quieres separación cuando hay contenido */
    background-color: var(--primary-blue);
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 0.9em;
}
body {
    padding-bottom: 60px; /* espacio para que el contenido no se esconda detrás del footer */
}



/* RESPONSIVE HEADER */
@media (max-width: 768px) {
    .header {
        justify-content: space-between;
        padding: 10px;
    }
    .header .logo img {
        height: 30px;
    }
    .header .menu {
        display: none;
    }
    .header .menu-toggle {
        display: block;
        order: -1;
    }
    .header .search-bar {
        order: 3;
        width: 100%;
        margin-top: 10px;
    }
    .header .user-icons {
        order: 2;
        gap: 10px;
    }
}

/* Estilos para informacion_producto.php */
.barra-seguimiento {
  width: 80%;
  max-width: 600px;
  margin: 30px auto;
  display: flex;
  align-items: center;
  position: relative;
}
.linea-progreso {
  height: 4px;
  background-color: #ddd;
  flex-grow: 1;
  position: absolute;
  width: 100%;
  top: 50%;
  transform: translateY(-50%);
  z-index: 1;
}
.estado-paso {
  flex: 1;
  text-align: center;
  color: #aaa;
  position: relative;
  z-index: 2;
  background: #f8f9fa; /* para que el texto se vea sobre la línea */
  padding: 0 5px;
}
.estado-paso.activo {
  color: var(--primary-blue);
  font-weight: bold;
}
.pedido-detalle, .resumen-pedido {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
}
.producto-card {
  display: flex;
  gap: 20px;
  align-items: center;
  border-bottom: 1px solid #eee;
  padding: 15px 0;
}
.producto-card:last-child {
  border-bottom: none;
}
.producto-card img {
  width: 80px;
  height: 80px;
  object-fit: contain;
}
.producto-info h4 {
  margin: 0 0 10px 0;
}
.producto-info p {
  margin: 4px 0;
  font-size: 0.9em;
}
.estado {
  font-weight: bold;
  color: var(--secondary-red);
}
.resumen-pedido h3 {
  margin-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 10px;
  margin-bottom: 15px;
}
.volver-btn-container {
  text-align: center;
  margin: 30px 0;
}
.volver-btn {
  background-color: var(--primary-blue);
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
}
}</style>
</html>
