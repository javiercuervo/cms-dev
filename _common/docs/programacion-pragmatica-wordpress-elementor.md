# Programación Pragmática con WordPress + Elementor

## 1. Contexto y Objetivos

### Qué entendemos por "programación pragmática" en este stack

La programación pragmática aplicada a WordPress + Elementor significa **priorizar soluciones simples, robustas y mantenibles sobre la complejidad innecesaria**. En lugar de construir arquitecturas sofisticadas o de intentar controlar todos los aspectos del sistema, un enfoque pragmático reconoce las limitaciones del stack y optimiza dentro de esas limitaciones.

En el contexto específico de Elementor, esto significa:

1. **Trabajar con la arquitectura nativa** de Elementor y WordPress en lugar de intentar superarla con soluciones personalizadas complejas.
2. **Separar claramente preocupaciones**: diseño (Elementor), contenido (WordPress), lógica (child theme y plugins mínimos).
3. **Evitar el «bloqueo»** (lock-in) mediante el uso deliberado de child themes, hooks/filters y patrones estándar de WordPress.
4. **Actualizable por defecto**: cada decisión debe permitir que futuros updates de WordPress, Elementor y plugins se apliquen sin quebrantar el sitio.
5. **Equipo sobre complejidad**: las decisiones deben permitir que tanto desarrolladores como editores de contenido trabajen con seguridad.

### Prioridades del Stack

- **Mantenibilidad**: el sitio debe ser fácil de entender y modificar 6, 12 o 24 meses después de su creación.
- **Actualizaciones seguras**: WordPress Core, Elementor, plugins y theme deben poder actualizarse sin temor a roturas.
- **Simplicidad**: la solución más simple que funciona es mejor que la sofisticada.
- **Documentación implícita**: la estructura misma del código debe documentar intenciones.

---

## 2. Elección de Theme: ¿Hello Elementor u Otras Opciones?

### Análisis de Hello Elementor

**Hello Elementor** es un tema **blank canvas** (lienzo en blanco) diseñado y mantenido oficialmente por los desarrolladores de Elementor. Sus características principales son:

#### Ventajas para un stack pragmático

| Aspecto | Detalle |
|--------|---------|
| **Ligereza** | Aproximadamente 50KB en tamaño total. Viene sin estilos excepto reset.css básico. Esto elimina conflictos de CSS y garantiza que todo el diseño proviene de Elementor. |
| **Compatibilidad nativa** | 100% compatible con Elementor Core y Pro. Diseñado específicamente para ser usado *con* Elementor, no como tema independiente. |
| **Mantenimiento** | Soporte oficial de Elementor; recibe actualizaciones alineadas con versiones de Elementor. Disponible en WordPress.org con >1 millón instalaciones activas. |
| **Libre para siempre** | Completamente gratuito, sin planes premium ocultos. Los únicos costos son Elementor Pro si se necesita Theme Builder. |
| **Actualizaciones seguras** | Siendo tan minimalista, el riesgo de conflictos post-actualización es prácticamente cero. |
| **Separación de responsabilidades** | El tema no intenta hacer diseño; deja todo a Elementor. Esto es pragmático. |

#### Limitaciones y consideraciones

| Limitación | Contexto |
|-----------|---------|
| **Requiere Elementor** | El tema es prácticamente vacío. Sin Elementor instalado y activado, el sitio se verá sin estilos. Esto **no es un problema** en un stack Elementor puro. |
| **No es starter theme tradicional** | No está pensado para desarrollo PHP personalizado extenso. Si necesitas hooks/filters complejos en el theme, un child theme lo resuelve. |
| **Header/Footer dinámicos necesitan Pro** | Para usar Theme Builder (headers/footers/single post templates), requieres Elementor Pro. Sin Pro, debes editar en Elementor free (limitaciones). |

### Comparación con Alternativas

Para un proyecto centrado en **mantenibilidad y actualizaciones seguras**, las alternativas más relevantes son:

#### Astra

