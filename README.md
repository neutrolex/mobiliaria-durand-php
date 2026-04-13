# Mobiliaria Durand — Migración PHP
> Migrado desde el proyecto Django original. Configurado para InfinityFree con MySQL y PHPMailer.

## Estructura del proyecto

```
mobiliaria-durand/
├── config.php                    ← Configuración central (DB, Email, Debug)
├── index.php                     ← Enrutador Front Controller (URLs)
├── .htaccess                     ← Reglas de reescritura para Apache
│
├── controllers/                  ← Lógica de las vistas
├── models/                       ← Gestión de datos (ORM simple)
├── views/                        ← Plantillas PHP (HTML + Lógica de presentación)
├── helpers/                      ← Utilidades (Base de datos, funciones globales)
├── admin/                        ← Panel de administración de contactos
├── public/                       ← Archivos estáticos (CSS, imágenes)
├── database/                     ← Scripts SQL para MySQL
└── PHPMailer/                    ← Biblioteca para envío de correos
```

## Requisitos
- PHP 8.0 o superior
- Extensión PDO + PDO_SQLite habilitada
- Apache con mod_rewrite habilitado (o Nginx equivalente)

## Instalación

### 1. Inicializar la base de datos
```bash
php database/init_db.php
```
> Esto crea la tabla `web_contacto` en SQLite. Solo ejecutar una vez.

### 2. Configurar BASE_URL en config.php
Editar `config.php` y ajustar `BASE_URL` según donde esté alojado el proyecto:
```php
define('BASE_URL', '/php-migration'); // Si está en subcarpeta
define('BASE_URL', '');              // Si está en la raíz del dominio
```

### 3. Configurar el correo (opcional)
En `config.php`, actualizar las credenciales SMTP:
```php
define('EMAIL_HOST_USER', 'tu@correo.com');
define('EMAIL_HOST_PASSWORD', 'tu-contraseña-app');
```
> Para producción, se recomienda instalar [PHPMailer](https://github.com/PHPMailer/PHPMailer) y reemplazar la función `enviarCorreo()` en `helpers/funciones.php`.

### 4. Acceso al panel Admin
Ingresar a: `/php-migration/admin/`
- Usuario: `admin`
- Contraseña: `durand2026`
> Cambiar credenciales en `admin/index.php` antes de ir a producción.

## Equivalencias Django → PHP

| Django | PHP |
|--------|-----|
| `settings.py` | `config.php` |
| `urls.py` | `index.php` (enrutador) |
| `views.py` | `controllers/` |
| `models.py` | `models/Contacto.php` |
| `templates/` | `views/` |
| `static/` | `public/` |
| `migrations/` | `database/migrations/*.sql` |
| `admin.py` | `admin/index.php` |
| `{% url 'name' %}` | `url('name')` |
| `{% static 'path' %}` | `staticUrl('path')` |
| `{% csrf_token %}` | `csrfField()` |
| `render(req, tpl, ctx)` | `renderVista(tpl, ctx)` |
| `redirect('url')` | `redirigir('url')` |
| `send_mail(...)` | `enviarCorreo(...)` |
| `request.POST.get('x')` | `$_POST['x'] ?? null` |
| `{% if %}...{% endif %}` | `<?php if(): ?>...<?php endif; ?>` |
| `{% for x in lista %}` | `<?php foreach ($lista as $x): ?>` |
| `manager.py migrate` | `php database/init_db.php` |
