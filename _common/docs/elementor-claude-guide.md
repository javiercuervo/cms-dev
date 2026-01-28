# Elementor Pro para Claude Code: Guía Completa de Integración

## 1. Introducción para Claude Code

### ¿Qué es Elementor?

Elementor es un **page builder visual para WordPress** basado en drag-and-drop que permite crear páginas, secciones completas y templates sin escribir código. Funciona como un editor WYSIWYG (What You See Is What You Get) pero generador de HTML/CSS semántico y optimizado.

**Versiones principales:**
- **Elementor Free**: 32 widgets básicos, editor visual, responsive mobile
- **Elementor Pro**: 86+ widgets, Theme Builder, Form Builder, Popup Builder, Dynamic Content, Custom CSS, Optimización de activos

### Cómo encaja en tu Stack

```
Claude Code (IA) → Descripción en texto de la página
    ↓
    → Prompt → Instrucciones de estructura Elementor
    ↓
WordPress + Elementor Pro (Editor visual)
    ↓
GitHub (versionado de contenido/templates)
    ↓
SiteGround (hosting optimizado)
```

Tu rol como Claude Code:
1. **Diseñador conceptual**: Traduce requisitos en estructura semántica de Elementor
2. **Copywriter**: Genera copy, microcopy, y estructura de contenido
3. **Revisor de QA**: Propone checklists antes de publicar
4. **Optimizador**: Sugiere mejoras de rendimiento y accesibilidad

### Modelo Mental: "Cómo Piensa Elementor"

Elementor organiza el contenido en **jerarquía de contenedores**:

```
Página (Page)
  ↓
Contenedor/Sección (Container - nuevo estándar, o Section - legacy)
  ↓
Flexbox/Columnas (elementos de layout flex)
  ↓
Widgets (Heading, Button, Image, Form, etc.)
  ↓
Propiedades de estilo (Global Styles, Custom CSS)
```

**Principio clave**: Cada widget es un componente independiente que heredará estilos globales pero puede sobrescribirse localmente. El orden y nesting importa para render performance.

---

## 2. Arquitectura y Conceptos Clave de Elementor

### 2.1 Estructuras de Layout

#### **Contenedores (Containers) - NUEVO ESTÁNDAR**

Introducidos como default en Elementor 3.6+. Se basan en **CSS Flexbox**.

**Características:**
- Más ligeros en DOM que secciones/columnas
- Permiten dirección: fila (row) o columna (column)
- Soportan wrapping, justificación (justify-content), alineación (align-items)
- Pueden anidarse infinitamente
- Mejor responsive por defecto

**Ejemplo de estructura:**
```
Container (direction: row, gap: 20px)
  ├─ Image Widget (flex: 0 0 40%)
  └─ Container (direction: column, flex: 0 0 60%)
      ├─ Heading Widget
      ├─ Paragraph Widget
      └─ Button Widget
```

#### **Secciones y Columnas (Legacy)**

Todavía soportadas pero migración recomendada a Containers.

**Diferencias:**
- Secciones siempre 100% ancho
- Columnas siempre toman 100% del ancho de sección
- Menos flexibles para layouts complejos
- Convertibles a Containers automáticamente

#### **Flexbox Container (Editor V4)**

El nuevo Flexbox Container en Editor V4 es la evolución del Container. Ofrece:
- Propiedades CSS Flexbox más granulares
- Mayor control sobre `flex-grow`, `flex-shrink`, `flex-basis`
- Mejor para layouts responsivos complejos

### 2.2 Widgets Esenciales para Landing Pages

#### **Widgets Gratuitos (32 en Free, más en Pro)**

| Widget | Uso Primario | Notas |
|--------|-------------|-------|
| **Heading** | Títulos H1-H6 | Vinculados a Global Typography |
| **Paragraph** | Cuerpo de texto | Soporta Rich Text |
| **Button** | CTAs, links | Soporta iconos, hover effects |
| **Image** | Imágenes destacadas | Lazy load nativo, lightbox |
| **Icon Box** | Feature highlights | Icono + heading + descripción |
| **Form** | Captura de leads | Pro: Integración condicional |
| **Spacer** | Espaciado vertical | Alternativa: gaps en Containers |
| **Divider** | Separadores visuales | Línea o espacio |
| **Video** | Embeds multimedia | YouTube, Vimeo, local |

#### **Widgets Pro Críticos para Landings**

| Widget | Función | Ventaja |
|--------|---------|---------|
| **Call to Action** | CTA dedicado con dos botones | Más flexible que Button solo |
| **Price Table** | Tablas de precios/planes | Incluye ribbons, features list |
| **Price List** | Listados de precios con iconos | Ideal para menús, servicios |
| **Testimonial** | Testimonios con avatar/rating | Carrusel disponible |
| **Popup Builder** | Popups modales/capas | Display conditions avanzadas |
| **Loop Grid** | Contenido dinámico repetible | Reemplaza loops manuales |
| **Form Builder (Pro)** | Forms avanzadas | Conditional logic, integraciones |
| **Theme Builder** | Headers/footers globales | Dinámicos con Display Conditions |
| **Counter** | Números animados | Social proof, estadísticas |
| **Progress Bar** | Barras de progreso | Habilidades, métricas |
| **Flip Box** | Tarjetas con flip on hover | 2-sided reveal effect |
| **Animated Headline** | Textos con animación | Rotation, typewriter, etc. |

### 2.3 Theme Builder - Plantillas Globales

