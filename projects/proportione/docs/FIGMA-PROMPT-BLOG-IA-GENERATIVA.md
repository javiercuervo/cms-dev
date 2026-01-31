# Prompt para Figma: Plantilla Blog - IA Generativa

## Contexto del Proyecto

**Cliente:** Proportione - Consultora de Tecnología & Estrategia (Madrid)
**Objetivo:** Diseñar la plantilla de posts de blog para la categoría "IA Generativa"
**Concepto visual:** "Tech-forward" - Diseño futurista y tecnológico que transmite innovación
**URL de referencia:** https://staging19.proportione.com/inteligencia-artificial-generativa/

---

## Paleta de Colores

| Elemento | Color | Hex | Uso |
|----------|-------|-----|-----|
| **Fondo principal** | Azul oscuro profundo | `#0A1628` | Background general de toda la página |
| **Fondo secundario** | Azul oscuro medio | `#0F1D2E` | Cards, blockquotes, elementos elevados |
| **Texto principal** | Blanco | `#FFFFFF` | Títulos H1, texto destacado |
| **Texto secundario** | Blanco 80% | `rgba(255,255,255,0.8)` | Párrafos, contenido |
| **Texto muted** | Blanco 60% | `rgba(255,255,255,0.6)` | Meta info, fechas, autor |
| **Acento primario** | Cyan eléctrico | `#00D4FF` | H2, links, badges, bordes activos |
| **Acento secundario** | Violeta | `#8B5CF6` | H3, hover states, gradientes |
| **Gradiente hero** | Cyan → Violeta | `linear-gradient(135deg, #00D4FF, #8B5CF6)` | Hero section, botones, separadores |
| **Borde cards** | Cyan 30% | `rgba(0,212,255,0.3)` | Bordes sutiles de elementos |

---

## Tipografía

### Jerarquía de títulos
- **H1 (Título del post):** 48-96px, weight 700, line-height 1.05, letter-spacing -0.03em, color blanco
- **H2 (Secciones):** 32-48px, weight 600, line-height 1.15, color cyan `#00D4FF`
- **H3 (Subsecciones):** 24-32px, weight 600, line-height 1.25, color violeta `#8B5CF6`
- **H4 (Títulos menores):** 20-24px, weight 600, line-height 1.3, color blanco

### Cuerpo de texto
- **Párrafos:** 18px, line-height 1.8, color blanco 80%
- **Lead/Destacado:** 22px, line-height 1.7
- **Meta info:** 14px, color blanco 60%
- **Código:** JetBrains Mono o Fira Code, fondo `#0F1D2E`, color cyan

### Fuentes sugeridas
- **Headings:** Inter, Josefin Sans, o SF Pro Display (geométrica/moderna)
- **Body:** Raleway, Inter, o sistema sans-serif
- **Código:** JetBrains Mono, Fira Code

---

## Estructura de la Página

