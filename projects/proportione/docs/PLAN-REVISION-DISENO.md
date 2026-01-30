# Plan de Revisión de Diseño - Proportione

## Resumen Ejecutivo

Este plan establece el proceso de revisión del diseño del sitio web de Proportione, siguiendo las guías documentadas en la carpeta `content/`:
- `guia-diseno-visual-consultoria.md` - Patrones visuales y estructurales
- `guia-comunicacion-consultoria.md` - Tonalidad, voz y contenido
- `proportione-framework.md` - Framework de servicios y metodología
- `sintesis-ejecutiva.md` - Principios clave integrados

---

## FASE 1: Revisión Global del Diseño

### 1.1 Auditoría de Identidad Visual

**Objetivo:** Verificar coherencia con identidad corporativa documentada en `docs/IDENTIDAD-VISUAL.md`

| Elemento | Especificación | Verificar |
|----------|---------------|-----------|
| **Color principal** | `#5F322F` (granate) | Uso consistente en headers, CTAs, acentos |
| **Color secundario** | `#6E8157` (verde oliva) | Uso en elementos secundarios, subtítulos |
| **Neutros** | `#F5F0E6` (crema), `#333` (texto) | Fondos de sección, texto principal |
| **Tipografía títulos** | Oswald / Bourbon Grotesque | H1, H2, H3 |
| **Tipografía cuerpo** | Raleway | Párrafos, listas, metadatos |

