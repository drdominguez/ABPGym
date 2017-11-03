-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2017 a las 00:23:46
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `GYMESEI2`
--

-- --------------------------------------------------------
DROP DATABASE IF EXISTS `GYMESEI2`;
CREATE DATABASE IF NOT EXISTS `GYMESEI2` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `GYMESEI2`;
--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `idActividad` bigint(20) NOT NULL,
  `precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_deportista`
--

CREATE TABLE IF NOT EXISTS `actividad_deportista` (
  `idActividad` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_horario`
--

CREATE TABLE IF NOT EXISTS `actividad_horario` (
  `idActividad` bigint(20) NOT NULL,
  `idHorario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dniAdministrador`) VALUES
('44497121X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cardio`
--

CREATE TABLE IF NOT EXISTS `cardio` (
  `idEjercicio` bigint(20) NOT NULL,
  `tiempo` smallint(6) DEFAULT NULL,
  `unidad` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distancia` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE IF NOT EXISTS `deportista` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicio` (
  `idEjercicio` bigint(20) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `video` binary(1) DEFAULT NULL,
  `imagen` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE IF NOT EXISTS `entrenador` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador_deportista`
--

CREATE TABLE IF NOT EXISTS `entrenador_deportista` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estiramiento`
--

CREATE TABLE IF NOT EXISTS `estiramiento` (
  `idEjercicio` bigint(20) NOT NULL,
  `tiempo` smallint(6) DEFAULT NULL,
  `unidad` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distancia` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idActividad` bigint(20) NOT NULL,
  `instalaciones` text COLLATE utf8_spanish_ci,
  `plazas` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `idHorario` bigint(20) NOT NULL,
  `localizacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `individual`
--

CREATE TABLE IF NOT EXISTS `individual` (
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrito`
--

CREATE TABLE IF NOT EXISTS `inscrito` (
  `idGrupo` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muscular`
--

CREATE TABLE IF NOT EXISTS `muscular` (
  `idEjercicio` bigint(20) NOT NULL,
  `carga` smallint(6) NOT NULL,
  `repeticiones` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `idNotificacion` bigint(20) NOT NULL,
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Asunto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contenido` text COLLATE utf8_spanish_ci,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`idNotificacion`, `dniAdministrador`, `Asunto`, `contenido`, `fecha`) VALUES
(1, '44497121X', 'prueba1', 'lkjahfkjsdbfkjadsbfkhasdbfhkadsbfhjksadb', '2017-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_deportista`
--

CREATE TABLE IF NOT EXISTS `notificacion_deportista` (
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idnotificacion` bigint(20) NOT NULL,
  `visto` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `idPago` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `importe` double DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pef`
--

CREATE TABLE IF NOT EXISTS `pef` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioRivision` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento`
--

CREATE TABLE IF NOT EXISTS `sesionentrenamiento` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `duracion` bigint(20) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento_individual`
--

CREATE TABLE IF NOT EXISTS `sesionentrenamiento_individual` (
  `idActividad` bigint(20) NOT NULL,
  `idSesionEntrenamiento` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesionentrenamiento_tabla`
--

CREATE TABLE IF NOT EXISTS `sesionentrenamiento_tabla` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario`
--

CREATE TABLE IF NOT EXISTS `superusuario` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `superusuario`
--

INSERT INTO `superusuario` (`dniSuperUsuario`) VALUES
('44497121X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_ejercicio`
--

CREATE TABLE IF NOT EXISTS `superusuario_ejercicio` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_individual`
--

CREATE TABLE IF NOT EXISTS `superusuario_individual` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_tabla_deportista`
--

CREATE TABLE IF NOT EXISTS `superusuario_tabla_deportista` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE IF NOT EXISTS `tabla` (
  `idTabla` bigint(20) NOT NULL,
  `tipo` bit(1) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_ejercicios`
--

CREATE TABLE IF NOT EXISTS `tabla_ejercicios` (
  `idTabla` bigint(20) NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdu`
--

CREATE TABLE IF NOT EXISTS `tdu` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
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
('44497121X', 'Adrián', 'Souto Fariñas', 21, 'e10adc3949ba59abbe56e057f20f883e', 'adriansouto2@gmail.com', '656498500', '2017-11-14'),
('98765432X', 'Marco', 'Aurelio', 25, 'e10adc3949ba59abbe56e057f20f883e', 'marcoaurelio@gmail.com', '123456789', '2017-11-08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
 ADD PRIMARY KEY (`idActividad`), ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
 ADD PRIMARY KEY (`idActividad`,`dniDeportista`), ADD UNIQUE KEY `idActividad` (`idActividad`), ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `actividad_horario`
--
ALTER TABLE `actividad_horario`
 ADD PRIMARY KEY (`idActividad`,`idHorario`), ADD UNIQUE KEY `idActividad` (`idActividad`), ADD UNIQUE KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`dniAdministrador`), ADD UNIQUE KEY `dniAdministrador` (`dniAdministrador`);

--
-- Indices de la tabla `cardio`
--
ALTER TABLE `cardio`
 ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `deportista`
--
ALTER TABLE `deportista`
 ADD PRIMARY KEY (`dni`), ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
 ADD PRIMARY KEY (`idEjercicio`), ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
 ADD PRIMARY KEY (`dniEntrenador`), ADD UNIQUE KEY `dniEntrenador` (`dniEntrenador`);

--
-- Indices de la tabla `entrenador_deportista`
--
ALTER TABLE `entrenador_deportista`
 ADD PRIMARY KEY (`dniEntrenador`,`dniDeportista`), ADD UNIQUE KEY `dniEntrenador` (`dniEntrenador`), ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `estiramiento`
--
ALTER TABLE `estiramiento`
 ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`idActividad`), ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
 ADD PRIMARY KEY (`idHorario`), ADD UNIQUE KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `individual`
--
ALTER TABLE `individual`
 ADD PRIMARY KEY (`idActividad`);

--
-- Indices de la tabla `inscrito`
--
ALTER TABLE `inscrito`
 ADD PRIMARY KEY (`idGrupo`,`dniDeportista`), ADD UNIQUE KEY `idGrupo` (`idGrupo`), ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `muscular`
--
ALTER TABLE `muscular`
 ADD PRIMARY KEY (`idEjercicio`), ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
 ADD PRIMARY KEY (`idNotificacion`), ADD UNIQUE KEY `idNotificacion` (`idNotificacion`), ADD UNIQUE KEY `dniAdministrador` (`dniAdministrador`);

--
-- Indices de la tabla `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
 ADD PRIMARY KEY (`dniAdministrador`,`dniDeportista`), ADD UNIQUE KEY `dniAdministrador` (`dniAdministrador`), ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`idPago`), ADD UNIQUE KEY `idPago` (`idPago`), ADD UNIQUE KEY `dniDeportista` (`dniDeportista`), ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `pef`
--
ALTER TABLE `pef`
 ADD PRIMARY KEY (`dni`), ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
 ADD PRIMARY KEY (`idSesionEntrenamiento`), ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`), ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `sesionentrenamiento_individual`
--
ALTER TABLE `sesionentrenamiento_individual`
 ADD PRIMARY KEY (`idActividad`,`idSesionEntrenamiento`), ADD UNIQUE KEY `idActividad` (`idActividad`), ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`);

--
-- Indices de la tabla `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
 ADD PRIMARY KEY (`idSesionEntrenamiento`,`idTabla`), ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`), ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `superusuario`
--
ALTER TABLE `superusuario`
 ADD PRIMARY KEY (`dniSuperUsuario`), ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`);

--
-- Indices de la tabla `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
 ADD PRIMARY KEY (`dniSuperUsuario`,`idEjercicio`), ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`), ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indices de la tabla `superusuario_individual`
--
ALTER TABLE `superusuario_individual`
 ADD PRIMARY KEY (`dniSuperUsuario`,`idActividad`), ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`), ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `superusuario_tabla_deportista`
--
ALTER TABLE `superusuario_tabla_deportista`
 ADD PRIMARY KEY (`dniSuperUsuario`,`dniDeportista`,`idTabla`), ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`), ADD UNIQUE KEY `dniDeportista` (`dniDeportista`), ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
 ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indices de la tabla `tabla_ejercicios`
--
ALTER TABLE `tabla_ejercicios`
 ADD PRIMARY KEY (`idTabla`,`idEjercicio`), ADD KEY `fk_Tabla_Ejercicios` (`idEjercicio`);

--
-- Indices de la tabla `tdu`
--
ALTER TABLE `tdu`
 ADD PRIMARY KEY (`dni`), ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`dni`), ADD UNIQUE KEY `dni` (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
ADD CONSTRAINT `fk_ActividadDeportista` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`);

--
-- Filtros para la tabla `actividad_horario`
--
ALTER TABLE `actividad_horario`
ADD CONSTRAINT `fk_ActHorario` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`),
ADD CONSTRAINT `fk_ActividadAc` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`);

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
ADD CONSTRAINT `fk_AdministradoSuperUsuario` FOREIGN KEY (`dniAdministrador`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `cardio`
--
ALTER TABLE `cardio`
ADD CONSTRAINT `fk_CardioEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`);

--
-- Filtros para la tabla `deportista`
--
ALTER TABLE `deportista`
ADD CONSTRAINT `fk_DeportistaUsuario` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`);

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
ADD CONSTRAINT `fk_EntrenadorSuperUsuario` FOREIGN KEY (`dniEntrenador`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `entrenador_deportista`
--
ALTER TABLE `entrenador_deportista`
ADD CONSTRAINT `fk_EntrenadorDerportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`),
ADD CONSTRAINT `fk_Entrenador_Entrenador` FOREIGN KEY (`dniEntrenador`) REFERENCES `entrenador` (`dniEntrenador`);

