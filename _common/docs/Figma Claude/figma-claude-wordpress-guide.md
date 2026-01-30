# Documentación Operativa: Figma + Claude Code + WordPress (Elementor)

## Objetivos de esta guía

Esta guía documenta el **flujo integrado real** (no marketing) para llevar diseños de Figma a producción en WordPress via Claude Code. Cubre:

1. Qué puede hacer realmente la integración Figma ↔ Claude Code
2. Arquitectura de tokens (diseño → código → CMS)
3. Workflow operativo paso a paso (con workarounds)
4. Limitaciones, trade-offs y cuándo no aplica
5. Checklist de QA (pixel, responsive, accesibilidad)
6. Casos de uso donde funciona bien vs donde no

---

## SECCIÓN 1: Fundamentos — La integración Figma + Claude Code

### 1.1 Cómo funciona realmente (MCP y Code Connect)

**Model Context Protocol (MCP)** es el puente técnico. En lugar de que Claude vea screenshots de tu diseño, accede a datos estructurados:

```
Figma Design File
    ├─ Component hierarchy (frames, groups, components)
    ├─ Auto Layout rules (dirección, gaps, padding)
    ├─ Design tokens (variables: colores, espaciado, tipografía)
    ├─ Layer names y metadatos
    └─ Propiedades visuales (size, position, fill, stroke)
    
    ↓ [MCP exposes this as structured JSON]
    
Claude Code reads this + Code Connect mappings (si existen)
    └─ Generates code → CSS → exportable output
```

### 1.2 Tres niveles de "integración"

| Nivel | Qué hace | Cuándo usar | Tiempo setup |
|-------|----------|-------------|--------------|
| **Light** | Links a Figma file + inspección manual | One-off conversions, prototypes | < 5 min |
| **Medium** | Figma variables → CSS variables via plugin + Claude genera componentes | Design system updates, token sync | 30-60 min |
| **Heavy** | Code Connect mappings + MCP + automation pipeline | Enterprise, continuous sync | 2-4 horas |

---

## SECCIÓN 2: Arquitectura de tokens — Del diseño a WordPress

### 2.1 Flujo conceptual (end-to-end)

```
DESIGN PHASE (Figma)
    ├─ Figma Variables (semantic + primitive)
    │   ├─ color/brand/primary: #0052CC
    │   ├─ space/xs: 4px, space/md: 16px
    │   └─ font/body/size: 16px, font/body/weight: 400
    │
    └─ Components + Auto Layout
        ├─ Button (variant: primary/secondary/disabled)
        ├─ Card (gap: 16px, padding: 12px)
        └─ Form (field + label hierarchy)

    ↓ [Export variables + inspect components]

EXTRACT PHASE (Claude Code + MCP)
    ├─ Get design context (get_design_context)
    ├─ Get variable defs (get_variable_defs)
    ├─ Get Code Connect mappings (si existen)
    └─ Generate tokens.json + component specs

    ↓ [Process + structure tokens]

TRANSFORMATION PHASE (CLI + plugins)
    ├─ tokens.json → CSS variables (root scope)
    ├─ Alias tokens → semantic tokens
    ├─ Format: --color-brand-primary: #0052CC
    └─ Export: tokens.css (o .json)

    ↓ [Copy to WordPress]

CMS PHASE (Elementor)
    ├─ Paste tokens into Elementor Global Settings
    │   OR
    ├─ Use Design Tokens Manager plugin (bulk import)
    └─ References: var(--color-brand-primary) in styles

    ↓ [Build/update pages]

QA PHASE
    ├─ Visual: pixel-perfect match vs Figma?
    ├─ Responsive: breakpoints correct?
    ├─ Component coverage: all states tested?
    └─ Accessibility: contrast, semantic HTML?
```

### 2.2 Estructura de tokens recomendada en Figma

Para que Claude Code + exportación funcione limpiamente:

```
Figma Variables Structure:
└─ TOKENS (Collection)
    ├─ Primitive (Mode: default)
    │   ├─ color-base
    │   │   ├─ gray-0: #FFFFFF
    │   │   ├─ gray-50: #F9FAFB
    │   │   └─ blue-500: #0052CC
    │   ├─ space-base
    │   │   ├─ xs: 4px
    │   │   ├─ sm: 8px
    │   │   ├─ md: 16px
    │   │   └─ lg: 24px
    │   └─ font-size-base
    │       ├─ xs: 12px
    │       ├─ sm: 14px
    │       ├─ md: 16px
    │       └─ lg: 20px
    │
    ├─ Semantic (Mode: Light)
    │   ├─ color-bg-primary: {color-base/blue-500}
    │   ├─ color-text-primary: {color-base/gray-900}
    │   └─ space-component-padding: {space-base/md}
    │
    └─ Semantic (Mode: Dark)
        ├─ color-bg-primary: {color-base/blue-600}
        ├─ color-text-primary: {color-base/gray-100}
        └─ space-component-padding: {space-base/md}
```

