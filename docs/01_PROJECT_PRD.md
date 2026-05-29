# 01_PROJECT_PRD.md - Product Requirements Document (PRD)

## 1. Introducción y Objetivos
El proyecto consiste en la creación de una **Demo Técnica (Proof of Concept)** de las interfaces gráficas para la plataforma web de bienestar emocional de **Adium**.
El objetivo principal es tomar los diseños provistos y convertirlos en una interfaz web premium y totalmente administrable usando **Advanced Custom Fields (ACF)** en WordPress. De ser aprobada esta demo técnica, se dispondrá de más interfaces.

## 2. Público Objetivo y Experiencia de Usuario (UX)
El portal está destinado a personas interesadas en su salud física y bienestar emocional, brindándoles herramientas de auto-cuidado y una forma rápida y sencilla de encontrar médicos especialistas cercanos.
La navegación debe ser fluida, limpia y accesible desde dispositivos móviles y de escritorio (diseño responsivo). Al ser una demo técnica, la experiencia de usuario debe ser sumamente fluida y atractiva (Premium UX/UI).

## 3. Requisitos Funcionales
### RF-01: Cabecera y Menú Navegación
- Logotipo con el texto: "Hablar te quita un peso de encima."
- Menú dinámico: Hablar, Señales, Preguntar, Empieza hoy, Aprender.
- Responsivo con menú móvil tipo hamburguesa.

### RF-02: Módulo Interactivo de Pestañas de Auto-cuidado
- Selector de pestañas dinámico:
  - Pestaña 3: Explora
  - Pestaña 4: Observa tu sueño
  - Pestaña 5: Registra tus hábitos
- El contenido de cada pestaña cambia dinámicamente y consta de:
  - Imagen ilustrativa en el lado izquierdo.
  - Título o consejo en negrita.
  - Texto descriptivo detallado.
- Administrable completamente desde ACF (campo repetidor o campos dedicados).

### RF-03: Banner del Cuestionario
- Sección destacada para incentivar a los usuarios a realizar el test de bienestar, reubicada en la Página de Cuestionario.
- Título principal y subtítulo descriptivo.
- Botón de llamada a la acción (CTA) con el texto "Empezar cuestionario ▶".
- Enlace dinámico y fondo administrable mediante ACF.

### RF-04: Buscador de Especialistas Médicos
- Sección con banner de médicos especialistas.
- Formulario de búsqueda con 4 filtros desplegables encadenados o independientes:
  - Departamento
  - Provincia
  - Distrito
  - Ciudad
- Botón "BUSCAR" que procesa la selección y muestra los resultados.

### RF-05: Ficha y Resultados de Especialistas
- Listado de especialistas que coincidan con la búsqueda.
- Ficha de información detallada por especialista:
  - Nombre completo y Especialidad (ej: Harold Lizardo Torres Aparcana - Endocrinología).
  - Información de clínica: Nombre de la clínica, Dirección física, Teléfonos de contacto, Horario de atención, Sitio web de la clínica.
  - Enlace destacado: "AGENDA TU CITA AQUÍ ↗".
  - Iconos de redes sociales del especialista (Facebook, Instagram, LinkedIn).

### RF-06: Página de Términos y Condiciones
- Página de lectura de texto legal en color magenta/naranja.
- Administrable desde el editor nativo de WordPress o campo ACF de texto enriquecido.

### RF-07: Pie de Página (Footer)
- Logotipo de Adium.
- Enlaces de interés: Términos y condiciones.
- Iconos de redes sociales en la parte inferior.

## 4. Requisitos No Funcionales
- **Rendimiento**: Carga rápida del sitio web (< 2 segundos).
- **SEO**: Títulos optimizados, meta descriptions y atributos ALT correctos en todas las imágenes.
- **Administración**: Todos los textos, imágenes y enlaces deben poder cambiarse desde el panel de WordPress usando ACF Pro / Free sin tocar código.
- **Compatibilidad**: Compatible con navegadores modernos (Chrome, Safari, Firefox, Edge).
- **Seguridad**: Sanitización de inputs en el buscador para evitar inyecciones SQL o XSS.
