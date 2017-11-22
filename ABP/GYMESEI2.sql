-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2017 at 03:24 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.7

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
--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` bigint(20) NOT NULL,
  `precio` double DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `actividad_deportista`
--

CREATE TABLE `actividad_deportista` (
  `idActividad` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `actividad_horario`
--

CREATE TABLE `actividad_horario` (
  `idActividad` bigint(20) NOT NULL,
  `idHorario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardio`
--

CREATE TABLE `cardio` (
  `idEjercicio` bigint(20) NOT NULL,
  `tiempo` smallint(6) DEFAULT NULL,
  `unidad` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distancia` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deportista`
--

CREATE TABLE `deportista` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ejercicio`
--

CREATE TABLE `ejercicio` (
  `idEjercicio` bigint(20) NOT NULL ,
  `nombre` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `video` binary(1) DEFAULT NULL,
  `imagen` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrenador`
--

CREATE TABLE `entrenador` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrenador_deportista`
--

CREATE TABLE `entrenador_deportista` (
  `dniEntrenador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estiramiento`
--

CREATE TABLE `estiramiento` (
  `idEjercicio` bigint(20) NOT NULL,
  `tiempo` smallint(6) NOT NULL,
  `unidad` varchar(8) COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `idActividad` bigint(20) NOT NULL,
  `instalaciones` text COLLATE utf8_spanish_ci,
  `plazas` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `idHorario` bigint(20) NOT NULL ,
  `localizacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `dia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscrito`
--

CREATE TABLE `inscrito` (
  `idGrupo` bigint(20) NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `muscular`
--

CREATE TABLE `muscular` (
  `idEjercicio` bigint(20) NOT NULL,
  `carga` smallint(6) NOT NULL,
  `repeticiones` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificacion`
--

CREATE TABLE `notificacion` (
  `idNotificacion` bigint(20) NOT NULL ,
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Asunto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificacion_deportista`
--

CREATE TABLE `notificacion_deportista` (
  `dniAdministrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idNotificacion` bigint(20) NOT NULL,
  `visto` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `idPago` bigint(20) NOT NULL ,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `importe` double NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pef`
--

CREATE TABLE `pef` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `comentarioRivision` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sesionentrenamiento`
--

CREATE TABLE `sesionentrenamiento` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `idActividad` bigint(20) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `duracion` bigint(20) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sesionentrenamiento_individual`
--

CREATE TABLE `sesionentrenamiento_individual` (
  `idActividad` bigint(20) NOT NULL,
  `idSesionEntrenamiento` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sesionentrenamiento_tabla`
--

CREATE TABLE `sesionentrenamiento_tabla` (
  `idSesionEntrenamiento` bigint(20) NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superusuario`
--

CREATE TABLE `superusuario` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superusuario_ejercicio`
--

CREATE TABLE `superusuario_ejercicio` (
  `id` bigint(20) NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superusuario_individual`
--

CREATE TABLE `superusuario_individual` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idActividad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `superusuario_tabla_deportista`
--

CREATE TABLE `superusuario_tabla_deportista` (
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dniDeportista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idTabla` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabla`
--

CREATE TABLE `tabla` (
  `idTabla` bigint(20) NOT NULL ,
  `tipo` enum('estandar','personalizada') COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dniSuperUsuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabla_ejercicios`
--

CREATE TABLE `tabla_ejercicios` (
  `idTabla` bigint(20) NOT NULL,
  `idEjercicio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tdu`
--

CREATE TABLE `tdu` (
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tarjeta` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indexes for table `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  ADD PRIMARY KEY (`idActividad`,`dniDeportista`),
  ADD UNIQUE KEY `idActividad` (`idActividad`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indexes for table `actividad_horario`
--
ALTER TABLE `actividad_horario`
  ADD PRIMARY KEY (`idActividad`,`idHorario`),
  ADD UNIQUE KEY `idActividad` (`idActividad`),
  ADD UNIQUE KEY `idHorario` (`idHorario`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`dniAdministrador`),
  ADD UNIQUE KEY `dniAdministrador` (`dniAdministrador`);

--
-- Indexes for table `cardio`
--
ALTER TABLE `cardio`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indexes for table `deportista`
--
ALTER TABLE `deportista`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indexes for table `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`idEjercicio`),
  ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indexes for table `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`dniEntrenador`),
  ADD UNIQUE KEY `dniEntrenador` (`dniEntrenador`);

--
-- Indexes for table `entrenador_deportista`
--
ALTER TABLE `entrenador_deportista`
  ADD PRIMARY KEY (`dniEntrenador`,`dniDeportista`),
  ADD UNIQUE KEY `dniEntrenador` (`dniEntrenador`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indexes for table `estiramiento`
--
ALTER TABLE `estiramiento`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idActividad`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`),
  ADD UNIQUE KEY `idHorario` (`idHorario`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indexes for table `inscrito`
--
ALTER TABLE `inscrito`
  ADD PRIMARY KEY (`idGrupo`,`dniDeportista`),
  ADD UNIQUE KEY `idGrupo` (`idGrupo`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`);

--
-- Indexes for table `muscular`
--
ALTER TABLE `muscular`
  ADD PRIMARY KEY (`idEjercicio`),
  ADD UNIQUE KEY `idEjercicio` (`idEjercicio`);

--
-- Indexes for table `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idNotificacion`),
  ADD UNIQUE KEY `idNotificacion` (`idNotificacion`),
  ADD KEY `dniAdministrador` (`dniAdministrador`);

--
-- Indexes for table `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
  ADD PRIMARY KEY (`idNotificacion`,`dniDeportista`),
  ADD KEY `idNotificacion` (`idNotificacion`),
  ADD KEY `dniDeportista` (`dniDeportista`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD UNIQUE KEY `idPago` (`idPago`);

--
-- Indexes for table `pef`
--
ALTER TABLE `pef`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indexes for table `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
  ADD PRIMARY KEY (`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indexes for table `sesionentrenamiento_individual`
--
ALTER TABLE `sesionentrenamiento_individual`
  ADD PRIMARY KEY (`idActividad`,`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idActividad` (`idActividad`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`);

--
-- Indexes for table `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
  ADD PRIMARY KEY (`idSesionEntrenamiento`,`idTabla`),
  ADD UNIQUE KEY `idSesionEntrenamiento` (`idSesionEntrenamiento`),
  ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indexes for table `superusuario`
--
ALTER TABLE `superusuario`
  ADD PRIMARY KEY (`dniSuperUsuario`),
  ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`);

--
-- Indexes for table `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
  ADD PRIMARY KEY	(`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `superusuario_individual`
--
ALTER TABLE `superusuario_individual`
  ADD PRIMARY KEY (`dniSuperUsuario`,`idActividad`),
  ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`),
  ADD UNIQUE KEY `idActividad` (`idActividad`);

--
-- Indexes for table `superusuario_tabla_deportista`
--
ALTER TABLE `superusuario_tabla_deportista`
  ADD PRIMARY KEY (`dniSuperUsuario`,`dniDeportista`,`idTabla`),
  ADD UNIQUE KEY `dniSuperUsuario` (`dniSuperUsuario`),
  ADD UNIQUE KEY `dniDeportista` (`dniDeportista`),
  ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indexes for table `tabla`
--
ALTER TABLE `tabla`
  ADD UNIQUE KEY `idTabla` (`idTabla`);

--
-- Indexes for table `tabla_ejercicios`
--
ALTER TABLE `tabla_ejercicios`
  ADD PRIMARY KEY (`idTabla`,`idEjercicio`),
  ADD KEY `fk_Tabla_Ejercicios` (`idEjercicio`);

--
-- Indexes for table `tdu`
--
ALTER TABLE `tdu`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idNotificacion` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabla`
--
ALTER TABLE `tabla`
  MODIFY `idTabla` bigint(20) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `tabla`
--
ALTER TABLE `pago`
  MODIFY `idPago` bigint(20) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` bigint(20) NOT NULL AUTO_INCREMENT;
  --
--
--
ALTER TABLE `superusuario_ejercicio`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
  
  --
-- AUTO_INCREMENT for table `notificacion`
--
ALTER TABLE `ejercicio`
  MODIFY `idEjercicio` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividad_deportista`
--
ALTER TABLE `actividad_deportista`
  ADD CONSTRAINT `fk_ActividadDeportista` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`) ON DELETE CASCADE;

--
-- Constraints for table `actividad_horario`
--
ALTER TABLE `actividad_horario`
  ADD CONSTRAINT `fk_ActHorario` FOREIGN KEY (`idHorario`) REFERENCES `horario` (`idHorario`),
  ADD CONSTRAINT `fk_ActividadAc` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`)ON DELETE CASCADE;

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_AdministradoSuperUsuario` FOREIGN KEY (`dniAdministrador`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Constraints for table `cardio`
--
ALTER TABLE `cardio`
  ADD CONSTRAINT `fk_CardioEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Constraints for table `deportista`
--
ALTER TABLE `deportista`
  ADD CONSTRAINT `fk_DeportistaUsuario` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Constraints for table `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `fk_EntrenadorSuperUsuario` FOREIGN KEY (`dniEntrenador`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Constraints for table `entrenador_deportista`
--
ALTER TABLE `entrenador_deportista`
  ADD CONSTRAINT `fk_EntrenadorDerportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Entrenador_Entrenador` FOREIGN KEY (`dniEntrenador`) REFERENCES `entrenador` (`dniEntrenador`);

--
-- Constraints for table `estiramiento`
--
ALTER TABLE `estiramiento`
  ADD CONSTRAINT `fk_EstiramientoEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Constraints for table `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_Grupo_Actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`)ON DELETE CASCADE;

--
-- Constraints for table `individual`
--
ALTER TABLE `individual`
  ADD CONSTRAINT `fk_Individual_Actividad` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`idActividad`)ON DELETE CASCADE;

--
-- Constraints for table `inscrito`
--
ALTER TABLE `inscrito`
  ADD CONSTRAINT `fk_InscritoGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idActividad`)ON DELETE CASCADE;

--
-- Constraints for table `muscular`
--
ALTER TABLE `muscular`
  ADD CONSTRAINT `fk_MuscularEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Constraints for table `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_NotificacionAdministrador` FOREIGN KEY (`dniAdministrador`) REFERENCES `administrador` (`dniAdministrador`) ON DELETE CASCADE;

--
-- Constraints for table `notificacion_deportista`
--
ALTER TABLE `notificacion_deportista`
  ADD CONSTRAINT `fk_NotificacionDeportista` FOREIGN KEY (`idNotificacion`) REFERENCES `notificacion` (`idNotificacion`) ON DELETE CASCADE;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_PagoDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;

--
-- Constraints for table `pef`
--
ALTER TABLE `pef`
  ADD CONSTRAINT `fk_PefDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;

--
-- Constraints for table `sesionentrenamiento`
--
ALTER TABLE `sesionentrenamiento`
  ADD CONSTRAINT `fk_SesionEntrenamientoIndividual` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`) ON DELETE CASCADE;

--
-- Constraints for table `sesionentrenamiento_individual`
--
ALTER TABLE `sesionentrenamiento_individual`
  ADD CONSTRAINT `fk_EntrenamientoSIndividual` FOREIGN KEY (`idSesionEntrenamiento`) REFERENCES `sesionentrenamiento` (`idSesionEntrenamiento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SesionEntrenamiento_Individual` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`) ON DELETE CASCADE;

--
-- Constraints for table `sesionentrenamiento_tabla`
--
ALTER TABLE `sesionentrenamiento_tabla`
  ADD CONSTRAINT `fk_SesionEntrenamientoS` FOREIGN KEY (`idSesionEntrenamiento`) REFERENCES `sesionentrenamiento` (`idSesionEntrenamiento`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SesionEntrenamientoTabla` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE;

--
-- Constraints for table `superusuario`
--
ALTER TABLE `superusuario`
  ADD CONSTRAINT `fk_SuperUsuario` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Constraints for table `superusuario_ejercicio`
--
ALTER TABLE `superusuario_ejercicio`
  ADD CONSTRAINT `fk_SuperusuarioEjercicio` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dniSuperUsuarioS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;

--
-- Constraints for table `superusuario_individual`
--
ALTER TABLE `superusuario_individual`
  ADD CONSTRAINT `fk_SuperUsuarioIndividual` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SuperUsuarioIndividualL` FOREIGN KEY (`idActividad`) REFERENCES `individual` (`idActividad`) ON DELETE CASCADE;

--
-- Constraints for table `superusuario_tabla_deportista`
--
ALTER TABLE `superusuario_tabla_deportista`
  ADD CONSTRAINT `FK_SuperUsuarioTab` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SuperUsuarioTablaDeportista` FOREIGN KEY (`dniDeportista`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_SuperUsuarioTalaS` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;


--
-- Constraints for table `tabla`
--
ALTER TABLE `tabla`
  ADD CONSTRAINT `fk_TablaSuperUsuario` FOREIGN KEY (`dniSuperUsuario`) REFERENCES `superusuario` (`dniSuperUsuario`) ON DELETE CASCADE;


--
-- Constraints for table `tabla_ejercicios`
--
ALTER TABLE `tabla_ejercicios`
  ADD CONSTRAINT `fk_TablaT_Ejercicios` FOREIGN KEY (`idTabla`) REFERENCES `tabla` (`idTabla`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Tabla_Ejercicios` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicio` (`idEjercicio`) ON DELETE CASCADE;

--
-- Constraints for table `tdu`
--
ALTER TABLE `tdu`
  ADD CONSTRAINT `fk_TduDeportista` FOREIGN KEY (`dni`) REFERENCES `deportista` (`dni`) ON DELETE CASCADE;
  
--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellidos`, `edad`, `contrasena`, `email`, `telefono`, `fechaAlta`) VALUES
('44497121X', 'Adrián', 'Souto Fariñas', 65, 'e10adc3949ba59abbe56e057f20f883e', 'adriansouto2@gmail.com', '6546546546', '2017-11-06'),
('98765432X', 'Marco', 'Aurelio', 25, 'e10adc3949ba59abbe56e057f20f883e', 'marcoaurelio@gmail.com', '123456789', '2017-11-08'),
('44490816F', 'DANIE', 'RD', 25, 'e10adc3949ba59abbe56e057f20f883e', 'marcoaurelio@gmail.com', '123456789', '2017-11-08'),
('53192250N', 'Alexandre', 'Viana Sixto', 28, '5edef9793eacc635c6c30b064a81ccca', 'vianasixtoalexandre@gmail.com', '646089168', '2017-11-08');

--
-- Dumping data for table `superusuario`
--
INSERT INTO `superusuario` (`dniSuperUsuario`) VALUES
('44497121X'),
('44490816F'),
('53192250N');
INSERT INTO `administrador`(`dniAdministrador`) VALUES('44497121X'),('44490816F'),
('53192250N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
