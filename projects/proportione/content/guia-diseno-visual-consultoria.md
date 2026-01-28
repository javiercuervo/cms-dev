# Guía de Patrones de Diseño Visual y Estructural en Consultoría Estratégica
## Para Entrenamiento de Sistemas Generadores de Contenido Web (Dimensión Visual)

---

## 1. PRINCIPIOS VISUALES DOMINANTES

### 1.1 Filosofía de Diseño General

**Principio Primario: Minimalismo Sofisticado**

- Ausencia de ornamento innecesario
- Máxima legibilidad y claridad como objetivo primario
- Espacios en blanco como elemento activo, no pasivo
- Restricción de elementos gráficos a aquellos que comunican valor
- Austeridad conceptual que comunica confianza institucional

**Características Operativas:**
- Máximo 2-3 colores principales en cualquier sección
- Líneas limpias, bordes definidos pero suaves
- Alineación rigorosa a un sistema de grillas
- Jerarquía visual clara mediante escala y peso tipográfico
- Ausencia de texturas decorativas (fondos patterned, efectos de ruido, etc.)

**Comparación Visual Implícita:**
- ✓ Minimalista: Espacio blanco generoso, tipografía grande y legible, una propuesta clara por sección
- ✓ Corporativo: Colores institucionales, diseño formal, profesionalidad sin frivolidad
- ✗ Moderna casual: Colores vibrantes, tipografía juguetona, efectos visuales complejos
- ✗ Maximalist: Demasiados elementos, jerarquía confusa, competencia entre elementos

---

### 1.2 Jerarquía Visual

**Niveles de Énfasis (de mayor a menor):**

**Nivel 1: Hero Section (Anclaje Visual Principal)**
- Tipografía de mayor tamaño (80-120px)
- Alto contraste (blanco sobre fondo oscuro o viceversa)
- Ocupación de pantalla: 40-60% del viewport inicial
- Frecuentemente con imagen de fondo subdued o gradiente
- Propósito: Crear "landing point" visual inmediato

**Nivel 2: Subheadings Principales**
- Tipografía: 32-48px
- Contraste medio-alto
- Ubicación: Inicio de secciones
- Propósito: Señalar transición entre temas, guiar lectura

**Nivel 3: Body Copy / Párrafo Regular**
- Tipografía: 14-16px
- Alto contraste (color oscuro sobre fondo claro)
- Peso: Regular (400)
- Espaciado línea: 1.6-1.8x altura de fuente
- Propósito: Legibilidad máxima para lectura sostenida

**Nivel 4: Elementos Secundarios**
- Etiquetas, metadatos, números, badges
- Tipografía: 12-14px
- Peso: Medium (500) o Regular (400)
- Color: Gris medio (no contraste máximo)
- Propósito: Información de apoyo, no focal

**Nivel 5: Elementos Terciarios**
- Descripciones breves, captions, footer
- Tipografía: 11-12px
- Peso: Regular (400)
- Color: Gris claro (bajo contraste)
- Propósito: Información de referencia

---

### 1.3 Uso del Espacio en Blanco (Negative Space)

**Principio: Espacio en Blanco como Sistema de Comunicación**

El espacio en blanco no es "area vacía" sino elemento de jerarquía visual activo.

**Aplicaciones Específicas:**

**Espaciado Vertical (Entre Secciones):**
- Separación entre secciones principales: 80-120px
- Separación entre elementos dentro de sección: 40-60px
- Separación entre párrafos: 24-32px
- Patrón: El espacio mayor = mayor importancia

**Espaciado Horizontal (Márgenes):**
- Desktop: 60-80px márgenes laterales mínimos
- Tablet: 40-60px márgenes laterales
- Mobile: 16-24px márgenes laterales
- Propósito: Enmarcar contenido, crear "breathing room"

**Espaciado Interno (Padding dentro de elementos):**
- Cards/boxes: 24-32px padding uniforme
- Botones: 12-16px vertical, 20-28px horizontal
- Propósito: Crear claridad visual interna

---

### 1.4 Contraste y Legibilidad

**Regla de Contraste WCAG AA Mínimo:**
- Body copy: Ratio 4.5:1 (texto pequeño)
- Headlines: Ratio 3:1 (texto grande)
- Iconos: Ratio 3:1

