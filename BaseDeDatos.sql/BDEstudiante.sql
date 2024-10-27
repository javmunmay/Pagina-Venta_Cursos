/* BASE DATOS ESTUDIANTE PROGRAMADOR */

/* USUARIOS REGISTRADOS EN LA PLATAFORMA */

/* Crear Base de Datos */
/*CREATE DATABASE IF NOT EXISTS estudiante_programador;*/

/* Usar la Base de Datos */
USE estudiante_programador;

/* Crear Tabla Usuarios 
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único para cada usuario
    nombre VARCHAR(100) NOT NULL,  -- Nombre del usuario
    email VARCHAR(255) NOT NULL UNIQUE,  -- Correo electrónico único
    password VARCHAR(255) NOT NULL,  -- Contraseña del usuario
    numero_telefono VARCHAR(15),  -- Número de teléfono del usuario
    fecha_nacimiento DATE,  -- Fecha de nacimiento del usuario
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Fecha de registro automática
    User BOOLEAN DEFAULT TRUE,  -- Indica si es un usuario normal (por defecto es true)
    Admin BOOLEAN DEFAULT FALSE  -- Indica si es un administrador (por defecto es false)
);*/

/* Agregar nuevas columnas a la tabla usuarios 

ALTER TABLE usuarios
ADD COLUMN numero_telefono VARCHAR(15),  -- Agregar campo para el número de teléfono
ADD COLUMN fecha_nacimiento DATE,  -- Agregar campo para la fecha de nacimiento
ADD COLUMN User BOOLEAN DEFAULT TRUE,  -- Agregar campo para identificar si es usuario normal
ADD COLUMN Admin BOOLEAN DEFAULT FALSE;  -- Agregar campo para identificar si es administrador
*/

/* Insertar usuarios de ejemplo */

/*INSERT INTO usuarios (nombre, email, password, numero_telefono, fecha_nacimiento, User, Admin) 
VALUES 
('Javier', 'javier@ejemplo.com', '1234', '600123456', '1990-05-21', TRUE, FALSE),
('Clara', 'clara@ejemplo.com', '1234', '612321232', '2002-03-20', TRUE, FALSE),
('Admin Javi', 'adminjavi@ejemplo.com', 'admin123', '600654321', '1985-01-10', FALSE, TRUE),
('Admin Juan', 'admin@ejemplo.com', 'root', '600654321', '1985-01-10', FALSE, TRUE);
*/

/*ALTER TABLE usuarios
ADD COLUMN politica_privacidad TINYINT(1) NOT NULL DEFAULT 0;*/

/*CREATE TABLE Incidencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    descripcion_incidencia TEXT NOT NULL,
    fecha_incidencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);*/

/*
CREATE TABLE IF NOT EXISTS Incidencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono VARCHAR(20), -- Opcional
    asunto VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    preferencia_contacto VARCHAR(50) NOT NULL,
    politica_privacidad TINYINT(1) NOT NULL DEFAULT 0,
    fecha_incidencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);*/

/*
ALTER TABLE Incidencias
    ADD COLUMN nombre_completo VARCHAR(100) NOT NULL,
    ADD COLUMN telefono VARCHAR(20),
    ADD COLUMN asunto VARCHAR(100) NOT NULL,
    ADD COLUMN mensaje TEXT NOT NULL,
    ADD COLUMN preferencia_contacto VARCHAR(50) NOT NULL,
    ADD COLUMN politica_privacidad TINYINT(1) NOT NULL DEFAULT 0;
*/
/*
DROP TABLE Incidencias;
*/

/*ALTER TABLE usuarios
ADD COLUMN Profesor TINYINT(1) DEFAULT 0;*/

