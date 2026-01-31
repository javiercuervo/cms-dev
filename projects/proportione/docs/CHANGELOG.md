# Changelog

Todos los cambios notables del proyecto se documentan aquí.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/).

## [2026-01-31] Preparación para Producción

### Eliminado
- **CTAs redundantes** de 3 páginas (contacto ya disponible en header):
  - `metodologia.php` - Eliminada sección CTA completa
  - `nosotros.php` - Eliminada sección CTA completa
  - `estrategia-innovacion.php` - Eliminada sección CTA completa

### Actualizado
- **Documentación de Investigación**:
  - README.md - Añadida descripción de investigación como pilar core
  - GUIA-ELEMENTOR-INVESTIGACION.md - Reforzada referencia a `investigacion_proportione.md`

### Archivos modificados
- `staging19-backup/pages/metodologia.php`
- `staging19-backup/pages/nosotros.php`
- `staging19-backup/pages/estrategia-innovacion.php`
- `docs/README.md`
- `docs/GUIA-ELEMENTOR-INVESTIGACION.md`

---

## [2026-01-31] Plantillas de Blog por Categoría

### Añadido
- **4 plantillas CSS diferenciadas** para posts según categoría:
  - `blog-ia-generativa.css` - Tema "Tech-forward" (azul oscuro #0A1628, cyan #00D4FF, violeta #8B5CF6)
  - `blog-estrategia-digital.css` - Tema "Executive Premium" (crema #FAFAF8, granate #5F322F, verde #6E8157)
  - `blog-personas-tecnologia.css` - Tema "Human-Centered" (blanco cálido #FFFBF5, naranja #E07B39, teal #2A9D8F)
  - `blog-generic.css` - Tema genérico Proportione (gris #F5F5F5, colores corporativos)

- **Carga condicional de CSS** en `functions.php`:
  - Función `proportione_blog_templates_css()` - Detecta categoría y carga CSS correspondiente
  - Filtro `proportione_blog_category_body_class()` - Añade clases de categoría al body

### Prioridad de categorías
Cuando un post tiene múltiples categorías:
1. IA Generativa (máxima prioridad - 80 posts)
2. Estrategia Digital (33 posts)
3. Personas y Tecnología (26 posts)
4. Genérica (resto de categorías)

### Archivos modificados
- `wp-content/themes/hello-elementor-child/functions.php`

### Archivos añadidos
- `wp-content/themes/hello-elementor-child/blog-ia-generativa.css`
- `wp-content/themes/hello-elementor-child/blog-estrategia-digital.css`
- `wp-content/themes/hello-elementor-child/blog-personas-tecnologia.css`
- `wp-content/themes/hello-elementor-child/blog-generic.css`

### Pendiente para Elementor
- Duplicar plantilla `Blog Single Template` (ID 2798) 3 veces
- Configurar Display Conditions por categoría
- Limpiar caché: `wp cache flush && wp elementor flush_css`

---

## [2026-01-30] Menú de Navegación v2.0

### Cambios
- Reducido de 17 items a 4 items principales con dropdowns
- Nueva estructura jerárquica:
  - **Servicios** (4 sub-items): Consultoría de Negocio, Estrategia de Innovación, IA, eCommerce & Retail
  - **Nosotros** (3 sub-items): Metodología, Mayte Tortosa, Javier Cuervo
  - **Insights** (2 sub-items): Blog, Investigación
  - **Contacto** (CTA destacado)
- Botón Contacto con estilo CTA (fondo verde #6E8157)
- Renombrado "Perspectivas" → "Insights" (más sofisticado, coherente con consultoría)
- Título de página /blog/ cambiado a "Alma digital"
- Estilos de dropdown con animación suave y bordes redondeados

### Items eliminados temporalmente (URLs 404)
- Transformación Digital (/estrategia-transformacion-digital/)
- Organización Agile (/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/)

### Archivos modificados
- `hello-elementor-child/style.css` - Estilos CTA y dropdowns
- Base de datos WordPress - Estructura del menú (wp_posts, wp_postmeta)

### Scripts añadidos
- `scripts/update-menu.sh` - Aplicar estructura de menú en staging

### Rollback
Si algo falla, restaurar desde:
1. SiteGround Site Tools → Security → Backups
2. O importar: `wp db import /home/customer/backups/staging-pre-menu-YYYYMMDD.sql`

---

## [Unreleased]

### Añadido
- Estructura inicial del repositorio
- Configuración de Git para SiteGround
- Documentación base del proyecto
- Plan completo del flujo de trabajo (PLAN.md)
