# Inventario de Plugins - Proportione

## Entorno: Staging (staging19)

### Plugins Activos

| Plugin | Versión | Descripción |
|--------|---------|-------------|
| **Elementor** | Latest | Constructor visual de páginas |
| **Elementor Pro** | Latest | Funcionalidades premium de Elementor |
| **WP Go Maps (Base)** | 10.0.04 | Mapas interactivos de Google |
| **WP Go Maps Gold** | 5.2.9 | Marcadores avanzados, estilos JSON |
| **WP Go Maps Pro** | 9.0.36 | Polylines, API JavaScript, controles avanzados |
| **WP Go Maps UGM** | 3.39 | User Generated Markers |

### Capacidades WP Go Maps (Gold + Pro)

**Disponibles:**
- ✅ Marcadores personalizados con iconos custom
- ✅ Estados de marcadores (hover, selected)
- ✅ Polylines estáticas con estilos configurables
- ✅ 80+ estilos de mapa predefinidos
- ✅ Estilos JSON personalizados
- ✅ JavaScript API (`WPGMZA.restAPI`, eventos, acceso al mapa Google)
- ✅ InfoWindows con HTML personalizado
- ✅ Geocoding y direcciones

**No disponibles nativamente:**
- ❌ Polylines animadas
- ❌ Marcadores con animación de movimiento

**Solución implementada:** JavaScript custom para animar marcador siguiendo ruta estática.

---

## Notas de Configuración

### Mapa "Sedes Proportione" (ID: configurar en WP Admin)

**Configuración básica:**
- Dimensiones: 100% × 500px
- Zoom inicial: 6
- Centro: 40.53, -5.98

**Estilo JSON (desaturado elegante):**
```json
[
  {"featureType": "all", "elementType": "geometry", "stylers": [{"saturation": -80}, {"lightness": 10}]},
  {"featureType": "all", "elementType": "labels.text.fill", "stylers": [{"color": "#5F322F"}]},
  {"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#d4e4e8"}]},
  {"featureType": "poi", "stylers": [{"visibility": "off"}]},
  {"featureType": "transit", "stylers": [{"visibility": "off"}]}
]
```

**Marcadores:**
| Sede | Lat | Lng | InfoWindow |
|------|-----|-----|------------|
| Aveiro (Portugal) | 40.6405 | -8.6538 | Proportione Portugal |
| Madrid (España) | 40.4246 | -3.7145 | Proportione España |

**Polyline:**
- Tipo: Geodésica (arco)
- Color: #5F322F (granate)
- Opacidad: 0.4
- Grosor: 2px

---

## Última actualización

Fecha: 2026-02-01
Autor: Claude Code
