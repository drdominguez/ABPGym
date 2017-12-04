-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2017 a las 11:11:01
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
-- Database: `GYMESEI2`
--

-- --------------------------------------------------------
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
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idInstalaciones` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idActividad`, `precio`, `nombre`, `idInstalaciones`) VALUES
(3, 40, 'Gymnasio del Carmen', 0),
(4, 35, 'Gymnasio Trabazos', 0),
(5, 20, 'Fútbol', 0),
(6, 15, 'Baloncesto', 0),
(7, 42, 'Karate', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_deportista`
--

CREATE TABLE `actividad_deportista` (
  `idActividad` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_horario`
--

CREATE TABLE `actividad_horario` (
  `idActividad` bigint(20) NOT NULL,
  `idHorario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `idEjercicio` bigint(20) NOT NULL,
  `tiempo` smallint(6) DEFAULT NULL,
  `unidad` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distancia` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cardio`
--

INSERT INTO `cardio` (`idEjercicio`, `tiempo`, `unidad`, `distancia`) VALUES
(6, 60, 'Minutos', 5000),
(7, 20, 'Segundos', 0);

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
('22222222J');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` bigint(20) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `video` binary(1) DEFAULT NULL,
  `imagen` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`idEjercicio`, `nombre`, `descripcion`, `video`, `imagen`) VALUES
(1, 'Estiramiento de Biceps', 'Estirar ambos biceps', 0x00, 0x00),
(2, 'Estiramiento de gemelos', 'estirar ambos gemelos en las espalderas', 0x00, 0x00),
(3, 'Estiramiento de cuadriceps', ' Mantén la posición uno o dos segundos y después vuelve a la situación de reposo. Repite todo el movimiento 10 veces con cada pierna', 0x00, 0x00),
(4, 'Pesas pectorales', 'realizar levantamiento en la banca de pesas', 0x00, 0x00),
(5, 'Fortalecimiento de triceps', 'levantar las pesas desde la espalda con el codo a 90 grados', 0x00, 0x00),
(6, 'Ruta 5km', 'Recorrer la ruta 5 en  1 hora', 0x00, 0x00),
(7, 'spring', 'Realizar 5 series del tiempo especificado', 0x00, 0x00);

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
('33333333P');

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
  `idEjercicio` bigint(20) NOT NULL,
  `tiempo` smallint(6) NOT NULL,
  `unidad` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estiramiento`
--

INSERT INTO `estiramiento` (`idEjercicio`, `tiempo`, `unidad`) VALUES
(1, 15, 'Segundos'),
(2, 1, 'Minutos'),
(3, 2, 'Minutos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idActividad` bigint(20) NOT NULL,
  `instalaciones` text COLLATE utf8_spanish_ci,
  `plazas` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idActividad`, `instalaciones`, `plazas`) VALUES
(5, 'Pabellon Municipal', 12),
(6, 'Pabellón del Carmen (Vigo)', 9),
(7, 'Gimnasio Okinawa', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` bigint(20) NOT NULL,
  `localizacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(3),
(4);

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
  `idEjercicio` bigint(20) NOT NULL,
  `carga` smallint(6) NOT NULL,
  `repeticiones` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `muscular`
--

INSERT INTO `muscular` (`idEjercicio`, `carga`, `repeticiones`) VALUES
(4, 25, 15),
(5, 1, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` bigint(20) NOT NULL,
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Asunto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pef`
--

CREATE TABLE `pef` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioRevision` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `idRecurso` int(3) NOT NULL,
  `nombreRecurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento`
--

CREATE TABLE `sesionentrenamiento` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `duracion` bigint(20) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento_tabla`
--

CREATE TABLE `sesionentrenamiento_tabla` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
('33333333P'),
('44490816F'),
('44497121X'),
('53192250N');

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
(1, '53192250N', 1),
(2, '53192250N', 2),
(3, '53192250N', 3),
(4, '53192250N', 4),
(5, '53192250N', 5),
(6, '53192250N', 6),
(7, '53192250N', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_individual`
--

CREATE TABLE `superusuario_individual` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_tabla_deportista`
--

CREATE TABLE `superusuario_tabla_deportista` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `idTabla` bigint(20) NOT NULL,
  `tipo` enum('estandar','personalizada') COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla`
--

INSERT INTO `tabla` (`idTabla`, `tipo`, `comentario`, `nombre`, `dniSuperUsuario`) VALUES
(1, 'estandar', 'Tabla de dificultad media, no apta si el deportista padece asma', 'Tabla1', '53192250N'),
(2, 'personalizada', 'Tabla de estiramientos y fortalecimiento muscular', 'Tabla2', '53192250N'),
(3, 'estandar', 'Tabla de dificultad alta, repertorio amplio de ejercicios variados.', 'Tabla Completa', '53192250N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_ejercicios`
--

CREATE TABLE `tabla_ejercicios` (
  `idTabla` bigint(20) NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla_ejercicios`
--

INSERT INTO `tabla_ejercicios` (`idTabla`, `idEjercicio`) VALUES
(2, 1),
(3, 1),
(1, 2),
(3, 2),
(1, 3),
(3, 3),
(2, 4),
(3, 4),
(2, 5),
(3, 5),
(1, 6),
(3, 6),
(1, 7),
(3, 7);

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
('11111111H', '65as564653a'),
('22222222J', '65as564653a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` tinyint(4) DEFAULT NULL,
  `contrasena` varchar(128) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaAlta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellidos`, `edad`, `contrasena`, `email`, `telefono`, `fechaAlta`) VALUES
('11111111H', 'TDU', 'TDU', 25, 'e10adc3949ba59abbe56e057f20f883e', 'email@gmail.com', '666666666', '2017-11-08'),
('22222222J', 'PEF', 'PEF', 25, 'e10adc3949ba59abbe56e057f20f883e', 'email@gmail.com', '666666666', '2017-11-08'),
('33333333P', 'Entrenador', 'Entrenador Entrenador', 30, 'e10adc3949ba59abbe56e057f20f883e', 'entrenador@gmail.com', '666666666', '2017-11-08'),
('44490816F', 'Daniel', 'Rodríguez Domínguez', 25, 'e10adc3949ba59abbe56e057f20f883e', 'danieldrd@outlook.es', '123456789', '2017-11-08'),
('44497121X', 'Adrián', 'Souto Fariñas', 65, 'e10adc3949ba59abbe56e057f20f883e', 'adriansouto2@gmail.com', '6546546546', '2017-11-06'),
('53192250N', 'Alexandre', 'Viana Sixto', 28, 'e10adc3949ba59abbe56e057f20f883e', 'vianasixtoalexandre@gmail.com', '646089168', '2017-11-08'),
('98765432M', 'Marco', 'Aurelio', 25, 'e10adc3949ba59abbe56e057f20f883e', 'marcoaurelio@gmail.com', '123456789', '2017-11-08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  ADD PRIMARY KEY (`idActividad`,`dniDeportista`),
  ADD UNIQUE KEY `idActividad` (`idActividad`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

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
  ADD PRIMARY KEY (`idRecurso`);

--
-- Indices de la tabla `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
  ADD PRIMARY KEY (`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`);

--
-- Indices de la tabla `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
  ADD PRIMARY KEY (`idSesionEntrenamiento`,`idTabla`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idTabla` (`idTabla`);

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
  ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`),
  ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD UNIQUE KEY `idTabla` (`idTabla`),
  ADD KEY `fk_TablaSuperUsuario` (`dniSuperUsuario`);

--
-- Indices de la tabla `tabla_ejercicios`
--
ALTER TABLE `tabla_ejercicios`
  ADD PRIMARY KEY (`idTabla`,`idEjercicio`),
  ADD KEY `fk_Tabla_Ejercicios` (`idEjercicio`);

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
  MODIFY `idActividad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `idRecurso` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tabla`
--
ALTER TABLE `tabla`
  MODIFY `idTabla` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  ADD CONSTRAINT `fk_ActividadDeportista` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `actividad_horario`
--
ALTER TABLE `actividad_horario`
  ADD CONSTRAINT `fk_ActHorario` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`),
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
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_NotificacionAdministrador` FOREIGN KEY (`dniAdministrador`) REFERENCES `administrador` (`dniAdministrador`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
  ADD CONSTRAINT `fk_NotificacionDeportista` FOREIGN KEY (`idNotificacion`) REFERENCES `notificacion` (`idNotificacion`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `fk_dniSuperUsuarioS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `fk_SuperUsuarioTalaS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD CONSTRAINT `fk_TablaSuperUsuario` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tabla_ejercicios`
--
ALTER TABLE `tabla_ejercicios`
  ADD CONSTRAINT `fk_TablaT_Ejercicios` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Tabla_Ejercicios` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tdu`
--
ALTER TABLE `tdu`
  ADD CONSTRAINT `fk_TduDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