El Theme Builder permite crear templates reutilizables para:
- **Header**: Aparece en todas las páginas (o condicionalmente)
- **Footer**: Ídem
- **Single Post**: Plantilla para posts individuales
- **Archive**: Listados (blog, categorías, etc.)
- **404 Page**: Página de error personalizada
- **Search Results**: Resultados de búsqueda

**Display Conditions**: Puedes mostrar/ocultar secciones basándose en:
- Tipo de página (home, single post, archive)
- Taxonomía (categoría, etiqueta)
- Usuario (logueado, rol)
- Dispositivo (mobile, tablet, desktop)
- Horario/fecha

### 2.4 Global Styles y Site Settings

#### **Global Colors**
Acceso: **Settings → Site Settings → Design System → Global Colors**

4 colores predefinidos:
- **Primary**: Botones, links destacados
- **Secondary**: Elementos secundarios
- **Text**: Texto general
- **Accent**: Acentos especiales

Uso en widgets:
```
Button → Color: [Primary]
Link → Color: [Text]
```

**Ventaja**: Cambiar primary color refrescará todos los elementos que lo usen automáticamente.

#### **Global Fonts**
Acceso: **Settings → Site Settings → Design System → Global Fonts**

4 estilos tipográficos:
- **Primary Font**: Headings, títulos
- **Secondary Font**: Subtítulos, énfasis
- **Text Font**: Body, párrafos
- **Accent Font**: Elementos destacados

Cada uno configurable con:
- Familia (Google Fonts, Adobe, custom)
- Tamaño base
- Peso (weight)
- Altura de línea
- Espaciado de letras

#### **Typography (Theme Style)**
Acceso: **Settings → Site Settings → Theme Style → Typography**

Define estilos para:
- `<p>` (párrafos)
- `<h1>` a `<h6>` (headings)
- Links (color, decoración, hover)
- Buttons (tipografía base)

**Workflow recomendado:**
1. Define Global Fonts (familias base)
2. Define Theme Style Typography (tamaños, pesos, espacios por elemento)
3. Los widgets heredan automáticamente

### 2.5 Novedades Relevantes (Q3-Q4 2025)

#### **Editor V4 (Nueva Arquitectura)**

Lanzada como beta, promete:
- **Atomic Elements**: DIV, Flexbox, Heading, Paragraph, Image, Button, SVG (7 elementos nativos)
- **Markup limpio**: Menos clases, estructura más semántica
- **Variables Manager**: Define variables CSS (colores, tamaños) una vez, reutiliza
- **Components**: Convierte cualquier Flexbox en componente reutilizable con sincronización sitewide

**Impacto para Claude Code:**
- Prompts pueden ser más simples: "crea un componente de header con flexbox"
- Mejor para código limpio y optimización de DOM

#### **Angie (AI Agentic para WordPress)**

Plugin gratuito que se integra con Elementor:
- Genera páginas completas desde prompts
- Automatiza tareas multi-paso (crear página → agregar contenido → publicar)
- Usa **MCP (Model Context Protocol)** para entender estructura del sitio

**Caso de uso con Claude Code:**
```
Claude Code: "Angie, crea una landing page de 5 secciones con..."
    → Angie entiende estructura Elementor/WordPress
    → Crea página automáticamente
    → Tú revisas y ajustas en Elementor visual
```

#### **Cloud Templates (v3.29)**

Guarda y sincroniza templates en la nube:
- Crear template de "hero section"
- Reutilizar en múltiples sitios
- Mantener versiones

**Workflow**: Claude propone estructura → Guardas como template → Reutilizas

#### **Ally (Accessibility Assistant)**

Escanea y corrige automáticamente:
- Contraste de colores insuficiente
- Alt text faltante en imágenes
- HTML semántico mejorable
- Enfoque accesible para navegación

**Integración con Claude Code:**
- Propones accesibilidad en prompts
- Ally valida automáticamente

#### **Display Conditions (Ahora Stable)**

Mostrar/ocultar widgets basándose en:
- Lógica condicional de Dynamic Content
- Valores de formulario
- Roles de usuario
- Dispositivo

**Ejemplo:**
```
"Si user_role == 'premium', mostrar sección premium-only"
"Si device == 'mobile', mostrar versión simplificada del header"
```

#### **Size Variables (v3.32)**

Define variables reutilizables para:
- Espaciado (gap, padding, margin)
- Tamaños (width, height)
- Tipografía (line-height, letter-spacing)

```
Variable: --spacing-lg = 32px
Usar en: gap, margin-bottom, padding
Cambiar una vez → Todos los usos se actualizan
```

---

## 3. Uso Orientado a Claude Code (3 Capas)

### 3.1 Capa "System / Policy": Principios Generales

Estos principios guiarán tu sistema prompt para Claude Code.

#### **Principios de Maquetación**

1. **Mobile First**: Diseña para 360px, luego adapta a tablet (768px) y desktop (1024px+)
   - Elementos apilados verticalmente en mobile
   - Grid/flexbox en desktop
   - Touch targets mínimo 44×44px

2. **Contenedores sobre widgets**:
   - Usa Containers/Flexbox para layouts
   - Widgets solo para contenido (Heading, Button, Image)
   - Reduce anidación: max 3-4 niveles

3. **Minimalismo de DOM**:
   - Evita widgets innecesarios (ej: no uses spacer si puedes usar gap en container)
   - Un widget por función
   - Reutiliza Global Styles antes de custom CSS

