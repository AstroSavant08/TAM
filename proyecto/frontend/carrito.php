<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="../style.css">
    <script>
        function loadCart() {
            fetch('../backend/carrito.php?action=list')
                .then(r=>r.json()).then(j=>{
                    if (j.success) render(j.items);
                });
        }
        function render(items) {
            const container = document.getElementById('cartItems');
            container.innerHTML = '';
            let total = 0;
            items.forEach(it=>{
                total += it.precio * it.cantidad;
                const div = document.createElement('div');
                div.innerHTML = `<strong>${it.nombre}</strong> x${it.cantidad} $${(it.precio*it.cantidad).toFixed(2)} `+
                                `<button onclick="remove(${it.producto_id})">Eliminar</button>`;
                container.appendChild(div);
            });
            document.getElementById('total').textContent = total.toFixed(2);
        }
        function remove(id) {
            fetch('../backend/carrito.php?action=remove', {
                method:'POST',
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                body:'product_id='+id
            }).then(r=>r.json()).then(j=>{ if(j.success) loadCart(); });
        }
        function checkout() {
            fetch('../backend/ventas.php')
                .then(r=>r.json()).then(j=>{
                    if (j.success) {
                        alert('Compra realizada, ID ' + j.venta_id);
                        loadCart();
                    }
                });
        }
        window.onload = loadCart;
    </script>
</head>
<body>
    <h2>Carrito de compras</h2>
    <a href="productos.php">Seguir comprando</a> | <a href="login.php?logout=1">Cerrar sesión</a>
    <div id="cartItems"></div>
    <p>Total: $<span id="total">0.00</span></p>
    <button onclick="checkout()">Finalizar compra</button>
</body>
</html>