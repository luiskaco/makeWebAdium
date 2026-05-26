# Guía de Dimensiones y Ubicación de Imágenes

Esta guía detalla las especificaciones de tamaño, proporciones, formatos y la **ubicación exacta en las páginas del panel de control de WordPress** para cada activo visual, además de métodos recomendados para realizar el redimensionamiento.

---

## 1. Tabla de Especificaciones y Ubicación en WordPress

| Nombre del Activo | Dimensión (Ancho × Alto) | Proporción | Formato | Página en la Web | Campo de Carga en WordPress (ACF / Dashboard) |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Logo Principal** | `300px × 65px` | ~9:2 | `.svg` o `.png` | Todas las páginas (Cabecera) | Se carga en el código del tema (`header.php`). |
| **Banner de Especialistas** | `1200px × 300px` | 4:1 | `.png` o `.webp` | `/preguntar/` y `/especialistas/` | *Páginas > Editar "Preguntar"* > Campo: **Imagen del Banner (5 Especialistas)** |
| **Imagen de Pestañas** | `600px × 450px` | 4:3 | `.jpg` o `.webp` | `/` (Inicio) y `/cuestionario/` | *Páginas > Editar "Inicio"* > Repetidor **Pestañas** > Subcampo: **Imagen del Consejo** |
| **Banner Cuestionario** | `700px × 450px` | ~14:9 | `.png` o `.webp` | `/` (Inicio) | *Páginas > Editar "Inicio"* > Pestaña **Banner Cuestionario** > Campo: **Imagen del Banner** |
| **Banner Consulta Médica** | `1200px × 320px` | ~15:4 | `.png` o `.webp` | `/cuestionario/` | *Páginas > Editar "Inicio"* > Pestaña **Banner Consulta** > Campo: **Imagen de los Médicos** |
| **Logo Adium (Footer)** | `150px × 40px` | Libre | `.svg` o `.png` | Todas las páginas (Pie de página)| Se carga en el código del tema (`footer.php`). |

---

## 2. Métodos Recomendados para Redimensionar las Imágenes

Para lograr que las imágenes pesen poco sin perder calidad, te sugerimos los siguientes métodos ordenados de más sencillo a avanzado:

### Método A: Squoosh.app (Recomendado, gratuito y online)
**Squoosh** es una herramienta web desarrollada por Google que permite comprimir y redimensionar imágenes visualizando los cambios en tiempo real.
1. Entra a [squoosh.app](https://squoosh.app/).
2. Arrastra la imagen original.
3. Activa la opción **Resize** y escribe el ancho (`width`) recomendado de la tabla (por ejemplo, `1200`). La altura se ajustará proporcionalmente.
4. En **Edit > Compress**, selecciona el formato **WebP** y ajusta la calidad (Quality) en `75%` u `80%`.
5. Descarga el archivo optimizado.

### Método B: Figma (Para la Diseñadora)
Dado que las imágenes provienen de un diseñador, Figma es la herramienta ideal ya que permite exportar a medidas exactas:
1. Selecciona el contenedor o el grupo que contiene la imagen recortada.
2. Crea un **Frame** de la medida exacta deseada (por ejemplo, un Frame de `1200 × 300` para el banner de especialistas).
3. Inserta la imagen dentro del Frame y usa la propiedad **Fill > Crop** o **Fill > Content** para encuadrar las caras de los médicos de forma armónica.
4. Ve al panel de la derecha, sección **Export**, selecciona **WebP** o **PNG** y presiona **Export**.

### Método C: Adobe Photoshop
1. Abre la imagen original en Photoshop.
2. Ve a **Imagen > Tamaño de imagen...** y establece el ancho en píxeles según la tabla (asegúrate de que la cadena de proporción esté enlazada).
3. Si necesitas recortar para lograr una proporción exacta (ej: 4:3), usa la herramienta **Recortar (C)** ingresando la proporción en la barra de opciones superior.
4. Ve a **Archivo > Exportar > Guardar para web (heredado)...**. Selecciona **PNG-24** (si tiene transparencia) o **JPEG** (calidad 80, optimizado) y guárdala.
