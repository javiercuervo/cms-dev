<?php
/**
 * Página de Servicios - Proportione
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();
?>

<style>
:root {
    --color-granate: #5F322F;
    --color-verde: #6E8157;
    --color-verde-medio: #566E30;
    --color-crema: #F5F0E6;
    --color-blanco: #FFFFFF;
    --font-titulo: 'Josefin Sans', 'Georgia', serif;
    --font-cuerpo: 'Raleway', sans-serif;
    --max-width: 1200px;
    --spacing-section: 60px;
}

@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&family=Raleway:wght@300;400;500;600&display=swap');

/* Hero Section */
.servicios-hero {
    position: relative;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.servicios-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.servicios-hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%);
}

.servicios-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--color-granate);
    opacity: 0.7;
}

.servicios-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 0 24px;
    max-width: 900px;
}

.servicios-hero h1 {
    font-family: var(--font-titulo);
    font-size: clamp(36px, 6vw, 60px);
    font-weight: 600;
    color: #FFFFFF;
    margin: 0 0 16px 0;
}

.servicios-hero p {
    font-family: var(--font-cuerpo);
    font-size: clamp(18px, 3vw, 24px);
    color: rgba(255,255,255,0.9);
    font-weight: 300;
    margin: 0;
}

/* Intro Section */
.servicios-intro {
    background: var(--color-blanco);
    padding: var(--spacing-section) 24px;
}

.servicios-intro-inner {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.servicios-intro h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 24px 0;
}

.servicios-intro p {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    line-height: 1.7;
    color: #555;
    margin: 0;
}

/* Services Grid */
.servicios-grid-section {
    background: var(--color-crema);
    padding: var(--spacing-section) 24px;
}

.servicios-grid-inner {
    max-width: var(--max-width);
    margin: 0 auto;
}

.servicios-grid-inner h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 48px 0;
}

.servicios-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.servicio-card {
    background: var(--color-blanco);
    padding: 32px 24px;
    border-radius: 8px;
    border-top: 4px solid var(--color-granate);
    transition: all 0.3s ease;
}

.servicio-card:hover {
    border-top-color: var(--color-verde);
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}

.servicio-card .icon {
    color: var(--color-granate);
    margin-bottom: 16px;
    transition: color 0.3s ease;
}

.servicio-card:hover .icon {
    color: var(--color-verde);
}

.servicio-card h3 {
    font-family: var(--font-titulo);
    font-size: 20px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 12px 0;
}

.servicio-card p {
    font-family: var(--font-cuerpo);
    font-size: 15px;
    line-height: 1.6;
    color: #666;
    margin: 0 0 16px 0;
}

.servicio-card a {
    font-family: var(--font-cuerpo);
    font-size: 14px;
    font-weight: 500;
    color: var(--color-verde);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: gap 0.3s ease;
}

.servicio-card a:hover {
    gap: 8px;
}

/* Methodology Section */
.metodologia-section {
    background: var(--color-blanco);
    padding: var(--spacing-section) 24px;
}

.metodologia-inner {
    max-width: 1100px;
    margin: 0 auto;
}

.metodologia-inner h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 48px 0;
}

.fases-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
}

.fase-card {
    text-align: center;
}

.fase-numero {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: var(--color-crema);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-family: var(--font-titulo);
    font-size: 24px;
    font-weight: 700;
    color: var(--color-granate);
}

.fase-icon {
    color: var(--color-verde);
    margin-bottom: 12px;
}

.fase-card h3 {
    font-family: var(--font-titulo);
    font-size: 20px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 8px 0;
}

.fase-card p {
    font-family: var(--font-cuerpo);
    font-size: 15px;
    line-height: 1.6;
    color: #666;
    margin: 0;
}

/* Model Section (20-60-20) */
.modelo-section {
    background: var(--color-crema);
    padding: var(--spacing-section) 24px;
}

.modelo-inner {
    max-width: 900px;
    margin: 0 auto;
}

.modelo-inner h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 48px 0;
}

.modelo-blocks {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 32px;
}

.modelo-block {
    padding: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
}

.modelo-block.verde {
    background: var(--color-verde);
    color: #FFFFFF;
}

.modelo-block.granate {
    background: var(--color-granate);
    color: #FFFFFF;
    transform: scale(1.03);
    box-shadow: 0 8px 32px rgba(95, 50, 47, 0.3);
    padding: 48px 32px;
}

.modelo-block .porcentaje {
    font-family: var(--font-titulo);
    font-size: clamp(48px, 8vw, 72px);
    font-weight: 700;
}

.modelo-block .descripcion {
    text-align: right;
}

.modelo-block .descripcion h3 {
    font-family: var(--font-titulo);
    font-size: clamp(20px, 3vw, 28px);
    font-weight: 600;
    margin: 0 0 4px 0;
}

