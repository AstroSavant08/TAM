 Tareas

GERALDINE (UI/UX + ESTILOS)  CRÍTICO
 Objetivo: Eliminar el caos de estilos
FASE 1 – AUDITORÍA
Revisar TODOS los CSS:


style.css


styles.css


estilos.css


header.css


header-footer.css


contacto.css


 Identificar:
Cuál se usa realmente


Cuáles están duplicados






 FASE 2 – DECISIÓN
Crear SOLO estos archivos:
assets/css/
├── main.css
├── header.css
└── pages/
     carrito.css
     catalogo.css

 FASE 3 – LIMPIEZA
 Eliminar:
styles.css


style.css


estilos.css (si no aporta nada único)



 FASE 4 – UNIFICACIÓN
Mover TODOS los estilos a:


assets/css/
Asegurar que TODAS las páginas llamen:


<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="../assets/css/header.css">

 NATHALY (BASE DE DATOS)
 Objetivo: consistencia
 Tareas:
Revisar tam.sql


Validar:


usuarios


productos


pedidos


reseñas
JUAN PEINADO (BACKEND + RUTAS)
 Objetivo: limpiar lógica
 Tareas:
Unificar:


/backend


/proyecto/backend


Eliminar duplicados


Revisar:


rutas de login


conexión BD



SEBASTIAN (FRONTEND ESTRUCTURA)
Objetivo: Organización de páginas
 Tareas:
Crear:


frontend/pages/
Mover:


index.html


login.html


carrito.html


comparador.html


usuarios.html



 IMPORTANTE:
Revisar cada HTML


Detectar qué CSS usa realmente


 Reportar a Geraldine:
“esta página usa este CSS”





 TAREA NUEVA (CLAVE) – HEADER GLOBAL
(Hay fallos de integralidad con el header en algunas páginas)
RESPONSABLE: GERALDINE + SEBASTIAN

 SOLUCIÓN:
Crear archivo único:
components/header.html

 IMPLEMENTACIÓN
En cada página:
<div id="header"></div>

<script>
fetch("../components/header.html")
 .then(res => res.text())
 .then(data => {
   document.getElementById("header").innerHTML = data;
 });
</script>















DETECCIÓN DE ARCHIVOS INÚTILES
RESPONSABLES: JHOAN + SEBASTIAN
Hacer lista:
ARCHIVOS_A_ELIMINAR.md
Ejemplo:
test.html 


test_auth.php 


diagnostico.php 


setings.txt 

Porque se preguntaran?, un bello compañero hizo anotaciones dentro del proyecto y dejo los archivos ahi, y aunque sirven, son documentos.












