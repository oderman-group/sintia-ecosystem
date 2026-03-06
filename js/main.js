/**
 * Scripts comunes del sitio
 * Menú móvil, scroll-to-top, actualización de año
 */

(function() {
    'use strict';
    
    // Actualizar año actual en el footer
    function updateCurrentYear() {
        const yearElements = document.querySelectorAll('.current-year');
        const currentYear = new Date().getFullYear();
        yearElements.forEach(element => {
            element.textContent = currentYear;
        });
    }
    
    // Menú móvil
    function initMobileMenu() {
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenuLinks = mobileMenu?.querySelectorAll('a');
        
        // Abrir menú
        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.add('mobile-menu--active');
                document.body.style.overflow = 'hidden';
                menuToggle.setAttribute('aria-expanded', 'true');
            });
        }
        
        // Cerrar menú
        function closeMobileMenu() {
            if (mobileMenu) {
                mobileMenu.classList.remove('mobile-menu--active');
                document.body.style.overflow = '';
                if (menuToggle) {
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            }
        }
        
        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }
        
        // Cerrar al hacer clic en un enlace
        if (mobileMenuLinks) {
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });
        }
        
        // Cerrar al hacer clic fuera del menú
        if (mobileMenu) {
            mobileMenu.addEventListener('click', function(e) {
                if (e.target === mobileMenu) {
                    closeMobileMenu();
                }
            });
        }
        
        // Cerrar con tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu?.classList.contains('mobile-menu--active')) {
                closeMobileMenu();
            }
        });
    }
    
    // Scroll to top button
    function initScrollToTop() {
        const scrollBtn = document.getElementById('scroll-to-top');
        if (!scrollBtn) return;
        
        // Mostrar/ocultar botón según scroll
        function toggleScrollButton() {
            if (window.scrollY > 300) {
                scrollBtn.classList.add('scroll-to-top--visible');
            } else {
                scrollBtn.classList.remove('scroll-to-top--visible');
            }
        }
        
        // Scroll suave al hacer clic
        scrollBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Escuchar scroll
        window.addEventListener('scroll', toggleScrollButton);
        toggleScrollButton(); // Verificar estado inicial
    }
    
    // Smooth scroll para enlaces internos
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    // Inicializar todo al cargar
    document.addEventListener('DOMContentLoaded', function() {
        updateCurrentYear();
        initMobileMenu();
        initScrollToTop();
        initSmoothScroll();
    });
})();
