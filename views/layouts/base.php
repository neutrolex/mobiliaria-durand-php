<?php
// [migrado desde: web/templates/web/base.html]
// Layout base — equivalente a {% extends 'web/base.html' %} + {% block %} de Django
// Se usa ob_start() / ob_get_clean() para implementar el sistema de bloques
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Equivalente a: {% block title %}Mobiliaria Durand{% endblock %} -->
    <title><?= htmlspecialchars($titulo ?? 'Mobiliaria Durand') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">
    <!-- Equivalente a: {% static 'web/css/style.css' %} -->
    <link rel="stylesheet" href="<?= staticUrl('css/style.css') ?>">
    <!-- Equivalente a: {% block extra_css %}{% endblock %} -->
    <?php if (!empty($extra_css)) echo $extra_css; ?>
</head>

<body>

    <!-- NAV -->
    <nav class="nav" id="mainNav">
        <!-- Equivalente a: {% url 'home' %} -->
        <a href="<?= url('home') ?>" class="nav-logo">
            <div class="nav-logo-box">
                <span class="main">MOBILIARIA DURAND S.A.C</span>
            </div>
        </a>
        <ul class="nav-links">
            <!-- Mobile Menu Header -->
            <div class="nav-mobile-header">
                <span class="logo-text">Mobiliaria Durand</span>
                <p>Equipamiento de alta calidad</p>
            </div>

            <li><a href="<?= url('home') ?>">Inicio</a></li>
            <li><a href="<?= url('home') ?>#nosotros">Nosotros</a></li>
            <li><a href="<?= url('home') ?>#servicios">Servicios</a></li>
            <li><a href="<?= url('contacto') ?>" class="btn-nav">📞 Contáctanos</a></li>

            <!-- Mobile Menu Footer -->
            <div class="nav-mobile-footer">
                <p>📍 Lima, Perú</p>
                <div class="nav-mobile-social">
                    <a href="https://www.facebook.com/MOBILIARIADURAND">Facebook</a>
                </div>
            </div>
        </ul>
        <div class="nav-hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <!-- Equivalente a: {% block content %}{% endblock %} -->
    <?= $content ?? '' ?>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <span class="logo">Mobiliaria Durand</span>
                <p>Empresa peruana dedicada a la fabricación de muebles. Calidad, diseño a medida y
                    durabilidad para equipar tus espacios corporativos o de hogar.</p>
            </div>
            <div class="footer-col">
                <h4>Navegación</h4>
                <a href="<?= url('home') ?>">Inicio</a>
                <a href="<?= url('home') ?>#nosotros">Nosotros</a>
                <a href="<?= url('home') ?>#servicios">Servicios</a>
            </div>
            <div class="footer-col">
                <h4>Servicios</h4>
                <a href="#">Compra y Venta</a>
                <a href="#">Alquiler</a>
                <a href="#">Asesoría Legal</a>
                <a href="#">Tasaciones</a>
            </div>
            <div class="footer-col">
                <h4>Contacto</h4>
                <a href="tel:+51996717836">📞 +51 996 717 836</a>
                <a href="mailto:mobiliariadurand@hotmail.com">✉️ mobiliariadurand@hotmail.com</a>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2026 Mobiliaria Durand SAC. Todos los derechos reservados.</span>
            <div class="social-links">
                <a href="https://www.facebook.com/MOBILIARIADURAND" class="social-link">Facebook</a>
            </div>
        </div>
    </footer>

    <script>
        // Nav scroll effect — Efecto de scroll en la navegación
        const nav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 60);
        });

        // Mobile menu toggle — Lógica del menú móvil (hamburguesa)
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            nav.classList.toggle('mobile-active');
            navLinks.classList.toggle('active');
        });

        // Close menu when clicking a link — Cerrar menú al hacer clic en un enlace
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('mobile-active');
                navLinks.classList.remove('active');
            });
        });

        // Scroll reveal — Animaciones al hacer scroll
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.12 });
        reveals.forEach(el => observer.observe(el));
    </script>

    <!-- Equivalente a: {% block extra_js %}{% endblock %} -->
    <?php if (!empty($extra_js)) echo $extra_js; ?>
</body>

</html>
