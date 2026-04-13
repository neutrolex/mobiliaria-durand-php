<?php // [migrado desde: web/templates/web/components/_servicios.html] ?>
<!-- ==================== SERVICIOS ==================== -->
<section class="servicios-section" id="servicios">
    <div class="servicios-header reveal">
        <div class="servicios-header-left">
            <span class="tag">SERVICIOS</span>
            <h2>Soluciones<br><em>en madera y metal</em></h2>
        </div>
        <div class="servicios-header-right">
            <p>Confeccionamos un rango completo de mobiliario diseñado para distintos sectores, priorizando resistencia
                y adecuación ergonómica.</p>
        </div>
    </div>

    <div class="servicios-grid">
        <!-- Servicio 1 -->
        <div class="servicio-card reveal reveal-delay-1">
            <!-- Equivalente a: {% static 'web/img/...' %} -->
            <img src="<?= staticUrl('img/media__1774714574166.jpg') ?>" alt="Equipamiento Corporativo" class="srv-img">
            <div class="srv-content">
                <div class="srv-title-row">
                    <div class="srv-icon"><svg viewBox="0 0 24 24">
                            <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z" />
                        </svg></div>
                    <h3>Mobiliario Corporativo</h3>
                </div>
                <p class="srv-desc">Estaciones de trabajo, escritorios modulares y salas de reuniones a la medida de tu
                    oficina y marca.</p>
                <ul class="srv-list">
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Escritorios gerenciales</li>
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Mesas de directorio</li>
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Estaciones modulares</li>
                </ul>
            </div>
        </div>

        <!-- Servicio 2 -->
        <div class="servicio-card reveal reveal-delay-2">
            <img src="<?= staticUrl('img/media__1774714550072.jpg') ?>" alt="Asientos y Restaurantes" class="srv-img">
            <div class="srv-content">
                <div class="srv-title-row">
                    <div class="srv-icon"><svg viewBox="0 0 24 24">
                            <path
                                d="M12.65 10C11.83 7.67 9.61 6 7 6c-3.31 0-6 2.69-6 6s2.69 6 6 6c2.61 0 4.83-1.67 5.65-4H17v4h4v-4h2v-4H12.65zM7 14c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" />
                        </svg></div>
                    <h3>Muebles Comerciales</h3>
                </div>
                <p class="srv-desc">Manufactura en serie de bancos, taburetes, mesas y dotación para restaurantes,
                    cafeterías o negocios.</p>
                <ul class="srv-list">
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Bancos metálicos/madera</li>
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Mesas de comedor</li>
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Implementación comercial</li>
                </ul>
            </div>
        </div>

        <!-- Servicio 3 -->
        <div class="servicio-card reveal reveal-delay-3">
            <img src="<?= staticUrl('img/media__1774714564719.jpg') ?>" alt="Estantería" class="srv-img">
            <div class="srv-content">
                <div class="srv-title-row">
                    <div class="srv-icon"><svg viewBox="0 0 24 24">
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z" />
                        </svg></div>
                    <h3>Estantería y Almacenaje</h3>
                </div>
                <p class="srv-desc">Soluciones y estantes metálicos robustos o acabados en melamina diseñados para
                    resistir pesos elevados.</p>
                <ul class="srv-list">
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Estantes ranurados</li>
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Almacén pesado</li>
                    <li><svg viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg> Libreros y archivadores</li>
                </ul>
            </div>
        </div>
    </div>
</section>
