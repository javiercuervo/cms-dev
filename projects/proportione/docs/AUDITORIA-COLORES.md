# Auditoría de Colores e Identidad Visual - Proportione

**Fecha:** Enero 2026
**Estado:** Completada
**Archivos revisados:**
- `/assets/custom-styles-v3.css`
- `/assets/proportione-contrast.css`
- `/assets/accesibilidad.css`
- `/assets/custom-styles.css`
- `/assets/custom-elementor.css`
- `/wp-content/themes/twentytwentythree-child/style.css`

---

## Resumen Ejecutivo

| Aspecto | Estado | Notas |
|---------|--------|-------|
| Variables CSS corporativas | OK | Correctamente definidas en `:root` |
| Paleta de colores | OK | Colores corporativos aplicados |
| Tipografías | ACTUALIZAR | Bourbon Grotesque + Raleway (cambio de Oswald) |
| Sistema de contraste | OK | Implementado para fondos oscuros/claros |
| Organización CSS | MEJORABLE | Múltiples archivos con duplicación |
| Uso de !important | MEJORABLE | Excesivo, dificulta mantenimiento |

---

## 1. Colores Corporativos

### 1.1 Variables CSS Definidas

```css
:root {
    --color-primary: #5F322F;    /* Granate - OK */
    --color-secondary: #551122;  /* Burdeos oscuro - OK */
    --color-accent: #6E8157;     /* Verde oliva - OK */
    --color-neutral: #AEADB3;    /* Gris neutro - OK */
    --color-cream: #F5F0E6;      /* Crema - OK */
    --font-titles: 'Bourbon Grotesque';  /* ACTUALIZAR (antes: Oswald) */
    --font-body: 'Raleway';      /* OK */
}
```

### 1.2 Verificación vs IDENTIDAD-VISUAL.md

| Color | Especificación | CSS Actual | Estado |
|-------|---------------|------------|--------|
| Primary | `#5F322F` | `#5F322F` | OK |
| Secondary | `#551122` | `#551122` | OK |
| Accent/Verde | `#6E8157` | `#6E8157` | OK |
| Neutral | `#AEADB3` | `#AEADB3` | OK |
| Cream | `#F5F0E6` | `#F5F0E6` | OK |
| Verde alternativo | `#3B431C` | No definido | PENDIENTE |
| Verde alternativo | `#566E30` | No definido | PENDIENTE |

### 1.3 Aplicación de Colores

| Elemento | Color Esperado | Estado |
|----------|---------------|--------|
| Títulos (H1-H6) | `#5F322F` | OK |
| Texto body | `#333333` | OK |
| Enlaces | `#6E8157` | OK |
| Enlaces hover | `#5F322F` | OK |
| Footer fondo | `#5F322F` | OK |
| Footer texto | `#F5F0E6` | OK |
| Header borde | `#5F322F` (3px) | OK |
| CTA botones | `#5F322F` | OK |
| CTA hover | `#551122` | OK |

---

## 2. Tipografías

### 2.1 Tipografías Corporativas

| Rol | Tipografía | Uso |
|-----|------------|-----|
| **Títulos** | Bourbon Grotesque | Logotipo, H1-H6, títulos destacados |
| **Cuerpo** | Raleway | Textos, navegación, botones |

> **NOTA:** Bourbon Grotesque es la tipografía oficial de marca. Anteriormente se usaba Oswald como placeholder. Los archivos CSS deben actualizarse para cargar Bourbon Grotesque (tipografía propietaria, no disponible en Google Fonts).

### 2.2 Importación CSS (a actualizar)

```css
/* ANTES (Oswald - placeholder) */
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Raleway:wght@400;500;600;700&display=swap');

/* DESPUÉS (Bourbon Grotesque - cargar localmente) */
@font-face {
    font-family: 'Bourbon Grotesque';
    src: url('/assets/fonts/bourbon-grotesque.woff2') format('woff2');
    font-weight: 400;
    font-display: swap;
}
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap');
```

**ADVERTENCIA:** El @import de Google Fonts aparece duplicado en múltiples archivos:
- `custom-styles-v3.css`
- `proportione-contrast.css`
- `custom-styles.css`

**Recomendación:** Centralizar la importación en un solo archivo o en el `functions.php` vía `wp_enqueue_style`.

### 2.3 Aplicación de Tipografías

| Elemento | Fuente Esperada | Estado |
|----------|----------------|--------|
| H1-H6 | Bourbon Grotesque | PENDIENTE (actualmente Oswald) |
| Body/párrafos | Raleway | OK |
| Navegación | Raleway | OK |
| Botones | Raleway | OK |

---

## 3. Sistema de Contraste

### 3.1 Fondos Oscuros

Se ha implementado un sistema robusto para detectar fondos oscuros y aplicar texto claro:

```css
/* Selectores por color de fondo */
[style*="background-color:#5"] *,
[style*="background-color:#3"] *,
[style*="background-color:#2"] *,
[style*="background-color:#1"] *,
[style*="background-color:#0"] * {
    color: #F5F0E6 !important;
}
```

**Estado:** OK - Cubre la mayoría de casos

### 3.2 Fondos Claros