```
┌─────────────────────────────────────────────────────────────────┐
│  HERO SECTION                                                   │
│  ┌───────────────────────────────────────────────────────────┐  │
│  │  Fondo: Gradiente cyan→violeta (135deg)                   │  │
│  │  Patrón: Grid tecnológico sutil (líneas blancas 3%)       │  │
│  │                                                           │  │
│  │  [🧠 IA GENERATIVA] ← Badge categoría (pill gradiente)    │  │
│  │                                                           │  │
│  │  Inteligencia Artificial Generativa:                      │  │
│  │  La Nueva Frontera de la IA                               │  │
│  │  ↑ H1 blanco, máximo impacto                              │  │
│  │                                                           │  │
│  │  ○ Autor  ○ 15 Ene 2026  ○ 8 min lectura                 │  │
│  │  ↑ Meta info en blanco 60%                                │  │
│  └───────────────────────────────────────────────────────────┘  │
│  Altura: ~400-500px desktop, ~300px mobile                      │
└─────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────┐
│  CONTENIDO PRINCIPAL                                            │
│  Fondo: Azul oscuro #0A1628                                     │
│  Max-width: 800px centrado                                      │
│  Padding: 48-64px vertical                                      │
│                                                                 │
│  ┌───────────────────────────────────────────────────────────┐  │
│  │  IMAGEN DESTACADA                                         │  │
│  │  ┌─────────────────────────────────────────────────────┐  │  │
│  │  │                                                     │  │  │
│  │  │   [Ilustración da Vinci + IA]                       │  │  │
│  │  │                                                     │  │  │
│  │  │   Borde: gradiente cyan→violeta (3px)               │  │  │
│  │  │   Border-radius: 8px                                │  │  │
│  │  │   Efecto: Glow pulse sutil                          │  │  │
│  │  └─────────────────────────────────────────────────────┘  │  │
│  └───────────────────────────────────────────────────────────┘  │
│                                                                 │
│  ═══════════════════════════════════════════════════════════   │
│  ↑ Separador: línea gradiente cyan→violeta, 2px                 │
│                                                                 │
│  ## ¿Qué es la Inteligencia Artificial Generativa?              │
│  ↑ H2 en cyan #00D4FF                                           │
│                                                                 │
│  La GAI es un subcampo de la inteligencia artificial            │
│  enfocado en crear contenido diverso: texto, música,            │
│  diseños 3D...                                                  │
│  ↑ Párrafo en blanco 80%, line-height 1.8                       │
│                                                                 │
│  ┌─ BLOCKQUOTE ─────────────────────────────────────────────┐   │
│  │ ▌"La verdadera revolución no es la tecnología,           │   │
│  │ ▌ es cómo la usamos para amplificar                      │   │
│  │ ▌ la creatividad humana."                                │   │
│  │ ▌                                                        │   │
│  │ ▌ — Experto en IA                                        │   │
│  │                                                          │   │
│  │ Fondo: #0F1D2E (card-bg)                                 │   │
│  │ Borde izq: 4px cyan #00D4FF                              │   │
│  │ Border-radius: 0 8px 8px 0                               │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ### El Impacto de la GAI                                       │
│  ↑ H3 en violeta #8B5CF6                                        │
│                                                                 │
│  • Automatiza tareas administrativas                            │
│  • Libera profesionales para roles estratégicos                 │
│  • Escala operaciones empresariales                             │
│  ↑ Lista con bullets en cyan                                    │
│                                                                 │
│  ┌─ CÓDIGO ─────────────────────────────────────────────────┐   │
│  │ // Ejemplo de prompt                                     │   │
│  │ const prompt = "Genera un resumen...";                   │   │
│  │                                                          │   │
│  │ Fondo: #0F1D2E                                           │   │
│  │ Texto: cyan #00D4FF                                      │   │
│  │ Borde: 1px rgba(0,212,255,0.3)                           │   │
│  │ Font: JetBrains Mono                                     │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ┌─ TABLA ──────────────────────────────────────────────────┐   │
│  │ ┌──────────────┬──────────────┬──────────────┐           │   │
│  │ │ Modelo       │ Tipo         │ Uso          │ ← Header  │   │
│  │ │              │              │              │   gradiente│   │
│  │ ├──────────────┼──────────────┼──────────────┤           │   │
│  │ │ ChatGPT      │ Texto        │ Conversación │           │   │
│  │ │ Claude       │ Texto        │ Análisis     │           │   │
│  │ │ Midjourney   │ Imagen       │ Arte         │           │   │
│  │ └──────────────┴──────────────┴──────────────┘           │   │
│  │ Fondo: #0F1D2E, bordes cyan 30%                          │   │
│  └──────────────────────────────────────────────────────────┘   │
│                                                                 │
│  ## Conclusión                                                  │
│                                                                 │
│  [Párrafo final...]                                             │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────┐
│  MODELOS DE IA MENCIONADOS (Widget especial)                    │
│  Fondo: #0F1D2E (card-bg)                                       │
│  Borde: 1px rgba(0,212,255,0.3)                                 │
│  Border-radius: 12px                                            │
│  Padding: 24px                                                  │
│                                                                 │
│  Herramientas mencionadas en este artículo:                     │
│                                                                 │
│  [ChatGPT] [Claude] [Gemini] [Midjourney] [DALL-E]              │
│  ↑ Pills: fondo #0F1D2E, borde cyan, texto cyan                 │
│    Hover: fondo cyan, texto azul oscuro                         │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────┐
│  POSTS RELACIONADOS                                             │
│  Fondo: #0A1628                                                 │
│  Título: "Más sobre IA Generativa" en blanco                    │
│                                                                 │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐              │
│  │             │  │             │  │             │              │
│  │   [Imagen]  │  │   [Imagen]  │  │   [Imagen]  │              │
│  │             │  │             │  │             │              │
│  ├─────────────┤  ├─────────────┤  ├─────────────┤              │
│  │ IA GENERATI │  │ IA GENERATI │  │ IA GENERATI │              │
│  │             │  │             │  │             │              │
│  │ Título del  │  │ Título del  │  │ Título del  │              │
│  │ post...     │  │ post...     │  │ post...     │              │
│  │             │  │             │  │             │              │
│  │ 12 Ene 2026 │  │ 10 Ene 2026 │  │ 8 Ene 2026  │              │
│  └─────────────┘  └─────────────┘  └─────────────┘              │
│                                                                 │
│  Card: fondo #0F1D2E 80%, borde cyan 30%                        │
│  Border-radius: 12px                                            │
│  Hover: borde cyan sólido, sombra cyan, translateY(-4px)        │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────┐
│  CTA NEWSLETTER (Opcional)                                      │
│  Fondo: Gradiente cyan→violeta                                  │
│                                                                 │
│  Mantente al día con la IA                                      │
│  Recibe las últimas novedades en tu inbox                       │
│                                                                 │
│  [tu@email.com          ] [SUSCRIBIRSE →]                       │
│                                                                 │
│  Botón: fondo blanco, texto cyan                                │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

---

## Elementos Especiales

### 1. Patrón de Grid Tecnológico (Hero)
```css
background-image:
    linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
