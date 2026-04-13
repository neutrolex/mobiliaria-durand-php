<?php
// [implementación custom: Clase helper de conexión PDO]
// Soporta SQLite y MySQL (InfinityFree)

require_once __DIR__ . '/../config.php';

class Database
{
    private static ?PDO $instance = null;

    /**
     * Retorna una instancia singleton de la conexión PDO
     */
    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            try {
                if (DB_DRIVER === 'mysql') {
                    // Conexión a MySQL (InfinityFree)
                    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
                    self::$instance = new PDO($dsn, DB_USER, DB_PASS);
                } else {
                    // Conexión a SQLite (Local)
                    self::$instance = new PDO('sqlite:' . DB_PATH);
                    // Activar claves foráneas en SQLite
                    self::$instance->exec("PRAGMA foreign_keys = ON");
                }

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                // Error fatal de conexión
                http_response_code(500);
                if (DEBUG) {
                    die("Error de conexión a la base de datos: " . $e->getMessage());
                } else {
                    die("Error interno del servidor. Por favor, intente más tarde.");
                }
            }
        }

        return self::$instance;
    }
}