.modelo-block.granate .descripcion h3 {
    color: var(--color-verde);
}

.modelo-block .descripcion p {
    font-family: var(--font-cuerpo);
    font-size: 16px;
    margin: 0;
    opacity: 0.9;
}

.modelo-footer {
    text-align: center;
    font-family: var(--font-cuerpo);
    font-size: 18px;
    line-height: 1.7;
    color: #555;
    max-width: 800px;
    margin: 0 auto;
}

/* Differentiators Section - Redesign */
.diferenciadores-section {
    background: linear-gradient(135deg, var(--color-crema) 0%, #FFFFFF 100%);
    padding: 80px 24px;
    position: relative;
    overflow: hidden;
}

.diferenciadores-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(110,129,87,0.08) 0%, transparent 70%);
    pointer-events: none;
}

.diferenciadores-inner {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.diferenciadores-inner h2 {
    font-family: var(--font-titulo);
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 700;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 16px 0;
    letter-spacing: -0.02em;
}

.diferenciadores-subtitle {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    color: #666;
    text-align: center;
    margin: 0 0 60px 0;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.diferenciadores-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
}

.diferenciador-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 4px 20px rgba(95, 50, 47, 0.06);
    border: 1px solid rgba(95, 50, 47, 0.08);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease forwards;
}

.diferenciador-card:nth-child(1) { animation-delay: 0.1s; }
.diferenciador-card:nth-child(2) { animation-delay: 0.2s; }
.diferenciador-card:nth-child(3) { animation-delay: 0.3s; }
.diferenciador-card:nth-child(4) { animation-delay: 0.4s; }
.diferenciador-card:nth-child(5) { animation-delay: 0.5s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.diferenciador-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--color-verde) 0%, var(--color-granate) 100%);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
}

.diferenciador-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(95, 50, 47, 0.12);
}

.diferenciador-card:hover::before {
    transform: scaleX(1);
}

.diferenciador-icon {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--color-verde) 0%, var(--color-verde-medio) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.diferenciador-card:hover .diferenciador-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 8px 20px rgba(110, 129, 87, 0.3);
}

.diferenciador-icon svg {
    width: 28px;
    height: 28px;
    color: #FFFFFF;
}

.diferenciador-card h3 {
    font-family: var(--font-titulo);
    font-size: 22px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 12px 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.diferenciador-card h3 .arrow {
    color: var(--color-verde);
    transition: transform 0.3s ease;
    font-size: 18px;
}

.diferenciador-card:hover h3 .arrow {
    transform: translateX(6px);
}

.diferenciador-card p {
    font-family: var(--font-cuerpo);
    font-size: 16px;
    color: #555;
    margin: 0;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .diferenciadores-grid {
        grid-template-columns: 1fr;
    }
    .diferenciador-card {
        padding: 24px;
    }
}

/* CTA Section */
.cta-section {
    background: var(--color-granate);
    padding: var(--spacing-section) 24px;
    text-align: center;
}

.cta-inner {
    max-width: 700px;
    margin: 0 auto;
}

.cta-section h2 {
    font-family: var(--font-titulo);
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--color-crema);
    margin: 0 0 24px 0;
}

.cta-section p {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    color: rgba(255,255,255,0.9);
    margin: 0 0 32px 0;
}

.cta-btn {
    display: inline-block;
    background: var(--color-verde);
    color: #FFFFFF;
    padding: 16px 40px;
    border-radius: 8px;
    font-family: var(--font-cuerpo);
    font-size: 18px;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.3s ease;
}

.cta-btn:hover {
    background: var(--color-verde-medio);
}

/* Responsive */
@media (max-width: 1024px) {
    .servicios-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .fases-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .servicios-grid {
        grid-template-columns: 1fr;
    }
    .fases-grid {
        grid-template-columns: 1fr;
    }
    .modelo-block {
        flex-direction: column;
        text-align: center;
    }
    .modelo-block .descripcion {
        text-align: center;
    }
}
</style>

<!-- Hero Section -->
<section class="servicios-hero">
    <div class="servicios-hero-bg">
        <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_9291-3-scaled.jpg" alt="Equipo trabajando">
        <div class="servicios-hero-overlay"></div>
    </div>
    <div class="servicios-hero-content">
        <h1 style="color: #FFFFFF !important;">Servicios que transforman</h1>
        <p>Estrategia, tecnología e impulso de personas para un crecimiento digital sostenible</p>
    </div>
</section>

