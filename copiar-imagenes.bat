@echo off
REM Script para copiar imágenes de logo y favicon al proyecto
REM Coloca este archivo en la carpeta del proyecto y ejecútalo

echo Copiando imágenes de logo y favicon...
echo.

REM Intentar copiar desde diferentes ubicaciones comunes
if exist "%USERPROFILE%\Downloads\sintia-logo-2023.png" (
    copy "%USERPROFILE%\Downloads\sintia-logo-2023.png" "img\logo.png"
    echo Logo copiado exitosamente.
) else if exist "C:\Users\%USERNAME%\Downloads\sintia-logo-2023.png" (
    copy "C:\Users\%USERNAME%\Downloads\sintia-logo-2023.png" "img\logo.png"
    echo Logo copiado exitosamente.
) else (
    echo No se encontro sintia-logo-2023.png en Descargas.
    echo Por favor, copia manualmente el archivo a img\logo.png
)

if exist "%USERPROFILE%\Downloads\logo-sintia-app.png" (
    copy "%USERPROFILE%\Downloads\logo-sintia-app.png" "img\favicon.png"
    echo Favicon copiado exitosamente.
) else if exist "C:\Users\%USERNAME%\Downloads\logo-sintia-app.png" (
    copy "C:\Users\%USERNAME%\Downloads\logo-sintia-app.png" "img\favicon.png"
    echo Favicon copiado exitosamente.
) else (
    echo No se encontro logo-sintia-app.png en Descargas.
    echo Por favor, copia manualmente el archivo a img\favicon.png
)

echo.
echo Proceso completado.
pause
