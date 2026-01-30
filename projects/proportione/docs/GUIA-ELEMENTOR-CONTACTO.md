# Guía de Implementación: Página de Contacto en Elementor

**Fecha:** Enero 2026
**Diseño:** Figma (ContactPage)
**Destino:** staging19.proportione.com/contacto/

---

## Resumen de la Página

| Sección | Widget Elementor | Notas |
|---------|------------------|-------|
| Hero | Section + Heading + Text | Fondo degradado granate |
| Contenido | Section con 2 columnas | Grid 2fr + 1fr |
| Formulario | Elementor Form (Pro) | Fondo crema |
| Info Contacto | Icon Box x4 | Email, Ubicación, Horario, LinkedIn |

---

## SECCIÓN 1: HERO

### Configuración de Section

**Layout:**
- Content Width: Boxed
- Columns Gap: Default
- Height: Min Height → 200px

**Style:**
- Background Type: Gradient
- Color 1: `#5F322F` (Position: 0%)
- Color 2: `#4a2623` (Position: 100%)
- Angle: 135°

**Advanced:**
- Padding: 80px top/bottom, 60px left/right
- Responsive Tablet: 60px top/bottom, 40px left/right
- Responsive Mobile: 60px top/bottom, 20px left/right

### Widgets del Hero

**1. Heading (H1)**
```
Texto: Contacto
```

| Propiedad | Valor |
|-----------|-------|
| HTML Tag | H1 |
| Alignment | Left |
| Color | #F5F0E6 |
| Typography Family | Oswald |
| Typography Size | 48px (Desktop), 40px (Tablet), 35px (Mobile) |
| Typography Weight | 500 |

**2. Text Editor (Subtítulo)**
```
Texto: Cuéntanos sobre tu proyecto de transformación
```

| Propiedad | Valor |
|-----------|-------|
| Color | #F5F0E6 |
| Typography Family | Raleway |
| Typography Size | 20px (Desktop), 18px (Mobile) |
| Opacity | 0.9 |

---

## SECCIÓN 2: CONTENIDO PRINCIPAL

### Configuración de Section

**Layout:**
- Content Width: Boxed (1200px)
- Columns Gap: Extended (60px)
- Structure: 2 columnas (66% + 33%)

**Style:**
- Background: Transparent

**Advanced:**
- Padding: 60px top/bottom, 60px left/right
- Responsive Mobile: 40px all, columns stack

### Columna Izquierda: FORMULARIO

#### Container del Formulario

**Style:**
- Background: `#F5F0E6`
- Border Radius: 8px
- Padding: 40px all

#### Widget: Heading (H2)
```
Texto: Envíanos un mensaje
```

| Propiedad | Valor |
|-----------|-------|
| HTML Tag | H2 |
| Color | #5F322F |
| Typography Family | Oswald |
| Typography Size | 28px |
| Margin Bottom | 32px |

#### Widget: Form (Elementor Pro)

**Campos del formulario:**

| Campo | Type | ID | Required | Width |
|-------|------|-----|----------|-------|
| Nombre completo | Text | nombre | Sí | 100% |
| Correo electrónico | Email | email | Sí | 100% |
| Empresa | Text | empresa | No | 50% |
| Teléfono | Tel | telefono | No | 50% |
| ¿Sobre qué quieres hablar? | Select | asunto | No | 100% |
| Mensaje | Textarea | mensaje | Sí | 100% |
| Acepto política privacidad | Acceptance | privacidad | Sí | 100% |

**Opciones del Select (asunto):**
```
Selecciona una opción|
Transformación Digital|transformacion-digital
Estrategia de IA|estrategia-ia
Gestión del Cambio|gestion-cambio
Digitalización de RRHH|digitalizacion-rrhh
Formación y Capacitación|formacion
Otro|otro
```

**Texto del Acceptance:**
```
Acepto la <a href="/politica-privacidad/" target="_blank">política de privacidad</a> y el tratamiento de mis datos personales *
```

**Botón Submit:**

| Propiedad | Valor |
|-----------|-------|
| Text | Enviar mensaje |
| Size | Medium |
| Width | Default (no full width en desktop) |
| Alignment | Left |

**Estilo del Botón:**