4. **Responsive con Variables/Breakpoints**:
   - Mobile: 0-480px
   - Tablet: 481-768px
   - Desktop: 769px+
   - Usa units relativos: `em`, `rem`, `%`, `vh`, `vw`

5. **Performance primero**:
   - Imágenes: máx 200KB, formatos WebP/AVIF
   - Fonts: máx 2-3 familias, 2 weights cada una
   - Widgets: máx 30-40 por página
   - CSS: Global Styles vs Custom CSS (90/10 ratio)

#### **Buenas Prácticas de Accesibilidad**

- **Colores**: Contraste mínimo WCAG AA (4.5:1 para texto, 3:1 para elementos grandes)
- **Tipografía**: Size mínimo 14px body, 32px para H1
- **Semántica**: Usa headings en orden (H1 → H2 → H3), no saltes niveles
- **Alt text**: Toda imagen debe tener descripción (excepto decorativas)
- **ARIA labels**: Botones sin texto necesitan `aria-label`
- **Keyboard nav**: Links y botones navegables con Tab
- **Color no único**: No comuniques info solo por color

#### **Consistencia Visual**

- Tipografía: Máx 2 families, colores heredados de Global Fonts
- Espaciado: Usa escala (8px, 16px, 24px, 32px, 48px)
- Bordes/radios: Consistente (0px, 4px, 8px)
- Animaciones: Reducidas, respetar `prefers-reduced-motion`

### 3.2 Capa "Project Prompt": Guía de Descripción de Páginas

Cuando describes una página a Claude Code, usa este formato:

#### **Estructura Recomendada de Prompt**

```markdown
## Descripción de Página: [Nombre Página]

### Objetivo
[Qué debe lograr: capturar leads, vender, informar, etc.]

### Audiencia
[Quién visita: edad, nivel técnico, dispositivos principales]

### Secciones (de arriba a abajo)
1. **Hero**: CTA principal, imagen de fondo, propuesta de valor
2. **Features**: 3-4 features con iconos
3. **Testimonios**: 2-3 testimonios de clientes
4. **Pricing**: Planes de precios
5. **CTA Final**: Formulario de contacto

### Mapping a Elementor

#### Sección Hero
- **Container**: Flexbox, direction: row, gap: 40px
  - **Left Col** (50%): 
    - Heading H1 (Primary Font)
    - Paragraph (Text Font)
    - Button "Get Started" (Primary Color)
  - **Right Col** (50%):
    - Image Widget (600×400px, responsive)

#### Sección Features
- **Container**: Flexbox, direction: row, wrap
  - **Feature 1** (flex: 0 0 calc(33.33% - 16px)):
    - Icon Box Widget (icon + heading + description)
  - [Ídem para Feature 2 y 3]

### Estilos Globales Necesarios
- **Primary Color**: Azul #2563EB
- **Secondary Color**: Gris #6B7280
- **Primary Font**: Inter (headings)
- **Text Font**: Inter (body)
- **Spacing**: 16px base

### Notas Especiales
- Mobile: Pilas verticales, iconos más grandes
- Animations: Fade-in on scroll (suave)
- Forms: 3 campos (nombre, email, mensaje)
```

#### **Cómo Mapear Secciones de Negocio → Elementor**

| Sección Negocio | Estructura Elementor | Widgets Clave |
|---|---|---|
| Proposición de valor | Container Flexbox 60/40 (text/image) | Heading, Paragraph, Image, Button |
| Features/Beneficios | Container Flexbox 3 columnas | Icon Box, Heading, Paragraph |
| Testimonios | Loop Grid o Carousel | Testimonial Widget (Pro) |
| Precios | Container Flexbox + Price Tables | Price Table (Pro), Button |
| Formulario | Centered Container + Form | Form (Pro) con conditional logic |
| FAQ | Accordion (si disponible) o Tabs | Heading + Paragraph en Containers |
| Galería | Loop Grid o Image Gallery | Image, Loop Grid (Pro) |

### 3.3 Capa "Prompts Concretos": Ejemplos para Tareas Específicas

#### **Prompt Tipo 1: Proponer Estructura de Página**

```
Rol: Eres expert en Elementor Pro y UX de landing pages.

Contexto: Estoy diseñando una landing page para una agencia de marketing SaaS.
- Objetivo: Capturar emails de free trial
- Audiencia: CMOs y marketing managers (desktop 70%, mobile 30%)
- Budget máximo 40 widgets

Tarea: Propón la estructura completa en Elementor con:
1. Lista de secciones (arriba a abajo)
2. Para cada sección:
   - Nombre y objetivo
   - Contenedor principal (Container Flexbox o Section)
   - Widgets que incluye
   - Breakpoints responsive (mobile/tablet/desktop)
3. Global Styles necesarios (colores, fonts)
4. Estimado DOM size (widgets × complejidad)

Formato: Markdown, clear hierarchy.
```

**Respuesta esperada de Claude Code:**

```markdown
## Estructura Landing Page: SaaS Marketing

### Sección 1: Hero
- **Container**: Flexbox row gap-40
- **Left (50%)**: H1 + Paragraph + Button + Form inline
- **Right (50%)**: Image (product mockup)
- **Mobile**: Apila vertical, Image arriba
- **Widgets**: 4 (Heading, Paragraph, Button, Image)

### Sección 2: Features
- **Container**: Flexbox row wrap
- **Items**: 4 Icon Boxes en grid 2x2 desktop, 1 col mobile
- **Widgets**: 4 Icon Box

[Etc.]

### Global Styles
- Primary: #3B82F6 (azul)
- Secondary: #10B981 (verde)
- Primary Font: Poppins (Headings)
- Text Font: Inter (Body)

### DOM Estimate
Total widgets: 28 (well under 40)
Estimated render: Fast
```

