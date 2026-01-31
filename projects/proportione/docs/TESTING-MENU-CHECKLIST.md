# Checklist de Testing - Menú v2.0

**Fecha de lanzamiento:** 31 enero 2026
**Responsable:** Javier Cuervo

---

## Pre-Deploy Testing (Staging)

### Verificación de URLs

| URL | Estado | Debe cargar |
|-----|:------:|-------------|
| `/servicios/` | [ ] | Página servicios |
| `/consultoria-gestion-negocio/` | [ ] | Consultoría |
| `/estrategia-innovacion/` | [ ] | Estrategia Innovación |
| `/inteligencia-artificial-generativa/` | [ ] | Inteligencia Artificial |
| `/estrategia-omnicanal-el-camino-hacia-la-coherencia-en-el-comercio-minorista/` | [ ] | eCommerce & Retail |
| `/nosotros/` | [ ] | Página Nosotros |
| `/metodologia/` | [ ] | Metodología |
| `/mayte-tortosa/` | [ ] | Perfil Mayte |
| `/javier-cuervo/` | [ ] | Perfil Javier |
| `/blog/` | [ ] | Blog |
| `/investigacion/` | [ ] | Investigación |
| `/contacto/` | [ ] | Contacto |

**Nota:** Eliminados del menú (URLs 404):
- ~~`/estrategia-transformacion-digital/`~~
- ~~`/organizacion-agile-un-enfoque-moderno-para-la-gestion-empresarial/`~~

---

### Test de Dropdowns

- [ ] Hover en **Servicios** → Aparece dropdown con 4 items
- [ ] Hover en **Nosotros** → Aparece dropdown con 3 items
- [ ] Hover en **Insights** → Aparece dropdown con 2 items (Blog, Investigación)
- [ ] Click en **Contacto** → Va directo a /contacto/ (sin dropdown)
- [ ] Dropdowns se cierran al mover el mouse fuera
- [ ] Animación suave de apertura (0.3s ease)

---

### Test Visual

- [ ] Botón **Contacto** tiene fondo verde (#6E8157)
- [ ] Hover en Contacto cambia a verde más oscuro (#566E30)
- [ ] Fuente del menú es Oswald
- [ ] Items principales en mayúsculas con spacing
- [ ] Sub-items en minúsculas normal
- [ ] Línea decorativa aparece en hover
- [ ] Flecha ▾ aparece en items con dropdown
- [ ] Flecha rota 180° en hover

---

### Test Responsive

#### Desktop (1920x1080)
- [ ] Menú horizontal completo visible
- [ ] 4 items principales en una línea
- [ ] Dropdowns funcionan en hover

#### Tablet (768x1024)
- [ ] Menú hamburger visible
- [ ] Click abre menú completo
- [ ] Sub-items expandibles
- [ ] Botón CTA visible y verde

#### Mobile (375x812)
- [ ] Hamburger menu funciona
- [ ] Menú ocupa pantalla completa
- [ ] Scroll interno si hay muchos items
- [ ] Touch funciona correctamente
- [ ] Sub-menús expandibles con tap

---

### Test de Consola

- [ ] Sin errores JavaScript en DevTools
- [ ] Sin warnings de CSS
- [ ] Sin recursos 404 (imágenes, fuentes)

---

## Post-Deploy Verification (Producción)

### Inmediatamente después del push

- [ ] Abrir https://proportione.com/ en modo incógnito
- [ ] Verificar 4 items de menú visibles
- [ ] Probar cada dropdown
- [ ] Click en Contacto funciona
- [ ] Verificar en móvil real (no solo emulador)

### Monitoreo (24 horas)

- [ ] Revisar Google Analytics por bounce rate
- [ ] Comprobar si hay errores reportados
- [ ] Verificar en diferentes navegadores:
  - [ ] Chrome
  - [ ] Firefox
  - [ ] Safari
  - [ ] Edge

---

## Capturas de Pantalla

Ejecutar para capturar screenshots en diferentes viewports:

```bash
cd /Users/javiercuervolopez/code/Wordpress/cms-dev/projects/proportione
node scripts/capture-staging.js
```

Screenshots se guardan en `figma-assets/`:
- `desktop-1920.png`
- `tablet-768.png`
- `mobile-375.png`

---

## Criterios de Go/No-Go

### GO (Aprobar para producción)
- Todos los enlaces funcionan
- Dropdowns operan correctamente
- CTA verde visible
- Sin errores de consola
- Responsive funciona

### NO-GO (Requiere rollback o fix)
- Cualquier enlace 404
- Menú no se despliega
- Errores JavaScript
- CTA no visible o mal estilo
- Menú móvil no funciona

---

## Notas del Testing

_Espacio para anotar observaciones durante el testing:_

```
Fecha:
Tester:
Notas:


```
