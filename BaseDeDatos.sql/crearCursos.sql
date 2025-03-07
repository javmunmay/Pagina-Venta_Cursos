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
    'Curso de CSS desde Cero hasta Avanzado',
    'Este curso te introduce a los conceptos esenciales de CSS (Cascading Style Sheets), 
        el lenguaje de diseño que da vida y estilo a millones de sitios web en todo el mundo. 
        A lo largo del curso, aprenderás desde los principios básicos, como la estructura de reglas, 
        selectores y propiedades, hasta técnicas avanzadas como animaciones, diseño responsivo y 
        el uso de frameworks modernos. Dominarás la creación de diseños atractivos y funcionales, 
        optimizando la experiencia del usuario en cualquier dispositivo. Al finalizar, estarás 
        preparado para transformar cualquier estructura HTML en una interfaz visualmente 
        impresionante y profesional.',
    1,
    20,
    'Básico',
    'Activo',
    '../imagenes/CursoCSSBanner.jpg',
    600,
    4.9,
    '[
        { "tema": "Introducción a CSS", "duracion": "1h" },
        { "tema": "Fundamentos de Diseño", "duracion": "2h" },
        { "tema": "Selectores Avanzados y Especificidad", "duracion": "4h" },
        { "tema": "Diseño Responsivo", "duracion": "1h" },
        { "tema": "Flexbox y Grid Layout", "duracion": "1h 30 min" },
        { "tema": "Animaciones y Transiciones", "duracion": "1h" },
        { "tema": "Frameworks y Herramientas Modernas", "duracion": "50 min" },
        { "tema": "Proyecto Final", "duracion": "1h 30 min" }
    ]
    ',
    '[
        "Escribir código CSS limpio y eficiente utilizando sintaxis básica y avanzada.",
        "Diseñar layouts modernos y atractivos aplicando el modelo de caja y posicionamiento.",
        "Crear diseños responsivos que se adapten a cualquier dispositivo usando media queries y unidades relativas.",
        "Dominar Flexbox y CSS Grid para construir layouts complejos y flexibles.",
        "Implementar animaciones y transiciones para mejorar la interactividad y experiencia del usuario.",
        "Utilizar frameworks como Bootstrap y Tailwind CSS para acelerar el desarrollo de proyectos.",
        "Optimizar y mantener código CSS siguiendo buenas prácticas y herramientas como SASS o PostCSS.",
        "Trabajar con herramientas de desarrollo como Chrome DevTools para depurar y probar estilos.",
        "Aplicar selectores avanzados y entender la especificidad para un mayor control sobre los estilos.",
        "Desarrollar proyectos completos desde cero, integrando diseño responsivo, animaciones y frameworks.",
        "Resolver problemas comunes de diseño de manera eficiente y creativa.",
        "Mejorar la usabilidad y accesibilidad de tus diseños web."
    ]
    ',
    'No se requieren conocimientos previos de programación. Se recomienda conocimientos básicos de HTML'
);