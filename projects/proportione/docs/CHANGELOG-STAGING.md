# Changelog Staging - Proportione

## Punto de Control: 2026-01-28

### Estado Actual del Staging (staging19.proportione.com)

**Tema:** Hello Elementor (activo)
**Elementor Pro:** Instalado y activado
**URL:** https://staging19.proportione.com

---

## Checkpoint v0.1.0 - Base Establecida

### Infraestructura
- [x] Tema Hello Elementor configurado
- [x] Elementor Pro activado
- [x] Conexión SSH funcional
- [x] Flujo de deploy con rsync establecido

### Identidad Visual (CSS Customizer)
- [x] Tipografías: Oswald (títulos) + Raleway (cuerpo)
- [x] Paleta de colores corporativos implementada
- [x] Header con borde inferior 3px color primario (#5F322F)
- [x] Título/tagline del sitio ocultos (solo logo)

### Navegación
- [x] Menú "menu-principal" asignado a ubicación menu-1
- [x] Estructura de 4 categorías + CTA:
  - Nosotros (3 hijos)
  - Servicios (4 hijos)
  - Soluciones (4 hijos)
  - Insights (2 hijos)
  - Contacto (CTA button)
- [x] Flechas dropdown eliminadas
- [x] Submenús con hover y sombra
- [x] Botón Contacto estilizado como CTA

### Archivos Locales Clave
- `projects/proportione/assets/custom-styles.css` - CSS de identidad visual
- `projects/proportione/docs/IDENTIDAD-VISUAL.md` - Manual de marca
- `projects/proportione/docs/BRAND-VOICE-TEMPLATE.md` - Pendiente de Marga

---

## Cambios Pendientes de Producción

*Los cambios se irán añadiendo aquí antes del deploy a producción*

| # | Cambio | Estado | Fecha |
|---|--------|--------|-------|
| 1 | Añadida sección "Origen y Filosofía de la Marca" al manual de identidad: inspiración en *De Divina Proportione* de Luca Pacioli y Leonardo da Vinci, proporción áurea, poliedros de Leonardo | Completado | 2026-01-28 |
| 2 | Documentados assets de marca (Brandbay) y páginas legales en IDENTIDAD-VISUAL.md | Completado | 2026-01-28 |
| 3 | CSS: Fix márgenes en listas con bullets (capacitación personalizada, etc.) | Completado | 2026-01-28 |
| 4 | CSS: Fix márgenes en listas con estrellas (alineación estratégica, etc.) | Completado | 2026-01-28 |
| 5 | CSS: Texto blanco sobre fondos oscuros ("En la era digital...") | Completado | 2026-01-28 |
| 6 | CSS: Logo en footer con filtro blanco para fondo granate | Completado | 2026-01-28 |
| 7 | Footer: Licencia MIT en lugar de "All rights reserved" | Completado | 2026-01-28 |
| 8 | Footer: Enlaces a Política de Privacidad y Política de Cookies | Completado | 2026-01-28 |

---

## Próximo Deploy a Producción

**Fecha prevista:** Por determinar
**Checklist pre-deploy:**
- [ ] Todos los cambios probados en staging
- [ ] Revisión visual en móvil y desktop
- [ ] Sin errores en consola
- [ ] Backup de producción verificado
- [ ] Aprobación final

---

## Notas

- Producción actual: proportione.com (sin cambios desde el staging)
- Cualquier cambio nuevo se documenta en la tabla "Cambios Pendientes"
- Deploy a producción se hace en batch cuando se apruebe
