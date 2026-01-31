# Guía Pragmática de Desarrollo SEO y GEO basada en Keyword Mapping

## 1. Propósito del Documento

Este documento define el proceso operativo de desarrollo SEO y preparación de contenidos para entornos de Generative Engine Optimization (GEO), tomando como eje central el keyword mapping de Proportione.

**Para qué se usa:**
- Decisiones de arquitectura URL y estructura de página
- Brief a redactores, equipos de IA generativa y desarrolladores
- Validación de contenidos antes de publicación
- Aseguramiento de que el keyword mapping es vinculante en todo el proceso

**En qué momento del proyecto entra:**
- Después de que el keyword mapping está aprobado y firmado
- Antes de que el primer redactor o modelo generativo toque una palabra
- Durante todo el ciclo de desarrollo, actualización y deprecación de contenidos

---

## 2. El Keyword Mapping como Contrato

### Lectura del Keyword Mapping

El mapping de Proportione contiene estos elementos estructurales:

| Elemento | Función | Ejemplo |
|----------|---------|---------|
| **Keyword principal** | Núcleo semántico de la página | "proportione" (home), "consultora digital" (categoría) |
| **Volumen** | Referencia de intención; no es comando de densidad | Volumen 10 = intención de marca; volumen 500+ = categoría de alto interés |
| **Keywords secundarias** | Variaciones semánticas y long-tail vinculadas | "consultora de innovación y estrategia digital" |
| **URL propuesta** | Estructura jerárquica: home → categoría → contenido | `/consultoria-estrategica-crecimiento-organico/` |
| **Impacto esperado** | Prioridad de ejecución | Alto, Medio, Bajo |
| **Comentarios/Estructura** | Definición clara de la jerarquía H2–H4 | Define cómo se organiza el contenido dentro de la página |

### Decisiones que NO se toman fuera del mapping

1. **No crear una página nueva sin asignarla al mapping.**
   - Cada URL requiere keyword principal + secundarias explícitas.
   - Si una necesidad de contenido no está en el mapping, se escala primero al mapping.

2. **No cambiar la intención de una página sin modificar el mapping.**
   - La keyword principal define qué pregunta responde la página.
   - Si la pregunta cambia, el mapping también.

3. **No añadir keywords secundarias "porque sí".**
   - Toda secondary keyword en la página debe estar listada en el mapping.
   - Si un redactor quiere añadir una, primero pasa por validación en el mapping.

4. **No flexibilizar la URL sin actualizar el mapping.**
   - La URL es contrato. Si cambia, se registra en el mapping.

### Relación entre Keyword Principal → Intención → Tipo de Página → URL

```
Keyword principal
    ↓
Define intención de búsqueda (qué busca el usuario)
    ↓
Define tipo de página (contenido, landing, hub, home)
    ↓
Define URL y jerarquía
    ↓
Define estructura de contenido (H1–H4)
    ↓
Define extensión, formato y enlaces
```

**Ejemplo real (Proportione):**

| Keyword | Intención | Tipo Página | URL | H1 |
|---------|-----------|-------------|-----|-----|
| "proportione" | Marca, descubrimiento | Home | `/` | "Consultora de Estrategia Digital: Tecnología con foco en las Personas" |
| "consultora digital" | Categoría, comparación | Hub/Categoría | `/consultoria-estrategica-crecimiento-organico/` | Estructura H2–H4 basada en servicios |
| "arquitectura modular ecommerce" | Solución específica | Contenido profundo | `/estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/` | H1 + H2 orientado a beneficio técnico |

### Errores habituales al ignorar el mapping

1. **Redactor crea un artículo sobre "tema X" sin que "tema X" esté mapeado.**
   - Resultado: página huérfana, sin intención clara, compite con otras páginas.

2. **Dos páginas compiten por la misma keyword.**
   - Causa: no se consultó el mapping antes de escribir.
   - Remedio: una debe repriorizarse a secondary keyword; la otra se redirige.

3. **Keywords secundarias no aparecen en el contenido.**
   - El mapping dice que debe haber "consultora de innovación y estrategia digital" pero el H1 solo dice "consultora estratégica."
   - Resultado: pérdida de recuperación semántica.

4. **Estructura H2–H4 no respeta la intención del mapping.**
   - Mapping dice estructura es "¿Qué somos? → Servicios → Por qué elegir"
   - Redactor escribe "Beneficios → Casos de uso → Precio" (completamente diferente).

---

## 3. Traducción del Keyword Mapping a Arquitectura SEO

### URLs: Estructura Derivada del Mapping

El mapping de Proportione define esta jerarquía:

**Nivel 0 (Home):**
- `/`
- Keyword: "proportione"
- Intención: Marca + descubrimiento de servicios

