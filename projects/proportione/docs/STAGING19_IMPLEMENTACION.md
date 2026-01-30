# Documentacion de Implementacion - Staging19 Proportione

**Fecha de actualizacion:** 30 de enero de 2026
**URL Staging:** https://staging19.proportione.com
**Estado:** LISTO PARA PRODUCCION

---

## Resumen Ejecutivo

Proyecto completamente estabilizado con backup completo en servidor y local. Todas las tareas de diseno solicitadas han sido implementadas.

---

## 1. INVENTARIO DE ARCHIVOS

### Paginas PHP Personalizadas (5)

| Archivo | Tamano | URL | Funcion |
|---------|--------|-----|---------|
| `index-new.php` | 16K | `/` | Homepage con slider hero |
| `nosotros.php` | 14K | `/nosotros/` | Pagina equipo Mayte/Javier |
| `metodologia.php` | 13K | `/metodologia/` | Metodologia con infografia |
| `servicios.php` | 26K | `/servicios/` | Grid de 8 servicios |
| `consultoria-negocio.php` | 20K | `/consultoria-gestion-negocio/` | Consultoria de gestion |

### Child Theme (13 archivos CSS + 1 PHP)

| Archivo | Tamano | Funcion |
|---------|--------|---------|
| `style.css` | 4.6K | Estilos header/menu principal |
| `functions.php` | 4.0K | Enqueue scripts + funciones |
| `proportione-design-system.css` | 20K | Sistema de diseno base |
| `proportione-contrast.css` | 14K | Mejoras de contraste |
| `proportione-corrections.css` | 5.5K | Correcciones varias |
| `proportione-accessibility.css` | 7.3K | Accesibilidad |
| `homepage-nuevo.css` | 8.0K | Estilos homepage |
| `filosofia.css` | 13K | Pagina filosofia |
| `consultoria-gestion.css` | 17K | Consultoria negocio |
| `consultoria-tecnologia.css` | 17K | Consultoria tecnologica |
| `contacto-elementor.css` | 9.2K | Formulario contacto |

### Configuracion .htaccess

```apache
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule ^$ /index-new.php [L]
RewriteRule ^nosotros/?$ /nosotros.php [L]
RewriteRule ^metodologia/?$ /metodologia.php [L]
RewriteRule ^servicios/?$ /servicios.php [L]
RewriteRule ^consultoria-gestion-negocio/?$ /consultoria-negocio.php [L]
</IfModule>
```

---

## 2. ESTRUCTURA DEL MENU ACTUAL

### Menu Principal (18 items)

```
Servicios (/servicios/) [ID: 2904]
├── Consultoria de negocio → /consultoria-gestion-negocio/ [ID: 2921]
├── Consultoria tecnologica → /consultoria-de-tecnologia/ [ID: 2922]
├── Estrategia digital → /estrategia-digital-.../ [ID: 2923]
├── Programas one-to-one → /programas-one-to-one-.../ [ID: 2924]
├── Transformacion digital → /estrategia-transformacion-digital/ [ID: 2925]
├── Inteligencia Artificial → /inteligencia-artificial-generativa/ [ID: 2926]
├── eCommerce & Retail → /estrategia-omnicanal-.../ [ID: 2927]
└── Organizacion Agile → /organizacion-agile-.../ [ID: 2928]

Nosotros (/nosotros/) [ID: 2806]
├── Filosofia → /filosofia/ [ID: 2916]
├── Metodologia → /metodologia/ [ID: 2918]
├── Mayte Tortosa → /mayte-tortosa/ [ID: 2919]
└── Javier Cuervo → /javier-cuervo/ [ID: 2920]

Recursos (#) [ID: 2896]
├── Blog → /blog/ [ID: 2929]
└── Investigacion → /investigacion/ [ID: 2930]

Contacto → /contacto/ [ID: 2825]
```

**Nota:** Submenu "Equipo" eliminado. Las URLs son completas (no relativas a staging).

---

## 3. IMAGENES UTILIZADAS

| Pagina | Imagen | Uso |
|--------|--------|-----|
| Nosotros | `IMG_1195-scaled.jpg` | Foto Mayte en grid |
| Nosotros | `columpio.jpg` | Foto Javier |
| Mayte Tortosa | `IMG_8119-scaled.jpg` | Foto principal perfil |
| Metodologia | `proportione-framework-vertical-1.png` | Infografia con lightbox |
| Servicios | `IMG_9291-3-scaled.jpg` | Imagen cabecera |
| Consultoria | `IMG_8462-2-scaled.jpg` | Imagen cabecera |
| Consultoria | `IMG_8407.jpg` | Estrategia global |
| Footer | `proportione-nbg2.png` | Logo Proportione (todas las paginas) |

---

## 4. FORMULARIO DE CONTACTO (Elementor)

**Pagina ID:** 339
**Email destino:** mayte.tortosa@proportione.com

| Campo | Tipo | Obligatorio |
|-------|------|-------------|
| Nombre completo | text | Si |
| Email | email | Si |
| Telefono | tel | No |
| Empresa | text | No |
| Mensaje | textarea | Si |
| Politica Privacidad | acceptance | Si |
| Comunicaciones comerciales | acceptance | No |

