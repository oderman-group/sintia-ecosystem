# Instrucciones para Configurar reCAPTCHA v3

## 🛡️ Protección Anti-Bot Implementada

El formulario de contacto tiene **3 capas de protección** contra bots:

1. **reCAPTCHA v3** - Validación invisible de Google
2. **Honeypot** - Campo oculto que los bots suelen llenar
3. **Validación de tiempo** - Evita envíos instantáneos (mínimo 3 segundos)

## 📝 Configuración de reCAPTCHA v3

### Paso 1: Obtener las Claves

1. Ve a: https://www.google.com/recaptcha/admin
2. Inicia sesión con tu cuenta de Google
3. Haz clic en **"+"** para crear un nuevo sitio
4. Completa el formulario:
   - **Etiqueta**: SINTIA Ecosystem
   - **Tipo de reCAPTCHA**: reCAPTCHA v3
   - **Dominios**: 
     - `sintia.co`
     - `www.sintia.co`
     - `localhost` (para desarrollo local)
   - Acepta los términos
   - Haz clic en **Enviar**

### Paso 2: Copiar las Claves

Después de crear el sitio, verás:
- **Site Key** (Clave del sitio) - Pública, va en el frontend
- **Secret Key** (Clave secreta) - Privada, va en el backend

### Paso 3: Configurar en el Proyecto

Edita el archivo `.env` y agrega las claves:

```env
RECAPTCHA_SITE_KEY=tu-site-key-aqui
RECAPTCHA_SECRET_KEY=tu-secret-key-aqui
```

**Ejemplo:**
```env
RECAPTCHA_SITE_KEY=6LcXXXXXXXXXXXXX-XXXXXXXXXXXXX
RECAPTCHA_SECRET_KEY=6LcXXXXXXXXXXXXX-XXXXXXXXXXXXX
```

## ✅ Verificación

1. Recarga la página de contacto
2. Abre la consola del navegador (F12)
3. Deberías ver que reCAPTCHA se carga correctamente
4. Al enviar el formulario, se genera un token automáticamente

## 🔧 Funcionamiento

### reCAPTCHA v3 (Opcional pero Recomendado)
- **Invisible** - No interrumpe la experiencia del usuario
- Se ejecuta automáticamente al enviar el formulario
- Genera un score (0.0 a 1.0) - Mínimo aceptado: 0.5
- Si no está configurado, el formulario funciona igual (con otras protecciones)

### Honeypot (Siempre Activo)
- Campo oculto llamado `website`
- Los bots suelen llenarlo automáticamente
- Si está lleno, se rechaza el envío

### Validación de Tiempo (Siempre Activa)
- Requiere mínimo 3 segundos desde que se carga el formulario
- Evita envíos instantáneos de bots automatizados

## 🆘 Solución de Problemas

**Error: "Token de reCAPTCHA no proporcionado"**
- reCAPTCHA no está configurado o no se cargó
- Verifica que las claves estén en `.env`
- Verifica la consola del navegador por errores

**Error: "Score de reCAPTCHA muy bajo"**
- El usuario puede ser sospechoso
- Puedes ajustar el score mínimo en `includes/recaptcha.php` (línea ~8)
- Score recomendado: 0.5 (balance entre seguridad y UX)

**reCAPTCHA no se carga**
- Verifica que `RECAPTCHA_SITE_KEY` esté configurado en `.env`
- Verifica que el dominio esté registrado en Google reCAPTCHA
- Verifica la consola del navegador por errores de CORS o CSP

## 📊 Niveles de Protección

### Sin reCAPTCHA (Solo Honeypot + Tiempo)
- ✅ Protección básica contra bots simples
- ✅ Funciona sin configuración adicional
- ⚠️ Puede ser vulnerable a bots avanzados

### Con reCAPTCHA v3 (Recomendado)
- ✅ Protección avanzada contra bots
- ✅ Validación invisible (mejor UX)
- ✅ Score de confianza de Google
- ✅ Requiere configuración de claves

## 🔒 Seguridad

- Las claves de reCAPTCHA están en `.env` (no se suben a Git)
- El honeypot está oculto con CSS y `tabindex="-1"`
- La validación de tiempo previene envíos automatizados
- Todas las validaciones se hacen en el servidor (backend)

## 📝 Notas

- reCAPTCHA v3 es **gratuito** hasta 1 millón de solicitudes/mes
- No requiere interacción del usuario (invisible)
- Funciona mejor con más tráfico (aprende patrones)
- Puedes ver estadísticas en: https://www.google.com/recaptcha/admin
