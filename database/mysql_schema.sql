-- =====================================================================
-- TABLA: web_contacto
-- Adaptada para MySQL / InfinityFree
-- =====================================================================

CREATE TABLE IF NOT EXISTS web_contacto (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nombre   VARCHAR(150) NOT NULL,
    email    VARCHAR(254) NOT NULL,
    telefono VARCHAR(20)  NULL,
    servicio VARCHAR(200) NULL,
    mensaje  TEXT         NOT NULL,
    fecha    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Índices de búsqueda
CREATE INDEX idx_contacto_nombre ON web_contacto (nombre);
CREATE INDEX idx_contacto_email  ON web_contacto (email);
