<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: productos.php');
    exit;
}
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Registro</h2>
    <?php if ($error): ?><p class="message error"><?=htmlspecialchars($error)?></p><?php endif; ?>
    <form action="../backend/register_backend.php" method="post">
        <label>Nombre:<br><input type="text" name="nombre" required></label><br>
        <label>Email:<br><input type="email" name="email" required></label><br>
        <label>Contraseña:<br><input type="password" name="password" required></label><br>
        <button type="submit">Registrar</button>
    </form>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</body>
</html>