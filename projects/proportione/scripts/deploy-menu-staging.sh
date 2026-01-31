#!/bin/bash
# ==============================================================================
# deploy-menu-staging.sh - Deploy completo del menú a staging
# ==============================================================================
# Uso: ./scripts/deploy-menu-staging.sh
# Descripción: Ejecuta backup, sube CSS, aplica menú y purga cachés
# ==============================================================================

set -e

# Detectar directorio del script
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

# Configuracion
REMOTE="siteground-proportione"
WP_PATH="/home/customer/www/staging19.proportione.com/public_html"
BACKUP_DIR="/home/customer/backups"
LOCAL_CSS="$PROJECT_DIR/staging19-backup/hello-elementor-child/style.css"
REMOTE_CSS_PATH="$WP_PATH/wp-content/themes/hello-elementor-child/style.css"
DATE_STAMP=$(date +%Y%m%d-%H%M%S)

echo ""
echo "=============================================="
echo "  DEPLOY MENU - Staging Proportione"
echo "=============================================="
echo "  Fecha: $(date '+%Y-%m-%d %H:%M:%S')"
echo "=============================================="
echo ""

# Verificar archivos locales
echo "[PRE] Verificando archivos locales..."
if [ ! -f "$LOCAL_CSS" ]; then
    echo "ERROR: No se encuentra $LOCAL_CSS"
    exit 1
fi
echo "      CSS encontrado: $LOCAL_CSS"
echo ""

# ============================================
# PASO 1: BACKUP DE BASE DE DATOS
# ============================================
echo "=============================================="
echo "[1/5] BACKUP de base de datos"
echo "=============================================="
echo ""
ssh $REMOTE "mkdir -p $BACKUP_DIR && cd $WP_PATH && wp db export $BACKUP_DIR/staging-pre-menu-$DATE_STAMP.sql 2>/dev/null"
echo "      Backup creado: $BACKUP_DIR/staging-pre-menu-$DATE_STAMP.sql"
echo ""

# ============================================
# PASO 2: BACKUP DEL MENU ACTUAL
# ============================================
echo "=============================================="
echo "[2/5] BACKUP del menu actual (JSON)"
echo "=============================================="
echo ""
ssh $REMOTE "cd $WP_PATH && wp menu list --format=json > /tmp/menu-backup-$DATE_STAMP.json 2>/dev/null"
echo "      Menu exportado: /tmp/menu-backup-$DATE_STAMP.json"
echo ""

# ============================================
# PASO 3: SUBIR CSS
# ============================================
echo "=============================================="
echo "[3/5] SUBIR CSS actualizado"
echo "=============================================="
echo ""
scp "$LOCAL_CSS" "$REMOTE:$REMOTE_CSS_PATH"
echo "      CSS subido exitosamente"
echo ""

# ============================================
# PASO 4: APLICAR MENU
# ============================================
echo "=============================================="
echo "[4/5] APLICAR estructura de menu"
echo "=============================================="
echo ""
bash "$SCRIPT_DIR/update-menu.sh"
echo ""

# ============================================
# PASO 5: PURGAR CACHES
# ============================================
echo "=============================================="
echo "[5/5] PURGAR caches"
echo "=============================================="
echo ""
ssh $REMOTE "cd $WP_PATH && wp cache flush 2>/dev/null && wp transient delete --all 2>/dev/null"
echo "      WordPress cache: purgada"
ssh $REMOTE "cd $WP_PATH && wp sg purge 2>/dev/null || true"
echo "      SiteGround cache: purgada"
echo ""

# ============================================
# RESUMEN
# ============================================
echo "=============================================="
echo "  DEPLOY COMPLETADO"
echo "=============================================="
echo ""
echo "  Backup BD:  $BACKUP_DIR/staging-pre-menu-$DATE_STAMP.sql"
echo "  Backup Menu: /tmp/menu-backup-$DATE_STAMP.json"
echo ""
echo "  VERIFICAR:"
echo "  https://staging19.proportione.com/"
echo ""
echo "  ROLLBACK si falla:"
echo "  ssh $REMOTE \"cd $WP_PATH && wp db import $BACKUP_DIR/staging-pre-menu-$DATE_STAMP.sql\""
echo ""
echo "=============================================="
