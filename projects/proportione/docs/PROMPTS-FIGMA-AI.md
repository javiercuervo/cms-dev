# Prompts para Figma AI - Proportione

## Instrucciones de uso

1. Abre Figma y selecciona el frame donde quieres generar
2. Usa el plugin de Figma AI o el asistente integrado
3. Copia y pega el prompt correspondiente
4. Ajusta según necesites

---

## Design System Base (incluir siempre)

```
DESIGN SYSTEM PROPORTIONE:

Colores:
- Primario (Granate): #5F322F
- Secundario (Verde oliva): #6E8157
- Fondo claro (Crema): #F5F0E6
- Blanco: #FFFFFF
- Texto principal: #333333
- Texto sobre oscuro: #F5F0E6

Tipografía:
- Títulos: Bourbon Grotesque (fallback: Oswald), peso 600-700
- Cuerpo: Raleway, peso 400-600
- Escala: H1=72px, H2=48px, H3=28px, Body=18px

Espaciado:
- Grid base: 8px
- Padding secciones: 80px vertical
- Gap entre elementos: 24px
- Border radius: 6-8px

Estilo visual:
- Profesional pero cercano
- Limpio, sin decoración excesiva
- Imágenes de personas reales trabajando
- Iconos simples, sin gradientes
```

---

## PROMPT 1: HOMEPAGE

```
Diseña la homepage de Proportione, una consultora tecnológica española.

DESIGN SYSTEM:
[Pegar Design System Base de arriba]

ESTRUCTURA DE SECCIONES:

1. HERO (100vh, fondo imagen + overlay granate 75%)
   - H1: "Digitalización sin complicaciones"
   - Subtítulo: "Acompañamos a empresas y personas en el cambio tecnológico. Sin traumas. Con resultados."
   - 2 botones: "Conozca cómo trabajamos" (verde) + "Hablemos" (outline blanco)
   - Centrado verticalmente

2. QUÉ HACEMOS (fondo blanco, 2 columnas 60/40)
   - Columna izquierda: texto
     - H2: "Tecnología al servicio de las personas"
     - Párrafo: "Muchas empresas se sienten desbordadas por los cambios tecnológicos..."
     - Destacado: "Nosotros lo hacemos fácil."
     - Párrafo: "Partimos de las personas y lo que necesitan..."
   - Columna derecha: imagen de equipo trabajando

3. MÉTODO 20-60-20 (fondo crema)
   - H2: "Nuestro método: las personas siempre al mando"
   - Infografía con 3 bloques horizontales:
     - 20% verde: "Su equipo define" / "Estrategia y contexto"
     - 60% granate (más grande): "La IA trabaja" / "Tareas repetitivas"
     - 20% verde: "Su equipo valida" / "Calidad y decisiones"
   - Texto: "La inteligencia artificial hace el trabajo pesado. Sus personas ponen la inteligencia que importa: la humana."

4. TRES PILARES (fondo blanco, 3 cards)
   - H2: "Tres áreas, un objetivo: su crecimiento"
   - 3 cards con imagen arriba, borde superior granate:
     - Estrategia: "Definimos el camino. Analizamos su situación y diseñamos un plan de acción realista."
     - Tecnología: "Implementamos soluciones que funcionan. Sin complicaciones innecesarias."
     - Personas: "Acompañamos a sus equipos. Les transferimos el conocimiento para que sean autónomos."
   - Cada card con botón de texto: "Conozca nuestro enfoque →"

5. POR QUÉ ELEGIRNOS (fondo crema)
   - H2: "¿Por qué elegirnos?"
   - 4 items con icono verde a la izquierda:
     - "Trabajamos dentro de su ecosistema" - "No reemplazamos lo que funciona. Optimizamos lo que tiene."
     - "Transferimos conocimiento" - "No creamos dependencia. Formamos a su equipo para que crezca solo."
     - "Resultados medibles" - "Posicionamiento, ventas, eficiencia. Números que puede ver."
     - "Presupuestos reales" - "Hacemos más con menos. Sin sorpresas."

6. CTA FINAL (fondo granate)
   - H2: "¿Hablamos?"
   - Texto: "Sin compromiso. Sin presión. Cuéntenos qué necesita y le diremos honestamente si podemos ayudarle."
   - Botón verde: "Contactar"

TONO: Profesional pero cercano, trato de usted, directo, sin jerga técnica.

ANIMACIONES: Sutiles fade-in-up al hacer scroll.

Genera versiones: Desktop (1440px), Tablet (768px), Mobile (375px)
```

---

## PROMPT 2: FILOSOFÍA (Nosotros > Filosofía)

