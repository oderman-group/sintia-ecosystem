<?php
/**
 * Footer centralizado
 * Incluir en todas las páginas con: <?php include __DIR__ . '/includes/footer.php'; ?>
 */

// Detectar página actual para resaltar enlaces
$currentPage = '';
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$requestUri = strtok($requestUri, '?');

if ($requestUri === BASE_PATH . '/' || $requestUri === BASE_PATH || $scriptName === '/index.php' || basename($scriptName) === 'index.php') {
    $currentPage = 'home';
} elseif (strpos($requestUri, '/blog') !== false || basename($scriptName) === 'blog.php') {
    $currentPage = 'blog';
} elseif (strpos($requestUri, '/contacto') !== false || basename($scriptName) === 'contacto.php') {
    $currentPage = 'contact';
} else {
    $currentPage = '';
}

$lang = getCurrentLang();
?>
<footer class="footer" role="contentinfo">
    <div class="footer__container container">
        <div class="footer__section">
            <h3 class="footer__section-title">SINTIA®</h3>
            <p class="footer__text" data-i18n="footer.about">
                SINTIA es una marca de software, registrada hace más de 1 década, ganadora del premio capital semilla Medellin en 2014. Llevamos más de 10 años haciendo historia.
            </p>
        </div>
        
        <div class="footer__section">
            <h3 class="footer__section-title" data-i18n="footer.help">¿Necesitas ayuda?</h3>
            <ul class="footer__list">
                <li>
                    <a href="<?php echo url('contacto'); ?>" class="footer__link" data-i18n="footer.support">Ayuda y soporte</a>
                </li>
                <li>
                    <a href="<?php echo url('contacto'); ?>" class="footer__link" data-i18n="footer.getStarted">Empecemos</a>
                </li>
            </ul>
        </div>
        
        <div class="footer__section">
            <h3 class="footer__section-title" data-i18n="footer.learnMore">Saber Más</h3>
            <ul class="footer__list">
                <li>
                    <a href="<?php echo url('blog'); ?>" class="footer__link <?php echo $currentPage === 'blog' ? 'footer__link--active' : ''; ?>" data-i18n="nav.blog">Blog</a>
                </li>
            </ul>
        </div>
        
        <div class="footer__section">
            <h3 class="footer__section-title">Enlaces de Interés</h3>
            <ul class="footer__list">
                <li>
                    <a href="https://plataformasintia.com/" class="footer__link" target="_blank" rel="noopener noreferrer">Plataforma SINTIA</a>
                </li>
                <li>
                    <a href="https://oderman.com.co/" class="footer__link" target="_blank" rel="noopener noreferrer">ODERMAN Group</a>
                </li>
                <li>
                    <a href="https://oderman-group.com/" class="footer__link" target="_blank" rel="noopener noreferrer">ODERMAN Group (EN)</a>
                </li>
            </ul>
        </div>
        
        <div class="footer__section">
            <h3 class="footer__section-title" data-i18n="footer.contact">Contáctanos</h3>
            <ul class="footer__list">
                <li class="footer__text">Medellín, Colombia</li>
                <li class="footer__text">
                    <a href="mailto:info@oderman-group.com" class="footer__link">info@oderman-group.com</a>
                </li>
                <li class="footer__text">
                    <a href="tel:+573006075800" class="footer__link">+57 300 607 5800</a>
                </li>
            </ul>
            <div class="footer__social">
                <a href="https://www.facebook.com/plataformasintia/" class="footer__social-link" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="https://x.com/platsintia" class="footer__social-link" aria-label="Twitter/X" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/platsintia/" class="footer__social-link" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/showcase/plataforma-educativa-sintia/" class="footer__social-link" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
                <a href="https://www.youtube.com/c/Plataformasintia" class="footer__social-link" aria-label="YouTube" target="_blank" rel="noopener noreferrer">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <div class="footer__bottom">
        <p>&copy; <span class="current-year">2025</span> SINTIA. Todos los derechos reservados. | 
            <a href="<?php echo url('privacidad'); ?>" class="footer__link">Política de Privacidad</a> | 
            <a href="<?php echo url('terminos'); ?>" class="footer__link">Términos y Condiciones</a> | 
            <a href="<?php echo url('cookies'); ?>" class="footer__link">Política de Cookies</a>
        </p>
    </div>
    
    <!-- Cookie Consent Banner -->
    <div id="cookie-consent" class="cookie-consent">
        <div class="cookie-consent__content">
            <div class="cookie-consent__text">
                <p data-i18n="cookies.message">Utilizamos cookies para mejorar tu experiencia en nuestro sitio web. 
                    <a href="<?php echo url('cookies'); ?>" data-i18n="cookies.title">Política de Cookies</a>
                </p>
            </div>
            <div class="cookie-consent__actions">
                <button id="cookie-accept" class="cookie-consent__btn cookie-consent__btn--accept" data-i18n="cookies.accept">Aceptar</button>
                <button id="cookie-reject" class="cookie-consent__btn cookie-consent__btn--reject" data-i18n="cookies.reject">Rechazar</button>
                <button id="cookie-settings-btn" class="cookie-consent__btn cookie-consent__btn--reject" data-i18n="cookies.settings">Configuración</button>
            </div>
        </div>
    </div>
    
    <!-- Cookie Settings Panel -->
    <div id="cookie-settings-panel" class="cookie-settings">
        <div class="cookie-settings__header">
            <h2 class="cookie-settings__title" data-i18n="cookies.title">Política de Cookies</h2>
            <button id="cookie-settings-close" class="cookie-settings__close" aria-label="Cerrar configuración de cookies">×</button>
        </div>
        <div class="cookie-settings__list">
            <div class="cookie-settings__item">
                <div class="cookie-settings__info">
                    <div class="cookie-settings__name" data-i18n="cookies.necessary">Necesarias</div>
                    <div class="cookie-settings__desc" data-i18n="cookies.necessaryDesc">Cookies esenciales para el funcionamiento del sitio</div>
                </div>
                <div class="cookie-settings__toggle">
                    <input type="checkbox" id="cookie-necessary" checked disabled>
                    <span class="cookie-settings__slider"></span>
                </div>
            </div>
            <div class="cookie-settings__item">
                <div class="cookie-settings__info">
                    <div class="cookie-settings__name" data-i18n="cookies.analytics">Analíticas</div>
                    <div class="cookie-settings__desc" data-i18n="cookies.analyticsDesc">Nos ayudan a entender cómo los visitantes interactúan con el sitio</div>
                </div>
                <div class="cookie-settings__toggle">
                    <input type="checkbox" id="cookie-analytics">
                    <span class="cookie-settings__slider"></span>
                </div>
            </div>
            <div class="cookie-settings__item">
                <div class="cookie-settings__info">
                    <div class="cookie-settings__name" data-i18n="cookies.marketing">Marketing</div>
                    <div class="cookie-settings__desc" data-i18n="cookies.marketingDesc">Cookies utilizadas para personalizar anuncios y medir campañas</div>
                </div>
                <div class="cookie-settings__toggle">
                    <input type="checkbox" id="cookie-marketing">
                    <span class="cookie-settings__slider"></span>
                </div>
            </div>
        </div>
        <div class="cookie-settings__actions">
            <button id="cookie-save" class="btn btn--primary" data-i18n="cookies.save">Guardar preferencias</button>
        </div>
    </div>
    
    <!-- Scroll to Top Button -->
    <button id="scroll-to-top" class="scroll-to-top" aria-label="Volver arriba">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
        </svg>
    </button>
</footer>
