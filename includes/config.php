<?php
/**
 * Configuración base del proyecto
 * Funciones helper para URLs y assets
 */

// Cargar variables de entorno al inicio
require_once __DIR__ . '/env.php';

// Detectar ruta base automáticamente
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$basePath = ($scriptDir === '/' || $scriptDir === '.' || empty($scriptDir)) ? '' : $scriptDir;
$baseUrl = $protocol . '://' . $host . ($basePath ? $basePath : '');

define('BASE_URL', $baseUrl);
define('BASE_PATH', $basePath);

/**
 * Función helper para generar URLs
 * @param string $path Ruta relativa
 * @return string URL completa
 */
function url($path = '') {
    $path = ltrim($path, '/');
    return BASE_URL . ($path ? '/' . $path : '');
}

/**
 * Función helper para assets (CSS, JS, imágenes)
 * @param string $path Ruta del asset
 * @return string Ruta completa del asset
 */
function asset($path) {
    $path = ltrim($path, '/');
    if (BASE_PATH) {
        return BASE_PATH . '/' . $path;
    }
    return '/' . $path;
}

/**
 * Función helper para escapar output HTML
 * @param string $text Texto a escapar
 * @return string Texto escapado
 */
function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Detectar idioma actual
 * @return string 'es' o 'en'
 */
function getCurrentLang() {
    if (isset($_GET['lang']) && $_GET['lang'] === 'en') {
        return 'en';
    }
    if (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') {
        return 'en';
    }
    return 'es';
}
