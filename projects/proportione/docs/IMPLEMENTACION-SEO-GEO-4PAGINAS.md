# Implementacion SEO/GEO - 4 Paginas Rediseñadas

**Fecha:** 2026-01-31
**Version:** 1.0
**Autor:** Claude Code

---

## Resumen Ejecutivo

Este documento describe la implementacion del rediseno de 4 paginas del sitio staging19.proportione.com con optimizacion SEO/GEO:

1. **Inteligencia Artificial Generativa** → `/ia-generativa/`
2. **Estrategia Omnicanal** → `/estrategia-omnicanal-retail/`
3. **Divina Proportione** → `/filosofia/`
4. **Investigacion** → `/investigacion/` (contenido actualizado)

---

## 1. Redirecciones 301 Configuradas

### Archivo modificado
`staging19-backup/hello-elementor-child/functions.php`

### Redirecciones activas

| URL Antigua | URL Nueva | Tipo |
|-------------|-----------|------|
| `/inteligencia-artificial-generativa/` | `/ia-generativa/` | 301 |
| `/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/` | `/estrategia-omnicanal-retail/` | 301 |
| `/estrategia-tecnologia-y-personas/divina-proportione/` | `/filosofia/` | 301 |

### Codigo PHP implementado

```php
add_action('template_redirect', 'proportione_seo_redirects');
function proportione_seo_redirects() {
    $redirects = [
        '/inteligencia-artificial-generativa/' => '/ia-generativa/',
        '/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/' => '/estrategia-omnicanal-retail/',
        '/estrategia-tecnologia-y-personas/divina-proportione/' => '/filosofia/',
    ];

    $current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $current_normalized = rtrim($current_path, '/') . '/';

    foreach ($redirects as $old => $new) {
        if ($current_normalized === $old) {
            wp_redirect(home_url($new), 301);
            exit;
        }
    }
}
```

---

## 2. Comandos WP-CLI para Actualizar Slugs

Despues de sincronizar archivos al servidor, ejecutar:

```bash
# Conectar via SSH
ssh -i ~/.ssh/siteground_key u]USUARIO[@stg.SITIO.com

# Actualizar slug de post "Inteligencia Artificial Generativa"
wp post update $(wp post list --post_type=post --name=inteligencia-artificial-generativa --field=ID) --post_name="ia-generativa"

# Actualizar slug de post "Estrategia Omnicanal"
wp post update $(wp post list --post_type=post --name=estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista --field=ID) --post_name="estrategia-omnicanal-retail"

# Verificar pagina Filosofia existe con slug correcto
wp post list --post_type=page --name=filosofia --fields=ID,post_name,post_title
```

**Nota:** Si las paginas no existen, crearlas primero en WordPress con los slugs correctos.

---

## 3. Archivos Creados/Modificados

### Nuevos archivos

| Archivo | Ubicacion | Proposito |
|---------|-----------|-----------|
| `investigacion.css` | `staging19-backup/hello-elementor-child/` | Estilos pagina investigacion |
| `investigacion-page.html` | `content/` | HTML actualizado con 7 lineas |
| `IMPLEMENTACION-SEO-GEO-4PAGINAS.md` | `docs/` | Esta documentacion |

### Archivos modificados

| Archivo | Cambios |
|---------|---------|
| `functions.php` | Redirecciones 301 + carga CSS investigacion |

---

## 4. Pagina de Investigacion - Cambios

### Antes (4 areas genericas)
- Transformacion Digital
- Inteligencia Artificial Aplicada
- Gestion del Cambio
- Ecosistemas Digitales

### Despues (7 lineas documentadas)
1. **Integracion datos busqueda en BI** (linea central, featured)
2. **BI multinivel local + cloud** (DOI disponible)
3. **LLMs y agentes como capa interpretativa**
4. **Privacidad, RGPD y gobernanza**
5. **UX en proyectos sociales (CAPPI)**
6. **Bioseguridad (Catedra UCH-Mensoft)**
7. **Ciencia abierta y trazabilidad**

### Nuevas secciones GEO
- Resumen ejecutivo al inicio
- Cards con metodologia + hallazgos + DOIs
- Seccion publicaciones destacadas
- Banner Open Science (PRISMA, OSF, Zenodo, ORCID)
- Marco institucional (Proportione + Univ. Aveiro)
- CTA "Colaboramos?"

---

## 5. Verificacion Post-Implementacion

### Test de redirecciones

```bash
# Desde terminal local o servidor
curl -I https://staging19.proportione.com/inteligencia-artificial-generativa/ 2>/dev/null | grep -E "HTTP|Location"
# Esperado: HTTP/2 301 + Location: /ia-generativa/

curl -I https://staging19.proportione.com/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/ 2>/dev/null | grep -E "HTTP|Location"
# Esperado: HTTP/2 301 + Location: /estrategia-omnicanal-retail/

curl -I https://staging19.proportione.com/estrategia-tecnologia-y-personas/divina-proportione/ 2>/dev/null | grep -E "HTTP|Location"
# Esperado: HTTP/2 301 + Location: /filosofia/
```

### Verificacion visual

- [ ] `/investigacion/` muestra 7 lineas de investigacion
- [ ] `/investigacion/` tiene gradient granate en hero
- [ ] `/investigacion/` muestra card del investigador con ORCID
- [ ] `/investigacion/` tiene banner Open Science
- [ ] `/filosofia/` accesible como pagina de nivel 1
- [ ] CSS de investigacion carga correctamente

### SEO Checklist

- [ ] Meta title contiene keyword principal
- [ ] Meta description tiene 140-160 caracteres
- [ ] H1 unico por pagina
- [ ] Estructura H2-H3-H4 correcta
- [ ] DOIs visibles y clickeables
- [ ] Links internos funcionan (/contacto/, ORCID)

---

## 6. Sincronizacion con Servidor

```bash
# Cargar clave SSH
ssh-add ~/.ssh/siteground_key

# Sincronizar tema hijo
rsync -avz --delete \
  /Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione/staging19-backup/hello-elementor-child/ \
  USUARIO@stg.SITIO.com:~/public_html/wp-content/themes/hello-elementor-child/

# Limpiar cache de WordPress
ssh USUARIO@stg.SITIO.com "cd ~/public_html && wp cache flush"
```

---

## 7. Google Search Console

Despues de verificar que todo funciona:

1. Solicitar inspeccion de URLs nuevas
2. Verificar que redirecciones 301 se detectan
3. Monitorear errores de rastreo
4. Actualizar sitemap si es necesario

---

## 8. Rollback (si es necesario)

```bash
# Restaurar functions.php original
git checkout HEAD -- staging19-backup/hello-elementor-child/functions.php

# O eliminar solo la funcion de redirecciones:
# Buscar y eliminar el bloque `proportione_seo_redirects` en functions.php
```

---

## Archivos de Referencia

| Documento | Ubicacion |
|-----------|-----------|
| Contenido 7 lineas | `docs/investigacion_proportione.md` |
| Guia Elementor | `docs/GUIA-ELEMENTOR-INVESTIGACION.md` |
| Guias SEO/GEO | `_common/docs/seo-geo-guidelines.md` |
| Contenido filosofia | `content/filosofia-content.md` |

---

**Estado:** Implementacion completada
**Siguiente paso:** Sincronizar con servidor y verificar en staging19.proportione.com
