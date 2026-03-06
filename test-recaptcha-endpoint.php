<?php
/**
 * Script de prueba para verificar endpoints de reCAPTCHA
 * ELIMINAR DESPUÉS DE USAR (seguridad)
 */

require_once __DIR__ . '/includes/config.php';

header('Content-Type: text/html; charset=utf-8');

$secretKey = defined('RECAPTCHA_SECRET_KEY') ? RECAPTCHA_SECRET_KEY : '';

if (empty($secretKey)) {
    die('❌ RECAPTCHA_SECRET_KEY no está configurada en .env');
}

// Token de prueba (necesitarás uno real del formulario)
$testToken = $_GET['token'] ?? '';

if (empty($testToken)) {
    echo '<h1>Test de Endpoints reCAPTCHA</h1>';
    echo '<p>⚠️ Necesitas un token real. Envía el formulario de contacto y copia el token de la URL.</p>';
    echo '<p>O usa este script desde la consola del navegador después de enviar el formulario.</p>';
    exit;
}

$endpoints = [
    'Estándar' => 'https://www.google.com/recaptcha/api/siteverify',
    'Enterprise' => 'https://www.google.com/recaptcha/enterprise/siteverify'
];

$data = [
    'secret' => $secretKey,
    'response' => $testToken,
    'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
];

echo '<h1>🔍 Test de Endpoints reCAPTCHA</h1>';
echo '<style>
    body { font-family: Arial, sans-serif; max-width: 900px; margin: 50px auto; padding: 20px; }
    .endpoint { background: #f5f5f5; padding: 15px; margin: 10px 0; border-radius: 5px; }
    .success { background: #d4edda; border: 1px solid #c3e6cb; }
    .error { background: #f8d7da; border: 1px solid #f5c6cb; }
    pre { background: #fff; padding: 10px; border-radius: 3px; overflow-x: auto; }
</style>';

foreach ($endpoints as $name => $url) {
    echo "<div class='endpoint'>";
    echo "<h2>Endpoint: $name</h2>";
    echo "<p><strong>URL:</strong> <code>$url</code></p>";
    
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);
        
        $result = curl_exec($ch);
        $curlError = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        echo "<p><strong>HTTP Code:</strong> $httpCode</p>";
        
        if ($result === false || !empty($curlError)) {
            echo "<div class='error'>";
            echo "<p><strong>❌ Error:</strong> $curlError</p>";
            echo "</div>";
        } elseif ($httpCode === 200) {
            $response = json_decode($result, true);
            if (isset($response['success']) && $response['success']) {
                echo "<div class='success'>";
                echo "<p><strong>✅ Éxito!</strong></p>";
                echo "<p><strong>Score:</strong> " . ($response['score'] ?? 'N/A') . "</p>";
                echo "</div>";
            } else {
                echo "<div class='error'>";
                echo "<p><strong>❌ Error en respuesta:</strong></p>";
                echo "</div>";
            }
            echo "<pre>" . htmlspecialchars(json_encode($response, JSON_PRETTY_PRINT)) . "</pre>";
        } else {
            echo "<div class='error'>";
            echo "<p><strong>❌ HTTP Error:</strong> $httpCode</p>";
            echo "</div>";
        }
    } else {
        echo "<p>❌ cURL no está disponible</p>";
    }
    
    echo "</div>";
}

echo '<div style="background: #fff3cd; padding: 15px; margin-top: 20px; border-radius: 5px;">';
echo '<p><strong>⚠️ IMPORTANTE:</strong> Elimina este archivo después de usar por seguridad.</p>';
echo '</div>';
?>
