<?php
// Script para probar login y registro directamente
include 'backend/conexion.php';

header('Content-Type: application/json');

// PRUEBA 1: LOGIN CON USUARIO EXISTENTE
echo "<!-- PRUEBA 1: LOGIN -->\n";

$testUsername = 'acostam25';
$testPassword = 'acosta.2005';

$stmt = $conn->prepare("SELECT id, user_name, password FROM usuarios WHERE user_name = ? LIMIT 1");
$stmt->bind_param("s", $testUsername);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    if (password_verify($testPassword, $user['password']) || $testPassword === $user['password']) {
        echo json_encode([
            'test' => 'LOGIN EXITOSO',
            'usuario' => $testUsername,
            'contrasena' => $testPassword,
            'success' => true,
            'id' => $user['id']
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            'test' => 'LOGIN FALLIDO',
            'usuario' => $testUsername,
            'razon' => 'Contraseña incorrecta'
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode([
        'test' => 'LOGIN FALLIDO',
        'usuario' => $testUsername,
        'razon' => 'Usuario no encontrado'
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

echo "\n\n";
$stmt->close();

// PRUEBA 2: VERIFICAR QUÉ USUARIOS PUEDEN INGRESAR
echo "<!-- PRUEBA 2: USUARIOS Y SUS CONTRASEÑAS -->\n";

$allUsers = $conn->query("SELECT id, nombre, user_name, password FROM usuarios");

echo json_encode([
    'test' => 'USUARIOS EN BD',
    'usuarios' => $allUsers->fetch_all(MYSQLI_ASSOC)
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo "\n\n";

// PRUEBA 3: INTENTAR REGISTRAR UN NUEVO USUARIO
echo "<!-- PRUEBA 3: REGISTRO DE NUEVO USUARIO -->\n";

$newUser = [
    'nombre' => 'Usuario Test ' . time(),
    'identificacion' => '9999999999' . rand(10, 99),
    'email' => 'test' . time() . '@test.com',
    'username' => 'testuser' . time(),
    'password' => 'test123456'
];

// Verificar duplicados
$check = $conn->prepare("SELECT id FROM usuarios WHERE user_name = ? OR email = ? OR identificacion = ?");
$check->bind_param("sss", $newUser['username'], $newUser['email'], $newUser['identificacion']);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo json_encode([
        'test' => 'REGISTRO FALLIDO',
        'usuario' => $newUser['username'],
        'razon' => 'Ya existe'
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    // Insertar nuevo usuario
    $pass = password_hash($newUser['password'], PASSWORD_DEFAULT);
    $rol = 2;
    $estado = 1;
    $fecha = date('Y-m-d');
    
    $insert = $conn->prepare("INSERT INTO usuarios (nombre, identificacion, fecha_registro, email, user_name, password, rol_id, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insert->bind_param("ssssssii", $newUser['nombre'], $newUser['identificacion'], $fecha, $newUser['email'], $newUser['username'], $pass, $rol, $estado);
    
    if ($insert->execute()) {
        echo json_encode([
            'test' => 'REGISTRO EXITOSO',
            'usuario' => $newUser['username'],
            'email' => $newUser['email'],
            'contrasena' => $newUser['password'],
            'id' => $insert->insert_id
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            'test' => 'REGISTRO FALLIDO',
            'error' => $insert->error
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    $insert->close();
}
$check->close();

$conn->close();
?>