**Por qué**: Los tokens semánticos se mapean a casos de uso (botón, fondo, texto), mientras que los primitivos son valores puros. Esto hace la salida CSS clara y mantenible.

---

## SECCIÓN 3: Setup inicial — Paso a paso

### 3.1 Prerequisitos

```
✅ Figma
   └─ Dev or Full seat (Professional plan minimum)
   └─ Design file con variables + components

✅ Claude Code
   └─ Instalado: npm install -g @anthropic-ai/claude-code
   └─ API key configurada

✅ WordPress + Elementor
   └─ Pro (recomendado para Design Tokens)
   └─ Plugin: Design Tokens Manager for Elementor (opcional, pero recomendado)

✅ Node.js + CLI tools
   └─ npm/yarn
   └─ Figma plugin CLI (opcional)
```

### 3.2 Conectar Figma a Claude Code (MCP setup)

**Opción A: Desktop MCP Server (recomendado para control total)**

```bash
# 1. En Figma Desktop app:
#    → Abrir archivo de diseño
#    → Menu superior izquierda > Preferences
#    → Activar "Dev Mode MCP Server"
#    → Anota: http://127.0.0.1:3845/sse

# 2. En terminal (tu proyecto):
claude mcp add --transport sse figma-dev-mode-mcp-server http://127.0.0.1:3845/sse

# 3. Verifica:
claude mcp list
# Output debe incluir: figma-dev-mode-mcp-server
```

**Opción B: Remote MCP Server (cloud, sin desktop app)**

```bash
# 1. Figma auth + acceso remoto (requiere cloud token)
# 2. Single command:
claude mcp add figma-remote https://api.figma.com/v1/mcp \
  --header "Authorization: Bearer YOUR_FIGMA_TOKEN"

# Limitación: Starter plans = 6 calls/mes
```

**Recomendación**: Usa **Opción A** si tienes Professional+ seat. Rate limits no aplican.

### 3.3 Code Connect (mapeos componente → código)

Si quieres que Claude Code conozca tu codebase real:

```bash
# Opción 1: Code Connect UI (GUI, sin terminal)
# → Figma Dev Mode → Code Connect tab
# → Connect to GitHub repository
# → Mapea componentes visualmente

# Opción 2: Code Connect CLI (más potente)
npm install -g @figma/code-connect

# En tu repo raíz:
figma connect init --type react
# Crea: figma.config.json + ejemplos

# Mapea componente Button:
figma connect create
# Ejemplo estructura:
# src/components/Button.tsx
# → Figma: Button component ID xyz
```

---

## SECCIÓN 4: Workflow operativo — Diseño a WordPress

### 4.1 Flujo completo (caso real)

#### Fase 1: Preparar diseño en Figma (10-15 min)

**Checklist**:
- ✅ Componentes principales marcados (Frame + component)
- ✅ Auto Layout activado (flex/grid intent)
- ✅ Variables semánticas nombradas (--color-primary, no --blue-500)
- ✅ Capas nombradas semánticamente (.button-primary-hover, no "Group 42")
- ✅ Componentes published en team library (requisito para Code Connect)

**Ejemplo mínimo**:
```
Figma File: "Design System v1"
├─ Components page
│  └─ Button (published)
│     ├─ Primary variant (auto layout: horizontal, gap: 8px)
│     ├─ Secondary variant
│     └─ Disabled state
├─ Variables page
│  └─ color/primary: #0052CC
│  └─ space/md: 16px
```

#### Fase 2: Extraer datos con Claude Code (5-10 min)

**En terminal**:

```bash
# 1. Navega a tu proyecto
cd ~/my-wordpress-project

# 2. Inicia Claude Code
claude

# 3. Prompt básico (selection-based):
"I have a Figma design file open with a Button component selected. 
Read the component structure, colors, spacing, and typography. 
Generate:
1. A tokens.json file with extracted design tokens
2. HTML/CSS for this component
3. A mapping to our WordPress/Elementor structure"

# Output: Claude genera tokens.json + HTML + notas sobre mapeo
```

