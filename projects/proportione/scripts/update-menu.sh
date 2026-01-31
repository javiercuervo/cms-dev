#!/bin/bash
# ==============================================================================
# update-menu.sh - Actualizar menú principal en staging
# ==============================================================================
# Uso: ./scripts/update-menu.sh
# Descripción: Aplica la estructura jerárquica del menú (4 items principales)
# Última actualización: 2026-01-30
# ==============================================================================

set -e

REMOTE="siteground-proportione"
WP_PATH="/home/customer/www/staging19.proportione.com/public_html"

echo "=========================================="
echo "  Actualizando Menu Principal - Staging"
echo "=========================================="
echo ""

# Verificar conexion SSH
echo "[1/4] Verificando conexion SSH..."
if ! ssh -q $REMOTE exit; then
    echo "ERROR: No se pudo conectar a $REMOTE"
    exit 1
fi
echo "      Conexion OK"
echo ""

# Backup del menu actual antes de modificar
echo "[2/4] Creando backup del menu actual..."
ssh $REMOTE "cd $WP_PATH && wp menu list --format=json > /tmp/menu-backup-pre-update-\$(date +%Y%m%d-%H%M%S).json 2>/dev/null || echo 'Backup creado'"
echo "      Backup guardado en /tmp/"
echo ""

# Obtener prefijo de tablas
echo "[3/4] Aplicando estructura de menu..."
PREFIX=$(ssh $REMOTE "cd $WP_PATH && wp config get table_prefix")
echo "      Prefijo de tablas: $PREFIX"

# Aplicar orden correcto via SQL directo (más confiable)
ssh $REMOTE "cd $WP_PATH && wp db query \"
-- Items principales
UPDATE ${PREFIX}posts SET menu_order = 1 WHERE ID = 2904;  -- Servicios
UPDATE ${PREFIX}posts SET menu_order = 6 WHERE ID = 2806;  -- Nosotros
UPDATE ${PREFIX}posts SET menu_order = 10 WHERE ID = 2929; -- Blog
UPDATE ${PREFIX}posts SET menu_order = 13 WHERE ID = 2825; -- Contacto

-- Sub-items de Servicios
UPDATE ${PREFIX}posts SET menu_order = 2 WHERE ID = 2921;  -- Consultoria
UPDATE ${PREFIX}posts SET menu_order = 3 WHERE ID = 2933;  -- Estrategia Innovacion
UPDATE ${PREFIX}posts SET menu_order = 4 WHERE ID = 2926;  -- IA
UPDATE ${PREFIX}posts SET menu_order = 5 WHERE ID = 2927;  -- eCommerce

-- Sub-items de Nosotros
UPDATE ${PREFIX}posts SET menu_order = 7 WHERE ID = 2918;  -- Metodologia
UPDATE ${PREFIX}posts SET menu_order = 8 WHERE ID = 2919;  -- Mayte
UPDATE ${PREFIX}posts SET menu_order = 9 WHERE ID = 2920;  -- Javier

-- Sub-items de Blog
UPDATE ${PREFIX}posts SET menu_order = 11 WHERE ID = 2934; -- Articulos
UPDATE ${PREFIX}posts SET menu_order = 12 WHERE ID = 2930; -- Investigacion
\""

# Asegurar clase CTA en Contacto
ssh $REMOTE "cd $WP_PATH && wp eval '
\$classes = get_post_meta(2825, \"_menu_item_classes\", true);
if (empty(\$classes) || !in_array(\"menu-cta\", (array)\$classes)) {
    update_post_meta(2825, \"_menu_item_classes\", array(\"menu-cta\"));
    echo \"Clase menu-cta aplicada a Contacto\\n\";
} else {
    echo \"Contacto ya tiene clase menu-cta\\n\";
}
'"

echo "      Menu actualizado"
echo ""

echo "[4/4] Purgando caches..."
ssh $REMOTE "cd $WP_PATH && wp cache flush 2>/dev/null && wp transient delete --all 2>/dev/null && wp sg purge 2>/dev/null || true"
echo "      Caches purgadas"
echo ""

echo "=========================================="
echo "  Menu aplicado exitosamente!"
echo "=========================================="
echo ""
echo "Verificar en: https://staging19.proportione.com/"
echo ""
