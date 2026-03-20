<?php
// Script de prueba para validar login y registro
session_start();
include 'backend/conexion.php';

header('Content-Type: text/html; charset=utf-8');

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Prueba de Autenticación TAM</title>
    <style>
        body { font-family: Roboto, Arial; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; }
        h2 { color: #0d47a1; border-bottom: 2px solid #0d47a1; padding-bottom: 10px; }
        .section { margin: 20px 0; }
        .success { background: #d4edda; border-left: 4px solid #28a745; padding: 10px; margin: 10px 0; }
        .error { background: #f8d7da; border-left: 4px solid #dc3545; padding: 10px; margin: 10px 0; }
        .info { background: #d1ecf1; border-left: 4px solid #17a2b8; padding: 10px; margin: 10px 0; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        td, th { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #0d47a1; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .test { margin: 10px 0; padding: 10px; background: #fffbea; border: 1px solid #ffc107; }
        code { background: #f5f5f5; padding: 2px 4px; border-radius: 3px; }
    </style>
</head>
<body>
<div class='container'>";

// 1. PRUEBA DE CONEXIÓN
echo "<h2>1️⃣ PRUEBA DE CONEXIÓN A BASE DE DATOS</h2>";
if ($conn->connect_error) {
    echo "<div class='error'>❌ Error de conexión: " . $conn->connect_error . "</div>";
} else {
    echo "<div class='success'>✅ Conexión exitosa a base de datos <code>proyectotam</code></div>";
}

// 2. VERIFICAR USUARIOS EXISTENTES
echo "<h2>2️⃣ USUARIOS EXISTENTES EN LA BASE DE DATOS</h2>";
$result = $conn->query("SELECT id, nombre, user_name, email, fecha_registro FROM usuarios ORDER BY id");
if ($result) {
    echo "<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Fecha Registro</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['nombre']) . "</td>
            <td><code>" . htmlspecialchars($row['user_name']) . "</code></td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['fecha_registro']) . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<div class='error'>❌ Error al consultar usuarios: " . $conn->error . "</div>";
}

// 3. PRUEBA DE LOGIN CON USUARIO EXISTENTE
echo "<h2>3️⃣ PRUEBA DE LOGIN - Usuario acostam25</h2>";
echo "<div class='test'>";

// Simular el login
$testUser = 'acostam25';
$testPass = 'acosta.2005';

$stmt = $conn->prepare("SELECT id, user_name, password FROM usuarios WHERE user_name = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("s", $testUser);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar contraseña
        $passwordCorrect = false;
        if (password_verify($testPass, $row['password'])) {
            $passwordCorrect = true;
        } elseif ($testPass === $row['password']) {
            $passwordCorrect = true;
        }
        
        if ($passwordCorrect) {
            echo "<div class='success'>✅ LOGIN EXITOSO</div>";
            echo "<div class='info'>
                <strong>ID:</strong> " . htmlspecialchars($row['id']) . "<br>
                <strong>Usuario:</strong> " . htmlspecialchars($row['user_name']) . "<br>
                <strong>Contraseña guardada como:</strong> " . (strlen($row['password']) > 20 ? 'password_hash()' : 'texto plano') . "
            </div>";
        } else {
            echo "<div class='error'>❌ CONTRASEÑA INCORRECTA</div>";
        }
    } else {
        echo "<div class='error'>❌ Usuario no encontrado</div>";
    }
    $stmt->close();
} else {
    echo "<div class='error'>❌ Error al preparar consulta: " . $conn->error . "</div>";
}
echo "</div>";

// 4. PRUEBA DE ESTRUCTURA DE BASE DE DATOS
echo "<h2>4️⃣ ESTRUCTURA DE TABLA USUARIOS</h2>";
$result = $conn->query("DESCRIBE usuarios");
if ($result) {
    echo "<table>
        <tr>
            <th>Campo</th>
            <th>Tipo</th>
            <th>Nulo</th>
            <th>Clave</th>
            <th>Predeterminado</th>
            <th>Extra</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td><code>" . htmlspecialchars($row['Field']) . "</code></td>
            <td>" . htmlspecialchars($row['Type']) . "</td>
            <td>" . htmlspecialchars($row['Null']) . "</td>
            <td>" . htmlspecialchars($row['Key']) . "</td>
            <td>" . htmlspecialchars($row['Default'] ?? '-') . "</td>
            <td>" . htmlspecialchars($row['Extra']) . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<div class='error'>❌ Error: " . $conn->error . "</div>";
}

// 5. INFORMACIÓN DE REGISTRO
echo "<h2>5️⃣ INSTRUCCIONES PARA REGISTRAR NUEVOS USUARIOS</h2>";
echo "<div class='info'>
    <strong>Método:</strong> POST a <code>/academia/backend/register_backend.php</code><br>
    <strong>Campos requeridos:</strong>
    <ul>
        <li><code>nombre</code> - Nombre completo (texto)</li>
        <li><code>identificacion</code> - Cédula o ID (número)</li>
        <li><code>email</code> - Email válido</li>
        <li><code>username</code> - Nombre de usuario único</li>
        <li><code>password</code> - Contraseña (mínimo 6 caracteres recomendado)</li>
    </ul>
    <strong>Nota:</strong> El campo <code>fecha_nacimiento</code> en el formulario es opcional (se ignora en backend).<br>
    La contraseña se encripta automáticamente con <code>password_hash()</code>.<br>
    El registro se redirige a <code>index.html</code> si es exitoso.
</div>";

// 6. ENDPOINT DE PRUEBA
echo "<h2>6️⃣ PRUEBA DE ENDPOINT DE REGISTRO</h2>";
echo "<div class='test'>
    <form method='POST' action='backend/register_backend.php'>
        <input type='hidden' name='_json' value='1'>
        <p>
            <a href='javascript:void(0)' onclick=\"
                fetch('backend/register_backend.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        nombre: 'Usuario Prueba',
                        identificacion: '9999999999',
                        email: 'prueba' + Date.now() + '@test.com',
                        username: 'prueba_' + Date.now(),
                        password: 'prueba123'
                    })
                })
                .then(r => r.json())
                .then(r => alert(JSON.stringify(r, null, 2)))
                .catch(e => alert('Error: ' + e))
            \">Crear usuario de prueba (click aquí)</a>
        </p>
    </form>
</div>";

echo "<h2>7️⃣ ACCESO A LA PLATAFORMA</h2>";
echo "<div class='info'>
    <p>📍 <strong>Ir a Login:</strong> <a href='/academia/login.html' target='_blank'>/academia/login.html</a></p>
    <p>📍 <strong>Ir a Inicio:</strong> <a href='/academia/index.html' target='_blank'>/academia/index.html</a></p>
    <p>📍 <strong>Ir a Catálogo:</strong> <a href='/academia/?page=catalogo' target='_blank'>/academia/?page=catalogo</a></p>
</div>";

echo "</div>
</body>
</html>";

$conn->close();
?>
