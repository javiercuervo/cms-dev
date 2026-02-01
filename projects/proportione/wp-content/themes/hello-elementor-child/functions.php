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

    // Menú Móvil - CSS
    wp_enqueue_style(
        'proportione-mobile-menu',
        $theme_uri . '/mobile-menu-v2.css',
        array('hello-elementor-child'),
        '2.1.0'
    );

    // Menú Móvil - JS (solo jQuery como dependencia)
    wp_enqueue_script(
        'proportione-mobile-menu',
        $theme_uri . '/mobile-menu-v2.js',
        array('jquery'),
        '2.1.0',
        true
    );

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

// CSS para plantilla de blog V2
add_action('wp_enqueue_scripts', 'proportione_blog_templates_css', 25);
function proportione_blog_templates_css() {
    if (!is_singular('post')) return;

    $theme_uri = get_stylesheet_directory_uri();

    // CSS V2 para todos los posts
    wp_enqueue_style(
        'blog-single-v2',
        $theme_uri . '/blog-single-v2.css',
        array('proportione-design-system'),
        '2.0.0'
    );

    // JavaScript V2
    wp_enqueue_script(
        'blog-single-v2',
        $theme_uri . '/js/blog-single-v2.js',
        array(),
        '2.0.0',
        true
    );
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

/**
 * Elementos UX para Single Posts - Reducción de Rebote
 */

// Añadir barra de progreso de lectura
add_action('wp_body_open', 'proportione_reading_progress_bar');
function proportione_reading_progress_bar() {
    if (!is_singular('post')) return;
    echo '<div class="reading-progress-bar" id="reading-progress"></div>';
}

// Añadir elementos dinámicos al footer de single posts
add_action('wp_footer', 'proportione_single_post_elements', 20);
function proportione_single_post_elements() {
    if (!is_singular('post')) return;

    $post_url = urlencode(get_permalink());
    $post_title = urlencode(get_the_title());
    ?>
    <!-- Tabla de Contenidos Flotante -->
    <nav class="toc-container" id="toc-container">
        <h4>Contenidos</h4>
        <ul id="toc-list"></ul>
    </nav>

    <!-- Botones de Compartir Flotantes -->
    <div class="share-buttons-float" id="share-buttons">
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $post_url; ?>" target="_blank" rel="noopener" title="Compartir en LinkedIn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" rel="noopener" title="Compartir en X">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
        <a href="mailto:?subject=<?php echo $post_title; ?>&body=Te comparto este artículo: <?php echo $post_url; ?>" title="Compartir por Email">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
        </a>
        <a href="#" id="copy-link-btn" title="Copiar enlace">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
        </a>
    </div>

    <script>
    (function() {
        'use strict';

        // === BARRA DE PROGRESO DE LECTURA ===
        var progressBar = document.getElementById('reading-progress');
        var content = document.querySelector('.elementor-widget-theme-post-content, .entry-content');

        if (progressBar && content) {
            window.addEventListener('scroll', function() {
                var contentTop = content.offsetTop;
                var contentHeight = content.offsetHeight;
                var scrollTop = window.pageYOffset;
                var windowHeight = window.innerHeight;

                var progress = Math.max(0, Math.min(100,
                    ((scrollTop - contentTop + windowHeight * 0.3) / contentHeight) * 100
                ));

                progressBar.style.width = progress + '%';
            });
        }

        // === TABLA DE CONTENIDOS DINÁMICA ===
        var tocContainer = document.getElementById('toc-container');
        var tocList = document.getElementById('toc-list');

        if (tocContainer && tocList && content) {
            var headings = content.querySelectorAll('h2, h3');

            if (headings.length >= 3) {
                headings.forEach(function(heading, index) {
                    // Añadir ID si no tiene
                    if (!heading.id) {
                        heading.id = 'section-' + index;
                    }

                    var li = document.createElement('li');
                    var a = document.createElement('a');
                    a.href = '#' + heading.id;
                    a.textContent = heading.textContent;
                    a.className = heading.tagName === 'H3' ? 'toc-h3' : '';

                    // Smooth scroll
                    a.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.getElementById(heading.id).scrollIntoView({
                            behavior: 'smooth'
                        });
                    });

                    li.appendChild(a);
                    tocList.appendChild(li);
                });

                // Mostrar TOC después de scroll
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 400) {
                        tocContainer.classList.add('visible');
                    } else {
                        tocContainer.classList.remove('visible');
                    }
                });

                // Resaltar sección activa
                window.addEventListener('scroll', function() {
                    var scrollPos = window.pageYOffset + 150;

                    headings.forEach(function(heading, index) {
                        var link = tocList.querySelectorAll('a')[index];
                        if (heading.offsetTop <= scrollPos &&
                            (index === headings.length - 1 || headings[index + 1].offsetTop > scrollPos)) {
                            link.classList.add('active');
                        } else {
                            link.classList.remove('active');
                        }
                    });
                });
            }
        }

        // === BOTONES DE COMPARTIR VISIBILIDAD ===
        var shareButtons = document.getElementById('share-buttons');
        if (shareButtons) {
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    shareButtons.classList.add('visible');
                } else {
                    shareButtons.classList.remove('visible');
                }
            });
        }

        // === COPIAR ENLACE ===
        var copyBtn = document.getElementById('copy-link-btn');
        if (copyBtn) {
            copyBtn.addEventListener('click', function(e) {
                e.preventDefault();
                navigator.clipboard.writeText(window.location.href).then(function() {
                    copyBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>';
                    setTimeout(function() {
                        copyBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>';
                    }, 2000);
                });
            });
        }
    })();
    </script>
    <?php
}

