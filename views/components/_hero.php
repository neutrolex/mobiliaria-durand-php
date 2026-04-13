<?php // [migrado desde: web/templates/web/components/_hero.html] ?>
<!-- ==================== HERO ==================== -->
<section class="hero">
    <!-- Equivalente a: {% static 'web/img/media__...' %} -->
    <div class="hero-bg"
        style="background-image: url(<?= staticUrl('img/media__1774714532609.png') ?>); background-size: cover; background-position: center;">
    </div>
    <div class="hero-content">
        <span class="hero-location-badge">📍 Lima, Perú — Tu ambiente, hecho realidad</span>
        <h1>Diseño y <em>fabricación</em><br>de muebles en melamina.</h1>
        <p class="hero-desc">En Mobiliaria Durand SAC te acompañamos en cada proyecto desarrollando equipamiento de
            oficina, hogar y comercial a la medida. Calidad, diseño y durabilidad garantizadas.</p>
        <!-- Equivalente a: {% url 'contacto' %} -->
        <a href="<?= url('contacto') ?>" class="btn-primary">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" style="margin-right:8px;">
                <path
                    d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z" />
            </svg>
            Contáctanos
        </a>
    </div>
    <div class="hero-scroll">DESCUBRIR MÁS</div>

    <!-- Stats Bar -->
    <div class="hero-stats">
        <div class="stat-item">
            <div class="stat-num">10+</div>
            <div class="stat-label">Años de experiencia</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">150+</div>
            <div class="stat-label">Proyectos ejecutados</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">300+</div>
            <div class="stat-label">Muebles entregados</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">100%</div>
            <div class="stat-label">Puntualidad de entrega</div>
        </div>
    </div>
</section>
