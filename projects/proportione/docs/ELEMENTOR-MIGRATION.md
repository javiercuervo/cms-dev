# Migración a Elementor Pro - Proportione

## Fecha: 28 Enero 2026

## Estado: En progreso

---

## Resumen de la Migración

Se ha migrado el sitio de Proportione de Gutenberg/Stackable a Elementor Pro para tener control total del diseño y animaciones.

## Estructura Actual

### Elementor Kit (ID: 2701)

Configuración global de colores y tipografía:

| Variable | Valor | Uso |
|----------|-------|-----|
| Primary | #5F322F | Granate - títulos, CTAs |
| Secondary | #551122 | Granate oscuro |
| Text | #333333 | Texto de cuerpo |
| Accent | #6E8157 | Verde - enlaces, iconos |
| Cream | #F5F0E6 | Fondos claros |
| White | #FFFFFF | Fondos |

**Tipografía:**
- Títulos: Oswald (600 weight)
- Cuerpo: Raleway (400 weight)

### Theme Builder Templates

| Template | ID | Condición | Descripción |
|----------|-----|-----------|-------------|
| Header | 2795 | include/general | Header con logo y menú horizontal |
| Footer | 2796 | include/general | Footer con 3 columnas y copyright |

### Páginas Elementor

| Página | ID | URL | Estado |
|--------|-----|-----|--------|
| Homepage | 2793 | / | Completa |

---

## Estructura de la Homepage (ID: 2793)

### Secciones

1. **Hero Section** (600px altura)
   - Fondo: imagen con overlay granate 70%
   - Animación: fadeInUp
   - Contenido:
     - H1: "Transformación digital con impacto real"
     - Subtítulo
     - CTA: "Descubre cómo"

2. **Un enfoque integral** (fondo blanco)
   - Padding: 100px top/bottom
   - Animación: fadeIn

3. **Grid de Servicios** (fondo crema)
   - 3 cards: Estrategia, Co-creación, Formación
   - Animación secuencial: fadeInUp (0, 150ms, 300ms)
   - Sombras: 0 4px 20px rgba(0,0,0,0.08)

4. **Por qué Proportione** (fondo blanco)
   - 3 columnas con iconos
   - Animación secuencial: fadeInUp

5. **Personas en el centro** (fondo oscuro con imagen)
   - Overlay: negro 60%
   - Lista de 6 beneficios
   - Texto: #F5F0E6 (crema)

6. **CTA Final** (fondo granate)
   - Botón verde con hover blanco

---

## Principios de Diseño Aplicados

### Según guía-diseno-visual-consultoria.md

- **Espaciado entre secciones**: 80-100px
- **Tipografía Hero**: 72px Oswald
- **Tipografía H2**: 48px Oswald
- **Tipografía body**: 16-18px Raleway, line-height 1.6-1.7
- **Máximo 2-3 colores saturados por sección**
- **Cards**: padding 30-40px, sombras sutiles

### Según guia-comunicacion-consultoria.md

- **Textos aligerados**: -48% de palabras vs original
- **Verbos transitivos**: Combinamos, Diseñamos, Implementamos
- **Sin primera persona singular**
- **Máximo 4 líneas por párrafo**
- **CTAs**: Descubre, Explora, Contacta

### Animaciones (Elementor Pro)

| Animación | Duración | Uso |
|-----------|----------|-----|
| fadeIn | 400ms | Títulos de sección |
| fadeInUp | 400ms | Hero, cards, CTAs |
| Hover transform | 300ms | Cards (-5px translateY) |

---

## Archivos CSS Personalizados

### /wp-content/themes/hello-elementor/custom-elementor.css

- Logo footer invertido a blanco
- Transiciones de botones
- Responsive ajustes
- Hover effects en cards

### /wp-content/themes/hello-elementor/accesibilidad.css

- Contraste texto/fondo
- Ajustes de menú
- Responsive typography

---

## URLs de Edición

- **Homepage**: https://staging19.proportione.com/wp-admin/post.php?post=2793&action=elementor
- **Header**: https://staging19.proportione.com/wp-admin/post.php?post=2795&action=elementor
- **Footer**: https://staging19.proportione.com/wp-admin/post.php?post=2796&action=elementor
- **Kit Global**: https://staging19.proportione.com/wp-admin/post.php?post=2701&action=elementor

---

## Pendiente de Migración

### Páginas prioritarias
- [ ] Contacto (ID: 339)
- [ ] Quiénes somos / About
- [ ] Servicios
- [ ] Política de privacidad (ID: 3)
- [ ] Política de cookies (ID: 1221)

### Blog Templates
- [ ] Archive Template (listado de posts)
- [ ] Single Post Template

### Páginas de contenido
- [ ] Múltiples páginas de insights/artículos

---

## Notas Técnicas

- **Tema base**: Hello Elementor
- **Elementor versión**: 3.34.3
- **Elementor Pro versión**: 3.34.3
- **Staging URL**: https://staging19.proportione.com/
- **NUNCA tocar producción desde Claude Code**