<!-- Intro Section -->
<section class="servicios-intro">
    <div class="servicios-intro-inner">
        <h2>No somos una fábrica de herramientas genéricas</h2>
        <p>Somos consultores implementadores que trabajan en tu propio ecosistema tecnológico. Diseñamos estrategias personalizadas, las implementamos contigo y transferimos el conocimiento a tu equipo. Sin dependencias. Con resultados medibles. Descubre <a href="/metodologia/" style="color: var(--color-verde); font-weight: 500;">nuestra metodología de trabajo</a> y conoce al <a href="/nosotros/" style="color: var(--color-verde); font-weight: 500;">equipo Proportione</a>.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="servicios-grid-section">
    <div class="servicios-grid-inner">
        <h2>Nuestros servicios</h2>
        <div class="servicios-grid">
            <!-- Servicio 1 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                </div>
                <h3>Transformación Digital Estratégica</h3>
                <p>Hojas de ruta personalizadas, identificación de pilotos de alto impacto y modelos de gobierno de IA alineados con tus objetivos de negocio.</p>
                <a href="/estrategia-transformacion-digital/">Estrategia de transformación digital →</a>
            </div>

            <!-- Servicio 2 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a9 9 0 0 0-9 9c0 3.6 3.4 6.2 9 11 5.6-4.8 9-7.4 9-11a9 9 0 0 0-9-9z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3>Inteligencia Artificial y Automatización</h3>
                <p>Casos de uso de IA generativa, trabajo intelectual asistido (modelo 20-60-20) y automatización de procesos con cuadros de mando integrados.</p>
                <a href="/ia-generativa/">Inteligencia artificial generativa →</a>
            </div>

            <!-- Servicio 3 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>
                <h3>Ecommerce Inteligente</h3>
                <p>Partner Shopify Plus en España y Portugal. Estrategia D2C, omnicanal, IA aplicada al comercio y análisis de comportamiento.</p>
                <a href="/estrategia-omnicanal-retail/">Estrategia omnicanal para retail →</a>
            </div>

            <!-- Servicio 4 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3>Marketplaces Locales</h3>
                <p>Plataformas que proyectan lo local en lo digital. Ecosistemas que conectan vendedores de proximidad con clientes globales.</p>
                <a href="/contacto/">Consulta este servicio →</a>
            </div>

            <!-- Servicio 5 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Desarrollo de Personas y Liderazgo</h3>
                <p>Programas de talento, coaching ejecutivo, digitalización de RRHH y gestión del cambio humanizada.</p>
                <a href="/consultoria-gestion-negocio/">Consultoría de gestión de negocio →</a>
            </div>

            <!-- Servicio 6 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </div>
                <h3>Digitalización de Operaciones</h3>
                <p>Edificios inteligentes, IoT, cuadros de mando integrados y reporting automatizado para la toma de decisiones.</p>
                <a href="/estrategia-transformacion-digital/">Transformación digital de operaciones →</a>
            </div>

            <!-- Servicio 7 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                </div>
                <h3>Aprendizaje y Educación</h3>
                <p>Rediseño de itinerarios formativos, plataformas LMS accesibles y estrategias de captación para instituciones educativas.</p>
                <a href="/estrategia-innovacion/">Estrategia de innovación educativa →</a>
            </div>

            <!-- Servicio 8 -->
            <div class="servicio-card">
                <div class="icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3>Peritaje Forense</h3>
                <p>Análisis forense de incidentes, investigación de brechas de seguridad y peritaje judicial especializado.</p>
                <a href="/contacto/">Consulta este servicio →</a>
            </div>
        </div>
    </div>
</section>

<!-- Methodology Section -->
<section class="metodologia-section">
    <div class="metodologia-inner">
        <h2>Cómo trabajamos: 4 fases</h2>
        <div class="fases-grid">
            <!-- Fase 1 -->
            <div class="fase-card">
                <div class="fase-numero">01</div>
                <div class="fase-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <h3>Diagnosticar</h3>
                <p>Escuchamos y entendemos lo que ya existe. Mapeamos procesos, sistemas y cultura.</p>
            </div>

            <!-- Fase 2 -->
            <div class="fase-card">
                <div class="fase-numero">02</div>
                <div class="fase-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                        <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                        <path d="M2 2l7.586 7.586"></path>
                        <circle cx="11" cy="11" r="2"></circle>
                    </svg>
                </div>
                <h3>Diseñar</h3>
                <p>Co-creamos soluciones personalizadas. Blueprint técnico y roadmap de implantación.</p>
            </div>

            <!-- Fase 3 -->
            <div class="fase-card">
                <div class="fase-numero">03</div>
                <div class="fase-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                        <path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                        <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                        <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                    </svg>
                </div>
                <h3>Desplegar</h3>
                <p>Implementación ágil junto a tus equipos. Pilotos, MVPs y quick wins visibles.</p>
            </div>

            <!-- Fase 4 -->
            <div class="fase-card">
                <div class="fase-numero">04</div>
                <div class="fase-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 17a4 4 0 0 0 8 0c0-2-3-4-8-9-5 5-8 7-8 9a4 4 0 0 0 8 0"></path>
                    </svg>
                </div>
                <h3>Acompañar</h3>
                <p>Formación, soporte y transferencia de conocimiento. Tu equipo gana autonomía.</p>
            </div>
        </div>
    </div>
