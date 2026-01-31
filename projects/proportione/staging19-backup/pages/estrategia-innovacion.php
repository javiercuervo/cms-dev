<?php
/**
 * Estrategia de Innovación - Proportione
 * Diseño premium estilo landing page de consultoría
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();
?>

<style>
/* ============================================
   ESTRATEGIA DE INNOVACIÓN - Page Styles
   ============================================ */

@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Raleway:wght@300;400;500;600&display=swap');

:root {
    --granate: #5F322F;
    --verde: #6E8157;
    --verde-hover: #566E30;
    --crema: #F5F0E6;
    --gris-oscuro: #333333;
    --gris-medio: #666666;
    --blanco: #FFFFFF;
}

.ei-container {
    font-family: 'Raleway', sans-serif;
    background: var(--blanco);
    overflow-x: hidden;
}

/* ============================================
   HERO SECTION
   ============================================ */
.ei-hero {
    position: relative;
    height: 100vh;
    min-height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.ei-hero-bg {
    position: absolute;
    inset: 0;
    background-image: url('https://staging19.proportione.com/wp-content/uploads/2023/07/Golden_Ratio_Innovation_Strategy.png');
    background-size: cover;
    background-position: center;
    animation: heroZoom 1.2s ease-out forwards;
}

@keyframes heroZoom {
    from { transform: scale(1.1); }
    to { transform: scale(1); }
}

.ei-hero-overlay {
    position: absolute;
    inset: 0;
    background: var(--granate);
    opacity: 0.7;
}

.ei-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 0 24px;
    max-width: 900px;
}

.ei-breadcrumb {
    font-size: 14px;
    color: rgba(255,255,255,0.8);
    margin-bottom: 32px;
    animation: fadeInDown 0.6s ease 0.2s both;
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.ei-hero h1 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(40px, 8vw, 72px);
    font-weight: 700;
    color: var(--blanco);
    margin: 0 0 24px 0;
    line-height: 1.1;
    animation: fadeInUp 0.8s ease 0.4s both;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.ei-hero-subtitle {
    font-size: clamp(18px, 3vw, 24px);
    font-weight: 300;
    color: rgba(255,255,255,0.9);
    margin: 0;
    animation: fadeInUp 0.8s ease 0.6s both;
}

.ei-scroll-indicator {
    position: absolute;
    bottom: 48px;
    left: 50%;
    transform: translateX(-50%);
    color: rgba(255,255,255,0.8);
    font-size: 32px;
    animation: bounce 2s infinite;
    cursor: pointer;
}

@keyframes bounce {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(10px); }
}

/* ============================================
   INTRO SECTION
   ============================================ */
.ei-intro {
    padding: 80px 24px;
    background: var(--blanco);
}

.ei-intro-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr;
    gap: 48px;
    align-items: center;
}

@media (min-width: 1024px) {
    .ei-intro-inner {
        grid-template-columns: 60% 40%;
    }
}

.ei-intro-text {
    font-size: 18px;
    line-height: 1.8;
    color: var(--gris-oscuro);
    font-weight: 300;
}

.ei-intro-text .drop-cap {
    float: left;
    font-family: 'Oswald', sans-serif;
    font-size: 80px;
    font-weight: 700;
    line-height: 0.7;
    margin-right: 12px;
    margin-top: 8px;
    color: var(--verde);
}

.ei-quote {
    margin-top: 48px;
    padding-left: 24px;
    border-left: 4px solid var(--verde);
}

.ei-quote p {
    font-size: clamp(20px, 3vw, 28px);
    font-style: italic;
    color: var(--granate);
    font-weight: 300;
    margin: 0 0 12px 0;
}

.ei-quote cite {
    font-size: 16px;
    color: var(--verde);
    font-weight: 600;
    font-style: normal;
}

.ei-intro-visual {
    display: flex;
    align-items: center;
    justify-content: center;
}

.ei-icon-circle {
    position: relative;
    background: linear-gradient(135deg, var(--verde), var(--verde-hover));
    border-radius: 50%;
    padding: 64px;
    box-shadow: 0 20px 60px rgba(110,129,87,0.3);
}

