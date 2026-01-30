# Guía de Implementación - Homepage Nueva

> Fecha: 2026-01-29
> Estado: Listo para implementar

---

## Resumen

Este documento describe cómo implementar el nuevo diseño de homepage en staging19.proportione.com.

---

## Archivos Preparados

| Archivo | Ubicación | Propósito |
|---------|-----------|-----------|
| Contenidos | `content/homepage-content-nuevo.md` | Textos aprobados con Brand Voice |
| HTML | `content/homepage-nuevo.html` | Bloques Gutenberg listos |
| CSS | `assets/homepage-nuevo.css` | Estilos específicos |
| Loader | `assets/proportione-styles.php` | Carga automática del CSS |

---

## Opción A: Implementación Manual en WordPress

### Paso 1: Acceder al Editor

1. Ir a **wp-admin** → **Páginas** → **Inicio** (ID 6)
2. Abrir en **Editor de bloques** (Gutenberg)

### Paso 2: Reemplazar Contenido

1. Seleccionar todo el contenido actual (Ctrl+A / Cmd+A)
2. Eliminar
3. Copiar el contenido de `content/homepage-nuevo.html`
4. En el editor, usar **Opciones** (⋮) → **Editor de código**
5. Pegar el HTML
6. Volver a **Editor visual**
7. Guardar

### Paso 3: Verificar Visualización

1. Vista previa en nueva pestaña
2. Comprobar cada sección:
   - [ ] Hero con fondo granate
   - [ ] Sección "Qué hacemos" centrada
   - [ ] Método 20-60-20 con 3 columnas
   - [ ] Cards de pilares con hover
   - [ ] Diferenciadores con bullets verdes
   - [ ] CTA final con botón verde

### Paso 4: Deploy CSS

```bash
# Desde la carpeta del proyecto
cd /Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione

# Subir CSS al servidor
scp assets/homepage-nuevo.css usuario@staging19.proportione.com:/path/to/theme/

# Subir loader PHP actualizado
scp assets/proportione-styles.php usuario@staging19.proportione.com:/path/to/mu-plugins/
```

---

## Opción B: Implementación con WP-CLI

### Si tienes WP-CLI configurado:

```bash
# Actualizar contenido de la homepage
wp post update 6 --post_content="$(cat content/homepage-nuevo.html)"

# Limpiar cache
wp cache flush
wp elementor flush-css
```

---

## Verificación Final

### Desktop (1920px+)

- [ ] Hero ocupa 70vh mínimo
- [ ] Título legible y centrado
- [ ] 3 columnas en método 20-60-20
- [ ] 3 cards de pilares en fila
- [ ] Hover funciona en cards

### Tablet (768px - 1024px)

- [ ] Columnas se adaptan
- [ ] Texto legible
- [ ] Botones accesibles

### Mobile (< 768px)

- [ ] Todo en una columna
- [ ] Botones full width en hero
- [ ] Espaciado adecuado

### Accesibilidad

- [ ] Contraste verificado (granate sobre crema, blanco sobre granate)
- [ ] Focus visible en enlaces
- [ ] Jerarquía de headings correcta (h1 > h2 > h3)

---

## Rollback

Si algo sale mal:

1. En WordPress, usar **Revisiones** para volver a versión anterior
2. O restaurar desde backup de contenido anterior

---

## Paleta de Colores Usados

| Color | Código | Uso |
|-------|--------|-----|
| Granate | #5F322F | Hero, títulos, CTA final |
| Verde oliva | #6E8157 | Botones, accents |
| Crema | #F5F0E6 | Texto sobre oscuro, fondos |
| Blanco | #FFFFFF | Fondos de sección |
| Texto | #333333 | Párrafos |
| Neutro | #AEADB3 | Bordes, separadores |

---

## Tipografías

| Tipo | Fuente | Peso | Uso |
|------|--------|------|-----|
| H1 | Oswald | 700 | Título hero |
| H2 | Oswald | 600 | Títulos sección |
| H3 | Oswald | 600 | Cards, subsecciones |
| Body | Raleway | 400 | Párrafos |
| Lead | Raleway | 400 | Texto destacado (22px) |
| Button | Raleway | 600 | CTAs |

---

## Contacto

Si hay dudas durante la implementación:
- Revisar `docs/BRAND-VOICE.md` para verificar tono
- Revisar `docs/CHANGELOG-STAGING.md` para historial de cambios
