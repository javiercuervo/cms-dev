# Auditoría de Tipografía y Jerarquía Visual - Proportione

**Fecha:** Enero 2026
**Estado:** Completada
**Referencia:** `content/guia-diseno-visual-consultoria.md`

---

## Resumen Ejecutivo

| Aspecto | Estado | Notas |
|---------|--------|-------|
| Familias tipográficas | OK | Oswald (títulos) + Raleway (cuerpo) |
| Google Fonts | OK | Pesos 400-700 importados |
| Escala de tamaños | REVISAR | H1 más pequeño que lo recomendado |
| Line-height | OK | 1.6 en body |
| Jerarquía visual | MEJORABLE | Falta definición H4-H6 |
| Responsive | OK | Tamaños reducidos en mobile |

---

## 1. Familias Tipográficas

### 1.1 Especificación vs Implementación

| Elemento | IDENTIDAD-VISUAL.md | CSS Actual | Estado |
|----------|---------------------|------------|--------|
| Títulos | Bourbon Grotesque / Oswald | Oswald | OK |
| Cuerpo | Raleway | Raleway | OK |
| Código/Técnico | No especificado | No definido | N/A |

### 1.2 Google Fonts Import

```css
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Raleway:wght@400;500;600;700&display=swap');
```

**Pesos disponibles:**
- 400 (Regular)
- 500 (Medium)
- 600 (Semibold)
- 700 (Bold)

**Estado:** OK - Pesos correctos para la jerarquía

---

## 2. Escala Tipográfica

### 2.1 Comparación con Guía de Diseño Visual

| Elemento | Guía (Desktop) | CSS Actual | Diferencia | Estado |
|----------|---------------|------------|------------|--------|
| **H1 Hero** | 72-120px | 56px (slider) / 48px (3rem) | -16px a -72px | BAJO |
| **H2 Section** | 36-48px | 35.2px (2.2rem) | -0.8px | OK |
| **H3 Subsection** | 24-32px | 25.6px (1.6rem) | +1.6px | OK |
| **H4 Card** | 18-20px | No definido | - | FALTA |
| **H5** | No especificado | No definido | - | FALTA |
| **H6** | No especificado | No definido | - | FALTA |
| **Body** | 14-16px | 16px | 0 | OK |
| **Small/Meta** | 12-14px | 14px | 0 | OK |
| **Nav links** | 14-16px | 15px | 0 | OK |
| **Submenu** | 14px | 14px | 0 | OK |

### 2.2 Definiciones Actuales en CSS

**En `staging-css-backup` (escala base):**
```css
h1 { font-size: 3rem; }      /* 48px */
h2 { font-size: 2.2rem; }    /* 35.2px */
h3 { font-size: 1.6rem; }    /* 25.6px */
```

**En `custom-elementor.css` (slider hero):**
```css
.elementor-slide-heading {
    font-size: 56px !important;
}
```

**En `accesibilidad.css` (entry title):**
```css
.entry-title {
    font-size: 2.5rem;  /* 40px */
}
```

### 2.3 Problemas Identificados

1. **H1 Hero demasiado pequeño**
   - Guía recomienda: 72-120px
   - Actual: 48-56px
   - Impacto: Menor impacto visual en hero section

2. **Falta definición de H4, H5, H6**
   - No hay escala completa
   - Cards y elementos menores sin tamaño definido

3. **Múltiples definiciones contradictorias**
   - H1 = 3rem en un archivo, 2.5rem en otro, 56px en slider
   - Dificulta mantenimiento

---

## 3. Propiedades Tipográficas

### 3.1 Line-height

| Elemento | Guía | CSS Actual | Estado |
|----------|------|------------|--------|
| Body | 1.5-1.7 | 1.6 | OK |
| Headlines | 1.1-1.3 | No definido | FALTA |
| Quotes | 1.6 | 1.6 | OK |
| Lists | 1.6 | 1.6 | OK |

### 3.2 Font-weight

| Elemento | Guía | CSS Actual | Estado |
|----------|------|------------|--------|
| H1 | 700 | 600 | DIFERENTE |
| H2 | 600 | 600 | OK |
| H3 | 600 | 600 | OK |
| Body | 400 | 400 | OK |
| Nav links | 400-500 | 600 | ALTO |
| Meta | 500 | 500 | OK |

### 3.3 Letter-spacing

| Elemento | Guía | CSS Actual | Estado |
|----------|------|------------|--------|
| Títulos grandes | 0 a -0.02em | 1px | DIFERENTE |
| Body | 0 | No definido | OK |
| Uppercase pequeño | +0.05 a +0.1em | 0.5px | OK |

**Nota:** La guía recomienda letter-spacing negativo o neutro en títulos grandes, pero el CSS actual usa `letter-spacing: 1px` positivo.

### 3.4 Text-transform

| Elemento | CSS Actual | Observación |
|----------|------------|-------------|
| Todos los headings | `text-transform: uppercase` | REVISAR |
| Nav links | `text-transform: uppercase` | OK |
| Botones | No definido | - |

**Observación:** La guía de diseño visual NO especifica `text-transform: uppercase` para todos los títulos. Esto puede reducir legibilidad en títulos largos.

---

## 4. Jerarquía Visual

### 4.1 Niveles de Énfasis (según guía)

