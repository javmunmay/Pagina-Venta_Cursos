/* BASE DATOS ESTUDIANTE PROGRAMADOR */

/* USUARIOS REGISTRADOS EN LA PLATAFORMA */

/* Crear Base de Datos */
CREATE DATABASE IF NOT EXISTS estudiante_programador;

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
);

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