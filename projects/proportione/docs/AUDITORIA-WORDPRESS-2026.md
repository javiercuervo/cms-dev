# Auditoría WordPress - Proportione
**Fecha:** 29 de Enero de 2026
**Realizado por:** Claude (Auditoría automatizada)
**Herramienta de gestión:** ModularDS

---

## Resumen Ejecutivo

| Aspecto | Staging | Producción | Estado |
|---------|---------|------------|--------|
| WordPress Core | 6.9 | 6.9 | ✅ Actualizado |
| PHP | 8.2.30 | 8.2.30 | ✅ Actualizado |
| Tema activo | hello-elementor 3.4.6 | twentytwentythree-child | ⚠️ Diferente |
| Plugins con updates | 8 | 8 | ⚠️ Pendientes |
| Plugins activos | 20 | 22 | ⚠️ Diferencias |

---

## 1. Estado del Core de WordPress

### Versión Actual
- **Staging:** WordPress 6.9 ✅ (última versión)
- **Producción:** WordPress 6.9 ✅ (última versión)

### PHP
- **Versión:** PHP 8.2.30 (ZTS)
- **Compatibilidad:** ✅ Compatible con WordPress 6.9
- **Recomendación:** PHP 8.2 tiene soporte hasta Diciembre 2026

---

## 2. Análisis de Plugins

### 2.1 Plugins con Actualizaciones Pendientes

| Plugin | Staging | Disponible | Riesgo | Prioridad |
|--------|---------|------------|--------|-----------|
| **Elementor** | 3.34.3 | 3.34.4 | 🔴 Alto | CRÍTICA |
| **Elementor Pro** | 3.34.3 | 3.34.4 | 🔴 Alto | CRÍTICA |
| **Brevo (mailin)** | 3.2.9 | 3.3.1 | 🟡 Medio | Alta |
| **Modular Connector** | 2.6.0 | 2.6.1 | 🟢 Bajo | Media |
| **WP Schema Pro** | 2.10.5 | 2.10.6 | 🟢 Bajo | Baja |
| **WP Code (headers/footers)** | 2.3.2.1 | 2.3.3 | 🟢 Bajo | Baja |
| **WP Google Maps** | 10.0.04 | 10.0.05 | 🟢 Bajo | Baja |
| **Hustle (popup)** | 7.8.10 | 7.8.10.1 | 🟢 Bajo | Baja (inactivo) |

### 2.2 Diferencias entre Staging y Producción

#### Plugins SOLO activos en Staging:
| Plugin | Versión | Propósito |
|--------|---------|-----------|
| Elementor | 3.34.3 | Page builder (activo para desarrollo) |
| Elementor Pro | 3.34.3 | Page builder PRO |
| Safe SVG | 2.4.0 | Permitir upload de SVGs |

#### Plugins SOLO activos en Producción:
| Plugin | Versión | Propósito |
|--------|---------|-----------|
| DarkMySite Pro | 1.2.7 | Modo oscuro |
| Security Ninja Premium | 5.261 | Seguridad |
| SG Security | 1.5.9 | Seguridad SiteGround |
| SG CachePress | 7.7.6 | Caché SiteGround |
| Hustle | 7.8.10.1 | Popups |

### 2.3 Plugins con Versiones Inesperadas

Estos plugins muestran "version higher than expected" - posiblemente versiones de desarrollo o modificadas:

| Plugin | Versión Staging | Versión Prod | Notas |
|--------|-----------------|--------------|-------|
| 301 Redirects | 6.27 | 6.25 | Staging más reciente |
| WP External Links | 5.31 | 5.31 | Igual |
| WP Reset | 6.20 | 6.20 | Igual |

### 2.4 Inventario Completo de Plugins (Staging)

```
ACTIVOS (20):
├── 301-redirects (6.27)           - Redirecciones
├── alttext-ai (1.10.15)           - Alt text automático con IA
├── mailin/Brevo (3.2.9)           - Email marketing
├── clickrank-ai (3.3.5)           - SEO con IA
├── cookie-notice (2.5.11)         - GDPR cookies
├── elementor (3.34.3)             - Page builder
├── elementor-pro (3.34.3)         - Page builder PRO
├── modular-connector (2.6.0)      - ModularDS connector
├── safe-svg (2.4.0)               - Upload SVGs
├── wp-schema-pro (2.10.5)         - Schema markup
├── stackable (3.19.6)             - Bloques Gutenberg
├── uptimemonster (1.0.0)          - Monitoreo uptime
├── webp-express (0.25.14)         - Conversión WebP
├── wp-code (2.3.2.1)              - Headers/Footers code
├── wp-google-maps (10.0.04)       - Mapas
├── wp-google-maps-gold (5.2.9)    - Maps addon
├── wp-google-maps-pro (9.0.36)    - Maps PRO
├── wp-google-maps-ugm (3.39)      - Maps user generated
├── wp-external-links (5.31)       - Enlaces externos
├── wp-reset (6.20)                - Reset/debug
└── wordpress-seo/Yoast (26.8)     - SEO

INACTIVOS (5):
├── darkmysite-pro (1.2.7)
├── wordpress-popup/Hustle (7.8.10)
├── security-ninja-premium (5.261)
├── sg-security (1.5.9)
└── sg-cachepress (7.7.6)

MUST-USE (3):
├── 0-modular-connector.php        - ModularDS loader
├── accesibilidad.php              - CSS contraste
└── proportione-styles.php         - Estilos custom
```

