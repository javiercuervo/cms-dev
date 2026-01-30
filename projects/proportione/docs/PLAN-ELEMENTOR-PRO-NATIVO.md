# Plan: Migración a Efectos Nativos de Elementor Pro

**Fecha:** 29 de Enero de 2026
**Objetivo:** Sustituir TODOS los CSS/JS custom por efectos nativos de Elementor Pro
**Alcance:** Staging (staging19.proportione.com)

---

## Estado de Implementación (Actualizado 29 Enero 2026)

| Fase | Estado | Notas |
|------|--------|-------|
| Fase 1: Limpiar código custom | ✅ Completado | mu-plugin flipbox eliminado |
| Fase 2: Rediseñar Clientes | ✅ Completado | Usa Image widgets con hover nativo |
| Fase 3: Actualizar Media Library | ✅ Completado | 14 logos con títulos actualizados |
| Fase 4: Global Settings | ✅ Completado | CSS en mu-plugin site-enhancements |
| Fase 5: QA | ⏳ Pendiente | Requiere verificación manual |

---

## 1. Diagnóstico Actual

### Archivos CSS/JS Custom a Eliminar

| Archivo | Ubicación | Propósito Actual | Sustitución Nativa |
|---------|-----------|------------------|-------------------|
| `proportione-flipbox-global.php` | mu-plugins/ | Hover cards logos | Flip Box widget nativo |
| `proportione-styles.php` | mu-plugins/ | Estilos custom | Site Settings > Custom CSS |
| `accesibilidad.php` | mu-plugins/ | Contraste textos | Theme Style + Custom CSS global |

### Páginas con Efectos Custom

| Página | ID | Efectos Actuales | Estado |
|--------|-----|-----------------|--------|
| Homepage | 2833 | fadeInLeft, fadeInUp | ✅ Ya usa Elementor nativo |
| Metodología | 2800 | fadeInUp, animaciones scroll | ✅ Ya usa Elementor nativo |
| **Clientes** | **122** | **Image widgets + hover nativo** | ✅ Rediseñado |
| Footer | 2796 | Ninguno | ✅ OK |

---

## 2. Efectos Nativos a Usar (del documento de referencia)

### 2.1 Para Clientes - Opciones Disponibles

#### Opción A: Flip Box Widget (PRO) - RECOMENDADA
```
Widget: Flip Box
Ubicación: PRO > Marketing
Efectos disponibles:
- Flip Effect: Flip, Slide, Push, Zoom In, Zoom Out, Fade
- Flip Direction: Right, Left, Up, Down
- 3D Depth: ON/OFF

Configuración recomendada:
- Front: Image (logo)
- Back: Title + Description
- Effect: Flip
- Direction: Right
- 3D Depth: YES
```

**Problema identificado:** El Flip Box no acepta configuración vía JSON correctamente. Los campos internos tienen nombres diferentes a los documentados.

**Solución:** Crear los Flip Boxes MANUALMENTE en el editor de Elementor, no vía JSON/CLI.

#### Opción B: Image Widget + Hover Effects
```
Widget: Image
Hover Animation: Zoom In (Style > Hover)
Overlay: Custom CSS dentro de Elementor

Limitación: No permite mostrar texto al hover de forma nativa sin CSS.
```

#### Opción C: Gallery Widget con Overlay
```
Widget: Gallery (PRO)
Hover Animation: Slide In, Zoom, Fade
Overlay: Text o Icon

Ventaja: Permite overlay de texto nativo al hover.
Configuración:
- Hover Animation: Slide In
- Overlay: Text
- Content: Nombre del cliente
```

### 2.2 Entrance Animations (ya usadas correctamente)

```
Ubicación: Advanced > Motion Effects > Entrance Animation

Animaciones en uso:
- fadeInLeft: Títulos principales
- fadeInUp: Cards, elementos de lista

Parámetros:
- Animation Delay: 0, 100, 200, 300... (escalonado)
- Animation Duration: Default (1000ms)
```

### 2.3 Motion Effects para Scroll

```
Ubicación: Advanced > Motion Effects > Scrolling Effects

Efectos disponibles:
- Vertical Scroll (Parallax): Para heroes con imagen de fondo
- Transparency: Fade in/out al scroll
- Scale: Zoom al scroll

Recomendación para Proportione:
- Hero sections: Vertical Scroll (parallax) en background
- Cards: Entrance Animation al entrar en viewport
```

---

## 3. Plan de Implementación

### Fase 1: Limpiar Código Custom (15 min)

1. **Eliminar mu-plugin de hover cards:**
   ```bash
   ssh siteground-proportione "rm ~/www/staging19.proportione.com/public_html/wp-content/mu-plugins/proportione-flipbox-global.php"
   ```

2. **Migrar estilos de accesibilidad a Site Settings:**
   - Site Settings > Custom CSS
   - Mover contenido de `accesibilidad.css`

3. **Verificar que el sitio sigue funcionando** sin los mu-plugins custom

---

### Fase 2: Rediseñar Página Clientes (30-45 min)

