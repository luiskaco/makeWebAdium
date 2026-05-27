# 07_DECISIONS.md - Registro de Decisiones de Diseño y Arquitectura (ADR)

## DEC-01: Desarrollo de Tema a Medida (Custom Theme) vs Page Builders
- **Estado**: Propuesto.
- **Contexto**: El diseño presenta estructuras geométricas y dinámicas muy específicas, como pestañas interactivas de color personalizado y listados de especialistas en tres columnas con un diseño de tarjeta muy concreto. Los constructores visuales suelen añadir exceso de código HTML/CSS no optimizado.
- **Decisión**: Desarrollar un tema WordPress desde cero (`adium-theme`) utilizando PHP y CSS nativo de alto rendimiento.
- **Consecuencias**:
  - Mayor velocidad de carga y mejor puntuación en Core Web Vitals (SEO).
  - Control absoluto del diseño y adaptabilidad móvil.
  - Mayor facilidad para integrar la lógica de filtros del buscador mediante consultas WP directas.

## DEC-02: Gestión de Configuración de ACF mediante JSON Local
- **Estado**: Propuesto.
- **Contexto**: Al usar ACF, los campos suelen guardarse en la base de datos, lo cual dificulta la migración de desarrollo a producción.
- **Decisión**: Configurar la característica `acf-json` en el tema para guardar las definiciones de los grupos de campos en archivos `.json` dentro de `wp-content/themes/adium-theme/acf-json/`.
- **Consecuencias**:
  - Control de versiones (Git) sobre los campos personalizados.
  - Sincronización automática de campos en cualquier entorno nuevo sin requerir exportaciones manuales.

## DEC-03: Estructura Geográfica basada en Campos ACF Directos vs Taxonomías
- **Estado**: Propuesto.
- **Contexto**: Se requiere buscar médicos por Departamento, Provincia, Distrito y Ciudad.
- **Decisión**: Utilizar taxonomías de WordPress en lugar de campos de texto ACF simples para estas localizaciones.
- **Consecuencias**:
  - Consultas SQL mucho más rápidas y optimizadas mediante `tax_query`.
  - Evita errores tipográficos al registrar doctores (se eligen de una estructura de categorías existente).
  - Permite crear URLs semánticas amigables para SEO (ej. `/especialistas/lima/jesus-maria/`).

## DEC-04: Optimización de Archivo Ubigeo y Búsqueda Dinámica
- **Estado**: Implementado.
- **Contexto**: El archivo completo de ubigeos pesaba 23MB, lo que destruiría la performance del lado del cliente.
- **Decisión**: Crear un script de importación backend (`import-data.php`) que procese el JSON, extraiga solo las ubicaciones con especialistas y guarde un diccionario reducido (`adium_geo_data`) en la base de datos de WordPress.
- **Consecuencias**:
  - Tiempos de carga casi instantáneos en la página de búsqueda.
  - El buscador es completamente dinámico pero sin penalización al renderizado inicial.
