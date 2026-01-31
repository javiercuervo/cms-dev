<?php
/**
 * Blog Page - The Proportione Times
 * Diseño estilo periódico tecnológico
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();

// Obtener posts
$featured_post = get_posts(array(
    'numberposts' => 1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
));

$sidebar_posts = get_posts(array(
    'numberposts' => 3,
    'post_status' => 'publish',
    'offset' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
));

$grid_posts = get_posts(array(
    'numberposts' => 9,
    'post_status' => 'publish',
    'offset' => 4,
    'orderby' => 'date',
    'order' => 'DESC'
));

// Obtener categorías
$categories = get_categories(array('hide_empty' => true));
?>

<style>
/* ============================================
   Alma Proportione - Blog Styles
   ============================================ */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Oswald:wght@400;500;600;700&family=Raleway:wght@300;400;500;600&display=swap');

:root {
    --granate: #5F322F;
    --verde: #6E8157;
    --verde-hover: #566E30;
    --crema: #F5F0E6;
    --gris-oscuro: #333333;
    --gris-medio: #666666;
    --blanco: #FFFFFF;
}

/* Reset específico del blog */
.blog-container * {
    box-sizing: border-box;
}

.blog-container {
    font-family: 'Raleway', sans-serif;
    background: var(--blanco);
    min-height: 100vh;
}

/* News Ticker */
.breaking-news {
    background: var(--granate);
    color: white;
    padding: 12px 0;
    overflow: hidden;
    position: relative;
}

.breaking-news::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, var(--granate), rgba(110,129,87,0.2), var(--granate));
    opacity: 0.5;
}

.ticker-content {
    display: flex;
    gap: 48px;
    animation: ticker 40s linear infinite;
    white-space: nowrap;
}

@keyframes ticker {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}

a.ticker-item {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: inherit;
    transition: opacity 0.3s ease;
}

a.ticker-item:hover {
    opacity: 0.8;
}

.ticker-item .label {
    font-family: 'Oswald', sans-serif;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.ticker-item .text {
    font-weight: 300;
}

.ticker-icon {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Editorial Header */
.editorial-header {
    border-bottom: 4px solid var(--granate);
    padding-bottom: 24px;
    margin-bottom: 32px;
    text-align: center;
}

.editorial-date {
    font-size: 12px;
    letter-spacing: 0.1em;
    color: var(--gris-medio);
    margin-bottom: 8px;
}

.editorial-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 6vw, 64px);
    font-weight: 700;
    color: var(--granate);
    letter-spacing: -0.02em;
    margin: 0 0 12px 0;
}

.editorial-subtitle {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 16px;
    font-size: 12px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gris-medio);
}

.editorial-subtitle .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--verde);
}

.editorial-divider {
    margin-top: 24px;
    border-top: 1px solid rgba(51,51,51,0.3);
}

.editorial-divider::after {
    content: '';
    display: block;
    margin-top: 4px;
    border-top: 2px solid var(--gris-oscuro);
}

/* Main Container */
.blog-main {
    max-width: 1280px;
    margin: 0 auto;
    padding: 32px 24px;
}

/* Hero Section */
.hero-section {
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;
    margin-bottom: 48px;
}

@media (min-width: 1024px) {
    .hero-section {
        grid-template-columns: 3fr 2fr;
    }
}

/* Featured Article */
.featured-article {
    cursor: pointer;
}

.featured-article:hover .featured-image img {
    transform: scale(1.05);
}

.featured-article:hover .featured-title {
    color: var(--verde);
}

.featured-image {
    position: relative;
    aspect-ratio: 16/10;
    overflow: hidden;
    border-radius: 4px;
    margin-bottom: 16px;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.featured-image::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(95,50,47,0.6), rgba(95,50,47,0.2), transparent);
}

