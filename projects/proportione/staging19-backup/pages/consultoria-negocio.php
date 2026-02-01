<?php
/**
 * Consultoría de Gestión de Negocio - Proportione
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&family=Raleway:wght@300;400;500;600&display=swap');

:root {
    --color-granate: #5F322F;
    --color-verde: #6E8157;
    --color-verde-medio: #566E30;
    --color-crema: #F5F0E6;
    --color-blanco: #FFFFFF;
    --font-titulo: 'Josefin Sans', 'Georgia', serif;
    --font-cuerpo: 'Raleway', sans-serif;
    --max-width: 1100px;
    --spacing-section: 48px;
}

* { box-sizing: border-box; }

/* Hero Section */
.consultoria-hero {
    position: relative;
    height: 380px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.consultoria-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.consultoria-hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%);
}

.consultoria-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(95, 50, 47, 0.85) 0%, rgba(110, 129, 87, 0.7) 100%);
}

.consultoria-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 0 24px;
    max-width: 900px;
}

.consultoria-hero h1 {
    font-family: var(--font-titulo);
    font-size: clamp(32px, 5vw, 52px);
    font-weight: 600;
    color: #FFFFFF;
    margin: 0 0 16px 0;
    line-height: 1.2;
}

.consultoria-hero p {
    font-family: var(--font-cuerpo);
    font-size: clamp(16px, 2.5vw, 20px);
    color: rgba(255,255,255,0.9);
    font-weight: 300;
    margin: 0;
}

/* Section Base */
.cn-section {
    padding: var(--spacing-section) 24px;
}

.cn-container {
    max-width: var(--max-width);
    margin: 0 auto;
}

/* Intro Section */
.cn-intro {
    background: var(--color-blanco);
}

.cn-intro-inner {
    max-width: 850px;
    margin: 0 auto;
    text-align: center;
}

.cn-intro h2 {
    font-family: var(--font-titulo);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 20px 0;
}

.cn-intro p {
    font-family: var(--font-cuerpo);
    font-size: 17px;
    line-height: 1.8;
    color: #555;
    margin: 0;
}

/* Tres Pilares */
.cn-pilares {
    background: var(--color-crema);
}

.cn-pilares h2 {
    font-family: var(--font-titulo);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 32px 0;
}

.pilares-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.pilar-card {
    background: var(--color-blanco);
    padding: 32px 24px;
    border-radius: 8px;
    border-top: 4px solid var(--color-granate);
    transition: all 0.3s ease;
}

.pilar-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(95, 50, 47, 0.15);
    border-top-color: var(--color-verde);
}

.pilar-card .icon {
    width: 56px;
    height: 56px;
    background: var(--color-crema);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    color: var(--color-granate);
    transition: all 0.3s ease;
}

.pilar-card:hover .icon {
    background: var(--color-verde);
    color: #FFFFFF;
}

.pilar-card h3 {
    font-family: var(--font-titulo);
    font-size: 22px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 12px 0;
}

.pilar-card p {
    font-family: var(--font-cuerpo);
    font-size: 15px;
    line-height: 1.7;
    color: #666;
    margin: 0;
}

/* Estrategia Section */
.cn-estrategia {
    background: var(--color-blanco);
}

.estrategia-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}

.estrategia-text h2 {
    font-family: var(--font-titulo);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 20px 0;
}

.estrategia-text p {
    font-family: var(--font-cuerpo);
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin: 0 0 16px 0;
}

.estrategia-text .highlight {
    font-size: 18px;
    font-weight: 500;
    color: var(--color-granate);
    border-left: 3px solid var(--color-verde);
    padding-left: 16px;
    margin: 24px 0;
}

.estrategia-image {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}

.estrategia-image img {
    width: 100%;
    height: auto;
    display: block;
}

/* Ejecución Section */
.cn-ejecucion {
    background: var(--color-crema);
}

.ejecucion-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}

