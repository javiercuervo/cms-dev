# Revisión de Navegación y Footer Globales

**Fecha:** Enero 2026
**Archivos CSS:**
- `assets/accesibilidad.css` (líneas 85-199)
- `assets/custom-styles-v3.css` (líneas 128-252)
- `assets/staging-css-backup-20260128-202244.css` (líneas 342-390)
**Estado:** Revisada
**Referencia:** Guías de diseño y comunicación

---

## Resumen Ejecutivo

| Componente | Estado | Observaciones |
|------------|--------|---------------|
| Header Layout | OK | Flex, sticky, z-index correcto |
| Logo | OK | Max-width 180px |
| Navegación Desktop | OK | Horizontal, uppercase, hover states |
| Submenús | OK | Dropdown con borde granate |
| CTA Contacto | OK | Botón destacado |
| Responsive Nav | OK | Toggle en ≤1024px |
| Footer Fondo | OK | Granate corporativo |
| Footer Contenido | REVISAR | Copyright desactualizado |
| Footer Links | OK | Legal presente |

**Valoración Global:** APROBADA con corrección de copyright

---

## 1. Header (Site Header)

### 1.1 Estructura CSS

```css
.site-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 50px;
    background: #fff;
    border-bottom: 3px solid #5F322F;
    position: relative;
    z-index: 999;
}
```

### 1.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Altura | 60-80px | ~60px (padding 15px) | OK |
| Fondo | Blanco o transparente | #fff | OK |
| Borde inferior | Opcional, primario | 3px #5F322F | OK |
| Layout | Flex space-between | Flex space-between | OK |
| Z-index | Alto (sticky) | 999 | OK |
| Padding desktop | 40-60px lateral | 50px | OK |

### 1.3 Logo

```css
img.custom-logo,
header img[class*="logo"],
.site-logo img {
    max-width: 180px !important;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Ancho máximo | 140-180px | 180px | OK |
| Posición | Izquierda | Izquierda (flex) | OK |

### 1.4 Recomendaciones Header

- [x] Layout flex correcto
- [x] Borde inferior corporativo
- [x] Z-index para sticky
- [x] Logo dimensiones correctas

---

## 2. Navegación Desktop

### 2.1 Menú Principal

```css
.site-navigation ul.menu {
    display: flex;
    flex-direction: row;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 0;
}

.site-navigation ul.menu > li > a {
    display: block;
    padding: 15px 20px;
    color: #333;
    text-decoration: none;
    font-family: 'Raleway', sans-serif;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    transition: color 0.3s;
}
```

### 2.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Display | Flex horizontal | Flex row | OK |
| Font-family | Raleway | Raleway | OK |
| Font-size | 14-16px | 14px | OK |
| Font-weight | 400-500 | 600 | ALTO |
| Text-transform | Uppercase opcional | uppercase | OK |
| Padding items | 15-20px | 15px 20px | OK |
| Color normal | #333 | #333 | OK |
| Transición | Sí | 0.3s | OK |

### 2.3 Hover y Active States

```css
.site-navigation ul.menu > li > a:hover,
.site-navigation ul.menu > li.current-menu-item > a {
    color: #5F322F;
}
```

| Estado | Guía | Actual | Estado |
|--------|------|--------|--------|
| Hover | Color primario | #5F322F | OK |
| Active/Current | Destacado | #5F322F | OK |

### 2.4 Recomendaciones Navegación

- [x] Layout horizontal correcto
- [x] Tipografía Raleway
- [x] Hover states con color primario
- [ ] Considerar reducir font-weight de 600 a 500

---

## 3. Submenús (Dropdowns)

### 3.1 Estructura CSS

```css
.site-navigation ul.menu li ul.sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 220px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    padding: 10px 0;
    z-index: 1000;
    border-top: 3px solid #5F322F;
}

.site-navigation ul.menu li:hover > ul.sub-menu {
    display: block;
}
```

### 3.2 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Display | Hidden por defecto | display: none | OK |
| Trigger | Hover | :hover | OK |
| Posición | Absolute bajo parent | top: 100% | OK |
| Fondo | Blanco | #fff | OK |
| Sombra | Sutil | 0 5px 20px rgba(0,0,0,0.15) | OK |
| Ancho mínimo | 200-250px | 220px | OK |
| Borde superior | Color primario | 3px #5F322F | OK |
| Z-index | Mayor que header | 1000 | OK |

### 3.3 Items de Submenú

```css
.site-navigation ul.menu li ul.sub-menu li a {
    display: block;
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}

