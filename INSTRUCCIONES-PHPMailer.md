# Instrucciones para Configurar PHPMailer

## 📧 Configuración de Email con PHPMailer

Este proyecto utiliza PHPMailer para enviar emails desde el formulario de contacto. Sigue estos pasos para configurarlo:

## 📦 Opción 1: Instalación con Composer (Recomendado)

1. **Instalar Composer** (si no lo tienes):
   - Descarga desde: https://getcomposer.org/download/
   - O si tienes XAMPP, puede que ya esté incluido

2. **Instalar PHPMailer**:
   ```bash
   cd C:\xampp\htdocs\sintia-ecoystem
   composer require phpmailer/phpmailer
   ```

3. **Verificar instalación**:
   - Debe crearse la carpeta `vendor/` con PHPMailer

## 📦 Opción 2: Instalación Manual

1. **Descargar PHPMailer**:
   - Ve a: https://github.com/PHPMailer/PHPMailer
   - Descarga el ZIP o clona el repositorio

2. **Extraer archivos**:
   - Extrae la carpeta `PHPMailer` en la raíz del proyecto
   - La estructura debe ser: `sintia-ecoystem/PHPMailer/src/`

3. **Verificar estructura**:
   ```
   sintia-ecoystem/
   ├── PHPMailer/
   │   └── src/
   │       ├── PHPMailer.php
   │       ├── SMTP.php
   │       └── Exception.php
   ```

## ⚙️ Configuración del Servidor SMTP

Edita el archivo `includes/mailer.php` y ajusta la configuración SMTP:

### Para Gmail:

```php
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'tu-email@gmail.com'; // Tu email de Gmail
$mail->Password = 'tu-contraseña-de-aplicación'; // Contraseña de aplicación (NO la contraseña normal)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
```

**⚠️ IMPORTANTE para Gmail:**
- Necesitas crear una "Contraseña de aplicación" en tu cuenta de Google
- Ve a: https://myaccount.google.com/apppasswords
- Genera una contraseña de aplicación y úsala en lugar de tu contraseña normal

### Para otros proveedores:

**Outlook/Hotmail:**
```php
$mail->Host = 'smtp-mail.outlook.com';
$mail->Port = 587;
```

**Yahoo:**
```php
$mail->Host = 'smtp.mail.yahoo.com';
$mail->Port = 587;
```

**Servidor SMTP personalizado:**
```php
$mail->Host = 'smtp.tu-servidor.com';
$mail->Port = 587; // o 465 para SSL
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // o ENCRYPTION_SMTPS para SSL
```

## 🔧 Configuración en `includes/mailer.php`

Edita las siguientes líneas en `includes/mailer.php`:

```php
// Línea ~30: Configuración SMTP
$mail->Host = 'smtp.gmail.com'; // Cambiar según tu proveedor
$mail->SMTPAuth = true;
$mail->Username = 'tu-email@gmail.com'; // ⚠️ CAMBIAR
$mail->Password = 'tu-contraseña'; // ⚠️ CAMBIAR
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Línea ~35: Remitente
$mail->setFrom('noreply@sintia.co', 'SINTIA - Formulario de Contacto');

// Línea ~38: Destinatario (ya está configurado)
$mail->addAddress('info@oderman-group.com', 'SINTIA');
```

## ✅ Verificación

1. **Probar el formulario**:
   - Ve a la página de contacto
   - Completa el formulario
   - Envía el mensaje

2. **Verificar emails**:
   - Debe llegar a: `info@oderman-group.com`
   - Debe llegar copia al remitente

3. **Si hay errores**:
   - Revisa los logs de PHP
   - Verifica la configuración SMTP
   - Asegúrate de que PHPMailer esté instalado correctamente

## 🔒 Seguridad

- **NUNCA** subas `mailer.php` con credenciales reales a un repositorio público
- Usa variables de entorno o un archivo de configuración separado
- Considera usar `.env` para credenciales sensibles

## 📝 Notas

- El email se envía a: `info@oderman-group.com`
- Se envía copia (CC) al remitente automáticamente
- El formulario valida que todos los campos requeridos estén completos
- Los datos se sanitizan antes de enviar

## 🆘 Solución de Problemas

**Error: "Class 'PHPMailer\PHPMailer\PHPMailer' not found"**
- PHPMailer no está instalado correctamente
- Verifica la ruta en `includes/mailer.php`

**Error: "SMTP connect() failed"**
- Verifica la configuración SMTP
- Revisa que el puerto y el servidor sean correctos
- Para Gmail, asegúrate de usar contraseña de aplicación

**Error: "Authentication failed"**
- Verifica usuario y contraseña
- Para Gmail, usa contraseña de aplicación, no la contraseña normal
