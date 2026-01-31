# Checklist SEO/GEO para Proportione

**Basado en:** `_common/docs/seo-geo-guidelines.md`
**Referencia de keywords:** `Keyword-mapping-proportione-home.csv`
**Última actualización:** 2026-01-30

---

## Antes de Crear Contenido

- [ ] Verificar que la keyword principal está en el keyword mapping
- [ ] Confirmar URL propuesta en el mapping
- [ ] Revisar estructura H2-H4 definida en el mapping
- [ ] Verificar que no hay otra página con la misma keyword principal (evitar canibalización)

---

## Durante la Creación

### Meta Tags

- [ ] **Meta title:** keyword principal + diferenciador (50-60 caracteres)
  - Fórmula: `[Keyword Principal] | [Beneficio o Diferenciador]`
  - Ejemplo: "Proportione | Consultora de Estrategia Digital: Tecnología y Personas"

- [ ] **Meta description:** keyword + beneficio + CTA (140-160 caracteres)
  - Fórmula: `[Keyword] + [Beneficio concreto] + [Invitación a acción]`
  - Ejemplo: "Transformamos organizaciones uniendo tecnología, IA y capital humano. Somos la consultora digital experta en estrategia, gestión del cambio y co-creación. ¿Hablamos?"

### Estructura de Encabezados

- [ ] **H1:** único, contiene keyword principal (máximo 60 caracteres)
  - Solo un H1 por página
  - Fórmula: `[Número/Adjetivo] + [Keyword] + [Beneficio]`

- [ ] **Primer párrafo:** keyword principal en primeros 100 caracteres

- [ ] **H2-H4:** respetan estructura definida en el mapping
  - H2: 4-8 máximo, cada uno responde una pregunta o aspecto
  - H3: 1-3 por H2, profundiza en detalles
  - H4: solo si hay nivel adicional que lo justifique

### Contenido

- [ ] Keyword principal aparece en: H1, primer párrafo, un H2, un H3, conclusión
- [ ] Keywords secundarias mencionadas naturalmente (al menos 1 vez cada una)
- [ ] Párrafos ≤4 líneas (150-200 palabras máximo por párrafo)
- [ ] Lenguaje declarativo (definiciones claras, no aspiracional)
- [ ] Sin repeticiones forzadas de keywords

### Enlaces

- [ ] **Enlaces internos:** 3-5, priorizando:
  1. Home
  2. Categorías padre
  3. Contenidos temáticos relacionados

- [ ] **Enlaces externos:** 1-2 de autoridad (organismos, publicaciones reconocidas)
- [ ] Anchor text descriptivo (NO "haz click aquí")

### Imágenes

- [ ] 1 imagen destacada + 2-3 internas
- [ ] Cada imagen ≤100 KB
- [ ] Nombre de archivo incluye keyword principal
- [ ] Atributo ALT descriptivo con keyword

### CTA

- [ ] CTA claro en conclusión (no genérico)

---

## Para GEO (Citabilidad por IA)

### Estructura

- [ ] Bloques temáticos autónomos (cada sección comprensible sin leer anterior)
- [ ] Definiciones explícitas de términos clave en su primer uso
- [ ] Relaciones causa-efecto claras y explícitas

### Formato

- [ ] FAQs con respuestas directas (si aplica)
- [ ] Listas numeradas con contexto (por qué, beneficio, ejemplo)
- [ ] Tablas comparativas con encabezados claros
- [ ] Resumen ejecutivo al inicio (si >2000 palabras)

### Contenido

- [ ] Datos concretos, no aspiraciones ("30% de ahorro" vs. "líderes en eficiencia")
- [ ] Jerga técnica acompañada de explicación en paréntesis
- [ ] Sin keyword stuffing detectable

---

## Checklist Técnica

- [ ] URL sigue estructura jerárquica del mapping
- [ ] Página tiene robots meta: "index, follow"
- [ ] Canonical URL correcta
- [ ] Breadcrumbs coinciden con árbol del mapping
- [ ] Schema markup apropiado (Article, LocalBusiness, Service, FAQPage)
- [ ] Página incluida en sitemap.xml
- [ ] Mobile-first: visualización correcta en móvil
- [ ] Core Web Vitals: carga <3 segundos

---

## Antes de Publicar (QA Final)

- [ ] Lighthouse score >85
- [ ] HTML válido (validator.w3.org)
- [ ] Revisar en móvil y escritorio
- [ ] Verificar que enlaces internos y externos funcionan (no 404)
- [ ] URL sin caracteres especiales ni mayúsculas
- [ ] Registrar en mapping con fecha de publicación
- [ ] Configurar redirección 301 si hay URLs anteriores

---

## Extensión según Tipo de Contenido

| Intención | Extensión | Estructura |
|-----------|-----------|------------|
| Informativa (¿qué es?) | 1500-2500 palabras | 5-7 H2; H3 para detalle |
| Navegacional (dónde ir) | 1000-1500 palabras | 4-5 H2; pasos numerados |
| Transaccional (cómo contratar) | 800-1200 palabras | 3-4 H2; enfoque en beneficios |
| Comparativa (A vs B) | 2000-3000 palabras | Tabla comparativa central |

---

## Páginas Pendientes de Optimización (según Keyword Mapping)

| URL | Keyword Principal | Prioridad |
|-----|-------------------|-----------|
| `/` (home) | proportione | **Completado 2026-01-30** |
| `/estrategia-tecnologia-y-personas/divina-proportione/` | divina proportione | Alta |
| `/consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/` | consultoría de tecnología | Alta |
| `/estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/` | arquitectura modular ecommerce | Alta |
| `/estrategia-tecnologia-y-personas/programas-one-to-one-consultoria-estrategica/` | consultoría estratégica one-to-one | Alta |
| `/politica-privacidad/` | - | Pasar a noindex |

---

## Problemas Detectados en Homepage (2026-01-30)

### H1 Duplicado

La homepage actual tiene **dos H1**:
1. `<h1 class="entry-title">Homepage Nueva</h1>` (del tema)
2. `<h1>Digitalización sin complicaciones</h1>` (del contenido Elementor)

**Acción requerida:**
- Ocultar o cambiar el H1 del tema (`entry-title`) a otro nivel
- Mantener solo el H1 visible del contenido

### H1 Propuesto según Keyword Mapping

El H1 debe ser: **"Consultora de Estrategia Digital: Tecnología con foco en las Personas"**

Actualmente es: "Digitalización sin complicaciones"

**Acción requerida:** Actualizar manualmente en Elementor (post ID 2832)

---

## Referencias

- Guía SEO/GEO completa: `_common/docs/seo-geo-guidelines.md`
- Keyword Mapping: `projects/proportione/docs/Keyword-mapping-proportione-home.csv`