```css
[style*="background-color:#F"] *,
[style*="background-color:#E"] *,
[style*="background-color:#D"] *,
/* ... */
{
    color: #333333 !important;
}
```

**Estado:** OK - Texto oscuro en fondos claros

### 3.3 Casos Especiales

| Caso | Tratamiento | Estado |
|------|-------------|--------|
| Footer (granate) | Texto crema + logo invertido | OK |
| Hero con imagen | Overlay granate 75% | OK |
| Cover blocks | Texto crema | OK |
| Stackable con fondo | Detección automática | OK |

---

## 4. Problemas Identificados

### 4.1 Organización de Archivos CSS

**Problema:** Hay 5 archivos CSS con estilos superpuestos:

| Archivo | Líneas | Contenido |
|---------|--------|-----------|
| `custom-styles-v3.css` | 354 | Estilos principales |
| `proportione-contrast.css` | 412 | Sistema de contraste |
| `accesibilidad.css` | 200 | Navegación y accesibilidad |
| `custom-styles.css` | 208 | Versión anterior |
| `custom-elementor.css` | 199 | Estilos Elementor |

**Impacto:**
- Duplicación de código
- Posibles conflictos de especificidad
- Dificultad de mantenimiento

**Recomendación:** Consolidar en 2-3 archivos:
1. `proportione-base.css` - Variables, tipografía, colores base
2. `proportione-layout.css` - Header, footer, grid, responsive
3. `proportione-components.css` - Botones, cards, formularios

### 4.2 Uso Excesivo de !important

**Problema:** Casi todas las reglas usan `!important`

```css
/* Ejemplo actual */
h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-titles) !important;
    color: var(--color-primary) !important;
}
```

**Impacto:**
- Dificulta sobrescribir estilos cuando es necesario
- Indica problemas de especificidad subyacentes
- Complica el mantenimiento

**Recomendación:**
- Aumentar especificidad de selectores en lugar de usar `!important`
- Cargar CSS después de los estilos del tema/plugins
- Reservar `!important` solo para casos críticos

### 4.3 Color No Corporativo Detectado

**Problema:** En `proportione-contrast.css` hay una regla para eliminar el magenta:

```css
/* Eliminar el magenta #f00069 de TODOS los contextos */
[style*="#f00069"],
[style*="rgb(240, 0, 105)"] {
    color: #6E8157 !important;
    background-color: #6E8157 !important;
}
```

**Impacto:** Indica que algún plugin o configuración está introduciendo colores no corporativos.

**Recomendación:** Identificar la fuente del magenta y corregirla en origen (probablemente Stackable o Elementor).

### 4.4 Child Theme Vacío

**Problema:** El archivo `/wp-content/themes/twentytwentythree-child/style.css` solo contiene el header del tema, sin estilos personalizados.

**Impacto:** Los estilos no se cargan automáticamente vía WordPress.

**Recomendación:**
- Los estilos de `/assets/` deben ser encolados vía `functions.php`
- O bien importarlos en el `style.css` del child theme

---

## 5. Verificación en Staging

### 5.1 URLs a Verificar Manualmente

- [ ] Homepage: https://staging19.proportione.com/
- [ ] Página Mayte: Verificar colores en secciones
- [ ] Página Javier: Verificar colores en secciones
- [ ] Blog: Verificar grid y cards
- [ ] Contacto: Verificar formulario

### 5.2 Herramientas de Verificación

```bash
# Verificar contraste (usar extensión de navegador)
# - WAVE Web Accessibility Evaluator
# - Chrome DevTools > Lighthouse

# Verificar colores hex
# - ColorZilla extension
# - DevTools > Computed Styles
```

---

## 6. Acciones Recomendadas

### Prioridad Alta

1. **Verificar carga de CSS en staging**
   - Confirmar que los archivos de `/assets/` se están cargando
   - Verificar orden de carga (después de tema/plugins)

2. **Identificar fuente del magenta #f00069**
   - Revisar configuración de Stackable
   - Revisar paleta de colores en WordPress

### Prioridad Media

3. **Consolidar archivos CSS**
   - Unificar `custom-styles.css` y `custom-styles-v3.css`
   - Crear estructura modular

4. **Reducir uso de !important**
   - Aumentar especificidad donde sea necesario
   - Revisar orden de carga de CSS

### Prioridad Baja

5. **Añadir colores secundarios faltantes**
   - `#3B431C` (verde oscuro)
   - `#566E30` (verde medio)

6. **Documentar sistema de CSS**
   - Crear guía de uso de variables
   - Documentar convenciones de nomenclatura

---

## 7. Conclusión

**Estado General:** APROBADO con observaciones

La identidad visual de Proportione está correctamente implementada:
- Colores corporativos definidos y aplicados
- Tipografías: **Bourbon Grotesque** (títulos) + **Raleway** (cuerpo)
- Sistema de contraste funcional

**Áreas de mejora:**
- Consolidación de archivos CSS
- Reducción de `!important`
- Eliminación de color magenta en origen
- **Actualizar CSS para cargar Bourbon Grotesque** (reemplazar Oswald)

---

**Próximo paso:** Tarea #2 - Auditoría global de tipografía y jerarquía
