-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2023 a las 07:25:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `asistencia_cita` (IN `asistencia` INT, IN `id` INT)   BEGIN

UPDATE cita SET asistencia_cita = asistencia WHERE id_cita = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `citas_programadas_prof` (IN `a` INT(15))   BEGIN
SELECT cita.id_cita, cita.fechacita_horainicio, paciente.id_paciente, paciente.id_tipo_doc, paciente.num_doc_pac, paciente.nombres_pac, paciente.apellidos_pac, paciente.tel_pac, paciente.correo_pac, profesional.id_profesional, cita.asistencia_cita FROM ((cita INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente) INNER JOIN profesional ON cita.id_profesional = profesional.id_profesional) WHERE cita.fechacita_horainicio >= CURRENT_TIMESTAMP AND cita.estado_cita = 1 AND cita.id_profesional = a;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cita_paciente` ()   BEGIN
SELECT
    cita.id_cita,
    cita.fechacita_horainicio,
    paciente.id_paciente,
    paciente.id_tipo_doc,
    paciente.num_doc_pac,
    paciente.nombres_pac,
    paciente.apellidos_pac,
    paciente.tel_pac,
    paciente.sexo_pac,
    profesional.id_profesional,
    profesional.num_doc_prof,
    profesional.nombres_prof,
    profesional.apellidos_prof,
    especialidad.descrip_espec,
    especialidad.costo_espec,
    consultorios.id_consultorios,
    cita.estado_cita,
    cita.asistencia_cita,
    cita.estado_pago_cita
FROM
    (
        (
            (
                (
                    cita
                INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente
                )
            INNER JOIN profesional ON cita.id_profesional = profesional.id_profesional
            )
        INNER JOIN especialidad ON profesional.id_especialidad = especialidad.id_especialidad
        )
    INNER JOIN consultorios ON profesional.id_consultorios = consultorios.id_consultorios
    )
WHERE
    cita.fechacita_horainicio >= CURRENT_TIMESTAMP AND cita.estado_cita = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cita_profesional` ()   BEGIN
