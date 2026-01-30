<?php
/**
 * Plugin Name: Proportione Custom Styles
 * Description: Estilos personalizados para Proportione
 * Version: 1.1.0
 * Updated: 2026-01-29
 */

add_action('wp_enqueue_scripts', function() {
    // CSS de accesibilidad
    if (file_exists(get_template_directory() . '/accesibilidad.css')) {
        wp_enqueue_style('proportione-accesibilidad', get_template_directory_uri() . '/accesibilidad.css', array(), '1.1.0');
    }

    // CSS custom para Elementor
    if (file_exists(get_template_directory() . '/custom-elementor.css')) {
        wp_enqueue_style('proportione-elementor-custom', get_template_directory_uri() . '/custom-elementor.css', array(), '1.1.0');
    }

    // Design System completo
    if (file_exists(get_template_directory() . '/proportione-design-system.css')) {
        wp_enqueue_style('proportione-design-system', get_template_directory_uri() . '/proportione-design-system.css', array(), '1.1.0');
    }

    // CSS específico homepage nueva (solo en front page)
    if (is_front_page() && file_exists(get_template_directory() . '/homepage-nuevo.css')) {
        wp_enqueue_style('proportione-homepage', get_template_directory_uri() . '/homepage-nuevo.css', array('proportione-design-system'), '1.0.0');
    }
}, 9999);
