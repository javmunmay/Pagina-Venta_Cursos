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
    'Curso de PHP: Fundamentos',
    'Este curso te introduce a los conceptos esenciales de PHP, el lenguaje de programación backend que impulsa a millones de sitios web en todo el mundo. A lo largo del curso, aprenderás desde los principios básicos, como la instalación del entorno y sintaxis inicial, hasta la creación de scripts dinámicos y la interacción con bases de datos.',
    1,
    6,
    'Básico',
    'Activo',
    '../imagenes/CursoPhpFundamentosBanner.jpg',
    1600,
    4.9,
    '[
        { "tema": "Introducción a PHP y configuración del entorno", "duracion": "30 min" },
        { "tema": "Sintaxis básica y tipos de datos en PHP", "duracion": "1h" },
        { "tema": "Operadores y estructuras de control", "duracion": "45 min" },
        { "tema": "Funciones: Definición y uso en PHP", "duracion": "1h" },
        { "tema": "Manejo de formularios en PHP", "duracion": "1h 30 min" },
        { "tema": "Manipulación de cadenas y arrays", "duracion": "1h" },
        { "tema": "Introducción a sesiones y cookies", "duracion": "50 min" },
        { "tema": "Conexión a bases de datos MySQL", "duracion": "1h 30 min" },
        { "tema": "Introducción a la Programación Orientada a Objetos en PHP", "duracion": "2h" },
        { "tema": "Buenas prácticas y seguridad en PHP", "duracion": "45 min" },
        { "tema": "Proyecto final: Aplicación web básica en PHP", "duracion": "2h" }
    ]
    ',
    '[
        "Comprender la sintaxis y estructura básica de PHP",
        "Configurar el entorno de desarrollo para ejecutar scripts PHP",
        "Utilizar variables y tipos de datos en PHP",
        "Implementar operadores y estructuras de control de flujo",
        "Crear y utilizar funciones propias y predefinidas en PHP",
        "Capturar y procesar datos de formularios HTML",
        "Manipular cadenas de texto y arrays",
        "Gestionar sesiones y cookies para el manejo de usuarios",
        "Conectar y realizar operaciones CRUD con bases de datos MySQL",
        "Aplicar conceptos básicos de Programación Orientada a Objetos en PHP",
        "Seguir buenas prácticas y mejorar la seguridad en aplicaciones PHP",
        "Desarrollar una aplicación web sencilla en PHP como proyecto final"
    ]
    ',
    'No se requieren conocimientos previos de programación. Se recomienda conocimientos básicos de HTML y CSS'
);