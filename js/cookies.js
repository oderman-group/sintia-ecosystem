/**
 * Sistema de gestión de cookies
 * Banner de consentimiento y panel de configuración
 */

(function() {
    'use strict';
    
    const COOKIE_CONSENT_KEY = 'sintia_cookie_consent';
    const COOKIE_PREFERENCES_KEY = 'sintia_cookie_preferences';
    
    // Obtener preferencias guardadas
    function getPreferences() {
        const saved = localStorage.getItem(COOKIE_PREFERENCES_KEY);
        if (saved) {
            try {
                return JSON.parse(saved);
            } catch (e) {
                return null;
            }
        }
        return null;
    }
    
    // Guardar preferencias
    function savePreferences(prefs) {
        localStorage.setItem(COOKIE_PREFERENCES_KEY, JSON.stringify(prefs));
        localStorage.setItem(COOKIE_CONSENT_KEY, 'true');
    }
    
    // Verificar si ya hay consentimiento
    function hasConsent() {
        return localStorage.getItem(COOKIE_CONSENT_KEY) === 'true';
    }
    
    // Mostrar banner de consentimiento
    function showConsentBanner() {
        const banner = document.getElementById('cookie-consent');
        if (banner && !hasConsent()) {
            banner.style.display = 'block';
        }
    }
    
    // Ocultar banner
    function hideConsentBanner() {
        const banner = document.getElementById('cookie-consent');
        if (banner) {
            banner.style.display = 'none';
        }
    }
    
    // Mostrar panel de configuración
    function showSettingsPanel() {
        const panel = document.getElementById('cookie-settings-panel');
        if (panel) {
            panel.style.display = 'block';
            hideConsentBanner();
        }
    }
    
    // Ocultar panel de configuración
    function hideSettingsPanel() {
        const panel = document.getElementById('cookie-settings-panel');
        if (panel) {
            panel.style.display = 'none';
        }
    }
    
    // Aceptar todas las cookies
    function acceptAll() {
        const prefs = {
            necessary: true,
            analytics: true,
            marketing: true
        };
        savePreferences(prefs);
        hideConsentBanner();
        initializeCookies(prefs);
    }
    
    // Rechazar todas (solo necesarias)
    function rejectAll() {
        const prefs = {
            necessary: true,
            analytics: false,
            marketing: false
        };
        savePreferences(prefs);
        hideConsentBanner();
        initializeCookies(prefs);
    }
    
    // Guardar preferencias personalizadas
    function saveCustomPreferences() {
        const prefs = {
            necessary: true, // Siempre activas
            analytics: document.getElementById('cookie-analytics')?.checked || false,
            marketing: document.getElementById('cookie-marketing')?.checked || false
        };
        savePreferences(prefs);
        hideSettingsPanel();
        initializeCookies(prefs);
    }
    
    // Inicializar cookies según preferencias
    function initializeCookies(prefs) {
        if (!prefs) {
            prefs = getPreferences() || { necessary: true, analytics: false, marketing: false };
        }
        
        // Cookies necesarias (siempre activas)
        if (prefs.necessary) {
            // Código para cookies necesarias
        }
        
        // Cookies analíticas
        if (prefs.analytics) {
            // Aquí se inicializaría Google Analytics u otras herramientas
            // Ejemplo: gtag('config', 'GA_MEASUREMENT_ID');
        }
        
        // Cookies de marketing
        if (prefs.marketing) {
            // Aquí se inicializarían herramientas de marketing
        }
    }
    
    // Cargar preferencias guardadas en el panel
    function loadPreferencesToPanel() {
        const prefs = getPreferences();
        if (prefs) {
            const analyticsCheck = document.getElementById('cookie-analytics');
            const marketingCheck = document.getElementById('cookie-marketing');
            if (analyticsCheck) analyticsCheck.checked = prefs.analytics || false;
            if (marketingCheck) marketingCheck.checked = prefs.marketing || false;
        }
    }
    
    // Inicializar al cargar
    document.addEventListener('DOMContentLoaded', function() {
        if (!hasConsent()) {
            showConsentBanner();
        } else {
            const prefs = getPreferences();
            initializeCookies(prefs);
        }
        
        // Event listeners
        const acceptBtn = document.getElementById('cookie-accept');
        const rejectBtn = document.getElementById('cookie-reject');
        const settingsBtn = document.getElementById('cookie-settings-btn');
        const saveBtn = document.getElementById('cookie-save');
        const settingsOpenBtn = document.querySelector('.cookie-settings-open');
        const settingsCloseBtn = document.getElementById('cookie-settings-close');
        
        if (acceptBtn) {
            acceptBtn.addEventListener('click', acceptAll);
        }
        
        if (rejectBtn) {
            rejectBtn.addEventListener('click', rejectAll);
        }
        
        if (settingsBtn) {
            settingsBtn.addEventListener('click', showSettingsPanel);
        }
        
        if (saveBtn) {
            saveBtn.addEventListener('click', saveCustomPreferences);
        }
        
        if (settingsOpenBtn) {
            settingsOpenBtn.addEventListener('click', function() {
                showSettingsPanel();
                loadPreferencesToPanel();
            });
        }
        
        if (settingsCloseBtn) {
            settingsCloseBtn.addEventListener('click', hideSettingsPanel);
        }
    });
    
    // Exponer funciones globalmente
    window.cookieConsent = {
        acceptAll,
        rejectAll,
        showSettings: showSettingsPanel,
        savePreferences: saveCustomPreferences
    };
})();
