# Templates y Ejemplos: Figma → Claude Code → WordPress

## 1. Ejemplo de Tokens.json (DTCG format)

```json
{
  "$schema": "https://tokens.studio/schema.json",
  "$version": "1.0",
  "metadata": {
    "tokenSetOrder": ["primitive", "semantic"],
    "exportPath": "src/tokens/"
  },
  
  "primitive": {
    "color": {
      "gray": {
        "0": { "value": "#FFFFFF", "type": "color" },
        "50": { "value": "#F9FAFB", "type": "color" },
        "100": { "value": "#F3F4F6", "type": "color" },
        "900": { "value": "#111827", "type": "color" }
      },
      "blue": {
        "500": { "value": "#0052CC", "type": "color" },
        "600": { "value": "#0052BB", "type": "color" }
      }
    },
    "space": {
      "xs": { "value": "4px", "type": "sizing" },
      "sm": { "value": "8px", "type": "sizing" },
      "md": { "value": "16px", "type": "sizing" },
      "lg": { "value": "24px", "type": "sizing" },
      "xl": { "value": "32px", "type": "sizing" }
    },
    "font": {
      "size": {
        "xs": { "value": "12px", "type": "sizing" },
        "sm": { "value": "14px", "type": "sizing" },
        "md": { "value": "16px", "type": "sizing" },
        "lg": { "value": "20px", "type": "sizing" }
      },
      "weight": {
        "regular": { "value": "400", "type": "fontWeight" },
        "semibold": { "value": "600", "type": "fontWeight" },
        "bold": { "value": "700", "type": "fontWeight" }
      }
    },
    "radius": {
      "sm": { "value": "4px", "type": "borderRadius" },
      "md": { "value": "8px", "type": "borderRadius" },
      "lg": { "value": "12px", "type": "borderRadius" }
    }
  },

  "semantic": {
    "color": {
      "text": {
        "primary": { "value": "{primitive.color.gray.900}", "type": "color" },
        "secondary": { "value": "{primitive.color.gray.600}", "type": "color" },
        "disabled": { "value": "{primitive.color.gray.400}", "type": "color" }
      },
      "background": {
        "primary": { "value": "{primitive.color.white}", "type": "color" },
        "secondary": { "value": "{primitive.color.gray.50}", "type": "color" }
      },
      "interactive": {
        "primary": { "value": "{primitive.color.blue.500}", "type": "color" },
        "hover": { "value": "{primitive.color.blue.600}", "type": "color" }
      }
    },
    "component": {
      "button": {
        "padding": { "value": "{primitive.space.md}", "type": "sizing" },
        "gap": { "value": "{primitive.space.sm}", "type": "sizing" },
        "radius": { "value": "{primitive.radius.md}", "type": "borderRadius" }
      },
      "card": {
        "padding": { "value": "{primitive.space.lg}", "type": "sizing" },
        "gap": { "value": "{primitive.space.md}", "type": "sizing" },
        "radius": { "value": "{primitive.radius.lg}", "type": "borderRadius" }
      }
    }
  }
}
```

## 2. Ejemplo CSS Variables Output

```css
/* Generated from tokens.json - do not edit manually */

:root {
  /* Primitives */
  --color-gray-0: #FFFFFF;
  --color-gray-50: #F9FAFB;
  --color-gray-100: #F3F4F6;
  --color-gray-900: #111827;
  
  --color-blue-500: #0052CC;
  --color-blue-600: #0052BB;
  
  --space-xs: 4px;
  --space-sm: 8px;
  --space-md: 16px;
  --space-lg: 24px;
  --space-xl: 32px;
  
  --font-size-xs: 12px;
  --font-size-sm: 14px;
  --font-size-md: 16px;
  --font-size-lg: 20px;
  
  --font-weight-regular: 400;
  --font-weight-semibold: 600;
  --font-weight-bold: 700;
  
  --radius-sm: 4px;
  --radius-md: 8px;
  --radius-lg: 12px;
  
  /* Semantic */
  --color-text-primary: var(--color-gray-900);
  --color-text-secondary: var(--color-gray-600);
  --color-text-disabled: var(--color-gray-400);
  
  --color-background-primary: var(--color-white);
  --color-background-secondary: var(--color-gray-50);
  
  --color-interactive-primary: var(--color-blue-500);
  --color-interactive-hover: var(--color-blue-600);
  
  --component-button-padding: var(--space-md);
  --component-button-gap: var(--space-sm);
  --component-button-radius: var(--radius-md);
  
  --component-card-padding: var(--space-lg);
  --component-card-gap: var(--space-md);
  --component-card-radius: var(--radius-lg);
}

/* Dark mode (if applicable) */
@media (prefers-color-scheme: dark) {
  :root {
    --color-text-primary: var(--color-gray-50);
    --color-text-secondary: var(--color-gray-400);
    --color-background-primary: var(--color-gray-900);
    --color-background-secondary: var(--color-gray-800);
  }
}
```

