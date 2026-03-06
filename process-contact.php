<?php
/**
 * Procesar formulario de contacto
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/mailer.php';

// Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . url('contacto'));
    exit;
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