.featured-category {
    position: absolute;
    top: 16px;
    left: 16px;
    z-index: 10;
    background: var(--verde);
    color: white;
    padding: 6px 12px;
    font-family: 'Oswald', sans-serif;
    font-size: 12px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.featured-title {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(28px, 4vw, 48px);
    font-weight: 700;
    color: var(--granate);
    line-height: 1.2;
    margin: 0 0 12px 0;
    transition: color 0.3s ease;
}

.featured-excerpt {
    font-size: 18px;
    color: var(--gris-medio);
    line-height: 1.6;
    margin: 0 0 16px 0;
}

.featured-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    font-size: 14px;
    color: var(--gris-medio);
}

.featured-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Sidebar */
.sidebar-section h2 {
    font-family: 'Oswald', sans-serif;
    font-size: 18px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--granate);
    border-bottom: 2px solid var(--granate);
    padding-bottom: 8px;
    margin: 0 0 24px 0;
}

.sidebar-article {
    display: flex;
    gap: 16px;
    padding-bottom: 24px;
    margin-bottom: 24px;
    border-bottom: 1px solid rgba(51,51,51,0.2);
    cursor: pointer;
}

.sidebar-article:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.sidebar-article:hover .sidebar-title {
    color: var(--verde);
}

.sidebar-article:hover .sidebar-thumb img {
    transform: scale(1.1);
}

.sidebar-thumb {
    flex-shrink: 0;
    width: 96px;
    height: 96px;
    overflow: hidden;
}

.sidebar-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.sidebar-content {
    flex: 1;
}

.sidebar-category {
    font-family: 'Oswald', sans-serif;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--verde);
    margin-bottom: 6px;
}

.sidebar-title {
    font-family: 'Oswald', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: var(--granate);
    line-height: 1.3;
    margin: 0 0 8px 0;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.sidebar-meta {
    font-size: 12px;
    color: var(--gris-medio);
    display: flex;
    gap: 12px;
}

/* Category Filter */
.category-filter {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
    padding: 32px 0;
    border-top: 1px solid rgba(51,51,51,0.2);
    border-bottom: 1px solid rgba(51,51,51,0.2);
    margin-bottom: 48px;
}

.category-pill {
    padding: 10px 24px;
    border-radius: 50px;
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid rgba(51,51,51,0.2);
    background: white;
    color: var(--gris-medio);
    cursor: pointer;
}

.category-pill:hover,
.category-pill.active {
    background: var(--verde);
    color: white;
    border-color: var(--verde);
    box-shadow: 0 4px 12px rgba(110,129,87,0.3);
}

/* Articles Grid */
.articles-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
    margin-bottom: 48px;
}

@media (min-width: 768px) {
    .articles-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .articles-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Article Card */
.article-card {
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border-left: 4px solid transparent;
    transition: all 0.3s ease;
    cursor: pointer;
    overflow: hidden;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.5s ease forwards;
}

.article-card:nth-child(1) { animation-delay: 0.1s; }
.article-card:nth-child(2) { animation-delay: 0.15s; }
.article-card:nth-child(3) { animation-delay: 0.2s; }
.article-card:nth-child(4) { animation-delay: 0.25s; }
.article-card:nth-child(5) { animation-delay: 0.3s; }
.article-card:nth-child(6) { animation-delay: 0.35s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.article-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    border-left-color: var(--verde);
}

.article-card:hover .card-image img {
    transform: scale(1.05);
    filter: grayscale(30%);
}

.article-card:hover .card-title {
    color: var(--verde);
}

.card-image {
    position: relative;
    aspect-ratio: 16/9;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.card-category {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--verde);
    color: white;
    padding: 4px 10px;
    font-family: 'Oswald', sans-serif;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.card-content {
    padding: 20px;
}

.card-title {
    font-family: 'Oswald', sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--granate);
    line-height: 1.3;
    margin: 0 0 12px 0;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-excerpt {
    font-size: 15px;
    color: var(--gris-medio);
    line-height: 1.5;
    margin: 0 0 16px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-meta {
    display: flex;
    gap: 16px;
    font-size: 12px;
    color: var(--gris-medio);
    padding-top: 12px;
    border-top: 1px solid rgba(51,51,51,0.1);
}

/* Opinion Section */
.opinion-section {
    background: var(--crema);
    padding: 64px 24px;
    margin: 48px 0;
    position: relative;
    overflow: hidden;
}

.opinion-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 256px;
    height: 256px;
    background: var(--verde);
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.1;
}

.opinion-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 384px;
    height: 384px;
    background: var(--granate);
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.1;
}

.opinion-inner {
    max-width: 900px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.opinion-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 700;
    color: var(--granate);
    text-align: center;
    margin: 0 0 8px 0;
}

.opinion-divider {
    width: 96px;
    height: 4px;
    background: var(--verde);
    margin: 0 auto 32px;
}

.opinion-card {
    background: white;
    padding: 48px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    position: relative;
}

.opinion-quote-icon {
    position: absolute;
    top: 24px;
    left: 24px;
    font-size: 64px;
    font-family: Georgia, serif;
    color: var(--granate);
    opacity: 0.1;
    line-height: 1;
}

.opinion-quote {
    font-family: 'Playfair Display', serif;
    font-size: clamp(18px, 3vw, 28px);
    font-style: italic;
    color: var(--gris-oscuro);
    line-height: 1.6;
    margin: 0 0 32px 0;
    padding-left: 48px;
}

.opinion-author {
    display: flex;
    align-items: center;
    gap: 16px;
    padding-left: 48px;
}

.opinion-author img {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--verde);
}

