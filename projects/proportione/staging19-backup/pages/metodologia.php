<?php
/**
 * Página Metodología - Proportione
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
    --color-texto: #333333;
    --color-gris: #AEADB3;
    --font-titulo: 'Georgia', serif;
    --font-cuerpo: 'Raleway', sans-serif;
    --max-width: 1200px;
    --spacing-section: 80px;
}

/* HERO BANNER */
.metodologia-hero {
    position: relative;
    width: 100%;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.metodologia-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_9291-3-scaled.jpg');
    background-size: cover;
    background-position: center;
    filter: brightness(0.4);
}

.metodologia-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(95, 50, 47, 0.6) 0%, rgba(95, 50, 47, 0.4) 100%);
}

.metodologia-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 80px 20px;
    max-width: 900px;
}

.metodologia-hero h1 {
    font-family: var(--font-titulo);
    font-size: clamp(36px, 7vw, 64px);
    font-weight: 700;
    color: var(--color-crema);
    margin: 0 0 20px;
    line-height: 1.1;
    text-shadow: 0 2px 20px rgba(0,0,0,0.3);
}

.metodologia-hero p {
    font-family: var(--font-cuerpo);
    font-size: clamp(18px, 3vw, 22px);
    color: var(--color-crema);
    margin: 0;
    opacity: 0.95;
    text-shadow: 0 1px 10px rgba(0,0,0,0.2);
}

/* SECCIONES */
.met-section { padding: var(--spacing-section) 20px; }
.met-container { max-width: var(--max-width); margin: 0 auto; }
.met-section h2 { font-family: var(--font-titulo); font-size: clamp(28px, 5vw, 42px); font-weight: 600; color: var(--color-granate); text-align: center; margin: 0 0 40px; }
.met-section p { font-family: var(--font-cuerpo); font-size: 18px; line-height: 1.7; }

/* FRAMEWORK */
.section-framework { background: var(--color-blanco); }
.section-framework .met-container { max-width: 800px; text-align: center; }
.section-framework .lead { font-size: clamp(18px, 3vw, 22px); line-height: 1.7; margin-bottom: 24px; }

/* 4 PASOS */
.section-pasos { background: var(--color-crema); }
.pasos-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-top: 48px; }
.paso-card { background: var(--color-blanco); padding: 32px 24px; border-radius: 8px; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.06); transition: transform 0.3s ease; position: relative; }
.paso-card:hover { transform: translateY(-8px); }
.paso-numero { position: absolute; top: -20px; left: 50%; transform: translateX(-50%); width: 40px; height: 40px; background: var(--color-granate); color: var(--color-crema); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: var(--font-titulo); font-size: 20px; font-weight: 700; }
.paso-card h3 { font-family: var(--font-titulo); font-size: 22px; font-weight: 600; color: var(--color-granate); margin: 20px 0 12px; }
.paso-card p { font-size: 15px; line-height: 1.6; margin: 0; }

/* 20-60-20 */
.section-2060 { background: var(--color-blanco); }
.metodo-visual { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin: 48px 0 40px; }
.metodo-bloque { padding: 40px 24px; border-radius: 8px; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.1); transition: transform 0.3s ease; }
.metodo-bloque.verde { background: var(--color-verde); }
.metodo-bloque.granate { background: var(--color-granate); }
.metodo-bloque.destacado { transform: scale(1.05); }
.metodo-bloque:hover { transform: translateY(-8px); }
.metodo-bloque .porcentaje { font-size: 56px; font-weight: 700; color: var(--color-blanco); display: block; }
.metodo-bloque h3 { font-size: 24px; font-weight: 600; color: var(--color-blanco); margin: 16px 0 8px; }
.metodo-bloque p { font-size: 16px; color: var(--color-blanco); margin: 0; }
.metodo-explicacion { font-size: 20px; text-align: center; line-height: 1.6; max-width: 700px; margin: 0 auto; }