.site-navigation ul.menu li ul.sub-menu li a:hover {
    background: #f5f5f5;
    color: #5F322F;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Padding | 10-15px | 10px 20px | OK |
| Font-size | 14px | 14px | OK |
| Font-weight | 400-500 | 500 | OK |
| Hover background | Gris claro | #f5f5f5 | OK |
| Hover color | Primario | #5F322F | OK |

### 3.4 Recomendaciones Submenús

- [x] Estructura dropdown correcta
- [x] Borde granate coherente con header
- [x] Sombra sutil
- [x] Hover states implementados

---

## 4. CTA Contacto (Botón Navegación)

### 4.1 Estructura CSS

```css
.site-header nav ul.menu > li.cta-button > a,
.site-header nav ul.menu > li:last-child > a {
    background: var(--color-primary);
    color: #fff !important;
    border-radius: 4px;
    padding: 10px 20px;
    border-bottom: none;
}

.site-header nav ul.menu > li.cta-button > a:hover,
.site-header nav ul.menu > li:last-child > a:hover {
    background: var(--color-secondary);
}
```

### 4.2 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Primario | var(--color-primary) | OK |
| Texto | Blanco | #fff | OK |
| Border-radius | 4-6px | 4px | OK |
| Padding | Similar a otros botones | 10px 20px | OK |
| Hover | Más oscuro | var(--color-secondary) | OK |

### 4.3 Observación

El selector usa `:last-child` como fallback para el botón CTA. Esto funciona si "Contacto" es siempre el último item del menú. Alternativa más robusta: usar clase `.cta-button`.

### 4.4 Recomendaciones CTA

- [x] Estilo de botón correcto
- [x] Hover más oscuro
- [x] Variables CSS usadas
- [ ] Considerar usar solo clase `.cta-button` (no `:last-child`)

---

## 5. Navegación Responsive

### 5.1 Breakpoint 1024px

```css
@media (max-width: 1024px) {
    .site-navigation {
        display: none !important;
    }
    .site-navigation-dropdown,
    .site-navigation-toggle-holder {
        display: block !important;
    }
    .site-header {
        padding: 15px 20px;
    }
}
```

### 5.2 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Breakpoint | 1024-1025px | 1024px | OK |
| Menú desktop | Oculto | display: none | OK |
| Toggle mobile | Visible | display: block | OK |
| Padding reducido | Sí | 15px 20px | OK |

### 5.3 Elementos Mobile

| Elemento | Selector | Estado |
|----------|----------|--------|
| Toggle button | `.site-navigation-toggle-holder` | OK |
| Menú dropdown | `.site-navigation-dropdown` | OK |

### 5.4 Recomendaciones Responsive

- [x] Breakpoint correcto
- [x] Toggle visible en mobile
- [x] Padding ajustado
- [ ] Verificar funcionamiento del menú mobile en staging

---

## 6. Footer

### 6.1 Estructura CSS Principal

```css
.site-footer,
footer.elementor-location-footer {
    background: var(--color-primary);
    padding: 40px 50px;
}

.site-footer p,
.site-footer a,
footer.elementor-location-footer p,
footer.elementor-location-footer a {
    color: #fff !important;
    font-family: var(--font-body);
}
```

### 6.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Gris oscuro o primario | var(--color-primary) #5F322F | OK |
| Texto | Claro sobre oscuro | #fff | OK |
| Font-family | Raleway | var(--font-body) | OK |
| Padding | 40-60px | 40px 50px | OK |
| Altura mínima | 300-400px | Variable | OK |

### 6.3 Logo en Footer

```css
.site-footer img.custom-logo,
footer.elementor-location-footer img {
    filter: brightness(0) invert(1);
    max-width: 180px;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Inversión color | Sí (sobre fondo oscuro) | brightness(0) invert(1) | OK |
| Max-width | Igual que header | 180px | OK |

### 6.4 Links Legales

```css
.footer-legal-links {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.2);
    font-size: 14px;
}

.footer-legal-links a {
    margin-right: 20px;
    color: #fff;
    opacity: 0.7;
    text-decoration: none;
}

