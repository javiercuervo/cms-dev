<?php
/**
 * Hello Elementor Child - Proportione
 * Functions and definitions
 */

// Cargar estilos del tema padre
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');
function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style(
        'hello-elementor-parent',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'hello-elementor-child',
        get_stylesheet_uri(),
        array('hello-elementor-parent'),
        wp_get_theme()->get('Version')
    );
}

// Encolar CSS adicionales de Proportione
add_action('wp_enqueue_scripts', 'proportione_enqueue_custom_styles', 20);
function proportione_enqueue_custom_styles() {
    $theme_uri = get_stylesheet_directory_uri();

    // Sistema de contraste (texto claro/oscuro según fondo)
    wp_enqueue_style(
        'proportione-contrast',
        $theme_uri . '/proportione-contrast.css',
        array('hello-elementor-child'),
        '1.0.1'
    );

    // Correcciones de diseño
    wp_enqueue_style(
        'proportione-corrections',
        $theme_uri . '/proportione-corrections.css',
        array('proportione-contrast'),
        '1.0.0'
    );

    // Accesibilidad
    wp_enqueue_style(
        'proportione-accessibility',
        $theme_uri . '/proportione-accessibility.css',
        array('proportione-corrections'),
        '1.0.0'
    );

    // Design System - Tipografía, animaciones, decorativos
    wp_enqueue_style(
        'proportione-design-system',
        $theme_uri . '/proportione-design-system.css',
        array('proportione-accessibility'),
        '1.0.0'
    );

    // Homepage Nueva - Solo en la página de inicio
    if (is_front_page()) {
        wp_enqueue_style(
            'proportione-homepage',
            $theme_uri . '/homepage-nuevo.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    }

    // Página Filosofía - Solo en /filosofia/
    if (is_page('filosofia')) {
        wp_enqueue_style(
            'proportione-filosofia',
            $theme_uri . '/filosofia.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    }

    // Página Consultoría de Gestión de Negocio
    // URL: /consultoria-estrategica-crecimiento-organico/consultoria-de-gestion-de-negocio-un-enfoque-estrategico/
    if (is_page('consultoria-de-gestion-de-negocio-un-enfoque-estrategico')) {
        wp_enqueue_style(
            'proportione-consultoria-gestion',
            $theme_uri . '/consultoria-gestion.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    }

    // Página Consultoría de Tecnología
    // URL: /consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/
    if (is_page('consultoria-de-tecnologia')) {
        wp_enqueue_style(
            'proportione-consultoria-tecnologia',
            $theme_uri . '/consultoria-tecnologia.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    }

    // Página Contacto
    // URL: /contacto/
    if (is_page('contacto')) {
        wp_enqueue_style(
            'proportione-contacto',
            $theme_uri . '/contacto-elementor.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    }
}

// CSS condicional para plantillas de blog por categoría
add_action('wp_enqueue_scripts', 'proportione_blog_templates_css', 25);
function proportione_blog_templates_css() {
    if (!is_singular('post')) return;

    $theme_uri = get_stylesheet_directory_uri();

    // Prioridad: IA Generativa > Estrategia Digital > Personas y Tecnología > Genérica
    if (has_category('ia-generativa')) {
        wp_enqueue_style(
            'blog-ia-generativa',
            $theme_uri . '/blog-ia-generativa.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    } elseif (has_category('estrategia-digital')) {
        wp_enqueue_style(
            'blog-estrategia-digital',
            $theme_uri . '/blog-estrategia-digital.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    } elseif (has_category('personas-y-tecnologia')) {
        wp_enqueue_style(
            'blog-personas-tecnologia',
            $theme_uri . '/blog-personas-tecnologia.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    } else {
        wp_enqueue_style(
            'blog-generic',
            $theme_uri . '/blog-generic.css',
            array('proportione-design-system'),
            '1.0.0'
        );
    }
}

// Añadir clases de categoría al body para selectores CSS específicos
add_filter('body_class', 'proportione_blog_category_body_class');
function proportione_blog_category_body_class($classes) {
    if (is_singular('post')) {
        $categories = get_the_category();
        if ($categories) {
            foreach ($categories as $category) {
                $classes[] = 'category-' . $category->slug;
            }
        }
    }
    return $classes;
}

// Limpiar cabecera de WordPress
add_action('init', function () {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'wp_resource_hints', 2);
});

// Skip-link para accesibilidad
add_action('wp_body_open', 'proportione_skip_link');
function proportione_skip_link() {
    echo '<a href="#main-content" class="skip-link">Saltar al contenido</a>';
}