.opinion-author-name {
    font-family: 'Oswald', sans-serif;
    font-size: 20px;
    font-weight: 600;
    color: var(--granate);
    margin: 0;
}

.opinion-author-role {
    font-size: 14px;
    color: var(--gris-medio);
    margin: 4px 0 0 0;
}

/* Newsletter */
.newsletter-section {
    background: linear-gradient(135deg, var(--granate), var(--verde));
    padding: 48px 24px;
    margin: 48px 0;
}

.newsletter-inner {
    max-width: 640px;
    margin: 0 auto;
    text-align: center;
    color: white;
}

.newsletter-icon {
    font-size: 48px;
    margin-bottom: 16px;
}

.newsletter-title {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(24px, 4vw, 36px);
    font-weight: 700;
    letter-spacing: 0.05em;
    margin: 0 0 12px 0;
}

.newsletter-text {
    font-size: 18px;
    opacity: 0.9;
    margin: 0 0 24px 0;
}

.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-width: 480px;
    margin: 0 auto;
}

@media (min-width: 640px) {
    .newsletter-form {
        flex-direction: row;
    }
}

.newsletter-input {
    flex: 1;
    padding: 14px 24px;
    border: none;
    border-radius: 6px;
    font-family: 'Raleway', sans-serif;
    font-size: 16px;
}

.newsletter-input:focus {
    outline: 2px solid white;
}

.newsletter-btn {
    padding: 14px 32px;
    background: white;
    color: var(--granate);
    border: none;
    border-radius: 6px;
    font-family: 'Oswald', sans-serif;
    font-size: 14px;
    letter-spacing: 0.1em;
    cursor: pointer;
    transition: background 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.newsletter-btn:hover {
    background: var(--crema);
}

.newsletter-privacy {
    font-size: 12px;
    opacity: 0.75;
    margin-top: 16px;
}

/* Blog Footer */
.blog-footer {
    background: var(--gris-oscuro);
    color: white;
    padding: 48px 24px;
}

.blog-footer-inner {
    max-width: 1280px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;
}

@media (min-width: 768px) {
    .blog-footer-inner {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .blog-footer-inner {
        grid-template-columns: 2fr 1fr 1fr 1fr;
    }
}

.footer-brand h3 {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 8px 0;
}

.footer-brand .tagline {
    font-size: 14px;
    color: rgba(255,255,255,0.6);
    margin: 0 0 16px 0;
}

.footer-brand p {
    font-size: 14px;
    color: rgba(255,255,255,0.6);
    line-height: 1.6;
    margin: 0;
}

.footer-col h4 {
    font-family: 'Oswald', sans-serif;
    font-size: 13px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--verde);
    margin: 0 0 16px 0;
}

.footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-col li {
    margin-bottom: 8px;
}

.footer-col a {
    font-size: 14px;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-col a:hover {
    color: white;
}

.footer-social {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
}

.footer-social a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--verde);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
}