**Nivel 1 (Categorías/Hubs):**
- `/consultoria-estrategica-crecimiento-organico/`
- `/estrategia-tecnologia-y-personas/`
- Keywords: "consultora digital", "consultora estrategia digital"
- Intención: Agrupar servicios relacionados; entrada a árbol de contenido

**Nivel 2 (Servicios/Soluciones específicas):**
- `/consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/`
- `/estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/`
- Keywords específicas por servicio
- Intención: Profundidad en solución concreta

**Nivel 3+ (Contenido profundo / Casos, artículos):**
- `/blog/` + slug específico
- Keywords long-tail mapeadas
- Intención: SEO secundario, recuperación por variaciones semánticas

### Jerarquía de Páginas Según Intención

| Tipo de Página | Nivel | Keywords Asignadas | Volumen Esperado | Extensión | Rol en Ecosistema |
|---|---|---|---|---|---|
| **Home** | 0 | Marca + genéricas altas | Alto (marca) | 2000–3000 | Autoridad central; distribuye PageRank |
| **Hub/Categoría** | 1 | Secundarias altas de familia | Medio–Alto | 2000–3000 | Agrupa subtemas; distribuye a nivel 2 |
| **Contenido servicio** | 2 | Keyword secundaria específica | Medio | 1500–2500 | Conversión; targeting específico |
| **Artículo profundo** | 2–3 | Long-tail semántica | Bajo–Medio | 1000–3000 | Recuperación generativa; autoridad temática |

### Canibalización: Prevención desde el Mapping

**Canibalización = Dos URLs compiten por la misma keyword principal.**

Prevención:
1. **Una sola URL puede tener cada keyword como "principal".**
   - En el mapping, se asigna explícitamente: `/url-a/` tiene como principal "consultora digital" (volumen 500); `/url-b/` NO puede competir por "consultora digital."

2. **Keywords secundarias pueden repetirse en diferentes URLs, pero con rol diferente:**
   - `/` menciona "consultora digital" (pero su principal es "proportione")
   - `/consultoria-estrategica-crecimiento-organico/` tiene como principal "consultora digital"
   - Resultado: sin canibalización; cada página tiene rol claro.

3. **Si descubres que dos URLs compiten por la misma principal:**
   - Fusiona el contenido en la URL de mayor autoridad.
   - Redirige 301 la otra URL.
   - Actualiza el mapping: registra la redirección con fecha y motivo.

**Ejemplo real Proportione:**
- `/` puede mencionar "estrategia" (es complementaria a "proportione")
- `/estrategia-tecnologia-y-personas/` puede tener "estrategia" como secondary (no compete, porque su principal es "estrategia tecnología personas")
- Sin conflicto.

### Relación Home / Categorías / Landings / Contenidos

```
HOME (/)
├─ Palabra clave: "proportione"
├─ Meta: Distribuir autoridad a categorías principales
├─ Link strategy: 3–5 enlaces internos a Categorías nivel 1 (CAPPI, Donar, Voluntariado = referencias reales)
│
├─ CATEGORÍA 1: /consultoria-estrategica-crecimiento-organico/
│  ├─ Palabra clave: "consultora digital", "consultora estrategia digital"
│  ├─ Meta: Agrupar servicios; generar autoridad temática
│  ├─ Link strategy: Distribuye a servicios específicos nivel 2
│  │
│  └─ CONTENIDO NIVEL 2: /consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/
│     ├─ Palabra clave: "consultoría de tecnología" (específica)
│     ├─ Meta: Conversión en servicio concreto
│     ├─ Link strategy: 1 enlace atrás a categoría padre; 2–3 a contenidos relacionados
│
├─ CATEGORÍA 2: /estrategia-tecnologia-y-personas/
│  ├─ Palabra clave: "estrategia digital", "transformación digital"
│  ├─ Meta: Hub temático
│  │
│  ├─ LANDING/CONTENIDO: /estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/
│  │  ├─ Keyword específica: "arquitectura modular ecommerce"
│  │  ├─ Meta: Solución profunda; SEO secundario
│  │
│  └─ CONTENIDO PROFUNDO: /estrategia-tecnologia-y-personas/programas-one-to-one-consultoria-estrategica/
│     ├─ Keyword: "consultoría estratégica one-to-one" (long-tail)
│     ├─ Meta: Autoridad temática; respuesta generativa

└─ HUB TRANSVERSAL: /blog/
   └─ Contenidos complementarios (keyword mapping secundarias, long-tail, variaciones)
```

---

## 4. Desarrollo de Contenidos SEO a Partir del Mapping

### Qué Partes de la Guía Existente son Obligatorias

