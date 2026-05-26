# Adium Theme - Demo Técnica

Este repositorio contiene la demostración técnica del desarrollo de una página web responsiva y moderna para Adium.

## Características Principales

*   **Diseño a Medida:** Tema de WordPress construido desde cero, sin constructores visuales pesados, garantizando tiempos de carga ultrarrápidos.
*   **Gestión de Contenido:** Integración profunda con Advanced Custom Fields (ACF) para permitir la gestión total del contenido (banners, textos, enlaces, imágenes) desde el panel de administración.
*   **CSS Nativo y Grid/Flexbox:** Layouts construidos con variables CSS, Flexbox y CSS Grid. No depende de frameworks CSS externos, lo que reduce el tamaño del código.
*   **Totalmente Responsivo (Mobile-First):** Sistema de 3 breakpoints (Tablet 1024px, Mobile 768px, Small Phone 480px) para garantizar una visualización perfecta en cualquier dispositivo.
*   **Menú Flotante Personalizado:** Navegación móvil con menú tipo hamburguesa que se despliega como un overlay, manteniendo intacta la estética de la cabecera.

## Estructura del Tema (`wp-content/themes/adium-theme`)

*   `style.css`: Estilos globales y sistema responsive.
*   `functions.php`: Registro de scripts, soporte del tema y lógica central.
*   `header.php` / `footer.php`: Componentes estructurales.
*   `front-page.php`: Plantilla de la página de inicio.
*   `page-cuestionario.php`: Plantilla para flujos interactivos.
*   `archive-especialista.php`: Plantilla de resultados de búsqueda de especialistas.
*   `inc/`: Directorio que contiene el registro de Custom Post Types y la configuración de ACF en código puro.

## Documentación del Proyecto

El desarrollo ha sido documentado exhaustivamente. Puedes encontrar los detalles en el directorio `docs/`:

*   `01_PROJECT_PRD.md`: Requisitos del Producto.
*   `02_SDD.md`: Documento de Diseño del Sistema.
*   `06_TASKS.md`: Lista de tareas y seguimiento.
*   `08_CHANGELOG.md`: Registro de versiones y cambios aplicados.

## Instalación

1.  Clona este repositorio.
2.  Si estás utilizando este repositorio completo, colócalo en tu entorno local (ej. Laragon/XAMPP).
3.  Asegúrate de configurar la base de datos e importar el contenido correspondiente si es necesario.
4.  Activa el tema **Adium Theme** desde `Apariencia -> Temas`.
