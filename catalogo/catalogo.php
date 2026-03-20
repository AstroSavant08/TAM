<?php
session_start();

// Incluir la conexión a la base de datos
require_once __DIR__ . '/../backend/conexion.php';

// Construir URL base dinámicamente
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$baseUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/academia';

// Consultar productos desde la base de datos
$productos = [];
$error = null;

if ($conn && $conn->connect_errno === 0) {
    $sql = 'SELECT id, nombre, precio, caracteristicas FROM productos LIMIT 60';
    $result = $conn->query($sql);
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    } else {
        $error = "Error en consulta: " . $conn->error;
    }
} else {
    $error = "Error de conexión a base de datos";
}

// Manejar agregar producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    
    $product_id = intval($_POST['product_id'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 1);
    
    if ($product_id > 0) {
        if (isset($_SESSION['carrito'][$product_id])) {
            $_SESSION['carrito'][$product_id] += $quantity;
        } else {
            $_SESSION['carrito'][$product_id] = $quantity;
        }
        echo json_encode(['success' => true, 'message' => 'Producto agregado al carrito']);
    } else {
        echo json_encode(['success' => false, 'message' => 'ID de producto inválido']);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - TAM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .logo:hover {
            opacity: 0.8;
        }

        .header-title {
            flex: 1;
            text-align: center;
            font-size: 28px;
            font-weight: 700;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .nav-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-btn:hover {
            background: white;
            color: #0d47a1;
        }

        /* CONTAINER */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-title {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 10px;
            font-size: 36px;
            font-weight: 700;
        }

        .page-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
            font-size: 16px;
        }

        /* ERROR MESSAGE */
        .error-box {
            background: #ffebee;
            border: 2px solid #c62828;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 40px;
            color: #c62828;
            text-align: center;
        }

        .error-box strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }

        /* NO PRODUCTS */
        .no-products {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .no-products i {
            font-size: 64px;
            color: #ccc;
            margin-bottom: 20px;
            display: block;
        }

        .no-products h3 {
            color: #666;
            margin-bottom: 10px;
        }

        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: 600;
            overflow: hidden;
        }

        .product-info {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-weight: 700;
            color: #333;
            font-size: 16px;
            margin-bottom: 10px;
            line-height: 1.3;
            min-height: 2.6em;
        }

        .product-price {
            color: #d32f2f;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .product-description {
            color: #777;
            font-size: 13px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .product-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: auto;
        }

        .product-button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(13, 71, 161, 0.4);
        }

        .product-button:active {
            transform: scale(0.98);
        }

        /* FOOTER */
        footer {
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 60px;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 5px 0;
        }

        /* ALERT */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border: 2px solid #4caf50;
            border-radius: 8px;
            padding: 16px 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            animation: slideIn 0.3s ease;
            display: none;
        }

        .alert.success {
            border-color: #4caf50;
            color: #2e7d32;
        }

        .alert.error {
            border-color: #f44336;
            color: #c62828;
        }

        .alert.show {
            display: block;
        }

        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            .header-title {
                font-size: 20px;
                width: 100%;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 15px;
            }

            .product-image {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <a href="<?= $baseUrl ?>" class="logo">
            <i class="fas fa-store"></i> TAM
        </a>
        <div class="header-title">Catálogo de Productos</div>
        <div class="nav-buttons">
            <a href="<?= $baseUrl ?>" class="nav-btn">
                <i class="fas fa-home"></i> Inicio
            </a>
            <a href="<?= $baseUrl ?>/carrito.html" class="nav-btn">
                <i class="fas fa-shopping-cart"></i> Carrito
            </a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <div class="container">
        <h1 class="page-title">📦 Nuestros Productos</h1>
        <p class="page-subtitle">Explora nuestro catálogo de productos de calidad</p>

        <?php if ($error): ?>
            <div class="error-box">
                <strong>⚠️ Error</strong>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (empty($productos)): ?>
            <div class="no-products">
                <i class="fas fa-box"></i>
                <h3>No hay productos disponibles</h3>
                <p>Por favor intenta más tarde o verifica la conexión a la base de datos.</p>
            </div>
        <?php else: ?>
            <div class="product-grid">
                <?php foreach ($productos as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <div style="text-align: center;">
                                <div style="font-size: 40px;">📦</div>
                                <div>Producto #<?= htmlspecialchars($product['id']) ?></div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?= htmlspecialchars($product['nombre']) ?></h3>
                            <div class="product-price">$<?= number_format($product['precio'], 2, ',', '.') ?></div>
                            <p class="product-description">
                                <?= htmlspecialchars(substr($product['caracteristicas'] ?? 'Sin descripción', 0, 100)) ?>
                            </p>
                            <button class="product-button" onclick="agregarAlCarrito(<?= $product['id'] ?>, '<?= htmlspecialchars(addslashes($product['nombre'])) ?>', <?= $product['precio'] ?>)">
                                <i class="fas fa-cart-plus"></i> Agregar al carrito
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- FOOTER -->
    <footer>
        <p><strong>TAM - Tienda en Línea</strong></p>
        <p>&copy; 2026 Todos los derechos reservados</p>
        <p><i class="fas fa-phone"></i> Contacto: info@tam.com</p>
    </footer>

    <!-- ALERT NOTIFICATION -->
    <div class="alert" id="alertBox"></div>

    <script>
        const baseUrl = '<?= $baseUrl ?>';

        async function agregarAlCarrito(id, nombre, precio) {
            try {
                const formData = new FormData();
                formData.append('product_id', id);
                formData.append('quantity', 1);

                const response = await fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                
                if (data.success) {
                    mostrarAlerta(`✅ ${nombre} agregado al carrito`, 'success');
                } else {
                    mostrarAlerta('❌ Error al agregar al carrito', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                mostrarAlerta('❌ Error de conexión', 'error');
            }
        }

        function mostrarAlerta(mensaje, tipo) {
            const alertBox = document.getElementById('alertBox');
            alertBox.textContent = mensaje;
            alertBox.className = 'alert ' + tipo + ' show';
            
            setTimeout(() => {
                alertBox.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
