/*
Navicat MySQL Data Transfer

Source Server         : MySQL Ubuntu VM
Source Server Version : 50538
Source Host           : 192.168.56.101:3306
Source Database       : SOA

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2014-11-23 13:34:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Entretenimiento
-- ----------------------------
DROP TABLE IF EXISTS `Entretenimiento`;
CREATE TABLE `Entretenimiento` (
  `idEntretenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `tipoEntretenimiento` varchar(45) NOT NULL,
  `horas` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idEntretenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Entretenimiento
-- ----------------------------

-- ----------------------------
-- Table structure for Menu
-- ----------------------------
DROP TABLE IF EXISTS `Menu`;
CREATE TABLE `Menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `menuDes` varchar(200) NOT NULL,
  `precio` float NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Menu
-- ----------------------------
INSERT INTO `Menu` VALUES ('1', 'Menu ejecutivo para empresarios, este menu de comida cuenta con varidad de sopas de entrada, guisados de plato fuerte y postre. Agua ilimitada', '9000', '80');
INSERT INTO `Menu` VALUES ('2', 'Menu infantil', '5000', '30');
INSERT INTO `Menu` VALUES ('3', 'asdasdasdasd', '54', '43');
INSERT INTO `Menu` VALUES ('4', 'hola k ase', '4000', '3900');
INSERT INTO `Menu` VALUES ('5', 'el ultimo no funciona', '200000', '3000');

-- ----------------------------
-- Table structure for Salon
-- ----------------------------
DROP TABLE IF EXISTS `Salon`;
CREATE TABLE `Salon` (
  `idSalon` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSalon` varchar(45) NOT NULL,
  `precioSalon` float NOT NULL,
  `direccionSalon` varchar(60) NOT NULL,
  PRIMARY KEY (`idSalon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Salon
-- ----------------------------

-- ----------------------------
-- Table structure for SREntrenimiento
-- ----------------------------
DROP TABLE IF EXISTS `SREntrenimiento`;
CREATE TABLE `SREntrenimiento` (
  `idSREntrenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `fechaEntretenimiento` date NOT NULL,
  `statusEntretenimiento` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `entretenimientoIdEntretenimiento` int(11) NOT NULL,
  PRIMARY KEY (`idSREntrenimiento`),
  KEY `fk_SREntrenimiento_Entretenimiento1_idx` (`entretenimientoIdEntretenimiento`),
  CONSTRAINT `fk_SREntrenimiento_Entretenimiento1` FOREIGN KEY (`entretenimientoIdEntretenimiento`) REFERENCES `Entretenimiento` (`idEntretenimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of SREntrenimiento
-- ----------------------------

-- ----------------------------
-- Table structure for SRMenu
-- ----------------------------
DROP TABLE IF EXISTS `SRMenu`;
CREATE TABLE `SRMenu` (
  `idSRMenu` int(11) NOT NULL AUTO_INCREMENT,
  `stautsMenu` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaMenu` date NOT NULL,
  `menuIdMenu` int(11) NOT NULL,
  PRIMARY KEY (`idSRMenu`),
  KEY `fk_SRMenu_Menu1_idx` (`menuIdMenu`),
  CONSTRAINT `fk_SRMenu_Menu1` FOREIGN KEY (`menuIdMenu`) REFERENCES `Menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of SRMenu
-- ----------------------------
INSERT INTO `SRMenu` VALUES ('1', 'RESERVADO', '2014-11-22', '1');
INSERT INTO `SRMenu` VALUES ('2', 'DISPONIBLE', '2014-11-25', '2');
INSERT INTO `SRMenu` VALUES ('3', 'RESERVADO', '2014-11-23', '2');
INSERT INTO `SRMenu` VALUES ('4', 'RESERVADO', '2014-11-23', '1');
INSERT INTO `SRMenu` VALUES ('5', 'RESERVADO', '2014-11-23', '3');
INSERT INTO `SRMenu` VALUES ('6', 'RESERVADO', '2014-11-23', '4');

-- ----------------------------
-- Table structure for SRSalon
-- ----------------------------
DROP TABLE IF EXISTS `SRSalon`;
CREATE TABLE `SRSalon` (
  `idSRSalon` int(11) NOT NULL AUTO_INCREMENT,
  `statusSalon` varchar(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaSalon` date NOT NULL,
  `salonIdSalon` int(11) NOT NULL,
  PRIMARY KEY (`idSRSalon`),
  KEY `fk_SRSalon_Salon_idx` (`salonIdSalon`),
  CONSTRAINT `fk_SRSalon_Salon` FOREIGN KEY (`salonIdSalon`) REFERENCES `Salon` (`idSalon`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of SRSalon
-- ----------------------------
