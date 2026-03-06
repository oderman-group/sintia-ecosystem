/**
 * Sistema de cambio de idioma
 * Detecta y aplica traducciones automáticamente
 */

(function() {
    'use strict';
    
    // Detectar idioma preferido
    function detectLanguage() {
        // 1. Verificar parámetro URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('lang') === 'en') {
            return 'en';
        }
        
        // 2. Verificar localStorage
        const savedLang = localStorage.getItem('sintia_lang');
        if (savedLang === 'en' || savedLang === 'es') {
            return savedLang;
        }
        
        // 3. Detectar idioma del navegador
        const browserLang = navigator.language || navigator.userLanguage;
        if (browserLang.startsWith('en')) {
            return 'en';
        }
        
        // 4. Default: español
        return 'es';
    }
    
    // Aplicar traducciones
    function applyTranslations(lang) {
        if (!translations || !translations[lang]) {
            return;
        }
        
        const t = translations[lang];
        
        // Actualizar atributo lang del HTML
        document.documentElement.lang = lang;
        
        // Traducir elementos con data-i18n
        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.getAttribute('data-i18n');
            const keys = key.split('.');
            let value = t;
            
            for (const k of keys) {
                if (value && typeof value === 'object' && k in value) {
                    value = value[k];
                } else {
                    value = null;
                    break;
                }
            }
            
            if (value !== null) {
                if (element.tagName === 'INPUT' && element.type === 'submit') {
                    element.value = value;
                } else if (element.hasAttribute('placeholder')) {
                    element.placeholder = value;
                } else {
                    element.textContent = value;
                }
            }
        });
        
        // Traducir placeholders con data-i18n-placeholder
        document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
            const key = element.getAttribute('data-i18n-placeholder');
            const keys = key.split('.');
            let value = t;
            
            for (const k of keys) {
                if (value && typeof value === 'object' && k in value) {
                    value = value[k];
                } else {
                    value = null;
                    break;
                }
            }
            
            if (value !== null) {
                element.placeholder = value;
            }
        });
        
        // Actualizar selector de idioma
        const langSelector = document.getElementById('language-selector');
        if (langSelector) {
            langSelector.value = lang;
        }
    }
    
    // Guardar preferencia de idioma
    function saveLanguage(lang) {
        localStorage.setItem('sintia_lang', lang);
        // También guardar en cookie para PHP
        document.cookie = `lang=${lang}; path=/; max-age=31536000`; // 1 año
    }
    
    // Cambiar idioma
    function changeLanguage(newLang) {
        saveLanguage(newLang);
        applyTranslations(newLang);
        
        // Actualizar URL sin recargar (opcional)
        const url = new URL(window.location);
        url.searchParams.set('lang', newLang);
        window.history.replaceState({}, '', url);
    }
    
    // Inicializar al cargar
    document.addEventListener('DOMContentLoaded', function() {
        const currentLang = detectLanguage();
        applyTranslations(currentLang);
        
        // Event listener para selector de idioma
        const langSelector = document.getElementById('language-selector');
        if (langSelector) {
            langSelector.addEventListener('change', function() {
                changeLanguage(this.value);
            });
        }
    });
    
    // Exponer función globalmente
    window.changeLanguage = changeLanguage;
})();