| Propiedad | Normal | Hover |
|-----------|--------|-------|
| Background | #5F322F | #6E8157 |
| Color | #F5F0E6 | #F5F0E6 |
| Border Radius | 4px | 4px |
| Padding | 16px 40px | - |
| Min Height | 48px | - |
| Typography Family | Oswald | - |
| Typography Size | 16px | - |
| Letter Spacing | 0.5px | - |

**Estilos de Campos (Form → Style):**

**Labels:**
| Propiedad | Valor |
|-----------|-------|
| Color | #1A1A1A |
| Typography Family | Raleway |
| Typography Weight | 500 |
| Spacing (margin bottom) | 8px |

**Inputs/Textarea:**
| Propiedad | Valor |
|-----------|-------|
| Background | #FFFFFF |
| Border Type | Solid |
| Border Width | 2px |
| Border Color | #DDDDDD |
| Border Radius | 4px |
| Padding | 12px 16px |
| Min Height (inputs) | 48px |

**Focus State (requiere CSS custom):**
```css
/* Focus states para formulario */
.elementor-field-textual:focus {
    border-color: #6E8157 !important;
    box-shadow: 0 0 0 3px rgba(110, 129, 87, 0.1) !important;
    outline: none !important;
}
```

**Messages (After Submit):**
| Propiedad | Valor |
|-----------|-------|
| Success Message | ¡Gracias! Tu mensaje ha sido enviado. Nos pondremos en contacto contigo pronto. |
| Error Message | Ha ocurrido un error. Por favor, inténtalo de nuevo. |

**Actions After Submit:**
1. Email → Configurar receptor (info@proportione.com)
2. (Opcional) Redirect → /gracias/

---

### Columna Derecha: INFO CONTACTO

#### Widget 1: Icon Box (Email)

| Propiedad | Valor |
|-----------|-------|
| Icon | fa-envelope |
| View | Stacked |
| Shape | Circle |
| Position | Left |
| Title | Email |
| Description | info@proportione.com |
| Link | mailto:info@proportione.com |

**Style:**
| Elemento | Propiedad | Valor |
|----------|-----------|-------|
| Icon | Size | 20px |
| Icon | Color | #F5F0E6 |
| Icon | Background | #5F322F |
| Icon | Padding | 11px |
| Title | Color | #5F322F |
| Title | Typography | Oswald, 18px |
| Description | Color | #1A1A1A |
| Description | Typography | Raleway, 16px |
| Spacing | Gap | 16px |

#### Widget 2: Icon Box (Ubicación)

| Propiedad | Valor |
|-----------|-------|
| Icon | fa-map-marker-alt |
| Title | Ubicación |
| Description | Madrid, España<br>Lisboa, Portugal |

(Mismos estilos que Email)

#### Widget 3: Icon Box (Horario)

| Propiedad | Valor |
|-----------|-------|
| Icon | fa-clock |
| Title | Horario |
| Description | Lunes a Viernes<br>9:00 - 18:00 CET |

(Mismos estilos que Email)

#### Widget 4: Heading + Social Icons (Síguenos)

**Heading:**
| Propiedad | Valor |
|-----------|-------|
| Text | Síguenos |
| HTML Tag | H3 |
| Color | #5F322F |
| Typography | Oswald, 18px |
| Margin Bottom | 16px |

**Social Icons:**
| Propiedad | Valor |
|-----------|-------|
| Platform | LinkedIn |
| Link | https://www.linkedin.com/company/proportione |
| Shape | Circle |
| Color | Custom |
| Primary Color | #5F322F |
| Secondary Color | #F5F0E6 |
| Size | 44px |
| Hover Primary | #6E8157 |

---

## CSS PERSONALIZADO

Añadir en **Elementor → Custom CSS** o en el child theme:

```css
/* ========================================
   PÁGINA DE CONTACTO - PROPORTIONE
   ======================================== */

/* Variables */
:root {
    --proportione-granate: #5F322F;
    --proportione-oliva: #6E8157;
    --proportione-cream: #F5F0E6;
    --proportione-black: #1A1A1A;
}

/* Focus states para inputs */
.elementor-form .elementor-field-textual:focus {
    border-color: var(--proportione-oliva) !important;
    box-shadow: 0 0 0 3px rgba(110, 129, 87, 0.1) !important;
    outline: none !important;
    transition: all 0.2s ease;
}

/* Select focus */
.elementor-form .elementor-field-type-select select:focus {
    border-color: var(--proportione-oliva) !important;
    box-shadow: 0 0 0 3px rgba(110, 129, 87, 0.1) !important;
}

/* Checkbox styling */
.elementor-form .elementor-field-type-acceptance input[type="checkbox"] {
    width: 20px;
    height: 20px;
    accent-color: var(--proportione-oliva);
}

/* Required asterisk color */
.elementor-form .elementor-mark-required .elementor-field-label::after {
    color: var(--proportione-granate) !important;
}

/* Error state */
.elementor-form .elementor-error .elementor-field {
    border-color: var(--proportione-granate) !important;
}

.elementor-form .elementor-message-danger {
    color: var(--proportione-granate) !important;
}

/* Success message */
.elementor-form .elementor-message-success {
    background-color: var(--proportione-oliva) !important;
    color: white !important;
    padding: 16px !important;
    border-radius: 6px !important;
}

/* Botón submit - transición suave */
.elementor-form .elementor-button {
    transition: background-color 0.3s ease !important;
}

/* Icon boxes - hover effect */
.elementor-widget-icon-box .elementor-icon {
    transition: background-color 0.3s ease !important;
}

.elementor-widget-icon-box:hover .elementor-icon {
    background-color: var(--proportione-oliva) !important;
}

/* Responsive - Mobile */
@media (max-width: 767px) {
    .elementor-form .elementor-button {
        width: 100% !important;
    }

    .contacto-form-container {
        padding: 24px !important;
    }
}

/* Responsive - Tablet */
@media (max-width: 1024px) {
    .contacto-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
}
```

---

## CONFIGURACIÓN DEL EMAIL (Actions After Submit)

### Email Principal

| Campo | Valor |
|-------|-------|
| To | info@proportione.com |
| Subject | Nuevo mensaje de contacto: [field id="nombre"] |
| From Email | [field id="email"] |
| From Name | [field id="nombre"] |
| Reply-To | [field id="email"] |

**Mensaje:**
```
Has recibido un nuevo mensaje desde el formulario de contacto:

Nombre: [field id="nombre"]
Email: [field id="email"]
Empresa: [field id="empresa"]
Teléfono: [field id="telefono"]
Asunto: [field id="asunto"]

Mensaje:
[field id="mensaje"]

---
Enviado desde proportione.com
```

### Email de Confirmación al Usuario (Opcional)

| Campo | Valor |
|-------|-------|
| To | [field id="email"] |
| Subject | Hemos recibido tu mensaje - Proportione |
| From Email | info@proportione.com |
| From Name | Proportione |

**Mensaje:**
```
Hola [field id="nombre"],

Gracias por ponerte en contacto con nosotros. Hemos recibido tu mensaje y nos pondremos en contacto contigo lo antes posible.

Un saludo,
El equipo de Proportione

---
www.proportione.com
```

---

## CHECKLIST DE IMPLEMENTACIÓN

### Estructura
- [ ] Crear página "Contacto" en WordPress
- [ ] Editar con Elementor
- [ ] Añadir sección Hero con degradado
- [ ] Añadir sección contenido 2 columnas
- [ ] Configurar responsive breakpoints

### Formulario
- [ ] Añadir widget Form de Elementor Pro
- [ ] Configurar todos los campos
- [ ] Configurar opciones del select
- [ ] Añadir campo Acceptance con link a privacidad
- [ ] Estilizar botón submit
- [ ] Configurar email de notificación
- [ ] Probar envío de formulario

### Info Contacto
- [ ] Añadir 3 Icon Boxes (Email, Ubicación, Horario)
- [ ] Añadir Social Icons (LinkedIn)
- [ ] Verificar links funcionan

### Estilos
- [ ] Añadir CSS personalizado
- [ ] Verificar focus states
- [ ] Verificar hover effects
- [ ] Probar en tablet
- [ ] Probar en mobile

### Accesibilidad
- [ ] Contraste WCAG AA verificado
- [ ] Labels asociados a inputs
- [ ] Focus visible en todos los elementos
- [ ] Target size mínimo 44x44px

---

## NOTAS IMPORTANTES

1. **Elementor Pro requerido** para el widget Form
2. **No usar Contact Form 7** - usar Form nativo de Elementor
3. **Verificar que el email funciona** antes de publicar
4. **Actualizar link de política de privacidad** si es diferente

---

*Creado: Enero 2026*
*Basado en diseño Figma: ContactPage.tsx*
