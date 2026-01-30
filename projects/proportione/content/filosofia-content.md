# Página Filosofía - Contenidos

> Aplicando Brand Voice oficial de Proportione
> Fecha: 2026-01-29
> Versión: 1.0

---

## Verificación Brand Voice (Checklist)

Antes de cada texto:
- [x] ¿Se entiende de un vistazo?
- [x] ¿Evita palabras prohibidas?
- [x] ¿Usa palabras que amamos?
- [x] ¿Suena a conversación profesional, no a catálogo?
- [x] ¿Un CEO podría leerlo sin sentirse abrumado?
- [x] ¿Genera confianza, tranquilidad, alivio?

Tono de voz:
- [x] ¿Es de usted pero cercano?
- [x] ¿Es directo sin ser brusco?
- [x] ¿Es profesional sin ser frío?
- [x] ¿Explica sin ser condescendiente?

---

## SECCIÓN 1: HERO (50vh)

### Imagen de fondo
- ID recomendada: 2659 (Hombre renacentista estudiando geometría)
- Alternativa: 2665 (Forma geométrica abstracta resplandeciente)
- Overlay: Granate (#5F322F) al 70%

### Título Principal (H1)
```
Nuestra filosofía
```

### Subtítulo
```
Equilibrio entre tecnología y personas
```

### Notas de diseño
- Altura: 50vh mínimo
- Texto centrado
- Animación: fadeInUp en título
- Animación: fadeInUp con delay 200ms en subtítulo
- Colores: Texto en crema (#F5F0E6)

---

## SECCIÓN 2: INTRODUCCIÓN (fondo blanco)

### Texto Principal
```
Creemos que la tecnología debe adaptarse a las personas, no al revés.
Por eso ponemos siempre al ser humano en el centro de cada decisión tecnológica.
```

### Notas de diseño
- Fondo: Blanco (#FFFFFF)
- Texto centrado, tamaño 22px
- Ancho máximo: 800px
- Padding: 80px vertical
- Animación: fadeIn
- Tipografía: Raleway
- Color texto: #333333

---

## SECCIÓN 3: ORIGEN DEL NOMBRE (fondo crema, 2 columnas)

### Configuración de columnas
- Columna izquierda: 40% (imagen)
- Columna derecha: 60% (texto)
- Fondo: Crema (#F5F0E6)
- Padding: 80px vertical

### Columna Izquierda - Imagen
- ID: 2665 (Forma geométrica abstracta resplandeciente)
- Border-radius: 8px
- Animación: fadeInLeft

### Columna Derecha - Contenido

#### Título (H2)
```
¿Por qué Proportione?
```

#### Párrafo 1
```
Nuestro nombre viene de la proporción áurea, ese equilibrio matemático que encontramos en la naturaleza y el arte. Pero para nosotros significa algo más simple: el balance perfecto entre lo que la tecnología puede hacer y lo que las personas necesitan.
```

#### Párrafo 2
```
No buscamos la última moda tecnológica. Buscamos la solución proporcionada a cada problema.
```

### Notas de diseño
- Título: Oswald, 48px, #5F322F
- Párrafos: Raleway, 18px, #333333
- Segundo párrafo más destacado (puede ser itálica o ligeramente más grande)
- Animación texto: fadeInRight con delay 200ms

---

## SECCIÓN 4: PRINCIPIOS (fondo blanco, 3 cards)

### Configuración de sección
- Fondo: Blanco (#FFFFFF)
- Padding: 80px vertical
- Ancho contenido: 1100px

### Título (H2)
```
Lo que nos guía
```
- Centrado
- Tipografía: Oswald, 48px, #5F322F
- Margin bottom: 48px

### Estructura de Cards
- 3 columnas (33% cada una)
- Gap: 32px
- Cards con imagen + título + descripción

---

### CARD A: Personas primero

#### Imagen
- ID: 2618 (Equipo profesionales reunión oficina)
- Altura fija: 200px
- Object-fit: cover
- Border-radius: 8px arriba

#### Título (H3)
```
Personas primero
```

#### Descripción
```
Antes de hablar de tecnología, escuchamos. Entendemos qué necesita su equipo, qué les frena, qué les ayudaría. La tecnología viene después.
```

#### Animación
- fadeInUp, delay 0ms

---

### CARD B: Tecnología proporcionada

#### Imagen
- ID: 2566 (Persona trabajando laptop oficina moderna)
- Altura fija: 200px
- Object-fit: cover
- Border-radius: 8px arriba

#### Título (H3)
```
Tecnología proporcionada
```

#### Descripción
```
No implementamos más tecnología de la necesaria. Cada herramienta que proponemos tiene un propósito claro y un retorno medible.
```

#### Animación
- fadeInUp, delay 100ms

---

### CARD C: Conocimiento transferido

#### Imagen
- ID: 2543 (Profesional presentando ante equipo)
- Altura fija: 200px
- Object-fit: cover
- Border-radius: 8px arriba

#### Título (H3)
```
Conocimiento transferido
```

#### Descripción
```
No creamos dependencia. Nuestro objetivo es que su equipo pueda crecer solo. Les enseñamos a pescar, no les vendemos pescado.
```

#### Animación
- fadeInUp, delay 200ms

---

### Notas de diseño para Cards
- Fondo card: Blanco (#FFFFFF)
- Border-top: 4px solid #5F322F
- Border-radius: 8px
- Box-shadow: 0 4px 20px rgba(0,0,0,0.08)
- Padding interno: 0 arriba (imagen a sangre), 24px lados, 32px abajo
- Título: Oswald, 24px, #5F322F, centrado
- Descripción: Raleway, 16px, #333333, centrado

---

## SECCIÓN 5: CÓMO TRABAJAMOS (fondo crema)

### Configuración de sección
- Fondo: Crema (#F5F0E6)
- Padding: 80px vertical
- Ancho contenido: 1000px

### Título (H2)
```
Nuestro método de trabajo
```
- Centrado
- Tipografía: Oswald, 48px, #5F322F
- Margin bottom: 48px

### Infografía
- Usar imagen ID 2801 (Infografia transformación digital)
- O la infografía SVG local: infografia-metodo-20-60-20.svg
- Ancho: 100%, máximo 900px
- Centrada
- Animación: fadeIn

### Alternativa: Timeline de 4 pasos

| # | Paso | Título | Descripción |
|---|------|--------|-------------|
| 1 | Escuchamos | "Escuchamos" | "Nos reunimos con su equipo para entender el contexto real, no solo los síntomas." |
| 2 | Diagnosticamos | "Diagnosticamos" | "Analizamos qué funciona, qué no, y dónde está el verdadero potencial de mejora." |
| 3 | Proponemos | "Proponemos" | "Diseñamos una solución a medida, con presupuesto claro y plazos realistas." |
| 4 | Acompañamos | "Acompañamos" | "Implementamos juntos y transferimos el conocimiento para que sean autónomos." |

### Notas de diseño Timeline
- Formato vertical en móvil, horizontal en desktop
- Cada paso con número circular (#5F322F con texto crema)
- Línea conectora entre pasos
- Animación: slideInLeft con stagger 100ms entre pasos
- Título paso: Oswald, 20px, #5F322F
- Descripción: Raleway, 16px, #333333

---

## SECCIÓN 6: COMPROMISO (fondo blanco, destacado)

### Configuración de sección
- Fondo: Blanco (#FFFFFF) o ligeramente tintado
- Padding: 80px vertical
- Ancho contenido: 800px
- Centrado

### Contenedor destacado
- Borde: 3px solid #5F322F
- O fondo: #F5F0E6 con borde-left 6px #5F322F
- Border-radius: 8px
- Padding: 48px

### Texto
```
Nuestro compromiso: si no podemos ayudarle, se lo diremos.
Preferimos ser honestos a vender humo.
```

### Notas de diseño
- Tipografía: Raleway, 24px, #333333
- Primera línea en bold o destacada
- Animación: zoomIn
- Centrado

---

## SECCIÓN 7: CTA (fondo granate)

### Configuración de sección
- Fondo: Granate (#5F322F)
- Padding: 100px vertical
- Ancho contenido: 700px
- Centrado

### Título (H2)
```
¿Quiere conocer al equipo?
```
- Tipografía: Oswald, 48px, #F5F0E6
- Centrado
- Animación: fadeInUp

### Texto
```
Las personas detrás de esta filosofía.
```
- Tipografía: Raleway, 20px, #F5F0E6
- Centrado
- Margin: 16px arriba, 32px abajo
- Animación: fadeInUp, delay 100ms

### Botón
```
Conozca al equipo → /equipo/
```
- Fondo: Verde oliva (#6E8157)
- Texto: Blanco (#FFFFFF)
- Tipografía: Raleway, 18px, Semibold
- Padding: 18px 48px
- Border-radius: 6px
- Animación: fadeInUp, delay 200ms
- Hover: Grow

---

## Imágenes Requeridas

| Sección | Imagen ID | Uso | Filtro |
|---------|-----------|-----|--------|
| Hero | 2659 o 2665 | Fondo | Overlay granate 70% |
| Origen | 2665 | Columna izquierda | Ninguno |
| Card A | 2618 | Imagen superior | Ninguno |
| Card B | 2566 | Imagen superior | Ninguno |
| Card C | 2543 | Imagen superior | Ninguno |
| Método | 2801 o SVG | Infografía | Ninguno |

---

## Palabras Usadas (Verificación Brand Voice)

### Palabras que AMAMOS (presentes en el texto):
- ✅ Tecnología
- ✅ Personas
- ✅ Transferencia de conocimiento ("transferimos", "conocimiento transferido")
- ✅ Acompañamiento ("acompañamos")
- ✅ Escucha ("escuchamos")
- ✅ Adaptación / A medida ("solución a medida")
- ✅ Equilibrio
- ✅ Facilitador (implícito)

### Palabras PROHIBIDAS (ninguna presente):
- ❌ ~~Visión~~
- ❌ ~~Misión~~
- ❌ ~~Globales~~
- ❌ ~~ODS~~
- ❌ ~~Complejo~~
- ❌ ~~Expertos~~
- ❌ ~~Traumático~~
- ❌ ~~Estandarizado~~
- ❌ ~~Resistencia al cambio~~

---

## Emociones Objetivo

Después de leer la página Filosofía, el visitante debe sentirse:

- ✅ **Confiado**: "Estas personas tienen valores claros"
- ✅ **Tranquilo**: "No me van a vender tecnología que no necesito"
- ✅ **Informado**: "Entiendo su enfoque y cómo trabajan"
- ✅ **Aliviado**: "Por fin una consultora que pone a las personas primero"

NO debe sentirse:
- ❌ Abrumado con filosofía abstracta
- ❌ Sermoneado con valores corporativos vacíos
- ❌ Confundido sobre qué hacen realmente
- ❌ Escéptico ("esto suena a marketing")

---

## Navegación

- **Anterior**: /nosotros/ (Divina Proportione)
- **Siguiente**: /equipo/ (Conozca al equipo)
- **Breadcrumb**: Inicio > Nosotros > Filosofía

---

## SEO

### Title Tag
```
Nuestra Filosofía | Proportione - Tecnología y Personas
```

### Meta Description
```
En Proportione creemos que la tecnología debe adaptarse a las personas. Conoce nuestra filosofía de trabajo: equilibrio, honestidad y transferencia de conocimiento.
```

### H1
```
Nuestra filosofía
```

---

## Notas de Implementación

1. **Crear página en WordPress** con slug `/filosofia/`
2. **Editar con Elementor** siguiendo la estructura de secciones
3. **Aplicar animaciones** según especificaciones
4. **Verificar responsive** en tablet y móvil
5. **Comprobar accesibilidad** (contrastes, alt texts)
6. **AltText.ai** generará automáticamente los alt texts de las imágenes nuevas
