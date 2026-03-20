# 🚀 REFERENCIA RÁPIDA - Proyecto TAM

## 📍 Ubicación del Proyecto
```
C:\xampp\htdocs\academia\
```

---

## 🌐 URLs Principales

```
Inicio:        http://localhost/academia/
Catálogo:      http://localhost/academia/?page=catalogo
Carrito:       http://localhost/academia/?page=carrito
Login:         http://localhost/academia/?page=login
Contacto:      http://localhost/academia/?page=contacto
phpMyAdmin:    http://localhost/phpmyadmin/
```

---

## 📁 Estructura Básica

```
academia/
  ├── index.php ⭐ (PUNTO DE ENTRADA)
  ├── .htaccess (Configuración Apache)
  ├── backend/
  │   ├── conexion.php (Conexión BD)
  │   ├── login_backend.php
  │   ├── register_backend.php
  │   └── carrito.php
  ├── catalogo/
  │   └── PROJECT/
  │       ├── catalogo.php ✅ (Funcional)
  │       └── catalogo.js
  └── css/ (Estilos)
```

---

## 🗄️ Base de Datos

**Nombre**: `proyectotam`

**Tablas principales**:
- `usuarios` - Registro de usuarios
- `productos` - Catálogo de productos
- `categorias` - Categorías de productos
- `carrito_usuarios` - Carrito por usuario
- `calificaciones` - Reseñas y ratings

**Credenciales**:
```
Usuario: root
Contraseña: (vacío)
Host: 127.0.0.1
```

---

## ⚙️ Cómo Funciona el Enrutamiento

```
SOLICITUD: http://localhost/academia/?page=catalogo

         ↓

  Apache recibe la solicitud

         ↓

  .htaccess redirige a index.php

         ↓

  index.php lee: $_GET['page'] = 'catalogo'

         ↓

  index.php incluye: catalogo/PROJECT/catalogo.php

         ↓

  Usuario ve: Página del catálogo
```

---

## 💻 Código Rápido

### Obtener Base URL
```php
define('BASE_URL', 'http://localhost/academia/');
```

### Crear Enlaces
```php
<a href="<?= BASE_URL ?>?page=catalogo">Catálogo</a>
```

### Iniciar Sesión del Usuario
```php
session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $user_name;
```

### Conectar Base de Datos
```php
require 'backend/conexion.php';
// Ya tienes $conn disponible
```

### Hacer Consultas Seguras
```php
$stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
```

---

## 🔐 Seguridad - Dos Funciones Importantes

### Hashear Contraseña (Guardar)
```php
$password_hash = password_hash($password, PASSWORD_DEFAULT);
// Guarda en BD
```

### Verificar Contraseña (Login)
```php
if (password_verify($password_ingresada, $password_hash_bd)) {
    // ✅ Contraseña correcta
}
```

---

## 🎨 Colores del Proyecto

```
Azul Primario:   #0d47a1 (botones principales)
Azul Oscuro:     #002171 (hover)
Blanco:          #ffffff (texto sobre azul)
Gris Claro:      #f5f5f5 (fondos)
```

---

## 📋 Headers Básicos Requeridos

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto TAM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require 'vistas_pedidos/header.php'; ?>
    
    <!-- CONTENIDO AQUÍ -->
    
    <?php require 'vistas_pedidos/footer.php'; ?>
    <script src="script.js"></script>
</body>
</html>
```

---

## ✅ Procedimiento de Login

1. Usuario ingresa email/contraseña en `login.html`
2. Se envía a `backend/login_backend.php` (POST)
3. Valida `password_verify()` contra BD
4. Si es correcto, crea `$_SESSION`
5. Redirige a `?page=catalogo`

---

## 🛒 Procedimiento de Carrito

1. Usuario hace clic en "Agregar al carrito"
2. JavaScript envía solicitud AJAX a `backend/carrito.php`
3. `carrito.php` agrega producto a tabla `carrito_usuarios`
4. Usuario navega a `?page=carrito`
5. Se muestra lista desde BD

---

## 🐛 Debugging Rápido

### Ver errores PHP
Abre: http://localhost/phpmyadmin/phpinfo.php

### Ver BD
Ve a: http://localhost/phpmyadmin/
Usuario: root
Contraseña: (vacío)

### Ver Consola JavaScript
Presiona: F12 → Pestaña "Console"

### Ver Tráfico de Red
F12 → Pestaña "Network"
Recarga la página (Ctrl+F5)

---

## ⚡ Comandos Útiles (Terminal)

```bash
# Ir a la carpeta del proyecto
cd C:\xampp\htdocs\academia

# Ver archivos
dir

# Editar index.php
# (Usa cualquier editor de texto)
```

---

## 📝 Archivos de Documentación

- **ESTRUCTURA.md** → Documentación completa del proyecto
- **GUIA.html** → Guía visual interactiva (abrir en navegador)
- **CHECKLIST.md** → Validación de funcionamiento
- **REFERENCIA.md** ← Tú estás aquí (este documento)

---

## 🎯 Tareas Comunes

### Agregar una nueva página
1. Crea el archivo en la carpeta correspondiente
2. Edita `index.php`
3. Agrega línea en array `$pages`:
   ```php
   'mi-pagina' => 'mi-pagina.php',
   ```
4. Accede con: `?page=mi-pagina`

### Cambiar el diseño
- Editar: `css/style.css`
- Editar: `css/header.css`
- Editar: `css/estilos.css`

### Agregar productos a la BD
1. Abre phpMyAdmin
2. Ve a: `proyectotam` → `productos`
3. Haz clic en "Insertar"
4. Rellena los campos

### Cambiar colores
Reemplaza `#0d47a1` por tu color en:
- `style.css`
- `header.css`
- `catalogo.css`

---

## 🚨 Problemas Comunes y Soluciones

| Problema | Solución |
|----------|----------|
| 404 Not Found | Reinicia Apache, verifica .htaccess |
| Conexión BD falla | Verifica MySQL está corriendo |
| CSS no se carga | Usa rutas relativas: `css/style.css` |
| Productos no aparecen | Verifica tabla `productos` en phpMyAdmin |
| Login no funciona | Verifica tabla `usuarios` tiene datos |

---

## 📞 Recordatorios

✳️ **NUNCA** modifiques `index.php` en carpetas (solo el de raíz)

✳️ **SIEMPRE** usa `session_start()` al principio de páginas que usan `$_SESSION`

✳️ **NUNCA** guardes contraseñas sin hash (usa `password_hash()`)

✳️ **SIEMPRE** usa consultas preparadas (prepared statements)

✳️ **NUNCA** incluyas variables directamente en SQL (usa bind_param)

---

## 📊 Estado del Proyecto

```
✅ Estructura organizada
✅ Enrutamiento funcional
✅ Base de datos conectada
✅ Autenticación implementada
✅ Carrito de compras operativo
✅ Catálogo disponible
⏳ Checkout en progreso
⏳ Pagos (pendiente)
⏳ Admin (pendiente)
```

---

## 🎓 Recursos Útiles

- **PHP Manual**: https://www.php.net/manual/
- **MySQL Referencia**: https://dev.mysql.com/doc/
- **HTML5 Docs**: https://html.spec.whatwg.org/
- **CSS Guide**: https://developer.mozilla.org/es/docs/Web/CSS

---

**¡Listo para desarrollar!** 🚀

---

*Referencia Rápida - Proyecto TAM*  
*Última actualización: 10 de marzo de 2026*
