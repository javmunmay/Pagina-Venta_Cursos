/* BASE DATOS ESTUDIANTE PROGRAMADOR */

/* USUARIOS REGISTRADOS EN LA PLATAFORMA*/

/*Crear Base Datos*/



CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO usuarios (nombre, email, password) 
VALUES ('Javier', 'javier@ejemplo.com', 'root');
