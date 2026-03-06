<?php
/**
 * Política de Privacidad
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

$pageData = [
    'title' => 'Política de Privacidad - SINTIA',
    'title_es' => 'Política de Privacidad - SINTIA',
    'title_en' => 'Privacy Policy - SINTIA',
    'description' => 'Política de privacidad de SINTIA. Conoce cómo protegemos y manejamos tus datos personales.',
    'description_es' => 'Política de privacidad de SINTIA. Conoce cómo protegemos y manejamos tus datos personales.',
    'description_en' => 'SINTIA privacy policy. Learn how we protect and handle your personal data.',
    'keywords' => 'política de privacidad, privacidad, datos personales, SINTIA',
    'url' => url('privacidad'),
    'image' => asset('img/og-image.jpg'),
    'alternate' => [
        'es' => url('privacidad'),
        'en' => url('privacidad') . '?lang=en'
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
                <h1 style="margin-bottom: var(--spacing-lg);" data-i18n="privacy.title">Política de Privacidad</h1>
                <p style="color: var(--color-text-light); margin-bottom: var(--spacing-xl);"><span data-i18n="privacy.lastUpdate">Última actualización:</span> <?php echo date('d/m/Y'); ?></p>
                
                <div style="max-width: 800px;">
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="privacy.section1">1. Información que Recopilamos</h2>
                    <p data-i18n="privacy.section1Text">Recopilamos información que nos proporcionas directamente, como cuando te registras, solicitas información o te comunicas con nosotros.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="privacy.section2">2. Uso de la Información</h2>
                    <p data-i18n="privacy.section2Text">Utilizamos la información recopilada para proporcionar, mantener y mejorar nuestros servicios, así como para comunicarnos contigo.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="privacy.section3">3. Protección de Datos</h2>
                    <p data-i18n="privacy.section3Text">Implementamos medidas de seguridad técnicas y organizativas para proteger tus datos personales contra acceso no autorizado, alteración, divulgación o destrucción.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="privacy.section4">4. Compartir Información</h2>
                    <p data-i18n="privacy.section4Text">No vendemos, alquilamos ni compartimos tu información personal con terceros, excepto en los casos descritos en esta política.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="privacy.section5">5. Tus Derechos</h2>
                    <p data-i18n="privacy.section5Text">Tienes derecho a acceder, rectificar, cancelar u oponerte al tratamiento de tus datos personales en cualquier momento.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="privacy.section6">6. Contacto</h2>
                    <p><span data-i18n="privacy.section6Text">Para ejercer tus derechos o realizar consultas sobre esta política, puedes contactarnos en:</span> <a href="mailto:info@oderman-group.com" style="color: var(--color-primary);">info@oderman-group.com</a></p>
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
