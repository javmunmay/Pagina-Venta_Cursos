
CREATE TABLE certificados (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único del certificado
    usuario_id INT NOT NULL,                   -- ID del usuario al que pertenece el certificado
    nombre_curso VARCHAR(255) NOT NULL,        -- Nombre del curso asociado al certificado
    fecha_emision DATE NOT NULL,               -- Fecha en que se emitió el certificado
    codigo VARCHAR(50) NOT NULL,               -- Código único del certificado
    archivo VARCHAR(255) NOT NULL,             -- Nombre del archivo del certificado (ej: certificado1.pdf)
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE -- Relación con la tabla usuarios
);