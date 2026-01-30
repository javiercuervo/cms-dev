# Revisión de Homepage - Proportione

**Fecha:** Enero 2026
**URL:** https://staging19.proportione.com/
**Estado:** Revisada
**Referencia:** `content/guia-diseno-visual-consultoria.md`, `content/guia-comunicacion-consultoria.md`

---

## Resumen Ejecutivo

| Sección | Estado | Observaciones |
|---------|--------|---------------|
| Navegación | OK | Estructura correcta, sticky |
| Hero | REVISAR | Proposición puede mejorar |
| Tres Pilares | OK | Grid correcto, colores OK |
| Por Qué Proportione | OK | Diferenciadores claros |
| Framework/Metodología | OK | Imagen corporativa |
| CTA Final | OK | Visible y claro |
| Footer | OK | Navegación + legal |

---

## 1. Navegación (Header)

### 1.1 Estructura Actual

```
[Logo] | Nosotros ▼ | Servicios ▼ | Soluciones ▼ | Insights ▼ | Contacto
```

### 1.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Altura | 60-80px | 80px | OK |
| Logo ancho | 140-180px | 180px max | OK |
| Sticky | Sí | Sí | OK |
| CTA prominente | Sí | "Contacto" | OK |
| Links font-size | 14-16px | 15px | OK |
| Links font-weight | 400-500 | 600 | ALTO |

### 1.3 Submenús

| Menú | Opciones | Estado |
|------|----------|--------|
| Nosotros | 5 opciones | OK |
| Servicios | 4 opciones | OK |
| Soluciones | 4 opciones | OK |
| Insights | Blog, Investigación | OK |

### 1.4 Recomendaciones

- [ ] Considerar reducir font-weight de links de 600 a 500
- [x] Estructura de menú correcta
- [x] Hover states con color primario

---

## 2. Hero Section

### 2.1 Contenido Actual

**Título principal:** "Crecimiento Orgánico"
**Subtítulo:** "Alineamos estrategia, tecnología y personas para transformaciones sostenibles"

### 2.2 Verificación vs Guía de Comunicación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Proposición máx. palabras | 3-8 | 2 ("Crecimiento Orgánico") | OK |
| Subtítulo máx. líneas | 2 | 1 | OK |
| Tono | Aspiracional | Aspiracional | OK |
| Sin verbos conjugados | Preferible | Cumple ("Alineamos" en subtítulo) | OK |

### 2.3 Verificación Visual

| Aspecto | Guía | Verificar en Staging |
|---------|------|---------------------|
| Altura hero | 500-700px | Verificar |
| Overlay imagen | Granate 75-80% | Verificar |
| Tipografía H1 | 72-120px | Verificar (probablemente 56px) |
| CTA presente | Sí | Sí ("Descubre cómo") |

### 2.4 Análisis de Proposición

**Actual:** "Crecimiento Orgánico"

**Análisis según guía de comunicación:**
- Nominal (sin verbo) ✓
- Aspiracional ✓
- Brevedad (2 palabras) ✓

**Alternativas más alineadas con guía (opcional):**
- "Transformación Digital No Traumática"
- "Transformación Sostenible"
- "Crecimiento con Propósito"

### 2.5 Recomendaciones Hero

- [ ] Verificar tamaño H1 (aumentar a 72px si es menor)
- [ ] Verificar overlay de imagen (75-80% granate)
- [x] Proposición clara y breve
- [x] CTA visible

---

## 3. Sección Tres Pilares

### 3.1 Estructura Actual

```
┌─────────────────────────────────────────────────┐
│           "Tres pilares, un objetivo"           │
├─────────────┬─────────────┬─────────────────────┤
│ ESTRATEGIA  │ TECNOLOGÍA  │    PERSONAS         │
│  [Card]     │   [Card]    │     [Card]          │
└─────────────┴─────────────┴─────────────────────┘
```

### 3.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Grid columnas | 3-4 | 3 | OK |
| Cards uniformes | Sí | Sí | OK |
| Título sección | H2 36-48px | Verificar | - |
| Card padding | 24-32px | Verificar | - |
| Gutter | 24-32px | 30px (CSS) | OK |

### 3.3 CTAs de Cards

| Card | CTA | Destino | Estado |
|------|-----|---------|--------|
| Estrategia | "Descubre cómo" | Metodología | OK |
| Tecnología | "Ver servicios" | Consultoría | OK |
| Personas | "Conoce al equipo" | Filosofía | OK |

### 3.4 Verificación de Comunicación

Los CTAs usan verbos recomendados:
- "Descubre" ✓ (nivel suave según guía)
- "Ver" ✓ (neutro)
- "Conoce" ✓ (nivel suave)

### 3.5 Recomendaciones

- [x] Grid de 3 columnas correcto
- [x] CTAs con verbos apropiados
- [ ] Verificar padding y gutter en staging

---

## 4. Sección "Por Qué Proportione"

### 4.1 Contenido

Esta sección presenta los diferenciadores clave de la empresa.

### 4.2 Verificación de Comunicación

| Aspecto | Guía | Verificar |
|---------|------|-----------|
| Beneficios claros | Outcomes, no features | - |
| Evidencia | Métricas si disponibles | - |
| Tono | Capaz + colaborativo | - |

### 4.3 Recomendaciones

- [ ] Verificar que los diferenciadores sean outcomes, no features
- [ ] Considerar añadir métricas si hay casos de éxito

---

## 5. Sección Framework/Metodología

### 5.1 Contenido Actual

**Título:** "Transformación digital no traumática"
**Imagen:** proportione-framework-horizontal-1.png
**CTA:** "Conoce el framework"

