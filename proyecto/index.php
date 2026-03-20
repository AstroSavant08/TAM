<?php
// página de inicio, redirige a productos si hay sesión, sino a login
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: frontend/productos.php');
} else {
    header('Location: frontend/login.php');
}
exit;
