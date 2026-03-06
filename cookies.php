<?php
/**
 * Política de Cookies
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

$pageData = [
    'title' => 'Política de Cookies - SINTIA',
    'title_es' => 'Política de Cookies - SINTIA',
    'title_en' => 'Cookie Policy - SINTIA',
    'description' => 'Política de cookies de SINTIA. Información sobre el uso de cookies en nuestro sitio web.',
    'description_es' => 'Política de cookies de SINTIA. Información sobre el uso de cookies en nuestro sitio web.',
    'description_en' => 'SINTIA cookie policy. Information about the use of cookies on our website.',
    'keywords' => 'política de cookies, cookies, SINTIA',
    'url' => url('cookies'),
    'image' => asset('img/og-image.jpg'),
    'alternate' => [
        'es' => url('cookies'),
        'en' => url('cookies') . '?lang=en'
    ]
];

$lang = getCurrentLang();
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php echo generateFaviconTags(); ?>
    <?php echo generateSeoTags($pageData, $lang); ?>
    
    <title><?php echo $lang === 'en' ? $pageData['title_en'] : $pageData['title_es']; ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo asset('css/estilos.css'); ?>">
</head>
<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    
    <main>
        <section class="platforms" style="padding: var(--spacing-3xl) 0;">
            <div class="container-content">
                <h1 style="margin-bottom: var(--spacing-lg);" data-i18n="cookiesPage.title">Política de Cookies</h1>
                <p style="color: var(--color-text-light); margin-bottom: var(--spacing-xl);"><span data-i18n="cookiesPage.lastUpdate">Última actualización:</span> <?php echo date('d/m/Y'); ?></p>
                
                <div style="max-width: 800px;">
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="cookiesPage.whatAre">¿Qué son las Cookies?</h2>
                    <p data-i18n="cookiesPage.whatAreText">Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas un sitio web. Nos ayudan a mejorar tu experiencia de navegación.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="cookiesPage.types">Tipos de Cookies que Utilizamos</h2>
                    
                    <h3 style="margin-top: var(--spacing-lg); margin-bottom: var(--spacing-sm);" data-i18n="cookiesPage.necessaryTitle">Cookies Necesarias</h3>
                    <p data-i18n="cookiesPage.necessaryText">Estas cookies son esenciales para el funcionamiento del sitio web y no se pueden desactivar. Incluyen cookies de sesión y preferencias de idioma.</p>
                    
                    <h3 style="margin-top: var(--spacing-lg); margin-bottom: var(--spacing-sm);" data-i18n="cookiesPage.analyticsTitle">Cookies Analíticas</h3>
                    <p data-i18n="cookiesPage.analyticsText">Nos ayudan a entender cómo los visitantes interactúan con nuestro sitio web, recopilando información de forma anónima.</p>
                    
                    <h3 style="margin-top: var(--spacing-lg); margin-bottom: var(--spacing-sm);" data-i18n="cookiesPage.marketingTitle">Cookies de Marketing</h3>
                    <p data-i18n="cookiesPage.marketingText">Estas cookies se utilizan para personalizar anuncios y medir la efectividad de nuestras campañas publicitarias.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="cookiesPage.management">Gestión de Cookies</h2>
                    <p data-i18n="cookiesPage.managementText">Puedes gestionar tus preferencias de cookies en cualquier momento haciendo clic en el botón "Configuración" en el banner de cookies o visitando esta página.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="cookiesPage.contact">Contacto</h2>
                    <p><span data-i18n="cookiesPage.contactText">Para más información sobre nuestra política de cookies, puedes contactarnos en:</span> <a href="mailto:info@oderman-group.com" style="color: var(--color-primary);">info@oderman-group.com</a></p>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/includes/footer.php'; ?>
    
    <script src="<?php echo asset('js/translations.js'); ?>"></script>
    <script src="<?php echo asset('js/language.js'); ?>"></script>
    <script src="<?php echo asset('js/cookies.js'); ?>"></script>
    <script src="<?php echo asset('js/main.js'); ?>"></script>
</body>
</html>
