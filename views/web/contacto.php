<?php
// [migrado desde: web/templates/web/contacto.html]
// Vista de contacto — equivalente a {% extends 'web/base.html' %}

$titulo = 'Contacto — Mobiliaria Durand';

ob_start();
?>

<!-- Hero Contacto -->
<section class="contacto-page-hero">
    <div class="hero-bg"
        style="background-image:
        linear-gradient(135deg, rgba(69, 60, 53,0.9) 0%, rgba(69, 60, 53,0.75) 100%),
        url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1600&q=80') center/cover; position: absolute; inset:0; z-index:-1;">
    </div>
    <div class="contacto-hero-content reveal">
        <span class="tag" style="justify-content:center; color:var(--bg-white)">Estamos para ti</span>
        <h1 style="font-size:4rem; color:var(--bg-white)"><em>Contáctanos</em></h1>
        <p style="opacity:0.9">Cotizaciones de mobiliario en menos de 24 horas hábiles.</p>
    </div>
</section>

<section class="contacto-section">
    <div class="contacto-wrapper">
        <div class="contacto-info reveal">
            <span class="tag">¡Información de contacto</span>
            <h2>Hablemos de<br><em>tu proyecto</em></h2>
            <p style="color:var(--text-muted); margin-bottom:2.5rem;">Ya sea para equipar tu nueva oficina, abastecer tu
                local comercial o diseñar el clóset de tu hogar, nuestro equipo te asiste en cada detalle del diseño de
                tu mueble.</p>

            <div class="contact-item">
                <div class="contact-icon">📍</div>
                <div>
                    <strong style="display:block;font-size:0.8rem;color:var(--primary);letter-spacing:1px;margin-bottom:0.2rem;">OFICINA
                        PRINCIPAL</strong>
                    <span>JR EL SOL MZ 10U LT 3 TABLADA VMT</span>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-icon">📞</div>
                <div>
                    <strong style="display:block;font-size:0.8rem;color:var(--primary);letter-spacing:1px;margin-bottom:0.2rem;">TELÉFONOS</strong>
                    <span>+51 996 717 836</span>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-icon">✉️</div>
                <div>
                    <strong style="display:block;font-size:0.8rem;color:var(--primary);letter-spacing:1px;margin-bottom:0.2rem;">CORREO</strong>
                    <span>mobiliariadurand@hotmail.com</span>
                </div>
            </div>

            <div style="margin-top:2rem;padding:1.5rem;background:var(--bg-white);border-radius:var(--radius-sm);box-shadow:var(--shadow-soft)">
                <p style="font-size:0.9rem;color:var(--text-muted);margin:0;">
                    💬 También puedes escribirnos por WhatsApp al <strong style="color:var(--text-main);">+51 996 717
                        836</strong> para enviarnos fotos o planos de donde quieres instalar tus muebles.
                </p>
            </div>
        </div>

        <div class="contacto-form reveal reveal-delay-2">
            <?php if (!empty($mensaje_enviado)): ?>
            <!-- Equivalente a: {% if mensaje_enviado %} -->
            <div style="text-align:center;padding:3rem 2rem;">
                <div style="font-size:4rem;margin-bottom:1rem;">✅</div>
                <h3 style="font-family:var(--font-heading);font-size:2rem;margin-bottom:1rem;">¡Mensaje enviado!</h3>
                <p style="color:var(--text-muted);">Uno de nuestros asesores se comunicará contigo en menos de 24 horas.
                </p>
                <!-- Equivalente a: {% url 'home' %} -->
                <a href="<?= url('home') ?>" class="btn-primary" style="margin-top:2rem;">Volver al inicio</a>
            </div>
            <?php else: ?>
            <!-- Equivalente a: {% else %} -->
            <h3 style="font-family:var(--font-heading);font-size:2rem;margin-bottom:0.5rem;">Envíanos un mensaje</h3>
            <p style="color:var(--text-muted);font-size:0.95rem;margin-bottom:2.5rem;">Todos los campos son
                obligatorios de rellenar.</p>

            <!-- Mostrar error de formulario si existe -->
            <?php if (!empty($error_formulario)): ?>
            <div style="background:#fee2e2;color:#991b1b;padding:1rem;border-radius:8px;margin-bottom:1.5rem;">
                <?= htmlspecialchars($error_formulario) ?>
            </div>
            <?php endif; ?>

            <!-- Equivalente a: <form method="POST"> con {% csrf_token %} -->
            <form method="POST" action="<?= url('contacto') ?>">
                <!-- Equivalente a: {% csrf_token %} -->
                <?= csrfField() ?>

                <div class="form-row">
                    <div class="form-group">
                        <label>Nombre *</label>
                        <input type="text" name="nombre" placeholder="Tu nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="tel" name="telefono" placeholder="+51 999 999 999">
                    </div>
                </div>
                <div class="form-group">
                    <label>Correo electrónico *</label>
                    <input type="email" name="email" placeholder="tu@correo.com" required>
                </div>
                <div class="form-group">
                    <label>¿Qué servicio buscas?</label>
                    <select name="servicio">
                        <option value="">Selecciona una opción</option>
                        <option>Equipamiento de oficina corporativa</option>
                        <option>Mobiliario comercial (Restaurantes, Tiendas)</option>
                        <option>Muebles para el hogar (Cocinas, Closets)</option>
                        <option>Estantería industrial / Almacenes</option>
                        <option>Diseño 3D a medida</option>
                        <option>Otro servicio de montaje / melamina</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mensaje *</label>
                    <textarea name="mensaje" placeholder="Cuéntanos qué buscas o en qué podemos ayudarte..."
                        required></textarea>
                </div>
                <button type="submit" class="btn-submit">Enviar consulta</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/base.php';