- **Peso**: ~50KB (similar a Hello).
- **Características**: muchas opciones nativas de customización, integración profunda con WooCommerce y LMS.
- **Ideal para**: principiantes, sitios e-commerce, usuarios que prefieren UI amigable.
- **Pragmático**: sí, pero añade opciones que no necesitas si usas Elementor puro. Más overhead de mantenimiento.
- **Recomendación**: usa Astra si necesitas featured nativas del theme (e.g., tienda WooCommerce integrada). Si tu foco es 100% Elementor, Hello es más limpio.

#### GeneratePress

- **Peso**: muy ligero, modular.
- **Características**: enfocado en desarrolladores, hooks/filters nativos, más personalizable vía código.
- **Ideal para**: desarrolladores que quieren máximo control, arquitecturas complejas.
- **Pragmático**: menos que Hello para un stack Elementor, porque añade complejidad PHP cuando Elementor ya resuelve el diseño.
- **Recomendación**: evita GeneratePress si tu meta es evitar código custom. Use Hello.

### Conclusión explícita: ¿Es Hello Elementor la mejor opción?

**SÍ, para proyectos centrados en mantenibilidad y actualizaciones seguras en un stack Elementor-first.**

Razones:

1. Eliminación de conflictos de CSS/tema.
2. Actualizaciones del theme prácticamente nunca rompen el sitio (porque casi no hay código).
3. Rol claro: WordPress + Hello = gestión de contenido. Elementor = diseño y estructura.
4. Soporte oficial garantiza alineación con roadmap de Elementor.
5. Child theme es opcional (solo si necesitas customización mínima de PHP).

**Excepciones donde otro theme es mejor:**

- **Astra**: si el proyecto es e-commerce complex con necesidades nativas de WooCommerce más allá de lo que Elementor ofrece.
- **GeneratePress**: si el equipo es 100% developers y prefiere arquitectura code-first con Elementor como herramienta auxiliar (caso raro).

**Recomendación final**: Comienza siempre con Hello Elementor. Migrá a Astra solo si necesitas features específicas que Hello + Elementor no cubre.

---

## 3. Principios de Programación Pragmática en WordPress + Elementor

### Principios clave aplicables a este stack

#### 1. **Evitar lock-in innecesario**

Un sitio está *locked-in* cuando el cambio o actualización de un componente clave destruye funcionalidad. En WordPress + Elementor, el lock-in ocurre cuando:

- Modificas directamente los archivos del theme parent (no child theme).
- Guardas CSS/JS personalizado en múltiples lugares sin control.
- Creas dependencias en plugins deprecated o sin mantenimiento.

**Traducción pragmática:**
- Usa child theme **siempre**, incluso si solo sobrescribes CSS.
- Centraliza todo código personalizado en `/wp-content/themes/hello-elementor-child/`.
- Mantén un inventario de plugins activos: ¿es imprescindible cada uno? Si la respuesta es no, elimina.

#### 2. **Separación clara de lógica y diseño**

WordPress + Elementor ya te fuerza esto: WordPress = contenido y estructura, Elementor = diseño visual. Respeta esa frontera.

**Traducción pragmática:**
- No añadas lógica PHP dentro de Elementor (widgets HTML/custom code).
- Si necesitas lógica (filtros de contenido, búsquedas), pónla en un plugin pequeño o en el child theme `functions.php`, no en Elementor.
- Usa dynamic tags y display conditions de Elementor para contenido dinámico, no custom queries en widgets Elementor.

#### 3. **Plugins mínimos, bien mantenidos**

Cada plugin es una deuda técnica potencial. Un plugin sin actualizaciones en 6 meses es un riesgo de seguridad.

**Traducción pragmática:**
- Plugin stack mínimo para este tipo de proyecto:
  - **Elementor** (Pro opcional, según scope).
  - **WP Rocket** o **Bluehost Caching** (caching, minificación CSS/JS).
  - **UpdraftPlus** o **BackWPup** (backups).
  - **Wordfence** (security, logs).
  - [Opcional] **ACF** (si necesitas custom fields para contenido dinámico).
  - [Opcional] **WooCommerce** (si es tienda e-commerce).