## 3. Ejemplo de componente generado por Claude (HTML + CSS)

### Input Figma
```
Component: Button (primary variant)
├─ Auto Layout: horizontal, gap: 8px, padding: 12px 16px
├─ Colors: background #0052CC, text white
├─ Typography: 14px, 600 weight
├─ Border radius: 8px
└─ States: default, hover, active, disabled
```

### Output Claude Code

```html
<!-- button.html -->
<button class="button button--primary" type="button">
  <span class="button__label">Click me</span>
</button>

<style scoped>
.button {
  /* Layout */
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: var(--component-button-gap);
  
  /* Spacing */
  padding: var(--space-sm) var(--space-md);
  
  /* Typography */
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-semibold);
  line-height: 1.5;
  
  /* Appearance */
  border: none;
  border-radius: var(--component-button-radius);
  cursor: pointer;
  
  /* Transitions */
  transition: all 200ms ease-in-out;
}

.button--primary {
  background-color: var(--color-interactive-primary);
  color: var(--color-white);
}

.button--primary:hover {
  background-color: var(--color-interactive-hover);
}

.button--primary:active {
  transform: scale(0.98);
}

.button--primary:disabled {
  background-color: var(--color-gray-300);
  color: var(--color-text-disabled);
  cursor: not-allowed;
  opacity: 0.6;
}

.button__label {
  /* No extra styling needed */
}
</style>
```

### Mapeo a Elementor

```
Elementor Custom HTML Widget:
└─ Paste HTML above
└─ Custom CSS panel: Paste <style scoped>
└─ Result: Button renders con CSS variables globales
```

## 4. Prompt recomendado para Claude Code (copy-paste)

```
You are helping convert a Figma design to production WordPress code.

CONTEXT:
- Target: Elementor custom HTML/CSS widgets
- Framework: No React/Vue needed, just HTML + CSS
- Constraints: Use CSS custom properties (CSS variables) for ALL values
- Output: BEM-style class names, semantic HTML

TASK:
Read my Figma design file (via MCP selection) and:

1. **Extract Design Intent**: Analyze the layout, spacing, colors, typography
2. **Generate HTML**: Semantic structure, no inline styles, BEM classes
3. **Generate CSS**: 
   - Use CSS custom properties exclusively
   - Reference: var(--color-...), var(--space-...), var(--font-...)
   - Include hover/active/disabled/focus states
   - Responsive: mobile-first, breakpoints at 768px and 1200px
4. **List Variables Used**: Create a table of all CSS variables referenced
5. **Elementor Notes**: How to implement in Elementor (custom HTML widget + CSS panel)

OUTPUT FORMAT:
---
## Component: [name]

### HTML
[semantic HTML]

### CSS
[scoped CSS using variables]

### Variables Used
| Variable | Usage |
|----------|-------|
| var(--color-primary) | CTA backgrounds |

### Elementor Implementation
1. Custom HTML widget
2. Paste HTML above
3. Custom CSS panel: paste CSS
4. Result: [expected appearance]
---

Start with the current selection in my Figma file.
```

## 5. Elementor Global Settings template (JSON)

```json
{
  "elementor_site_kit": {
    "elementor_custom_colors": [
      {
        "id": "color-primary",
        "title": "Primary",
        "color": "#0052CC"
      },
      {
        "id": "color-text-primary",
        "title": "Text Primary",
        "color": "#111827"
      },
      {
        "id": "color-background",
        "title": "Background",
        "color": "#FFFFFF"
      }
    ],
    "elementor_custom_fonts": [
      {
        "id": "font-body",
        "title": "Body",
        "size": "16px",
        "weight": "400",
        "family": "Inter, sans-serif"
      },
      {
        "id": "font-heading",
        "title": "Heading",
        "size": "24px",
        "weight": "700",
        "family": "Inter, sans-serif"
      }
    ],
    "elementor_custom_sizes": [
      {
        "id": "space-xs",
        "title": "XS Spacing",
        "value": "4px"
      },
      {
        "id": "space-md",
        "title": "MD Spacing",
        "value": "16px"
      },
      {
        "id": "space-lg",
        "title": "LG Spacing",
        "value": "24px"
      }
    ]
  }
}
```

