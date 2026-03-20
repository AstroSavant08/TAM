# ✅ CHECKLIST DE VALIDACIÓN - Proyecto TAM

## 🎯 Objetivo
Verificar que toda la estructura del proyecto está funcionando correctamente.

---

## 📋 CHECKLIST BÁSICO

### 1️⃣ Apache y MySQL
- [ ] XAMPP está abierto y corriendo
- [ ] Apache está iniciado (botón "Start" verde en XAMPP)
- [ ] MySQL está iniciado (botón "Start" verde en XAMPP)

### 2️⃣ Acceso a la Página Principal
- [ ] Abre: http://localhost/academia/
- [ ] La página se carga sin errores 404
- [ ] Ves la home de la tienda (logo, menú, etc.)

### 3️⃣ Navegación con Nuevas Rutas
- [ ] Haz clic en "Catálogo" → se carga: ?page=catalogo
- [ ] Haz clic en "Carrito" → se carga: ?page=carrito
- [ ] Haz clic en "Login" → se carga: ?page=login
- [ ] Haz clic en "Contacto" → se carga: ?page=contacto

### 4️⃣ Catálogo (Página más Importante)
- [ ] La URL es: http://localhost/academia/?page=catalogo
- [ ] Se muestran productos en el navegador
- [ ] Los productos vienen de la base de datos (no HTML estático)
- [ ] Las imágenes de productos se ven correctamente
- [ ] Puedes hacer clic en "Agregar al carrito"

### 5️⃣ Estilos CSS
- [ ] Los botones están azules y visibles
- [ ] El diseño se ve bien (no hay texto sin formato)
- [ ] El menú está correctamente posicionado
- [ ] Los colores coinciden con el diseño (azul #0d47a1)

### 6️⃣ JavaScript/Interactividad
- [ ] Los botones responden a clics
- [ ] El carrito se actualiza al agregar productos
- [ ] Abre la consola (F12) → sin errores rojos críticos

---

## 🔍 CHECKLIST AVANZADO

### 7️⃣ Autenticación
- [ ] Ve a: ?page=login
- [ ] Haz clic en "Registrarse"
- [ ] Llena el formulario y registra un usuario
- [ ] Intenta iniciar sesión con el usuario creado
- [ ] Se redirige a la página de catálogo
- [ ] Tu nombre aparece en la esquina superior (si está implementado)

### 8️⃣ Carrito de Compras
- [ ] Agrega productl al carrito desde el catálogo
- [ ] Ve a: ?page=carrito
- [ ] El producto aparece en la lista del carrito
- [ ] Puedes aumentar/disminuir cantidad
- [ ] Puedes eliminar productos

### 9️⃣ Base de Datos
- [ ] Abre phpMyAdmin: http://localhost/phpmyadmin/
- [ ] Busca la base de datos: `proyectotam`
- [ ] Verifica que existan las tablas:
  - [ ] usuarios
  - [ ] productos
  - [ ] categorias
  - [ ] carrito_usuarios
  - [ ] calificaciones

### 🔟 Rutas y Estructura
- [ ] Abre la carpeta `c:\xampp\htdocs\academia\`
- [ ] Verifica que exista `index.php` en la raíz
- [ ] Verifica que exista `.htaccess` en la raíz
- [ ] Verifica que la carpeta `backend/` está presente
- [ ] Verifica que `catalogo/PROJECT/catalogo.php` existe

---

## 🐛 SI ALGO FALLA

### Error: "404 Not Found"
```
✓ Soluciones a intentar:
1. Reinicia Apache en XAMPP
2. Verifica que .htaccess existe
3. Abre phpinfo(): http://localhost/phpmyadmin/phpinfo.php
4. Busca "mod_rewrite" en la página
5. Si no aparece, habilítalo en Apache config
```

### Error: "Conexión a BD fallida"
```
✓ Soluciones a intentar:
1. Reinicia MySQL en XAMPP
2. Abre phpMyAdmin: http://localhost/phpmyadmin/
3. Verifica que la BD "proyectotam" existe
4. Verifica credenciales en backend/conexion.php
5. Por defecto: usuario="root", password="" (vacío)
```

### Error: "CSS/JS no se cargan" o "Contenido sin estilo"
```
✓ Soluciones a intentar:
1. Abre DevTools (F12) → Pestaña "Network"
2. Recarga la página (Ctrl+F5)
3. Busca archivos en rojo (404)
4. Verifica que las rutas en HTML sean correctas
5. Ejemplo correcto: href="css/style.css"
```

### Las imágenes no se ven
```
✓ Soluciones a intentar:
1. Verifica que la carpeta "imagenes/" existe
2. Busca que los archivos están allí
3. Comprueba nombres exactos en BD vs. carpeta
4. En el código, usa rutas relativas: imagenes/producto1.jpg
```

---

## 📊 RESUMEN RÁPIDO

| Componente | Estado Esperado | Cómo Verificar |
|-----------|-----------------|----------------|
| **Apache** | ✅ Corriendo | XAMPP Control Panel (botón verde) |
| **MySQL** | ✅ Corriendo | XAMPP Control Panel (botón verde) |
| **Home Page** | ✅ Carga sin erro | http://localhost/academia/ |
| **Rutas** | ✅ Funcionan | Navega: http://localhost/academia/?page=catalogo |
| **Catálogo** | ✅ Muestra productos BD | ?page=catalogo → ve productos |
| **CSS/Diseño** | ✅ Se ve bien | Lee estilos, botones azules |
| **BD** | ✅ Conectada | phpMyAdmin → busca `proyectotam` |

---

## 🎓 PRÓXIMOS PASOS (Después de validar todo)

1. **Checkout**: Implementar página de compra final
2. **Órdenes**: Ver historial de compras del usuario
3. **Pagos**: Integrar MercadoPago o Stripe
4. **Admin**: Panel para gestionar productos
5. **Reportes**: Estadísticas de ventas

---

## 📞 NOTAS IMPORTANTES

- **URL Base**: http://localhost/academia/
- **Punto de Entrada**: index.php (único archivo para todas las rutas)
- **BD**: proyectotam (25 tablas)
- **Usuario BD**: root (sin contraseña)
- **Física CSS**: css/, backend/, catalogo/PROJECT/

---

**✅ Si todos los checks pasaron: ¡El proyecto está listo para usar!**

---

*Documento: Checklist de Validación - Proyecto TAM*  
*Última actualización: 10 de marzo de 2026*
