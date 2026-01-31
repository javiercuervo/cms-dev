<?php
/**
 * Página Clientes - Proportione
 * Confían en Proportione
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();
?>

<style>
:root {
    --color-granate: #5F322F;
    --color-verde: #6E8157;
    --color-verde-hover: #566E30;
    --color-crema: #F5F0E6;
    --color-blanco: #FFFFFF;
    --color-texto: #333333;
    --font-titulo: 'Georgia', serif;
    --font-cuerpo: 'Raleway', sans-serif;
    --max-width: 1200px;
}

/* ANIMACIONES */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-60px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(60px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* HERO SECTION */
.clientes-hero {
    position: relative;
    min-height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-granate) 0%, #3D1F1C 100%);
    overflow: hidden;
}

.clientes-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 200%;
    background: radial-gradient(ellipse, rgba(110, 129, 87, 0.15) 0%, transparent 70%);
    pointer-events: none;
}

.clientes-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 80px 24px;
    max-width: 900px;
}

.clientes-hero h1 {
    font-family: var(--font-titulo);
    font-size: clamp(36px, 6vw, 64px);
    font-weight: 700;
    color: #FFFFFF;
    margin: 0 0 24px;
    line-height: 1.1;
    animation: fadeInUp 0.8s ease forwards;
}

.clientes-hero p {
    font-family: var(--font-cuerpo);
    font-size: clamp(18px, 2.5vw, 22px);
    color: #FFFFFF;
    margin: 0;
    opacity: 0.95;
    line-height: 1.6;
    animation: fadeInUp 0.8s ease 0.2s forwards;
    opacity: 0;
}

/* ESTADÍSTICAS */
.stats-section {
    background: var(--color-blanco);
    padding: 60px 24px;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.stats-container {
    max-width: var(--max-width);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
}

@media (max-width: 768px) {
    .stats-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

.stat-item {
    text-align: center;
    padding: 24px;
    animation: fadeInScale 0.6s ease forwards;
    opacity: 0;
}

.stat-item:nth-child(1) { animation-delay: 0.1s; }
.stat-item:nth-child(2) { animation-delay: 0.2s; }
.stat-item:nth-child(3) { animation-delay: 0.3s; }
.stat-item:nth-child(4) { animation-delay: 0.4s; }

.stat-number {
    font-family: var(--font-titulo);
    font-size: clamp(36px, 5vw, 56px);
    font-weight: 700;
    color: var(--color-granate);
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    font-family: var(--font-cuerpo);
    font-size: 14px;
    color: var(--color-texto);
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

/* SECCIÓN LOGOS */
.logos-section {
    background: var(--color-crema);
    padding: 80px 24px;
}

.logos-container {
    max-width: var(--max-width);
    margin: 0 auto;
}

.logos-header {
    text-align: center;
    margin-bottom: 60px;
}

.logos-header h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 42px);
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 16px;
    animation: slideInLeft 0.8s ease forwards;
}

.logos-header p {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    color: var(--color-texto);
    max-width: 600px;
    margin: 0 auto;
    animation: slideInRight 0.8s ease 0.2s forwards;
    opacity: 0;
}

.logos-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
}

@media (max-width: 1024px) {
    .logos-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .logos-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
}

.logo-card {
    background: var(--color-blanco);
    border-radius: 12px;
    padding: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 140px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.04);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInScale 0.6s ease forwards;
    opacity: 0;
}

.logo-card:nth-child(1) { animation-delay: 0.1s; }
.logo-card:nth-child(2) { animation-delay: 0.15s; }
.logo-card:nth-child(3) { animation-delay: 0.2s; }
.logo-card:nth-child(4) { animation-delay: 0.25s; }
.logo-card:nth-child(5) { animation-delay: 0.3s; }
.logo-card:nth-child(6) { animation-delay: 0.35s; }
.logo-card:nth-child(7) { animation-delay: 0.4s; }
.logo-card:nth-child(8) { animation-delay: 0.45s; }
.logo-card:nth-child(9) { animation-delay: 0.5s; }
.logo-card:nth-child(10) { animation-delay: 0.55s; }
.logo-card:nth-child(11) { animation-delay: 0.6s; }
.logo-card:nth-child(12) { animation-delay: 0.65s; }

.logo-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 16px 48px rgba(95, 50, 47, 0.15);
}

.logo-card img {
    max-width: 100%;
    max-height: 80px;
    width: auto;
    height: auto;
    object-fit: contain;
    filter: grayscale(30%);
    transition: filter 0.4s ease;
}

.logo-card:hover img {
    filter: grayscale(0%);
}

/* TESTIMONIAL */
.testimonial-section {
    background: var(--color-blanco);
    padding: 100px 24px;
}

