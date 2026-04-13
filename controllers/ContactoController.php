<?php
// [migrado desde: web/views.py — función contacto()]
// Controlador del formulario de contacto

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../helpers/funciones.php';
require_once __DIR__ . '/../models/Contacto.php';

/**
 * Equivalente a la vista contacto() de Django:
 *
 *   def contacto(request):
 *       if request.method == 'POST':
 *           ...guardar y enviar correo...
 *           return render(request, 'web/contacto.html', {'mensaje_enviado': True})
 *       return render(request, 'web/contacto.html')
 */
function contacto(): void
{
    // Contexto de la vista — equivalente al dict de context en Django
    $contexto = [
        'mensaje_enviado' => false,
        'error_correo'    => null,
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar token CSRF — equivalente a CsrfViewMiddleware
        verificarCsrf();

        // Equivalente a: request.POST.get('campo')
        $nombre   = sanitizar($_POST['nombre'] ?? '');
        $email    = sanitizar($_POST['email'] ?? '');
        $telefono = sanitizar($_POST['telefono'] ?? '');
        $servicio = sanitizar($_POST['servicio'] ?? 'No especificado');
        $mensaje  = sanitizar($_POST['mensaje'] ?? '');

        // Validaciones básicas — equivalente a los validadores de Django
        if (empty($nombre) || empty($email) || empty($mensaje)) {
            $contexto['error_formulario'] = 'Por favor completa todos los campos obligatorios.';
            renderVista('web/contacto', $contexto);
            return;
        }

        if (!esEmailValido($email)) {
            $contexto['error_formulario'] = 'El correo electrónico ingresado no es válido.';
            renderVista('web/contacto', $contexto);
            return;
        }

        // 1. Guardar en Base de Datos
        // Equivalente a: Contacto.objects.create(nombre=nombre, ...)
        Contacto::create([
            'nombre'   => $nombre,
            'email'    => $email,
            'telefono' => $telefono,
            'servicio' => $servicio,
            'mensaje'  => $mensaje,
        ]);

        // 2. Enviar correo
        // Equivalente a: send_mail(subject=asunto, message=cuerpo, ...)
        try {
            $asunto = "Nuevo prospecto web: {$nombre}";
            $cuerpo = "Has recibido un nuevo mensaje de contacto web.\n\n"
                    . "Nombre: {$nombre}\n"
                    . "Correo: {$email}\n"
                    . "Teléfono: {$telefono}\n"
                    . "Servicio de interés: {$servicio}\n\n"
                    . "Mensaje:\n{$mensaje}";

            enviarCorreo($asunto, $cuerpo, EMAIL_RECIPIENT);

            // Equivalente a: return render(request, 'web/contacto.html', {'mensaje_enviado': True})
            $contexto['mensaje_enviado'] = true;
        } catch (\Exception $e) {
            // Equivalente a: except Exception as e: print("Error SMTP:", e)
            error_log("Error al enviar correo SMTP: " . $e->getMessage());
            // El mensaje fue guardado en BD aunque el correo falló
            $contexto['mensaje_enviado'] = true;
            $contexto['error_correo']    = $e->getMessage();
        }
    }

    // GET o POST completado — renderizar la vista
    renderVista('web/contacto', $contexto);
}
