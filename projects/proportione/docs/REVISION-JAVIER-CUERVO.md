# Revisión de Página - Javier Cuervo (CTO)

**Fecha:** Enero 2026
**Archivo:** `content/javier-cuervo-page.html`
**Estado:** Revisada
**Referencia:** Guías de diseño y comunicación

---

## Resumen Ejecutivo

| Sección | Estado | Observaciones |
|---------|--------|---------------|
| Hero | OK | Estructura correcta, consistente con Mayte |
| Proposición de Valor | OK | Mensaje técnico claro |
| Expertise Grid | OK | 4 cards uniformes |
| Trayectoria | OK | Grid 4 items relevantes |
| Thought Leadership | OK | 3 cards con ideas diferenciadas |
| Credenciales | OK | Badges correctos |
| CTA Final | OK | Visible y coherente |

**Valoración Global:** APROBADA con observaciones menores

---

## 1. Hero Section

### 1.1 Estructura Actual

```html
<div style="background-color:#F5F0E6;padding:60px 50px;">
  <div style="max-width:1200px;margin:0 auto;">
    <div style="display:flex;flex-wrap:wrap;gap:40px;align-items:center;">
      <!-- Foto -->
      <div style="flex:1;min-width:300px;">
        <img src="...Javier-Cuervo-Proportione.png" alt="Javier Cuervo - CTO Proportione">
      </div>
      <!-- Texto -->
      <div style="flex:2;min-width:300px;">
        <h1>Javier Cuervo</h1>
        <p>Chief Technology Officer & Strategic Advisor</p>
        <p>La tecnología debe servir al negocio...</p>
      </div>
    </div>
  </div>
</div>
```

### 1.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Color claro | #F5F0E6 (crema) | OK |
| Padding | 80px 60px | 60px 50px | BAJO |
| Max-width | 1200px | 1200px | OK |
| Layout | Flex | Flex con wrap | OK |
| Gap | 40px | 40px | OK |
| Imagen alt | Descriptivo | Sí | OK |
| Border-radius img | 4-8px | 8px | OK |

### 1.3 Tipografía Hero

| Elemento | Actual | Guía | Estado |
|----------|--------|------|--------|
| H1 nombre | 2.5rem (40px), Oswald | 72px+ | BAJO |
| Rol | 1.2rem, Raleway, #6E8157 | OK | OK |
| Intro | 1.1rem, Raleway, #333, lh 1.7 | 16px | OK |

### 1.4 Consistencia con Página Mayte

| Aspecto | Mayte | Javier | Consistente |
|---------|-------|--------|-------------|
| Estructura | Flex 1:2 | Flex 1:2 | ✓ |
| Padding | 60px 50px | 60px 50px | ✓ |
| Colores | #F5F0E6, #5F322F, #6E8157 | Ídem | ✓ |
| Tipografías | Oswald, Raleway | Ídem | ✓ |
| Imagen border-radius | 8px | 8px | ✓ |

### 1.5 Recomendaciones Hero

- [ ] Aumentar padding de `60px 50px` a `80px 60px`
- [ ] Aumentar H1 de 2.5rem a 3rem+ (48px+)
- [x] Colores corporativos correctos
- [x] Alt text en imagen
- [x] Consistencia con página Mayte

---

## 2. Proposición de Valor

### 2.1 Contenido Actual

**Título:** "Arquitectura sin Silos: Decisiones Mejor Informadas"
**Párrafos:** 2 párrafos explicativos

### 2.2 Verificación de Comunicación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Título H2 | 36-48px | 1.8rem (29px) | BAJO |
| Párrafos | Máx 4 líneas | ~3-4 líneas | OK |
| Tono | Técnico + accesible | Sí | OK |
| Sin "yo" | Sin primera persona | "En Proportione", "Javier aporta" | OK |
| Margin-bottom H2 | 40px | 30px | BAJO |
| Margin-bottom p | 24px | 20px | BAJO |

### 2.3 Análisis de Contenido

**Fortalezas:**
- Concepto "Silos informativos" diferenciador y técnico ✓
- Experiencia cuantificada (15 años) ✓
- Mención de clientes relevantes ✓
- Enfoque práctico sobre IA (anti-hype) ✓
- Concepto "estrategia multimodelo" diferenciador ✓

**Alineación con Framework Proportione:**
- Conecta con el pilar "Tecnología" del framework ✓
- Mención de omnicanalidad (pilar clave) ✓

### 2.4 Recomendaciones

- [ ] Aumentar H2 de 1.8rem a 2.2rem
- [ ] Aumentar margin-bottom H2 de 30px a 40px
- [ ] Aumentar margin-bottom párrafos de 20px a 24px
- [x] Contenido técnico accesible
- [x] Diferenciación clara vs competencia

---

## 3. Expertise Grid

### 3.1 Estructura Actual

