# Changelog

Todos los cambios notables del proyecto se documentan aquí.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/).

## [2026-02-01] Menú: Añadir Clientes a Nosotros

### Añadido
- **Item de menú "Clientes"** (ID 2760) como submenú de "Nosotros" (ID 2712)
- Enlace a `/clientes/`
- Menú principal ahora tiene 15 items (antes 14)

### Estructura actualizada
```
Nosotros (/nosotros/)
  - Filosofía -> /filosofia/
  - Metodología -> /metodologia/
  - Mayte Tortosa -> /mayte-tortosa-proportione/
  - Javier Cuervo -> /inteligencia-artificial-...
  - Clientes -> /clientes/  ← NUEVO
```

---

## [2026-02-01] Deshabilitar Comentarios y Reseñas

### Objetivo
Reducir elementos de interacción que no aportan valor. Web informativa, no interactiva.

### Añadido
- **functions.php**: Código PHP para deshabilitar comentarios completamente:
  - Redirige página `edit-comments.php` al dashboard
  - Quita metabox de comentarios del dashboard
  - Deshabilita soporte de comentarios/trackbacks en todos los post types
  - Filtra `comments_open` y `pings_open` para retornar false
  - Oculta comentarios existentes con `comments_array`
  - Quita página de comentarios del menú admin
  - Quita enlace de comentarios de la admin bar

- **proportione-design-system.css**: CSS para ocultar UI de comentarios:
  - `#comments`, `.comments-area`, `.comment-respond`, etc.
  - `.wp-block-comments`, `.wp-block-post-comments-form`

### Pendiente en servidor
- Cerrar comentarios en todos los posts existentes (WP-CLI)
- Corregir enlace menú Filosofía → `/divina-proportione/`
- Limpiar 128 comentarios históricos de BD (opcional)
- Flush caches

### Cómo reactivar (si fuera necesario)
1. Quitar el bloque "DESHABILITAR COMENTARIOS" de `functions.php`
2. Quitar "PARTE 18: OCULTAR COMENTARIOS" de `proportione-design-system.css`
3. En admin: Ajustes → Comentarios → Habilitar

---

## [2026-02-01] Footer V2 - Rediseño Completo

### Objetivo
Reducir bounce rate de ~70% a <50% mediante un footer con más navegación y engagement.

### Añadido
- **Footer de 5 columnas** (antes 3):
  - Marca: Logo + tagline
  - Servicios: 4 links de navegación
  - Empresa: 7 links de navegación
  - Newsletter: Formulario inline
  - Social: LinkedIn + contacto

- **15+ links internos** para mejorar navegación

- **Archivos nuevos**:
  - `elementor-templates/footer-proportione-v2.json` - Template Elementor
  - `wp-content/themes/hello-elementor-child/footer-proportione.css` - Estilos
  - `docs/GUIA-FOOTER-V2.md` - Documentación completa

### Modificado
- `wp-content/themes/hello-elementor-child/functions.php` - Encolado CSS footer
- `docs/PLAN-REDISENO-BLOG-SINGLE.md` - Añadido objetivo global de bounce rate

### Especificaciones
- Background granate: `#5F322F`
- Bottom bar: `#4a2623`
- Texto: `#F5F0E6` (crema)
- Botón newsletter: `#6E8157` (verde)
- Accesibilidad: WCAG AA, focus visible, touch targets 44px
- Responsive: Desktop 5 cols, Tablet 2+3 cols, Mobile stack vertical

### Impacto Estimado
- Bounce rate: -18-32%
- Páginas por sesión: +2-3

---

## [2026-01-31] Redirecciones 301 + Correcciones Visuales

### Añadido
- **9 Redirecciones 301** implementadas en `.htaccess-new`:
  - `/inteligencia-artificial-generativa/` → `/ia-generativa/`
  - `/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/` → `/organizacion-agile/`
  - `/estrategia-de-retail-omnicanal/` → `/estrategia-omnicanal-retail/`
  - `/consultoria-de-negocio/` → `/consultoria-negocio/`
  - `/la-era-de-la-ia-generativa/` → `/ia-generativa/`
  - `/estrategia-transformacion-digital/` → `/transformacion-digital/`
  - `/quienes-somos/` → `/nosotros/`
  - `/nuestro-equipo/` → `/nosotros/`
  - `/el-equipo/` → `/nosotros/`

- **Documentación nueva**:
  - `docs/PLAN-REDIRECCIONES-301.md` - Plan detallado de redirecciones
  - `docs/MENU-ESTRUCTURA-OFICIAL.md` - Estructura del menú
  - `docs/IMPLEMENTACION-SEO-GEO-4PAGINAS.md` - Implementación SEO

- **CSS nuevos**:
  - `blog-single-enhanced.css` - Template mejorado para posts
  - `investigacion.css` - Estilos página investigación

- **Páginas nuevas**:
  - `staging19-backup/pages/clientes.php` - Página de clientes

### Modificado
- **metodologia.php**: Color H1 hero cambiado a blanco puro (#FFFFFF)
- **consultoria-negocio.php**: Añadida sección CTA final
- **blog-single-enhanced.css**: Añadido CSS para ocultar imágenes duplicadas en cabecera de posts
- **investigacion.php**: Rediseño completo de la página
- **estrategia-innovacion.php**: Hero blanco, altura reducida
- **proportione-corrections.css**: Fixes para consultoria-negocio

### Verificado
- Todas las redirecciones 301 testeadas con curl: OK
- Sin cadenas de redirección detectadas
- Destinos retornan 200 OK

---

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
