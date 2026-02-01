<?php
/**
 * Página Nosotros - Proportione
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

/* HERO */
.nosotros-hero {
    position: relative;
    padding: 120px 20px 80px;
    text-align: center;
    overflow: hidden;
}

.nosotros-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.nosotros-hero-bg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%);
}

.nosotros-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(95, 50, 47, 0.88) 0%, rgba(110, 129, 87, 0.75) 100%);
}

.nosotros-hero-content {
    position: relative;
    z-index: 10;
}

.nosotros-hero h1 {
    font-family: var(--font-titulo);
    font-size: clamp(36px, 7vw, 64px);
    font-weight: 700;
    color: var(--color-crema);
    margin: 0 0 20px;
    line-height: 1.1;
}

.nosotros-hero p {
    font-size: clamp(18px, 3vw, 22px);
    color: var(--color-crema);
    max-width: 700px;
    margin: 0 auto;
    opacity: 0.95;
}

/* SECCIONES */
.ns-section { padding: var(--spacing-section) 20px; position: relative; }
.ns-container { max-width: var(--max-width); margin: 0 auto; }
.ns-section h2 { font-family: var(--font-titulo); font-size: clamp(28px, 5vw, 42px); font-weight: 600; color: var(--color-granate); text-align: center; margin: 0 0 40px; }
.ns-section h2::before, .ns-section h2::after { display: none !important; content: none !important; }

/* FILOSOFIA */
.section-filosofia { background: var(--color-blanco); position: relative; overflow: hidden; }
.section-filosofia::before { content: ''; position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: var(--color-crema); border-radius: 50%; opacity: 0.5; }
.section-filosofia::after { content: ''; position: absolute; bottom: -30px; left: -30px; width: 120px; height: 120px; background: var(--color-crema); border-radius: 50%; opacity: 0.4; }
.section-filosofia .ns-container { max-width: 800px; text-align: center; position: relative; z-index: 1; }
.section-filosofia .lead { font-size: clamp(18px, 3vw, 22px); line-height: 1.7; margin-bottom: 24px; }
.section-filosofia p:last-child { font-size: 18px; line-height: 1.8; }

/* COMO TRABAJAMOS */
.section-como { background: var(--color-crema); position: relative; }
.section-como::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--color-granate) 0%, var(--color-verde) 50%, var(--color-granate) 100%); }
.como-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 48px; }
.como-card { background: var(--color-blanco); padding: 32px 24px; border-radius: 8px; text-align: center; box-shadow: 0 4px 16px rgba(0,0,0,0.06); transition: transform 0.3s ease; }
.como-card.verde { border-top: 4px solid var(--color-verde); }
.como-card.granate { border-top: 4px solid var(--color-granate); }
.como-card:hover { transform: translateY(-8px); }
.como-card .icon { width: 56px; height: 56px; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; background: var(--color-crema); border-radius: 50%; color: var(--color-granate); }
.como-card h3 { font-family: var(--font-titulo); font-size: 22px; font-weight: 600; color: var(--color-granate); margin: 0 0 12px; }
.como-card p { font-size: 15px; line-height: 1.6; margin: 0; }

