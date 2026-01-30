# Plan: Conectar Figma + Magician a Proportione (staging19)

## Resumen

Este plan documenta los pasos para integrar Figma y su plugin Magician en el flujo de trabajo de Proportione, aplicándolo a todas las páginas de staging19.proportione.com.

---

## FASE 1: Setup inicial de Figma + Magician

### 1.1 Contratación y acceso

| Servicio | Plan recomendado | Notas |
|----------|------------------|-------|
| **Figma** | Professional | Requerido para Dev Mode MCP Server |
| **Magician** | Pro (Diagram) | Magic Icon, Magic Copy, Magic Image ilimitados |

### 1.2 Instalación de Magician

```
1. Abrir Figma Desktop
2. Menu → Plugins → Browse plugins
3. Buscar "Magician" (by Diagram)
4. Click "Install"
5. Verificar: Plugins → Magician aparece en lista
```

### 1.3 Conectar Figma con Claude Code (MCP)

**En Figma Desktop:**
```
1. Abrir archivo de diseño de Proportione
2. Menu superior → Preferences
3. Activar "Dev Mode MCP Server"
4. Verificar: http://127.0.0.1:3845/sse está activo
```

**En terminal (proyecto cms-dev):**
```bash
cd /Users/javiercuervolopez/code/Wordpress/cms-dev

# Conectar MCP
claude mcp add --transport sse figma-dev-mode-mcp-server http://127.0.0.1:3845/sse

# Verificar conexión
claude mcp list
# Debe mostrar: figma-dev-mode-mcp-server
```

### 1.4 Verificar conexión

En Claude Code:
```
Prompt: "¿Puedes ver el archivo de Figma que tengo abierto?"
Respuesta esperada: Claude describe el archivo, frames, componentes visibles
```

---

## FASE 2: Crear archivo Figma de Proportione

### 2.1 Estructura del archivo Figma

```
Proportione Design System
├── 📁 Tokens
│   ├── Colors (granate, negro, dorado, grises)
│   ├── Typography (Lora, Montserrat según auditoría)
│   ├── Spacing (8px grid)
│   └── Shadows, Borders
│
├── 📁 Components
│   ├── Buttons (Primary, Secondary, Ghost)
│   ├── Cards (Servicio, Blog, Equipo)
│   ├── Navigation (Header, Footer)
│   ├── Forms (Contact, Newsletter)
│   └── Typography (Headings, Body, Quotes)
│
├── 📁 Pages
│   ├── Homepage
│   ├── Mayte Tortosa
│   ├── Javier Cuervo
│   ├── Investigación
│   ├── Blog
│   └── Contacto
│
└── 📁 Magician Workspace
    ├── Icon Requests
    ├── Copy Suggestions
    └── Image Generation
```

### 2.2 Tokens basados en auditorías existentes

Referencia de documentos:
- `docs/AUDITORIA-COLORES.md`
- `docs/AUDITORIA-TIPOGRAFIA.md`
- `docs/IDENTIDAD-VISUAL.md`

**Variables Figma a crear:**

```
color/brand/granate: #6B2D5B (o valor de auditoría)
color/brand/dorado: #D4A84B
color/text/primary: #111827
color/text/secondary: #4B5563
color/background/primary: #FFFFFF
color/background/secondary: #F9FAFB

space/xs: 4px
space/sm: 8px
space/md: 16px
space/lg: 24px
space/xl: 32px
space/2xl: 48px

font/heading/family: Lora
font/heading/weight: 700
font/body/family: Montserrat
font/body/weight: 400
```

---

## FASE 3: Aplicación por página

### Orden de implementación

| # | Página | Prioridad | Complejidad | Doc existente |
|---|--------|-----------|-------------|---------------|
| 1 | Homepage | Alta | Alta | REVISION-HOMEPAGE.md |
| 2 | Navegación/Footer | Alta | Media | REVISION-NAVEGACION-FOOTER.md |
| 3 | Contacto | Alta | Baja | REVISION-CONTACTO.md |
| 4 | Blog | Media | Media | REVISION-BLOG.md |
| 5 | Investigación | Media | Media | REVISION-INVESTIGACION.md |
| 6 | Mayte Tortosa | Media | Baja | REVISION-MAYTE-TORTOSA.md |
| 7 | Javier Cuervo | Media | Baja | REVISION-JAVIER-CUERVO.md |

### 3.1 Workflow por página

```
┌─────────────────────────────────────────────────────────────────┐
│                    WORKFLOW POR PÁGINA                          │
│                                                                 │
│  1. DISEÑO EN FIGMA                                             │
│     ├─ Crear/actualizar página en Figma                         │
│     ├─ Usar Magician para iconos/copy si aplica                 │
│     └─ Aplicar tokens del design system                         │
│                                                                 │
│  2. EXTRACCIÓN CON CLAUDE CODE                                  │
│     ├─ Seleccionar componente/página en Figma                   │
│     ├─ Prompt: "Extrae tokens y genera CSS para Elementor"      │
│     └─ Guardar output en assets/                                │
│                                                                 │
│  3. IMPLEMENTACIÓN EN STAGING                                   │
│     ├─ Abrir Elementor en staging19.proportione.com             │
│     ├─ Aplicar CSS generado                                     │
│     └─ Verificar visualmente                                    │
│                                                                 │
│  4. QA Y DOCUMENTACIÓN                                          │
│     ├─ Checklist visual (pixel-perfect)                         │
│     ├─ Checklist responsive (mobile/tablet/desktop)             │
│     ├─ Actualizar REVISION-[PAGINA].md                          │
│     └─ Commit cambios                                           │
└─────────────────────────────────────────────────────────────────┘
```

