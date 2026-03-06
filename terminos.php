<?php
/**
 * Términos y Condiciones
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

$pageData = [
    'title' => 'Términos y Condiciones - SINTIA',
    'title_es' => 'Términos y Condiciones - SINTIA',
    'title_en' => 'Terms and Conditions - SINTIA',
    'description' => 'Términos y condiciones de uso de los servicios de SINTIA.',
    'description_es' => 'Términos y condiciones de uso de los servicios de SINTIA.',
    'description_en' => 'Terms and conditions of use of SINTIA services.',
    'keywords' => 'términos y condiciones, términos de uso, SINTIA',
    'url' => url('terminos'),
    'image' => asset('img/og-image.jpg'),
    'alternate' => [
        'es' => url('terminos'),
        'en' => url('terminos') . '?lang=en'
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
                <h1 style="margin-bottom: var(--spacing-lg);" data-i18n="terms.title">Términos y Condiciones</h1>
                <p style="color: var(--color-text-light); margin-bottom: var(--spacing-xl);"><span data-i18n="terms.lastUpdate">Última actualización:</span> <?php echo date('d/m/Y'); ?></p>
                
                <div style="max-width: 800px;">
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="terms.section1">1. Aceptación de los Términos</h2>
                    <p data-i18n="terms.section1Text">Al acceder y utilizar este sitio web, aceptas estar sujeto a estos términos y condiciones de uso.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="terms.section2">2. Uso del Sitio</h2>
                    <p data-i18n="terms.section2Text">El sitio web está destinado únicamente para fines informativos y comerciales legítimos. No debes utilizar el sitio de manera que pueda dañar, deshabilitar o sobrecargar nuestros servidores.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="terms.section3">3. Propiedad Intelectual</h2>
                    <p data-i18n="terms.section3Text">Todo el contenido del sitio web, incluyendo textos, gráficos, logos, iconos, imágenes y software, es propiedad de SINTIA y está protegido por las leyes de propiedad intelectual.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="terms.section4">4. Limitación de Responsabilidad</h2>
                    <p data-i18n="terms.section4Text">SINTIA no será responsable de ningún daño directo, indirecto, incidental o consecuente que resulte del uso o la imposibilidad de usar este sitio web.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="terms.section5">5. Modificaciones</h2>
                    <p data-i18n="terms.section5Text">Nos reservamos el derecho de modificar estos términos en cualquier momento. Los cambios entrarán en vigor inmediatamente después de su publicación en el sitio web.</p>
                    
                    <h2 style="margin-top: var(--spacing-xl); margin-bottom: var(--spacing-md);" data-i18n="terms.section6">6. Contacto</h2>
                    <p><span data-i18n="terms.section6Text">Para consultas sobre estos términos, puedes contactarnos en:</span> <a href="mailto:info@oderman-group.com" style="color: var(--color-primary);">info@oderman-group.com</a></p>
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
