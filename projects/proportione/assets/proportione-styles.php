<?php
/**
 * Plugin Name: Proportione Custom Styles
 * Description: Estilos personalizados para Proportione
 */

add_action('wp_enqueue_scripts', function() {
    // CSS de accesibilidad
    if (file_exists(get_template_directory() . '/accesibilidad.css')) {
        wp_enqueue_style('proportione-accesibilidad', get_template_directory_uri() . '/accesibilidad.css', array(), time());
    }
    
    // CSS custom para Elementor
    if (file_exists(get_template_directory() . '/custom-elementor.css')) {
        wp_enqueue_style('proportione-elementor-custom', get_template_directory_uri() . '/custom-elementor.css', array(), time());
    }
}, 9999);