- Elimina cualquier plugin que no haya sido actualizado en >180 días.
- Verifica que cada plugin está en el repositorio oficial de WordPress.org (señal de confianza).

#### 4. **CSS y JavaScript controlados y localizados**

El CSS/JS disperso es el enemigo. Si hay cinco lugares donde se puede meter estilos personalizados, habrá cinco, y actualizaciones se volverán caos.

**Traducción pragmática:**
- **Estilos globales**: usa Elementor > Settings > Custom CSS (centralizado, eficiente).
- **Estilos por sección**: usa el Custom CSS tab dentro de cada sección en Elementor (scope automático).
- **JavaScript personalizado**: nunca en widgets HTML. Usa:
  - `wp_enqueue_script()` en child theme `functions.php`.
  - Elementor Custom Code (Pro) para snippets globales.
  - Nunca uses `!important` a menos que sea last resort documentado.
- **Documentación**: cada línea de CSS/JS personalizado debe tener comentario indicando *por qué* existe.

#### 5. **Child theme como single source of truth para customizaciones**

El child theme es donde vive todo código que extiende WordPress/Elementor.

**Traducción pragmática:**
- Estructura mínima de child theme:
  ```
  /hello-elementor-child/
  ├── style.css          (con header de child theme)
  ├── functions.php      (hooks, filters, enqueues)
  ├── /css/
  │   └── custom.css     (estilos adicionales, si es necesario)
  └── /js/
      └── custom.js      (scripts personalizados)
  ```
- Nunca copies archivos del parent theme al child theme a menos que **debas** sobrescribir templating (raro).
- Usa hooks y filters en lugar de sobrescribir templates. Ejemplo:

```php
// En functions.php del child theme: modificar footer sin copiar footer.php
add_filter( 'hello_elementor_footer_text', function( $text ) {
    return '© ' . date('Y') . ' ' . get_bloginfo('name');
});
```

### Patrones de decisión: cómo aplicar pragmatismo día a día

**Pregunta 1: "¿Necesito un plugin para esto?"**
- Si Elementor + WordPress core + ACF (custom fields) lo resuelven → **no instales plugin**.
- Si lo resuelve solo Elementor → **no instales plugin**.
- Si necesitas funcionalidad exclusiva y no hay alternativa → busca plugin bien mantenido en WordPress.org.

**Pregunta 2: "¿Dónde pongo este CSS/JS?"**
- ¿Es global (toda la web)? → Elementor > Custom Code o child theme `functions.php` con `wp_enqueue_style()`.
- ¿Es de una sección específica? → Custom CSS tab en esa sección en Elementor.
- ¿Es de un widget específico? → Custom CSS de ese widget.

**Pregunta 3: "¿Creo child theme?"**
- Sí, siempre. Incluso si Hello Elementor es minimalista, necesitas un lugar para customizaciones futuras.

---

## 4. Patrones Recomendados

### 4.1 Organización de Elementor: Template, Secciones Globales y Theme Builder

#### Plantillas Reutilizables (Elementor Templates)

Elementor permite guardar secciones como templates y reutilizarlas. Hay dos tipos:

**Plantillas Locales** (guardan solo en ese sitio):
- Derecha → Save as Template → nombra descriptivamente.
- Se usa con Template widget en otras páginas.
- Cambios en la plantilla actualizan todas instancias.
- **Uso pragmático**: patrones de secciones que repites (hero section, CTA, footer simple).

**Plantillas en Cloud** (v3.29+, guardan en tu cuenta Elementor):
- Mismo workflow, pero sincronizadas a través de múltiples sitios.
- **Uso pragmático**: si gestionar múltiples sitios, centraliza templates en cloud para consistencia.

#### Global Widgets (Elementor Pro)

Un Global Widget es un widget guardado que, cuando se edita, actualiza automáticamente todas instancias.

**Uso pragmático:**
- Testimonios que aparecen en múltiples páginas → guardar como Global Widget.
- Bloque de botones CTA estándar → Global Widget.
- Aviso de promoción temporal → Global Widget (edita una vez, refleja en todas partes).