/* EQUIPO */
.section-equipo { background: var(--color-blanco); position: relative; overflow: hidden; }
.section-equipo::before { content: ''; position: absolute; top: 50%; right: -100px; width: 300px; height: 300px; border: 2px solid var(--color-crema); border-radius: 50%; transform: translateY(-50%); }
.section-equipo::after { content: ''; position: absolute; top: 50%; left: -80px; width: 200px; height: 200px; border: 2px solid var(--color-crema); border-radius: 50%; transform: translateY(-50%); }
.equipo-intro { text-align: center; max-width: 700px; margin: 0 auto 48px; font-size: 18px; line-height: 1.7; position: relative; z-index: 1; }
.equipo-cards { display: grid; grid-template-columns: repeat(2, 1fr); gap: 48px; max-width: 900px; margin: 0 auto; }
.equipo-card { background: var(--color-blanco); border-radius: 12px; padding: 40px 32px; text-align: center; box-shadow: 0 4px 24px rgba(0,0,0,0.08); transition: transform 0.3s ease; }
.equipo-card:hover { transform: translateY(-8px); }
.equipo-foto { width: 180px; height: 180px; border-radius: 50%; margin: 0 auto 24px; overflow: hidden; border: 4px solid var(--color-crema); }
.equipo-foto img { width: 100%; height: 100%; object-fit: cover; }
.equipo-foto.placeholder { background: var(--color-granate); display: flex; align-items: center; justify-content: center; }
.equipo-foto.placeholder span { font-family: var(--font-titulo); font-size: 56px; font-weight: 700; color: var(--color-crema); }
.equipo-card h3 { font-family: var(--font-titulo); font-size: 26px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px; }
.equipo-card .cargo { font-size: 15px; color: var(--color-gris); margin: 0 0 16px; }
.equipo-card .bio { font-size: 15px; line-height: 1.6; margin: 0 0 20px; }
.equipo-link { font-size: 14px; font-weight: 600; color: var(--color-verde); text-decoration: none; }
.equipo-link:hover { text-decoration: underline; }

/* DIFERENCIADORES */
.section-diferencia { background: var(--color-crema); position: relative; }
.section-diferencia::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--color-verde) 0%, var(--color-granate) 50%, var(--color-verde) 100%); }
.diferencia-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-top: 48px; }
.diferencia-item { background: var(--color-blanco); padding: 28px 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border-left: 3px solid var(--color-verde); transition: all 0.3s ease; }
.diferencia-item:hover { border-left-color: var(--color-granate); transform: translateX(4px); }
.diferencia-item h3 { font-family: var(--font-titulo); font-size: 20px; font-weight: 600; color: var(--color-granate); margin: 0 0 8px; }
.diferencia-item p { font-size: 16px; margin: 0; padding-left: 24px; }

@media (max-width: 768px) {
    .como-cards, .equipo-cards, .diferencia-grid { grid-template-columns: 1fr; }
}
</style>

<main id="content" class="site-main">

<!-- HERO -->
<section class="nosotros-hero">
    <div class="nosotros-hero-bg">
        <img src="https://staging19.proportione.com/wp-content/uploads/2024/07/5baa5966-25cd-485a-a4e7-934eaa6aaa90-edited.jpg" alt="Escuchamos">
        <div class="nosotros-hero-overlay"></div>
    </div>
    <div class="nosotros-hero-content">
        <h1>Primero escuchamos. Después, trabajamos.</h1>
        <p>Somos consultores senior que entienden su negocio antes de hablar de tecnología.</p>
    </div>
</section>

<!-- Breadcrumb -->
<nav style="max-width: var(--max-width); margin: 0 auto; padding: 20px 20px 0; font-family: var(--font-cuerpo); font-size: 14px;">
    <a href="/" style="color: var(--color-verde); text-decoration: none;">Proportione</a>
    <span style="color: #999; margin: 0 8px;">›</span>
    <span style="color: var(--color-granate);">Nosotros</span>
</nav>

<!-- FILOSOFÍA -->
<section class="ns-section section-filosofia">
    <div class="ns-container">
        <h2>Experiencia que se nota</h2>
        <p class="lead">No somos una consultora de juniors con PowerPoints bonitos. Somos profesionales con décadas de experiencia en estrategia, tecnología y gestión de personas.</p>
        <p>Hemos dirigido empresas. Hemos liderado equipos. Hemos cometido errores y aprendido de ellos. Por eso sabemos lo que funciona y lo que no. Descubre nuestra <a href="/filosofia/" style="color: var(--color-verde); font-weight: 500;">filosofía Divina Proportione</a> y la <a href="/metodologia/" style="color: var(--color-verde); font-weight: 500;">metodología que nos diferencia</a>.</p>
    </div>
</section>

