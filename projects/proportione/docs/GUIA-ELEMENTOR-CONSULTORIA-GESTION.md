# Guía de Implementación: Consultoría de Gestión de Negocio en Elementor

> **Fecha:** 2026-01-30
> **URL objetivo:** https://staging19.proportione.com/consultoria-estrategica-crecimiento-organico/consultoria-de-gestion-de-negocio-un-enfoque-estrategico/
> **CSS específico:** `wp-content/themes/hello-elementor-child/consultoria-gestion.css`
> **Basado en:** Diseño de Figma (9 secciones)
> **Directrices:** Sigue `_common/docs/programacion-pragmatica-wordpress-elementor.md`

## Principios Pragmáticos Aplicados

Esta implementación sigue las directrices de programación pragmática:

1. **CSS en child theme** - El CSS está en el child theme, no disperso
2. **Carga condicional** - Solo se carga en esta página específica (via `functions.php`)
3. **Clases CSS en Elementor** - Usamos CSS Classes en Avanzado, no Custom CSS inline
4. **Mínimo uso de `!important`** - Solo donde Elementor lo requiere (documentado)
5. **Templates reutilizables** - Guardar secciones como templates de Elementor

---

## Resumen de Secciones

| # | Sección | Fondo | Clase CSS |
|---|---------|-------|-----------|
| 1 | Hero | Imagen + Overlay #5F322F 70% | `consultoria-hero` |
| 2 | Introduction | #FFFFFF | `consultoria-introduction` |
| 3 | Three Key Areas | #F5F0E6 | `consultoria-three-areas` |
| 4 | Strategy Importance | #FFFFFF | `consultoria-strategy-importance` |
| 5 | Strategy to Execution | #F5F0E6 | `consultoria-strategy-execution` |
| 6 | Differentiators | #FFFFFF | `consultoria-differentiators` |
| 7 | Summary | #5F322F | `consultoria-summary` |
| 8 | Related Content | #FFFFFF | `consultoria-related` |
| 9 | Final CTA | #F5F0E6 | `consultoria-cta` |

---

## Imágenes de la Biblioteca de WordPress

| Sección | ID WordPress | Descripción |
|---------|--------------|-------------|
| Hero (fondo) | **1162** | Colaboración mesa madera |
| Introduction | **2649** | Erudito renacimiento |
| Strategy to Execution | **1165** | Persona escribiendo pizarra |

**Alternativas:**
- Hero: ID 1166
- Strategy to Execution: ID 2393

---

## FASE 1: PREPARACIÓN

### 1.1 CSS Personalizado (Ya Configurado)

El CSS está en el child theme y se carga automáticamente:

- **Ubicación:** `wp-content/themes/hello-elementor-child/consultoria-gestion.css`
- **Carga:** Condicional via `functions.php` (solo en esta página)
- **Dependencia:** Se carga después del design-system global

**No es necesario** añadir CSS manualmente. El sistema lo detecta por el slug de la página.

### 1.2 Verificar que el Child Theme está Activo

1. Ir a: **Apariencia > Temas**
2. Verificar que "Hello Elementor Child - Proportione" está activo
3. Si no, activarlo

### 1.3 Abrir la Página en Elementor

1. Ir a: https://staging19.proportione.com/wp-admin/
2. Editar la página existente o crear una nueva
3. **Importante:** El slug debe ser `consultoria-de-gestion-de-negocio-un-enfoque-estrategico`
4. Usar plantilla: **Elementor Full Width** (sin sidebar)

---

## SECCIÓN 1: HERO

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna
2. En **Avanzado > CSS Classes**: `consultoria-hero`

### Configuración de Estilo

**Pestaña Layout:**
- Layout: Full Width
- Min Height: 60vh
- Column Position: Middle
- Vertical Align: Center

**Pestaña Estilo > Fondo:**
- Tipo: Clásico (imagen)
- Imagen: Seleccionar imagen ID **1162** de la biblioteca
- Posición: Centro Centro
- Tamaño: Cubrir
- Repetir: No Repeat

**Pestaña Estilo > Superposición de fondo:**
- Tipo: Clásico
- Color: `#5F322F`
- Opacidad: 0.70

**Pestaña Avanzado:**
- Padding: 0px (todo)

### Widgets de la Sección