---

## 3. Análisis de Temas

### 3.1 Diferencias Críticas

| Aspecto | Staging | Producción |
|---------|---------|------------|
| Tema activo | hello-elementor 3.4.6 | twentytwentythree-child |
| Tema padre | hello-elementor | twentytwentythree 1.6 |
| Usa Elementor | ✅ Sí | ⚠️ Parcial |

### 3.2 Implicaciones del Cambio de Tema

**Staging usa Hello Elementor** (tema optimizado para Elementor):
- Mejor rendimiento con Elementor
- Menos conflictos de CSS
- Header/Footer controlados por Elementor

**Producción usa TwentyTwentyThree-child**:
- Tema genérico de WordPress
- Puede tener conflictos con Elementor
- Header/Footer del tema pueden interferir

### 3.3 Recomendación

**Opción A (Recomendada):** Migrar producción a Hello Elementor
- Pros: Mejor compatibilidad con las páginas desarrolladas
- Cons: Requiere verificar que todo funcione

**Opción B:** Mantener TT23-child en producción
- Pros: Sin cambios en producción
- Cons: Posibles conflictos visuales con Elementor

---

## 4. Must-Use Plugins Personalizados

### 4.1 accesibilidad.php
```php
// Carga CSS de contraste para textos sobre fondos oscuros
// Archivo: {theme}/accesibilidad.css
```

### 4.2 proportione-styles.php
```php
// Carga CSS personalizado para Elementor
// Archivos:
// - {theme}/accesibilidad.css
// - {theme}/custom-elementor.css
```

### 4.3 Migración Requerida
- [ ] Verificar que `accesibilidad.css` existe en tema de producción
- [ ] Verificar que `custom-elementor.css` existe en tema de producción
- [ ] Copiar mu-plugins a producción

---

## 5. Base de Datos

### Tamaño (Staging)
| Tabla | Tamaño |
|-------|--------|
| wp_posts | 14.4 MB |
| wp_options | 6.9 MB |
| wp_postmeta | 4.2 MB |
| **Total estimado** | ~26 MB |

### Consideraciones
- El tamaño de `wp_options` es alto (6.9 MB) - posible acumulación de transients
- Recomendación: Limpiar transients antes de migrar

---

## 6. Plan de Actualización Pre-Migración

### Fase 1: Actualizaciones en Staging (Antes de migrar)

#### Prioridad CRÍTICA (hacer YA):
```bash
# 1. Actualizar Elementor (CRÍTICO para las páginas)
wp plugin update elementor elementor-pro

# 2. Actualizar Modular Connector
wp plugin update modular-connector
```

#### Prioridad Alta:
```bash
# 3. Actualizar Brevo
wp plugin update mailin

# 4. Actualizar Schema Pro
wp plugin update wp-schema-pro
```

#### Prioridad Media (puede esperar):
```bash
wp plugin update insert-headers-and-footers wp-google-maps
```

### Fase 2: Verificación Post-Actualización

Checklist después de cada actualización:
- [ ] Homepage carga correctamente
- [ ] Metodología carga correctamente
- [ ] Clientes carga correctamente (hover de logos)
- [ ] Footer visible en todas las páginas
- [ ] Animaciones de Elementor funcionan
- [ ] No hay errores en consola del navegador
- [ ] No hay errores en PHP (wp-content/debug.log)

---

## 7. Plan de Migración a Producción

### 7.1 Pre-requisitos

1. **Backup completo de producción**
   ```bash
   # Via ModularDS o manualmente:
   wp db export backup-prod-$(date +%Y%m%d).sql
   wp plugin list --format=json > plugins-prod-backup.json
   ```

2. **Decisión sobre tema**
   - [ ] Confirmar si se cambia a Hello Elementor
   - [ ] O adaptar CSS para TwentyTwentyThree

3. **Sincronizar versiones de plugins**
   - Actualizar plugins en ambos entornos
   - Verificar que las versiones coincidan

### 7.2 Elementos a Migrar

| Elemento | ID Staging | Método | Notas |
|----------|------------|--------|-------|
| Homepage | 2833 | Elementor JSON | Verificar imágenes |
| Metodología | 2800 | Elementor JSON | Verificar SVGs |
| Clientes | 122 | Elementor JSON | CSS hover incluido |
| Footer | 2796 | Elementor JSON | Template part |
| Imágenes | varios | rsync uploads/ | Solo nuevas |
| mu-plugins | 3 files | scp | Manual |
| CSS custom | 2 files | scp | En tema |

### 7.3 Script de Migración

Ya existe en: `scripts/migrate-to-production.sh`

Comandos disponibles:
```bash
./scripts/migrate-to-production.sh --check-prod-ids
./scripts/migrate-to-production.sh --backup-prod
./scripts/migrate-to-production.sh --export-staging
./scripts/migrate-to-production.sh --sync-uploads
./scripts/migrate-to-production.sh --import-prod
./scripts/migrate-to-production.sh --full-migration
```

