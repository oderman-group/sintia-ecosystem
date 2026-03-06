<?php
/**
 * Página de Blog
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

$pageData = [
    'title' => 'Blog - SINTIA',
    'title_es' => 'Blog - SINTIA',
    'title_en' => 'Blog - SINTIA',
    'description' => 'Artículos y noticias sobre tecnología, educación y soluciones empresariales.',
    'description_es' => 'Artículos y noticias sobre tecnología, educación y soluciones empresariales.',
    'description_en' => 'Articles and news about technology, education and business solutions.',
    'keywords' => 'blog SINTIA, artículos, noticias, tecnología',
    'url' => url('blog'),
    'image' => asset('img/og-image.jpg'),
    'alternate' => [
        'es' => url('blog'),
        'en' => url('blog') . '?lang=en'
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
        <section class="hero" style="padding: var(--spacing-3xl) 0;">
            <div class="hero__container container-content">
                <h1 class="hero__title" style="font-size: clamp(2rem, 4vw, 3rem);" data-i18n="blog.title">Blog</h1>
                <p class="hero__subtitle" data-i18n="blog.subtitle">Artículos y noticias sobre tecnología, educación y soluciones empresariales.</p>
            </div>
        </section>
        
        <section class="platforms" style="padding: var(--spacing-3xl) 0;">
            <div class="container-content">
                <div class="platforms__grid">
                    <!-- Artículo de ejemplo -->
                    <article class="platform-card">
                        <div class="platform-card__icon" style="background: linear-gradient(135deg, var(--color-accent), var(--color-primary));">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                        </div>
                        <h3 class="platform-card__title" data-i18n="blog.welcome">Bienvenido a nuestro Blog</h3>
                        <p class="platform-card__description" data-i18n="blog.comingSoon">
                            Próximamente publicaremos artículos sobre tecnología, educación y soluciones empresariales.
                        </p>
                        <div style="margin-top: var(--spacing-md); font-size: 0.875rem; color: var(--color-text-light);" data-i18n="blog.soon">
                            Próximamente
                        </div>
                    </article>
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
