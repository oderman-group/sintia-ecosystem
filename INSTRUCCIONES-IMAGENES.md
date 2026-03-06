# Instrucciones para Agregar Imágenes

## 📸 Imágenes Requeridas

Para que el sitio web funcione correctamente, necesitas copiar las siguientes imágenes a la carpeta `img/`:

### 1. Logo Principal
- **Archivo original**: `sintia-logo-2023.png` (desde tu carpeta Descargas)
- **Destino**: `img/logo.png`
- **Uso**: Logo en el header del sitio

### 2. Favicon
- **Archivo original**: `logo-sintia-app.png` (desde tu carpeta Descargas)
- **Destino**: `img/favicon.png`
- **Uso**: Icono del sitio en la pestaña del navegador

## 🔧 Métodos para Copiar las Imágenes

### Método 1: Usando el Script Automático
1. Asegúrate de que las imágenes estén en tu carpeta `Descargas`
2. Ejecuta el archivo `copiar-imagenes.bat` haciendo doble clic
3. El script intentará copiar las imágenes automáticamente

### Método 2: Copia Manual
1. Abre la carpeta `img/` del proyecto
2. Copia `sintia-logo-2023.png` desde Descargas y renómbralo a `logo.png`
3. Copia `logo-sintia-app.png` desde Descargas y renómbralo a `favicon.png`

### Método 3: Desde el Explorador de Archivos
1. Navega a tu carpeta de Descargas
2. Selecciona `sintia-logo-2023.png`
3. Cópialo (Ctrl+C)
4. Navega a `C:\xampp\htdocs\sintia-ecoystem\img\`
5. Pégalo (Ctrl+V) y renómbralo a `logo.png`
6. Repite el proceso con `logo-sintia-app.png` → `favicon.png`

## ✅ Verificación

Después de copiar las imágenes, verifica que existan:
- `img/logo.png`
- `img/favicon.png`

Si las imágenes están en otra ubicación, simplemente cópialas manualmente a la carpeta `img/` con los nombres indicados.

## 📝 Notas

- El logo se mostrará automáticamente en el header cuando el archivo exista
- El favicon aparecerá en la pestaña del navegador
- Si las imágenes no existen, el sitio mostrará el texto "SINTIA" como fallback
