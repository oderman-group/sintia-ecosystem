<?php
/**
 * Página de Error 404
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

// Configurar código de respuesta 404
http_response_code(404);

$pageData = [
    'title' => 'Página no encontrada - SINTIA',
    'title_es' => 'Página no encontrada - SINTIA',
    'title_en' => 'Page not found - SINTIA',
    'description' => 'La página que buscas no existe o ha sido movida.',
    'description_es' => 'La página que buscas no existe o ha sido movida.',
    'description_en' => 'The page you are looking for does not exist or has been moved.',
    'keywords' => '404, página no encontrada, error',
    'url' => url('404'),
    'image' => asset('img/og-image.jpg'),
    'robots' => 'noindex, nofollow'
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
        <section class="hero" style="padding: var(--spacing-4xl) 0;">
            <div class="hero__container container-content">
                <h1 class="hero__title" style="font-size: clamp(4rem, 10vw, 8rem); font-weight: 800; margin-bottom: var(--spacing-md);">404</h1>
                <h2 style="font-size: clamp(1.5rem, 3vw, 2.5rem); margin-bottom: var(--spacing-lg); color: var(--color-text-white);">Página no encontrada</h2>
                <p class="hero__subtitle" style="margin-bottom: var(--spacing-2xl);">
                    Lo sentimos, la página que buscas no existe o ha sido movida.
                </p>
                <div class="hero__actions">
                    <a href="<?php echo url(); ?>" class="btn btn--white btn--large">Volver al Inicio</a>
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
