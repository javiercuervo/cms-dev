# Guía Elementor: Página IA Generativa

## URL
`/inteligencia-artificial-generativa/`

## Diseño Base
**Fuente:** Figma Make (Enero 2026)
**Concepto:** Tech-forward - Futurista y tecnológico

---

## Paleta de Colores

| Variable CSS | Color | Hex | Uso |
|--------------|-------|-----|-----|
| `--tech-bg-primary` | Azul oscuro | `#0A1628` | Fondo principal |
| `--tech-bg-elevated` | Azul medio | `#0F1D2E` | Cards, blockquotes |
| `--tech-text-primary` | Blanco | `#FFFFFF` | Títulos |
| `--tech-text-secondary` | Blanco 80% | `rgba(255,255,255,0.8)` | Párrafos |
| `--tech-text-muted` | Blanco 60% | `rgba(255,255,255,0.6)` | Meta info |
| `--tech-accent-cyan` | Cyan | `#00D4FF` | H2, acentos, bordes |
| `--tech-accent-violet` | Violeta | `#8B5CF6` | H3, gradientes |
| `--tech-border` | Cyan 30% | `rgba(0,212,255,0.3)` | Bordes cards |
| `--tech-gradient` | Cyan→Violeta | `135deg` | Hero, CTAs |

---

## Estructura de Secciones

### 1. Hero Section (450px altura)
- **Fondo:** Gradiente cyan→violeta (135deg)
- **Patrón:** Grid tecnológico (líneas blancas 3%, 50px)
- **Badge:** Pill con icono cerebro + "IA GENERATIVA"
- **H1:** Título grande, blanco, Inter 64px
- **Meta:** Autor | Fecha | Tiempo lectura

### 2. Imagen Destacada
- **Borde:** 3px gradiente cyan→violeta
- **Border-radius:** 8px
- **Efecto:** Glow pulsante (animación 3s)
- **Imagen:** Ilustración Da Vinci con máquina

### 3. Secciones de Contenido
- **H2:** Inter, clamp(28-40px), cyan `#00D4FF`
- **Párrafos:** 18px, line-height 1.8, blanco 80%
- **Separador:** Línea gradiente cyan→violeta, 2px

### 4. Listas
**Bullets:**
- Bullet: cyan `#00D4FF`
- Texto: 18px, blanco 80%

**Numeradas:**
- Número: Círculo cyan con número blanco
- Tamaño círculo: 28px
- Font: Inter 700

### 5. Blockquote
- **Fondo:** `#0F1D2E`
- **Borde izq:** 4px cyan
- **Border-radius:** 0 8px 8px 0
- **Texto:** 20px, italic, blanco

### 6. Widget Herramientas
- **Fondo:** `#0F1D2E`
- **Borde:** 1px cyan 30%
- **H3:** Violeta `#8B5CF6`
- **Tags:** Pills con borde cyan, hover relleno cyan

### 7. Posts Relacionados
- **Layout:** 3 columnas
- **Cards:** Fondo `#0F1D2E` 80%, borde cyan 30%
- **Hover:** Borde cyan sólido, glow, translateY(-4px)

### 8. Newsletter CTA
- **Fondo:** Gradiente cyan→violeta
- **H2:** Blanco, Inter 32px
- **Input:** Blanco, rounded
- **Botón:** Blanco con texto cyan

---

## Widgets Elementor Recomendados

| Sección | Widget |
|---------|--------|
| Hero | Section con background gradient + Heading + Text |
| Badge | HTML personalizado o Icon Box |
| Imagen | Image con custom CSS para borde gradient |
| Contenido | Text Editor con estilos custom |
| Listas | Icon List (bullets) o Text Editor |
| Blockquote | Blockquote widget o HTML |
| Herramientas | Inner Section + Buttons/HTML |
| Relacionados | Posts Grid o Loop Grid |
| Newsletter | Form widget + custom styling |

---

## CSS Custom para Elementor

```css
/* Agregar a Elementor > Custom CSS o al tema */

/* Borde gradiente para imagen */
.ia-featured-image {
    border: 3px solid transparent;
    background:
        linear-gradient(#0A1628, #0A1628) padding-box,
        linear-gradient(135deg, #00D4FF, #8B5CF6) border-box;
    border-radius: 8px;
    animation: glowPulse 3s ease-in-out infinite;
}

@keyframes glowPulse {
    0%, 100% { box-shadow: 0 0 5px rgba(0, 212, 255, 0.3); }
    50% { box-shadow: 0 0 20px rgba(0, 212, 255, 0.5); }
}

/* Grid tecnológico */
.tech-grid-pattern {
    background-image:
        linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 50px 50px;
}
```

---

## Archivo de Referencia

```
staging19-backup/pages/inteligencia-artificial-generativa.php
```

---

## SEO

**Title:** Inteligencia Artificial Generativa | Proportione
**Meta:** Descubre qué es la IA Generativa, su impacto en las organizaciones y consejos para implementarla. Guía completa de Proportione.
**Schema:** Article / WebPage
