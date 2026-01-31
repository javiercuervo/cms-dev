<?php
/**
 * Investigación - Líneas, hallazgos y publicaciones
 * Basado en: docs/investigacion_proportione.md
 * Diseño: Editorial académico con rigor y accesibilidad
 */
?>

<style>
/* ============================================
   INVESTIGACIÓN - Página Styles
   ============================================ */

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

/* Container Principal */
.investigacion-page {
    font-family: 'Raleway', sans-serif;
    color: var(--gris-oscuro);
    line-height: 1.7;
}

/* Hero Section */
.investigacion-hero {
    background: linear-gradient(135deg, var(--granate) 0%, var(--granate-dark) 100%);
    color: var(--crema);
    padding: 80px 24px;
    text-align: center;
}

.investigacion-hero-inner {
    max-width: 900px;
    margin: 0 auto;
}

.investigacion-badge {
    display: inline-block;
    background: var(--verde);
    color: var(--blanco);
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 24px;
}

.investigacion-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(36px, 6vw, 56px);
    font-weight: 600;
    margin: 0 0 24px 0;
    line-height: 1.2;
}

.investigacion-hero .lead {
    font-size: clamp(18px, 2.5vw, 22px);
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto;
}

/* Investigador Principal */
.investigador-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 24px 32px;
    margin-top: 40px;
    display: inline-flex;
    align-items: center;
    gap: 20px;
    text-align: left;
}

.investigador-avatar {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: var(--verde);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 700;
    color: var(--blanco);
}

.investigador-info h3 {
    font-size: 18px;
    margin: 0 0 4px 0;
    font-weight: 600;
}

.investigador-info p {
    font-size: 14px;
    margin: 0;
    opacity: 0.8;
}

.investigador-info a {
    color: var(--crema);
    text-decoration: underline;
    font-size: 13px;
}

/* Main Content */
.investigacion-main {
    max-width: 1100px;
    margin: 0 auto;
    padding: 64px 24px;
}

/* Intro Section */
.investigacion-intro {
    text-align: center;
    max-width: 800px;
    margin: 0 auto 64px;
}

.investigacion-intro h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 4vw, 36px);
    color: var(--granate);
    margin: 0 0 20px 0;
}

.investigacion-intro p {
    font-size: 18px;
    color: var(--gris-medio);
}

/* Líneas de Investigación */
.lineas-grid {
    display: grid;
    gap: 32px;
}

.linea-card {
    background: var(--blanco);
    border: 1px solid rgba(0,0,0,0.08);
    border-radius: 12px;
    padding: 32px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.04);
    transition: all 0.3s ease;
}

.linea-card:hover {
    box-shadow: 0 8px 32px rgba(95, 50, 47, 0.12);
    transform: translateY(-4px);
}

.linea-card.featured {
    border-left: 4px solid var(--granate);
    background: linear-gradient(135deg, var(--blanco) 0%, var(--crema) 100%);
}

.linea-numero {
    display: inline-block;
    background: var(--granate);
    color: var(--blanco);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    text-align: center;
    line-height: 32px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 16px;
}

.linea-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    color: var(--granate);
    margin: 0 0 12px 0;
    line-height: 1.3;
}

.linea-descripcion {
    color: var(--gris-medio);
    margin-bottom: 20px;
    font-size: 16px;
}

.linea-section {
    margin-bottom: 16px;
}

.linea-section-title {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--verde);
    margin-bottom: 8px;
}

.linea-section ul {
    margin: 0;
    padding-left: 20px;
}

.linea-section li {
    margin-bottom: 6px;
    font-size: 15px;
    color: var(--gris-oscuro);
}

.linea-section li::marker {
    color: var(--verde);
}

/* Metodología Tag */
.metodologia-tag {
    display: inline-block;
    background: var(--crema);
    color: var(--granate);
    padding: 4px 12px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 500;
    margin-right: 8px;
    margin-bottom: 8px;
}

/* Publicaciones */
.publicacion-item {
    background: var(--gris-claro);
    border-radius: 8px;
    padding: 16px;
    margin-top: 12px;
}

.publicacion-titulo {
    font-style: italic;
    color: var(--gris-oscuro);
    font-size: 14px;
    margin-bottom: 8px;
}

.publicacion-doi {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--azul-academico);
    color: var(--blanco);
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 12px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.publicacion-doi:hover {
    background: var(--granate);
}

/* Sección Publicaciones Destacadas */
.publicaciones-section {
    background: var(--crema);
    padding: 64px 24px;
    margin-top: 64px;
}