**Cuidado**: Global Widgets **no permiten customización por página**. Si necesitas variar contenido pero mantener estilos, usa Dynamic Tags en lugar de Global Widget.

#### Estructura recomendada

```
Elementor Library (Templates)
├── Headers
│   ├── Header - Default
│   ├── Header - Landing Page
│   └── Header - Blog
├── Sections
│   ├── Hero - Estándar
│   ├── CTA - Primary
│   ├── Testimonials Block
│   └── Feature Grid
├── Footers
│   └── Footer - Default
└── Global Widgets
    ├── Button CTA Primary
    ├── Alert Box
    └── Testimonial Card
```

### 4.2 Theme Builder: Construir plantillas de tema dinámicas

El Theme Builder (Elementor Pro) permite crear plantillas para header, footer, single posts, archives, etc. Funciona con display conditions.

#### Flujo recomendado

1. **Crear plantilla base** (single post, archive):
   - Ir a Templates > Theme Builder > [tipo de template].
   - Click "Add New".
   - Usar dynamic tags para contenido (post title, excerpt, featured image, etc.).
   
2. **Configurar display conditions**:
   - Cada template tiene "display conditions" que dicta dónde aparece.
   - Ejemplo: "Single post → Category = Blog" → esta plantilla solo en posts de la categoría Blog.
   - Ejemplo: "Singular → Pages" → esta plantilla en todas las páginas (no posts).

3. **Reutilizar entre templates**:
   - El header/footer que creas se aplica globalmente (si configuras conditions a "Entire Site").
   - Single post template se aplica dinámicamente a todos los posts que cumplan conditions.

#### Display Conditions: Tipos principales

| Condition Type | Uso | Pragmático |
|---------------|-----|-----------|
| **General > Entire Site** | Header/Footer global | ✓ Sí |
| **Singular > Page/Post** | Plantilla para todos los pages o posts | ✓ Sí |
| **Archive** | Plantilla para listings (blog archive, categories) | ✓ Sí |
| **Custom Conditions** (ACF fields, Custom post type) | Mostrar solo si custom field tiene valor X | ✓ Avanzado pero útil |
| **User role, Date/Time** | Mostrar si usuario es Admin, o solo en horarios específicos | ⚠ Rara vez necesario |

**Patrón recomendado mínimo:**

```
Theme Builder Structure
├── Header
│   ├── Default Header (Condition: Entire Site)
├── Footer
│   ├── Default Footer (Condition: Entire Site)
├── Single Post
│   ├── Blog Post Template (Condition: Single Post → Post type: Post)
├── Archive
│   ├── Blog Archive Template (Condition: Archive → Post type: Blog)
└── 404 Page
    └── 404 Template (Condition: 404)
```

Si el proyecto es simple (blog estándar), esto es suficiente. Si es complejo (múltiples post types, categorías con layouts distintos), añade conditions más específicas.

### 4.3 Contenido Dinámico: Dynamic Tags y ACF

#### Cuándo usar Dynamic Tags

Dynamic Tags permiten insertar datos automáticamente (post title, excerpt, custom fields, etc.).

**Ejemplo pragmático:**
- Template de single post: heading con dynamic tag → post title.
- Featured image widget con dynamic tag → featured image del post.
- Descripción del autor con dynamic tag → author bio.

Cualquier dato que venga de WordPress (post fields, ACF, user data) es candidato para dynamic tag.

#### Integración con ACF (Advanced Custom Fields)

ACF es el estándar de facto para custom fields. Elementor tiene integración nativa con ACF.

**Flujo típico:**

1. Crear custom field en ACF (e.g., "Autor especial", tipo Relationship).
2. En Elementor widget → click Dynamic Tag icon → ACF Field → selecciona "Autor especial".
3. Listo: el field se rellena automáticamente según ACF.

**Patrón pragmático:**

```
ACF Field Groups (separados por contexto)
├── Post Meta (si es post type)
│   ├── Hero subtitle
│   ├── Testimonial quote
│   └── Featured case studies (Relationship)
├── Page Meta (si es página)
│   ├── Page hero image
│   └── Custom layout (select field)
└── Author Meta (user meta)
    ├── Author bio extended
    └── Social links
```