#### **Prompt Tipo 2: Qué Widgets Usar en Cada Parte**

```
Rol: Eres experto en widgets Elementor.

Tarea: Para una sección de "Casos de Éxito" que muestre 6 casos con:
- Logo del cliente
- Testimonio
- Métrica (ej: "3x ROI increase")
- Link "Ver caso"

Propón:
1. Estructura de Container principal (Flexbox, direction, gap)
2. Widgets por cada tarjeta
3. Responsive behavior (¿grid 3x2 en desktop? ¿1 col en mobile?)
4. Performance tips (lazy load, conditional widgets)
5. ¿Usar Loop Grid + dynamic content o hardcoded Icon Boxes?

Ventajas/desventajas de cada approach.
```

**Respuesta esperada:**

```markdown
## Opciones para Casos de Éxito

### Opción A: Icon Boxes + Manual Styling
- Container Flexbox: direction row, wrap, gap 20px
- 6× Icon Box widgets con custom height
- Desktop: 3 cols, Tablet: 2 cols, Mobile: 1 col
- ✅ Más ligero, control total
- ❌ No es dinámico, si hay 100 casos → tedioso

### Opción B: Loop Grid (Pro) + Dynamic Tags
- Loop Grid widget apunta a Custom Post Type "casos-exito"
- Template: Image (logo) + Heading + Testimonial + Dynamic Tag (métrica)
- Desktop: 3 cols, responsive automático
- ✅ Dinámico, escalable, cacheado
- ❌ Requiere Pro + CPT setup

**Recomendación**: Opción A si ≤6 casos. Opción B si >10 o frecuentes updates.
```

#### **Prompt Tipo 3: Generar Copy Listo para Pegar**

```
Rol: Eres copywriter especializado en landing pages SaaS.

Contexto: 
- Producto: CMS visual sin código
- Audiencia: Pequeñas agencias web (5-15 personas)
- Tono: Profesional, conversacional, con urgencia
- Métrica clave: Redactores ganando 10 horas/semana

Tarea: Genera copy para estas secciones, listo para pegar en Elementor:

1. **H1 Hero** (max 10 palabras, orientado a beneficio)
2. **Subtitle** (max 20 palabras, problema resuelto)
3. **4× Feature Headlines** (cada una 5-6 palabras)
4. **CTA Principal** (botón text, orientado a acción)
5. **CTA Secundario** (link alt)

Incluye:
- Verificación: ¿suenan naturales? ¿evitan jargon innecesario?
- Microcopy: "Already use X?" / "No credit card required"
- Formato: Markdown, cada sección claramente etiquetada
```

**Respuesta esperada:**

```markdown
## Copy para Landing SaaS CMS

### H1 (Hero Heading)
"Rediseña tu web en horas, no semanas"

### Subtítulo
"Agencias digitales ganan 10 horas semanales con nuestro editor visual. Sin código. Sin fricciones."

### Feature 1
"Templates profesionales listos para usar"

[Etc.]

### CTA Principal Button
"Empieza gratis en 2 minutos"

### Microcopy (abajo del form)
"🔒 No requiere tarjeta. Cancela en cualquier momento."
```

#### **Prompt Tipo 4: Checklists Pre-Publicación**

```
Rol: Eres QA especializado en landing pages WordPress/Elementor.

Tarea: Genera checklist de validación ANTES de publicar, cobrando:
- Performance (Core Web Vitals, DOM, CSS bloat)
- Accesibilidad (WCAG AA)
- Conversión (UX, copy, CTAs)
- SEO on-page
- Compatibilidad (browsers, devices)

Formato: Checklist markdown con:
- [ ] Item
- Tool a usar (ej: Google PageSpeed, Lighthouse)
- Umbral de aprobación
- Fix típico si falla
```

**Respuesta esperada:**

```markdown
## Checklist Pre-Publicación Landing Page

### Performance
- [ ] LCP (Largest Contentful Paint) < 2.5s (usar PageSpeed Insights)
  - Fix: Optimizar imágenes hero, lazy load widgets abajo del fold
- [ ] CLS < 0.1 (usar Lighthouse)
  - Fix: Fijar alturas de imágenes, evitar ads dinámicos
- [ ] DOM nodes < 1500 (inspeccionador: Elements panel, count)
  - Fix: Reducir widgets, usar CSS en lugar de HTML

### Accesibilidad
- [ ] Contraste texto/fondo ≥ 4.5:1 (Wave o Lighthouse)
- [ ] Alt text en todas las imágenes (inspeccionador: busca vacías)
- [ ] Headings en orden (H1 → H2, no saltar) (inspeccionador)
- [ ] Botones navegables con Tab key (manual testing)
- [ ] Formularios: labels asociados <label for="id"> (inspeccionador)

### Conversión
- [ ] CTA visible sin scroll (above the fold) ✅
- [ ] Mínimo 2 CTAs en página (uno en hero, uno final)
- [ ] Botón primario contrasta vs fondo
- [ ] Copy sin errores ortográficos (spell check)

### SEO On-Page
- [ ] Meta title ≤ 60 chars (Yoast SEO plugin)
- [ ] Meta description ≤ 160 chars
- [ ] H1 único en página
- [ ] URL slug descriptivo (/landing-free-trial, no /page-id-123)

### Compatibilidad
- [ ] Desktop (Chrome, Firefox, Safari) - visual consistency
- [ ] Tablet (iPad) - responsive, botones funcional
- [ ] Mobile (iPhone, Android) - sin scroll horizontal
- [ ] iOS Safari específicamente (test en browserstack o device real)

### GO/NO-GO
- ✅ Todos items ✓ → Publicar
- ❌ Algún item ✗ → Volver a Elementor, arreglar, retest
```