```html
<div style="background-color:#5F322F;padding:60px 50px;">
  <h2 style="color:#F5F0E6;margin-bottom:40px;">Expertise que Impulsa Resultados</h2>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:30px;">
    <!-- 4 cards -->
  </div>
</div>
```

### 3.2 Cards de Expertise

| Card | Título | Contenido |
|------|--------|-----------|
| 1 | E-commerce & Omnicanalidad | B2B/B2C, clientes Tier 1 |
| 2 | Estrategia de IA Empresarial | Orquestación multimodelo |
| 3 | Transformación Digital | Fortune 500: AbbVie, BBVA |
| 4 | Ciberseguridad Forense | Análisis forense, casos legales |

### 3.3 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo sección | Oscuro permitido | #5F322F | OK |
| Texto sobre oscuro | Crema | #F5F0E6 | OK |
| Grid | auto-fit | auto-fit minmax(280px) | OK |
| Gap | 24-32px | 30px | OK |
| Card padding | 24-32px | 25px | OK |
| Card border-radius | 4-8px | 8px | OK |
| Card background | Transparente/sutil | rgba(255,255,255,0.1) | OK |
| H3 margin-bottom | 16-20px | 15px | OK |

### 3.4 Consistencia con Mayte

| Aspecto | Mayte | Javier | Consistente |
|---------|-------|--------|-------------|
| Título sección | Expertise que Impulsa Resultados | Ídem | ✓ |
| Número de cards | 4 | 4 | ✓ |
| Grid config | minmax(280px,1fr) | Ídem | ✓ |
| Card styling | Mismo | Mismo | ✓ |

### 3.5 Recomendaciones

- [x] Grid responsive correcto
- [x] Colores de contraste correctos
- [x] Cards uniformes
- [x] Consistente con página Mayte
- [ ] Considerar aumentar padding de sección a 80px

---

## 4. Trayectoria

### 4.1 Estructura Actual

```html
<div style="padding:60px 50px;max-width:1200px;margin:0 auto;">
  <h2 style="margin-bottom:30px;">Trayectoria que Respalda</h2>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:40px;">
    <!-- 4 items -->
  </div>
</div>
```

### 4.2 Items de Trayectoria

| Empresa | Rol | Destacado |
|---------|-----|-----------|
| Sngular | Head of eCommerce | 5 años, CRO, retailers Tier 1 |
| ICLANP | Director General | Proyecto Microbioma publicado en Nature |
| BrainSINS | Gartner Cool Vendor 2014 | 100+ retailers, Toys R Us, Phone House |
| Docencia Ejecutiva | UNIE, EAE, DigitalXBorder | Mentor 30+ startups |

### 4.3 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Grid gap | 40-60px | 40px | OK |
| H3 empresa | Oswald, #5F322F | 1.1rem, Oswald, #5F322F | OK |
| Rol | Verde secundario | #6E8157 | OK |
| Descripción | Raleway, #333 | Raleway, #333 | OK |
| Logros cuantificados | Sí | "100+", "30+", "5 años" | OK |

### 4.4 Análisis de Comunicación

**Fortalezas:**
- Experiencia en empresas reconocibles (Sngular, Fortune 500) ✓
- Logros verificables (Gartner Cool Vendor, Nature) ✓
- Cuantificación clara (años, número de retailers) ✓
- Rol docente que refuerza expertise ✓

**Elementos diferenciadores:**
- Publicación en Nature (credibilidad científica)
- Reconocimiento Gartner (validación industria)
- Experiencia Fortune 500 (escala)

### 4.5 Recomendaciones

- [x] Estructura correcta
- [x] Información verificable
- [x] Consistente con Mayte
- [ ] Aumentar padding sección a 80px

---

## 5. Thought Leadership

### 5.1 Estructura Actual

```html
<div style="background-color:#F5F0E6;padding:60px 50px;">
  <div style="max-width:900px;margin:0 auto;">
    <h2 style="text-align:center;">Thought Leadership</h2>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:25px;">
      <!-- 3 cards -->
    </div>
  </div>
</div>
```

### 5.2 Cards de Pensamiento

| Card | Título | Concepto |
|------|--------|----------|
| 1 | La Regla 20-60-20 | División de tareas IA vs humano |
| 2 | Estrategia Multimodelo | Orquestación de herramientas IA |
| 3 | Más Estrategia, Menos Código | Valor en el "qué", no el "cómo" |

### 5.3 Verificación Visual

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo sección | Diferenciado | #F5F0E6 | OK |
| Max-width | 800-900px | 900px | OK |
| Centrado título | Sí | text-align:center | OK |
| Card fondo | Blanco o claro | white | OK |
| Card border-left | Acento | 4px solid #5F322F | OK |
| Card padding | 24-32px | 25px | OK |
| Gap | 24-32px | 25px | OK |