**Alternativa (link-based)**:

```bash
# Copia link de Figma:
# https://www.figma.com/file/FILEID/Design?node-id=123%3A456

# Prompt:
"Convert this Figma design to tokens and WordPress-ready CSS:
[paste figma link]"
```

**Resultado esperado**:
```json
// tokens.json
{
  "color": {
    "brand": {
      "primary": { "value": "#0052CC" },
      "secondary": { "value": "#E3F2FD" }
    }
  },
  "space": {
    "md": { "value": "16px" }
  }
}
```

#### Fase 3: Procesar tokens → CSS (2-5 min)

**Opción A: Plugin Figma + manual export**

```bash
# En Figma, instala: "Export Variables (CSS, SCSS, Tailwind)"
# → Abre plugin
# → Export to CSS
# → Copia output

# Resultado:
:root {
  --color-brand-primary: #0052CC;
  --color-brand-secondary: #E3F2FD;
  --space-md: 16px;
}
```

**Opción B: Claude Code genera y procesa** (más automatizado)

```bash
# Prompt en Claude:
"Read tokens.json and generate:
1. CSS variables file (tokens.css)
2. SCSS version with sass:darken functions
3. JSON for Elementor import (if possible)"

# Claude genera archivos listos para copiar
```

#### Fase 4: Sync a WordPress/Elementor (10-15 min)

**Opción A: Manual (Elementor UI)**
```
WordPress Admin
├─ Elementor
├─ Settings
├─ Global Styles
├─ Colors → Agregar cada token
│   └─ Name: "Brand Primary"
│   └─ Value: #0052CC
├─ Typography → Agregar font sizes
│   └─ Name: "Body"
│   └─ Size: 16px
└─ Spacing → Agregar variables
    └─ Name: "Medium"
    └─ Value: 16px
```

**Opción B: Design Tokens Manager plugin** (bulk import)
```bash
# 1. Instala: "Design Tokens Manager for Elementor"
# 2. Exporta tokens.json de Figma
# 3. En WordPress: Elementor → Design Tokens
# 4. Click "Import" → Paste JSON
# 5. Save → Auto-syncs a Elementor global settings
```

**Opción C: WP-CLI (automatizado)**
```bash
# Design Tokens Manager expone WP-CLI commands:
wp edtm import tokens.json --mode=merge

# Verifica:
wp edtm export --file=backup.json
```

#### Fase 5: Build componentes en Elementor (15-30 min)

**Estructura recomendada**:
```
Elementor Template: "Button Primary"
├─ Button element
├─ Style panel
│  ├─ Color: var(--color-brand-primary)
│  ├─ Padding: var(--space-md)
│  ├─ Font size: var(--font-size-md)
│  └─ Border radius: Custom CSS → var(--radius-md)
└─ Save as template
```

**Reuso**: Ahora todos tus botones usan el mismo token. Si cambias `--color-brand-primary` en global settings, se actualiza everywhere.

#### Fase 6: QA integral (20-30 min)

**Checklist**:

```
VISUAL ACCURACY
☐ Colors match Figma (pixelperfect)
☐ Spacing: padding/margin aligned to grid
☐ Typography: font size, weight, line-height exact
☐ Border radius, shadows consistent
☐ Component states (hover/active/disabled) visible

RESPONSIVE
☐ Mobile (320px): layout shifts correctly
☐ Tablet (768px): breakpoint works
☐ Desktop (1200px): full width handled
☐ No overflow/cut-off text
☐ Touch targets ≥ 44px (accessibility)

TOKENS & VARIABLES
☐ All tokens exported: colors, space, fonts
☐ Token names semantic (not --blue-500)
☐ Alias tokens resolve correctly (primary → {blue-500})
☐ Light/dark modes toggle (if applicable)

COMPONENT COVERAGE
☐ All button variants present
☐ All card types working
☐ Form states complete
☐ Empty states/loading states handled

ACCESSIBILITY
☐ Color contrast ≥ 4.5:1 (WCAG AA)
☐ Semantic HTML structure
☐ Alt text for images
☐ Focus states keyboard-visible
☐ No keyboard traps

PERFORMANCE
☐ CSS variables loaded (no FOUC)
☐ Page Speed Insights score ≥ 85
☐ No render-blocking CSS
☐ Images optimized + lazy load

CROSS-BROWSER
☐ Chrome/Chromium: ✓
☐ Firefox: ✓
☐ Safari: ✓ (CSS var support)
☐ Edge: ✓
```