**PENDIENTE:** Configurar reCAPTCHA en WP Admin > Elementor > Integrations

---

## 5. TAREAS COMPLETADAS (Sesion 30 enero 2026)

### Header y Navegacion
- [x] Textos header mas grandes (Oswald 26px)
- [x] Submenus enlazados con URLs completas (18 items)
- [x] Filosofia enlazada a /filosofia/
- [x] Mayte Tortosa enlazada a /mayte-tortosa/
- [x] Metodologia enlazada a /metodologia/
- [x] Submenu "Equipo" eliminado

### Pagina Mayte Tortosa (/mayte-tortosa/)
- [x] Titulo solo "CEO" (sin Chief People Officer)
- [x] Foto IMG_8119-scaled.jpg
- [x] Trayectoria sin anos (solo empresas y roles)
- [x] Idreal sin fechas incorrectas

### Pagina Nosotros (/nosotros/)
- [x] Foto de Mayte = IMG_1195-scaled.jpg

### Pagina Metodologia (/metodologia/)
- [x] Titulo "Nuestra Metodologia" en blanco
- [x] Infografia Framework con lightbox

### Pagina Servicios (/servicios/)
- [x] Foto cabecera horizontal
- [x] H1 en blanco

### Pagina Consultoria Negocio (/consultoria-gestion-negocio/)
- [x] Foto Estrategia global correcta
- [x] Foto cabecera horizontal
- [x] Texto cabecera en blanco

### Pagina Contacto (/contacto/)
- [x] Titulo "Contacto" en blanco
- [x] Formulario Elementor (reemplazo HubSpot)
- [x] Email a mayte.tortosa@proportione.com
- [x] Checkboxes RGPD

### Footer
- [x] Logo cargando correctamente

---

## 6. URLS HARDCODEADAS

**Resultado de auditoria:** NO se encontraron URLs hardcodeadas a `staging19.proportione.com` en los archivos PHP ni CSS del child theme.

Las URLs usan formato relativo o funciones dinamicas de WordPress.

---

## 7. UBICACIONES DE BACKUP

### Servidor Staging
```
/home/customer/www/staging19.proportione.com/backups/2026-01-30-final/
├── index-new.php
├── nosotros.php
├── metodologia.php
├── servicios.php
├── consultoria-negocio.php
├── .htaccess
└── hello-elementor-child/
```

### Local
```
/Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione/staging19-backup/
├── pages/                    # Archivos PHP + .htaccess
├── hello-elementor-child/    # Theme completo
├── content/                  # Exportaciones de posts
│   ├── mayte-2802.html
│   └── contacto-339-elementor.json
└── menu-principal.json       # Exportacion del menu
```

---

## 8. PREPARACION PARA PRODUCCION

### Pasos para migrar a proportione.com

1. Copiar archivos PHP al directorio raiz de produccion
2. Copiar child theme a /wp-content/themes/
3. Actualizar .htaccess con las reglas de rewrite
4. Recrear menu manualmente (los IDs seran diferentes)
5. Verificar imagenes en /uploads/2026/01/
6. Configurar reCAPTCHA en Elementor > Integrations
7. Limpiar cache con wp cache flush + SG Optimizer

### Checklist de verificacion post-deploy

- [ ] Homepage: slider, secciones, footer
- [ ] Nosotros: fotos Mayte/Javier, banner
- [ ] Metodologia: titulo blanco, infografia con lightbox
- [ ] Servicios: imagen cabecera, titulo blanco
- [ ] Consultoria negocio: imagenes correctas
- [ ] Contacto: formulario funcional
- [ ] Menu: todos los enlaces funcionan
- [ ] Responsive: verificar en movil

---

## 9. PALETA DE COLORES

| Color | Codigo | Uso |
|-------|--------|-----|
| Granate | `#5F322F` | Titulos, fondos oscuros |
| Verde | `#6E8157` | CTAs, destacados |
| Verde medio | `#566E30` | Hover states |
| Crema | `#F5F0E6` | Fondos alternos |
| Blanco | `#FFFFFF` | Fondos principales |

---

## 10. TIPOGRAFIAS

| Fuente | Uso | Tamano header |
|--------|-----|---------------|
| Oswald | Titulos, menu | 26px |
| Raleway | Cuerpo de texto | 16px |

---

## 11. COMANDOS UTILES

```bash
# Verificar archivos en servidor
ssh siteground-proportione "ls -la /home/customer/www/staging19.proportione.com/public_html/*.php"

# Verificar menu
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && wp menu item list menu-principal"

# Limpiar cache
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && wp cache flush"

# Ver theme activo
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && wp theme list --status=active"

# Exportar menu
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && wp menu item list menu-principal --format=json"
```

---

**Ultima actualizacion:** 30 enero 2026 19:10 CET

### Cambios recientes:
- Logo footer actualizado a `proportione-nbg2.png` en todas las paginas
- H1 de /servicios/ forzado a blanco con !important
