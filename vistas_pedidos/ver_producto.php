<?php
// Incluir conexión a la base de datos
include '../backend/conexion.php';

// Obtener el ID del producto desde la URL
$producto_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Si el ID no es numérico, podría ser el slug del producto
// Por ahora, vamos a crear datos de demostración para que funcione
$producto = null;

if (is_numeric($producto_id)) {
    // Buscar por ID en la base de datos
    $sql = "SELECT p.id, p.nombre, p.precio, p.caracteristicas_basicas, 
                   p.caracteristicas_tecnicas, p.imagen, p.stock, p.costo,
                   sc.descripcion AS subcategoria
            FROM productos p
            LEFT JOIN subcategorias sc ON p.subcategoria_id = sc.id
            WHERE p.id = $producto_id";

    $resultado = $conn->query($sql);
    
    if ($resultado && $resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
    }
} else {
    // Si no es numérico, buscar por nombre (slug)
    $nombreProducto = urldecode($producto_id);
    
    // Datos de demostración para los productos del catálogo
    $productosDemo = [
        'nintendo-switch-2' => [
            'id' => 1,
            'nombre' => 'Nintendo Switch 2 + Mario Kart',
            'precio' => 1499900,
            'caracteristicas_basicas' => 'Consola de videojuegos Nintendo Switch 2, Gráficos mejorados, Mayor duración de batería, Compatibilidad con juegos anteriores',
            'caracteristicas_tecnicas' => 'Pantalla OLED 7 pulgadas, Procesador personalizado, 64GB almacenamiento interno, Compatibilidad con Joy-Con mejorados',
            'imagen' => 'imagenes/nintendo.png',
            'stock' => 15,
            'costo' => 1200000,
            'subcategoria' => 'Consolas'
        ],
        'asus-vivobook-16' => [
            'id' => 2,
            'nombre' => 'Portátil ASUS Vivobook 16',
            'precio' => 3549900,
            'caracteristicas_basicas' => 'Procesador Intel Core i5-1235U, 8GB RAM, 512GB SSD, Pantalla Full HD, Batería de larga duración',
            'caracteristicas_tecnicas' => 'Pantalla 16 pulgadas Full HD 1920x1200, Intel Core i5-1235U, 8GB DDR5, 512GB SSD NVMe, Gráficos Intel Iris Xe',
            'imagen' => 'imagenes/Asus.png',
            'stock' => 8,
            'costo' => 2000000,
            'subcategoria' => 'Portátiles'
        ],
        'motorola-edge-50-fusion' => [
            'id' => 3,
            'nombre' => 'Motorola Edge 50 Fusion',
            'precio' => 999900,
            'caracteristicas_basicas' => 'Pantalla OLED 144Hz, Cámara de 50MP con OIS, Carga rápida 68W, Procesador Snapdragon',
            'caracteristicas_tecnicas' => 'Pantalla 6.7 pulgadas OLED, Snapdragon 8s Gen 3, 256GB almacenamiento, Cámara frontal 32MP, Triple cámara trasera',
            'imagen' => 'imagenes/celular.png',
            'stock' => 12,
            'costo' => 700000,
            'subcategoria' => 'Celulares'
        ],
        'insta360-ace-pro-2' => [
            'id' => 4,
            'nombre' => 'Cámara Insta360 Ace Pro 2',
            'precio' => 1679726,
            'caracteristicas_basicas' => 'Video 8K, Estabilización FlowState, Resistente al agua, Pantalla táctil abatible',
            'caracteristicas_tecnicas' => 'Sensor 1/1.3", Lente Leica, Batería 1650mAh, IA integrada para reducción de ruido',
            'imagen' => 'imagenes/camaraa.png',
            'stock' => 5,
            'costo' => 1400000,
            'subcategoria' => 'Accesorios'
        ],
        'asus-intel-core-i9' => [
            'id' => 5,
            'nombre' => 'Portátil ASUS Intel Core i9',
            'precio' => 3469900,
            'caracteristicas_basicas' => 'Potencia extrema con Core i9, Diseño elegante, Pantalla de alta resolución',
            'caracteristicas_tecnicas' => 'Intel Core i9-13900H, 16GB RAM, 1TB SSD, Gráficos Intel Iris Xe',
            'imagen' => 'imagenes/Asus.png',
            'stock' => 3,
            'costo' => 2800000,
            'subcategoria' => 'Portátiles'
        ],
        'msi-katana-17-3' => [
            'id' => 6,
            'nombre' => 'Portátil Gamer MSI Katana 17.3"',
            'precio' => 12499000,
            'caracteristicas_basicas' => 'Rendimiento gaming superior, Teclado RGB, Refrigeración Cooler Boost 5',
            'caracteristicas_tecnicas' => 'Pantalla 17.3" 144Hz, Intel Core i7-13620H, RTX 4060 8GB, 16GB RAM, 1TB SSD',
            'imagen' => 'imagenes/msi.png',
            'stock' => 2,
            'costo' => 10000000,
            'subcategoria' => 'Portátiles'
        ],
        'kalley-atletico-combo' => [
            'id' => 7,
            'nombre' => 'Combo Kalley Atlléntrico Teclado',
            'precio' => 199900,
            'caracteristicas_basicas' => 'Teclado mecánico, Iluminación RGB, Mouse ergonómico incluido',
            'caracteristicas_tecnicas' => 'Switches azules, 104 teclas, Mouse 3200 DPI, Cable trenzado',
            'imagen' => 'imagenes/Combo Teclado.png',
            'stock' => 20,
            'costo' => 120000,
            'subcategoria' => 'Accesorios'
        ],
        'ps5-digital-slim' => [
            'id' => 8,
            'nombre' => 'Consola PS5 Digital 1TB Slim',
            'precio' => 2599000,
            'caracteristicas_basicas' => 'Diseño Slim más ligero, Almacenamiento SSD ultrarrápido, Sin unidad de disco',
            'caracteristicas_tecnicas' => 'SSD 1TB, Soporte 4K 120Hz, Audio 3D Tempest, Control DualSense',
            'imagen' => 'imagenes/play5.png',
            'stock' => 10,
            'costo' => 2100000,
            'subcategoria' => 'Consolas'
        ],
        'lenovo-ideacentre' => [
            'id' => 9,
            'nombre' => 'Computador All In One LENOVO IdeaCentre AIO',
            'precio' => 3599000,
            'caracteristicas_basicas' => 'Diseño todo en uno ahorra espacio, Pantalla amplia, Ideal para hogar y oficina',
            'caracteristicas_tecnicas' => 'Pantalla 23.8" FHD, AMD Ryzen 5, 8GB RAM, 512GB SSD, Teclado y mouse incluidos',
            'imagen' => 'imagenes/lenovo.png',
            'stock' => 6,
            'costo' => 2900000,
            'subcategoria' => 'Computadores'
        ]
    ];
    
    if (isset($productosDemo[$nombreProducto])) {
        $producto = $productosDemo[$nombreProducto];
    }
}

