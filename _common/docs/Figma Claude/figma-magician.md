# Figma Magician: Documentación operativa

## Resumen ejecutivo

Magician es un plugin de Figma (desarrollado por Diagram) que automatiza tareas creativas mediante AI: generación de iconos vectoriales (Magic Icon), sugerencias de textos para UI (Magic Copy, usando text review API), e imágenes a partir de texto (Magic Image). Usado correctamente, acelera la fase de ideación y reduce tareas repetitivas. Sus límites: depende de modelos AI con capacidad variable, requiere revisión manual para coherencia, y genera activos que deben normalizarse antes de versionar. Esta documentación establece reglas operativas para integrar Magician en el flujo Figma → repo → WordPress/Elementor sin acumular deuda técnica.

---

## 1. Alcance y prerequisitos

### Roles y responsabilidades

| Rol | Responsabilidades |
|-----|-------------------|
| Diseño/UX | Preparar briefing para Magician, validar salidas (tono, estilo), aceptar/rechazar alternativas |
| Front-end | Normalizar exports (nombres, formatos, estructura), versionar en repo, implementar en Elementor |
| PM/Contenidos | Revisar copy generada, ajustar tono, aplicar guía editorial |
| Admin Figma | Aprobar plugin, gestionar acceso, auditar uso |

### Prerequisitos técnicos

- **Acceso Figma**: Professional+ (Magician no requiere plan específico, pero gestión de plugins sí)
- **Plugin aprobado**: Magician debe estar aprobado por admin Figma (ver sección 7)
- **Git**: repo con estructura de carpetas definida (`assets/icons/`, `assets/img/`, `docs/`)
- **Elementor Pro**: para Global Styles, Theme Builder, Custom CSS
- **Claude Code** (opcional): para automatizar normalización de outputs

### Política de plugins

La organización debe establecer:

1. **Aprobación requerida**: admin de Figma revisa plugin antes de permitir uso (Figma Help Center, "Manage plugins and widgets in an organization")
2. **Alcance autorizado**: Magician solo genera assets; no accede a datos sensibles de organización (leer sección 7 completa)
3. **Auditoría**: registrar cuándo/quién usa Magic Copy para contenido corporativo (compliance)

---

## 2. Capacidades verificadas de Magician

Basado en: (1) documentación oficial Figma/Diagram, (2) Text Review API documentation, (3) pruebas operativas.

### 2.1 Magic Icon

**Output**: Iconos vectoriales SVG, infinitamente escalables, con estilo coherente.

**Entrada**: Descripción en texto ("arrow-up-right", "heart-filled", "settings-icon").

**Proceso**:
- Texto → AI genera formas vectoriales
- Contenido filtering: rechaza requests explícitas
- Fine-tuning: Diagram reporta iteración exhaustiva para consistencia (Figma blog, "How Magician uses...")

**Buenas prácticas**:
- Describir: tamaño conceptual (pequeño/medio/grande), estilo (outline/solid/filled), contexto ("icon for button")
- Usar prefijo consistente: ej., `icon_arrow_up_right`, `icon_heart`
- Solicitar en lotes (10–20 icons related) para coherencia estilística

**Riesgos**:
- **Inconsistencia**: variar el prompt → variación en resultado; mitigar: usar template de descripción
- **Accesibilidad**: iconos sin labels; mitigar: paired icon + text en Elementor, o alt attribute en HTML
- **Copyright**: AI trains on public data; iconos muy genéricos; riesgo bajo pero no zero. Revisar: si output se parece a icon library conocida, regenerar

**Criterios de aceptación antes de pasar a implementación**:
1. Línea base coherente (peso de línea, ángulos)
2. Escala: cabe en grid de diseño (16/24/32/48px)
3. Ningún resemblance obvio a logo existente
4. SVG limpio: sin defectos de renderizado

### 2.2 Magic Copy

**Output**: Texto alternativo para UI (headlines, body, CTAs, botones, microcopy).

**Entrada**: Instrucción con contexto ("Headline for a SaaS landing page", "CTA for checkout button", "Error message for invalid email").

**Proceso**:
- Text layer seleccionada en Figma
- AI lee contexto + suggestions mediante text review API (runs in background, integrado en UI)
- Filtra explícitos; mantiene tono según prompt

**Buenas prácticas**:
- Incluir contexto: "Rewrite this call-to-action for B2B SaaS, formal tone"
- No dejar sin verificar: revisar tono, longitud, brand voice
- Usar en ideación (primeras 3 opciones), no como verdad final
- Establecer máximo de caracteres en prompt: "Headline, max 60 chars"

