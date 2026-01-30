# Prompt para Figma: Página de Clientes Proportione

---

## Contexto del proyecto

Rediseña la página de clientes de **Proportione**, una consultora de estrategia tecnológica. La página debe mostrar los logos de los clientes de forma prominente, transmitiendo confianza y profesionalidad.

**URL actual:** https://staging19.proportione.com/estrategia-tecnologia-y-personas/resultados-clientes/
**Plataforma:** WordPress con Elementor
**Page ID:** 122

---

## Design System Proportione

### Colores
| Nombre | Hex | Uso |
|--------|-----|-----|
| Granate | #5F322F | Fondos hero, acentos, bordes |
| Verde oliva | #6E8157 | CTAs, botones, iconos |
| Crema | #F5F0E6 | Fondos claros, texto sobre oscuro |
| Blanco | #FFFFFF | Fondos principales |
| Texto oscuro | #333333 | Texto cuerpo |

### Tipografías
- **Títulos:** Oswald o Bourbon Grotesque (weight 600-700)
- **Cuerpo:** Raleway (weight 400-500)

### Estilo visual
- Border radius: 6-8px
- Sombras sutiles: `0 4px 20px rgba(0,0,0,0.08)`
- Animaciones suaves (fadeIn, fadeInUp)
- Estética equilibrada entre tecnología y humanismo

---

## Estructura propuesta

### SECCIÓN 1: HERO (50vh)
- **Fondo:** Imagen oscura con overlay granate (#5F322F) al 70%
- **H1:** "Clientes que confían en Proportione"
- **Subtítulo:** "Empresas y organizaciones que han transformado su relación con la tecnología"
- **Texto en blanco/crema, centrado**

### SECCIÓN 2: LOGOS DESTACADOS (fondo blanco)
- **Grid de logos** a gran tamaño
- **Los logos son el elemento principal de esta página**
- Disposición: Grid responsive (4 columnas desktop, 2 tablet, 1 móvil)
- Cada logo debe ser clicable (enlace a la web del cliente)
- Hover: Leve zoom o elevación
- Fondo de cada celda: Blanco o crema muy claro

### SECCIÓN 3: CATEGORÍAS (opcional)
Si quieres agrupar por sectores:
- Tecnología y Consultoría
- Educación y Formación
- Retail y Servicios
- Institucional

### SECCIÓN 4: CTA (fondo granate)
- **Texto:** "¿Quiere ser el próximo caso de éxito?"
- **Botón verde:** "Hablemos"

---

## LOGOS DE CLIENTES (URLs para incluir en el diseño)

### Tecnología y Consultoría
| Cliente | Logo URL |
|---------|----------|
| Sngular | https://staging19.proportione.com/wp-content/uploads/2024/04/Sngular.png |
| Mensoft | https://staging19.proportione.com/wp-content/uploads/2024/04/Mensoft.png |
| Lejan | https://staging19.proportione.com/wp-content/uploads/2024/11/Untitled-1.png |

### Banca y Seguros
| Cliente | Logo URL |
|---------|----------|
| Sparkassen México | https://staging19.proportione.com/wp-content/uploads/2024/04/Sparkassen.png |
| MAWDY / MAPFRE Asistencia | https://staging19.proportione.com/wp-content/uploads/2024/04/MAWDY-_-MAPFRE-Asistencia.png |

### Educación y Formación
| Cliente | Logo URL |
|---------|----------|
| Universidad UNIE | https://staging19.proportione.com/wp-content/uploads/2024/04/Universidad-UNIE.png |
| EAE Business School | https://staging19.proportione.com/wp-content/uploads/2024/04/EAE-Business-School.png |
| Uxer School | https://staging19.proportione.com/wp-content/uploads/2024/04/Uxer-School.png |
| Grado LEINN | https://staging19.proportione.com/wp-content/uploads/2024/04/Grado-LEINN.png |
| UCM (Universidad Complutense) | https://staging19.proportione.com/wp-content/uploads/2024/04/ucm.png |

### Fundaciones y Social
| Cliente | Logo URL |
|---------|----------|
| Fundación Prodis | https://staging19.proportione.com/wp-content/uploads/2024/04/Fundacion-Prodis.png |

### Retail y Servicios
| Cliente | Logo URL |
|---------|----------|
| Naranjas Perdine | https://staging19.proportione.com/wp-content/uploads/2024/04/Naranjas-Perdine.png |
| Farma 54 | https://staging19.proportione.com/wp-content/uploads/2024/04/Farma-54.png |

### Turismo y Cultura
| Cliente | Logo URL |
|---------|----------|
| Cartagena Puerto de Culturas | https://staging19.proportione.com/wp-content/uploads/2024/04/Cartagena-Puerto-de-Culturas.png |

### Otros
| Cliente | Logo URL |
|---------|----------|
| Hispanidad | https://staging19.proportione.com/wp-content/uploads/2024/04/logo-icon-200x200-1.png |

---

## Requisitos técnicos (WordPress Elementor)

1. **Widgets recomendados:**
   - Image Box o Image Gallery para logos
   - Container con Flexbox para grids
   - Heading para títulos
   - Button para CTAs

2. **Responsive:**
   - Desktop: 4 columnas de logos
   - Tablet: 2-3 columnas
   - Mobile: 1-2 columnas

3. **Interacciones:**
   - Logos clicables (enlace externo en nueva pestaña)
   - Hover suave en logos (transform: scale(1.05) o box-shadow)

4. **Accesibilidad:**
   - Alt text en cada logo con nombre del cliente
   - Contraste adecuado en textos
   - Links descriptivos

5. **Animaciones Elementor:**
   - fadeIn o fadeInUp en scroll
   - Stagger de 50-100ms entre logos

---

## Tono y mensaje

- **Profesional pero cercano**
- Transmitir **confianza** y **solidez**
- Los logos hablan por sí solos: variedad de sectores = versatilidad
- No necesita mucho texto: la prueba social son los propios clientes

---

## NO incluir

- Testimoniales largos (quizás en otra página)
- Casos de éxito detallados (eso va en otra sección)
- Demasiados colores fuera del design system
- Emojis

---

## Entregables esperados

1. Diseño desktop (1440px)
2. Diseño tablet (768px)
3. Diseño mobile (375px)
4. Especificaciones de espaciado y tipografía
5. Estados hover de los logos

---

## Referencias de estilo

La página debe mantener coherencia con:
- https://staging19.proportione.com/ (Homepage)
- https://staging19.proportione.com/metodologia/ (Metodología)

Ambas ya rediseñadas con el nuevo design system.