### 5.2 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Título descriptivo | Sí | Sí | OK |
| Imagen corporativa | Sí | Sí | OK |
| CTA claro | Sí | "Conoce el framework" | OK |

### 5.3 Análisis de Comunicación

El título "Transformación digital no traumática" es:
- Diferenciador claro ✓
- Conecta con propuesta de valor ✓
- Alineado con `proportione-framework.md` ✓

### 5.4 Recomendaciones

- [x] Sección bien estructurada
- [ ] Verificar contraste de texto sobre imagen
- [ ] Considerar añadir breve descripción (2-3 líneas)

---

## 6. CTA Final

### 6.1 Contenido Actual

Invitación a conversación/contacto antes del footer.

### 6.2 Verificación

| Aspecto | Guía | Verificar |
|---------|------|-----------|
| Prominencia | Alta | - |
| Fondo diferenciado | Color o gris claro | - |
| Botón estilo Primary | Sí | - |
| Texto claro | Qué esperar al hacer clic | - |

### 6.3 Recomendaciones

- [ ] Verificar que el CTA final tenga fondo diferenciado
- [ ] Verificar prominencia visual del botón

---

## 7. Footer

### 7.1 Estructura Actual

```
┌─────────────────────────────────────────────────┐
│ Navegación: Inicio | Consultoría | Blog | Contacto │
│ Legal: Privacidad | Cookies                        │
│ © 2024 Proportione. Todos los derechos reservados. │
└─────────────────────────────────────────────────┘
```

### 7.2 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Gris oscuro o granate | #5F322F (granate) | OK |
| Texto | Claro sobre oscuro | Crema #F5F0E6 | OK |
| Links rápidos | Sí | Sí | OK |
| Legal | Sí | Privacidad, Cookies | OK |
| Altura | 300-400px | Verificar | - |

### 7.3 Problema Detectado

**Copyright:** "© 2024" debería ser "© 2026" (año actual)

### 7.4 Recomendaciones

- [x] Colores correctos (granate + crema)
- [x] Links de navegación presentes
- [x] Legal presente
- [ ] **Actualizar copyright a 2026**
- [ ] Considerar añadir social media links
- [ ] Considerar añadir newsletter signup

---

## 8. Verificación Global de Diseño

### 8.1 Colores

| Elemento | Color Esperado | Verificar en Staging |
|----------|---------------|---------------------|
| Títulos | #5F322F | - |
| Body text | #333 | - |
| Links | #6E8157 | - |
| CTAs | #5F322F bg, #F5F0E6 text | - |
| Footer | #5F322F bg | ✓ |

### 8.2 Tipografía

| Elemento | Fuente | Verificar |
|----------|--------|-----------|
| H1 | Oswald | - |
| H2 | Oswald | - |
| Body | Raleway | - |
| Nav | Raleway | - |

### 8.3 Espaciado

| Entre Secciones | Esperado | Verificar |
|-----------------|----------|-----------|
| Hero → Pilares | 80px | - |
| Pilares → Por Qué | 80px | - |
| Por Qué → Framework | 80px | - |
| Framework → CTA | 80px | - |

---

## 9. Checklist de Comunicación (según guía)

### Proposiciones y Títulos
- [x] Hero: Proposición ≤8 palabras
- [x] Subtítulo: ≤2 líneas
- [ ] Verificar que NO haya primera persona (I/me)
- [x] Tono aspiracional mantenido

### CTAs
- [x] Verbos apropiados (Descubre, Ver, Conoce)
- [x] Claridad en destino
- [ ] Verificar que NO haya urgencia artificial

### Contenido
- [ ] Verificar métricas si hay claims de resultados
- [ ] Verificar que beneficios sean outcomes, no features

---

## 10. Acciones Recomendadas

### Prioridad Alta

1. **Actualizar copyright** de 2024 a 2026
2. **Verificar tamaño H1 Hero** - Aumentar a 72px si es menor
3. **Verificar espaciado entre secciones** - Aumentar a 80px si es menor

### Prioridad Media

4. **Verificar overlay de imagen hero** - Debe ser granate 75-80%
5. **Reducir font-weight de nav links** de 600 a 500
6. **Añadir social media links** al footer

### Prioridad Baja

7. **Considerar newsletter signup** en footer
8. **Revisar métricas/evidencia** en sección diferenciadores

---

## 11. Elementos a Verificar Manualmente en Staging

### Checklist Visual

- [ ] H1 Hero tamaño ≥72px
- [ ] Hero altura 500-700px
- [ ] Overlay granate 75-80%
- [ ] Grid pilares gap 30px
- [ ] Cards padding 25px
- [ ] Secciones separación 80px
- [ ] Footer altura 300-400px
- [ ] Responsive mobile correcto

### Checklist Interactivo

- [ ] Hover en nav links (color #5F322F)
- [ ] Hover en CTAs (fondo más oscuro)
- [ ] Submenús aparecen correctamente
- [ ] Links del footer funcionan
- [ ] Mobile menu funcional

---

## 12. Conclusión

**Estado General:** APROBADA con ajustes menores

**Puntos fuertes:**
- Estructura de secciones clara
- Navegación completa con submenús
- CTAs con verbos apropiados
- Colores corporativos aplicados
- Footer con información legal

**Áreas de mejora:**
- Actualizar copyright a 2026
- Verificar/aumentar tamaño H1 Hero
- Verificar espaciado entre secciones
- Considerar añadir social media al footer

---

**Próximo paso:** Tarea #5 - Revisar página Mayte Tortosa
