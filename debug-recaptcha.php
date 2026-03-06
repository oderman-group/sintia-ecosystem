<?php
/**
 * Script de depuración para verificar configuración de reCAPTCHA
 * ELIMINAR DESPUÉS DE USAR (seguridad)
 */

require_once __DIR__ . '/includes/config.php';

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug reCAPTCHA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .box {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .warning { color: #ffc107; }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
        pre {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <h1>🔍 Debug reCAPTCHA</h1>
    
    <div class="box">
        <h2>1. Verificación de archivo .env</h2>
        <?php
        $envPath = __DIR__ . '/.env';
        if (file_exists($envPath)) {
            echo '<p class="success">✅ Archivo <code>.env</code> existe</p>';
            echo '<p>Ruta: <code>' . $envPath . '</code></p>';
        } else {
            echo '<p class="error">❌ Archivo <code>.env</code> NO existe</p>';
            echo '<p>Ruta esperada: <code>' . $envPath . '</code></p>';
        }
        ?>
    </div>
    
    <div class="box">
        <h2>2. Constantes definidas</h2>
        <?php
        $siteKey = defined('RECAPTCHA_SITE_KEY') ? RECAPTCHA_SITE_KEY : null;
        $secretKey = defined('RECAPTCHA_SECRET_KEY') ? RECAPTCHA_SECRET_KEY : null;
        
        if ($siteKey !== null) {
            if (!empty($siteKey) && trim($siteKey) !== '') {
                echo '<p class="success">✅ <code>RECAPTCHA_SITE_KEY</code> está definida</p>';
                echo '<p>Valor: <code>' . htmlspecialchars(substr($siteKey, 0, 20)) . '...</code> (primeros 20 caracteres)</p>';
                echo '<p>Longitud: ' . strlen($siteKey) . ' caracteres</p>';
            } else {
                echo '<p class="warning">⚠️ <code>RECAPTCHA_SITE_KEY</code> está definida pero está vacía</p>';
            }
        } else {
            echo '<p class="error">❌ <code>RECAPTCHA_SITE_KEY</code> NO está definida</p>';
        }
        
        if ($secretKey !== null) {
            if (!empty($secretKey) && trim($secretKey) !== '') {
                echo '<p class="success">✅ <code>RECAPTCHA_SECRET_KEY</code> está definida</p>';
                echo '<p>Valor: <code>' . htmlspecialchars(substr($secretKey, 0, 20)) . '...</code> (primeros 20 caracteres)</p>';
                echo '<p>Longitud: ' . strlen($secretKey) . ' caracteres</p>';
            } else {
                echo '<p class="warning">⚠️ <code>RECAPTCHA_SECRET_KEY</code> está definida pero está vacía</p>';
            }
        } else {
            echo '<p class="error">❌ <code>RECAPTCHA_SECRET_KEY</code> NO está definida</p>';
        }
        ?>
    </div>
    
    <div class="box">
        <h2>3. Contenido del .env (solo líneas de reCAPTCHA)</h2>
        <?php
        if (file_exists($envPath)) {
            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $recaptchaLines = [];
            foreach ($lines as $line) {
                $line = trim($line);
                if (strpos($line, 'RECAPTCHA') !== false && strpos($line, '#') !== 0) {
                    $recaptchaLines[] = $line;
                }
            }
            
            if (!empty($recaptchaLines)) {
                echo '<pre>';
                foreach ($recaptchaLines as $line) {
                    // Ocultar valores completos por seguridad
                    if (strpos($line, '=') !== false) {
                        list($key, $value) = explode('=', $line, 2);
                        $key = trim($key);
                        $value = trim($value);
                        $displayValue = !empty($value) ? substr($value, 0, 20) . '...' : '(vacío)';
                        echo htmlspecialchars($key . '=' . $displayValue) . "\n";
                    } else {
                        echo htmlspecialchars($line) . "\n";
                    }
                }
                echo '</pre>';
            } else {
                echo '<p class="warning">⚠️ No se encontraron líneas de reCAPTCHA en el .env</p>';
            }
        }
        ?>
    </div>
    
    <div class="box">
        <h2>4. Verificación de API</h2>
        <?php
        if (!empty($siteKey) && !empty($secretKey)) {
            echo '<p class="success">✅ Ambas claves están configuradas</p>';
            echo '<p>El código debería usar: <code>enterprise.js</code> para reCAPTCHA Enterprise</p>';
        } else {
            echo '<p class="error">❌ Faltan claves de reCAPTCHA</p>';
            echo '<p>Verifica que el archivo <code>.env</code> tenga las claves configuradas:</p>';
            echo '<pre>RECAPTCHA_SITE_KEY=tu-site-key-aqui
RECAPTCHA_SECRET_KEY=tu-secret-key-aqui</pre>';
        }
        ?>
    </div>
    
    <div class="box">
        <h2>5. Próximos pasos</h2>
        <ol>
            <li>Si las claves no están definidas, edita el archivo <code>.env</code> en el servidor</li>
            <li>Asegúrate de que las claves no tengan comillas adicionales</li>
            <li>Recarga esta página para verificar</li>
            <li>Prueba el formulario de contacto</li>
            <li><strong>ELIMINA este archivo después de usar</strong></li>
        </ol>
    </div>
    
    <div class="box" style="background: #fff3cd; border: 1px solid #ffc107;">
        <h2>⚠️ IMPORTANTE</h2>
        <p><strong>Elimina este archivo después de depurar por seguridad.</strong></p>
        <p>Este archivo expone información sobre tu configuración.</p>
    </div>
</body>
</html>