**Checklist Global de Colores:**
- [ ] Color primario (#5F322F) usado máximo 15-20% de la página
- [ ] Fondo crema (#F5F0E6) en secciones alternadas
- [ ] Texto principal en gris oscuro (#333), nunca negro puro
- [ ] Verde oliva (#6E8157) solo en acentos secundarios
- [ ] Sin colores no corporativos introducidos

---

### 1.2 Auditoría Tipográfica

**Jerarquía esperada (según guía visual):**

| Nivel | Elemento | Tamaño | Peso | Fuente |
|-------|----------|--------|------|--------|
| 1 | H1 Hero | 72-96px | 700 | Oswald |
| 2 | H2 Sección | 36-48px | 600 | Oswald |
| 3 | H3 Subsección | 24-32px | 600 | Oswald |
| 4 | H4 Card | 18-20px | 600 | Oswald |
| 5 | Body | 16px | 400 | Raleway |
| 6 | Small/Meta | 12-14px | 500 | Raleway |

**Checklist Global de Tipografía:**
- [ ] Line-height de body 1.6-1.8
- [ ] Párrafos máximo 4 líneas (80 palabras)
- [ ] Ancho de lectura máximo 800px en body
- [ ] Contraste texto ≥ 4.5:1 (WCAG AA)
- [ ] Letter-spacing en títulos grandes: 0 a -0.02em

---

### 1.3 Auditoría de Espaciado

**Escala de espaciado estándar:**
```
xs: 8px    | Entre elementos pequeños
sm: 16px   | Entre ítems de lista
md: 24px   | Entre párrafos
lg: 32px   | Padding de cards
xl: 48px   | Entre secciones menores
2xl: 64px  | Entre secciones
3xl: 80px  | Entre secciones principales
```

**Checklist Global de Espaciado:**
- [ ] Separación entre secciones principales: 80-120px
- [ ] Padding interno de cards: 24-32px
- [ ] Márgenes laterales desktop: 60-80px
- [ ] Márgenes laterales mobile: 16-24px
- [ ] Grid de 12 columnas respetado
- [ ] Gutter entre columnas: 24-32px

---

### 1.4 Auditoría de Imágenes

**Según `grid-imagenes-home.md`:**

| Elemento | Tratamiento | Overlay |
|----------|------------|---------|
| Hero backgrounds | Granate 75-80% opacity | Obligatorio |
| Card images | Desaturación parcial | Opcional |
| Iconos | Monocromo o color primario | - |

**Checklist Global de Imágenes:**
- [ ] Alt text descriptivo en todas las imágenes
- [ ] Overlays aplicados en imágenes de fondo
- [ ] Ratio 16:9 en hero, 4:3 en cards
- [ ] Lazy loading implementado
- [ ] Imágenes optimizadas (WebP preferido)

---

### 1.5 Auditoría de Navegación

**Estructura esperada:**
```
[Logo] | Inicio | Nosotros ▼ | Servicios ▼ | Divina Proportione | Blog | Contacto | [CTA]
```

**Checklist de Navegación:**
- [ ] Header sticky (permanece visible al scroll)
- [ ] Altura header: 60-80px
- [ ] Logo ancho: 140-180px
- [ ] Links: 14-16px, peso 400-500
- [ ] Hover: transición 150ms, color primario
- [ ] CTA prominente, color primario
- [ ] Mobile: hamburger menu funcional

---

### 1.6 Auditoría de CTAs y Botones

**Jerarquía de botones:**

| Tipo | Fondo | Texto | Uso |
|------|-------|-------|-----|
| Primary | #5F322F | #F5F0E6 | CTA principal |
| Secondary | #F5F0E6 | #5F322F | Acciones secundarias |
| Ghost | Transparente | #5F322F + borde | Links destacados |

**Checklist de Botones:**
- [ ] Altura 48-52px
- [ ] Padding 16-20px horizontal
- [ ] Border-radius 4-6px
- [ ] Hover: color más oscuro + sombra suave
- [ ] Focus ring visible (accesibilidad)
- [ ] Transición 200ms ease

---

## FASE 2: Revisión Página a Página

### 2.1 Homepage

**Estructura esperada:**
```
┌─────────────────────────────────────┐
│ NAVIGATION (sticky, 70px)           │
├─────────────────────────────────────┤
│ HERO SECTION (500-700px)            │
│ - Proposición principal             │
│ - Subtítulo                         │
│ - CTA primario                      │
├─────────────────────────────────────┤
│ SERVICIOS (Grid 3 columnas)         │
│ - Estrategia | Tecnología | Personas│
├─────────────────────────────────────┤
│ METODOLOGÍA                         │
│ - Los 4 pasos: Diagnose, Design...  │
├─────────────────────────────────────┤
│ FILOSOFÍA / FRAMEWORK 20-60-20      │
├─────────────────────────────────────┤
│ EQUIPO / SOCIAL PROOF               │
├─────────────────────────────────────┤
│ CTA FINAL                           │
├─────────────────────────────────────┤
│ FOOTER                              │
└─────────────────────────────────────┘
```

**Checklist Homepage:**
- [ ] Hero: proposición máximo 8 palabras
- [ ] Hero: subtítulo máximo 2 líneas
- [ ] Hero: imagen con overlay granate 75-80%
- [ ] Servicios: 3 cards uniformes
- [ ] Metodología: pasos claramente diferenciados
- [ ] Framework 20-60-20 visible
- [ ] CTA final prominente
- [ ] Links internos a páginas de servicio

---

### 2.2 Página Mayte Tortosa (CEO)

**Archivo:** `content/mayte-tortosa-page.html`

**Estructura actual:**
1. Hero con foto + nombre + rol
2. Proposición de valor
3. Grid de expertise (4 cards)
4. Trayectoria (grid 4 items)
5. Filosofía con quote
6. Credenciales
7. CTA final

**Checklist Mayte Tortosa:**
- [ ] Hero: foto profesional, ratio correcto
- [ ] Colores coherentes (#5F322F, #6E8157, #F5F0E6)
- [ ] Tipografía: Oswald títulos, Raleway cuerpo
- [ ] Grid expertise: 4 cards con padding uniforme
- [ ] Quote: estilo coherente con guía
- [ ] Credenciales: badges/tags con fondo #F5F0E6
- [ ] CTA: "Contactar" visible y prominente
- [ ] Espaciado entre secciones: 60px

---

### 2.3 Página Javier Cuervo (CTO)

**Archivo:** `content/javier-cuervo-page.html`

**Estructura actual:**
1. Hero con foto + nombre + rol
2. Proposición de valor
3. Grid de expertise (4 cards)
4. Trayectoria (grid 4 items)
5. Thought Leadership (3 cards)
6. Credenciales
7. CTA final

**Checklist Javier Cuervo:**
- [ ] Hero: foto profesional, ratio correcto
- [ ] Colores coherentes con Mayte (misma plantilla)
- [ ] Tipografía: Oswald títulos, Raleway cuerpo
- [ ] Grid expertise: 4 cards uniformes
- [ ] Thought Leadership: cards con borde izquierdo #5F322F
- [ ] Credenciales: badges coherentes
- [ ] CTA: "Contactar" idéntico a Mayte
- [ ] Espaciado consistente entre páginas de equipo

---

### 2.4 Página Investigación

**Archivo:** `content/investigacion-page.html`

**Estructura actual:**
1. Hero con título + subtítulo
2. Áreas de investigación (4 cards)
3. Enfoque metodológico
4. Colaboraciones académicas
5. Transferencia de conocimiento (lista)

**Checklist Investigación:**
- [ ] Hero: estilo coherente con otras páginas
- [ ] Cards de áreas: estructura uniforme
- [ ] Lista de transferencia: bullets coherentes
- [ ] Espaciado entre secciones: 60px
- [ ] Sin CTA final (añadir uno)
- [ ] Colores corporativos aplicados

---

### 2.5 Página Divina Proportione

**Verificar según `IDENTIDAD-VISUAL.md`:**
- [ ] Referencia visual a poliedros de Leonardo
- [ ] Explicación del origen del nombre
- [ ] Conexión con proporción áurea (φ = 1.618)
- [ ] Imágenes: ID 177 (Fibonacci) o 2649 (Erudito)
- [ ] Tono académico pero accesible

---

### 2.6 Páginas de Servicios

**Estructura esperada (según guía):**
```
┌─────────────────────────────────────┐
│ HERO: Nombre del Servicio           │
├─────────────────────────────────────┤
│ PROPOSICIÓN (1-2 oraciones)         │
├─────────────────────────────────────┤
│ CONTEXTO/PROBLEMA (2-3 párrafos)    │
├─────────────────────────────────────┤
│ DESCRIPCIÓN CAPACIDAD (qué/cómo/why)│
├─────────────────────────────────────┤
│ BENEFICIOS (4-6 bullets)            │
├─────────────────────────────────────┤
│ CASOS DE ÉXITO (2-3 items)          │
├─────────────────────────────────────┤
│ CONTENIDO RELACIONADO (3-6 items)   │
├─────────────────────────────────────┤
│ CTA FINAL                           │
└─────────────────────────────────────┘
```

**Servicios a revisar:**
- [ ] Transformación Digital
- [ ] Estrategia de IA
- [ ] Gestión del Cambio
- [ ] Digitalización de RRHH
- [ ] Digitalización de Operaciones
- [ ] Digitalización de Aprendizaje

---

### 2.7 Página de Blog/Insights

**Checklist Blog:**
- [ ] Grid de artículos: 3 columnas desktop
- [ ] Cards: imagen + título + extracto + fecha
- [ ] Tipografía títulos: 18-20px semibold
- [ ] Hover en cards: sombra aumenta
- [ ] Paginación o infinite scroll
- [ ] Filtros por categoría

---

### 2.8 Página de Contacto

**Checklist Contacto:**
- [ ] Formulario con campos esenciales
- [ ] Labels: 12-14px, peso 500-600
- [ ] Inputs: altura 40-48px, borde 1-2px gris
- [ ] Focus en inputs: borde color primario
- [ ] Botón submit: estilo Primary
- [ ] Información de contacto visible
- [ ] Mapa o dirección (opcional)

---

## FASE 3: Revisión de Comunicación y Contenido

### 3.1 Auditoría de Tonalidad

**Según `guia-comunicacion-consultoria.md`:**

| Contexto | Tono | Ejemplo |
|----------|------|---------|
| Proposición Hero | Aspiracional | "Transformación digital no traumática" |
| Descripción servicios | Capaz + colaborativo | "Trabajamos con organizaciones para..." |
| Casos de éxito | Narrativo + cuantitativo | "Redujo costes 300M en 18 meses" |
| CTAs | Invitador | "Descubre cómo..." |

**Checklist de Tonalidad:**
- [ ] Ausencia de primera persona (I/me) en contenido corporativo
- [ ] Uso de "We" institucional, no personal
- [ ] Verbos transitivos con objetos claros
- [ ] Proposiciones máximo 8 palabras
- [ ] Sin urgencia artificial ("¡Ahora!", "¡Limitado!")
- [ ] Sin jerga vacía ("synergize", "leverage")

---

### 3.2 Verbos Preferidos (según guía)

**Usar:**
- unlock, transform, build, scale, drive, reimagine, enable, empower

**Evitar:**
- leverage, synergize, best-in-class, cutting-edge (sobreutilizados)

---

### 3.3 Métricas Requeridas

**Todo caso de éxito DEBE incluir:**
- [ ] Número específico cuantificado
- [ ] Período temporal (3 meses, 18 meses)
- [ ] Contexto de magnitud (% reducción, multiplicador)
- [ ] Implicación para la organización

**Ejemplos válidos:**
- "$300M saved over two years"
- "90% reduction in manual FTE effort"
- "7 months from ideation to deployment"

---

## FASE 4: Revisión de Accesibilidad

### 4.1 Checklist WCAG AA

- [ ] Contraste texto ≥ 4.5:1 (body)
- [ ] Contraste texto ≥ 3:1 (títulos grandes)
- [ ] Focus ring visible en elementos interactivos
- [ ] Alt text en todas las imágenes
- [ ] Estructura de headings jerárquica (H1→H2→H3)
- [ ] Links descriptivos (no "click aquí")
- [ ] Tamaño mínimo de texto: 14px
- [ ] Área de click mínima: 44x44px

---

### 4.2 Responsive

**Breakpoints:**
```
Mobile: 320px - 640px
Tablet: 641px - 1024px
Desktop: 1025px - 1200px
Large: 1201px+
```

**Checklist Responsive:**
- [ ] Navegación: hamburger en mobile
- [ ] Grids: 1 columna mobile, 2 tablet, 3-4 desktop
- [ ] Tipografía: reducción proporcional
- [ ] Imágenes: responsive con srcset
- [ ] CTAs: full-width en mobile

---

## FASE 5: Priorización y Ejecución

### 5.1 Prioridad Alta (Semana 1)

1. **Homepage** - Punto de entrada principal
   - Hero section
   - Grid de servicios
   - Metodología 4 pasos
   - CTAs

2. **Navegación global** - Afecta a todo el sitio
   - Header sticky
   - Mobile menu
   - Footer

3. **Colores y tipografía** - Coherencia global
   - Variables CSS
   - Componentes base

### 5.2 Prioridad Media (Semana 2)

4. **Páginas de equipo** - Credibilidad
   - Mayte Tortosa
   - Javier Cuervo

5. **Páginas de servicios** - Conversión
   - Estructura uniforme
   - CTAs consistentes

### 5.3 Prioridad Normal (Semana 3)

6. **Páginas secundarias**
   - Investigación
   - Divina Proportione
   - Blog/Insights

7. **Contacto**
   - Formulario
   - Información

---

## Herramientas de Verificación

### Contraste
- [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/)
- Chrome DevTools Lighthouse

### Responsive
- Chrome DevTools Device Mode
- Viewport Resizer extension

### Performance
- Google PageSpeed Insights
- GTmetrix

### Accesibilidad
- WAVE Web Accessibility Evaluation Tool
- Lighthouse Accessibility audit

---

## Documentación Relacionada

- `/content/guia-diseno-visual-consultoria.md` - Guía visual completa
- `/content/guia-comunicacion-consultoria.md` - Guía de comunicación
- `/content/proportione-framework.md` - Framework de servicios
- `/content/sintesis-ejecutiva.md` - Síntesis integrada
- `/docs/IDENTIDAD-VISUAL.md` - Identidad corporativa
- `/content/grid-imagenes-home.md` - Selección de imágenes

---

**Fecha de creación:** Enero 2026
**Última actualización:** Enero 2026
**Estado:** Listo para ejecución