**Obligatorias para TODAS las páginas:**
- H1 contiene keyword principal
- Meta descripción (140–160 caracteres) con keyword + beneficio + CTA
- Estructura H2–H3–H4 definida en el mapping
- 3–5 enlaces internos (priorizando home, categorías padre, contenidos complementarios)
- 1–2 enlaces externos (autoridad sector: Ministerio Sanidad, secpal.com, organismos relevantes)
- Párrafos ≤4 líneas
- Imágenes: 1 destacada + 2–3 internas (≤100 KB cada una)
- CTA en conclusión

**Variables según intención de keyword:**

| Intención | Extensión | Estructura H2–H4 | Imágenes | Tablas/Listas | Tono |
|-----------|-----------|------------------|----------|--------------|------|
| **Informativa** (¿qué es?) | 1500–2500 | 5–7 H2; H3 para detalle | Infografías + fotos descriptivas | Listas de características | Educativo, claro |
| **Navegacional** (dónde ir) | 1000–1500 | 4–5 H2; H3 para ubicación/proceso | Fotos, mapas, screenshots | Pasos numerados | Directo, orientativo |
| **Transaccional** (cómo contratar) | 800–1200 | 3–4 H2; enfoque en beneficios | Fotos de servicio, testimonios | Comparativas, beneficios | Persuasivo, empático |
| **Comparativa** (A vs B) | 2000–3000 | Tabla comparativa central; H2 detallados | Mockups, screenshots | Tabla de comparación | Neutral analítico |

**Ejemplo (Proportione):**
- Keyword "consultora digital" (intención: navegacional + informativa) → 2000–2500 palabras, H2 con preguntas ("¿Qué es consultoría digital?"), estructura taxonómica de servicios
- Keyword "arquitectura modular ecommerce" (intención: solución específica) → 2000–2500 palabras, H2 con beneficio ("Flexibilidad sin rediseño completo"), tabla de casos, código/diagrama

### Adaptación de Extensión, Estructura y Enlaces según Tipo de Keyword

**Keyword de volumen bajo (0–50 búsquedas/mes):**
- Long-tail específica de marca o nicho
- Extensión: 1000–1500 palabras (concisión)
- Estructura: H2 directo al punto, máximo 3 subtemas
- Enlaces: 2–3 internos hacia artículos relacionados de volumen más alto
- Rol: Recuperación generativa; autoridad temática

**Keyword de volumen medio (51–500 búsquedas/mes):**
- Secundaria de categoría
- Extensión: 1500–2500 palabras (profundidad moderada)
- Estructura: H2 según intención; H3 para detalles
- Enlaces: 4–5 internos; 1–2 externos
- Rol: Distribución de autoridad a nivel 2; entrada a árbol temático

**Keyword de volumen alto (500+ búsquedas/mes):**
- Principal de categoría o home
- Extensión: 2000–3000 palabras (comprensividad)
- Estructura: 6–8 H2; H3–H4 para profundidad y segmentación
- Enlaces: Máximo permitido; distribuye a todas las categorías relacionadas
- Rol: Autoridad central; acumulación de PageRank

### Qué NO Debe Hacer Nunca un Redactor o IA

1. **No crear contenido sin que la keyword esté en el mapping.**
   - Antes de escribir, busca el keyword en la columna "Keyword principal" del mapping.
   - Si no está, requiere aprobación del mapping primero.

2. **No ignorar la estructura H2–H4 del mapping.**
   - El campo "Comentarios" del mapping define la jerarquía exacta.
   - Ejemplo Proportione: si dice "\<H2\> ¿Qué ofrecemos? \<H2\> Estrategia...", eso es vinculante.

3. **No escribir para densidad de keywords.**
   - "Usar la keyword principal con naturalidad en los lugares clave (H1, introducción, H2, H3 y conclusión). Evitar repeticiones innecesarias o forzadas."
   - Máximo: una vez cada 150 palabras en cuerpo.

4. **No mezclar intenciones en una sola página.**
   - Si la keyword es "cómo contratar", no escribas como si fuera "qué es" (confunde a buscador y usuario).
   - Mantén la intención del mapping.

5. **No cambiar la meta descripción a algo que no incluya la keyword principal.**
   - Fórmula: Keyword + beneficio concreto + CTA.
   - Contraejemplo incorrecto: "Descubre nuestros servicios" (sin keyword, sin CTA claro).

6. **No hacer enlaces internos aleatorios.**
   - Solo enlaza dentro del árbol temático relevante.
   - Si el contenido es sobre "estrategia digital", no enlaces a "políticas de cookies" (aunque sea página relevante).