---

## SECCIÓN 5: Limitaciones, workarounds y trade-offs

### 5.1 Limitación: Claude Code no actualiza código existente bien

**El problema**:
```
Escenario: Tu Button es generado, ahora cambias el design en Figma
→ Ejecutas Claude Code de nuevo
→ Genera NUEVO código completo (copia duplicada)
→ Perdes cambios personalizados del anterior (events, lógica)
```

**Workaround 1: Usar Code Connect + mappings**
```
Si defines: Figma Button → src/components/Button.tsx (via Code Connect)
Entonces: Claude entiende qué componente actualizar
Resultado: Cambios "quirúrgicos" (solo CSS/layout) vs regeneración full
```

**Workaround 2: Generar "componente base" una sola vez**
```
1. Claude genera Button.tsx inicial
2. Tú añades lógica, eventos, context, etc.
3. Para futuros cambios de design:
   → Copias solo el CSS/estructura visual
   → Insertas en tu Button.tsx existente
```

**Recomendación**: Usa **Code Connect** + acepta que cambios de design requieren revisión manual.

### 5.2 Limitación: Multi-frame flows

**El problema**:
```
Figma tiene: Frame 1 (Signup) → Frame 2 (Verification) → Frame 3 (Success)
Claude Code ve CADA frame por separado
→ Genera 3 componentes desconectados
→ Necesitas conectarlos manualmente (router, state, etc.)
```

**Workaround**:
```javascript
// Claude genera:
// 1. SignupForm.tsx
// 2. VerificationStep.tsx
// 3. SuccessScreen.tsx

// Tú creas flow wrapper:
export function SignupFlow() {
  const [step, setStep] = useState('signup');
  
  return (
    <>
      {step === 'signup' && <SignupForm onNext={() => setStep('verify')} />}
      {step === 'verify' && <VerificationStep onNext={() => setStep('success')} />}
      {step === 'success' && <SuccessScreen />}
    </>
  );
}
```

**En Elementor** (sin React):
```html
<!-- Use conditional display + custom code -->
[elementor-template id="signup-template" display_when="step==signup"]
[elementor-template id="verify-template" display_when="step==verify"]
[elementor-template id="success-template" display_when="step==success"]
```

### 5.3 Limitación: No hay loop visual post-generación

**El problema**:
```
Claude genera código
→ Lo copias a archivo
→ Abres browser, refresheas
→ "Hmm, padding looks off"
→ Editas CSS manualmente
→ Vuelves a refreshear
→ Repetir 5 veces
```

**Solución parcial**: Usa Local by Flywheel + Live Reload
```bash
# En terminal WordPress:
wp --path=/path/to/wp watch

# En browser:
# Instala LiveJS extension + refresha auto en cada cambio
```

**Mejor**: Usa **Builder.io Fusion** o **Relume** si quieres visual editing
(Estos son productos terceros, pero resuelven esto directamente)

### 5.4 Rate limits (MCP remote server)

| Plan | Límite | Duración |
|------|--------|----------|
| Starter + remote MCP | 6 calls | Mes |
| Professional+ remote | Tier-based rate limit | API throttling |
| Professional+ desktop (local) | Sin límite | ∞ |

**Implicación**: Si usas **remote MCP** con plan Starter, 6 conversiones Figma→código/mes. Desktop es ilimitado.

### 5.5 Code Connect requisitos

- Componentes **deben estar publicados** en team library
- Codebase debe ser **abierto en editor** (VS Code, etc.)
- Funciona para: React, HTML/Web Components, SwiftUI, Jetpack Compose
- **No funciona**: Vue, Angular, Svelte directo (pero puedo generar HTML luego adaptar)

---

## SECCIÓN 6: Casos de uso donde funciona bien vs no

### Funciona bien ✅

1. **Generación inicial de design system**
   - Tienes Figma definido, necesitas CSS + tokens
   - Tiempo: 2-4 horas (Figma → tokens → Elementor global)
   - ROI: Alto (centraliza todos los tokens)

2. **Componentes one-off** (landing page, promocional)
   - Button, Card, CTA → generar una sola vez
   - Tiempos cortos, sin evolución esperada
   - Perfect fit

3. **Diseño → especificación técnica** (sin código)
   - Solo necesitas tokens.json + design spec
   - Para compartir con equipo
   - Claude extrae todo en 5 min

