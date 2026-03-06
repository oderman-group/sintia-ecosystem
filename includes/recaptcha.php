<?php
/**
 * Funciones para validar reCAPTCHA v3
 */

/**
 * Validar token de reCAPTCHA v3
 * @param string $token Token de reCAPTCHA
 * @param string $secretKey Clave secreta de reCAPTCHA
 * @param float $minScore Score mínimo aceptado (0.0 a 1.0)
 * @return array ['success' => bool, 'score' => float, 'message' => string]
 */
function validateRecaptcha($token, $secretKey, $minScore = 0.5) {
    if (empty($token)) {
        return ['success' => false, 'score' => 0, 'message' => 'Token de reCAPTCHA no proporcionado.'];
    }
    
    if (empty($secretKey)) {
        return ['success' => false, 'score' => 0, 'message' => 'Clave secreta de reCAPTCHA no configurada.'];
    }
    
    // Intentar primero con el endpoint estándar, luego con Enterprise si falla
    $endpoints = [
        'https://www.google.com/recaptcha/api/siteverify',
        'https://www.google.com/recaptcha/enterprise/siteverify'
    ];
    
    $data = [
        'secret' => $secretKey,
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ];
    
    $result = false;
    $lastError = '';
    $lastHttpCode = 0;
    
    // Intentar con cada endpoint hasta que uno funcione
    foreach ($endpoints as $url) {
        // Usar cURL si está disponible (más confiable), sino usar file_get_contents
        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded'
            ]);
            
            $result = curl_exec($ch);
            $curlError = curl_error($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($result !== false && empty($curlError) && $httpCode === 200) {
                // Éxito, salir del bucle
                break;
            } else {
                $lastError = $curlError;
                $lastHttpCode = $httpCode;
                $result = false;
            }
        } else {
            // Fallback a file_get_contents si cURL no está disponible
            $options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data),
                    'timeout' => 10
                ]
            ];
            
            $context = stream_context_create($options);
            $result = @file_get_contents($url, false, $context);
            
            if ($result !== false) {
                // Éxito, salir del bucle
                break;
            }
        }
    }
    
    // Si ambos endpoints fallaron, retornar error
    if ($result === false) {
        if (!empty($lastError)) {
            return ['success' => false, 'score' => 0, 'message' => 'Error al conectar con el servicio de reCAPTCHA: ' . $lastError];
        } elseif ($lastHttpCode !== 0) {
            return ['success' => false, 'score' => 0, 'message' => 'Error HTTP al conectar con reCAPTCHA: ' . $lastHttpCode];
        } else {
            return ['success' => false, 'score' => 0, 'message' => 'Error al conectar con el servicio de reCAPTCHA. Verifica la conectividad del servidor.'];
        }
    }
    
    $response = json_decode($result, true);
    
    if (!isset($response['success']) || !$response['success']) {
        $errorCodes = $response['error-codes'] ?? [];
        return ['success' => false, 'score' => 0, 'message' => 'Error en reCAPTCHA: ' . implode(', ', $errorCodes)];
    }
    
    $score = $response['score'] ?? 0;
    
    if ($score < $minScore) {
        return ['success' => false, 'score' => $score, 'message' => 'Score de reCAPTCHA muy bajo. Intenta nuevamente.'];
    }
    
    return ['success' => true, 'score' => $score, 'message' => 'reCAPTCHA validado correctamente.'];
}

/**
 * Verificar honeypot (campo oculto que los bots suelen llenar)
 * @param string $honeypotValue Valor del campo honeypot
 * @return bool true si es válido (campo vacío), false si es bot
 */
function validateHoneypot($honeypotValue) {
    return empty($honeypotValue);
}

/**
 * Validar tiempo mínimo de envío (evita envíos instantáneos de bots)
 * @param int $submitTime Timestamp del envío
 * @param int $minSeconds Segundos mínimos (default: 3)
 * @return bool true si es válido, false si es muy rápido
 */
function validateSubmitTime($submitTime, $minSeconds = 3) {
    if (empty($submitTime)) {
        return false;
    }
    
    $currentTime = time();
    $elapsed = $currentTime - (int)$submitTime;
    
    return $elapsed >= $minSeconds;
}
