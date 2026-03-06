# 🚀 Pasos para Instalar en el Servidor

## Situación Actual
- **URL del sitio**: `https://sintia.co/sintia`
- **Problema 1**: Enlaces de blog/contacto no funcionan
- **Problema 2**: Composer no disponible en cPanel

## ✅ Solución Implementada

### 1. Corregir RewriteBase en .htaccess

El archivo `.htaccess` ya está actualizado con `RewriteBase /sintia/`

**Verificar en el servidor:**
- Abre `.htaccess` en el servidor
- Debe tener: `RewriteBase /sintia/`
- Si dice `/sintia-ecoystem/`, cámbialo a `/sintia/`

### 2. Instalar PHPMailer sin Composer

**Opción Recomendada: Script Automático**

1. **Subir archivo al servidor:**
   - Sube `install-phpmailer.php` a la raíz del proyecto (`public_html/sintia/`)

2. **Ejecutar desde el navegador:**
   - Accede a: `https://sintia.co/sintia/install-phpmailer.php`
   - El script instalará PHPMailer automáticamente
   - Verás mensajes de progreso

3. **Verificar instalación:**
   ```bash
   ls -la vendor/autoload.php
   ls -la vendor/phpmailer/phpmailer/PHPMailer.php
   ```

4. **Eliminar script (IMPORTANTE):**
   ```bash
   rm install-phpmailer.php
   ```
   O desde el administrador de archivos de cPanel

### 3. Configurar .env

1. **Crear archivo .env:**
   ```bash
   cp .env.example .env
   ```

2. **Editar .env con tus credenciales:**
   ```env
   EMAIL_SERVER=tu-servidor-smtp.com
   EMAIL_USER=tu-email@dominio.com
   EMAIL_PASSWORD="tu-contraseña-aquí"
   SMTPSECURE=ssl
   PORT_SEND_EMAIL=465
   SMTPAUTH=true
   
   # reCAPTCHA (opcional)
   RECAPTCHA_SITE_KEY=
   RECAPTCHA_SECRET_KEY=
   ```
   
   **⚠️ IMPORTANTE:** Reemplaza los valores de ejemplo con tus credenciales reales. El archivo `.env` ya está en `.gitignore` y no se subirá a Git.

## 📋 Checklist Completo

- [ ] Repositorio clonado en el servidor
- [ ] `.htaccess` con `RewriteBase /sintia/` verificado
- [ ] `install-phpmailer.php` subido al servidor
- [ ] Script ejecutado desde el navegador
- [ ] `vendor/autoload.php` existe
- [ ] `vendor/phpmailer/phpmailer/PHPMailer.php` existe
- [ ] `install-phpmailer.php` eliminado (seguridad)
- [ ] `.env` creado desde `.env.example`
- [ ] Credenciales SMTP configuradas en `.env`
- [ ] Sitio accesible: `https://sintia.co/sintia`
- [ ] Enlaces de blog y contacto funcionan
- [ ] Formulario de contacto probado

## 🔧 Comandos Rápidos (cPanel Terminal)

```bash
# 1. Ir al directorio del proyecto
cd public_html/sintia

# 2. Verificar RewriteBase
grep "RewriteBase" .htaccess

# 3. Crear .env
cp .env.example .env

# 4. Editar .env (usar nano o vi)
nano .env

# 5. Verificar que vendor existe (después de ejecutar install-phpmailer.php)
ls -la vendor/autoload.php
```

## 🆘 Solución de Problemas

### Error: "404 Not Found" en blog/contacto

**Causa:** `RewriteBase` incorrecto en `.htaccess`

**Solución:**
1. Abre `.htaccess` en el servidor
2. Busca: `RewriteBase /sintia-ecoystem/`
3. Cámbialo a: `RewriteBase /sintia/`
4. Guarda el archivo

### Error: "composer: command not found"

**Solución:** Usa el script `install-phpmailer.php` en su lugar (ver paso 2 arriba)

### Error: "Class 'PHPMailer\PHPMailer\PHPMailer' not found"

**Causa:** PHPMailer no está instalado

**Solución:**
1. Ejecuta `install-phpmailer.php` desde el navegador
2. O sigue la instalación manual en `INSTALACION-SIN-COMPOSER.md`

## 📝 Notas Importantes

- El `RewriteBase` debe coincidir con la ruta donde está el proyecto
- Si el proyecto está en la raíz (`https://sintia.co/`), usa `RewriteBase /`
- Si está en subdirectorio (`https://sintia.co/sintia/`), usa `RewriteBase /sintia/`
- Siempre elimina `install-phpmailer.php` después de usarlo por seguridad
