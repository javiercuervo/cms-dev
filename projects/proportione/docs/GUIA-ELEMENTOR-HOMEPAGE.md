# Guía de Implementación: Homepage Elementor

## Resumen de Secciones con Imágenes

| Sección | Imagen | Nota |
|---------|--------|------|
| 1. Hero | Imagen de fondo + overlay granate | Seleccionar del banco de imágenes |
| 2. Qué Hacemos | Imagen ID 2610 (o 2601) | Columna derecha |
| 3. Método 20-60-20 | Infografía ID 2624 (o 2619) | Centrada |
| 4. Tres Pilares | 3 imágenes para cards | Una por cada pilar |
| 5. Por qué elegirnos | Sin imagen | Solo iconos |
| 6. CTA Final | Sin imagen | Fondo granate sólido |

---

## SECCIÓN 1: HERO

### Configuración de Sección
- **Layout**: Full Width
- **Altura**: Min Height 80vh
- **Fondo**: Imagen + Overlay

### Pasos en Elementor:
1. Añadir sección de 1 columna
2. En **Estilo > Fondo**:
   - Tipo: Clásico
   - Imagen: Seleccionar del banco (algo corporativo/tecnología)
   - Posición: Centro Centro
   - Tamaño: Cubrir
3. En **Estilo > Superposición de fondo**:
   - Tipo: Clásico
   - Color: #5F322F
   - Opacidad: 0.75
4. En **Avanzado > Padding**: 100px arriba y abajo

### Widgets (de arriba a abajo):

**H1 - Título Principal**
```
Digitalización sin complicaciones
```
- Tipografía: Oswald, 72px (tablet 56px, móvil 40px), Bold
- Color: #F5F0E6
- Alineación: Centro
- Animación: Fade In Up

**Subtítulo**
```
Acompañamos a empresas y personas en el cambio tecnológico.
Sin traumas. Con resultados.
```
- Widget: Editor de Texto
- Tipografía: Raleway, 24px
- Color: #F5F0E6
- Alineación: Centro
- Animación: Fade In Up (delay 200ms)

**Botón Principal**
```
Conozca cómo trabajamos → /metodologia/
```
- Tamaño: Grande
- Fondo: #6E8157
- Texto: #FFFFFF
- Border radius: 6px
- Animación: Fade In Up (delay 400ms)
- Hover: Grow

**Botón Secundario**
```
Hablemos → /contacto/
```
- Tamaño: Grande
- Fondo: Transparente
- Borde: 2px solid #F5F0E6
- Texto: #F5F0E6
- Animación: Fade In Up (delay 500ms)

---

## SECCIÓN 2: QUÉ HACEMOS

### Configuración de Sección
- **Layout**: Full Width, contenido 1100px
- **Fondo**: #FFFFFF
- **Padding**: 80px arriba y abajo
- **Gap**: Extended

### Estructura: 2 Columnas (60% / 40%)

**COLUMNA IZQUIERDA (60%)**

**H2 - Título**
```
Tecnología al servicio de las personas
```
- Tipografía: Oswald, 48px, Semibold
- Color: #5F322F
- Alineación: Izquierda (centro en tablet/móvil)
- Animación: Fade In Left

**Párrafo 1**
```
Muchas empresas se sienten desbordadas por los cambios tecnológicos. La tecnología puede ser costosa, difícil de usar y aún más difícil de adoptar.
```
- Tipografía: Raleway, 20px
- Color: #333333
- Animación: Fade In Left (delay 100ms)

**Destacado**
```
Nosotros lo hacemos fácil.
```
- Widget: Encabezado (como <p>)
- Tipografía: Oswald, 32px, Semibold
- Color: #5F322F
- Animación: Fade In Left (delay 200ms)

**Párrafo 2**
```
Partimos de las personas y lo que necesitan. Después, desarrollamos o implementamos la tecnología adecuada. El resultado: cambios que funcionan, equipos que los adoptan, y empresas que crecen.
```
- Tipografía: Raleway, 18px
- Color: #333333
- Animación: Fade In Left (delay 300ms)