4. **QA: Validar diseño vs código**
   - "¿Mi código en Elementor respeta el design?"
   - Claude compara Figma + sitio actual
   - Identifica drifts

### No funciona bien ❌

1. **Actualizaciones frecuentes** (design ↔ código)
   - Si el design cambia cada sprint
   - Regenerar es costoso (tokens, código)
   - Mejor: mantener manual + sincronizar solo tokens críticos

2. **Lógica compleja** (forms con validación, state management)
   - Claude genera estructura visual
   - Lógica requiere manual
   - Not efficient

3. **Diseños muy custom** (animaciones complejas, 3D)
   - Figma prototypes no exportan bien
   - Requiere custom code
   - Claude puede generar CSS base, pero personalizaciones manuales

4. **Temas multiidioma con muchas variantes**
   - Tokens OK, pero contenido dinámico no
   - Mejor: usar ACF + loops en Elementor
   - Claude genera shell, tú agregas WP logic

---

## SECCIÓN 7: Template workflow (copy-paste ready)

### 7.1 Claude Code prompts efectivos

**Prompt 1: Tokens extraction**
```
You have a Figma design file open in Dev Mode (MCP connected).

Analyze the current selection and:
1. Extract all design tokens (colors, spacing, typography, radius, shadows)
2. Generate tokens.json in DTCG format
3. Generate CSS :root variables
4. Map each token to its semantic usage (e.g., --color-primary → CTA buttons, links)
5. List any unresolved token references (tokens using other tokens)

Output:
- tokens.json (ready to copy)
- tokens.css (ready to copy)
- A mapping table: Token Name | CSS Variable | Usage

Include all modes if applicable (light/dark).
```

**Prompt 2: Component generation**
```
Convert this Figma component to WordPress-ready HTML/CSS:
[figma-link or "use current selection"]

Constraints:
1. Use CSS custom properties for all colors, spacing, fonts
2. No hardcoded values (everything should be var(--)
3. Generate BEM-style class names
4. Include responsive behavior (mobile-first, breakpoints at 768px, 1200px)
5. Make it compatible with Elementor custom CSS panel

Output structure:
- HTML (semantic, no inline styles)
- CSS (using variables)
- Variables used (list)
- Mapping to Elementor if applicable
```

**Prompt 3: QA spec**
```
Generate a QA checklist for this Figma design converted to WordPress:
[figma-link]

Include:
1. Visual accuracy points (colors, spacing, fonts, states)
2. Responsive breakpoints to test
3. Component variant matrix (all states)
4. Accessibility requirements
5. Performance checklist
6. Browser compatibility notes

Format as markdown table, ready to share with QA team.
```

### 7.2 Orden recomendado (sprint típico)

```
Day 1 (2-3 horas):
├─ Setup: MCP + Code Connect (si no existe)
├─ Figma design review (estructura OK? variables nombradas?)
└─ Extract tokens + genera tokens.json

Day 2 (1-2 horas):
├─ Process tokens → CSS → WordPress
├─ Sync a Elementor global settings
└─ Build base templates (button, card, form)

Day 3 (2-3 horas):
├─ QA: visual accuracy + responsive
├─ Ajustes CSS (si needed)
└─ Document: mapping tokens → WordPress

Day 4 (2-3 horas):
├─ Generate remaining components (from Figma)
├─ Add WordPress logic (loops, ACF, etc.)
└─ Final QA
```

---

## SECCIÓN 8: Troubleshooting

### Problema: "Claude Code doesn't see my Figma selection"

**Causas posibles**:
- MCP no está conectado: `claude mcp list` no muestra figma-dev-mode-mcp-server
- Figma desktop app cerrada o archivo no abierto
- Selection no exists

**Solución**:
```bash
# 1. Verifica conexión:
claude mcp list

# 2. Reconecta si falta:
claude mcp add --transport sse figma-dev-mode-mcp-server http://127.0.0.1:3845/sse

# 3. En Figma Desktop: Menu > Preferences > Dev Mode MCP Server > Enable

# 4. Selecciona un frame/component en Figma, intenta de nuevo
```

### Problema: Tokens.json no contiene todas las variables

**Causas**:
- Variables no están nombradas semánticamente
- Algunos tokens en modos específicos (light/dark) no se exportaron
- Plugin incompleto

