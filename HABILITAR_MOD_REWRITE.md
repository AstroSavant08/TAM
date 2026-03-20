# 🔧 VERIFICAR Y HABILITAR MOD_REWRITE

**Importancia**: `mod_rewrite` es esencial para que `.htaccess` funcione. Sin esto, las URLs con parámetros `?page=` no funcionarán.

---

## ✅ Verificación Rápida

### Opción 1: Ver phpinfo()

1. **Abre en navegador**:
   ```
   http://localhost/phpmyadmin/phpinfo.php
   ```

2. **Busca en la página**: (Ctrl+F)
   ```
   mod_rewrite
   ```

3. **¿Qué significa?**
   - ✅ **Si aparece**: mod_rewrite está habilitado ✅
   - ❌ **Si NO aparece**: Necesitas habilitarlo 🔧

---

## 🔧 Habilitar mod_rewrite

### Sistema: Windows + XAMPP

#### Paso 1: Abre el archivo de configuración
```
C:\xampp\apache\conf\httpd.conf
```

**Con cualquier editor** (Notepad, VSCode, etc.)

#### Paso 2: Busca esta línea
```
#LoadModule rewrite_module modules/mod_rewrite.so
```

**Está comentada** (comienza con `#`)

#### Paso 3: Descomenta la línea
Cambia:
```
#LoadModule rewrite_module modules/mod_rewrite.so
```

A esto:
```
LoadModule rewrite_module modules/mod_rewrite.so
```

**Elimina el `#` del principio**

#### Paso 4: Guarda el archivo
- **Ctrl+S** (Notepad/VSCode)
- Cierra el editor

#### Paso 5: Reinicia Apache
1. Abre XAMPP Control Panel
2. Haz clic en "Stop" (Apache)
3. Espera 2 segundos
4. Haz clic en "Start" (Apache)

#### Paso 6: Verifica que funcione
```
http://localhost/phpmyadmin/phpinfo.php
Busca: mod_rewrite
```

**Debería aparecer ahora** ✅

---

## 🔍 Otra Forma: Buscar en Explorer

### Método alternativo si no encuentras la línea

```
Archivo: C:\xampp\apache\conf\httpd.conf

Busca estas líneas (Ctrl+F en editor):
  - LoadModule rewrite_module
  - mod_rewrite

Si está así:
  #LoadModule rewrite_module modules/mod_rewrite.so

Cámbialo a:
  LoadModule rewrite_module modules/mod_rewrite.so
```

---

## ⚙️ Verificación en Apache (Alternativa)

### Windows + XAMPP (Línea de comandos)

1. **Abre PowerShell o CMD**
2. **Ve a la carpeta Apache**:
   ```powershell
   cd C:\xampp\apache\bin
   ```

3. **Verifica módulos cargados**:
   ```powershell
   .\httpd.exe -M | findstr rewrite
   ```

4. **¿Qué significa?**
   - ✅ Si ves: `rewrite_module (shared)` → Está habilitado
   - ❌ Si no ves nada → No está habilitado

---

## 🚨 Errores Comunes Después

### Si ahora ves error 500
```
Internal Server Error
```

**Solución**:
1. Reinicia Apache completamente
2. Verifica que `.htaccess` está en la carpeta correcta: `C:\xampp\htdocs\academia\`
3. Verifica que `.htaccess` no tiene errores de sintaxis

**Contenido correcto de .htaccess**:
```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /academia/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?page=$1 [QSA,L]
</IfModule>
```

---

## ✅ Checklist Final

- [ ] Abrí `C:\xampp\apache\conf\httpd.conf`
- [ ] Encontré la línea con `mod_rewrite`
- [ ] Descomentéla (eliminé el `#`)
- [ ] Guardé el archivo
- [ ] Reinicié Apache en XAMPP
- [ ] Verifiqué en phpinfo que mod_rewrite aparece
- [ ] Abrí: http://localhost/academia/?page=catalogo
- [ ] La página se carga sin errores

---

## 📞 Referencia: Archivos que dependen de mod_rewrite

```
.htaccess
├── Redirige: ?page=catalogo
├── Redirige: ?page=carrito
├── Redirige: ?page=login
└── Todo va a: index.php

índex.php (Lee el parámetro "page")
├── Verifica que sea un archivo válido
├── Carga ese archivo
└── Muestra el contenido
```

---

## 🎯 ¿Por qué es importante?

**Sin mod_rewrite**:
- Tienes que escribir: `?page=catalogo` en la URL
- Los navegadores no entienden las rutas limpias

**Con mod_rewrite**:
- Las URLs se reescriben automáticamente
- Todo funciona a través de `index.php`
- Más seguro y organizado

---

## 📊 Test Rápido

Después de habilitar, abre en navegador:

```
http://localhost/academia/
```

✅ Si carga → mod_rewrite funciona

```
http://localhost/academia/?page=catalogo
```

✅ Si carga catálogo → .htaccess funciona

```
http://localhost/academia/catalogo
```

✅ Si carga catálogo (sin ?page=) → mod_rewrite funciona completamente

---

**¡Listo! Ahora el enrutamiento debería funcionar perfectamente.** 🚀

---

*Guía: Habilitar mod_rewrite*  
*Última actualización: 10 de marzo de 2026*