**COLUMNA DERECHA (40%)**

**Imagen**
- ID: 2610 (alternativa: 2601)
- Tamaño: Large
- Ancho: 100%
- Border radius: 8px
- Animación: Fade In Right (delay 200ms)

---

## SECCIÓN 3: MÉTODO 20-60-20

### Configuración de Sección
- **Layout**: Full Width, contenido 1100px
- **Fondo**: #F5F0E6
- **Padding**: 80px arriba, 40px abajo

### Sub-sección 1: Título
**H2**
```
Nuestro método: las personas siempre al mando
```
- Tipografía: Oswald, 48px, Semibold
- Color: #5F322F
- Alineación: Centro
- Animación: Fade In Up

### Sub-sección 2: Infografía
- Nueva sección con ancho de contenido 900px
- 1 columna

**Imagen Infografía**
- ID: 2624 (alternativa: 2619)
- Tamaño: Full
- Ancho: 100%
- Alineación: Centro
- Animación: Fade In Up (delay 200ms)

### Sub-sección 3: Texto de Apoyo
- Nueva sección con ancho de contenido 800px
- Padding: 20px arriba, 80px abajo

**Texto**
```
La inteligencia artificial hace el trabajo pesado.
Sus personas ponen la inteligencia que importa: la humana.
```
- Tipografía: Raleway, 22px
- Color: #333333
- Alineación: Centro
- La segunda línea en **negrita**
- Animación: Fade In Up (delay 300ms)

---

## SECCIÓN 4: TRES PILARES

### Configuración de Sección Título
- **Layout**: Full Width, contenido 1100px
- **Fondo**: #FFFFFF
- **Padding**: 80px arriba, 40px abajo

**H2**
```
Tres áreas, un objetivo: su crecimiento
```
- Tipografía: Oswald, 48px, Semibold
- Color: #5F322F
- Alineación: Centro
- Animación: Fade In Up

### Configuración de Sección Cards
- 3 columnas (33% / 34% / 33%)
- Gap: Extended
- Padding: 40px arriba, 80px abajo

### CARD 1: Estrategia

**Estilo de Columna**
- Fondo: #FFFFFF
- Borde superior: 4px solid #5F322F
- Border radius: 8px
- Box shadow: 0 4px 20px rgba(0,0,0,0.08)
- Padding: 0 arriba, 32px abajo

**Imagen**
- Seleccionar imagen relacionada con estrategia/planificación
- Tamaño: Medium Large
- Altura fija: 200px
- Object-fit: Cover
- Border radius: 8px arriba, 0 abajo
- Animación: Fade In Up

**H3 - Título**
```
Estrategia
```
- Tipografía: Oswald, 28px, Semibold
- Color: #5F322F
- Alineación: Centro
- Margin: 24px lateral

**Descripción**
```
Definimos el camino. Analizamos su situación y diseñamos un plan de acción realista.
```
- Tipografía: Raleway, 16px
- Color: #333333
- Alineación: Centro
- Margin: 24px lateral

**Botón**
```
Conozca nuestro enfoque → /consultoria/
```
- Tamaño: Pequeño
- Fondo: Transparente
- Texto: #5F322F
- Hover: Grow

### CARD 2: Tecnología

**Misma estructura que Card 1**

**Imagen**
- Seleccionar imagen relacionada con tecnología/desarrollo

**H3**
```
Tecnología
```

**Descripción**
```
Implementamos soluciones que funcionan. Sin complicaciones innecesarias.
```

**Botón**
```
Vea nuestros servicios → /servicios/
```

### CARD 3: Personas

**Misma estructura que Card 1**

**Imagen**
- Seleccionar imagen de equipo/personas trabajando

**H3**
```
Personas
```

**Descripción**
```
Acompañamos a sus equipos. Les transferimos el conocimiento para que sean autónomos.
```

**Botón**
```
Conozca al equipo → /equipo/
```

---

## SECCIÓN 5: POR QUÉ ELEGIRNOS