Cada field es accesible vía dynamic tag en Elementor. Esto mantiene contenido y presentación separados.

### 4.4 CSS y JavaScript: Patrones de control

#### CSS Centralizado

```
Custom Code (Elementor Settings)
├── Global typography rules
├── Color overrides
├── Responsive utilities
└── Bug fixes
```

**Archivo de respaldo: child theme custom.css**

```css
/* /hello-elementor-child/css/custom.css */

/* Override any global styles */
:root {
  --custom-spacing: 2rem;
}

/* Utility classes */
.text-highlight { color: var(--primary-color); }

/* Bug fixes for specific widgets */
.elementor-widget-heading h2 { letter-spacing: -0.5px; }
```

Enqueue en `functions.php`:

```php
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 
        'custom-styles',
        get_stylesheet_directory_uri() . '/css/custom.css',
        [],
        filemtime( get_stylesheet_directory() . '/css/custom.css' )
    );
});
```

**Nunca uses `!important` sin documentación.** Si lo necesitas:

```css
/* FIX: Elementor's .elementor-widget-image was overriding on mobile */
.my-image-fix { width: 100% !important; }
```

#### JavaScript Modular

```php
// En functions.php: enqueue script personalizado
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_script(
        'custom-interactions',
        get_stylesheet_directory_uri() . '/js/custom.js',
        [],
        filemtime( get_stylesheet_directory() . '/js/custom.js' ),
        true // en footer
    );
});
```

```javascript
// /hello-elementor-child/js/custom.js
// Modular, sin conflictos globales

const CustomInteractions = {
    init() {
        this.setupEventListeners();
    },
    setupEventListeners() {
        // Solo logic aquí
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('toggle-menu')) {
                // event handler
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', () => {
    CustomInteractions.init();
});
```

**Nunca uses `!important` en JavaScript** (no aplica). **Sí evita manipular el DOM innecesariamente**, porque Elementor regenera CSS frecuentemente y puedes estar en conflicto.

---

## 5. Anti-patrones y Errores Frecuentes

### 5.1 Anti-patrones que dificultan mantenibilidad

#### 1. Modificación directa del theme parent sin child theme

**El problema:**
```
❌ Editar directamente /wp-content/themes/hello-elementor/style.css
  → Actualizando Hello Elementor → todas customizaciones borradas.
```

**La solución:**
```
✓ Crear child theme:
  /wp-content/themes/hello-elementor-child/
  ├── style.css (con header de child theme)
  ├── functions.php
  └── [cualquier override de template]
```

**Cómo crear child theme mínimo:**

Archivo `style.css` en carpeta child:

```css
/*
Theme Name: Hello Elementor Child
Theme URI: 
Description: Child theme para Hello Elementor
Version: 1.0
Author: 
Template: hello-elementor
Text Domain: hello-elementor-child
Domain Path: /languages
*/
```

Archivo `functions.php`:

```php
<?php
// Enqueue parent theme styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'hello-elementor', 
        get_template_directory_uri() . '/style.css' 
    );
    // Opcionalmente, tus estilos custom
    wp_enqueue_style( 'hello-elementor-child',
        get_stylesheet_uri()
    );
});

// Tus customizaciones aquí
?>
```

Luego ir a Appearance > Themes > Activate "Hello Elementor Child".

#### 2. CSS y JavaScript disperso en múltiples lugares

**El problema:**
```
❌ CSS en:
   - Elementor Custom CSS (global)
   - Custom CSS en 5 secciones diferentes
   - Elementor Custom Code
   - style.css del child theme
   - Inline en HTML widgets
   
  → Nadie sabe dónde está la regla. Actualizar es caos.
```

**La solución - Jerarquía clara:**

1. **CSS Global** → Elementor Settings > Custom CSS.
2. **CSS de Sección** → Custom CSS tab en cada sección (scoped automáticamente).
3. **CSS de Override** → child theme `custom.css` (si es necesario).

**Nunca mezcles niveles.** Documento dónde va cada cosa.

