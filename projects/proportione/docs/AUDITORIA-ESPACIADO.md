# Auditoría de Espaciado y Grid - Proportione

**Fecha:** Enero 2026
**Estado:** Completada
**Referencia:** `content/guia-diseno-visual-consultoria.md`

---

## Resumen Ejecutivo

| Aspecto | Estado | Notas |
|---------|--------|-------|
| Ancho contenedor | OK | 1200px máximo |
| Márgenes laterales desktop | BAJO | 50px vs 60-80px recomendado |
| Márgenes laterales mobile | OK | 20px (rango 16-24px) |
| Separación entre secciones | BAJO | 60px vs 80-120px recomendado |
| Grid gutter | OK | 30px (rango 24-32px) |
| Padding de cards | OK | 25px (rango 24-32px) |
| Responsive breakpoints | OK | 768px y 1024px |

---

## 1. Sistema de Contenedores

### 1.1 Especificación vs Implementación

| Propiedad | Guía | CSS Actual | Estado |
|-----------|------|------------|--------|
| Ancho máximo | ~1140-1200px | 1200px | OK |
| Centrado | `margin: 0 auto` | `margin: 0 auto` | OK |
| Padding desktop | 60-80px | 50px | BAJO |
| Padding mobile | 16-24px | 20px | OK |

### 1.2 Código CSS Actual

```css
/* Contenedores Elementor */
.elementor-section > .elementor-container,
.e-con {
    max-width: 1200px !important;
    margin-left: auto !important;
    margin-right: auto !important;
    padding-left: 50px !important;
    padding-right: 50px !important;
}

/* Responsive */
@media (max-width: 768px) {
    .e-con {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }
}
```

### 1.3 Recomendación

```css
/* Propuesta: aumentar márgenes laterales */
.elementor-section > .elementor-container,
.e-con {
    padding-left: 60px !important;   /* +10px */
    padding-right: 60px !important;  /* +10px */
}

@media (min-width: 1400px) {
    .elementor-section > .elementor-container,
    .e-con {
        padding-left: 80px !important;
        padding-right: 80px !important;
    }
}
```

---

## 2. Espaciado Vertical (Entre Secciones)

### 2.1 Especificación vs Implementación

| Tipo de Separación | Guía | HTML/CSS Actual | Estado |
|--------------------|------|-----------------|--------|
| Entre secciones principales | 80-120px | 60px padding | BAJO |
| Entre elementos en sección | 40-60px | 30-40px | BAJO |
| Entre párrafos | 24-32px | 20px margin-bottom | BAJO |
| Padding interno cards | 24-32px | 25px | OK |

### 2.2 Análisis de Páginas HTML

**Páginas de Equipo (Mayte/Javier):**

| Sección | Padding Actual | Recomendado |
|---------|----------------|-------------|
| Hero | `60px 50px` | `80px 60px` |
| Proposición | `60px 50px` | `80px 60px` |
| Expertise | `60px 50px` | `80px 60px` |
| Trayectoria | `60px 50px` | `80px 60px` |
| Filosofía | `60px 50px` | `80px 60px` |
| Credenciales | `60px 50px` | `80px 60px` |
| CTA Final | `50px` | `60px 60px` |

### 2.3 Espaciado Entre Elementos

| Elemento | Actual | Guía | Estado |
|----------|--------|------|--------|
| H2 → contenido | `margin-bottom: 30px` | 40px | BAJO |
| H2 → H2 (expertise) | `margin-bottom: 40px` | 40-60px | OK |
| Párrafo → Párrafo | `margin-bottom: 20px` | 24-32px | BAJO |
| H3 → párrafo | `margin-bottom: 10-15px` | 16-20px | BAJO |

### 2.4 Recomendación de Escala de Espaciado

