<?php
/**
 * Cargar variables de entorno desde .env
 */

if (!function_exists('loadEnv')) {
    function loadEnv($filePath) {
        if (!file_exists($filePath)) {
            return false;
        }
        
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Ignorar comentarios
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            
            // Separar clave y valor
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remover comillas si existen (simples o dobles)
                if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                    (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                    $value = substr($value, 1, -1);
                }
                
                // Definir constante si no existe
                if (!defined($key)) {
                    // Si el valor está vacío, no definir la constante (para reCAPTCHA opcional)
                    if ($value !== '') {
                        define($key, $value);
                    }
                }
            }
        }
        
        return true;
    }
}

// Cargar .env desde la raíz del proyecto
$envPath = __DIR__ . '/../.env';
loadEnv($envPath);

// Definir constantes de reCAPTCHA si no existen (con valores por defecto)
if (!defined('RECAPTCHA_SITE_KEY')) {
    define('RECAPTCHA_SITE_KEY', '');
}
if (!defined('RECAPTCHA_SECRET_KEY')) {
    define('RECAPTCHA_SECRET_KEY', '');
}
