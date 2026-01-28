<?php
/**
 * Flavor Flavor Flavor Child Theme Functions
 *
 * @package Flavor_Flavor_Flavor_Child
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Enqueue parent and child theme styles.
 */
function flavor_child_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'flavor-parent-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->parent()->get( 'Version' )
    );

    // Child theme stylesheet
    wp_enqueue_style(
        'flavor-child-style',
        get_stylesheet_uri(),
        array( 'flavor-parent-style' ),
        wp_get_theme()->get( 'Version' )
    );

    // Custom CSS (if exists)
    $custom_css = get_stylesheet_directory() . '/assets/css/custom.css';
    if ( file_exists( $custom_css ) ) {
        wp_enqueue_style(
            'flavor-child-custom',
            get_stylesheet_directory_uri() . '/assets/css/custom.css',
            array( 'flavor-child-style' ),
            filemtime( $custom_css )
        );
    }

    // Custom JS (if exists)
    $custom_js = get_stylesheet_directory() . '/assets/js/custom.js';
    if ( file_exists( $custom_js ) ) {
        wp_enqueue_script(
            'flavor-child-custom-js',
            get_stylesheet_directory_uri() . '/assets/js/custom.js',
            array( 'jquery' ),
            filemtime( $custom_js ),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'flavor_child_enqueue_styles' );

/**
 * Include modular PHP files from /inc directory.
 */
function flavor_child_include_files() {
    $inc_dir = get_stylesheet_directory() . '/inc/';

    if ( is_dir( $inc_dir ) ) {
        foreach ( glob( $inc_dir . '*.php' ) as $file ) {
            require_once $file;
        }
    }
}
add_action( 'after_setup_theme', 'flavor_child_include_files' );

/* ==========================================================================
   CUSTOM FUNCTIONS
   ========================================================================== */

// Add your custom functions below this line