```css
/* Sistema de espaciado propuesto */
:root {
    --space-xs: 8px;
    --space-sm: 16px;
    --space-md: 24px;
    --space-lg: 32px;
    --space-xl: 48px;
    --space-2xl: 64px;
    --space-3xl: 80px;
    --space-4xl: 120px;
}

/* Aplicación */
.section { padding: var(--space-3xl) var(--space-2xl); }  /* 80px 64px */
.section-tight { padding: var(--space-2xl) var(--space-xl); }  /* 64px 48px */

h2 { margin-bottom: var(--space-lg); }  /* 32px */
p { margin-bottom: var(--space-md); }   /* 24px */
```

---

## 3. Sistema de Grid

### 3.1 Grids Identificados

**Grid de Blog:**
```css
body.blog #primary {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;  /* 3 col desktop */
    gap: 30px !important;
    max-width: 1200px !important;
    padding: 60px 50px !important;
}

@media (max-width: 1024px) {
    grid-template-columns: repeat(2, 1fr) !important;  /* 2 col tablet */
}

@media (max-width: 768px) {
    grid-template-columns: 1fr !important;  /* 1 col mobile */
}
```

**Grid de Expertise (páginas equipo):**
```html
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:30px;">
```

**Grid de Trayectoria:**
```html
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:40px;">
```

### 3.2 Comparación con Guía

| Propiedad | Guía | Actual | Estado |
|-----------|------|--------|--------|
| Sistema | 12 columnas | CSS Grid (auto-fit) | DIFERENTE |
| Gutter | 24-32px | 30px | OK |
| Desktop columnas | 3-4 | 3-4 (minmax) | OK |
| Tablet columnas | 2 | 2 | OK |
| Mobile columnas | 1 | 1 | OK |

### 3.3 Observación sobre Grid System

El sitio usa **CSS Grid con `auto-fit`** en lugar de un sistema tradicional de 12 columnas. Esto es una aproximación válida y moderna que:

**Ventajas:**
- Más flexible y responsivo
- Menos código
- Adaptación automática

**Desventajas:**
- Menos control preciso sobre anchos
- No sigue el patrón tradicional de 12 columnas

**Recomendación:** Mantener el enfoque actual de CSS Grid, pero documentar los tamaños mínimos estándar:
- Cards servicio: `minmax(280px, 1fr)`
- Cards trayectoria: `minmax(300px, 1fr)`
- Cards credenciales: Flexbox con gap

---

## 4. Breakpoints Responsive

### 4.1 Breakpoints Actuales

| Breakpoint | Uso | Guía |
|------------|-----|------|
| 1024px | Tablet (grid 2 col) | 1025px |
| 768px | Mobile | 768px |

**Estado:** OK - Breakpoints correctos

### 4.2 Comportamiento por Breakpoint

**Desktop (>1024px):**
- Contenedor: 1200px max
- Padding lateral: 50px
- Grid: 3 columnas
- Gap: 30px

**Tablet (769px-1024px):**
- Padding lateral: 30px
- Grid: 2 columnas
- Gap: 30px

**Mobile (<768px):**
- Padding lateral: 20px
- Grid: 1 columna
- Gap: 20px

---

## 5. Espaciado de Componentes

### 5.1 Cards

| Componente | Padding Actual | Guía | Estado |
|------------|----------------|------|--------|
| Card expertise | 25px | 24-32px | OK |
| Card trayectoria | (ninguno) | 24px | FALTA |
| Card credencial | 15px 25px | 24px | BAJO |
| Card blog | 15px | 24px | BAJO |

### 5.2 Botones

| Propiedad | Actual | Guía | Estado |
|-----------|--------|------|--------|
| Padding vertical | 12px | 12-16px | OK |
| Padding horizontal | 25-30px | 20-28px | OK |
| Border-radius | 4px | 4-6px | OK |

### 5.3 Formularios (Inputs)

| Propiedad | Guía | Estado |
|-----------|------|--------|
| Alto input | 40-48px | Verificar |
| Padding interno | 12px H, 8-10px V | Verificar |
| Label margin-bottom | 8px | Verificar |

---

## 6. Problemas Identificados

