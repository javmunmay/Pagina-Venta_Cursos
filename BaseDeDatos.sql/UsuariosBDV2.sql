/* Insertar datos en la tabla usuarios */
INSERT INTO usuarios (nombre, password, numero_telefono, email, fecha_nacimiento, user, admin, profesor, politica_privacidad)
VALUES
    ('Javier Muñoz', 'pass1234', '600123456', 'javier@example.com', '1990-05-21', TRUE, FALSE, FALSE, TRUE),
    ('Clara López', 'clara5678', '612345678', 'clara@example.com', '2002-03-20', TRUE, FALSE, FALSE, TRUE),
    ('Admin Juan', 'admin123', '600654321', 'adminjuan@example.com', '1985-01-10', FALSE, TRUE, FALSE, TRUE),
    ('Leandro Ligero', 'leoPassword', '699123456', 'leandro@example.com', '1995-06-15', TRUE, FALSE, TRUE, TRUE);

/* Insertar datos en la tabla profesores */
INSERT INTO profesores (especializacion, experiencia, calificacion, numero_cursos, horas_totales, salario_base, porcentaje_ventas, bonificaciones, fecha_inicio, fecha_renovacion, estado, notas)
VALUES
    ('Desarrollo Web', '5 años de experiencia en desarrollo full-stack', 8.5, 10, 500, 2000.00, 15.0, 300.00, '2022-01-01', '2023-01-01', 'Activo', 'Profesor experto en tecnologías web y frameworks modernos.'),
    ('Ciberseguridad', '3 años en seguridad informática y redes', 7.8, 7, 300, 2200.00, 10.0, 250.00, '2021-06-10', '2022-06-10', 'Activo', 'Experto en seguridad y hacking ético.'),
    ('Inteligencia Artificial', '2 años en Machine Learning', 6.5, 5, 200, 2500.00, 12.0, 500.00, '2020-09-15', '2021-09-15', 'Inactivo', 'Especialización en IA y redes neuronales.');

/* Insertar datos en la tabla cursos */
INSERT INTO cursos (titulo, descripcion, id_profesor, duracion, nivel, estado)
VALUES
    ('Introducción al Desarrollo Web', 'Curso básico de HTML, CSS y JavaScript', 1, 40, 'Básico', 'Activo'),
    ('Ciberseguridad para Principiantes', 'Fundamentos de ciberseguridad y redes', 2, 50, 'Intermedio', 'Activo'),
    ('Machine Learning Avanzado', 'Técnicas avanzadas en Machine Learning y redes neuronales', 3, 80, 'Avanzado', 'Inactivo');

/* Insertar datos en la tabla suscripciones */
INSERT INTO suscripciones (id_usuario, tipo_plan, fecha_fin, estado)
VALUES
    (1, 'Mensual', '2024-05-21', 'Activo'),
    (2, 'Anual', '2025-03-20', 'Activo'),
    (3, 'Mensual', '2023-12-10', 'Cancelado'),
    (4, 'Anual', '2024-06-15', 'Activo');

/* Insertar datos en la tabla incidencias */
INSERT INTO incidencias (id_usuario, email_usuario, telefono_usuario, asunto, mensaje, preferencia_contacto, politica_privacidad)
VALUES
    (1, 'javier@example.com', '600123456', 'Problema de Acceso', 'No puedo acceder a mi cuenta', 'Email', TRUE),
    (2, 'clara@example.com', '612345678', 'Actualización de Datos', 'Necesito actualizar mi número de teléfono', 'Teléfono', TRUE),
    (3, 'adminjuan@example.com', '600654321', 'Consulta sobre Facturación', 'Quisiera saber más sobre mi facturación', 'Email', TRUE),
    (4, 'leandro@example.com', '699123456', 'Problema Técnico', 'Error al cargar el curso de Machine Learning', 'Teléfono', TRUE);
