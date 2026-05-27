# 08_CHANGELOG.md - Registro de Cambios (Changelog)

## [0.4.2] - 2026-05-27
### Corregido
- Alineación de las claves del árbol de datos geográficos. Se cambiaron las claves PHP `'provincias'` y `'distritos'` por `'provinces'` y `'districts'` en `inc/import-data.php` para coincidir exactamente con las propiedades esperadas por el script de frontend en `functions.php`.

## [0.4.1] - 2026-05-27
### Corregido
- Corregido error de sintaxis JS en la inyección inline de `geoData` en `functions.php`. Se eliminaron las comillas simples escapadas (`\'`) incorrectas en la concatenación de PHP, solucionando el bloqueo en la ejecución de scripts que impedía el funcionamiento de las pestañas (tabs) y los selectores geográficos en el frontend.

## [0.4.0] - 2026-05-27
### Añadido
- Habilitación de subida de archivos formato `.json` a través de filtro en `functions.php`.
- Creación de script de importación backend (`import-data.php`) accesible desde Herramientas en wp-admin.
- Automatización de creación de CPTs 'Especialista' a partir del archivo JSON del directorio médico.
- Lógica de compresión de JSON de ubigeos (23MB) para extraer exclusivamente los departamentos y distritos con presencia médica, guardándolos dinámicamente como la opción `adium_geo_data` en la BD.
- Sustitución de variable JS `geoData` estática en `functions.php` para inyectar directamente la configuración geográfica optimizada desde WordPress usando PHP `json_encode`.
- Modificación de la plantilla `page-preguntar.php` para asegurar que los "médicos de prueba" (mocks) sólo se visualicen en caso de que la base de datos se encuentre vacía de posts tipo especialista.

## [0.3.6] - 2026-05-26
### Añadido
- Implementación de un menú de navegación responsivo con botón de hamburguesa (`.menu-toggle`) en dispositivos móviles (pantallas menores a `768px`).
- Alineación mejorada del logotipo y el botón de hamburguesa/cierre ('X') en una sola fila en móviles, reduciendo los márgenes de las comillas gigantes y el tamaño del texto para evitar que se rompa el diseño o se encabalguen.
- Rediseño de la tipografía responsiva reduciendo los tamaños de fuente de títulos de banners (`.hero-banner-title` a `1.6rem`), subtítulos (`.hero-banner-subtitle` a `0.95rem`), botones CTA (`.btn-cta` a `0.95rem`), títulos de tabs (`.tab-info-title` a `1.15rem`) y textos descriptivos (`.tab-info-text` a `0.9rem`) en móvil para una lectura óptima y armónica.
- Animación de transformación del botón de hamburguesa a símbolo de cierre 'X' cuando el menú móvil está activo.
- Menú móvil de tipo acordeón/desplegable controlado con `slideToggle` de jQuery y estilos adaptados a la paleta de colores.
- Optimización responsiva de la barra de pestañas (`.tabs-nav`), agregando márgenes negativos y paddings internos para permitir un scroll lateral fluido y sin cortes bruscos en móviles.
- Reducción proporcional del alto de las imágenes de las pestañas a `200px` en móviles para conservar la consistencia estética de las tarjetas de contenido.
- Incremento de la versión de la hoja de estilos a `'1.7.0'` en `functions.php` para invalidar el caché del navegador del usuario.

## [0.3.5] - 2026-05-26
### Añadido
- Recreación y asignación de la imagen del primer tab (comida saludable) en resolución ultra-alta (HD).
- Ajuste de la altura de las imágenes de pestañas en `style.css` a `240px` (`object-fit: cover`) para balancear la visualización del contenido.
- Modificación del comportamiento de las pestañas en CSS para que cualquier pestaña activa se resalte en color rojo/magenta corporativo (`--color-magenta`) y mantenga un estado desaturado/neutro cuando no esté seleccionada, solucionando la superposición de colores fijos.
- Actualización de los paths de las imágenes en las plantillas `front-page.php` y `page-cuestionario.php` para asegurar consistencia visual en todas las vistas de pestañas.
- Habilitación de la funcionalidad de administración manual de campos e imágenes ACF para la página de Cuestionario vinculando la plantilla `page-cuestionario.php` en las reglas de localización del grupo de campos `group_home_settings` dentro de `acf-fields.php`.
- Implementación de un degradado dinámico (`var(--banner-bg)`) en la cabecera de la imagen del banner de médicos en la página de Cuestionario, permitiendo que la transición se difumine correctamente sobre el fondo rosado `#FFF5F7`.
- Incremento de la versión de la hoja de estilos a `'1.4.0'` en `functions.php` para invalidar el caché del navegador del usuario.

## [0.3.4] - 2026-05-26
### Añadido
- Creación de la plantilla de página a medida **`page-cuestionario.php`** (Plantilla de Cuestionario).
- Creada la página estática **"Cuestionario"** (slug `/cuestionario/`) en WordPress y vinculada directamente a la opción de menú **"Empieza hoy"**.
- Estructuración de `page-cuestionario.php`: Muestra el Banner de Consulta Médica en la parte superior, seguido del componente de pestañas (Tabs), y elimina el Banner de Cuestionario.
- Modificado **`front-page.php`** (Inicio): Se eliminó de esta vista el Banner de Consulta Médica, quedando únicamente el componente de pestañas y el Banner de Cuestionario debajo de este.

## [0.3.3] - 2026-05-26
### Corregido
- Revertido el cambio estructural de la Página de Inicio (`front-page.php`) y estilos CSS a su estado anterior.

## [0.3.2] - 2026-05-26
### Añadido
- Modificación de la lógica estructural para integrar condicionalmente las secciones de Banners dentro de los contenedores de las pestañas (Tabs). (Revertido en 0.3.3).

## [0.3.1] - 2026-05-26
### Añadido
- Creación de la guía de dimensiones recomendadas y formatos de imagen para el diseñador en [docs/09_MEDIA_DIMENSIONS.md](file:///c:/laragon/www/demo-adium/docs/09_MEDIA_DIMENSIONS.md).
- Ajuste del enlace de llamada a la acción (CTA) del banner en la Página de Inicio (`front-page.php`) para redirigir directamente a la página dinámica autogestionable `/preguntar/` en lugar del archivo de CPT nativo.
- Añadida la línea divisoria roja del banner de doctores en el buscador según el diseño provisto.

## [0.3.0] - 2026-05-26
### Añadido
- Creación de páginas estáticas reales para cada sección del menú.
- Modificación del menú de navegación para enlazar las páginas estáticas correspondientes.
- Diseño responsivo detallado en `style.css` (diseño apilable, scroll horizontal para la botonera de pestañas).
- Alineación del pie de página (Footer) con el diseño: imagotipo SVG de **Adium**, marcador de viñeta en enlaces e iconos sociales en SVG.

## [0.2.0] - 2026-05-26
### Añadido
- Descarga, instalación y activación automatizada del plugin **Advanced Custom Fields (ACF)**.
- Creación de la estructura del tema personalizado `adium-theme`.
- Registro por código PHP de CPTs y campos de ACF en `/inc/`.
- Script de automatización de inicialización para configurar páginas y médicos de prueba.

## [0.1.0] - 2026-05-26
### Añadido
- Inicialización de la documentación técnica base del proyecto dentro de la carpeta `docs/`.