### 5.4 Diferencia con Página Mayte

| Aspecto | Mayte | Javier |
|---------|-------|--------|
| Sección equivalente | Filosofía (Quote) | Thought Leadership (Cards) |
| Formato | Blockquote centrado | Grid de 3 cards |
| Contenido | Filosofía de liderazgo + pilares | Ideas/frameworks propios |

**Análisis:** Esta diferenciación es apropiada porque:
- Mayte: Enfoque humanista → Quote filosófico
- Javier: Enfoque técnico → Ideas/frameworks estructurados

La variación mantiene coherencia visual (mismos colores, padding, tipografías) pero adapta el formato al tipo de contenido.

### 5.5 Análisis de Contenido

**Fortalezas:**
- Ideas propias diferenciadas ✓
- Conceptos memorables ("20-60-20") ✓
- Anti-hype en IA (credibilidad) ✓
- Visión de futuro concreta ✓

**Alineación con marca Proportione:**
- "Multimodelo" conecta con metodología integrada ✓
- Enfoque práctico (no teórico) ✓

### 5.6 Recomendaciones

- [x] Sección bien estructurada
- [x] Contenido diferenciador
- [x] Adaptación apropiada vs Mayte
- [ ] Considerar aumentar padding a 80px

---

## 6. Credenciales

### 6.1 Estructura Actual

```html
<div style="padding:60px 50px;max-width:1200px;margin:0 auto;">
  <h2>Formación y Credenciales</h2>
  <div style="display:flex;flex-wrap:wrap;gap:20px;">
    <!-- 4 badges -->
  </div>
</div>
```

### 6.2 Badges de Credenciales

| Credencial | Institución |
|------------|-------------|
| PhD in Business Innovation | Universidade de Aveiro (en curso) |
| Executive MBA | Escuela de Organización Industrial |
| Licenciatura en Química | Universidad de Oviedo |
| Gartner Cool Vendor | eCommerce 2014 |

### 6.3 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Layout | Flex wrap | Flex wrap | OK |
| Gap | 20-24px | 20px | OK |
| Badge fondo | Gris claro | #F5F0E6 | OK |
| Badge padding | 15-20px | 15px 25px | OK |
| Badge radius | 4px | 4px | OK |

### 6.4 Análisis de Comunicación

**Fortalezas:**
- PhD en curso (credibilidad académica actual) ✓
- MBA ejecutivo (formación empresarial) ✓
- Licenciatura científica (base técnica) ✓
- Reconocimiento industria (Gartner) ✓

**Observación:** El badge "Gartner Cool Vendor" es más un logro profesional que una credencial formativa, pero refuerza la autoridad técnica.

### 6.5 Consistencia con Mayte

| Aspecto | Mayte | Javier | Consistente |
|---------|-------|--------|-------------|
| Número badges | 4 | 4 | ✓ |
| Styling | Mismo | Mismo | ✓ |
| Tipo contenido | Formación + certificaciones | Formación + reconocimiento | Similar |

### 6.6 Recomendaciones

- [x] Badges uniformes
- [x] Información relevante
- [x] Consistente con Mayte
- [ ] Considerar añadir iconos a badges

---

## 7. CTA Final

### 7.1 Estructura Actual

```html
<div style="background-color:#5F322F;padding:50px;text-align:center;">
  <h2 style="color:#F5F0E6;">Arquitectura tecnológica al servicio del negocio</h2>
  <p style="color:#F5F0E6;">Descubre cómo Proportione integra estrategia, tecnología y personas...</p>
  <a href="/contacto/" style="background:#F5F0E6;color:#5F322F;padding:12px 30px;">Contactar</a>
</div>
```

### 7.2 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Destacado | #5F322F | OK |
| Texto | Contraste alto | #F5F0E6 | OK |
| H2 tamaño | Prominente | 1.5rem | OK |
| Botón estilo | Primary invertido | Crema sobre granate | OK |
| Botón padding | 12-16px V, 20-30px H | 12px 30px | OK |
| Botón radius | 4px | 4px | OK |

### 7.3 Análisis de Comunicación

**Título CTA:** "Arquitectura tecnológica al servicio del negocio"
- Conecta con rol de Javier (CTO) ✓
- Reafirma propuesta de valor ("al servicio") ✓

**Descripción:** "Descubre cómo Proportione integra estrategia, tecnología y personas para transformaciones que funcionan."
- Verbo apropiado ("Descubre") ✓
- Menciona los tres pilares ✓
- Enfoque en resultados ("que funcionan") ✓

**Comparación con CTA de Mayte:**
| Aspecto | Mayte | Javier |
|---------|-------|--------|
| Título | "Transformación que comienza con las personas" | "Arquitectura tecnológica al servicio del negocio" |
| Enfoque | People Officer → Personas | CTO → Tecnología |
| Consistencia | Mantienen misma estructura y estilo | ✓ |

