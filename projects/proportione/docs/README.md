# Documentación del Proyecto Proportione

## Índice

### Planes y flujos
- [PLAN.md](./PLAN.md) - Plan completo del flujo de trabajo Git + SiteGround
- [PLAN-FIGMA-STAGING.md](./PLAN-FIGMA-STAGING.md) - **Plan Figma + Magician para staging19**
- [FIGMA-SETUP.md](./FIGMA-SETUP.md) - **Setup Figma + MCP + tokens** (guía operativa)
- [DEPLOYMENT.md](./DEPLOYMENT.md) - Guía de despliegue
- [CHANGELOG.md](./CHANGELOG.md) - Registro de cambios

### Investigación (Core de Proportione)
- [investigacion_proportione.md](./investigacion_proportione.md) - **Líneas de investigación, hallazgos y publicaciones**
  - 7 líneas activas: BI para PYMEs, datos de búsqueda, LLMs/agentes, RGPD, impacto social
  - Publicaciones con DOI (Zenodo)
  - Investigador principal: Javier Cuervo (ORCID: 0009-0006-7134-2894)
  - Marco: Doctorado en Innovación Empresarial (Universidade de Aveiro)

### Auditorías y revisiones
- [AUDITORIA-COLORES.md](./AUDITORIA-COLORES.md) - Paleta de colores
- [AUDITORIA-TIPOGRAFIA.md](./AUDITORIA-TIPOGRAFIA.md) - Sistema tipográfico
- [AUDITORIA-ACCESIBILIDAD-WCAG.md](./AUDITORIA-ACCESIBILIDAD-WCAG.md) - Accesibilidad
- [IDENTIDAD-VISUAL.md](./IDENTIDAD-VISUAL.md) - Brand guidelines
- [REVISION-*.md](.) - Estado de cada página

### Técnico
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
