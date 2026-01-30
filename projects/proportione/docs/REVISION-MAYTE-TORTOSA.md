# Revisión de Página - Mayte Tortosa (CEO)

**Fecha:** Enero 2026
**Archivo:** `content/mayte-tortosa-page.html`
**Estado:** Revisada
**Referencia:** Guías de diseño y comunicación

---

## Resumen Ejecutivo

| Sección | Estado | Observaciones |
|---------|--------|---------------|
| Hero | OK | Estructura correcta |
| Proposición de Valor | OK | Mensaje claro |
| Expertise Grid | OK | 4 cards uniformes |
| Trayectoria | OK | Grid 4 items |
| Filosofía | OK | Quote destacada |
| Credenciales | OK | Badges correctos |
| CTA Final | OK | Visible |

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
        <img src="...Mayte-Tortosa-Cambio-Proportione.png" alt="Mayte Tortosa - CEO Proportione">
      </div>
      <!-- Texto -->
      <div style="flex:2;min-width:300px;">
        <h1>Mayte Tortosa</h1>
        <p>Chief Executive Officer & Chief People Officer</p>
        <p>Transformación genuina requiere personas...</p>
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

### 1.3 Tipografía Hero

| Elemento | Actual | Guía | Estado |
|----------|--------|------|--------|
| H1 nombre | 2.5rem (40px), Oswald | 72px+ | BAJO |
| Rol | 1.2rem, Raleway, #6E8157 | OK | OK |
| Intro | 1.1rem, Raleway, #333 | 16px | OK |

### 1.4 Recomendaciones Hero

- [ ] Aumentar padding de `60px 50px` a `80px 60px`
- [ ] Aumentar H1 de 2.5rem a 3rem+ (48px+)
- [x] Colores corporativos correctos
- [x] Alt text en imagen

---

## 2. Proposición de Valor

### 2.1 Contenido Actual

**Título:** "The Human Loop: Transformación de Dentro Hacia Afuera"
**Párrafos:** 2 párrafos explicativos

### 2.2 Verificación de Comunicación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Título H2 | 36-48px | 1.8rem (29px) | BAJO |
| Párrafos | Máx 4 líneas | ~3-4 líneas | OK |
| Tono | Capaz + colaborativo | Sí | OK |
| Sin "yo" | Sin primera persona | "Entendemos", "Mayte aporta" | OK |
| Margin-bottom H2 | 40px | 30px | BAJO |
| Margin-bottom p | 24px | 20px | BAJO |

### 2.3 Análisis de Contenido

**Fortalezas:**
- Concepto "Human Loop" diferenciador ✓
- Conecta con metodología de la empresa ✓
- Menciona experiencia cuantificada (25 años) ✓
- Referencia metodologías (GROW Framework) ✓

**Mejoras posibles:**
- Podría incluir una métrica de impacto

### 2.4 Recomendaciones

- [ ] Aumentar H2 de 1.8rem a 2.2rem
- [ ] Aumentar margin-bottom H2 de 30px a 40px
- [ ] Aumentar margin-bottom párrafos de 20px a 24px
- [x] Contenido alineado con guía de comunicación

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
| 1 | Transformación Organizativa | Rediseño estructuras, procesos, cultura |
| 2 | Coaching Ejecutivo | GROW, 700+ horas formación |
| 3 | Experiencia de Cliente | Omnicanalidad, personalización |
| 4 | Desarrollo de Talento | Capacitación, profesora universitaria |

### 3.3 Verificación vs Guía

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo sección | Oscuro permitido | #5F322F | OK |
| Texto sobre oscuro | Crema | #F5F0E6 | OK |
| Grid | auto-fit | auto-fit minmax(280px) | OK |
| Gap | 24-32px | 30px | OK |
| Card padding | 24-32px | 25px | OK |
| Card border-radius | 4-8px | 8px | OK |
| H3 margin-bottom | 16-20px | 15px | OK |

### 3.4 Recomendaciones

- [x] Grid responsive correcto
- [x] Colores de contraste correctos
- [x] Cards uniformes
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

| Empresa | Rol | Duración | Logro destacado |
|---------|-----|----------|-----------------|
| Banco Pichincha España | Directora RRHH | 6 años | Transformación oficina → banco |
| YUGROW (YuCoach) | Fundadora & CEO | 5 años | Plataforma coaching online |
| HP | RRHH Consulting | 5 años | Portal e-HR, fusión HP-Compaq |
| Idreal Coaching | Directora General | 7 años | Metodología GROW + Agenda 2030 |

### 4.3 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Grid gap | 40-60px | 40px | OK |
| H3 empresa | Oswald, #5F322F | 1.1rem, Oswald, #5F322F | OK |
| Rol | Verde secundario | #6E8157 | OK |
| Descripción | Raleway, #333 | Raleway, #333 | OK |