.testimonial-container {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.testimonial-quote {
    font-family: var(--font-titulo);
    font-size: clamp(24px, 3.5vw, 36px);
    font-style: italic;
    color: var(--color-granate);
    line-height: 1.5;
    margin: 0 0 32px;
    position: relative;
    animation: fadeInUp 0.8s ease forwards;
}

.testimonial-quote::before {
    content: '"';
    font-size: 120px;
    position: absolute;
    top: -40px;
    left: -20px;
    color: var(--color-verde);
    opacity: 0.2;
    font-family: Georgia, serif;
    line-height: 1;
}

.testimonial-author {
    animation: fadeInUp 0.8s ease 0.3s forwards;
    opacity: 0;
}

.testimonial-author-name {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    font-weight: 600;
    color: var(--color-texto);
    margin: 0;
}

.testimonial-author-role {
    font-family: var(--font-cuerpo);
    font-size: 14px;
    color: var(--color-verde);
    margin: 4px 0 0;
}

/* CTA SECTION */
.cta-section {
    background: linear-gradient(135deg, var(--color-verde) 0%, var(--color-verde-hover) 100%);
    padding: 80px 24px;
    text-align: center;
}

.cta-container {
    max-width: 700px;
    margin: 0 auto;
}

.cta-section h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 42px);
    font-weight: 600;
    color: #FFFFFF;
    margin: 0 0 16px;
    animation: fadeInUp 0.8s ease forwards;
}

.cta-section p {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    color: #FFFFFF;
    opacity: 0.95;
    margin: 0 0 32px;
    animation: fadeInUp 0.8s ease 0.2s forwards;
    opacity: 0;
}

.cta-button {
    display: inline-block;
    background: #FFFFFF;
    color: var(--color-granate);
    font-family: var(--font-cuerpo);
    font-size: 16px;
    font-weight: 600;
    padding: 16px 40px;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s ease;
    animation: fadeInScale 0.6s ease 0.4s forwards;
    opacity: 0;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
}

/* PARTNERS */
.partners-section {
    background: var(--color-crema);
    padding: 60px 24px;
}

.partners-container {
    max-width: var(--max-width);
    margin: 0 auto;
    text-align: center;
}

.partners-title {
    font-family: var(--font-cuerpo);
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--color-texto);
    margin: 0 0 32px;
    opacity: 0.7;
}

.partners-logos {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 48px;
    flex-wrap: wrap;
}

.partners-logos img {
    height: 40px;
    width: auto;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}

.partners-logos img:hover {
    opacity: 1;
}

/* RESPONSIVE */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
    }
}
</style>

<div class="clientes-page">
    <!-- Hero Section -->
    <section class="clientes-hero">
        <div class="clientes-hero-content">
            <h1>Confían en Proportione</h1>
            <p>Empresas líderes que han elegido nuestra metodología para su transformación digital y crecimiento estratégico</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">+50</div>
                <div class="stat-label">Proyectos</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">12</div>
                <div class="stat-label">Años de experiencia</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">95%</div>
                <div class="stat-label">Satisfacción</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">6</div>
                <div class="stat-label">Países</div>
            </div>
        </div>
    </section>

    <!-- Logos Section -->
    <section class="logos-section">
        <div class="logos-container">
            <div class="logos-header">
                <h2>Nuestros clientes</h2>
                <p>Desde startups hasta grandes corporaciones, acompañamos a organizaciones en su camino hacia la excelencia digital</p>
            </div>
            <div class="logos-grid">
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/MAWDY-_-MAPFRE-Asistencia.png" alt="MAWDY - MAPFRE Asistencia">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Sparkassen.png" alt="Sparkassen">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Sngular.png" alt="Sngular">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Mensoft.png" alt="Mensoft">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/EAE-Business-School.png" alt="EAE Business School">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Universidad-UNIE.png" alt="Universidad UNIE">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Grado-LEINN.png" alt="Grado LEINN">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Fundacion-Prodis.png" alt="Fundación Prodis">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Cartagena-Puerto-de-Culturas.png" alt="Cartagena Puerto de Culturas">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Naranjas-Perdine.png" alt="Naranjas Perdine">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Farma-54.png" alt="Farma 54">
                </div>
                <div class="logo-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2024/01/proportione-agencia-shopify-plus-partner-.png" alt="Shopify Plus Partner" style="max-height: 50px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="testimonial-container">
            <blockquote class="testimonial-quote">
                Proportione nos ayudó a entender que la transformación digital no es solo tecnología, sino un cambio cultural profundo. Su metodología nos permitió avanzar sin traumas.
            </blockquote>
            <div class="testimonial-author">
                <p class="testimonial-author-name">Director de Innovación</p>
                <p class="testimonial-author-role">Empresa del sector financiero</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-container">
            <h2>¿Quieres ser el próximo caso de éxito?</h2>
            <p>Hablemos sobre cómo podemos ayudarte a alcanzar tus objetivos de transformación digital</p>
            <a href="/contacto/" class="cta-button">Contactar ahora</a>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners-section">
        <div class="partners-container">
            <p class="partners-title">Partners tecnológicos</p>
            <div class="partners-logos">
                <img src="https://staging19.proportione.com/wp-content/uploads/2024/01/proportione-agencia-shopify-plus-partner-.png" alt="Shopify Plus Partner">
                <img src="https://staging19.proportione.com/wp-content/uploads/2024/02/beneficios_hubspot.png" alt="HubSpot Partner">
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
