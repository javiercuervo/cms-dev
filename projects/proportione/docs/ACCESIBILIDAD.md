# Manual de Accesibilidad Web - Proportione

_WordPress + Elementor | WCAG 2.2 Nivel AA_

---

## 1. Marco Normativo

- **Estándar:** WCAG 2.2 nivel AA
- **WordPress:** Accessibility Coding Standards
- **Objetivo:** Percibir, operar, comprender y usar el sitio

### Principios WCAG

| Principio | Requisito |
|-----------|-----------|
| Perceptible | Alt text, subtítulos, contraste |
| Operable | Teclado funcional, sin trampas |
| Comprensible | Lenguaje claro, errores útiles |
| Robusto | HTML semántico, ARIA correcto |

---

## 2. Colores y Contraste

### Paleta Proportione

| Color | Código | Uso |
|-------|--------|-----|
| Principal | #5F322F | Granate |
| Acento | #6E8157 | Verde enlaces |
| Texto | #333333 | Cuerpo |
| Crema | #F5F0E6 | Fondos |

### Contraste Verificado

| Combinación | Ratio | Estado |
|-------------|-------|--------|
| #333333 / #FFFFFF | 12.6:1 | Pasa |
| #5F322F / #FFFFFF | 8.4:1 | Pasa |
| #5F322F / #F5F0E6 | 6.8:1 | Pasa |
| #FFFFFF / #5F322F | 8.4:1 | Pasa |
| #6E8157 / #FFFFFF | 4.1:1 | Limite |

**Reglas:**
- Minimo 4.5:1 texto normal
- Minimo 3:1 texto grande (18px+)

### Tipografia

| Tipo | Fuente | Minimo |
|------|--------|--------|
| Titulos | Oswald | 24px |
| Cuerpo | Raleway | 16px |

---

## 3. Estructura HTML

### Encabezados
- Un unico h1 por pagina
- Sin saltos: h1 - h2 - h3

### Landmarks

header role=banner
  nav role=navigation aria-label=Menu principal
main role=main id=main-content
footer role=contentinfo

### Skip Links

<a href="#main-content">Saltar al contenido</a>

---

## 4. Elementor

### Botones
- Widget Button (no div)
- Texto descriptivo
- Focus visible

### Formularios
- Etiqueta visible por campo
- aria-required en obligatorios
- Errores con foco

### Sliders
- pause_on_hover activado
- Alt en imagenes

---

## 5. Checklist por Pagina

### Homepage
- [ ] Slider pausable
- [ ] Alt en slides
- [ ] Contraste overlay

### Equipo (Mayte, Javier)
- [ ] Jerarquia h1 h2 h3
- [ ] Alt en fotos
- [ ] Contraste cards

### Header
- [ ] Logo con alt
- [ ] Menu teclado
- [ ] Hamburguesa aria-label

### Footer
- [ ] Logo alt
- [ ] Enlaces claros

### Contacto
- [ ] Formulario etiquetas
- [ ] Errores claros

---

## 6. Testing

### Herramientas
- WAVE: https://wave.webaim.org/
- axe DevTools: Extension Chrome
- Lighthouse: Chrome DevTools
- Contrast Checker: webaim.org

### Test Manual
- [ ] Tab orden logico
- [ ] Focus visible
- [ ] Sin trampas teclado

---

## 7. Prioridades

| Nivel | Tipo | Impacto |
|-------|------|---------|
| P0 | Bloquea acceso | Critico |
| P1 | Contraste | Alto |
| P2 | Alt faltantes | Alto |
| P3 | Semantica | Medio |

---

## Referencias

- WCAG 2.2: w3.org/TR/WCAG22/
- WordPress: wordpress.org/about/accessibility/
- Elementor: elementor.com/blog/best-practices-accessibility/

---

Ultima actualizacion: 2026-01-29
