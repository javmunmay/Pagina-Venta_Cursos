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
    'Curso de HTML desde Cero',
    'Este curso te enseñará los fundamentos de HTML desde cero aprendiendo desde la estructura de una página hasta etiquetas avanzadas...',
    1,
    6,
    'Básico',
    'Activo',
    '../imagenes/CursoHtmlBanner.jpg',
    1800,
    4.8,
    '[{"tema": "Introducción a HTML y su historia", "duracion": "30 min"}, {"tema": "Etiquetas y Estructura básica de una página", "duracion": "1h"}]',
    '["Comprender la estructura básica de HTML", "Crear y enlazar páginas web"]',
    'No se requieren conocimientos previos de programación.'
);