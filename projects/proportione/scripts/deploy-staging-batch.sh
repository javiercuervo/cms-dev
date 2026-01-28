#!/bin/bash
# ===========================================
# DEPLOY BATCH - Proportione Staging
# Ejecutar: bash deploy-staging-batch.sh
# ===========================================

set -e  # Salir si hay error

REMOTE="siteground-proportione"
WP_PATH="/home/customer/www/staging19.proportione.com/public_html"
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

echo "=========================================="
echo "DEPLOY BATCH - Proportione Staging"
echo "=========================================="

# 1. Subir CSS
echo ""
echo "[1/8] Subiendo CSS..."
ssh $REMOTE "cat > /tmp/proportione-custom.css << 'CSSEOF'
$(cat "$PROJECT_DIR/assets/custom-styles.css")
CSSEOF"
echo "     CSS subido a /tmp/proportione-custom.css"

# 2. Aplicar CSS al customizer
echo ""
echo "[2/8] Aplicando CSS al customizer de WordPress..."
ssh $REMOTE "cd $WP_PATH && wp eval '\$css = file_get_contents(\"/tmp/proportione-custom.css\"); wp_update_custom_css_post(\$css); echo \"OK\";'"

# 3. Configurar ajustes del tema e idioma
echo ""
echo "[3/8] Configurando ajustes del tema e idioma..."
ssh $REMOTE "cd $WP_PATH && \
    wp language core install es_ES --activate 2>/dev/null || true && \
    wp option update WPLANG 'es_ES' && \
    wp theme mod set hello_footer_logo_display 'yes' && \
    wp theme mod set hello_footer_copyright_display 'yes' && \
    wp theme mod set hello_footer_copyright_text 'MIT License © 2024 Proportione | <a href=\"/politica-privacidad/\">Política de Privacidad</a> | <a href=\"/politica-cookies/\">Política de Cookies</a>' && \
    echo 'Ajustes del tema e idioma configurados'"

# 4. Crear footer con Elementor Theme Builder
echo ""
echo "[4/8] Creando footer con Elementor..."
ssh $REMOTE "cd $WP_PATH && wp eval '
// Verificar si ya existe un footer
\$existing = get_posts(array(
    \"post_type\" => \"elementor_library\",
    \"meta_query\" => array(
        array(\"key\" => \"_elementor_template_type\", \"value\" => \"footer\")
    ),
    \"posts_per_page\" => 1
));

if (!empty(\$existing)) {
    echo \"Footer ya existe (ID: \" . \$existing[0]->ID . \"). Actualizando...\\n\";
    \$footer_id = \$existing[0]->ID;
} else {
    // Crear nuevo post para el footer
    \$footer_id = wp_insert_post(array(
        \"post_title\" => \"Footer Proportione\",
        \"post_status\" => \"publish\",
        \"post_type\" => \"elementor_library\"
    ));
    echo \"Footer creado (ID: \$footer_id)\\n\";
}

// Configurar como template de footer
update_post_meta(\$footer_id, \"_elementor_template_type\", \"footer\");
update_post_meta(\$footer_id, \"_elementor_edit_mode\", \"builder\");

// Contenido del footer en formato Elementor
\$footer_content = array(
    array(
        \"id\" => \"footer-section\",
        \"elType\" => \"section\",
        \"settings\" => array(
            \"background_background\" => \"classic\",
            \"background_color\" => \"#5F322F\",
            \"padding\" => array(\"top\" => \"40\", \"bottom\" => \"40\", \"left\" => \"50\", \"right\" => \"50\", \"unit\" => \"px\"),
            \"gap\" => \"no\"
        ),
        \"elements\" => array(
            array(
                \"id\" => \"footer-col-1\",
                \"elType\" => \"column\",
                \"settings\" => array(\"_column_size\" => 33),
                \"elements\" => array(
                    array(
                        \"id\" => \"footer-logo\",
                        \"elType\" => \"widget\",
                        \"widgetType\" => \"image\",
                        \"settings\" => array(
                            \"image\" => array(
                                \"url\" => \"https://staging19.proportione.com/wp-content/uploads/2024/04/Logo_-Estrategia-Tecnologia-y-Personas.png\",
                                \"id\" => 1886
                            ),
                            \"image_size\" => \"medium\",
                            \"width\" => array(\"size\" => 200, \"unit\" => \"px\"),
                            \"align\" => \"left\"
                        )
                    )
                )
            ),
            array(
                \"id\" => \"footer-col-2\",
                \"elType\" => \"column\",
                \"settings\" => array(\"_column_size\" => 33),
                \"elements\" => array(
                    array(
                        \"id\" => \"footer-links\",
                        \"elType\" => \"widget\",
                        \"widgetType\" => \"text-editor\",
                        \"settings\" => array(
                            \"editor\" => \"<p style=\\\"text-align:center;\\\"><a href=\\\"/politica-privacidad/\\\" style=\\\"color:#fff;\\\">Política de Privacidad</a> | <a href=\\\"/politica-cookies/\\\" style=\\\"color:#fff;\\\">Política de Cookies</a></p>\",
                            \"text_color\" => \"#ffffff\"
                        )
                    )
                )
            ),
            array(
                \"id\" => \"footer-col-3\",
                \"elType\" => \"column\",
                \"settings\" => array(\"_column_size\" => 34),
                \"elements\" => array(
                    array(
                        \"id\" => \"footer-copyright\",
                        \"elType\" => \"widget\",
                        \"widgetType\" => \"text-editor\",
                        \"settings\" => array(
                            \"editor\" => \"<p style=\\\"text-align:right;\\\">MIT License © 2024 Proportione</p>\",
                            \"text_color\" => \"#ffffff\"
                        )
                    )
                )
            )
        )
    )
);

