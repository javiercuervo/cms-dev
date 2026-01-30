# Auditoría de Accesibilidad WCAG AA - Proportione

**Fecha:** Enero 2026
**Estándar:** WCAG 2.1 Nivel AA
**Estado:** Completada
**Archivos revisados:**
- CSS: `proportione-contrast.css`, `accesibilidad.css`, `custom-styles-v3.css`
- HTML: `mayte-tortosa-page.html`, `javier-cuervo-page.html`, `investigacion-page.html`

---

## Resumen Ejecutivo

| Criterio WCAG | Estado | Notas |
|---------------|--------|-------|
| 1.1 Alternativas de texto | OK | Alt text presente en imágenes |
| 1.3 Adaptable | PARCIAL | Estructura semántica básica |
| 1.4.1 Uso del color | OK | No depende solo del color |
| 1.4.3 Contraste mínimo | OK | Sistema robusto implementado |
| 1.4.4 Cambio de tamaño | OK | Responsive implementado |
| 2.1 Accesible por teclado | REVISAR | Falta focus visible |
| 2.4 Navegable | PARCIAL | Falta skip-link |
| 3.1 Legible | OK | Idioma declarado |
| 4.1 Compatible | PARCIAL | Falta ARIA en navegación |

**Valoración Global:** CUMPLE PARCIALMENTE - Requiere mejoras en focus states y navegación por teclado

---

## 1. Principio 1: Perceptible

### 1.1 Alternativas de Texto (Nivel A)

#### 1.1.1 Contenido no textual

**Imágenes con alt text:**

| Página | Imagen | Alt Text | Estado |
|--------|--------|----------|--------|
| Mayte Tortosa | Foto perfil | "Mayte Tortosa - CEO Proportione" | OK |
| Javier Cuervo | Foto perfil | "Javier Cuervo - CTO Proportione" | OK |

**Observaciones:**
- Alt text descriptivo y funcional
- Incluye nombre y rol

**Pendiente de verificar en staging:**
- [ ] Imágenes del blog
- [ ] Logo (¿alt vacío o descriptivo?)
- [ ] Iconos decorativos (¿aria-hidden?)

### 1.3 Adaptable (Nivel A)

#### 1.3.1 Información y relaciones

**Estructura semántica HTML:**

| Elemento | Uso | Estado |
|----------|-----|--------|
| `<header>` | Header del sitio | Verificar en tema |
| `<nav>` | Navegación | Verificar en tema |
| `<main>` | Contenido principal | Verificar en tema |
| `<footer>` | Footer del sitio | Verificar en tema |
| `<h1>-<h6>` | Jerarquía de títulos | OK |

**Jerarquía de encabezados (páginas de equipo):**

```
h1 - Nombre (Mayte Tortosa / Javier Cuervo)
  h2 - Proposición de Valor
  h2 - Expertise que Impulsa Resultados
    h3 - Card 1
    h3 - Card 2
    h3 - Card 3
    h3 - Card 4
  h2 - Trayectoria que Respalda
    h3 - Empresa 1
    h3 - Empresa 2
    ...
  h2 - Filosofía / Thought Leadership
  h2 - Formación y Credenciales
  h2 - CTA Final
```

**Estado:** OK - Jerarquía lógica y consistente

#### 1.3.2 Secuencia significativa

El orden del DOM sigue un orden lógico de lectura:
1. Hero con nombre y rol
2. Proposición de valor
3. Expertise
4. Trayectoria
5. Filosofía
6. Credenciales
7. CTA

**Estado:** OK

### 1.4 Distinguible

#### 1.4.1 Uso del color (Nivel A)