---

## 4. Buenas Prácticas de Rendimiento y Mantenimiento

### 4.1 Optimización de Rendimiento (Recomendaciones Oficiales Elementor)

#### **Minimizar DOM y Cantidad de Widgets**

**Meta**: < 1,500 nodos DOM totales, < 40 widgets por página

**Tácticas:**

1. **Usa Containers en lugar de Sections/Columns**
   - Section + 3 Columns = 7 nodos
   - Container Flexbox = 1 nodo
   - **Ahorro: ~85%**

2. **Evita widgets innecesarios**
   - ❌ Spacer (usa `gap` en Container)
   - ❌ Divider standalone (usa `border-bottom` en Container)
   - ✅ Solo widgets que contengan info o interactividad

3. **Agrupa widgets relacionados**
   - ❌ 5 Paragraphs + 1 Button (6 widgets)
   - ✅ 1 Container Flexbox + 5 Heading/Paragraph adentro (menor complejidad)

#### **Optimización de Imágenes**

**Elementor Image Optimization (Pro feature)**:
- Convierte automáticamente a WebP/AVIF
- Comprime sin pérdida
- Redimensiona para device

**Manual setup**:
1. Instala plugin gratuito: **Imagify** o **Smush**
2. Sube imágenes: máx 200KB, resolución 2x pantalla
3. En Elementor Image widget:
   - Habilita Lazy Load (✓)
   - Define srcset (responsive images)
   - Alt text descriptivo

**Tamaños recomendados:**
- Hero image: 1600×900px (16:9)
- Feature icons: 64×64px o SVG
- Testimonial avatars: 80×80px

#### **Optimización de Fuentes**

**Google Fonts (Elementor integrado)**:
- Máx 2-3 familias
- Máx 2-3 weights por familia
- Carga local (no CDN externo)

**Ejemplo de setup:**
```
Primary Font: Poppins (weights 400, 600, 700)
Text Font: Inter (weights 400, 500)
Total: 5 files descargables, ~150KB
```

**Custom fonts**:
- WOFF2 (optimizado, moderno)
- Considera subsetear (ej: solo caracteres latinos)

#### **Reducir CSS Bloat**

**Global Styles vs Custom CSS**:
- ✅ 90% Global Styles (colores, fonts, espacios predefinidos)
- ❌ 10% Custom CSS (excepciones, animaciones específicas)

**Elementor Optimizations (Settings → Optimizations)**:
- [✓] **Optimized DOM Output**: Menos clases CSS generadas
- [✓] **Improved Asset Loading**: Carga JS/CSS solo en páginas que lo necesitan
- [✓] **Inline Font Icons**: SVG inline vs Font Awesome completo
- [✓] **CSS Print Method**: "External File" vs Inline (mejor cache)

#### **Interacción con Plugins de Caché**

**Plugins recomendados**:
- **WP Rocket**: Caching, minificación, lazy load
- **LiteSpeed Cache**: Si hosted en LiteSpeed (ej: SiteGround)
- **FlyingPress**: Específicamente optimizado para Elementor

**Configuración típica:**
```
Plugin de caché:
  ├─ Cache de página: ✓
  ├─ Minificar CSS/JS: ✓
  ├─ Lazy load images: ✓
  ├─ Excluir scripts Elementor: [Especificar]
  └─ Purgar después de publish

Elementor:
  ├─ Optimized DOM: ✓
  ├─ Improved Asset Loading: ✓
  └─ CSS Print: External
```

**Exclusiones críticas** (NO minificar/delay):
- `elementor` scripts (layout, interactividad)
- `elementor-frontend` (animaciones)
- Eventos de formulario

### 4.2 Mantenimiento Técnico

#### **Auditoría Periódica (Mensual)**

1. **Actualizaciones**:
   - Elementor versión actual (changelog cada 2-4 semanas)
   - WordPress core
   - Plugins complementarios

2. **Performance check** (Google PageSpeed Insights):
   - LCP, CLS, FID/INP
   - Desktop vs Mobile
   - Comparar vs mes anterior

3. **Accesibilidad** (Ally Assistant o Wave):
   - Contraste de colores
   - Alt text en imágenes nuevas
   - Heading hierarchy

4. **Backup y versionado**:
   - Exporta templates (Elementor → Templates → Export)
   - Commit a GitHub cambios significativos
   - Snapshot previo a update major

#### **Workflow de Cambios**

```
Necesito actualizar landing page
  ↓
Crear draft (duplicar página o branch en GitHub)
  ↓
Editar en Elementor
  ↓
Test: mobile, form submissions, CTAs funcional
  ↓
Lighthouse audit (performance/accesibilidad)
  ↓
Aprobar cambios
  ↓
Publicar + invalidar caché
```

#### **Documentación de Componentes**

Mantén registro de:
- Qué templates usaste (Elementor Cloud Templates)
- Widgets custom creados (si aplica)
- Global Styles (colores, fonts)
- Display Conditions (qué secciones mostrar donde)
- Plugins integrados (forms, popups, etc.)

---

