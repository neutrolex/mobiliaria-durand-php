<?php
// [implementación custom: Funciones de utilidad global del proyecto PHP]
// Estas funciones reemplazan las utilidades de Django (shortcuts, auth, CSRF, correo)

require_once __DIR__ . '/../config.php';

// =======================================================
// CSRF TOKEN — Equivalente a {% csrf_token %} de Django
// =======================================================

/**
 * Genera y almacena un token CSRF en sesión
 * [implementación custom: reemplaza CsrfViewMiddleware de Django]
 */
function generarCsrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verifica el token CSRF en peticiones POST
 * [implementación custom: reemplaza verificación automática de Django]
 */
function verificarCsrf(): void
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['csrf_token'] ?? '';
        if (empty($token) || $token !== ($_SESSION['csrf_token'] ?? '')) {
            http_response_code(403);
            die('Error CSRF: token inválido o ausente.');
        }
    }
}

/**
 * Imprime el campo oculto HTML con el token CSRF
 * Equivalente a: {% csrf_token %} en templates Django
 */
function csrfField(): string
{
    $token = generarCsrfToken();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}

// =======================================================
// RENDER — Equivalente a render(request, 'template', context)
// =======================================================

/**
 * Carga una vista PHP e inyecta las variables de contexto
 * Equivalente a: render(request, 'template.html', context)
 *
 * @param string $vista   Ruta relativa de la vista (ej: 'web/index')
 * @param array  $context Variables a extraer en la vista
 */
function renderVista(string $vista, array $context = []): void
{
    // Extraer variables del contexto como en Django
    extract($context);

    $rutaVista = BASE_PATH . '/views/' . $vista . '.php';

    if (!file_exists($rutaVista)) {
        http_response_code(404);
        die("Vista no encontrada: {$rutaVista}");
    }

    include $rutaVista;
}

// =======================================================
// REDIRECT — Equivalente a redirect() de Django
// =======================================================

/**
 * Redirige a una URL dada
 * Equivalente a: redirect('url') en Django
 */
function redirigir(string $url): void
{
    header("Location: {$url}");
    exit;
}

// =======================================================
// URL HELPER — Equivalente a {% url 'name' %} de Django
// =======================================================

/**
 * Retorna la URL correspondiente a un nombre de ruta
 * Equivalente a: {% url 'nombre' %} en templates Django
 */
function url(string $nombre, string $parametro = ''): string
{
    // Mapa de rutas registradas — equivalente a urlpatterns de Django
    $rutas = [
        'home'     => BASE_URL . '/',
        'contacto' => BASE_URL . '/contacto/',
    ];

    if (!isset($rutas[$nombre])) {
        return '#'; // Ruta no encontrada
    }

    $ruta = $rutas[$nombre];
    if ($parametro) {
        $ruta .= '/' . ltrim($parametro, '/');
    }

    return $ruta;
}

// =======================================================
// STATIC URL — Equivalente a {% static 'ruta' %} de Django
// =======================================================

/**
 * Retorna la URL de un archivo estático con control de versiones (cache busting)
 * [implementación custom: añade ?v=timestamp para refrescar cache en navegadores]
 */
function staticUrl(string $ruta): string
{
    $fullPath = BASE_PATH . '/public/' . ltrim($ruta, '/');
    $version = file_exists($fullPath) ? filemtime($fullPath) : '1.0';
    return STATIC_URL . '/' . ltrim($ruta, '/') . '?v=' . $version;
}

// =======================================================
// CORREO — Equivalente a send_mail() de Django
// =======================================================

/**
 * Envía un correo por SMTP usando PHPMailer (Gmail compatible)
 */
function enviarCorreo(string $asunto, string $cuerpo, string $destinatario): void
{
    require_once __DIR__ . '/../PHPMailer/PHPMailer/src/Exception.php';
    require_once __DIR__ . '/../PHPMailer/PHPMailer/src/PHPMailer.php';
    require_once __DIR__ . '/../PHPMailer/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = EMAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = EMAIL_HOST_USER;
        $mail->Password   = EMAIL_HOST_PASSWORD;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = EMAIL_PORT;
        $mail->CharSet    = 'UTF-8';

        // Destinatarios
        $mail->setFrom(EMAIL_HOST_USER, 'Mobiliaria Durand');
        $mail->addAddress($destinatario);
        $mail->addReplyTo(EMAIL_HOST_USER, 'Información');

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = nl2br($cuerpo); // Convertir saltos de línea a <br>
        $mail->AltBody = $cuerpo;

        $mail->send();
    } catch (PHPMailer\PHPMailer\Exception $e) {
        throw new \RuntimeException("Error al enviar el correo: {$mail->ErrorInfo}");
    }
}


// =======================================================
// SANITIZACIÓN DE ENTRADAS
// =======================================================

/**
 * Sanitiza una cadena de texto del usuario
 * Equivalente a la validación implícita de Django para campos CharField
 */
function sanitizar(string $valor): string
{
    return htmlspecialchars(strip_tags(trim($valor)), ENT_QUOTES, 'UTF-8');
}

/**
 * Valida que un email tenga formato correcto
 * Equivalente a EmailField de Django
 */
function esEmailValido(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