.publicaciones-inner {
    max-width: 900px;
    margin: 0 auto;
}

.publicaciones-section h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 4vw, 36px);
    color: var(--granate);
    text-align: center;
    margin: 0 0 40px 0;
}

.publicacion-destacada {
    background: var(--blanco);
    border-radius: 12px;
    padding: 32px;
    margin-bottom: 24px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
}

.publicacion-autores {
    font-size: 14px;
    color: var(--gris-medio);
    margin-bottom: 8px;
}

.publicacion-destacada h3 {
    font-size: 18px;
    color: var(--gris-oscuro);
    margin: 0 0 12px 0;
    font-style: italic;
}

.publicacion-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: center;
}

.publicacion-year {
    background: var(--verde);
    color: var(--blanco);
    padding: 4px 10px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
}

/* Open Science Banner */
.open-science-banner {
    background: var(--azul-academico);
    color: var(--blanco);
    padding: 48px 24px;
    text-align: center;
}

.open-science-banner h3 {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    margin: 0 0 16px 0;
}

.open-science-banner p {
    max-width: 600px;
    margin: 0 auto 24px;
    opacity: 0.9;
}

.open-science-logos {
    display: flex;
    justify-content: center;
    gap: 32px;
    flex-wrap: wrap;
    margin-top: 24px;
}

.open-science-logo {
    background: rgba(255,255,255,0.1);
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
}

/* CTA Section */
.investigacion-cta {
    background: linear-gradient(135deg, var(--granate) 0%, var(--verde-dark) 100%);
    color: var(--blanco);
    padding: 64px 24px;
    text-align: center;
}

.investigacion-cta h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 4vw, 40px);
    margin: 0 0 16px 0;
}

.investigacion-cta p {
    font-size: 18px;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 32px;
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
    padding: 16px 32px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
}

.btn-secondary {
    background: transparent;
    color: var(--blanco);
    padding: 16px 32px;
    border: 2px solid var(--blanco);
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: var(--blanco);
    color: var(--granate);
}

/* Marco Académico */
.marco-academico {
    background: var(--gris-claro);
    padding: 48px 24px;
}

