/* Base de datos (Prototipo) */
/*
/* Tabla de usuarios */
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nombre TEXT NOT NULL,
    password TEXT NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    numero_telefono TEXT,
    email TEXT NOT NULL UNIQUE,
    fecha_nacimiento DATE,
    user BOOLEAN DEFAULT FALSE,
    admin BOOLEAN DEFAULT FALSE,
    profesor BOOLEAN DEFAULT FALSE,
    politica_privacidad BOOLEAN DEFAULT FALSE
);

/* Tabla de profesores */
CREATE TABLE profesores (
    id_profesor SERIAL PRIMARY KEY,
    especializacion TEXT NOT NULL,
    experiencia TEXT,
    calificacion NUMERIC CHECK (calificacion >= 0 AND calificacion <= 10), -- Ej: escala 0-10 Ej: 5/10
    numero_cursos INT DEFAULT 0,
    horas_totales INT DEFAULT 0,
    salario_base NUMERIC CHECK (salario_base >= 0),
    porcentaje_ventas NUMERIC CHECK (porcentaje_ventas >= 0 AND porcentaje_ventas <= 100), -- porcentaje de 0 a 100
    bonificaciones NUMERIC DEFAULT 0,
    fecha_inicio DATETIME,
    fecha_renovacion DATETIME,
    estado TEXT CHECK (estado IN ('Activo', 'Inactivo', 'Suspendido')), -- opciones restringidas
    notas TEXT
);
*/

/* Tabla de cursos */
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
);
*/










/*

/* Tabla de suscripciones */
CREATE TABLE suscripciones (
    id_suscripcion SERIAL PRIMARY KEY,
    id_usuario INT REFERENCES usuarios(id) ON DELETE CASCADE,
    tipo_plan TEXT CHECK (tipo_plan IN ('Mensual', 'Anual')), -- restringir a valores específicos
    fecha_inicio DATETIME DEFAULT CURRENT_TIMESTAMP,
    fecha_fin DATETIME,
    estado TEXT CHECK (estado IN ('Activo', 'Cancelado')) -- restringir a valores específicos
);

/* Tabla de incidencias */
CREATE TABLE incidencias (
    id_incidencia SERIAL PRIMARY KEY,
    id_usuario INT REFERENCES usuarios(id) ON DELETE SET NULL,
    email_usuario TEXT NOT NULL,
    telefono_usuario TEXT,
    asunto TEXT NOT NULL,
    mensaje TEXT NOT NULL,
    preferencia_contacto TEXT CHECK (preferencia_contacto IN ('Email', 'Teléfono')),
    politica_privacidad BOOLEAN DEFAULT FALSE,
    fecha_incidencia DATETIME DEFAULT CURRENT_TIMESTAMP
);*/