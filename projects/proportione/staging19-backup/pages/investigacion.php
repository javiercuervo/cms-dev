<?php
/**
 * Investigación - Líneas, hallazgos y publicaciones
 * Basado en: docs/investigacion_proportione.md
 * Diseño: Editorial académico con imágenes y animaciones
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();
?>

<style>
/* ============================================
   INVESTIGACIÓN - Page Styles v2.0
   ============================================ */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap');

:root {
    --granate: #5F322F;
    --granate-dark: #3D1F1C;
    --verde: #6E8157;
    --verde-dark: #566E30;
    --crema: #F5F0E6;
    --blanco: #FFFFFF;
    --gris-oscuro: #333333;
    --gris-medio: #666666;
    --gris-claro: #F5F5F5;
    --azul-academico: #1E3A5F;
}

/* Reset para esta página */
.investigacion-page * {
    box-sizing: border-box;
}

.investigacion-page {
    font-family: 'Raleway', sans-serif;
    color: var(--gris-oscuro);
    line-height: 1.7;
    overflow-x: hidden;
}

/* ============================================
   HERO SECTION CON IMAGEN
   ============================================ */
.inv-hero {
    position: relative;
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.inv-hero-bg {
    position: absolute;
    inset: 0;
    background-image: url('https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_9189.jpg');
    background-size: cover;
    background-position: center;
    animation: heroZoom 1.5s ease-out forwards;
}

@keyframes heroZoom {
    from { transform: scale(1.1); }
    to { transform: scale(1); }
}

.inv-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(95, 50, 47, 0.85) 0%, rgba(30, 58, 95, 0.8) 100%);
}

.inv-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 80px 24px;
    max-width: 900px;
}

.inv-badge {
    display: inline-block;
    background: var(--verde);
    color: var(--blanco);
    padding: 8px 24px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    margin-bottom: 28px;
    animation: fadeInDown 0.6s ease 0.2s both;
}

@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

.inv-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(36px, 7vw, 60px);
    font-weight: 600;
    color: var(--blanco);
    margin: 0 0 24px 0;
    line-height: 1.15;
    text-shadow: 0 2px 20px rgba(0,0,0,0.3);
    animation: fadeInUp 0.8s ease 0.4s both;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.inv-hero .lead {
    font-size: clamp(17px, 2.5vw, 21px);
    color: rgba(255,255,255,0.95);
    max-width: 700px;
    margin: 0 auto;
    animation: fadeInUp 0.8s ease 0.6s both;
}

/* Investigador Card en Hero */
.investigador-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 16px;
    padding: 24px 36px;
    margin-top: 48px;
    display: inline-flex;
    align-items: center;
    gap: 20px;
    text-align: left;
    animation: fadeInUp 0.8s ease 0.8s both;
}

.investigador-avatar {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background: var(--verde);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    font-weight: 700;
    color: var(--blanco);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.investigador-info h3 {
    font-size: 20px;
    margin: 0 0 4px 0;
    font-weight: 600;
    color: var(--blanco);
}

.investigador-info p {
    font-size: 14px;
    margin: 0 0 6px 0;
    color: rgba(255,255,255,0.85);
}

.investigador-info a {
    color: var(--crema);
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
}

.investigador-info a:hover {
    color: var(--verde);
}

/* ============================================
   SECCIÓN INTRO CON ESTADÍSTICAS
   ============================================ */
.inv-intro {
    padding: 80px 24px;
    background: var(--blanco);
}

.inv-intro-inner {
    max-width: 1100px;
    margin: 0 auto;
    text-align: center;
}

.inv-intro h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 5vw, 42px);
    color: var(--granate);
    margin: 0 0 20px 0;
}

.inv-intro > p {
    font-size: 18px;
    color: var(--gris-medio);
    max-width: 700px;
    margin: 0 auto 48px;
}

.inv-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-bottom: 0;
}

.inv-stat {
    background: var(--crema);
    padding: 32px 20px;
    border-radius: 12px;
    text-align: center;
}

.inv-stat-number {
    font-family: 'Playfair Display', serif;
    font-size: 48px;
    font-weight: 700;
    color: var(--granate);
    line-height: 1;
    margin-bottom: 8px;
}

.inv-stat-label {
    font-size: 14px;
    color: var(--gris-medio);
    font-weight: 500;
}

