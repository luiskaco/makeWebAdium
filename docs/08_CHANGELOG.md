# 08_CHANGELOG.md - Registro de Cambios (Changelog)

## [0.4.10] - 2026-05-29
### Añadido
- Finalizada la barra inferior del footer añadiendo iconos de redes sociales (Instagram, LinkedIn, Facebook) en formato SVG, alineados a la derecha, con estado `hover` interactivo (color magenta `var(--color-magenta)`).
- Recreada la estructura de la sección 8 (`.info-cards-section`) reemplazando los fondos de imagen recortados (`obesidad-card-full.png`, `diabetes-card-full.png`) por una maquetación 100% nativa de HTML/CSS: fondo salmón `#E8835E` sólido, layout Flexbox en fila, sombra paralela, y un recuadro de *placeholder* cuadrado (100x100px) con borde discontinuo para indicar visualmente dónde irán las futuras fotografías reales, manteniendo los textos y el botón "Más información" alineados fielmente al diseño de la maqueta `8.png`.
- Refinada la versión de la hoja de estilos a `2.20.0` en `functions.php`.

## [0.4.9] - 2026-05-29
### Añadido
- Recreada la sección `7.png` ("La voz de los especialistas") en HTML/CSS nativo en `front-page.php`. Se recortaron con PHP GD las 3 fotos de doctores (`doc1-card.png`, `doc2-card.png`, `doc3-card.png`) directamente de `7.png` (954×526px) y se montaron como cards con botón play y texto de pregunta superpuesto.
- Recreada la sección `8.png` (tarjetas de Obesidad y Diabetes) usando las tarjetas completas como imágenes de fondo (`obesidad-card-full.png`, `diabetes-card-full.png`), recortadas con PHP GD de la imagen original (953×119px), con overlay HTML para el texto y el botón.
- Añadidos estilos CSS completos para `.specialists-voice-section` con grid de 3 columnas, botón play, texto de pregunta superpuesto, hover con zoom y navegación ‹ › responsiva.
- Resueltos conflictos de CSS: eliminado bloque duplicado de `.info-card-col`, eliminado bloque duplicado de `.site-footer`, aplicado scope a `.logo-quote-left/right` dentro de `.site-header` y `.footer-logo-quote-box`.
- Versión de hoja de estilos bumped a `2.16.0` en `functions.php`.
### Estrategia
- Todos los activos de imagen provienen del arte original de las capturas de pantalla de diseño. Los recortes se realizan con PHP GD en tiempo de setup, no en runtime.

## [0.4.8] - 2026-05-29

### Añadido
- Añadidas 4 secciones de ancho completo en la parte inferior de la página de inicio, debajo de la sección de pestañas (Autocuidado). Las secciones `8.png`, `9.png` y `10.png` han sido reemplazadas por componentes de código HTML/CSS interactivos.
- Recreada la imagen `8.png` completa mediante maquetación nativa HTML y CSS (`.info-cards-section`), utilizando imágenes individuales recortadas (`obesidad-card.png` y `diabetes-card.png`), textos limpios con Poppins y botones funcionales de "Más información".
- Recreada la imagen `9.png` completa en código HTML y CSS en `front-page.php` (`.newsletter-section`) con un formulario interactivo real, campo de e-mail y el enlace de referencias.
- Recreada la imagen `10.png` de forma nativa a nivel global modificando `footer.php` para incorporar la caja del logotipo con borde, eslogan con comillas, y enlaces inline separados por viñetas.
- Agregado espaciado vertical (padding de `45px` en PC y `25px` en móviles) a la clase `.consulta-banner-section` en `style.css` para separar adecuadamente el banner de consulta de las secciones circundantes.
- Incrementada la versión de la hoja de estilos a `'2.14.0'` en `functions.php` para forzar la actualización del caché en los navegadores.
- Ajustado el margen inferior (`margin-bottom`) del componente de pestañas (`.tabs-section`) a `75px` en PC y `50px` en móviles para separarlo visualmente de las nuevas secciones inferiores.

## [0.4.7] - 2026-05-29
### Añadido
- Añadidas 5 secciones de introducción adicionales (`.home-intro-image-section`) en secuencia vertical en la página de inicio (`front-page.php`) cargando los fondos de imagen `2.webp`, `3.webp`, `4.webp`, `5.webp` y `6.webp` dinámicamente con `home_url()`.
- Heredado el mismo comportamiento responsivo y visual (breakout full-bleed) y las propiedades de altura adaptativa con modificadores `!important` para toda la secuencia de intros.

## [0.4.6] - 2026-05-29
### Añadido
- Añadida sección de introducción extendida (`.home-intro-image-section`) en la parte superior de la página de inicio (`front-page.php`) con la imagen de fondo `s1.webp`.
- Configurado ancho completo (full-bleed) y compensación responsiva de márgenes en `style.css`.
- Incrementado el número de versión de la hoja de estilos a `'2.8.0'` en `functions.php` para limpiar activamente el caché de CSS del navegador.
- Añadido soporte redundante inline de `min-height: 520px; display: block;` en `front-page.php` como fallback seguro para la sección intro.
### Corregido
- Corregido error visual de pantalla en blanco ("se ve nada") en la página de inicio reemplazando el posicionamiento `left: 50%; right: 50%` por `margin-left: calc(-50vw + 50%)` en la clase `.home-intro-image-section`.
- Restaurado el uso de `home_url()` dinámico en PHP para cargar de manera segura la imagen `s1.webp` en cualquier host/dominio local.
- Agregado modificador `!important` a las consultas de medios (media queries) de responsividad en `.home-intro-image-section` y `.home-intro-spacer` en `style.css` para anular correctamente los estilos inline redundantes en tablets y dispositivos móviles.

## [0.4.5] - 2026-05-29
### Añadido
- Inversión de las vistas del Cuestionario e Inicio (front-page.php y page-cuestionario.php).
- La página de inicio (index) ahora muestra el banner de consulta de especialistas arriba, y la de cuestionario muestra las pestañas de autocuidado y el banner del cuestionario abajo.
- Re-estructurados los grupos de campos de ACF en `inc/acf-fields.php` (`group_home_settings` y `group_cuestionario_settings`) para reflejar esta inversión de lógica.
- Actualizada la documentación del proyecto (`01_PROJECT_PRD.md`, `02_SDD.md`, `04_DATA_MODEL.md`).

## [0.4.4] - 2026-05-27
### Corregido
- Solucionados los problemas de responsividad en móviles sobreescribiendo estilos en línea en `page-preguntar.php` y `page-cuestionario.php`.
- Creadas las clases `.results-header` y `.banner-doctores-title` con sus respectivas reglas en `style.css` y media queries para pantallas de hasta `768px`.
- Incremento de la versión de la hoja de estilos a `'2.6.0'` en `functions.php` para limpiar el caché de estilos.

## [0.4.3] - 2026-05-27
### Añadido
- Sustitución de la fuente principal del sitio web por la familia tipográfica **Poppins** en Google Fonts.
- Actualización de `@import` y la variable `--font-primary` en `style.css`.
- Modificación del encolado en `functions.php` para cargar los pesos de Poppins requeridos (300, 400, 600, 700 e itálicas).
- Incremento de la versión de la hoja de estilos a `'2.5.0'` para forzar la actualización del caché en los navegadores.

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
