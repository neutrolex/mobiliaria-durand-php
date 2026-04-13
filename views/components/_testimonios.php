<!-- [migrado desde: web/templates/web/components/_testimonios.html] -->
<!-- ==================== TESTIMONIOS ==================== -->
<!-- [implementación custom: Django usaba {% for t in testimonios %} con modelo DB; -->
<!-- en PHP se mantienen los datos de muestra del bloque {% empty %} del original] -->
<section class="testimonios-section">
    <div class="section-header reveal">
        <span class="section-tag">Testimonios</span>
        <h2>Lo que dicen<br><em>nuestros clientes</em></h2>
        <div class="section-divider"></div>
    </div>
    <div class="testimonios-grid">
        <?php
        // Equivalente al bloque {% empty %} de Django (datos de muestra estáticos)
        // Si en el futuro se agrega un modelo Testimonio, se reemplaza por consulta a BD
        $testimonios = [
            [
                'avatar'     => 'M',
                'nombre'     => 'María Fernández',
                'cargo'      => 'Gerente Administrativa',
                'comentario' => 'Renovaron por completo nuestra sala de reuniones con una mesa central impecable. Cumplieron exactamente con la fecha prometida de entrega.',
            ],
            [
                'avatar'     => 'C',
                'nombre'     => 'Carlos Mendoza',
                'cargo'      => 'Jefe de Operaciones',
                'comentario' => 'Necesitábamos estanterías metálicas de alta resistencia para almacén. El nivel de acabados y solidez final superó nuestras expectativas ampliamente.',
            ],
            [
                'avatar'     => 'A',
                'nombre'     => 'Ana Villanueva',
                'cargo'      => 'Propietaria Residente',
                'comentario' => 'Diseñaron el mobiliario de mi nuevo departamento a medida. Los módulos de la cocina en melamina brillante quedaron espectaculares.',
            ],
        ];

        // Equivalente a: {% for t in testimonios %} de Django
        foreach ($testimonios as $i => $t):
            $delay = $i + 1;
        ?>
        <div class="testimonio-card reveal reveal-delay-<?= $delay ?>">
            <div class="stars">★★★★★</div>
            <div class="testimonio-quote">"</div>
            <!-- Equivalente a: {{ t.comentario }} -->
            <p class="testimonio-text"><?= htmlspecialchars($t['comentario']) ?></p>
            <div class="testimonio-author">
                <!-- Equivalente a: {{ t.nombre|first }} -->
                <div class="testimonio-avatar"><?= htmlspecialchars(substr($t['nombre'], 0, 1)) ?></div>
                <div>
                    <!-- Equivalente a: {{ t.nombre }} y {{ t.cargo }} -->
                    <h4><?= htmlspecialchars($t['nombre']) ?></h4>
                    <span><?= htmlspecialchars($t['cargo']) ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