@media (max-width: 768px) {
    .inv-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* ============================================
   LÍNEAS DE INVESTIGACIÓN - GRID VISUAL
   ============================================ */
.inv-lineas {
    padding: 80px 24px;
    background: var(--gris-claro);
}

.inv-lineas-inner {
    max-width: 1200px;
    margin: 0 auto;
}

.inv-lineas h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 5vw, 38px);
    color: var(--granate);
    text-align: center;
    margin: 0 0 48px 0;
}

/* Línea Principal Destacada */
.linea-principal {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    background: var(--blanco);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(95, 50, 47, 0.15);
    margin-bottom: 40px;
}

.linea-principal-img {
    background-image: url('https://staging19.proportione.com/wp-content/uploads/2024/12/trinity-aeat.png');
    background-size: cover;
    background-position: center;
    min-height: 400px;
}

.linea-principal-content {
    padding: 48px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.linea-tag {
    display: inline-block;
    background: var(--granate);
    color: var(--blanco);
    padding: 6px 14px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 16px;
    width: fit-content;
}

.linea-principal h3 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    color: var(--granate);
    margin: 0 0 16px 0;
    line-height: 1.3;
}

.linea-principal p {
    color: var(--gris-medio);
    margin-bottom: 24px;
    font-size: 16px;
}

.metodologia-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.metodologia-tag {
    background: var(--crema);
    color: var(--granate);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.hallazgos-list {
    margin: 0;
    padding-left: 20px;
}

.hallazgos-list li {
    margin-bottom: 8px;
    font-size: 15px;
    color: var(--gris-oscuro);
}

.hallazgos-list li::marker {
    color: var(--verde);
}

@media (max-width: 900px) {
    .linea-principal {
        grid-template-columns: 1fr;
    }
    .linea-principal-img {
        min-height: 250px;
    }
    .linea-principal-content {
        padding: 32px;
    }
}

/* Grid de Líneas Secundarias */
.lineas-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.linea-card {
    background: var(--blanco);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.linea-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(95, 50, 47, 0.15);
}

.linea-card-img {
    height: 160px;
    background-size: cover;
    background-position: center;
    position: relative;
}

.linea-card-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 40%, rgba(95, 50, 47, 0.6) 100%);
}

.linea-numero {
    position: absolute;
    top: 16px;
    left: 16px;
    background: var(--granate);
    color: var(--blanco);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 700;
    z-index: 2;
}

.linea-card-content {
    padding: 24px;
}

.linea-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 18px;
    color: var(--granate);
    margin: 0 0 12px 0;
    line-height: 1.35;
}

.linea-card p {
    font-size: 14px;
    color: var(--gris-medio);
    margin: 0;
    line-height: 1.6;
}

.linea-card .doi-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 16px;
    background: var(--azul-academico);
    color: var(--blanco);
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.3s ease;
}

.linea-card .doi-link:hover {
    background: var(--granate);
}

@media (max-width: 900px) {
    .lineas-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .lineas-grid {
        grid-template-columns: 1fr;
    }
}

/* ============================================
   PUBLICACIONES DESTACADAS
   ============================================ */
.inv-publicaciones {
    padding: 80px 24px;
    background: var(--crema);
}

.inv-publicaciones-inner {
    max-width: 1000px;
    margin: 0 auto;
}

.inv-publicaciones h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 5vw, 38px);
    color: var(--granate);
    text-align: center;
    margin: 0 0 48px 0;
}

.publicacion-card {
    background: var(--blanco);
    border-radius: 12px;
    padding: 32px;
    margin-bottom: 24px;
    display: grid;
    grid-template-columns: auto 1fr auto;
    gap: 24px;
    align-items: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.publicacion-card:hover {
    box-shadow: 0 8px 30px rgba(95, 50, 47, 0.12);
}

.publicacion-year {
    background: var(--verde);
    color: var(--blanco);
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 20px;
    font-weight: 700;
    text-align: center;
}

.publicacion-info h3 {
    font-size: 17px;
    color: var(--gris-oscuro);
    margin: 0 0 8px 0;
    font-style: italic;
    line-height: 1.4;
}

.publicacion-info .autores {
    font-size: 14px;
    color: var(--gris-medio);
    margin: 0;
}

.publicacion-doi {
    background: var(--azul-academico);
    color: var(--blanco);
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: all 0.3s ease;
}

.publicacion-doi:hover {
    background: var(--granate);
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .publicacion-card {
        grid-template-columns: 1fr;
        text-align: center;
    }
    .publicacion-year {
        width: fit-content;
        margin: 0 auto;
    }
}

/* ============================================
   OPEN SCIENCE BANNER
   ============================================ */
.inv-open-science {
    position: relative;
    padding: 80px 24px;
    background-image: url('https://staging19.proportione.com/wp-content/uploads/2023/12/Biblioteca-Reductiva-IA-Seguridad-Proportione-1.png');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.inv-open-science::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.92) 0%, rgba(95, 50, 47, 0.88) 100%);
}