7. **No usar tablas si pueden ser listas numeradas.**
   - Tablas: para comparación lado a lado (A vs B) o data estructurada.
   - Listas: para pasos, características, beneficios.

8. **No hacer H1 largo.**
   - Máximo 60 caracteres (incluyendo espacios).
   - Si no cabe, fragmenta a H1 + primer párrafo con la keyword.

---

## 5. SEO On-Page Operativo (Derivado del Mapping)

### Uso Real de Keywords (No Densidades Teóricas)

**Principio:** Keywords como respuesta a intención, no como relleno cuantitativo.

**Ubicación obligatoria de keyword principal:**
1. **H1:** Una única instancia; es el titular principal.
   - Fórmula: `[Número/Adjetivo] + [Keyword] + [Beneficio]`
   - Ejemplo: "5 claves de consultora digital para transformar tu organización"

2. **Primer párrafo:** Dentro de los primeros 100 caracteres.
   - No fuerces. Si el párrafo fluye sin ella, está bien repetirla en H2.
   - Ejemplo: "La consultoría digital es el proceso de alinear tecnología con estrategia."

3. **Un H2:** Mínimo una mención.
   - H2 con preguntas frecuentes es natural: "¿Qué es la consultoría digital?"

4. **Un H3:** Mínimo una mención.
   - Detalle operativo; keyword como contexto.
   - Ejemplo bajo H2 "Servicios de consultoría digital": H3 "Transformación de procesos mediante consultoría digital."

5. **Conclusión:** Una mención que cierre el tema.
   - Resumen + CTA que reitera la keyword en contexto.

**Keywords secundarias:**
- No necesitan estar en H1–H2–H3.
- Deben aparecer al menos una vez en cuerpo, idealmente en contexto semántico claro.
- Si el mapping lista "consultora de innovación y estrategia digital", busca un párrafo donde tenga sentido orgánico mencionar esos dos elementos.

**Ejemplo real Proportione home:**
- Keyword principal: "proportione"
- Apariciones: H1 ("Proportione | Consultora..."), primer párrafo ("Proportione transforma..."), H2 de conclusión ("Involucrar a las personas... Proportione")
- Keywords secundarias: "consultora digital", "estrategia digital", "IA" → distribuidas en H2 temáticos

### Uso de H1–H4 Basado en Intención, No en Relleno

**H1: Único, es el título principal.**
- Refleja la intención del keyword principal.
- NO hay múltiples H1 en una página.

**H2: Divide el contenido en subtemas principales (4–8 máximo).**
- Cada H2 responde una pregunta o cubre un aspecto de la intención principal.
- Ejemplo Proportione (home):
  - H2 "¿Qué ofrecemos?" (responde: "servicios principales")
  - H2 "¿Por qué elegir Proportione?" (responde: "diferenciación")
  - H2 "Involucrar a las personas..." (responde: "filosofía operativa")

**H3: Detalles dentro de cada H2 (1–3 por H2).**
- Profundiza en un aspecto; no es listado exhaustivo.
- Ejemplo:
  - H2 "Servicios de Consultoría"
    - H3 "Consultoría de Transformación Digital"
    - H3 "Consultoría de Innovación"

**H4: Complemento de H3 (raro; máximo 1 por H3).**
- Solo si hay nivel de detalle adicional que justifique.
- Ejemplo:
  - H3 "Consultoría de Transformación"
    - H4 "Diagnóstico de madurez tecnológica" (subpaso dentro de transformación)

**Errores que cometen redactores:**
1. H2 demasiado específico: "Beneficio 1", "Beneficio 2", "Beneficio 3" (3 H2 para lo que podría ser 1 H2 con 3 H3).
   - Corrección: Un H2 "Beneficios principales" → 3 H3.

2. H3 que debería ser H2: "¿Cómo funciona nuestro servicio?" debería ser H2 si ocupa 500+ palabras.
   - Regla: Si un subtema ocupa >400 palabras, sube su nivel jerárquico.

3. H4 innecesario: "Paso 1.1", "Paso 1.2" bajo un "Paso 1" (H3).
   - Corrección: Si son pasos, usa listas numeradas bajo H3, no H4.

### Meta Title y Meta Description como Sistemas, No Piezas Sueltas

**Meta Title (50–60 caracteres):**

Fórmula:
```
[Keyword Principal] | [Beneficio o Diferenciador]
```

Ejemplos:
- "Proportione | Consultora de Estrategia Digital: Tecnología y Personas"
- "Consultoría de Tecnología | Soluciones Digitales para Empresas"

Reglas:
- Incluye keyword principal al inicio (0–5 caracteres de diferencia).
- Incluye diferenciador (marca, beneficio, lugar si es local).
- Evita adjetivos genéricos: "mejor", "top", "profesional" (ruido).
- Único por página: no copies titles de otras.

