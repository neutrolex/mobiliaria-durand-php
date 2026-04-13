<?php
// [migrado desde: web/templates/web/index.html]
// Vista de la página principal — equivalente a {% extends 'web/base.html' %} + {% include %}

// Variables para el layout base
$titulo = 'Mobiliaria Durand';

// Capturar el contenido (equivalente a {% block content %})
ob_start();
?>

<?php include __DIR__ . '/../components/_hero.php'; ?>
<?php include __DIR__ . '/../components/_categorias.php'; ?>
<?php include __DIR__ . '/../components/_servicios.php'; ?>
<?php include __DIR__ . '/../components/_galeria.php'; ?>
<?php include __DIR__ . '/../components/_inspiracion.php'; ?>
<?php include __DIR__ . '/../components/_nosotros.php'; ?>
<?php include __DIR__ . '/../components/_valores.php'; ?>
<?php include __DIR__ . '/../components/_proceso.php'; ?>
<?php include __DIR__ . '/../components/_testimonios.php'; ?>
<?php include __DIR__ . '/../components/_cta.php'; ?>

<?php
// Inyectar el contenido en el layout base
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
