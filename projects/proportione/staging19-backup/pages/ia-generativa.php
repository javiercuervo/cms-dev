<?php
/**
 * Página: IA Generativa - Servicio
 * Diseño: Tech-forward (Figma - Enero 2026)
 * URL: /ia-generativa/
 */
require_once(dirname(__FILE__) . '/wp-load.php');
get_header();
?>

<style>
/* ============================================
   IA GENERATIVA - Tech-Forward Design
   ============================================ */

:root {
    --ia-bg-primary: #0A1628;
    --ia-bg-elevated: #0F1D2E;
    --ia-bg-card: rgba(15, 29, 46, 0.8);
    --ia-text-primary: #FFFFFF;
    --ia-text-secondary: rgba(255, 255, 255, 0.85);
    --ia-text-muted: rgba(255, 255, 255, 0.6);
    --ia-accent-cyan: #00D4FF;
    --ia-accent-violet: #8B5CF6;
    --ia-border: rgba(0, 212, 255, 0.3);
    --ia-gradient: linear-gradient(135deg, #00D4FF 0%, #8B5CF6 100%);
    --ia-font-display: 'Inter', -apple-system, sans-serif;
    --ia-font-body: 'Raleway', sans-serif;
}

/* Reset para esta página */
.ia-generativa-page {
    font-family: var(--ia-font-body);
    background: var(--ia-bg-primary);
    color: var(--ia-text-secondary);
    line-height: 1.6;
}

/* ============================================
   HERO SECTION
   ============================================ */
.ia-hero {
    position: relative;
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 80px 24px 60px;
}

.ia-hero-bg {
    position: absolute;
    inset: 0;
    background: var(--ia-gradient);
}

.ia-hero-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 50px 50px;
}

.ia-hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

/* Badge */
.ia-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    color: #FFFFFF;
    font-family: var(--ia-font-display);
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 24px;
}

.ia-badge svg {
    width: 18px;
    height: 18px;
}

/* Subtitle */
.ia-hero-subtitle {
    font-family: var(--ia-font-display);
    font-size: clamp(16px, 2.5vw, 20px);
    font-weight: 500;
    color: var(--ia-accent-cyan);
    margin: 0 0 12px;
    letter-spacing: 0.05em;
}

/* Title */
.ia-hero h1 {
    font-family: var(--ia-font-display);
    font-size: clamp(36px, 6vw, 64px);
    font-weight: 700;
    color: var(--ia-text-primary);
    line-height: 1.1;
    margin: 0 0 28px;
    letter-spacing: -0.02em;
}

/* Meta */
.ia-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 24px;
    color: var(--ia-text-secondary);
    font-size: 14px;
}

.ia-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.ia-meta-item svg {
    width: 16px;
    height: 16px;
    opacity: 0.8;
}

/* ============================================
   MAIN CONTENT
   ============================================ */
.ia-main {
    max-width: 800px;
    margin: 0 auto;
    padding: 64px 24px 80px;
}

/* Sections */
.ia-section {
    margin-bottom: 56px;
}

.ia-section h2 {
    font-family: var(--ia-font-display);
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 600;
    color: var(--ia-accent-cyan);
    line-height: 1.25;
    margin: 0 0 24px;
}

.ia-section p {
    font-size: 18px;
    line-height: 1.85;
    color: var(--ia-text-secondary);
    margin: 0 0 20px;
}

.ia-section p:last-child {
    margin-bottom: 0;
}

/* Separator */
.ia-separator {
    height: 2px;
    background: var(--ia-gradient);
    border: none;
    margin: 56px 0;
    opacity: 0.6;
}

/* ============================================
   LISTS
   ============================================ */

/* Bullet list con título en negrita */
.ia-feature-list {
    list-style: none;
    padding: 0;
    margin: 28px 0;
}

.ia-feature-list li {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 20px;
    font-size: 17px;
    line-height: 1.75;
}

.ia-feature-list li::before {
    content: '';
    flex-shrink: 0;
    width: 8px;
    height: 8px;
    background: var(--ia-accent-cyan);
    border-radius: 50%;
    margin-top: 10px;
}