background-size: 50px 50px;
```
- Grid sutil de líneas blancas al 3% de opacidad
- Espaciado de 50px entre líneas
- Solo en la sección hero sobre el gradiente

### 2. Badge de Categoría
- Forma: Pill (border-radius: 20px)
- Fondo: Gradiente cyan→violeta
- Texto: Blanco, uppercase, 0.85rem, weight 600
- Icono opcional: 🧠 o chip/cerebro
- Padding: 0.4rem 1rem

### 3. Efecto Glow en Imagen
```css
animation: glowPulse 3s ease-in-out infinite;

@keyframes glowPulse {
    0%, 100% { box-shadow: 0 0 5px rgba(0,212,255,0.3); }
    50% { box-shadow: 0 0 20px rgba(0,212,255,0.5); }
}
```
- Animación sutil de brillo pulsante
- Color: cyan con opacidad variable

### 4. Borde Gradiente en Imagen
- Técnica: padding + background gradient
- Borde visible: 3px
- Gradiente: cyan→violeta (135deg)
- Border-radius: 8px exterior, 5px interior

### 5. Botones
- Fondo: Gradiente cyan→violeta
- Texto: Blanco
- Border-radius: 6px
- Hover: translateY(-2px), box-shadow cyan 40%
- Efecto shine: línea blanca que cruza de izq a der en hover

---

## Responsive

### Desktop (1200px+)
- Contenido max-width: 800px
- Hero height: 450-500px
- Grid posts: 3 columnas

### Tablet (768-1199px)
- Contenido max-width: 700px
- Hero height: 350-400px
- Grid posts: 2 columnas

### Mobile (< 768px)
- Contenido padding: 20px
- Hero height: 280-320px
- Grid posts: 1 columna
- Fuentes reducidas 10-15%

---

## Contenido Real del Post

**Título:** Inteligencia Artificial Generativa: La Nueva Frontera de la IA

**Secciones (H2):**
1. ¿Qué es la Inteligencia Artificial Generativa?
2. El Impacto de la GAI en los Trabajadores y las Organizaciones
3. Consejos para Navegar en el Mundo de la GAI
4. Conclusión

**Imágenes:**
- Hero: Ilustración estilo Leonardo da Vinci de una máquina generando datos
- Secundaria: Ilustración sepia de inventor con dispositivo mecánico

**Puntos clave del contenido:**
- GAI crea contenido diverso: texto, música, diseños 3D
- Automatiza tareas administrativas
- Libera profesionales para roles estratégicos
- Escalabilidad de operaciones
- Personalización de contenido masiva

---

## Archivos de Referencia

- CSS implementado: `/wp-content/themes/hello-elementor-child/blog-ia-generativa.css`
- Design System: `/wp-content/themes/hello-elementor-child/proportione-design-system.css`
- URL live: https://staging19.proportione.com/inteligencia-artificial-generativa/

---

## Entregables Esperados

1. **Artboard Desktop** (1440px width)
   - Hero section completa
   - Sección de contenido con todos los elementos
   - Posts relacionados
   - Footer opcional

2. **Artboard Tablet** (768px width)

3. **Artboard Mobile** (375px width)

4. **Componentes reutilizables:**
   - Badge categoría
   - Blockquote
   - Card post relacionado
   - Bloque de código
   - Tabla
   - Widget "Modelos mencionados"
   - Botón primario/secundario

---

## Notas Adicionales

- Mantener coherencia con la identidad de Proportione (granate #5F322F, verde #6E8157) en elementos del header/footer global
- El diseño debe sentirse "tecnológico y futurista" pero no frío - la marca Proportione valora el equilibrio entre tecnología y humanidad
- Los colores cyan y violeta son específicos para esta categoría (IA Generativa) - otras categorías tienen paletas diferentes
- Priorizar legibilidad del texto blanco sobre fondos oscuros (contraste WCAG AA mínimo)
