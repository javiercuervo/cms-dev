# Guía de Implementación en Elementor: Consultoría de Tecnología

## Información General

| Campo | Valor |
|-------|-------|
| **URL** | `/consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/` |
| **Archivo CSS** | `wp-content/themes/hello-elementor-child/consultoria-tecnologia.css` |
| **Carga CSS** | Condicional via `functions.php` con `is_page('consultoria-de-tecnologia')` |
| **Versión** | 1.0.0 |
| **Fecha** | 2026-01-30 |

---

## Principios Pragmáticos Aplicados

Este documento sigue las guías de `_common/docs/programacion-pragmatica-wordpress-elementor.md`:

1. **CSS centralizado en child theme** - No CSS disperso en Elementor
2. **Carga condicional** - Solo se carga en esta página específica
3. **Clases CSS descriptivas** - Prefijo `tecnologia-` para evitar conflictos
4. **!important documentado** - Cada uso tiene comentario explicativo

---

## Estructura de 9 Secciones

| # | Sección | Clase CSS | Fondo |
|---|---------|-----------|-------|
| 1 | Hero | `tecnologia-hero` | Imagen + Overlay #5F322F 70% |
| 2 | Introduction | `tecnologia-introduction` | #FFFFFF |
| 3 | Three Key Areas | `tecnologia-three-areas` | #F5F0E6 |
| 4 | Strategy Importance | `tecnologia-strategy-importance` | #FFFFFF |
| 5 | Strategy to Execution | `tecnologia-strategy-execution` | #F5F0E6 |
| 6 | Differentiators | `tecnologia-differentiators` | #FFFFFF |
| 7 | Summary | `tecnologia-summary` | #5F322F |
| 8 | Related Content | `tecnologia-related` | #FFFFFF |
| 9 | Final CTA | `tecnologia-cta` | #F5F0E6 |

---

## Implementación Sección por Sección

### SECCIÓN 1: HERO

**Configuración de Sección:**
- Layout: Full Width
- Min Height: 60vh
- CSS Classes: `tecnologia-hero`
- Fondo: Imagen de tecnología/colaboración
- Overlay: Color #5F322F, Opacidad 0.7

**Widgets:**

1. **Texto (Breadcrumb)**
   - Contenido: `Consultoría Estratégica > Tecnología`
   - CSS Classes: `hero-breadcrumb`

2. **Encabezado H1**
   - Contenido: `Consultoría de tecnología: equilibrio entre innovación y estrategia`
   - Tag: H1
   - Animación: Fade In Up

3. **Texto (Subtítulo)**
   - Contenido: `Ayudamos a las empresas a integrar tecnología de forma proporcionada, priorizando siempre a las personas sobre las herramientas.`
   - CSS Classes: `hero-subtitle`
   - Animación: Fade In Up (delay 200ms)

---

### SECCIÓN 2: INTRODUCTION

