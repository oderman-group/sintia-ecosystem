# SINTIA Ecosystem - Sitio Web Moderno

Sitio web moderno y profesional para SINTIA Ecosystem, diseñado con los más altos estándares de UI/UX, inspirado en Salesforce.

## 🚀 Características

- **Diseño Moderno**: Inspirado en Salesforce con UI/UX de alta calidad
- **Responsive**: Totalmente adaptable a todos los dispositivos
- **Multiidioma**: Soporte para Español e Inglés
- **SEO Optimizado**: Meta tags, Schema.org, sitemap.xml, robots.txt
- **Seguridad**: Headers de seguridad, validación de datos
- **Performance**: Optimizado para velocidad de carga
- **Accesibilidad**: Cumple con estándares WCAG

## 📁 Estructura del Proyecto

```
sintia-ecoystem/
├── css/
│   └── estilos.css          # Estilos principales
├── js/
│   ├── translations.js       # Traducciones ES/EN
│   ├── language.js           # Sistema de cambio de idioma
│   ├── cookies.js            # Gestión de cookies
│   └── main.js               # Scripts comunes
├── img/                      # Imágenes del sitio
├── includes/
│   ├── config.php            # Configuración base
│   ├── seo.php               # Funciones SEO
│   ├── header.php            # Header centralizado
│   └── footer.php            # Footer centralizado
├── .htaccess                 # Configuración Apache
├── robots.txt                # Instrucciones para crawlers
├── sitemap.xml               # Mapa del sitio
├── 404.php                   # Página de error 404
├── index.php                 # Página principal
├── contacto.php              # Página de contacto
├── blog.php                  # Página de blog
├── privacidad.php            # Política de privacidad
├── terminos.php              # Términos y condiciones
└── cookies.php               # Política de cookies
```

## 🛠️ Requisitos

- PHP 7.4 o superior
- Apache con mod_rewrite habilitado
- Servidor web (XAMPP, WAMP, etc.)

## 📦 Instalación

1. Clonar o copiar el proyecto en la carpeta `htdocs` de XAMPP
2. Asegurarse de que `mod_rewrite` esté habilitado en Apache
3. Configurar el `RewriteBase` en `.htaccess` según la ubicación del proyecto
4. **Instalar dependencias de Composer** (requerido para el formulario de contacto):
   ```bash
   composer install
   ```
5. **Configurar credenciales SMTP**:
   - Copia `.env.example` a `.env`: `cp .env.example .env`
   - Edita `.env` con tus credenciales de email (ver `INSTRUCCIONES-PHPMailer.md`)
6. **Configurar reCAPTCHA v3** (Opcional pero recomendado):
   - Obtén las claves en: https://www.google.com/recaptcha/admin
   - Agrega `RECAPTCHA_SITE_KEY` y `RECAPTCHA_SECRET_KEY` en `.env`
   - Ver `INSTRUCCIONES-RECAPTCHA.md` para más detalles
7. Acceder al sitio desde el navegador

## ⚙️ Configuración

### URLs Amigables

El archivo `.htaccess` está configurado para URLs amigables. Asegúrate de ajustar el `RewriteBase` según tu configuración:

```apache
RewriteBase /sintia-ecoystem/
```

### Base URL

La base URL se detecta automáticamente en `includes/config.php`. Si necesitas ajustarla manualmente, modifica las variables `BASE_URL` y `BASE_PATH`.

## 🎨 Personalización

### Colores

Los colores se definen en variables CSS en `css/estilos.css`:

```css
:root {
    --color-primary: #0066CC;
    --color-primary-dark: #0052A3;
    /* ... más colores ... */
}
```

### Traducciones

Las traducciones se encuentran en `js/translations.js`. Agrega nuevas traducciones siguiendo la estructura existente.

## 📱 Páginas Disponibles

- **/** - Página principal con hero, plataformas, estadísticas y testimonios
- **/blog** - Página de blog
- **/contacto** - Formulario de contacto
- **/privacidad** - Política de privacidad
- **/terminos** - Términos y condiciones
- **/cookies** - Política de cookies
- **/404** - Página de error 404

## 🔒 Seguridad

- Headers de seguridad configurados en `.htaccess`
- Validación y sanitización de datos
- Protección contra XSS
- Content Security Policy

## 🔍 SEO

- Meta tags completos (Open Graph, Twitter Cards)
- Schema.org structured data
- Sitemap.xml
- Robots.txt
- URLs amigables
- Hreflang para multiidioma

## 🌐 Multiidioma

El sitio soporta Español e Inglés. El idioma se detecta automáticamente del navegador o se puede cambiar manualmente desde el selector en el header.

## 📝 Notas

- Todas las rutas de assets usan la función `asset()` para compatibilidad con URLs amigables
- Header y Footer son componentes centralizados en `includes/`
- El sistema de cookies cumple con GDPR/LGPD
- El diseño es mobile-first y totalmente responsive

## 📄 Licencia

Este proyecto es propiedad de SINTIA.

## 👥 Contacto

- **Email**: info@oderman-group.com
- **Teléfono**: +57 300 607 5800
- **Ubicación**: Medellín, Colombia

---

**Desarrollado con ❤️ para SINTIA Ecosystem**
