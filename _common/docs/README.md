# Documentación Común WordPress

Recursos compartidos para todos los proyectos WordPress.

## Contenido

| Documento | Descripción |
|-----------|-------------|
| **[reglas-staging-produccion.md](reglas-staging-produccion.md)** | **REGLA FUNDAMENTAL: Solo staging, nunca producción** |
| [siteground-git.md](siteground-git.md) | Guía completa de Git con SiteGround |
| [wordpress-api-claude-code.md](wordpress-api-claude-code.md) | WordPress API + Claude Code |
| [elementor-claude-guide.md](elementor-claude-guide.md) | Guía de Elementor Pro para Claude Code |
| [workflow-framer-elementor.md](workflow-framer-elementor.md) | Workflow Framer → Elementor |

## Figma + Magician (Stack de diseño)

Documentación especializada para el flujo Figma → Claude Code → WordPress/Elementor.

| Documento | Descripción |
|-----------|-------------|
| [Figma Claude/figma-magician.md](Figma%20Claude/figma-magician.md) | **Documentación operativa de Magician**: capacidades (Magic Icon/Copy/Image), flujos de trabajo, normalización de assets, seguridad, troubleshooting |
| [Figma Claude/figma-claude-wordpress-guide.md](Figma%20Claude/figma-claude-wordpress-guide.md) | **Integración Figma + Claude Code + WordPress**: setup MCP, extracción de tokens, workflow operativo, limitaciones y workarounds |
| [Figma Claude/templates-figma claude.md](Figma%20Claude/templates-figma%20claude.md) | **Templates y ejemplos**: tokens.json, CSS variables, prompts para Claude Code, scripts WP-CLI, checklists QA |

## Uso

Esta documentación aplica a todos los proyectos en `projects/`.

Para documentación específica de un proyecto, ver `projects/[nombre]/docs/`.

## Cómo añadir documentación

1. Crear archivo `.md` en esta carpeta
2. Actualizar esta tabla de contenidos
3. Commit con mensaje: `docs: añade [nombre del documento]`
