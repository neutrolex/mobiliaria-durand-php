<?php
// [migrado desde: settings/urls.py + web/urls.py]
// Enrutador principal — equivalente a urlpatterns de Django
//
// Django urlpatterns:
//   path('', views.home, name='home')
//   path('contacto/', views.contacto, name='contacto')
//   path('admin/', admin.site.urls)

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/helpers/funciones.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/ContactoController.php';

// Obtener la ruta solicitada, quitando el prefijo BASE_URL y el nombre del script
$requestUri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$scriptName  = $_SERVER['SCRIPT_NAME'];
$scriptBase  = str_replace('/index.php', '', $scriptName);

// Limpiar la ruta para obtener solo la parte de la aplicación
$rutaActual  = str_replace($scriptBase, '', $requestUri);
// Eliminar 'index.php' si aparece explícitamente en la URL
$rutaActual  = str_replace('/index.php', '', $rutaActual);

// Asegurar que comience con barra y no tenga barra al final (normalización)
$rutaActual = '/' . ltrim($rutaActual, '/');
$rutaNormalizada = rtrim($rutaActual, '/') . '/';
if ($rutaNormalizada === '//') $rutaNormalizada = '/';
if ($rutaNormalizada === '') $rutaNormalizada = '/';

// ===================== TABLA DE RUTAS =====================
// Equivalente a urlpatterns de Django
$rutas = [
    '/'          => 'home',
    '/contacto/' => 'contacto',
];

// Resolver la ruta
$accion = $rutas[$rutaNormalizada] ?? null;

if ($accion === null) {
    // Equivalente a: Http404 en Django
    http_response_code(404);
    renderVista('404');
    exit;
}

// Ejecutar el controlador correspondiente
switch ($accion) {
    case 'home':
        home();
        break;

    case 'contacto':
        contacto();
        break;

    default:
        http_response_code(404);
        renderVista('404');
        break;
}
