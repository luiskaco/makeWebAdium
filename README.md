# Adium Theme Demo

Un tema de WordPress moderno, ligero y completamente personalizado para Adium.

## 🚀 Características
- Maquetado responsivo utilizando CSS Nativo (Flexbox/Grid).
- Breakpoints adaptables a Tablet, Móvil y teléfonos pequeños.
- Diseño optimizado sin frameworks pesados (Bootstrap/Tailwind).
- Integración completa con ACF (Advanced Custom Fields) para la gestión del contenido.
- Custom Post Types para "Especialistas".
- Arquitectura orientada a buenas prácticas y rendimiento.

## 🛠 Instalación y Configuración
1. Copia el contenido de este repositorio en el directorio raíz de WordPress o copia la carpeta del tema a `wp-content/themes/adium-theme`.
2. Activa el tema desde el administrador de WordPress (Apariencia > Temas).
3. Asegúrate de tener instalado y activado el plugin **Advanced Custom Fields PRO**.
4. Importa los campos de ACF o verifica que los archivos PHP dentro de `inc/acf-fields.php` estén cargados.

## 📁 Estructura del Tema
- `style.css`: Estilos globales y sistema responsive.
- `functions.php`: Carga de scripts, configuraciones y módulos.
- `front-page.php`: Maquetación de la página principal.
- `page-cuestionario.php`: Maquetación interactiva.
- `archive-especialista.php`: Plantilla para mostrar doctores y especialistas.
- `header.php` / `footer.php`: Estructuras globales del sitio.

## 📱 Diseño Responsive
El tema utiliza un sistema de 3 breakpoints para adaptarse a cualquier pantalla:
- **1024px** (Tablet)
- **768px** (Móvil estándar)
- **480px** (Teléfonos pequeños)

## 👤 Autor
Desarrollado con las mejores directrices de UI/UX (web-design-guidelines).
