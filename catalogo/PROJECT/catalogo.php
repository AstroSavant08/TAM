<?php
session_start();
// Página de catálogo funcional conectada a la BD
require_once __DIR__ . '/../../backend/conexion.php';

// Construir URL base dinámicamente
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . 
           '://' . $_SERVER['HTTP_HOST'] . '/academia';

// consultar productos desde la base de datos, incluyendo la imagen
$sql = 'SELECT id, nombre, precio, caracteristicas, imagen_url FROM productos LIMIT 60';
$res = $conn->query($sql);
$productos = [];
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $productos[] = $row;
    }
} else {
    // Si hay un error en la consulta, registrarlo para depuración
    error_log('Error en consulta de productos: ' . $conn->error);
}

// Función para acortar texto de forma inteligente
function smart_trim($text, $max_len, $append = '...') {
    if (strlen($text) <= $max_len) {
        return $text;
    }
    $text = substr($text, 0, $max_len);
    $last_space = strrpos($text, ' ');
    if ($last_space !== false) {
        $text = substr($text, 0, $last_space);
    }
    return $text . $append;
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
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/style.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/catalogo/PROJECT/catalogo.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/header.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .product-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }
        .product-image-container {
            width: 100%;
            padding-top: 100%; /* Aspect ratio 1:1 */
            position: relative;
            background: #f0f0f0;
        }
        .product-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .product-name {
            font-weight: 600;
            margin: 0 0 10px 0;
            color: #333;
            font-size: 14px;
            flex-grow: 1;
        }
        .product-price {
            color: #d32f2f;
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }
        .product-button {
            width: 100%;
            padding: 10px;
            background: #0d47a1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
            margin-top: auto;
        }
        .product-button:hover {
            background: #1976d2;
        }
        h1 {
            text-align: center;
            color: #0d47a1;
            margin: 30px 0;
        }
        .no-products {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="logo">
            <a href="<?= $baseUrl ?>" style="display: flex; align-items: center; text-decoration: none;">
                <img src="<?= $baseUrl ?>/vistas_pedidos/uploads/logo.png" alt="Logo TAM" onerror="this.src='https://via.placeholder.com/120x42/0d47a1/ffffff?text=TAM'" style="height: 40px;">
            </a>
        </div>
        
        <div class="search-bar" style="flex-grow: 1; margin: 0 20px; display: flex; background: white; border-radius: 4px; overflow: hidden;">
            <input type="text" id="searchInput" placeholder="Buscar productos..." style="flex-grow: 1; border: none; padding: 10px; outline: none;">
            <button style="background: #0d47a1; border: none; padding: 10px 15px; cursor: pointer; color: white;">
                <i class="fas fa-search"></i>
            </button>
        </div>
        
        <nav class="main-nav" style="display: flex; gap: 20px; margin: 0 20px;">
            <a href="<?= $baseUrl ?>" style="color: white; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                <i class="fas fa-home"></i> Inicio
            </a>
            <a href="<?= $baseUrl ?>/?page=catalogo" style="color: white; text-decoration: none; display: flex; align-items: center; gap: 5px; border-bottom: 2px solid white; padding-bottom: 5px;">
                <i class="fas fa-th-large"></i> Catálogo
            </a>
            <a href="<?= $baseUrl ?>/?page=carrito" style="color: white; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                <i class="fas fa-shopping-cart"></i> Carrito
            </a>
        </nav>
    </header>

    <div class="container">
        <h1><i class="fas fa-boxes"></i> Catálogo de Productos</h1>

        <?php if (empty($productos)): ?>
            <div class="no-products">
                <i class="fas fa-box" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                <h3>No hay productos disponibles</h3>
                <p>Por favor intenta más tarde o verifica la conexión a la base de datos.</p>
                <p style="color: #999; font-size: 12px;"><i class="fas fa-info-circle"></i> Si ves este mensaje, verifica que la tabla `productos` tenga datos y que la conexión en `backend/conexion.php` sea correcta.</p>
            </div>
        <?php else: ?>
            <div class="product-grid">
                <?php foreach ($productos as $p): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <img src="<?= (!empty($p['imagen_url']) ? htmlspecialchars($p['imagen_url']) : 'https://via.placeholder.com/250x250/eee/ccc?text=Sin+Imagen') ?>" alt="<?= htmlspecialchars($p['nombre']) ?>" class="product-image">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?= htmlspecialchars($p['nombre']) ?></h3>
                            <p style="color: #666; font-size: 12px; margin: 5px 0;"><?= htmlspecialchars(smart_trim($p['caracteristicas'] ?? '', 60)) ?></p>
                            <p class="product-price">$<?= number_format($p['precio'], 2, ',', '.') ?></p>
                            <button class="product-button" onclick="agregarAlCarrito(<?= $p['id'] ?>, '<?= htmlspecialchars($p['nombre']) ?>', <?= $p['precio'] ?>)">
                                <i class="fas fa-shopping-cart"></i> Agregar al carrito
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- FOOTER -->
    <footer style="background: #0d47a1; color: white; text-align: center; padding: 20px; margin-top: 40px;">
        <p>&copy; 2026 TAM - Tienda en línea especializada en tecnología</p>
    </footer>

    <script>
        const baseUrl = '<?= $baseUrl ?>';
        
        async function agregarAlCarrito(id, nombre, precio) {
            try {
                const response = await fetch(baseUrl + '/backend/carrito.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=add&product_id=${id}&quantity=1`
                });
                const data = await response.json();
                if (data.success) {
                    alert(`Agregado al carrito: ${nombre}`);
                } else {
                    alert('Error al agregar al carrito: ' + (data.message || 'Razón desconocida'));
                }
            } catch (error) {
                console.error('Error en fetch:', error);
                alert('Error de conexión al intentar agregar al carrito.');
            }
        }
    </script>
</body>
</html>