.ia-feature-list strong {
    color: var(--ia-text-primary);
    font-weight: 600;
}

/* Numbered list */
.ia-numbered-list {
    list-style: none;
    padding: 0;
    margin: 32px 0;
    counter-reset: step;
}

.ia-numbered-list li {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 28px;
    counter-increment: step;
}

.ia-numbered-list li::before {
    content: counter(step);
    flex-shrink: 0;
    width: 36px;
    height: 36px;
    background: var(--ia-accent-cyan);
    color: var(--ia-bg-primary);
    border-radius: 50%;
    font-family: var(--ia-font-display);
    font-size: 16px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ia-numbered-list .step-content {
    flex: 1;
}

.ia-numbered-list .step-title {
    font-family: var(--ia-font-display);
    font-size: 20px;
    font-weight: 600;
    color: var(--ia-text-primary);
    margin: 0 0 8px;
}

.ia-numbered-list .step-desc {
    font-size: 16px;
    line-height: 1.75;
    color: var(--ia-text-secondary);
    margin: 0;
}

/* ============================================
   BLOCKQUOTE
   ============================================ */
.ia-blockquote {
    background: var(--ia-bg-elevated);
    border-left: 4px solid var(--ia-accent-cyan);
    border-radius: 0 12px 12px 0;
    padding: 28px 32px;
    margin: 40px 0;
    position: relative;
}

.ia-blockquote::before {
    content: '"';
    position: absolute;
    top: 10px;
    left: 20px;
    font-family: Georgia, serif;
    font-size: 60px;
    color: var(--ia-accent-cyan);
    opacity: 0.3;
    line-height: 1;
}

.ia-blockquote p {
    font-size: 20px;
    font-style: italic;
    line-height: 1.7;
    color: var(--ia-text-primary);
    margin: 0;
    padding-left: 20px;
}

/* ============================================
   TOOLS WIDGET
   ============================================ */
.ia-tools-widget {
    background: var(--ia-bg-elevated);
    border: 1px solid var(--ia-border);
    border-radius: 16px;
    padding: 28px 32px;
    margin: 56px 0;
}

.ia-tools-widget h3 {
    font-family: var(--ia-font-display);
    font-size: 18px;
    font-weight: 600;
    color: var(--ia-accent-violet);
    margin: 0 0 20px;
}

.ia-tools-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.ia-tool-tag {
    display: inline-block;
    padding: 10px 20px;
    border: 1px solid var(--ia-accent-cyan);
    border-radius: 50px;
    color: var(--ia-text-primary);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    background: transparent;
    transition: all 0.3s ease;
}

.ia-tool-tag:hover {
    background: var(--ia-accent-cyan);
    color: var(--ia-bg-primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 212, 255, 0.3);
}

/* ============================================
   RELATED POSTS
   ============================================ */
.ia-related {
    margin: 72px 0;
}

.ia-related h2 {
    font-family: var(--ia-font-display);
    font-size: clamp(24px, 4vw, 32px);
    font-weight: 600;
    color: var(--ia-text-primary);
    text-align: center;
    margin: 0 0 36px;
}

.ia-related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.ia-related-card {
    background: var(--ia-bg-card);
    border: 1px solid var(--ia-border);
    border-radius: 16px;
    padding: 28px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.ia-related-card:hover {
    border-color: var(--ia-accent-cyan);
    transform: translateY(-6px);
    box-shadow: 0 8px 30px rgba(0, 212, 255, 0.2);
}

.ia-related-card h3 {
    font-family: var(--ia-font-display);
    font-size: 18px;
    font-weight: 600;
    color: var(--ia-text-primary);
    line-height: 1.4;
    margin: 0 0 auto;
    padding-bottom: 16px;
    transition: color 0.3s ease;
}

.ia-related-card:hover h3 {
    color: var(--ia-accent-cyan);
}

.ia-related-meta {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: var(--ia-text-muted);
    padding-top: 16px;
    border-top: 1px solid rgba(255,255,255,0.1);
}

/* ============================================
   NEWSLETTER CTA
   ============================================ */
.ia-newsletter {
    background: var(--ia-gradient);
    border-radius: 20px;
    padding: 56px 40px;
    text-align: center;
    margin-top: 64px;
}

.ia-newsletter h2 {
    font-family: var(--ia-font-display);
    font-size: clamp(24px, 4vw, 32px);
    font-weight: 700;
    color: #FFFFFF;
    margin: 0 0 12px;
}

.ia-newsletter p {
    font-size: 17px;
    color: rgba(255,255,255,0.9);
    margin: 0 0 28px;
}

.ia-newsletter-form {
    display: flex;
    gap: 12px;
    max-width: 480px;
    margin: 0 auto;
}

.ia-newsletter-input {
    flex: 1;
    padding: 14px 20px;
    border: none;
    border-radius: 10px;
    background: #FFFFFF;
    color: var(--ia-bg-primary);
    font-size: 16px;
    font-family: var(--ia-font-body);
}

.ia-newsletter-input::placeholder {
    color: #888;
}

.ia-newsletter-input:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255,255,255,0.3);
}

