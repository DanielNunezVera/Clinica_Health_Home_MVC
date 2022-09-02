-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 03:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica_health_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `usuario_administrador` varchar(20) NOT NULL,
  `pass_admin` varchar(20) NOT NULL,
  `create_admin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`usuario_administrador`, `pass_admin`, `create_admin`) VALUES
('Admin', '9876', '2022-08-18 17:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `auxiliar`
--

CREATE TABLE `auxiliar` (
  `id_auxiliar` varchar(20) NOT NULL,
  `id_tipo_doc` varchar(5) NOT NULL,
  `nombres_aux` varchar(40) NOT NULL,
  `apellidos_aux` varchar(40) NOT NULL,
  `tel_aux` bigint(10) NOT NULL,
  `correo_aux` varchar(30) NOT NULL,
  `estado_aux` tinyint(1) NOT NULL,
  `pass_aux` varchar(20) NOT NULL,
  `create_aux` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auxiliar`
--

INSERT INTO `auxiliar` (`id_auxiliar`, `id_tipo_doc`, `nombres_aux`, `apellidos_aux`, `tel_aux`, `correo_aux`, `estado_aux`, `pass_aux`, `create_aux`) VALUES
('3030301', 'RC', 'Arturo Fernando', 'Jimenez Calle', 26, 'arturito@hotmail.com', 1, '1234', '2022-09-01 18:56:47'),
('3030302', 'PA', 'Pamela', 'Díaz', 27, 'pamelachu@nose.com', 1, '1234', '2022-09-01 18:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `cita`
--

CREATE TABLE `cita` (
  `id_cita` bigint(11) NOT NULL,
  `id_paciente` varchar(20) DEFAULT NULL,
  `id_profesional` varchar(20) NOT NULL,
  `fechacita_horainicio` datetime NOT NULL,
  `fechacita_horafin` datetime NOT NULL,
  `estado_cita` tinyint(1) NOT NULL,
  `estado_pago_cita` tinyint(1) NOT NULL,
  `asistencia_cita` tinyint(1) NOT NULL,
  `create_cita` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cita`
--

INSERT INTO `cita` (`id_cita`, `id_paciente`, `id_profesional`, `fechacita_horainicio`, `fechacita_horafin`, `estado_cita`, `estado_pago_cita`, `asistencia_cita`, `create_cita`) VALUES
(4, '2020201', '1010101', '2022-09-02 08:00:00', '2022-09-02 08:30:00', 1, 0, 0, '2022-09-01 19:02:04'),
(5, '2020202', '1010102', '2022-09-06 12:00:00', '2022-09-06 12:30:00', 1, 0, 0, '2022-09-01 19:02:04');

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
-- Dumping data for table `consultorios`
--

INSERT INTO `consultorios` (`id_consultorios`, `estado_consult`, `create_consult`) VALUES
('C01', 1, '2022-08-18 17:07:04'),
('C02', 1, '2022-08-18 17:07:04'),
('C03', 1, '2022-08-18 17:07:04'),
('C04', 1, '2022-08-31 12:39:56'),
('C05', 1, '2022-08-31 12:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` tinyint(2) NOT NULL,
  `descrip_espec` varchar(30) NOT NULL,
  `costo_espec` int(6) NOT NULL,
  `estado_espec` tinyint(1) NOT NULL,
  `create_espec` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `descrip_espec`, `costo_espec`, `estado_espec`, `create_espec`) VALUES
(1, 'Medicina General', 50000, 1, '2022-08-18 17:10:18'),
(2, 'Pediatría', 60000, 1, '2022-08-18 17:10:18'),
(3, 'Dermatología', 70000, 1, '2022-08-18 17:10:18'),
(4, 'Terapeuta', 70000, 1, '2022-08-18 17:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` varchar(20) NOT NULL,
  `id_tipo_doc` varchar(5) NOT NULL,
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

INSERT INTO `paciente` (`id_paciente`, `id_tipo_doc`, `nombres_pac`, `apellidos_pac`, `tel_pac`, `correo_pac`, `sexo_pac`, `estado_pac`, `pass_pac`, `create_pac`) VALUES
('2020201', 'PEP', 'Kyle', 'Mendez Castro', 24, 'kyle@gmail.com', 'Masculino', 1, '1234', '2022-09-01 18:57:37'),
('2020202', 'PA', 'Maria Andrea', 'Ortiz Palacios', 25, 'mariita@outlook.com', 'Femenino', 1, '1234', '2022-09-01 18:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `profesional`
--

CREATE TABLE `profesional` (
  `id_profesional` varchar(20) NOT NULL,
  `id_tipo_doc` varchar(5) NOT NULL,
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

--
-- Dumping data for table `profesional`
--

INSERT INTO `profesional` (`id_profesional`, `id_tipo_doc`, `id_consultorios`, `id_especialidad`, `nombres_prof`, `apellidos_prof`, `tel_prof`, `correo_prof`, `dias_laborales`, `franja_horaria`, `estado_prof`, `pass_prof`, `create_prof`) VALUES
('1010101', 'TI', 'C01', 3, 'Maximiliano', 'Zapata', 22, 'maxi@yahoo.com', 'Lunes-Viernes\r\nExcepciones: Fines de semana.', '6:00 am - 2:00 pm', 1, '1234', '2022-09-01 18:59:53'),
('1010102', 'CC', 'C02', 1, 'Oscar', 'Medina', 23, 'osquitar@myspace.com', 'Martes-Domingo\r\nExcepciones: Lunes y festivos.', '8:00 am - 4:00 pm', 1, '', '2022-09-01 18:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_tipo_doc` varchar(5) NOT NULL,
  `tipo_doc` varchar(64) NOT NULL,
  `create_tipo_doc` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_tipo_doc`, `tipo_doc`, `create_tipo_doc`) VALUES
('CC', 'Cédula de Ciudadanía', '2022-08-18 16:59:40'),
('CE', 'Cédula de Extranjería', '2022-08-18 16:59:40'),
('PA', 'Pasaporte', '2022-08-18 16:59:40'),
('PEP', 'Permiso Especial de Permanencia', '2022-08-18 17:00:36'),
('RC', 'Registro Civil', '2022-08-18 17:00:36'),
('TI', 'Tarjeta de Identidad', '2022-08-18 16:59:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario_administrador`);

--
-- Indexes for table `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`id_auxiliar`),
  ADD KEY `fk_tipo_doc_auxiliar` (`id_tipo_doc`);

--
-- Indexes for table `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_paciente_cita` (`id_paciente`),
  ADD KEY `fk_profesional_cita` (`id_profesional`);

--
-- Indexes for table `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id_consultorios`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_tipo_doc_paciente` (`id_tipo_doc`);

--
-- Indexes for table `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id_profesional`),
  ADD KEY `fk_tipo_doc_profesional` (`id_tipo_doc`),
  ADD KEY `fk_consultorios_profesional` (`id_consultorios`),
  ADD KEY `fk_especialidad_profesional` (`id_especialidad`);

--
-- Indexes for table `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_tipo_doc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD CONSTRAINT `fk_tipo_doc_auxiliar` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);

--
-- Constraints for table `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_paciente_cita` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `fk_profesional_cita` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`);

--
-- Constraints for table `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_tipo_doc_paciente` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);

--
-- Constraints for table `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `fk_consultorios_profesional` FOREIGN KEY (`id_consultorios`) REFERENCES `consultorios` (`id_consultorios`),
  ADD CONSTRAINT `fk_especialidad_profesional` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `fk_tipo_doc_profesional` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
