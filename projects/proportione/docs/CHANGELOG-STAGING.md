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

## Estabilización Pre-Rediseño (2026-01-28)

### Objetivo
Crear una base sólida antes del rediseño de mañana.

### Cambios Aplicados

| # | Cambio | Archivo | Estado |
|---|--------|---------|--------|
| 35 | Agregado z-index al header para evitar que imágenes lo tapen | accesibilidad.css | ✅ |
| 36 | Agregado z-index a Elementor header | accesibilidad.css | ✅ |
| 37 | Asegurado que secciones Elementor no tapen el header | accesibilidad.css | ✅ |

### Documentación de Archivos CSS

| Archivo | Propósito | Carga |
|---------|-----------|-------|
| `custom-styles.css` | Estilos corporativos Stackable/Gutenberg | Via WordPress Customizer |
| `custom-styles-v3.css` | Versión completa con variables CSS | Backup/referencia |
| `custom-elementor.css` | Estilos específicos Elementor (footer, responsive) | Via proportione-styles.php |
| `accesibilidad.css` | Contraste, navegación, header layout, z-index | Via proportione-styles.php |
| `proportione-contrast.css` | Versión de alto contraste (WCAG) | Opcional |

### Archivos Nuevos Agregados

- `content/Javier_Cuervo_CTO_Profile.md` - Perfil del CTO
- `content/Mayte_Tortosa_CEO_Profile.md` - Perfil de la CEO
- `content/grid-imagenes-home.md` - Especificación de imágenes homepage
- `content/proportione-framework.md` - Marco conceptual de servicios
- `assets/Infografías/` - Logos horizontales y verticales
- `assets/staging-css-backup-20260128-202244.css` - Backup de CSS

### Estado Final

- **Header**: z-index 999, siempre visible sobre contenido
- **Footer**: Estilos correctos, enlaces funcionando
- **Navegación**: Menú funcional con submenús
- **Blog**: Accesible desde menú y footer
- **Git**: Todo commiteado y respaldado en GitHub

---

## Rediseño Páginas de Equipo (2026-01-29)

### Páginas Rediseñadas con Elementor

| Página | ID | URL | Estado |
|--------|-----|-----|--------|
| Mayte Tortosa | 2802 | /mayte-tortosa/ | ✅ Completo |
| Javier Cuervo | 2804 | /javier-cuervo/ | ✅ Completo |

### Estructura de Ambas Páginas