.ia-newsletter-btn {
    padding: 14px 32px;
    border: none;
    border-radius: 10px;
    background: #FFFFFF;
    color: var(--ia-accent-cyan);
    font-family: var(--ia-font-display);
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.ia-newsletter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255,255,255,0.25);
}

/* ============================================
   FOOTER
   ============================================ */
.ia-footer {
    background: var(--ia-bg-primary);
    border-top: 1px solid rgba(255,255,255,0.1);
    padding: 64px 24px 32px;
    margin-top: 80px;
}

.ia-footer-inner {
    max-width: 1100px;
    margin: 0 auto;
}

.ia-footer-grid {
    display: grid;
    grid-template-columns: 2fr repeat(3, 1fr);
    gap: 48px;
    margin-bottom: 48px;
}

.ia-footer-brand p {
    font-size: 14px;
    color: var(--ia-text-muted);
    margin: 8px 0 0;
}

.ia-footer-col h4 {
    font-family: var(--ia-font-display);
    font-size: 14px;
    font-weight: 600;
    color: var(--ia-text-primary);
    margin: 0 0 16px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.ia-footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.ia-footer-col li {
    margin-bottom: 10px;
}

.ia-footer-col a {
    color: var(--ia-text-muted);
    text-decoration: none;
    font-size: 14px;
    transition: color 0.2s ease;
}

.ia-footer-col a:hover {
    color: var(--ia-accent-cyan);
}

.ia-footer-bottom {
    text-align: center;
    padding-top: 32px;
    border-top: 1px solid rgba(255,255,255,0.1);
    font-size: 13px;
    color: var(--ia-text-muted);
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 900px) {
    .ia-related-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .ia-footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 32px;
    }
}

