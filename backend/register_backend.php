<?php
include 'conexion.php';
header('Content-Type: application/json');
error_reporting(0); // Evitar que warnings rompan el JSON

$data = json_decode(file_get_contents("php://input"));

// Extraer datos del formulario
$nombre = $data->nombre ?? '';
$identificacion = $data->identificacion ?? '';
$fecha = $data->fecha_nacimiento ?? '';
$email = $data->email ?? '';
$user = $data->username ?? '';
$passPlain = $data->password ?? '';

// Validación básica de campos necesarios
if (empty($nombre) || empty($identificacion) || empty($user) || empty($passPlain)) {
    echo json_encode(['success' => false, 'message' => 'Faltan campos obligatorios.']);
    exit;
}

$pass = password_hash($passPlain, PASSWORD_DEFAULT); // Encriptar contraseña
$rol = 2; // Rol Cliente por defecto
$estado = 1; // Activo

// Verificar si el usuario, email o identificación ya existen
$check = $conn->prepare("SELECT id FROM usuarios WHERE user_name = ? OR email = ? OR identificacion = ?");
$check->bind_param("ssi", $user, $email, $identificacion);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'El usuario, correo o identificación ya están registrados.']);
} else {
    // Insertar nuevo usuario
    // La consulta SQL coincide con la estructura de tu tabla 'usuarios'
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, identificacion, fecha_nacimiento, email, user_name, password, rol_id, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Tipos: s=string, i=integer. Orden: nombre(s), id(i), fecha(s), email(s), user(s), pass(s), rol(i), estado(i)
    $stmt->bind_param("sissssii", $nombre, $identificacion, $fecha, $email, $user, $pass, $rol, $estado);
    
    if ($stmt->execute()) {
        // obtener id del nuevo usuario
        $newId = $stmt->insert_id;
        echo json_encode(['success' => true, 'username' => $user, 'id' => $newId]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $stmt->error]);
    }
    $stmt->close();
}
$check->close();
$conn->close();
?>