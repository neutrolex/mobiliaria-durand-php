<?php
// [migrado desde: settings/settings.py]
// Configuración central de la aplicación Mobiliaria Durand

// ===================== MODO DEBUG =====================
// Cambiar a false al subir a InfinityFree para ocultar errores al usuario final
define('DEBUG', true);

// ===================== BASE DE DATOS =====================
/**
 * Para InfinityFree (MySQL):
 * DB_DRIVER: 'mysql'
 * DB_HOST: El host indicado en tu panel de InfinityFree (ej: sqlXXX.epizy.com)
 * DB_NAME: El nombre de la base de datos (ej: epiz_XXX_XXX_mobiliaria)
 * DB_USER: El usuario de la base de datos (ej: epiz_XXXXXXXX)
 * DB_PASS: Tu contraseña de InfinityFree
 */
define('DB_DRIVER', 'mysql'); // Cambiado de 'sqlite' a 'mysql' para InfinityFree
define('DB_HOST', 'sql100.infinityfree.com'); // InfinityFree te dará uno, usualmente algo como sqlXXX.epizy.com
define('DB_NAME', 'if0_41606005_mobiliaria');
define('DB_USER', 'if0_41606005');
define('DB_PASS', 'MEXZKQUGNQ8i');

define('DB_PATH', __DIR__ . '/database/db.sqlite3'); // Se mantiene por si quieres volver a SQLite localmente

// ===================== SEGURIDAD =====================
// Clave secreta para generación de tokens CSRF
define('SECRET_KEY', 'php-mobiliaria-durand-2026-secret-key-cambiar-en-produccion');

// ===================== ZONA HORARIA =====================
date_default_timezone_set('America/Lima');

// ===================== RUTAS BASE =====================
define('BASE_PATH', __DIR__);
define('BASE_URL', '');    // Vacío para hosting en la raíz del dominio

// ===================== ARCHIVOS ESTÁTICOS =====================
define('STATIC_URL', BASE_URL . '/public');
define('UPLOADS_PATH', __DIR__ . '/uploads');
define('UPLOADS_URL', BASE_URL . '/uploads');

// ===================== CONFIGURACIÓN DE CORREO (SMTP - GMAIL) =====================
// [IMPORTANTE]: Gmail requiere "Contraseñas de Aplicación" si tienes 2FA activado
define('EMAIL_HOST', 'smtp.gmail.com');
define('EMAIL_PORT', 587);
define('EMAIL_USE_TLS', true);
define('EMAIL_HOST_USER', '60861853campos@gmail.com');
define('EMAIL_HOST_PASSWORD', 'uoop vymj cwoy duii'); // Asegúrate de que esta sea una App Password
define('DEFAULT_FROM_EMAIL', EMAIL_HOST_USER);
define('EMAIL_RECIPIENT', '60861853campos@gmail.com'); // Correo receptor de los contactos

// ===================== INICIALIZACIÓN DE SESIÓN =====================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ===================== MANEJO DE ERRORES =====================
if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}