**Riesgos**:
- **Tono inconsistente**: AI puede no capturar brand voice en único prompt; mitigar: crear template de instrucciones con ejemplos
- **Longitud**: si no especificas, puede exceder espacio en Elementor; mitigar: siempre dar máximo
- **Culturalidad**: algunas sugerencias pueden no ser adecuadas para público target; revisar siempre
- **Falta de revisión**: copy que no encaja en editorial; requerir aprobación de PM antes de versionar

**Criterios de aceptación**:
1. Largo ≤ máximo especificado (verificar en Figma: overflow?)
2. Tono coincide con guía editorial corporativa
3. Sin clichés o frases genéricas que NO usaría el equipo
4. Testeado con PM/contenidos

**Nota especial**: Magic Copy usa Text Review API (oficial de Figma); Magician integra esto pero no es exclusivo. Puedes definir reglas personalizadas (ej., evitar ciertos términos) editando el plugin. No documentado aquí; requiere acceso a código fuente de Magician o contacto con Diagram.

### 2.3 Magic Image

**Output**: Imágenes rasterizadas (PNG/JPG) o referencias a assets generados, con resolución variable.

**Entrada**: Descripción de imagen ("a person working on laptop in modern office", "abstract blue wave pattern").

**Proceso**:
- AI genera imagen desde descripción (modelos tipo DALL-E/Stable Diffusion)
- Contenido filtering: rechaza contenido explícito o violento
- Resolución: típicamente 1024x1024 o superior (verificar con Figma settings)

**Buenas prácticas**:
- Usar para concepto/placeholder, NO para branding final
- Especificar estilo: "flat illustration", "3D render", "photorealistic"
- Respetar copyright: asegurar que descripción no reproduce obra existente ("in the style of [artist]" problemático)
- Exportar a WebP para web (compresión 25–40% mejor que PNG)

**Riesgos**:
- **No reutilizable**: imágenes únicas cada vez; si necesitas versión 2, regenera (puede no coincidir)
- **Calidad variable**: a veces defectos menores (manos raras, texto ilegible); requiere QA visual
- **Licensing**: images generadas por AI; propiedad: quien paga la generación (Magician license); verificar Terms of Service (Diagram)
- **Performance**: imágenes pesadas sin optimizar ralentizan sitio; siempre optimizar antes de deploy

**Criterios de aceptación**:
1. Imagen coherente con descripción
2. Resolucionalmente apta para pantalla (≥ 1x, escala 2x checkeada)
3. Sin defectos visuales evidentes
4. Optimizada: ≤ 150KB para web
5. Metadata: crédito/fuente registrado en doc (para compliance)

### 2.4 Magic Rename (bonus: no es "spell" principal pero se menciona en documentación)

**Output**: Layer names automáticamente normalizados.

**Entrada**: Layers desordenados ("Group 34", "shape", "text 1").

**Proceso**: AI identifica contenido (tipo, propósito) y sugiere nombres.

**Nota**: Fuera de scope de este documento. Usar solo si equipo de diseño lo solicita explícitamente.

---

## 3. Flujo de trabajo recomendado (Figma → Repo → Elementor)

### 3.1 Preparación en Figma

**Antes de usar Magician**:

1. **Naming conventions activas**:
   - Componentes nombrados semánticamente: "Button Primary", "Card Hero", no "Group 5"
   - Layer hierarchy clara: Frame > Sections > Components
   - Usar estilos tipográficos y colores definidos (no valores sueltos)

2. **Design system explícito**:
   - Variables de Figma (si existen) con naming consistente: `color/primary`, `space/md`, `font/body`
   - Tokens documentados o exportables (si aplicable)
   - Breech de grid: 4px o 8px (para que Magic Icon/Image respete escala)

3. **Briefing para Magician**:
   - Crear página "Magician Requests" en Figma file con tabla:
     | Spell | Input | Context | Owner | Status |
     |-------|-------|---------|-------|--------|
     | Magic Icon | "upload arrow" | "For file upload CTA, solid style" | @design1 | Pending |
     | Magic Copy | Headline | "SaaS landing hero, energetic tone, max 50 chars" | @pm1 | Approved |
     | Magic Image | Background | "Minimalist office, cool colors, 16:9" | @design2 | Pending |
   - Prioridad: definir qué es ideación vs. producción
   - Propietario: quién valida output antes de versionar

### 3.2 Export y normalización de Magician outputs

**Iconos (Magic Icon)**:

