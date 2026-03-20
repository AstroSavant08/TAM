<?php
session_start();
echo "<h1>Diagnóstico del Catálogo</h1>";

// 1. Verificar conexión a la base de datos
echo "<h2>1. Conexión a Base de Datos</h2>";
require_once __DIR__ . '/../backend/conexion.php';
if (isset($conn) && $conn->connect_errno === 0) {
    echo "<p style='color: green;'><strong>✓ Conexión a BD exitosa</strong></p>";
    echo "<p>Base de datos: {$conn->current_user}</p>";
} else {
    echo "<p style='color: red;'><strong>✗ Error de conexión a BD</strong></p>";
    echo "<p>{$conn->connect_error}</p>";
    die();
}

// 2. Verificar que la tabla productos existe
echo "<h2>2. Tabla de Productos</h2>";
$result = $conn->query("SHOW TABLES LIKE 'productos'");
if ($result && $result->num_rows > 0) {
    echo "<p style='color: green;'><strong>✓ Tabla 'productos' existe</strong></p>";
    
    // Contar registros
    $count = $conn->query("SELECT COUNT(*) as total FROM productos");
    $row = $count->fetch_assoc();
    echo "<p>Total de productos: <strong>{$row['total']}</strong></p>";
    
    // Mostrar estructura
    echo "<h3>Estructura de la tabla:</h3>";
    $structure = $conn->query("DESCRIBE productos");
    echo "<table border='1' cellpadding='5'>";
    while ($field = $structure->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$field['Field']}</td>";
        echo "<td>{$field['Type']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='color: red;'><strong>✗ Tabla 'productos' no existe</strong></p>";
}

// 3. Probar consulta
echo "<h2>3. Consulta de Productos</h2>";
$sql = 'SELECT id, nombre, precio, caracteristicas FROM productos LIMIT 5';
$result = $conn->query($sql);
if ($result) {
    if ($result->num_rows > 0) {
        echo "<p style='color: green;'><strong>✓ Consulta exitosa</strong></p>";
        echo "<p>Primeros 5 productos:</p>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>\${$row['precio']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'><strong>⚠ No hay productos en la tabla</strong></p>";
    }
} else {
    echo "<p style='color: red;'><strong>✗ Error en consulta: " . $conn->error . "</strong></p>";
}

// 4. Verificar archivos del proyecto
echo "<h2>4. Archivos del Proyecto</h2>";
$files = [
    '/catalogo/index.php',
    '/catalogo/PROJECT/catalogo.php',
    '/catalogo/PROJECT/catalogo.css',
    '/backend/conexion.php',
];
foreach ($files as $file) {
    $path = __DIR__ . '/..' . $file;
    if (file_exists($path)) {
        echo "<p style='color: green;'><strong>✓</strong> $file existe</p>";
    } else {
        echo "<p style='color: red;'><strong>✗</strong> $file NO existe</p>";
    }
}

echo "<h2>5. URL Base Calculada</h2>";
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . 
           '://' . $_SERVER['HTTP_HOST'] . '/academia';
echo "<p>URL Base: <code>$baseUrl</code></p>";
?>
