# 05_ARCHITECTURE.md - Arquitectura del Proyecto

## 1. Patrón de Diseño del Tema WordPress
El tema seguirá el estándar clásico de WordPress, separando la lógica de negocio (CPTs, ACF) en archivos modularizados en la carpeta `/inc/` para mantener el archivo `functions.php` limpio.

```
wp-content/themes/adium-theme/
├── acf-json/                 <-- Sincronización automática de campos ACF
├── assets/
│   ├── css/
│   │   └── main.css          <-- Estilos globales y responsive
│   ├── js/
│   │   ├── main.js           <-- Comportamiento de pestañas y sliders
│   │   └── search-filter.js  <-- Filtrado dinámico del buscador
│   └── images/               <-- Activos estáticos del tema (logos, iconos)
├── inc/
│   ├── acf-fields.php        <-- Registro de campos ACF alternativo en código
│   └── cpts-especialistas.php<-- Registro de Custom Post Types
├── footer.php
├── front-page.php            <-- Home y Pestañas
├── functions.php             <-- Archivo central del tema
├── header.php
├── index.php                 <-- Plantilla de respaldo
├── archive-especialista.php  <-- Buscador y Listado
└── page-terminos.php         <-- Términos y Condiciones
```

## 2. Flujo de Datos del Buscador de Especialistas
Para realizar la búsqueda sin recarga completa de página o mediante formularios tradicionales:
1. El usuario selecciona un **Departamento** en el primer dropdown.
2. Un script en JS (`search-filter.js`) detecta el cambio y opcionalmente filtra las opciones de **Provincia** que correspondan a ese departamento (mediante taxonomías jerárquicas o una consulta AJAX).
3. Al hacer clic en "BUSCAR", se envía un formulario GET a `/especialistas/` con parámetros de consulta:
   `?departamento=lima&provincia=lima&distrito=jesus-maria`
4. `archive-especialista.php` captura estos parámetros, genera un `meta_query` o `tax_query` dinámico para `WP_Query` y renderiza las tarjetas de resultados correspondientes.

## 3. Principio DRY (Don't Repeat Yourself) en las Interfaces
- El **Banner de Doctores** (con la imagen de los 5 doctores y el título "ENCUENTRA AL ESPECIALISTA CERCA DE TI") se reutiliza en `archive-especialista.php` (Screen 2) y en la vista de resultados (Screen 4). Se creará una plantilla parcial `template-parts/banner-doctors.php` para renderizar esta sección en ambos archivos.
- Las pestañas de autocuidado se usarán como un bloque de plantilla reutilizable (`template-parts/tabs-autocuidado.php`) ya que se muestran tanto en la Página de Inicio (Screen 1) como en la sección de Consulta (Screen 3).
