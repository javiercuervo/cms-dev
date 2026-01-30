const { chromium } = require('playwright');
const path = require('path');

const URL = 'https://staging19.proportione.com/';
const OUTPUT_DIR = path.join(__dirname, '..', 'figma-assets');

const viewports = [
    { name: 'desktop', width: 1920, height: 1080 },
    { name: 'tablet', width: 768, height: 1024 },
    { name: 'mobile', width: 375, height: 812 }
];

async function captureScreenshots() {
    const fs = require('fs');

    // Crear directorio si no existe
    if (!fs.existsSync(OUTPUT_DIR)) {
        fs.mkdirSync(OUTPUT_DIR, { recursive: true });
    }

    const browser = await chromium.launch();

    for (const vp of viewports) {
        console.log(`Capturando ${vp.name} (${vp.width}x${vp.height})...`);

        const context = await browser.newContext({
            viewport: { width: vp.width, height: vp.height }
        });
        const page = await context.newPage();

        await page.goto(URL, { waitUntil: 'networkidle' });

        // Esperar a que las animaciones terminen
        await page.waitForTimeout(2000);

        // Captura full page
        await page.screenshot({
            path: path.join(OUTPUT_DIR, `homepage-${vp.name}-fullpage.png`),
            fullPage: true
        });

        // Captura solo viewport (above the fold)
        await page.screenshot({
            path: path.join(OUTPUT_DIR, `homepage-${vp.name}-viewport.png`),
            fullPage: false
        });

        await context.close();
        console.log(`✓ ${vp.name} completado`);
    }

    await browser.close();
    console.log(`\nCapturas guardadas en: ${OUTPUT_DIR}`);
}

captureScreenshots().catch(console.error);