```
Flujo:
1. Magic Icon genera en Figma
2. Seleccionar → Right-click → Export
   - Formato: SVG
   - Escala: 1x
   - Nombre: icon_[name]_[size].svg (ej., icon_arrow_up_24.svg)
3. Guardar en carpeta staging: assets/icons/magician_review/
4. Validar (ver 3.5): coherencia, limpieza de XML
5. Mover a: assets/icons/[subsystem]/ (ej., assets/icons/navigation/)
6. Git commit con mensaje: "feat: add icons from Magician (icons: arrow-up, ...)"
```

**Copy (Magic Copy)**:

```
Flujo:
1. Magic Copy sugiere en Figma (text review API, in-line suggestions)
2. Diseñador/PM acepta/rechaza en Figma
3. Exportar a docs/content/magician_copy.md (manual o script):
   # Magician Copy Exports
   ## Campaign: Q1 Landing Page
   - Component: CTA Button
     - Original: "Learn more"
     - Suggestions: ["Start free", "Try now", "Explore features"]
     - Approved: "Try now"
   - Component: Hero Headline
     - Approved copy: "[...text...]"
4. Revisar con PM/Editorial antes de versionar
5. Versionar en: docs/content/approved_copy.md
6. Git commit: "docs: add approved copy from Magician review"
```

**Imágenes (Magic Image)**:

```
Flujo:
1. Magic Image genera en Figma (preview)
2. Descargar desde Figma: Right-click export → PNG
3. Optimizar:
   - ffmpeg: ffmpeg -i img.png -c:v libwebp -q:v 80 img.webp
   - O herramienta: Squoosh, TinyPNG (manual web)
4. Guardar en: assets/img/magician_review/[name].webp
5. Validar visualmente: defectos, resolución, tamaño archivo
6. Mover a: assets/img/[subsystem]/
7. Registrar metadata: docs/img_manifest.md (source, date, approval)
8. Git commit: "assets: add hero background from Magician"
```

### 3.3 Normalización en repo

**Estructura sugerida**:

```
docs/
  stack/
    figma-magician.md (este documento)
  qa/
    ui-checklist.md (template QA para outputs)
    magician-outputs.md (log de todos los exports)
assets/
  icons/
    magician_review/ (staging antes de QA)
    navigation/ (aprobados y versionados)
    buttons/
    status/
  img/
    magician_review/
    hero_sections/
    illustrations/
  tokens/
    tokens.css (si procede: variables de diseño)
```

**Naming conventions (vinculante)**:

| Tipo | Patrón | Ejemplo |
|------|--------|---------|
| Icon (Magic) | `icon_[name]_[size].svg` | `icon_arrow_up_24.svg`, `icon_menu_32.svg` |
| Icon (Figma native) | `icon_[name]_[size].svg` | Mismo patrón, sin prefix "magician" |
| Image (Magic) | `img_[subsystem]_[name].webp` | `img_hero_landing_q1.webp` |
| Copy doc | `[campaign]_copy.md` | `q1_landing_copy.md` |
| QA checklist | `qa_[component]_[date].md` | `qa_button_cta_2025_01_29.md` |

**Git workflow (obligatorio)**:

```bash
# 1. Crear rama por feature/campaña
git checkout -b feat/magician-icons-q1

# 2. Agregar assets a staging
cp assets/icons/magician_review/*.svg assets/icons/navigation/

# 3. Actualizar manifest (si existe)
echo "- icon_arrow_up_24.svg (Magician, 2025-01-29, approved by @design1)" >> docs/magician-outputs.md

# 4. Commit con contexto
git add assets/icons/ docs/
git commit -m "feat(icons): add navigation icons from Magician

- icon_arrow_up_24.svg
- icon_arrow_down_24.svg
- icon_menu_32.svg

Approved by: @design1
Context: Q1 landing page navigation
Review: docs/qa/magician-outputs.md"

# 5. PR: requiere review de al menos:
#    - Diseño (coherencia visual)
#    - Front (normalización, SVG limpieza)
#    - Antes de merge
```

### 3.4 Implementación en Elementor

**Dónde aplicar estilos**:

| Ubicación | Uso | Ventaja | Desventaja |
|-----------|-----|---------|------------|
| Global Styles (Elementor) | Tokens reutilizables: colores, tipografía, espaciado | Centralizado, synced automáticamente | No soporta lógica condicional |
| Theme Builder CSS | CSS compartido entre páginas, widgets | Versionable en repo | Difícil de auditar en Elementor UI |
| Widget custom CSS | Estilos específicos de widget/página | Precisión | Riesgo de technical debt, copy-paste |
| Inline CSS (EVITAR) | Ajustes puntuales | Rápido | Imposible mantener, inconsistencia |

**Reglas de clases (BEM + componentes)**:

