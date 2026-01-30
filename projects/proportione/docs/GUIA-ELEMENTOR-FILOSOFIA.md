# Guía de Implementación: Página Filosofía en Elementor

> Fecha: 2026-01-29
> URL objetivo: https://staging19.proportione.com/filosofia/
> Referencia de contenido: `content/filosofia-content.md`
> CSS específico: `assets/filosofia.css`

---

## Resumen de Secciones con Imágenes

| Sección | Imagen ID | Nota |
|---------|-----------|------|
| 1. Hero | 2659 o 2665 | Fondo + overlay granate 70% |
| 2. Introducción | Sin imagen | Solo texto centrado |
| 3. Origen del nombre | 2665 | Columna izquierda |
| 4. Principios | 2618, 2566, 2543 | Una por card |
| 5. Cómo trabajamos | 2801 o SVG | Infografía centrada |
| 6. Compromiso | Sin imagen | Texto destacado |
| 7. CTA Final | Sin imagen | Fondo granate sólido |

---

## SECCIÓN 1: HERO

### Configuración de Sección
- **Layout**: Full Width
- **Altura**: Min Height 50vh
- **Fondo**: Imagen + Overlay

### Pasos en Elementor:

1. **Añadir sección** de 1 columna
2. En **Estilo > Fondo**:
   - Tipo: Clásico
   - Imagen: ID 2659 (Hombre renacentista) o ID 2665 (Forma geométrica)
   - Posición: Centro Centro
   - Tamaño: Cubrir
3. En **Estilo > Superposición de fondo**:
   - Tipo: Clásico
   - Color: #5F322F
   - Opacidad: 0.70
4. En **Avanzado > Padding**: 100px arriba, 100px abajo

### Widgets (de arriba a abajo):

**H1 - Título Principal**
```
Nuestra filosofía
```
- Widget: Encabezado
- HTML Tag: H1
- Tipografía: Oswald, 64px (tablet 48px, móvil 40px), Semibold
- Color: #F5F0E6
- Alineación: Centro
- Animación: Fade In Up

**Subtítulo**
```
Equilibrio entre tecnología y personas
```
- Widget: Encabezado (como párrafo decorativo)
- HTML Tag: p
- Tipografía: Raleway, 24px (móvil 18px)
- Color: #F5F0E6
- Alineación: Centro
- Animación: Fade In Up (delay 200ms)

---

## SECCIÓN 2: INTRODUCCIÓN

### Configuración de Sección
- **Layout**: Full Width, contenido 800px
- **Fondo**: #FFFFFF
- **Padding**: 80px arriba y abajo

### Widget:

**Texto de Introducción**
```
Creemos que la tecnología debe adaptarse a las personas, no al revés.
Por eso ponemos siempre al ser humano en el centro de cada decisión tecnológica.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 22px (móvil 18px)
- Color: #333333
- Alineación: Centro
- Animación: Fade In

---

## SECCIÓN 3: ORIGEN DEL NOMBRE

### Configuración de Sección
- **Layout**: Full Width, contenido 1100px
- **Fondo**: #F5F0E6
- **Padding**: 80px arriba y abajo
- **Gap**: Extended

### Estructura: 2 Columnas (40% / 60%)

**COLUMNA IZQUIERDA (40%)**

**Imagen**
- ID: 2665 (Forma geométrica abstracta resplandeciente)
- Tamaño: Large
- Ancho: 100%
- Border radius: 8px
- Animación: Fade In Left

**COLUMNA DERECHA (60%)**

**H2 - Título**
```
¿Por qué Proportione?
```
- Tipografía: Oswald, 48px (tablet 40px, móvil 32px), Semibold
- Color: #5F322F
- Alineación: Izquierda
- Animación: Fade In Right

**Párrafo 1**
```
Nuestro nombre viene de la proporción áurea, ese equilibrio matemático que encontramos en la naturaleza y el arte. Pero para nosotros significa algo más simple: el balance perfecto entre lo que la tecnología puede hacer y lo que las personas necesitan.
```
- Tipografía: Raleway, 18px
- Color: #333333
- Animación: Fade In Right (delay 100ms)

**Párrafo 2 (Destacado)**
```
No buscamos la última moda tecnológica. Buscamos la solución proporcionada a cada problema.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 20px, Italic
- Color: #5F322F
- Animación: Fade In Right (delay 200ms)

### Responsive
- Tablet/Móvil: Cambiar a 1 columna, imagen arriba, texto debajo, centrado

---

## SECCIÓN 4: PRINCIPIOS (3 CARDS)

### Configuración de Sección Título
- **Layout**: Full Width, contenido 1100px
- **Fondo**: #FFFFFF
- **Padding**: 80px arriba, 48px abajo

**H2**
```
Lo que nos guía
```
- Tipografía: Oswald, 48px, Semibold
- Color: #5F322F
- Alineación: Centro
- Animación: Fade In Up

### Configuración de Sección Cards
- 3 columnas (33% cada una)
- Gap: Extended (32px)
- Padding: 0 arriba, 80px abajo

