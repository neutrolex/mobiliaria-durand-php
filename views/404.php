<?php
// Vista 404 — equivalente a Http404 de Django
$titulo = '404 — Página no encontrada';
ob_start();
?>
<section style="min-height:70vh;display:flex;align-items:center;justify-content:center;text-align:center;padding:4rem 2rem;">
    <div>
        <div style="font-size:6rem;margin-bottom:1rem;">🪵</div>
        <h1 style="font-family:'Cormorant Garamond',serif;font-size:3rem;margin-bottom:1rem;">Página no encontrada</h1>
        <p style="color:var(--text-muted);font-size:1.1rem;margin-bottom:2rem;">
            La ruta que buscas no existe en este sitio.
        </p>
        <a href="<?= url('home') ?>" class="btn-primary">Volver al inicio</a>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/base.php';
