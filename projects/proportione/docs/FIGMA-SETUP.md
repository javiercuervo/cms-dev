# Setup Figma + Magician para Proportione

## Decisiones de Diseño

| Aspecto | Decisión |
|---------|----------|
| Tipografía títulos | **Bourbon Grotesque** (oficial de marca) |
| Tipografía cuerpo | Raleway |
| Estructura Figma | Un solo archivo "proportione" |

---

## PASO 1: Activar MCP en Figma Desktop

### Instrucciones:

1. Abrir **Figma Desktop** (no web)
2. Menú: `Figma → Preferences` (o `⌘,`)
3. Buscar sección "Developer" o "Dev Mode"
4. Activar **"Enable Dev Mode MCP Server"**
5. Reiniciar Figma si lo pide
6. El servidor arranca en: `http://127.0.0.1:3845/sse`

### Configurar MCP en Claude Code:

```bash
cd /Users/javiercuervolopez/code/Wordpress/cms-dev
claude mcp add --transport sse figma-dev-mode-mcp-server http://127.0.0.1:3845/sse
claude mcp list  # Verificar que aparece
```

---

## PASO 2: Estructura del Archivo Figma "proportione"

```
📄 proportione
│
├── 📑 Cover (portada del archivo)
│
├── 📑 Tokens
│   ├── Colors (granate, burdeos, verde, grises, cream)
│   ├── Typography (Bourbon Grotesque + Raleway)
│   └── Spacing (4, 8, 16, 24, 32, 48px)
│
├── 📑 Components
│   ├── Buttons
│   ├── Cards
│   ├── Forms
│   ├── Navigation (Header, Footer)
│   └── Typography specimens
│
├── 📑 Pages - Homepage
├── 📑 Pages - Contacto
├── 📑 Pages - Blog
├── 📑 Pages - Investigación
├── 📑 Pages - Equipo (Mayte, Javier)
│
└── 📑 Magician Workspace
    ├── Icon requests
    └── Copy suggestions
```

---

## PASO 3: Variables Figma (Design Tokens)

### Colores

| Variable | Valor | Uso |
|----------|-------|-----|
| `color/brand/primary` | `#5F322F` | Granate principal |
| `color/brand/secondary` | `#551122` | Burdeos oscuro |
| `color/brand/accent` | `#6E8157` | Verde oliva |
| `color/brand/green-dark` | `#3B431C` | Verde oscuro |
| `color/brand/green-medium` | `#566E30` | Verde medio |
| `color/neutral/gray` | `#AEADB3` | Gris neutro |
| `color/neutral/cream` | `#F5F0E6` | Crema fondo |
| `color/text/primary` | `#333333` | Texto principal |
| `color/text/light` | `#F5F0E6` | Texto sobre fondo oscuro |

### Espaciado

| Variable | Valor |
|----------|-------|
| `space/xs` | 4px |
| `space/sm` | 8px |
| `space/md` | 16px |
| `space/lg` | 24px |
| `space/xl` | 32px |
| `space/2xl` | 48px |

### Tipografía

| Variable | Valor |
|----------|-------|
| `font/family/titles` | Bourbon Grotesque |
| `font/family/body` | Raleway |
| `font/size/xs` | 12px |
| `font/size/sm` | 14px |
| `font/size/base` | 16px |
| `font/size/lg` | 18px |
| `font/size/xl` | 24px |
| `font/size/2xl` | 32px |
| `font/size/3xl` | 48px |

---

## PASO 4: Orden de Implementación

| # | Página | Prioridad | Componentes clave |
|---|--------|-----------|-------------------|
| 1 | Navegación/Footer | Alta | Header, menú, footer columnas |
| 2 | Homepage | Alta | Hero, cards servicios, CTA |
| 3 | Contacto | Alta | Formulario, info contacto |
| 4 | Blog | Media | Cards posts, tipografía artículos |
| 5 | Investigación | Media | Grid proyectos |
| 6 | Equipo (Mayte/Javier) | Media | Perfil, bio, publicaciones |

---

## Verificación

Después de cada paso:

- [ ] MCP conectado: `claude mcp list` muestra el servidor
- [ ] Figma abierto con archivo proportione
- [ ] Claude puede leer el archivo: preguntarle "¿qué ves en Figma?"

---

## Archivo JSON de Tokens (para exportar)

```json
{
  "colors": {
    "brand": {
      "primary": "#5F322F",
      "secondary": "#551122",
      "accent": "#6E8157",
      "green-dark": "#3B431C",
      "green-medium": "#566E30"
    },
    "neutral": {
      "gray": "#AEADB3",
      "cream": "#F5F0E6"
    },
    "text": {
      "primary": "#333333",
      "light": "#F5F0E6"
    }
  },
  "spacing": {
    "xs": "4px",
    "sm": "8px",
    "md": "16px",
    "lg": "24px",
    "xl": "32px",
    "2xl": "48px"
  },
  "typography": {
    "families": {
      "titles": "Bourbon Grotesque",
      "body": "Raleway"
    },
    "sizes": {
      "xs": "12px",
      "sm": "14px",
      "base": "16px",
      "lg": "18px",
      "xl": "24px",
      "2xl": "32px",
      "3xl": "48px"
    }
  }
}
```

---

## Correspondencia con CSS Variables

```css
:root {
  /* Colores de marca */
  --color-brand-primary: #5F322F;
  --color-brand-secondary: #551122;
  --color-brand-accent: #6E8157;
  --color-brand-green-dark: #3B431C;
  --color-brand-green-medium: #566E30;

  /* Colores neutros */
  --color-neutral-gray: #AEADB3;
  --color-neutral-cream: #F5F0E6;

  /* Colores de texto */
  --color-text-primary: #333333;
  --color-text-light: #F5F0E6;

  /* Espaciado */
  --space-xs: 4px;
  --space-sm: 8px;
  --space-md: 16px;
  --space-lg: 24px;
  --space-xl: 32px;
  --space-2xl: 48px;

  /* Tipografía */
  --font-titles: 'Bourbon Grotesque', sans-serif;
  --font-body: 'Raleway', sans-serif;

  /* Tamaños de fuente */
  --font-size-xs: 12px;
  --font-size-sm: 14px;
  --font-size-base: 16px;
  --font-size-lg: 18px;
  --font-size-xl: 24px;
  --font-size-2xl: 32px;
  --font-size-3xl: 48px;
}
```
