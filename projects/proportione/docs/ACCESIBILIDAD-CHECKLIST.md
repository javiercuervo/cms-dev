# Checklist de Accesibilidad - Proportione

## Referencia: WCAG 2.1 Nivel AA

---

## 1. Perceptible

### 1.1 Alternativas de Texto
- [ ] Todas las imágenes tienen `alt` descriptivo
- [ ] Imágenes decorativas tienen `alt=""`
- [ ] Logos tienen alt con nombre de empresa
- [ ] Iconos tienen `aria-label` o texto oculto

### 1.2 Contenido Multimedia
- [ ] Videos tienen subtítulos (si aplica)
- [ ] Audio tiene transcripción (si aplica)

### 1.3 Adaptable
- [ ] Estructura semántica correcta (h1 > h2 > h3)
- [ ] Solo un h1 por página
- [ ] Listas usan `<ul>`, `<ol>`, `<dl>`
- [ ] Tablas tienen `<th>` y `scope`

### 1.4 Distinguible
- [ ] **Contraste mínimo 4.5:1** para texto normal
- [ ] **Contraste mínimo 3:1** para texto grande (>18px bold, >24px normal)
- [ ] No se usa solo color para transmitir información
- [ ] Texto puede ampliarse 200% sin perder funcionalidad

#### Colores Proportione - Verificar Contraste
| Combinación | Ratio | Estado |
|-------------|-------|--------|
| #333333 sobre #FFFFFF | 12.6:1 | ✅ |
| #5F322F sobre #FFFFFF | 8.4:1 | ✅ |
| #5F322F sobre #F5F0E6 | 6.8:1 | ✅ |
| #FFFFFF sobre #5F322F | 8.4:1 | ✅ |
| #F5F0E6 sobre #5F322F | 6.8:1 | ✅ |
| #6E8157 sobre #FFFFFF | 4.1:1 | ⚠️ Límite |
| #6E8157 sobre #F5F0E6 | 3.3:1 | ⚠️ Solo texto grande |

---

## 2. Operable

### 2.1 Accesible por Teclado
- [ ] Toda funcionalidad accesible con teclado
- [ ] Sin trampas de teclado (focus loops)
- [ ] Orden de tabulación lógico
- [ ] Skip links para saltar navegación

### 2.2 Tiempo Suficiente
- [ ] Sliders/carruseles pausables
- [ ] Contenido en movimiento controlable
- [ ] Sin límites de tiempo para formularios

### 2.3 Convulsiones
- [ ] Sin contenido que parpadee >3 veces/segundo

### 2.4 Navegable
- [ ] Títulos de página descriptivos (`<title>`)
- [ ] Propósito de enlaces claro por contexto
- [ ] Múltiples formas de encontrar páginas (menú, búsqueda, sitemap)
- [ ] Encabezados describen contenido
- [ ] Focus visible en todos los elementos interactivos

### 2.5 Modalidades de Entrada
- [ ] Áreas clicables mínimo 44x44px
- [ ] Gestos complejos tienen alternativa simple

---

## 3. Comprensible

### 3.1 Legible
- [ ] Idioma de página declarado (`lang="es"`)
- [ ] Idioma de partes en otro idioma declarado
- [ ] Abreviaturas explicadas

### 3.2 Predecible
- [ ] Navegación consistente en todas las páginas
- [ ] Componentes identificados consistentemente
- [ ] Sin cambios de contexto inesperados

### 3.3 Entrada de Datos
- [ ] Errores identificados claramente
- [ ] Etiquetas/instrucciones en formularios
- [ ] Sugerencias de corrección de errores
- [ ] Confirmación antes de envíos importantes

---

## 4. Robusto

### 4.1 Compatible
- [ ] HTML válido (sin errores graves)
- [ ] ARIA usado correctamente
- [ ] Nombres y roles de componentes correctos

---

## Verificación por Página

### Homepage (/)
- [ ] Hero slider pausable
- [ ] Contraste en overlay de imágenes
- [ ] Alt en imágenes de slider
- [ ] Botones con texto descriptivo

### Mayte Tortosa (/mayte-tortosa/)
- [ ] Jerarquía h1 > h2 > h3
- [ ] Alt en foto de perfil
- [ ] Contraste en expertise cards

### Javier Cuervo (/javier-cuervo/)
- [ ] Jerarquía h1 > h2 > h3
- [ ] Alt en foto de perfil
- [ ] Contraste en expertise cards

### Header
- [ ] Logo tiene alt
- [ ] Menú navegable por teclado
- [ ] Submenús accesibles
- [ ] Hamburguesa móvil tiene aria-label

### Footer
- [ ] Enlaces tienen propósito claro
- [ ] Logo tiene alt
- [ ] Contraste texto sobre granate

---

## Herramientas de Verificación

1. **WAVE** - https://wave.webaim.org/
2. **axe DevTools** - Extensión Chrome/Firefox
3. **Lighthouse** - Chrome DevTools > Audits
4. **Contrast Checker** - https://webaim.org/resources/contrastchecker/
5. **Validador HTML W3C** - https://validator.w3.org/

---

## Prioridad de Corrección

| Nivel | Descripción | Impacto |
|-------|-------------|---------|
| P0 | Bloquea acceso (teclado, lector) | Crítico |
| P1 | Contraste insuficiente | Alto |
| P2 | Alt faltantes | Alto |
| P3 | Estructura semántica | Medio |
| P4 | Mejoras ARIA | Bajo |

---

## Estado Actual: 2026-01-29

### Completado
- [x] Paleta de colores con contraste verificado
- [x] Tipografías legibles (Oswald/Raleway)
- [x] Jerarquía de encabezados en páginas de equipo
- [x] Header con z-index (siempre visible)

### Pendiente Mañana
- [ ] Verificar alt en todas las imágenes
- [ ] Revisar slider con herramienta WAVE
- [ ] Probar navegación por teclado
- [ ] Verificar focus visible
- [ ] Añadir skip links si faltan