**1. Breadcrumb (Texto)**
```
Consultoría Estratégica > Gestión de Negocio
```
- Widget: Editor de Texto
- Tipografía: Raleway, 14px, Regular
- Color: `#F5F0E6`
- Añadir clase CSS: `hero-breadcrumb`
- Alineación: Izquierda (o Centro según diseño)

**2. H1 - Título Principal**
```
Consultoría de gestión de negocio: un enfoque estratégico
```
- Widget: Encabezado
- HTML Tag: **H1**
- Tipografía:
  - Familia: Oswald
  - Tamaño: 56px
  - Peso: 700 (Bold)
  - Line Height: 1.1
- Color: `#F5F0E6`
- Alineación: Izquierda
- **Responsive:**
  - Tablet: 48px
  - Móvil: 36px
- Animación de entrada: Fade In Up

**3. Subtítulo**
```
Acompañamos a las empresas a navegar la complejidad del entorno actual, alineando estrategia, personas y operaciones.
```
- Widget: Editor de Texto
- Añadir clase CSS: `hero-subtitle`
- Tipografía: Raleway, 20px, Regular
- Color: `#F5F0E6`
- Alineación: Izquierda
- Max Width: 50% (en Advanced)
- Animación de entrada: Fade In Up, Delay: 200ms

---

## SECCIÓN 2: INTRODUCTION

### Configuración de Sección

1. **Añadir nueva sección** de 2 columnas (60% / 40%)
2. En **Avanzado > CSS Classes**: `consultoria-introduction`

**Pestaña Estilo:**
- Fondo: `#FFFFFF`

**Pestaña Avanzado:**
- Padding: 100px arriba, 100px abajo
- Responsive móvil: 60px arriba/abajo

### COLUMNA IZQUIERDA (60%)

**1. H2 - Título**
```
¿Qué es la consultoría de gestión de negocio?
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Animación: Fade In

**2. Párrafo 1**
```
La consultoría de gestión de negocio es una disciplina profesional que ayuda a las organizaciones a mejorar su rendimiento, optimizar sus procesos y alcanzar sus objetivos estratégicos. Va más allá del simple asesoramiento: implica un acompañamiento activo en la toma de decisiones y la implementación de cambios.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 18px, Regular
- Color: `#333333`
- Line Height: 1.7
- Margin Bottom: 16px

**3. Párrafo 2**
```
En Proportione, entendemos que cada empresa es única. Por eso nuestro enfoque combina rigor analítico con una comprensión profunda del factor humano que impulsa cualquier organización.
```
- Widget: Editor de Texto
- Misma configuración que párrafo 1

### COLUMNA DERECHA (40%)

**1. Imagen**
- Widget: Imagen
- Seleccionar: ID **2649** (Erudito renacimiento)
- Tamaño: Large o Full
- Alineación: Centro
- Añadir clase CSS: `intro-image`
- Animación: Fade In, Delay: 100ms

**Estilo de la imagen:**
- Border Radius: 8px
- Box Shadow: 0 4px 20px rgba(0,0,0,0.08)

### Responsive

- Tablet/Móvil: Cambiar a 1 columna, imagen debajo del texto

---

## SECCIÓN 3: THREE KEY AREAS

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna (para el título)
2. En **Avanzado > CSS Classes**: `consultoria-three-areas`

**Pestaña Estilo:**
- Fondo: `#F5F0E6`

**Pestaña Avanzado:**
- Padding: 100px arriba, 40px abajo

### Widgets del Título

**H2 - Título**
```
Nuestro enfoque se articula en tres áreas fundamentales
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 64px
- Animación: Fade In Up

### Sección de Cards (3 columnas)

1. **Añadir nueva sección** de 3 columnas iguales (33.3%)
2. Sin fondo (hereda el F5F0E6)
3. Padding: 0 arriba, 60px abajo

### CARD 1: Estrategia de Negocio

**Estructura de la columna:**
- Añadir Inner Section o usar la columna directamente
- Clase CSS: `consultoria-area-card`

**Widgets dentro de la columna:**

**1. Número**
```
01
```
- Widget: Encabezado
- HTML Tag: span o div
- Tipografía: Oswald, 48px, 700
- Color: `#6E8157`
- Añadir clase: `area-number`

**2. Título**
```
Estrategia de negocio
```
- Widget: Encabezado
- HTML Tag: **H3**
- Tipografía: Oswald, 28px, 600
- Color: `#333333`

