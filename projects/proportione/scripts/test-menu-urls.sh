#!/bin/bash
# ==============================================================================
# test-menu-urls.sh - Verificar que todas las URLs del menu funcionan
# ==============================================================================
# Uso: ./scripts/test-menu-urls.sh
# Descripcion: Hace requests HTTP a todas las URLs del menu y reporta estado
# ==============================================================================

BASE_URL="https://staging19.proportione.com"

echo ""
echo "=============================================="
echo "  Test de URLs del Menu - Staging"
echo "=============================================="
echo "  Fecha: $(date '+%Y-%m-%d %H:%M:%S')"
echo "=============================================="
echo ""

# Lista de URLs a verificar (actualizada 2026-01-30)
# Eliminados: /estrategia-transformacion-digital/ y /organizacion-agile-... por 404
declare -a URLS=(
    "/servicios/"
    "/consultoria-gestion-negocio/"
    "/estrategia-innovacion/"
    "/inteligencia-artificial-generativa/"
    "/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/"
    "/nosotros/"
    "/metodologia/"
    "/mayte-tortosa/"
    "/javier-cuervo/"
    "/blog/"
    "/investigacion/"
    "/contacto/"
)

# Contadores
PASS=0
FAIL=0
REDIRECT=0

echo "Verificando ${#URLS[@]} URLs..."
echo ""
printf "%-70s %s\n" "URL" "ESTADO"
echo "----------------------------------------------------------------------"

for url in "${URLS[@]}"; do
    full_url="${BASE_URL}${url}"

    # Hacer request y capturar codigo HTTP
    http_code=$(curl -s -o /dev/null -w "%{http_code}" -L "$full_url" --max-time 10)

    if [ "$http_code" == "200" ]; then
        status="OK (200)"
        ((PASS++))
    elif [ "$http_code" == "301" ] || [ "$http_code" == "302" ]; then
        status="REDIRECT ($http_code)"
        ((REDIRECT++))
    elif [ "$http_code" == "404" ]; then
        status="NOT FOUND (404)"
        ((FAIL++))
    elif [ "$http_code" == "000" ]; then
        status="TIMEOUT/ERROR"
        ((FAIL++))
    else
        status="ERROR ($http_code)"
        ((FAIL++))
    fi

    printf "%-70s %s\n" "$url" "$status"
done

echo ""
echo "=============================================="
echo "  RESUMEN"
echo "=============================================="
echo "  OK (200):     $PASS"
echo "  Redirects:    $REDIRECT"
echo "  Errores:      $FAIL"
echo "=============================================="
echo ""

if [ $FAIL -gt 0 ]; then
    echo "[!] Hay $FAIL URLs con errores. Revisar antes del deploy."
    exit 1
else
    echo "[OK] Todas las URLs responden correctamente."
    exit 0
fi