@media (max-width: 768px) {
    .ia-hero {
        min-height: 360px;
        padding: 60px 20px 48px;
    }

    .ia-hero h1 {
        font-size: 32px;
    }

    .ia-main {
        padding: 48px 20px 60px;
    }

    .ia-section h2 {
        font-size: 26px;
    }

    .ia-section p {
        font-size: 16px;
    }

    .ia-feature-list li,
    .ia-numbered-list .step-desc {
        font-size: 15px;
    }

    .ia-numbered-list .step-title {
        font-size: 18px;
    }

    .ia-blockquote {
        padding: 24px;
    }

    .ia-blockquote p {
        font-size: 17px;
        padding-left: 0;
    }

    .ia-blockquote::before {
        display: none;
    }

    .ia-tools-widget {
        padding: 24px;
    }

    .ia-newsletter {
        padding: 40px 24px;
    }

    .ia-newsletter-form {
        flex-direction: column;
    }

    .ia-footer-grid {
        grid-template-columns: 1fr;
        gap: 32px;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .ia-hero {
        min-height: 320px;
        padding: 48px 16px 40px;
    }

    .ia-hero h1 {
        font-size: 28px;
    }

    .ia-meta {
        gap: 16px;
    }

    .ia-main {
        padding: 36px 16px 48px;
    }

    .ia-numbered-list li {
        flex-direction: column;
        gap: 12px;
    }

    .ia-numbered-list li::before {
        width: 32px;
        height: 32px;
        font-size: 14px;
    }
}
</style>

<div class="ia-generativa-page">

    <!-- Breadcrumb -->
    <nav style="max-width: 800px; margin: 0 auto; padding: 20px 24px 0; font-family: var(--ia-font-body); font-size: 14px;">
        <a href="/" style="color: var(--ia-accent-cyan); text-decoration: none;">Proportione</a>
        <span style="color: var(--ia-text-muted); margin: 0 8px;">›</span>
        <a href="/servicios/" style="color: var(--ia-accent-cyan); text-decoration: none;">Servicios</a>
        <span style="color: var(--ia-text-muted); margin: 0 8px;">›</span>
        <span style="color: var(--ia-text-primary);">IA Generativa</span>
    </nav>

    <!-- HERO SECTION -->
    <section class="ia-hero">
        <div class="ia-hero-bg"></div>
        <div class="ia-hero-grid"></div>
        <div class="ia-hero-content">
            <div class="ia-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/>
                    <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/>
                    <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/>
                </svg>
                IA Generativa
            </div>
            <p class="ia-hero-subtitle">La Nueva Frontera de la IA</p>
            <h1>Inteligencia Artificial Generativa:</h1>
            <div class="ia-meta">
                <div class="ia-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Equipo Proportione</span>
                </div>
                <div class="ia-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    <span>15 Enero 2026</span>
                </div>
                <div class="ia-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span>8 min</span>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="ia-main">

        <!-- Section 1 -->
        <section class="ia-section">
            <h2>¿Qué es la Inteligencia Artificial Generativa?</h2>
            <p>La GAI (Generative Artificial Intelligence) representa un subcampo revolucionario de la inteligencia artificial que se centra en crear contenido nuevo y original. A diferencia de los sistemas de IA tradicionales que analizan y clasifican información existente, la IA Generativa puede producir textos, imágenes, música, código y otros tipos de contenido que nunca antes habían existido.</p>
            <p>Esta tecnología se basa en modelos de aprendizaje profundo, especialmente redes neuronales avanzadas como los Transformers, que han sido entrenados con vastas cantidades de datos. Herramientas como ChatGPT, Claude, Gemini para texto, o Midjourney y DALL-E para imágenes, son ejemplos prominentes de cómo la GAI está transformando nuestra forma de trabajar y crear.</p>
            <p>Lo que hace especialmente poderosa a la IA Generativa es su capacidad para comprender contextos complejos, mantener coherencia en conversaciones extensas y adaptar su salida a requisitos específicos, todo mientras mantiene un nivel de creatividad que anteriormente se consideraba exclusivamente humano.</p>
        </section>

        <hr class="ia-separator">

        <!-- Section 2 -->
        <section class="ia-section">
            <h2>El Impacto de la GAI en los Trabajadores y las Organizaciones</h2>
            <p>La adopción de la Inteligencia Artificial Generativa está redefiniendo el panorama laboral de maneras sin precedentes. Las organizaciones que integran estas tecnologías están experimentando transformaciones profundas en sus operaciones diarias:</p>

            <ul class="ia-feature-list">
                <li><strong>Automatización de tareas repetitivas:</strong> La GAI puede encargarse de redactar correos, crear presentaciones, generar informes y documentación técnica, liberando tiempo valioso de los empleados.</li>
                <li><strong>Democratización de habilidades especializadas:</strong> Profesionales sin formación técnica pueden ahora generar código, diseños gráficos o análisis de datos con la asistencia de IA.</li>
                <li><strong>Aceleración de procesos creativos:</strong> Diseñadores, escritores y desarrolladores utilizan la GAI como herramienta de brainstorming y prototipado rápido.</li>
                <li><strong>Personalización escalable:</strong> Las empresas pueden ofrecer experiencias altamente personalizadas a millones de clientes sin aumentar proporcionalmente su plantilla.</li>
            </ul>

            <p>Sin embargo, esta transformación también plantea desafíos importantes. Los trabajadores deben adaptarse, aprendiendo a colaborar efectivamente con estos sistemas. Las organizaciones enfrentan preguntas sobre privacidad de datos, sesgos algorítmicos y la necesidad de redefinir roles laborales para enfocarse en tareas que requieren juicio humano, empatía y pensamiento estratégico.</p>

            <blockquote class="ia-blockquote">
                <p>La verdadera revolución no es la tecnología en sí, sino cómo la usamos para amplificar la creatividad y capacidad humana.</p>
            </blockquote>
        </section>

        <!-- Section 3 -->
        <section class="ia-section">
            <h2>Consejos para Navegar en el Mundo de la GAI</h2>
            <p>Para profesionales y organizaciones que buscan aprovechar el potencial de la IA Generativa, aquí presentamos recomendaciones prácticas:</p>

            <ol class="ia-numbered-list">
                <li>
                    <div class="step-content">
                        <h4 class="step-title">Manténgase actualizado</h4>
                        <p class="step-desc">El campo de la IA Generativa evoluciona a un ritmo acelerado. Dedique tiempo regularmente a explorar nuevas herramientas, leer sobre avances recientes y experimentar con diferentes modelos.</p>
                    </div>
                </li>
                <li>
                    <div class="step-content">
                        <h4 class="step-title">Considere las implicaciones éticas</h4>
                        <p class="step-desc">Sea consciente de cuestiones como la propiedad intelectual, los sesgos en los datos de entrenamiento y el impacto ambiental de estos sistemas. Desarrolle políticas claras sobre el uso responsable de la IA en su organización.</p>
                    </div>
                </li>
                <li>
                    <div class="step-content">
                        <h4 class="step-title">Experimente con múltiples plataformas</h4>
                        <p class="step-desc">Cada herramienta de IA tiene sus fortalezas. ChatGPT destaca en conversación y razonamiento, Claude en análisis de textos largos, Midjourney en generación artística. Pruebe varias para encontrar las que mejor se adapten a sus necesidades específicas.</p>
                    </div>
                </li>
                <li>
                    <div class="step-content">
                        <h4 class="step-title">Integre gradualmente</h4>
                        <p class="step-desc">No intente transformar todos sus procesos de una vez. Comience con casos de uso específicos, mida resultados, aprenda de la experiencia y expanda progresivamente.</p>
                    </div>
                </li>
                <li>
                    <div class="step-content">
                        <h4 class="step-title">Invierta en formación</h4>
                        <p class="step-desc">Capacite a su equipo en el uso efectivo de estas herramientas. La diferencia entre resultados mediocres y excepcionales a menudo radica en la calidad del "prompt engineering" y la comprensión de las capacidades y limitaciones de cada modelo.</p>
                    </div>
                </li>
            </ol>
        </section>

        <!-- Section 4 -->
        <section class="ia-section">
            <h2>Conclusión</h2>
            <p>La Inteligencia Artificial Generativa no es solo una tendencia tecnológica pasajera; representa un cambio fundamental en cómo los humanos interactuamos con las máquinas y cómo las organizaciones operan. Estamos en los primeros capítulos de esta revolución, y las posibilidades que se abren son tanto emocionantes como desafiantes.</p>
            <p>El éxito en esta nueva era no pertenecerá necesariamente a quienes adopten la tecnología más rápido, sino a quienes lo hagan de manera más reflexiva, ética y estratégica. La GAI es una herramienta poderosa, pero como toda herramienta, su valor final depende de quién la usa y con qué propósito.</p>
            <p>En Proportione, acompañamos a las organizaciones en este viaje de <a href="/estrategia-transformacion-digital/" style="color: var(--ia-accent-cyan);">transformación digital</a>, ayudándolas a identificar oportunidades, implementar soluciones y desarrollar las capacidades necesarias para prosperar en un mundo potenciado por la IA Generativa. Nuestro <a href="/metodologia/" style="color: var(--ia-accent-cyan);">framework Human-Centric AI (20-60-20)</a> garantiza que la tecnología trabaje para las personas. El futuro ya está aquí, y está lleno de posibilidades extraordinarias para quienes se atrevan a explorarlo.</p>
        </section>

        <!-- Tools Widget -->
        <div class="ia-tools-widget">
            <h3>Herramientas mencionadas</h3>
            <div class="ia-tools-list">
                <a href="https://chat.openai.com" target="_blank" rel="noopener" class="ia-tool-tag">ChatGPT</a>
                <a href="https://claude.ai" target="_blank" rel="noopener" class="ia-tool-tag">Claude</a>
                <a href="https://gemini.google.com" target="_blank" rel="noopener" class="ia-tool-tag">Gemini</a>
                <a href="https://midjourney.com" target="_blank" rel="noopener" class="ia-tool-tag">Midjourney</a>
                <a href="https://openai.com/dall-e-3" target="_blank" rel="noopener" class="ia-tool-tag">DALL-E</a>
                <a href="https://openai.com" target="_blank" rel="noopener" class="ia-tool-tag">OpenAI</a>
            </div>
        </div>

        <!-- Servicios Relacionados -->
        <section class="ia-related">
            <h2>Servicios relacionados</h2>
            <div class="ia-related-grid">
                <a href="/estrategia-transformacion-digital/" class="ia-related-card">
                    <h3>Transformación Digital Estratégica</h3>
                    <div class="ia-related-meta">
                        <span>Servicio</span>
                        <span>Estrategia</span>
                    </div>
                </a>
                <a href="/estrategia-innovacion/" class="ia-related-card">
                    <h3>Estrategia de Innovación</h3>
                    <div class="ia-related-meta">
                        <span>Servicio</span>
                        <span>Innovación</span>
                    </div>
                </a>
                <a href="/consultoria-gestion-negocio/" class="ia-related-card">
                    <h3>Consultoría de Gestión de Negocio</h3>
                    <div class="ia-related-meta">
                        <span>Servicio</span>
                        <span>Consultoría</span>
                    </div>
                </a>
            </div>
            <p style="text-align: center; margin-top: 32px;">
                <a href="/servicios/" style="color: var(--ia-accent-cyan); font-weight: 500; text-decoration: none;">← Ver todos los servicios</a>
            </p>
        </section>

        <!-- Newsletter CTA -->
        <section class="ia-newsletter">
            <h2>Mantente al día con las últimas tendencias en IA</h2>
            <p>Suscríbete y recibe insights exclusivos cada semana</p>
            <form class="ia-newsletter-form" action="#" method="post">
                <input type="email" class="ia-newsletter-input" placeholder="tu@email.com" required>
                <button type="submit" class="ia-newsletter-btn">Suscribirse</button>
            </form>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="ia-footer">
        <div class="ia-footer-inner">
            <div class="ia-footer-grid">
                <div class="ia-footer-brand">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-nbg2.png" alt="Proportione" style="max-width: 160px; filter: brightness(0) invert(1);">
                    <p>Consultora de Estrategia & Tecnología</p>
                </div>
                <div class="ia-footer-col">
                    <h4>Servicios</h4>
                    <ul>
                        <li><a href="/ia-generativa/">IA Generativa</a></li>
                        <li><a href="/consultoria-negocio/">Consultoría</a></li>
                        <li><a href="/transformacion-digital/">Transformación Digital</a></li>
                    </ul>
                </div>
                <div class="ia-footer-col">
                    <h4>Empresa</h4>
                    <ul>
                        <li><a href="/nosotros/">Nosotros</a></li>
                        <li><a href="/blog/">Blog</a></li>
                        <li><a href="/contacto/">Contacto</a></li>
                    </ul>
                </div>
                <div class="ia-footer-col">
                    <h4>Contacto</h4>
                    <ul>
                        <li>Madrid, España</li>
                        <li><a href="mailto:info@proportione.com">info@proportione.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="ia-footer-bottom">
                © 2026 Proportione. Todos los derechos reservados.
            </div>
        </div>
    </footer>

</div>

<?php get_footer(); ?>