.ei-icon-circle::before {
    content: '';
    position: absolute;
    inset: -20px;
    background: var(--verde);
    opacity: 0.1;
    border-radius: 50%;
    filter: blur(40px);
    animation: pulse 4s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

.ei-icon-circle svg {
    width: 128px;
    height: 128px;
    color: white;
}

/* ============================================
   DEFINITION CARD
   ============================================ */
.ei-definition {
    padding: 80px 24px;
    background: var(--crema);
}

.ei-definition-card {
    max-width: 900px;
    margin: 0 auto;
    background: var(--blanco);
    border-radius: 12px;
    padding: 48px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.1);
    border-left: 4px solid var(--verde);
    position: relative;
    overflow: hidden;
}

.ei-definition-card::after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: var(--verde);
    opacity: 0.05;
    transform: rotate(45deg) translate(50%, -50%);
}

.ei-definition-header {
    display: flex;
    gap: 24px;
    align-items: flex-start;
}

.ei-definition-icon {
    flex-shrink: 0;
    background: var(--verde);
    border-radius: 50%;
    padding: 16px;
    box-shadow: 0 8px 24px rgba(110,129,87,0.3);
}

.ei-definition-icon svg {
    width: 32px;
    height: 32px;
    color: white;
}

.ei-definition h2 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 700;
    color: var(--granate);
    margin: 0 0 16px 0;
}

.ei-definition p {
    font-size: 18px;
    line-height: 1.7;
    color: var(--gris-medio);
    font-weight: 300;
    margin: 0;
}

/* ============================================
   PILLARS SECTION
   ============================================ */
.ei-pillars {
    padding: 80px 24px;
    background: var(--blanco);
}

.ei-pillars-inner {
    max-width: 1200px;
    margin: 0 auto;
}

.ei-section-header {
    text-align: center;
    margin-bottom: 64px;
}

.ei-section-header h2 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 700;
    color: var(--granate);
    margin: 0 0 16px 0;
}

.ei-section-header p {
    font-size: 18px;
    color: var(--gris-medio);
    font-weight: 300;
    max-width: 700px;
    margin: 0 auto;
}

.ei-pillars-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
}

.ei-pillars-grid-bottom {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
    margin-top: 24px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.ei-pillar-card {
    position: relative;
    background: var(--blanco);
    border-radius: 12px;
    padding: 32px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    border: 1px solid transparent;
    transition: all 0.3s ease;
    overflow: hidden;
    opacity: 0;
    transform: translateY(30px);
}

.ei-pillar-card.visible {
    animation: cardFadeIn 0.6s ease forwards;
}

.ei-pillar-card:nth-child(1).visible { animation-delay: 0.1s; }
.ei-pillar-card:nth-child(2).visible { animation-delay: 0.2s; }
.ei-pillar-card:nth-child(3).visible { animation-delay: 0.3s; }

@keyframes cardFadeIn {
    to { opacity: 1; transform: translateY(0); }
}

.ei-pillar-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    background: var(--crema);
    border-color: var(--verde);
}

.ei-pillar-number {
    position: absolute;
    top: 24px;
    right: 24px;
    font-family: 'Oswald', sans-serif;
    font-size: 80px;
    font-weight: 700;
    color: var(--granate);
    opacity: 0.05;
    line-height: 1;
}

.ei-pillar-icon {
    background: var(--verde);
    border-radius: 50%;
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    box-shadow: 0 8px 24px rgba(110,129,87,0.3);
    transition: all 0.3s ease;
}

.ei-pillar-card:hover .ei-pillar-icon {
    transform: scale(1.1) rotate(5deg);
    background: var(--verde-hover);
}

.ei-pillar-icon svg {
    width: 28px;
    height: 28px;
    color: white;
}

.ei-pillar-card h3 {
    font-family: 'Oswald', sans-serif;
    font-size: 24px;
    font-weight: 600;
    color: var(--granate);
    margin: 0 0 12px 0;
}

.ei-pillar-card p {
    font-size: 15px;
    line-height: 1.6;
    color: var(--gris-medio);
    font-weight: 300;
    margin: 0;
}

.ei-pillar-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--verde), var(--verde-hover));
    transition: width 0.3s ease;
}

.ei-pillar-card:hover .ei-pillar-bar {
    width: 100%;
}

/* ============================================
   VISUAL BREAK
   ============================================ */
