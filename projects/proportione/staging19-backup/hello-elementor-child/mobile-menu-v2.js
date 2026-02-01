/**
 * Menú Móvil Proportione v2.1
 * Click handler directo - NO depende de SmartMenus
 */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        // Solo ejecutar en móvil/tablet
        if (window.innerWidth > 1024) return;

        var toggle = document.querySelector('.elementor-menu-toggle');
        var dropdown = document.querySelector('nav.elementor-nav-menu--dropdown');

        if (!toggle || !dropdown) return;

        // CLICK HANDLER DIRECTO
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            var isOpen = toggle.classList.contains('elementor-active');

            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        function openMenu() {
            toggle.classList.add('elementor-active');
            toggle.setAttribute('aria-expanded', 'true');
            dropdown.setAttribute('aria-hidden', 'false');
            document.body.classList.add('menu-open');
        }

        function closeMenu() {
            toggle.classList.remove('elementor-active');
            toggle.setAttribute('aria-expanded', 'false');
            dropdown.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('menu-open');
            // Cerrar submenús
            dropdown.querySelectorAll('.menu-item-has-children').forEach(function(item) {
                item.classList.remove('submenu-open');
            });
        }

        // Submenús táctiles
        dropdown.querySelectorAll('.menu-item-has-children > a').forEach(function(link) {
            link.addEventListener('click', function(e) {
                if (window.innerWidth > 1024) return;
                e.preventDefault();
                var parent = this.parentElement;

                // Cerrar otros submenús abiertos
                dropdown.querySelectorAll('.menu-item-has-children.submenu-open').forEach(function(item) {
                    if (item !== parent) {
                        item.classList.remove('submenu-open');
                    }
                });

                parent.classList.toggle('submenu-open');
            });
        });

        // Cerrar con click fuera
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.elementor-widget-nav-menu')) {
                closeMenu();
            }
        });

        // Cerrar con Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMenu();
                toggle.focus();
            }
        });

        // Re-inicializar en resize (por si cambia de desktop a mobile)
        var resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 1024) {
                    // Limpiar estados si se pasa a desktop
                    closeMenu();
                }
            }, 250);
        });
    });
})();