/*
USE estudiante_programador;

INSERT INTO usuarios (nombre, email, password, fecha_registro, numero_telefono, fecha_nacimiento, User, Admin, Profesor, politica_privacidad)
VALUES 
('Javier', 'javi15mmj@gmail.com', '1234', NOW(), '600123456', '2002-03-20', 0, 0, 1, 1);

*/
/*
-- Crear la tabla 'profesores'
CREATE TABLE profesores (
    ID_Profesor INT PRIMARY KEY,  -- Relación con ID de la tabla usuarios
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Telefono VARCHAR(20),
    
    -- Perfil Profesional
    Especializacion VARCHAR(100),
    Experiencia INT CHECK (Experiencia >= 0),  -- Años de experiencia, debe ser un número positivo
    Calificacion DECIMAL(3, 2),  -- Puntuación promedio de 0.00 a 10.00 (por ejemplo)
    
    -- Cursos y Participación
    Numero_Cursos INT DEFAULT 0,  -- Número de cursos que imparte
    ID_Cursos TEXT,  -- Lista de IDs de cursos separados por comas
    Horas_Totales DECIMAL(5, 2) DEFAULT 0,  -- Total de horas impartidas, formato 999.99
    
    -- Detalles de Compensación
    Salario_Base DECIMAL(10, 2),  -- Salario base, en formato monetario
    Porcentaje_Ventas DECIMAL(4, 2) CHECK (Porcentaje_Ventas BETWEEN 0 AND 100),  -- Porcentaje de ventas (0-100)
    Bonificaciones DECIMAL(10, 2),  -- Bonificación adicional
    
    -- Fecha de Colaboración
    Fecha_Inicio DATE NOT NULL,
    Fecha_Renovacion DATE,
    
    -- Estado de Colaboración
    Estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    
    -- Observaciones y Comentarios
    Notas TEXT,
    
    -- Establecer una clave foránea para vincular ID_Profesor con la tabla usuarios (para integridad de datos)
    FOREIGN KEY (ID_Profesor) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Nota: Asegúrate de que 'id' en la tabla 'usuarios' existe y tiene valores correspondientes
-- antes de relacionarla como clave foránea en 'ID_Profesor' en esta tabla 'profesores'.
*/
/*
INSERT INTO usuarios (nombre, email, password, User, Admin, Profesor)
VALUES ('NombreProfesor', 'email@ejemplo.com', 'password123', 0, 0, 1);

INSERT INTO profesores (ID_Profesor, Nombre, Apellido, Email, Telefono, Especializacion, Experiencia, Calificacion, Numero_Cursos, ID_Cursos, Horas_Totales, Salario_Base, Porcentaje_Ventas, Bonificaciones, Fecha_Inicio, Fecha_Renovacion, Estado, Notas)
VALUES ($userId, 'NombreProfesor', 'ApellidoProfesor', 'email@ejemplo.com', '123456789', 'Desarrollo Web', 5, 4.8, 10, '1,2,3', 100, 2000.00, 10.0, 500.00, '2024-01-01', '2025-01-01', 'Activo', 'Profesor experto en desarrollo web');
*/

/*
INSERT INTO usuarios (nombre, email, password, User, Admin, Profesor)
VALUES ('Leandro', 'Leandro@ejemplo.com', '1234', 0, 0, 1);
*/

/*
INSERT INTO profesores (ID_Profesor, Nombre, Apellido, Email, Telefono, Especializacion, Experiencia, Calificacion, Numero_Cursos, ID_Cursos, Horas_Totales, Salario_Base, Porcentaje_Ventas, Bonificaciones, Fecha_Inicio, Fecha_Renovacion, Estado, Notas)
VALUES (35, 'Javier', 'Muñoz Mayorga', 'javi15mmj@gmail.com', '+34 601177619', 'Desarrollo Web y Ciberseguridad', 5, 8.5, 10, '1,2,3', 100, 2000.00, 10.0, 500.00, '2024-01-01', '2025-01-01', 'Activo', 'Profesor experto en desarrollo web y ciberseguridad');
*/
INSERT INTO profesores (ID_Profesor, Nombre, Apellido, Email, Telefono, Especializacion, Experiencia, Calificacion, Numero_Cursos, ID_Cursos, Horas_Totales, Salario_Base, Porcentaje_Ventas, Bonificaciones, Fecha_Inicio, Fecha_Renovacion, Estado, Notas)
VALUES (36, 'Leandro', 'Ligero Picón', 'leandro@gmail.com', NULL, 'Desarrollo Web ', 1, 5, 0, NULL, NULL, NULL, NULL, NULL, '2025-01-01', '2026-01-01', 'No Activo', 'Profesor experto en desarrollo web');