## 6. WP-CLI command workflow

```bash
#!/bin/bash
# sync-design-tokens.sh - Automated token sync from Figma to WordPress

set -e

echo "🎨 Figma Design System Sync"
echo "=========================="

# Step 1: Export from Figma (manual preview)
echo "1️⃣  Ensuring tokens.json exists..."
if [ ! -f "tokens.json" ]; then
  echo "❌ tokens.json not found. Export from Figma first."
  exit 1
fi

# Step 2: Generate CSS
echo "2️⃣  Generating CSS variables..."
npx node -e "
const tokens = require('./tokens.json');
const fs = require('fs');
// Generate CSS from tokens.json (simplified)
const css = ':root { /* Generated tokens */ }';
fs.writeFileSync('tokens.css', css);
"
echo "✅ tokens.css generated"

# Step 3: Backup current
echo "3️⃣  Backing up current Elementor settings..."
wp edtm export --file=backup-$(date +%Y%m%d-%H%M%S).json

# Step 4: Import new tokens
echo "4️⃣  Importing new tokens to WordPress..."
wp edtm import tokens.json --mode=merge

# Step 5: Clear cache
echo "5️⃣  Clearing cache..."
wp elementor flush --assets

echo ""
echo "✨ Sync complete!"
echo "Review Elementor Settings → Colors/Typography to verify"
```

## 7. QA Test Template (markdown)

```markdown
# QA Checklist: [Component Name] Design System Handoff

**Component**: Button Primary  
**Figma Link**: https://figma.com/...  
**WordPress URL**: https://staging.example.com/test-page/  

## Visual Accuracy
- [ ] Color matches Figma exactly (use color picker)
  - [ ] Default state: #0052CC
  - [ ] Hover state: #0052BB
  - [ ] Disabled state: #ccc with 60% opacity
- [ ] Padding/spacing: 12px top/bottom, 16px left/right
  - [ ] Icon + text gap: 8px
- [ ] Border radius: 8px
- [ ] Font size: 14px
- [ ] Font weight: 600
- [ ] Text color: white

## Responsive
- [ ] Mobile (320px): button scales, text readable
- [ ] Tablet (768px): layout correct
- [ ] Desktop (1200px): full width container respected

## States
- [ ] Default: shows colors above
- [ ] Hover: darker blue, slight shadow
- [ ] Active: same as hover + 0.98 scale
- [ ] Disabled: grayed, no hover effect
- [ ] Focus: visible outline (keyboard users)

## Accessibility
- [ ] Color contrast ≥ 4.5:1 (check with aXe)
- [ ] Minimum 44px touch target height
- [ ] Semantic HTML: <button> element
- [ ] Focus outline visible (outline: 2px)
- [ ] No text relying on color alone (icon + text)

## Performance
- [ ] CSS loads without FOUC (flash of unstyled content)
- [ ] No render-blocking resources
- [ ] Lighthouse score ≥ 85

## Cross-browser
- [ ] Chrome/Edge: ✓
- [ ] Firefox: ✓
- [ ] Safari: ✓
- [ ] Mobile Safari (iOS): ✓

## Sign-off
- [ ] Developer: ___________  Date: _____
- [ ] QA: ___________  Date: _____
- [ ] Design: ___________  Date: _____
```

---

## Cómo usar estos templates

1. **tokens.json**: Exporta de Figma (plugin o manual) → reemplaza valores con los tuyos
2. **CSS output**: Copia-pega a archivo `tokens.css` en tu proyecto
3. **Claude prompt**: Úsalo tal cual en terminal cuando ejecutes `claude`
4. **Elementor JSON**: Import con Design Tokens Manager plugin
5. **WP-CLI script**: Guarda como `sync-design-tokens.sh`, ejecuta con `bash sync-design-tokens.sh`
6. **QA template**: Copia para cada componente, comparte con equipo

---

**Nota**: Todos estos templates están diseñados para ser copy-paste ready y adaptables a tu contexto específico. Los valores de ejemplo deben reemplazarse con los de tu Figma file.