**3. Descripción**
```
Definimos junto a usted el rumbo de su empresa, identificando oportunidades de mercado, ventajas competitivas y modelos de negocio sostenibles.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 18px, Regular
- Color: `#333333`
- Line Height: 1.6

**Animación:** Fade In Up, Delay: 0ms

### CARD 2: Diseño Organizacional

**Misma estructura que Card 1**

**Widgets:**
- Número: `02`
- Título: `Diseño organizacional`
- Descripción:
```
Estructuramos equipos y procesos para que funcionen como un todo coherente. Buscamos organizaciones ágiles capaces de adaptarse sin perder su esencia.
```

**Animación:** Fade In Up, Delay: 100ms

### CARD 3: Transformación Digital

**Misma estructura que Card 1**

**Widgets:**
- Número: `03`
- Título: `Transformación digital`
- Descripción:
```
Integramos tecnología que potencia a las personas en lugar de sustituirlas. La digitalización es un medio, nunca un fin en sí mismo.
```

**Animación:** Fade In Up, Delay: 200ms

### Estilos de las Cards (aplicar en Elementor)

Para cada columna que contiene una card:

**Pestaña Estilo > Fondo:**
- Color: `#FFFFFF`

**Pestaña Estilo > Borde:**
- Tipo: Sólido
- Ancho: 4px arriba, 0 los demás
- Color: `#5F322F`
- Radio: 8px

**Pestaña Estilo > Sombra:**
- Box Shadow: 0 4px 20px rgba(0,0,0,0.08)

**Pestaña Avanzado:**
- Padding: 32px

---

## SECCIÓN 4: STRATEGY IMPORTANCE

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna
2. En **Avanzado > CSS Classes**: `consultoria-strategy-importance`

**Pestaña Layout:**
- Content Width: Boxed, 900px

**Pestaña Estilo:**
- Fondo: `#FFFFFF`

**Pestaña Avanzado:**
- Padding: 100px arriba y abajo

### Widgets

**1. H2 - Título**
```
En un mundo volátil, la estrategia importa más que nunca
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 32px
- Animación: Fade In Up

**2. Párrafo**
```
Vivimos en un entorno caracterizado por la incertidumbre, los cambios rápidos y la competencia global. En este contexto, las empresas que prosperan son aquellas que han sabido construir una estrategia clara y flexible a la vez.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 18px, Regular
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 48px

**3. Quote Box**

Crear un Inner Section o usar un widget HTML personalizado:

```
No se trata de predecir el futuro, sino de estar preparados para múltiples escenarios y tomar decisiones con criterio cuando la información es incompleta.
```

**Opción A: Inner Section**
- Añadir Inner Section de 1 columna
- Clase CSS: `consultoria-quote-box`
- Fondo: `#F5F0E6`
- Borde izquierdo: 4px solid `#5F322F`
- Border Radius: 0 8px 8px 0
- Padding: 24px 32px

**Opción B: Editor de Texto con estilo**
- Widget: Editor de Texto
- Añadir clase: `consultoria-quote-box`
- Tipografía: Raleway, 22px, 500, Italic
- Color: `#333333`
- Animación: Fade In, Delay: 200ms

---

## SECCIÓN 5: STRATEGY TO EXECUTION

### Configuración de Sección

1. **Añadir nueva sección** de 2 columnas (40% / 60%)
2. En **Avanzado > CSS Classes**: `consultoria-strategy-execution`

**Pestaña Estilo:**
- Fondo: `#F5F0E6`

**Pestaña Avanzado:**
- Padding: 100px arriba y abajo

### COLUMNA IZQUIERDA (40%) - Imagen

**1. Imagen**
- Widget: Imagen
- Seleccionar: ID **1165** (Persona escribiendo pizarra)
- Tamaño: Large o Full
- Añadir clase CSS: `execution-image`
- Animación: Fade In Left

**Estilo de la imagen:**
- Border Radius: 8px
- Box Shadow: 0 4px 20px rgba(0,0,0,0.08)

### COLUMNA DERECHA (60%) - Contenido

**1. H2 - Título**
```
De la estrategia a la ejecución
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Margin Bottom: 24px

**2. Párrafo 1**
```
La consultoría de gestión no termina con un informe. Nuestra labor incluye acompañar a las organizaciones en la implementación efectiva de los cambios propuestos.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 18px, Regular
- Color: `#333333`
- Line Height: 1.7

