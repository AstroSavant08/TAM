<?php
session_start();
// gestionar logout si se solicita
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}
// si ya está logueado redirigir
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
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if ($error): ?><p class="message error"><?=htmlspecialchars($error)?></p><?php endif; ?>
    <form action="../backend/login_backend.php" method="post">
        <label>Email:<br><input type="email" name="email" required></label><br>
        <label>Contraseña:<br><input type="password" name="password" required></label><br>
        <button type="submit">Ingresar</button>
    </form>
    <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
</body>
</html>