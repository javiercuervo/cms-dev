<?php
/**
 * Homepage Proportione con Slider
 * Carga el header y footer de WordPress/Elementor
 */

// Cargar WordPress
require_once(dirname(__FILE__) . '/wp-load.php');

// Header de Elementor
get_header();
?>

<style>
/* Variables y estilos de la homepage */
:root {
    --color-granate: #5F322F;
    --color-verde: #6E8157;
    --color-verde-medio: #566E30;
    --color-crema: #F5F0E6;
    --color-blanco: #FFFFFF;
    --color-texto: #333333;
    --font-titulo: 'Georgia', serif;
    --font-cuerpo: 'Raleway', sans-serif;
    --max-width: 1200px;
    --spacing-section: 80px;
}

/* HERO SLIDER */
.homepage-hero-slider {
    position: relative;
    width: 100%;
    height: 90vh;
    min-height: 600px;
    overflow: hidden;
}

.hero-slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.hero-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1.5s ease-in-out;
    z-index: 1;
}

.hero-slide.active {
    opacity: 1;
    z-index: 2;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(95, 50, 47, 0.85) 0%, rgba(85, 17, 34, 0.75) 100%);
    z-index: 3;
}

.hero-slider-dots {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 12px;
    z-index: 10;
}

.slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid var(--color-crema);
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
}

.slider-dot:hover {
    background: rgba(245, 240, 230, 0.5);
}

.slider-dot.active {
    background: var(--color-crema);
    transform: scale(1.2);
}

.hero-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 5;
    padding: 0 20px;
}

.hero-content-inner {
    max-width: 900px;
    text-align: center;
}

.hero-content h1 {
    font-family: var(--font-titulo);
    font-size: clamp(42px, 8vw, 80px);
    font-weight: 700;
    color: var(--color-crema);
    line-height: 1.1;
    margin: 0 0 24px 0;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.hero-subtitle {
    font-family: var(--font-cuerpo);
    font-size: clamp(18px, 3vw, 24px);
    font-weight: 400;
    color: var(--color-crema);
    line-height: 1.6;
    margin: 0 0 40px 0;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.hero-buttons {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
    animation: fadeInUp 0.8s ease-out 0.6s both;
}

.btn-primary {
    display: inline-block;
    padding: 16px 32px;
    background: var(--color-verde);
    color: var(--color-blanco) !important;
    font-family: var(--font-cuerpo);
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 16px rgba(110, 129, 87, 0.3);
}

.btn-primary:hover {
    background: var(--color-verde-medio);
    transform: translateY(-2px);
}

.btn-secondary {
    display: inline-block;
    padding: 16px 32px;
    background: transparent;
    color: var(--color-crema) !important;
    font-family: var(--font-cuerpo);
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    border: 2px solid var(--color-crema);
    border-radius: 6px;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: rgba(245, 240, 230, 0.15);
}

/* SECCIONES */
.prop-section {
    padding: var(--spacing-section) 20px;
}

.prop-container {
    max-width: var(--max-width);
    margin: 0 auto;
}

.prop-section h2 {
    font-family: var(--font-titulo);
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 600;
    color: var(--color-granate);
    text-align: center;
    margin: 0 0 40px 0;
}

/* QUE HACEMOS */
.section-que-hacemos { background: var(--color-blanco); }
.section-que-hacemos .prop-container { max-width: 800px; text-align: center; }
.section-que-hacemos .lead { font-size: clamp(18px, 3vw, 22px); line-height: 1.7; margin-bottom: 32px; }
.section-que-hacemos .highlight { font-size: clamp(24px, 4vw, 32px); font-weight: 600; color: var(--color-granate); margin-bottom: 32px; }

/* METODO */
.section-metodo { background: var(--color-crema); }
.metodo-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin: 48px 0 40px; }
.metodo-card { padding: 40px 24px; border-radius: 8px; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.1); transition: transform 0.3s ease; }
.metodo-card.verde { background: var(--color-verde); }
.metodo-card.granate { background: var(--color-granate); }
.metodo-card.destacado { transform: scale(1.05); }
.metodo-card:hover { transform: translateY(-8px); }
.metodo-card .porcentaje { font-size: 56px; font-weight: 700; color: var(--color-blanco); display: block; }
.metodo-card h3 { font-size: 24px; font-weight: 600; color: var(--color-blanco); margin: 16px 0 8px; }
.metodo-card p { font-size: 16px; color: var(--color-blanco); margin: 0; }
.metodo-footer { font-size: 20px; text-align: center; line-height: 1.6; }