SELECT 
cita.id_cita, 
cita.fechacita_horainicio,
paciente.id_paciente,
paciente.id_tipo_doc, 
paciente.num_doc_pac, 
paciente.nombres_pac, 
paciente.apellidos_pac, 
paciente.tel_pac, 
paciente.correo_pac, 
profesional.id_profesional, 
profesional.num_doc_prof, 
profesional.nombres_prof, 
profesional.apellidos_prof, 
especialidad.descrip_espec, 
cita.estado_cita 
FROM (((cita INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente) 
INNER JOIN profesional ON cita.id_profesional = profesional.id_profesional) 
INNER JOIN especialidad ON profesional.id_especialidad = especialidad.id_especialidad)  
WHERE cita.fechacita_horainicio >= CURRENT_TIMESTAMP AND cita.estado_cita = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_aux` (`a` INT(20))   DELETE FROM auxiliar WHERE id_auxiliar = a$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_cita` (IN `a` INT(20))   BEGIN
	DELETE FROM cita WHERE id_profesional=a;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_consult` (IN `a` VARCHAR(3))   BEGIN
	IF(SELECT COUNT(*) FROM profesional WHERE id_consultorios=a)=0 THEN 
    DELETE FROM consultorios WHERE id_consultorios = a; 
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_espec` (IN `a` TINYINT(2))   BEGIN
 	IF(SELECT COUNT(*) FROM profesional WHERE id_especialidad=a)=0 THEN 
    DELETE FROM especialidad WHERE id_especialidad =a;
    END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_pac` (IN `a` INT(20))   BEGIN
	IF (SELECT COUNT(*) FROM cita WHERE id_paciente=a)=0 THEN 
    DELETE FROM paciente WHERE id_paciente=a;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_prof` (IN `a` INT(20))   BEGIN
	IF (SELECT COUNT(*) FROM cita WHERE id_profesional=a AND id_paciente<>0)=0 then 
    CALL eliminar_cita(a);
    DELETE FROM profesional WHERE id_profesional=a;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `email` (`a` VARCHAR(5), `b` VARCHAR(20), `c` VARCHAR(5))   BEGIN
    IF (c='1') THEN SELECT correo_prof FROM profesional WHERE id_tipo_doc=a AND num_doc_prof=b;
    ELSEIF (c='2') THEN SELECT correo_aux FROM auxiliar WHERE id_tipo_doc=a AND num_doc_aux=b;
    ELSEIF (c='3') THEN SELECT correo_pac FROM paciente WHERE id_tipo_doc=a AND num_doc_pac=b;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `excepciones` (IN `a` INT(20), IN `b` VARCHAR(40), IN `c` VARCHAR(40))   BEGIN
	IF (SELECT COUNT(*) FROM cita WHERE id_profesional=a AND id_paciente <>0 AND fechacita_horainicio LIKE (b) AND 		         fechacita_horafin LIKE (c))=0 THEN 
    DELETE FROM cita WHERE id_profesional = a AND fechacita_horainicio LIKE (b) AND fechacita_horafin LIKE (c);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_agenda` (IN `a` INT(20), `b` DATETIME, `c` DATETIME, `d` TINYINT(1), `e` TINYINT(1), `f` TINYINT(1), `g` DATETIME)   BEGIN
	INSERT INTO cita (id_profesional,fechacita_horainicio,fechacita_horafin,estado_cita,estado_pago_cita,asistencia_cita,create_cita) VALUES 
    (a, b, c, d, e, f, g); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inser_vali_aux` (`a` VARCHAR(5), `b` VARCHAR(20), `c` VARCHAR(40), `d` VARCHAR(40), `e` BIGINT(10), `f` VARCHAR(30), `g` TINYINT(1), `h` VARCHAR(220), `i` DATETIME)   INSERT INTO auxiliar (id_tipo_doc, num_doc_aux, nombres_aux, apellidos_aux, tel_aux, correo_aux, estado_aux, pass_aux, create_aux)
SELECT a, b, c, d, e, f, g, h, i
FROM dual
WHERE not exists (SELECT * 
                  FROM auxiliar
                  WHERE id_tipo_doc=a AND num_doc_aux=b)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inser_vali_consultorio` (`a` VARCHAR(3), `b` TINYINT(1), `c` DATETIME)   INSERT INTO consultorios (id_consultorios, estado_consult, create_consult)
SELECT a, b, c
FROM dual
WHERE not exists (SELECT * 
                  FROM consultorios 
                  WHERE id_consultorios=a)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inser_vali_espec` (`a` VARCHAR(30), `b` INT(6), `c` TINYINT(1), `d` DATETIME)   INSERT INTO especialidad (descrip_espec, costo_espec, estado_espec, create_espec)
SELECT a, b, c, d
FROM dual
WHERE not exists (SELECT * 
                  FROM especialidad 
                  WHERE descrip_espec=a)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inser_vali_pac` (IN `a` VARCHAR(5), IN `b` VARCHAR(20), IN `c` VARCHAR(40), IN `d` VARCHAR(40), IN `e` BIGINT(10), IN `f` VARCHAR(30), IN `g` VARCHAR(15), IN `h` TINYINT(1), IN `i` VARCHAR(220), IN `j` DATETIME)   INSERT INTO paciente (id_tipo_doc, num_doc_pac, nombres_pac, apellidos_pac, tel_pac, correo_pac, sexo_pac, estado_pac, pass_pac, create_pac)
SELECT a, b, c, d, e, f, g, h, i, j
FROM dual
WHERE not exists (SELECT * 
                  FROM paciente 
                  WHERE id_tipo_doc=a AND num_doc_pac=b)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inser_vali_prof` (`a` VARCHAR(5), `b` VARCHAR(20), `c` VARCHAR(3), `d` TINYINT(2), `e` VARCHAR(40), `f` VARCHAR(40), `g` BIGINT(10), `h` VARCHAR(30), `i` TEXT, `j` VARCHAR(30), `k` TINYINT(1), `l` VARCHAR(220), `m` DATETIME)   INSERT INTO profesional (id_tipo_doc, num_doc_prof, id_consultorios, id_especialidad, nombres_prof, apellidos_prof, tel_prof, correo_prof, dias_laborales, franja_horaria, estado_prof, pass_prof, create_prof)
