# Efectos Nativos de Elementor Pro para WordPress

## 1. Vista General

Elementor Pro ofrece un conjunto completo de efectos y animaciones nativos (sin necesidad de addons externos) que operan en múltiples niveles: widgets individuales, contenedores/secciones, columnas, y configuraciones globales del sitio. Este documento documenta exclusivamente los efectos incorporados de Elementor Pro, verificados mediante fuentes primarias oficiales.

### Niveles de aplicación de efectos:
1. **Nivel Widget**: Efectos específicos del widget (Flip Box, Carousel, etc.)
2. **Nivel Contenedor/Sección/Columna**: Motion Effects, Shape Dividers, fondos animados
3. **Nivel Global**: Global Colors, Global Fonts, Theme Style, Custom CSS
4. **Nivel Interacción**: Hover states, Entrance animations, Scroll effects

---

## 2. Efectos por Nivel

### 2.1 Nivel Sección/Contenedor

#### Motion Effects (Advanced Tab > Motion Effects)

##### Entrance Animations
**Dónde activar**: Section/Container > Advanced > Motion Effects > Entrance Animation  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Entrance Animations](https://elementor.com/help/entrance-animations/)

**37 tipos de animaciones de entrada disponibles:**
- **Fading** (5): Fade In, Fade In Up, Fade In Down, Fade In Left, Fade In Right
- **Zooming** (5): Zoom In, Zoom In Up, Zoom In Down, Zoom In Left, Zoom In Right
- **Bouncing** (3): Bounce In, Bounce In Up, Bounce In Down, Bounce In Left, Bounce In Right
- **Sliding** (4): Slide In Up, Slide In Down, Slide In Left, Slide In Right
- **Rotating** (5): Rotate In, Rotate In Down Left, Rotate In Down Right, Rotate In Up Left, Rotate In Up Right
- **Attention Seekers** (10): Bounce, Flash, Pulse, Rubber Band, Shake, Head Shake, Swing, Tada, Wobble, Jello
- **Light Speed** (1): Light Speed In
- **Specials** (1): Roll In

**Parámetros**: Animación configurable por dispositivo (Desktop, Tablet, Mobile), duración, delay.

**Nota Importante**: Elementor respeta la preferencia "Reduced Motion" del usuario (accesibilidad).

---

##### Scrolling Effects
**Dónde activar**: Section/Container > Advanced > Motion Effects > Scrolling Effects  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Motion Effects](https://elementor.com/help/motion-effects/)

| Efecto | Descripción | Parámetros |
|--------|-------------|-----------|
| **Vertical Scroll** (Parallax clásico) | Elemento se mueve a distinta velocidad que la página al scroll vertical | Dirección (Arriba/Abajo), Velocidad, Viewport scale |
| **Horizontal Scroll** | Elemento se mueve horizontalmente según scroll vertical | Dirección (Izq/Der), Velocidad |
| **Transparency** | Elemento se hace más/menos opaco según scroll | 4 direcciones: Fade In, Fade Out, Fade Out In, Fade In Out |
| **Blur** | Elemento se desenfoca progresivamente | 4 direcciones: Fade In, Fade Out, Fade Out In, Fade In Out |
| **Rotate** | Elemento rota según scroll | Dirección (Clockwise/Counter), Velocidad, X/Y Anchor Point |
| **Scale** | Elemento crece/encoge según scroll | 4 direcciones: Scale Up, Scale Down, Scale Down Up, Scale Up Down |

**Parámetros globales**:
- **Apply Effects On**: Desktop, Tablet, Mobile
- **Effects Relative To**: Viewport o documento completo
- **X/Y Anchor Points** (para Rotate/Scale): Define el punto de rotación/escalado

---

##### Mouse Effects
**Dónde activar**: Section/Container > Advanced > Motion Effects > Mouse Effects  
**Disponible**: [PRO]  
**Fuente**: [Elementor Blog - Motion Effects](https://elementor.com/blog/introducing-motion-effects/)

| Efecto | Descripción |
|--------|-------------|
| **Mouse Track** | Elemento se mueve según posición del cursor (crea sensación de profundidad) |
| **3D Tilt** | Elemento se inclina según movimiento del cursor (efecto 3D) |

**Nota**: Mouse effects solo funcionan en desktop.

---

##### Sticky Effect
**Dónde activar**: Section/Container > Advanced > Motion Effects > Sticky  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Sticky Headers](https://elementor.com/help/sticky-headers/)

| Parámetro | Opciones |
|-----------|----------|
| **Sticky** | None, Top, Bottom |
| **Sticky On** | Desktop, Tablet Portrait, Mobile Portrait |
| **Sticky Offset** | Píxeles (empuja el elemento hacia arriba o abajo) |
| **Effects Offset** | Píxeles antes de que comience el efecto |
| **Anchor Offset** | Posicionamiento de scroll |
| **Stay in Column** | Sí/No (para mantener en columna) |

---

#### Shape Dividers
**Dónde activar**: Section/Container > Style > Shape Divider  
**Disponible**: [FREE] (shapes básicos) / [PRO] (más opciones)  
**Fuente**: [Elementor Help - Shape Dividers](https://elementor.com/help/shape-divider/)

**Parámetros**:
- **Position**: Top o Bottom
- **Type**: Múltiples formas disponibles (onda, triángulo, curva, etc.)
- **Color**: Color personalizable
- **Width**: Ancho en porcentaje
- **Height**: Altura en píxeles
- **Flip**: Invierte la dirección del shape
- **Bring to Front**: Coloca el shape encima de otros elementos

---

#### Background Effects

##### Classic Background (Solid Color o Image)
**Dónde activar**: Section/Container > Style > Background > Classic  
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Create Background](https://elementor.com/help/create-background/)

**Scrolling Effects disponibles**:
- Vertical Scroll (parallax)
- Horizontal Scroll
- Transparency (fade in/out)
- Blur
- Scaling

**Mouse Effects**: Elementos de fondo reaccionan al movimiento del cursor.

---

##### Gradient Background
**Dónde activar**: Section/Container > Style > Background > Gradient  
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Create Background](https://elementor.com/help/create-background/)

**Parámetros**:
- **Type**: Linear o Radial
- **Color 1 & Color 2**: Colores del gradiente
- **Location**: Posición de cada color (0-100%)
- **Angle**: Ángulo del gradiente (para Linear)
- **Position**: Punto de radiación (para Radial)
- **Scrolling Effects**: Vertical, Horizontal, Transparent, Blur, Scaling

---

##### Video Background
**Dónde activar**: Section/Container > Style > Background > Video  
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Create Background](https://elementor.com/help/create-background/)

**Parámetros**:
- **Start Time / End Time**: Define porción de video a reproducir
- **Play Once**: Video se reproduce una sola vez
- **Play on Mobile**: Controla reproducción en móvil
- **Privacy Mode**: No rastrea datos de usuario
- **Background Fallback**: Imagen de respaldo si video no carga

---

##### Slideshow Background
**Dónde activar**: Section/Container > Style > Background > Slideshow  
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Create Background](https://elementor.com/help/create-background/)

**Parámetros**:
- **Infinite Loop**: Reproducción continua
- **Duration**: Duración total en milisegundos
- **Transition Duration**: Tiempo de transición entre slides
- **Ken Burns Effect**: Pan y zoom automático en imágenes estáticas
- **Background Size/Position**: Tamaño y posicionamiento de imágenes
- **Lazy Load**: Carga optimizada

---

#### Hover Effects (Style Tab > Hover)
**Dónde activar**: Section/Container > Style > Hover  
**Disponible**: [FREE]  
**Fuente**: [Elementor Blog - Hover Effects](https://elementor.com/blog/v150-hover-effect/)

**Tipos de hover effects**:
- Background color hover
- Background gradient hover
- Image/video background hover
- Color overlay hover
- Box shadow hover
- Border hover
- Transition duration configurable

---

### 2.2 Nivel Widget (Tabla Resumen)

#### Widgets de Medios (Media Widgets)

##### Image Widget
| Efecto | Ubicación | Parámetro | Disponible |
|--------|-----------|-----------|-----------|
| Hover Animation | Style > Hover | Zoom In, Zoom Out, Move Left/Right/Up/Down, None | [FREE] |
| CSS Filters | Style > Normal/Hover | Blur, Brightness, Contrast, etc. | [FREE] |
| Opacity | Style > Normal/Hover | Transparencia configurable | [FREE] |
| Lightbox | Content > Lightbox | Abre imagen en lightbox | [FREE] |

**Fuente**: [Elementor Help - Featured Image Widget](https://elementor.com/help/featured-image-widget/)

---

##### Gallery Widget
| Efecto | Ubicación | Parámetro | Disponible |
|--------|-----------|-----------|-----------|
| Hover Animation (Imagen) | Style > Hover | Zoom In/Out, Move Left/Right/Up/Down | [FREE] |
| Hover Animation (Overlay) | Style > Hover | Slide In, Zoom, Fade (Entrance/Exit/Reaction) | [FREE] |
| Blend Mode | Style > Normal/Hover | Multiple blend modes | [PRO] |
| Lightbox | Content | Galería completa navega en lightbox | [FREE] |
| Animation Duration | Style | Duración en milisegundos | [FREE] |

**Fuente**: [Elementor Help - Gallery Widget](https://elementor.com/help/gallery-widget/)

---

##### Video Widget
| Efecto | Ubicación | Parámetro | Disponible |
|--------|-----------|-----------|-----------|
| Autoplay | Content > Autoplay | Reproduce automáticamente al cargar | [FREE] |
| Play On Mobile | Content > Autoplay | Control de autoplay en móvil | [FREE] |
| Mute | Content | Inicia sin sonido | [FREE] |
| Loop | Content | Reproducción continua | [FREE] |
| Lazy Load | Content | Carga al aparecer en viewport | [FREE] |
| Lightbox | Content > Lightbox | Abre video en lightbox | [FREE] |
| Play Icon | Content > Play Icon | Muestra icono de play personalizable | [FREE] |
| Transition Duration | Style | Duración de transiciones | [FREE] |

**Fuente**: [Elementor Help - Video Widget](https://elementor.com/help/video-widget/)

---

#### Widgets de Marketing (Marketing Widgets)

##### Call to Action (CTA) Widget
| Efecto | Ubicación | Parámetro | Disponible |
|--------|-----------|-----------|-----------|
| Hover Animation (Imagen) | Style > Hover | Animations disponibles | [PRO] |
| Blend Mode | Style > Normal/Hover | Multiple blend modes | [PRO] |
| Transition Duration (Hover) | Style > Hover | Duración del hover | [PRO] |
| Background Hover | Style > Hover | Cambio de background en hover | [FREE] |

**Fuente**: [Elementor Help - Call to Action Widget](https://elementor.com/help/call-to-action-widget/)

---

##### Button Widget
| Efecto | Ubicación | Parámetro | Disponible |
|--------|-----------|-----------|-----------|
| Hover Animation | Style > Hover | Pulse, Shrink, Float, etc. | [FREE] |
| Hover Color Change | Style > Hover | Cambio de color/background en hover | [FREE] |
| Transition Duration | Style > Hover | Duración de la transición | [FREE] |
| Box Shadow (Hover) | Style > Effects > Hover | Shadow en hover | [FREE] |

**Fuente**: [Elementor Help - Button Widget](https://elementor.com/help/button-widget/)

---

##### Flip Box Widget
**Dónde activar**: Drag Flip Box widget  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Flip Box](https://elementor.com/help/flip-box-widget-pro/)

| Efecto | Parámetros |
|--------|-----------|
| **Flip Effect** | Flip, Slide, Push, Zoom In, Zoom Out, Fade |
| **Flip Direction** | Right, Left, Up, Down (para Flip/Slide) |
| **3D Depth** | Toggle on/off para efecto 3D |
| **Height/Border Radius** | Dimensiones y bordes |
| **Front/Back Backgrounds** | Color, Image, o Gradient separados |
| **Graphic Element (Front)** | Image o Icon |
| **Button (Back)** | Con link y opciones de aplicación |

**Trigger**: Automáticamente en hover del usuario.

---

##### Carousel & Slides Widgets

###### Media Carousel
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Media Carousel](https://elementor.com/help/media-carousel-widget-pro/)

| Efecto | Parámetro |
|--------|----------|
| **Transition Effect** | Slide, Fade, Cube |
| **Slides Per View** | 1-10 slides simultáneos |
| **Slides to Scroll** | Número de slides a mover por interacción |
| **Autoplay** | Reproducción automática |
| **Autoplay Speed** | Intervalo en milisegundos |
| **Transition Duration** | Duración de la transición en ms |
| **Infinite Loop** | Bucle continuo |
| **Pause on Hover** | Pausa autoplay en hover |
| **Pause on Interaction** | Pausa al interactuar |
| **Overlay** | None, Text, Icon sobre slides |
| **Pagination** | Dots, Fraction, Progress, None |

---

###### Image Carousel
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Image Carousel](https://elementor.com/help/image-carousel-widget/)

| Efecto | Parámetro |
|--------|----------|
| **Slides to Show** | 1-10 imágenes simultáneas |
| **Slides to Scroll** | Número de slides a mover |
| **Image Stretch** | Estira/ajusta imágenes |
| **Infinite Loop** | Bucle continuo |
| **Animation Speed** | Velocidad de animación |
| **Direction** | Left o Right |

---

###### Testimonial Carousel
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Testimonial Carousel](https://elementor.com/help/testimonial-carousel-pro/)

Similares a Media Carousel, con opciones adicionales:
- **Layout**: Image Inline, Image Stacked, Image Above, Image Left, Image Right
- **Skin**: Default o Bubble
- **Alignment**: Left, Center, Right

---

###### Slides Widget (PRO)
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Slides Widget](https://elementor.com/help/slides-widget-pro/)

| Efecto | Parámetro |
|--------|----------|
| **Transition** | Slide o Fade |
| **Transition Speed** | Velocidad en ms |
| **Content Animation** | None, Down, Up, Right, Left, Zoom (aparición de contenido) |
| **Ken Burns Effect** | Pan y zoom automático en imágenes |
| **Infinite Loop** | Reproducción continua |
| **Autoplay** | Reproducción automática |

---

#### Widgets de Layout (Layout Widgets)

##### Accordion Widget
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Accordion Widget](https://elementor.com/help/accordion-widget/)

| Efecto | Ubicación | Parámetro |
|--------|-----------|-----------|
| **Animation Duration** | Content > Animation Duration | Duración open/close en ms |
| **Icon Styles** | Style > Icon | Colores para Normal, Hover, Active |
| **Max Items Expanded** | Content | One o Multiple |

---

##### Tabs Widget
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Tabs Widget](https://elementor.com/help/tabs-element/)

Similar a Accordion, con opciones de icono expandible/colapsible y estilos por estado.

---

#### Widgets de Contenido

##### Animated Headline
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Animated Headline](https://elementor.com/help/animated-headline-pro/)

Incluye animaciones integradas de texto rotativo/cambiante.

---

### 2.3 Nivel Style Tab (Efectos Visuales Avanzados)

#### Effects Section (Style > Effects)

##### Box Shadow
**Dónde activar**: Style > Effects > Box Shadow  
**Disponible**: [FREE]  

| Parámetro | Descripción |
|-----------|------------|
| **Color** | Color de la sombra |
| **Position** | Outset (exterior) o Inset (interior) |
| **Horizontal/Vertical** | Posición XY de la sombra |
| **Blur** | Cantidad de desenfoque |
| **Spread** | Expansión del área de sombra |

**Capas múltiples**: Sí, permite stacking de múltiples sombras.

---

##### Opacity
**Dónde activar**: Style > Effects > Opacity  
**Disponible**: [FREE]  
**Parámetro**: Porcentaje de transparencia (0-100%).

---

##### Filters
**Dónde activar**: Style > Effects > Filters  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Style Tab Effects](https://elementor.com/help/style-tab-effects/)

| Filtro | Descripción | Parámetro |
|--------|------------|-----------|
| **Blur** | Efecto de desenfoque | Píxeles de blur |
| **Brightness** | Intensidad de luz | Porcentaje |
| **Contrast** | Contraste del elemento | Porcentaje |
| **Hue Rotate** | Rotación de color | Grados (0-360) |
| **Saturate** | Intensidad de color | Porcentaje |
| **Grayscale** | Conversión a escala de grises | Porcentaje |
| **Invert** | Inversión de colores | Porcentaje |
| **Sepia** | Efecto fotográfico antiguo | Porcentaje |
| **Drop Shadow** | Sombra en contenido | Color, blur, spread |

**Múltiples filtros**: Sí, combinables.

---

##### Backdrop Filters
**Dónde activar**: Style > Effects > Backdrop Filters  
**Disponible**: [PRO]  
**Descripción**: Aplica filtros al fondo detrás del elemento (similar a Filters pero afecta el backdrop).

---

##### Transform
**Dónde activar**: Style > Effects > Transform  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Style Tab Effects](https://elementor.com/help/style-tab-effects/)

| Transformación | Parámetro | Uso típico |
|--------|-----------|----------|
| **Move** | X (píxeles), Y (píxeles) | Desplazamiento posicional |
| **Scale** | X%, Y% | Ampliación/reducción |
| **Rotate** | Grados (Z axis) | Rotación |
| **Skew** | X, Y, Z axes | Inclinación/distorsión |

**Estados**: Stationary (siempre aplicado) o Hover (aplicado en hover).

**Anchor Points**: X/Y anchor para definir punto de rotación/escalado.

---

##### Transition
**Dónde activar**: Style > Effects > Transition  
**Disponible**: [FREE] (todas las propiedades juntas) / [PRO] (propiedades individuales)  
**Fuente**: [Elementor Help - Style Tab Effects](https://elementor.com/help/style-tab-effects/)

| Nivel | Parámetro |
|-------|-----------|
| **Free** | Todas las propiedades transicionan a 200ms (default) |
| **Pro** | Cada propiedad (Font Color, Background Color, Border Color, Box Shadow, etc.) con duración independiente |

---

##### Blend Mode
**Dónde activar**: Style > Effects > Blend Mode  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Style Tab Effects](https://elementor.com/help/style-tab-effects/)

Opciones: Normal, Multiply, Screen, Overlay, Darken, Lighten, Color Dodge, Color Burn, Hard Light, Soft Light, Difference, Exclusion, Hue, Saturation, Color, Luminosity.

---

### 2.4 Nivel Global (Site Settings)

#### Global Colors
**Dónde activar**: Site Settings > Global Colors  
**Disponible**: [PRO] (completo) / [FREE] (limitado)  
**Fuente**: [Elementor Help - Set Global Colors](https://elementor.com/help/how-do-i-set-global-fonts-and-colors/)

**Grupos predeterminados**:
- Primary
- Secondary
- Text
- Accent

**Funcionalidad**: Cambiar un color global actualiza todos los elementos que lo usan en todo el sitio.

---

#### Global Fonts
**Dónde activar**: Site Settings > Global Fonts  
**Disponible**: [PRO] (completo) / [FREE] (limitado)  
**Fuente**: [Elementor Help - Set Global Fonts](https://elementor.com/help/how-do-i-set-global-fonts-and-colors/)

**Grupos predeterminados**:
- Primary (typography settings)
- Secondary
- Text
- Accent

**Parámetros**: Font family, size, weight, line height, letter spacing, text decoration.

---

#### Theme Style
**Dónde activar**: Site Settings > Theme Style  
**Disponible**: [PRO]  
**Fuente**: [Elementor Help - Theme Style](https://elementor.com/help/how-elementors-theme-style-and-design-system-options-work-together/)

Permite establecer estilos por defecto para:
- Header
- Footer
- Typography general
- Buttons
- Form fields
- Images

---

### 2.5 Nivel Advanced Tab (Configuración General)

#### Custom CSS
**Dónde activar**: Advanced > Custom CSS (elemento/widget), Page Settings > Advanced > Custom CSS (página), Site Settings > Custom CSS (sitio)  
**Disponible**: [FREE] (elemento/página), [PRO] (más control)  
**Fuente**: [Elementor Help - Custom CSS](https://elementor.com/help/how-to-add-custom-css/)

**Características**:
- **Selector variable**: `selector { }` para apuntar al wrapper del elemento
- **States (PRO)**: Custom CSS para hover, focus, active states
- **Responsive control**: CSS diferente por breakpoint (Desktop, Tablet, Mobile)
- **Real-time preview**: Cambios visibles instantáneamente

**Notas importantes**:
- CSS nativo de Elementor, no requiere plugins externos
- Permite acceder a cualquier propiedad CSS
- No es un "snippet externo" sino funcionalidad nativa del editor

---

#### Classes
**Dónde activar**: Style > Classes  
**Disponible**: [FREE]  
**Fuente**: [Elementor Help - Classes](https://elementor.com/help/classes-in-elementor-2/)

| Tipo | Descripción |
|------|------------|
| **Local class** | Default para cada elemento, editando solo ese elemento |
| **Custom class** | Clases creadas manualmente, reutilizables |
| **Global class** | Clases que afectan múltiples elementos |
| **States** | Hover, Active, Focus, etc. |

**Casos de uso**: Crear estilos reusables, aplicar transiciones complejas, state-specific styling.

---

## 3. Casos de Uso (Recetas Prácticas)

### Caso 1: Imagen con Hover + Overlay de Texto
1. Agregar widget Image
2. Style > Hover > Hover Animation (ej. Zoom In)
3. Style > Effects > Opacity (hover state)
4. Style > Background > Color overlay (hover state)
5. Adicionar texto con Custom CSS en hover

---

### Caso 2: Parallax Scroll + Blur Dinámico
1. Section > Advanced > Motion Effects > Scrolling Effects > Vertical Scroll
2. Mismo nivel > Background > Image
3. Background > Scrolling Effects > Blur (fade in/out)
4. Ajustar Viewport scale según efecto deseado

---

### Caso 3: Sticky Header con Efecto de Transición
1. Section (Header) > Advanced > Motion Effects > Sticky (Top)
2. Advanced > Custom CSS (state hover si necesario):
```css
selector.elementor-sticky--effects {
  background-color: rgba(255,255,255,0.9) !important;
  transition: background-color 0.3s ease;
}
```

---

### Caso 4: Flip Box con Información Adicional
1. Drag Flip Box widget
2. Content > Front > Agregar imagen/icono
3. Content > Back > Agregar descripción + botón
4. Settings > Flip Effect (ej. Slide), Flip Direction (Right), 3D Depth (ON)
5. Style > Customizar colores/borders por lado

---

### Caso 5: Carousel con Autoplay + Overlay
1. Drag Media Carousel/Testimonial Carousel
2. Content > Autoplay (YES) + Autoplay Speed (3000ms)
3. Content > Overlay (Text o Icon)
4. Content > Transition (Fade)
5. Advanced > Motion Effects > Entrance Animation (opcional)

---

### Caso 6: Animación de Texto al Scroll
1. Widget Heading/Paragraph
2. Advanced > Motion Effects > Entrance Animation (ej. Fade In Up)
3. Style > Effects > Transform (adicional, opcional)
4. Advanced > Custom CSS si efectos complejos requeridos

---

## 4. Matriz de Capacidades

| Efecto | Nivel | Ruta Panel | PRO/FREE | Versión Intro |
|--------|-------|-----------|---------|---------------|
| Entrance Animations (37 tipos) | Widget/Container | Advanced > Motion Effects | FREE | Core |
| Vertical Scroll (Parallax) | Widget/Container/Background | Advanced > Motion Effects | FREE | Core |
| Horizontal Scroll | Widget/Container/Background | Advanced > Motion Effects | FREE | Core |
| Transparency (Scroll) | Widget/Container/Background | Advanced > Motion Effects | FREE | Core |
| Blur (Scroll) | Widget/Container/Background | Advanced > Motion Effects | FREE | Core |
| Rotate (Scroll) | Widget/Container/Background | Advanced > Motion Effects | PRO | v2.5 |
| Scale (Scroll) | Widget/Container/Background | Advanced > Motion Effects | PRO | v2.5 |
| Mouse Track | Widget/Container | Advanced > Motion Effects | PRO | v2.5 |
| 3D Tilt | Widget/Container | Advanced > Motion Effects | PRO | v2.5 |
| Sticky | Container/Section | Advanced > Motion Effects | PRO | Core |
| Shape Dividers | Container/Section | Style > Shape Divider | FREE (básico)/PRO | Core |
| Background Gradient | Container/Section | Style > Background | FREE | v1.2 |
| Background Slideshow | Container/Section | Style > Background | FREE | Core |
| Background Video | Container/Section | Style > Background | FREE | Core |
| Ken Burns Effect | Slides widget | Content > Ken Burns | PRO | v1.2 |
| Lightbox | Image/Gallery/Video/Carousel | Content > Lightbox | FREE | v1.6 |
| Flip Box | Widget | Complete widget | PRO | v1.2 |
| Media Carousel | Widget | Complete widget | PRO | Core |
| Image Carousel | Widget | Complete widget | FREE | Core |
| Testimonial Carousel | Widget | Complete widget | PRO | Core |
| Slides Widget | Widget | Complete widget | PRO | v1.2 |
| Hover Animation (General) | Widget | Style > Hover | FREE | v1.5 |
| Hover Color/Gradient | Container/Section/Widget | Style > Hover | FREE | v1.5 |
| Hover Box Shadow | Container/Section/Widget | Style > Hover | FREE | v1.5 |
| Hover Border | Container/Section/Widget | Style > Hover | FREE | v1.5 |
| Box Shadow | Widget | Style > Effects | FREE | Core |
| Filters (8 tipos) | Widget | Style > Effects | PRO | v3.0+ |
| Backdrop Filters | Widget | Style > Effects | PRO | v3.0+ |
| Transform (Move/Scale/Rotate/Skew) | Widget | Style > Effects | PRO | Core |
| Transition (All Properties) | Widget | Style > Effects | FREE | Core |
| Transition (Individual Props) | Widget | Style > Effects | PRO | Core |
| Blend Mode | Widget | Style > Effects | PRO | Core |
| Custom CSS (Element) | Widget | Advanced > Custom CSS | FREE | Core |
| Custom CSS (Page) | Page | Page Settings > Advanced | FREE | Core |
| Custom CSS (Site) | Site | Site Settings > Custom CSS | FREE | Core |
| Custom CSS (States) | Widget | Advanced > Custom CSS (state-specific) | PRO | v3.33+ |
| Global Colors | Site | Site Settings > Global Colors | PRO (full) | Core |
| Global Fonts | Site | Site Settings > Global Fonts | PRO (full) | Core |
| Classes (Local/Global) | Widget | Style > Classes | FREE | Core |

---

## 5. Notas y Mejores Prácticas

### Accesibilidad
- Elementor respeta la preferencia "Reduced Motion" del usuario (sistema operativo)
- Si usuario tiene "Reduce Motion" activado, motion effects se desactivan automáticamente
- Incluye soporte para navegación por teclado (focus states)

### Rendimiento
- Motion Effects están optimizados nativamente sin dependencias externas
- Scrolling effects usan cálculos basados en viewport, no en documento completo (opción configurable)
- Ken Burns Effect y video backgrounds pueden impactar rendimiento en dispositivos antiguos

### Compatibilidad del Navegador
| Browser | Soportado |
|---------|-----------|
| Chrome | Sí |
| Firefox | Sí |
| Safari | Sí (limitaciones con jQuery en algunas versiones) |
| Edge | Sí |
| Opera | Sí |
| Internet Explorer | No |

**Nota Safari**: En algunas versiones antiguas de Safari con WordPress, mouse effects pueden causar errores de jQuery. En esos casos, se recomienda desactivar entrance animations o mouse effects simultáneamente.

### PRO vs FREE
- **FREE**: Entrance animations, scrolling effects básicos, hover effects, lightbox, muchos widgets
- **PRO**: Mouse effects (3D Tilt, Mouse Track), Rotate/Scale scroll effects, Flip Box, Carousel avanzados, Filters/Backdrop Filters, Transition propiedades individuales, Custom CSS states

### Limitaciones Conocidas
- Mouse effects no funcionan en mobile/tablet (solo desktop)
- Algunos efectos puede que requieran velocidades de procesamiento mínimas
- Custom CSS requiere conocimiento de CSS; errores sintácticos pueden romper estilos

### Mejor Estructura para Efectos Complejos
1. Usar **Classes** para reutilizar estilos
2. Aplicar **Motion Effects** a nivel contenedor para máximo impacto
3. Usar **Custom CSS** solo cuando efectos nativos no cubran necesidad específica
4. Combinar múltiples efectos con moderación (rendimiento)
5. Testear en múltiples dispositivos y navegadores

---

## 6. Fuentes Verificadas

### Documentación Oficial de Elementor
1. [Elementor Help - Entrance Animations](https://elementor.com/help/entrance-animations/) - Entrada de animaciones
2. [Elementor Help - Motion Effects](https://elementor.com/help/motion-effects/) - Effects de movimiento scroll/mouse
3. [Elementor Blog - Motion Effects Release](https://elementor.com/blog/introducing-motion-effects/) - Introducción v2.5
4. [Elementor Help - Style Tab Effects](https://elementor.com/help/style-tab-effects/) - Filters, Transform, Transitions
5. [Elementor Help - Shape Dividers](https://elementor.com/help/shape-divider/) - Shape dividers
6. [Elementor Help - Sticky Headers](https://elementor.com/help/sticky-headers/) - Sticky positioning
7. [Elementor Help - Create Background](https://elementor.com/help/create-background/) - Background types
8. [Elementor Help - Video Widget](https://elementor.com/help/video-widget/) - Video options
9. [Elementor Blog - Image Lightbox](https://elementor.com/blog/v160-image-lightbox/) - Lightbox feature
10. [Elementor Blog - Flip Box Release](https://elementor.com/blog/pro-v120-flip-box/) - Flip Box v1.2
11. [Elementor Help - Flip Box Widget](https://elementor.com/help/flip-box-widget-pro/) - Documentación Flip Box
12. [Elementor Help - Media Carousel](https://elementor.com/help/media-carousel-widget-pro/) - Carousel effects
13. [Elementor Help - Image Carousel](https://elementor.com/help/image-carousel-widget/) - Image carousel
14. [Elementor Help - Testimonial Carousel](https://elementor.com/help/testimonial-carousel-pro/) - Testimonial slider
15. [Elementor Help - Slides Widget](https://elementor.com/help/slides-widget-pro/) - Slides/Ken Burns
16. [Elementor Help - Gallery Widget](https://elementor.com/help/gallery-widget/) - Gallery hover effects
17. [Elementor Help - Featured Image Widget](https://elementor.com/help/featured-image-widget/) - Image hover
18. [Elementor Help - Button Widget](https://elementor.com/help/button-widget/) - Button hover effects
19. [Elementor Help - Call to Action Widget](https://elementor.com/help/call-to-action-widget/) - CTA hover
20. [Elementor Help - Accordion Widget](https://elementor.com/help/accordion-widget/) - Accordion effects
21. [Elementor Help - Accordion Nested](https://elementor.com/help/accordion-widget-with-nested-elements/) - Advanced accordion
22. [Elementor Help - Advanced Tab](https://elementor.com/help/advanced-tab/) - Motion Effects, Custom CSS
23. [Elementor Help - Custom CSS](https://elementor.com/help/how-to-add-custom-css/) - Custom CSS levels
24. [Elementor Help - Classes](https://elementor.com/help/classes-in-elementor-2/) - CSS classes y states
25. [Elementor Help - Global Colors](https://elementor.com/help/how-do-i-set-global-fonts-and-colors/) - Global colors
26. [Elementor Help - Global Fonts](https://elementor.com/help/how-do-i-use-global-fonts-and-colors/) - Global fonts
27. [Elementor Blog - Hover Effects](https://elementor.com/blog/v150-hover-effect/) - Hover effects v1.5
28. [Elementor Blog - Variables Manager & Custom CSS](https://elementor.com/blog/elementor-333-v4-variables-manager-custom-css/) - v3.33+ features
29. [Elementor Developers - Reduced Motion in Flip Box](https://developers.elementor.com/elementor-3-33-developers-update/) - v3.33 updates

---

## Notas Finales

Este documento documenta **exclusivamente efectos nativos de Elementor Pro sin addons de terceros**. La información ha sido verificada mediante fuentes oficiales primarias de Elementor (Help Center, Blog oficial, Documentación de Desarrolladores) al corte de enero 2026.

**No incluye**: Addons como Essential Addons for Elementor, Crocoblock/Jet, PowerPack, etc.  
**Incluye**: Capacidades nativas del panel de Elementor, incluyendo Custom CSS como feature pro nativa (no como "solución externa").

Para actualizaciones futuras o cambios en versiones posteriores a enero 2026, consultar directamente la documentación oficial de Elementor.