#### 3. Exceso de plugins sin auditoría regular

**El problema:**
```
❌ Instalar plugin para cada pequeña necesidad:
   - Plugin A para tablas (1 tabla en el sitio)
   - Plugin B para testimonios (10 testimonios)
   - Plugin C para acordeones (2 acordeones)
   - ...
   
  → Fragmentación. Cada plugin es mantenimiento, actualizaciones,
    riesgo de compatibilidad.
```

**La solución - Plugin audit trimestral:**

Cada 3 meses, revisar:

```
Plugins instalados:
✓ ¿Se usa activamente?
✓ ¿Está en WordPress.org (señal de confianza)?
✓ ¿Fue actualizado en los últimos 6 meses?
✓ ¿Tiene más de 1000 instalaciones activas?

Si algo falla ↓ elimina.
```

**Plugins recomendados mínimos para mantenibilidad:**

| Plugin | Razón |
|--------|-------|
| Elementor | Core builder |
| Elementor Pro | Theme Builder, dynamic content |
| WP Rocket | Caching, performance |
| UpdraftPlus | Backups automáticos |
| Wordfence | Seguridad, logs |
| ACF (si necesario) | Custom fields |

Cualquier otro plugin debe justificarse.

#### 4. Personalización que rompe con updates

**El problema:**
```
❌ Update de Elementor 3.20 → 3.21
  → Uno de tus custom CSS sobrescribe la nueva feature
  → Sitio se ve roto
```

**La solución - Testing en staging:**

Siempre:

1. **Backup de producción** (automático vía UpdraftPlus).
2. **Clone a staging** (WP STAGING plugin).
3. **Test updates en staging** (Core, Elementor, plugins).
4. **Espera 2-3 días**, verifica que todo funciona.
5. **Aplica en producción**.

**En la configuración de staging**, desactiva el robo y public indexing:

```php
// En staging wp-config.php
define( 'NOBLOGREDIRECT', 'https://production-site.com' );
```

#### 5. Código desorganizado en functions.php

**El problema:**
```
❌ functions.php con 1000 líneas, sin sección, sin comentarios
  → Imposible debuguear, mantener o extender
```

**La solución - Organización clara:**

```php
<?php

// ============================================
// 1. ENQUEUES - CSS y JS
// ============================================
add_action( 'wp_enqueue_scripts', function() {
    // Estilos
    wp_enqueue_style( '...', ... );
    // Scripts
    wp_enqueue_script( '...', ... );
});

// ============================================
// 2. HOOKS Y FILTERS
// ============================================

// Ejemplo: modificar footer
add_filter( 'hello_elementor_footer_text', function( $text ) {
    return '© ' . date('Y');
});

// ============================================
// 3. CUSTOM POST TYPES / TAXONOMIES
// ============================================
// register_post_type(), register_taxonomy()

// ============================================
// 4. UTILIDADES
// ============================================
function custom_helper() { ... }

?>
```

---

## 6. Estrategia de Actualizaciones Seguras

### 6.1 Checklist pre-actualización

Antes de cualquier update:

```
1. [ ] Backup automático ejecutado (UpdraftPlus)
2. [ ] Clone a staging creado (WP STAGING)
3. [ ] Changelog de actualización leído (Elementor Blog / Release Notes)
4. [ ] Plugins verifican compatibility tags (Elementor > System Info)
5. [ ] Updates aplicadas en staging
6. [ ] Tests en staging:
       - [ ] Frontend se carga
       - [ ] Elementor editor funciona
       - [ ] Templates (header/footer) se ven bien
       - [ ] Custom CSS/JS siguen funcionando
       - [ ] Plugins critical (Rocket, ACF) OK
7. [ ] Esperar 24-48 horas si es major release
8. [ ] Aplicar en producción en horario de bajo tráfico
9. [ ] Post-actualización:
       - [ ] Limpiar caché (Rocket, CDN)
       - [ ] Regenerate CSS (Elementor > Tools)
       - [ ] Test de humo en homepage, página sample
```

### 6.2 WordPress Core