---

### CARD A: Personas primero

**Estructura de Columna**
- Fondo: #FFFFFF
- Borde superior: 4px solid #5F322F
- Border radius: 8px
- Box shadow: 0 4px 20px rgba(0,0,0,0.08)
- Padding: 0 (imagen a sangre arriba), 24px laterales, 32px abajo

**Imagen**
- ID: 2618 (Equipo profesionales reunión oficina)
- Tamaño: Medium Large
- Altura fija: 200px (usar CSS custom o Object Fit Cover)
- Border radius: 8px arriba, 0 abajo
- Animación: Fade In Up

**H3 - Título**
```
Personas primero
```
- Tipografía: Oswald, 24px, Semibold
- Color: #5F322F
- Alineación: Centro
- Margin top: 24px

**Descripción**
```
Antes de hablar de tecnología, escuchamos. Entendemos qué necesita su equipo, qué les frena, qué les ayudaría. La tecnología viene después.
```
- Tipografía: Raleway, 16px
- Color: #333333
- Alineación: Centro

---

### CARD B: Tecnología proporcionada

**Misma estructura que Card A**

**Imagen**
- ID: 2566 (Persona trabajando laptop oficina moderna)

**H3**
```
Tecnología proporcionada
```

**Descripción**
```
No implementamos más tecnología de la necesaria. Cada herramienta que proponemos tiene un propósito claro y un retorno medible.
```

**Animación**: Fade In Up (delay 100ms)

---

### CARD C: Conocimiento transferido

**Misma estructura que Card A**

**Imagen**
- ID: 2543 (Profesional presentando ante equipo)

**H3**
```
Conocimiento transferido
```

**Descripción**
```
No creamos dependencia. Nuestro objetivo es que su equipo pueda crecer solo. Les enseñamos a pescar, no les vendemos pescado.
```

**Animación**: Fade In Up (delay 200ms)

---

## SECCIÓN 5: CÓMO TRABAJAMOS

### Configuración de Sección
- **Layout**: Full Width, contenido 1000px
- **Fondo**: #F5F0E6
- **Padding**: 80px arriba y abajo

### Sub-sección 1: Título

**H2**
```
Nuestro método de trabajo
```
- Tipografía: Oswald, 48px, Semibold
- Color: #5F322F
- Alineación: Centro
- Margin bottom: 48px
- Animación: Fade In Up

### Sub-sección 2: Infografía (Opción A)

- Nueva sección con ancho de contenido 900px
- 1 columna

**Widget Imagen**
- ID: 2801 (Infografía transformación digital)
- O usar SVG: infografia-metodo-20-60-20.svg
- Tamaño: Full
- Ancho: 100%
- Alineación: Centro
- Animación: Fade In (delay 200ms)

### Sub-sección 2: Timeline (Opción B)

Si prefieres un timeline en lugar de infografía:

**Estructura**: 4 columnas (25% cada una)