| Nivel | Elemento | Guía | Estado Actual |
|-------|----------|------|---------------|
| 1 | Hero Section | 80-120px, alto contraste | 56px - BAJO |
| 2 | Section titles | 32-48px, medio-alto contraste | 35px - OK |
| 3 | Body Copy | 14-16px, alto contraste | 16px - OK |
| 4 | Secundarios | 12-14px, gris medio | 14px - OK |
| 5 | Terciarios | 11-12px, gris claro | No definido |

### 4.2 Aplicación por Contexto

**En Hero Section (Slider):**
```css
/* Actual */
.elementor-slide-heading {
    font-size: 56px;
    font-weight: 600;
}

/* Recomendado */
.elementor-slide-heading {
    font-size: 72px;  /* Mínimo según guía */
    font-weight: 700;
    line-height: 1.1;
    letter-spacing: -0.02em;
}
```

**En Descripción Hero:**
```css
/* Actual */
.elementor-slide-description {
    font-size: 20px;
    line-height: 1.6;
}

/* Estado: OK - Dentro de rango 18-24px */
```

---

## 5. Responsive Typography

### 5.1 Mobile Breakpoint (768px)

| Elemento | Desktop | Mobile | Reducción |
|----------|---------|--------|-----------|
| H1 | 3rem (48px) | 1.8rem (28.8px) | 40% |
| H2 | 2.2rem (35px) | 1.5rem (24px) | 31% |
| H3 | 1.6rem (26px) | 1.3rem (21px) | 19% |
| Hero slider | 56px | 32px | 43% |
| Body | 16px | 16px | 0% |

**Estado:** OK - Reducciones proporcionales

### 5.2 Código Responsive Actual

```css
@media (max-width: 768px) {
    h1 { font-size: 1.8rem !important; }
    h2 { font-size: 1.5rem !important; }
    h3 { font-size: 1.3rem !important; }

    .elementor-slide-heading {
        font-size: 32px !important;
    }
}
```

---

## 6. Recomendaciones

### 6.1 Prioridad Alta

1. **Aumentar tamaño de H1 Hero**
   ```css
   /* Propuesta */
   h1, .hero-title {
       font-size: 72px;  /* Desktop */
       font-weight: 700;
       line-height: 1.1;
   }

   @media (max-width: 768px) {
       h1, .hero-title {
           font-size: 40px;
       }
   }
   ```

2. **Definir escala completa H1-H6**
   ```css
   /* Propuesta de escala */
   h1 { font-size: 72px; }   /* Hero */
   h2 { font-size: 42px; }   /* Section */
   h3 { font-size: 28px; }   /* Subsection */
   h4 { font-size: 20px; }   /* Card title */
   h5 { font-size: 16px; }   /* Small heading */
   h6 { font-size: 14px; }   /* Micro heading */
   ```

3. **Definir line-height para headings**
   ```css
   h1 { line-height: 1.1; }
   h2 { line-height: 1.2; }
   h3 { line-height: 1.3; }
   h4, h5, h6 { line-height: 1.4; }
   ```

### 6.2 Prioridad Media

4. **Revisar text-transform: uppercase**
   - Considerar remover de H1, H2 para mejorar legibilidad
   - Mantener en nav y botones

5. **Ajustar letter-spacing en títulos grandes**
   ```css
   h1 {
       letter-spacing: -0.02em;  /* Compresión sutil */
   }
   ```

6. **Aumentar font-weight de H1 a 700**
   ```css
   h1 {
       font-weight: 700;  /* Bold en lugar de semibold */
   }
   ```

### 6.3 Prioridad Baja

7. **Consolidar definiciones tipográficas**
   - Unificar en un solo archivo
   - Usar variables CSS para tamaños

8. **Crear sistema de tokens tipográficos**
   ```css
   :root {
       --font-size-hero: 72px;
       --font-size-h1: 48px;
       --font-size-h2: 36px;
       --font-size-h3: 28px;
       --font-size-h4: 20px;
       --font-size-body: 16px;
       --font-size-small: 14px;
       --font-size-tiny: 12px;

       --line-height-tight: 1.1;
       --line-height-snug: 1.3;
       --line-height-normal: 1.6;
   }
   ```

---

## 7. Checklist de Verificación

### Tipografía Base
- [x] Oswald cargada correctamente
- [x] Raleway cargada correctamente
- [x] Pesos 400-700 disponibles
- [ ] Escala H1-H6 completa definida
- [ ] Line-height definido para headings

### Jerarquía Visual
- [ ] H1 Hero ≥ 72px
- [x] H2 Section 36-48px
- [x] H3 Subsection 24-32px
- [ ] H4 Card 18-20px definido
- [x] Body 14-16px
- [x] Small 12-14px

### Propiedades
- [x] Body line-height 1.6
- [ ] Headlines line-height 1.1-1.3
- [ ] H1 font-weight 700
- [x] Body font-weight 400
- [ ] Letter-spacing optimizado

### Responsive
- [x] Reducción proporcional en mobile
- [x] Body mantiene 16px
- [x] Headings escalan correctamente

---

## 8. Conclusión

**Estado General:** APROBADO con ajustes recomendados

**Puntos fuertes:**
- Familias tipográficas correctas (Oswald + Raleway)
- Line-height de body óptimo (1.6)
- Responsive implementado

**Áreas de mejora:**
- Aumentar H1 Hero de 56px a 72px mínimo
- Completar escala H4-H6
- Definir line-height para headings
- Considerar remover uppercase en títulos largos

---

**Próximo paso:** Tarea #3 - Auditoría global de espaciado y grid
