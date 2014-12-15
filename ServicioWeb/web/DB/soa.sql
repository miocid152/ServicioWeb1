-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2014 a las 04:59:05
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
-- Estructura de tabla para la tabla `empresacliente`
--

CREATE TABLE IF NOT EXISTS `empresacliente` (
  `idEmpresaCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(45) NOT NULL,
  `numeroTel` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correoElectronico` varchar(80) NOT NULL,
  PRIMARY KEY (`idEmpresaCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empresacliente`
--

INSERT INTO `empresacliente` (`idEmpresaCliente`, `nombreEmpresa`, `numeroTel`, `direccion`, `correoElectronico`) VALUES
(1, 'YE', '2291152722', 'Juan Felipe Cardenas 27', 'ye@prodigy.com'),
(2, 'Terraza Veracruz', '2291300105', 'Melchor Ocampo', 'tv@tv.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `entretenimiento`
--

INSERT INTO `entretenimiento` (`idEntretenimiento`, `tipoEntretenimiento`, `nombreCompaniaEntretenimiento`, `horasEntretenimiento`, `precioEntretenimiento`) VALUES
(1, 'Animadores', 'Luz Roja', 4, 3200),
(2, 'Música', 'Style', 8, 2500),
(3, 'Efectos Especiales', 'Stars', 4, 6000),
(4, 'Piñatas', 'Viva Piñata', 1, 500),
(5, 'Videos', 'Video Movies of Effects Specials', 6, 3000),
(6, 'Efectos especiales y sonido', 'CYA', 5, 4500),
(7, 'Sonido Disco', 'Sonido Factory', 6, 3500),
(8, 'Música', 'Marimba Jarchos', 3000, 5),
(9, 'Animadores', 'Animate Frozen', 5, 2300),
(10, 'Inflables', 'Inflables Los Mario Bross', 4, 2400);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `menuDes`, `nombreCompaniaMenu`, `precioMenu`, `cantidadPersonas`) VALUES
(1, 'Para niños', 'Botanitas', 2500, 100),
(2, 'Para Adultos', 'El Porton', 2000, 80),
(3, 'Menu Frances', 'Le France', 3500, 17),
(4, 'Ejecutivo', 'JavaTimes', 100, 3),
(5, 'Menu Social', 'HP', 3000, 35),
(6, 'Buffet estilo empresarial', 'Buffet Warren', 8300, 80),
(7, 'Comida Italiana\r\nPastas, Ensaladas y Pizzas', 'Italiani', 5500.5, 50),
(8, '1 Trompo de carne al pastor\r\nincluye piña cilantro cebolla salsa y queso', 'Taqueria los pinos', 6000, 200),
(9, 'Comida China\r\nPastas, Sopas y Arroz', 'Chang-ho', 3500, 100),
(10, 'Hamburguesas hawaianas incluye\r\npapas, refrescos, ensaladas y aderezo', 'Cacharock', 4999.99, 100);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`idSalon`, `nombreSalon`, `precioSalon`, `direccionSalon`) VALUES
(1, 'La Morada', 2500.5, 'Floresta'),
(2, 'Circus', 2005.5, 'Gracianos Sanchez'),
(3, 'Castle', 5366, 'Miguel Alemán'),
(4, 'Casita Verde', 8835.2, 'Flores Magón'),
(5, 'Cabaña Real', 5589.99, 'Uribe'),
(6, 'Caribe Cooler', 6500.9, 'Formando Hogar #2600'),
(7, 'El Perla Negra', 11800.5, 'Boulevar Avila Camacho #3500'),
(8, 'Madrid', 18001, 'Sugasti #400'),
(9, 'Club de leones', 14300.5, 'Simon Bolivar #690'),
(10, 'Beduinos', 28300.5, 'Urano #245 Galaxia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srentrenimiento`
--

CREATE TABLE IF NOT EXISTS `srentrenimiento` (
  `idSREntrenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fechaReservacionEntretenimiento` date NOT NULL,
  `statusEntretenimiento` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `entretenimientoIdEntretenimiento` int(11) NOT NULL,
  `correoClienteEntretenimiento` varchar(60) NOT NULL,
  `empresaClienteIdEmpresaCliente` int(11) NOT NULL,
  PRIMARY KEY (`idSREntrenimiento`),
  KEY `fk_SREntrenimiento_Entretenimiento1_idx` (`entretenimientoIdEntretenimiento`),
  KEY `fk_srentrenimiento_EmpresaCliente1_idx` (`empresaClienteIdEmpresaCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srmenu`
--

CREATE TABLE IF NOT EXISTS `srmenu` (
  `idSRMenu` int(11) NOT NULL AUTO_INCREMENT,
  `stautsMenu` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaReservacionMenu` date NOT NULL,
  `menuIdMenu` int(11) NOT NULL,
  `correoClienteMenu` varchar(60) NOT NULL,
  `empresaClienteIdEmpresaCliente` int(11) NOT NULL,
  PRIMARY KEY (`idSRMenu`),
  KEY `fk_SRMenu_Menu1_idx` (`menuIdMenu`),
  KEY `fk_srmenu_EmpresaCliente1_idx` (`empresaClienteIdEmpresaCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `srsalon`
--

CREATE TABLE IF NOT EXISTS `srsalon` (
  `idSRSalon` int(11) NOT NULL AUTO_INCREMENT,
  `statusSalon` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaReservacionSalon` date NOT NULL,
  `salonIdSalon` int(11) NOT NULL,
  `correoClienteSalon` varchar(60) NOT NULL,
  `empresaClienteIdEmpresaCliente` int(11) NOT NULL,
  PRIMARY KEY (`idSRSalon`),
  KEY `fk_SRSalon_Salon_idx` (`salonIdSalon`),
  KEY `fk_srsalon_EmpresaCliente1_idx` (`empresaClienteIdEmpresaCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `srentrenimiento`
--
ALTER TABLE `srentrenimiento`
  ADD CONSTRAINT `fk_srentrenimiento_EmpresaCliente1` FOREIGN KEY (`empresaClienteIdEmpresaCliente`) REFERENCES `empresacliente` (`idEmpresaCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SREntrenimiento_Entretenimiento1` FOREIGN KEY (`entretenimientoIdEntretenimiento`) REFERENCES `entretenimiento` (`idEntretenimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `srmenu`
--
ALTER TABLE `srmenu`
  ADD CONSTRAINT `fk_srmenu_EmpresaCliente1` FOREIGN KEY (`empresaClienteIdEmpresaCliente`) REFERENCES `empresacliente` (`idEmpresaCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SRMenu_Menu1` FOREIGN KEY (`menuIdMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `srsalon`
--
ALTER TABLE `srsalon`
  ADD CONSTRAINT `fk_srsalon_EmpresaCliente1` FOREIGN KEY (`empresaClienteIdEmpresaCliente`) REFERENCES `empresacliente` (`idEmpresaCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SRSalon_Salon` FOREIGN KEY (`salonIdSalon`) REFERENCES `salon` (`idSalon`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