### 6.1 Espaciado Insuficiente Entre Secciones

**Problema:** Las secciones usan `padding: 60px 50px` en lugar de los 80-120px recomendados.

**Impacto:** El diseño se siente más comprimido de lo que sugiere la guía de minimalismo sofisticado.

**Solución:**
```css
/* Aumentar padding de secciones */
.wp-block-group,
.elementor-section {
    padding-top: 80px;
    padding-bottom: 80px;
}

/* Secciones hero: más espacio */
.hero-section {
    padding-top: 100px;
    padding-bottom: 100px;
}
```

### 6.2 Margin-bottom Inconsistente

**Problema:** Los elementos usan valores variados (10px, 15px, 20px, 30px) sin sistema claro.

**Solución:** Implementar escala de espaciado consistente con variables CSS.

### 6.3 Márgenes Laterales Cortos

**Problema:** 50px en desktop vs 60-80px recomendado.

**Impacto:** Menos "espacio para respirar" visual.

**Solución:** Aumentar a 60px mínimo, 80px en pantallas grandes.

---

## 7. Resumen de Valores Actuales vs Recomendados

### 7.1 Espaciado Vertical

| Elemento | Actual | Recomendado | Diferencia |
|----------|--------|-------------|------------|
| Sección padding | 60px | 80px | +20px |
| H2 margin-bottom | 30px | 40px | +10px |
| Párrafo margin-bottom | 20px | 24px | +4px |
| Card gap | 30px | 30px | 0 |

### 7.2 Espaciado Horizontal

| Elemento | Actual | Recomendado | Diferencia |
|----------|--------|-------------|------------|
| Container padding desktop | 50px | 60-80px | +10-30px |
| Container padding mobile | 20px | 20px | 0 |
| Card padding | 25px | 24-32px | 0 |

---

## 8. Checklist de Verificación

### Contenedores
- [x] Max-width 1200px
- [x] Centrado con margin auto
- [ ] Padding lateral 60-80px desktop
- [x] Padding lateral 16-24px mobile

### Espaciado Vertical
- [ ] Secciones principales 80-120px separación
- [ ] Elementos en sección 40-60px separación
- [ ] Párrafos 24-32px separación
- [x] Cards padding 24-32px

### Grid
- [x] 3 columnas desktop
- [x] 2 columnas tablet
- [x] 1 columna mobile
- [x] Gutter 24-32px

### Responsive
- [x] Breakpoint 1024px para tablet
- [x] Breakpoint 768px para mobile
- [x] Padding reducido en mobile

---

## 9. Acciones Recomendadas

### Prioridad Alta

1. **Aumentar padding de secciones de 60px a 80px**
   ```css
   .wp-block-group[style*="padding:60px"] {
       padding: 80px 60px !important;
   }
   ```

2. **Aumentar márgenes laterales a 60px**
   ```css
   .e-con {
       padding-left: 60px !important;
       padding-right: 60px !important;
   }
   ```

### Prioridad Media

3. **Aumentar margin-bottom de H2 a 40px**
   ```css
   h2 {
       margin-bottom: 40px;
   }
   ```

4. **Aumentar margin-bottom de párrafos a 24px**
   ```css
   p {
       margin-bottom: 24px;
   }
   ```

### Prioridad Baja

5. **Crear sistema de variables de espaciado**
6. **Documentar escala de espaciado para consistencia futura**

---

## 10. Conclusión

**Estado General:** APROBADO con ajustes recomendados

**Puntos fuertes:**
- Sistema de grid funcional y responsive
- Gutter correcto (30px)
- Breakpoints apropiados
- Cards con padding adecuado

**Áreas de mejora:**
- Aumentar separación entre secciones (60px → 80px)
- Aumentar márgenes laterales desktop (50px → 60px)
- Estandarizar margin-bottom de elementos
- Crear sistema de tokens de espaciado

---

**Próximo paso:** Tarea #4 - Revisar Homepage completa