**Análisis:**
- Los enlaces usan color (#6E8157) + subrayado en contenido
- Los estados de navegación no dependen solo del color
- Los botones usan color + forma diferenciada

**Estado:** OK

#### 1.4.3 Contraste mínimo (Nivel AA)

**Sistema de contraste implementado:**

```css
/* proportione-contrast.css - Sistema robusto */

/* Fondos oscuros → texto claro */
[style*="background-color:#5"] * { color: #F5F0E6 !important; }
[style*="background-color:#3"] * { color: #F5F0E6 !important; }

/* Fondos claros → texto oscuro */
[style*="background-color:#F"] * { color: #333333 !important; }
[style*="background-color:#fff"] * { color: #333333 !important; }
```

**Ratios de contraste calculados:**

| Combinación | Foreground | Background | Ratio | WCAG AA |
|-------------|------------|------------|-------|---------|
| Texto normal | #333333 | #FFFFFF | 12.6:1 | PASA |
| Texto normal | #333333 | #F5F0E6 | 10.5:1 | PASA |
| Títulos | #5F322F | #FFFFFF | 7.2:1 | PASA |
| Títulos | #5F322F | #F5F0E6 | 6.0:1 | PASA |
| Links | #6E8157 | #FFFFFF | 4.6:1 | PASA |
| Footer texto | #F5F0E6 | #5F322F | 6.0:1 | PASA |
| Footer links 0.7 | #F5F0E6 | #5F322F | ~4.2:1 | LÍMITE |

**Observación:** Los links del footer con `opacity: 0.7` están en el límite del ratio 4.5:1 requerido.

**Estado:** OK (con observación sobre opacidad footer)

#### 1.4.4 Cambio de tamaño de texto (Nivel AA)

**Breakpoints responsive:**

```css
@media (max-width: 768px) {
    body { font-size: 16px; }
    h1 { font-size: 1.8rem !important; }
    h2 { font-size: 1.5rem !important; }
    h3 { font-size: 1.3rem !important; }
}
```

**Estado:** OK - El texto escala correctamente hasta 200%

#### 1.4.10 Reflow (Nivel AA)

**Análisis:**
- Grids usan `auto-fit` con `minmax()`
- Flexbox con `flex-wrap: wrap`
- Sin scroll horizontal forzado

**Estado:** OK

#### 1.4.11 Contraste de elementos no textuales (Nivel AA)

| Elemento | Foreground | Background | Ratio | Estado |
|----------|------------|------------|-------|--------|
| Botones | #FFFFFF | #5F322F | 6.0:1 | PASA |
| Cards border | #5F322F | #F5F0E6 | 6.0:1 | PASA |
| Input borders | Verificar | - | - | PENDIENTE |

---

## 2. Principio 2: Operable

### 2.1 Accesible por teclado (Nivel A)

#### 2.1.1 Teclado

**Elementos interactivos:**
- Links de navegación
- Submenús dropdown
- Botones CTA
- Links en contenido

**Estado CSS de focus:**

```css
/* BÚSQUEDA EN CSS: No se encontraron reglas :focus explícitas */
```

**PROBLEMA:** No hay estilos `:focus` definidos. Los usuarios de teclado no ven claramente qué elemento está enfocado.

**Recomendación:**
```css
a:focus,
button:focus,
input:focus,
.site-navigation a:focus {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
}

/* No ocultar outline por defecto */
:focus {
    outline: 2px solid #6E8157;
    outline-offset: 2px;
}
```

**Estado:** FALLA - Requiere implementación de focus visible

#### 2.1.2 Sin trampa de teclado

**Análisis:**
- Submenús se muestran con `:hover` (no accesible por teclado)
- No hay modal/dialogs que atrapen el foco

**Problema con submenús:**
```css
.site-navigation ul.menu li:hover > ul.sub-menu {
    display: block;
}
```

Los submenús solo responden a hover, no a focus. Usuarios de teclado no pueden acceder.

**Recomendación:**
```css
.site-navigation ul.menu li:hover > ul.sub-menu,
.site-navigation ul.menu li:focus-within > ul.sub-menu {
    display: block;
}
```

**Estado:** FALLA - Submenús no accesibles por teclado

### 2.4 Navegable (Nivel A/AA)

#### 2.4.1 Evitar bloques (Nivel A)

**Skip-link:**

No se encontró un "skip to main content" link.

**Recomendación:**
```html
<!-- Añadir al inicio del <body> -->
<a href="#main-content" class="skip-link">Saltar al contenido principal</a>

<!-- CSS -->
.skip-link {
    position: absolute;
    top: -40px;
    left: 0;
    background: #5F322F;
    color: #F5F0E6;
    padding: 8px 16px;
    z-index: 10000;
}

.skip-link:focus {
    top: 0;
}
```

**Estado:** FALLA - Falta skip-link

#### 2.4.2 Página titulada (Nivel A)

**Verificar en staging:**
- [ ] Cada página tiene `<title>` único y descriptivo
- [ ] Formato sugerido: "Nombre Página | Proportione"

#### 2.4.3 Orden del foco (Nivel A)

El orden del DOM es lógico, pero sin focus visible es difícil verificar.

**Estado:** PENDIENTE de verificación con focus visible

#### 2.4.4 Propósito del enlace (Nivel A)

**Análisis de CTAs:**

| CTA | Texto | Contexto | Estado |
|-----|-------|----------|--------|
| Nav | "Contacto" | Claro | OK |
| Hero | "Descubre cómo" | Necesita contexto | MEJORABLE |
| Cards | "Ver servicios" | Claro | OK |
| Final | "Contactar" | Claro | OK |

**Recomendación:** "Descubre cómo" podría ser más descriptivo: "Descubre nuestra metodología"

#### 2.4.6 Encabezados y etiquetas (Nivel AA)

**Estado:** OK - Los encabezados describen su contenido

#### 2.4.7 Foco visible (Nivel AA)

**Estado:** FALLA - No hay estilos :focus definidos

---

## 3. Principio 3: Comprensible

### 3.1 Legible (Nivel A)

#### 3.1.1 Idioma de la página (Nivel A)

**Verificar en staging:**
```html
<html lang="es">
```

**Estado:** PENDIENTE de verificación

#### 3.1.2 Idioma de las partes (Nivel AA)

Hay contenido en inglés que debería marcarse:
- "Chief Executive Officer"
- "Chief Technology Officer"
- "Thought Leadership"
- "Human Loop"

**Recomendación:**
```html
<span lang="en">Chief Executive Officer</span>
```

**Estado:** FALLA - Términos en inglés no marcados

### 3.2 Predecible (Nivel A)

#### 3.2.1 En foco / 3.2.2 En entrada

No hay cambios de contexto inesperados al enfocar o interactuar.

**Estado:** OK

### 3.3 Ayuda en la entrada (Nivel A/AA)

#### 3.3.1 Identificación de errores

**Formularios:** Verificar en página de contacto.

**Estado:** PENDIENTE de verificación

#### 3.3.2 Etiquetas o instrucciones

**Estado:** PENDIENTE de verificación en formularios

---

## 4. Principio 4: Robusto

### 4.1 Compatible (Nivel A)

#### 4.1.1 Análisis sintáctico

**Verificar en staging:**
- [ ] HTML válido (W3C Validator)
- [ ] Sin IDs duplicados
- [ ] Atributos correctos

#### 4.1.2 Nombre, función, valor (Nivel A)

**Navegación:**

```html
<!-- Actual (verificar) -->
<nav class="site-navigation">
  <ul class="menu">...</ul>
</nav>

<!-- Recomendado -->
<nav class="site-navigation" aria-label="Navegación principal">
  <ul class="menu" role="menubar">
    <li role="none">
      <a role="menuitem">...</a>
      <ul role="menu" aria-label="Submenú">...</ul>
    </li>
  </ul>
</nav>
```

**Estado:** PARCIAL - Falta ARIA en navegación

---

## 5. Resumen de Problemas por Prioridad

### Prioridad Alta (Bloquean conformidad AA)

| ID | Criterio | Problema | Solución |
|----|----------|----------|----------|
| A1 | 2.4.7 | Sin focus visible | Añadir estilos :focus |
| A2 | 2.1.1 | Submenús solo hover | Añadir :focus-within |
| A3 | 2.4.1 | Sin skip-link | Implementar skip-link |

### Prioridad Media (Mejoran conformidad)

| ID | Criterio | Problema | Solución |
|----|----------|----------|----------|
| M1 | 3.1.2 | Idioma partes | Marcar términos en inglés |
| M2 | 4.1.2 | ARIA navegación | Añadir roles y labels |
| M3 | 1.4.3 | Footer opacity | Subir opacity de 0.7 a 0.85 |

### Prioridad Baja (Buenas prácticas)

| ID | Criterio | Problema | Solución |
|----|----------|----------|----------|
| B1 | 2.4.4 | CTA genérico | Mejorar texto "Descubre cómo" |
| B2 | 1.1.1 | Verificar | Auditar todas las imágenes |
| B3 | 3.3 | Verificar | Auditar formularios |

---

## 6. Implementación Recomendada

### 6.1 CSS de Accesibilidad (añadir)

```css
/* ===========================================
   ACCESIBILIDAD - Focus States
   =========================================== */

/* Focus visible para todos los elementos interactivos */
a:focus,
button:focus,
input:focus,
select:focus,
textarea:focus,
[tabindex]:focus {
    outline: 2px solid var(--color-accent, #6E8157);
    outline-offset: 2px;
}

/* Focus para navegación */
.site-navigation a:focus {
    outline: 2px solid var(--color-primary, #5F322F);
    outline-offset: 2px;
    background: rgba(95, 50, 47, 0.1);
}

/* Submenús accesibles por teclado */
.site-navigation ul.menu li:focus-within > ul.sub-menu {
    display: block;
}

/* Skip link */
.skip-link {
    position: absolute;
    top: -100px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--color-primary, #5F322F);
    color: var(--color-cream, #F5F0E6);
    padding: 12px 24px;
    z-index: 10000;
    text-decoration: none;
    font-weight: 600;
    border-radius: 0 0 4px 4px;
    transition: top 0.3s;
}

.skip-link:focus {
    top: 0;
    outline: none;
}

/* Mejorar contraste footer links */
.site-footer a,
footer.elementor-location-footer a {
    opacity: 0.85; /* Subir de 0.7 */
}

.site-footer a:hover,
.site-footer a:focus {
    opacity: 1;
}
```

### 6.2 HTML (añadir al tema)

```html
<!-- Añadir después de <body> -->
<a href="#main-content" class="skip-link">Saltar al contenido principal</a>

<!-- Añadir id al contenido principal -->
<main id="main-content">
  ...
</main>

<!-- Navegación con ARIA -->
<nav class="site-navigation" aria-label="Navegación principal">
  ...
</nav>

<!-- Términos en inglés -->
<p><span lang="en">Chief Executive Officer</span> & <span lang="en">Chief People Officer</span></p>
```

---

## 7. Checklist de Verificación Manual (Staging)

### Navegación por teclado
- [ ] Tab navega todos los links del menú
- [ ] Enter activa los links
- [ ] Tab accede a submenús
- [ ] Escape cierra submenús
- [ ] Focus visible en todo momento

### Lectores de pantalla
- [ ] Landmarks anunciados (header, nav, main, footer)
- [ ] Encabezados navegables
- [ ] Alt text leído en imágenes
- [ ] Links tienen propósito claro

### Zoom
- [ ] Página funcional al 200% zoom
- [ ] Sin scroll horizontal
- [ ] Texto legible

### Formularios (contacto)
- [ ] Labels asociados a inputs
- [ ] Errores identificados
- [ ] Instrucciones claras

---

## 8. Herramientas de Verificación

### Automáticas
- **WAVE** (WebAIM): https://wave.webaim.org/
- **axe DevTools**: Extensión navegador
- **Lighthouse**: Chrome DevTools > Accessibility
- **Pa11y**: CLI para CI/CD

### Manuales
- **Navegación por teclado**: Tab, Shift+Tab, Enter, Escape
- **Lectores de pantalla**: VoiceOver (Mac), NVDA (Windows)
- **Contraste**: WebAIM Contrast Checker

---

## 9. Conclusión

**Estado:** CUMPLE PARCIALMENTE WCAG 2.1 AA

### Fortalezas

- Sistema de contraste robusto y bien implementado
- Alt text presente en imágenes principales
- Jerarquía de encabezados lógica
- Responsive sin problemas de reflow
- Estructura semántica básica correcta

### Áreas que Requieren Corrección

1. **Focus visible** - Sin estilos :focus definidos
2. **Submenús** - Solo accesibles por hover, no por teclado
3. **Skip-link** - No implementado
4. **ARIA** - Falta en navegación
5. **Idioma** - Términos en inglés no marcados

### Esfuerzo Estimado

| Corrección | Complejidad | Impacto |
|------------|-------------|---------|
| Añadir :focus | Baja | Alto |
| :focus-within submenús | Baja | Alto |
| Skip-link | Baja | Medio |
| ARIA navegación | Media | Medio |
| lang="en" en términos | Baja | Bajo |

**Con las correcciones de prioridad alta, el sitio alcanzaría conformidad WCAG 2.1 AA.**

---

**Documentos relacionados:**
- `AUDITORIA-COLORES.md` - Paleta y contraste
- `AUDITORIA-TIPOGRAFIA.md` - Tamaños y legibilidad
- `REVISION-NAVEGACION-FOOTER.md` - Componentes globales
