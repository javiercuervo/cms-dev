# Guia de Implementacion: Blog Single Post V2

## Resumen

Esta guia detalla como implementar el nuevo diseno de blog single post basado en el diseno de Figma. El template incluye todos los componentes necesarios para reducir la tasa de rebote y aumentar el engagement.

---

## Archivos Creados

```
/elementor-templates/
  blog-single-template-v2.json    # Template JSON de Elementor

/wp-content/themes/hello-elementor-child/
  blog-single-v2.css              # CSS del template
  js/blog-single-v2.js            # JavaScript interactivo
```

---

## Estructura del Template

El template incluye las siguientes secciones (de arriba a abajo):

### 1. Hero Section
- Imagen destacada con filtro grayscale
- Overlay granate con gradiente (60% -> 85% opacity)
- Badge de categoria (pill verde)
- Titulo H1 blanco con sombra
- Subtitulo/excerpt
- Meta info (autor, fecha, tiempo lectura)

### 2. Tabla de Contenidos (TOC)
- Fondo crema con borde verde
- Colapsable en mobile
- Links a cada seccion H2/H3

### 3. Contenido Principal
- Ancho maximo 720px
- Lead paragraph destacado (20px)
- Tipografia optimizada para lectura
- Blockquotes, listas, codigo, tablas estilizados

### 4. CTA Inline
- Posicion: despues del 50-60% del contenido
- Titulo contextual
- Botones: "Nuestros servicios" + "Hablemos"

### 5. Newsletter Inline
- Posicion: despues del 70% del contenido
- Gradiente granate
- Formulario de email
- Nota de privacidad

### 6. Tags
- Pills crema/granate con hover

### 7. Share Buttons
- Circulos verdes
- LinkedIn, X, Email, Copy

### 8. Author Bio
- Avatar circular 80px
- Nombre, rol, bio
- Link a LinkedIn

### 9. Post Navigation
- Anterior/Siguiente
- Cards con hover

### 10. Related Posts
- Grid 3 columnas (2 tablet, 1 mobile)
- Fondo crema
- Cards con imagen, categoria, titulo, fecha

### 11. Elementos Flotantes (solo desktop >1200px)
- **Progress Bar**: Barra verde sticky top
- **Context Bar**: Aparece cuando hero sale del viewport
- **Floating Sidebar**: TOC + Share buttons

---

## Pasos de Implementacion

### Paso 1: Cargar CSS

En **Elementor > Custom Code** o en `functions.php`:

```php
function proportione_blog_single_v2_assets() {
    if (is_single()) {
        // CSS
        wp_enqueue_style(
            'blog-single-v2',
            get_stylesheet_directory_uri() . '/blog-single-v2.css',
            array(),
            '2.0.0'
        );

        // JavaScript
        wp_enqueue_script(
            'blog-single-v2',
            get_stylesheet_directory_uri() . '/js/blog-single-v2.js',
            array(),
            '2.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'proportione_blog_single_v2_assets');
```

### Paso 2: Crear Theme Builder Template

1. Ir a **Templates > Theme Builder**
2. Crear nuevo **Single Post** template
3. Importar el JSON o recrear manualmente

#### Importar JSON:
- Abrir Elementor
- Click derecho > Navigator
- Importar `blog-single-template-v2.json`

#### Recrear Manualmente:

**Seccion Hero:**
1. Container full width, min-height 320px
2. Background: #5F322F
3. Agregar widgets:
   - Post Featured Image (posicion absoluta como fondo)
   - Post Info (categoria)
   - Post Title
   - Post Excerpt
   - Post Info (autor, fecha, tiempo)

**Seccion TOC:**
1. Container boxed 720px
2. Background: #F5F0E6
3. Border-left: 4px #6E8157
4. Agregar Table of Contents widget

**Seccion Contenido:**
1. Container boxed 720px
2. Agregar Theme Post Content widget

**Seccion CTA:**
1. Container boxed 720px
2. Borders top/bottom
3. Agregar: Heading, Text, Buttons

**Seccion Newsletter:**
1. Container boxed 720px
2. Background gradient
3. Border-radius 12px
4. Agregar: Icon, Heading, Text, Form

**Seccion Tags:**
1. Container boxed 720px
2. Border-top
3. Agregar Post Info (tags)

**Seccion Share:**
1. Container boxed 720px
2. Agregar Share Buttons widget

**Seccion Author:**
1. Container boxed 720px
2. Flex row (column en mobile)
3. Background: #FAFAFA
4. Agregar Author Box widget

**Seccion Navigation:**
1. Container boxed 960px
2. Flex row
3. Background: #FAFAFA
4. Agregar Post Navigation widget

