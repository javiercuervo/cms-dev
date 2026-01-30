/**
 * ═══════════════════════════════════════════════════════════════
 * PROPORTIONE - Procesador de Imágenes con AltText.ai
 * ═══════════════════════════════════════════════════════════════
 *
 * Este script:
 * 1. Lee imágenes de una carpeta local o URLs
 * 2. Las envía a AltText.ai para generar descripciones
 * 3. Crea un catálogo JSON con toda la información
 *
 * Uso:
 *   node scripts/process-images.js --folder ./figma-assets/banco-imagenes
 *   node scripts/process-images.js --urls urls.txt
 *   node scripts/process-images.js --drive (requiere lista de URLs de Drive)
 */

const fs = require('fs');
const path = require('path');
require('dotenv').config({ path: path.join(__dirname, '..', '.env') });

const ALTTEXT_API_KEY = process.env.ALTTEXT_API_KEY;
const ALTTEXT_ENDPOINT = 'https://alttext.ai/api/v1/images';

// Configuración
const CONFIG = {
    outputDir: path.join(__dirname, '..', 'figma-assets'),
    catalogFile: 'catalogo-imagenes.json',
    supportedFormats: ['.jpg', '.jpeg', '.png', '.webp', '.gif'],
    language: 'es', // Español
    delayBetweenRequests: 1000 // 1 segundo entre peticiones para no saturar
};

/**
 * Genera alt text para una imagen usando AltText.ai
 */
async function generateAltText(imageUrl) {
    try {
        const response = await fetch(ALTTEXT_ENDPOINT, {
            method: 'POST',
            headers: {
                'X-API-Key': ALTTEXT_API_KEY,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                image: { url: imageUrl },
                lang: CONFIG.language
            })
        });

        if (!response.ok) {
            throw new Error(`API error: ${response.status} ${response.statusText}`);
        }

        const data = await response.json();
        return {
            success: true,
            altText: data.alt_text || data.altText || data.description,
            raw: data
        };
    } catch (error) {
        return {
            success: false,
            error: error.message
        };
    }
}

/**
 * Convierte ID de archivo de Google Drive a URL directa
 */
function driveIdToUrl(fileId) {
    return `https://drive.google.com/uc?export=view&id=${fileId}`;
}

/**
 * Extrae el ID de archivo de una URL de Google Drive
 */
function extractDriveFileId(url) {
    const patterns = [
        /\/file\/d\/([a-zA-Z0-9_-]+)/,
        /id=([a-zA-Z0-9_-]+)/,
        /\/d\/([a-zA-Z0-9_-]+)/
    ];

    for (const pattern of patterns) {
        const match = url.match(pattern);
        if (match) return match[1];
    }
    return null;
}

/**
 * Procesa una lista de URLs de imágenes
 */
async function processImageUrls(urls) {
    const catalog = {
        generatedAt: new Date().toISOString(),
        totalImages: urls.length,
        processedImages: 0,
        errors: 0,
        images: []
    };

    console.log(`\n📸 Procesando ${urls.length} imágenes con AltText.ai...\n`);

    for (let i = 0; i < urls.length; i++) {
        const url = urls[i].trim();
        if (!url) continue;

        console.log(`[${i + 1}/${urls.length}] Procesando: ${url.substring(0, 50)}...`);

        const result = await generateAltText(url);

        const imageData = {
            id: i + 1,
            originalUrl: url,
            fileName: path.basename(url).split('?')[0] || `image-${i + 1}`,
            processedAt: new Date().toISOString()
        };

        if (result.success) {
            imageData.altText = result.altText;
            imageData.status = 'success';
            catalog.processedImages++;
            console.log(`   ✓ Alt text: "${result.altText?.substring(0, 60)}..."`);
        } else {
            imageData.error = result.error;
            imageData.status = 'error';
            catalog.errors++;
            console.log(`   ✗ Error: ${result.error}`);
        }

        catalog.images.push(imageData);

        // Esperar entre peticiones
        if (i < urls.length - 1) {
            await new Promise(resolve => setTimeout(resolve, CONFIG.delayBetweenRequests));
        }
    }

    return catalog;
}

/**
 * Procesa imágenes de una carpeta local
 * (Las sube a un servicio temporal para obtener URL, o usa URLs locales si el servidor lo permite)
 */
async function processLocalFolder(folderPath) {
    const files = fs.readdirSync(folderPath)
        .filter(file => CONFIG.supportedFormats.includes(path.extname(file).toLowerCase()));

    console.log(`\n📁 Encontradas ${files.length} imágenes en ${folderPath}`);
    console.log('⚠️  Para procesar imágenes locales, necesitas subirlas a un servidor accesible.');
    console.log('   Opciones:');
    console.log('   1. Subir a WordPress Media Library');
    console.log('   2. Subir a Google Drive (compartidas públicamente)');
    console.log('   3. Usar un servicio como Cloudinary o imgbb');

    return {
        localFiles: files.map(f => ({
            fileName: f,
            localPath: path.join(folderPath, f),
            needsUpload: true
        }))
    };
}