## 5. Ejemplos y "Cheatsheet" para Claude Code

### 5.1 Do / Don't al Proponer Diseños

#### ✅ DO - Prácticas Recomendadas

**DO:**
- Usar Containers Flexbox para todos los layouts nuevos
- Limitar widgets a máximo 30-40 por página
- Heredar estilos de Global Styles (no custom CSS en cada widget)
- Imágenes optimizadas (<200KB, WebP/AVIF)
- Breakpoints consistentes: 480px, 768px, 1024px
- Alt text descriptivo en todas las imágenes
- Colores con contraste WCAG AA mínimo
- Headings en orden jerárquico (H1 → H2 → H3)
- Forms con validación y conditional fields
- Lazy load en imágenes abajo del fold
- Global Styles: 90% de tu CSS, custom CSS: 10%
- Testing: mobile, tablet, desktop antes de publicar

#### ❌ DON'T - Evita

**DON'T:**
- Usar Sections si puedes usar Containers
- Anidar más de 4 niveles de Containers (complejidad exponencial)
- Widgets decorativos (Spacer, Divider) cuando puedas usar `gap` y `border`
- Imágenes > 300KB sin optimizar
- 10+ weights de fuentes (carga más lenta)
- Colores inline custom en lugar de Global Colors
- Headings para estilo (usa Heading widget + Global Typography)
- Forms sin validación o honeypot anti-spam
- Animaciones sin respetar `prefers-reduced-motion`
- Publish sin Lighthouse audit
- Plugins de caché mal configurados (pueden romper dinamismo)
- Custom CSS inline dentro del widget (usa Global Custom CSS)

### 5.2 Prompts de Ejemplo (5-10 Bien Formulados)

#### **Prompt 1: Landing Page Estructura Completa**

```
Actúa como experto en Elementor Pro y conversión de leads.

Voy a crear una landing page para un curso online de "Growth Marketing".
- Objetivo: Capturar 500 emails de free trial sign-up
- Audiencia: Emprendedores 25-45 años
- Tiempo en página esperado: 2-3 minutos
- Dispositivo principal: Mobile (60%), Desktop (40%)

Propón:
1. Estructura de la página (secciones en orden)
2. Para cada sección:
   - Nombre y propósito
   - Contenedor principal (Flexbox direction, gap, alignment)
   - Widgets a usar (mínimo y máximo)
   - Comportamiento responsive (mobile vs desktop)
3. Global Styles necesarios (color scheme, fonts, spacing)
4. Estimación: Total de widgets, DOM nodes, archivo CSS size
5. Performance predictions: LCP, CLS, total page weight

Usa formato Markdown claro. Evita jargon técnico innecesario.
```

#### **Prompt 2: Optimizar Página Lenta**

```
Tengo una landing page en Elementor con estos problemas:
- LCP: 4.5s (debe ser <2.5s)
- CLS: 0.25 (debe ser <0.1)
- DOM nodes: 2,100 (demasiado)
- Page weight: 3.2MB (lenta)

Analiza y propón mejoras priorizadas:
1. Quick wins (30 min de trabajo)
2. Medium term (2-4 horas)
3. Refactor profundo (6+ horas)

Para cada mejora:
- Descripción técnica
- Impacto estimado en LCP/CLS/size
- Pasos en Elementor
- Riesgos (romper diseño, plugins)

Usa prioritización: máximo impacto / mínimo esfuerzo primero.
```

#### **Prompt 3: Componente Reutilizable**

```
Crea un componente de "testimonial card" en Elementor que sea:
- Reutilizable en múltiples páginas
- Responsive (mobile/tablet/desktop)
- Accesible (WCAG AA)
- Optimizado (máximo 10 widgets)
- Almacenable como Cloud Template

Especifica:
1. Estructura Container/widgets
2. Global Styles necesarios
3. Display states (normal, hover, mobile)
4. How to save as reusable template
5. How to update all instances (cuando cambies algo)

Formato: Pasos numerados, comandos Elementor UI.
```

#### **Prompt 4: Copy + Structure Integration**

```
Necesito crear una "Feature Comparison" section que muestre:
- 3 productos (columnas)
- 5 características cada uno (rows)
- Icons y checkmarks
- CTA button en cada columna

Tareas:
1. Estructura Elementor: ¿Table, Containers anidados, Loop Grid?
2. Genera copy para 3 feature headlines (5-6 palabras cada una)
3. Sugiere iconos Font Awesome o SVG
4. Responsive mobile: ¿Stack vertical? ¿Scroll horizontal?
5. Performance: ¿DOM size estimado? ¿Lazy load aplicable?

Entrega: Markdown con estructura + copy + checklist implementación.
```

#### **Prompt 5: Form con Conditional Logic**

```
Diseña un formulario multi-step en Elementor Pro que:

Paso 1: "Tipo de cliente"
  - Radio: Agencia / Freelancer / In-house

Paso 2: Condicional por respuesta
  - Si Agencia: Pregunta "¿Cuántos clientes?" (hidden si otro tipo)
  - Si Freelancer: Pregunta "¿Ingresos mensuales?" (hidden si otro tipo)
  - Si In-house: Pregunta "¿Presupuesto anual?" (hidden si otro tipo)

Paso 3: Email + consentimiento

Requisitos:
1. ¿Usar Conditional Fields plugin o Form Builder nativo Elementor?
2. Estructura Elementor (Containers, Form widget)
3. Integración email (Mailchimp, Zapier, autorespuesta WP)
4. Anti-spam (honeypot, reCAPTCHA)
5. Success message y redirect URL
6. Mobile: ¿ocupación por sección o paginated?

Entrega: Pasos técnicos + screenshot de configuration (si aplica).
```

