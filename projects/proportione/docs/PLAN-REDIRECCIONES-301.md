# Plan de Redirecciones 301 - Migración Proportione

**Fecha:** 2026-01-31
**Staging:** https://staging19.proportione.com/
**Producción:** https://proportione.com/
**Estado:** ✅ IMPLEMENTADO EN STAGING (2026-01-31)

---

## A) RESUMEN DEL PLAN + SUPUESTOS

### Decisiones Operativas

1. **Prioridad:** Evitar 404s en URLs con tráfico/backlinks existentes
2. **Enfoque:** 301 permanentes via .htaccess (más eficiente que PHP)
3. **Simplificación de slugs:** Aplicar criterios de legibilidad y keyword principal
4. **Orden de reglas:** Específicas primero, patrones después
5. **Exclusiones:** wp-admin, wp-login.php, wp-json, xmlrpc.php, estáticos

### Supuestos

- Los posts del blog mantienen mismos slugs (confirmado por comparación de sitemaps)
- Las páginas con PHP custom en staging ya funcionan via rewrites internos
- No hay query strings significativos a preservar en las URLs afectadas
- Las páginas en idiomas adicionales (english, portugués) se mantienen iguales

### Fuentes de Datos Utilizadas

| Fuente | Descripción |
|--------|-------------|
| `page-sitemap.xml` producción | 35 páginas |
| `page-sitemap.xml` staging | 45 páginas |
| `post-sitemap.xml` ambos | 103 posts (idénticos) |
| `Keyword-mapping-proportione-home.csv` | Prioridades SEO |
| `.htaccess` staging actual | Rewrites a PHP custom |
| `functions.php` | 4 redirects PHP existentes |

---

## B) INVENTARIO DE URLs

### URLs de Producción (pages)

```
/
/consultoria-estrategica-crecimiento-organico/
/consultoria-estrategica-crecimiento-organico/consultoria-de-gestion-de-negocio-un-enfoque-estrategico/
/consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/
/consultoria-estrategica-crecimiento-organico/desarrollo-de-estrategia-tecnologica-una-guia-para-la-consultoria-de-gestion-de-negocio/
/consultoria-estrategica-crecimiento-organico/estrategia-digital-el-secreto-del-crecimiento-organico-y-bello/
/consultoria-estrategica-crecimiento-organico/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/
/consultoria-estrategica-crecimiento-organico/reingenieria-de-procesos-de-negocio-un-enfoque-estrategico/
/consultoria-estrategica-crecimiento-organico/toma-de-decisiones-un-enfoque-estrategico/
/contacto/
/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/
/estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/
/estrategia-tecnologia-y-personas/divina-proportione/
/estrategia-tecnologia-y-personas/programas-one-to-one-consultoria-estrategica/
/estrategia-tecnologia-y-personas/resultados-clientes/
/forensics/
/futuro-del-retail-tendencias-estrategias/
/futuros-del-trabajo-navegando-era-ia/
/inteligencia-artificial-generativa/
/investigacion-tesis-universidade-de-aveiro/
/marketplaces/
/mensoft/
/politica-privacidad/
/proportione-estrategia-digital-english-2/
/proportione-estrategia-digital-english-3/
/proportione-estrategia-digital-english/
/proportione-estrategia-digital-portugues-2/
/proportione-estrategia-digital-portugues-3/
/proportione-estrategia-digital-portugues/
/proportione-estrategia-transformacion-digital/
/search/
/transformacion-e-innovacion-una-guia-para-el-futuro/
/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-de-innovacion-una-guia-para-el-futuro/
/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-transformacion-digital/
/transformacion-e-innovacion-una-guia-para-el-futuro/innovacion-en-tecnologia/
```

### URLs Nuevas en Staging (no existen en producción)

```
/clientes/                    → Nueva página (PHP custom)
/consultoria-negocio/         → Nueva página (PHP custom)
/estrategia-innovacion/       → Nueva página (PHP custom)
/estrategia-omnicanal-retail/ → Slug simplificado
/estrategia-tecnologia-y-personas/ → Página padre visible
/filosofia/                   → Slug simplificado
/home-elementor/              → Página técnica (ignorar)
/ia-generativa/               → Slug simplificado
/investigacion/               → Nueva página (PHP custom)
/javier-cuervo/               → Nueva página persona
/mayte-tortosa/               → Nueva página persona
/metodologia/                 → Nueva página (PHP custom)
/nosotros/                    → Nueva página (PHP custom)
/servicios/                   → Nueva página (PHP custom)
```