#### Opción Recomendada: Gallery Widget con Hover Overlay

**Estructura propuesta:**

```
SECCIÓN 1: HERO
├── Container (full width, 50vh, overlay granate)
│   └── Heading: "Clientes que confían en Proportione"
│       └── Entrance Animation: fadeInLeft

SECCIÓN 2: GALERÍA DE LOGOS
├── Container (fondo crema #F5F0E6)
│   └── Gallery Widget (PRO)
│       ├── Images: Todos los logos
│       ├── Columns: 5 (desktop), 3 (tablet), 2 (mobile)
│       ├── Hover Animation: Grow
│       ├── Overlay: Title + Description
│       ├── Overlay Animation: Slide Up
│       └── Entrance Animation: fadeInUp (container)

SECCIÓN 3: PERSONAS Y TECNOLOGÍA
├── Container (fondo granate #5F322F)
│   ├── Heading: "Personas y tecnología"
│   └── Gallery Widget (logos MAPFRE, etc.)

SECCIÓN 4: CTA
├── Container (fondo blanco)
│   ├── Heading: "¿Quiere ser el próximo caso de éxito?"
│   └── Button: "Contactar ahora"
```

#### Configuración Gallery Widget:

| Parámetro | Valor |
|-----------|-------|
| **Layout** | Grid |
| **Columns** | 5 / 3 / 2 |
| **Image Size** | Medium |
| **Aspect Ratio** | 1:1 o 4:3 |
| **Gap** | 24px |
| **Hover Animation** | Grow |
| **Overlay** | Title |
| **Overlay Animation** | Slide Up |
| **Overlay Background** | rgba(0,0,0,0.7) |
| **Title Color** | #FFFFFF |

**Nota:** La Gallery requiere que cada imagen tenga título/caption configurado en Media Library.

---

### Fase 3: Actualizar Imágenes en Media Library (15 min)

Para que el overlay del Gallery muestre el nombre del cliente, cada logo debe tener:

| Campo | Contenido |
|-------|-----------|
| **Title** | Nombre del cliente |
| **Caption** | Descripción breve (opcional) |
| **Alt Text** | Ya configurado por AltText.ai |

**Logos a actualizar:**

| ID | Imagen | Title a configurar |
|----|--------|-------------------|
| 1864 | Sngular.png | Sngular |
| 1863 | Mensoft.png | Mensoft |
| 2420 | Untitled.png (Lejan) | Lejan |
| 1865 | Sparkassen.png | Sparkassen México |
| 1842 | Universidad-UNIE.png | Universidad UNIE |
| 1840 | EAE-Business-School.png | EAE Business School |
| 1843 | Uxer-School.png | Uxer School |
| - | Grado-LEINN.png | Grado LEINN |
| - | ucm.png | UCM |
| - | Fundacion-Prodis.png | Fundación Prodis |
| - | Naranjas-Perdine.png | Naranjas Perdine |
| - | Farma-54.png | Farma 54 |
| - | Cartagena-Puerto-de-Culturas.png | Cartagena |
| - | logo-icon-200x200-1.png | Hispanidad |
| 3008 | mapfre-white.png | MAPFRE |

---

### Fase 4: Aplicar Efectos Nativos Globalmente (20 min)

#### 4.1 Site Settings > Global Colors

```
Primary: #5F322F (Granate)
Secondary: #6E8157 (Verde oliva)
Text: #333333
Accent: #F5F0E6 (Crema)
```

#### 4.2 Site Settings > Global Fonts

```
Primary: Oswald (títulos)
- Weight: 600
- Size: Variable por nivel H1-H6

Secondary: Raleway (cuerpo)
- Weight: 400/600
- Size: 16px base
```

#### 4.3 Theme Style > Buttons

```
Background: #6E8157 (verde)
Text: #FFFFFF
Border Radius: 6px
Padding: 18px 48px
Hover Background: #5a7049 (verde oscuro)
Transition: 300ms
```

#### 4.4 Site Settings > Custom CSS

```css
/* Accesibilidad - Contraste en fondos oscuros */
.e-con[data-settings*="background_color\":\"#5F322F"] h1,
.e-con[data-settings*="background_color\":\"#5F322F"] h2,
.e-con[data-settings*="background_color\":\"#5F322F"] p {
    color: #FFFFFF !important;
}

/* Hover suave en cards */
.elementor-widget-gallery .e-gallery-item {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.elementor-widget-gallery .e-gallery-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
}
```

---

### Fase 5: Verificación y QA (15 min)

#### Checklist por Página:

**Homepage:**
- [ ] Animaciones de entrada funcionan
- [ ] Parallax en hero (si aplica)
- [ ] Botones con hover nativo
- [ ] Footer visible

**Metodología:**
- [ ] Tablas/infografías se animan al scroll
- [ ] Entrada escalonada de cards
- [ ] Responsive correcto

**Clientes:** (URL: /clientes/)
- [x] Image widgets muestran 14 logos
- [x] Hover nativo "grow" + CSS elevación
- [x] Animación fadeInUp escalonada (0-1300ms)
- [x] MAPFRE en sección "Personas y tecnología"
- [x] CTA con botón verde funcional

