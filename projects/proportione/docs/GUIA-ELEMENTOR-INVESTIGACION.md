# Guía Elementor: Página de Investigación

## URL
`/investigacion/`

## Documento Fuente

> **La investigación es un pilar fundamental de Proportione.** Define nuestra propuesta de valor diferencial y sustenta todos nuestros servicios con rigor académico.

**IMPORTANTE:** Todo el contenido de esta página debe basarse en:

📄 **`docs/investigacion_proportione.md`**

Este documento maestro contiene:
- Las 7 líneas de investigación activas
- Publicaciones con DOI (Zenodo)
- Marco académico (Doctorado en Innovación Empresarial, Universidade de Aveiro)
- Investigador principal: Javier Cuervo López (ORCID: 0009-0006-7134-2894)

**Cualquier actualización de líneas de investigación o publicaciones debe hacerse PRIMERO en `investigacion_proportione.md` y después reflejarse en la página.**

---

## Concepto Visual

**Estilo:** Editorial académico con accesibilidad
- Rigor científico pero no frío
- Credibilidad institucional
- Fácil navegación entre líneas de investigación

---

## Paleta de Colores

| Elemento | Color | Hex |
|----------|-------|-----|
| Hero/Headers | Granate | `#5F322F` |
| CTAs/Acentos | Verde | `#6E8157` |
| Fondo secciones alternas | Crema | `#F5F0E6` |
| Badges DOI | Azul académico | `#1E3A5F` |
| Texto principal | Gris oscuro | `#333333` |

---

## Estructura de Secciones

### 1. Hero Section
- **Fondo:** Gradiente granate
- **Badge:** "Línea de Investigación"
- **H1:** "Investigación aplicada para la transformación digital"
- **Lead:** Mención a datos de búsqueda, IA, BI, PYMEs
- **Card investigador:** Foto/iniciales + nombre + ORCID link

### 2. Intro + Contador
- **H2:** "7 Líneas de Investigación Activas"
- Texto sobre metodología mixta y colaboraciones

### 3. Grid de Líneas de Investigación
7 cards, una por línea:

| # | Título | Destacado |
|---|--------|-----------|
| 1 | Integración datos búsqueda en BI | ⭐ Featured (borde izq granate) |
| 2 | BI multinivel local + cloud | DOI disponible |
| 3 | LLMs y agentes como capa interpretativa | |
| 4 | Privacidad, RGPD y gobernanza | |
| 5 | UX en proyectos sociales (CAPPI) | |
| 6 | Bioseguridad (Cátedra UCH-Mensoft) | |
| 7 | Ciencia abierta y trazabilidad | |

**Cada card incluye:**
- Número en círculo granate
- Título (H3)
- Descripción breve
- Tags de metodología (PRISMA, DSR, etc.)
- Lista de hallazgos principales
- Publicación/DOI si existe

### 4. Publicaciones Destacadas
- Fondo crema
- 3 cards de publicaciones con:
  - Autores
  - Título (italic)
  - Año (badge verde)
  - Link DOI (botón azul académico)

### 5. Banner Open Science
- Fondo azul académico (`#1E3A5F`)
- Texto sobre compromiso con ciencia abierta
- Logos/badges: PRISMA 2020, OSF, Zenodo, ORCID

### 6. Marco Institucional
- Fondo gris claro
- Dos columnas:
  - Proportione LDA (entidad aplicada)
  - Universidade de Aveiro (marco académico)

### 7. CTA Final
- Fondo gradiente granate→verde
- **H2:** "¿Colaboramos?"
- Texto sobre colaboración con universidades/empresas
- Botones: "Proponer colaboración" + "Ver perfil ORCID"

---

## Widgets Elementor Recomendados

| Sección | Widget |
|---------|--------|
| Hero | Heading + Text Editor + Inner Section (card) |
| Líneas | Loop Grid o Posts (custom) / Icon Box repetido |
| Publicaciones | Cards con Image Box o custom HTML |
| Open Science | Section con badges (Icon List) |
| CTA | Section + Heading + Button Group |

---

## Datos Clave para SEO

**Title:** Investigación | Proportione - BI, IA y Transformación Digital
**Meta:** Líneas de investigación en Business Intelligence, datos de búsqueda e IA aplicada a PYMEs. Publicaciones académicas con rigor y visión práctica.

**Schema sugerido:** Organization + ResearchProject

---

## Links Importantes

- ORCID Javier Cuervo: https://orcid.org/0009-0006-7134-2894
- DOI BI Multinivel: https://doi.org/10.5281/zenodo.17245495
- DOI Role-Play IA: https://doi.org/10.5281/zenodo.17245635
- DOI Coaching: https://doi.org/10.5281/zenodo.17243218

