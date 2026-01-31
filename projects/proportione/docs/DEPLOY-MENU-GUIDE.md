# Guía de Deploy - Menú de Navegación v2.0

**Fecha de lanzamiento:** 31 enero 2026
**Autor:** Javier Cuervo

---

## Resumen de Cambios

### Antes (17 items)
```
Home | Servicios | Consultoría | Tecnología | IA | Nosotros | Metodología |
Mayte | Javier | Perspectivas | Blog | Investigación | Filosofía | Recursos | Contacto | ...
```

### Después (4 items con dropdowns)
```
SERVICIOS ▾ | NOSOTROS ▾ | BLOG ▾ | [CONTACTO]
```

---

## Estructura del Nuevo Menú

| Item Principal | Sub-items |
|----------------|-----------|
| **Servicios** | Consultoría de Negocio, Estrategia de Innovación, IA, eCommerce & Retail |
| **Nosotros** | Metodología, Mayte Tortosa, Javier Cuervo |
| **Insights** | Blog, Investigación |
| **Contacto** | (CTA - sin dropdown) |

> **Nota:** Eliminados temporalmente por URLs 404: Transformación Digital, Organización Agile

---

## Archivos Involucrados

| Archivo | Descripción |
|---------|-------------|
| `staging19-backup/hello-elementor-child/style.css` | Estilos del menú y CTA |
| `staging19-backup/menu-principal.json` | Estructura JSON del menú |
| `scripts/update-menu.sh` | Script para aplicar menú via WP-CLI |
| `scripts/deploy-menu-staging.sh` | Script de deploy completo |
| `scripts/test-menu-urls.sh` | Test de URLs del menú |
| `scripts/capture-staging.js` | Captura de screenshots |

---

## Deploy a Staging

### Opción 1: Deploy Completo (Recomendado)

```bash
cd /Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione
./scripts/deploy-menu-staging.sh
```

Este script ejecuta:
1. Backup de BD
2. Backup del menú actual
3. Sube CSS actualizado
4. Aplica estructura de menú
5. Purga cachés

### Opción 2: Paso a Paso

```bash
# 1. Backup
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && \
  wp db export /home/customer/backups/staging-pre-menu-$(date +%Y%m%d).sql"

# 2. Subir CSS
scp staging19-backup/hello-elementor-child/style.css \
  siteground-proportione:/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/hello-elementor-child/

# 3. Aplicar menú
./scripts/update-menu.sh

# 4. Purgar cachés
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && \
  wp cache flush && wp transient delete --all && wp sg purge 2>/dev/null || true"
```

---

## Testing

### Test de URLs

```bash
./scripts/test-menu-urls.sh
```

### Captura de Screenshots

```bash
node scripts/capture-staging.js
```

Screenshots se guardan en `figma-assets/capture-YYYY-MM-DD-HH-MM-SS/`

### Checklist Manual

Ver documento completo: `docs/TESTING-MENU-CHECKLIST.md`

**Quick check:**
1. [ ] Abrir https://staging19.proportione.com/ en incógnito
2. [ ] Verificar 4 items de menú
3. [ ] Hover en Servicios → dropdown con 6 items
4. [ ] Hover en Nosotros → dropdown con 4 items
5. [ ] Hover en Blog → dropdown con 2 items
6. [ ] Contacto → botón verde, va a /contacto/
7. [ ] Probar en móvil (hamburger menu)

---

## Deploy a Producción

### Opción A: SiteGround Staging Tool

1. Ir a SiteGround Site Tools
2. **WordPress** → **Staging**
3. Seleccionar staging19
4. Click **"Push to Live"**
5. Confirmar

### Opción B: Migración Manual

```bash
./scripts/migrate-to-production.sh --full-migration
```

### Post-Deploy

```bash
# Limpiar caché de producción
ssh siteground-proportione "cd /home/customer/www/proportione.com/public_html && \
  wp cache flush && wp sg purge 2>/dev/null || true"

# Verificar
open https://proportione.com/
```

---

## Rollback

Ver guía completa: `docs/ROLLBACK-MENU.md`

**Quick rollback:**

```bash
# Restaurar BD desde backup
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && \
  wp db import /home/customer/backups/staging-pre-menu-YYYYMMDD-HHMMSS.sql"

# Limpiar caché
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && \
  wp cache flush && wp sg purge 2>/dev/null || true"
```

---

## Comandos de Referencia Rápida

```bash
# Ir al proyecto
cd /Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione

# Ver estado del menú actual
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && \
  wp menu list && echo '' && wp menu item list menu-principal --fields=ID,title,url,parent"

# Deploy completo
./scripts/deploy-menu-staging.sh

# Solo actualizar menú
./scripts/update-menu.sh

# Solo subir CSS
scp staging19-backup/hello-elementor-child/style.css \
  siteground-proportione:/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/hello-elementor-child/

# Test URLs
./scripts/test-menu-urls.sh

# Screenshots
node scripts/capture-staging.js

# Ver logs de WordPress
ssh siteground-proportione "tail -50 /home/customer/www/staging19.proportione.com/public_html/wp-content/debug.log"
```

---

## Historial de Versiones

| Versión | Fecha | Cambios |
|---------|-------|---------|
| v2.0 | 2026-01-30 | Menú jerárquico con 4 items + dropdowns |
| v1.0 | 2025-xx-xx | Menú plano con 17 items |
