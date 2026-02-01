/**
 * Blog Single Template V2 - JavaScript
 * Funcionalidades interactivas para el template de blog
 *
 * Componentes:
 * 1. Reading Progress Bar
 * 2. Context Bar (sticky after hero)
 * 3. Floating Sidebar
 * 4. Table of Contents Scroll Spy
 * 5. Share functionality
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        heroHeight: 320,
        scrollOffset: 100,
        tocSelector: '.elementor-widget-theme-post-content h2, .elementor-widget-theme-post-content h3',
        animationDuration: 300
    };

    // DOM Elements
    let progressBar = null;
    let contextBar = null;
    let floatingSidebar = null;

    /**
     * Initialize when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        if (!document.body.classList.contains('single-post')) return;

        createProgressBar();
        createContextBar();
        createFloatingSidebar();
        initScrollSpy();
        initShareButtons();

        // Initial state check
        handleScroll();

        // Scroll listener
        window.addEventListener('scroll', handleScroll, { passive: true });
    });

    /**
     * 1. Reading Progress Bar
     */
    function createProgressBar() {
        progressBar = document.createElement('div');
        progressBar.className = 'reading-progress-bar';
        document.body.appendChild(progressBar);
    }

    function updateProgressBar() {
        if (!progressBar) return;

        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        const scrollTop = window.scrollY;
        const totalScrollable = documentHeight - windowHeight;
        const progress = Math.min(100, Math.max(0, (scrollTop / totalScrollable) * 100));

        progressBar.style.width = progress + '%';
    }

    /**
     * 2. Context Bar
     */
    function createContextBar() {
        const title = document.querySelector('.elementor-heading-title, .entry-title');
        if (!title) return;

        contextBar = document.createElement('div');
        contextBar.className = 'blog-context-bar';
        contextBar.innerHTML = `
            <span class="context-title">${title.textContent}</span>
            <button class="context-share-btn" aria-label="Compartir articulo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="18" cy="5" r="3"></circle>
                    <circle cx="6" cy="12" r="3"></circle>
                    <circle cx="18" cy="19" r="3"></circle>
                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                </svg>
                <span>Compartir</span>
            </button>
        `;
        document.body.appendChild(contextBar);

        // Share button click
        const shareBtn = contextBar.querySelector('.context-share-btn');
        shareBtn.addEventListener('click', handleShare);
    }

    function updateContextBar() {
        if (!contextBar) return;

        const heroHeight = document.querySelector('.blog-hero-section, .elementor-section:first-child')?.offsetHeight || CONFIG.heroHeight;

        if (window.scrollY > heroHeight) {
            contextBar.classList.add('visible');
        } else {
            contextBar.classList.remove('visible');
        }
    }

    /**
     * 3. Floating Sidebar
     */
    function createFloatingSidebar() {
        // Only on large screens
        if (window.innerWidth < 1200) return;

        const headings = document.querySelectorAll(CONFIG.tocSelector);
        if (headings.length === 0) return;

        // Generate TOC items
        let tocItems = '';
        headings.forEach((heading, index) => {
            // Add ID if not present
            if (!heading.id) {
                heading.id = 'section-' + (index + 1);
            }
            const isH3 = heading.tagName === 'H3';
            tocItems += `
                <li>
                    <a href="#${heading.id}" class="${isH3 ? 'toc-h3' : ''}" data-section="${heading.id}">
                        ${heading.textContent}
                    </a>
                </li>
            `;
        });

        floatingSidebar = document.createElement('div');
        floatingSidebar.className = 'blog-floating-sidebar';
        floatingSidebar.innerHTML = `
            <div class="floating-toc">
                <div class="floating-toc-label">EN ESTE ARTICULO</div>
                <ul>${tocItems}</ul>
            </div>
            <div class="floating-share">
                <div class="floating-share-label">COMPARTIR</div>
                <div class="floating-share-buttons">
                    <button class="floating-share-btn" data-platform="linkedin" aria-label="Compartir en LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </button>
                    <button class="floating-share-btn" data-platform="twitter" aria-label="Compartir en X">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </button>
                    <button class="floating-share-btn" data-platform="email" aria-label="Compartir por email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </button>
                    <button class="floating-share-btn" data-platform="copy" aria-label="Copiar enlace">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(floatingSidebar);

        // TOC smooth scroll
        floatingSidebar.querySelectorAll('.floating-toc a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    const offsetPosition = targetElement.getBoundingClientRect().top + window.scrollY - CONFIG.scrollOffset;
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Share buttons
        floatingSidebar.querySelectorAll('.floating-share-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const platform = this.getAttribute('data-platform');
                shareOnPlatform(platform);
            });
        });
    }

    function updateFloatingSidebar() {
        if (!floatingSidebar) return;

        const heroHeight = document.querySelector('.blog-hero-section, .elementor-section:first-child')?.offsetHeight || CONFIG.heroHeight;

        if (window.scrollY > heroHeight && window.innerWidth >= 1200) {
            floatingSidebar.classList.add('visible');
        } else {
            floatingSidebar.classList.remove('visible');
        }
    }

    /**
     * 4. Scroll Spy for TOC
     */
    function initScrollSpy() {
        // Will be called on scroll
    }

    function updateScrollSpy() {
        const headings = document.querySelectorAll(CONFIG.tocSelector);
        const scrollPosition = window.scrollY + CONFIG.scrollOffset + 50;

        let activeId = '';

        headings.forEach(heading => {
            if (heading.offsetTop <= scrollPosition) {
                activeId = heading.id;
            }
        });

        // Update floating sidebar TOC
        if (floatingSidebar) {
            floatingSidebar.querySelectorAll('.floating-toc a').forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === activeId) {
                    link.classList.add('active');
                }
            });
        }

        // Update inline TOC if exists
        document.querySelectorAll('.toc-inline-section .elementor-toc__list-item a').forEach(link => {
            const href = link.getAttribute('href');
            if (href && href.substring(1) === activeId) {
                link.closest('.elementor-toc__list-item').classList.add('elementor-item-active');
            } else {
                link.closest('.elementor-toc__list-item')?.classList.remove('elementor-item-active');
            }
        });
    }

    /**
     * 5. Share Functionality
     */
    function initShareButtons() {
        // Inline share buttons
        document.querySelectorAll('.elementor-share-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                // Elementor handles this, but we can add custom behavior
            });
        });
    }

    function handleShare() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                url: window.location.href
            }).catch(console.error);
        } else {
            // Fallback: copy link
            shareOnPlatform('copy');
        }
    }

    function shareOnPlatform(platform) {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);

        const shareUrls = {
            linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${url}`,
            twitter: `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
            email: `mailto:?subject=${title}&body=${url}`
        };

        if (platform === 'copy') {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showCopyNotification();
            }).catch(console.error);
            return;
        }

        if (shareUrls[platform]) {
            window.open(shareUrls[platform], '_blank', 'width=600,height=400');
        }
    }

    function showCopyNotification() {
        const notification = document.createElement('div');
        notification.className = 'copy-notification';
        notification.textContent = 'Enlace copiado';
        notification.style.cssText = `
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            background: #1F1F1F;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            z-index: 10000;
            animation: fadeInOut 2s ease;
        `;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 2000);
    }

    /**
     * Main Scroll Handler
     */
    function handleScroll() {
        requestAnimationFrame(() => {
            updateProgressBar();
            updateContextBar();
            updateFloatingSidebar();
            updateScrollSpy();
        });
    }

    // Add CSS animation for copy notification
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translate(-50%, 20px); }
            20% { opacity: 1; transform: translate(-50%, 0); }
            80% { opacity: 1; transform: translate(-50%, 0); }
            100% { opacity: 0; transform: translate(-50%, -20px); }
        }
    `;
    document.head.appendChild(style);

})();