---

## FASE 4: Detalle por página

### 4.1 Homepage

**Componentes a diseñar en Figma:**
- [ ] Hero section (título, subtítulo, CTA)
- [ ] Grid de servicios (3-4 cards)
- [ ] Sección "Quiénes somos" (texto + imagen)
- [ ] Testimonios/clientes
- [ ] CTA final

**Uso de Magician:**
- Magic Icon: iconos para servicios
- Magic Copy: headlines alternativos para A/B testing
- Magic Image: placeholders para hero (si aplica)

**Output esperado:**
```
assets/
├── homepage-tokens.css
├── homepage-components.html
└── icons/
    └── services/
```

### 4.2 Navegación y Footer

**Componentes:**
- [ ] Header desktop (logo, menú, CTA)
- [ ] Header mobile (hamburger, drawer)
- [ ] Footer (columnas, social, legal)

**Notas:**
- Componente global: afecta todas las páginas
- Prioridad alta por impacto

### 4.3 Contacto

**Componentes:**
- [ ] Formulario (campos, validación visual)
- [ ] Información de contacto (dirección, teléfono, email)
- [ ] Mapa (si aplica)

**Uso de Magician:**
- Magic Copy: microcopy para labels y placeholders
- Magic Icon: iconos de contacto

### 4.4 Blog

**Componentes:**
- [ ] Lista de posts (cards)
- [ ] Post individual (tipografía, imágenes, sidebar)
- [ ] Categorías/tags

### 4.5 Investigación

**Componentes:**
- [ ] Hero específico
- [ ] Grid de proyectos/publicaciones
- [ ] Detalle de investigación

### 4.6 Páginas de equipo (Mayte, Javier)

**Componentes:**
- [ ] Foto perfil + bio
- [ ] Logros/experiencia
- [ ] Publicaciones/proyectos
- [ ] CTA contacto

---

## FASE 5: Checklist de QA por página

### Template de verificación

```markdown
## QA: [Nombre de página]

### Visual
- [ ] Colores coinciden con tokens Figma
- [ ] Tipografía: familia, peso, tamaño exactos
- [ ] Espaciado: padding/margin según grid 8px
- [ ] Iconos: tamaño y color correctos

### Responsive
- [ ] Mobile (375px): layout correcto
- [ ] Tablet (768px): breakpoint funciona
- [ ] Desktop (1440px): máximo ancho respetado

### Accesibilidad
- [ ] Contraste ≥ 4.5:1 (verificar con herramienta)
- [ ] Focus visible en elementos interactivos
- [ ] Alt text en imágenes

### Performance
- [ ] Imágenes optimizadas (WebP, ≤150KB)
- [ ] CSS cargando sin FOUC
- [ ] Lighthouse ≥ 85

### Firma
- [ ] Diseño: __________ Fecha: __________
- [ ] Dev: __________ Fecha: __________
```

---

## FASE 6: Integración con flujo Git existente

### Estructura de commits

```bash
# Para cada página:
git checkout -b figma/homepage
# ... hacer cambios ...
git add assets/ docs/
git commit -m "feat(design): homepage tokens y componentes desde Figma"
git push origin figma/homepage

# Merge cuando esté validado
git checkout main
git merge figma/homepage
```

### Deploy a staging

```bash
# Usar script existente
./scripts/deploy-staging.sh

# O rsync directo
rsync -avz --exclude='.git' \
  projects/proportione/assets/ \
  siteground-proportione:/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/flavor-flavor-flavor/assets/
```

---

## Próximos pasos inmediatos

### Hoy (después de contratar Figma)

1. [ ] Instalar Figma Desktop (si no está)
2. [ ] Crear cuenta Figma Professional
3. [ ] Instalar plugin Magician
4. [ ] Conectar MCP con Claude Code

### Esta semana

5. [ ] Crear archivo Figma "Proportione Design System"
6. [ ] Definir tokens basados en auditorías existentes
7. [ ] Diseñar componentes de navegación (header/footer)
8. [ ] Extraer CSS con Claude Code
9. [ ] Aplicar a staging19

### Próximas semanas

10. [ ] Homepage completa
11. [ ] Contacto
12. [ ] Blog
13. [ ] Investigación
14. [ ] Páginas de equipo

---

## Referencias

### Documentación común (aplica a todos los proyectos)
- `_common/docs/Figma Claude/figma-magician.md` - Guía operativa de Magician
- `_common/docs/Figma Claude/figma-claude-wordpress-guide.md` - Integración MCP
- `_common/docs/Figma Claude/templates-figma claude.md` - Templates y prompts

### Documentación específica de Proportione
- `docs/AUDITORIA-COLORES.md` - Paleta de colores
- `docs/AUDITORIA-TIPOGRAFIA.md` - Sistema tipográfico
- `docs/IDENTIDAD-VISUAL.md` - Brand guidelines
- `docs/REVISION-*.md` - Estado actual de cada página

---

*Creado: Enero 2026*
*URL staging: https://staging19.proportione.com/*