### 7.4 Orden de Migración Recomendado

1. **Backup producción** (obligatorio)
2. **Sincronizar uploads/** (imágenes nuevas)
3. **Copiar mu-plugins** (estilos custom)
4. **Copiar CSS custom al tema**
5. **Importar Footer template**
6. **Importar páginas una a una**
7. **Flush cache Elementor**
8. **Verificar cada página**

---

## 8. Integración con ModularDS

### 8.1 Estado Actual
- **Plugin:** modular-connector 2.6.0 (update disponible: 2.6.1)
- **MU-Plugin:** 0-modular-connector.php (loader)
- **Auto-update:** Desactivado

### 8.2 Recomendaciones para ModularDS

1. **Actualizar conector** antes de migrar
2. **Sincronizar mediante ModularDS** si es posible (preferible a manual)
3. **Verificar backups automáticos** están activos
4. **Documentar en ModularDS** los cambios realizados

### 8.3 Flujo de Trabajo Recomendado

```
┌─────────────────┐     ┌─────────────────┐     ┌─────────────────┐
│   Desarrollo    │────▶│    ModularDS    │────▶│   Producción    │
│   (Staging)     │     │   (Gestión)     │     │   (Live)        │
└─────────────────┘     └─────────────────┘     └─────────────────┘
        │                       │                       │
        ▼                       ▼                       ▼
   - Elementor              - Backups              - Caché activo
   - Desarrollo             - Updates              - Seguridad
   - Testing                - Sync                 - Monitoreo
```

---

## 9. Mantenimiento Futuro

### 9.1 Política de Actualizaciones Recomendada

| Tipo | Frecuencia | Entorno | Auto-update |
|------|------------|---------|-------------|
| WordPress Core | Semanal | Staging primero | No |
| Elementor | Inmediato | Staging primero | No |
| Plugins seguridad | Inmediato | Ambos | Sí |
| Otros plugins | Mensual | Staging primero | No |
| Tema | Cuando disponible | Staging primero | No |

### 9.2 Checklist de Mantenimiento Mensual

- [ ] Revisar actualizaciones pendientes en ModularDS
- [ ] Actualizar plugins en staging
- [ ] Verificar funcionamiento en staging
- [ ] Aplicar actualizaciones a producción
- [ ] Verificar backups automáticos
- [ ] Revisar logs de errores
- [ ] Limpiar transients y caché
- [ ] Verificar rendimiento (PageSpeed)

### 9.3 Archivos de Documentación

| Archivo | Propósito |
|---------|-----------|
| `docs/AUDITORIA-WORDPRESS-2026.md` | Este documento |
| `docs/MIGRACION-STAGING-PRODUCCION.md` | Guía de migración |
| `docs/CHANGELOG-STAGING.md` | Historial de cambios |
| `scripts/migrate-to-production.sh` | Script de migración |
| `elementor-templates/` | Backups de templates |

---

## 10. Riesgos y Mitigaciones

### Riesgo 1: Incompatibilidad de Tema
- **Probabilidad:** Media
- **Impacto:** Alto
- **Mitigación:** Probar en staging con tema de producción antes de migrar

### Riesgo 2: Pérdida de Estilos CSS
- **Probabilidad:** Media
- **Impacto:** Medio
- **Mitigación:** Documentar todos los CSS custom, verificar mu-plugins

### Riesgo 3: Conflicto de Plugins
- **Probabilidad:** Baja
- **Impacto:** Alto
- **Mitigación:** Actualizar plugins en staging primero, verificar

### Riesgo 4: Pérdida de Datos
- **Probabilidad:** Muy baja
- **Impacto:** Crítico
- **Mitigación:** Backups obligatorios antes de cualquier cambio

---

## 11. Acciones Inmediatas Recomendadas

### Esta Semana:
1. ✅ Documentar estado actual (este documento)
2. ⏳ Actualizar Elementor en staging (3.34.3 → 3.34.4)
3. ⏳ Actualizar modular-connector (2.6.0 → 2.6.1)
4. ⏳ Verificar todas las páginas post-actualización

### Antes de Migrar:
1. ⏳ Decidir tema para producción
2. ⏳ Sincronizar versiones de plugins
3. ⏳ Ejecutar migración de prueba
4. ⏳ Crear checklist de verificación

### Post-Migración:
1. ⏳ Verificar todas las páginas
2. ⏳ Activar caché de producción
3. ⏳ Monitorear errores 24-48h
4. ⏳ Documentar cambios en ModularDS

---

## Apéndice A: Comandos Útiles

```bash
# Ver versiones
wp core version
wp plugin list --format=table

# Actualizar
wp plugin update --all
wp core update

# Backup
wp db export
wp plugin list --format=json > plugins.json

# Elementor
wp elementor flush_css
wp cache flush

# Debug
wp option get siteurl
wp post list --post_type=page --format=table
```

---

**Documento generado:** 29/01/2026
**Próxima revisión:** Antes de migración a producción
