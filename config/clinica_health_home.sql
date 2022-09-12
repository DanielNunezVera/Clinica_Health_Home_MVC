-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2022 a las 18:35:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica_health_home`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `usuario_administrador` varchar(20) NOT NULL,
  `pass_admin` varchar(20) NOT NULL,
  `create_admin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario_administrador`, `pass_admin`, `create_admin`) VALUES
('Admin', '9876', '2022-08-18 17:11:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE `auxiliar` (
  `id_auxiliar` int(20) NOT NULL,
  `id_tipo_doc` varchar(5) NOT NULL,
  `num_doc_aux` varchar(20) NOT NULL,
  `nombres_aux` varchar(40) NOT NULL,
  `apellidos_aux` varchar(40) NOT NULL,
  `tel_aux` bigint(10) NOT NULL,
  `correo_aux` varchar(30) NOT NULL,
  `estado_aux` tinyint(1) NOT NULL,
  `pass_aux` varchar(20) NOT NULL,
  `create_aux` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` bigint(11) NOT NULL,
  `id_paciente` int(20) DEFAULT NULL,
  `id_profesional` int(20) NOT NULL,
  `fechacita_horainicio` datetime NOT NULL,
  `fechacita_horafin` datetime NOT NULL,
  `estado_cita` tinyint(1) NOT NULL,
  `estado_pago_cita` tinyint(1) NOT NULL,
  `asistencia_cita` tinyint(1) NOT NULL,
  `create_cita` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `id_consultorios` varchar(3) NOT NULL,
  `estado_consult` tinyint(1) NOT NULL,
  `create_consult` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`id_consultorios`, `estado_consult`, `create_consult`) VALUES
('C01', 1, '2022-08-18 17:07:04'),
('C02', 1, '2022-08-18 17:07:04'),
('C03', 1, '2022-08-18 17:07:04'),
('co5', 0, '2022-08-29 17:19:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` tinyint(2) NOT NULL,
  `descrip_espec` varchar(30) NOT NULL,
  `costo_espec` int(6) NOT NULL,
  `estado_espec` tinyint(1) NOT NULL,
  `create_espec` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `descrip_espec`, `costo_espec`, `estado_espec`, `create_espec`) VALUES
(1, 'Medicina General', 50000, 1, '2022-08-18 17:10:18'),
(2, 'Pediatría', 60000, 1, '2022-08-18 17:10:18'),
(3, 'Dermatología', 70000, 1, '2022-08-18 17:10:18'),
(4, 'Terapeuta', 70000, 1, '2022-08-18 17:10:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(20) NOT NULL,
  `id_tipo_doc` varchar(5) NOT NULL,
  `num_doc_pac` varchar(20) NOT NULL,
  `nombres_pac` varchar(40) NOT NULL,
  `apellidos_pac` varchar(40) NOT NULL,
  `tel_pac` bigint(10) NOT NULL,
  `correo_pac` varchar(30) NOT NULL,
  `sexo_pac` varchar(15) NOT NULL,
  `estado_pac` tinyint(1) NOT NULL,
  `pass_pac` varchar(20) NOT NULL,
  `create_pac` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `id_profesional` int(20) NOT NULL,
  `id_tipo_doc` varchar(5) NOT NULL,
  `num_doc_prof` varchar(20) NOT NULL,
  `id_consultorios` varchar(3) DEFAULT NULL,
  `id_especialidad` tinyint(2) DEFAULT NULL,
  `nombres_prof` varchar(40) NOT NULL,
  `apellidos_prof` varchar(40) NOT NULL,
  `tel_prof` bigint(10) NOT NULL,
  `correo_prof` varchar(30) NOT NULL,
  `dias_laborales` text NOT NULL,
  `franja_horaria` varchar(30) NOT NULL,
  `estado_prof` tinyint(1) NOT NULL,
  `pass_prof` varchar(20) NOT NULL,
  `create_prof` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_tipo_doc` varchar(5) NOT NULL,
  `tipo_doc` varchar(64) NOT NULL,
  `create_tipo_doc` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_tipo_doc`, `tipo_doc`, `create_tipo_doc`) VALUES
('CC', 'Cédula de Ciudadanía', '2022-08-18 16:59:40'),
('CE', 'Cédula de Extranjería', '2022-08-18 16:59:40'),
('PA', 'Pasaporte', '2022-08-18 16:59:40'),
('PEP', 'Permiso Especial de Permanencia', '2022-08-18 17:00:36'),
('RC', 'Registro Civil', '2022-08-18 17:00:36'),
('TI', 'Tarjeta de Identidad', '2022-08-18 16:59:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario_administrador`);

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`id_auxiliar`),
  ADD KEY `fk_tipo_doc_auxiliar` (`id_tipo_doc`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_paciente_cita` (`id_paciente`),
  ADD KEY `fk_profesional_cita` (`id_profesional`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id_consultorios`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_tipo_doc_paciente` (`id_tipo_doc`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id_profesional`),
  ADD KEY `fk_tipo_doc_profesional` (`id_tipo_doc`),
  ADD KEY `fk_consultorios_profesional` (`id_consultorios`),
  ADD KEY `fk_especialidad_profesional` (`id_especialidad`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_tipo_doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `id_auxiliar` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id_profesional` int(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD CONSTRAINT `fk_tipo_doc_auxiliar` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_paciente_cita` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `fk_profesional_cita` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_tipo_doc_paciente` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `fk_consultorios_profesional` FOREIGN KEY (`id_consultorios`) REFERENCES `consultorios` (`id_consultorios`),
  ADD CONSTRAINT `fk_especialidad_profesional` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_tipo_doc_profesional` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