**Aplicación Práctica:**
- Texto sobre fondo blanco: Gris muy oscuro (#1F1F1F o negro puro)
- Texto sobre fondo gris claro: Gris oscuro (#2C2C2C)
- Texto sobre fondo de color: Blanco o gris muy claro
- Nunca: Gris medio sobre fondo blanco, luz sobre luz

**Patrones de Contraste Observados:**
- Primary text: Negro o gris muy oscuro (900-950)
- Secondary text: Gris oscuro (600-700)
- Tertiary text: Gris claro (400-500)
- Accent text: Color primario de marca (no gris)

---

## 2. PALETA CROMÁTICA

### 2.1 Estructura de Paleta

**Composición Típica:**

La paleta se organiza en 4 capas:

**Capa 1: Neutros (Blanco, Grises, Negro)**
- Blanco puro (#FFFFFF): Fondos, espacios vacíos
- Gris muy claro (#F5F5F5 - #F8F8F8): Fondos de secciones, separaciones suaves
- Gris claro (#E8E8E8 - #ECECEC): Bordes, divisiones
- Gris medio (#999999 - #AAAAAA): Texto secundario, iconos
- Gris oscuro (#333333 - #4A4A4A): Texto primario
- Negro puro (#000000): Texto máximo contraste, elementos críticos

**Capa 2: Color Primario (Marca/Acento)**
- Típicamente: Azul profesional, Verde teal, o Marino
- Propósito: CTAs, elementos focales, acciones
- Aplicación: Botones primarios, highlights, enlaces principales
- Restricción: Máximo en 5-10% del diseño visible
- Variaciones: Light (background), regular (element), dark (hover/active)

**Capa 3: Secundarios/Suplementarios (Opcional)**
- Raramente presentes en homepage
- Si presentes: Usados en grids de servicios o categorías
- Típicamente: Variaciones de color neutro o variantes del primario

**Capa 4: Fondos de Sección (Muy Sutiles)**
- Gris claro (0-2% de saturación): Para diferenciar secciones sin vivacidad
- O: Blanco puro con bordes sutiles
- Nunca colores saturados en grandes áreas
- Propósito: Ritmo visual sin distracción

---

### 2.2 Paleta Cromática Observada

**Perfil 1: Azul Corporativo (60% de sitios observados)**

| Uso | Color | Hex/RGB | Aplicación |
|-----|-------|---------|------------|
| Blanco base | Blanco puro | #FFFFFF | Fondos primarios |
| Gris muy claro | Gris 95 | #F2F2F2 | Fondos de sección |
| Gris claro | Gris 90 | #E5E5E5 | Bordes, divisiones |
| Gris medio | Gris 70 | #B2B2B2 | Texto secundario |
| Gris oscuro | Gris 35 | #595959 | Texto primario |
| Negro | Negro puro | #000000 | Acentos máximos |
| **Color primario** | **Azul profesional** | **#0055CC - #1E5BA8** | Botones, CTAs, links |
| Color hover | Azul más oscuro | #003D99 - #004B87 | Estados activos |
| Fondo alt | Azul muy claro | #F0F3FF | Fondos de cards especiales |

**Perfil 2: Verde/Teal Corporativo (30% de sitios observados)**

| Uso | Color | Hex/RGB | Aplicación |
|-----|-------|---------|------------|
| Blanco base | Blanco puro | #FFFFFF | Fondos primarios |
| Grises | Escala 100-400 | #F5F5F5 - #B3B3B3 | Escalera de grises |
| Color primario | Teal/Verde azulado | #00A087 - #009370 | CTAs, acciones |
| Color hover | Teal más oscuro | #006B5E | Estados activos |
| Fondo alt | Teal muy claro | #E6F5F2 | Fondos de secciones |

**Perfil 3: Gris + Accent Sutil (10% de sitios observados)**

| Uso | Color | Hex/RGB | Aplicación |
|-----|-------|---------|------------|
| Dominante | Escala de grises | #000000 - #F8F8F8 | 95% del sitio |
| Acento único | Subtle warm tone | #D4A574 (gold) o #C85A54 (rust) | Muy selectivo, máximo 2% |

---

### 2.3 Restricciones Cromáticas

**Lo Que NO Hacer:**

- ✗ Más de 2 colores saturados en una sección
- ✗ Fondos de colores saturados en áreas grandes (riesgo de fatiga visual)
- ✗ Colores vibrantes (neon, saturación 100%)
- ✗ Fondos pattern/textura (distraen de contenido)
- ✗ Gradientes complejos (máximo 2 colores en dirección lineal)
- ✗ Colores que afectan contraste de lectura

**Lo Que SÍ Hacer:**

- ✓ Monocromo (blanco/grises/negro) como base
- ✓ Un color de acento profesional, usado judiciosamente
- ✓ Variaciones sutiles del color primario para estados
- ✓ Fondos de color muy claro (10-20% saturación) para diferenciar secciones
- ✓ Colores completamente opacos, sin transparencias complejas (salvo en overlays)

---

### 2.4 Aplicación de Color en Elementos Clave

**Botones (CTA):**
- Estado normal: Color primario sólido
- Estado hover: Color primario más oscuro (10-15% más oscuro)
- Estado active: Color primario mucho más oscuro (20-30%)
- Estado disabled: Gris claro con texto gris medio
- Transición: Suave (200-300ms)

**Enlaces:**
- Color: Azul primario o color de acento
- Underline: Ninguno (o aparece solo en hover)
- Hover: Color más oscuro + underline
- Visited: Gris oscuro o purple muy oscuro

**Iconos:**
- Primarios: Gris oscuro (#333-#595959)
- Sobre fondos coloreados: Blanco o colores muy claros
- Acento: Color primario de marca
- Tamaños: 16-24px típicamente

**Badges/Tags:**
- Fondo: Gris muy claro (#F2F2F2) o color primario a 20% opacidad
- Texto: Gris oscuro o color primario
- Bordes: Opcional, gris claro o color primario a 50% opacidad

---

## 3. TIPOGRAFÍA

### 3.1 Sistema Tipográfico

**Principio: Tipografía Sans-Serif Moderna como Estándar**

Todas las fuentes observadas son sans-serif. No hay uso de serif en body copy.

**Estructura Típica:**

```
Fuente Primaria (Headlines + Body): Sans-serif moderno
├─ Requirimientos: Legible a todos los tamaños, múltiples pesos
├─ Pesos típicos: 400 (regular), 500 (medium), 600 (semibold), 700 (bold)
└─ Ejemplo: Inter, Helvetica Neue, Arial, -apple-system font stack

Fuente Secundaria (Código/Técnico): Monospace
├─ Cuando se usa: Raramente en sitios de consultoría
├─ Si presente: En secciones de casos o datos técnicos
└─ Ejemplo: Courier, Courier New, Monaco
```

**Fuentes Observadas (Por Frecuencia):**

| Fuente | Tipo | Prevalencia | Notas |
|--------|------|------------|-------|
| System font stack (-apple-system, Segoe UI, Helvetica) | Sans-serif | Muy alta | Rápido, moderno, universal |
| Inter | Sans-serif | Alta | Google Fonts, moderno, limpio |
| Proxima Nova | Sans-serif | Media | Fuente custom frecuente |
| Roboto | Sans-serif | Media | Google Fonts, versátil |
| Open Sans | Sans-serif | Media | Google Fonts, neutral |
| Gotham | Sans-serif | Baja | Fuente premium corporativa |
| Futura | Sans-serif | Baja | Clásico, menos frecuente |

---

### 3.2 Jerarquía Tipográfica

**Escala Típica (Desktop):**

| Elemento | Tamaño | Peso | Line-height | Ejemplo |
|----------|--------|------|-----------|---------|
| **H1 (Hero)** | 72-120px | 700 | 1.1-1.2 | Proposición principal |
| **H2 (Section title)** | 36-48px | 600 | 1.2-1.3 | Títulos de sección |
| **H3 (Subsection)** | 24-32px | 600 | 1.3-1.4 | Subtítulos |
| **H4 (Card title)** | 18-20px | 600 | 1.4-1.5 | Títulos menores |
| **Body (Párrafo)** | 14-16px | 400 | 1.5-1.7 | Texto principal |
| **Small (Meta)** | 12-14px | 500 | 1.4-1.6 | Fechas, etiquetas |
| **Tiny (Caption)** | 11-12px | 400 | 1.4 | Descripciones auxiliares |

**Aplicación en Contextos Específicos:**

**Proposición Hero:**
- Tamaño: 80-120px
- Peso: 700 (Bold)
- Line-height: 1.1 (muy comprimido para densidad)
- Color: Negro o muy oscuro
- Propósito: Máximo impacto visual

**Descripción de Sección:**
- Tamaño: 36-44px
- Peso: 600 (Semibold)
- Line-height: 1.2
- Color: Negro o gris oscuro
- Propósito: Claridad, legibilidad

**Body Copy:**
- Tamaño: 14-16px
- Peso: 400 (Regular)
- Line-height: 1.6-1.8
- Color: Gris oscuro (#333-#595959)
- Propósito: Lectura confortable prolongada

**Metadatos/Etiquetas:**
- Tamaño: 12-13px
- Peso: 500 (Medium) o 600 (Semibold)
- Line-height: 1.4
- Color: Gris medio (#999-#BBB)
- Propósito: Información secundaria, no focal

---

### 3.3 Propiedades Tipográficas Avanzadas

**Letter-spacing (Espaciado de Letras):**
- Títulos grandes: 0 a -0.02em (ligeramente comprimido)
- Headlines: 0 (neutro)
- Body copy: 0 (neutro)
- Mayúsculas pequeñas: +0.05 a +0.1em (expandido)
- Propósito: Las letras grandes se ven "sueltas", requieren compresión leve

**Line-height (Alto de Línea):**
- Proporciona: 1.5-1.7x altura de fuente
- Body copy: 1.6x (recomendación WCAG)
- Propósito: Legibilidad, permitir lectura sin "saltos"
- Riesgo: Si es muy alto, pierde cohesión; si es muy bajo, fatiga ocular

**Font Smoothing:**
- `-webkit-font-smoothing: antialiased` (típicamente aplicado)
- Propósito: Renderizado más definido en macOS/webkit

**Text Rendering:**
- `text-rendering: optimizeLegibility` (a veces usado)
- Propósito: Mejora kerning, pero puede ralentizar en texto muy grande
- Uso selectivo en títulos

---

## 4. ESTRUCTURA DE PÁGINAS TIPO

### 4.1 Estructura de Homepage

**Arquitectura Visual Canónica:**

```
┌─────────────────────────────────────────┐
│         NAVIGATION BAR (Sticky)         │
│  (Logo + Menu + CTA) Height: 60-80px    │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│                                         │
│         HERO SECTION                    │
│   (Proposición + Imagen/Gradiente)      │
│   Height: 500-700px                     │
│                                         │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│                                         │
│   FEATURED CONTENT (2-4 items)          │
│   Grid o Carousel                       │
│   Height: 400-600px                     │
│                                         │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│                                         │
│   SERVICES GRID (9-16 items)            │
│   3-4 columnas, cards uniformes         │
│   Height: 600-900px                     │
│                                         │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│                                         │
│   INDUSTRIES GRID                       │
│   Similar a servicios, 15-30 items      │
│   Height: 500-800px                     │
│                                         │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│                                         │
│   SOCIAL PROOF / METRICS                │
│   Números grandes + contexto            │
│   Height: 300-400px                     │
│                                         │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│                                         │
│   ADDITIONAL CONTENT                    │
│   (Podcasts, Careers, Programs)         │
│   Height: 400-600px                     │
│                                         │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│         FOOTER                          │
│   (Links, Newsletter, Social, Legal)    │
│   Height: 300-400px                     │
│                                         │
└─────────────────────────────────────────┘
```

**Alturas Totales:**
- Desktop completo: 4000-6000px (scrollable)
- Distintas secciones: Visibles sin scroll adicional
- Propósito: Múltiples "landing points" sin necesidad de scroll

---

### 4.2 Página de Servicio Tipo

**Arquitectura Visual:**

```
┌─────────────────────────────────────────┐
│   HERO: Nombre de Servicio              │
│   Fondo: Color claro o gradiente sutil  │
│   Height: 300-400px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   PROPOSICIÓN (1-2 líneas)              │
│   Tipografía: 24-32px, Bold             │
│   Padding generoso                      │
│   Height: 150-200px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   BODY COPY (2-3 párrafos)              │
│   Tipografía: 16px, Regular             │
│   Line-height: 1.7                      │
│   Width máximo: 800px                   │
│   Height: 300-500px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   BENEFICIOS (4-6 items)                │
│   Formato: Bullets o mini-cards         │
│   2 columnas típicamente                │
│   Height: 300-400px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   CASOS DE ÉXITO (2-3 items)            │
│   Grid o cards con imágenes             │
│   Height: 400-600px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   CONTENIDO RELACIONADO (3-6 items)     │
│   Mini-grid de artículos                │
│   Height: 300-500px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   CTA FINAL ("Contact us")              │
│   Altura: 150-200px                     │
│   Prominencia alta                      │
└─────────────────────────────────────────┘
```

---

### 4.3 Artículo/Blog Tipo

**Estructura:**

```
┌─────────────────────────────────────────┐
│   HEADER ARTÍCULO                       │
│   Título + Metadata (fecha, autor)      │
│   Imagen de header (opcional)           │
│   Height: 300-500px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   BODY ARTÍCULO                         │
│   Contenido en columna única            │
│   Max-width: 700-750px                  │
│   Párrafos + subencabezados             │
│   Height: Variable (2000-5000px)        │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   SIDEBAR (Opcional, típicamente a      │
│   derecha o desaparece en mobile)       │
│   Enlaces relacionados                  │
│   Newsletter signup                     │
│   Height: 400-800px                     │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│   ARTÍCULOS RELACIONADOS                │
│   Mini-grid de 3-4 artículos            │
│   Height: 400-600px                     │
└─────────────────────────────────────────┘
```

---

## 5. GRID Y COMPOSICIÓN

### 5.1 Sistema de Grillas

**Principio: Grilla de 12 Columnas como Estándar**

```
Desktop (1200px+):
├─ 12 columnas
├─ Gutter: 24-32px entre columnas
├─ Márgenes: 60-80px a cada lado
└─ Ancho contenido: ~1140px

Tablet (768-1199px):
├─ 8-10 columnas
├─ Gutter: 20-24px
├─ Márgenes: 40-60px
└─ Ancho contenido: ~700px

Mobile (320-767px):
├─ 4 columnas (o full-width)
├─ Gutter: 16px
├─ Márgenes: 16-24px
└─ Ancho contenido: full-width - márgenes
```

**Aplicación Práctica:**

**Para Cards en Grid de Servicios:**
- Desktop: 3-4 columnas (cada card = 3-4 columnas de 12)
- Tablet: 2 columnas
- Mobile: 1 columna (full-width)
- Espaciado: Mínimo gutter entre cards

**Para Contenido Principal (Body Copy):**
- Desktop: Ancho máximo 800px, centrado o con sidebar
- Tablet: Ancho completo menos márgenes (40-60px)
- Mobile: Ancho completo menos márgenes (16-24px)

---

### 5.2 Proporciones y Ratios

**Proporción Áurea / Ratios Comunes:**

| Elemento | Ratio | Aplicación | Ejemplo |
|----------|-------|-----------|---------|
| **Hero Image** | 16:9 | Imágenes full-width, videos | 1200x675px |
| **Card Image** | 4:3 | Imágenes en cards de servicio | 400x300px |
| **Caso de Éxito** | 3:2 | Imágenes de casos | 600x400px |
| **Avatar/Logo** | 1:1 | Iconos, avatares de personas | 80x80px |
| **Banner Ancho** | 2:1 | Banners promocionales | 1200x600px |

**Espacios Verticales (Padding/Margin):**

```
Escala de espaciado estándar:
├─ xs: 8px
├─ sm: 16px
├─ md: 24px
├─ lg: 32px
├─ xl: 48px
├─ 2xl: 64px
└─ 3xl: 80px

Aplicación:
- Entre items en lista: sm-md
- Entre párrafos: md
- Entre secciones: xl-2xl
- Padding interno de cards: md-lg
```

---

### 5.3 Densidad de Información

**Regla de Densidad Visual:**

**Secciones Hero:**
- Mucho espacio en blanco
- Máximo 1-2 elementos focales
- Ratios de ocupación: 30-40% contenido, 60-70% espacio

**Secciones de Contenido Medio:**
- Espacio generoso pero eficiente
- Múltiples elementos con separación clara
- Ratios: 50-60% contenido, 40-50% espacio

**Secciones de Grids (Servicios/Industrias):**
- Densidad más alta pero nunca aglomerada
- Cards uniformes con espacio consistente
- Ratios: 70-80% contenido, 20-30% espacio (gutter)

**Secciones de Listados:**
- Líneas legibles de máximo 80-100 caracteres
- Separación vertical entre items: mínimo 20px
- Nunca dos items tocándose

---

## 6. ICONOGRAFÍA E ILUSTRACIONES

### 6.1 Principios de Iconografía

**Estilo: Línea Simple o Relleno Plano (Icon Strokes o Solid Icons)**

**Características Observadas:**

- Tamaño mínimo: 24x24px
- Tamaño máximo: 48-64px en contextos especiales
- Peso de línea: 1.5-2px (si es stroke)
- Radios de esquinas: Ligeramente redondeados (2-4px)
- Color: Monocromo (gris oscuro o color primario)

**Estilos Típicos:**

| Estilo | Uso | Prevalencia | Notas |
|--------|-----|------------|-------|
| **Línea/Stroke** | Iconos pequeños, acciones | Media-alta | Limpio, adaptable |
| **Relleno/Solid** | Iconos grandes, señalización | Media | Legible a distancia |
| **Outline** | Estados, asociaciones | Baja | Raro en consultoría |
| **Custom SVG** | Excepcional, muy específico | Muy baja | Raramente usado |

**Colores de Iconos:**

```
Contexto primario: Gris oscuro (#333-#595959)
├─ Iconos informativos
├─ Iconos de navegación
└─ Iconos decorativos

Contexto de acción: Color primario de marca
├─ CTAs (botones)
├─ Enlaces activos
└─ Estados hovering

Contexto desactivado: Gris claro (#CCCCCC-#E0E0E0)
├─ Estados disabled
├─ Opciones unavailable
└─ Elementos secundarios
```

---

### 6.2 Uso de Ilustraciones

**Prevalencia: Muy Baja en Secciones Principales**

**Observaciones:**

- 70-80% de sitios NO usan ilustraciones
- Cuando se usan: Raramente, en secciones específicas
- Alternativa: Fotografía corporativa (personas, oficinas, eventos)

**Cuando Sí se Usan Ilustraciones:**

1. **Secciones de Propósito/Diferenciación**
   - Ilustraciones abstractas, tonales, monocromas
   - Estilo: Minimalista, geométrico
   - Propósito: Humanizar, diferenciarse

2. **Gráficos de Datos**
   - Charts, diagramas de flujo
   - Estilo: Limpio, monolíneo
   - Propósito: Explicar conceptos

3. **Iconografía Customizada**
   - Iconos propios, no stock icons
   - Raro, pero incrementa diferenciación
   - Propósito: Identidad visual única

**Lo Que NO Hacer:**

- ✗ Ilustraciones fotorrealistas o de estilo cómic
- ✗ Muchos colores en ilustraciones (máximo 2-3 colores)
- ✗ Fotografías de personas en poses artificiosas (stock photos obvias)
- ✗ Decoraciones innecesarias (patrones, texturas)

**Lo Que SÍ Hacer:**

- ✓ Fotografía corporativa auténtica (personas en contexto real)
- ✓ Imágenes de eventos, equipos, oficinas
- ✓ Gráficos de datos limpios y legibles
- ✓ Ilustraciones tonales (monocromas o máximo 3 colores)
- ✓ Íconos vectoriales simples

---

## 7. NAVEGACIÓN Y MICROINTERACCIONES

### 7.1 Estructura de Navegación

**Patrón de Header (Top Navigation):**

```
┌─────────────────────────────────────────────┐
│ Logo | Link1 | Link2 | Link3 | Dropdown | CTA │
│ (Left: Logo)           (Right: CTA Button)   │
└─────────────────────────────────────────────┘

Dimensiones:
├─ Altura: 60-80px
├─ Logo: Ancho ~140-180px, altura auto-scaled
├─ Links: Font size 14-16px, weight 400-500
├─ CTA Button: Prominente, color primario
├─ Sticky: Sí (permanece en top al scroll)
└─ Propósito: Navegación primaria + acciones clave
```

**Comportamiento:**

- **Estado Normal:** Color texto gris oscuro, hover => color primario
- **Estado Activo:** Color primario, posiblemente underline
- **Dropdown:** Al hover, expande menú vertical
  - Fondo: Blanco o muy claro
  - Sombra: Suave (2-4px offset)
  - Items: Alineados a izquierda, padding uniforme
  - Animación: Fade in smooth (150-200ms)

---

### 7.2 Microinteracciones Observadas

**Transiciones Globales:**

| Interacción | Duración | Easing | Propósito |
|-------------|----------|--------|-----------|
| **Hover botón** | 150-200ms | ease-in-out | Feedback visual suave |
| **Hover link** | 150ms | ease-in | Rápido, reactivo |
| **Click estado** | 100ms | ease | Feedback inmediato |
| **Scroll revelación** | 300ms | ease-out | Entrada de elementos |
| **Modal apertura** | 250-300ms | ease-out | Suave, no abrupto |
| **Fade entre páginas** | 200-300ms | fade | Transición clara |

**Hover States (Buttons):**

```
Normal:
├─ Background: Color primario (#0055CC)
├─ Text: Blanco
├─ Cursor: pointer
└─ Shadow: Ninguna o muy suave

Hover:
├─ Background: Color primario más oscuro (#003D99)
├─ Text: Blanco
├─ Shadow: Suave (0 4px 8px rgba(0,0,0,0.1))
├─ Transform: Ligeramente arriba (translateY -1 a -2px) (OPCIONAL)
└─ Transición: 150-200ms ease-in-out

Active:
├─ Background: Mismo que hover
├─ Outline: 2-3px de color con opacity (focus ring)
└─ Transición: 100ms ease
```

**Hover States (Links):**

```
Normal:
├─ Color: Azul primario (#0055CC)
├─ Underline: Ninguno
└─ Cursor: pointer

Hover:
├─ Color: Azul más oscuro (#003D99)
├─ Underline: Suave (1-2px)
├─ Transición: 150ms ease
└─ Transform: Ninguno

Focus:
├─ Outline: Ring de color primario (2px)
├─ Outline-offset: 2px
└─ Visible: Siempre (accesibilidad)
```

---

### 7.3 Scroll Behavior y Lazy Loading

**Comportamiento en Scroll:**

**Parallax (Muy Raramente Usado):**
- Observado en <5% de sitios
- Si presente: Muy sutil (velocidad 0.5x, no 0.1x)
- Propósito: Efecto visual, no distracción

**Reveal on Scroll (Más Común):**
- Elementos se revelan con fade-in suave
- Duración: 600-800ms
- Timing: Al entrar 20-30% en viewport
- Observación: Aplicado a cards, imágenes, bloques de texto
- Propósito: Mantener engagement al scroll

**Sticky Elements:**
- Navigation: Siempre sticky
- CTAs flotantes: Ocasionalmente (mobile)
- Sidebar: A veces sticky en desktop

**Lazy Loading:**
- Imágenes: Loaded on demand o on intersection observer
- Propósito: Performance
- Placeholder: Color de fondo suave o imagen borrosa

---

### 7.4 Estados de Foco y Accesibilidad

**Focus Ring (Siempre Presente para Accesibilidad):**

```
Patrón WCAG:
├─ Outline: 2-3px sólido
├─ Color: Contraste mínimo 3:1 con fondo
├─ Offset: 2-4px desde borde
└─ Visible: Siempre, no removible con :focus-visible

Implementación típica:
├─ button:focus-visible { outline: 3px solid #0055CC; }
├─ outline-offset: 2px;
└─ Ningún reset de outline (no hacer outline: none)
```

**Error States:**

```
Campos de formulario en error:
├─ Border: 2px color rojo/error (#DC3545 o similar)
├─ Mensaje: Texto rojo, abajo del campo, font-size 12px
├─ Icono: X o ! en rojo, adyacente
└─ Transición: Suave, sin parpadeo
```

---

## 8. COMPONENTES Y PATRONES VISUALES

### 8.1 Cards (Componente Básico)

**Estructura Típica:**

```
┌────────────────────────────────┐
│       [Imagen 4:3]             │  ← Opcional
│                                │
├────────────────────────────────┤
│  Título (18-20px, Bold)        │  ← Siempre
│                                │
│  Descripción breve             │  ← 2-3 líneas máximo
│  (14px, Regular, Gris 600)     │
│                                │
│  Metadata (12px, Gris 500)     │  ← Fecha, tipo, etc.
│                                │
│  [Link/CTA]                    │  ← "Learn more" o "Read"
│                                │
└────────────────────────────────┘

Padding interno: 24px (todos los lados)
Borde: 1px gris muy claro (#E5E5E5)
Sombra: 0 2px 4px rgba(0,0,0,0.05) (muy suave)
Hover: Sombra se aumenta a 0 4px 12px rgba(0,0,0,0.1)
Transición: 200ms ease
```

---

### 8.2 Botones (Variantes)

**Tipo Primary (CTA Principal):**

```
Dimensiones: 48-52px altura, padding 16-20px horizontal
Fondo: Color primario (#0055CC)
Texto: Blanco, 14-16px, semibold
Borde: Ninguno
Bordes redondeados: 4-6px
Hover: Fondo más oscuro + sombra suave
Activo: Fondo aún más oscuro + outline focus
```

**Tipo Secondary (CTA Secundaria):**

```
Dimensiones: 48px altura, padding 16-20px
Fondo: Gris muy claro (#F2F2F2)
Texto: Gris oscuro (#333), 14-16px, semibold
Borde: Ninguno
Hover: Fondo más oscuro (#E5E5E5) sin sombra
```

**Tipo Outline/Ghost:**

```
Dimensiones: 48px altura, padding 16-20px
Fondo: Transparente
Texto: Color primario (#0055CC)
Borde: 1-2px color primario
Hover: Fondo color primario a 10% opacidad
```

**Tipo Link (Menos Prominente):**

```
No padding específico (tamaño natural del texto)
Fondo: Ninguno
Texto: Color primario (#0055CC), 14px, regular
Underline: Ninguno (o aparece en hover)
Hover: Color más oscuro + underline
```

---

### 8.3 Formularios

**Campos de Entrada:**

```
Alto: 40-48px
Padding: 12px horizontal, 8-10px vertical
Borde: 1-2px gris claro (#CCCCCC o #E0E0E0)
Borde-radius: 4-6px
Tipografía: 14-16px, regular
Fondo: Blanco puro
Focus: Borde color primario (2px), outline-offset 2px

Placeholder:
├─ Color: Gris medio (#999-#BBB)
├─ Font-style: Normal (no italic)
└─ Opacidad: Normal
```

**Etiquetas (Labels):**

```
Font-size: 12-14px
Font-weight: 500-600
Color: Gris oscuro (#333-#595959)
Margen-bottom: 8px
Display: block (en línea propia)
```

**Textarea:**

```
Min-height: 120-150px
Mismas reglas que input para borde/padding
Resize: Vertical solo
Font-family: Monospace (si código) o sans-serif (si comentarios)
```

---

## 9. COMPORTAMIENTO EN RESPONSIVE (Mobile-First)

### 9.1 Breakpoints Estándar

```
Mobile (xs): 320px - 640px
├─ 1 columna en grids
├─ Fuente body: 14-15px
├─ Márgenes: 16-20px
└─ Navegación: Hamburger menu (no visible en top)

Tablet (sm): 641px - 1024px
├─ 2 columnas en grids
├─ Fuente body: 15px
├─ Márgenes: 24-32px
└─ Navegación: Parcialmente visible o responsive

Desktop (md): 1025px - 1200px
├─ 3 columnas en grids
├─ Fuente body: 16px
├─ Márgenes: 40-60px
└─ Navegación: Completa visible

Large Desktop (lg): 1201px+
├─ 3-4 columnas en grids
├─ Fuente body: 16px
├─ Márgenes: 60-80px
└─ Max-width container: 1200-1400px
```

---

### 9.2 Adaptaciones en Mobile

**Navegación:**
- Header: Altura reducida a 56-60px
- Logo: Más pequeño, escalado proporcionalmente
- Menu: Hamburger (3 líneas), abre drawer o modal
- CTA button: Ocupa menos espacio o desaparece del header

**Tipografía:**
- H1 Hero: 48-56px (desde 80-120px)
- H2: 24-28px (desde 36-48px)
- Body: 14-15px (desde 16px)
- Small: 12px (desde 12-14px)

**Espaciado:**
- Secciones: Reducción de 30-40% en vertical
- Padding cards: 16px (desde 24px)
- Márgenes: 16px (desde 60-80px)

**Grids:**
- Servicios: 1 columna en mobile xs, 2 en sm
- Casos: 1 columna en mobile
- Content: Full-width menos márgenes

---

## 10. IMÁGENES Y MEDIA

### 10.1 Estrategia de Imágenes

**Tipología de Imágenes Usadas:**

| Tipo | Uso | Tamaño Típico | Formato | Propósito |
|------|-----|---------------|---------|-----------|
| **Hero Background** | Sección hero | 1920x1080+ | JPG, WebP | Impacto visual |
| **Case Study** | Casos de éxito | 600x400 | JPG, PNG | Documentación |
| **Service Thumbnail** | Grids de servicios | 400x300 | JPG, PNG | Previsualizacio |
| **Logo Cliente** | Social proof | 200x200 | PNG, SVG | Credibilidad |
| **Persona/Equipo** | Staff photos | 300x400 | JPG | Humanización |
| **Diagrama/Chart** | Datos visuales | Variable | PNG, SVG | Explicación |

**Optimización:**

- Formato moderno: WebP preferido, JPG fallback
- Sizes responsive: Diferentes resoluciones para cada breakpoint
- Lazy loading: Images loaded on demand
- Compresión: Visible quality sin exceso de tamaño

---

### 10.2 Fondos y Overlays

**Fondos de Secciones:**

- Blanco puro (#FFFFFF): 70-80% de secciones
- Gris muy claro (#F5F5F5 - #F8F8F8): 15-20%
- Imagen background: <5% (hero section típicamente)
- Color saturado: <1% (raro, solo accent)

**Overlays sobre Imágenes:**

```
Patrón típico: Gradiente oscuro suave
├─ Color 1: Negro a 0% opacidad (arriba)
├─ Color 2: Negro a 40-60% opacidad (abajo)
└─ Propósito: Garantizar legibilidad de texto sobre imagen

Implementación:
├─ background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.5) 100%)
└─ Nunca más oscuro que 50% opacidad (mantiene imagen visible)
```

---

## 11. ANIMACIONES Y MOVIMIENTO

### 11.1 Principios de Movimiento

**Filosofía: Minimalista, Funcional, No Decorativo**

- La mayoría de sitios: Mínimas o casi nulas animaciones
- Cuando presentes: Suave, propósito claro
- Duración: 200-400ms típicamente
- Easing: ease-in-out, ease-out (no linear)

**Animaciones Observadas:**

| Animación | Duración | Easing | Contexto |
|-----------|----------|--------|----------|
| Hover button | 150-200ms | ease-in-out | Feedback usuario |
| Hover link | 100-150ms | ease-in | Respuesta rápida |
| Fade in (scroll) | 600ms | ease-out | Entrada de elementos |
| Modal open | 250ms | ease-out | Diálogo |
| Dropdown | 150ms | ease | Menús |
| Loading spinner | 1000ms | linear | Indicador proceso |

---

### 11.2 Lo Que NO Hacer

- ✗ Animaciones infinitas o loops complejos
- ✗ Parallax agresivo o que afecte scroll performance
- ✗ Transiciones mayores a 500ms (siente lento)
- ✗ Animaciones que impidan lectura o interacción
- ✗ Efectos de distorsión, blur excesivo, transformaciones complejas

**Lo Que SÍ Hacer:**

- ✓ Feedback en interacciones (hover, click)
- ✓ Transiciones suaves entre estados
- ✓ Reveal on scroll suave y sutil
- ✓ Animaciones que mejoren claridad (no que la oscurezcan)

---

## 12. SOMBRAS Y PROFUNDIDAD

### 12.1 Sistema de Sombras

**Principio: Minimalista, Únicas o Muy Sutiles**

```
Sombra Nivel 0 (Ninguna):
└─ Usado en: Fondos base, elementos planos

Sombra Nivel 1 (Muy Suave):
├─ box-shadow: 0 1px 2px rgba(0,0,0,0.04)
└─ Uso: Botones primarios, cards, líneas divisoras sutiles

Sombra Nivel 2 (Suave):
├─ box-shadow: 0 2px 4px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04)
└─ Uso: Cards, elementos que necesitan separación visual

Sombra Nivel 3 (Moderada):
├─ box-shadow: 0 4px 8px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.04)
└─ Uso: Modales, dropdowns, elementos en hover

Sombra Nivel 4 (Fuerte):
├─ box-shadow: 0 8px 16px rgba(0,0,0,0.1), 0 4px 8px rgba(0,0,0,0.06)
└─ Uso: Modales principales, overlays

Nunca:
├─ Box-shadow con colores (siempre negro semitransparente)
├─ Offset vertical mayor a 8px
└─ Blur radius mayor a 16px
```

**Profundidad Sin Sombra:**

- Bordes: 1px gris claro como alternativa
- Separación: Espacios en blanco (gap/margin)
- Color: Fondos diferentes (blanco vs gris muy claro)
- Propósito: Minimalismo, no necesariamente necesita sombra

---

## 13. PATRONES DE DISEÑO POR SECCIÓN

### 13.1 Hero Section

**Composición Visual:**

```
Layout:
├─ Lado izquierdo: Texto (50-60% ancho)
├─ Lado derecho: Imagen o gradiente (40-50% ancho)
└─ Alineación: Verticalmente centrado

Tipografía:
├─ H1: 80-120px, Bold, línea-height 1.1
├─ Subtítulo: 18-24px, Regular, línea-height 1.4
└─ Color: Blanco sobre fondo oscuro o negro sobre blanco

Fondo:
├─ Opción 1: Color sólido (blanco o gris muy claro)
├─ Opción 2: Gradiente suave (2 colores)
├─ Opción 3: Imagen con overlay oscuro
└─ Altura: 500-700px

Espaciado:
├─ Padding: 60-100px superior/inferior
├─ Márgenes: 80-100px a lados
└─ CTA Button: Presente, prominente
```

---

### 13.2 Grid de Servicios

**Estructura:**

```
Columnas: 3 en desktop, 2 en tablet, 1 en mobile
Gutter: 24-32px
Card tamaño: Uniforme, cuadrado o 4:3

Dentro de cada card:
├─ Título: 18-20px, semibold, 2-3 palabras
├─ Descripción: 14px, 2-3 líneas, gris 600
├─ CTA: "Learn more" link o arrow icon
└─ Altura: ~250-300px

Espaciado entre filas: 24-32px (igual a gutter)

Hover:
├─ Sombra: Aumenta de nivel 1 a nivel 2
├─ Background: Leve cambio (gris 50 o 100)
├─ Transición: 200ms ease
└─ Cursor: pointer
```

---

### 13.3 Social Proof / Métricas

**Estructura:**

```
Layout: Grid o flex horizontal
├─ 3-4 items principales
├─ Cada item: Número grande + descripción
└─ Separación: 40-60px entre items

Tipografía:
├─ Número: 48-72px, bold, color primario
├─ Etiqueta: 14-16px, regular, gris 600
└─ Altura línea: 1.2-1.3

Fondo: Blanco puro o gris muy claro

Propósito: Rápido scan visual, impacto
```

---

## 14. ACCESIBILIDAD VISUAL

### 14.1 Contraste

**WCAG AA Mínimo (Recomendado):**

- Body copy: 4.5:1 ratio
- Headlines: 3:1 ratio
- UI components: 3:1 ratio

**Herramientas de Verificación:**

- WebAIM Contrast Checker
- Color.review
- Chrome DevTools Lighthouse

**Aplicación Práctica:**

- Negro puro (#000000) sobre blanco: 21:1 (excelente)
- Gris #666666 sobre blanco: 4.8:1 (WCAG AA)
- Gris #999999 sobre blanco: 2.3:1 (insuficiente, evitar para body)

---

### 14.2 Tamaño Mínimo de Texto

- Body copy: Mínimo 14px (recomendado 16px)
- Labels: Mínimo 12px
- Captions: Mínimo 11px
- Links/Buttons: Área de click mínimo 44x44px

---

### 14.3 Indicadores de Foco (Focus Rings)

- Siempre visibles (no remover con outline: none)
- Contraste mínimo 3:1
- Offset: 2-4px desde elemento
- Nunca color: igual al fondo

---

## 15. RESOLUCIÓN Y DENSIDAD DE PIXEL

### 15.1 Consideraciones DPI

```
Densidad estándar: 96 DPI (web estándar)
Pantallas de alta densidad: 2x (Retina), 3x (algunos móviles)

Imágenes:
├─ Proporcionar versiones 1x y 2x
├─ Usar srcset para responsive images
└─ SVG preferido para iconos (escala infinita)

Tipografía:
├─ Sistema operativo renderiza a nivel nativo
├─ -webkit-font-smoothing: antialiased (en macOS)
└─ text-rendering: optimizeLegibility (selectivamente)
```

---

## 16. CASE STUDY: ARQUITECTURA VISUAL INTEGRADA

### 16.1 Página de Servicio Completa (Visual)

```
┌─────────────────────────────────────────────────────────┐
│ [NAVIGATION: 70px altura, fondo blanco, sticky]         │
│ Logo | Links | CTA Button                               │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ HERO SECTION: 500px altura                              │
│                                                          │
│ [Izq 60%]           [Der 40%]                            │
│ H1 (96px, bold)     Imagen o gradiente                   │
│ Blanco sobre gris   Overlay suave                        │
│                                                          │
│ Padding: 80px sides, 60px top/bottom                     │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ PROPOSICIÓN: 200px altura                               │
│                                                          │
│ H2 (36px, semibold): "Scaling AI creates advantage"     │
│ Padding: 40px vertical, 80px horizontal                  │
│ Color: Negro sobre blanco                               │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ BODY SECTION: 400px altura                              │
│                                                          │
│ Max-width: 800px, centered                              │
│ Paragraphs: 16px, line-height 1.7, gris 600             │
│ Padding: 40px top/bottom                                │
│ Fondo: Blanco puro                                      │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ BENEFICIOS: 350px altura                                │
│                                                          │
│ 2 columnas desktop, 1 mobile                            │
│ Bullets/Items: 14px, líneas limpias                     │
│ Padding sección: 60px top/bottom                         │
│ Fondo: Gris muy claro (#F5F5F5)                         │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ CASOS RELACIONADOS: 600px altura                        │
│                                                          │
│ Grid 2-3 items, cards uniformes                         │
│ Cada card: 400x250px, sombra nivel 2                    │
│ Padding: 40px sección, 24px card                        │
│ Fondo: Blanco puro                                      │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ CTA FINAL: 200px altura                                  │
│                                                          │
│ Button primaryário centrado                             │
│ H2 contexto arriba                                      │
│ Padding: 60px top/bottom                                │
│ Fondo: Color primario muy claro (#F0F3FF) o gris        │
└─────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────┐
│ FOOTER: 300px altura                                     │
│                                                          │
│ Grid: 4-5 columnas (links, social, newsletter)          │
│ Tipografía: 12-14px, gris 500-600                       │
│ Fondo: Gris oscuro (#222-#333) o blanco con borde       │
└─────────────────────────────────────────────────────────┘
```

---

## 17. DIRECTRICES DE CONSISTENCIA

### 17.1 Checklist Visual

**Antes de Publicar:**

- [ ] ¿Contraste de texto mínimo 4.5:1 para body?
- [ ] ¿Body copy 14-16px?
- [ ] ¿Espacios en blanco entre secciones ≥60px?
- [ ] ¿Grid de 12 columnas respetado?
- [ ] ¿Máximo 2-3 colores saturados por sección?
- [ ] ¿Imágenes optimizadas y responsive?
- [ ] ¿Hover states clara en todos los botones?
- [ ] ¿Focus rings visibles en elementos interactivos?
- [ ] ¿Padding interno de cards uniforme (24px)?
- [ ] ¿Tipografía jerarquizada claramente (H1>H2>H3>Body)?
- [ ] ¿Sombras consistentes (máximo nivel 2-3)?
- [ ] ¿Transiciones suaves (200-400ms)?
- [ ] ¿Mobile responsive a 320px, 768px, 1024px+?
- [ ] ¿Líneas de texto máximo 80-100 caracteres?
- [ ] ¿Altura de línea ≥1.5 para body?

---

## 18. CONCLUSIONES Y SÍNTESIS

### 18.1 Principios Clave Integrados

1. **Minimalismo Sofisticado**: Ausencia de ornamento, máxima claridad
2. **Jerarquía Visual Clara**: Tamaño, peso, color establecen orden de lectura
3. **Espacio Generoso**: Espacios en blanco como elemento activo
4. **Paleta Restringida**: 1 color primario, neutrales, máximo contraste
5. **Tipografía Legible**: Sans-serif moderno, escalas consistentes
6. **Grillas Rigurosas**: 12 columnas, consistencia en alineación
7. **Iconografía Simple**: Línea o relleno, monocromo, funcional
8. **Interacciones Sutiles**: Transiciones suaves, feedback claro
9. **Accesibilidad Primaria**: Contraste, tamaño, focus rings siempre presentes
10. **Responsive First**: Mobile considerado desde inicio, no adaptación tardía

---

### 18.2 Patrón Visual de Autoridad

El diseño comunica:
- **Confianza**: A través de claridad, coherencia, profesionalismo
- **Capacidad**: Mediante organización, precisión, atención al detalle
- **Accesibilidad**: Via contraste, tamaño legible, navegación clara
- **Sofisticación**: Sin ornamento, mediante restraint y proporción

---

## 19. REFERENCIAS TÉCNICAS

**Estándares Aplicados:**
- WCAG 2.1 AA (Accesibilidad)
- Material Design Guidelines (Espaciado, Grillas)
- Apple Human Interface Guidelines (Tipografía, Movimiento)
- Web Content Accessibility Guidelines (Contraste, Tamaño)

**Herramientas Recomendadas:**
- Figma (Diseño colaborativo)
- Chrome DevTools (Inspección, medidas)
- Lighthouse (Performance, accesibilidad)
- WebAIM (Verificación de contraste)

---

**Versión:** 1.0 | **Fecha:** Enero 2026 | **Propósito:** Guía técnica de diseño visual para consultoría estratégica


---

## 15. BIBLIOTECA DE IMÁGENES DE PROPORTIONE

### 15.1 Principio de Uso

Todas las imágenes en la biblioteca de WordPress tienen un **alt text descriptivo** que explica su contenido y contexto. Al seleccionar imágenes para cualquier página:

1. **Revisar el alt text** para entender el propósito de la imagen
2. **Seleccionar la que mejor represente** el contenido de la sección
3. **Priorizar coherencia visual** con la paleta de colores corporativa

### 15.2 Categorías de Imágenes Disponibles

| Categoría | Descripción | Uso Recomendado |
|-----------|-------------|-----------------|
| **Colaboración** | Personas trabajando en equipo, reuniones | Hero sections, secciones de equipo |
| **Estrategia** | Pizarras, diagramas, planificación | Secciones de servicios, metodología |
| **Tecnología** | Robots, IA, interfaces digitales | Artículos de blog, insights |
| **Geometría/Proportione** | Formas geométricas, proporción áurea | Página Divina Proportione, branding |
| **Profesional** | Fotografías de fundadores, equipo | About, contacto |

### 15.3 Imágenes Clave para la Identidad

| ID | Imagen | Uso |
|----|--------|-----|
| 1162 | Colaboración en mesa de madera | Hero homepage |
| 1165 | Persona escribiendo en pizarra | Sección estrategia |
| 1166 | Dos personas revisando documentos | Sección co-creación |
| 2629 | Javier Cuervo | About, equipo |
| 177 | Fibonacci/Crecimiento | Divina Proportione |
| 2649 | Ilustración Leonardo da Vinci | Divina Proportione |

### 15.4 Reglas de Selección

1. **Coherencia temática**: La imagen debe reforzar el mensaje del texto
2. **Paleta de colores**: Preferir imágenes con tonos cálidos (granates, verdes, cremas)
3. **Calidad profesional**: Sin imágenes pixeladas o de stock genéricas
4. **Alt text completo**: Siempre verificar que el alt text describa adecuadamente la imagen