.ei-visual-break {
    position: relative;
    height: 60vh;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.ei-visual-break-bg {
    position: absolute;
    inset: 0;
    background-image: url('https://staging19.proportione.com/wp-content/uploads/2023/07/Cultura_Innovacion_Geometria-1024x574.png');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.ei-visual-break-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(95,50,47,0.9), rgba(95,50,47,0.8), rgba(110,129,87,0.7));
}

.ei-visual-break-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 0 24px;
    max-width: 900px;
}

.ei-visual-break h2 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(32px, 6vw, 56px);
    font-weight: 700;
    color: var(--blanco);
    margin: 0;
    line-height: 1.2;
}

.ei-visual-break-line {
    width: 128px;
    height: 4px;
    background: var(--verde);
    margin: 24px auto 0;
}

/* ============================================
   BENEFITS SECTION
   ============================================ */
.ei-benefits {
    padding: 80px 24px;
    background: var(--crema);
}

.ei-benefits-inner {
    max-width: 1200px;
    margin: 0 auto;
}

.ei-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 48px;
    margin-top: 64px;
}

.ei-stat {
    text-align: center;
}

.ei-stat-value {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(48px, 8vw, 72px);
    font-weight: 700;
    color: var(--verde);
    margin-bottom: 8px;
}

.ei-stat-label {
    font-size: 18px;
    color: var(--granate);
    font-weight: 400;
}

/* ============================================
   CTA SECTION
   ============================================ */
.ei-cta {
    position: relative;
    padding: 100px 24px;
    background: var(--granate);
    overflow: hidden;
}

.ei-cta-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.1;
}

.ei-cta-pattern svg {
    width: 100%;
    height: 100%;
}

.ei-cta-content {
    position: relative;
    z-index: 10;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.ei-cta h2 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(32px, 5vw, 56px);
    font-weight: 700;
    color: var(--blanco);
    margin: 0 0 24px 0;
}

.ei-cta p {
    font-size: 20px;
    color: rgba(255,255,255,0.9);
    font-weight: 300;
    margin: 0 0 40px 0;
}

.ei-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: var(--verde);
    color: var(--blanco);
    padding: 18px 40px;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 8px 24px rgba(110,129,87,0.3);
}

.ei-cta-btn:hover {
    background: var(--verde-hover);
    transform: scale(1.05);
    box-shadow: 0 12px 32px rgba(110,129,87,0.4);
}

.ei-cta-btn svg {
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
}

.ei-cta-btn:hover svg {
    transform: translateX(4px);
}

.ei-cta-email {
    margin-top: 32px;
    font-size: 16px;
    color: rgba(255,255,255,0.7);
}

.ei-cta-email a {
    color: var(--verde);
    text-decoration: underline;
    transition: color 0.3s ease;
}

.ei-cta-email a:hover {
    color: var(--blanco);
}

/* ============================================
   RELATED SERVICES
   ============================================ */
.ei-related {
    padding: 80px 24px;
    background: var(--blanco);
}

.ei-related-inner {
    max-width: 1200px;
    margin: 0 auto;
}

.ei-related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-top: 64px;
}

.ei-related-card {
    position: relative;
    height: 320px;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}

.ei-related-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.ei-related-card:hover img {
    transform: scale(1.1);
}

.ei-related-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(95,50,47,0.95), rgba(95,50,47,0.5), transparent);
}

.ei-related-card-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 24px;
}

.ei-related-card h3 {
    font-family: 'Oswald', sans-serif;
    font-size: 28px;
    font-weight: 600;
    color: var(--blanco);
    margin: 0 0 12px 0;
}

.ei-related-card-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--verde);
    font-weight: 500;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.ei-related-card:hover .ei-related-card-link {
    opacity: 1;
    transform: translateY(0);
}

.ei-related-card:hover {
    box-shadow: 0 12px 48px rgba(0,0,0,0.2);
}

/* ============================================
   FOOTER
   ============================================ */
.ei-footer {
    background: var(--blanco);
    padding: 40px 50px;
    border-top: 1px solid #E5E5E5;
}

.ei-footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.ei-footer-logo img {
    max-width: 200px;
    height: auto;
}

.ei-footer-links {
    display: flex;
    gap: 16px;
}

.ei-footer-links a {
    color: var(--granate);
    text-decoration: none;
    font-size: 14px;
}

