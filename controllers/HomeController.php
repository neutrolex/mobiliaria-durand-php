<?php
// [migrado desde: web/views.py — función home()]
// Controlador de la página principal (Landing Page)

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../helpers/funciones.php';

/**
 * Equivalente a la vista home() de Django:
 *   def home(request):
 *       return render(request, 'web/index.html')
 */
function home(): void
{
    // Renderizar la vista principal sin contexto adicional
    renderVista('web/index');
}
