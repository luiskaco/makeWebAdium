# 04_DATA_MODEL.md - Modelo de Datos

## 1. Custom Post Type (CPT): `especialista`
Se utilizará para registrar la información de cada especialista médico.
- **Slug**: `especialista`
- **Nombre**: Especialistas
- **Soporte de WP**: `title`, `thumbnail`, `revisions`

## 2. Grupos de Campos de ACF (Advanced Custom Fields)

### Grupo: Campos de Especialistas (`group_especialista_details`)
Asociado al CPT `especialista`.

| Nombre del Campo | Key de ACF | Tipo | Descripción / Opciones |
| :--- | :--- | :--- | :--- |
| Especialidad | `especialidad` | Texto | Ejemplo: Endocrinología |
| Nombre de la Clínica | `clinica_nombre` | Texto | Ejemplo: Clinica San Felipe |
| Dirección | `clinica_direccion` | Texto | Dirección física de la consulta |
| Teléfono 1 | `clinica_telefono_1` | Texto | Teléfono principal |
| Teléfono 2 | `clinica_telefono_2` | Texto | Teléfono secundario |
| Horario | `clinica_horario` | Texto | Horas de atención (ej: 9 am a 6 pm) |
| Sitio Web | `clinica_sitio_web` | URL | URL del sitio web de la clínica |
| Enlace de Agenda | `clinica_enlace_agenda` | URL | Enlace para agendar citas |
| Facebook | `social_facebook` | URL | Enlace a su perfil de Facebook |
| Instagram | `social_instagram` | URL | Enlace a su perfil de Instagram |
| LinkedIn | `social_linkedin` | URL | Enlace a su perfil de LinkedIn |
| Departamento | `geo_departamento` | Select / Texto | Para filtros del buscador |
| Provincia | `geo_provincia` | Select / Texto | Para filtros del buscador |
| Distrito | `geo_distrito` | Select / Texto | Para filtros del buscador |
| Ciudad | `geo_ciudad` | Select / Texto | Para filtros del buscador |

### Grupo: Configuración de la Página de Inicio (`group_home_settings`)
Asociado a la Página de Inicio (Front Page).

| Nombre del Campo | Key de ACF | Tipo | Descripción / Opciones |
| :--- | :--- | :--- | :--- |
| Banner Consulta - Título | `consulta_titulo` | Texto | Título principal en el banner de especialistas |
| Banner Consulta - Texto Botón | `consulta_btn_txt` | Texto | Texto para el botón de buscar especialista |
| Banner Consulta - URL Botón | `consulta_btn_url` | URL | URL destino de la búsqueda |
| Banner Consulta - Imagen | `consulta_img` | Imagen | Imagen de los médicos |
| Pestañas Autocuidado | `tabs_autocuidado` | Repeater | Repetidor para las pestañas de auto-cuidado |
| ↳ Título de la Pestaña | `tab_titulo` | Texto | Nombre de la pestaña (Explora, Sueño, etc.) |
| ↳ Color de la Pestaña | `tab_color` | Select | Opciones: Magenta, Naranja |
| ↳ Imagen de la Tarjeta | `tab_imagen` | Imagen | Imagen del consejo |
| ↳ Título del Consejo | `tab_consejo_titulo` | Texto | Título de la tarjeta |
| ↳ Texto del Consejo | `tab_consejo_texto` | Área de Texto | Descripción larga del consejo |

### Grupo: Configuración de la Página de Cuestionario (`group_cuestionario_settings`)
Asociado a la plantilla `page-cuestionario.php`.

| Nombre del Campo | Key de ACF | Tipo | Descripción / Opciones |
| :--- | :--- | :--- | :--- |
| Banner Cuestionario - Título | `cuestionario_titulo` | Texto | Título principal en el banner del cuestionario |
| Banner Cuestionario - Subtítulo | `cuestionario_subtítulo` | Texto | Subtítulo descriptivo |
| Banner Cuestionario - Texto Botón | `cuestionario_btn_txt` | Texto | Texto del botón |
| Banner Cuestionario - URL Botón | `cuestionario_btn_url` | URL | Enlace para empezar el cuestionario |
| Banner Cuestionario - Imagen | `cuestionario_img` | Imagen | Imagen del banner (teléfono móvil, etc.) |
| Pestañas Autocuidado | `tabs_autocuidado` | Repeater | Repetidor para las pestañas de auto-cuidado |


---

## 3. Relación de Taxonomías de Ubicación (Alternativa para Escabilidad)
Si el número de especialistas es grande, en lugar de campos de texto ACF para ubicación (`geo_departamento`, etc.), registraremos taxonomías jerárquicas:
- **Taxonomía `ubicacion`**:
  - Departamento (Padre)
    - Provincia (Hijo)
      - Distrito (Nieto)