/**
 * Guarda el catálogo en JSON
 */
function saveCatalog(catalog) {
    const outputPath = path.join(CONFIG.outputDir, CONFIG.catalogFile);
    fs.writeFileSync(outputPath, JSON.stringify(catalog, null, 2));
    console.log(`\n💾 Catálogo guardado en: ${outputPath}`);
    return outputPath;
}

/**
 * Genera un resumen para selección de imágenes de homepage
 */
function generateHomepageRecommendations(catalog) {
    const recommendations = {
        hero: [],
        queHacemos: [],
        metodologia: [],
        estrategia: [],
        tecnologia: [],
        personas: []
    };

    const keywords = {
        hero: ['corporativo', 'oficina', 'profesional', 'equipo', 'empresa', 'negocio'],
        queHacemos: ['tecnología', 'digital', 'trabajo', 'colaboración', 'personas'],
        metodologia: ['proceso', 'diagrama', 'flujo', 'método', 'pasos'],
        estrategia: ['planificación', 'análisis', 'gráfico', 'pizarra', 'estrategia', 'reunión'],
        tecnologia: ['código', 'pantalla', 'desarrollo', 'software', 'ordenador', 'digital'],
        personas: ['equipo', 'personas', 'formación', 'colaboración', 'grupo', 'reunión']
    };

    catalog.images.forEach(img => {
        if (!img.altText) return;
        const altTextLower = img.altText.toLowerCase();

        for (const [section, words] of Object.entries(keywords)) {
            const matches = words.filter(word => altTextLower.includes(word));
            if (matches.length > 0) {
                recommendations[section].push({
                    ...img,
                    relevance: matches.length,
                    matchedKeywords: matches
                });
            }
        }
    });

    // Ordenar por relevancia
    for (const section of Object.keys(recommendations)) {
        recommendations[section].sort((a, b) => b.relevance - a.relevance);
    }

    return recommendations;
}

// ═══════════════════════════════════════════════════════════════
// MAIN
// ═══════════════════════════════════════════════════════════════

async function main() {
    console.log('═══════════════════════════════════════════════════════════════');
    console.log('PROPORTIONE - Procesador de Imágenes');
    console.log('═══════════════════════════════════════════════════════════════');

    if (!ALTTEXT_API_KEY) {
        console.error('❌ Error: ALTTEXT_API_KEY no está configurada en .env');
        process.exit(1);
    }

    const args = process.argv.slice(2);

    if (args.includes('--help') || args.length === 0) {
        console.log(`
Uso:
  node process-images.js --urls <archivo.txt>    Procesa URLs de un archivo (una por línea)
  node process-images.js --url <url>             Procesa una sola URL
  node process-images.js --folder <ruta>         Lista imágenes de carpeta local
  node process-images.js --test                  Prueba la API con una imagen de ejemplo

Ejemplos:
  node process-images.js --url "https://example.com/imagen.jpg"
  node process-images.js --urls ./lista-urls.txt
        `);
        return;
    }

    if (args.includes('--test')) {
        console.log('\n🧪 Probando conexión con AltText.ai...');
        const testUrl = 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800';
        const result = await generateAltText(testUrl);

        if (result.success) {
            console.log('✅ Conexión exitosa!');
            console.log(`   Alt text generado: "${result.altText}"`);
        } else {
            console.log('❌ Error en la conexión:', result.error);
        }
        return;
    }

    if (args.includes('--url')) {
        const urlIndex = args.indexOf('--url') + 1;
        const url = args[urlIndex];
        const catalog = await processImageUrls([url]);
        saveCatalog(catalog);
        return;
    }

    if (args.includes('--urls')) {
        const fileIndex = args.indexOf('--urls') + 1;
        const filePath = args[fileIndex];

        if (!fs.existsSync(filePath)) {
            console.error(`❌ Archivo no encontrado: ${filePath}`);
            process.exit(1);
        }

        const urls = fs.readFileSync(filePath, 'utf-8').split('\n').filter(u => u.trim());
        const catalog = await processImageUrls(urls);
        saveCatalog(catalog);

        // Generar recomendaciones
        const recommendations = generateHomepageRecommendations(catalog);
        const recsPath = path.join(CONFIG.outputDir, 'recomendaciones-homepage.json');
        fs.writeFileSync(recsPath, JSON.stringify(recommendations, null, 2));
        console.log(`📋 Recomendaciones guardadas en: ${recsPath}`);
        return;
    }

    if (args.includes('--folder')) {
        const folderIndex = args.indexOf('--folder') + 1;
        const folderPath = args[folderIndex];
        await processLocalFolder(folderPath);
        return;
    }
}

main().catch(console.error);
