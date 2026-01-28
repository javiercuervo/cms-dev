# Workflow: Framer → Elementor Pro

## Stack de Diseño e Implementación

```
┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐
│   CLAUDE CODE   │ ──► │     FRAMER      │ ──► │  ELEMENTOR PRO  │
│   (Estrategia)  │     │    (Diseño)     │     │ (Implementación)│
└─────────────────┘     └─────────────────┘     └─────────────────┘
       │                        │                        │
   Brief → UX          Prompts AI → Mockup      Guía → WordPress
```

## Roles

| Herramienta | Uso |
|-------------|-----|
| **Claude Code** | Estrategia, copy, estructura, prompts, handoff |
| **Framer** | Diseño visual con IA (laboratorio, NO producción) |
| **Elementor Pro** | Implementación final en WordPress |
| **GitHub** | Versionado de código y assets |

## Workflow por Página

### 1. Entender el Brief

**Información necesaria:**
- Tipo de página (landing, ventas, servicios, etc.)
- Objetivo principal (conversión, información, etc.)
- Público objetivo
- Tono de marca
- Colores y tipografías
- Ejemplos de referencia (opcional)

**Output:** Resumen del brief en 3-5 líneas.

### 2. Estructura de la Página

**Proponer secciones en orden:**
- Hero
- Beneficios / Propuesta de valor
- Cómo funciona / Proceso
- Prueba social (testimonios, logos)
- FAQ
- CTA final

**Para cada sección definir:**
- Objetivo
- Mensaje clave
- Tipo de bloque visual (imagen, mockup, ilustración, icono)

### 3. Contenido y Concepto Visual

**Redactar por sección:**
- Titular (H1/H2)
- Subtítulo
- Bullets / texto de apoyo
- CTA (si aplica)

**Concepto visual:**
- Layout (full-width, contenedor, asimétrico)
- Columnas (1, 2, 3, 4)
- Uso de espacio (compacto, aireado)
- Estilo de imágenes (foto, ilustración, 3D)
- Nivel de contraste

**Variantes (cuando proceda):**
- Opción A: Minimal / Clean
- Opción B: Bold / Marketing

### 4. Prompts para Framer AI

**Prompt global (página completa):**
```
Crea una landing page para [tipo de negocio].

Objetivo: [conversión/información/etc.]
Tono: [profesional/cercano/premium/etc.]
Estilo visual: [minimal/moderno/corporativo/etc.]

Secciones:
1. Hero con [descripción]
2. [Sección 2]
3. [Sección 3]
...

Colores: [primario], [secundario], [acento]
Tipografía: [sans-serif moderna / serif elegante / etc.]
```

**Prompts de ajuste (por sección):**
```
Refina el hero:
- Titular más grande y centrado
- Imagen a la derecha
- CTA con color de acento

Ajusta la sección de beneficios:
- 3 columnas con iconos
- Fondo gris claro
- Más espacio entre elementos
```

### 5. Handoff a Elementor Pro

**Estructura del documento:**

```markdown
## Sección: [Nombre]

**Layout:** Full-width / Boxed (1200px)
**Columnas:** 50-50 / 33-33-33 / 100
**Fondo:** Color / Imagen / Gradiente
**Padding:** Top 80px, Bottom 80px

**Widgets Elementor:**
- Heading (H1, clase: hero-title)
- Text Editor (clase: hero-subtitle)
- Button (estilo: primary-cta)
- Image (tamaño: full)

**Clases CSS:**
- .section-hero
- .hero-content
- .hero-image

**Estilos globales a usar:**
- Color primario: var(--e-global-color-primary)
- Tipografía títulos: var(--e-global-typography-primary)
- Botón primario: Estilo global "Primary Button"
```

## Criterios de Diseño

1. **Claridad** > Creatividad excesiva
2. **Legibilidad** > Densidad de información
3. **Conversión** > Estética pura
4. **Mobile-first** en estructura
5. **Soluciones simples** > Sobre-ingeniería

## Nomenclatura Elementor

**Clases de sección:**
```
.section-[nombre]     → .section-hero, .section-benefits
.section-[color]      → .section-dark, .section-light
```

**Clases de elementos:**
```
.[seccion]-[elemento] → .hero-title, .benefits-icon
```

**IDs (solo para anclas):**
```
#[nombre-seccion]     → #hero, #benefits, #contact
```

## Checklist Pre-Implementación

- [ ] Brief completo y aprobado
- [ ] Estructura de secciones definida
- [ ] Copy redactado y revisado
- [ ] Mockup en Framer aprobado
- [ ] Guía de handoff generada
- [ ] Assets exportados (imágenes, iconos)