</section>

<!-- Model Section (20-60-20) -->
<section class="modelo-section">
    <div class="modelo-inner">
        <h2>El framework Human-Centric AI</h2>
        <div class="modelo-blocks">
            <!-- 20% Tu equipo define -->
            <div class="modelo-block verde">
                <div class="porcentaje">20%</div>
                <div class="descripcion">
                    <h3>Tu equipo define</h3>
                    <p>Contexto y estrategia</p>
                </div>
            </div>

            <!-- 60% La IA trabaja -->
            <div class="modelo-block granate">
                <div class="porcentaje">60%</div>
                <div class="descripcion">
                    <h3 style="color: #6E8157 !important;">La IA trabaja</h3>
                    <p>Tareas repetitivas</p>
                </div>
            </div>

            <!-- 20% Tu equipo valida -->
            <div class="modelo-block verde">
                <div class="porcentaje">20%</div>
                <div class="descripcion">
                    <h3>Tu equipo valida</h3>
                    <p>Calidad y decisiones</p>
                </div>
            </div>
        </div>
        <p class="modelo-footer">La inteligencia artificial hace el trabajo pesado. Tus personas aportan la inteligencia que importa: la humana.</p>
    </div>
</section>

<!-- Differentiators Section -->
<section class="diferenciadores-section">
    <div class="diferenciadores-inner">
        <h2>Por qué elegirnos</h2>
        <p class="diferenciadores-subtitle">Consultores que implementan. Resultados que perduran.</p>

        <div class="diferenciadores-grid">
            <!-- Card 1: Tu stack -->
            <div class="diferenciador-card">
                <div class="diferenciador-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3>Trabajamos en tu stack <span class="arrow">→</span></h3>
                <p>Usamos las herramientas que ya conoces, no imponemos tecnología nueva.</p>
            </div>

            <!-- Card 2: Tu equipo -->
            <div class="diferenciador-card">
                <div class="diferenciador-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Tu equipo es protagonista <span class="arrow">→</span></h3>
                <p>Co-creamos desde el inicio, no ejecutamos proyectos lejanos.</p>
            </div>

            <!-- Card 3: Transferimos capacidad -->
            <div class="diferenciador-card">
                <div class="diferenciador-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        <line x1="12" y1="6" x2="12" y2="12"></line>
                        <line x1="9" y1="9" x2="15" y2="9"></line>
                    </svg>
                </div>
                <h3>Transferimos capacidad <span class="arrow">→</span></h3>
                <p>Dejamos conocimiento en casa, no dependencia de consultores.</p>
            </div>

            <!-- Card 4: Métricas claras -->
            <div class="diferenciador-card">
                <div class="diferenciador-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </div>
                <h3>Métricas claras <span class="arrow">→</span></h3>
                <p>Todo tiene KPIs y dashboards desde el día 1.</p>
            </div>

            <!-- Card 5: Implementación ligera -->
            <div class="diferenciador-card">
                <div class="diferenciador-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                </div>
                <h3>Implementación ligera <span class="arrow">→</span></h3>
                <p>Simplicidad y escalabilidad sobre complejidad.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-inner">
        <h2>¿Listo para transformar tu negocio?</h2>
        <p>Hablemos de cómo podemos ayudarte a alcanzar tus objetivos de transformación digital.</p>
        <a href="/contacto/" class="cta-btn">Solicita una consulta</a>
    </div>
</section>

<!-- Footer -->
<footer class="site-footer" style="background:#FFFFFF; padding:40px 50px; margin-top:0; border-top: 1px solid #E5E5E5;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
        <div style="display:flex; align-items:center; gap:20px;">
            <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-nbg2.png" alt="Proportione" style="max-width:200px; height:auto;">
        </div>
        <div style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
            <a href="/politica-de-privacidad" style="color:#5F322F; text-decoration:none; font-family:'Raleway',sans-serif; font-size:14px;">Política de Privacidad</a>
            <span style="color:#5F322F; margin:0 8px;">|</span>
            <a href="/politica-de-cookies" style="color:#5F322F; text-decoration:none; font-family:'Raleway',sans-serif; font-size:14px;">Política de cookies</a>
        </div>
        <div>
            <p style="color:#5F322F; margin:0; font-family:'Raleway',sans-serif;">© 2026 Proportione</p>
        </div>
    </div>
</footer>

<?php get_footer(); ?>