// Añadir artículos relacionados después del contenido
add_action('elementor/theme/after_do_single', 'proportione_related_posts_section', 10);
function proportione_related_posts_section() {
    if (!is_singular('post')) return;

    global $post;
    $categories = get_the_category($post->ID);

    if (empty($categories)) return;

    $category_ids = array();
    foreach ($categories as $cat) {
        $category_ids[] = $cat->term_id;
    }

    $related_posts = get_posts(array(
        'numberposts' => 3,
        'post__not_in' => array($post->ID),
        'category__in' => $category_ids,
        'orderby' => 'rand'
    ));

    if (empty($related_posts)) {
        // Si no hay de la misma categoría, mostrar los más recientes
        $related_posts = get_posts(array(
            'numberposts' => 3,
            'post__not_in' => array($post->ID),
            'orderby' => 'date',
            'order' => 'DESC'
        ));
    }

    if (empty($related_posts)) return;
    ?>
    <section class="related-posts-section">
        <h2>Continúa leyendo</h2>
        <div class="related-posts-grid">
            <?php foreach ($related_posts as $rpost) :
                $thumb = get_the_post_thumbnail_url($rpost->ID, 'medium');
                $cats = get_the_category($rpost->ID);
                $cat_name = !empty($cats) ? $cats[0]->name : 'Blog';
            ?>
            <article class="related-post-card">
                <?php if ($thumb) : ?>
                <a href="<?php echo get_permalink($rpost->ID); ?>">
                    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($rpost->post_title); ?>">
                </a>
                <?php endif; ?>
                <div class="card-content">
                    <span class="card-category"><?php echo esc_html($cat_name); ?></span>
                    <h3><a href="<?php echo get_permalink($rpost->ID); ?>"><?php echo esc_html($rpost->post_title); ?></a></h3>
                    <p class="card-excerpt"><?php echo wp_trim_words($rpost->post_excerpt ?: $rpost->post_content, 15); ?></p>
                    <span class="card-date"><?php echo get_the_date('d M Y', $rpost->ID); ?></span>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Author Bio -->
    <?php
    $author_id = $post->post_author;
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_bio = get_the_author_meta('description', $author_id);
    $author_avatar = get_avatar_url($author_id, array('size' => 160));
    ?>
    <section class="author-bio-section">
        <div class="author-avatar">
            <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>">
        </div>
        <div class="author-info">
            <h4><?php echo esc_html($author_name); ?></h4>
            <span class="author-role">Autor en Proportione</span>
            <?php if ($author_bio) : ?>
            <p class="author-description"><?php echo esc_html($author_bio); ?></p>
            <?php endif; ?>
            <div class="author-links">
                <a href="<?php echo get_author_posts_url($author_id); ?>">Ver más artículos →</a>
            </div>
        </div>
    </section>

    <!-- Navegación Prev/Next -->
    <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if ($prev_post || $next_post) : ?>
    <nav class="post-navigation-section">
        <?php if ($prev_post) : ?>
        <a href="<?php echo get_permalink($prev_post); ?>" class="post-nav-item prev">
            <span class="nav-label">← Anterior</span>
            <span class="nav-title"><?php echo esc_html($prev_post->post_title); ?></span>
        </a>
        <?php else : ?>
        <div class="post-nav-item prev empty"></div>
        <?php endif; ?>

        <?php if ($next_post) : ?>
        <a href="<?php echo get_permalink($next_post); ?>" class="post-nav-item next">
            <span class="nav-label">Siguiente →</span>
            <span class="nav-title"><?php echo esc_html($next_post->post_title); ?></span>
        </a>
        <?php else : ?>
        <div class="post-nav-item next empty"></div>
        <?php endif; ?>
    </nav>
    <?php endif; ?>

    <!-- Newsletter CTA -->
    <section class="newsletter-cta-section">
        <div class="newsletter-icon">📬</div>
        <h3>¿Te ha resultado útil?</h3>
        <p>Recibe contenido similar directamente en tu email</p>
        <form action="#" method="post" class="newsletter-form">
            <input type="email" name="email" placeholder="tu@email.com" required>
            <button type="submit">Suscribirme</button>
        </form>
        <p class="privacy-note">Sin spam. Puedes darte de baja cuando quieras.</p>
    </section>
    <?php
}
