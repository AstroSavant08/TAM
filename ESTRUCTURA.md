# 📋 ESTRUCTURA DEL PROYECTO TAM - ACADEMIA

## 🎯 Descripción
Proyecto web de tienda online desarrollado en HTML, CSS, JavaScript y PHP. Se ejecuta en XAMPP con Apache.

---

## 📁 ESTRUCTURA DE CARPETAS

```
academia/
│
├── 📄 index.php                     ← PUNTO DE ENTRADA PRINCIPAL ⭐
├── 📄 index.html                    ← Página de inicio
├── 📄 login.html                    ← Formulario de login/registro
├── 📄 carrito.html                  ← Página del carrito
├── 📄 contacto.html                 ← Página de contacto
│
├── 📂 backend/                      ← APIs y procesamiento PHP
│   ├── conexion.php                 ← Conexión a MySQL
│   ├── login_backend.php            ← Lógica de login
│   ├── register_backend.php         ← Lógica de registro
│   ├── carrito.php                  ← Operaciones del carrito
│   ├── guardar_rewiew.php           ← Guardar reseñas
│   └── ...otros archivos
│
├── 📂 catalogo/                     ← Módulo de catálogo
│   ├── 📄 index.php                 ← Redirige a catalogo.php
│   └── 📂 PROJECT/
│       ├── catalogo.php             ← Catálogo funcional con BD
│       ├── catalogo.html            ← (anterior - no usar)
│       ├── catalogo.js              ← JavaScript del catálogo
│       ├── catalogo.css             ← Estilos del catálogo
│       └── guardar_rewiew.php       ← Guardar reseñas
│
├── 📂 proyecto/                     ← Proyecto alternativo (frontend/backend)
│   ├── 📂 backend/
│   │   ├── conexion.php
│   │   ├── login_backend.php
│   │   └── ...
│   │
│   └── 📂 frontend/
│       ├── login.php
│       ├── register.php
│       ├── productos.php
│       └── carrito.php
│
├── 📂 css/                          ← Hojas de estilo
│   ├── style.css
│   ├── styles.css
│   ├── header.css
│   └── ...
│
├── 📂 js/                           ← Archivos JavaScript
│   └── script.js
│
├── 📂 imagenes/                     ← Imágenes del proyecto
│   └── ...
│
├── 📂 vistas_pedidos/               ← Vistas y uploads
│   ├── 📂 uploads/
│   │   └── logo.png
│   └── ...
│
├── 📂 sql/                          ← Scripts SQL
│   └── tam.sql
│
├── 📄 .htaccess                     ← Configuración de Apache
├── 📄 README.md                     ← Documentación
└── 📄 ESTRUCTURA.md                 ← Este archivo
```

---

## 🚀 CÓMO EJECUTAR EL PROYECTO

### 1️⃣ Requisitos
- XAMPP instalado (Apache + MySQL + PHP)
- Carpeta del proyecto en `C:\xampp\htdocs\academia\`

### 2️⃣ Iniciar servicios
1. Abre **XAMPP Control Panel**
2. Haz clic en **Start** para:
   - ✅ Apache
   - ✅ MySQL

### 3️⃣ Acceder al proyecto
Abre tu navegador y ve a:
```
http://localhost/academia/
```

---

## 📝 CÓMO FUNCIONAN LAS RUTAS

El archivo `index.php` es el único punto de entrada. Todas las rutas se manejan a través de él:

### Ejemplos de URLs
```
http://localhost/academia/                    → Página principal (home)
http://localhost/academia/?page=catalogo      → Catálogo de productos
http://localhost/academia/?page=carrito       → Carrito de compras
http://localhost/academia/?page=login         → Login
http://localhost/academia/?page=contacto      → Contacto
```

### Cómo funciona internamente:
1. **Apache recibe la solicitud** → `index.php` (por `.htaccess`)
2. **index.php lee el parámetro `page`** → Determina qué archivo incluir
3. **Incluye el archivo correspondiente** → Muestra el contenido

---

## 🔧 ¿QUÉ SE CORRIGIÓ?

### ✅ Problemas solucionados:
1. **Error 404** - Múltiples `index.php` e `index.html` causaban conflictos
   - **Solución**: Un único `index.php` como punto de entrada

2. **Rutas rotas** - Enlaces y referencias a archivos incorrectos
   - **Solución**: Uso de `BASE_URL` para rutas consistentes

3. **Estructura confusa** - Carpetas `proyecto/`, `catalogo/` sin orden
   - **Solución**: Estructura consolidada con folders específicas

4. **Reescritura de URLs** - Apache no sabía cómo enrutar solicitudes
   - **Solución**: Configuración `.htaccess` correcta

---

## 📂 ARCHIVOS IMPORTANTES

| Archivo | Función |
|---------|---------|
| `index.php` | Punto de entrada único, enrutador central |
| `backend/conexion.php` | Conexión a la BD MySQL |
| `catalogo/PROJECT/catalogo.php` | Catálogo con BD |
| `.htaccess` | Reescritura de URLs de Apache |
| `index.html` | Página principal (incluida por index.php) |

---

## 🗄️ BASE DE DATOS

### Conexión
```php
$host     = '127.0.0.1';
$user     = 'root';
$password = '';
$dbname   = 'proyectotam';
```

### Tablas principales
- `usuarios` - Registros de usuarios
- `productos` - Catálogo de productos
- `categorias` - Categorías
- `carrito_usuarios` - Carrito de compras
- `ventas` - Historial de ventas
- `calificaciones` - Reseñas y calificaciones

---

## ⚠️ SOLUCIÓN DE PROBLEMAS

### Error: "Not Found"
```
Causa: El archivo no existe o la ruta es incorrecta
Solución: Verifica que los archivos existan en la carpeta adecuada
```

### Error: "Conexión a BD fallida"
```
Causa: XAMPP no tiene MySQL iniciado o credenciales incorrectas
Solución:
1. Inicia MySQL en XAMPP
2. Verifica las credenciales en backend/conexion.php
3. Comprueba que la BD 'proyectotam' existe
```

### CSS/JS no se cargan
```
Causa: Rutas relativas incorrectas
Solución: Usa BASE_URL para construir rutas absolutas
```

---

## 📚 REFERENCIAS ÚTILES

- **Documentación PHP**: https://www.php.net
- **Apache mod_rewrite**: https://httpd.apache.org/docs/2.4/mod/mod_rewrite.html
- **MySQL**: https://www.mysql.com

---

## 👨‍💻 AUTOR
Proyecto educativo TAM - Tienda Online (Academia)

**Última actualización**: 10 de marzo de 2026