update_post_meta(\$footer_id, \"_elementor_data\", wp_json_encode(\$footer_content));

// Configurar condiciones de display (mostrar en todo el sitio)
update_post_meta(\$footer_id, \"_elementor_conditions\", array(\"include/general\"));

echo \"Footer configurado correctamente\\n\";
'"

# 5. Actualizar página de Investigación
echo ""
echo "[5/8] Actualizando página de Investigación..."
ssh $REMOTE "cat > /tmp/investigacion-content.html << 'HTMLEOF'
$(cat "$PROJECT_DIR/content/investigacion-page.html")
HTMLEOF"

ssh $REMOTE "cd $WP_PATH && wp eval '
// Buscar la página de investigación
\$pages = get_posts(array(
    \"post_type\" => \"page\",
    \"name\" => \"investigacion-tesis-universidade-de-aveiro\",
    \"posts_per_page\" => 1
));

if (!empty(\$pages)) {
    \$page_id = \$pages[0]->ID;
    \$content = file_get_contents(\"/tmp/investigacion-content.html\");

    // Actualizar contenido y título
    wp_update_post(array(
        \"ID\" => \$page_id,
        \"post_title\" => \"Línea de Investigación\",
        \"post_content\" => \$content,
        \"post_name\" => \"investigacion\"
    ));

    echo \"Página actualizada (ID: \$page_id)\\n\";
} else {
    echo \"Página no encontrada, creando nueva...\\n\";
    \$content = file_get_contents(\"/tmp/investigacion-content.html\");
    \$page_id = wp_insert_post(array(
        \"post_title\" => \"Línea de Investigación\",
        \"post_content\" => \$content,
        \"post_status\" => \"publish\",
        \"post_type\" => \"page\",
        \"post_name\" => \"investigacion\"
    ));
    echo \"Página creada (ID: \$page_id)\\n\";
}
'"

# 6. Actualizar menú (cambiar enlace de Investigación)
echo ""
echo "[6/8] Actualizando enlace en menú..."
ssh $REMOTE "cd $WP_PATH && wp eval '
// Buscar item de menú de Investigación y actualizar URL
\$menu_items = wp_get_nav_menu_items(\"menu-principal\");
foreach (\$menu_items as \$item) {
    if (strpos(\$item->url, \"investigacion\") !== false) {
        // Actualizar a la nueva URL
        update_post_meta(\$item->ID, \"_menu_item_url\", home_url(\"/investigacion/\"));
        echo \"Menú actualizado: \" . \$item->title . \"\\n\";
    }
}
'"

# 8. Purgar todas las cachés
echo ""
echo "[8/8] Purgando cachés..."
ssh $REMOTE "cd $WP_PATH && \
    wp cache flush && \
    wp transient delete --all && \
    wp sg purge 2>/dev/null || true && \
    echo 'Cachés purgadas'"

echo ""
echo "=========================================="
echo "DEPLOY COMPLETADO"
echo "=========================================="
echo ""
echo "Verifica en: https://staging19.proportione.com"
echo "(Usa ventana incógnito o Ctrl+Shift+R)"
echo ""
