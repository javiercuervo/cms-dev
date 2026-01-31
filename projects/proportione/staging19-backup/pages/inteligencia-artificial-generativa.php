<?php
/**
 * Página: Inteligencia Artificial Generativa
 * Diseño: Tech-forward (Figma Make - Enero 2026)
 * Concepto: Futurista y tecnológico con gradientes cyan/violeta
 */
?>

<style>
/* ============================================
   IA GENERATIVA - Page Styles (Figma Design)
   ============================================ */

:root {
    /* Tech Blog Theme - IA Generativa */
    --tech-bg-primary: #0A1628;
    --tech-bg-elevated: #0F1D2E;
    --tech-text-primary: #FFFFFF;
    --tech-text-secondary: rgba(255, 255, 255, 0.8);
    --tech-text-muted: rgba(255, 255, 255, 0.6);
    --tech-accent-cyan: #00D4FF;
    --tech-accent-violet: #8B5CF6;
    --tech-border: rgba(0, 212, 255, 0.3);
    --tech-gradient: linear-gradient(135deg, #00D4FF 0%, #8B5CF6 100%);
}

/* Container Principal */
.ia-page {
    font-family: 'Raleway', sans-serif;
    background-color: var(--tech-bg-primary);
    color: var(--tech-text-secondary);
    min-height: 100vh;
}

/* Hero Section */
.ia-hero {
    position: relative;
    height: 450px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ia-hero-gradient {
    position: absolute;
    inset: 0;
    background: var(--tech-gradient);
}

.ia-hero-grid {
    position: absolute;
    inset: 0;
    opacity: 0.03;
    background-image:
        linear-gradient(to right, white 1px, transparent 1px),
        linear-gradient(to bottom, white 1px, transparent 1px);
    background-size: 50px 50px;
}

.ia-hero-content {
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    text-align: center;
}

/* Category Badge */
.ia-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 20px;
    border-radius: 50px;
    background: var(--tech-gradient);
    color: white;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.5px;
    margin-bottom: 24px;
}

.ia-badge svg {
    width: 16px;
    height: 16px;
}

/* Hero Title */
.ia-hero h1 {
    font-family: 'Inter', sans-serif;
    font-size: clamp(36px, 5vw, 64px);
    font-weight: 700;
    color: var(--tech-text-primary);
    line-height: 1.2;
    max-width: 900px;
    margin: 0 auto 24px;
}

/* Meta Info */
.ia-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 24px;
    color: var(--tech-text-secondary);
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
}

/* Main Content */
.ia-main {
    max-width: 800px;
    margin: 0 auto;
    padding: 48px 24px 64px;
}

@media (min-width: 768px) {
    .ia-main {
        padding: 64px 24px 80px;
    }
}

/* Featured Image */
.ia-featured-image {
    position: relative;
    margin-bottom: 48px;
    border-radius: 8px;
    overflow: hidden;
    border: 3px solid transparent;
    background:
        linear-gradient(var(--tech-bg-primary), var(--tech-bg-primary)) padding-box,
        var(--tech-gradient) border-box;
    animation: glowPulse 3s ease-in-out infinite;
}

.ia-featured-image img {
    width: 100%;
    height: auto;
    display: block;
}

@keyframes glowPulse {
    0%, 100% {
        box-shadow: 0 0 5px rgba(0, 212, 255, 0.3);
    }
    50% {
        box-shadow: 0 0 20px rgba(0, 212, 255, 0.5);
    }
}

/* Section Styles */
.ia-section {
    margin-bottom: 48px;
}

.ia-section h2 {
    font-family: 'Inter', sans-serif;
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--tech-accent-cyan);
    line-height: 1.3;
    margin: 0 0 24px 0;
}

.ia-section p {
    font-size: 18px;
    line-height: 1.8;
    color: var(--tech-text-secondary);
    margin: 0 0 16px 0;
}

