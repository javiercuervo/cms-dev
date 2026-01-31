# Guía de Despliegue a Producción - 2026-01-31

## Resumen de Cambios

Este release incluye:
1. **Plantillas de Blog por Categoría** - 4 estilos CSS diferenciados
2. **Design System** - Contraste, correcciones, accesibilidad
3. **Menú v2.0** - 4 items principales con dropdowns

## Pre-requisitos

- [ ] Backup de producción en SiteGround
- [ ] Verificar que staging19.proportione.com funciona correctamente

## Archivos a Subir a Producción

### 1. Tema Hijo (SFTP o File Manager)
Subir a `/public_html/wp-content/themes/hello-elementor-child/`:

```
blog-ia-generativa.css
blog-estrategia-digital.css
blog-personas-tecnologia.css
blog-generic.css
proportione-design-system.css
proportione-contrast.css
proportione-corrections.css
proportione-accessibility.css
homepage-nuevo.css
functions.php
style.css
```

### 2. Configuración en Elementor (Manual)

1. Ir a **Elementor > Templates > Theme Builder**
2. Duplicar `Blog Single Template` (ID 2798) 3 veces
3. Renombrar a:
   - `Blog Single - IA Generativa`
   - `Blog Single - Estrategia Digital`
   - `Blog Single - Personas y Tecnología`
4. Configurar Display Conditions:
   - IA Generativa → Posts in Category: ia-generativa
   - Estrategia Digital → Posts in Category: estrategia-digital
   - Personas y Tecnología → Posts in Category: personas-y-tecnologia
   - Original → All Singular Posts (menor prioridad)

## Post-Despliegue

```bash
# Conectar por SSH y limpiar caché
wp cache flush
wp elementor flush_css
```

O desde WordPress Admin:
1. **Elementor > Tools > Regenerate CSS**
2. **SG Optimizer > Purge Cache**

## Verificación

Probar estos posts:
- IA Generativa: `/ni-gpt-ni-gemini/`
- Estrategia Digital: buscar post con esta categoría
- Personas y Tecnología: buscar post con esta categoría
- Genérica: post de Ciberseguridad o SEO

## Rollback

Si algo falla:
1. Restaurar backup desde SiteGround Site Tools
2. O revertir archivos desde git tag anterior: `v2026.01.30-staging`

## Tag de Referencia

```
git checkout v2026.01.31-staging
```