--
-- Filtros para la tabla `estiramiento`
--
ALTER TABLE `estiramiento`
ADD CONSTRAINT `fk_EstiramientoEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
ADD CONSTRAINT `fk_Grupo_Actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`);

--
-- Filtros para la tabla `individual`
--
ALTER TABLE `individual`
ADD CONSTRAINT `fk_Individual_Actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`);

--
-- Filtros para la tabla `inscrito`
--
ALTER TABLE `inscrito`
ADD CONSTRAINT `fk_InscritoGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idActividad`);

--
-- Filtros para la tabla `muscular`
--
ALTER TABLE `muscular`
ADD CONSTRAINT `fk_MuscularEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
ADD CONSTRAINT `fk_NotificacionAdministrador` FOREIGN KEY (`dniAdministrador`) REFERENCES `administrador` (`dniAdministrador`);

--
-- Filtros para la tabla `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
ADD CONSTRAINT `fk_NotificacionDeportista` FOREIGN KEY (`dniAdministrador`) REFERENCES `administrador` (`dniAdministrador`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
ADD CONSTRAINT `fk_PagoDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`);

--
-- Filtros para la tabla `pef`
--
ALTER TABLE `pef`
ADD CONSTRAINT `fk_PefDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`);

--
-- Filtros para la tabla `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
ADD CONSTRAINT `fk_SesionEntrenamientoIndividual` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`);

--
-- Filtros para la tabla `sesionentrenamiento_individual`
--
ALTER TABLE `sesionentrenamiento_individual`
ADD CONSTRAINT `fk_EntrenamientoSIndividual` FOREIGN KEY (`idSesionEntrenamiento`) REFERENCES `sesionentrenamiento` (`idSesionEntrenamiento`),
ADD CONSTRAINT `fk_SesionEntrenamiento_Individual` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`);