.inv-open-science-inner {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    color: var(--blanco);
}

.inv-open-science h3 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(26px, 4vw, 36px);
    margin: 0 0 16px 0;
}

.inv-open-science p {
    font-size: 18px;
    opacity: 0.9;
    margin: 0 0 36px 0;
}

.open-science-logos {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.os-logo {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.2);
    padding: 14px 28px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.os-logo:hover {
    background: rgba(255,255,255,0.25);
    transform: translateY(-3px);
}

/* ============================================
   MARCO INSTITUCIONAL
   ============================================ */
.inv-marco {
    padding: 64px 24px;
    background: var(--gris-claro);
}

.inv-marco-inner {
    max-width: 900px;
    margin: 0 auto;
}

.inv-marco h3 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    color: var(--granate);
    text-align: center;
    margin: 0 0 40px 0;
}

.instituciones-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 32px;
}

.institucion-card {
    background: var(--blanco);
    padding: 32px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.institucion-icon {
    width: 64px;
    height: 64px;
    background: var(--crema);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 28px;
}

.institucion-card h4 {
    font-family: 'Playfair Display', serif;
    font-size: 20px;
    color: var(--granate);
    margin: 0 0 8px 0;
}

.institucion-card p {
    font-size: 14px;
    color: var(--gris-medio);
    margin: 0;
}

@media (max-width: 600px) {
    .instituciones-grid {
        grid-template-columns: 1fr;
    }
}

/* ============================================
   CTA SECTION
   ============================================ */
.inv-cta {
    position: relative;
    padding: 80px 24px;
    background: linear-gradient(135deg, var(--granate) 0%, var(--verde-dark) 100%);
    text-align: center;
    overflow: hidden;
}

.inv-cta::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 600px;
    height: 600px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
}

.inv-cta-inner {
    position: relative;
    z-index: 2;
    max-width: 700px;
    margin: 0 auto;
}

.inv-cta h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(32px, 5vw, 48px);
    color: var(--blanco);
    margin: 0 0 16px 0;
}

.inv-cta p {
    font-size: 18px;
    color: rgba(255,255,255,0.9);
    margin: 0 0 36px 0;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}

.btn-primary {
    background: var(--blanco);
    color: var(--granate);
    padding: 16px 36px;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);
}

.btn-secondary {
    background: transparent;
    color: var(--blanco);
    padding: 16px 36px;
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.1);
    border-color: var(--blanco);
}

/* ============================================
   FOOTER SIMPLE
   ============================================ */
.inv-footer {
    background: var(--blanco);
    padding: 40px 24px;
    border-top: 1px solid rgba(0,0,0,0.08);
}

.inv-footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.inv-footer img {
    max-width: 180px;
    height: auto;
}

.inv-footer-links {
    display: flex;
    gap: 24px;
}

.inv-footer-links a {
    color: var(--gris-medio);
    text-decoration: none;
    font-size: 14px;
}

.inv-footer-links a:hover {
    color: var(--granate);
}

.inv-footer p {
    color: var(--gris-medio);
    font-size: 14px;
    margin: 0;
}