.ia-section p:last-child {
    margin-bottom: 0;
}

/* Bullet List */
.ia-bullet-list {
    list-style: none;
    padding: 0;
    margin: 0 0 32px 0;
}

.ia-bullet-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 18px;
    line-height: 1.8;
    color: var(--tech-text-secondary);
    margin-bottom: 12px;
}

.ia-bullet-list li::before {
    content: '•';
    color: var(--tech-accent-cyan);
    font-size: 20px;
    line-height: 1.8;
    flex-shrink: 0;
}

/* Numbered List */
.ia-numbered-list {
    list-style: none;
    padding: 0;
    margin: 0;
    counter-reset: item;
}

.ia-numbered-list li {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    font-size: 18px;
    line-height: 1.8;
    color: var(--tech-text-secondary);
    margin-bottom: 16px;
}

.ia-numbered-list li::before {
    counter-increment: item;
    content: counter(item);
    flex-shrink: 0;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--tech-accent-cyan);
    color: var(--tech-bg-primary);
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Blockquote */
.ia-blockquote {
    background: var(--tech-bg-elevated);
    border-left: 4px solid var(--tech-accent-cyan);
    border-radius: 0 8px 8px 0;
    padding: 24px 32px;
    margin: 32px 0;
    font-style: italic;
    font-size: 20px;
    line-height: 1.7;
    color: var(--tech-text-primary);
}

/* Tools Widget */
.ia-tools-widget {
    background: var(--tech-bg-elevated);
    border: 1px solid var(--tech-border);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 64px;
}

.ia-tools-widget h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 600;
    color: var(--tech-accent-violet);
    margin: 0 0 16px 0;
}

.ia-tools-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.ia-tool-tag {
    padding: 8px 16px;
    border-radius: 50px;
    border: 1px solid var(--tech-accent-cyan);
    color: var(--tech-text-primary);
    font-size: 14px;
    font-weight: 500;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
}

.ia-tool-tag:hover {
    background: var(--tech-accent-cyan);
    color: var(--tech-bg-primary);
    transform: scale(1.05);
}

/* Related Posts */
.ia-related {
    margin-bottom: 64px;
}

.ia-related h2 {
    font-family: 'Inter', sans-serif;
    font-size: clamp(28px, 4vw, 40px);
    font-weight: 600;
    color: var(--tech-accent-cyan);
    line-height: 1.3;
    text-align: center;
    margin: 0 0 32px 0;
}

.ia-related-grid {
    display: grid;
    gap: 24px;
}

@media (min-width: 768px) {
    .ia-related-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.ia-related-card {
    background: rgba(15, 29, 46, 0.8);
    border: 1px solid var(--tech-border);
    border-radius: 12px;
    padding: 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: block;
}

.ia-related-card:hover {
    border-color: var(--tech-accent-cyan);
    box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
    transform: translateY(-4px);
}

.ia-related-card h3 {
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    font-weight: 600;
    color: var(--tech-text-primary);
    line-height: 1.4;
    margin: 0 0 16px 0;
    transition: color 0.3s ease;
}

.ia-related-card:hover h3 {
    color: var(--tech-accent-cyan);
}

.ia-related-card-meta {
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 14px;
    color: var(--tech-text-muted);
}

/* Newsletter CTA */
.ia-newsletter {
    background: var(--tech-gradient);
    border-radius: 12px;
    padding: 48px 32px;
    text-align: center;
}

@media (min-width: 768px) {
    .ia-newsletter {
        padding: 48px;
    }
}

.ia-newsletter h2 {
    font-family: 'Inter', sans-serif;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 700;
    color: white;
    margin: 0 0 16px 0;
}

.ia-newsletter p {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.9);
    max-width: 500px;
    margin: 0 auto 24px;
}

.ia-newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-width: 500px;
    margin: 0 auto;
}

@media (min-width: 640px) {
    .ia-newsletter-form {
        flex-direction: row;
    }
}

