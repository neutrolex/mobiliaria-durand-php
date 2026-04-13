<?php
// [implementación custom: Panel de administración básico]
// Equivalente al admin.py de Django — lista y permite ver los contactos enviados
// Protegido por contraseña de sesión (equivalente al login de Django Admin)
// Acceso: /admin/ — solo para uso interno

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../helpers/funciones.php';
require_once __DIR__ . '/../helpers/Database.php';
require_once __DIR__ . '/../models/Contacto.php';

// Credenciales del admin — equivalente a createsuperuser de Django
// TODO: Mover a variables de entorno en producción
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'durand2026'); // Cambiar en producción

$error = '';

// Lógica de login/logout del admin
if (isset($_GET['logout'])) {
    unset($_SESSION['admin_logged']);
    redirigir(url('home'));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_login'])) {
    $usuario = $_POST['usuario'] ?? '';
    $clave   = $_POST['clave'] ?? '';

    if ($usuario === ADMIN_USER && $clave === ADMIN_PASS) {
        $_SESSION['admin_logged'] = true;
        redirigir(BASE_URL . '/admin/');
    } else {
        $error = 'Credenciales incorrectas.';
    }
}

// Si no está autenticado, mostrar formulario de login
if (empty($_SESSION['admin_logged'])):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Mobiliaria Durand</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: #1a1a1a; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-box { background: #fff; padding: 2.5rem; border-radius: 12px; width: 360px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        h1 { font-size: 1.5rem; margin-bottom: 0.5rem; }
        p { color: #666; font-size: 0.9rem; margin-bottom: 2rem; }
        label { display: block; font-size: 0.85rem; margin-bottom: 0.4rem; color: #333; }
        input { width: 100%; padding: 0.75rem 1rem; border: 1px solid #ddd; border-radius: 6px; font-size: 1rem; margin-bottom: 1.2rem; }
        .btn { width: 100%; padding: 0.85rem; background: #C89B6E; color: #fff; border: none; border-radius: 6px; font-size: 1rem; cursor: pointer; }
        .error { background: #fee2e2; color: #991b1b; padding: 0.75rem 1rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>🪵 Admin Panel</h1>
        <p>Mobiliaria Durand SAC — Acceso restringido</p>
        <?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <form method="POST">
            <label>Usuario</label>
            <input type="text" name="usuario" required autofocus>
            <label>Contraseña</label>
            <input type="password" name="clave" required>
            <input type="hidden" name="admin_login" value="1">
            <button type="submit" class="btn">Ingresar</button>
        </form>
    </div>
</body>
</html>
<?php
    exit;
endif;

// ======================== PANEL ADMIN ========================
// Equivalente a: list_display = ('nombre', 'email', 'servicio', 'fecha')
$contactos = Contacto::all();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Contactos | Mobiliaria Durand</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: #f5f5f5; color: #222; }
        header { background: #1a1a1a; color: #fff; padding: 1rem 2rem; display: flex; align-items: center; justify-content: space-between; }
        header h1 { font-size: 1.2rem; }
        header a { color: #C89B6E; text-decoration: none; font-size: 0.9rem; }
        main { max-width: 1100px; margin: 2rem auto; padding: 0 1.5rem; }
        h2 { font-size: 1.4rem; margin-bottom: 1.5rem; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        th { background: #1a1a1a; color: #fff; padding: 0.9rem 1.2rem; text-align: left; font-size: 0.85rem; letter-spacing: 0.5px; }
        td { padding: 0.9rem 1.2rem; border-bottom: 1px solid #eee; font-size: 0.9rem; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fafafa; }
        .badge { display: inline-block; background: #C89B6E22; color: #C89B6E; padding: 0.2rem 0.7rem; border-radius: 20px; font-size: 0.8rem; }
        .empty { text-align: center; padding: 4rem; color: #999; }
    </style>
</head>
<body>
    <header>
        <h1>🪵 Mobiliaria Durand — Admin Panel</h1>
        <a href="?logout=1">Cerrar sesión</a>
    </header>
    <main>
        <!-- Equivalente a: list_display = ('nombre', 'email', 'servicio', 'fecha') del admin Django -->
        <h2>Mensajes de Contacto (<?= count($contactos) ?>)</h2>
        <?php if (empty($contactos)): ?>
        <div class="empty">No hay mensajes de contacto aún.</div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $c): ?>
                <tr>
                    <td><?= (int) $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['nombre']) ?></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td><?= htmlspecialchars($c['telefono'] ?? '—') ?></td>
                    <td><span class="badge"><?= htmlspecialchars($c['servicio'] ?? '—') ?></span></td>
                    <td><?= htmlspecialchars($c['fecha']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </main>
</body>
</html>
