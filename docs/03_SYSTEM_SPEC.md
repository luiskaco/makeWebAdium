# 03_SYSTEM_SPEC.md - System Specifications (Especificaciones del Sistema)

## 1. Entorno de Desarrollo y Servidor
El proyecto está alojado localmente en un servidor Laragon con las siguientes especificaciones:
- **Sistema Operativo**: Windows
- **Servidor Web**: Apache / Nginx (gestionado por Laragon)
- **Base de Datos**: MySQL / MariaDB (gestionado por Laragon)
- **Versión de PHP**: PHP 8.3.30 (con soporte para extensiones estándar de WordPress: GD, cURL, mbstring, openssl, etc.)
- **Versión de WordPress**: 6.x (instalación limpia)

## 2. Dependencias del Proyecto (Plugins y Librerías)
- **Advanced Custom Fields (ACF)**: Plugin para registrar y gestionar campos personalizados. Se puede usar la versión Free o Pro. Se almacenarán las definiciones de campos en formato JSON en el tema (`/acf-json/`) para facilitar el control de versiones.
- **Custom Post Type UI (opcional)** o definición por código PHP: Se optará por registrar los CPTs directamente en PHP por código dentro del tema para evitar dependencias innecesarias y asegurar la portabilidad.

## 3. Estructura de Rutas y URLs del Sitio
- **Página de Inicio**: `/` -> Carga `front-page.php`.
- **Buscador de Especialistas**: `/especialistas/` -> Carga `archive-especialista.php`.
- **Ficha Individual de Especialista (opcional/SEO)**: `/especialistas/{slug-especialista}/` -> Carga `single-especialista.php`.
- **Términos y Condiciones**: `/terminos-y-condiciones/` -> Carga `page-terminos.php` o una página estandarizada.

## 4. Requisitos de Rendimiento y Carga de Activos
- Las imágenes deben estar comprimidas y optimizadas en formato WebP o PNG optimizado.
- Ninguna imagen del tema debe superar los 150 KB.
- Los scripts JavaScript se cargarán en el footer de forma diferida (`defer`) para no bloquear el renderizado de la página.
- El CSS principal se minificará para producción.