**Meta Description (140–160 caracteres):**

Fórmula:
```
[Keyword] + [Beneficio concreto] + [Invitación a acción o curiosidad].
```

Ejemplos:
- "Consultora digital experta en estrategia, transformación digital y gestión del cambio. Alineamos tecnología, IA y personas. ¿Hablamos?"
- "Cuidados paliativos pediátricos: atención integral para niños con enfermedades graves y apoyo emocional a familias. Conoce cómo ayudamos."

Reglas:
- Comienza con la keyword (o sinónimo cercano).
- Añade un beneficio concreto (no generic "Descubre más").
- Termina con CTA débil (preguntas, invitación): "¿Hablamos?", "Conoce cómo", "Descubre".
- No repitas el title word-for-word.
- Evita caracteres especiales que rompan la visualización.

**Sistema (no pieza suelta):**

La meta title + meta description forman una dupla coherente:

| Meta Title | Meta Description | Coherencia |
|---|---|---|
| "Arquitectura Modular eCommerce \| Flexible y Escalable" | "Diseña un ecommerce modular, flexible y escalable. Reduce costos de rediseño, integra nuevas funcionalidades sin interrupciones. ¿Necesitas arquitectura adaptable?" | ✓ Title anuncia; description desarrolla beneficio |
| "Arquitectura Modular eCommerce \| Flexible y Escalable" | "Descubre nuestros servicios de ecommerce." | ✗ Description genérica; no refleja keyword; no CTA claro |

---

## 6. GEO (Generative Engine Optimization)

### Qué es GEO en Términos Prácticos

GEO = adaptación de contenidos para que modelos generativos (ChatGPT, Gemini, Perplexity, Claude) los citen, resuman y usen como fuente en respuestas sintéticas.

**A diferencia de SEO clásico:**
- SEO clásico: Optimizar para ranking en buscador (posición 1–10).
- GEO: Optimizar para citabilidad en respuestas generativas (snippet, párrafo resumido, atribución).

**Contexto real:**
Cuando un usuario pregunta a ChatGPT "¿Cuál es la mejor consultoría digital en España?", los LLMs no usan URLs directamente; usan fragmentos de texto de websites entrenados en su corpus. Si tu contenido está bien estructurado, claro y contiene definiciones, el modelo puede extraer y citar información tuya.

### Diferencias Reales frente a SEO Clásico

| Aspecto | SEO Clásico | GEO |
|--------|-----------|-----|
| **Meta principal** | Ranking en posición 1–10 de Google | Citabilidad en respuestas de LLMs |
| **Estructura** | Keywords distribuidas; jerarquía flexible | Definiciones claras; relaciones causa-efecto explícitas |
| **Lenguaje** | Conversacional + keywords | Declarativo + pedagógico |
| **Contexto** | Asumido (user intent implícito) | Explícito (define términos, relaciones, ejemplos) |
| **Longitud** | Competencia por volumen; densidad importa | Claridad importa; longitud es vehículo, no fin |
| **Formato** | Paragraphs + listas + imágenes | Bloques temáticos autónomos + FAQs + resúmenes |

### Cómo Escribir para Modelos Generativos

**Estructura clara y bloques autónomos:**
- Cada sección debe ser comprensible sin leer las anteriores.
- Un párrafo bajo H2 no debe depender de leer el párrafo anterior.

Incorrecto:
```
## ¿Qué es la consultoría digital?
Lorem ipsum... Lorem ipsum...

## Cómo funciona
"Nosotros" aplicamos el concepto mencionado arriba mediante...
```
Problema: H2 "Cómo funciona" depende de entender H2 anterior. LLM no contextualiza bien.

Correcto:
```
## ¿Qué es la consultoría digital?
La consultoría digital es el proceso de alinear tecnología con estrategia empresarial para mejorar operaciones, productos y experiencia de cliente.

## Cómo funciona la consultoría digital
La consultoría digital opera en tres fases:
1. Diagnóstico (análisis de estado actual)
2. Diseño (definición de arquitectura y roadmap)
3. Implementación (ejecución y adopción)
```

**Lenguaje declarativo, no aspiracional:**

Incorrecto (aspiracional, vago):
- "Somos líderes en transformación digital."
- "Ofrecemos soluciones innovadoras."

Correcto (declarativo):
- "Nuestro enfoque de transformación digital integra auditoría tecnológica, rediseño de procesos y capacitación de equipos para reducir time-to-market en un 30% promedio."
- "Ofrecemos cuatro servicios de consultoría: diagnóstico, diseño, implementación y gestión del cambio."

