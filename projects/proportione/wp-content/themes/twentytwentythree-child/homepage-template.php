<?php
/**
 * Template Name: Homepage Proportione
 * Description: Homepage con slider de imágenes
 */

get_header();
?>

<style>
/* ===========================================
   PROPORTIONE - Homepage con Slider
   =========================================== */

:root {
    --color-granate: #5F322F;
    --color-burdeos: #551122;
    --color-verde: #6E8157;
    --color-verde-oscuro: #3B431C;
    --color-verde-medio: #566E30;
    --color-gris: #AEADB3;
    --color-crema: #F5F0E6;
    --color-blanco: #FFFFFF;
    --color-texto: #333333;
    --font-titulo: 'Bourbon Grotesque', 'Georgia', serif;
    --font-cuerpo: 'Raleway', 'Helvetica Neue', sans-serif;
    --max-width: 1200px;
    --spacing-section: 80px;
}

/* HERO SLIDER */
.homepage-hero-slider {
    position: relative;
    width: 100%;
    height: 85vh;
    min-height: 600px;
    max-height: 900px;
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
    box-shadow: 0 6px 20px rgba(110, 129, 87, 0.4);
    color: var(--color-blanco) !important;
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
    color: var(--color-crema) !important;
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
    line-height: 1.2;
}

/* QUE HACEMOS */
.section-que-hacemos {
    background: var(--color-blanco);
}

.section-que-hacemos .prop-container {
    max-width: 800px;
    text-align: center;
}

.section-que-hacemos .lead {
    font-family: var(--font-cuerpo);
    font-size: clamp(18px, 3vw, 22px);
    color: var(--color-texto);
    line-height: 1.7;
    margin: 0 0 32px 0;
}

.section-que-hacemos .highlight {
    font-family: var(--font-cuerpo);
    font-size: clamp(24px, 4vw, 32px);
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 32px 0;
    position: relative;
    display: inline-block;
}

.section-que-hacemos .highlight::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--color-granate), var(--color-verde));
    border-radius: 2px;
}

.section-que-hacemos p:last-child {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    color: var(--color-texto);
    line-height: 1.8;
    margin: 0;
}

/* METODO */
.section-metodo {
    background: var(--color-crema);
}

.metodo-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin: 48px 0 40px 0;
    align-items: stretch;
}

.metodo-card {
    padding: 40px 24px;
    border-radius: 8px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.metodo-card.verde {
    background: var(--color-verde);
}

.metodo-card.granate {
    background: var(--color-granate);
}

.metodo-card.destacado {
    transform: scale(1.05);
    z-index: 1;
}

.metodo-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
}

.metodo-card.destacado:hover {
    transform: scale(1.05) translateY(-8px);
}

.metodo-card .porcentaje {
    font-family: var(--font-titulo);
    font-size: 56px;
    font-weight: 700;
    color: var(--color-blanco);
    display: block;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.metodo-card h3 {
    font-family: var(--font-cuerpo);
    font-size: 24px;
    font-weight: 600;
    color: var(--color-blanco);
    margin: 16px 0 8px 0;
}

.metodo-card p {
    font-family: var(--font-cuerpo);
    font-size: 16px;
    color: var(--color-blanco);
    margin: 0;
    opacity: 0.9;
}

.metodo-footer {
    font-family: var(--font-cuerpo);
    font-size: 20px;
    color: var(--color-texto);
    text-align: center;
    line-height: 1.6;
    margin: 0;
}

/* PILARES */
.section-pilares {
    background: var(--color-blanco);
}

.pilares-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin-top: 48px;
}

.pilar-card {
    background: var(--color-blanco);
    border-radius: 8px;
    padding: 40px 32px;
    border-top: 4px solid var(--color-granate);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    text-align: center;
}

.pilar-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 16px 40px rgba(95, 50, 47, 0.15);
    border-top-color: var(--color-verde);
}

.pilar-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 24px auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-crema);
    border-radius: 50%;
    color: var(--color-granate);
}

.pilar-card h3 {
    font-family: var(--font-titulo);
    font-size: 28px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 16px 0;
}

.pilar-card p {
    font-family: var(--font-cuerpo);
    font-size: 16px;
    color: var(--color-texto);
    line-height: 1.7;
    margin: 0 0 24px 0;
}

.pilar-link {
    font-family: var(--font-cuerpo);
    font-size: 14px;
    font-weight: 600;
    color: var(--color-verde);
    text-decoration: none;
    transition: color 0.3s ease;
}

.pilar-link:hover {
    color: var(--color-verde-oscuro);
    text-decoration: underline;
}

/* POR QUE */
.section-porque {
    background: var(--color-crema);
}

.section-porque .prop-container {
    max-width: 800px;
}

.porque-list {
    margin-top: 48px;
}

