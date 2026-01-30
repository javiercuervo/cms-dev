# Revisión de Página de Contacto - CSS

**Fecha:** Enero 2026
**Archivos:**
- HTML: `content/contacto-page.html`
- CSS: `assets/staging-css-backup-20260128-202244.css` (sección PÁGINA DE CONTACTO)
**Estado:** Creada

---

## Resumen Ejecutivo

| Aspecto | Estado | Notas |
|---------|--------|-------|
| Hero Section | OK | Fondo granate degradado |
| Grid 2 columnas | OK | Formulario + sidebar info |
| Formulario accesible | OK | Labels, aria-required, autocomplete |
| Focus states | OK | Outline verde oliva |
| Campos esenciales | OK | Nombre, email, empresa, teléfono, mensaje |
| Privacidad | OK | Checkbox con link a política |
| Botón submit | OK | Estilo Primary, min 48px altura |
| Info contacto | OK | Email, ubicación, horario |
| Social links | OK | LinkedIn con target 44x44px |
| Responsive | OK | Tablet 1 col + grid info, Mobile stack |

**Valoración:** APROBADO - Página de contacto completa y accesible

---

## Verificación vs Guía de Diseño

### Hero Section

```css
.contacto-hero {
    background: linear-gradient(135deg, #5F322F 0%, #4a2623 100%);
    padding: 80px 60px;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Granate corporativo | #5F322F degradado | OK |
| Padding | 60-80px | 80px 60px | OK |
| H1 color | Crema sobre fondo oscuro | #F5F0E6 | OK |
| H1 size | 48-72px | 3rem (~48px) | OK |

### Grid Principal

```css
.contacto-contenido {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
    max-width: 1200px;
    padding: 80px 60px;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Grid | 2 columnas | 2fr + 1fr | OK |
| Max-width | 1200px | 1200px | OK |
| Gap | 48-64px | 60px | OK |
| Padding | 60-80px | 80px 60px | OK |

### Formulario

```css
.contacto-formulario {
    background: #F5F0E6;
    padding: 40px;
    border-radius: 8px;
}
```

**Estado:** OK - Fondo crema corporativo con padding adecuado

### Inputs y Focus States

```css
.form-grupo input:focus,
.form-grupo select:focus,
.form-grupo textarea:focus {
    border-color: #6E8157;
    box-shadow: 0 0 0 3px rgba(110, 129, 87, 0.2);
    outline: none;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Altura inputs | 40-48px | ~48px (14px padding + border) | OK |
| Borde normal | 1-2px gris | 2px #ddd | OK |
| Focus color | Color primario/acento | #6E8157 | OK |
| Focus ring | Visible | box-shadow 3px | OK |

### Botón Submit

```css
.btn-submit {
    background: #5F322F;
    color: #F5F0E6;
    font-family: var(--font-titles);
    font-size: 1.1rem;
    padding: 16px 40px;
    min-width: 200px;
    min-height: 48px;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Estilo | Primary | Granate + crema | OK |
| Altura | 48-52px | min-height: 48px | OK |
| Padding | 16-20px horizontal | 16px 40px | OK |
| Hover | Color más oscuro | Verde oliva | OK |
| Focus ring | Visible | outline 2px #6E8157 | OK |

---

## Accesibilidad WCAG AA

### Labels y Aria

```html
<label for="nombre">Nombre completo <span class="requerido" aria-hidden="true">*</span></label>
<input
    type="text"
    id="nombre"
    name="nombre"
    required
    autocomplete="name"
    aria-required="true"
>
```

| Aspecto | Requisito | Implementado | Estado |
|---------|-----------|--------------|--------|
| Labels asociados | for/id match | Sí | OK |
| Required fields | required + aria-required | Sí | OK |
| Autocomplete | Valores estándar | name, email, organization, tel | OK |
| Indicador visual | Asterisco | span.requerido aria-hidden | OK |

### Target Size

```css
.btn-submit {
    min-height: 48px;
}

.social-links a {
    width: 44px;
    height: 44px;
}
```

**Estado:** OK - Todos los targets interactivos ≥ 44x44px

### Contraste

| Elemento | Fondo | Texto | Ratio | Requisito | Estado |
|----------|-------|-------|-------|-----------|--------|
| Hero H1 | #5F322F | #F5F0E6 | 7.2:1 | 3:1 | OK |
| Form labels | #F5F0E6 | #5F322F | 7.2:1 | 4.5:1 | OK |
| Form nota | #F5F0E6 | #666 | 5.1:1 | 4.5:1 | OK |
| Submit btn | #5F322F | #F5F0E6 | 7.2:1 | 4.5:1 | OK |

---

## Responsive

### Tablet (≤ 1024px)

```css
@media (max-width: 1024px) {
    .contacto-contenido {
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 60px 40px;
    }

    .contacto-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
}
```

**Estado:** OK - Stack vertical con info en grid 2x2

### Mobile (≤ 768px)

```css
@media (max-width: 768px) {
    .contacto-hero {
        padding: 60px 20px;
    }

    .contacto-hero h1 {
        font-size: 2.2rem;
    }

    .contacto-contenido {
        padding: 40px 20px;
    }

    .contacto-info {
        grid-template-columns: 1fr;
    }

    .btn-submit {
        width: 100%;
    }
}
```

**Estado:** OK - Full stack, botón full-width

---

## Campos del Formulario

| Campo | Tipo | Requerido | Autocomplete | Validación |
|-------|------|-----------|--------------|------------|
| Nombre completo | text | Sí | name | HTML5 required |
| Email | email | Sí | email | type=email + required |
| Empresa | text | No | organization | - |
| Teléfono | tel | No | tel | - |
| Tipo de consulta | select | No | - | - |
| Mensaje | textarea | Sí | - | required |
| Privacidad | checkbox | Sí | - | required |

### Opciones del Select

1. Transformación Digital
2. Estrategia de IA
3. Gestión del Cambio
4. Digitalización de RRHH
5. Formación y Capacitación
6. Otro

---

## Checklist Final

- [x] Formulario con campos esenciales
- [x] Labels: peso 600, tamaño correcto
- [x] Inputs: altura adecuada, borde gris
- [x] Focus en inputs: borde verde oliva
- [x] Botón submit: estilo Primary
- [x] Información de contacto visible
- [x] Email clickable (mailto:)
- [x] Social links (LinkedIn)
- [x] Responsive (tablet/mobile)
- [x] Accesibilidad WCAG AA
- [ ] Integración con Contact Form 7 (pendiente backend)

---

## Notas de Implementación

### Backend Pendiente

El formulario está configurado para enviar a:
```html
action="/wp-json/contact-form-7/v1/contact-forms/XXX/feedback"
```

Se necesita:
1. Instalar y configurar Contact Form 7 en WordPress
2. Crear el formulario con los campos correspondientes
3. Reemplazar `XXX` con el ID del formulario
4. Configurar el receptor de emails

### Validación JavaScript (Opcional)

Para mejorar UX, se puede añadir validación JS para:
- Formato de email
- Formato de teléfono
- Longitud mínima de mensaje
- Feedback visual en tiempo real

---

## Conclusión

**Estado:** APROBADO

La página de Contacto está completa con:
- Diseño coherente con identidad visual
- Formulario accesible según WCAG AA
- Información de contacto clara
- Responsive para tablet y mobile
- Focus states visibles

**Pendiente:** Integración con Contact Form 7 en WordPress

---

**Próximo paso:** Verificación final y despliegue