**Contexto explícito:**
- Define términos la primera vez que los usas.
- Explica relaciones causa-efecto, no solo enuncios.

Incorrecto:
- "La modularidad es clave."

Correcto:
- "La modularidad (división del código en componentes independientes y reutilizables) permite que equipos desarrollen, actualicen y debugueen funcionalidades en paralelo sin afectar el resto de la plataforma."

### Relación Entre Estructura Clara, Lenguaje Declarativo y Contexto Explícito

```
Estructura clara (H2–H4)
    ↓ Permite al LLM dividir el contenido en chunks
    ↓
Lenguaje declarativo (definiciones, no aspiraciones)
    ↓ Permite al LLM extraer hechos verificables
    ↓
Contexto explícito (por qué, cómo, ejemplo)
    ↓ Permite al LLM entender relaciones y generar respuestas coherentes
    ↓
RESULTADO: Fragmento citado en respuesta generativa
```

### Qué Patrones Favorecen la Citabilidad por IA

**1. Definición + Contexto + Beneficio**

```
## ¿Qué es la arquitectura modular en ecommerce?

La arquitectura modular en ecommerce es un enfoque de diseño donde la plataforma se compone de componentes independientes (módulos de búsqueda, carrito, pago, recomendaciones, etc.) que se comunican mediante APIs bien definidas.

Esto permite que:
- Cada módulo se actualice sin afectar el resto
- Equipos diferentes trabajen en paralelo
- Se añadan nuevas funcionalidades sin redescargar la plataforma
- Se cambien proveedores (ej. proveedor de pagos) sin alterar la arquitectura central
```

**2. Listas numeradas con contexto**

```
## Cómo implementar una transformación digital

1. Diagnóstico de madurez digital: Auditoría de sistemas, procesos y competencias actuales para establecer baseline.
2. Visión y roadmap: Definición de objetivos, hitos y prioridades de transformación (6–24 meses).
3. Diseño de arquitectura: Arquitectura tecnológica, definición de integraciones, selección de vendors.
4. Implementación iterativa: Pilotos, iteraciones rápidas, validación con usuarios.
5. Escalado y adopción: Capacitación, gestión del cambio, métricas de éxito.
```

**3. Tablas comparativas con contexto**

```
## Consultoría de Tecnología vs. Consultoría General

| Aspecto | Consultoría Tecnológica | Consultoría General |
|--------|---|---|
| **Foco** | Arquitectura, infraestructura, integraciones | Procesos, organización, estrategia |
| **Durabilidad** | 3–12 meses; entregables técnicos | 6–18 meses; cambio organizacional |
| **Rol de IA** | Central: selección de tools, automatización | Complementaria: análisis de datos |
```

**4. FAQs con respuestas estructuradas**

```
## Preguntas frecuentes sobre consultoría digital

### ¿Cuándo necesito contratar una consultoría digital?
Cuando enfrentas:
- Presión de competidores digitales
- Sistemas legacy que ralentizan innovación
- Desalineación entre TI y negocio
- Necesidad de escalar operaciones

### ¿Cuál es la diferencia entre implementación y adopción?
- **Implementación**: Despliegue técnico; el sistema "funciona".
- **Adopción**: Equipos lo usan efectivamente; generan valor; cambian behaviors.
```

**5. Resúmenes ejecutivos al inicio de artículos largas**

```
## Resumen: Arquitectura Modular en eCommerce

**Qué es:** División de plataforma en componentes independientes comunicados por APIs.
**Cuándo usarla:** Cuando necesitas flexibilidad, escalabilidad, equipo distribuido.
**Beneficios clave:** Actualización sin downtime, desarrollo paralelo, flexibilidad de vendors.
**Costo:** Inicial mayor (complexity management); ahorro a largo plazo (reduce rediseños).

[Ver detalles completos abajo]
```

---

## 7. Contenidos Preparados para IA

### Cómo Estructurar Textos para que una IA los "Entienda"

**Bloques temáticos autónomos:**
Cada párrafo de 150–200 palabras debe ser comprensible en sí mismo.

```markdown
## Tema A

Párrafo 1: Introducción + definición.
Párrafo 2: Por qué importa + contexto.
Párrafo 3: Cómo se aplica + ejemplo concreto.

## Tema B

Párrafo 1: Intro + definición (no asume que leíste Tema A).
Párrafo 2: Diferencia respecto a Tema A (solo si relevante).
Párrafo 3: Aplicación + ejemplo.
```

**Etiquetado semántico (schema markup):**
- Usa `<strong>` para términos clave, no para énfasis decorativo.
- `<em>` para énfasis conceptual, no para cursiva estética.

Correcto:
```
La <strong>modularidad</strong> permite que equipos desarrollen componentes en <em>paralelo</em> sin conflictos.
```

