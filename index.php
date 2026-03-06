<?php
/**
 * Página principal - SINTIA Ecosystem
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

// Configuración de página
$pageData = [
    'title' => 'SINTIA - Ecosistema de Tecnología',
    'title_es' => 'SINTIA - Ecosistema de Tecnología',
    'title_en' => 'SINTIA - Technology Ecosystem',
    'description' => 'SINTIA es un ecosistema completo de soluciones tecnológicas. Descubre Sintia Educativa, Sintia CRM y Sintia ERP. Más de 10 años haciendo historia.',
    'description_es' => 'SINTIA es un ecosistema completo de soluciones tecnológicas. Descubre Sintia Educativa, Sintia CRM y Sintia ERP. Más de 10 años haciendo historia.',
    'description_en' => 'SINTIA is a complete ecosystem of technological solutions. Discover Sintia Educativa, Sintia CRM and Sintia ERP. Over 10 years making history.',
    'keywords' => 'SINTIA, software educativo, CRM, ERP, tecnología, soluciones empresariales, software Colombia',
    'url' => url(),
    'image' => asset('img/og-image.jpg'),
    'alternate' => [
        'es' => url(),
        'en' => url() . '?lang=en'
    ]
];

$lang = getCurrentLang();

// Schema.org Organization
$orgSchema = [
    'name' => 'SINTIA',
    'url' => url(),
    'logo' => asset('img/logo.png'),
    'description' => 'Ecosistema completo de soluciones tecnológicas',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Medellín',
        'addressCountry' => 'CO'
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+57-300-607-5800',
        'contactType' => 'customer service',
        'email' => 'info@oderman-group.com'
    ],
    'sameAs' => [
        'https://www.facebook.com/sintia',
        'https://www.linkedin.com/company/sintia',
        'https://twitter.com/sintia'
    ]
];
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
    
    <!-- Preconnect para fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="<?php echo asset('css/estilos.css'); ?>">
    
    <!-- Schema.org -->
    <?php echo generateOrganizationSchema($orgSchema); ?>
</head>
<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero__container container-content">
                <div class="hero__badge" data-i18n="hero.subtitle">Ecosistema completo de soluciones para tu negocio</div>
                <h1 class="hero__title" data-i18n="hero.title">UNA MARCA DE TECNOLOGÍA</h1>
                <p class="hero__subtitle" data-i18n="hero.subtitle">Ecosistema completo de soluciones para tu negocio</p>
                <div class="hero__actions">
                    <a href="#platforms" class="btn btn--white btn--large" data-i18n="hero.cta">Conocer ahora</a>
                    <a href="<?php echo url('contacto'); ?>" class="btn btn--secondary btn--large" data-i18n="hero.demo">Solicita un Demo</a>
                </div>
            </div>
        </section>
        
        <!-- Platforms Section -->
        <section id="platforms" class="platforms">
            <div class="container-content">
                <div class="platforms__header">
                    <h2 class="platforms__title" data-i18n="platforms.title">Nuestras Plataformas</h2>
                    <p class="platforms__subtitle" data-i18n="platforms.subtitle">Selecciona una de las plataformas de nuestra marca SINTIA de acuerdo a tu necesidad</p>
                </div>
                
                <div class="platforms__grid">
                    <!-- Sintia Educativa -->
                    <div class="platform-card">
                        <div class="platform-card__icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 3L1 9l11 6 9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                            </svg>
                        </div>
                        <h3 class="platform-card__title" data-i18n="platforms.educativa.title">Sintia Educativa</h3>
                        <p class="platform-card__description" data-i18n="platforms.educativa.description">Software para instituciones educativas</p>
                        <a href="https://plataformasintia.com/" class="platform-card__cta" target="_blank" rel="noopener noreferrer" data-i18n="platforms.educativa.cta">Conocer más →</a>
                    </div>
                    
                    <!-- Sintia CRM -->
                    <div class="platform-card">
                        <div class="platform-card__icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h3 class="platform-card__title" data-i18n="platforms.crm.title">Sintia CRM</h3>
                        <p class="platform-card__description" data-i18n="platforms.crm.description">Software para pequeñas empresas</p>
                        <a href="<?php echo url('contacto'); ?>" class="platform-card__cta" data-i18n="platforms.crm.cta">Conocer más →</a>
                    </div>
                    
                    <!-- Sintia ERP -->
                    <div class="platform-card">
                        <div class="platform-card__icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                        </div>
                        <h3 class="platform-card__title" data-i18n="platforms.erp.title">Sintia ERP</h3>
                        <p class="platform-card__description" data-i18n="platforms.erp.description">Software para medianas y grandes empresas</p>
                        <a href="<?php echo url('contacto'); ?>" class="platform-card__cta" data-i18n="platforms.erp.cta">Conocer más →</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Stats Section -->
        <section class="stats">
            <div class="container-content">
                <div class="stats__grid">
                    <div class="stat-item">
                        <div class="stat-item__number">2013</div>
                        <div class="stat-item__label" data-i18n="stats.since">Desde</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-item__number">50+</div>
                        <div class="stat-item__label" data-i18n="stats.members">Miembros en el equipo</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-item__number">100%</div>
                        <div class="stat-item__label" data-i18n="stats.clients">Clientes satisfechos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-item__number">10000+</div>
                        <div class="stat-item__label" data-i18n="stats.users">Usuarios felices</div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container-content">
                <div class="testimonials__header">
                    <h2 class="testimonials__title" data-i18n="testimonials.title">¿Aún no estás convencido?</h2>
                    <p class="testimonials__subtitle" data-i18n="testimonials.subtitle">Revisa lo que dicen nuestros clientes</p>
                </div>
                
                <div class="testimonials__grid">
                    <!-- Testimonio 1 -->
                    <div class="testimonial-card">
                        <p class="testimonial-card__quote">
                            "Venimos trabajando con La plataforma SINTIA hace más de 6 años y la experiencia ha sido maravillosa porque hemos podido optimizar muchísimo el trabajo."
                        </p>
                        <div class="testimonial-card__author">
                            <div class="testimonial-card__avatar">CG</div>
                            <div class="testimonial-card__info">
                                <div class="testimonial-card__name">Claudia Gómez</div>
                                <div class="testimonial-card__role">Coordinadora académica de Instituto Colombo Venezolano en Medellín, Antioquia.</div>
                            </div>
                        </div>
                        <div class="testimonial-card__date">24 jun 2020</div>
                    </div>
                    
                    <!-- Testimonio 2 -->
                    <div class="testimonial-card">
                        <p class="testimonial-card__quote">
                            "Sin la plataforma Educativa SINTIA no hubiéramos podido continuar nuestro proceso académico. Ha sido de gran utilidad para padres, estudiantes y docentes."
                        </p>
                        <div class="testimonial-card__author">
                            <div class="testimonial-card__avatar">RA</div>
                            <div class="testimonial-card__info">
                                <div class="testimonial-card__name">Rosa Archila</div>
                                <div class="testimonial-card__role">Directora del COALS en Sabana de torres, Santander</div>
                            </div>
                        </div>
                        <div class="testimonial-card__date">01 jun 2020</div>
                    </div>
                    
                    <!-- Testimonio 3 -->
                    <div class="testimonial-card">
                        <p class="testimonial-card__quote">
                            "Venimos trabajando con la Plataforma Educativa SINTIA hace más de 4 años y algo que quiero resaltar es la respuesta amable y rápida del personal de soporte."
                        </p>
                        <div class="testimonial-card__author">
                            <div class="testimonial-card__avatar">JA</div>
                            <div class="testimonial-card__info">
                                <div class="testimonial-card__name">Juana Arredondo</div>
                                <div class="testimonial-card__role">Secretaria Académica de I.E. Eduardo Ortega Arango en Niquía, Antioquia.</div>
                            </div>
                        </div>
                        <div class="testimonial-card__date">10 jun 2020</div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="cta">
            <div class="container-content">
                <h2 class="cta__title" data-i18n="cta.title">¿Quieres conocer más detalles de nuestras soluciones?</h2>
                <p class="cta__subtitle" data-i18n="cta.subtitle">Te ofrecemos una demostración y una asesoría inicial gratuita para identificar tus necesidades.</p>
                <a href="<?php echo url('contacto'); ?>" class="btn btn--white btn--large" data-i18n="cta.button">Solicita un Demo</a>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/includes/footer.php'; ?>
    
    <!-- Scripts -->
    <script src="<?php echo asset('js/translations.js'); ?>"></script>
    <script src="<?php echo asset('js/language.js'); ?>"></script>
    <script src="<?php echo asset('js/cookies.js'); ?>"></script>
    <script src="<?php echo asset('js/main.js'); ?>"></script>
</body>
</html>
