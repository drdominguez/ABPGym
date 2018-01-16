-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-01-2018 a las 19:10:30
-- Versión del servidor: 5.7.20
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `GYMESEI2`
--
DROP DATABASE IF EXISTS `GYMESEI2`;
CREATE DATABASE IF NOT EXISTS `GYMESEI2` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `GYMESEI2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` bigint(20) NOT NULL,
  `precio` double DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idInstalaciones` int(3) NOT NULL,
  `plazas` tinyint(4) NOT NULL,
  `contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `precio`, `nombre`, `idInstalaciones`, `plazas`, `contador`) VALUES
(53, 50.20, 'Asistencia', 2, 0, 3),
(54, 25.00, 'Fútbol', 5, 23, 3),
(55, 20.45, 'Karate', 3, 20, 2),
(56, 30.50, 'Tenis', 1, 5, 3),
(57, 30.99, 'Baloncesto', 4, 18, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_deportista`
--

CREATE TABLE `actividad_deportista` (
  `id` bigint(20) NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad_deportista`
--

INSERT INTO `actividad_deportista` (`id`, `idActividad`, `dniDeportista`) VALUES
(13, 53, '11111111H'),
(14, 53, '22222222J'),
(15, 53, '98765432M'),
(16, 54, '11111111H'),
(17, 54, '22222222J'),
(18, 54, '98765432M'),
(19, 55, '11111111H'),
(20, 55, '22222222J'),
(21, 56, '98765432M'),
(22, 56, '11111111H'),
(23, 56, '22222222J'),
(24, 57, '98765432M');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_entrenador`
--

CREATE TABLE `actividad_entrenador` (
  `id` bigint(20) NOT NULL,
  `dniEntrenador` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad_entrenador`
--

INSERT INTO `actividad_entrenador` (`id`, `dniEntrenador`, `idActividad`) VALUES
(49, '66666666Q', 53),
(50, '66666666Q', 54),
(51, '12345678Z', 55),
(52, '66666666Q', 56),
(53, '33333333P', 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_horario`
--

CREATE TABLE `actividad_horario` (
  `idActividad` bigint(20) NOT NULL,
  `idHorario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad_horario`
--

INSERT INTO `actividad_horario` (`idActividad`, `idHorario`) VALUES
(53, 29),
(54, 30),
(55, 31),
(56, 32),
(57, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dniAdministrador`) VALUES
('44490816F'),
('44497121X'),
('53192250N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cardio`
--

CREATE TABLE `cardio` (
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cardio`
--

INSERT INTO `cardio` (`idEjercicio`) VALUES
(14),
(15),
(16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cardio_tabla`
--

CREATE TABLE `cardio_tabla` (
  `id` bigint(20) NOT NULL,
  `idCardio` bigint(20) NOT NULL,
  `idTabla` bigint(11) NOT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `distancia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cardio_tabla`
--

INSERT INTO `cardio_tabla` (`id`, `idCardio`, `idTabla`, `tiempo`, `distancia`) VALUES
(1, 14, 2, 34, 23),
(2, 15, 1, 23, 23),
(3, 16, 3, 45, 4),
(4, 14, 4, 56, 44),
(5, 14, 1, 43, 21),
(6, 15, 2, 50, 22),
(7, 16, 3, 45, 55),
(8, 15, 4, 23, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`dni`) VALUES
('11111111H'),
('22222222J'),
('98765432M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `video` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `descripcion`, `video`, `imagen`) VALUES
(8, 'Estiramiento 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget justo tincidunt, finibus ante ac, ultricies ex. Duis sagittis, purus. ', 'https://www.youtube.com/embed/iQ3g-gqKe_A', 'ABP/../View/pictures/ejercicios/fotos/8.jpg'),
(9, 'Estiramiento 2', 'Ejercicio estiramiento numero 2', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/9.jpg'),
(10, 'Estiramiento 3', 'Es un estiramiento sencillo para deportistas que están empezando', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/10.jpg'),
(11, 'Muscular 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget justo tincidunt, finibus ante ac, ultricies ex. Duis sagittis, purus. ', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/11.jpg'),
(12, 'Muscular 2', 'Ejercicio muscular numero 2. Fácil', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/12.jpeg'),
(13, 'Muscular 3', 'Es un ejercicio muscular solo apto para profesionales','https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/13.jpg'),
(14, 'Cardio 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget justo tincidunt, finibus ante ac, ultricies ex. Duis sagittis, purus. ', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/14.jpg'),
(15, 'Cardio 2', 'Es un ejercicio de cardio sencillo y para toda la familia', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/15.jpg'),
(16, 'Cardio 3', 'Alta dificultad8', 'https://www.youtube.com/embed/0YRX4pEP6pY', 'ABP/../View/pictures/ejercicios/fotos/16.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`dniEntrenador`) VALUES
('12345678Z'),
('33333333P'),
('66666666Q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador_deportista`
--

CREATE TABLE `entrenador_deportista` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estiramiento`
--

CREATE TABLE `estiramiento` (
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estiramiento`
--

INSERT INTO `estiramiento` (`idEjercicio`) VALUES
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estiramiento_tabla`
--

CREATE TABLE `estiramiento_tabla` (
  `id` bigint(20) NOT NULL,
  `idEstiramiento` bigint(20) NOT NULL,
  `idTabla` bigint(20) NOT NULL,
  `tiempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estiramiento_tabla`
--

INSERT INTO `estiramiento_tabla` (`id`, `idEstiramiento`, `idTabla`, `tiempo`) VALUES
(1, 8, 1, 36),
(2, 9, 2, 25),
(3, 10, 3, 12),
(4, 8, 4, 22),
(5, 8, 3, 24),
(6, 9, 3,55),
(7, 10, 2, 45),
(8, 9, 1, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idActividad`) VALUES
(54),
(55),
(56),
(57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` bigint(20) NOT NULL,
  `dia` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fechIni` date DEFAULT NULL,
  `fechFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `dia`, `hora`, `fechIni`, `fechFin`) VALUES
(29, 'Todos', '8:00 - 24:00', '2018-01-01', '2019-01-01'),
(30, 'Todos', '16:00 - 21:00', '2018-01-01', '2018-02-01'),
(31, 'Todos', '15:00-17:00', '2018-01-01', '2018-02-01'),
(32, 'Todos', '9:00 - 12:00', '2018-01-01', '2018-02-01'),
(33, 'Todos', '16:00 - 18:00', '2018-01-01', '2018-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `individual`
--

CREATE TABLE `individual` (
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `individual`
--

INSERT INTO `individual` (`idActividad`) VALUES
(53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrito`
--

CREATE TABLE `inscrito` (
  `idGrupo` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muscular`
--

CREATE TABLE `muscular` (
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `muscular`
--

INSERT INTO `muscular` (`idEjercicio`) VALUES
(11),
(12),
(13);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muscular_tabla`
--

CREATE TABLE `muscular_tabla` (
  `id` bigint(20) NOT NULL,
  `idMuscular` bigint(20) NOT NULL,
  `idTabla` bigint(20) NOT NULL,
  `carga` int(11) NOT NULL,
  `repeticiones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `muscular_tabla`
--

INSERT INTO `muscular_tabla` (`id`, `idMuscular`, `idTabla`, `carga`, `repeticiones`) VALUES
(1, 11, 1, 50, 23),
(2, 11, 2, 12, 12),
(3, 12, 3, 56, 234),
(4, 12, 4, 67, 56),
(5, 13, 2, 89, 65);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` bigint(20) NOT NULL,
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Asunto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idNotificacion`, `dniAdministrador`, `Asunto`, `contenido`, `fecha`) VALUES
(1, '44490816F', 'Notificación de Prueba', 'Esta es una notificación para probar el funcionamiento correcto del sistema de notificaciones', '2017-12-23 00:06:37'),
(2, '44497121X', 'Cambio Horario Fútbol', 'El horario cambia de los lunes y miércoles a las 5:00pm a las 7:00pm', '2017-12-27 00:06:37'),
(3, '44497121X', 'Abierto el plazo de inscripción para Baloncesto', 'Ya puede apuntarse a baloncesto. Para más información consulte la actividad desde el apartado de Actividades', '2017-12-28 00:06:37'),
(4, '44490816F', 'Vacaciones', 'Informamos a nuestros usuarios de que el gimnasio permanecerá cerrado durante todo el mes de julio por vacaciones del personal', '2017-12-29 00:06:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_deportista`
--

CREATE TABLE `notificacion_deportista` (
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idNotificacion` bigint(20) NOT NULL,
  `visto` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificacion_deportista`
--

INSERT INTO `notificacion_deportista` (`dniAdministrador`, `dniDeportista`, `idNotificacion`, `visto`) VALUES
('44490816F', '11111111H', 1, 0),
('44490816F', '22222222J', 1, 0),
('44490816F', '98765432M', 1, 0),
('44497121X', '22222222J', 2, 0),
('44497121X', '98765432M', 2, 0),
('44497121X', '22222222J', 3, 0),
('44497121X', '98765432M', 3, 0),
('44490816F', '22222222J', 4, 0),
('44490816F', '98765432M', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `importe` double NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idPago`, `dniDeportista`, `idActividad`, `importe`,`fecha`) VALUES
(2,'11111111H', 53, 50.20,'2017-12-26 00:06:37'),
(3,'22222222J', 53, 50.20,'2017-12-27 00:06:37'),
(4,'98765432M', 53, 50.20,'2017-12-27 00:06:37'),
(5,'22222222J', 54, 25.00,'2017-12-28 00:06:37'),
(6,'98765432M', 55, 20.45,'2017-12-29 00:06:37'),
(7,'22222222J', 56, 30.50,'2018-01-02 00:06:37'),
(8,'98765432M', 56, 30.50,'2018-01-05 00:06:37'),
(9,'98765432M', 54, 25.00,'2018-01-10 00:06:37'),
(10,'98765432M', 57, 30.99,'2018-01-14 00:06:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pef`
--

CREATE TABLE `pef` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioRevision` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pef`
--

INSERT INTO `pef` (`dni`, `tarjeta`, `comentarioRevision`) VALUES
('11111111H', '456', 'Problemas lumbares y cervicales moderados, no formar zona lumbar ni zona cervical.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `idRecurso` int(3) NOT NULL,
  `nombreRecurso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`idRecurso`, `nombreRecurso`, `observaciones`) VALUES
(1, 'Pista Tenis', 'Pista de hierba artificial'),
(2, 'Gimnasio', 'Gimnasio de 500m2'),
(3, 'Pabellón', 'Pabellón de 9000m2'),
(4, 'Campo Exterior', 'Campo de 1000m2'),
(5, 'Campo Interior', 'Campo de 100m2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento`
--

CREATE TABLE `sesionentrenamiento` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `duracion` float DEFAULT NULL,
  `fecha` date NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesionentrenamiento`
--

INSERT INTO `sesionentrenamiento` (`idSesionEntrenamiento`, `comentario`, `duracion`, `fecha`, `dniDeportista`) VALUES
(1, 'Malas sensaciones', 0.0166667, '2018-01-02', '98765432M'),
(2, 'Sensaciones inmejorables', 0.0833333, '2018-01-05', '98765432M'),
(3, '', 0.0833333, '2018-01-07', '98765432M'),
(4, 'Sensaciones mejorables', 0.0833333, '2018-01-15', '98765432M'),
(5, 'Me ahogo. AYUDA', 0.0166667, '2018-01-02', '11111111H'),
(6, 'Sensaciones inmejorables', 0.0833333, '2018-01-05', '11111111H'),
(7, '', 0.0833333, '2018-01-07', '11111111H'),
(8, 'Sensaciones mejorables', 0.0833333, '2018-01-15', '11111111H'),
(9, 'Malas sensaciones', 0.0166667, '2018-01-02', '22222222J'),
(10, 'Dolor pierna derecha', 0.0833333, '2018-01-05', '22222222J'),
(11, '', 0.0833333, '2018-01-07', '22222222J'),
(12, 'Sensaciones mejorables', 0.0833333, '2018-01-15', '22222222J');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento_tabla`
--

CREATE TABLE `sesionentrenamiento_tabla` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesionentrenamiento_tabla`
--

INSERT INTO `sesionentrenamiento_tabla` (`idSesionEntrenamiento`, `idTabla`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2),
(5, 1),
(6, 1),
(7, 4),
(8, 4),
(9, 3),
(10, 3),
(11, 3),
(12, 3);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario`
--

CREATE TABLE `superusuario` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superusuario`
--

INSERT INTO `superusuario` (`dniSuperUsuario`) VALUES
('12345678Z'),
('33333333P'),
('44490816F'),
('44497121X'),
('53192250N'),
('66666666Q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_ejercicio`
--

CREATE TABLE `superusuario_ejercicio` (
  `id` bigint(20) NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superusuario_ejercicio`
--

INSERT INTO `superusuario_ejercicio` (`id`, `dniSuperUsuario`, `idEjercicio`) VALUES
(8, '53192250N', 8),
(9, '44490816F', 9),
(10, '44497121X', 10),
(11, '53192250N', 11),
(12, '44490816F', 12),
(13, '44497121X', 13),
(14, '53192250N', 14),
(15, '44490816F', 15),
(16, '44497121X', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_individual`
--

CREATE TABLE `superusuario_individual` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superusuario_tabla_deportista`
--

INSERT INTO `superusuario_individual` (`dniSuperUsuario`, `idActividad`) VALUES
('44497121X', 53);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_tabla_deportista`
--

CREATE TABLE `superusuario_tabla_deportista` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superusuario_tabla_deportista`
--

INSERT INTO `superusuario_tabla_deportista` (`dniSuperUsuario`, `dniDeportista`, `idTabla`) VALUES
('53192250N', '11111111H', 4),
('44497121X', '98765432M', 2),
('53192250N', '11111111H', 1),
('44497121X', '98765432M', 1),
('53192250N', '22222222J', 3),
('44497121X', '98765432M', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `idTabla` bigint(20) NOT NULL,
  `tipo` enum('estandar','personalizada') COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla`
--

INSERT INTO `tabla` (`idTabla`, `tipo`, `comentario`, `nombre`, `dniSuperUsuario`) VALUES
(1, 'estandar', 'Tabla de dificultad media, no apta si el deportista padece asma', 'Tabla1', '53192250N'),
(2, 'personalizada', 'Tabla de estiramientos y fortalecimiento muscular', 'Tabla 2', '44497121X'),
(3, 'estandar', 'Tabla de dificultad alta, repertorio amplio de ejercicios variados.', 'Tabla Completa', '53192250N'),
(4, 'estandar', 'Tabla de alta dificultad. Sólo para los mejores deportistas', 'Tabla Profesional', '44490816F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdu`
--

CREATE TABLE `tdu` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tdu`
--

INSERT INTO `tdu` (`dni`, `tarjeta`) VALUES
('22222222J', '555999888P'),
('98765432M', '383828239O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` tinyint(4) DEFAULT NULL,
  `contrasena` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `fotoperfil` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellidos`, `edad`, `contrasena`, `email`, `telefono`, `fechaAlta`, `fotoperfil`) VALUES
('11111111H', 'Manuel', 'Pérez López', 23, 'e10adc3949ba59abbe56e057f20f883e', 'manuel@gmail.com', '666333222', '2018-01-02', 'ABP/../View/pictures/usuarios/fotoperfil/11111111H.png'),
('12345678Z', 'Entrenador2', 'Entrenador2', 28, 'e10adc3949ba59abbe56e057f20f883e', 'entrenador2@hotmail.com', '123456789', '2017-12-22', 'ABP/../View/pictures/usuarios/fotoperfil/12345678Z.png'),
('22222222J', 'Antonio', 'De la Iglesia Rodríguez', 35, 'e10adc3949ba59abbe56e057f20f883e', 'antonio@iglesia.es', '666000222', '2018-01-02', 'ABP/../View/pictures/usuarios/fotoperfil/22222222J.png'),
('33333333P', 'Entrenador', 'Entrenador Entrenador', 30, 'e10adc3949ba59abbe56e057f20f883e', 'entrenador@gmail.com', '666666666', '2017-11-08', 'ABP/../View/pictures/usuarios/fotoperfil/33333333P.png'),
('44490816F', 'Daniel', 'Rodríguez Domínguez', 25, 'e10adc3949ba59abbe56e057f20f883e', 'danieldrd@outlook.es', '123456789', '2017-11-08', 'ABP/../View/pictures/usuarios/fotoperfil/44490816F.png'),
('44497121X', 'Adrián', 'Souto Fariñas', 65, 'e10adc3949ba59abbe56e057f20f883e', 'adriansouto2@gmail.com', '6546546546', '2017-11-06', 'ABP/../View/pictures/usuarios/fotoperfil/44497121X.png'),
('53192250N', 'Alexandre', 'Viana Sixto', 28, 'e10adc3949ba59abbe56e057f20f883e', 'vianasixtoalexandre@gmail.com', '666000222', '2018-01-02', 'ABP/../View/pictures/usuarios/fotoperfil/53192250N.png'),
('66666666Q', 'Álvaro', 'Iglesias Alvaricoque', 34, 'e10adc3949ba59abbe56e057f20f883e', 'entrenador3@hotmail.com', '123456789', '2017-12-22', 'ABP/../View/pictures/usuarios/fotoperfil/66666666Q.png'),
('98765432M', 'Marco', 'Aurelio', 25, 'e10adc3949ba59abbe56e057f20f883e', 'marcoaurelio@gmail.com', '123456789', '2017-11-08', 'ABP/../View/pictures/usuarios/fotoperfil/98765432M.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `idActividad` (`idActividad`),
  ADD KEY `fk_ActividadRecurso` (`idInstalaciones`);

--
-- Indices de la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idActividadDeportista` (`idActividad`),
  ADD KEY `fk_dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `actividad_entrenador`
--
ALTER TABLE `actividad_entrenador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividadEntrenador2` (`idActividad`),
  ADD KEY `fk_actividadEntrenador1` (`dniEntrenador`);

--
-- Indices de la tabla `actividad_horario`
--
ALTER TABLE `actividad_horario`
  ADD PRIMARY KEY (`idActividad`,`idHorario`),
  ADD UNIQUE KEY `idActividad` (`idActividad`),
  ADD UNIQUE KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`dniAdministrador`),
  ADD UNIQUE KEY `dniAdministrador` (`dniAdministrador`);

--
-- Indices de la tabla `cardio`
--
ALTER TABLE `cardio`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `cardio_tabla`
--
ALTER TABLE `cardio_tabla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cardioTabla1` (`idCardio`),
  ADD KEY `fk_cardioTabla2` (`idTabla`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`idEjercicio`),
  ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`dniEntrenador`),
  ADD UNIQUE KEY `dniEntrenador` (`dniEntrenador`);

--
-- Indices de la tabla `entrenador_deportista`
--
ALTER TABLE `entrenador_deportista`
  ADD PRIMARY KEY (`dniEntrenador`,`dniDeportista`),
  ADD UNIQUE KEY `dniEntrenador` (`dniEntrenador`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `estiramiento`
--
ALTER TABLE `estiramiento`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `estiramiento_tabla`
--
ALTER TABLE `estiramiento_tabla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estiramientoTabla1` (`idEstiramiento`),
  ADD KEY `fk_estiramientoTabla2` (`idTabla`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`),
  ADD UNIQUE KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indices de la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD PRIMARY KEY (`idGrupo`,`dniDeportista`),
  ADD UNIQUE KEY `idGrupo` (`idGrupo`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `muscular`
--
ALTER TABLE `muscular`
  ADD PRIMARY KEY (`idEjercicio`),
  ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `muscular_tabla`
--
ALTER TABLE `muscular_tabla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_muscularTabla1` (`idMuscular`),
  ADD KEY `fk_muscularTabla2` (`idTabla`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD UNIQUE KEY `idNotificacion` (`idNotificacion`),
  ADD KEY `dniAdministrador` (`dniAdministrador`);

--
-- Indices de la tabla `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
  ADD PRIMARY KEY (`idNotificacion`,`dniDeportista`),
  ADD KEY `idNotificacion` (`idNotificacion`),
  ADD KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD UNIQUE KEY `idPago` (`idPago`),
  ADD KEY `fk_PagoDeportista` (`dniDeportista`);

--
-- Indices de la tabla `pef`
--
ALTER TABLE `pef`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`idRecurso`),
  ADD UNIQUE KEY `idRecurso` (`idRecurso`);

--
-- Indices de la tabla `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
  ADD PRIMARY KEY (`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`),
  ADD KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
  ADD PRIMARY KEY (`idSesionEntrenamiento`,`idTabla`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`),
  ADD KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `superusuario`
--
ALTER TABLE `superusuario`
  ADD PRIMARY KEY (`dniSuperUsuario`),
  ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`);

--
-- Indices de la tabla `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_SuperusuarioEjercicio` (`idEjercicio`),
  ADD KEY `fk_dniSuperUsuarioS` (`dniSuperUsuario`);

--
-- Indices de la tabla `superusuario_individual`
--
ALTER TABLE `superusuario_individual`
  ADD PRIMARY KEY (`dniSuperUsuario`,`idActividad`),
  ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `superusuario_tabla_deportista`
--
ALTER TABLE `superusuario_tabla_deportista`
  ADD PRIMARY KEY (`dniSuperUsuario`,`dniDeportista`,`idTabla`),
  ADD KEY `dniSuperUsuario` (`dniSuperUsuario`),
  ADD KEY `dniDeportista` (`dniDeportista`),
  ADD KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD PRIMARY KEY (`idTabla`),
  ADD UNIQUE KEY `idTabla` (`idTabla`),
  ADD KEY `fk_TablaSuperUsuario` (`dniSuperUsuario`);

--
-- Indices de la tabla `tdu`
--
ALTER TABLE `tdu`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `actividad_entrenador`
--
ALTER TABLE `actividad_entrenador`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `cardio_tabla`
--
ALTER TABLE `cardio_tabla`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estiramiento_tabla`
--
ALTER TABLE `estiramiento_tabla`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `muscular_tabla`
--
ALTER TABLE `muscular_tabla`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `idRecurso` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
  MODIFY `idSesionEntrenamiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tabla`
--
ALTER TABLE `tabla`
  MODIFY `idTabla` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_ActividadRecurso` FOREIGN KEY (`idInstalaciones`) REFERENCES `recursos` (`idRecurso`) ON DELETE CASCADE;

--
-- Filtros para la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  ADD CONSTRAINT `fk_dniDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idActividadDeportista` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `actividad_entrenador`
--
ALTER TABLE `actividad_entrenador`
  ADD CONSTRAINT `fk_actividadEntrenador1` FOREIGN KEY (`dniEntrenador`) REFERENCES `entrenador` (`dniEntrenador`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_actividadEntrenador2` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `actividad_horario`
--
ALTER TABLE `actividad_horario`
  ADD CONSTRAINT `fk_ActHorario` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ActividadAc` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_AdministradoSuperUsuario` FOREIGN KEY (`dniAdministrador`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cardio`
--
ALTER TABLE `cardio`
  ADD CONSTRAINT `fk_CardioEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cardio_tabla`
--
ALTER TABLE `cardio_tabla`
  ADD CONSTRAINT `fk_cardioTabla1` FOREIGN KEY (`idCardio`) REFERENCES `cardio` (`idEjercicio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cardioTabla2` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE;

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `fk_DeportistaUsuario` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `fk_EntrenadorSuperUsuario` FOREIGN KEY (`dniEntrenador`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrenador_deportista`
--
ALTER TABLE `entrenador_deportista`
  ADD CONSTRAINT `fk_EntrenadorDerportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Entrenador_Entrenador` FOREIGN KEY (`dniEntrenador`) REFERENCES `entrenador` (`dniEntrenador`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estiramiento`
--
ALTER TABLE `estiramiento`
  ADD CONSTRAINT `fk_EstiramientoEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estiramiento_tabla`
--
ALTER TABLE `estiramiento_tabla`
  ADD CONSTRAINT `fk_estiramientoTabla1` FOREIGN KEY (`idEstiramiento`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_estiramientoTabla2` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_Grupo_Actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `individual`
--
ALTER TABLE `individual`
  ADD CONSTRAINT `fk_Individual_Actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD CONSTRAINT `fk_InscritoGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `muscular`
--
ALTER TABLE `muscular`
  ADD CONSTRAINT `fk_MuscularEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `muscular_tabla`
--
ALTER TABLE `muscular_tabla`
  ADD CONSTRAINT `fk_muscularTabla1` FOREIGN KEY (`idMuscular`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_muscularTabla2` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_NotificacionAdministrador` FOREIGN KEY (`dniAdministrador`) REFERENCES `administrador` (`dniAdministrador`);

--
-- Filtros para la tabla `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
  ADD CONSTRAINT `fk_NotificacionDeportista` FOREIGN KEY (`idNotificacion`) REFERENCES `notificacion` (`idNotificacion`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_PagoDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pef`
--
ALTER TABLE `pef`
  ADD CONSTRAINT `fk_PefDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
  ADD CONSTRAINT `fk_SesionEntrenamientoDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
  ADD CONSTRAINT `fk_SesionEntrenamientoS` FOREIGN KEY (`idSesionEntrenamiento`) REFERENCES `sesionentrenamiento` (`idSesionEntrenamiento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SesionEntrenamientoTabla` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE;

--
-- Filtros para la tabla `superusuario`
--
ALTER TABLE `superusuario`
  ADD CONSTRAINT `fk_SuperUsuario` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
  ADD CONSTRAINT `fk_SuperusuarioEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dniSuperUsuarioS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `superusuario_individual`
--
ALTER TABLE `superusuario_individual`
  ADD CONSTRAINT `fk_SuperUsuarioIndividual` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SuperUsuarioIndividualL` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `superusuario_tabla_deportista`
--
ALTER TABLE `superusuario_tabla_deportista`
  ADD CONSTRAINT `FK_SuperUsuarioTab` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SuperUsuarioTablaDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SuperUsuarioTalaS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD CONSTRAINT `fk_TablaSuperUsuario` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `tdu`
--
ALTER TABLE `tdu`
  ADD CONSTRAINT `fk_TduDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