/* PILARES */
.section-pilares { background: var(--color-blanco); }
.pilares-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; margin-top: 48px; }
.pilar-card { background: var(--color-blanco); border-radius: 8px; padding: 40px 32px; border-top: 4px solid var(--color-granate); box-shadow: 0 4px 16px rgba(0,0,0,0.08); transition: all 0.4s ease; text-align: center; }
.pilar-card:hover { transform: translateY(-12px); border-top-color: var(--color-verde); }
.pilar-icon { width: 64px; height: 64px; margin: 0 auto 24px; display: flex; align-items: center; justify-content: center; background: var(--color-crema); border-radius: 50%; color: var(--color-granate); }
.pilar-card h3 { font-size: 28px; font-weight: 600; color: var(--color-granate); margin: 0 0 16px; }
.pilar-card p { font-size: 16px; line-height: 1.7; margin: 0 0 24px; }
.pilar-link { font-size: 14px; font-weight: 600; color: var(--color-verde); text-decoration: none; }
.pilar-link:hover { text-decoration: underline; }

/* POR QUE */
.section-porque { background: var(--color-crema); }
.section-porque .prop-container { max-width: 800px; }
.porque-list { margin-top: 48px; }
.porque-item { padding: 24px 0; border-bottom: 1px solid #AEADB3; }
.porque-item.last { border-bottom: none; }
.porque-item h3 { font-size: 22px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px; padding-left: 24px; position: relative; }
.porque-item h3::before { content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%); width: 8px; height: 8px; background: var(--color-verde); border-radius: 50%; }
.porque-item p { font-size: 18px; margin: 0; padding-left: 24px; }

/* CTA */
.section-cta-final { background: var(--color-granate); text-align: center; }
.section-cta-final .prop-container { max-width: 600px; }
.section-cta-final h2 { color: var(--color-crema); }
.section-cta-final p { font-size: 20px; color: var(--color-crema); line-height: 1.6; margin: 0 0 40px; }
.btn-cta { display: inline-block; padding: 18px 48px; background: var(--color-verde); color: var(--color-blanco) !important; font-size: 18px; font-weight: 600; text-decoration: none; border-radius: 6px; transition: all 0.3s ease; }
.btn-cta:hover { background: var(--color-verde-medio); transform: translateY(-3px); }

@keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

@media (max-width: 768px) {
    .metodo-cards, .pilares-cards { grid-template-columns: 1fr; }
    .metodo-card.destacado { transform: scale(1); }
    .hero-buttons { flex-direction: column; padding: 0 20px; }
    .btn-primary, .btn-secondary { width: 100%; text-align: center; }
}
</style>

<main id="content" class="site-main">

<!-- HERO CON SLIDER -->
<div class="homepage-hero-slider">
    <div class="hero-slider">
        <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=1920&q=80');"></div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?w=1920&q=80');"></div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1920&q=80');"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-slider-dots">
        <button class="slider-dot active" data-slide="0" aria-label="Imagen 1"></button>
        <button class="slider-dot" data-slide="1" aria-label="Imagen 2"></button>
        <button class="slider-dot" data-slide="2" aria-label="Imagen 3"></button>
    </div>
    <div class="hero-content">
        <div class="hero-content-inner">
            <h1>Digitalización sin complicaciones</h1>
            <p class="hero-subtitle">Acompañamos a empresas y personas en el cambio tecnológico.<br>Sin traumas. Con resultados.</p>
            <div class="hero-buttons">
                <a href="/metodologia/" class="btn-primary">Conozca cómo trabajamos</a>
                <a href="/contacto/" class="btn-secondary">Hablemos</a>
            </div>
        </div>
    </div>
</div>

<!-- QUE HACEMOS -->
<section class="prop-section section-que-hacemos">
    <div class="prop-container">
        <h2>Tecnología al servicio de las personas</h2>
        <p class="lead">Muchas empresas se sienten desbordadas por los cambios tecnológicos. La tecnología puede ser costosa, difícil de usar y aún más difícil de adoptar.</p>
        <p class="highlight">Nosotros lo hacemos fácil.</p>
        <p>Partimos de las personas y lo que necesitan. Después, desarrollamos o implementamos la tecnología adecuada. El resultado: cambios que funcionan, equipos que los adoptan, y empresas que crecen.</p>
    </div>
</section>