/* CAMINO */
.section-camino { background: var(--color-crema); }
.camino-timeline { max-width: 700px; margin: 48px auto 0; }
.camino-item { padding: 24px 0 24px 48px; border-left: 3px solid var(--color-granate); position: relative; }
.camino-item:last-child { border-left-color: var(--color-verde); }
.camino-item::before { content: ''; position: absolute; left: -9px; top: 28px; width: 16px; height: 16px; background: var(--color-granate); border-radius: 50%; border: 3px solid var(--color-crema); }
.camino-item:last-child::before { background: var(--color-verde); }
.camino-item h3 { font-family: var(--font-titulo); font-size: 22px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px; }
.camino-item p { font-size: 16px; margin: 0; }

/* CTA */
.section-cta { background: var(--color-granate); text-align: center; }
.section-cta .met-container { max-width: 600px; }
.section-cta h2 { color: var(--color-crema); }
.section-cta p { font-size: 20px; color: var(--color-crema); line-height: 1.6; margin: 0 0 32px; }
.btn-cta { display: inline-block; padding: 18px 48px; background: var(--color-verde); color: var(--color-blanco) !important; font-family: var(--font-cuerpo); font-size: 17px; font-weight: 600; text-decoration: none; border-radius: 6px; transition: all 0.3s ease; }
.btn-cta:hover { background: var(--color-verde-medio); transform: translateY(-3px); }

@media (max-width: 900px) {
    .pasos-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
    .pasos-grid, .metodo-visual { grid-template-columns: 1fr; }
    .metodo-bloque.destacado { transform: scale(1); }
}
</style>

<main id="content" class="site-main">

<!-- HERO BANNER -->
<section class="metodologia-hero">
    <div class="metodologia-hero-bg"></div>
    <div class="metodologia-hero-overlay"></div>
    <div class="metodologia-hero-content">
        <h1 style="color:#FFFFFF;">Nuestra Metodología</h1>
        <p>Un enfoque probado que pone a las personas en el centro de la transformación tecnológica</p>
    </div>
</section>

<!-- FRAMEWORK -->
<section class="met-section section-framework">
    <div class="met-container">
        <h2>El Framework Proportione</h2>
        <p class="lead">No creemos en soluciones mágicas ni en tecnología por tecnología. Creemos en entender primero, actuar después.</p>
        <p>Nuestro framework combina estrategia, tecnología y gestión del cambio en un proceso colaborativo donde usted siempre mantiene el control.</p>
        <div class="framework-infografia" style="margin-top:30px;text-align:center;">
            <a href="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-framework-vertical-1.png" target="_blank" onclick="event.preventDefault(); document.getElementById('lightbox-framework').style.display='flex'">
                <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-framework-vertical-1.png" alt="Framework Proportione - Método de 4 pasos" style="max-width:400px;width:100%;border-radius:8px;box-shadow:0 4px 20px rgba(0,0,0,0.15);cursor:pointer;transition:transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <p style="font-size:0.9rem;color:#6E8157;margin-top:10px;">Click para ampliar</p>
            </a>
        </div>
        <!-- Lightbox -->
        <div id="lightbox-framework" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.9);z-index:9999;justify-content:center;align-items:center;" onclick="this.style.display='none'">
            <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-framework-vertical-1.png" alt="Framework Proportione" style="max-width:90%;max-height:90%;border-radius:8px;">
            <span style="position:absolute;top:20px;right:30px;color:white;font-size:40px;cursor:pointer;">&times;</span>
        </div>
    </div>
</section>