.porque-item {
    padding: 24px 0;
    border-bottom: 1px solid var(--color-gris);
    transition: padding-left 0.3s ease;
}

.porque-item.last {
    border-bottom: none;
}

.porque-item:hover {
    padding-left: 12px;
}

.porque-item h3 {
    font-family: var(--font-titulo);
    font-size: 22px;
    font-weight: 600;
    color: var(--color-granate);
    margin: 0 0 8px 0;
    padding-left: 24px;
    position: relative;
}

.porque-item h3::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: var(--color-verde);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.porque-item:hover h3::before {
    background: var(--color-granate);
    transform: translateY(-50%) scale(1.3);
}

.porque-item p {
    font-family: var(--font-cuerpo);
    font-size: 18px;
    color: var(--color-texto);
    margin: 0;
    padding-left: 24px;
}

/* CTA FINAL */
.section-cta-final {
    background: var(--color-granate);
    position: relative;
    overflow: hidden;
}

.section-cta-final::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0L60 30L30 60L0 30z' fill='%23FFFFFF' fill-opacity='0.03'/%3E%3C/svg%3E");
    pointer-events: none;
}

.section-cta-final .prop-container {
    max-width: 600px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.section-cta-final h2 {
    color: var(--color-crema);
}

.section-cta-final p {
    font-family: var(--font-cuerpo);
    font-size: 20px;
    color: var(--color-crema);
    line-height: 1.6;
    margin: 0 0 40px 0;
}

.btn-cta {
    display: inline-block;
    padding: 18px 48px;
    background: var(--color-verde);
    color: var(--color-blanco) !important;
    font-family: var(--font-cuerpo);
    font-size: 18px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 16px rgba(110, 129, 87, 0.4);
}

.btn-cta:hover {
    background: var(--color-verde-medio);
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(110, 129, 87, 0.5);
    color: var(--color-blanco) !important;
}

/* ANIMACIONES */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .metodo-card.destacado {
        transform: scale(1);
    }
    .metodo-card.destacado:hover {
        transform: translateY(-8px);
    }
}

@media (max-width: 768px) {
    :root {
        --spacing-section: 60px;
    }
    .homepage-hero-slider {
        height: 90vh;
        min-height: 500px;
    }
    .metodo-cards {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .metodo-card:hover,
    .metodo-card.destacado:hover {
        transform: none;
    }
    .pilares-cards {
        grid-template-columns: 1fr;
    }
    .pilar-card:hover {
        transform: none;
    }
    .hero-slider-dots {
        bottom: 24px;
    }
    .porque-item:hover {
        padding-left: 0;
    }
}

@media (max-width: 480px) {
    .hero-buttons {
        flex-direction: column;
        width: 100%;
        padding: 0 20px;
    }
    .btn-primary,
    .btn-secondary {
        width: 100%;
        text-align: center;
    }
    .hero-content h1 {
        font-size: 36px;
    }
    .hero-subtitle {
        font-size: 16px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .hero-slide {
        transition: none;
    }
    .hero-content h1,
    .hero-subtitle,
    .hero-buttons,
    .metodo-card,
    .pilar-card,
    .btn-cta {
        animation: none !important;
        transition: none !important;
    }
}
</style>

<!-- HERO CON SLIDER -->
<div class="homepage-hero-slider">
    <div class="hero-slider">
        <!-- Imagen 1: Pasarela/muelle entrando en agua -->
        <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1540979388789-6cee28a1cdc9?w=1920&q=80');"></div>
        <!-- Imagen 2: Montaña con persona mirando horizonte -->
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?w=1920&q=80');"></div>
        <!-- Imagen 3: Bosque/naturaleza serena -->
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>
                </div>
                <h3>Estrategia</h3>
                <p>Definimos el camino. Analizamos su situación y diseñamos un plan de acción realista.</p>
                <a href="/consultoria/" class="pilar-link">Conozca nuestro enfoque →</a>
            </div>
            <div class="pilar-card">
                <div class="pilar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </div>
                <h3>Tecnología</h3>
                <p>Implementamos soluciones que funcionan. Sin complicaciones innecesarias.</p>
                <a href="/servicios/" class="pilar-link">Vea nuestros servicios →</a>
            </div>
            <div class="pilar-card">
                <div class="pilar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Personas</h3>
                <p>Acompañamos a sus equipos. Les transferimos el conocimiento para que sean autónomos.</p>
                <a href="/equipo/" class="pilar-link">Conozca al equipo →</a>
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
        let next = (currentSlide + 1) % slides.length;
        showSlide(next);
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

    const sliderContainer = document.querySelector('.homepage-hero-slider');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', stopSlider);
        sliderContainer.addEventListener('mouseleave', startSlider);
    }
});
</script>

<?php
get_footer();
