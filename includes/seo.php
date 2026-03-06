<?php
/**
 * Funciones SEO
 * Generación de meta tags, Open Graph, Twitter Cards, Schema.org
 */

/**
 * Generar favicon tags
 * @return string HTML con los tags de favicon
 */
function generateFaviconTags() {
    $html = '';
    $faviconPath = asset('img/favicon.png');
    
    // Verificar si existe favicon.png, si no, usar logo.png como fallback
    if (!file_exists(__DIR__ . '/../img/favicon.png') && file_exists(__DIR__ . '/../img/logo.png')) {
        $faviconPath = asset('img/logo.png');
    }
    
    if (file_exists(__DIR__ . '/../img/favicon.png') || file_exists(__DIR__ . '/../img/logo.png')) {
        $html .= '<link rel="icon" type="image/png" href="' . e($faviconPath) . '">' . "\n";
        $html .= '<link rel="apple-touch-icon" href="' . e($faviconPath) . '">' . "\n";
    }
    
    return $html;
}

/**
 * Generar meta tags SEO completos
 * @param array $data Datos de la página
 * @param string $lang Idioma ('es' o 'en')
 * @return string HTML con todos los meta tags
 */
function generateSeoTags($data, $lang = 'es') {
    $title = isset($data['title_' . $lang]) ? $data['title_' . $lang] : $data['title'];
    $description = isset($data['description_' . $lang]) ? $data['description_' . $lang] : $data['description'];
    $url = isset($data['url']) ? $data['url'] : url();
    $image = isset($data['image']) ? $data['image'] : asset('img/og-image.jpg');
    $type = isset($data['type']) ? $data['type'] : 'website';
    
    $html = '';
    
    // SEO Básico
    $html .= '<meta name="description" content="' . e($description) . '">' . "\n";
    if (isset($data['keywords'])) {
        $html .= '<meta name="keywords" content="' . e($data['keywords']) . '">' . "\n";
    }
    if (isset($data['author'])) {
        $html .= '<meta name="author" content="' . e($data['author']) . '">' . "\n";
    }
    $html .= '<meta name="robots" content="' . (isset($data['robots']) ? e($data['robots']) : 'index, follow') . '">' . "\n";
    $html .= '<link rel="canonical" href="' . e($url) . '">' . "\n";
    
    // Open Graph
    $html .= '<meta property="og:type" content="' . e($type) . '">' . "\n";
    $html .= '<meta property="og:url" content="' . e($url) . '">' . "\n";
    $html .= '<meta property="og:title" content="' . e($title) . '">' . "\n";
    $html .= '<meta property="og:description" content="' . e($description) . '">' . "\n";
    $html .= '<meta property="og:image" content="' . e($image) . '">' . "\n";
    $html .= '<meta property="og:locale" content="' . ($lang === 'es' ? 'es_CO' : 'en_US') . '">' . "\n";
    
    // Hreflang para multiidioma
    if (isset($data['alternate'])) {
        foreach ($data['alternate'] as $altLang => $altUrl) {
            $html .= '<link rel="alternate" hreflang="' . e($altLang) . '" href="' . e($altUrl) . '">' . "\n";
        }
    }
    
    // Twitter Card
    $html .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
    $html .= '<meta name="twitter:title" content="' . e($title) . '">' . "\n";
    $html .= '<meta name="twitter:description" content="' . e($description) . '">' . "\n";
    $html .= '<meta name="twitter:image" content="' . e($image) . '">' . "\n";
    
    return $html;
}

/**
 * Generar Schema.org JSON-LD para Organization
 * @param array $data Datos de la organización
 * @return string JSON-LD script tag
 */
function generateOrganizationSchema($data) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $data['name'] ?? 'SINTIA',
        'url' => $data['url'] ?? url(),
        'logo' => $data['logo'] ?? asset('img/logo.png'),
        'description' => $data['description'] ?? '',
    ];
    
    if (isset($data['address'])) {
        $schema['address'] = $data['address'];
    }
    
    if (isset($data['contactPoint'])) {
        $schema['contactPoint'] = $data['contactPoint'];
    }
    
    if (isset($data['sameAs'])) {
        $schema['sameAs'] = $data['sameAs'];
    }
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}