---

## C) TABLA DE MAPPING (old → new)

### Redirecciones Confirmadas

| # | URL Producción (old_path) | URL Staging (new_path) | Motivo | Estado |
|---|---------------------------|------------------------|--------|--------|
| 1 | `/inteligencia-artificial-generativa/` | `/ia-generativa/` | Simplificación slug (ya en PHP) | ✅ Confirmado |
| 2 | `/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/` | `/estrategia-omnicanal-retail/` | Simplificación slug (ya en PHP) | ✅ Confirmado |
| 3 | `/estrategia-tecnologia-y-personas/divina-proportione/` | `/filosofia/` | Cambio estructura + simplificación | ✅ Confirmado |
| 4 | `/estrategia-tecnologia-y-personas/resultados-clientes/` | `/clientes/` | Cambio estructura + simplificación | ✅ Confirmado |
| 5 | `/investigacion-tesis-universidade-de-aveiro/` | `/investigacion/` | Simplificación slug | ✅ Confirmado |
| 6 | `/consultoria-estrategica-crecimiento-organico/consultoria-de-gestion-de-negocio-un-enfoque-estrategico/` | `/consultoria-negocio/` | Simplificación slug | ✅ Confirmado |
| 7 | `/consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/` | `/consultoria-tecnologia/` | Simplificación slug | ⚠️ Pendiente crear página |
| 8 | `/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-de-innovacion-una-guia-para-el-futuro/` | `/estrategia-innovacion/` | Simplificación slug | ✅ Confirmado |

### Redirecciones de Estructura (páginas padre)

| # | URL Producción (old_path) | URL Staging (new_path) | Motivo | Estado |
|---|---------------------------|------------------------|--------|--------|
| 9 | `/consultoria-estrategica-crecimiento-organico/` | `/servicios/` | Consolidación estructura | ✅ Confirmado |
| 10 | `/transformacion-e-innovacion-una-guia-para-el-futuro/` | `/servicios/` | Consolidación estructura | ✅ Confirmado |

### Slugs Largos Pendientes de Decisión

| URL Actual | Slug Actual (chars) | Propuesta | Decisión |
|------------|---------------------|-----------|----------|
| `/consultoria-estrategica-crecimiento-organico/desarrollo-de-estrategia-tecnologica-una-guia-para-la-consultoria-de-gestion-de-negocio/` | 95 chars | `/desarrollo-estrategia-tecnologica/` | ⚠️ PENDIENTE |
| `/consultoria-estrategica-crecimiento-organico/estrategia-digital-el-secreto-del-crecimiento-organico-y-bello/` | 77 chars | `/estrategia-digital-crecimiento/` | ⚠️ PENDIENTE |
| `/consultoria-estrategica-crecimiento-organico/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/` | 81 chars | `/organizacion-agile/` | ⚠️ PENDIENTE |
| `/consultoria-estrategica-crecimiento-organico/reingenieria-de-procesos-de-negocio-un-enfoque-estrategico/` | 76 chars | `/reingenieria-procesos/` | ⚠️ PENDIENTE |
| `/consultoria-estrategica-crecimiento-organico/toma-de-decisiones-un-enfoque-estrategico/` | 59 chars | `/toma-decisiones-estrategica/` | ⚠️ PENDIENTE |
| `/estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/` | 70 chars | `/arquitectura-modular-ecommerce/` | ⚠️ PENDIENTE |
| `/estrategia-tecnologia-y-personas/programas-one-to-one-consultoria-estrategica/` | 58 chars | `/consultoria-one-to-one/` | ⚠️ PENDIENTE |
| `/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-transformacion-digital/` | 57 chars | `/transformacion-digital/` | ⚠️ PENDIENTE |
| `/transformacion-e-innovacion-una-guia-para-el-futuro/innovacion-en-tecnologia/` | 47 chars | `/innovacion-tecnologia/` | ⚠️ PENDIENTE |

### URLs Sin Cambios (mantienen slug)

- `/contacto/` → Sin cambios
- `/forensics/` → Sin cambios
- `/futuro-del-retail-tendencias-estrategias/` → Sin cambios
- `/futuros-del-trabajo-navegando-era-ia/` → Sin cambios
- `/marketplaces/` → Sin cambios
- `/mensoft/` → Sin cambios
- `/politica-privacidad/` → Sin cambios (considerar noindex)
- `/proportione-estrategia-digital-english*/` → Sin cambios
- `/proportione-estrategia-digital-portugues*/` → Sin cambios
- `/proportione-estrategia-transformacion-digital/` → Sin cambios
- `/search/` → Sin cambios
- `/blog/` → Sin cambios (posts mantienen slugs)
- Todos los posts → Sin cambios

