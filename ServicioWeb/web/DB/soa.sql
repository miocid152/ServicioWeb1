-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2014 a las 21:55:57
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `servicioweb`
--
CREATE SCHEMA IF NOT EXISTS `ServicioWeb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ServicioWeb` ;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entretenimiento`
--

CREATE TABLE IF NOT EXISTS `entretenimiento` (
  `idEntretenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `tipoEntretenimiento` varchar(45) NOT NULL,
  `nombreCompaniaEntretenimiento` varchar(45) NOT NULL,
  `horasEntretenimiento` int(11) NOT NULL,
  `precioEntretenimiento` float NOT NULL,
  PRIMARY KEY (`idEntretenimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `entretenimiento`
--

INSERT INTO `entretenimiento` (`idEntretenimiento`, `tipoEntretenimiento`, `nombreCompaniaEntretenimiento`, `horasEntretenimiento`, `precioEntretenimiento`) VALUES
(1, 'Animadores', 'LuzRoja', 5, 3000),
(2, 'Musica', 'Style', 8, 2500),
(3, 'Efectos Especiales', 'Starts', 4, 6000),
(4, 'Piñatas', 'Piñateria', 1, 500),
(5, 'Videos', 'VideoMovieDigitalExpress', 6, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `menuDes` varchar(200) NOT NULL,
  `nombreCompaniaMenu` varchar(200) NOT NULL,
  `precioMenu` float NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `menuDes`, `nombreCompaniaMenu`, `precioMenu`, `cantidadPersonas`) VALUES
(1, 'Para niños', 'Botanitas', 2500, 100),
(2, 'Para Adultos', 'El Porton', 2000, 80),
(3, 'Menu Frances', 'Le France', 3500, 17),
(4, 'Ejecutivo', 'JavaTimes', 100, 3),
(5, 'Menu Social', 'HP', 3000, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE IF NOT EXISTS `salon` (
  `idSalon` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSalon` varchar(45) NOT NULL,
  `precioSalon` float NOT NULL,
  `direccionSalon` varchar(60) NOT NULL,
  PRIMARY KEY (`idSalon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`idSalon`, `nombreSalon`, `precioSalon`, `direccionSalon`) VALUES
(1, 'La casita', 25.5, 'Floresta'),
(2, 'Circus', 2005.5, 'Gracianos Sanchez'),
(3, 'Castle', 5366, 'No se'),
(4, 'Casita Verde', 88, 'Flores Magon'),
(5, 'Casita Morada', 555, 'Uribe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srentrenimiento`
--

CREATE TABLE IF NOT EXISTS `srentrenimiento` (
  `idSREntrenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fechaEntretenimiento` date NOT NULL,
  `statusEntretenimiento` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `entretenimientoIdEntretenimiento` int(11) NOT NULL,
  PRIMARY KEY (`idSREntrenimiento`),
  KEY `fk_SREntrenimiento_Entretenimiento1_idx` (`entretenimientoIdEntretenimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `srentrenimiento`
--

INSERT INTO `srentrenimiento` (`idSREntrenimiento`, `fechaEntretenimiento`, `statusEntretenimiento`, `entretenimientoIdEntretenimiento`) VALUES
(1, '2014-11-23', 'CONFIRMADO', 1),
(2, '2014-11-23', 'DISPONIBLE', 2),
(3, '2014-11-23', 'CONFIRMADO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srmenu`
--

CREATE TABLE IF NOT EXISTS `srmenu` (
  `idSRMenu` int(11) NOT NULL AUTO_INCREMENT,
  `stautsMenu` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaMenu` date NOT NULL,
  `menuIdMenu` int(11) NOT NULL,
  PRIMARY KEY (`idSRMenu`),
  KEY `fk_SRMenu_Menu1_idx` (`menuIdMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `srmenu`
--

INSERT INTO `srmenu` (`idSRMenu`, `stautsMenu`, `fechaMenu`, `menuIdMenu`) VALUES
(1, 'RESERVADO', '2014-11-23', 1),
(2, 'DISPONIBLE', '2014-11-23', 2),
(3, 'CONFIRMADO', '2014-11-23', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srsalon`
--

CREATE TABLE IF NOT EXISTS `srsalon` (
  `idSRSalon` int(11) NOT NULL AUTO_INCREMENT,
  `statusSalon` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaSalon` date NOT NULL,
  `salonIdSalon` int(11) NOT NULL,
  PRIMARY KEY (`idSRSalon`),
  KEY `fk_SRSalon_Salon_idx` (`salonIdSalon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `srsalon`
--

INSERT INTO `srsalon` (`idSRSalon`, `statusSalon`, `fechaSalon`, `salonIdSalon`) VALUES
(1, 'RESERVADO', '2014-11-20', 1),
(2, 'DISPONIBLE', '2014-11-22', 2),
(3, 'CONFIRMADO', '2014-11-23', 1),
(4, 'DISPONIBLE', '2014-11-23', 2),
(5, 'CONFIRMADO', '2014-11-23', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `srentrenimiento`
--
ALTER TABLE `srentrenimiento`
  ADD CONSTRAINT `fk_SREntrenimiento_Entretenimiento1` FOREIGN KEY (`entretenimientoIdEntretenimiento`) REFERENCES `entretenimiento` (`idEntretenimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `srmenu`
--
ALTER TABLE `srmenu`
  ADD CONSTRAINT `fk_SRMenu_Menu1` FOREIGN KEY (`menuIdMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `srsalon`
--
ALTER TABLE `srsalon`
  ADD CONSTRAINT `fk_SRSalon_Salon` FOREIGN KEY (`salonIdSalon`) REFERENCES `salon` (`idSalon`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