**Frecuencia:** Inmediato para security patches (X.X.1 → X.X.2). Major releases (6.0 → 6.1) → esperar 1-2 semanas.

**Riesgo:** Bajo si child theme + plugins están up-to-date.

**Comando (si usas WP-CLI):**

```bash
wp core update --dry-run  # Previsualizando
wp core update             # Aplicar
```

### 6.3 Elementor y Elementor Pro

**Frecuencia:** Minor updates (3.20 → 3.21) inmediato en staging, major releases (3.20 → 4.0) con cuidado extra.

**Paso crítico:** Regenerar CSS & Data después de update:

1. Ir a Elementor > Tools.
2. Click "Regenerate CSS & Data".
3. Esperar (puede tomar minutos si hay muchas páginas).

**Por qué:** Elementor mantiene cache de CSS. Si es stale, estilos rotos.

### 6.4 Plugins

**Política:** Update en pequeños lotes (2-3 plugins por vez), no todos simultáneamente.

**Paso por paso:**

1. Backup.
2. Staging: update plugin X.
3. Test críticas funciones.
4. Producción: update plugin X.
5. Verificar en vivo.
6. Esperar 24h.
7. Update siguiente plugin.

**Excepciones:** Security patches aplican inmediatamente en ambos (staging + producción).

### 6.5 Theme

**Política:** Hello Elementor casi nunca necesita update (tan minimalista). Si hay update, es minor fix.

**Riesgo:** Muy bajo. Aplicar sin staging.

---

## 7. Checklist Pragmático para Nuevos Proyectos

Antes de lanzar un sitio con este stack, valida:

### 7.1 Selección de Theme y Stack Base

- [ ] Theme seleccionado: **Hello Elementor**
- [ ] Elementor Free instalado y activado
- [ ] Elementor Pro licenciado (si usas Theme Builder)
- [ ] Child theme creado: `/hello-elementor-child/`
- [ ] style.css y functions.php en child theme listos
- [ ] WordPress.org plugins solo (no .zip descargados)

### 7.2 Estructura de Contenido

- [ ] Post types definidos (Blog, Cases, Testimonios, etc.)
- [ ] Taxonomies claras (Categorías, Tags, Custom)
- [ ] ACF field groups organizadas (si necesitas custom fields)
- [ ] Documentación: hoja de Google o Notion con estructura contenido

### 7.3 Política de Plugins

- [ ] Plugins listados y justificados:
  - Elementor ✓
  - Elementor Pro ✓
  - WP Rocket ✓
  - UpdraftPlus ✓
  - Wordfence ✓
  - [Custom] ✓
- [ ] Cada plugin verificado en WordPress.org
- [ ] Versiones pinned (no auto-update aún)

### 7.4 Diseño y Elementor

- [ ] Elementor library creada (Templates, Global Widgets)
- [ ] Color scheme global (Elementor > Settings > Global Colors)
- [ ] Typography global configurada
- [ ] Theme Builder creado (header, footer, single post, archive)
- [ ] Display conditions configuradas

### 7.5 Backups y Staging

- [ ] UpdraftPlus configurado:
  - [ ] Backup automático diario
  - [ ] Almacenamiento remoto (Google Drive, Amazon S3)
  - [ ] Retención: últimos 30 días
- [ ] Sitio de staging creado (WP STAGING)
- [ ] Procedimiento de restore documentado

### 7.6 Seguridad y Performance

- [ ] Wordfence instalado (firewall, logs)
- [ ] WP Rocket caching activado
- [ ] HTTPS forzado (htaccess o servidor)
- [ ] Two-factor authentication en admin
- [ ] Usuarios no-admin con roles limitados
- [ ] Archivo wp-config.php fuera de web root (si possible)

### 7.7 Documentación para el Equipo

- [ ] **README.md**: estructura del proyecto, cómo clonar, instalar
- [ ] **UPDATES.md**: protocolo para actualizar (staging → producción)
- [ ] **CSS-JS-POLICY.md**: dónde va cada tipo de customización
- [ ] **PLUGINS.md**: por qué está cada plugin, cómo removerse
- [ ] **Elementor Library Guide**: dónde están templates, cómo reutilizar
- [ ] **ACF Field Reference**: si usas ACF, documenta cada field y dónde se usa

