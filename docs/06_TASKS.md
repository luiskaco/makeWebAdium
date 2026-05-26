# 06_TASKS.md - Listado de Tareas de Implementación

## Fase 1: Planificación y Alineación 
- [x] Analizar capturas de pantalla de diseño y desglosar componentes.
- [x] Crear documentación base en el repositorio dentro de `docs/` (`01_PROJECT_PRD.md` a `08_CHANGELOG.md`).
- [ ] Validar con el usuario el enfoque de desarrollo (Custom Theme vs Page Builder).

## Fase 2: Configuración de Entorno e Infraestructura
- [ ] Crear la carpeta del tema personalizado `adium-theme`.
- [ ] Instalar y activar el plugin ACF (Advanced Custom Fields).
- [ ] Subir los activos de imágenes iniciales provistos por el diseñador a `wp-content/uploads/2026/05/`.

## Fase 3: Registro de Estructura de Datos (PHP)
- [ ] Crear el script `inc/cpts-especialistas.php` para registrar el CPT `especialista`.
- [ ] Configurar el archivo `inc/acf-fields.php` con los campos para especialistas y página de inicio.
- [ ] Crear algunos posts de prueba en el panel de WordPress para validar el guardado de datos.

## Fase 4: Desarrollo de Componentes Visuales (Frontend)
- [ ] Maquetar cabecera global (`header.php`) y menú responsivo.
- [ ] Implementar el sistema de pestañas de auto-cuidado interactivo con CSS y JS nativo en `front-page.php`.
- [ ] Diseñar el banner de cuestionario interactivo con CTA.
- [ ] Desarrollar la sección del pie de página (`footer.php`).

## Fase 5: Motor de Búsqueda y Resultados
- [ ] Maquetar el formulario de búsqueda con los dropdowns en `archive-especialista.php`.
- [ ] Implementar la consulta PHP (`WP_Query`) con filtros de geolocalización.
- [ ] Diseñar las tarjetas de resultados de Especialistas (Screen 4).

## Fase 6: Páginas Secundarias y Ajustes Finales
- [ ] Maquetar la plantilla `page-terminos.php` para Términos y Condiciones.
- [ ] Realizar pruebas de responsividad y optimización móvil.
- [ ] Ejecutar el plan de optimización SEO (Atributos ALT, titles, etiquetas semánticas HTML5).
