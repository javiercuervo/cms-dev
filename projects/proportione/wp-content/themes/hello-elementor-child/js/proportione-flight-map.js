/**
 * Proportione Flight Map - "Waze del Aire"
 * Animación de avión volando entre sedes de Aveiro y Madrid
 *
 * @version 1.0.0
 * @requires WP Go Maps Pro (WPGMZA API)
 */

(function() {
    'use strict';

    // ========================================
    // CONFIGURACIÓN
    // ========================================

    const CONFIG = {
        // Coordenadas de las sedes
        aveiro: { lat: 40.6405, lng: -8.6538, name: 'Aveiro' },
        madrid: { lat: 40.4246, lng: -3.7145, name: 'Madrid' },

        // Animación
        flightDuration: 8000,      // 8 segundos de vuelo
        pauseDuration: 2000,       // 2 segundos de pausa en cada sede
        arcHeight: 0.15,           // Altura del arco (proporción de la distancia)
        arcPoints: 100,            // Puntos para suavizar el arco

        // Estilos
        planeSize: 32,
        planeColor: '#5F322F',     // Granate Proportione

        // SVG del avión (rotación base apunta a la derecha)
        planeSvg: `<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="#5F322F">
            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
        </svg>`
    };

    // ========================================
    // ESTADO
    // ========================================

    let state = {
        map: null,
        googleMap: null,
        planeMarker: null,
        arcPath: [],
        currentPoint: 0,
        direction: 1,           // 1 = Aveiro→Madrid, -1 = Madrid→Aveiro
        isPaused: false,
        isAnimating: false,
        animationFrame: null,
        lastTimestamp: 0,
        isVisible: true,
        reducedMotion: false
    };

    // ========================================
    // UTILIDADES
    // ========================================

    /**
     * Genera puntos de un arco parabólico entre dos coordenadas
     */
    function generateArcPath(start, end, height, numPoints) {
        const path = [];

        for (let i = 0; i <= numPoints; i++) {
            const t = i / numPoints;

            // Interpolación lineal
            const lat = start.lat + (end.lat - start.lat) * t;
            const lng = start.lng + (end.lng - start.lng) * t;

            // Parábola para altura (máximo en el medio)
            const arc = Math.sin(t * Math.PI) * height;

            // Ajuste de latitud para simular altitud (hacia el norte = más alto visualmente)
            const adjustedLat = lat + arc * Math.abs(end.lng - start.lng);

            path.push({ lat: adjustedLat, lng: lng });
        }

        return path;
    }

    /**
     * Calcula el ángulo de rotación entre dos puntos
     */
    function calculateBearing(from, to) {
        const dLng = (to.lng - from.lng) * Math.PI / 180;
        const lat1 = from.lat * Math.PI / 180;
        const lat2 = to.lat * Math.PI / 180;

        const y = Math.sin(dLng) * Math.cos(lat2);
        const x = Math.cos(lat1) * Math.sin(lat2) - Math.sin(lat1) * Math.cos(lat2) * Math.cos(dLng);

        let bearing = Math.atan2(y, x) * 180 / Math.PI;
        return (bearing + 360) % 360;
    }

    /**
     * Easing function (ease-in-out)
     */
    function easeInOutCubic(t) {
        return t < 0.5
            ? 4 * t * t * t
            : 1 - Math.pow(-2 * t + 2, 3) / 2;
    }

    /**
     * Crea icono SVG rotado del avión
     */
    function createPlaneIcon(rotation) {
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="${CONFIG.planeColor}" style="transform: rotate(${rotation - 90}deg);">
            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
        </svg>`;

        return {
            url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg),
            scaledSize: new google.maps.Size(CONFIG.planeSize, CONFIG.planeSize),
            anchor: new google.maps.Point(CONFIG.planeSize / 2, CONFIG.planeSize / 2)
        };
    }

    // ========================================
    // ANIMACIÓN
    // ========================================

    /**
     * Bucle principal de animación
     */
    function animate(timestamp) {
        if (!state.isAnimating || state.reducedMotion || !state.isVisible) {
            return;
        }

        if (state.isPaused) {
            state.animationFrame = requestAnimationFrame(animate);
            return;
        }

        if (!state.lastTimestamp) {
            state.lastTimestamp = timestamp;
        }

        const elapsed = timestamp - state.lastTimestamp;
        const progress = elapsed / CONFIG.flightDuration;

        if (progress >= 1) {
            // Llegamos al destino
            pauseAtDestination();
            return;
        }

        // Calcular posición con easing
        const easedProgress = easeInOutCubic(progress);
        const pathIndex = Math.floor(easedProgress * (state.arcPath.length - 1));
        const position = state.arcPath[
            state.direction === 1 ? pathIndex : state.arcPath.length - 1 - pathIndex
        ];

        // Calcular siguiente punto para rotación
        const nextIndex = Math.min(pathIndex + 1, state.arcPath.length - 1);
        const nextPosition = state.arcPath[
            state.direction === 1 ? nextIndex : state.arcPath.length - 1 - nextIndex
        ];

        // Actualizar posición y rotación del avión
        if (state.planeMarker && position) {
            state.planeMarker.setPosition(new google.maps.LatLng(position.lat, position.lng));

            const bearing = calculateBearing(position, nextPosition);
            state.planeMarker.setIcon(createPlaneIcon(bearing));
        }

        state.animationFrame = requestAnimationFrame(animate);
    }

    /**
     * Pausa en el destino antes de invertir dirección
     */
    function pauseAtDestination() {
        state.isPaused = true;

        setTimeout(() => {
            // Invertir dirección
            state.direction *= -1;
            state.lastTimestamp = 0;
            state.isPaused = false;

            // Reiniciar animación
            state.animationFrame = requestAnimationFrame(animate);
        }, CONFIG.pauseDuration);
    }

    /**
     * Inicia la animación
     */
    function startAnimation() {
        if (state.isAnimating) return;

        state.isAnimating = true;
        state.lastTimestamp = 0;
        state.animationFrame = requestAnimationFrame(animate);
    }

    /**
     * Detiene la animación
     */
    function stopAnimation() {
        state.isAnimating = false;
        if (state.animationFrame) {
            cancelAnimationFrame(state.animationFrame);
        }
    }

    // ========================================
    // INICIALIZACIÓN
    // ========================================

    /**
     * Detecta preferencia de movimiento reducido
     */
    function checkReducedMotion() {
        const mediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
        state.reducedMotion = mediaQuery.matches;

        mediaQuery.addEventListener('change', (e) => {
            state.reducedMotion = e.matches;
            if (e.matches) {
                stopAnimation();
                showStaticPlane();
            } else {
                startAnimation();
            }
        });
    }

    /**
     * Muestra avión estático (para reduced motion)
     */
    function showStaticPlane() {
        if (!state.planeMarker) return;

        // Posicionar en el punto medio
        const midIndex = Math.floor(state.arcPath.length / 2);
        const midPoint = state.arcPath[midIndex];

        state.planeMarker.setPosition(new google.maps.LatLng(midPoint.lat, midPoint.lng));

        // Calcular bearing hacia Madrid
        const bearing = calculateBearing(CONFIG.aveiro, CONFIG.madrid);
        state.planeMarker.setIcon(createPlaneIcon(bearing));
    }

    /**
     * Configura IntersectionObserver para pausar fuera del viewport
     */
    function setupVisibilityObserver() {
        const mapContainer = document.querySelector('.proportione-flight-map-container, .wpgmza_map');

        if (!mapContainer || !('IntersectionObserver' in window)) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                state.isVisible = entry.isIntersecting;

                if (entry.isIntersecting && !state.reducedMotion) {
                    if (!state.isAnimating) {
                        startAnimation();
                    }
                }
            });
        }, { threshold: 0.1 });

        observer.observe(mapContainer);
    }

    /**
     * Inicializa el mapa animado
     */
    function initFlightMap(wpgmzaMap) {
        // Verificar que tenemos acceso al mapa de Google
        if (!wpgmzaMap || !wpgmzaMap.googleMap) {
            console.warn('Proportione Flight Map: No se encontró el mapa de Google');
            return;
        }

        state.map = wpgmzaMap;
        state.googleMap = wpgmzaMap.googleMap;

        // Generar ruta del arco
        state.arcPath = generateArcPath(
            CONFIG.aveiro,
            CONFIG.madrid,
            CONFIG.arcHeight,
            CONFIG.arcPoints
        );

        // Crear marcador del avión
        const startBearing = calculateBearing(CONFIG.aveiro, CONFIG.madrid);

        state.planeMarker = new google.maps.Marker({
            position: new google.maps.LatLng(CONFIG.aveiro.lat, CONFIG.aveiro.lng),
            map: state.googleMap,
            icon: createPlaneIcon(startBearing),
            zIndex: 1000,
            title: 'Conectando Iberia - Proportione'
        });

        // Verificar preferencias de accesibilidad
        checkReducedMotion();

        // Configurar observador de visibilidad
        setupVisibilityObserver();

        // Iniciar animación (si no hay reduced motion)
        if (!state.reducedMotion) {
            // Pequeño delay para que el mapa termine de cargar
            setTimeout(startAnimation, 500);
        } else {
            showStaticPlane();
        }

        console.log('Proportione Flight Map: Inicializado correctamente');
    }

    // ========================================
    // EVENTOS WPGMZA
    // ========================================

    /**
     * Espera a que WPGMZA esté listo y busca el mapa correcto
     */
    function waitForWPGMZA() {
        // Verificar si WPGMZA está disponible
        if (typeof WPGMZA === 'undefined') {
            console.warn('Proportione Flight Map: WPGMZA no está disponible');
            return;
        }

        // Escuchar evento de mapa listo
        jQuery(document).on('wpgmza.map_loaded', function(event, map) {
            // Verificar que es el mapa de la página de contacto
            // Puedes filtrar por ID si tienes múltiples mapas
            if (map && map.googleMap) {
                initFlightMap(map);
            }
        });

        // Si el mapa ya está cargado
        if (WPGMZA.maps && WPGMZA.maps.length > 0) {
            const map = WPGMZA.maps[0];
            if (map && map.googleMap) {
                initFlightMap(map);
            }
        }
    }

    // ========================================
    // PUNTO DE ENTRADA
    // ========================================

    // Esperar a que el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', waitForWPGMZA);
    } else {
        // DOM ya está listo, esperar un poco por WPGMZA
        setTimeout(waitForWPGMZA, 100);
    }

    // Cleanup al salir de la página
    window.addEventListener('beforeunload', stopAnimation);

})();