#### **Prompt 6: Accessibility Audit**

```
Hazme un audit de accesibilidad WCAG 2.1 AA para esta landing page.

Verifica:
1. Contraste color (texto vs fondo): ratio WCAG AA requerido 4.5:1
2. Alt text: todas las imágenes tienen descripción
3. Tipografía: font-size mínimo 14px body, line-height > 1.4
4. Headings: jerarquía correcta (H1, H2, H3 en orden)
5. Buttons: navegable con Tab, aria-label si sin texto
6. Forms: <label> asociados a <input>, error messages visible
7. Color: información no dependiente solo de color
8. Animaciones: respetan prefers-reduced-motion

Proporciona:
- [ ] Item checks (aprobado/rechazado)
- Fix si aplica (ej: "cambiar H3 a H2")
- Tools para verificar (Wave, Lighthouse, axe DevTools)
- Prioridad (bloqueante, importante, nice-to-have)
```

#### **Prompt 7: Landing Page Ganadora (A/B Test)**

```
Necesito crear 2 variantes de landing page para A/B test.

Variante A (Control): 
- Copy directo a beneficios
- 1 CTA principal (arriba), 1 CTA final (abajo)
- Colores neutral (azul + blanco)

Variante B (Test):
- Copy con urgencia + social proof
- 3 CTAs (hero, middle, final)
- Colores con mayor contraste (verde + naranja)

Propón para cada variante:
1. Copy diferenciador (H1, features, CTA text)
2. Estructura Elementor (mismo layout pero diferentes estilos)
3. Cambios en Global Styles o Custom CSS
4. Hipótesis: ¿cuál debería convertir mejor?
5. Métrica a trackear: form submissions

Formato: Tabla comparativa con speccs técnicas.
```

#### **Prompt 8: Velocidad de Ejecución (Desde 0 en 4 Horas)**

```
Me pides crear una landing page SaaS completa en 4 horas.

Timeboxed workflow:
- 0-30 min: Definir estructura (5 secciones)
- 30-60 min: Crear Container/widget skeleton (sin contenido)
- 60-120 min: Generar copy y llenar contenido
- 120-180 min: Estilos, responsive, mobile testing
- 180-240 min: Performance audit, accesibilidad, publicar

Proporciona:
1. Template Elementor (o kit pre-hecho) para empezar
2. Copy template por sección
3. Breakpoints responsive rápidos (no custom por device)
4. Color/font scheme pre-elegida (Global Styles listo)
5. CTA copy conversion-focused (tested)

Objetivo: Landing funcional, conversión-optimizada, shipping en 4h.
```

#### **Prompt 9: Integración Elementor + Claude Code**

```
Quiero automatizar mi workflow: Claude Code → Elementor → Publicar.

Flujo:
1. Yo doy brief: "Landing page para webinar de Python"
2. Claude Code:
   - Propone estructura (5 secciones, 28 widgets)
   - Genera copy (H1, features, CTA, form labels)
   - Especifica Global Styles (colors, fonts)
3. Yo copypasteo en Elementor:
   - Creo Containers según estructura
   - Pego copy en widgets
   - Aplico Global Styles
4. Yo publico y trackeo conversiones

Proporciona:
- Formato output standar de Claude (Markdown structured)
- Checklist de validación antes de copypastear
- Workflow de versionado (GitHub)
- Cómo iterar si la tasa de conversión es baja

Objetivo: Reproducible, repetible, escalable.
```

#### **Prompt 10: Angie (AI Agentic) + Claude Code**

```
Quiero usar Angie (WordPress AI) junto con Claude Code.

Workflow:
1. Claude Code propone página (estructura + copy)
2. Yo digo a Angie: "Crea página landing de servicios según [spec]"
3. Angie:
   - Crea página en WordPress
   - Usa Elementor automáticamente
   - Publica borrador
4. Yo reviso en Elementor, ajusto, publico

Preguntas:
- ¿Qué información darle a Angie para que entienda estructura Elementor?
- ¿Qué puede automatizar Angie vs qué debo hacer manual?
- ¿Cómo iteramos si Angie no genera lo esperado?
- ¿Angie puede manejar Dynamic Content (CPTs, loops)?
- ¿Versionado en GitHub compatible con Angie?

Entrega: Spec para prompt a Angie, integración con Claude Code workflow.
```

### 5.3 Errores Comunes a Evitar

#### **Arquitectura / Layout**

| Error | Síntoma | Fix |
|-------|---------|-----|
| Exceso de anidación (5+ Container levels) | DOM nodes > 2000, lag en editor | Refactor: simplificar hierarchy, consolidar pequeños containers |
| Usar Sections en 2025 | Peor responsive, más widgets | Convertir a Containers (Elementor: Convert to Container) |
| Spacer widgets por todo lado | DOM bloat, CSS excesivo | Usar `gap` en Container padre en lugar de Spacer hijo |
| Columnas fijas (width: 400px) en lugar de % | Rompe en mobile | Usar % o flex unidades (flex: 0 0 calc(33% - 16px)) |

#### **Performance**