**Solución**:
```
1. Audita Figma variables: cada una tiene nombre en formato path (color/primary)?
2. Verifica modos: ¿Existen "Light" y "Dark"? ¿Están completos en ambos?
3. Intenta otro plugin: "CSS Variables Import/Export" (más robusto que algunos)
4. Manual export fallback: copia tokens en Figma manualmente a JSON
```

### Problema: CSS variables no funcionan en Elementor

**Causas**:
- Elementor no reconoce syntax `var(--)` 
- Variables definidas en custom code pero no en global scope
- Cache no cleared

**Solución**:
```
1. Abre Elementor editor → Custom Code
2. Pega en "Custom CSS" (no "Custom JavaScript"):
   :root {
     --color-primary: #0052CC;
   }

3. Clear cache:
   WP Admin > Settings > Elementor > Regenerate CSS

4. Verifica en DevTools (F12):
   - Busca en Styles: --color-primary
   - Debería mostrar el valor resuelto
```

### Problema: Claude Code genera código que no es compatible

**Causas**:
- Prompt demasiado vago (no especificó framework)
- Code Connect no está configurado (Claude no conoce tu stack)
- Figma design es ambigua

**Solución**:
```
Sé específico en prompt:
"Generate this component as HTML + CSS only (no React/Vue)
Target: Elementor custom HTML widget
Use: CSS Custom Properties exclusively
Output: <div class="button button--primary">Click me</div>
        + CSS block-scoped"
```

---

## SECCIÓN 9: Checklist de implementación

### Setup inicial
- [ ] Figma: Dev/Full seat activo
- [ ] Claude Code: instalado + API key
- [ ] MCP: conectado (local o remote)
- [ ] Code Connect: configurado (opcional pero recomendado)
- [ ] WordPress + Elementor: activo

### Fase design (Figma)
- [ ] Componentes principales documentados
- [ ] Variables semánticas nombradas (--color-primary, no --blue)
- [ ] Auto Layout aplicado
- [ ] Capas nombradas semánticamente
- [ ] Componentes published en team library

### Fase extracción (Claude)
- [ ] Tokens.json generado
- [ ] CSS variables generado
- [ ] Tokens auditados (no faltan)
- [ ] Alias tokens verificados

### Fase WordPress
- [ ] Tokens importados a Elementor
- [ ] Global styles creados (colores, typography, spacing)
- [ ] Plantillas base hechas (button, card, form)
- [ ] CSS variables testeadas en DevTools

### QA
- [ ] Visual pixel-perfect
- [ ] Responsive breakpoints (3+)
- [ ] Todos los estados de componentes
- [ ] Accesibilidad (contraste, semantic HTML)
- [ ] Cross-browser (Chrome, Firefox, Safari, Edge)
- [ ] Performance (scores ≥ 85)

### Documentación
- [ ] Tokens documented (naming convention, usage)
- [ ] Component mapping documented (Figma → Elementor)
- [ ] QA checklist compartido
- [ ] Runbook para updates futuros

---

## SECCIÓN 10: Recursos y referencias

### Documentación oficial
- Figma Code Connect: https://developers.figma.com/docs/code-connect/
- Figma MCP: https://developers.figma.com/docs/mcp/
- Elementor Design Tokens: https://elementor.com/help/how-elementors-theme-style-and-design-system-options-work-together/

### Plugins recomendados
- **Figma**: Export Variables (CSS, SCSS, Tailwind)
- **Figma**: CSS Variables Import/Export
- **WordPress**: Design Tokens Manager for Elementor
- **WordPress**: Fluid Design System for Elementor

### Comunidades
- Figma Community Slack: #design-systems
- Claude Discourse: discourse.anthropic.com
- WordPress.org Forums: Design System threads

---

## Conclusión

La integración Figma + Claude Code + WordPress es **viable hoy** para:
- ✅ Crear y mantener design systems basados en tokens
- ✅ Generar componentes rápidamente
- ✅ Sincronizar cambios de diseño a código
- ✅ Escalar documentación de diseño

Pero **no es 100% automatizado**:
- Requiere setup técnico (MCP, Code Connect)
- Cambios de design necesitan revisión manual
- Lógica compleja sigue siendo código custom
- QA sigue siendo manual

**El sweet spot**: usar Claude Code para extraer estructura + tokens, luego personalizar en Elementor. No esperes "one-click magic", pero sí espera ahorrar 50-70% del tiempo manual.

---

**Versión**: 1.0  
**Última actualización**: Enero 2026  
**Audiencia**: Equipos de dev/design en WordPress  