<!-- CÓMO TRABAJAMOS -->
<section class="ns-section section-como">
    <div class="ns-container">
        <h2>Así es como trabajamos</h2>
        <div class="como-cards">
            <div class="como-card verde">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
                </div>
                <h3>Escuchamos</h3>
                <p>Nos sentamos con usted. Preguntamos. No asumimos que sabemos más que usted sobre su empresa.</p>
            </div>
            <div class="como-card granate">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                </div>
                <h3>Entendemos</h3>
                <p>Analizamos su negocio, no solo sus sistemas. Las mejores soluciones nacen de entender el problema real.</p>
            </div>
            <div class="como-card verde">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
                </div>
                <h3>Adaptamos</h3>
                <p>Nos mantenemos al día. La tecnología cambia, y nosotros con ella. Sin dogmas, sin ataduras.</p>
            </div>
        </div>
    </div>
</section>

<!-- EQUIPO -->
<section class="ns-section section-equipo">
    <div class="ns-container">
        <h2>Quiénes somos</h2>
        <p class="equipo-intro">Dos perfiles complementarios. Un mismo objetivo: que su empresa crezca con la tecnología, no a pesar de ella.</p>

        <div class="equipo-cards">
            <div class="equipo-card">
                <div class="equipo-foto">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/IMG_1195-scaled.jpg" alt="Mayte Tortosa">
                </div>
                <h3>Mayte Tortosa</h3>
                <p class="cargo">CEO & Chief People Officer</p>
                <p class="bio">25+ años en RRHH, coaching ejecutivo y transformación organizativa. La tecnología sin personas no sirve.</p>
                <a href="/mayte-tortosa/" class="equipo-link">Conocer a Mayte →</a>
            </div>

            <div class="equipo-card">
                <div class="equipo-foto">
                    <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/columpio.jpg" alt="Javier Cuervo">
                </div>
                <h3>Javier Cuervo</h3>
                <p class="cargo">CTO & Consultor Estratégico</p>
                <p class="bio">15+ años en transformación digital, e-commerce y estrategia tecnológica. La tecnología debe servir al negocio.</p>
                <a href="/javier-cuervo/" class="equipo-link">Conocer a Javier →</a>
            </div>
        </div>
    </div>
</section>

<!-- DIFERENCIADORES -->
<section class="ns-section section-diferencia">
    <div class="ns-container">
        <h2>Por qué somos diferentes</h2>
        <div class="diferencia-grid">
            <div class="diferencia-item">
                <h3>Perfiles senior</h3>
                <p>No mandamos becarios. El que le asesora es el que tiene la experiencia.</p>
            </div>
            <div class="diferencia-item">
                <h3>Hablamos su idioma</h3>
                <p>Nada de jerga técnica innecesaria. Si no lo entiende, es culpa nuestra.</p>
            </div>
            <div class="diferencia-item">
                <h3>Actualizados</h3>
                <p>La IA de ayer no es la de hoy. Nosotros evolucionamos con la tecnología.</p>
            </div>
            <div class="diferencia-item">
                <h3>Sin dependencia</h3>
                <p>No creamos adicción. Le enseñamos a su equipo para que crezca solo.</p>
            </div>
        </div>
    </div>
</section>

<!-- Servicios -->
<section class="ns-section" style="background: var(--color-blanco); text-align: center;">
    <div class="ns-container">
        <h2>Cómo podemos ayudarle</h2>
        <p style="font-size: 18px; color: #666; max-width: 700px; margin: 0 auto 40px;">Combinamos estrategia, tecnología y gestión de personas para impulsar su transformación digital.</p>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 16px;">
            <a href="/servicios/" style="display: inline-block; padding: 14px 28px; background: var(--color-verde); color: #FFFFFF; text-decoration: none; border-radius: 6px; font-weight: 500; transition: all 0.3s ease;">Descubre nuestros servicios</a>
            <a href="/contacto/" style="display: inline-block; padding: 14px 28px; background: var(--color-granate); color: #FFFFFF; text-decoration: none; border-radius: 6px; font-weight: 500; transition: all 0.3s ease;">Hablemos de tu proyecto</a>
        </div>
    </div>
</section>

</main>

<!-- Footer -->
<footer class="site-footer" style="background:#FFFFFF; padding:40px 50px; margin-top:0; border-top: 1px solid #E5E5E5;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
        <div style="flex:1; min-width:200px;">
            <img src="https://staging19.proportione.com/wp-content/uploads/2026/01/proportione-nbg2.png" alt="Proportione" style="max-width:200px; height:auto;">
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