.footer-legal-links a:hover {
    opacity: 1;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Separador | Línea sutil | 1px rgba(255,255,255,0.2) | OK |
| Font-size | 12-14px | 14px | OK |
| Opacidad normal | Reducida | 0.7 | OK |
| Hover | Aumentar opacidad | 1 | OK |

### 6.5 Copyright

```css
.footer-copyright {
    margin-top: 15px;
    font-size: 13px;
    opacity: 0.7;
}
```

**PROBLEMA DETECTADO:** Según la revisión de Homepage, el copyright muestra "© 2024" en lugar de "© 2026".

### 6.6 Contenido del Footer (según Homepage)

| Elemento | Presente | Estado |
|----------|----------|--------|
| Navegación rápida | Inicio, Consultoría, Blog, Contacto | OK |
| Links legales | Privacidad, Cookies | OK |
| Copyright | "© 2024 Proportione" | DESACTUALIZADO |
| Social media | No | FALTA |

### 6.7 Recomendaciones Footer

- [x] Fondo granate corporativo
- [x] Texto blanco/claro
- [x] Logo invertido
- [x] Links legales con hover
- [ ] **Actualizar copyright a 2026**
- [ ] Considerar añadir social media links
- [ ] Considerar newsletter signup

---

## 7. Consistencia Entre Archivos CSS

### 7.1 Duplicación Detectada

Los estilos de navegación y footer aparecen en múltiples archivos:

| Archivo | Contenido | Estado |
|---------|-----------|--------|
| `accesibilidad.css` | Header, nav, submenús | Completo |
| `custom-styles-v3.css` | Header, nav, footer | Completo |
| `staging-css-backup` | Footer adicional | Parcial |

### 7.2 Conflictos Potenciales

```css
/* En accesibilidad.css */
.site-header {
    padding: 15px 50px;
}

/* En custom-styles-v3.css */
.site-header {
    padding: 0 50px;
    min-height: 80px;
}
```

**Problema:** Dos definiciones diferentes de padding para `.site-header`.

### 7.3 Recomendaciones de Consolidación

- [ ] Unificar estilos de header en un solo archivo
- [ ] Eliminar duplicaciones entre archivos
- [ ] Establecer orden de carga claro

---

## 8. Verificación de Accesibilidad

### 8.1 Contraste

| Elemento | Foreground | Background | Ratio Estimado | WCAG AA |
|----------|------------|------------|----------------|---------|
| Nav links | #333 | #fff | >10:1 | OK |
| Nav hover | #5F322F | #fff | ~7:1 | OK |
| Submenu | #333 | #fff | >10:1 | OK |
| Footer text | #fff | #5F322F | ~7:1 | OK |
| Footer links | #fff 0.7 | #5F322F | ~5:1 | REVISAR |

### 8.2 Interactividad

| Aspecto | Estado |
|---------|--------|
| Focus states | No definidos explícitamente |
| Keyboard nav | Depende de HTML |
| ARIA labels | Depende de HTML |

### 8.3 Recomendaciones Accesibilidad

- [ ] Añadir focus states visibles para links
- [ ] Verificar opacidad 0.7 cumple contraste mínimo
- [ ] Añadir skip-to-content link

---

## 9. Checklist Final

### Header
- [x] Layout flex correcto
- [x] Borde inferior corporativo
- [x] Z-index para sticky
- [x] Logo dimensiones correctas
- [x] Responsive en 1024px

### Navegación
- [x] Menú horizontal
- [x] Tipografía Raleway
- [x] Hover states
- [x] Submenús funcionales
- [x] CTA Contacto destacado
- [ ] Reducir font-weight a 500

### Footer
- [x] Fondo granate
- [x] Texto claro
- [x] Logo invertido
- [x] Links legales
- [ ] **Actualizar copyright 2026**
- [ ] Añadir social media

### Técnico
- [ ] Consolidar CSS duplicado
- [ ] Resolver conflicto padding header
- [ ] Añadir focus states

---

## 10. Acciones Recomendadas

### Prioridad Alta

1. **Actualizar copyright** de 2024 a 2026
   - Ubicación: Footer del sitio (WordPress o Elementor)

2. **Resolver conflicto de padding** en `.site-header`
   - Unificar en un solo archivo

### Prioridad Media

3. **Reducir font-weight** de nav links de 600 a 500
4. **Añadir focus states** para accesibilidad
   ```css
   .site-navigation a:focus,
   .site-footer a:focus {
       outline: 2px solid var(--color-accent);
       outline-offset: 2px;
   }
   ```

5. **Consolidar archivos CSS** de navegación

### Prioridad Baja

6. **Añadir social media links** al footer
7. **Considerar newsletter signup**
8. **Añadir skip-to-content** para accesibilidad

---

## 11. Conclusión

**Estado:** APROBADA con corrección de copyright

**Puntos fuertes:**
- Header con layout flex correcto
- Navegación con hover states profesionales
- Submenús con borde granate coherente
- Footer con colores corporativos
- Responsive implementado en 1024px
- CTA Contacto destacado

**Áreas de mejora:**
- Copyright desactualizado (2024 → 2026)
- Font-weight de nav ligeramente alto
- CSS duplicado entre archivos
- Falta focus states para accesibilidad

---

**Próximo paso:** Tarea #9 - Auditoría de accesibilidad WCAG AA