1. **Hero Section** (flex, proporción áurea 38.2% / 61.8%)
   - Foto del profesional (imagen de biblioteca de medios)
   - Nombre, cargo, descripción introductoria
   - Fondo crema (#F5F0E6)

2. **Expertise Cards** (3 tarjetas, grid responsive)
   - Border-top de 4px en color primario (#5F322F)
   - Título (Oswald), descripción (Raleway)
   - Fondo blanco

3. **Trayectoria Destacada** (lista con iconos)
   - Íconos de maletín (eicon-briefcase)
   - 4 hitos profesionales principales

4. **CTA Footer**
   - Fondo granate (#5F322F)
   - Texto blanco
   - Enlace a /contacto/

### Imágenes Utilizadas

| Persona | Image ID | Archivo |
|---------|----------|---------|
| Mayte Tortosa | 1635 | Mayte-Dron-ibiza.jpg |
| Javier Cuervo | 2629 | Jersey-azul-redondo.png |

### Accesibilidad

- Jerarquía de encabezados: h1 > h2 > h3
- Alto contraste en todos los textos
- Tipografía legible: Oswald 600 (títulos), Raleway 400 (cuerpo)
- Colores verificados: #5F322F sobre #F5F0E6, #333333 sobre blanco

---

## Header Simplificado (2026-01-29)

### Estructura Final (ID 2795)

| Elemento | Ancho | Contenido |
|----------|-------|-----------|
| Logo | 20% | PNG transparente (ID 38) |
| Menú | 60% | Nav Menu horizontal, centrado |
| Hamburguesa | 20% | Solo móvil |

### CSS Aplicado (`custom-elementor.css`)

- Header siempre horizontal (flex-direction: row)
- z-index: 9999 para evitar solapamiento
- Menú items en línea (inline-flex)

---

## Footer Rediseñado (2026-01-29)

### Estructura Final (ID 2796)

- Grid áureo: 38.2% logo / 61.8% contenido
- Logo con fondo granate (ID 1749)
- Sin iconos de redes sociales
- Enlaces: Inicio, Consultoría, Blog, Contacto
- Enlaces legales: Privacidad, Cookies
- Copyright MIT 2024

---

## Hero Homepage (2026-01-29)

### Rediseño Completo

- Fondo sólido granate (#5F322F)
- Texto centrado, color crema (#F5F0E6)
- H1: "Crecimiento Orgánico para Organizaciones"
- Descripción clara de la propuesta de valor
- Botones: "Descubre cómo" (outline) + "Contactar" (sólido)

---

---

## FASE FIGMA + MAGICIAN (2026-01-29)

### Objetivo
Iterar sobre los disenos existentes usando Figma + Magician para generar mejoras visuales.

### Configuracion

| Componente | Estado |
|------------|--------|
| MCP Figma Desktop | Conectado |
| Design System CSS | 707 lineas |
| Carpeta iconos Magician | assets/icons/magician/ |
| Carpeta imagenes Magician | assets/img/magician/ |
| Log de outputs | docs/MAGICIAN-OUTPUT-LOG.md |

### Workflow

| Fase | Responsable | Estado |
|------|-------------|--------|
| 1. Captura staging → Figma | Javier | Pendiente |
| 2. Mejoras con Magician | Javier | Pendiente |
| 3. Lectura Figma → CSS | Claude Code | Listo |
| 4. Implementacion staging | Claude Code | Listo |
| 5. QA conjunto | Ambos | Pendiente |

### Tokens del Design System (para Figma)

```
COLORES:
color/primary     → #5F322F (Granate)
color/secondary   → #551122 (Burdeos)
color/accent      → #6E8157 (Verde oliva)
color/neutral     → #AEADB3 (Gris)
color/cream       → #F5F0E6 (Crema)
color/white       → #FFFFFF
color/black       → #1A1A1A

ESPACIADO (grid 8px):
space/xs  → 8px
space/sm  → 16px
space/md  → 24px
space/lg  → 32px
space/xl  → 48px
space/xxl → 64px

TIPOGRAFIA:
font/titles → Bourbon Grotesque / Oswald (fallback)
font/body   → Raleway
```

### Paginas a Procesar

| # | Pagina | Prioridad | Estado |
|---|--------|-----------|--------|
| 1 | Navegacion/Footer | Alta | Completado |
| 2 | Homepage | Alta | **Completado** (ID 2832) |
| 3 | Contacto | Alta | Pendiente |
| 4 | Blog | Media | Pendiente |
| 5 | Investigacion | Media | Pendiente |
| 6 | Mayte Tortosa | Media | Completado |
| 7 | Javier Cuervo | Media | Completado |

---

## Rediseño Homepage con Brand Voice (2026-01-29)

### Objetivo
Rehacer los contenidos y diseño de la homepage aplicando el Brand Voice oficial definido por Marga.

### Problemas Corregidos
1. **Demasiada "Divina Proporción"**: Eliminado énfasis en proporción áurea, Da Vinci, galaxias
2. **Lenguaje de "Consultora de los 90"**: Eliminado "Business Process Reengineering", "Interim Management"
3. **Mensajes complejos**: Simplificado para claridad de un vistazo

### Nueva Estructura Homepage

| Sección | Contenido | Estado |
|---------|-----------|--------|
| Hero | "Digitalización sin complicaciones" + CTAs | Preparado |
| Qué Hacemos | "Tecnología al servicio de las personas" | Preparado |
| Método 20-60-20 | Diagrama visual del método de trabajo | Preparado |
| Tres Pilares | Cards: Estrategia, Tecnología, Personas | Preparado |
| Por Qué Elegirnos | 4 diferenciadores clave | Preparado |
| CTA Final | "¿Hablamos?" con contacto | Preparado |

### Archivos Creados

| Archivo | Descripción |
|---------|-------------|
| `content/homepage-content-nuevo.md` | Textos aprobados con checklist Brand Voice |
| `content/homepage-nuevo.html` | HTML listo para Gutenberg/Stackable |
| `assets/homepage-nuevo.css` | CSS específico para nueva homepage |

### Archivos Actualizados

| Archivo | Cambio |
|---------|--------|
| `assets/proportione-styles.php` | Añadida carga de homepage-nuevo.css |

### Brand Voice Aplicado

#### Palabras USADAS (que amamos):
- Estrategia, Tecnología, Personas
- Transferencia de conocimiento
- Acompañamiento, Posicionamiento
- Adaptación, Facilitador

#### Palabras EVITADAS (prohibidas):
- ~~Visión~~, ~~Misión~~, ~~Globales~~
- ~~ODS~~, ~~Complejo~~, ~~Expertos~~
- ~~Traumático~~ (solo en negativo: "sin traumas")

### Emociones Objetivo

- Confiado: "Estas personas saben"
- Tranquilo: "Está en buenas manos"
- Informado: "Ahora lo entiendo"
- Aliviado: "Por fin alguien que lo entiende"

### Implementación Completada (2026-01-29)

| Paso | Descripción | Estado |
|------|-------------|--------|
| 1 | Subir CSS homepage-nuevo.css al tema child | ✅ Completado |
| 2 | Actualizar functions.php con carga condicional | ✅ Completado |
| 3 | Crear página "Homepage Nueva" (ID 2832) | ✅ Completado |
| 4 | Configurar como página de inicio | ✅ Completado |
| 5 | Limpiar caches (WordPress + Elementor) | ✅ Completado |
| 6 | Verificar carga de CSS y contenido | ✅ Completado |

### URLs

- **Homepage nueva**: https://staging19.proportione.com/
- **Página anterior (backup)**: ID 2793 "Home Elementor"

### Próximos Pasos

1. [ ] Revisar visualmente en desktop, tablet, móvil
2. [ ] Revisar contenidos con Marga
3. [ ] Ajustes de diseño si son necesarios
4. [ ] QA de accesibilidad

---

## Página Filosofía (2026-01-29)

### Objetivo
Implementar la página de Filosofía (Nosotros > Filosofía) usando Elementor con:
- Imágenes seleccionadas de WordPress Media Library
- Animaciones nativas de Elementor
- Contenido completo según el Brand Voice
- Filtro granate corporativo donde aplique

### Archivos Creados

| Archivo | Descripción |
|---------|-------------|
| `content/filosofia-content.md` | Contenido completo de las 7 secciones con verificación Brand Voice |
| `assets/filosofia.css` | CSS específico para la página Filosofía |
| `docs/GUIA-ELEMENTOR-FILOSOFIA.md` | Guía paso a paso para implementar en Elementor |

### Estructura de la Página (7 Secciones)

| # | Sección | Fondo | Contenido Principal |
|---|---------|-------|---------------------|
| 1 | Hero | Imagen + overlay granate 70% | H1 + subtítulo |
| 2 | Introducción | Blanco | Texto centrado 22px |
| 3 | Origen del nombre | Crema | 2 columnas: imagen + texto |
| 4 | Principios | Blanco | 3 cards con imagen |
| 5 | Cómo trabajamos | Crema | Infografía o timeline |
| 6 | Compromiso | Blanco | Texto destacado con borde |
| 7 | CTA | Granate | Botón a /equipo/ |

### Imágenes de Media Library

| Sección | Image ID | Título |
|---------|----------|--------|
| Hero | 2659 | Hombre renacentista estudiando geometría |
| Hero (alt) | 2665 | Forma geométrica abstracta resplandeciente |
| Origen | 2665 | Forma geométrica abstracta resplandeciente |
| Card A | 2618 | Equipo profesionales reunión oficina |
| Card B | 2566 | Persona trabajando laptop oficina moderna |
| Card C | 2543 | Profesional presentando ante equipo |
| Método | 2801 | Infografía transformación digital |

### Animaciones Configuradas

| Animación | Uso |
|-----------|-----|
| Fade In Up | Títulos, textos principales |
| Fade In Left | Imágenes lado izquierdo |
| Fade In Right | Textos lado derecho |
| Zoom In | Bloque compromiso |
| Slide In Left | Timeline pasos |

### Brand Voice Aplicado

**Palabras usadas:**
- Tecnología, Personas, Transferencia de conocimiento
- Acompañamiento, Escucha, Equilibrio
- A medida, Facilitador

**Palabras evitadas:**
- ~~Visión~~, ~~Misión~~, ~~Globales~~, ~~Expertos~~

### Próximos Pasos para Implementación

1. [ ] Subir infografía SVG a Media Library
2. [ ] Crear página "Filosofía" en WordPress (slug: /filosofia/)
3. [ ] Editar con Elementor siguiendo la guía
4. [ ] Añadir imágenes según IDs especificados
5. [ ] Configurar animaciones
6. [ ] Ajustar responsive (tablet/móvil)
7. [ ] Publicar y verificar
8. [ ] Añadir al menú: Nosotros > Filosofía

### SEO

- **Title:** Nuestra Filosofía | Proportione - Tecnología y Personas
- **Meta Description:** En Proportione creemos que la tecnología debe adaptarse a las personas. Conoce nuestra filosofía de trabajo: equilibrio, honestidad y transferencia de conocimiento.

---

## Página de Contacto (2026-01-30)

### Objetivo
Implementar la página de Contacto para staging19.proportione.com con guía completa para Elementor.

### Archivos Creados

| Archivo | Descripción |
|---------|-------------|
| `docs/GUIA-ELEMENTOR-CONTACTO.md` | Guía paso a paso para implementar en Elementor |
| `assets/contacto-elementor.css` | CSS específico para la página Contacto |
| `content/contacto-page.html` | Estructura HTML de referencia |
| `wp-content/themes/hello-elementor-child/contacto-elementor.css` | CSS copiado al child theme |

### Archivos Modificados

| Archivo | Cambio |
|---------|--------|
| `wp-content/themes/hello-elementor-child/functions.php` | Añadida carga condicional de CSS para /contacto/ |

### Estructura de la Página

| # | Sección | Fondo | Contenido Principal |
|---|---------|-------|---------------------|
| 1 | Hero | Granate (#5F322F) | H1 "Contacto" + subtítulo |
| 2 | Formulario | Blanco | Form widget de Elementor |
| 3 | Info contacto | Crema (#F5F0E6) | Email, teléfono, dirección |
| 4 | Mapa | Blanco | Google Maps embed |

### Configuración del Formulario

| Campo | Tipo | Requerido |
|-------|------|-----------|
| Nombre | Text | Sí |
| Email | Email | Sí |
| Teléfono | Tel | No |
| Mensaje | Textarea | Sí |

### Email de Notificación

**Destinatario:** info@proportione.com

### CSS Carga Condicional

El CSS `contacto-elementor.css` se carga únicamente en la página `/contacto/` mediante `is_page('contacto')` en functions.php.

### Próximos Pasos

1. [ ] Crear página "Contacto" en WordPress (slug: /contacto/)
2. [ ] Editar con Elementor siguiendo GUIA-ELEMENTOR-CONTACTO.md
3. [ ] Configurar Form widget con email info@proportione.com
4. [ ] Ajustar responsive
5. [ ] Verificar que CSS carga correctamente

---

## Notas

- **Produccion (proportione.com)**: Intacta, estado original
- **Staging (staging19.proportione.com)**: Estabilizado con redisenos completos
- Todas las paginas principales funcionando correctamente
- Base solida para futuros desarrollos
- **MCP Figma**: Conectado y funcional para lectura de disenos
- **Brand Voice**: Documento oficial de Marga implementado
- **Página Filosofía**: Archivos de contenido, CSS y guía creados, pendiente de implementar en Elementor