.ei-footer-copyright {
    color: var(--granate);
    font-size: 14px;
}

/* ============================================
   SCROLL TO TOP
   ============================================ */
.ei-scroll-top {
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

.ei-scroll-top.visible {
    opacity: 1;
    visibility: visible;
}

.ei-scroll-top:hover {
    background: var(--verde);
    transform: translateY(-4px);
}
</style>

<div class="ei-container">
    <!-- Hero Section -->
    <section class="ei-hero">
        <div class="ei-hero-bg"></div>
        <div class="ei-hero-overlay"></div>
        <div class="ei-hero-content">
            <nav class="ei-breadcrumb">Servicios &gt; Estrategia de Innovación</nav>
            <h1>Estrategia de Innovación</h1>
            <p class="ei-hero-subtitle">Un enfoque estructurado para transformar ideas en ventaja competitiva</p>
        </div>
        <div class="ei-scroll-indicator" onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})">↓</div>
    </section>

    <!-- Intro Section -->
    <section class="ei-intro">
        <div class="ei-intro-inner">
            <div class="ei-intro-text-wrapper">
                <p class="ei-intro-text">
                    <span class="drop-cap">L</span>a estrategia de innovación es un componente vital para cualquier organización que aspire a mantenerse relevante y competitiva. No se trata simplemente de tener ideas novedosas, sino de tener un enfoque estructurado y estratégico para implementarlas de manera efectiva.
                </p>
                <blockquote class="ei-quote">
                    <p>"La esencia de la estrategia es elegir qué NO hay que hacer"</p>
                    <cite>— Michael Porter</cite>
                </blockquote>
            </div>
            <div class="ei-intro-visual">
                <div class="ei-icon-circle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Definition Card -->
    <section class="ei-definition">
        <div class="ei-definition-card">
            <div class="ei-definition-header">
                <div class="ei-definition-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <div>
                    <h2>¿Qué es la estrategia de innovación?</h2>
                    <p>Es un plan integral y sistemático que define cómo una organización identificará, desarrollará e implementará nuevas ideas, productos, servicios o procesos para crear valor sostenible y mantener su ventaja competitiva en el mercado. Va más allá de la creatividad espontánea: es un compromiso estratégico con el cambio continuo y la mejora.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pillars Section -->
    <section class="ei-pillars" id="pillars">
        <div class="ei-pillars-inner">
            <div class="ei-section-header">
                <h2>Los 5 Elementos Clave</h2>
                <p>Una estrategia de innovación efectiva se sustenta en pilares fundamentales que trabajan en conjunto</p>
            </div>

            <div class="ei-pillars-grid">
                <!-- Pilar 1 -->
                <div class="ei-pillar-card">
                    <span class="ei-pillar-number">01</span>
                    <div class="ei-pillar-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <circle cx="12" cy="12" r="6"/>
                            <circle cx="12" cy="12" r="2"/>
                        </svg>
                    </div>
                    <h3>Objetivos claros</h3>
                    <p>Definir metas específicas y medibles que guíen los esfuerzos de innovación hacia resultados tangibles y alineados con la visión estratégica.</p>
                    <div class="ei-pillar-bar"></div>
                </div>

                <!-- Pilar 2 -->
                <div class="ei-pillar-card">
                    <span class="ei-pillar-number">02</span>
                    <div class="ei-pillar-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                            <polyline points="17 6 23 6 23 12"/>
                        </svg>
                    </div>
                    <h3>Comprensión del mercado</h3>
                    <p>Análisis profundo de tendencias, necesidades del cliente y dinámicas competitivas para identificar oportunidades reales de innovación.</p>
                    <div class="ei-pillar-bar"></div>
                </div>

                <!-- Pilar 3 -->
                <div class="ei-pillar-card">
                    <span class="ei-pillar-number">03</span>
                    <div class="ei-pillar-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <h3>Cultura de innovación</h3>
                    <p>Fomentar un entorno organizacional que valore la creatividad, tolere el fracaso y promueva la experimentación continua.</p>
                    <div class="ei-pillar-bar"></div>
                </div>
            </div>

            <div class="ei-pillars-grid-bottom">
                <!-- Pilar 4 -->
                <div class="ei-pillar-card">
                    <span class="ei-pillar-number">04</span>
                    <div class="ei-pillar-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                        </svg>
                    </div>
                    <h3>Procesos de innovación</h3>
                    <p>Metodologías estructuradas y ágiles para capturar ideas, validarlas rápidamente y escalarlas de forma eficiente.</p>
                    <div class="ei-pillar-bar"></div>
                </div>

                <!-- Pilar 5 -->
                <div class="ei-pillar-card">
                    <span class="ei-pillar-number">05</span>
                    <div class="ei-pillar-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="20" x2="18" y2="10"/>
                            <line x1="12" y1="20" x2="12" y2="4"/>
                            <line x1="6" y1="20" x2="6" y2="14"/>
                        </svg>
                    </div>
                    <h3>Medición y seguimiento</h3>
                    <p>KPIs claros y dashboards que permitan evaluar el impacto de las iniciativas y ajustar la estrategia en tiempo real.</p>
                    <div class="ei-pillar-bar"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visual Break -->
    <section class="ei-visual-break">
        <div class="ei-visual-break-bg"></div>
        <div class="ei-visual-break-overlay"></div>
        <div class="ei-visual-break-content">
            <h2>"La innovación no es un lujo, sino una necesidad"</h2>
            <div class="ei-visual-break-line"></div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="ei-benefits">
        <div class="ei-benefits-inner">
            <div class="ei-section-header">
                <h2>Resultados Tangibles</h2>
                <p>Nuestros clientes experimentan transformaciones medibles en sus operaciones y resultados</p>
            </div>

            <div class="ei-stats-grid">
                <div class="ei-stat">
                    <div class="ei-stat-value">+40%</div>
                    <div class="ei-stat-label">Eficiencia en procesos</div>
                </div>
                <div class="ei-stat">
                    <div class="ei-stat-value">3x</div>
                    <div class="ei-stat-label">Retorno de inversión</div>
                </div>
                <div class="ei-stat">
                    <div class="ei-stat-value">6</div>
                    <div class="ei-stat-label">Meses time-to-market</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="ei-related">
        <div class="ei-related-inner">
            <div class="ei-section-header">
                <h2>Servicios Relacionados</h2>
                <p>Descubre cómo nuestros otros servicios pueden complementar tu estrategia de innovación</p>
            </div>

            <div class="ei-related-grid">
                <a href="/estrategia-transformacion-digital/" class="ei-related-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2023/07/Ausencia_Estrategia_Visualizacion.png" alt="Transformación Digital">
                    <div class="ei-related-card-overlay"></div>
                    <div class="ei-related-card-content">
                        <h3>Transformación Digital</h3>
                        <span class="ei-related-card-link">
                            Conocer más
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <a href="/consultoria-gestion-negocio/" class="ei-related-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8407.jpg" alt="Consultoría de Negocio">
                    <div class="ei-related-card-overlay"></div>
                    <div class="ei-related-card-content">
                        <h3>Consultoría de Negocio</h3>
                        <span class="ei-related-card-link">
                            Conocer más
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <a href="/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/" class="ei-related-card">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2023/07/Cultura_Innovacion_Geometria-1024x574.png" alt="Organización Agile">
                    <div class="ei-related-card-overlay"></div>
                    <div class="ei-related-card-content">
                        <h3>Organización Agile</h3>
                        <span class="ei-related-card-link">
                            Conocer más
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="ei-footer">
        <div class="ei-footer-inner">
            <div class="ei-footer-logo">
                <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-nbg2.png" alt="Proportione">
            </div>
            <div class="ei-footer-links">
                <a href="/politica-privacidad/">Política de Privacidad</a>
                <span style="color: var(--granate);">|</span>
                <a href="/politica-cookies/">Política de Cookies</a>
            </div>
            <div class="ei-footer-copyright">
                © <?php echo date('Y'); ?> Proportione
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button class="ei-scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">↑</button>
</div>

<script>
// Scroll to top visibility
window.addEventListener('scroll', function() {
    const btn = document.querySelector('.ei-scroll-top');
    if (window.scrollY > 500) {
        btn.classList.add('visible');
    } else {
        btn.classList.remove('visible');
    }
});

// Animate pillar cards on scroll
const pillarCards = document.querySelectorAll('.ei-pillar-card');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.2 });

pillarCards.forEach(card => observer.observe(card));
</script>

<?php get_footer(); ?>
