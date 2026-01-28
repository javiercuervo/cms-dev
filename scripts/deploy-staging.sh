#!/bin/bash
# Deploy child theme to SiteGround Staging
# Uso: ./scripts/deploy-staging.sh

set -e

# Configuración
LOCAL_THEME="wp-content/themes/twentytwentythree-child/"
REMOTE_HOST="siteground-proportione"
REMOTE_PATH="/home/customer/www/staging19.proportione.com/public_html/wp-content/themes/twentytwentythree-child/"

echo "🚀 Deploying to staging19.proportione.com..."
echo "   From: $LOCAL_THEME"
echo "   To:   $REMOTE_PATH"
echo ""

# Dry run primero para mostrar qué se va a sincronizar
echo "📋 Archivos a sincronizar:"
rsync -avzn --delete "$LOCAL_THEME" "$REMOTE_HOST:$REMOTE_PATH"

echo ""
read -p "¿Continuar con el deploy? (s/n) " -n 1 -r
echo ""

if [[ $REPLY =~ ^[Ss]$ ]]; then
    rsync -avz --delete "$LOCAL_THEME" "$REMOTE_HOST:$REMOTE_PATH"
    echo ""
    echo "✅ Deploy completado!"
    echo "   Verifica en: https://staging19.proportione.com/"
else
    echo "❌ Deploy cancelado"
fi