.ejecucion-image {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    order: -1;
}

.ejecucion-image img {
    width: 100%;
    height: auto;
    display: block;
}

.ejecucion-text h2 {
    font-family: var(--font-titulo);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 20px 0;
}

.ejecucion-text p {
    font-family: var(--font-cuerpo);
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin: 0 0 16px 0;
}

.ejecucion-text ul {
    list-style: none;
    padding: 0;
    margin: 20px 0 0 0;
}

.ejecucion-text li {
    font-family: var(--font-cuerpo);
    font-size: 15px;
    color: #555;
    padding: 8px 0 8px 28px;
    position: relative;
}

.ejecucion-text li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 14px;
    width: 16px;
    height: 16px;
    background: var(--color-verde);
    border-radius: 50%;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
    background-size: 10px;
    background-position: center;
    background-repeat: no-repeat;
}

/* Beneficios Section */
.cn-beneficios {
    background: var(--color-blanco);
}

.cn-beneficios h2 {
    font-family: var(--font-titulo);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 32px 0;
}

.beneficios-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 900px;
    margin: 0 auto;
}

.beneficio-item {
    display: flex;
    gap: 16px;
    padding: 20px;
    background: var(--color-crema);
    border-radius: 8px;
    transition: all 0.3s ease;
}

.beneficio-item:hover {
    transform: translateX(4px);
    box-shadow: -4px 4px 0 var(--color-verde);
}

.beneficio-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    background: var(--color-granate);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
}

.beneficio-item h3 {
    font-family: var(--font-titulo);
    font-size: 18px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 4px 0;
}

.beneficio-item p {
    font-family: var(--font-cuerpo);
    font-size: 14px;
    color: #666;
    margin: 0;
    line-height: 1.5;
}

/* CTA Section */
.cn-cta {
    background: var(--color-granate);
    text-align: center;
}

.cn-cta h2 {
    font-family: var(--font-titulo);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--color-crema);
    margin: 0 0 16px 0;
}

