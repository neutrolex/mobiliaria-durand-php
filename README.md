# Mobiliaria Durand S.A.C. — Plataforma Web Profesional

## 📌 Sobre el Proyecto
**Mobiliaria Durand** es una plataforma web moderna y sofisticada diseñada para una empresa líder en la fabricación de muebles de melamina a medida. Originalmente concebido como un proyecto Django, esta versión ha sido migrada íntegramente a **PHP Nativo** siguiendo una arquitectura modular y escalable (MVC simplificado), optimizada para despliegues en servidores compartidos como InfinityFree.

El objetivo principal es ofrecer una experiencia de usuario premium que refleje la calidad y el detalle artesanal de los productos de la empresa, integrando herramientas de contacto directo y gestión de datos.

---

## 🚀 Características Principales
- **Diseño Premium & Responsive:** Interfaz elegante con estética moderna, tipografía curada (Cormorant Garamond) y micro-animaciones.
- **Arquitectura Front Controller:** Sistema de rutas centralizado gestionado por un único punto de entrada (`index.php`) y reglas de reescritura de Apache (`.htaccess`).
- **Gestión de Contactos:** Formulario funcional con validación de datos, protección anti-CSRF y almacenamiento en base de datos MySQL.
- **Notificaciones por Correo:** Integración con **PHPMailer** para envío automático de correos vía SMTP (Gmail) al recibir nuevas consultas.
- **Secciones Dinámicas:** Incluye Galería de trabajos, Sección de Inspiración, Proceso de fabricación y Testimonios.

---

## 🛠️ Stack Tecnológico
- **Lenguaje:** PHP 8.x (Arquitectura limpia y modular)
- **Frontend:** HTML5, CSS3 (Vanilla + Google Fonts)
- **Base de Datos:** MySQL / MariaDB (con soporte para SQLite local)
- **Servidor:** Apache (Optimizado con `.htaccess`)
- **Dependencias:** PHPMailer (Gestión de correo electrónico)

---

## 📂 Estructura del Directorio
```text
/
├── admin/               # Panel de administración (en desarrollo)
├── controllers/         # Lógica de negocio y controladores de rutas
├── database/            # Scripts SQL y esquemas de base de datos
├── helpers/             # Funciones de utilidadGlobal (Render, Mail, Security)
├── models/              # Clases para el manejo de datos (entidades)
├── public/              # Archivos estáticos (CSS, Imágenes, JS)
├── views/               # Plantillas y componentes visuales (HTML/PHP)
│   ├── layouts/         # Plantilla base y estructura global
│   └── components/      # Fragmentos reutilizables (Hero, Galería, etc.)
├── index.php            # Enrutador principal y Front Controller
├── config.php           # Configuración global y credenciales
└── .htaccess            # Reglas de enrutamiento y seguridad
```

---

## ⚙️ Configuración e Instalación

### Requisitos Previos
- Servidor web (Apache/Nginx) con soporte PHP 7.4+
- Base de Datos MySQL
- Extensión `mbstring` habilitada (Recomendado)

### Instalación Local
1. Clona el repositorio:
   ```bash
   git clone https://github.com/neutrolex/mobiliaria-durand-php.git
   ```
2. Importa el esquema de la base de datos ubicado en `database/mysql_schema.sql`.
3. Configura tus credenciales en el archivo `config.php`:
   - Configuración de DB (`DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`)
   - Configuración de correo SMTP (`EMAIL_HOST_USER`, `EMAIL_HOST_PASSWORD`)

### Despliegue (InfinityFree)
1. Sube todos los archivos a la carpeta `htdocs`.
2. Si el proyecto se encuentra en una subcarpeta, asegúrate de actualizar el `BASE_URL` en `config.php`.
3. Crea la base de datos desde el panel de control y actualiza los datos en `config.php`.

---

## 🛡️ Seguridad
El proyecto implementa medidas básicas de seguridad para producción:
- **Protección CSRF:** Tokens únicos por sesión para formularios sensibles.
- **Sanitización:** Limpieza de entradas de usuario para prevenir ataques XSS.
- **Manejo de Errores:** Configuración de modo `DEBUG` para ocultar trazas de error en producción.

---

## 📄 Licencia
Este proyecto es de carácter privado para **Mobiliaria Durand S.A.C.**

---
*Desarrollado con ❤️ para transformar espacios y crear experiencias.*
