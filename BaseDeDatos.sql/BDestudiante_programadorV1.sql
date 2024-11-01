-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2024 a las 12:41:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estudiante_programador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `preferencia_contacto` varchar(50) NOT NULL,
  `politica_privacidad` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_incidencia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `nombre_completo`, `correo`, `telefono`, `asunto`, `mensaje`, `preferencia_contacto`, `politica_privacidad`, `fecha_incidencia`) VALUES
(1, 'Prueba', 'prueba@ejemplo.com', '12234534656', 'asistencia_tecnica', 'Esto es una prueba para ver si el formulario funciona bien', 'email', 1, '2024-10-26 17:36:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ID_Profesor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Especializacion` varchar(100) DEFAULT NULL,
  `Experiencia` int(11) DEFAULT NULL CHECK (`Experiencia` >= 0),
  `Calificacion` decimal(3,2) DEFAULT NULL,
  `Numero_Cursos` int(11) DEFAULT 0,
  `ID_Cursos` text DEFAULT NULL,
  `Horas_Totales` decimal(5,2) DEFAULT 0.00,
  `Salario_Base` decimal(10,2) DEFAULT NULL,
  `Porcentaje_Ventas` decimal(4,2) DEFAULT NULL CHECK (`Porcentaje_Ventas` between 0 and 100),
  `Bonificaciones` decimal(10,2) DEFAULT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Renovacion` date DEFAULT NULL,
  `Estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `Notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`ID_Profesor`, `Nombre`, `Apellido`, `Email`, `Telefono`, `Especializacion`, `Experiencia`, `Calificacion`, `Numero_Cursos`, `ID_Cursos`, `Horas_Totales`, `Salario_Base`, `Porcentaje_Ventas`, `Bonificaciones`, `Fecha_Inicio`, `Fecha_Renovacion`, `Estado`, `Notas`) VALUES
(35, 'Javier', 'Muñoz Mayorga', 'javi15mmj@gmail.com', '+34 601 17 76 19', 'Desarrollo Web y Ciberseguridad', 5, 8.50, 10, '1,2,3', 100.00, 2000.00, 10.00, 500.00, '2024-01-01', '2025-01-01', 'Activo', 'Profesor experto en desarrollo web y ciberseguridad'),
(36, 'Leandro', 'Ligero Picón', 'leandro@gmail.com', '+34 622 62 95 96', 'Desarrollo Web ', 2, 5.00, 0, '', 0.00, 0.00, 0.00, 0.00, '2025-01-01', '2026-01-01', 'Inactivo', 'Profesor experto en desarrollo web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `numero_telefono` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `User` tinyint(1) DEFAULT 1,
  `Admin` tinyint(1) DEFAULT 0,
  `politica_privacidad` tinyint(1) NOT NULL DEFAULT 0,
  `Profesor` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`, `numero_telefono`, `fecha_nacimiento`, `User`, `Admin`, `politica_privacidad`, `Profesor`) VALUES
(6, 'Javier Muñoz Mayorga', 'javier@ejemplo.com', '$2y$10$S24faZirblk9waHR5oNdUea3OeziXAgfKGBtj9n/t4NiwC342IzxG', '2024-10-24 18:36:56', '600123456', '1990-05-21', 1, 0, 1, 0),
(7, 'Clara', 'clara@ejemplo.com', '$2y$10$MqlUlbF8dCPph3Tt.D5NnOwMD0VRL32BzUMksWceUqgXoZ2bZDNfG', '2024-10-24 18:36:56', '612321232', '2002-03-20', 1, 0, 1, 0),
(8, 'Admin Javi', 'adminjavi@ejemplo.com', 'admin123', '2024-10-24 18:36:56', '600654321', '1985-01-10', 0, 1, 1, 0),
(9, 'Admin Juan', 'admin@ejemplo.com', '$2y$10$vWB0ls415ZfXzQ762m3weOAn0SLpvvtd7FxiHmmi5v87QrU4TQIrq', '2024-10-24 18:36:56', '600654321', '1985-01-10', 0, 1, 1, 0),
(34, 'Clara', 'clara123@gmail.com', '$2y$10$aTr6oTdAENaNs94cjLDRwOgZwrl63U9lfUet7de7VEub9BxMXqJza', '2024-10-26 12:29:11', '+34 64757848', '2000-04-03', 1, 0, 1, 0),
(35, 'Javier', 'javi15mmj@gmail.com', '$2y$10$BxJM8zFiuoZHS4WbWst93Ok9fp87EmZQu8Z5bjXWZ67v.PwbMHKP6', '2024-10-27 11:48:31', '+34 601177619', '2002-03-20', 0, 0, 1, 1),
(36, 'Leandro', 'leandro@ejemplo.com', '$2y$10$kf2/SqHSTqElJxkWNIRZF.twUvVXBbTKGWD2M6tShMxtuJin4ma2y', '2024-10-27 14:45:32', NULL, NULL, 0, 0, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ID_Profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`ID_Profesor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