<!-- 4 PASOS -->
<section class="met-section section-pasos">
    <div class="met-container">
        <h2>Nuestro Método: 4 Pasos Colaborativos</h2>
        <div class="pasos-grid">
            <div class="paso-card">
                <span class="paso-numero">1</span>
                <h3>Escuchar</h3>
                <p>Entendemos su negocio, sus retos y sus objetivos antes de proponer nada.</p>
            </div>
            <div class="paso-card">
                <span class="paso-numero">2</span>
                <h3>Analizar</h3>
                <p>Evaluamos su situación actual y identificamos oportunidades reales de mejora.</p>
            </div>
            <div class="paso-card">
                <span class="paso-numero">3</span>
                <h3>Implementar</h3>
                <p>Ejecutamos con agilidad, adaptándonos a su ritmo y capacidades.</p>
            </div>
            <div class="paso-card">
                <span class="paso-numero">4</span>
                <h3>Transferir</h3>
                <p>Le enseñamos a su equipo para que sea autónomo y no dependa de nosotros.</p>
            </div>
        </div>
    </div>
</section>

<!-- 20-60-20 -->
<section class="met-section section-2060">
    <div class="met-container">
        <h2>Framework Human-Centric AI: 20-60-20</h2>
        <div class="metodo-visual">
            <div class="metodo-bloque verde">
                <span class="porcentaje">20%</span>
                <h3>Su equipo define</h3>
                <p>Estrategia y contexto</p>
            </div>
            <div class="metodo-bloque granate destacado">
                <span class="porcentaje">60%</span>
                <h3 style="color: #6E8157;">La IA trabaja</h3>
                <p>Tareas repetitivas</p>
            </div>
            <div class="metodo-bloque verde">
                <span class="porcentaje">20%</span>
                <h3>Su equipo valida</h3>
                <p>Calidad y decisiones</p>
            </div>
        </div>
        <p class="metodo-explicacion">La inteligencia artificial hace el trabajo pesado.<br>Sus personas ponen la inteligencia que importa: la humana.</p>
    </div>
</section>

<!-- CAMINO -->
<section class="met-section section-camino">
    <div class="met-container">
        <h2>El Camino hacia la Transformación</h2>
        <div class="camino-timeline">
            <div class="camino-item">
                <h3>Diagnóstico inicial</h3>
                <p>Evaluamos su madurez digital y definimos un punto de partida realista.</p>
            </div>
            <div class="camino-item">
                <h3>Hoja de ruta</h3>
                <p>Diseñamos un plan de acción con objetivos medibles y plazos alcanzables.</p>
            </div>
            <div class="camino-item">
                <h3>Pilotos controlados</h3>
                <p>Probamos las soluciones en entornos controlados antes de escalar.</p>
            </div>
            <div class="camino-item">
                <h3>Despliegue gradual</h3>
                <p>Implementamos de forma progresiva, minimizando riesgos y resistencias.</p>
            </div>
            <div class="camino-item">
                <h3>Autonomía total</h3>
                <p>Su equipo domina las herramientas y puede evolucionar sin nuestra ayuda.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="met-section section-cta">
    <div class="met-container">
        <h2>¿Listo para transformar su organización?</h2>
        <p>Hablemos de su situación específica.<br>Sin compromiso, sin presentaciones eternas.</p>
        <a href="/contacto/" class="btn-cta">Agendar una conversación</a>
    </div>
</section>

</main>

<!-- Footer -->
<footer class="site-footer" style="background:#FFFFFF; padding:40px 50px; margin-top:0; border-top: 1px solid #E5E5E5;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
        <div style="flex:1; min-width:200px;">
            <img src="https://staging19.proportione.com/wp-content/uploads/2024/04/Logo_-Estrategia-Tecnologia-y-Personas-300x84.png" alt="Proportione" style="max-width:200px; height:auto;">
        </div>
        <div style="flex:1; min-width:280px; text-align:center; white-space:nowrap;">
            <a href="/politica-privacidad/" style="color:#5F322F; text-decoration:none;">Política de Privacidad</a>
            <span style="color:#5F322F; margin:0 8px;">|</span>
            <a href="/politica-cookies/" style="color:#5F322F; text-decoration:none;">Política de Cookies</a>
        </div>
        <div style="flex:1; min-width:200px; text-align:right;">
            <p style="color:#5F322F; margin:0; font-family:'Raleway',sans-serif;">© 2026 Proportione</p>
        </div>
    </div>
</footer>

<?php get_footer(); ?>