```css
/* Estructura recomendada */

/* Bloque (componente principal) */
.button { }
.button--primary { }
.button--secondary { }

/* Elemento (sub-componente) */
.button__label { }
.button__icon { }

/* Modificador (estado) */
.button--large { }
.button:hover { }
.button:disabled { }

/* NO hacer (inline, magic values) */
<div style="padding: 12px; color: #0052CC;"> ← Evitar
<div class="button" style="margin-bottom: 10px;"> ← Evitar
```

**Integración de Magician outputs**:

Ejemplo: Icon + Copy generados por Magician.

```html
<!-- Elementor Custom HTML widget -->

<button class="button button--primary">
  <svg class="button__icon icon icon_arrow_right_24" ...>
    <!-- SVG content from Magic Icon export -->
  </svg>
  <span class="button__label">Try now</span> <!-- Copy from Magic Copy, approved -->
</button>
```

```css
/* Theme Builder Custom CSS o Elementor Global Styles */

.button {
  display: inline-flex;
  align-items: center;
  gap: var(--space-md, 16px); /* Token o fallback */
  padding: var(--button-padding, 12px 16px);
  background: var(--color-primary);
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background 200ms ease;
}

.button--primary {
  background: var(--color-primary);
  color: white;
}

.button--primary:hover {
  background: var(--color-primary-dark);
}

.button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.button__icon {
  width: 24px;
  height: 24px;
  fill: currentColor; /* Hereda color del botón */
}

.button__label {
  font-weight: 600;
  font-size: 14px;
}
```

**No hacer**:

```html
<!-- ❌ Cada widget tiene su propia copia de CSS -->
<div class="widget-cta" style="padding: 12px; background: #0052CC; ...">

<!-- ❌ Nombres no normalizados -->
<div class="btn btn-blue"> vs <div class="button button--primary">

<!-- ❌ Valores mágicos sin tokens -->
<div style="margin-bottom: 16px;"> vs var(--space-md)
```

### 3.5 QA integral

**Template QA (docs/qa/ui-checklist.md)**:

```markdown
# QA Checklist: [Component Name]

## Visual Accuracy
- [ ] Color matches design (RGB/Hex verified)
- [ ] Spacing consistent (grid-based: 4/8/12/16/24/32px)
- [ ] Typography: font-size, weight, line-height exact
- [ ] Icons: line weight, scale, alignment
- [ ] Images: resolution 1x + 2x scales tested

## Responsiveness
- [ ] Mobile (320px): layout reflowed, readable
- [ ] Tablet (768px): intermediate breakpoint correct
- [ ] Desktop (1200px): full width respected
- [ ] No horizontal scrolling or cutoff

## Accessibility
- [ ] Color contrast ≥ 4.5:1 (WCAG AA) [use WebAIM contrast checker]
- [ ] Icons have labels (<title> in SVG or aria-label)
- [ ] Keyboard navigation works (Tab key, focus visible)
- [ ] Touch targets ≥ 44px height (mobile)
- [ ] Semantic HTML (avoid divs for buttons)

## Copy (Magic Copy)
- [ ] Tone matches brand voice
- [ ] Length fits container (no overflow)
- [ ] Grammar/typos checked
- [ ] Culturally appropriate for target audience

## Performance
- [ ] SVG icons: optimized (no unnecessary paths) ≤ 5KB
- [ ] Images: WebP format, ≤ 150KB for web
- [ ] CSS loaded: no FOUC (flash of unstyled content)
- [ ] Lighthouse score ≥ 85

## Cross-browser
- [ ] Chrome/Chromium: ✓
- [ ] Firefox: ✓
- [ ] Safari: ✓
- [ ] Edge: ✓
- [ ] Mobile Safari (iOS): ✓

## Approved by
- [ ] Design: __________ Date: __________
- [ ] Front: __________ Date: __________
- [ ] PM/Content: __________ Date: __________

## Notes
[Any issues, exceptions, or follow-ups]
```

**Ejecución**:

1. Antes de PR: designer + front revisan checklist
2. Durante PR review: al menos 2 aprobaciones (design + dev)
3. Post-deploy: QA en staging/live (visual spot-check)

---

## 4. Convenciones y estándares (obligatorio)

### 4.1 Naming de iconos

**Regla base**: `icon_[semantic_name]_[size].svg`

Ejemplos válidos:
- `icon_arrow_up_24.svg`
- `icon_menu_hamburger_32.svg`
- `icon_star_filled_16.svg`
- `icon_check_circle_24.svg`

Ejemplos inválidos:
- `icon1.svg` (no descriptivo)
- `arrow.svg` (sin tamaño)
- `magician_icon_up_24.svg` (prefijo redundante)