<!-- METODO 20-60-20 -->
<section class="prop-section section-metodo">
    <div class="prop-container">
        <h2>Nuestro método: las personas siempre al mando</h2>
        <div class="metodo-cards">
            <div class="metodo-card verde">
                <span class="porcentaje">20%</span>
                <h3>Su equipo define</h3>
                <p>Estrategia y contexto</p>
            </div>
            <div class="metodo-card granate destacado">
                <span class="porcentaje">60%</span>
                <h3>La IA trabaja</h3>
                <p>Tareas repetitivas</p>
            </div>
            <div class="metodo-card verde">
                <span class="porcentaje">20%</span>
                <h3>Su equipo valida</h3>
                <p>Calidad y decisiones</p>
            </div>
        </div>
        <p class="metodo-footer">La inteligencia artificial hace el trabajo pesado.<br>Sus personas ponen la inteligencia que importa: la humana.</p>
    </div>
</section>

<!-- TRES PILARES -->
<section class="prop-section section-pilares">
    <div class="prop-container">
        <h2>Tres áreas, un objetivo: su crecimiento</h2>
        <div class="pilares-cards">
            <div class="pilar-card">
                <div class="pilar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
                </div>
                <h3>Estrategia</h3>
                <p>Definimos el camino. Analizamos su situación y diseñamos un plan de acción realista.</p>
                <a href="/consultoria/" class="pilar-link">Conozca nuestro enfoque →</a>
            </div>
            <div class="pilar-card">
                <div class="pilar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <h3>Tecnología</h3>
                <p>Implementamos soluciones que funcionan. Sin complicaciones innecesarias.</p>
                <a href="/servicios/" class="pilar-link">Vea nuestros servicios →</a>
            </div>
            <div class="pilar-card">
                <div class="pilar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Personas</h3>
                <p>Acompañamos a sus equipos. Les transferimos el conocimiento para que sean autónomos.</p>
                <a href="/nosotros-preview.html" class="pilar-link">Conozca al equipo →</a>
            </div>
        </div>
    </div>
</section>

<!-- POR QUE ELEGIRNOS -->
<section class="prop-section section-porque">
    <div class="prop-container">
        <h2>¿Por qué elegirnos?</h2>
        <div class="porque-list">
            <div class="porque-item">
                <h3>Trabajamos dentro de su ecosistema</h3>
                <p>No reemplazamos lo que funciona. Optimizamos lo que tiene.</p>
            </div>
            <div class="porque-item">
                <h3>Transferimos conocimiento</h3>
                <p>No creamos dependencia. Formamos a su equipo para que crezca solo.</p>
            </div>
            <div class="porque-item">
                <h3>Resultados medibles</h3>
                <p>Posicionamiento, ventas, eficiencia. Números que puede ver.</p>
            </div>
            <div class="porque-item last">
                <h3>Presupuestos reales</h3>
                <p>Hacemos más con menos. Sin sorpresas.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="prop-section section-cta-final">
    <div class="prop-container">
        <h2>¿Hablamos?</h2>
        <p>Sin compromiso. Sin presión.<br>Cuéntenos qué necesita y le diremos honestamente si podemos ayudarle.</p>
        <a href="/contacto/" class="btn-cta">Contactar</a>
    </div>
</section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            dots[i].classList.remove('active');
        });
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length);
    }

    function startSlider() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    function stopSlider() {
        clearInterval(slideInterval);
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopSlider();
            showSlide(index);
            startSlider();
        });
    });

    startSlider();

    const slider = document.querySelector('.homepage-hero-slider');
    if (slider) {
        slider.addEventListener('mouseenter', stopSlider);
        slider.addEventListener('mouseleave', startSlider);
    }
});
</script>

<!-- Footer -->
<footer class="site-footer" style="background:#5F322F; padding:40px 50px; margin-top:0;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
        <div style="flex:1; min-width:200px;">
            <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Logo_-Estrategia-Tecnologia-y-Personas.png" alt="Proportione" style="max-width:200px; height:auto;">
        </div>
        <div style="flex:1; min-width:200px; text-align:center;">
            <a href="/politica-privacidad/" style="color:#F5F0E6; text-decoration:none;">Política de Privacidad</a>
            <span style="color:#F5F0E6; margin:0 8px;">|</span>
            <a href="/politica-cookies/" style="color:#F5F0E6; text-decoration:none;">Política de Cookies</a>
        </div>
        <div style="flex:1; min-width:200px; text-align:right;">
            <p style="color:#F5F0E6; margin:0; font-family:'Raleway',sans-serif;">MIT License © 2026 Proportione</p>
        </div>
    </div>
</footer>

<?php get_footer(); ?>