**3. Párrafo 2**
```
En Proportione adoptamos un enfoque práctico: trabajamos codo a codo con sus equipos para asegurar que las estrategias se traduzcan en resultados tangibles.
```
- Widget: Editor de Texto
- Misma configuración

**4. Lista de Beneficios**

- Widget: Icon List
- Icono: Check Circle (fa-check-circle) o similar
- Color del icono: `#6E8157`
- Clase CSS: `consultoria-benefits-list`

**Items de la lista:**
1. Acompañamiento cercano durante todo el proceso
2. Transferencia de conocimiento a su equipo
3. Métricas claras de progreso y resultado
4. Ajustes ágiles según evoluciona el contexto

**Configuración de cada item:**
- Tipografía: Raleway, 18px, Regular
- Color: `#333333`
- Animación: Fade In (delays escalonados: 100ms, 200ms, 300ms, 400ms)

### Responsive

- Móvil: 1 columna, **texto arriba, imagen abajo** (invertir orden)
- En Elementor: Ir a Columna izquierda > Avanzado > Responsive > Orden: 2
- Columna derecha > Avanzado > Responsive > Orden: 1

---

## SECCIÓN 6: DIFFERENTIATORS

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna (para el título)
2. En **Avanzado > CSS Classes**: `consultoria-differentiators`

**Pestaña Estilo:**
- Fondo: `#FFFFFF`

**Pestaña Avanzado:**
- Padding: 100px arriba, 40px abajo

### Widget del Título

**H2 - Título**
```
¿Por qué Proportione?
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 64px

### Sección de Bloques (4 columnas)

1. **Añadir nueva sección** de 4 columnas iguales (25%)
2. Padding: 0 arriba, 60px abajo

### BLOQUE 1: Enfoque Proporcionado

**Widgets:**

**1. Icono en círculo**
- Widget: Icon
- Icono: Scale (fa-balance-scale) o equivalente
- Configuración:
  - View: Stacked
  - Shape: Circle
  - Primary Color: `#6E8157`
  - Secondary Color: `#F5F0E6`
  - Size: 64px
  - Icon Size: 32px
- Alineación: Centro

**2. Título**
```
Enfoque proporcionado
```
- Widget: Encabezado
- HTML Tag: **H3**
- Tipografía: Oswald, 24px, 600
- Color: `#333333`
- Alineación: Centro

**3. Descripción**
```
No imponemos soluciones genéricas. Cada propuesta se adapta al tamaño, sector y momento de su empresa.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 16px, Regular
- Color: `#333333`
- Alineación: Centro

**Animación:** Fade In Up, Delay: 0ms

### BLOQUE 2: Personas en el Centro

**Widgets:**
- Icono: Users (fa-users)
- Título: `Personas en el centro`
- Descripción:
```
Creemos que el éxito de cualquier transformación depende de las personas que la llevan a cabo.
```

**Animación:** Fade In Up, Delay: 100ms

### BLOQUE 3: Conocimiento Transferido

**Widgets:**
- Icono: Book Open (fa-book-open)
- Título: `Conocimiento transferido`
- Descripción:
```
Nuestro objetivo es que su equipo crezca con el proyecto. No creamos dependencias, generamos capacidades.
```

**Animación:** Fade In Up, Delay: 200ms

### BLOQUE 4: Resultados Medibles

**Widgets:**
- Icono: Trending Up (fa-chart-line)
- Título: `Resultados medibles`
- Descripción:
```
Definimos indicadores claros desde el inicio para evaluar el impacto real de nuestra intervención.
```

**Animación:** Fade In Up, Delay: 300ms

### Responsive

- Tablet: 2 columnas (2x2)
- Móvil: 1 columna

---

## SECCIÓN 7: SUMMARY

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna
2. En **Avanzado > CSS Classes**: `consultoria-summary text-on-dark`

**Pestaña Layout:**
- Content Width: Boxed, 900px

**Pestaña Estilo:**
- Fondo: `#5F322F`

**Pestaña Avanzado:**
- Padding: 100px arriba y abajo

### Widgets

**1. H2 - Título**
```
En resumen
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#F5F0E6`
- Alineación: Centro
- Margin Bottom: 24px
- Animación: Fade In Up