SELECT a, b, c, d, e, f, g, h, i, j, k, l, m
FROM dual
WHERE not exists (SELECT * 
                  FROM profesional 
                  WHERE id_tipo_doc=a AND num_doc_prof=b)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pass_recuperado` (IN `a` VARCHAR(5), IN `b` VARCHAR(20), IN `c` VARCHAR(5), IN `d` VARCHAR(220))   BEGIN
    IF (c='1') THEN UPDATE profesional SET pass_prof=d WHERE id_tipo_doc=a AND num_doc_prof=b;
    ELSEIF (c='2') THEN UPDATE auxiliar SET pass_aux=d WHERE id_tipo_doc=a AND num_doc_aux=b;
    ELSEIF (c='3') THEN UPDATE paciente SET pass_pac=d WHERE id_tipo_doc=a AND num_doc_pac=b;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recuperar_password` (`a` VARCHAR(5), `b` VARCHAR(20), `c` VARCHAR(5))   BEGIN
    IF (c='1') THEN SELECT * FROM profesional WHERE id_tipo_doc=a AND num_doc_prof=b;
    ELSEIF (c='2') THEN SELECT * FROM auxiliar WHERE id_tipo_doc=a AND num_doc_aux=b;
    ELSEIF (c='3') THEN SELECT * FROM paciente WHERE id_tipo_doc=a AND num_doc_pac=b;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vali_rec_password` (IN `a` VARCHAR(5), IN `b` VARCHAR(20), IN `c` VARCHAR(5), IN `d` VARCHAR(220))   BEGIN
    IF (c='1') THEN 
    	IF (SELECT COUNT(*) FROM profesional WHERE id_tipo_doc=a AND num_doc_prof=b)>0 THEN
        	UPDATE profesional SET pass_prof=d WHERE id_tipo_doc=a AND num_doc_prof=b;
            END IF; 
    ELSEIF (c='2') THEN 
    	IF (SELECT COUNT(*) FROM auxiliar WHERE id_tipo_doc=a AND num_doc_aux=b)>0 THEN 
            UPDATE auxiliar SET pass_aux=d WHERE id_tipo_doc=a AND num_doc_aux=b;
            END IF;
    ELSEIF (c='3') THEN 
    	IF (SELECT COUNT(*) FROM paciente WHERE id_tipo_doc=a AND num_doc_pac=b)>0 THEN
        	UPDATE paciente SET pass_pac=d WHERE id_tipo_doc=a AND num_doc_pac=b;
            END IF;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_agenda` (IN `a` VARCHAR(10), IN `b` INT(20))   BEGIN
	SELECT fechacita_horainicio FROM cita WHERE fechacita_horainicio LIKE (a) AND id_profesional = b;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `usuario_administrador` varchar(20) NOT NULL,
  `pass_admin` varchar(220) NOT NULL,
  `create_admin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario_administrador`, `pass_admin`, `create_admin`) VALUES
('Admin', '$2y$10$VEbmYPP/RL4Nk7i9CNTgXelgar77b56HUjXnQqC./adkhGdD3Vyey', '2022-08-18 17:11:47');

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
  `pass_aux` varchar(220) NOT NULL,
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
  `pass_pac` varchar(220) NOT NULL,
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
  `franja_horaria` varchar(30) DEFAULT NULL,
  `estado_prof` tinyint(1) NOT NULL,
  `pass_prof` varchar(220) NOT NULL,
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
  MODIFY `id_auxiliar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9686;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id_profesional` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