### 4.4 Análisis de Comunicación

**Fortalezas:**
- Experiencia cuantificada (años) ✓
- Logros específicos ✓
- Empresas reconocidas ✓
- Narrativa de progresión clara ✓

### 4.5 Recomendaciones

- [x] Estructura correcta
- [x] Información relevante
- [ ] Aumentar padding sección a 80px

---

## 5. Filosofía (Quote)

### 5.1 Estructura Actual

```html
<div style="background-color:#F5F0E6;padding:60px 50px;">
  <div style="max-width:900px;margin:0 auto;text-align:center;">
    <h2>Filosofía de Liderazgo</h2>
    <blockquote>
      "Trabajamos de dentro hacia afuera. La transformación genuina ocurre..."
    </blockquote>
    <p>— Mayte Tortosa</p>
    <p><strong>Cinco pilares:</strong> Libertad, Consciencia, Responsabilidad, Acción, Compromiso.</p>
  </div>
</div>
```

### 5.2 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Fondo | Diferenciado | #F5F0E6 | OK |
| Max-width quote | 800-900px | 900px | OK |
| Centrado | Sí | text-align:center | OK |
| Quote font-size | 1.2-1.3rem | 1.2rem | OK |
| Quote line-height | 1.6-1.8 | 1.8 | OK |
| Atribución | Presente | "— Mayte Tortosa" | OK |

### 5.3 Análisis de Contenido

**Quote actual:**
> "Trabajamos de dentro hacia afuera. La transformación genuina ocurre cuando cada persona descubre, en su propio proceso reflexivo, por qué el cambio es necesario y qué debe hacer."

**Evaluación:**
- Mensaje diferenciador ✓
- Conecta con propuesta de valor ✓
- Tono profesional ✓
- Longitud apropiada ✓

### 5.4 Recomendaciones

- [x] Sección bien estructurada
- [x] Quote impactante y alineada
- [x] Cinco pilares como refuerzo
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
| Máster en Coaching Profesional | UAM, 700 horas |
| Licenciatura en Derecho | UAM, Especialización Trabajo |
| Máster en RRHH | Centro Estudios Garrigues |
| Profesora Universitaria | UCM, UNIE, EAE |

### 6.3 Verificación

| Aspecto | Guía | Actual | Estado |
|---------|------|--------|--------|
| Layout | Flex wrap | Flex wrap | OK |
| Gap | 20-24px | 20px | OK |
| Badge fondo | Gris claro | #F5F0E6 | OK |
| Badge padding | 15-20px | 15px 25px | OK |
| Badge radius | 4px | 4px | OK |

### 6.4 Recomendaciones

- [x] Badges uniformes
- [x] Información relevante
- [ ] Considerar añadir iconos a badges

---

## 7. CTA Final

### 7.1 Estructura Actual

```html
<div style="background-color:#5F322F;padding:50px;text-align:center;">
  <h2 style="color:#F5F0E6;">Transformación que comienza con las personas</h2>
  <p style="color:#F5F0E6;">Descubre cómo Proportione integra estrategia, tecnología y desarrollo humano.</p>
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

**Título CTA:** "Transformación que comienza con las personas"
- Conecta con rol de Mayte (People Officer) ✓
- Mensaje coherente con página ✓

**Descripción:** "Descubre cómo Proportione integra estrategia, tecnología y desarrollo humano."
- Verbo apropiado ("Descubre") ✓
- Menciona los tres pilares ✓

**Botón:** "Contactar"
- Claro y directo ✓

### 7.4 Recomendaciones

- [x] CTA bien estructurado
- [x] Mensaje coherente
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
| Cards gap | 30px | 30px ✓ |

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
- [x] Tono profesional mantenido
- [x] Sin primera persona
- [x] Experiencia cuantificada (años, horas)
- [x] Logros específicos
- [x] Quote diferenciadora
- [x] CTA con verbo apropiado

### Contenido
- [x] Proposición de valor clara
- [x] Expertise en 4 áreas
- [x] Trayectoria relevante
- [x] Credenciales verificables
- [x] Filosofía articulada

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

## 11. Conclusión

**Estado:** APROBADA

**Puntos fuertes:**
- Estructura clara y coherente
- Colores corporativos bien aplicados
- Contenido alineado con guía de comunicación
- Experiencia cuantificada
- Quote diferenciadora
- CTA claro

**Áreas de mejora menores:**
- Espaciado ligeramente inferior al recomendado
- Tamaños de títulos pueden aumentarse

**Consistencia con Javier Cuervo:** La página debe mantener la misma estructura para coherencia del equipo.

---

**Próximo paso:** Tarea #6 - Revisar página Javier Cuervo