### 7.8 Test Inicial

- [ ] [ ] Homepage carga sin errores de consola
- [ ] [ ] Elementor editor abre sin lag
- [ ] [ ] Theme Builder templates aplican correctamente
- [ ] [ ] Dynamic tags rellenan datos
- [ ] [ ] Responsive en mobile/tablet
- [ ] [ ] Caching funciona (WP Rocket)
- [ ] [ ] Backups se ejecutan sin error
- [ ] [ ] Staging es clon exacto de producción

---

## 8. Conclusiones

### Resumen de decisiones pragmáticas clave

| Decisión | Razón Pragmática |
|----------|------------------|
| **Hello Elementor** | Mínimalista, soporte oficial, sin overhead |
| **Child theme siempre** | Aislamiento de customizaciones, updates seguras |
| **Plugins < 6** | Mantenibilidad, menos puntos de falla |
| **CSS centralizado** | Evita CSS Hell, updates sin conflictos |
| **Theme Builder + Dynamic Tags** | Separación contenido/diseño, escalable |
| **Staging pre-updates** | Riesgo cero en producción |
| **Documentación explícita** | Equipos rotan, el código debe auto-documentarse |

### Recomendaciones finales

1. **Comienza minimalista.** Hello Elementor + Elementor Free puede resolver 80% de proyectos. Escala cuando sea necesario.

2. **Instrumentaliza la arquitectura.** WordPress + Elementor ya te ofrecen separación de responsabilidades. Respétala.

3. **Evita la tentación de personalizaciones complejas.** Si encuentras escribiendo 100+ líneas de PHP para algo, probablemente hay un plugin estándar mejor.

4. **Staging es obligatorio.** No es opcional. Cada proyecto debe tener staging activo y protocol de testing.

5. **Documenta intenciones, no código.** El código debe ser tan simple que sea auto-evidente. Documenta *por qué* algo existe, no *qué* hace.

6. **Actualiza regularmente.** Un sitio con updates al día es más seguro y mantenible que uno que ves "después". Haz updates cada mes mínimo.

7. **Mide lo que importa.** Core Web Vitals, uptime, seguridad. No "cuántos widgets customizados", que es métrica de complejidad innecesaria.

8. **Equipo primero, features después.** Si un cambio requiere que expliques 20 minutos al equipo, es demasiado complejo. Elige la solución que requiere menor mantenimiento.

### Sobre mantener el pragmatismo a largo plazo

La tentación mayor es aumentar complejidad gradualmente. Un plugin aquí, una customización allá, una feature "rápida" que requiere código custom. 

**Defensa:**

- **Auditoría trimestral:** Revisar qué se agregó últimamente. ¿Es necesario?
- **Refactoring preventivo:** Si `functions.php` supera 300 líneas, fragmenta en helper plugin.
- **Migración de features:** Si un plugin hace X + Y + Z, pero solo usas X, busca alternativa que solo hace X.
- **Prueba la "regla del abuelo":** Sí alguien que no conoce el proyecto lo hereda, ¿puede mantenerlo? Si no, simplifica.

---

## Apéndice: Referencias

- WordPress.org Theme Directory: Hello Elementor
- Elementor Blog: [Hello Theme](https://elementor.com/blog/introducing-hello-theme/)
- Elementor Help: [Theme Builder](https://elementor.com/help/the-elementor-theme-builder/)
- WordPress Developer Handbook: [Hooks](https://developer.wordpress.org/plugins/hooks/)
- Elementor Developers: [Theme Conditions](https://developers.elementor.com/docs/theme-conditions/)
- FastComet: [How to Update WordPress Plugins and Themes Safely](https://www.fastcomet.com/kb/update-wordpress-plugins-and-themes)
- Kinsta: [WordPress Child Theme](https://kinsta.com/blog/wordpress-child-theme/)

---

*Documento generado como guía pragmática para equipos de desarrollo y marketing en WordPress + Elementor. Última revisión: Enero 2026.*