Incorrecto:
```
La _modularidad_ es _super importante_ para desarrollo...
```

### Uso de Definiciones, Listas, Relaciones Causa-Efecto

**Definiciones explícitas:**

Incorrecto:
- "El ecommerce omnicanal está revolucionando el retail."

Correcto:
- "Ecommerce omnicanal (integración de canales online y offline en una experiencia unificada) permite que clientes comiencen una compra en mobile, continúen en tienda, y terminen en web sin fricciones."

**Listas con estructura causa-efecto:**

Incorrecto:
```
- Modularidad
- Escalabilidad
- Flexibilidad
- Agilidad
```

Correcto:
```
**La arquitectura modular genera estos beneficios:**
1. **Desarrollo paralelo** → Equipos no se bloquean; velocidad de feature +40%.
2. **Independencia de vendors** → Cambiar proveedor de search o pagos sin rediseño.
3. **Reducción de downtime** → Actualizaciones en módulo sin afectar plataforma.
4. **Adopción de IA más rápida** → Integra componentes de IA sin reescribir core.
```

### Qué Formatos Funcionan Mejor para IA

| Formato | Función | Ejemplo |
|---------|---------|---------|
| **FAQs** | Extracción de respuesta clara; LLM cita como fuente | ¿Qué es X? ¿Cuándo usar Y? |
| **Bloques explicativos** | Contexto denso; LLM resume en párrafo | "La transformación digital es..." + definición + beneficios |
| **Resúmenes ejecutivos** | Recuperación rápida; LLM parafrasea | Bullet points con definición + números |
| **Tablas comparativas** | Extracción de datos estructurados | Vendor A vs Vendor B; Enfoque X vs Enfoque Y |
| **Listas numeradas** | Pasos secuenciales; LLM cita como proceso | 5 pasos para implementar X; 3 fases de Y |
| **Bloques de definición** | Extracción de términos clave | "**Término:** Definición de 1–2 líneas." |

### Qué Formatos Penalizan la Recuperación Generativa

| Formato | Por qué falla | Ejemplo |
|---------|---------------|---------|
| **Parrafadas sin estructura** | LLM no identifica bloques; contexto disperso | 500 palabras sin H2, H3 ni listas |
| **Aspiraciones sin datos** | No es verificable; LLM evita citar | "Somos líderes en innovación" |
| **Repetición de keyword forzada** | Detectable como relleno; reduce credibilidad | Misma frase 5 veces en párrafo |
| **Jerga sin definición** | LLM no comprende relación con audiencia | "Escalabilidad horizontal asimétrica" sin explicar |
| **Testimonios como prueba única** | LLM prioriza hechos verificables sobre opiniones | "El cliente X dijo que..." (sin datos de mejora) |
| **Imágenes como única información** | LLM no procesa imágenes bien en corpus; requiere alt text | Infografía compleja sin descripción textual |

---

## 8. Checklist Final de Desarrollo SEO + GEO

### Checklist Técnica (Antes de desarrollador)

- [ ] Keyword principal está en el mapping y asignado a una única URL.
- [ ] URL sigue estructura jerárquica del mapping (home / categoría / página).
- [ ] No hay redirecciones innecesarias en la cadena (máximo 1 salto).
- [ ] Página tiene robots meta: "index, follow" (no esté accidentalmente en noindex).
- [ ] Canonical URL es la URL de la página (no apunta a otra).
- [ ] Breadcrumb structure coincide con árbol del mapping.
- [ ] Internal links no crean bucles; siguen jerarquía hacia home.
- [ ] Structured data (schema.org) es apropiado para el tipo de página (Article, LocalBusiness, Service, FAQPage).
- [ ] Meta robots de imágenes son "index" (si aplica).
- [ ] Sitemap.xml incluye la URL nueva.
- [ ] Mobile-first: página se ve correctamente en móvil; no hay elementos rotos.
- [ ] Página carga en <3 segundos (Core Web Vitals: LCP, FID, CLS).

### Checklist de Contenido (Antes de publicación)

- [ ] H1 contiene keyword principal (máximo 60 caracteres).
- [ ] Primer párrafo contiene keyword principal en primeros 100 caracteres.
- [ ] Meta title incluye keyword + diferenciador (50–60 caracteres).
- [ ] Meta description incluye keyword + beneficio + CTA (140–160 caracteres).
- [ ] Extensión coincide con intención:
  - [ ] Informativa: 1500–2500 palabras
  - [ ] Transaccional: 800–1200 palabras
  - [ ] Comparativa: 2000–3000 palabras
  - [ ] Long-tail: 1000–1500 palabras