**Tamaños permitidos** (escala de grid):
- 16px (micro, labels)
- 24px (standard, toolbar)
- 32px (large, hero)
- 48px (extra large, feature images)

### 4.2 Grid y espaciado

**Escala de base**: 4px o 8px (elegir UNA).

Si 4px:
```
Espacios: 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64px
```

Si 8px:
```
Espacios: 8, 16, 24, 32, 40, 48, 56, 64px
```

**Aplicación**:
- Magic Icon debe respetarla (revisar si SVG bounding box es múltiplo de grid)
- Magic Image: redimensionar a dimensiones grid-compatible (ej., 640x360, 1280x720)
- Elementor: definir variables de espaciado en Global Styles usando misma escala

### 4.3 Tipografía

**Regla**: No valores sueltos. Siempre usar estilos de Figma + variables en Elementor.

En Figma:
```
Heading 1: 32px, 700, 1.2 line-height
Heading 2: 24px, 700, 1.3
Body: 16px, 400, 1.5
Label: 14px, 600, 1.4
```

En Elementor:
```css
--font-h1: 32px / 1.2 "Font Family";
--font-h2: 24px / 1.3 "Font Family";
--font-body: 16px / 1.5 "Font Family";
--font-label: 14px / 1.4 "Font Family";
```

Magic Copy: siempre especificar "max 50 chars" o similar en prompt.

### 4.4 Accesibilidad (WCAG AA mínimo)

**Contrast**: Color text + background ≥ 4.5:1 normal text, ≥ 3:1 large text.

**Icons**:
- Paired con texto si comunican algo (ej., icon + "Download")
- Standalone si decorativo (entonces aria-hidden="true")

**Focus**: Visible outline en keyboards (no remover outline CSS).

**Tamaños táctiles**: ≥ 44x44px en mobile (buttons, links).

### 4.5 Contenido y tono

**Guía editorial** (crear docs/editorial_guide.md si no existe):
- Tono: formal / casual / friendly (eligir UNO)
- Audiencia: B2B / B2C / internal
- Longitud: máximos por tipo (CTA: 30 chars, headline: 60 chars)
- Restricciones: palabras prohibidas, clichés a evitar

**Magic Copy constraint**: incluir en prompt.

Ejemplo:
```
"Rewrite this CTA for B2B SaaS, formal tone, max 30 chars, avoid 'click here' and 'amazing'"
```

---

## 5. Qué genera Claude Code (artefactos en repo)

Claude Code es herramienta de codificación. Aquí, su rol es automatizar tareas repetitivas post-Magician.

### 5.1 Artefactos sugeridos

| Archivo | Propósito | Input | Owner |
|---------|-----------|-------|-------|
| `assets/icons/[subsystem]/icon_*.svg` | Iconos normalizados, versionados | Magic Icon exports + reglas de naming | Front |
| `assets/img/[subsystem]/img_*.webp` | Imágenes optimizadas | Magic Image exports + script de compression | Front |
| `docs/qa/magician-outputs.md` | Log de todos los exports, approvals, dates | Manual edit post-QA | QA/Design |
| `docs/qa/ui-checklist.md` | Template reutilizable para QA | Template, actualizar si criterios cambian | Front |
| `assets/tokens/tokens.css` | Variables CSS (si usas tokens de Figma) | Figma variables + script de export | Design |
| `.github/workflows/magician-validate.yml` | (Opcional) CI check: SVG syntax, image size, naming | Script automation | DevOps |

### 5.2 Inputs necesarios para Claude Code

**Para normalizar iconos**:

```
Tarea: "Normalizar exports de Magic Icon del directorio assets/icons/magician_review/

Reglas:
1. Renombrar archivos: magic_icon_[name] → icon_[name]_[size]
2. Validar SVG: remover metadata innecesaria, limpiar XML
3. Verificar tamaños: 16, 24, 32, 48px (grid-aware)
4. Mover a: assets/icons/[categoria_semantica]/
5. Actualizar manifest: docs/magician-outputs.md

Ejemplos:
- magic_icon_arrow_1.svg → icon_arrow_up_24.svg (en assets/icons/navigation/)
- magic_icon_star_2.svg → icon_star_filled_24.svg (en assets/icons/feedback/)

Ejecutar: prompt en Claude Code CLI"
```

**Para generar checklist QA**:

```
Tarea: "Generar docs/qa/[component]_[date].md con checklist QA

Input:
- Component: "Button Primary CTA"
- Includes: Magic Icon (arrow), Magic Copy ("Try now"), custom styling
- Breakpoints: mobile, tablet, desktop
- WCAG level: AA

Output:
- Checklist markdown con todas las secciones (visual, responsive, a11y, performance)
- Ejemplos específicos para este componente
- Sign-off fields para Design, Front, PM"
```

**Para optimizar imágenes**:

```
Tarea: "Batch compress assets/img/magician_review/*.png → *.webp

Script:
- Input: PNG files from Magic Image exports
- Output: WebP, quality 80, ≤ 150KB each
- Preserve: original aspect ratio, metadata (filename mapping in JSON)
- Log: docs/img-conversion-log.md (date, size before/after, compression ratio)"
```

### 5.3 Ejemplo: Prompt para Claude Code

**Contexto**: Recibiste 15 iconos de Magic Icon, listos en `assets/icons/magician_review/`. Necesitas normalizarlos antes de versionar.

**Prompt listo para copiar**:

```
Actúa como asistente de normalización de assets.

Contexto:
- Repo tiene estructura: docs/, assets/icons/, assets/img/
- Magician (plugin Figma) exportó 15 icons SVG al directorio assets/icons/magician_review/
- Regla de naming: icon_[semantic_name]_[size].svg (ej., icon_arrow_up_24.svg)
- Iconos versionados van en: assets/icons/[categoria_semantica]/ (ej., navigation/, feedback/, status/)

Tarea:
1. Listar archivos en assets/icons/magician_review/
   - Mostrar nombre actual, propósito (si es legible), tamaño (KB)
2. Proponer renombramiento:
   - Categoría semántica (navigation, feedback, status, action, indicator)
   - Nombre descriptivo (arrow_up, star_filled, menu_hamburger)
   - Tamaño: extraer de archivo o estimar (si "24" en nombre → 24px)
3. Generar script de normalización (bash/python):
   - cp desde magician_review/ a la categoría correspondiente
   - Validar SVG limpio (sin defectos XML)
4. Actualizar manifest: docs/magician-outputs.md
   - Agregar tabla: [Icon Name] | [Category] | [Original Export] | [Approved By] | [Date]
5. Generar PR template markdown:
   ```
   ## PR: Normalize Magician icons (Q1 batch)
   - 15 icons normalized and categorized
   - Manifest: docs/magician-outputs.md
   - QA checklist: reviewed by @design1, @front1
   - Ready for merge
   ```

Entregables:
- Script bash con comandos (para ejecutar manualmente o en CI)
- Tabla de mapping (original → nuevo nombre)
- PR template
- Cambios a docs/magician-outputs.md
```

---

## 6. Seguridad y permisos

### 6.1 Evaluación de plugin antes de aprobación

**Checklist para admin Figma** (antes de autorizar Magician):

| Criterio | Check | Notas |
|----------|-------|-------|
| **Fuente confiable** | ✓ Diagram (verified developer) | Verificar: plugin publicado por Diagram, no fork |
| **Permissions solicitados** | ✓ Acceso a archivos de usuario | Magician lee contenido de frames/text para sugerir. Normal. |
| **Data salience** | ✓ No acceso a user data fuera Figma | Diagrama no saca emails, names, roles. |
| **Security disclosure** | ✓ (opcional pero recomendado) | Figma Community: "Data security info available" badge. Diagram: verificar si lo completó. |
| **Network access** | ? Si usa API externa | Magician usa APIs para generación (AI models). Verificar: ¿dónde se procesan requests? |
| **Licencia y ToS** | ✓ Leer Terms of Service (Diagram) | Ownership de assets generados, data retention, etc. |

**Decisión**:

```
✅ APROBADO: Magician puede instalarse.
   Medida: setear en Admin → Extensions → "Only admin-approved plugins"
   
⚠️  CONDICIONES:
   - Use solo en [team/workspace] específico
   - Log de uso en [spreadsheet] (para auditoría)
   - Revisar ToS cada 6 meses
   
❌ RECHAZADO: Bloquear acceso.
   Razón: [detallar]
```

### 6.2 Personal Access Tokens (PAT): cuándo aparecen

**Escenario 1**: Plugin requiere acceso a Figma API (menos probable con Magician, que es in-editor).

Si esto ocurre:
- User genera PAT en Settings → Security → Personal access tokens
- PAT otorga acceso a TODOS los archivos del usuario (sin restricción granular)
- Nunca compartir PAT en Slack, email, o commits
- Revocar después de usar: Settings → Security → "Revoke access"

**Escenario 2**: Integración con herramienta externa (ej., exportar iconos a repo vía API).

