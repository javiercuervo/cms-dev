<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_and_child_styles' );
function enqueue_parent_and_child_styles() {
   // Cargar CSS del tema padre
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   // Cargar CSS del child theme
   wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'), wp_get_theme()->get('Version') );
}
add_action(
 'init',
 function () {
  // Remove the Really Simple Discovery service link
  remove_action( 'wp_head', 'rsd_link' );
  // Remove the link to the Windows Live Writer manifest
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // Remove the general feeds
  remove_action( 'wp_head', 'feed_links', 2 );
  // Remove the extra feeds, such as category feeds
  remove_action( 'wp_head', 'feed_links_extra', 3 );
  // Remove the displayed XHTML generator
  remove_action( 'wp_head', 'wp_generator' );
  // Remove the REST API link tag
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
  // Remove oEmbed discovery links
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
  // Remove rel next/prev links
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
  // Remove prefetch url
  remove_action( 'wp_head', 'wp_resource_hints', 2 );
 }
);

// Encolar CSS adicionales de Proportione
add_action('wp_enqueue_scripts', 'proportione_enqueue_custom_styles', 20);
function proportione_enqueue_custom_styles() {
    // Sistema de contraste (texto claro/oscuro según fondo)
    wp_enqueue_style(
        'proportione-contrast',
        get_stylesheet_directory_uri() . '/proportione-contrast.css',
        array('child-style'),
        '1.0.1'
    );
    // Correcciones de diseño
    wp_enqueue_style(
        'proportione-corrections',
        get_stylesheet_directory_uri() . '/proportione-corrections.css',
        array('proportione-contrast'),
        '1.0.0'
    );
    // Accesibilidad
    wp_enqueue_style(
        'proportione-accessibility',
        get_stylesheet_directory_uri() . '/proportione-accessibility.css',
        array('proportione-corrections'),
        '1.0.0'
    );
    // Design System - Tipografía, animaciones, decorativos
    wp_enqueue_style(
        'proportione-design-system',
        get_stylesheet_directory_uri() . '/proportione-design-system.css',
        array('proportione-accessibility'),
        '1.0.0'
    );
}

// Skip-link para accesibilidad (block themes no tienen header.php)
add_action('wp_body_open', 'proportione_skip_link');
function proportione_skip_link() {
    echo '<a href="#main-content" class="skip-link">Saltar al contenido</a>';
}