---

## D) BLOQUE .htaccess PROPUESTO

```apache
# =====================================================
# PROPORTIONE - Redirecciones 301 Migración 2026
# Fecha: 2026-01-31
# COLOCAR ANTES del bloque # BEGIN WordPress
# =====================================================

<IfModule mod_rewrite.c>
RewriteEngine On

# --- Exclusiones (no redirigir) ---
RewriteCond %{REQUEST_URI} ^/wp-admin [NC,OR]
RewriteCond %{REQUEST_URI} ^/wp-login\.php [NC,OR]
RewriteCond %{REQUEST_URI} ^/wp-json [NC,OR]
RewriteCond %{REQUEST_URI} ^/xmlrpc\.php [NC,OR]
RewriteCond %{REQUEST_URI} \.(css|js|jpg|jpeg|png|gif|ico|svg|woff|woff2|ttf|eot)$ [NC]
RewriteRule ^ - [L]

# =====================================================
# REDIRECCIONES ESPECÍFICAS (orden: más específica primero)
# =====================================================

# --- Simplificación de slugs largos (páginas anidadas) ---

# Estrategia de innovación
RewriteCond %{REQUEST_URI} ^/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-de-innovacion-una-guia-para-el-futuro/?$ [NC]
RewriteRule ^ /estrategia-innovacion/ [R=301,L]

# IA Generativa
RewriteCond %{REQUEST_URI} ^/inteligencia-artificial-generativa/?$ [NC]
RewriteRule ^ /ia-generativa/ [R=301,L]

# Estrategia omnicanal retail
RewriteCond %{REQUEST_URI} ^/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/?$ [NC]
RewriteRule ^ /estrategia-omnicanal-retail/ [R=301,L]

# Filosofía (antes divina-proportione)
RewriteCond %{REQUEST_URI} ^/estrategia-tecnologia-y-personas/divina-proportione/?$ [NC]
RewriteRule ^ /filosofia/ [R=301,L]

# Clientes (antes resultados-clientes)
RewriteCond %{REQUEST_URI} ^/estrategia-tecnologia-y-personas/resultados-clientes/?$ [NC]
RewriteRule ^ /clientes/ [R=301,L]

# Investigación
RewriteCond %{REQUEST_URI} ^/investigacion-tesis-universidade-de-aveiro/?$ [NC]
RewriteRule ^ /investigacion/ [R=301,L]

# Consultoría de negocio
RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/consultoria-de-gestion-de-negocio-un-enfoque-estrategico/?$ [NC]
RewriteRule ^ /consultoria-negocio/ [R=301,L]

# --- Consolidación de páginas padre ---

# Consultoria estrategica → Servicios
RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/?$ [NC]
RewriteRule ^ /servicios/ [R=301,L]

# Transformación e innovación → Servicios
RewriteCond %{REQUEST_URI} ^/transformacion-e-innovacion-una-guia-para-el-futuro/?$ [NC]
RewriteRule ^ /servicios/ [R=301,L]

# =====================================================
# REDIRECCIONES OPCIONALES (descomentar si se decide)
# =====================================================

# # Consultoría de tecnología (requiere crear página)
# RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/consultoria-de-tecnologia/?$ [NC]
# RewriteRule ^ /consultoria-tecnologia/ [R=301,L]

# # Desarrollo estrategia tecnológica
# RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/desarrollo-de-estrategia-tecnologica-una-guia-para-la-consultoria-de-gestion-de-negocio/?$ [NC]
# RewriteRule ^ /desarrollo-estrategia-tecnologica/ [R=301,L]

# # Estrategia digital crecimiento
# RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/estrategia-digital-el-secreto-del-crecimiento-organico-y-bello/?$ [NC]
# RewriteRule ^ /estrategia-digital-crecimiento/ [R=301,L]

# # Organización agile
# RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/?$ [NC]
# RewriteRule ^ /organizacion-agile/ [R=301,L]

# # Reingeniería de procesos
# RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/reingenieria-de-procesos-de-negocio-un-enfoque-estrategico/?$ [NC]
# RewriteRule ^ /reingenieria-procesos/ [R=301,L]

# # Toma de decisiones
# RewriteCond %{REQUEST_URI} ^/consultoria-estrategica-crecimiento-organico/toma-de-decisiones-un-enfoque-estrategico/?$ [NC]
# RewriteRule ^ /toma-decisiones-estrategica/ [R=301,L]

# # Arquitectura modular ecommerce
# RewriteCond %{REQUEST_URI} ^/estrategia-tecnologia-y-personas/arquitectura-modular-ecommerce-flexibilidad-rendimiento/?$ [NC]
# RewriteRule ^ /arquitectura-modular-ecommerce/ [R=301,L]

# # Consultoría one-to-one
# RewriteCond %{REQUEST_URI} ^/estrategia-tecnologia-y-personas/programas-one-to-one-consultoria-estrategica/?$ [NC]
# RewriteRule ^ /consultoria-one-to-one/ [R=301,L]

# # Transformación digital
# RewriteCond %{REQUEST_URI} ^/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-transformacion-digital/?$ [NC]
# RewriteRule ^ /transformacion-digital/ [R=301,L]

# # Innovación tecnología
# RewriteCond %{REQUEST_URI} ^/transformacion-e-innovacion-una-guia-para-el-futuro/innovacion-en-tecnologia/?$ [NC]
# RewriteRule ^ /innovacion-tecnologia/ [R=301,L]

</IfModule>

# =====================================================
# FIN REDIRECCIONES PROPORTIONE
# =====================================================
```

