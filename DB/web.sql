-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2020 a las 00:40:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `usuario` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`usuario`, `password`, `rol`) VALUES
('admin', '$2y$10$VxLQBC0xQtsJPkvUFzSOv.LBBPUG4yCdGqYEtc9HfCIp10OEVFHgu', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camas`
--

CREATE TABLE `camas` (
  `numero` int(11) NOT NULL,
  `habitacion` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `camas`
--

INSERT INTO `camas` (`numero`, `habitacion`, `estado`) VALUES
(1, 301, 1),
(2, 301, 1),
(3, 301, 1),
(4, 301, 1),
(5, 301, 1),
(1, 302, 1),
(2, 302, 1),
(3, 302, 1),
(1, 304, 1),
(2, 304, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_medicos`
--

CREATE TABLE `equipos_medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos_medicos`
--

INSERT INTO `equipos_medicos` (`id`, `nombre`, `cantidad`) VALUES
(1, 'Maquina_Ecografia', 21),
(2, 'Respirador', 75),
(4, 'desfribilador', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `codigo` int(11) NOT NULL,
  `numero_cama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`codigo`, `numero_cama`) VALUES
(301, 5),
(302, 3),
(304, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `username`, `email`, `password`, `rol`) VALUES
(1, 'medico', 'medico@medico.com', '1234', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `habitacion` int(11) NOT NULL,
  `cama` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `recursos` int(11) DEFAULT NULL,
  `equipos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `habitacion`, `cama`, `medico`, `recursos`, `equipos`) VALUES
(2, 'prueba', 301, 1, 1, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion`
--

CREATE TABLE `peticion` (
  `id` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peticion`
--

INSERT INTO `peticion` (`id`, `doctor`, `paciente`, `descripcion`, `equipo`) VALUES
(1, 1, 2, 'Prueba de sangre', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre`, `cantidad`) VALUES
(1, 'jeringa', 100),
(2, 'anestecia', 13),
(3, 'guantes', 15),
(4, 'mascarillas', 85),
(5, 'suero', 132);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `camas`
--
ALTER TABLE `camas`
  ADD KEY `habitacion` (`habitacion`),
  ADD KEY `numero` (`numero`) USING BTREE;

--
-- Indices de la tabla `equipos_medicos`
--
ALTER TABLE `equipos_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico` (`medico`),
  ADD KEY `habitacion` (`habitacion`),
  ADD KEY `recursos` (`recursos`),
  ADD KEY `equipos` (`equipos`),
  ADD KEY `cama` (`cama`);

--
-- Indices de la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor` (`doctor`),
  ADD KEY `paciente` (`paciente`),
  ADD KEY `peticion_ibfk_3` (`equipo`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos_medicos`
--
ALTER TABLE `equipos_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `peticion`
--
ALTER TABLE `peticion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camas`
--
ALTER TABLE `camas`
  ADD CONSTRAINT `camas_ibfk_1` FOREIGN KEY (`habitacion`) REFERENCES `habitacion` (`codigo`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`medico`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`habitacion`) REFERENCES `habitacion` (`codigo`),
  ADD CONSTRAINT `paciente_ibfk_3` FOREIGN KEY (`recursos`) REFERENCES `recursos` (`id`),
  ADD CONSTRAINT `paciente_ibfk_4` FOREIGN KEY (`equipos`) REFERENCES `equipos_medicos` (`id`),
  ADD CONSTRAINT `paciente_ibfk_5` FOREIGN KEY (`cama`) REFERENCES `camas` (`numero`);

--
-- Filtros para la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD CONSTRAINT `peticion_ibfk_1` FOREIGN KEY (`doctor`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `peticion_ibfk_2` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `peticion_ibfk_3` FOREIGN KEY (`equipo`) REFERENCES `equipos_medicos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
