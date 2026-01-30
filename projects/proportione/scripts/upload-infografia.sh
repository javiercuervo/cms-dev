#!/bin/bash
# Script para subir infografía SVG a WordPress Media Library via SSH
# Uso: ./scripts/upload-infografia.sh

set -e

# Detectar directorio del script
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

# Configuración
LOCAL_FILE="$PROJECT_DIR/figma-assets/infografia-metodo-20-60-20.svg"
REMOTE_HOST="siteground-proportione"
REMOTE_UPLOADS="/home/customer/www/staging19.proportione.com/public_html/wp-content/uploads/2026/01/"

echo "📤 Subiendo infografía SVG a WordPress..."
echo "   Archivo: $LOCAL_FILE"
echo "   Destino: $REMOTE_UPLOADS"
echo ""

# Verificar que el archivo existe
if [ ! -f "$LOCAL_FILE" ]; then
    echo "❌ Error: No se encuentra el archivo $LOCAL_FILE"
    exit 1
fi

# Crear directorio remoto si no existe
ssh "$REMOTE_HOST" "mkdir -p $REMOTE_UPLOADS"

# Subir archivo
scp "$LOCAL_FILE" "$REMOTE_HOST:$REMOTE_UPLOADS"

echo "✅ Archivo subido!"
echo ""
echo "📋 Siguientes pasos:"
echo "   1. Ir a WordPress Admin > Media > Añadir nuevo"
echo "   2. Importar el SVG desde el servidor usando un plugin de importación"
echo "   3. O usar WP-CLI para registrar el archivo:"
echo ""
echo "   ssh $REMOTE_HOST"
echo "   cd /home/customer/www/staging19.proportione.com/public_html"
echo "   wp media import wp-content/uploads/2026/01/infografia-metodo-20-60-20.svg --title='Infografía Método 20-60-20' --alt='Método de trabajo Proportione: 20% definición, 60% IA trabaja, 20% validación'"
echo ""