---

## E) COMANDOS DE TEST (curl)

### Verificar 301 + destino final (no cadenas)

```bash
#!/bin/bash
# test-redirects.sh
# Ejecutar contra staging primero, luego producción

BASE_URL="${1:-https://staging19.proportione.com}"

echo "=== Testing redirects on $BASE_URL ==="

# Array de tests: "old_path|expected_new_path"
declare -a TESTS=(
  "/inteligencia-artificial-generativa/|/ia-generativa/"
  "/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/|/estrategia-omnicanal-retail/"
  "/estrategia-tecnologia-y-personas/divina-proportione/|/filosofia/"
  "/estrategia-tecnologia-y-personas/resultados-clientes/|/clientes/"
  "/investigacion-tesis-universidade-de-aveiro/|/investigacion/"
  "/consultoria-estrategica-crecimiento-organico/consultoria-de-gestion-de-negocio-un-enfoque-estrategico/|/consultoria-negocio/"
  "/transformacion-e-innovacion-una-guia-para-el-futuro/estrategia-de-innovacion-una-guia-para-el-futuro/|/estrategia-innovacion/"
  "/consultoria-estrategica-crecimiento-organico/|/servicios/"
  "/transformacion-e-innovacion-una-guia-para-el-futuro/|/servicios/"
)

for test in "${TESTS[@]}"; do
  IFS='|' read -r old_path expected_path <<< "$test"

  echo ""
  echo "Testing: $old_path"
  echo "Expected: $expected_path"

  # Get redirect info
  result=$(curl -sI -o /dev/null -w "%{http_code}|%{redirect_url}" "${BASE_URL}${old_path}")
  IFS='|' read -r status redirect <<< "$result"

  if [ "$status" == "301" ]; then
    # Check if redirect matches expected
    if [[ "$redirect" == *"$expected_path"* ]]; then
      echo "✅ PASS: 301 → $redirect"

      # Verify final destination returns 200
      final_status=$(curl -sI -o /dev/null -w "%{http_code}" "$redirect")
      if [ "$final_status" == "200" ]; then
        echo "   ✅ Final: 200 OK"
      else
        echo "   ⚠️ Final: $final_status (expected 200)"
      fi
    else
      echo "❌ FAIL: 301 → $redirect (expected $expected_path)"
    fi
  else
    echo "❌ FAIL: Status $status (expected 301)"
  fi
done

echo ""
echo "=== Tests complete ==="
```

### Verificar que no hay cadenas de redirecciones

```bash
# Detectar cadenas (más de 1 redirect)
curl -sIL "https://staging19.proportione.com/inteligencia-artificial-generativa/" 2>&1 | grep -c "301"
# Esperado: 1 (solo una redirección)

# Ver toda la cadena
curl -sIL -o /dev/null -w "Redirects: %{num_redirects}\nFinal URL: %{url_effective}\nFinal Status: %{http_code}\n" "https://staging19.proportione.com/inteligencia-artificial-generativa/"
```

### Tests individuales rápidos

```bash
# Test individual
curl -sI "https://staging19.proportione.com/inteligencia-artificial-generativa/" | head -5

# Verificar destino final
curl -sIL "https://staging19.proportione.com/inteligencia-artificial-generativa/" -o /dev/null -w "%{url_effective}\n"
```

