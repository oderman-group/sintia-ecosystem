<?php
/**
 * Página de Contacto
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/seo.php';

$pageData = [
    'title' => 'Contacto - SINTIA',
    'title_es' => 'Contacto - SINTIA',
    'title_en' => 'Contact - SINTIA',
    'description' => 'Contáctanos para conocer más sobre nuestras soluciones. Estamos en Medellín, Colombia.',
    'description_es' => 'Contáctanos para conocer más sobre nuestras soluciones. Estamos en Medellín, Colombia.',
    'description_en' => 'Contact us to learn more about our solutions. We are in Medellín, Colombia.',
    'keywords' => 'contacto SINTIA, información, demo, consultoría',
    'url' => url('contacto'),
    'image' => asset('img/og-image.jpg'),
    'alternate' => [
        'es' => url('contacto'),
        'en' => url('contacto') . '?lang=en'
    ]
];

$lang = getCurrentLang();
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
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo asset('css/estilos.css'); ?>">
</head>
<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    
    <main>
        <section class="hero" style="padding: var(--spacing-3xl) 0;">
            <div class="hero__container container-content">
                <h1 class="hero__title" style="font-size: clamp(2rem, 4vw, 3rem);" data-i18n="contact.title">Contáctanos</h1>
                <p class="hero__subtitle" data-i18n="contact.subtitle">Nuestro equipo comercial está listo para asesorarte gratis.</p>
            </div>
        </section>
        
        <section class="platforms" style="padding: var(--spacing-3xl) 0;">
            <div class="container-content">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-xl);">
                    <div class="platform-card">
                        <h3 class="platform-card__title" data-i18n="contact.contactInfo">Información de Contacto</h3>
                        <div style="margin-top: var(--spacing-md);">
                            <p style="margin-bottom: var(--spacing-sm);"><strong data-i18n="contact.address">Dirección:</strong></p>
                            <p style="margin-bottom: var(--spacing-md); color: var(--color-text-secondary);">Medellín, Colombia</p>
                            
                            <p style="margin-bottom: var(--spacing-sm);"><strong data-i18n="contact.email">Email:</strong></p>
                            <p style="margin-bottom: var(--spacing-md);">
                                <a href="mailto:info@oderman-group.com" style="color: var(--color-primary);">info@oderman-group.com</a>
                            </p>
                            
                            <p style="margin-bottom: var(--spacing-sm);"><strong data-i18n="contact.phone">Teléfono:</strong></p>
                            <p style="margin-bottom: var(--spacing-md);">
                                <a href="tel:+573006075800" style="color: var(--color-primary);">+57 300 607 5800</a>
                            </p>
                            
                            <div style="margin-top: var(--spacing-lg);">
                                <a href="https://wa.me/573006075800?text=Hola%2C%20me%20interesa%20conocer%20m%C3%A1s%20sobre%20SINTIA" 
                                   class="btn btn--primary" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   style="display: inline-flex; align-items: center; gap: var(--spacing-sm); width: 100%; justify-content: center;">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                    <span data-i18n="contact.whatsapp">Contactar por WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="platform-card">
                        <h3 class="platform-card__title" data-i18n="contact.requestDemo">Solicita un Demo</h3>
                        <p class="platform-card__description" style="margin-bottom: var(--spacing-lg);" data-i18n="contact.demoDescription">
                            Completa el formulario y nos pondremos en contacto contigo para agendar una demostración gratuita.
                        </p>
                        <?php
                        // Mostrar mensajes de éxito o error
                        if (isset($_GET['success']) && $_GET['success'] == '1') {
                            echo '<div style="padding: var(--spacing-md); background-color: #d4edda; color: #155724; border-radius: var(--radius-md); margin-bottom: var(--spacing-md); border: 1px solid #c3e6cb;">
                                    <strong>¡Éxito!</strong> Tu mensaje ha sido enviado. Te contactaremos pronto.
                                  </div>';
                        }
                        if (isset($_GET['error'])) {
                            echo '<div style="padding: var(--spacing-md); background-color: #f8d7da; color: #721c24; border-radius: var(--radius-md); margin-bottom: var(--spacing-md); border: 1px solid #f5c6cb;">
                                    <strong>Error:</strong> ' . e($_GET['error']) . '
                                  </div>';
                        }
                        ?>
                        <form id="contact-form" action="<?php echo url('process-contact'); ?>" method="POST" style="display: flex; flex-direction: column; gap: var(--spacing-md);">
                            <!-- Campo honeypot (oculto para usuarios, visible para bots) -->
                            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off" 
                                   style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;" 
                                   aria-hidden="true">
                            
                            <!-- Timestamp de inicio del formulario -->
                            <input type="hidden" name="form_start_time" id="form_start_time" value="<?php echo time(); ?>">
                            
                            <!-- Token de reCAPTCHA -->
                            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
                            
                            <input type="text" name="name" data-i18n-placeholder="contact.fullName" placeholder="Nombre completo" required 
                                   style="padding: 0.875rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-family: inherit;">
                            <input type="email" name="email" data-i18n-placeholder="contact.emailPlaceholder" placeholder="Email" required 
                                   style="padding: 0.875rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-family: inherit;">
                            <input type="tel" name="phone" data-i18n-placeholder="contact.phonePlaceholder" placeholder="Teléfono" 
                                   style="padding: 0.875rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-family: inherit;">
                            <select name="platform" required 
                                    style="padding: 0.875rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-family: inherit;">
                                <option value="" data-i18n="contact.selectPlatform">Selecciona una plataforma</option>
                                <option value="educativa">Sintia Educativa</option>
                                <option value="crm">Sintia CRM</option>
                                <option value="erp">Sintia ERP</option>
                            </select>
                            <textarea name="message" data-i18n-placeholder="contact.message" placeholder="Mensaje" rows="4" required
                                      style="padding: 0.875rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-family: inherit; resize: vertical;"></textarea>
                            <button type="submit" class="btn btn--primary" id="submit-btn" data-i18n="contact.sendRequest">Enviar Solicitud</button>
                        </form>
                        
                        <!-- reCAPTCHA v3 Script -->
                        <?php 
                        $recaptchaSiteKey = defined('RECAPTCHA_SITE_KEY') ? RECAPTCHA_SITE_KEY : '';
                        // Verificar que la clave no esté vacía después de trim
                        $recaptchaSiteKey = !empty($recaptchaSiteKey) && trim($recaptchaSiteKey) !== '' ? trim($recaptchaSiteKey) : '';
                        
                        if (!empty($recaptchaSiteKey)): 
                        ?>
                        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e($recaptchaSiteKey); ?>"></script>
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.getElementById('contact-form');
                            const submitBtn = document.getElementById('submit-btn');
                            const recaptchaToken = document.getElementById('recaptcha_token');
                            
                            if (form && recaptchaToken) {
                                form.addEventListener('submit', function(e) {
                                    e.preventDefault();
                                    
                                    // Deshabilitar botón para evitar doble envío
                                    if (submitBtn) {
                                        submitBtn.disabled = true;
                                        submitBtn.textContent = 'Enviando...';
                                    }
                                    
                                    // Verificar que grecaptcha esté disponible
                                    if (typeof grecaptcha === 'undefined') {
                                        alert('Error: reCAPTCHA no está disponible. Por favor, recarga la página e intenta nuevamente.');
                                        if (submitBtn) {
                                            submitBtn.disabled = false;
                                            submitBtn.textContent = 'Enviar Solicitud';
                                        }
                                        return;
                                    }
                                    
                                    // Obtener token de reCAPTCHA
                                    grecaptcha.ready(function() {
                                        grecaptcha.execute('<?php echo e($recaptchaSiteKey); ?>', {action: 'submit'}).then(function(token) {
                                            if (token) {
                                                recaptchaToken.value = token;
                                                form.submit();
                                            } else {
                                                alert('Error al obtener token de reCAPTCHA. Por favor, intenta nuevamente.');
                                                if (submitBtn) {
                                                    submitBtn.disabled = false;
                                                    submitBtn.textContent = 'Enviar Solicitud';
                                                }
                                            }
                                        }).catch(function(error) {
                                            console.error('Error en reCAPTCHA:', error);
                                            alert('Error en reCAPTCHA. Por favor, recarga la página e intenta nuevamente.');
                                            if (submitBtn) {
                                                submitBtn.disabled = false;
                                                submitBtn.textContent = 'Enviar Solicitud';
                                            }
                                        });
                                    });
                                });
                            }
                        });
                        </script>
                        <?php else: ?>
                        <!-- reCAPTCHA no configurado - el formulario funcionará sin reCAPTCHA -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.getElementById('contact-form');
                            const submitBtn = document.getElementById('submit-btn');
                            
                            if (form && submitBtn) {
                                form.addEventListener('submit', function(e) {
                                    // Deshabilitar botón para evitar doble envío
                                    submitBtn.disabled = true;
                                    submitBtn.textContent = 'Enviando...';
                                    // El formulario se enviará normalmente sin reCAPTCHA
                                });
                            }
                        });
                        </script>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include __DIR__ . '/includes/footer.php'; ?>
    
    <script src="<?php echo asset('js/translations.js'); ?>"></script>
    <script src="<?php echo asset('js/language.js'); ?>"></script>
    <script src="<?php echo asset('js/cookies.js'); ?>"></script>
    <script src="<?php echo asset('js/main.js'); ?>"></script>
</body>
</html>
