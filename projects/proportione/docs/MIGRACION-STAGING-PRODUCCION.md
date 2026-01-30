# Migración Staging → Producción - Proportione

> Documento generado: 2026-01-29
> Staging: staging19.proportione.com
> Producción: proportione.com

---

## Resumen de cambios en Staging

### Páginas modificadas

| ID | Página | Slug | Estado |
|----|--------|------|--------|
| 2833 | Homepage 2026 | / | Modificada con Elementor |
| 2800 | Metodología | /metodologia/ | Rediseñada completa |

### Templates Elementor

| ID | Tipo | Nombre | Condición |
|----|------|--------|-----------|
| 2795 | Header | Header Proportione | include/general |
| 2796 | Footer | Footer Proportione | include/general |
| 2797 | Archive | Archive Proportione | include/archive/post |
| 2798 | Single | Single Proportione | include/singular/post |

### Imágenes nuevas subidas (uploads/2026/01/)

Verificar con:
```bash
ssh siteground-proportione 'ls -la /home/customer/www/staging19.proportione.com/public_html/wp-content/uploads/2026/01/'
```

Imágenes usadas en las páginas:
- ID 2953: IMG_8407-1.jpg (Sala reuniones - CTA homepage)
- ID 1886: Logo Proportione (footer)

---

## Script de Migración

### Paso 1: Backup de producción (OBLIGATORIO)

```bash
#!/bin/bash
# backup-produccion.sh

PROD_HOST="siteground-proportione-prod"  # Ajustar alias SSH
BACKUP_DIR="/tmp/proportione-backup-$(date +%Y%m%d)"

mkdir -p $BACKUP_DIR

# Backup base de datos
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && wp db export /tmp/backup-prod.sql'
scp $PROD_HOST:/tmp/backup-prod.sql $BACKUP_DIR/

# Backup uploads
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && tar -czf /tmp/uploads-backup.tar.gz wp-content/uploads/'
scp $PROD_HOST:/tmp/uploads-backup.tar.gz $BACKUP_DIR/

echo "Backup guardado en: $BACKUP_DIR"
```

### Paso 2: Copiar archivos de uploads

```bash
#!/bin/bash
# sync-uploads.sh

STAGING_HOST="siteground-proportione"
PROD_HOST="siteground-proportione-prod"  # Ajustar

# Copiar carpeta 2026/01 de staging a producción
ssh $STAGING_HOST 'tar -czf /tmp/uploads-2026.tar.gz -C /home/customer/www/staging19.proportione.com/public_html/wp-content/uploads 2026'
scp $STAGING_HOST:/tmp/uploads-2026.tar.gz /tmp/
scp /tmp/uploads-2026.tar.gz $PROD_HOST:/tmp/

ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html/wp-content/uploads && tar -xzf /tmp/uploads-2026.tar.gz'
```

### Paso 3: Exportar contenido de staging

```bash
#!/bin/bash
# export-staging-content.sh

STAGING_HOST="siteground-proportione"

# Exportar páginas específicas
ssh $STAGING_HOST 'cd /home/customer/www/staging19.proportione.com/public_html && wp export --post__in=2833,2800 --filename_format=pages.xml'

# Exportar templates Elementor
ssh $STAGING_HOST 'cd /home/customer/www/staging19.proportione.com/public_html && wp export --post_type=elementor_library --filename_format=elementor-templates.xml'

# Exportar attachments nuevos (2026)
ssh $STAGING_HOST 'cd /home/customer/www/staging19.proportione.com/public_html && wp export --post_type=attachment --start_date=2026-01-01 --filename_format=attachments-2026.xml'

# Descargar exports
scp $STAGING_HOST:/home/customer/www/staging19.proportione.com/public_html/*.xml /tmp/proportione-exports/
```

### Paso 4: Importar en producción

```bash
#!/bin/bash
# import-to-production.sh

PROD_HOST="siteground-proportione-prod"  # Ajustar

# Importar en orden
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && wp import /tmp/attachments-2026.xml --authors=skip'
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && wp import /tmp/elementor-templates.xml --authors=skip'
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && wp import /tmp/pages.xml --authors=skip'

# Regenerar CSS de Elementor
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && wp elementor flush-css'

# Limpiar caché
ssh $PROD_HOST 'cd /home/customer/www/proportione.com/public_html && wp cache flush'
```

---

## Alternativa: Migración directa de Elementor data

Si prefieres no usar wp export/import, puedes copiar directamente los meta datos:

```bash
#!/bin/bash
# migrate-elementor-direct.sh

STAGING="siteground-proportione"
STAGING_PATH="/home/customer/www/staging19.proportione.com/public_html"
PROD="siteground-proportione-prod"  # Ajustar
PROD_PATH="/home/customer/www/proportione.com/public_html"

# Exportar Elementor data de staging
ssh $STAGING "cd $STAGING_PATH && wp post meta get 2833 _elementor_data" > /tmp/homepage-elementor.json
ssh $STAGING "cd $STAGING_PATH && wp post meta get 2800 _elementor_data" > /tmp/metodologia-elementor.json
ssh $STAGING "cd $STAGING_PATH && wp post meta get 2796 _elementor_data" > /tmp/footer-elementor.json

# Importar en producción (ajustar IDs según producción)
# NOTA: Los IDs de las páginas en producción pueden ser diferentes
# Verificar primero: ssh $PROD "cd $PROD_PATH && wp post list --post_type=page"

# scp /tmp/*-elementor.json $PROD:/tmp/
# ssh $PROD "cd $PROD_PATH && wp post meta update [PROD_PAGE_ID] _elementor_data \"\$(cat /tmp/homepage-elementor.json)\""
```

---

## IDs importantes

### Staging (staging19.proportione.com)

| Recurso | ID |
|---------|-----|
| Homepage | 2833 |
| Metodología | 2800 |
| Header template | 2795 |
| Footer template | 2796 |
| Logo Proportione | 1886 |
| Imagen CTA (reunión) | 2953 |

### Producción (proportione.com)

> PENDIENTE: Verificar IDs en producción antes de migrar

```bash
# Verificar IDs en producción
ssh siteground-proportione-prod 'cd /path/to/prod && wp post list --post_type=page --fields=ID,post_title,post_name'
ssh siteground-proportione-prod 'cd /path/to/prod && wp post list --post_type=elementor_library --fields=ID,post_title'
```

---

## Design System

| Elemento | Valor |
|----------|-------|
| Granate | #5F322F |
| Verde oliva | #6E8157 |
| Crema | #F5F0E6 |
| Blanco | #FFFFFF |
| Texto oscuro | #333333 |
| Tipografía títulos | Oswald / Bourbon Grotesque |
| Tipografía cuerpo | Raleway |
| Border radius | 6px |

---

## Checklist pre-migración

- [ ] Backup completo de producción
- [ ] Verificar IDs de páginas en producción
- [ ] Verificar que Elementor Pro está activo en producción
- [ ] Verificar tema Hello Elementor en producción
- [ ] Test de staging completado
- [ ] Cliente ha aprobado cambios

## Checklist post-migración

- [ ] Homepage carga correctamente
- [ ] Metodología carga correctamente
- [ ] Footer visible en todas las páginas
- [ ] Header visible en todas las páginas
- [ ] Imágenes cargan correctamente
- [ ] Links funcionan
- [ ] Responsive OK (móvil, tablet)
- [ ] Limpiar caché de CDN/servidor

---

## Contacto

En caso de problemas con la migración, los archivos JSON de Elementor están guardados en:
- `/Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione/elementor-templates/`