.cn-cta p {
    font-family: var(--font-cuerpo);
    font-size: 17px;
    color: rgba(255,255,255,0.9);
    margin: 0 0 28px 0;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cn-cta-btn {
    display: inline-block;
    background: var(--color-verde);
    color: #FFFFFF;
    padding: 14px 36px;
    border-radius: 8px;
    font-family: var(--font-cuerpo);
    font-size: 16px;
    font-weight: 500;
    text-decoration: none;
    transition: background 0.3s ease;
}

.cn-cta-btn:hover {
    background: var(--color-verde-medio);
}

/* Responsive */
@media (max-width: 900px) {
    .pilares-grid {
        grid-template-columns: 1fr;
    }
    .estrategia-content,
    .ejecucion-content {
        grid-template-columns: 1fr;
    }
    .ejecucion-image {
        order: 0;
    }
    .beneficios-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="consultoria-hero">
    <div class="consultoria-hero-bg">
        <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8462-2-scaled.jpg" alt="Consultoría estratégica">
        <div class="consultoria-hero-overlay"></div>
    </div>
    <div class="consultoria-hero-content">
        <h1>Consultoría de Gestión de Negocio</h1>
        <p>Un enfoque estratégico para navegar la incertidumbre y lograr crecimiento sostenible</p>
    </div>
</section>

<!-- Breadcrumb -->
<nav style="max-width: 1100px; margin: 0 auto; padding: 20px 24px 0; font-family: var(--font-cuerpo); font-size: 14px;">
    <a href="/" style="color: var(--color-verde); text-decoration: none;">Proportione</a>
    <span style="color: #999; margin: 0 8px;">›</span>
    <a href="/servicios/" style="color: var(--color-verde); text-decoration: none;">Servicios</a>
    <span style="color: #999; margin: 0 8px;">›</span>
    <span style="color: var(--color-granate);">Consultoría de Gestión de Negocio</span>
</nav>

<!-- Intro Section -->
<section class="cn-section cn-intro">
    <div class="cn-intro-inner">
        <h2>Más allá de resolver problemas</h2>
        <p>La Consultoría de Gestión de Negocio es una disciplina que ha ganado relevancia en la era de la disrupción digital. Se trata de un enfoque estratégico que permite a las empresas navegar por la incertidumbre, adaptarse a los cambios y lograr un crecimiento rentable y sostenido. En Proportione combinamos estrategias de negocio con principios de diseño y tecnología para impulsar el crecimiento orgánico de tu empresa. Conoce <a href="/metodologia/" style="color: var(--color-verde); font-weight: 500;">nuestra metodología</a> basada en el framework Human-Centric AI.</p>
    </div>
</section>

<!-- Tres Pilares -->
<section class="cn-section cn-pilares">
    <div class="cn-container">
        <h2>Tres áreas clave de actuación</h2>
        <div class="pilares-grid">
            <!-- Pilar 1 -->
            <div class="pilar-card">
                <div class="icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                </div>
                <h3>Estrategia de Negocio</h3>
                <p>Definimos una estrategia clara y alineada con tus objetivos a largo plazo. Identificamos oportunidades de crecimiento y ventajas competitivas que te diferencien en el mercado.</p>
            </div>

            <!-- Pilar 2 -->
            <div class="pilar-card">
                <div class="icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Diseño Organizacional</h3>
                <p>Una organización bien diseñada es esencial para el éxito empresarial. Creamos estructuras que promueven la colaboración, la innovación y la eficiencia operativa.</p>
            </div>

            <!-- Pilar 3 -->
            <div class="pilar-card">
                <div class="icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3>Transformación Digital</h3>
                <p>Aprovechamos la tecnología para mejorar procesos internos, crear nuevas ofertas de productos y aumentar la competitividad de tu empresa en el mercado digital.</p>
            </div>
        </div>
    </div>
</section>

<!-- Estrategia Section -->
<section class="cn-section cn-estrategia">
    <div class="cn-container">
        <div class="estrategia-content">
            <div class="estrategia-text">
                <h2>La importancia de la estrategia</h2>
                <p>En un mundo empresarial cada vez más volátil e incierto, la estrategia es más importante que nunca. La diferencia entre el éxito y el fracaso a menudo radica en la capacidad de una empresa para adaptarse y evolucionar.</p>
                <p class="highlight">Las empresas que logran crecimiento sostenible son aquellas que se movilizan para el cambio y se adaptan según sea necesario.</p>
                <p>No se trata solo de tener un plan, sino de contar con la capacidad de ejecutarlo y ajustarlo cuando el contexto lo requiere.</p>
            </div>
            <div class="estrategia-image">
                <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8449-2-1536x1152.jpg" alt="Evolución de la industria">
            </div>
        </div>
    </div>
</section>

<!-- Ejecución Section -->
<section class="cn-section cn-ejecucion">
    <div class="cn-container">
        <div class="ejecucion-content">
            <div class="ejecucion-text">
                <h2>De la estrategia a la ejecución</h2>
                <p>Nuestra consultoría no se queda en el papel. Incluye implementación práctica, supervisión del progreso y ajustes necesarios para garantizar resultados.</p>
                <p>Adoptamos un enfoque agnóstico de la tecnología, lo que significa que no imponemos herramientas. Nos adaptamos a tu ecosistema existente y seleccionamos las soluciones que mejor se ajustan a tus necesidades específicas.</p>
                <ul>
                    <li>Implementación junto a tu equipo</li>
                    <li>Supervisión continua del progreso</li>
                    <li>Ajustes basados en resultados reales</li>
                    <li>Transferencia de conocimiento</li>
                </ul>
            </div>
            <div class="ejecucion-image">
                <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8407.jpg" alt="Estrategia global">
            </div>
        </div>
    </div>
</section>

<!-- Beneficios Section -->
<section class="cn-section cn-beneficios">
    <div class="cn-container">
        <h2>Qué conseguirás</h2>
        <div class="beneficios-grid">
            <div class="beneficio-item">
                <div class="beneficio-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div>
                    <h3>Claridad estratégica</h3>
                    <p>Una hoja de ruta clara para navegar la incertidumbre del mercado.</p>
                </div>
            </div>
            <div class="beneficio-item">
                <div class="beneficio-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="20" x2="12" y2="10"></line>
                        <line x1="18" y1="20" x2="18" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="16"></line>
                    </svg>
                </div>
                <div>
                    <h3>Crecimiento sostenible</h3>
                    <p>Estrategias enfocadas en resultados a largo plazo, no en soluciones rápidas.</p>
                </div>
            </div>
            <div class="beneficio-item">
                <div class="beneficio-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div>
                    <h3>Equipo capacitado</h3>
                    <p>Transferimos conocimiento para que tu equipo gane autonomía.</p>
                </div>
            </div>
            <div class="beneficio-item">
                <div class="beneficio-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </div>
                <div>
                    <h3>Adaptabilidad</h3>
                    <p>Capacidad para ajustar el rumbo según cambia el contexto empresarial.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Servicios Relacionados -->
<section class="cn-section" style="background: var(--color-crema);">
    <div class="cn-container">
        <h2 style="font-family: var(--font-titulo); font-size: clamp(26px, 4vw, 36px); font-weight: 600; color: var(--color-granate); text-align: center; margin: 0 0 32px 0;">Servicios relacionados</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; max-width: 900px; margin: 0 auto;">
            <a href="/estrategia-innovacion/" style="text-decoration: none; display: block; background: var(--color-blanco); padding: 28px 24px; border-radius: 8px; border-left: 4px solid var(--color-verde); transition: all 0.3s ease;">
                <h3 style="font-family: var(--font-titulo); font-size: 20px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px 0;">Estrategia de Innovación</h3>
                <p style="font-family: var(--font-cuerpo); font-size: 15px; color: #666; margin: 0; line-height: 1.6;">Transforma ideas en ventaja competitiva con un enfoque estructurado.</p>
            </a>
            <a href="/ia-generativa/" style="text-decoration: none; display: block; background: var(--color-blanco); padding: 28px 24px; border-radius: 8px; border-left: 4px solid var(--color-verde); transition: all 0.3s ease;">
                <h3 style="font-family: var(--font-titulo); font-size: 20px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px 0;">Inteligencia Artificial Generativa</h3>
                <p style="font-family: var(--font-cuerpo); font-size: 15px; color: #666; margin: 0; line-height: 1.6;">Automatiza procesos y potencia la productividad con IA.</p>
            </a>
            <a href="/estrategia-transformacion-digital/" style="text-decoration: none; display: block; background: var(--color-blanco); padding: 28px 24px; border-radius: 8px; border-left: 4px solid var(--color-verde); transition: all 0.3s ease;">
                <h3 style="font-family: var(--font-titulo); font-size: 20px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px 0;">Transformación Digital</h3>
                <p style="font-family: var(--font-cuerpo); font-size: 15px; color: #666; margin: 0; line-height: 1.6;">Hojas de ruta personalizadas para tu evolución digital.</p>
            </a>
        </div>
        <p style="text-align: center; margin-top: 32px;">
            <a href="/servicios/" style="color: var(--color-verde); font-weight: 500; text-decoration: none; font-family: var(--font-cuerpo);">← Ver todos los servicios</a>
        </p>
    </div>
</section>

<!-- CTA Section -->
<section class="cn-section cn-cta">
    <div class="cn-container">
        <h2>¿Listo para transformar tu negocio?</h2>
        <p>Hablemos de cómo podemos ayudarte a navegar la incertidumbre y lograr un crecimiento sostenible.</p>
        <a href="/contacto/" class="cn-cta-btn">Agendar una conversación</a>
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