**2. Párrafo**
```
La consultoría de gestión de negocio es una herramienta poderosa para las organizaciones que buscan crecer de manera sostenible. En Proportione combinamos rigor estratégico, sensibilidad humana y pragmatismo operativo para ayudarle a alcanzar sus objetivos.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 22px, Regular
- Color: `#F5F0E6`
- Alineación: Centro
- Line Height: 1.6
- Animación: Fade In Up, Delay: 100ms

---

## SECCIÓN 8: RELATED CONTENT

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna (para el título)
2. En **Avanzado > CSS Classes**: `consultoria-related`

**Pestaña Estilo:**
- Fondo: `#FFFFFF`

**Pestaña Avanzado:**
- Padding: 100px arriba, 40px abajo

### Widget del Título

**H2 - Título**
```
Explore más sobre crecimiento orgánico
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 64px

### Sección de Cards (3 columnas)

1. **Añadir nueva sección** de 3 columnas iguales (33.3%)
2. Padding: 0 arriba, 60px abajo

### CARD 1: Programas One-to-One

**Estructura de la columna:**
- Clase CSS: `consultoria-related-card`

**Widgets:**

**1. Badge**
```
Consultoría
```
- Widget: Encabezado o Editor de Texto
- Clase CSS: `consultoria-related-badge`
- Tipografía: Raleway, 14px, 500
- Color: `#6E8157`
- Fondo: `#F5F0E6`
- Padding: 4px 12px
- Border Radius: 100px

**2. Título**
```
Programas one-to-one de acompañamiento estratégico
```
- Widget: Encabezado
- HTML Tag: **H3**
- Tipografía: Oswald, 24px, 600
- Color: `#333333`

**3. Descripción**
```
Sesiones personalizadas para líderes que buscan un espacio de reflexión y apoyo en la toma de decisiones.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 16px, Regular
- Color: `#333333`

**4. Link**
```
Conocer más →
```
- Widget: Button o Editor de Texto con link
- Clase CSS: `consultoria-related-link`
- Tipografía: Raleway, 16px, 500
- Color: `#6E8157`
- URL: `/programas-one-to-one/` (actualizar con URL real)

**Animación:** Fade In Up, Delay: 0ms

### CARD 2: Enfoque 20-60-20

**Widgets:**
- Badge: `Metodología`
- Título: `Nuestro enfoque 20-60-20`
- Descripción:
```
Un método que equilibra análisis, implementación y seguimiento para maximizar el impacto de cada intervención.
```
- Link: `Conocer más →` (URL: `/metodologia/`)

**Animación:** Fade In Up, Delay: 100ms

### CARD 3: Transformación Digital

**Widgets:**
- Badge: `Insights`
- Título: `La transformación digital centrada en personas`
- Descripción:
```
Reflexiones sobre cómo abordar la digitalización sin perder de vista el elemento humano de las organizaciones.
```
- Link: `Conocer más →` (URL: `/blog/transformacion-digital/`)

**Animación:** Fade In Up, Delay: 200ms

### Estilos de las Cards

**Pestaña Estilo > Fondo:**
- Color: `#FFFFFF`

**Pestaña Estilo > Borde:**
- Tipo: Sólido
- Ancho: 1px
- Color: `#E0E0E0`
- Radio: 8px

**Pestaña Estilo > Sombra:**
- Box Shadow: 0 4px 20px rgba(0,0,0,0.08)

**Pestaña Avanzado:**
- Padding: 24px

---

## SECCIÓN 9: FINAL CTA

### Configuración de Sección

1. **Añadir nueva sección** de 1 columna
2. En **Avanzado > CSS Classes**: `consultoria-cta`

**Pestaña Layout:**
- Content Width: Boxed, 700px

**Pestaña Estilo:**
- Fondo: `#F5F0E6`

**Pestaña Avanzado:**
- Padding: 100px arriba y abajo

### Widgets

**1. H2 - Título**
```
¿Hablamos de su empresa?
```
- Widget: Encabezado
- HTML Tag: **H2**
- Tipografía: Oswald, 42px, 600
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 16px
- Animación: Fade In Up

**2. Párrafo**
```
Sin compromiso, sin presión. Una conversación para entender sus retos y explorar cómo podemos ayudarle.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 18px, Regular
- Color: `#333333`
- Alineación: Centro
- Margin Bottom: 40px

**3. Botones (contenedor)**

Crear Inner Section de 2 columnas (o usar widget de botones lado a lado):