---

## F) SEGURIDAD Y CONTROL DE CAMBIOS

### Backup antes de aplicar

```bash
# 1. Backup del .htaccess actual
ssh -i ~/.ssh/siteground_key -p 18765 u7-hsfspysgq8vx@ssh.proportione.com \
  "cp /home/customer/www/staging19.proportione.com/public_html/.htaccess \
      /home/customer/www/staging19.proportione.com/public_html/.htaccess.backup-$(date +%Y%m%d)"

# 2. Descargar copia local
scp -i ~/.ssh/siteground_key -P 18765 \
  u7-hsfspysgq8vx@ssh.proportione.com:/home/customer/www/staging19.proportione.com/public_html/.htaccess \
  /Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione/staging19-backup/.htaccess.backup
```

### Plan de rollback

```bash
# Si algo falla, restaurar inmediatamente:
ssh -i ~/.ssh/siteground_key -p 18765 u7-hsfspysgq8vx@ssh.proportione.com \
  "cp /home/customer/www/staging19.proportione.com/public_html/.htaccess.backup-YYYYMMDD \
      /home/customer/www/staging19.proportione.com/public_html/.htaccess"
```

### Orden de implementación

1. **Staging primero** - Aplicar y testear todas las redirecciones
2. **QA completo** - Ejecutar script de tests
3. **Producción** - Solo después de validar staging
4. **Monitorización** - Search Console + analytics 48h post-deploy

---

## G) NOTAS Y PENDIENTES

### Pendiente de confirmación del usuario

1. ¿Simplificar los slugs marcados como "PENDIENTE" en la tabla?
2. ¿Crear página `/consultoria-tecnologia/` para la redirección #7?
3. ¿Consolidar todas las páginas hijo de `/consultoria-estrategica-crecimiento-organico/` a `/servicios/`?

### Redirecciones ya implementadas en PHP (functions.php)

Las siguientes ya están en PHP y deben **migrarse a .htaccess** para mejor rendimiento:
- `/inteligencia-artificial-generativa/` → `/ia-generativa/`
- `/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/` → `/estrategia-omnicanal-retail/`
- `/estrategia-tecnologia-y-personas/divina-proportione/` → `/filosofia/`
- `/estrategia-tecnologia-y-personas/resultados-clientes/` → `/clientes/`

### Páginas que requieren noindex (según keyword mapping)

- `/politica-privacidad/` → Añadir `noindex` en Yoast

---

## H) PRÓXIMOS PASOS

1. [x] Revisar y aprobar este plan ✅
2. [ ] Confirmar decisiones sobre slugs pendientes
3. [ ] Crear páginas faltantes en staging si se confirman redirecciones opcionales
4. [x] Aplicar bloque .htaccess en staging ✅ (2026-01-31)
5. [x] Ejecutar tests de validación ✅ (9/9 OK, sin cadenas)
6. [x] Documentar resultados ✅
7. [ ] Aplicar en producción tras aprobación

### Resultados de Tests (2026-01-31)

| # | Origen | Destino | 301 | Final 200 |
|---|--------|---------|-----|-----------|
| 1 | `/inteligencia-artificial-generativa/` | `/ia-generativa/` | ✅ | ✅ |
| 2 | `/estrategia-omnicanal-el-camino...` | `/estrategia-omnicanal-retail/` | ✅ | ✅ |
| 3 | `/estrategia-tecnologia-y-personas/divina-proportione/` | `/filosofia/` | ✅ | ✅ |
| 4 | `/estrategia-tecnologia-y-personas/resultados-clientes/` | `/clientes/` | ✅ | ✅ |
| 5 | `/investigacion-tesis-universidade-de-aveiro/` | `/investigacion/` | ✅ | ✅ |
| 6 | `/consultoria-estrategica.../consultoria-de-gestion...` | `/consultoria-negocio/` | ✅ | ✅ |
| 7 | `/transformacion-e-innovacion.../estrategia-de-innovacion...` | `/estrategia-innovacion/` | ✅ | ✅ |
| 8 | `/consultoria-estrategica-crecimiento-organico/` | `/servicios/` | ✅ | ✅ |
| 9 | `/transformacion-e-innovacion-una-guia-para-el-futuro/` | `/servicios/` | ✅ | ✅ |

**Cadenas de redirección:** 0 (todas son directas)

---

*Documento generado por Claude Code - 2026-01-31*