**Paso 1**
- Número: "1" (círculo granate #5F322F con texto crema)
- Título: "Escuchamos"
- Descripción: "Nos reunimos con su equipo para entender el contexto real, no solo los síntomas."
- Animación: Slide In Left

**Paso 2**
- Número: "2"
- Título: "Diagnosticamos"
- Descripción: "Analizamos qué funciona, qué no, y dónde está el verdadero potencial de mejora."
- Animación: Slide In Left (delay 100ms)

**Paso 3**
- Número: "3"
- Título: "Proponemos"
- Descripción: "Diseñamos una solución a medida, con presupuesto claro y plazos realistas."
- Animación: Slide In Left (delay 200ms)

**Paso 4**
- Número: "4"
- Título: "Acompañamos"
- Descripción: "Implementamos juntos y transferimos el conocimiento para que sean autónomos."
- Animación: Slide In Left (delay 300ms)

**Estilo del número**
- Widget: Icon Box o HTML personalizado
- Círculo: 48px x 48px
- Fondo: #5F322F
- Tipografía: Oswald, 24px, Bold, #F5F0E6

**Estilo del título**
- Tipografía: Oswald, 20px, Semibold
- Color: #5F322F

**Estilo de la descripción**
- Tipografía: Raleway, 15px
- Color: #333333

---

## SECCIÓN 6: COMPROMISO

### Configuración de Sección
- **Layout**: Full Width, contenido 800px
- **Fondo**: #FFFFFF
- **Padding**: 80px arriba y abajo

### Estructura: 1 columna

**Contenedor Interior (Inner Section)**
- Fondo: #F5F0E6
- Borde izquierdo: 6px solid #5F322F
- Border radius: 8px
- Padding: 48px (móvil: 32px 24px)
- Animación: Zoom In

**Texto**
```
Nuestro compromiso: si no podemos ayudarle, se lo diremos.
Preferimos ser honestos a vender humo.
```
- Widget: Editor de Texto
- Primera línea: Negrita
- Tipografía: Raleway, 24px (móvil 18px)
- Color: #333333
- Alineación: Centro

---

## SECCIÓN 7: CTA FINAL

### Configuración de Sección
- **Layout**: Full Width, contenido 700px
- **Fondo**: #5F322F
- **Padding**: 100px arriba y abajo (móvil 60px)

**H2**
```
¿Quiere conocer al equipo?
```
- Tipografía: Oswald, 48px (móvil 32px), Semibold
- Color: #F5F0E6
- Alineación: Centro
- Animación: Fade In Up

**Texto**
```
Las personas detrás de esta filosofía.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 20px
- Color: #F5F0E6
- Alineación: Centro
- Margin: 16px arriba, 32px abajo
- Animación: Fade In Up (delay 100ms)

**Botón**
```
Conozca al equipo → /equipo/
```
- Tamaño: Grande
- Fondo: #6E8157
- Texto: #FFFFFF
- Tipografía: Raleway, 18px, Semibold
- Border radius: 6px
- Padding: 18px vertical, 48px horizontal
- Animación: Fade In Up (delay 200ms)
- Hover: Grow

---

## Responsive Checklist

### Tablet (768px)
- [ ] Hero título: 48px
- [ ] Sección 3: Cambiar a 1 columna (imagen arriba, texto debajo)
- [ ] Sección 4: Cards en 2 columnas
- [ ] Sección 5 Timeline: 2 columnas
- [ ] Botones: Ancho completo

### Móvil (375px)
- [ ] Hero título: 40px
- [ ] Todos los títulos H2: 32px
- [ ] Sección 3: 1 columna, textos centrados
- [ ] Sección 4: Cards en 1 columna
- [ ] Sección 5 Timeline: 1 columna vertical
- [ ] Padding lateral: 16px
- [ ] Botones: Ancho completo

---

## Colores de Referencia Rápida

| Nombre | Código | Uso |
|--------|--------|-----|
| Granate | #5F322F | Títulos, fondos oscuros, bordes |
| Verde oliva | #6E8157 | Botones, acentos |
| Crema | #F5F0E6 | Fondos claros, texto sobre granate |
| Blanco | #FFFFFF | Fondos de cards |
| Texto | #333333 | Párrafos |

---

## Tipografías

| Uso | Familia | Peso |
|-----|---------|------|
| H1 | Oswald | 600-700 |
| H2 | Oswald | 600 |
| H3 | Oswald | 600 |
| Texto/Párrafos | Raleway | 400 |
| Texto destacado | Raleway | 600 |
| Botones | Raleway | 600 |

---

## Animaciones de Elementor a Usar

| Animación | Uso | Configuración |
|-----------|-----|---------------|
| Fade In Up | Títulos, textos principales | Duration: 600ms |
| Fade In Left | Imágenes lado izquierdo | Duration: 600ms |
| Fade In Right | Textos lado derecho | Duration: 600ms |
| Fade In | Textos centrados | Duration: 600ms |
| Zoom In | Bloque compromiso destacado | Duration: 500ms |
| Slide In Left | Timeline/pasos | Duration: 500ms |
| Grow | Hover en botones | Via CSS |

### Configurar delays en Elementor:
1. Seleccionar widget
2. Ir a Avanzado > Efectos de Movimiento
3. Elegir animación de entrada
4. Configurar Delay (en ms): 0, 100, 200, 300...

---

## Checklist de Implementación

### Preparación
- [ ] Verificar que las imágenes existen en la Media Library
- [ ] Subir SVG de infografía si no está disponible
- [ ] Tener abierto el documento de contenido (`filosofia-content.md`)

### Creación en Elementor
- [ ] Crear nueva página "Filosofía" con slug `/filosofia/`
- [ ] Seleccionar template "Elementor Full Width"
- [ ] Implementar las 7 secciones en orden
- [ ] Añadir todas las imágenes con sus IDs correctos
- [ ] Configurar animaciones en cada widget
- [ ] Verificar colores contra la paleta

### Responsive
- [ ] Verificar vista Desktop (1920px)
- [ ] Verificar vista Laptop (1366px)
- [ ] Verificar vista Tablet (768px)
- [ ] Verificar vista Móvil (375px)

### Accesibilidad
- [ ] Verificar jerarquía H1 > H2 > H3
- [ ] Verificar contrastes de color
- [ ] Añadir alt text a todas las imágenes
- [ ] Verificar que los botones son clickeables en móvil

### Final
- [ ] Guardar como borrador primero
- [ ] Revisar en modo Preview
- [ ] Publicar página
- [ ] Limpiar caché de Elementor
- [ ] Limpiar caché de WordPress/SiteGround
- [ ] Verificar carga de la página en vivo

---

## Notas Finales

1. **Guardar como Template**: Considera guardar secciones reutilizables como templates de Elementor
2. **Verificar animaciones**: Asegurar que no sean molestas en móvil
3. **Imágenes WebP**: Si es posible, usar formato WebP para mejor rendimiento
4. **Alt Texts**: AltText.ai generará automáticamente los alt texts de imágenes nuevas
5. **Navegación**: Añadir enlace a esta página en el menú bajo "Nosotros > Filosofía"
