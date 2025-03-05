CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY,
    nombre VARCHAR(255),
    password VARCHAR(255),
    fecha_registro DATE,
    numero_telefono VARCHAR(15),
    email VARCHAR(255),
    fecha_nacimiento DATE,
    user BOOLEAN,
    admin BOOLEAN,
    profesor BOOLEAN,
    politica_privacidad BOOLEAN
);

CREATE TABLE Profesores (
    id_profesor INT PRIMARY KEY,
    especializacion VARCHAR(255),
    experiencia INT,
    calificacion FLOAT,
    numero_cursos INT,
    horas_totales INT,
    salario_base DECIMAL(10, 2),
    porcentaje_ventas DECIMAL(5, 2),
    bonificaciones DECIMAL(10, 2),
    fecha_inicio DATE,
    fecha_renovacion DATE,
    estado VARCHAR(50),
    notas_informacion TEXT
);

CREATE TABLE Cursos (
    id_curso INT PRIMARY KEY,
    titulo VARCHAR(255),
    descripcion TEXT,
    fecha_creacion DATE,
    duracion INT,
    nivel VARCHAR(50),
    estado VARCHAR(50),
    imagen VARCHAR(255),
    alumnos_inscritos INT,
    valoracion FLOAT,
    contenido TEXT,
    habilidades TEXT,
    requisitos TEXT,
    id_profesor INT,
    FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor)
);

CREATE TABLE Suscripciones (
    id_suscripcion INT PRIMARY KEY,
    tipo_plan VARCHAR(50),
    fecha_inicio DATE,
    fecha_fin DATE,
    estado VARCHAR(50),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE Incidencias (
    id_incidencias INT PRIMARY KEY,
    email_usuario VARCHAR(255),
    telefono_usuario VARCHAR(15),
    asunto VARCHAR(255),
    mensaje TEXT,
    preferencia_contacto VARCHAR(50),
    politica_privacidad BOOLEAN,
    fecha_incidencia DATE,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);

CREATE TABLE Inscripciones_Cursos (
    id_inscripciones INT PRIMARY KEY,
    id_usuario INT,
    id_curso INT,
    fecha_inscripcion DATE,
    progreso INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE Certificaciones (
    id_certificacion INT PRIMARY KEY,
    fecha_obtencion DATE,
    codigo_certificado VARCHAR(255),
    estado VARCHAR(50),
    id_usuario INT,
    id_curso INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso)
);

CREATE TABLE Pagos (
    id_pago INT PRIMARY KEY,
    cantidad DECIMAL(10, 2),
    metodo_pago VARCHAR(50),
    fecha_pago DATE,
    estado VARCHAR(50),
    id_usuario INT,
    id_suscripcion INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
    FOREIGN KEY (id_suscripcion) REFERENCES Suscripciones(id_suscripcion)
);