**Botón Primario:**
```
Contactar
```
- Widget: Button
- Tipo: Primary
- URL: `/contacto/`
- Alineación: Centro (o Derecha si lado a lado)
- Configuración:
  - Fondo: `#6E8157`
  - Color texto: `#FFFFFF`
  - Tipografía: Raleway, 16px, 500
  - Padding: 16px 32px
  - Border Radius: 8px
  - Hover: Fondo `#3B431C`

**Botón Secundario:**
```
Explorar más servicios
```
- Widget: Button
- Tipo: Secondary (outline)
- URL: `/servicios/`
- Alineación: Centro (o Izquierda si lado a lado)
- Configuración:
  - Fondo: transparent
  - Color texto: `#5F322F`
  - Borde: 2px solid `#5F322F`
  - Tipografía: Raleway, 16px, 500
  - Padding: 16px 32px
  - Border Radius: 8px
  - Hover: Fondo `#5F322F`, texto `#F5F0E6`

### Responsive

- Móvil: Botones apilados verticalmente, ancho completo

---

## CHECKLIST DE VERIFICACIÓN

### Pre-Publicación

- [ ] Todas las imágenes con alt text descriptivo
- [ ] Jerarquía correcta: 1 H1, múltiples H2, H3 en cards
- [ ] Contraste WCAG AA verificado
- [ ] Links con URLs correctas
- [ ] Animaciones configuradas con delays escalonados
- [ ] Botones clicables (mínimo 44x44px)

### Responsive

- [ ] Desktop 1440px
- [ ] Laptop 1366px
- [ ] Tablet 768px
- [ ] Móvil 375px

### Performance

- [ ] Imágenes optimizadas (WebP si es posible)
- [ ] Limpiar caché Elementor
- [ ] Limpiar caché WordPress/SiteGround
- [ ] Verificar Core Web Vitals

---

## COLORES DE REFERENCIA

| Color | Código | Uso |
|-------|--------|-----|
| Granate principal | `#5F322F` | Hero overlay, bordes, títulos sobre claro |
| Verde oliva | `#6E8157` | Botón primario, iconos, links, números |
| Verde oscuro | `#3B431C` | Hover de botón verde |
| Crema | `#F5F0E6` | Fondos alternos, texto sobre granate |
| Blanco | `#FFFFFF` | Fondos de cards |
| Texto | `#333333` | Párrafos, títulos |

---

## TIPOGRAFÍAS

| Elemento | Familia | Peso | Tamaño |
|----------|---------|------|--------|
| H1 Hero | Oswald | 700 | 56px (tablet 48, móvil 36) |
| H2 Secciones | Oswald | 600 | 42px (tablet 36, móvil 32) |
| H3 Cards | Oswald | 600 | 28px / 24px |
| Body | Raleway | 400 | 18px (móvil 16) |
| Quote | Raleway | 500 | 22px (móvil 18) |
| Buttons | Raleway | 500 | 16px |
| Badges | Raleway | 500 | 14px |

---

## ANIMACIONES DE ELEMENTOR

| Animación | Uso | Duración | Delay |
|-----------|-----|----------|-------|
| Fade In Up | Títulos, textos | 600ms | 0, 100, 200ms |
| Fade In Left | Imágenes izquierda | 600ms | 0 |
| Fade In Right | Textos derecha | 600ms | 100ms |
| Fade In | Quotes, elementos centrados | 600ms | 200ms |

### Configurar en Elementor

1. Seleccionar widget
2. Ir a **Avanzado > Efectos de Movimiento**
3. Activar **Scrolling Effects** o **Entrance Animation**
4. Elegir animación
5. Configurar Delay (en ms)

---

## NOTAS FINALES

1. **CSS Personalizado**: Si los estilos no se aplican correctamente, añadir `!important` según sea necesario en el CSS custom de la página.

2. **Guardar como Template**: Considerar guardar secciones reutilizables (Hero, CTA) como templates de Elementor para futuras páginas de consultoría.

3. **URLs de Links**: Actualizar todas las URLs de los botones y links con las URLs reales del sitio antes de publicar.

4. **Imágenes WebP**: Si el hosting lo soporta, convertir imágenes a WebP para mejor rendimiento.

5. **Test de Accesibilidad**: Ejecutar WAVE o similar después de publicar para verificar accesibilidad.
