<?php
// [migrado desde: web/models.py — clase Contacto]
// Modelo de la tabla "web_contacto" equivalente al modelo Django

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../helpers/Database.php';

class Contacto
{
    // Propiedades equivalentes a los campos del modelo Django
    public ?int $id = null;
    public string $nombre = '';
    public string $email = '';
    public ?string $telefono = null;
    public ?string $servicio = null;
    public string $mensaje = '';
    public ?string $fecha = null;

    private static function getDb(): PDO
    {
        return Database::getConnection();
    }

    /**
     * Equivalente a: Contacto.objects.create(...)
     * Inserta un nuevo registro en la base de datos
     */
    public static function create(array $datos): self
    {
        $db = self::getDb();

        $sql = "INSERT INTO web_contacto (nombre, email, telefono, servicio, mensaje, fecha)
                VALUES (:nombre, :email, :telefono, :servicio, :mensaje, :fecha)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nombre'   => $datos['nombre'],
            ':email'    => $datos['email'],
            ':telefono' => $datos['telefono'] ?? null,
            ':servicio' => $datos['servicio'] ?? null,
            ':mensaje'  => $datos['mensaje'],
            ':fecha'    => date('Y-m-d H:i:s'),
        ]);

        // Retornar instancia con el ID generado
        $instancia = new self();
        $instancia->id       = (int) $db->lastInsertId();
        $instancia->nombre   = $datos['nombre'];
        $instancia->email    = $datos['email'];
        $instancia->telefono = $datos['telefono'] ?? null;
        $instancia->servicio = $datos['servicio'] ?? null;
        $instancia->mensaje  = $datos['mensaje'];
        $instancia->fecha    = date('Y-m-d H:i:s');

        return $instancia;
    }

    /**
     * Equivalente a: Contacto.objects.all()
     * Devuelve todos los registros de la tabla
     */
    public static function all(): array
    {
        $db = self::getDb();
        $stmt = $db->query("SELECT * FROM web_contacto ORDER BY fecha DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Equivalente a: Contacto.objects.get(id=x)
     * Lanza excepción si no existe
     */
    public static function get(int $id): self
    {
        $db = self::getDb();
        $stmt = $db->prepare("SELECT * FROM web_contacto WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new \RuntimeException("Contacto con id={$id} no encontrado.");
        }

        $instancia = new self();
        $instancia->id       = (int) $row['id'];
        $instancia->nombre   = $row['nombre'];
        $instancia->email    = $row['email'];
        $instancia->telefono = $row['telefono'];
        $instancia->servicio = $row['servicio'];
        $instancia->mensaje  = $row['mensaje'];
        $instancia->fecha    = $row['fecha'];

        return $instancia;
    }

    /**
     * Equivalente a: Contacto.objects.filter(campo=valor)
     */
    public static function filter(string $campo, mixed $valor): array
    {
        $db = self::getDb();
        $stmt = $db->prepare("SELECT * FROM web_contacto WHERE {$campo} = ? ORDER BY fecha DESC");
        $stmt->execute([$valor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Equivalente a: model_instance.delete()
     */
    public function delete(): void
    {
        if ($this->id === null) return;
        $db = self::getDb();
        $stmt = $db->prepare("DELETE FROM web_contacto WHERE id = ?");
        $stmt->execute([$this->id]);
        $this->id = null;
    }

    /**
     * Equivalente a: __str__ en Django
     */
    public function __toString(): string
    {
        return "{$this->nombre} - {$this->servicio}";
    }
}
