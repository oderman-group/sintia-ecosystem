<?php
/**
 * Procesar formulario de contacto
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/mailer.php';
require_once __DIR__ . '/includes/recaptcha.php';

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . url('contacto'));
    exit;
}

// Validación anti-bot: Honeypot
$honeypot = $_POST['website'] ?? '';
if (!validateHoneypot($honeypot)) {
    // Es un bot, redirigir sin procesar
    header('Location: ' . url('contacto') . '?error=' . urlencode('Solicitud inválida.'));
    exit;
}

// Validación anti-bot: Tiempo mínimo de envío
$formStartTime = $_POST['form_start_time'] ?? 0;
if (!validateSubmitTime($formStartTime, 3)) {
    header('Location: ' . url('contacto') . '?error=' . urlencode('El formulario se envió demasiado rápido. Por favor, intenta nuevamente.'));
    exit;
}

// Validación anti-bot: reCAPTCHA v3
$recaptchaToken = $_POST['recaptcha_token'] ?? '';
$recaptchaSecret = defined('RECAPTCHA_SECRET_KEY') ? RECAPTCHA_SECRET_KEY : '';

if (!empty($recaptchaSecret)) {
    $recaptchaResult = validateRecaptcha($recaptchaToken, $recaptchaSecret, 0.5);
    if (!$recaptchaResult['success']) {
        header('Location: ' . url('contacto') . '?error=' . urlencode($recaptchaResult['message']));
        exit;
    }
}

// Obtener datos del formulario
$data = [
    'name' => $_POST['name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'platform' => $_POST['platform'] ?? '',
    'message' => $_POST['message'] ?? ''
];

// Enviar email
$result = sendContactEmail($data);

// Redirigir con mensaje
$lang = getCurrentLang();
$redirectUrl = url('contacto') . '?lang=' . $lang;
if ($result['success']) {
    $redirectUrl .= '&success=1';
} else {
    $redirectUrl .= '&error=' . urlencode($result['message']);
}

header('Location: ' . $redirectUrl);
exit;
