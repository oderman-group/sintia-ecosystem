<?php
/**
 * Configuración de PHPMailer
 * Requiere: composer require phpmailer/phpmailer
 * O descargar manualmente desde: https://github.com/PHPMailer/PHPMailer
 */

// Si usas Composer
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} 
// Si descargaste PHPMailer manualmente
elseif (file_exists(__DIR__ . '/../PHPMailer/src/PHPMailer.php')) {
    require_once __DIR__ . '/../PHPMailer/src/Exception.php';
    require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
    require_once __DIR__ . '/../PHPMailer/src/SMTP.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Enviar email de contacto
 * @param array $data Datos del formulario
 * @return array ['success' => bool, 'message' => string]
 */
function sendContactEmail($data) {
    // Validar datos
    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        return ['success' => false, 'message' => 'Por favor completa todos los campos requeridos.'];
    }
    
    // Validar email
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'message' => 'El email proporcionado no es válido.'];
    }
    
    // Sanitizar datos
    $name = htmlspecialchars(trim($data['name']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    $phone = isset($data['phone']) ? htmlspecialchars(trim($data['phone']), ENT_QUOTES, 'UTF-8') : '';
    $platform = isset($data['platform']) ? htmlspecialchars(trim($data['platform']), ENT_QUOTES, 'UTF-8') : '';
    $message = htmlspecialchars(trim($data['message']), ENT_QUOTES, 'UTF-8');
    
    try {
        $mail = new PHPMailer(true);
        
        // Configuración del servidor SMTP
        // NOTA: Ajusta estos valores según tu configuración de correo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambiar según tu proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'tu-email@gmail.com'; // Cambiar por tu email
        $mail->Password = 'tu-contraseña'; // Cambiar por tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        // Remitente
        $mail->setFrom('noreply@sintia.co', 'SINTIA - Formulario de Contacto');
        $mail->addReplyTo($email, $name);
        
        // Destinatario
        $mail->addAddress('info@oderman-group.com', 'SINTIA');
        
        // Copia al remitente
        $mail->addCC($email, $name);
        
        // Contenido del email
        $mail->isHTML(true);
        $mail->Subject = 'Nueva Solicitud de Demo - SINTIA';
        
        // Cuerpo del mensaje
        $body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #0066CC; color: white; padding: 20px; text-align: center; }
                .content { background-color: #f9f9f9; padding: 20px; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #0066CC; }
                .value { margin-top: 5px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Nueva Solicitud de Demo - SINTIA</h2>
                </div>
                <div class='content'>
                    <div class='field'>
                        <div class='label'>Nombre:</div>
                        <div class='value'>{$name}</div>
                    </div>
                    <div class='field'>
                        <div class='label'>Email:</div>
                        <div class='value'>{$email}</div>
                    </div>";
        
        if ($phone) {
            $body .= "
                    <div class='field'>
                        <div class='label'>Teléfono:</div>
                        <div class='value'>{$phone}</div>
                    </div>";
        }
        
        if ($platform) {
            $platformNames = [
                'educativa' => 'Sintia Educativa',
                'crm' => 'Sintia CRM',
                'erp' => 'Sintia ERP'
            ];
            $platformName = isset($platformNames[$platform]) ? $platformNames[$platform] : $platform;
            $body .= "
                    <div class='field'>
                        <div class='label'>Plataforma de Interés:</div>
                        <div class='value'>{$platformName}</div>
                    </div>";
        }
        
        $body .= "
                    <div class='field'>
                        <div class='label'>Mensaje:</div>
                        <div class='value'>" . nl2br($message) . "</div>
                    </div>
                </div>
            </div>
        </body>
        </html>";
        
        $mail->Body = $body;
        $mail->AltBody = "Nueva Solicitud de Demo - SINTIA\n\nNombre: {$name}\nEmail: {$email}\n" . 
                         ($phone ? "Teléfono: {$phone}\n" : '') . 
                         ($platform ? "Plataforma: {$platform}\n" : '') . 
                         "Mensaje: {$message}";
        
        $mail->send();
        
        return ['success' => true, 'message' => '¡Mensaje enviado exitosamente! Te contactaremos pronto.'];
        
    } catch (Exception $e) {
        return ['success' => false, 'message' => 'Error al enviar el mensaje: ' . $mail->ErrorInfo];
    }
}
