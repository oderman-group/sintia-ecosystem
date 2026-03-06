# Instalación de PHPMailer sin Composer

## 🚨 Problema: Composer no disponible en cPanel

Si no puedes ejecutar `composer install` desde la terminal de cPanel, sigue estos pasos:

## 📥 Opción 1: Script de Instalación Automática (Recomendado)

### Paso 1: Subir el script

1. Sube el archivo `install-phpmailer.php` al servidor (en la raíz del proyecto)

### Paso 2: Ejecutar desde el navegador

1. Accede a: `https://sintia.co/sintia/install-phpmailer.php`
2. El script descargará e instalará PHPMailer automáticamente
3. Verás mensajes de progreso en la pantalla

### Paso 3: Verificar instalación

Después de ejecutar, verifica que existan:
- `vendor/autoload.php`
- `vendor/phpmailer/phpmailer/PHPMailer.php`
- `vendor/phpmailer/phpmailer/SMTP.php`
- `vendor/phpmailer/phpmailer/Exception.php`

### Paso 4: Eliminar el script (Seguridad)

**IMPORTANTE:** Después de instalar, elimina el archivo `install-phpmailer.php` por seguridad:

```bash
rm install-phpmailer.php
```

O desde el administrador de archivos de cPanel.

## 📥 Opción 2: Instalación Manual

### Paso 1: Descargar PHPMailer

1. Ve a: https://github.com/PHPMailer/PHPMailer
2. Haz clic en "Code" → "Download ZIP"
3. Descarga el archivo ZIP

### Paso 2: Subir y extraer

1. Sube el ZIP al servidor (en la raíz del proyecto)
2. Extrae el contenido
3. Deberías tener una carpeta `PHPMailer-master`

### Paso 3: Crear estructura

Crea esta estructura de carpetas:

```
sintia/
├── vendor/
│   ├── autoload.php
│   └── phpmailer/
│       └── phpmailer/
│           ├── PHPMailer.php
│           ├── SMTP.php
│           └── Exception.php
```

### Paso 4: Copiar archivos

Copia estos archivos desde `PHPMailer-master/src/` a `vendor/phpmailer/phpmailer/`:
- `PHPMailer.php`
- `SMTP.php`
- `Exception.php`

### Paso 5: Crear autoload.php

Crea el archivo `vendor/autoload.php` con este contenido:

```php
<?php
/**
 * Autoload básico para PHPMailer (instalación manual)
 */
spl_autoload_register(function ($class) {
    $prefix = 'PHPMailer\\PHPMailer\\';
    $base_dir = __DIR__ . '/phpmailer/phpmailer/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});
```

### Paso 6: Limpiar

Elimina la carpeta `PHPMailer-master` y el archivo ZIP después de copiar los archivos.

## ✅ Verificación

Para verificar que todo funciona:

1. Accede a la página de contacto
2. Intenta enviar un formulario de prueba
3. Si no hay errores de "Class not found", la instalación fue exitosa

## 🆘 Solución de Problemas

**Error: "Class 'PHPMailer\PHPMailer\PHPMailer' not found"**
- Verifica que `vendor/autoload.php` exista
- Verifica que los archivos estén en `vendor/phpmailer/phpmailer/`
- Verifica los permisos de los archivos (644 para archivos, 755 para carpetas)

**Error al ejecutar install-phpmailer.php**
- Verifica que PHP tenga permisos para crear carpetas
- Verifica que haya espacio en disco
- Verifica la conexión a internet del servidor

## 📝 Notas

- El script `install-phpmailer.php` descarga la versión más reciente de PHPMailer
- Después de instalar, puedes eliminar `composer.json` y `composer.lock` si no los necesitas
- La estructura creada es compatible con el código existente