**Configuración de Sección:**
- Layout: Boxed (1140px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-introduction`
- Fondo: #FFFFFF

**Estructura: 2 columnas (60% / 40%)**

**Columna Izquierda:**

1. **Encabezado H2**
   - Contenido: `¿Qué es la consultoría de tecnología estratégica?`
   - Tag: H2

2. **Editor de Texto**
   - Párrafo 1: `La consultoría de tecnología va más allá de implementar herramientas. Se trata de alinear las capacidades tecnológicas con los objetivos de negocio, asegurando que cada inversión digital genere valor real y medible.`
   - Párrafo 2: `En Proportione, inspirados en la proporción áurea, buscamos el equilibrio perfecto entre innovación y estabilidad. No proponemos tecnología por moda, sino soluciones proporcionadas a cada contexto empresarial.`

**Columna Derecha:**

1. **Imagen**
   - ID WordPress: 2566 (o imagen de equipo/tecnología)
   - CSS Classes: `intro-image`

---

### SECCIÓN 3: THREE KEY AREAS

**Configuración de Sección:**
- Layout: Boxed (1140px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-three-areas`
- Fondo: #F5F0E6

**Widgets:**

1. **Encabezado H2 (centrado)**
   - Contenido: `Tres pilares de nuestra consultoría tecnológica`
   - Tag: H2
   - Alineación: Centro

2. **Grid de 3 columnas (cards)**

**Card 1:**
- CSS Classes: `tecnologia-area-card`
- Contenido interno (usar Inner Section o widgets):
  - Texto "01" con clase `area-number`
  - H3: `Arquitectura tecnológica`
  - Párrafo: `Diseñamos la infraestructura digital óptima para su negocio, desde cloud hasta sistemas on-premise, siempre con escalabilidad y seguridad como prioridades.`

**Card 2:**
- CSS Classes: `tecnologia-area-card`
- Contenido interno:
  - Texto "02" con clase `area-number`
  - H3: `Transformación digital`
  - Párrafo: `Acompañamos a las organizaciones en su evolución digital, integrando nuevas tecnologías sin disrumpir las operaciones existentes.`

**Card 3:**
- CSS Classes: `tecnologia-area-card`
- Contenido interno:
  - Texto "03" con clase `area-number`
  - H3: `Agnosticismo tecnológico`
  - Párrafo: `No estamos casados con ningún proveedor. Evaluamos objetivamente cada opción para recomendar la que mejor se adapte a sus necesidades reales.`

---

### SECCIÓN 4: STRATEGY IMPORTANCE

**Configuración de Sección:**
- Layout: Boxed (900px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-strategy-importance`
- Fondo: #FFFFFF

**Widgets:**

1. **Encabezado H2 (centrado)**
   - Contenido: `La tecnología como habilitador, no como fin`
   - Tag: H2

2. **Texto (centrado)**
   - CSS Classes: `intro-paragraph`
   - Contenido: `En un mundo saturado de soluciones tecnológicas, muchas empresas caen en la trampa de implementar por implementar. Nosotros creemos que la tecnología debe ser invisible: cuando funciona bien, las personas ni siquiera la notan.`

3. **Quote Box (Inner Section)**
   - CSS Classes: `tecnologia-quote-box`
   - Contenido: `La mejor tecnología es la que desaparece. Cuando un sistema funciona perfectamente, las personas se olvidan de que existe y se centran en lo que realmente importa: su trabajo.`

---

### SECCIÓN 5: STRATEGY TO EXECUTION

**Configuración de Sección:**
- Layout: Boxed (1140px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-strategy-execution`
- Fondo: #F5F0E6

**Estructura: 2 columnas (40% / 60%)**

**Columna Izquierda:**

1. **Imagen**
   - ID WordPress: 1165 (persona trabajando)
   - CSS Classes: `execution-image`

**Columna Derecha:**

1. **Encabezado H2**
   - Contenido: `De la estrategia a la implementación`
   - Tag: H2

2. **Editor de Texto**
   - Párrafo 1: `No nos limitamos a entregar un informe con recomendaciones. Acompañamos a nuestros clientes en cada fase del proyecto tecnológico, desde la definición hasta la adopción.`
   - Párrafo 2: `Nuestro enfoque práctico garantiza que las soluciones no solo se implementen, sino que se integren en la cultura de la organización.`

3. **Lista de Iconos**
   - CSS Classes: `tecnologia-benefits-list`
   - Icono: Check (fa-check o similar)
   - Color icono: #6E8157
   - Items:
     - `Auditoría tecnológica completa de su ecosistema actual`
     - `Diseño de roadmap tecnológico personalizado`
     - `Implementación acompañada con transferencia de conocimiento`
     - `Soporte continuo y optimización post-implementación`

---

### SECCIÓN 6: DIFFERENTIATORS

**Configuración de Sección:**
- Layout: Boxed (1140px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-differentiators`
- Fondo: #FFFFFF

**Widgets:**

1. **Encabezado H2 (centrado)**
   - Contenido: `¿Por qué Proportione para tecnología?`
   - Tag: H2
   - Margin bottom: 64px

2. **Grid de 4 columnas**

**Bloque 1:**
- CSS Classes: `tecnologia-diff-item`
- Icono: Scale/Balanza (en div con clase `tecnologia-diff-icon`)
- H3: `Enfoque equilibrado`
- Párrafo: `Buscamos el punto óptimo entre innovación y estabilidad, evitando tanto el conservadurismo como la sobreingeniería.`

**Bloque 2:**
- CSS Classes: `tecnologia-diff-item`
- Icono: Terminal/Código
- H3: `Independencia tecnológica`
- Párrafo: `Sin ataduras a proveedores. Recomendamos lo que realmente funciona para usted, no lo que nos beneficia a nosotros.`

**Bloque 3:**
- CSS Classes: `tecnologia-diff-item`
- Icono: Users/Personas
- H3: `Tecnología humana`
- Párrafo: `Diseñamos sistemas pensando en quienes los usarán. La adopción es tan importante como la funcionalidad.`

**Bloque 4:**
- CSS Classes: `tecnologia-diff-item`
- Icono: TrendingUp/Gráfica
- H3: `Resultados medibles`
- Párrafo: `Cada proyecto incluye KPIs claros. Si no podemos medir el impacto, no lo proponemos.`

---

### SECCIÓN 7: SUMMARY

**Configuración de Sección:**
- Layout: Boxed (900px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-summary`
- Fondo: #5F322F

**Widgets:**

1. **Encabezado H2 (centrado)**
   - Contenido: `En síntesis`
   - Tag: H2
   - Color: #F5F0E6

2. **Texto (centrado)**
   - Contenido: `La consultoría de tecnología de Proportione combina visión estratégica con pragmatismo operativo. No perseguimos la última moda tecnológica; buscamos la solución proporcionada que genere valor real para su organización y sus personas.`
   - Color: #F5F0E6

---

### SECCIÓN 8: RELATED CONTENT

**Configuración de Sección:**
- Layout: Boxed (1140px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-related`
- Fondo: #FFFFFF

**Widgets:**

1. **Encabezado H2 (centrado)**
   - Contenido: `Explore más sobre transformación digital`
   - Tag: H2
   - Margin bottom: 64px

2. **Grid de 3 columnas (cards)**

**Card 1:**
- CSS Classes: `tecnologia-related-card`
- Badge: `Servicios` (con clase `tecnologia-related-badge`)
- H3: `Transformación digital integral`
- Párrafo: `Cómo guiamos a las organizaciones en su evolución tecnológica completa.`
- Link: `Conocer más →` (clase `tecnologia-related-link`)

**Card 2:**
- CSS Classes: `tecnologia-related-card`
- Badge: `Metodología`
- H3: `Nuestro enfoque 20-60-20`
- Párrafo: `El equilibrio entre diagnóstico, implementación y seguimiento que maximiza resultados.`
- Link: `Conocer más →`

**Card 3:**
- CSS Classes: `tecnologia-related-card`
- Badge: `Insights`
- H3: `Inteligencia artificial con propósito`
- Párrafo: `Reflexiones sobre cómo implementar IA de forma ética y efectiva.`
- Link: `Conocer más →`

---

### SECCIÓN 9: FINAL CTA

**Configuración de Sección:**
- Layout: Boxed (700px)
- Padding: 100px vertical
- CSS Classes: `tecnologia-cta`
- Fondo: #F5F0E6

**Widgets:**

1. **Encabezado H2 (centrado)**
   - Contenido: `¿Evaluamos juntos su ecosistema tecnológico?`
   - Tag: H2

2. **Texto (centrado)**
   - CSS Classes: `cta-description`
   - Contenido: `Una conversación sin compromiso para entender sus retos tecnológicos y explorar cómo podemos ayudarle a encontrar el equilibrio.`

3. **Contenedor de Botones**
   - CSS Classes: `tecnologia-cta-buttons`
   - Layout: Flex horizontal, gap 16px

4. **Botón Primario**
   - Texto: `Solicitar diagnóstico`
   - CSS Classes: `tecnologia-btn-primary`
   - Link: `/contacto/`

5. **Botón Secundario**
   - Texto: `Ver más servicios`
   - CSS Classes: `tecnologia-btn-secondary`
   - Link: `/consultoria-estrategica-crecimiento-organico/`

---

## Imágenes de la Biblioteca WordPress

| Sección | ID Sugerido | Descripción | Alternativa |
|---------|-------------|-------------|-------------|
| Hero | 1165 | Persona escribiendo pizarra | 2393 |
| Introduction | 2566 | Persona laptop oficina moderna | 2618 |
| Strategy to Execution | 1162 | Colaboración mesa madera | 1166 |

**Nota:** Reemplazar URLs de Unsplash del diseño de Figma por imágenes de la biblioteca.

---

## Responsive Breakpoints

### Tablet (1024px)
- Hero H1: 48px
- H2 secciones: 36px
- Cards Three Areas: 2 columnas si es necesario
- Differentiators: 2 columnas

### Móvil (768px)
- Hero H1: 36px
- H2 secciones: 32px
- Todas las cards: 1 columna
- Padding lateral: 16px
- Botones CTA: Full width, stack vertical

---

## Checklist Pre-Publicación

### Contenido
- [ ] Todas las imágenes tienen alt text descriptivo
- [ ] Jerarquía H1 > H2 > H3 correcta
- [ ] Links de contenido relacionado apuntan a URLs reales
- [ ] Botones CTA tienen links configurados

### Estilos
- [ ] CSS cargando correctamente (verificar DevTools)
- [ ] Contraste WCAG AA en todos los textos
- [ ] Hover states funcionando en cards y botones

### Responsive
- [ ] Desktop 1440px ✓
- [ ] Laptop 1366px ✓
- [ ] Tablet 768px ✓
- [ ] Móvil 375px ✓

### Performance
- [ ] Imágenes optimizadas
- [ ] Limpiar caché Elementor
- [ ] Regenerar CSS (Elementor > Tools)

---

## Notas de Mantenimiento

1. **CSS Location:** `wp-content/themes/hello-elementor-child/consultoria-tecnologia.css`
2. **Conditional Loading:** `functions.php` línea ~90
3. **Prefix:** Todas las clases usan prefijo `tecnologia-` para evitar conflictos
4. **!important Usage:** Solo donde está documentado en el CSS
