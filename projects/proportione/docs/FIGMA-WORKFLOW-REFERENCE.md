# Figma Workflow Reference - Proportione

Referencia rapida para el workflow Figma + Magician + Claude Code.

---

## Estado de Conexion

| Componente | Estado | Comando verificacion |
|------------|--------|---------------------|
| MCP Figma Desktop | Conectado | `claude mcp list` |
| Figma Desktop | Abierto | Verificar app |
| Design System CSS | Listo | 707 lineas |

---

## Tokens para Figma Variables

### Colores (copiar a Figma)

| Nombre Figma | Valor | Uso |
|--------------|-------|-----|
| `color/primary` | `#5F322F` | Granate corporativo |
| `color/primary-dark` | `#3D1F1C` | Granate oscuro (hover) |
| `color/secondary` | `#551122` | Burdeos |
| `color/accent` | `#6E8157` | Verde oliva |
| `color/neutral` | `#AEADB3` | Gris neutro |
| `color/cream` | `#F5F0E6` | Crema (fondos) |
| `color/white` | `#FFFFFF` | Blanco |
| `color/text` | `#333333` | Texto principal |
| `color/black` | `#1A1A1A` | Negro (footer, etc) |

### Espaciado (grid 8px)

| Nombre Figma | Valor | Uso |
|--------------|-------|-----|
| `space/xs` | `8px` | Microespaciado |
| `space/sm` | `16px` | Pequeno |
| `space/md` | `24px` | Medio |
| `space/lg` | `32px` | Grande |
| `space/xl` | `48px` | Extra grande |
| `space/xxl` | `64px` | Maximo |

### Tipografia

| Nombre Figma | Fuente | Peso | Uso |
|--------------|--------|------|-----|
| `font/titles` | Oswald | 600-700 | Titulos H1-H4 |
| `font/body` | Raleway | 400 | Cuerpo de texto |
| `font/body-bold` | Raleway | 600 | Texto destacado |

### Tamanos de Texto

| Elemento | Desktop | Mobile |
|----------|---------|--------|
| H1 Hero | 72-96px | 36-48px |
| H2 Seccion | 36-48px | 26-36px |
| H3 Subtitulo | 24-32px | 22-28px |
| Body | 18px | 16px |
| Body Lead | 22px | 18px |

---

## Comandos Claude Code para Figma

### Leer diseno seleccionado
```
Claude leera automaticamente con get_design_context
```

### Extraer tokens de un nodo
```
Prompt: "Lee las variables del nodo seleccionado en Figma"
```

### Generar CSS desde Figma
```
Prompt: "Genera CSS para el componente seleccionado.
Usa las variables de proportione-design-system.css"
```

### Comparar con staging
```
Prompt: "Compara el diseno de Figma con staging19.proportione.com/[pagina]"
```

---

## Estructura de Archivo Figma Recomendada

```
Proportione Design System
├── Cover
│
├── Tokens
│   ├── Colors
│   ├── Spacing
│   ├── Typography
│   └── Effects (shadows, etc)
│
├── Components
│   ├── Buttons
│   │   ├── Primary
│   │   ├── Secondary
│   │   └── Ghost
│   ├── Cards
│   │   ├── Service Card
│   │   ├── Team Card
│   │   └── Blog Card
│   ├── Navigation
│   │   ├── Header Desktop
│   │   ├── Header Mobile
│   │   └── Footer
│   ├── Forms
│   │   ├── Input
│   │   ├── Textarea
│   │   └── Submit Button
│   └── Icons
│       └── [Magician outputs]
│
├── Pages
│   ├── Homepage
│   ├── Contacto
│   ├── Blog
│   ├── Investigacion
│   ├── Mayte Tortosa
│   └── Javier Cuervo
│
└── Magician Workspace
    ├── Icon Experiments
    ├── Copy Alternatives
    └── Image Generation
```

---

## Checklist Pre-Trabajo

### Antes de cada sesion
- [ ] Figma Desktop abierto
- [ ] Archivo Proportione abierto en Figma
- [ ] Terminal con Claude Code lista
- [ ] staging19.proportione.com accesible

### Por cada pagina
- [ ] Screenshot de staging como referencia
- [ ] Frame en Figma con estructura
- [ ] Tokens aplicados
- [ ] Auto Layout configurado
- [ ] Nombrado semantico de capas

---

## Archivos Relacionados

| Archivo | Proposito |
|---------|-----------|
| `docs/MAGICIAN-OUTPUT-LOG.md` | Registro de outputs Magician |
| `docs/CHANGELOG-STAGING.md` | Historial de cambios |
| `docs/REVISION-*.md` | Auditorias por pagina |
| `assets/proportione-design-system.css` | CSS del design system |
| `assets/icons/magician/` | Iconos generados |
| `assets/img/magician/` | Imagenes generadas |

---

## Flujo de Trabajo Tipico

```
1. TU (Javier): Selecciona pagina en staging
   ↓
2. TU: Screenshot → Figma → Reconstruir con tokens
   ↓
3. TU: Usar Magician (Icon/Copy/Image) para mejoras
   ↓
4. TU: Seleccionar componente en Figma
   ↓
5. CLAUDE: get_design_context → genera CSS
   ↓
6. CLAUDE: Aplica CSS en staging via Elementor/deploy
   ↓
7. AMBOS: QA visual → iterar si necesario
```

---

## Notas Importantes

1. **MCP es solo lectura**: Claude puede leer de Figma pero no escribir
2. **Seleccion en Figma**: El nodo seleccionado es el que Claude lee
3. **Magician requiere suscripcion**: Si no tienes, usa alternativas manuales
4. **Screenshots**: Util para referencia aunque uses MCP
5. **Variables Figma**: Mejor que valores hardcoded para consistencia

