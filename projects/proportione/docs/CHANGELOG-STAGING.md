# Changelog Staging - Proportione

## Punto de Control: 2026-01-28

### Estado Actual del Staging (staging19.proportione.com)

**Tema:** Hello Elementor (activo)
**Elementor Pro:** Instalado y activado
**URL:** https://staging19.proportione.com

---

## Checkpoint v0.1.0 - Base Establecida

### Infraestructura
- [x] Tema Hello Elementor configurado
- [x] Elementor Pro activado
- [x] Conexión SSH funcional
- [x] Flujo de deploy con rsync establecido

### Identidad Visual (CSS Customizer)
- [x] Tipografías: Oswald (títulos) + Raleway (cuerpo)
- [x] Paleta de colores corporativos implementada
- [x] Header con borde inferior 3px color primario (#5F322F)
- [x] Título/tagline del sitio ocultos (solo logo)

### Navegación
- [x] Menú "menu-principal" asignado a ubicación menu-1
- [x] Estructura de 4 categorías + CTA:
  - Nosotros (3 hijos)
  - Servicios (4 hijos)
  - Soluciones (4 hijos)
  - Insights (2 hijos)
  - Contacto (CTA button)
- [x] Flechas dropdown eliminadas
- [x] Submenús con hover y sombra
- [x] Botón Contacto estilizado como CTA

### Archivos Locales Clave
- `projects/proportione/assets/custom-styles.css` - CSS de identidad visual
- `projects/proportione/docs/IDENTIDAD-VISUAL.md` - Manual de marca
- `projects/proportione/docs/BRAND-VOICE-TEMPLATE.md` - Pendiente de Marga

---

## Cambios Pendientes de Producción

*Los cambios se irán añadiendo aquí antes del deploy a producción*

| # | Cambio | Estado | Fecha |
|---|--------|--------|-------|
| 1 | Añadida sección "Origen y Filosofía de la Marca" al manual de identidad: inspiración en *De Divina Proportione* de Luca Pacioli y Leonardo da Vinci, proporción áurea, poliedros de Leonardo | Completado | 2026-01-28 |
| 2 | Documentados assets de marca (Brandbay) y páginas legales en IDENTIDAD-VISUAL.md | Completado | 2026-01-28 |
| 3 | CSS: Fix márgenes en listas con bullets (capacitación personalizada, etc.) | Completado | 2026-01-28 |
| 4 | CSS: Fix márgenes en listas con estrellas (alineación estratégica, etc.) | Completado | 2026-01-28 |
| 5 | CSS: Texto blanco sobre fondos oscuros ("En la era digital...") | Completado | 2026-01-28 |
| 6 | CSS: Logo en footer con filtro blanco para fondo granate | Completado | 2026-01-28 |
| 7 | Footer: Licencia MIT en lugar de "All rights reserved" | Completado | 2026-01-28 |
| 8 | Footer: Enlaces a Política de Privacidad y Política de Cookies | Completado | 2026-01-28 |
| 9 | Logo fondo granate subido a staging (ID 2766) | Completado | 2026-01-28 |
| 10 | CSS: Ocultar título de página duplicado del tema (aplica a todas las páginas) | Completado | 2026-01-28 |
| 11 | CSS: Títulos sobre fondos oscuros/imágenes en color crema (#F5F0E6) | Completado | 2026-01-28 |
| 12 | Footer Elementor Theme Builder (logo blanco, MIT, enlaces legales) | Preparado | 2026-01-28 |
| 13 | Script deploy-staging-batch.sh para deploy único | Preparado | 2026-01-28 |
| 14 | CSS: Blog en retícula con estilo corporativo (solo títulos, proporción áurea, poliedros) | Preparado | 2026-01-28 |
| 15 | Página Investigación: nuevo diseño con hero, tarjetas de áreas, contenido reescrito | Preparado | 2026-01-28 |
| 16 | Página Investigación: renombrada de "Tesis doctoral" a "Línea de Investigación" | Preparado | 2026-01-28 |
| 17 | Página Investigación: nueva URL /investigacion/ (antes /investigacion-tesis-universidade-de-aveiro/) | Preparado | 2026-01-28 |
| 18 | Paginación blog: "Next" → "Siguiente →", "Previous" → "← Anterior" | Preparado | 2026-01-28 |
| 19 | Idioma WordPress forzado a es_ES | Preparado | 2026-01-28 |

---

## Diagnóstico Post-Deploy (2026-01-28)

### Problemas Detectados

| Componente | Estado | Problema | Causa |
|------------|--------|----------|-------|
| Blog /blog/ | ❌ Parcial | 1 columna, contenido solapado | Selectores CSS incorrectos |
| Homepage | ❌ Sin cambios | Ningún cambio visible | Página Elementor, CSS no aplica |
| Footer | ❌ Sin cambios | No muestra MIT ni enlaces | Theme Builder necesario |
| Investigación | ✅ Funciona | Estructura OK, falta diseño | Necesita imágenes/retícula |

### Correcciones Aplicadas (Local)

| # | Corrección | Estado |
|---|-----------|--------|
| 20 | CSS Blog: selectores robustos con body.blog, !important | Preparado |
| 21 | CSS Blog: grid forzado en #primary, .site-main, main | Preparado |
| 22 | Documento diagnóstico CSS creado | Completado |

### Pendiente (No resuelto con CSS)

- **Homepage**: Requiere edición directa en Elementor o CSS ultra-específico
- **Footer**: Requiere crear template en Elementor Theme Builder
- **Investigación**: Necesita imágenes y maquetación más visual

---

## Deploy Final (2026-01-28)

### Cambios Aplicados al Servidor

| # | Cambio | Estado |
|---|--------|--------|
| 23 | CSS: Color de enlaces → verde corporativo (#6E8157) | ✅ Desplegado |
| 24 | Footer Elementor Theme Builder creado (ID 2773) | ✅ Desplegado |
| 25 | Estilos globales Elementor: colores y tipografías corporativas | ✅ Desplegado |
| 26 | Página Divina Proportione: imagen Mona Lisa → erudito renacentista (ID 2649) | ✅ Desplegado |
| 27 | Cache de Elementor regenerada | ✅ Desplegado |

---

## Próximo Deploy a Producción

**Fecha prevista:** Por determinar
**Checklist pre-deploy:**
- [ ] Todos los cambios probados en staging
- [ ] Revisión visual en móvil y desktop
- [ ] Sin errores en consola
- [ ] Backup de producción verificado
- [ ] Aprobación final

---

## RESET TOTAL (2026-01-28)

### Estado: CERO ABSOLUTO

Staging reseteado completamente para empezar desde base sólida.

### Eliminado

| Componente | Estado |
|------------|--------|
| CSS Customizer | ✓ Vacío |
| Theme Mods | ✓ Eliminados todos |
| Templates Elementor | ✓ Eliminados |
| Condiciones Theme Builder | ✓ Eliminadas |
| mu-plugins custom | ✓ Eliminados |
| Cache Elementor | ✓ Purgada |
| Cache WordPress | ✓ Purgada |
| Cache SiteGround | ✓ Purgada |

### Estado Actual

- **Tema**: Hello Elementor (default, sin personalizaciones)
- **Elementor Pro**: Activo
- **CSS**: Ninguno
- **Footer**: Default del tema
- **Header**: Default del tema

### Próximos Pasos

Construir desde cero, paso a paso:
1. [x] Definir colores en Elementor Site Settings
2. [x] Definir tipografías en Elementor Site Settings
3. [x] Crear header con Elementor Theme Builder
4. [x] Crear footer con Elementor Theme Builder
5. [x] Revisar homepage (Stackable/Gutenberg + CSS)
6. [x] Revisar páginas internas (mismo CSS aplica)

---

## Construcción Paso 1: Colores y Tipografías (2026-01-28)

### Colores Globales (Elementor Kit ID 2701)

| ID | Nombre | Color | Uso |
|----|--------|-------|-----|
| primary | Primary | #5F322F | Granate corporativo |
| secondary | Secondary | #551122 | Burdeos oscuro |
| text | Text | #333333 | Texto general |
| accent | Accent | #6E8157 | Verde corporativo |
| cream | Crema | #F5F0E6 | Fondos claros |
| neutral | Neutral | #AEADB3 | Elementos neutros |
| white | Blanco | #FFFFFF | Fondos blancos |

### Tipografías Globales

| ID | Nombre | Fuente | Peso | Uso |
|----|--------|--------|------|-----|
| primary | Primary | Oswald | 600 | Títulos principales |
| secondary | Secondary | Oswald | 500 | Subtítulos |
| text | Text | Raleway | 400 | Cuerpo de texto |
| accent | Accent | Raleway | 600 | Texto destacado |

---

## Construcción Paso 2: Header (2026-01-28)

### Header Theme Builder (ID 2783)

| Elemento | Configuración |
|----------|---------------|
| Layout | Full width, contenido 1200px |
| Fondo | Blanco (#FFFFFF) |
| Borde inferior | 3px sólido #5F322F |
| Padding | 15px vertical, 50px horizontal |

### Columnas

| Columna | Ancho | Contenido |
|---------|-------|-----------|
| Logo | 20% | Site Logo widget, max 180px |
| Navegación | 80% | Nav Menu widget, menu-principal |

### Menú

| Propiedad | Valor |
|-----------|-------|
| Layout | Horizontal |
| Tipografía | Raleway 600, 14px, uppercase |
| Color texto | #333333 |
| Color hover | #5F322F |
| Pointer | Underline #5F322F |

---

## Construcción Paso 3: Footer (2026-01-28)

### Footer Theme Builder (ID 2784)

| Elemento | Configuración |
|----------|---------------|
| Layout | Full width, contenido 1200px |
| Fondo | #5F322F (granate) |
| Padding | 40px vertical, 50px horizontal |

### Columnas

| Columna | Ancho | Contenido |
|---------|-------|-----------|
| Logo | 33% | Site Logo, 160px, filtro blanco |
| Enlaces | 34% | Privacidad + Cookies, centrado |
| Copyright | 33% | MIT License © 2024, derecha |

### CSS Adicional

```css
footer.elementor-location-footer img { filter: brightness(0) invert(1); }
footer.elementor-location-footer a { color: #FFFFFF !important; }
```

---

## Construcción Paso 4: Homepage (2026-01-28)

### Análisis

| Aspecto | Detalle |
|---------|---------|
| ID | 6 |
| Editor | Gutenberg + Stackable (NO Elementor) |
| Bloques Stackable | 33 (columns, icon-label, heading) |
| Bloques WP | cover, paragraph, list, image |

### CSS Aplicado

| Selector | Estilo |
|----------|--------|
| Títulos (h1-h6) | Oswald, #5F322F |
| Párrafos | Raleway, #333333 |
| Enlaces | #6E8157, hover #5F322F |
| Contenedores | max-width 1200px, padding 50px |
| Títulos fondos oscuros | #F5F0E6 (crema) |

### Nota

La homepage usa Stackable/Gutenberg, no Elementor. Se mantiene así para no perder el contenido existente. Los estilos se aplican vía CSS.

---

## Construcción Paso 5: Páginas Internas (2026-01-28)

### Análisis

Todas las páginas usan **Gutenberg** (la mayoría con Stackable):

| Página | Editor |
|--------|--------|
| Home | Gutenberg + Stackable |
| Contacto | Gutenberg + Stackable |
| Divina Proportione | Gutenberg + Stackable |
| Investigación | Gutenberg |
| Clientes | Gutenberg + Stackable |
| Programas | Gutenberg + Stackable |
| Blog | Gutenberg |

### Resultado

El CSS global para Stackable/Gutenberg aplica a todas las páginas automáticamente.

---

## RESUMEN FINAL - Staging Estable

### Estado: ✅ COMPLETO

| Componente | Estado | Tecnología |
|------------|--------|------------|
| Colores globales | ✅ | Elementor Kit |
| Tipografías globales | ✅ | Elementor Kit |
| Header | ✅ | Elementor Theme Builder |
| Footer | ✅ | Elementor Theme Builder |
| Homepage | ✅ | Gutenberg + Stackable + CSS |
| Páginas internas | ✅ | Gutenberg + Stackable + CSS |

### Paleta de Colores

| Color | Código | Uso |
|-------|--------|-----|
| Primary | #5F322F | Granate corporativo |
| Accent | #6E8157 | Verde enlaces |
| Text | #333333 | Texto general |
| Cream | #F5F0E6 | Fondos claros |

### Tipografías

| Tipo | Fuente |
|------|--------|
| Títulos | Oswald |
| Cuerpo | Raleway |

### IDs Importantes

| Elemento | ID |
|----------|-----|
| Elementor Kit | 2701 |
| Header | 2789 |
| Footer | 2788 |
| Homepage | 6 |

---

## Corrección Templates (2026-01-28)

### Problema
Los templates de header y footer tenían JSON inválido (comillas sin escapar en HTML).

### Solución
1. Eliminados templates corruptos (2783, 2784)
2. Recreados con JSON válido vía PHP directo:
   - Header ID: 2789
   - Footer ID: 2788
3. HTML simplificado sin estilos inline
4. Estilos aplicados vía CSS global

### CSS Añadido
- Título de página visible (.entry-header, .entry-title)
- Texto sobre fondos oscuros: párrafos, listas, spans en crema (#F5F0E6)

---

## Notas

- **Producción (proportione.com)**: Intacta, estado original
- **Staging (staging19.proportione.com)**: Reset total, Hello Elementor default
- Construcción paso a paso desde base limpia