| Error | Síntoma | Fix |
|-------|---------|-----|
| Imágenes > 500KB sin optimizar | LCP > 4s, 70% del page weight | Comprimir, convertir WebP/AVIF, lazy load |
| Custom CSS en lugar de Global Styles | CSS bloat, sin consistencia | Migrar a Global Colors + Typography |
| 10+ Google Fonts weights | Extra HTTP requests, font render delay | Máx 3 families, 2 weights cada una |
| JS de plugins no excluidos del caché | Breakage post-cache, slow interactivity | Excluir script Elementor del delay JS |
| No habilitar "Improved Asset Loading" | CSS/JS cargado en TODAS las páginas | Elementor → Settings → Optimizations → [✓] Improved Asset Loading |

#### **Contenido / Copy**

| Error | Síntoma | Fix |
|-------|---------|-----|
| H1 sin keywords o demasiado genérico | Bajo CTR SEO, conversión pobre | A/B test: H1 con beneficio específico vs genérico |
| CTA text vago ("Submit", "Click here") | Baja conversión | Action-oriented copy: "Get Free Trial", "Download Guide", "Claim Offer" |
| Formulario pide demasiada info (10+ campos) | 80%+ abandono | Reducir a essentials (nombre, email, teléfono). Campos adicionales después de form. |
| No especificar "No credit card required" | Friction, desconfianza | Agregar microcopy debajo de button |
| Copy demasiado denso, sin breathing room | Bounce rate alto | Usar espaciado (gap, margins), separar en bullets |

#### **Accesibilidad**

| Error | Síntoma | Fix |
|-------|---------|-----|
| Heading para estilo en lugar de Heading widget | Screen reader confuso, no semántico | Usar Heading widget + Global Typography |
| Sin alt text en imágenes | Ally assistant fail, SEO penalty | Elementor Image → alt field para todas |
| Contraste insuficiente (3:1 vs 4.5:1 requerido) | Ally fail, WCAG AA incumplido | Elementor Color picker → verificar ratio (Wave tool) |
| Botón sin aria-label si solo icono | Screen reader dice "button" sin contexto | Button → aria-label: "Close menu" etc. |
| Color único para comunicar info | Confusión si cliente es daltónico | Agregar texto / icono adicional + color |

#### **Testing**

| Error | Síntoma | Fix |
|-------|---------|-----|
| No testar en mobile antes de publicar | 50%+ del traffic en mobile = experience rota | Elementor → Device preview, test en browsers reales (responsive checker) |
| Form no tested (submit, validación, email) | Leads se pierden, clientes no notificados | Enviar test submission, verificar email, revisar Elementor Form submissions |
| No verificar CTAs en mobile | Button 30px en mobile = imposible de presionar | Mínimo 44×44px, testing con dedo (no mouse) |
| Publicar sin Lighthouse audit | Puede que LCP > 3s, CLS > 0.15 | Pre-publish: Google PageSpeed Insights, fix issues |

---

## Referencias y Documentación Oficial

### Documentación Principal

- **Elementor Help Center**: https://elementor.com/help/
- **Elementor Academy**: https://elementor.com/academy/ (tutorials gratuitos)
- **Elementor Developers Docs**: https://developers.elementor.com/docs/

### Guías Específicas

- **Container Widget Guide**: https://elementor.com/help/what-is-a-container/
- **Converting Sections to Containers**: https://elementor.com/help/convert-existing-sections-to-containers/
- **Theme Builder Overview**: https://elementor.com/help/theme-builder/
- **Global Styles & Colors**: https://elementor.com/help/how-do-i-set-global-fonts-and-colors/
- **Site Settings**: https://elementor.com/help/site-settings/
- **Form Builder**: https://elementor.com/help/form-builder/
- **Dynamic Content**: https://elementor.com/help/dynamic-content/

### Changelog y Novedades

- **Elementor Pro Changelog**: https://elementor.com/pro/changelog/
- **Blog (New Features)**: https://elementor.com/blog/category/new-features/
- **Fall 2025 Updates Recap**: https://elementor.com/blog/updates-fall-2025-recap/
- **Editor V4 Alpha**: https://elementor.com/blog/editor-v4-1st-alpha/

### Plugins Complementarios (Freemium)

- **Conditional Fields for Elementor**: https://wordpress.org/plugins/conditional-fields-for-elementor-form/
- **Angie (Agentic AI)**: https://fr.wordpress.org/plugins/angie/
- **Turbo Header Footer Builder**: https://fr.wordpress.org/plugins/header-footer-builder-for-elementor/

### Herramientas de Validación

- **Google PageSpeed Insights**: https://pagespeed.web.dev/
- **Wave Accessibility Checker**: https://wave.webaim.org/
- **Lighthouse (Embedded in Chrome DevTools)**: Chrome → Inspect → Lighthouse
- **Elementor Ally (Accessibility Scanner)**: In Elementor → Ally Assistant

### Recursos de Aprendizaje Avanzado

- **Flexbox CSS Guide**: https://elementor.com/blog/flex-css/
- **Responsive Web Design Principles**: https://elementor.com/blog/elementor-responsive-webdesign-principles/
- **Performance Optimization**: https://unlimited-elements.com/speed-up-elementor/
- **Landing Page Best Practices**: https://elementor.com/blog/how-to-design-effective-landing-page/
- **CTA Button Design Guide**: https://elementor.com/blog/cta-button-design/

---

**Última Actualización**: Enero 2026
**Versión Elementor**: 3.34+ (Editor V4 en beta)
**Changelog URL**: https://elementor.com/pro/changelog/

---

*Este documento está diseñado para servir como contexto permanente a Claude Code. Actualízalo cuando Elementor lance nuevas versiones significativas o cuando tu stack cambie.*