```
Diseña la página de Filosofía de Proportione, una consultora tecnológica española.

DESIGN SYSTEM:
[Pegar Design System Base de arriba]

CONTEXTO:
Esta página explica la filosofía de trabajo de Proportione. El nombre viene de la "proporción áurea" pero NO queremos enfatizar lo abstracto/matemático. Queremos transmitir EQUILIBRIO entre tecnología y personas.

ESTRUCTURA DE SECCIONES:

1. HERO (más pequeño que homepage, 50vh)
   - Fondo: imagen sutil + overlay granate suave
   - H1: "Nuestra filosofía"
   - Subtítulo: "Equilibrio entre tecnología y personas"

2. INTRODUCCIÓN (fondo blanco, centrado)
   - Texto grande (22px): "Creemos que la tecnología debe adaptarse a las personas, no al revés. Por eso ponemos siempre al ser humano en el centro de cada decisión tecnológica."

3. EL ORIGEN DEL NOMBRE (fondo crema, 2 columnas)
   - Columna izquierda: ilustración sutil de proporción áurea (NO caracolas ni galaxias, algo abstracto y moderno)
   - Columna derecha:
     - H2: "¿Por qué Proportione?"
     - Texto: "Nuestro nombre viene de la proporción áurea, ese equilibrio matemático que encontramos en la naturaleza y el arte. Pero para nosotros significa algo más simple: el balance perfecto entre lo que la tecnología puede hacer y lo que las personas necesitan."
     - Texto: "No buscamos la última moda tecnológica. Buscamos la solución proporcionada a cada problema."

4. PRINCIPIOS (fondo blanco)
   - H2: "Lo que nos guía"
   - 3 bloques verticales con icono, título y descripción:

   A) "Personas primero"
      - "Antes de hablar de tecnología, escuchamos. Entendemos qué necesita su equipo, qué les frena, qué les ayudaría. La tecnología viene después."

   B) "Tecnología proporcionada"
      - "No implementamos más tecnología de la necesaria. Cada herramienta que proponemos tiene un propósito claro y un retorno medible."

   C) "Conocimiento transferido"
      - "No creamos dependencia. Nuestro objetivo es que su equipo pueda crecer solo. Les enseñamos a pescar, no les vendemos pescado."

5. CÓMO TRABAJAMOS (fondo crema)
   - H2: "Nuestro método de trabajo"
   - Timeline o proceso visual con 4 pasos:

   1. "Escuchamos" - "Nos reunimos con su equipo para entender el contexto real, no solo los síntomas."
   2. "Diagnosticamos" - "Analizamos qué funciona, qué no, y dónde está el verdadero potencial de mejora."
   3. "Proponemos" - "Diseñamos una solución a medida, con presupuesto claro y plazos realistas."
   4. "Acompañamos" - "Implementamos juntos y transferimos el conocimiento para que sean autónomos."

6. COMPROMISO (fondo blanco, destacado)
   - Bloque centrado con fondo granate claro o borde:
   - Texto grande: "Nuestro compromiso: si no podemos ayudarle, se lo diremos. Preferimos ser honestos a vender humo."

7. CTA (fondo granate)
   - H2: "¿Quiere conocer al equipo?"
   - Texto: "Las personas detrás de esta filosofía."
   - Botón verde: "Conozca al equipo" → /equipo/

TONO:
- Reflexivo pero no filosófico en exceso
- Cercano, de usted
- Sin pretensiones, honesto
- EVITAR: jerga de consultora, palabras como "visión", "misión", "excelencia"

IMÁGENES:
- Usar fotos de personas trabajando, reuniones reales
- Evitar stock muy genérico
- Si hay ilustraciones, que sean limpias y minimalistas

Genera versiones: Desktop (1440px), Tablet (768px), Mobile (375px)
```

---

## PROMPT 3: METODOLOGÍA (para futuro uso)

```
Diseña la página de Metodología de Proportione.

DESIGN SYSTEM:
[Pegar Design System Base]

ENFOQUE PRINCIPAL:
Explicar en detalle el método 20-60-20 de forma visual y comprensible.

ESTRUCTURA:

1. HERO
   - H1: "Cómo trabajamos"
   - Subtítulo: "El método 20-60-20: tecnología al servicio de las personas"

2. EXPLICACIÓN VISUAL DEL MÉTODO
   - Infografía grande e interactiva del 20-60-20
   - Cada bloque expandible con más detalle

3. EL 20% INICIAL - Estrategia humana
   - Qué hace el equipo del cliente
   - Por qué es crucial esta fase
   - Ejemplos reales

4. EL 60% - La IA trabaja
   - Qué tareas automatizamos
   - Qué herramientas usamos
   - Cómo mantenemos el control humano

5. EL 20% FINAL - Validación humana
   - Cómo se revisa el trabajo
   - Quién toma las decisiones
   - Por qué las personas siempre mandan

6. RESULTADOS
   - Casos de uso o métricas
   - Testimonios si hay

7. CTA
   - "¿Quiere ver este método en acción?"
   - Botón: "Hablemos de su proyecto"

```

---

## Notas para el diseñador

### Lo que SÍ queremos transmitir:
- Profesionalidad sin frialdad
- Tecnología accesible
- Confianza y cercanía
- Resultados medibles

### Lo que NO queremos:
- Estética de "consultora de los 90"
- Demasiada abstracción (galaxias, fórmulas, caracolas)
- Presión de venta
- Jerga incomprensible

### Emociones objetivo:
- "Estas personas saben de lo que hablan"
- "Me van a ayudar sin complicarme la vida"
- "Por fin alguien que lo explica claro"
