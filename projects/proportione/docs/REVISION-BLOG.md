# Revisión de Blog/Insights - CSS

**Fecha:** Enero 2026
**Archivo CSS:** `assets/staging-css-backup-20260128-202244.css` (líneas 1290-1670)
**Estado:** Revisada

---

## Resumen Ejecutivo

| Aspecto | Estado | Notas |
|---------|--------|-------|
| Grid 3 columnas | OK | `repeat(3, 1fr)` desktop |
| Cards con imagen | OK | Imagen como fondo con overlay |
| Hover states | OK | Transform + box-shadow |
| Paginación | OK | Estilos completos |
| Responsive | OK | 2 col tablet, 1 col mobile |
| Primer artículo destacado | OK | `span 2` |

**Valoración:** APROBADO - CSS de blog bien implementado

---

## Verificación vs Guía de Diseño

### Grid de Artículos

```css
body.blog #primary {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
    max-width: 1200px !important;
    padding: 60px 50px !important;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Columnas desktop | 3 | 3 | OK |
| Columnas tablet | 2 | 2 | OK |
| Columnas mobile | 1 | 1 | OK |
| Gap | 24-32px | 30px | OK |
| Max-width | 1200px | 1200px | OK |

### Cards de Artículos

```css
body.blog article {
    position: relative !important;
    aspect-ratio: 4/3 !important;
    border-radius: 8px !important;
    overflow: hidden !important;
    min-height: 280px !important;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Aspect ratio | 4:3 | 4/3 | OK |
| Border-radius | 4-8px | 8px | OK |
| Min-height | ~280px | 280px | OK |
| Overflow | hidden | hidden | OK |

### Imagen + Overlay

```css
body.blog article::before {
    background: linear-gradient(
        to bottom,
        rgba(95, 50, 47, 0) 0%,
        rgba(95, 50, 47, 0.4) 50%,
        rgba(95, 50, 47, 0.95) 100%
    ) !important;
}
```

**Estado:** OK - Overlay granate corporativo

### Títulos

```css
body.blog article .entry-title {
    font-family: var(--font-titles) !important;
    font-size: 1.3rem !important;
    font-weight: 600 !important;
    color: #fff !important;
}
```

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Font-family | Oswald | var(--font-titles) | OK |
| Font-size | 18-20px | 1.3rem (~21px) | OK |
| Font-weight | semibold | 600 | OK |

### Hover States

```css
body.blog article:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 20px 40px rgba(95, 50, 47, 0.2) !important;
}

body.blog article:hover img {
    transform: scale(1.05) !important;
}
```

**Estado:** OK - Hover profesional con elevación y zoom de imagen

### Primer Artículo Destacado

```css
body.blog article:first-of-type {
    grid-column: span 2 !important;
    grid-row: span 2 !important;
    min-height: 500px !important;
}
```

**Estado:** OK - Primer artículo ocupa 2x2

### Paginación

```css
body.blog .pagination a {
    min-width: 44px !important;
    min-height: 44px !important;
    /* ... */
}

body.blog .pagination .current {
    background: var(--color-primary) !important;
    color: #fff !important;
}
```

**Estado:** OK - Paginación accesible (44x44px mínimo)

---

## Responsive

### Tablet (769px - 1024px)

```css
@media (min-width: 769px) and (max-width: 1024px) {
    body.blog #primary {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}
```

### Mobile (< 768px)

```css
@media (max-width: 768px) {
    body.blog #primary {
        grid-template-columns: 1fr !important;
    }
}
```

---

## Elementos Ocultos

El CSS oculta intencionalmente:
- Extracto/resumen
- Meta (fecha, autor)
- Comentarios
- Tags y categorías

Esto crea un diseño minimalista tipo "grid de imágenes" inspirado en De Divina Proportione.

---

## Observaciones

### Positivo
- Diseño visual sofisticado
- Overlay granate corporativo
- Transiciones suaves
- Elemento decorativo geométrico (::after)
- Responsive bien implementado

### A Considerar
- El diseño oculta extractos, lo cual puede afectar SEO
- No hay filtros por categoría visibles
- Fecha de publicación no visible

---

## Checklist Final

- [x] Grid 3 columnas desktop
- [x] Cards con imagen y overlay
- [x] Tipografía títulos correcta
- [x] Hover states con sombra
- [x] Paginación presente
- [x] Responsive (2 col tablet, 1 col mobile)
- [x] Primer artículo destacado
- [x] Colores corporativos aplicados
- [ ] Filtros por categoría (no implementados)
- [ ] Fecha visible (oculta intencionalmente)

---

## Conclusión

**Estado:** APROBADO

El CSS del Blog está bien implementado siguiendo un diseño tipo "grid visual" inspirado en el tratado De Divina Proportione. El estilo es minimalista, profesional y coherente con la identidad visual de Proportione.

---

**Próximo paso:** Tarea #18 - Página de Contacto
