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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_deportista`
--

CREATE TABLE `actividad_deportista` (
  `id` bigint(20) NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_entrenador`
--

CREATE TABLE `actividad_entrenador` (
  `id` bigint(20) NOT NULL,
  `dniEntrenador` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL
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


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cardio`
--

CREATE TABLE `cardio` (
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


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


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE `deportista` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `individual`
--

CREATE TABLE `individual` (
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `nombreRecurso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


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


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superusuario_ejercicio`
--

CREATE TABLE `superusuario_ejercicio` (
  `id` bigint(20) NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


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
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdu`
--

CREATE TABLE `tdu` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