### 7.4 Recomendaciones

- [x] CTA bien estructurado
- [x] Mensaje coherente con rol
- [x] Consistente con CTA de Mayte (estructura)
- [ ] Considerar aumentar padding a 60px

---

## 8. Resumen de Estilos Inline

### 8.1 Colores Utilizados

| Color | Uso | Correcto |
|-------|-----|----------|
| #5F322F | Títulos, fondos oscuros | ✓ |
| #6E8157 | Roles, acentos | ✓ |
| #F5F0E6 | Fondos claros, texto sobre oscuro | ✓ |
| #333 | Texto body | ✓ |
| rgba(255,255,255,0.1) | Cards sobre fondo oscuro | ✓ |
| white | Cards thought leadership | ✓ |

### 8.2 Tipografías

| Elemento | Fuente | Correcto |
|----------|--------|----------|
| H1, H2, H3 | Oswald | ✓ |
| Párrafos, roles | Raleway | ✓ |

### 8.3 Espaciado

| Elemento | Actual | Recomendado |
|----------|--------|-------------|
| Secciones padding | 60px 50px | 80px 60px |
| H2 margin-bottom | 30px | 40px |
| Párrafos margin-bottom | 20px | 24px |
| Cards gap | 30px / 25px | 30px ✓ |

---

## 9. Checklist Final

### Diseño Visual
- [x] Colores corporativos (#5F322F, #6E8157, #F5F0E6)
- [x] Tipografías correctas (Oswald, Raleway)
- [x] Grids responsive (auto-fit)
- [x] Contraste texto/fondo correcto
- [ ] Padding secciones (aumentar a 80px)
- [ ] H1 tamaño (aumentar a 48px+)

### Comunicación
- [x] Tono profesional técnico mantenido
- [x] Sin primera persona
- [x] Experiencia cuantificada (años, clientes, proyectos)
- [x] Logros verificables (Gartner, Nature)
- [x] Ideas diferenciadas (20-60-20, Multimodelo)
- [x] CTA con verbo apropiado

### Contenido
- [x] Proposición de valor clara
- [x] Expertise en 4 áreas tecnológicas
- [x] Trayectoria con empresas reconocibles
- [x] Credenciales verificables
- [x] Thought leadership articulado

### Consistencia con Equipo
- [x] Misma estructura general que Mayte
- [x] Mismos estilos CSS
- [x] Adaptación apropiada de contenido (Quote → Cards)
- [x] CTAs complementarios (Personas vs Tecnología)

---

## 10. Acciones Recomendadas

### Prioridad Alta

1. **Aumentar padding de secciones** de 60px a 80px
2. **Aumentar H1 nombre** de 2.5rem a 3rem (48px)

### Prioridad Media

3. **Aumentar H2 títulos** de 1.8rem a 2.2rem
4. **Aumentar margin-bottom H2** de 30px a 40px
5. **Aumentar margin-bottom párrafos** de 20px a 24px

### Prioridad Baja

6. **Considerar iconos** en badges de credenciales
7. **Verificar responsive** en móvil

---

## 11. Análisis de Complementariedad Mayte-Javier

### Posicionamiento Diferenciado

| Aspecto | Mayte (CEO/CPO) | Javier (CTO) |
|---------|-----------------|--------------|
| Enfoque | Personas, transformación interna | Tecnología, arquitectura |
| Tono | Humanista, coaching | Técnico, estratégico |
| Filosofía | Quote reflexivo | Frameworks aplicables |
| Expertise | RRHH, Coaching, Talento | E-commerce, IA, Digital |
| Credenciales | Coaching, RRHH | MBA, PhD, Gartner |

### Coherencia de Marca

Ambas páginas:
- Mantienen estructura idéntica ✓
- Usan misma paleta de colores ✓
- Aplican tipografías consistentes ✓
- Conectan con pilares de Proportione ✓
- Presentan CTAs complementarios ✓

**Valoración:** La diferenciación de contenido dentro de una estructura unificada refuerza el posicionamiento de Proportione como consultora que integra personas + tecnología.

---

## 12. Conclusión

**Estado:** APROBADA

**Puntos fuertes:**
- Estructura consistente con página Mayte
- Colores corporativos bien aplicados
- Contenido técnico accesible
- Experiencia y logros verificables (Gartner, Nature)
- Ideas diferenciadas (Regla 20-60-20, Multimodelo)
- CTA complementario al de Mayte

**Áreas de mejora menores:**
- Espaciado ligeramente inferior al recomendado
- Tamaños de títulos pueden aumentarse

**Complementariedad:** Las páginas de Mayte y Javier funcionan como un díptico que presenta la propuesta integral de Proportione (Personas + Tecnología).

---

**Próximo paso:** Tarea #7 - Revisar página Investigación