Medidas:
- Usar PAT con scopes mínimos (si la plataforma lo permite)
- Guardar en `.env` local, NUNCA en repo
- Documentar: quién tiene acceso, por cuánto tiempo, propósito
- Auditar: revisar si PAT se usó recientemente (Si no → revocar)

### 6.3 Riesgos específicos y mitigaciones

| Riesgo | Severidad | Mitigación |
|--------|-----------|-----------|
| **Magician genera copy corporativa sensible** | Alta | Revisar always con PM. No usar Magic Copy para: contratos, términos legales, promesas de negocio. |
| **Icons/images violando IP de terceros** | Media | Revisar si output se parece a marca/logo existente. Si duda: regenerar o crear manual. Documentar: "AI-generated, reviewed" en manifest. |
| **Calidad inconsistente entre batches** | Media | Usar template de prompt consistente. Si resultado varía mucho: cambiar proveedor (ej., Figma AI nativo vs. Magician). |
| **Data leakage: Figma content → AI model training** | Baja | Magician/Diagram: no entrena modelos en contenido user (según docs). Pero: leer ToS completo. Si dudas: contactar Diagram. |
| **SVG malformado causando issues en web** | Baja | Validar SVG en repo (herramienta: svgo). CI check: rechazar si XML inválido. |
| **Performance: iconos/imágenes no optimizados** | Media | Automatizar optimización en CI. Rechazar PRs si archivo > tamaño permitido. |

### 6.4 Qué NO subir al repo

```
❌ .env files (contiene PATs u API keys)
❌ Figma links con tokens internos (pueden expirar o exponerse)
❌ Screenshots con copys/datos corporativos sensibles
❌ Iconos/imágenes temporales de ideación (solo versionados finales)
❌ Logs de auditoría con emails (anonimizar si necesario)
```

**Gitignore (actualizar si necesario)**:

```
# Security
.env
.env.local
*.pem
*.key

# Temporary Magician exports (antes de normalizar)
assets/icons/magician_review/
assets/img/magician_review/

# Figma cache
.figma/

# OS
.DS_Store
Thumbs.db
```

---

## 7. Troubleshooting

### Problema 1: Magic Icon genera estilos inconsistentes (línea, ángulos varían)

**Causa**: Prompts diferentes, o AI nativa con ajustes variados.

**Solución**:
- Crear template de descripción (ver 4.1): siempre incluir "solid style", "24px grid"
- Generar 10+ icons en un request (lote), para coherencia
- Si sigue inconsistente: usar Figma nativo Rename Layers + manual icon refinement, o cambiar a Diagram (tiene Beta features de consistencia)

### Problema 2: Magic Copy demasiado largo, no cabe en Elementor

**Causa**: Prompt sin máximo, o AI es verboso.

**Solución**:
1. Redactar prompt: "CTA button, max 25 characters, include action verb"
2. Si aún largo: re-prompt con restricción más estricta ("max 20 chars")
3. Aceptar → editar manualmente en Figma después
4. Documentar: si Magic Copy nunca respeta maxlen, dejar de usar para ese tipo de contenido

### Problema 3: Magic Image tiene defectos (manos raras, texto ilegible)

**Causa**: AI generativa produce varianza. No es perfecta.

**Solución**:
- Aceptar: Magician es herramienta de ideación, no producción final
- Regenerar: click "Generate again" (costo variable según plan)
- Si defecto persiste: cambiar prompt (menos específico, más simple)
- Fallback: usar stock image library (Unsplash, Pexels) si Magician no entrega

### Problema 4: Icon SVG limpio en Figma, pero defectos al usar en web

**Causa**: Figma export preserva metadata/grupos innecesarios.

**Solución**:
- Usar herramienta: `svgo` (optimize SVG)
  ```bash
  npm install -g svgo
  svgo icon_arrow_up_24.svg --config='{ "multipass": true }'
  ```
- Alternativa: importar SVG a editor online (Boxy SVG), export limpio
- CI check: rechazar SVG > 5KB sin optimizar

### Problema 5: Magic Copy aprobada, pero no se alinea con brand voice en live

**Causa**: QA incompleto o brand guidelines cambiaron.

**Solución**:
- Post-mortem: ¿quién aprobó? ¿se usó guía editorial en prompt?
- Actualizar brand guidelines en repo (docs/editorial_guide.md)
- Futuro: include guideline link en prompt de Magic Copy

### Problema 6: Plugin Magician no funciona de repente

**Causa**: Actualización de Figma, o Diagram cambió API.