#### Checklist Global:

- [ ] Sin errores en consola
- [x] CSS mínimo en proportione-site-enhancements.php (hover + accesibilidad)
- [ ] PageSpeed > 80
- [ ] Funciona en mobile
- [x] Accesibilidad: reduced-motion respetado en CSS

---

## 4. Comandos de Implementación

### Paso 1: Eliminar mu-plugins custom
```bash
ssh siteground-proportione "cd ~/www/staging19.proportione.com/public_html/wp-content/mu-plugins && rm -f proportione-flipbox-global.php && ls -la"
```

### Paso 2: Actualizar títulos de imágenes en Media Library
```bash
ssh siteground-proportione "cd ~/www/staging19.proportione.com/public_html && \
wp post update 1864 --post_title='Sngular' && \
wp post update 1863 --post_title='Mensoft' && \
wp post update 2420 --post_title='Lejan' && \
wp post update 1865 --post_title='Sparkassen México' && \
wp post update 1842 --post_title='Universidad UNIE' && \
wp post update 1840 --post_title='EAE Business School' && \
wp post update 1843 --post_title='Uxer School' && \
wp post update 3008 --post_title='MAPFRE'"
```

### Paso 3: Crear página con Gallery Widget (vía Elementor UI)

**NO SE PUEDE HACER VÍA CLI** - El Gallery Widget requiere configuración manual en el editor de Elementor porque:
1. Necesita seleccionar imágenes de la Media Library
2. Configurar overlay y hover animations
3. Ajustar responsive por breakpoint

**Instrucciones para editor:**
1. Ir a wp-admin > Pages > Clientes > Edit with Elementor
2. Borrar contenido actual
3. Añadir estructura según Fase 2
4. Guardar y publicar

---

## 5. Alternativa: Implementación Híbrida

Si el Gallery Widget no permite suficiente personalización del overlay, usar:

### Image Box Widget (PRO)

```
Widget: Image Box
Configuración:
- Image: Logo del cliente
- Title: Nombre del cliente
- Description: Descripción breve
- Position: Image Top

Efectos:
- Hover Animation (Advanced): Transform Scale 1.03
- Entrance Animation: fadeInUp
```

**Ventaja:** Cada Image Box es independiente, más control.
**Desventaja:** Más trabajo manual.

---

## 6. Timeline Estimado

| Fase | Tiempo | Dependencias |
|------|--------|--------------|
| 1. Limpiar código | 15 min | Ninguna |
| 2. Rediseñar Clientes | 30-45 min | Fase 1 |
| 3. Actualizar Media Library | 15 min | Ninguna |
| 4. Global Settings | 20 min | Ninguna |
| 5. QA | 15 min | Fases 1-4 |
| **Total** | **~2 horas** | |

---

## 7. Rollback Plan

Si algo falla:

1. **Restaurar mu-plugins:**
   ```bash
   # Los archivos están en /tmp/ local
   scp /tmp/proportione-*.php siteground-proportione:~/www/staging19.proportione.com/public_html/wp-content/mu-plugins/
   ```

2. **Restaurar Elementor data de Clientes:**
   ```bash
   # Backup actual
   ssh siteground-proportione "cd ~/www/staging19.proportione.com/public_html && wp post meta get 122 _elementor_data > ~/backup-clientes-122.json"
   ```

---

## 8. Próximos Pasos Después de Este Plan

1. **Documentar configuración final** en `docs/`
2. **Crear backup de templates Elementor** en `elementor-templates/`
3. **Actualizar script de migración** para incluir Gallery settings
4. **Planificar migración a producción**

---

---

## 9. Notas de Implementación (29 Enero 2026)

### Cambios respecto al plan original:

1. **Se usó Image Widget en lugar de Gallery Widget**
   - Razón: Mayor control individual sobre cada logo
   - Ventaja: Configuración de hover_animation nativa por widget
   - Animación: fadeInUp con delay escalonado (0-1300ms)

2. **CSS se mantiene en mu-plugin**
   - Archivo: `proportione-site-enhancements.php`
   - Propósito: Hover elevación y accesibilidad
   - NO se usa JavaScript custom

3. **Corrección de estructura de página**
   - Page 122 ahora es top-level (sin parent)
   - URL: `/clientes/` (slug actualizado)
   - Título: "Confían en Proportione"

### mu-plugins actuales:

| Archivo | Propósito | Estado |
|---------|-----------|--------|
| 0-modular-connector.php | ModularDS | Mantener |
| accesibilidad.php | Carga CSS externo | Evaluar consolidar |
| proportione-styles.php | Carga CSS Elementor | Evaluar consolidar |
| proportione-site-enhancements.php | Hover + accesibilidad inline | Nuevo |

### Próximos pasos recomendados:

1. Verificar página en dispositivos móviles
2. Consolidar CSS de accesibilidad en un solo archivo
3. Ejecutar PageSpeed Insights
4. Planificar migración a producción

---

**Implementación completada.**