### Configuración de Sección
- **Layout**: Full Width, contenido 800px
- **Fondo**: #F5F0E6
- **Padding**: 80px arriba y abajo

**H2**
```
¿Por qué elegirnos?
```
- Tipografía: Oswald, 48px, Semibold
- Color: #5F322F
- Alineación: Centro
- Margin bottom: 40px
- Animación: Fade In Up

### Widget: Icon Box (repetir 4 veces)

**Configuración común**
- Posición de icono: Izquierda
- Color de icono: #6E8157
- Color de título: #5F322F
- Color de descripción: #333333
- Margin bottom: 24px

**Item 1**
- Icono: fa-cogs
- Título: `Trabajamos dentro de su ecosistema`
- Descripción: `No reemplazamos lo que funciona. Optimizamos lo que tiene.`
- Animación: Fade In Up (delay 100ms)

**Item 2**
- Icono: fa-graduation-cap
- Título: `Transferimos conocimiento`
- Descripción: `No creamos dependencia. Formamos a su equipo para que crezca solo.`
- Animación: Fade In Up (delay 200ms)

**Item 3**
- Icono: fa-chart-line
- Título: `Resultados medibles`
- Descripción: `Posicionamiento, ventas, eficiencia. Números que puede ver.`
- Animación: Fade In Up (delay 300ms)

**Item 4**
- Icono: fa-hand-holding-usd
- Título: `Presupuestos reales`
- Descripción: `Hacemos más con menos. Sin sorpresas.`
- Animación: Fade In Up (delay 400ms)

---

## SECCIÓN 6: CTA FINAL

### Configuración de Sección
- **Layout**: Full Width, contenido 700px
- **Fondo**: #5F322F
- **Padding**: 100px arriba y abajo

**H2**
```
¿Hablamos?
```
- Tipografía: Oswald, 64px (tablet 52px, móvil 40px), Semibold
- Color: #F5F0E6
- Alineación: Centro
- Animación: Fade In Up

**Texto**
```
Sin compromiso. Sin presión.
Cuéntenos qué necesita y le diremos honestamente si podemos ayudarle.
```
- Tipografía: Raleway, 22px
- Color: #F5F0E6
- Alineación: Centro
- Margin: 24px arriba, 32px abajo
- Animación: Fade In Up (delay 100ms)

**Botón**
```
Contactar → /contacto/
```
- Tamaño: Grande
- Fondo: #6E8157
- Texto: #FFFFFF
- Border radius: 6px
- Padding: 18px vertical, 48px horizontal
- Tipografía: Raleway, 20px, Semibold
- Animación: Fade In Up (delay 200ms)
- Hover: Grow

---

## Responsive Checklist

### Tablet (768px)
- [ ] Hero título: 56px
- [ ] Sección 2: Cambiar a 1 columna (imagen arriba)
- [ ] Pilares: Cambiar a 1 columna
- [ ] Botones: Ancho completo

### Móvil (375px)
- [ ] Hero título: 40px
- [ ] Todos los títulos H2: ~28-32px
- [ ] Padding lateral: 16px
- [ ] Botones: Ancho completo

---

## Colores de Referencia Rápida

| Nombre | Código | Uso |
|--------|--------|-----|
| Granate | #5F322F | Títulos, fondos oscuros |
| Verde oliva | #6E8157 | Botones, iconos, acentos |
| Crema | #F5F0E6 | Fondos claros, texto sobre granate |
| Blanco | #FFFFFF | Fondos de cards |
| Texto | #333333 | Párrafos |

---

## Tipografías

| Uso | Familia | Peso |
|-----|---------|------|
| Títulos H1-H3 | Oswald | 600-700 |
| Texto/Párrafos | Raleway | 400-600 |
| Botones | Raleway | 600 |

---

## Notas Finales

1. **Guardar como Template**: Una vez terminada, guardar como template de Elementor para reutilizar
2. **Verificar animaciones**: Probar que las animaciones no sean molestas en móvil
3. **Imágenes**: Optimizar todas las imágenes antes de subir (WebP preferido)
4. **Accesibilidad**: Verificar contraste y alt texts en imágenes
