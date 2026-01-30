#!/bin/bash
# Script de migración Staging → Producción
# Proportione - 2026-01-29
#
# USO: ./scripts/migrate-to-production.sh
#
# IMPORTANTE: Revisar y ajustar las variables antes de ejecutar

set -e

# ============================================
# CONFIGURACIÓN - AJUSTAR ANTES DE EJECUTAR
# ============================================

STAGING_HOST="siteground-proportione"
STAGING_PATH="/home/customer/www/staging19.proportione.com/public_html"

# AJUSTAR ESTOS VALORES PARA PRODUCCIÓN
PROD_HOST="siteground-proportione"  # Cambiar al alias SSH de producción
PROD_PATH="/home/customer/www/proportione.com/public_html"  # Ajustar path

# IDs en staging
STAGING_HOMEPAGE_ID=2833
STAGING_METODOLOGIA_ID=2800
STAGING_FOOTER_ID=2796
STAGING_HEADER_ID=2795

# IDs en producción - VERIFICAR Y AJUSTAR
PROD_HOMEPAGE_ID=""  # Rellenar después de verificar
PROD_METODOLOGIA_ID=""
PROD_FOOTER_ID=""
PROD_HEADER_ID=""

# Directorio local para exports
EXPORT_DIR="/tmp/proportione-migration-$(date +%Y%m%d-%H%M%S)"

# ============================================
# FUNCIONES
# ============================================

log() {
    echo "[$(date +%H:%M:%S)] $1"
}

error() {
    echo "[ERROR] $1" >&2
    exit 1
}

check_config() {
    if [ -z "$PROD_HOMEPAGE_ID" ]; then
        error "PROD_HOMEPAGE_ID no está configurado. Ejecuta primero: ./scripts/migrate-to-production.sh --check-prod-ids"
    fi
}

# ============================================
# COMANDOS
# ============================================

case "${1:-}" in
    --check-prod-ids)
        log "Verificando IDs en producción..."
        echo ""
        echo "=== Páginas en producción ==="
        ssh $PROD_HOST "cd $PROD_PATH && wp post list --post_type=page --fields=ID,post_title,post_name --format=table"
        echo ""
        echo "=== Templates Elementor en producción ==="
        ssh $PROD_HOST "cd $PROD_PATH && wp post list --post_type=elementor_library --fields=ID,post_title --format=table"
        echo ""
        echo "Actualiza los IDs de producción en este script antes de migrar."
        ;;

    --backup-prod)
        log "Creando backup de producción..."
        mkdir -p $EXPORT_DIR/backup

        ssh $PROD_HOST "cd $PROD_PATH && wp db export /tmp/backup-prod-$(date +%Y%m%d).sql"
        scp $PROD_HOST:/tmp/backup-prod-*.sql $EXPORT_DIR/backup/

        log "Backup guardado en: $EXPORT_DIR/backup/"
        ;;

    --export-staging)
        log "Exportando contenido de staging..."
        mkdir -p $EXPORT_DIR

        # Exportar Elementor data
        log "Exportando Homepage..."
        ssh $STAGING_HOST "cd $STAGING_PATH && wp post meta get $STAGING_HOMEPAGE_ID _elementor_data" > $EXPORT_DIR/homepage.json

        log "Exportando Metodología..."
        ssh $STAGING_HOST "cd $STAGING_PATH && wp post meta get $STAGING_METODOLOGIA_ID _elementor_data" > $EXPORT_DIR/metodologia.json

        log "Exportando Footer..."
        ssh $STAGING_HOST "cd $STAGING_PATH && wp post meta get $STAGING_FOOTER_ID _elementor_data" > $EXPORT_DIR/footer.json

        log "Exportando Header..."
        ssh $STAGING_HOST "cd $STAGING_PATH && wp post meta get $STAGING_HEADER_ID _elementor_data" > $EXPORT_DIR/header.json

        # Exportar uploads 2026
        log "Empaquetando uploads 2026..."
        ssh $STAGING_HOST "cd $STAGING_PATH/wp-content/uploads && tar -czf /tmp/uploads-2026.tar.gz 2026/"
        scp $STAGING_HOST:/tmp/uploads-2026.tar.gz $EXPORT_DIR/

        log "Exports guardados en: $EXPORT_DIR"
        ls -la $EXPORT_DIR
        ;;

    --sync-uploads)
        log "Sincronizando uploads a producción..."

        if [ ! -f "$EXPORT_DIR/uploads-2026.tar.gz" ]; then
            error "Ejecuta primero: ./scripts/migrate-to-production.sh --export-staging"
        fi

        scp $EXPORT_DIR/uploads-2026.tar.gz $PROD_HOST:/tmp/
        ssh $PROD_HOST "cd $PROD_PATH/wp-content/uploads && tar -xzf /tmp/uploads-2026.tar.gz"

        log "Uploads sincronizados"
        ;;

    --import-prod)
        check_config
        log "Importando contenido a producción..."

        if [ ! -f "$EXPORT_DIR/homepage.json" ]; then
            error "Ejecuta primero: ./scripts/migrate-to-production.sh --export-staging"
        fi

        # Copiar JSONs a producción
        scp $EXPORT_DIR/*.json $PROD_HOST:/tmp/

        # Importar Elementor data
        log "Importando Homepage..."
        ssh $PROD_HOST "cd $PROD_PATH && wp post meta update $PROD_HOMEPAGE_ID _elementor_data \"\$(cat /tmp/homepage.json)\""

        log "Importando Metodología..."
        ssh $PROD_HOST "cd $PROD_PATH && wp post meta update $PROD_METODOLOGIA_ID _elementor_data \"\$(cat /tmp/metodologia.json)\""

        log "Importando Footer..."
        ssh $PROD_HOST "cd $PROD_PATH && wp post meta update $PROD_FOOTER_ID _elementor_data \"\$(cat /tmp/footer.json)\""

        log "Importando Header..."
        ssh $PROD_HOST "cd $PROD_PATH && wp post meta update $PROD_HEADER_ID _elementor_data \"\$(cat /tmp/header.json)\""

        # Regenerar CSS
        log "Regenerando CSS de Elementor..."
        ssh $PROD_HOST "cd $PROD_PATH && wp elementor flush-css && wp cache flush"

        log "¡Migración completada!"
        ;;

    --full-migration)
        log "Ejecutando migración completa..."
        $0 --backup-prod
        $0 --export-staging
        $0 --sync-uploads
        $0 --import-prod
        log "¡Migración completa finalizada!"
        ;;

    *)
        echo "Script de migración Staging → Producción"
        echo ""
        echo "Uso: $0 [comando]"
        echo ""
        echo "Comandos:"
        echo "  --check-prod-ids    Verificar IDs de páginas en producción"
        echo "  --backup-prod       Crear backup de producción"
        echo "  --export-staging    Exportar contenido de staging"
        echo "  --sync-uploads      Sincronizar uploads a producción"
        echo "  --import-prod       Importar contenido a producción"
        echo "  --full-migration    Ejecutar migración completa"
        echo ""
        echo "Orden recomendado:"
        echo "  1. $0 --check-prod-ids"
        echo "  2. Editar este script con los IDs de producción"
        echo "  3. $0 --backup-prod"
        echo "  4. $0 --export-staging"
        echo "  5. $0 --sync-uploads"
        echo "  6. $0 --import-prod"
        ;;
esac