--
-- Filtros para la tabla `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
ADD CONSTRAINT `fk_SesionEntrenamientoS` FOREIGN KEY (`idSesionEntrenamiento`) REFERENCES `sesionentrenamiento` (`idSesionEntrenamiento`),
ADD CONSTRAINT `fk_SesionEntrenamientoTabla` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`);

--
-- Filtros para la tabla `superusuario`
--
ALTER TABLE `superusuario`
ADD CONSTRAINT `fk_SuperUsuario` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `usuario` (`dni`);

--
-- Filtros para la tabla `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
ADD CONSTRAINT `fk_SuperusuarioEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`),
ADD CONSTRAINT `fk_dniSuperUsuarioS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `superusuario_individual`
--
ALTER TABLE `superusuario_individual`
ADD CONSTRAINT `fk_SuperUsuarioIndividual` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`),
ADD CONSTRAINT `fk_SuperUsuarioIndividualL` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`);

--
-- Filtros para la tabla `superusuario_tabla_deportista`
--
ALTER TABLE `superusuario_tabla_deportista`
ADD CONSTRAINT `FK_SuperUsuarioTab` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`),
ADD CONSTRAINT `fk_SuperUsuarioTablaDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`),
ADD CONSTRAINT `fk_SuperUsuarioTalaS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`);

--
-- Filtros para la tabla `tabla_ejercicios`
--
ALTER TABLE `tabla_ejercicios`
ADD CONSTRAINT `fk_TablaT_Ejercicios` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`),
ADD CONSTRAINT `fk_Tabla_Ejercicios` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`);

--
-- Filtros para la tabla `tdu`
--
ALTER TABLE `tdu`
ADD CONSTRAINT `fk_TduDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