// Si no se encontró producto, mostrar error
if (!$producto) {
    $producto = [
        'id' => $producto_id,
        'nombre' => 'Producto no encontrado',
        'precio' => 0,
        'caracteristicas_basicas' => 'No hay información disponible para este producto',
        'caracteristicas_tecnicas' => '',
        'imagen' => '',
        'stock' => 0,
        'costo' => 0,
        'subcategoria' => 'Tecnología'
    ];
    $noEncontrado = true;
} else {
    $noEncontrado = false;
}

// Consulta para obtener las calificaciones/reseñas del producto (si existe en BD)
$calificaciones = [];
$promedio_calificacion = 0;
$total_calificaciones = 0;

if (isset($conn) && is_numeric($producto_id)) {
    $sql_calificaciones = "SELECT c.puntuacion, c.comentario, c.estado, c.created_at,
                                  u.nombre AS usuario_nombre
                           FROM calificaciones c
                           LEFT JOIN usuarios u ON c.usuario_id = u.id
                           WHERE c.producto_id = $producto_id AND c.estado = 'aprobado'
                           ORDER BY c.created_at DESC";

    $resultado_califaciones = $conn->query($sql_calificaciones);
    
    if ($resultado_califaciones && $resultado_califaciones->num_rows > 0) {
        $suma_puntuacion = 0;
        while ($fila = $resultado_califaciones->fetch_assoc()) {
            $calificaciones[] = $fila;
            $suma_puntuacion += intval($fila['puntuacion']);
        }
        $total_calificaciones = count($calificaciones);
        $promedio_calificacion = $total_calificaciones > 0 ? round($suma_puntuacion / $total_calificaciones, 1) : 0;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($producto['nombre']); ?> - TAM</title>
    
    <!-- Fuentes -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Estilos principales -->
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="header-footer.css">
    
    <style>
        /* ==================== CONTENEDOR PRINCIPAL ==================== */
        .producto-detalle-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
        }

        /* ==================== BREADCRUMB ==================== */
        .breadcrumb {
            display: flex;
            gap: 8px;
            margin-bottom: 30px;
            font-size: 0.9rem;
            color: #666;
        }

        .breadcrumb a {
            color: #0d47a1;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* ==================== LAYOUT PRINCIPAL ==================== */
        .producto-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        /* ==================== SECCIÓN DE IMAGEN ==================== */
        .producto-imagen-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .imagen-principal {
            width: 100%;
            height: 500px;
            background: #f5f5f5;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .imagen-principal img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* ==================== SECCIÓN DE INFORMACIÓN ==================== */
        .producto-info-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .categoria-badge {
            display: inline-block;
            background: #0d47a1;
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            width: fit-content;
        }

        .producto-titulo {
            font-size: 2rem;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.2;
            margin: 0;
        }

        /* ==================== CALIFICACIÓN ==================== */
        .calificacion-section {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .estrellas {
            color: #ffd700;
            font-size: 1.3rem;
            letter-spacing: 2px;
        }

        .calificacion-texto {
            color: #666;
            font-size: 0.95rem;
        }

        /* ==================== PRECIO ==================== */
        .precio-section {
            display: flex;
            align-items: baseline;
            gap: 15px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .precio-actual {
            font-size: 2.5rem;
            font-weight: 900;
            color: #f44336;
        }

        .precio-original {
            font-size: 1.2rem;
            color: #999;
            text-decoration: line-through;
        }

        .descuento-badge {
            background: #ff5252;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-left: auto;
        }

        /* ==================== STOCK ==================== */
        .stock-section {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            background: #e8f5e9;
            border-radius: 8px;
            color: #2e7d32;
            font-weight: 600;
        }

        .stock-section.bajo {
            background: #fff3e0;
            color: #f57c00;
        }

        .stock-section.agotado {
            background: #ffebee;
            color: #c62828;
        }

        /* ==================== CARACTERÍSTICAS ==================== */
        .caracteristicas-section {
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .caracteristicas-section h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #1a1a1a;
        }

        .caracteristicas-lista {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .caracteristicas-lista li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            color: #555;
            font-size: 0.95rem;
            display: flex;
            gap: 10px;
        }

        .caracteristicas-lista li:before {
            content: "✓";
            color: #4CAF50;
            font-weight: bold;
            min-width: 20px;
        }

        /* ==================== BOTONES DE ACCIÓN ==================== */
        .botones-accion {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-principal {
            flex: 1;
            min-width: 150px;
            padding: 15px 25px;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-agregar-carrito {
            background: #f44336;
            color: white;
            flex: 2;
        }

        .btn-agregar-carrito:hover {
            background: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(244, 67, 54, 0.4);
        }

        .btn-agregar-carrito:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .btn-favorito {
            background: #f5f5f5;
            color: #f44336;
            border: 2px solid #f44336;
            flex: 1;
        }

        .btn-favorito:hover {
            background: #f44336;
            color: white;
            transform: scale(1.05);
        }

        .btn-favorito.activo {
            background: #f44336;
            color: white;
        }

        /* ==================== SECCIÓN DE RESEÑAS ==================== */
        .reseñas-container {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 2px solid #eee;
        }

        .reseñas-titulo {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 30px;
            color: #1a1a1a;
        }

        .resumen-calificaciones {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .tarjeta-resumen {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .promedio-grande {
            font-size: 3rem;
            font-weight: 900;
            color: #0d47a1;
            margin-bottom: 10px;
        }

        .estrellas-promedio {
            color: #ffd700;
            font-size: 1.5rem;
            margin-bottom: 10px;
            letter-spacing: 3px;
        }

        .total-reseñas {
            color: #666;
            font-size: 0.9rem;
        }

        /* ==================== LISTADO DE RESEÑAS ==================== */
        .reseñas-lista {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .reseña-item {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border-left: 4px solid #0d47a1;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .reseña-item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .reseña-encabezado {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .reseña-usuario {
            font-weight: 700;
            color: #1a1a1a;
            font-size: 1.05rem;
        }

        .reseña-fecha {
            color: #999;
            font-size: 0.85rem;
        }

        .reseña-estrellas {
            color: #ffd700;
            font-size: 1.1rem;
            letter-spacing: 2px;
        }

        .reseña-texto {
            color: #555;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .sin-reseñas {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .sin-reseñas i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ddd;
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 768px) {
            .producto-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .imagen-principal {
                height: 300px;
            }

            .producto-titulo {
                font-size: 1.5rem;
            }

            .precio-actual {
                font-size: 2rem;
            }

            .botones-accion {
                flex-direction: column;
            }

            .btn-principal {
                min-width: unset;
                flex: 1;
            }

            .resumen-calificaciones {
                grid-template-columns: 1fr;
            }
        }

        /* ==================== TOASTS Y MENSAJES ==================== */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 1000;
            animation: slideInUp 0.3s ease;
        }

        .toast.error {
            background: #f44336;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Estilo del link del header */
        .header {
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .header a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- HEADER SIMPLE -->
    <header class="header">
        <div style="display: flex; gap: 20px; align-items: center; flex: 1;">
            <a href="../index.html" style="font-size: 1.2rem; font-weight: 700; color: white; text-decoration: none;">
                <i class="fas fa-arrow-left"></i> TAM
            </a>
        </div>
        <div style="text-align: center; flex: 1;">
            <h2 style="margin: 0; font-size: 1.3rem; color: white;">Detalles del Producto</h2>
        </div>
        <div style="flex: 1;"></div>
    </header>

    <div class="producto-detalle-container">
        <?php if ($noEncontrado): ?>
        <div style="text-align: center; padding: 60px 20px;">
            <i class="fas fa-search" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
            <h2 style="color: #666;">Producto no encontrado</h2>
            <p style="color: #999; font-size: 1.1rem;">Intenta volver al catálogo para explorar otros productos.</p>
            <a href="../index.html" style="display: inline-block; margin-top: 20px; padding: 12px 30px; background: #0d47a1; color: white; border-radius: 8px; text-decoration: none; font-weight: 700;">
                <i class="fas fa-arrow-left"></i> Volver al Catálogo
            </a>
        </div>
        <?php else: ?>
        <!-- BREADCRUMB -->
        <nav class="breadcrumb">
            <a href="../index.html">Inicio</a>
            <span>/</span>
            <a href="../PROJECT/PROJECT/catalogo.html">Catálogo</a>
            <span>/</span>
            <span><?php echo htmlspecialchars($producto['nombre']); ?></span>
        </nav>

        <!-- LAYOUT PRINCIPAL -->
        <div class="producto-layout">
            <!-- SECCIÓN DE IMAGEN -->
            <div class="producto-imagen-section">
                <div class="imagen-principal">
                    <img src="<?php echo !empty($producto['imagen']) ? '../' . htmlspecialchars($producto['imagen']) : 'https://via.placeholder.com/400x400?text=' . urlencode($producto['nombre']); ?>" 
                         alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                         onerror="this.src='https://via.placeholder.com/400x400?text=<?php echo urlencode($producto['nombre']); ?>'">
                </div>
            </div>

            <!-- SECCIÓN DE INFORMACIÓN -->
            <div class="producto-info-section">
                <!-- Categoría -->
                <span class="categoria-badge">
                    <i class="fas fa-tag"></i> <?php echo !empty($producto['subcategoria']) ? htmlspecialchars($producto['subcategoria']) : 'Tecnología'; ?>
                </span>

                <!-- Título -->
                <h1 class="producto-titulo"><?php echo htmlspecialchars($producto['nombre']); ?></h1>

                <!-- Calificación -->
                <div class="calificacion-section">
                    <div class="estrellas"><?php echo str_repeat('★', intval($promedio_calificacion)) . str_repeat('☆', 5 - intval($promedio_calificacion)); ?></div>
                    <span class="calificacion-texto">
                        <strong><?php echo $promedio_calificacion; ?></strong>/5 
                        (<?php echo $total_calificaciones; ?> <?php echo $total_calificaciones === 1 ? 'reseña' : 'reseñas'; ?>)
                    </span>
                </div>

                <!-- Precio -->
                <div class="precio-section">
                    <span class="precio-actual">$<?php echo number_format($producto['precio'], 0, ',', '.'); ?></span>
                    <?php if ($producto['costo'] > 0 && $producto['costo'] < $producto['precio']): ?>
                        <?php $descuento = round((1 - $producto['costo'] / $producto['precio']) * 100); ?>
                        <span class="precio-original">$<?php echo number_format($producto['costo'], 0, ',', '.'); ?></span>
                        <span class="descuento-badge">-<?php echo $descuento; ?>%</span>
                    <?php endif; ?>
                </div>

                <!-- Stock -->
                <div class="stock-section <?php echo $producto['stock'] == 0 ? 'agotado' : ($producto['stock'] < 5 ? 'bajo' : ''); ?>">
                    <i class="fas fa-box"></i>
                    <?php 
                    if ($producto['stock'] == 0) {
                        echo "Producto agotado";
                    } elseif ($producto['stock'] < 5) {
                        echo "¡Últimas " . $producto['stock'] . " unidades disponibles!";
                    } else {
                        echo "Stock disponible: " . $producto['stock'] . " unidades";
                    }
                    ?>
                </div>

                <!-- Características Básicas -->
                <?php if (!empty($producto['caracteristicas_basicas'])): ?>
                <div class="caracteristicas-section">
                    <h3><i class="fas fa-check-circle"></i> Características Principales</h3>
                    <ul class="caracteristicas-lista">
                        <?php 
                        $caracteristicas = array_filter(array_map('trim', explode(',', $producto['caracteristicas_basicas'])));
                        foreach ($caracteristicas as $caracteristica): 
                        ?>
                            <li><?php echo htmlspecialchars($caracteristica); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Botones de Acción -->
                <div class="botones-accion">
                    <button class="btn-principal btn-agregar-carrito" id="btnAgregarCarrito" 
                            <?php echo $producto['stock'] == 0 ? 'disabled' : ''; ?>>
                        <i class="fas fa-cart-plus"></i> 
                        <?php echo $producto['stock'] == 0 ? 'Agotado' : 'Agregar al Carrito'; ?>
                    </button>
                    <button class="btn-principal btn-favorito" id="btnFavorito">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- CARACTERÍSTICAS TÉCNICAS EXPANDIDAS -->
        <?php if (!empty($producto['caracteristicas_tecnicas'])): ?>
        <section class="caracteristicas-section" style="margin: 40px 0; grid-column: 1/-1;">
            <h3><i class="fas fa-microchip"></i> Especificaciones Técnicas</h3>
            <ul class="caracteristicas-lista">
                <?php 
                $caracteristicas_tecnicas = array_filter(array_map('trim', explode(',', $producto['caracteristicas_tecnicas'])));
                foreach ($caracteristicas_tecnicas as $caracteristica): 
                ?>
                    <li><?php echo htmlspecialchars($caracteristica); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php endif; ?>

        <!-- SECCIÓN DE RESEÑAS -->
        <section class="reseñas-container">
            <h2 class="reseñas-titulo"><i class="fas fa-star"></i> Reseñas y Calificaciones</h2>

            <!-- Resumen de Calificaciones -->
            <div class="resumen-calificaciones">
                <div class="tarjeta-resumen">
                    <div class="promedio-grande"><?php echo $promedio_calificacion; ?></div>
                    <div class="estrellas-promedio"><?php echo str_repeat('★', intval($promedio_calificacion)) . str_repeat('☆', 5 - intval($promedio_calificacion)); ?></div>
                    <div class="total-reseñas"><?php echo $total_calificaciones; ?> calificaciones</div>
                </div>

                <div class="tarjeta-resumen">
                    <h3 style="margin: 0 0 15px 0; color: #0d47a1;">Recomendación</h3>
                    <p style="font-size: 1.5rem; font-weight: 700; color: #4CAF50; margin: 0;">
                        <?php echo $promedio_calificacion >= 4 ? '✓ Altamente Recomendado' : ($promedio_calificacion >= 3 ? '✓ Recomendado' : '⚠ Consulte más detalles'); ?>
                    </p>
                </div>
            </div>

            <!-- Listado de Reseñas -->
            <div class="reseñas-lista">
                <?php if (count($calificaciones) > 0): ?>
                    <?php foreach ($calificaciones as $reseña): ?>
                    <div class="reseña-item">
                        <div class="reseña-encabezado">
                            <div>
                                <div class="reseña-usuario"><?php echo htmlspecialchars($reseña['usuario_nombre'] ?? 'Usuario Anónimo'); ?></div>
                                <div class="reseña-fecha"><?php echo date('d/m/Y', strtotime($reseña['created_at'])); ?></div>
                            </div>
                            <div class="reseña-estrellas"><?php echo str_repeat('★', intval($reseña['puntuacion'])) . str_repeat('☆', 5 - intval($reseña['puntuacion'])); ?></div>
                        </div>
                        <p class="reseña-texto"><?php echo htmlspecialchars($reseña['comentario']); ?></p>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="sin-reseñas">
                        <i class="fas fa-comments"></i>
                        <h3>Sin reseñas aún</h3>
                        <p>Sé el primero en dejar una reseña sobre este producto</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <!-- Script para agregar al carrito y favoritos -->
    <script>
        const productoId = <?php echo json_encode($producto['id'] ?? $producto_id); ?>;
        const productoNombre = <?php echo json_encode($producto['nombre'] ?? ''); ?>;
        const productoPrecio = <?php echo json_encode($producto['precio'] ?? 0); ?>;
        const productoImagen = <?php echo json_encode($producto['imagen'] ?? ''); ?>;

        // Función para mostrar notificaciones
        function mostrarToast(mensaje, tipo = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${tipo === 'error' ? 'error' : ''}`;
            toast.textContent = mensaje;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Botón Agregar al Carrito
        document.getElementById('btnAgregarCarrito').addEventListener('click', function() {
            // Obtener carrito del localStorage
            let carrito = JSON.parse(localStorage.getItem('tamCart')) || [];
            
            // Verificar si el producto ya está en el carrito
            const productoExistente = carrito.find(p => p.id === productoId);
            
            if (productoExistente) {
                productoExistente.quantity += 1;
            } else {
                carrito.push({
                    id: productoId,
                    name: productoNombre,
                    priceNow: '$ ' + productoPrecio,
                    quantity: 1,
                    image: productoImagen || 'https://via.placeholder.com/300x200?text=' + encodeURIComponent(productoNombre)
                });
            }
            
            // Guardar carrito actualizado
            localStorage.setItem('tamCart', JSON.stringify(carrito));
            
            mostrarToast('✓ Producto agregado al carrito correctamente');
            
            // Cambiar el estilo del botón
            this.classList.add('activo');
            this.innerHTML = '<i class="fas fa-check"></i> Agregado al Carrito';
            
            setTimeout(() => {
                this.classList.remove('activo');
                this.innerHTML = '<i class="fas fa-cart-plus"></i> Agregar al Carrito';
            }, 2000);
        });

        // Botón Favorito
        document.getElementById('btnFavorito').addEventListener('click', function() {
            this.classList.toggle('activo');
            
            if (this.classList.contains('activo')) {
                mostrarToast('❤️ Agregado a favoritos');
            } else {
                mostrarToast('Eliminado de favoritos');
            }
        });
    </script>
        <?php endif; ?>
</body>
</html>
