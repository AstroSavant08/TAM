# 🛍️ TAM - Sistema de Tienda en Línea

## 📌 Instrucciones de Inicialización

### 1️⃣ **Verificar que XAMPP esté corriendo**
- Abre el Panel de Control de XAMPP
- Inicia los servicios: **Apache** y **MySQL**

### 2️⃣ **Acceder a la aplicación**
- Abre tu navegador web
- Ve a: **http://localhost/proyecto_de_tam_acosta/**
- **O** para pruebas: **http://localhost/proyecto_de_tam_acosta/test.html**

### 3️⃣ **Credenciales de prueba y registro**

Puedes utilizar cuentas existentes, pero ahora el sistema permite **registrarte** directamente en la aplicación. Una vez completado el formulario de registro, el usuario se conecta de forma automática y es redirigido a la página principal.

#### Usuarios de ejemplo pre-creados:
- **Usuario:** `acostam25` — **Contraseña:** `acosta.2005`
- **Usuario:** `test` — **Contraseña:** `test123`
- **Usuario:** `admin` — **Contraseña:** `admin123`

> 🔸 **Modo invitado:** Si no deseas registrarte puedes hacer clic en **"Entrar como invitado"** en la página de login. Los invitados pueden navegar por el catálogo y ver los productos, pero no tienen acceso al carrito ni a las funcionalidades de compra (aparece un banner recordatorio).
---

## 🔄 **Flujo de uso**

```
1. http://localhost/proyecto_de_tam_acosta/
   ↓ (redirige a login si no está autenticado)

2. login.html
   ↓ (ingresa credenciales y haz clic en "Ingresar")

3. index.html (Página de inicio con catálogo)
   ↓ (haz clic en "Catálogo" en la navegación)

4. PROJECT/PROJECT/catalogo.html
   ↓ (haz clic en "DETALLES" en cualquier producto)

5. vistas_pedidos/ver_producto.php (Página de producto)
   ↓ (puedes agregar al carrito o ver reseñas)
```

---

## 📁 **Estructura de archivos clave**

```
proyecto_de_tam_acosta/
├── index.php                  ← Punto de entrada (redirige)
├── index.html                 ← Página de inicio
├── login.html                 ← Página de login
├── test.html                  ← Página de pruebas
│
├── PROJECT/PROJECT/
│   ├── catalogo.html         ← Catálogo de productos
│   ├── catalogo.js           ← Lógica del catálogo
│   └── catalogo.css          ← Estilos del catálogo
│
├── vistas_pedidos/
│   ├── ver_producto.php      ← Detalles del producto
│   └── uploads/              ← Imágenes de productos
│
├── backend/
│   ├── login_demo.php        ← Autenticación (demostración)
│   ├── login_backend.php     ← Autenticación (real con BD)
│   ├── conexion.php          ← Conexión a BD
│   └── test.php              ← Prueba de conexión
│
└── sql/
    └── tam.sql               ← Script de base de datos
```

---

## 🐛 **Solución de problemas**

### ❌ "Error de conexión. Verifica que XAMPP esté ejecutándose"
- **Solución:** 
  1. Abre el Panel de Control de XAMPP
  2. Haz clic en "Start" en Apache y MySQL
  3. Espera a que muestren "Running"

### ❌ "Usuario o contraseña incorrectos"
- **Solución:** 
  1. Verifica que escribiste bien el usuario y contraseña
  2. Prueba con: `test` / `test123`
  3. Ve a http://localhost/proyecto_de_tam_acosta/test.html para probar

### ❌ "Las imágenes no cargan en ver_producto.php"
- **Solución:** Las imágenes de demostración usan placeholders automáticos de unsplash.com

---

## ✨ **Características implementadas**

✅ Sistema de autenticación con login/logout (incluye registro y modo invitado)
✅ Catálogo de productos
✅ Detalles de productos
✅ Carrito de compras (localStorage)
✅ Sistema de reseñas y calificaciones
✅ Búsqueda y filtros de productos
✅ Respuesta móvil (responsive)
✅ Autenticación persistente con localStorage

---

## 🔐 **Notas de Seguridad**

- ⚠️ El login actualmente usa demostración sin basado en BD para facilidad
- ⚠️ Los datos se almacenan en localStorage (no es seguro para producción)
- ⚠️ En producción, implementar sesiones PHP seguras y tokens JWT

---

## 📞 **Soporte**

Si tienes problemas:
1. Verifica que XAMPP esté ejecutándose
2. Limpia el localStorage del navegador (F12 → Application → Storage → Clear All)
3. Recarga la página (Ctrl + Shift + R)
4. Visita http://localhost/proyecto_de_tam_acosta/test.html para diagnóstico

---

**¡Listo para usar! 🚀**
