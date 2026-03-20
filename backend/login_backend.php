<?php
session_start();
include 'conexion.php';

// Configurar el tipo de respuesta como JSON
header('Content-Type: application/json; charset=utf-8');

// Manejar errores sin mostrarlos en la respuesta
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

// Escapar datos para evitar SQL injection
$user = mysqli_real_escape_string($conn, $user);

// Buscar usuario en la base de datos
$query = "SELECT id, user_name, password FROM usuarios WHERE user_name = '$user' LIMIT 1";
$result = $conn->query($query);

if (!$result) {
    // Error en la consulta
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $conn->error]);
    exit;
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Verificar contraseña (soporta password_hash y texto plano)
    $passwordCorrect = false;
    
    if (password_verify($pass, $row['password'])) {
        $passwordCorrect = true;
    } elseif ($pass === $row['password']) {
        // Si está en texto plano, aceptar
        $passwordCorrect = true;
    }
    
    if ($passwordCorrect) {
        // Login exitoso
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['user_name'];
        
        // Crear una cookie para persistencia adicional
        setcookie('user_token', $row['id'], time() + (86400 * 30), '/');
        
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'id' => $row['id'],
            'username' => $row['user_name'],
            'message' => 'Login exitoso'
        ]);
    } else {
        // Contraseña incorrecta
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta']);
    }
} else {
    // Usuario no existe
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
}

$conn->close();
?>