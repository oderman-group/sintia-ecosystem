<?php
/**
 * Header centralizado
 * Incluir en todas las páginas con: <?php include __DIR__ . '/includes/header.php'; ?>
 */

// Detectar página actual para resaltar menú
$currentPage = '';
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

// Limpiar query strings
$requestUri = strtok($requestUri, '?');

// Detectar página
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
<header class="header" role="banner">
    <div class="header__container container">
        <a href="<?php echo url(); ?>" class="header__logo" aria-label="SINTIA - Inicio">
            <?php if (file_exists(__DIR__ . '/../img/logo.png')): ?>
                <img src="<?php echo asset('img/logo.png'); ?>" alt="SINTIA" class="header__logo-img">
            <?php else: ?>
                <span>SINTIA</span>
            <?php endif; ?>
        </a>
        
        <nav class="header__nav" role="navigation" aria-label="Navegación principal">
            <a href="<?php echo url(); ?>" 
               class="header__nav-link <?php echo $currentPage === 'home' ? 'header__nav-link--active' : ''; ?>"
               data-i18n="nav.home">Inicio</a>
            <a href="<?php echo url('#platforms'); ?>" 
               class="header__nav-link"
               data-i18n="nav.platforms">Plataformas</a>
            <a href="<?php echo url('blog'); ?>" 
               class="header__nav-link <?php echo $currentPage === 'blog' ? 'header__nav-link--active' : ''; ?>"
               data-i18n="nav.blog">Blog</a>
            <a href="<?php echo url('contacto'); ?>" 
               class="header__nav-link <?php echo $currentPage === 'contact' ? 'header__nav-link--active' : ''; ?>"
               data-i18n="nav.contact">Contacto</a>
        </nav>
        
        <div class="header__actions">
            <select id="language-selector" class="header__lang-select" aria-label="Seleccionar idioma">
                <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
            </select>
            
            <button id="mobile-menu-toggle" 
                    class="header__mobile-toggle" 
                    aria-label="Abrir menú móvil"
                    aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    
    <!-- Menú Móvil -->
    <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-menu__header">
            <?php if (file_exists(__DIR__ . '/../img/logo.png')): ?>
                <img src="<?php echo asset('img/logo.png'); ?>" alt="SINTIA" class="header__logo-img" style="height: 60px;">
            <?php else: ?>
                <span class="header__logo">SINTIA</span>
            <?php endif; ?>
            <button id="mobile-menu-close" class="mobile-menu__close" aria-label="Cerrar menú móvil">×</button>
        </div>
        <nav class="mobile-menu__nav" role="navigation" aria-label="Navegación móvil">
            <a href="<?php echo url(); ?>" 
               class="mobile-menu__link <?php echo $currentPage === 'home' ? 'mobile-menu__link--active' : ''; ?>"
               data-i18n="nav.home">Inicio</a>
            <a href="<?php echo url('#platforms'); ?>" 
               class="mobile-menu__link"
               data-i18n="nav.platforms">Plataformas</a>
            <a href="<?php echo url('blog'); ?>" 
               class="mobile-menu__link <?php echo $currentPage === 'blog' ? 'mobile-menu__link--active' : ''; ?>"
               data-i18n="nav.blog">Blog</a>
            <a href="<?php echo url('contacto'); ?>" 
               class="mobile-menu__link <?php echo $currentPage === 'contact' ? 'mobile-menu__link--active' : ''; ?>"
               data-i18n="nav.contact">Contacto</a>
        </nav>
        <div class="header__actions" style="margin-top: var(--spacing-lg);">
            <select id="language-selector-mobile" class="header__lang-select" aria-label="Seleccionar idioma">
                <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
            </select>
        </div>
    </div>
</header>

<script>
// Sincronizar selector de idioma móvil
document.addEventListener('DOMContentLoaded', function() {
    const langSelector = document.getElementById('language-selector');
    const langSelectorMobile = document.getElementById('language-selector-mobile');
    
    if (langSelector && langSelectorMobile) {
        langSelectorMobile.addEventListener('change', function() {
            langSelector.value = this.value;
            if (window.changeLanguage) {
                window.changeLanguage(this.value);
            }
        });
        
        langSelector.addEventListener('change', function() {
            langSelectorMobile.value = this.value;
        });
    }
});
</script>
