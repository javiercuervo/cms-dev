# Documentación del Proyecto

## Índice

- [PLAN.md](./PLAN.md) - Plan completo del flujo de trabajo
- [DEPLOYMENT.md](./DEPLOYMENT.md) - Guía de despliegue
- [CHANGELOG.md](./CHANGELOG.md) - Registro de cambios
- [technical/](./technical/) - Documentación técnica (SiteGround, etc.)

## Arquitectura

### Child Theme: flavor-flavor-flavor

El tema hijo está basado en el tema padre `flavor-flavor-flavor-flavor` y contiene:

- `style.css` - Estilos personalizados y declaración del child theme
- `functions.php` - Funciones PHP personalizadas
- `templates/` - Templates personalizados de WordPress
- `assets/` - CSS, JS e imágenes
- `inc/` - Archivos PHP modulares

### Plugins Propios

Los plugins desarrollados internamente se versionan en `wp-content/plugins/mi-plugin-custom/`.

Los plugins de terceros NO se versionan - se instalan directamente desde el admin de WordPress.
