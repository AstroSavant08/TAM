<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - TAM</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="login-card">
        <div class="login-header">
            <img src="vistas_pedidos/uploads/logo.png" alt="TAM Logo" onerror="this.src='https://via.placeholder.com/120x50/0d47a1/ffffff?text=TAM'" style="max-height: 50px; background: #0d47a1; padding: 5px; border-radius: 4px;">
        </div>

        <h2 style="text-align: center; margin-bottom: 20px;">Restablecer Contraseña</h2>

        <form id="resetForm" class="auth-form active">
            <div class="form-group">
                <label>Nueva Contraseña</label>
                <input type="password" id="newPassword" required placeholder="Ingresa tu nueva contraseña">
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" id="confirmPassword" required placeholder="Confirma tu nueva contraseña">
            </div>
            <button type="submit" class="btn-block">Restablecer Contraseña</button>
            <p id="resetMessage" class="message"></p>
            <a href="login.html" class="forgot-password-link">Volver al Login</a>
        </form>
    </div>

    <script>
        // Obtener token de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');

        if (!token) {
            document.getElementById('resetMessage').className = 'message error';
            document.getElementById('resetMessage').textContent = 'Token inválido o expirado.';
            document.getElementById('resetForm').style.display = 'none';
        }

        document.getElementById('resetForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const msg = document.getElementById('resetMessage');

            if (newPassword !== confirmPassword) {
                msg.className = 'message error';
                msg.textContent = 'Las contraseñas no coinciden.';
                return;
            }

            if (newPassword.length < 6) {
                msg.className = 'message error';
                msg.textContent = 'La contraseña debe tener al menos 6 caracteres.';
                return;
            }

            // Enviar al backend
            fetch('backend/reset_password.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ token: token, password: newPassword })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    msg.className = 'message success';
                    msg.textContent = 'Contraseña restablecida exitosamente. Redirigiendo al login...';
                    setTimeout(() => window.location.href = 'login.html', 2000);
                } else {
                    msg.className = 'message error';
                    msg.textContent = data.message;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                msg.className = 'message error';
                msg.textContent = 'Error de conexión.';
            });
        });
    </script>
</body>
</html></content>
<parameter name="filePath">c:\xampp\htdocs\academia\reset_password.php