**Seccion Related:**
1. Container boxed 960px
2. Background: #F5F0E6
3. Agregar: Heading, Posts Grid widget

### Paso 3: Configurar Display Conditions

En Theme Builder, configurar:
- **Include:** All Posts
- **Exclude:** (ninguno)

### Paso 4: Configurar Newsletter

El formulario de newsletter requiere integracion con tu servicio:

**Con Elementor Pro Form:**
- Configurar Actions After Submit
- Integrar con Mailchimp, ConvertKit, etc.

**Con plugin externo:**
- Reemplazar el Form widget por shortcode del plugin

### Paso 5: Configurar Author Bio

Para mostrar el rol del autor, necesitas:

1. **Opcion A:** Campo personalizado en usuario
   ```php
   // En functions.php
   function add_author_role_field($user) {
       $role = get_user_meta($user->ID, 'author_role', true);
       ?>
       <h3>Informacion Profesional</h3>
       <table class="form-table">
           <tr>
               <th><label for="author_role">Rol/Posicion</label></th>
               <td><input type="text" name="author_role" id="author_role" value="<?php echo esc_attr($role); ?>" class="regular-text"></td>
           </tr>
       </table>
       <?php
   }
   add_action('show_user_profile', 'add_author_role_field');
   add_action('edit_user_profile', 'add_author_role_field');
   ```

2. **Opcion B:** Usar ACF para campos de usuario

---

## Tokens de Diseno

### Colores
```css
--granate: #5F322F;
--verde: #6E8157;
--verde-hover: #566E30;
--bg-cream: #F5F0E6;
--bg-gray-light: #FAFAFA;
--text-primary: #1F1F1F;
--text-body: #333333;
--text-muted: #777777;
```

### Tipografia
```
Titulos: Georgia, serif
- H1: 48px / 700 / 1.2
- H2: 32px / 600 / 1.3
- H3: 24px / 600 / 1.35

Cuerpo: Raleway, sans-serif
- Body: 18px / 400 / 1.8
- Lead: 20px / 400 / 1.7
- Small: 14px / 400
```

### Espaciado (base 8px)
```
xs: 4px
sm: 8px
md: 16px
lg: 24px
xl: 32px
2xl: 48px
3xl: 64px
```

### Anchos
```
Content: 720px
Wide: 960px
Max: 1280px
```

---

## Widgets de Elementor Utilizados

| Seccion | Widget | Version |
|---------|--------|---------|
| Hero | Post Featured Image | Pro |
| Hero | Post Title | Pro |
| Hero | Post Info | Pro |
| Hero | Post Excerpt | Pro |
| TOC | Table of Contents | Pro |
| Content | Theme Post Content | Pro |
| CTA | Heading | Free |
| CTA | Text Editor | Free |
| CTA | Button | Free |
| Newsletter | Icon | Free |
| Newsletter | Form | Pro |
| Tags | Post Info | Pro |
| Share | Share Buttons | Pro |
| Author | Author Box | Pro |
| Navigation | Post Navigation | Pro |
| Related | Posts | Pro |

---

## Breakpoints

| Breakpoint | Ancho | Cambios |
|------------|-------|---------|
| Desktop | >1200px | Floating sidebar visible |
| Desktop small | 1024-1200px | Sidebar oculto |
| Tablet | 768-1024px | Related 2 cols |
| Mobile | <768px | Hero 200px, contenido 16px |

---

## Checklist Pre-Launch

- [ ] CSS cargado correctamente
- [ ] JS cargado correctamente
- [ ] Hero muestra imagen destacada
- [ ] TOC genera links correctos
- [ ] CTA links funcionan
- [ ] Newsletter envia a servicio
- [ ] Share buttons funcionan
- [ ] Author bio muestra info correcta
- [ ] Navigation muestra posts corrects
- [ ] Related posts se generan
- [ ] Progress bar funciona
- [ ] Context bar aparece en scroll
- [ ] Floating sidebar visible en >1200px
- [ ] Responsive tablet OK
- [ ] Responsive mobile OK
- [ ] Core Web Vitals OK

---

## Notas Importantes

1. **Imagen destacada obligatoria**: El hero depende de tener imagen
2. **Contenido estructurado**: Usar H2/H3 para que TOC funcione
3. **Author bio**: Requiere campo personalizado para "rol"
4. **Newsletter**: Requiere configurar integracion
5. **Performance**: Cargar JS solo en single posts

---

## Soporte

Para dudas sobre la implementacion, consultar:
- `/cms-dev/_common/docs/elementor-claude-guide.md`
- `/cms-dev/projects/proportione/content/prompt-figma-blog-single-redesign.md`
