<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="UTF-8">
  <title>Historial de Pedidos</title>
  <link rel="stylesheet" href="header-footer.css">
  <link rel="stylesheet" href="historial_pedidos.css">
</head>
<body>
<?php include 'header.php'; ?>
  <h2>Historial de Pedidos</h2>

  <div class="historial-container">

    <!-- Pedido historial 1 -->
    <div class="historial-card">
      <img src="uploads/producto1.png" alt="Imagen del producto">
      <div class="historial-info">
        <h4>Pedido #PED-0001</h4>
        <p>Fecha: 20/12/2025</p>
        <p class="estado">Estado: Entregado</p>
        <p>Total: $200000</p>
        <a href="informacion_producto.php">Ver más información</a>
      </div>
    </div>

    <!-- Pedido historial 2 -->
    <div class="historial-card">
      <img src="uploads/producto2.png" alt="Imagen del producto">
      <div class="historial-info">
        <h4>Pedido #PED-0002</h4>
        <p>Fecha: 28/12/2025</p>
        <p class="estado">Estado: Entregado</p>
        <p>Total: $150000</p>
        <a href="informacion_producto.php">Ver más información</a>
      </div>
    </div>

  </div>

  <!-- Botón para volver -->
  <div class="volver-btn-container">
    <a href="pedidos.php" class="volver-btn"> Volver a pedidos activos</a>
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
h2 {
  color: #004080;
  text-align: center;
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

/* Estilos para historial_pedidos.php */
.historial-container {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 20px;
  max-width: 800px;
  margin: 20px auto;
}
.historial-card {
  display: flex;
  gap: 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  align-items: center;
}
.historial-card img {
  width: 100px;
  height: 100px;
  object-fit: contain;
  border-radius: 4px;
}
.historial-info {
  flex-grow: 1;
}
.historial-info h4 {
  margin-top: 0;
  color: var(--primary-blue);
}
.historial-info p {
  margin: 5px 0;
  font-size: 0.9em;
  color: #555;
}
.historial-info .estado {
  font-weight: bold;
  color: #4CAF50; /* Verde para 'Entregado' */
}
.historial-info a {
  display: inline-block;
  margin-top: 10px;
  color: var(--secondary-red);
  text-decoration: none;
  font-weight: bold;
}
.volver-btn-container {
  text-align: center;
  margin: 20px 0;
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
