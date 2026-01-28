# Diagnóstico CSS - Proportione Staging

## Problemas Identificados

### 1. Blog (/blog/) - Grid no funciona

**Síntoma:** Una sola columna, contenido solapado

**Causa probable:**
- Hello Elementor puede usar clases diferentes a `.blog article.post`
- Puede haber un contenedor wrapper que interfiere con el grid
- El grid se aplica a `.site-main` pero podría haber elementos intermedios

**Selectores actuales:**
```css
.blog .site-main { display: grid; grid-template-columns: repeat(3, 1fr); }
.blog article.post { ... }
```

**Verificar:**
- Inspeccionar HTML real de /blog/ para ver clases exactas
- Verificar si hay contenedor padre que necesita grid
- Comprobar si Hello Elementor usa `hentry` u otras clases

---

### 2. Página Principal - Sin cambios

**Síntoma:** Ningún cambio visible en homepage

**Causa:**
- La homepage está construida con **Elementor**
- Elementor genera estilos inline con `!important`
- Mi CSS apunta a clases del tema, no de Elementor

**Ejemplo del problema:**
```css
/* Mi CSS apunta a: */
.elementor-widget-text-editor ul { margin-left: 40px; }

/* Pero Elementor genera: */
<ul style="margin: 0 !important;">
```

**Solución necesaria:**
- Editar directamente en Elementor
- O usar selectores ultra-específicos con `!important`

---

### 3. Footer - No visible

**Síntoma:** Footer no muestra logo, MIT, ni enlaces legales

**Causa:**
- `hello_footer_copyright_display` puede no renderizar HTML
- El footer de Hello Elementor puede requerir template de Elementor Theme Builder
- CSS apunta a `.site-footer` pero puede tener otra estructura

---

## Análisis por Componente

| Componente | Tipo | CSS Aplica | Estado |
|------------|------|------------|--------|
| Header/Menú | Theme | ✅ Parcial | Verificar selectores |
| Homepage | Elementor | ❌ No | Requiere edición Elementor |
| Blog Grid | Theme | ❌ No | Selectores incorrectos |
| Investigación | HTML puro | ✅ Sí | Funciona |
| Footer | Theme/Elementor | ❌ No | Requiere Theme Builder |

---

## Plan de Corrección

### Fase 1: Verificar HTML real (requiere acceso al servidor)

Necesito ejecutar esto para ver la estructura real:
```bash
# Ver estructura del blog
curl -s https://staging19.proportione.com/blog/ | grep -E "class=.*article|class=.*post|class=.*entry"

# Ver estructura del footer
curl -s https://staging19.proportione.com/ | grep -A20 "footer"
```

### Fase 2: Corregir Blog CSS

Agregar selectores más genéricos y específicos:
```css
/* Selectores más amplios para blog */
body.blog main article,
body.archive main article,
.hentry,
article[class*="post-"] {
    /* estilos de tarjeta */
}
```

### Fase 3: Homepage

**Opción A (Recomendada):** Editar en Elementor directamente
- Ir a cada sección y ajustar estilos visualmente
- Usar el panel de Elementor para colores, tipografías, márgenes

**Opción B:** CSS con selectores Elementor específicos
```css
/* Forzar estilos en Elementor */
.elementor-element .elementor-widget-container ul {
    margin-left: 40px !important;
    padding-left: 20px !important;
}
```

### Fase 4: Footer con Elementor Theme Builder

Crear footer en Elementor:
1. Elementor → Plantillas → Theme Builder → Footer
2. Diseñar con widgets de Elementor
3. Configurar condiciones de display

---

## Selectores CSS Corregidos (Borrador)

```css
/* BLOG - Selectores más robustos */
body.blog #primary,
body.blog .site-main,
body.blog main {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
    max-width: 1400px !important;
    margin: 0 auto !important;
    padding: 60px 50px !important;
}

body.blog article,
body.blog .hentry,
body.blog [class*="post-"] {
    position: relative !important;
    overflow: hidden !important;
    background: #F5F0E6 !important;
    aspect-ratio: 1.618 / 1 !important;
}

/* Ocultar excerpt en CUALQUIER formato */
body.blog .entry-summary,
body.blog .entry-content,
body.blog .entry-meta,
body.blog article p:not(.entry-title),
body.blog article > div:not(.post-thumbnail):not(.entry-header) {
    display: none !important;
}
```

---

## Próximos Pasos

1. [ ] Obtener HTML real del blog para verificar selectores
2. [ ] Reescribir CSS del blog con selectores correctos
3. [ ] Decidir estrategia para homepage (Elementor vs CSS)
4. [ ] Crear footer en Elementor Theme Builder
5. [ ] Test completo antes de deploy
