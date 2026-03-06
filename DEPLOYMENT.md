# Guía de Deployment - SINTIA Ecosystem

## 🚀 Instalación en el Servidor

### 1. Subir archivos al servidor

Sube todos los archivos del proyecto al servidor, **EXCEPTO**:
- `vendor/` (se genera con Composer)
- `composer.lock` (se genera con Composer)
- Archivos de desarrollo local

### 2. Instalar dependencias con Composer

**IMPORTANTE:** Ejecuta este comando en el servidor después de subir los archivos:

```bash
composer install
```

Este comando:
- Lee el archivo `composer.json`
- Descarga todas las dependencias (incluyendo PHPMailer)
- Crea la carpeta `vendor/` con todas las librerías necesarias
- Genera el archivo `composer.lock`

### 3. Verificar instalación

Después de ejecutar `composer install`, verifica que exista:
- `vendor/autoload.php`
- `vendor/phpmailer/`

### 4. Configurar permisos

Asegúrate de que el servidor tenga permisos de escritura en:
- `vendor/` (para Composer)
- Cualquier carpeta de logs o cache (si aplica)

### 5. Configurar SMTP

Edita `includes/mailer.php` con las credenciales del servidor:
- Servidor SMTP
- Usuario y contraseña
- Puerto y seguridad

## 📋 Checklist de Deployment

- [ ] Archivos subidos al servidor
- [ ] `composer install` ejecutado en el servidor
- [ ] `vendor/autoload.php` existe
- [ ] Credenciales SMTP configuradas en `includes/mailer.php`
- [ ] `RewriteBase` en `.htaccess` configurado correctamente
- [ ] Permisos de archivos correctos
- [ ] Formulario de contacto probado

## 🔄 Actualizar Dependencias

Si necesitas actualizar las dependencias en el futuro:

```bash
composer update
```

## ⚠️ Notas Importantes

- **NUNCA** subas la carpeta `vendor/` al repositorio Git
- **SIEMPRE** ejecuta `composer install` en el servidor después de subir archivos
- El archivo `composer.json` SÍ debe subirse (contiene la lista de dependencias)
- El archivo `composer.lock` puede subirse (bloquea versiones específicas)

## 🆘 Solución de Problemas

**Error: "composer: command not found"**
- Composer no está instalado en el servidor
- Instala Composer: https://getcomposer.org/download/

**Error: "vendor/autoload.php not found"**
- No se ejecutó `composer install`
- Ejecuta: `composer install` en la raíz del proyecto

**Error: "Class 'PHPMailer\PHPMailer\PHPMailer' not found"**
- PHPMailer no está instalado
- Ejecuta: `composer install`