.ia-newsletter-input {
    flex: 1;
    padding: 12px 16px;
    border-radius: 8px;
    border: none;
    background: white;
    color: var(--tech-bg-primary);
    font-size: 16px;
    outline: none;
}

.ia-newsletter-input:focus {
    box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
}

.ia-newsletter-btn {
    padding: 12px 32px;
    border-radius: 8px;
    border: none;
    background: white;
    color: var(--tech-accent-cyan);
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.ia-newsletter-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(255, 255, 255, 0.3);
}

/* Separator */
.ia-separator {
    height: 2px;
    background: var(--tech-gradient);
    margin: 48px 0;
    border: none;
}

/* Responsive */
@media (max-width: 767px) {
    .ia-hero {
        height: auto;
        min-height: 350px;
        padding: 60px 0;
    }

    .ia-meta {
        gap: 16px;
    }

    .ia-section h2 {
        font-size: 28px;
    }

    .ia-section p,
    .ia-bullet-list li,
    .ia-numbered-list li {
        font-size: 16px;
    }

    .ia-blockquote {
        padding: 20px 24px;
        font-size: 18px;
    }
}
</style>

<div class="ia-page">
    <!-- Hero Section -->
    <section class="ia-hero">
        <div class="ia-hero-gradient"></div>
        <div class="ia-hero-grid"></div>
        <div class="ia-hero-content">
            <!-- Category Badge -->
            <div class="ia-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/>
                    <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/>
                    <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/>
                    <path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/>
                    <path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/>
                    <path d="M3.477 10.896a4 4 0 0 1 .585-.396"/>
                    <path d="M19.938 10.5a4 4 0 0 1 .585.396"/>
                    <path d="M6 18a4 4 0 0 1-1.967-.516"/>
                    <path d="M19.967 17.484A4 4 0 0 1 18 18"/>
                </svg>
                IA GENERATIVA
            </div>

            <!-- Title -->
            <h1>Inteligencia Artificial Generativa: La Nueva Frontera de la IA</h1>

            <!-- Meta Info -->
            <div class="ia-meta">
                <div class="ia-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Equipo Proportione</span>
                </div>
                <div class="ia-meta-item">
                    <span>📅</span>
                    <span>15 Enero 2026</span>
                </div>
                <div class="ia-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span>8 min lectura</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="ia-main">
        <!-- Featured Image -->
        <div class="ia-featured-image">
            <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/DALL·E-2024-04-07-09.52.18.webp" alt="Máquina renacentista generando datos - Ilustración estilo Leonardo da Vinci">
        </div>

        <!-- Section 1 -->
        <section class="ia-section">
            <h2>¿Qué es la Inteligencia Artificial Generativa?</h2>
            <p>La Inteligencia Artificial Generativa (GAI) representa un subcampo revolucionario de la IA enfocado en crear contenido diverso y original. A diferencia de los sistemas tradicionales que solo analizan datos, la GAI puede generar texto, música, imágenes, diseños 3D y mucho más.</p>
            <p>Esta tecnología utiliza modelos de aprendizaje profundo entrenados con enormes cantidades de datos para comprender patrones y crear contenido nuevo que mantiene coherencia y relevancia contextual.</p>
        </section>

        <hr class="ia-separator">

        <!-- Section 2 -->
        <section class="ia-section">
            <h2>El Impacto de la GAI en los Trabajadores y las Organizaciones</h2>
            <p>La GAI está transformando fundamentalmente cómo trabajamos. Sus principales impactos incluyen:</p>

            <ul class="ia-bullet-list">
                <li>Automatización de tareas administrativas repetitivas</li>
                <li>Liberación de profesionales para roles más estratégicos y creativos</li>
                <li>Escalabilidad masiva de operaciones empresariales</li>
                <li>Personalización de contenido a gran escala</li>
                <li>Aceleración de procesos de investigación y desarrollo</li>
            </ul>

            <blockquote class="ia-blockquote">
                "La verdadera revolución no es la tecnología en sí, sino cómo la usamos para amplificar la creatividad y capacidad humana."
            </blockquote>
        </section>

        <!-- Section 3 -->
        <section class="ia-section">
            <h2>Consejos para Navegar en el Mundo de la GAI</h2>
            <p>Para aprovechar el potencial de la GAI de manera efectiva:</p>

            <ol class="ia-numbered-list">
                <li>Manténgase actualizado con las últimas herramientas y desarrollos</li>
                <li>Considere siempre las implicaciones éticas de la tecnología</li>
                <li>Experimente con herramientas disponibles como ChatGPT, Claude o Midjourney</li>
                <li>Integre gradualmente la GAI en sus flujos de trabajo existentes</li>
                <li>Forme a su equipo en el uso responsable de estas tecnologías</li>
            </ol>
        </section>

        <!-- Section 4 -->
        <section class="ia-section">
            <h2>Conclusión</h2>
            <p>La Inteligencia Artificial Generativa no es solo una tendencia tecnológica, sino una transformación fundamental en cómo creamos, trabajamos y resolvemos problemas. Las organizaciones que adopten estratégicamente estas herramientas estarán mejor posicionadas para competir en la economía digital del futuro.</p>
            <p>En Proportione, ayudamos a empresas a integrar la IA generativa de manera práctica y responsable, siempre poniendo a las personas en el centro del cambio tecnológico.</p>
        </section>

        <!-- Tools Widget -->
        <div class="ia-tools-widget">
            <h3>Herramientas mencionadas</h3>
            <div class="ia-tools-list">
                <a href="https://chat.openai.com" target="_blank" class="ia-tool-tag">ChatGPT</a>
                <a href="https://claude.ai" target="_blank" class="ia-tool-tag">Claude</a>
                <a href="https://gemini.google.com" target="_blank" class="ia-tool-tag">Gemini</a>
                <a href="https://midjourney.com" target="_blank" class="ia-tool-tag">Midjourney</a>
                <a href="https://openai.com/dall-e-3" target="_blank" class="ia-tool-tag">DALL-E</a>
                <a href="https://openai.com" target="_blank" class="ia-tool-tag">OpenAI</a>
            </div>
        </div>

        <!-- Related Posts -->
        <section class="ia-related">
            <h2>Más sobre IA Generativa</h2>
            <div class="ia-related-grid">
                <a href="/prompt-engineering/" class="ia-related-card">
                    <h3>Prompt Engineering: El Arte de Hablar con las IA</h3>
                    <div class="ia-related-card-meta">
                        <span>📅 22 Enero 2026</span>
                        <span>• 6 min</span>
                    </div>
                </a>
                <a href="/ia-sector-financiero/" class="ia-related-card">
                    <h3>Casos de Uso: GAI en el Sector Financiero</h3>
                    <div class="ia-related-card-meta">
                        <span>📅 10 Enero 2026</span>
                        <span>• 10 min</span>
                    </div>
                </a>
                <a href="/etica-regulacion-ia/" class="ia-related-card">
                    <h3>Ética y Regulación en IA Generativa</h3>
                    <div class="ia-related-card-meta">
                        <span>📅 5 Enero 2026</span>
                        <span>• 7 min</span>
                    </div>
                </a>
            </div>
        </section>

        <!-- Newsletter CTA -->
        <section class="ia-newsletter">
            <h2>Mantente al día con las últimas tendencias en IA</h2>
            <p>Suscríbete a nuestra newsletter y recibe insights exclusivos sobre transformación digital</p>
            <form class="ia-newsletter-form" action="#" method="post">
                <input type="email" class="ia-newsletter-input" placeholder="tu@email.com" required>
                <button type="submit" class="ia-newsletter-btn">Suscribirse</button>
            </form>
        </section>
    </main>
</div>