.footer-social a:hover {
    background: var(--verde-hover);
}

.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.2);
    margin-top: 32px;
    padding-top: 24px;
    text-align: center;
}

.footer-bottom p {
    font-size: 14px;
    color: rgba(255,255,255,0.6);
    margin: 0;
}

/* Scroll to Top */
.scroll-top {
    position: fixed;
    bottom: 24px;
    right: 24px;
    width: 48px;
    height: 48px;
    background: var(--granate);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
}

.scroll-top.visible {
    opacity: 1;
    visibility: visible;
}

.scroll-top:hover {
    background: var(--verde);
    transform: translateY(-4px);
}
</style>

<div class="blog-container">
    <!-- News Ticker -->
    <?php
    $ticker_posts = get_posts(array(
        'numberposts' => 5,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    ?>
    <div class="breaking-news">
        <div class="ticker-content">
            <?php foreach ($ticker_posts as $index => $ticker_post) : ?>
            <a href="<?php echo get_permalink($ticker_post->ID); ?>" class="ticker-item">
                <span class="ticker-icon">⚡</span>
                <span class="label"><?php echo ($index === 0) ? 'ÚLTIMO ARTÍCULO:' : 'RECIENTE:'; ?></span>
                <span class="text"><?php echo get_the_title($ticker_post->ID); ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <main class="blog-main">
        <!-- Editorial Header -->
        <header class="editorial-header">
            <p class="editorial-date">Madrid | <?php echo date_i18n('j \d\e F \d\e Y'); ?></p>
            <h1 class="editorial-title">Alma Proportione</h1>
            <div class="editorial-subtitle">
                <span>Estrategia</span>
                <span class="dot"></span>
                <span>Tecnología</span>
                <span class="dot"></span>
                <span>Personas</span>
            </div>
            <div class="editorial-divider"></div>
        </header>

        <!-- Hero Section -->
        <section class="hero-section">
            <!-- Featured Article -->
            <?php if ($featured_post) : $post = $featured_post[0]; setup_postdata($post); ?>
            <article class="featured-article" onclick="window.location='<?php the_permalink(); ?>'">
                <div class="featured-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/placeholder-tech.jpg" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <?php $category = get_the_category(); if ($category) : ?>
                        <span class="featured-category"><?php echo $category[0]->name; ?></span>
                    <?php endif; ?>
                </div>
                <h2 class="featured-title"><?php the_title(); ?></h2>
                <p class="featured-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                <div class="featured-meta">
                    <span>👤 <?php the_author(); ?></span>
                    <span>📅 <?php echo get_the_date('j M Y'); ?></span>
                    <span>⏱️ <?php echo ceil(str_word_count(get_the_content()) / 200); ?> min</span>
                </div>
            </article>
            <?php wp_reset_postdata(); endif; ?>

            <!-- Sidebar -->
            <aside class="sidebar-section">
                <h2>Más Noticias</h2>
                <?php foreach ($sidebar_posts as $post) : setup_postdata($post); ?>
                <article class="sidebar-article" onclick="window.location='<?php the_permalink(); ?>'">
                    <div class="sidebar-thumb">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php else : ?>
                            <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/placeholder-tech.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="sidebar-content">
                        <?php $category = get_the_category(); if ($category) : ?>
                            <div class="sidebar-category"><?php echo $category[0]->name; ?></div>
                        <?php endif; ?>
                        <h3 class="sidebar-title"><?php the_title(); ?></h3>
                        <div class="sidebar-meta">
                            <span><?php echo get_the_date('j M'); ?></span>
                            <span>⏱️ <?php echo ceil(str_word_count(get_the_content()) / 200); ?> min</span>
                        </div>
                    </div>
                </article>
                <?php endforeach; wp_reset_postdata(); ?>
            </aside>
        </section>

        <!-- Category Filter -->
        <div class="category-filter">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="category-pill active">Todos</a>
            <?php foreach ($categories as $cat) : ?>
                <a href="<?php echo get_category_link($cat->term_id); ?>" class="category-pill"><?php echo $cat->name; ?></a>
            <?php endforeach; ?>
        </div>

        <!-- Articles Grid -->
        <div class="articles-grid">
            <?php foreach ($grid_posts as $post) : setup_postdata($post); ?>
            <article class="article-card" onclick="window.location='<?php the_permalink(); ?>'">
                <div class="card-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large'); ?>
                    <?php else : ?>
                        <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/placeholder-tech.jpg" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <?php $category = get_the_category(); if ($category) : ?>
                        <span class="card-category"><?php echo $category[0]->name; ?></span>
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <h3 class="card-title"><?php the_title(); ?></h3>
                    <p class="card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <div class="card-meta">
                        <span><?php the_author(); ?></span>
                        <span><?php echo get_the_date('j M Y'); ?></span>
                        <span>⏱️ <?php echo ceil(str_word_count(get_the_content()) / 200); ?> min</span>
                    </div>
                </div>
            </article>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </main>

    <!-- Opinion Section -->
    <section class="opinion-section">
        <div class="opinion-inner">
            <h2 class="opinion-title">Opinión</h2>
            <div class="opinion-divider"></div>
            <div class="opinion-card">
                <span class="opinion-quote-icon">"</span>
                <blockquote class="opinion-quote">
                    La verdadera transformación digital no es sobre tecnología, es sobre personas.
                    Las empresas que lo entienden son las que liderarán la próxima década.
                </blockquote>
                <div class="opinion-author">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8119-scaled.jpg" alt="Mayte Tortosa">
                    <div>
                        <p class="opinion-author-name">Mayte Tortosa</p>
                        <p class="opinion-author-role">CEO, Proportione</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="newsletter-inner">
            <div class="newsletter-icon">✉️</div>
            <h2 class="newsletter-title">NEWSLETTER SEMANAL</h2>
            <p class="newsletter-text">Recibe cada lunes las noticias más relevantes sobre IA, estrategia y transformación digital</p>
            <form class="newsletter-form" action="#" method="post">
                <input type="email" class="newsletter-input" placeholder="tu@email.com" required>
                <button type="submit" class="newsletter-btn">SUSCRIBIRME →</button>
            </form>
            <p class="newsletter-privacy">Sin spam. Cancela cuando quieras. Tus datos están protegidos.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="blog-footer">
        <div class="blog-footer-inner">
            <div class="footer-brand">
                <h3>Proportione</h3>
                <p class="tagline">Estrategia · Tecnología · Personas</p>
                <p>Tu fuente de conocimiento sobre IA, transformación digital y estrategia empresarial.</p>
            </div>
            <div class="footer-col">
                <h4>Compañía</h4>
                <ul>
                    <li><a href="/nosotros/">Sobre Nosotros</a></li>
                    <li><a href="/nosotros/#equipo">Equipo</a></li>
                    <li><a href="/contacto/">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contenido</h4>
                <ul>
                    <li><a href="/blog/">Artículos</a></li>
                    <li><a href="/investigacion/">Investigación</a></li>
                    <li><a href="#newsletter">Newsletter</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Síguenos</h4>
                <div class="footer-social">
                    <a href="https://linkedin.com/company/proportione" target="_blank">in</a>
                    <a href="https://twitter.com/proportione" target="_blank">𝕏</a>
                    <a href="mailto:info@proportione.com">✉</a>
                </div>
                <ul>
                    <li><a href="/politica-privacidad/">Política de Privacidad</a></li>
                    <li><a href="/politica-cookies/">Cookies</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© <?php echo date('Y'); ?> Proportione. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">↑</button>
</div>

<script>
// Show/hide scroll to top button
window.addEventListener('scroll', function() {
    const btn = document.querySelector('.scroll-top');
    if (window.scrollY > 500) {
        btn.classList.add('visible');
    } else {
        btn.classList.remove('visible');
    }
});
</script>

<?php get_footer(); ?>
