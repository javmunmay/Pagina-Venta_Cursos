# Proyecto: Plataforma de Suscripción de Cursos

## Descripción
Este proyecto es una **plataforma de suscripción a cursos en línea** que permite a los usuarios acceder a un catálogo de cursos mediante una suscripción mensual. Los usuarios pueden ver y acceder a todos los cursos disponibles en la plataforma una vez que se suscriben a uno de los planes de suscripción ofrecidos. Está diseñada para ofrecer una experiencia intuitiva, con secciones de información detallada sobre los cursos, planes de suscripción, contacto y políticas del sitio.

## Estructura del Proyecto
El proyecto está dividido en varias secciones importantes, incluyendo el frontend, backend, y la base de datos:

### 1. Frontend
   - **HTML**: Contiene múltiples páginas estáticas, como la página de inicio (`Inicio.html`), página de cursos (`Cursos.html`), y formularios de inicio de sesión y registro.
   - **CSS**: Estilos distribuidos en diferentes archivos dentro de la carpeta `css`.
   - **JavaScript (App.js)**: Maneja la interacción del usuario con la plataforma, incluyendo el uso de AJAX para la comunicación con el servidor.

### 2. Backend
   - **PHP**: Los archivos dentro de la carpeta `php` gestionan las operaciones del lado del servidor, como las solicitudes para insertar, modificar, eliminar, y listar usuarios y cursos. Utiliza técnicas de CRUD (Create, Read, Update, Delete).
   - **Administrador**: Incluye funcionalidades específicas para los administradores, como la gestión de usuarios y cursos.

### 3. Base de Datos
   - **BaseDeDatos.sql**: Contiene el esquema de la base de datos con tablas para usuarios, cursos, y registros de suscripción. Está diseñada para almacenar de manera eficiente la información de los cursos, usuarios y sus suscripciones (normal o administrador).

## Tecnologías Utilizadas

### 1. Frontend
   - **HTML5**: Estructura y contenido de las páginas.
   - **CSS3**: Diseño y estilos de la plataforma.
   - **JavaScript (AJAX)**: Comunicación asíncrona con el servidor para obtener datos dinámicos sin necesidad de recargar la página.

### 2. Backend
   - **PHP**: Procesamiento del lado del servidor para las operaciones CRUD, gestión de usuarios, suscripciones y sesiones.
   - **MySQL**: Base de datos para almacenar información sobre usuarios, cursos y transacciones.

### 3. Otros
   - **Git**: El proyecto utiliza Git para el control de versiones, facilitando la colaboración y seguimiento de cambios.
   - **AJAX**: Para hacer peticiones asíncronas entre el cliente y el servidor.

## Funcionalidades Principales

1. **Gestión de Usuarios**: 
   - Los usuarios pueden registrarse, iniciar sesión, y gestionar su perfil.
   - Los administradores pueden gestionar la lista de usuarios, asignar roles (Usuario Normal o Administrador), y modificar o eliminar cuentas.

2. **Gestión de Cursos**:
   - Los usuarios pueden acceder a un catálogo de cursos, ver detalles e inscribirse en ellos según el plan de suscripción activo.
   - Los administradores tienen la capacidad de añadir, modificar y eliminar cursos.

3. **Planes de Suscripción**:
   - Página de planes (`Planes.html`) que ofrece diferentes opciones de suscripción con detalles específicos. Al suscribirse a un plan, los usuarios obtienen acceso completo a todo el catálogo de cursos.

4. **Política de Privacidad y Términos**:
   - Páginas dedicadas a la **Política de Privacidad** y **Términos y Condiciones** del sitio.

5. **Formulario de Contacto**:
   - Página `Contacto.html` para que los usuarios puedan comunicarse con la plataforma.

## Instalación

### Requisitos:
   - Servidor web con soporte PHP (por ejemplo, XAMPP).
   - MySQL o MariaDB para la base de datos.
   - Un navegador web moderno.

### Pasos:
   1. Clona el repositorio del proyecto.
   2. Configura el servidor web (XAMPP, MAMP, etc.).
   3. Importa el archivo `BaseDeDatos.sql` a MySQL.
   4. Configura las credenciales de la base de datos en los archivos PHP si es necesario.
   5. Accede al proyecto desde el navegador mediante la URL local del servidor.