**Solución**:
1. Comprobar: ¿Figma version actualizada? Actualizar si falta
2. Reinstalar plugin: Figma → Plugins → Manage → Magician → "Remove", buscar de nuevo, instalar
3. Si persiste: Contactar Diagram support (diagram.com/support)
4. Fallback: Usar Figma nativo AI features (Rename, Rewrite text) mientras se resuelve

---

## 8. Checklist final

### Antes de usar Magician

- [ ] Plugin Magician aprobado por admin Figma (sección 6.1)
- [ ] Team tiene acceso (no bloqueado por organización)
- [ ] Design system en Figma establecido (styles, variables, naming)
- [ ] Guía editorial corporativa documentada (tone, max lengths)
- [ ] Team alineado: roles (quién valida qué)

### Antes de exportar desde Magician

- [ ] Magic Icon: generado en lote (10+), reviso coherencia
  - [ ] Línea base consistente
  - [ ] Tamaño respeta grid (16/24/32/48px)
  - [ ] Nombres normalizados en Figma antes de export
- [ ] Magic Copy: validado con PM/editorial
  - [ ] Tono matches brand
  - [ ] Largo ≤ máximo especificado
  - [ ] Sin clichés
- [ ] Magic Image: reviso para defectos visuales
  - [ ] Sin errores obvios (manos, texto, distorsiones)
  - [ ] Resolución apta (≥ 1x scale)
  - [ ] Estilo matches brief

### Antes de versionar en repo

- [ ] Assets normalizados: nombres, estructura carpetas (sección 5.1)
- [ ] SVGs limpiados: `svgo` u herramienta similar
- [ ] Imágenes optimizadas: WebP, ≤ 150KB
- [ ] Manifest actualizado: docs/magician-outputs.md
- [ ] Approvals registrados: quién validó, cuándo
- [ ] Git commit con contexto: "feat(icons): ..." + descripción

### Antes de implementar en Elementor

- [ ] Assets en rama correcta, PR aprobado
- [ ] Clases CSS normalizadas: BEM + componentes (sección 3.4)
- [ ] Variables usadas, no valores inline
- [ ] Responsiveness testeada: 3+ breakpoints
- [ ] Accesibilidad: contrast, focus, tamaños táctiles (section 4.4)

### Antes de publicar

- [ ] QA completo: visual, responsive, a11y, performance (section 3.5)
- [ ] Todas signaturas en checklist
- [ ] Staging: reviso con ojos frescos en device real
- [ ] Performance: Lighthouse ≥ 85
- [ ] Cross-browser: Chrome, Firefox, Safari, Edge
- [ ] Ready for deployment

---

## 9. Referencias

**Fuentes oficiales**:

1. Figma Blog: "How Magician uses Figma's text review API" (2022-12-05)
   - https://www.figma.com/blog/how-magician-uses-figmas-text-review-api/
   - Fuente primaria sobre Magic Copy, Text Review API, iteración Diagram

2. Figma Help Center: "Manage plugins and widgets in an organization"
   - https://help.figma.com/hc/en-us/articles/4404228724759-Manage-plugins-and-widgets-in-an-organization
   - Autoridad en aprobación, permisos, acceso, y governance de plugins

3. Figma Help Center: "Manage personal access tokens"
   - https://help.figma.com/hc/en-us/articles/8085703771159-Manage-personal-access-tokens
   - Seguridad: PAT, scopes, riesgos

4. Diagram (publisher oficial de Magician): https://diagram.com/
   - Plugin landing page, documentación, soporte

5. Figma Developers: Text Review Plugins documentation
   - https://developers.figma.com/docs/plugins/textreview-plugins/
   - Especificación técnica de Text Review API usada por Magic Copy

6. Figma AI: "Meet Figma AI: Empowering Designers with Intelligent Tools" (2024-06-25)
   - https://www.figma.com/blog/introducing-figma-ai/
   - Contexto sobre AI en Figma, data training, compliance

**Notas sobre fuentes**:

- Referencias 1–3, 5–6: Sitios oficiales de Figma (alta confiabilidad)
- Referencia 4: Sitio oficial de Diagram (creador de Magician, alta confiabilidad)
- Este documento: compilación operativa basada en fuentes verificables y prácticas de equipo

---

## Versionado de este documento

| Versión | Fecha | Cambios |
|---------|-------|---------|
| 1.0 | 2025-01-29 | Inicial: capacidades Magician, flujo Figma → repo → Elementor, seguridad, troubleshooting |

---

**Documento**: docs/stack/figma-magician.md  
**Mantenedor**: [Equipo design/front, a definir]  
**Última revisión**: 2025-01-29  
**Próxima revisión sugerida**: 2025-04-29 (trimestral, o si Magician/Figma API cambia)
