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
-- Stand-in structure for view `citas_programadas_prof`
-- (See below for the actual view)
--
CREATE TABLE `citas_programadas_prof` (
`id_cita` bigint(11)
,`fechacita_horainicio` datetime
,`id_paciente` int(20)
,`id_tipo_doc` varchar(5)
,`num_doc_pac` varchar(20)
,`nombres_pac` varchar(40)
,`apellidos_pac` varchar(40)
,`tel_pac` bigint(10)
,`correo_pac` varchar(30)
,`id_profesional` int(20)
,`asistencia_cita` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cita_paciente`
-- (See below for the actual view)
--
CREATE TABLE `cita_paciente` (
`id_cita` bigint(11)
,`fechacita_horainicio` datetime
,`id_paciente` int(20)
,`id_tipo_doc` varchar(5)
,`num_doc_pac` varchar(20)
,`nombres_pac` varchar(40)
,`apellidos_pac` varchar(40)
,`tel_pac` bigint(10)
,`sexo_pac` varchar(15)
,`id_profesional` int(20)
,`num_doc_prof` varchar(20)
,`nombres_prof` varchar(40)
,`apellidos_prof` varchar(40)
,`descrip_espec` varchar(30)
,`costo_espec` int(6)
,`id_consultorios` varchar(3)
,`estado_cita` tinyint(1)
,`asistencia_cita` tinyint(1)
,`estado_pago_cita` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cita_profesional`
-- (See below for the actual view)
--
CREATE TABLE `cita_profesional` (
`id_cita` bigint(11)
,`fechacita_horainicio` datetime
,`id_paciente` int(20)
,`id_tipo_doc` varchar(5)
,`num_doc_pac` varchar(20)
,`nombres_pac` varchar(40)
,`apellidos_pac` varchar(40)
,`tel_pac` bigint(10)
,`sexo_pac` varchar(15)
,`id_profesional` int(20)
,`num_doc_prof` varchar(20)
,`nombres_prof` varchar(40)
,`apellidos_prof` varchar(40)
,`descrip_espec` varchar(30)
,`id_consultorios` varchar(3)
,`estado_cita` tinyint(1)
,`asistencia_cita` tinyint(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `consultorios`
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

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `id_tipo_doc`, `num_doc_pac`, `nombres_pac`, `apellidos_pac`, `tel_pac`, `correo_pac`, `sexo_pac`, `estado_pac`, `pass_pac`, `create_pac`) VALUES
(1, 'CC', '2020201', 'Kyle', 'Mendez Castro', 31566868986, 'kylemendez@gmail.com', 'Masculino', 1, '1234', '2022-09-08 12:51:39'),
(2, 'TI', '2020202', 'Maria Andrea', 'Ortiz Palacios', 31566868986, 'kylemendez@gmail.com', 'Femenino', 1, '1234', '2022-09-08 12:51:39'),
(3, 'PA', '2020203', 'Martin Elias', 'Accidente opss', 31566868986, 'kylemendez@gmail.com', 'No sé', 1, '1234', '2022-09-08 17:07:50'),
(6, 'CE', '2020204', 'Oscar', 'Martinez', 31566868986, 'kylemendez@gmail.com', 'Femenino', 1, '2020204', '2022-09-08 18:13:39');

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

-- --------------------------------------------------------

--
-- Structure for view `citas_programadas_prof`
--
DROP TABLE IF EXISTS `citas_programadas_prof`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `citas_programadas_prof`  AS SELECT `cita`.`id_cita` AS `id_cita`, `cita`.`fechacita_horainicio` AS `fechacita_horainicio`, `paciente`.`id_paciente` AS `id_paciente`, `paciente`.`id_tipo_doc` AS `id_tipo_doc`, `paciente`.`num_doc_pac` AS `num_doc_pac`, `paciente`.`nombres_pac` AS `nombres_pac`, `paciente`.`apellidos_pac` AS `apellidos_pac`, `paciente`.`tel_pac` AS `tel_pac`, `paciente`.`correo_pac` AS `correo_pac`, `profesional`.`id_profesional` AS `id_profesional`, `cita`.`asistencia_cita` AS `asistencia_cita` FROM ((`cita` join `paciente` on(`cita`.`id_paciente` = `paciente`.`id_paciente`)) join `profesional` on(`cita`.`id_profesional` = `profesional`.`id_profesional`)) WHERE `cita`.`fechacita_horainicio` >= current_timestamp() AND `cita`.`estado_cita` = 11  ;

-- --------------------------------------------------------

--
-- Structure for view `cita_paciente`
--
DROP TABLE IF EXISTS `cita_paciente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cita_paciente`  AS SELECT `cita`.`id_cita` AS `id_cita`, `cita`.`fechacita_horainicio` AS `fechacita_horainicio`, `paciente`.`id_paciente` AS `id_paciente`, `paciente`.`id_tipo_doc` AS `id_tipo_doc`, `paciente`.`num_doc_pac` AS `num_doc_pac`, `paciente`.`nombres_pac` AS `nombres_pac`, `paciente`.`apellidos_pac` AS `apellidos_pac`, `paciente`.`tel_pac` AS `tel_pac`, `paciente`.`sexo_pac` AS `sexo_pac`, `profesional`.`id_profesional` AS `id_profesional`, `profesional`.`num_doc_prof` AS `num_doc_prof`, `profesional`.`nombres_prof` AS `nombres_prof`, `profesional`.`apellidos_prof` AS `apellidos_prof`, `especialidad`.`descrip_espec` AS `descrip_espec`, `especialidad`.`costo_espec` AS `costo_espec`, `consultorios`.`id_consultorios` AS `id_consultorios`, `cita`.`estado_cita` AS `estado_cita`, `cita`.`asistencia_cita` AS `asistencia_cita`, `cita`.`estado_pago_cita` AS `estado_pago_cita` FROM ((((`cita` join `paciente` on(`cita`.`id_paciente` = `paciente`.`id_paciente`)) join `profesional` on(`cita`.`id_profesional` = `profesional`.`id_profesional`)) join `especialidad` on(`profesional`.`id_especialidad` = `especialidad`.`id_especialidad`)) join `consultorios` on(`profesional`.`id_consultorios` = `consultorios`.`id_consultorios`)) WHERE `cita`.`fechacita_horainicio` >= current_timestamp() AND `cita`.`estado_cita` = 11  ;

-- --------------------------------------------------------

--
-- Structure for view `cita_profesional`
--
DROP TABLE IF EXISTS `cita_profesional`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cita_profesional`  AS SELECT `cita`.`id_cita` AS `id_cita`, `cita`.`fechacita_horainicio` AS `fechacita_horainicio`, `paciente`.`id_paciente` AS `id_paciente`, `paciente`.`id_tipo_doc` AS `id_tipo_doc`, `paciente`.`num_doc_pac` AS `num_doc_pac`, `paciente`.`nombres_pac` AS `nombres_pac`, `paciente`.`apellidos_pac` AS `apellidos_pac`, `paciente`.`tel_pac` AS `tel_pac`, `paciente`.`sexo_pac` AS `sexo_pac`, `profesional`.`id_profesional` AS `id_profesional`, `profesional`.`num_doc_prof` AS `num_doc_prof`, `profesional`.`nombres_prof` AS `nombres_prof`, `profesional`.`apellidos_prof` AS `apellidos_prof`, `especialidad`.`descrip_espec` AS `descrip_espec`, `consultorios`.`id_consultorios` AS `id_consultorios`, `cita`.`estado_cita` AS `estado_cita`, `cita`.`asistencia_cita` AS `asistencia_cita` FROM ((((`cita` join `paciente` on(`cita`.`id_paciente` = `paciente`.`id_paciente`)) join `profesional` on(`cita`.`id_profesional` = `profesional`.`id_profesional`)) join `especialidad` on(`profesional`.`id_especialidad` = `especialidad`.`id_especialidad`)) join `consultorios` on(`profesional`.`id_consultorios` = `consultorios`.`id_consultorios`)) WHERE `cita`.`fechacita_horainicio` >= current_timestamp() AND `cita`.`estado_cita` = 11  ;

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