- [ ] Párrafos tienen máximo 4 líneas (150–200 palabras).
- [ ] H2–H3–H4 respetan estructura definida en mapping.
- [ ] Keyword principal aparece en H2, H3 y conclusión (natural, no forzado).
- [ ] Keywords secundarias (del mapping) aparecen al menos una vez en cuerpo.
- [ ] Lenguaje es declarativo (definiciones claras, no aspiracional).
- [ ] Contexto explícito: relaciones causa-efecto, ejemplos concretos.
- [ ] Imágenes: 1 destacada + 2–3 internas; todas ≤100 KB.
- [ ] Nombres de archivo de imágenes incluyen keyword principal.
- [ ] Atributo ALT en imágenes incluye keyword + descripción breve.
- [ ] Enlaces internos: 3–5, priorizando home, categorías, contenidos temáticos relacionados.
- [ ] Enlaces externos: 1–2, solo sitios de autoridad (organismos, publicaciones reconocidas).
- [ ] Anchor text es descriptivo (no "haz click aquí").
- [ ] CTA final es claro (no generic "contacta").
- [ ] Sin interlineados dobles entre títulos y párrafos.
- [ ] Sin repeticiones innecesarias de la misma URL en enlaces internos.

### Checklist GEO (Para IA Generativa)

- [ ] Contenido tiene bloques temáticos autónomos (cada sección es comprensible sin leer anterior).
- [ ] Definiciones explícitas: términos clave definidos en el primer uso.
- [ ] Relaciones causa-efecto están explícitas (no implícitas).
- [ ] Listas numeradas tienen contexto (por qué, beneficio, ejemplo).
- [ ] Tablas comparativas tienen encabezados claros y unidades consistentes.
- [ ] FAQs, si las hay, tienen respuestas directas (no párrafos vagos).
- [ ] Resumen ejecutivo al inicio (si el artículo es >2000 palabras).
- [ ] Datos concretos, no aspiraciones ("30% de ahorro" vs. "líderes en eficiencia").
- [ ] Jerga técnica está acompañada de explicación en paréntesis.
- [ ] Schema markup (JSON-LD) es apropiado para el tipo de página.
- [ ] Las imágenes tienen `alt` text descriptivo (no "imagen 1").
- [ ] Sin repeticiones que parezcan keyword stuffing.

### Checklist Antes de Publicar (QA Final)

**Validación Cross-functional:**
- [ ] SEO ha revisado: keywords, estructura, enlaces, meta data.
- [ ] Contenidos ha revisado: tono, coherencia con guía interna, claridad.
- [ ] Desarrollador ha revisado: HTML válido, no errores de consola, carga correcta.
- [ ] Responsable de IA ha revisado: estructura para citabilidad, lenguaje declarativo.

**Revisión final:**
- [ ] Copiar-pegar el H1, meta title, meta description en Google y verificar que no hay duplicados en la web.
- [ ] Ejecutar Lighthouse (PageSpeed Insights) y asegurar score >85.
- [ ] Validar HTML en validator.w3.org.
- [ ] Revisar en móvil y escritorio.
- [ ] Verificar que los enlaces internos y externos funcionan (no 404).
- [ ] Revisar que la URL no contiene caracteres especiales ni mayúsculas.

**Antes de darle "publish":**
- [ ] URL está comunicada al equipo de SEO (para monitoreo en analytics).
- [ ] Se ha registrado en el mapping con fecha de publicación.
- [ ] Se ha configurado la redirección 301 de URLs anteriores (si aplica).
- [ ] La página está en el sitemap.
- [ ] Se ha disparado un ping a Google Search Console (opcional, pero recomendado).

---

## Apéndice: Integración con Procesos Existentes

### Cómo Este Documento se Relaciona con Otros Documentos

```
brand-guide.md
    ↓
tone-of-voice.md (¿cómo escribimos?)
    ↓
SEO-GEO-GUIDELINES.md (¿en qué estructura escribimos?)
    ↓
keyword-mapping.csv (¿qué escribimos?)
    ↓
Redactor / IA
    ↓
Desarrollador
    ↓
QA Final
    ↓
Publicación
```

Este documento es el nexo entre la filosofía de marca (tone-of-voice.md) y la decisión operativa (keyword-mapping.csv).

### Excepciones Documentadas

Si descubres que el mapping necesita actualización:
1. Documenta la excepción en el archivo "Excepciones y cambios en mapping" con fecha y razonamiento.
2. No publiques contenido sin keyword en el mapping.
3. Escala la excepción al propietario del mapping (Project Lead SEO).

---

**Versión:** 1.0  
**Fecha:** Enero 2026  
**Responsable:** SEO Senior  
**Próxima revisión:** Julio 2026