.marco-inner {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.marco-academico h3 {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    color: var(--granate);
    margin: 0 0 24px 0;
}

.instituciones {
    display: flex;
    justify-content: center;
    gap: 48px;
    flex-wrap: wrap;
}

.institucion {
    text-align: center;
}

.institucion-nombre {
    font-weight: 600;
    color: var(--gris-oscuro);
    margin-bottom: 4px;
}

.institucion-detalle {
    font-size: 14px;
    color: var(--gris-medio);
}

/* Responsive */
@media (max-width: 768px) {
    .investigacion-hero {
        padding: 60px 20px;
    }

    .investigador-card {
        flex-direction: column;
        text-align: center;
    }

    .linea-card {
        padding: 24px;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }

    .instituciones {
        flex-direction: column;
        gap: 24px;
    }
}
</style>

<div class="investigacion-page">
    <!-- Hero Section -->
    <section class="investigacion-hero">
        <div class="investigacion-hero-inner">
            <span class="investigacion-badge">Línea de Investigación</span>
            <h1>Investigación aplicada para la transformación digital</h1>
            <p class="lead">Exploramos cómo los datos de búsqueda, la inteligencia artificial y los sistemas de Business Intelligence pueden impulsar decisiones estratégicas en PYMEs. Rigor académico con visión práctica.</p>

            <div class="investigador-card">
                <div class="investigador-avatar">JC</div>
                <div class="investigador-info">
                    <h3>Javier Cuervo López</h3>
                    <p>Investigador Principal · Doctorado en Innovación Empresarial</p>
                    <a href="https://orcid.org/0009-0006-7134-2894" target="_blank">ORCID: 0009-0006-7134-2894</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="investigacion-main">
        <div class="investigacion-intro">
            <h2>7 Líneas de Investigación Activas</h2>
            <p>Nuestro trabajo combina análisis cuantitativo con estudios cualitativos profundos, colaborando con universidades, centros de investigación y empresas de Europa y Latinoamérica.</p>
        </div>

        <div class="lineas-grid">
            <!-- Línea 1: Principal -->
            <article class="linea-card featured">
                <span class="linea-numero">1</span>
                <h3>Integración de datos de motores de búsqueda en Business Intelligence para PYMEs</h3>
                <p class="linea-descripcion">Línea central de investigación: cómo las señales de Google Search, Maps, YouTube, marketplaces y LLMs pueden integrarse en sistemas de BI para apoyar decisiones estratégicas, tácticas y operativas.</p>

                <div class="linea-section">
                    <div class="linea-section-title">Metodología</div>
                    <span class="metodologia-tag">PRISMA 2020</span>
                    <span class="metodologia-tag">Análisis bibliométrico</span>
                    <span class="metodologia-tag">Design Science Research</span>
                </div>

                <div class="linea-section">
                    <div class="linea-section-title">Hallazgos principales</div>
                    <ul>
                        <li>Los datos de búsqueda siguen infrautilizados y confinados al marketing</li>
                        <li>Integrados en BI, actúan como sensores tempranos de demanda, percepción y riesgo</li>
                        <li>Existen patrones de uso diferenciados según nivel de decisión</li>
                    </ul>
                </div>

                <div class="publicacion-item">
                    <div class="publicacion-titulo">Integrating search-engine data into Business Intelligence to support organisational decision-making (SME focus). Protocolo PRISMA v0.3.</div>
                    <span class="metodologia-tag">Zenodo · Pendiente de publicación</span>
                </div>
            </article>

            <!-- Línea 2 -->
            <article class="linea-card">
                <span class="linea-numero">2</span>
                <h3>BI multinivel con integración de datos locales y cloud</h3>
                <p class="linea-descripcion">Arquitecturas híbridas que integran datos operativos locales (ERP, CRM) y datos cloud (analítica digital, search data) en cuadros de mando ejecutivos.</p>

                <div class="linea-section">
                    <div class="linea-section-title">Hallazgos principales</div>
                    <ul>
                        <li>La integración híbrida mejora la trazabilidad y la adopción del BI</li>
                        <li>El mayor valor aparece al alinear indicadores con decisiones reales</li>
                    </ul>
                </div>

                <div class="publicacion-item">
                    <div class="publicacion-titulo">Developing a data-driven Business Intelligence system for multilevel decision-making in SMEs (2025)</div>
                    <a href="https://doi.org/10.5281/zenodo.17245495" target="_blank" class="publicacion-doi">
                        <span>DOI</span> 10.5281/zenodo.17245495
                    </a>
                </div>
            </article>

            <!-- Línea 3 -->
            <article class="linea-card">
                <span class="linea-numero">3</span>
                <h3>Inteligencia Artificial como capa interpretativa: LLMs y agentes</h3>
                <p class="linea-descripcion">Uso de modelos de lenguaje y agentes de IA como capa de interpretación y acción sobre sistemas de BI y procesos empresariales.</p>

                <div class="linea-section">
                    <div class="linea-section-title">Hallazgos principales</div>
                    <ul>
                        <li>Los LLMs reducen la fricción cognitiva entre dato y decisión</li>
                        <li>Los agentes permiten pasar de análisis a acción automatizada</li>
                        <li>El principal reto no es técnico, sino organizativo y de gobernanza</li>
                    </ul>
                </div>
            </article>

            <!-- Línea 4 -->
            <article class="linea-card">
                <span class="linea-numero">4</span>
                <h3>Privacidad, RGPD y gobernanza de datos en analítica</h3>
                <p class="linea-descripcion">Línea transversal centrada en garantizar que los sistemas de analítica y BI cumplan RGPD y principios de minimización, trazabilidad y auditoría.</p>

                <div class="linea-section">
                    <div class="linea-section-title">Hallazgos principales</div>
                    <ul>
                        <li>La privacidad bien diseñada mejora la confianza y la calidad del dato</li>
                        <li>RGPD no es un freno técnico, sino un marco de diseño</li>
                    </ul>
                </div>
            </article>

            <!-- Línea 5 -->
            <article class="linea-card">
                <span class="linea-numero">5</span>
                <h3>UX, datos y tecnología en proyectos sociales y sanitarios (CAPPI)</h3>
                <p class="linea-descripcion">Diseño de sistemas digitales centrados en personas en contextos sanitarios y sociales, como paliativos pediátricos.</p>

                <div class="linea-section">
                    <div class="linea-section-title">Metodología</div>
                    <span class="metodologia-tag">Focus groups</span>
                    <span class="metodologia-tag">Diseño centrado en usuario</span>
                    <span class="metodologia-tag">Prototipos iterativos</span>
                </div>

                <div class="linea-section">
                    <div class="linea-section-title">Hallazgos principales</div>
                    <ul>
                        <li>El BI de impacto social requiere métricas distintas a las empresariales</li>
                        <li>UX y gobernanza de datos son inseparables en contextos sensibles</li>
                    </ul>
                </div>
            </article>

            <!-- Línea 6 -->
            <article class="linea-card">
                <span class="linea-numero">6</span>
                <h3>Bioseguridad y trazabilidad (Cátedra UCH–Mensoft)</h3>
                <p class="linea-descripcion">Investigación aplicada sobre trazabilidad de procesos y datos en contextos sanitarios y de bioseguridad.</p>

                <div class="linea-section">
                    <div class="linea-section-title">Rol de Proportione</div>
                    <ul>
                        <li>Editor tecnológico y conceptual</li>
                        <li>Estructuración de contenidos y sistemas de soporte</li>
                    </ul>
                </div>
            </article>

            <!-- Línea 7 -->
            <article class="linea-card">
                <span class="linea-numero">7</span>
                <h3>Ciencia abierta y trazabilidad académica</h3>
                <p class="linea-descripcion">Aplicación sistemática de principios de Open Science: PRISMA, OSF, Zenodo y ORCID como infraestructura de investigación.</p>
            </article>
        </div>
    </main>

    <!-- Publicaciones Destacadas -->
    <section class="publicaciones-section">
        <div class="publicaciones-inner">
            <h2>Publicaciones Recientes</h2>

            <article class="publicacion-destacada">
                <div class="publicacion-autores">Cuervo, J. (2025)</div>
                <h3>Developing a data-driven Business Intelligence system for multilevel decision-making in SMEs</h3>
                <div class="publicacion-meta">
                    <span class="publicacion-year">2025</span>
                    <a href="https://doi.org/10.5281/zenodo.17245495" target="_blank" class="publicacion-doi">
                        DOI: 10.5281/zenodo.17245495
                    </a>
                </div>
            </article>

            <article class="publicacion-destacada">
                <div class="publicacion-autores">Cuervo, J. & Tortosa, M. (2025)</div>
                <h3>Strategic Role-Play with Generative AI for Innovation Courses</h3>
                <div class="publicacion-meta">
                    <span class="publicacion-year">2025</span>
                    <a href="https://doi.org/10.5281/zenodo.17245635" target="_blank" class="publicacion-doi">
                        DOI: 10.5281/zenodo.17245635
                    </a>
                </div>
            </article>

            <article class="publicacion-destacada">
                <div class="publicacion-autores">Cuervo, J. & Tortosa, M. (2024)</div>
                <h3>Coaching Development Program: Conversations that Inspire Change and Achieve Goals</h3>
                <div class="publicacion-meta">
                    <span class="publicacion-year">2024</span>
                    <a href="https://doi.org/10.5281/zenodo.17243218" target="_blank" class="publicacion-doi">
                        DOI: 10.5281/zenodo.17243218
                    </a>
                </div>
            </article>
        </div>
    </section>

    <!-- Open Science Banner -->
    <section class="open-science-banner">
        <h3>Comprometidos con la Ciencia Abierta</h3>
        <p>Toda nuestra investigación sigue principios de transparencia y reproducibilidad. Materiales, datos y protocolos disponibles públicamente.</p>
        <div class="open-science-logos">
            <span class="open-science-logo">PRISMA 2020</span>
            <span class="open-science-logo">OSF</span>
            <span class="open-science-logo">Zenodo</span>
            <span class="open-science-logo">ORCID</span>
        </div>
    </section>

    <!-- Marco Académico -->
    <section class="marco-academico">
        <div class="marco-inner">
            <h3>Marco Institucional</h3>
            <div class="instituciones">
                <div class="institucion">
                    <div class="institucion-nombre">Proportione LDA</div>
                    <div class="institucion-detalle">Entidad aplicada · Estrategia, tecnología y personas</div>
                </div>
                <div class="institucion">
                    <div class="institucion-nombre">Universidade de Aveiro</div>
                    <div class="institucion-detalle">Doctorado en Innovación Empresarial</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="investigacion-cta">
        <h2>¿Colaboramos?</h2>
        <p>Universidades, centros de investigación y empresas interesadas en proyectos conjuntos de transformación digital basada en datos.</p>
        <div class="cta-buttons">
            <a href="/contacto/" class="btn-primary">Proponer colaboración</a>
            <a href="https://orcid.org/0009-0006-7134-2894" target="_blank" class="btn-secondary">Ver perfil ORCID</a>
        </div>
    </section>
</div>
