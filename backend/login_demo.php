<?php
// login_demo.php - Versión de demostración que funciona sin BD
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Obtener datos del POST
$input = file_get_contents("php://input");
$data = json_decode($input);

// Validar que tenemos los datos necesarios
if (!isset($data->username) || !isset($data->password)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Usuario y contraseña requeridos']);
    exit;
}

$user = $data->username;
$pass = $data->password;

// USUARIOS DE DEMOSTRACIÓN (sin conexión a BD)
$usuariosDemo = [
    'acostam25' => [
        'id' => 2,
        'password' => 'acosta.2005',  // Contraseña en texto plano
        'nombre' => 'Jhoan Acosta'
    ],
    'test' => [
        'id' => 1,
        'password' => 'test123',
        'nombre' => 'Usuario Test'
    ],
    'admin' => [
        'id' => 3,
        'password' => 'admin123',
        'nombre' => 'Administrador'
    ]
];

// Verificar usuario y contraseña
if (isset($usuariosDemo[$user]) && $usuariosDemo[$user]['password'] === $pass) {
    // Login exitoso
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'id' => $usuariosDemo[$user]['id'],
        'username' => $user,
        'nombre' => $usuariosDemo[$user]['nombre'],
        'message' => 'Login exitoso'
    ]);
} else {
    // Credenciales inválidas
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Usuario o contraseña incorrectos'
    ]);
}
?>
