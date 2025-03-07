/*
CREATE TABLE cursos (
    id_curso SERIAL PRIMARY KEY,
    titulo TEXT NOT NULL,
    descripcion TEXT,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_profesor INT REFERENCES profesores(id_profesor) ON DELETE SET NULL,
    duracion INT CHECK (duracion >= 0), -- duración en horas, debe ser positiva
    nivel TEXT CHECK (nivel IN ('Básico', 'Intermedio', 'Avanzado')), -- restringir a valores específicos
    estado TEXT CHECK (estado IN ('Activo', 'Inactivo')), -- restringir a valores específicos
    imagen TEXT, -- URL o ruta de la imagen del curso
    alumnos_inscritos INT DEFAULT 0, -- cantidad de alumnos inscritos
    valoracion NUMERIC(2,1) CHECK (valoracion >= 0 AND valoracion <= 5), -- valoracion promedio en una escala de 0 a 5
    contenido JSON, -- Detalles de las secciones (almacenado en JSON para simplicidad)
    habilidades JSON, -- Lista de habilidades obtenidas (también en JSON para simplicidad)
    requisitos TEXT -- Requisitos mínimos para tomar el curso
);*/


/*Ejemplo de inserción*/
INSERT INTO cursos (
    titulo,
    descripcion,
    id_profesor,
    duracion,
    nivel,
    estado,
    imagen,
    alumnos_inscritos,
    valoracion,
    contenido,
    habilidades,
    requisitos
) VALUES (
    'SQL desde 0 hasta Avanzado',
    'Este curso te lleva desde los conceptos básicos de SQL hasta técnicas avanzadas para gestionar y manipular bases de datos. Aprenderás a crear y gestionar bases de datos, realizar consultas complejas, optimizar el rendimiento y trabajar con transacciones. Además, explorarás temas avanzados como vistas, procedimientos almacenados, triggers y la integración de SQL con otros lenguajes de programación. Al finalizar, estarás preparado para manejar bases de datos de manera profesional y eficiente.',
    9,  -- Cambia el ID del profesor según tu base de datos
    30,  -- Duración en horas
    'Avanzado',  -- Nivel del curso
    'Activo',  -- Estado del curso
    '../imagenes/CursoSQLBanner.jpg',  -- Ruta de la imagen del banner
    1400,  -- Número de alumnos inscritos
    4.8,  -- Valoración del curso
    '[
        { "tema": "Introducción a SQL y Bases de Datos", "duracion": "2h" },
        { "tema": "Creación y Gestión de Bases de Datos", "duracion": "3h" },
        { "tema": "Consultas Básicas: SELECT, INSERT, UPDATE, DELETE", "duracion": "4h" },
        { "tema": "Consultas Avanzadas: JOINs y Subconsultas", "duracion": "4h" },
        { "tema": "Funciones Agregadas y Agrupación de Datos", "duracion": "3h" },
        { "tema": "Optimización de Consultas", "duracion": "3h" },
        { "tema": "Transacciones y Control de Concurrencia", "duracion": "3h" },
        { "tema": "Vistas, Procedimientos Almacenados y Triggers", "duracion": "4h" },
        { "tema": "Integración de SQL con Otros Lenguajes", "duracion": "2h" },
        { "tema": "Proyecto Final: Base de Datos Completa", "duracion": "4h" }
    ]',  -- Contenido del curso en formato JSON
    '[
        "Comprender los conceptos básicos y avanzados de SQL.",
        "Crear y gestionar bases de datos de manera eficiente.",
        "Realizar consultas básicas y avanzadas para manipular datos.",
        "Utilizar JOINs y subconsultas para combinar datos de múltiples tablas.",
        "Aplicar funciones agregadas y agrupación de datos para análisis.",
        "Optimizar consultas para mejorar el rendimiento.",
        "Manejar transacciones y control de concurrencia.",
        "Crear y utilizar vistas, procedimientos almacenados y triggers.",
        "Integrar SQL con otros lenguajes de programación.",
        "Desarrollar una base de datos completa desde cero.",
        "Prepararte para roles de administración de bases de datos o análisis de datos."
    ]',  -- Habilidades que se obtendrán en formato JSON
    'No se requieren conocimientos previos de SQL, aunque es recomendable tener nociones básicas de bases de datos.'  -- Requisitos del curso
);