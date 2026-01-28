#!/bin/bash
# Deploy child theme to SiteGround Staging
# Uso: ./projects/proportione/scripts/deploy-staging.sh
# O desde el directorio del proyecto: ./scripts/deploy-staging.sh

set -e

# Detectar directorio del script
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

# Configuración
LOCAL_THEME="$PROJECT_DIR/wp-content/themes/"
REMOTE_HOST="siteground-proportione"
REMOTE_PATH="/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/"

echo "🚀 Deploying to staging19.proportione.com..."
echo "   From: $LOCAL_THEME"
echo "   To:   $REMOTE_PATH"
echo ""

# Listar temas locales
echo "📁 Temas locales a sincronizar:"
ls -la "$LOCAL_THEME"
echo ""

# Dry run primero para mostrar qué se va a sincronizar
echo "📋 Cambios a sincronizar:"
rsync -avzn "$LOCAL_THEME" "$REMOTE_HOST:$REMOTE_PATH"

echo ""
read -p "¿Continuar con el deploy? (s/n) " -n 1 -r
echo ""

if [[ $REPLY =~ ^[Ss]$ ]]; then
    rsync -avz "$LOCAL_THEME" "$REMOTE_HOST:$REMOTE_PATH"
    echo ""
    echo "✅ Deploy completado!"
    echo "   Verifica en: https://staging19.proportione.com/"
else
    echo "❌ Deploy cancelado"
fi
