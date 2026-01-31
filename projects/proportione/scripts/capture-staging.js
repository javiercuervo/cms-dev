const { chromium } = require('playwright');
const path = require('path');
const fs = require('fs');

const URL = 'https://staging19.proportione.com/';
const OUTPUT_DIR = path.join(__dirname, '..', 'figma-assets');

const viewports = [
    { name: 'desktop', width: 1920, height: 1080 },
    { name: 'tablet', width: 768, height: 1024 },
    { name: 'mobile', width: 375, height: 812 }
];

async function captureScreenshots() {
    // Crear directorio si no existe
    if (!fs.existsSync(OUTPUT_DIR)) {
        fs.mkdirSync(OUTPUT_DIR, { recursive: true });
    }

    const timestamp = new Date().toISOString().replace(/[:.]/g, '-').slice(0, 19);
    const sessionDir = path.join(OUTPUT_DIR, `capture-${timestamp}`);
    fs.mkdirSync(sessionDir, { recursive: true });

    console.log('==========================================');
    console.log('  Captura de Screenshots - Staging');
    console.log('==========================================');
    console.log(`  Fecha: ${new Date().toLocaleString()}`);
    console.log(`  Output: ${sessionDir}`);
    console.log('==========================================\n');

    const browser = await chromium.launch();

    // Captura de homepage en diferentes viewports
    for (const vp of viewports) {
        console.log(`\n[${vp.name.toUpperCase()}] Capturando (${vp.width}x${vp.height})...`);

        const context = await browser.newContext({
            viewport: { width: vp.width, height: vp.height }
        });
        const page = await context.newPage();

        await page.goto(URL, { waitUntil: 'networkidle' });
        await page.waitForTimeout(2000);

        // 1. Captura full page
        await page.screenshot({
            path: path.join(sessionDir, `homepage-${vp.name}-fullpage.png`),
            fullPage: true
        });
        console.log(`  - Homepage fullpage`);

        // 2. Captura solo viewport (above the fold)
        await page.screenshot({
            path: path.join(sessionDir, `homepage-${vp.name}-viewport.png`),
            fullPage: false
        });
        console.log(`  - Homepage viewport`);

        // 3. Mobile menu (hamburger)
        if (vp.name === 'mobile' || vp.name === 'tablet') {
            try {
                const hamburger = await page.$('.elementor-menu-toggle');
                if (hamburger) {
                    await hamburger.click();
                    await page.waitForTimeout(800);
                    await page.screenshot({
                        path: path.join(sessionDir, `menu-mobile-${vp.name}-open.png`),
                        fullPage: false
                    });
                    console.log(`  - Mobile menu abierto`);
                }
            } catch (e) {
                console.log(`  - Mobile menu: no encontrado`);
            }
        }

        await context.close();
        console.log(`  [OK] ${vp.name} completado`);
    }

    await browser.close();

    console.log('\n==========================================');
    console.log('  Capturas completadas');
    console.log('==========================================');
    console.log(`  Directorio: ${sessionDir}`);
    console.log(`  Archivos: ${fs.readdirSync(sessionDir).length}`);
    console.log('==========================================\n');
}

captureScreenshots().catch(err => {
    console.error('Error:', err);
    process.exit(1);
});
