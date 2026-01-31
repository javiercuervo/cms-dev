# Guía de Rollback - Menú v2.0

## Cuándo usar esta guía

Utiliza estos procedimientos si después del deploy del menú:
- Los dropdowns no funcionan
- Hay errores de JavaScript en consola
- El menú móvil no se abre
- Enlaces rotos o 404
- El botón CTA no aparece verde

---

## Método 1: Restaurar desde SiteGround (Recomendado)

1. Acceder a SiteGround Site Tools
2. Ir a **Security → Backups**
3. Seleccionar backup anterior al deploy (antes del 30 enero 2026)
4. Click en **Restore**
5. Esperar confirmación

---

## Método 2: Restaurar Base de Datos vía WP-CLI

```bash
# Conectar al servidor
ssh siteground-proportione

# Ir al directorio de WordPress
cd /home/customer/www/staging19.proportione.com/public_html

# Listar backups disponibles
ls -la /home/customer/backups/staging-pre-menu-*.sql

# Restaurar el backup más reciente
wp db import /home/customer/backups/staging-pre-menu-YYYYMMDD-HHMMSS.sql

# Limpiar cachés
wp cache flush
wp transient delete --all
wp sg purge 2>/dev/null || true
```

---

## Método 3: Restaurar solo el CSS

Si solo fallan los estilos, restaurar CSS sin tocar la BD:

```bash
# Desde local, restaurar CSS de producción
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && \
  wp option get stylesheet"

# Copiar CSS de backup o de producción
scp siteground-proportione:/home/customer/www/proportione.com/public_html/wp-content/themes/hello-elementor-child/style.css \
    ./staging19-backup/hello-elementor-child/style.css.bak

# Si tienes backup local, subir:
scp ./staging19-backup/hello-elementor-child/style.css.bak \
    siteground-proportione:/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/hello-elementor-child/style.css
```

---

## Método 4: Revertir estructura de menú manualmente

Si solo la estructura del menú está mal pero el CSS funciona:

```bash
ssh siteground-proportione "cd /home/customer/www/staging19.proportione.com/public_html && wp eval '
// Resetear todos los items a raíz (sin parent)
\$menu = wp_get_nav_menu_object(\"menu-principal\");
\$items = wp_get_nav_menu_items(\$menu->term_id);

foreach (\$items as \$item) {
    update_post_meta(\$item->ID, \"_menu_item_menu_item_parent\", 0);
}

echo \"Todos los items reseteados a nivel raíz\n\";
'"
```

---

## Verificación post-rollback

Después de cualquier rollback, verificar:

1. [ ] Menú aparece correctamente
2. [ ] Todos los enlaces funcionan
3. [ ] Sin errores en consola del navegador
4. [ ] Menú móvil funciona
5. [ ] Cache limpia (probar en incógnito)

---

## Contacto de emergencia

Si el rollback falla:
1. Contactar soporte de SiteGround
2. Revisar logs: `wp-content/debug.log`

---

## Backups automáticos

Los backups se crean automáticamente antes de cada deploy:
- **BD**: `/home/customer/backups/staging-pre-menu-YYYYMMDD-HHMMSS.sql`
- **Menú JSON**: `/tmp/menu-backup-YYYYMMDD-HHMMSS.json`

Para listar todos los backups:
```bash
ssh siteground-proportione "ls -la /home/customer/backups/staging-pre-menu-*.sql"
```