@media (max-width: 768px) {
    .inv-footer-inner {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<div class="investigacion-page">

    <!-- HERO SECTION -->
    <section class="inv-hero">
        <div class="inv-hero-bg"></div>
        <div class="inv-hero-overlay"></div>
        <div class="inv-hero-content">
            <span class="inv-badge">Investigación Aplicada</span>
            <h1>Investigación para la transformación digital</h1>
            <p class="lead">Exploramos cómo los datos de búsqueda, la inteligencia artificial y los sistemas de Business Intelligence impulsan decisiones estratégicas en PYMEs. Rigor académico con visión práctica.</p>

            <div class="investigador-card">
                <div class="investigador-avatar">JC</div>
                <div class="investigador-info">
                    <h3>Javier Cuervo López</h3>
                    <p>Investigador Principal · Doctorado en Innovación Empresarial</p>
                    <a href="https://orcid.org/0009-0006-7134-2894" target="_blank">
                        <span>🔗</span> ORCID: 0009-0006-7134-2894
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- INTRO CON ESTADÍSTICAS -->
    <section class="inv-intro">
        <div class="inv-intro-inner">
            <h2>Nuestro Impacto</h2>
            <p>Combinamos análisis cuantitativo con estudios cualitativos, colaborando con universidades y empresas de Europa y Latinoamérica.</p>

            <div class="inv-stats">
                <div class="inv-stat">
                    <div class="inv-stat-number">7</div>
                    <div class="inv-stat-label">Líneas de investigación</div>
                </div>
                <div class="inv-stat">
                    <div class="inv-stat-number">3</div>
                    <div class="inv-stat-label">Publicaciones con DOI</div>
                </div>
                <div class="inv-stat">
                    <div class="inv-stat-number">2</div>
                    <div class="inv-stat-label">Instituciones colaboradoras</div>
                </div>
                <div class="inv-stat">
                    <div class="inv-stat-number">5+</div>
                    <div class="inv-stat-label">Años de investigación</div>
                </div>
            </div>
        </div>
    </section>

    <!-- LÍNEAS DE INVESTIGACIÓN -->
    <section class="inv-lineas">
        <div class="inv-lineas-inner">
            <h2>Líneas de Investigación</h2>

            <!-- Línea Principal Destacada -->
            <div class="linea-principal">
                <div class="linea-principal-img"></div>
                <div class="linea-principal-content">
                    <span class="linea-tag">Línea Principal</span>
                    <h3>Integración de datos de búsqueda en Business Intelligence para PYMEs</h3>
                    <p>Cómo las señales de Google Search, Maps, YouTube, marketplaces y LLMs pueden integrarse en sistemas de BI para decisiones estratégicas, tácticas y operativas.</p>

                    <div class="metodologia-tags">
                        <span class="metodologia-tag">PRISMA 2020</span>
                        <span class="metodologia-tag">Análisis bibliométrico</span>
                        <span class="metodologia-tag">Design Science Research</span>
                    </div>

                    <ul class="hallazgos-list">
                        <li>Los datos de búsqueda siguen infrautilizados y confinados al marketing</li>
                        <li>Integrados en BI, actúan como sensores tempranos de demanda y riesgo</li>
                        <li>Patrones de uso diferenciados según nivel de decisión</li>
                    </ul>
                </div>
            </div>

            <!-- Grid de Líneas Secundarias -->
            <div class="lineas-grid">
                <!-- Línea 2 -->
                <article class="linea-card">
                    <div class="linea-card-img" style="background-image: url('https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8462-2.jpg');">
                        <span class="linea-numero">2</span>
                    </div>
                    <div class="linea-card-content">
                        <h3>BI multinivel: datos locales y cloud</h3>
                        <p>Arquitecturas híbridas que integran ERP, CRM y analítica digital en cuadros de mando ejecutivos.</p>
                        <a href="https://doi.org/10.5281/zenodo.17245495" target="_blank" class="doi-link">
                            DOI: 10.5281/zenodo.17245495
                        </a>
                    </div>
                </article>

                <!-- Línea 3 -->
                <article class="linea-card">
                    <div class="linea-card-img" style="background-image: url('https://staging19.proportione.com/wp-content/uploads/2024/07/Consultor-SeO-examinando-el-comportamiento-de-un-robot-de-inteligencia-artificial-.webp');">
                        <span class="linea-numero">3</span>
                    </div>
                    <div class="linea-card-content">
                        <h3>IA como capa interpretativa: LLMs y agentes</h3>
                        <p>Modelos de lenguaje y agentes de IA como capa de interpretación sobre sistemas BI y procesos empresariales.</p>
                    </div>
                </article>

                <!-- Línea 4 -->
                <article class="linea-card">
                    <div class="linea-card-img" style="background-image: url('https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_9291-3.jpg');">
                        <span class="linea-numero">4</span>
                    </div>
                    <div class="linea-card-content">
                        <h3>Privacidad, RGPD y gobernanza de datos</h3>
                        <p>Garantizar que los sistemas de analítica cumplan principios de minimización, trazabilidad y auditoría.</p>
                    </div>
                </article>

                <!-- Línea 5 -->
                <article class="linea-card">
                    <div class="linea-card-img" style="background-image: url('https://staging19.proportione.com/wp-content/uploads/2026/01/columpio.jpg');">
                        <span class="linea-numero">5</span>
                    </div>
                    <div class="linea-card-content">
                        <h3>UX en proyectos sociales y sanitarios (CAPPI)</h3>
                        <p>Sistemas digitales centrados en personas en contextos sanitarios como paliativos pediátricos.</p>
                    </div>
                </article>

                <!-- Línea 6 -->
                <article class="linea-card">
                    <div class="linea-card-img" style="background-image: url('https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_8449-2.jpg');">
                        <span class="linea-numero">6</span>
                    </div>
                    <div class="linea-card-content">
                        <h3>Bioseguridad y trazabilidad (Cátedra UCH–Mensoft)</h3>
                        <p>Trazabilidad de procesos y datos en contextos sanitarios y de bioseguridad.</p>
                    </div>
                </article>

                <!-- Línea 7 -->
                <article class="linea-card">
                    <div class="linea-card-img" style="background-image: url('https://staging19.proportione.com/wp-content/uploads/2023/12/Biblioteca-Reductiva-IA-Seguridad-Proportione-1-edited.png');">
                        <span class="linea-numero">7</span>
                    </div>
                    <div class="linea-card-content">
                        <h3>Ciencia abierta y trazabilidad académica</h3>
                        <p>PRISMA, OSF, Zenodo y ORCID como infraestructura de investigación reproducible.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- PUBLICACIONES DESTACADAS -->
    <section class="inv-publicaciones">
        <div class="inv-publicaciones-inner">
            <h2>Publicaciones Recientes</h2>

            <div class="publicacion-card">
                <div class="publicacion-year">2025</div>
                <div class="publicacion-info">
                    <h3>Developing a data-driven Business Intelligence system for multilevel decision-making in SMEs</h3>
                    <p class="autores">Cuervo, J.</p>
                </div>
                <a href="https://doi.org/10.5281/zenodo.17245495" target="_blank" class="publicacion-doi">Ver DOI</a>
            </div>

            <div class="publicacion-card">
                <div class="publicacion-year">2025</div>
                <div class="publicacion-info">
                    <h3>Strategic Role-Play with Generative AI for Innovation Courses</h3>
                    <p class="autores">Cuervo, J. & Tortosa, M.</p>
                </div>
                <a href="https://doi.org/10.5281/zenodo.17245635" target="_blank" class="publicacion-doi">Ver DOI</a>
            </div>

            <div class="publicacion-card">
                <div class="publicacion-year">2024</div>
                <div class="publicacion-info">
                    <h3>Coaching Development Program: Conversations that Inspire Change and Achieve Goals</h3>
                    <p class="autores">Cuervo, J. & Tortosa, M.</p>
                </div>
                <a href="https://doi.org/10.5281/zenodo.17243218" target="_blank" class="publicacion-doi">Ver DOI</a>
            </div>
        </div>
    </section>

    <!-- OPEN SCIENCE BANNER -->
    <section class="inv-open-science">
        <div class="inv-open-science-inner">
            <h3>Comprometidos con la Ciencia Abierta</h3>
            <p>Toda nuestra investigación sigue principios de transparencia y reproducibilidad. Materiales, datos y protocolos disponibles públicamente.</p>
            <div class="open-science-logos">
                <span class="os-logo">PRISMA 2020</span>
                <span class="os-logo">OSF</span>
                <span class="os-logo">Zenodo</span>
                <span class="os-logo">ORCID</span>
            </div>
        </div>
    </section>

    <!-- MARCO INSTITUCIONAL -->
    <section class="inv-marco">
        <div class="inv-marco-inner">
            <h3>Marco Institucional</h3>
            <div class="instituciones-grid">
                <div class="institucion-card">
                    <div class="institucion-icon">🏢</div>
                    <h4>Proportione LDA</h4>
                    <p>Entidad aplicada · Estrategia, tecnología y personas</p>
                </div>
                <div class="institucion-card">
                    <div class="institucion-icon">🎓</div>
                    <h4>Universidade de Aveiro</h4>
                    <p>Doctorado en Innovación Empresarial</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="inv-cta">
        <div class="inv-cta-inner">
            <h2>¿Colaboramos?</h2>
            <p>Universidades, centros de investigación y empresas interesadas en proyectos conjuntos de transformación digital basada en datos.</p>
            <div class="cta-buttons">
                <a href="/contacto/" class="btn-primary">Proponer colaboración</a>
                <a href="https://orcid.org/0009-0006-7134-2894" target="_blank" class="btn-secondary">Ver perfil ORCID</a>
            </div>
        </div>
    </section>

</div>

<!-- Footer -->
<footer class="inv-footer">
    <div class="inv-footer-inner">
        <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-nbg2.png" alt="Proportione">
        <div class="inv-footer-links">
            <a href="/politica-privacidad/">Política de Privacidad</a>
            <a href="/politica-cookies/">Política de Cookies</a>
        </div>
        <p>© 2026 Proportione</p>
    </div>
</footer>

<?php get_footer(); ?>
