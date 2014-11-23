-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';;

-- -----------------------------------------------------
-- Schema ServicioWeb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ServicioWeb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ServicioWeb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ServicioWeb` ;

-- -----------------------------------------------------
-- Table `ServicioWeb`.`Salon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`Salon` (
  `idSalon` INT NOT NULL AUTO_INCREMENT,
  `nombreSalon` VARCHAR(45) NOT NULL,
  `precioSalon` FLOAT NOT NULL,
  `direccionSalon` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idSalon`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`SRSalon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`SRSalon` (
  `idSRSalon` INT NOT NULL AUTO_INCREMENT,
  `statusSalon` VARCHAR(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaSalon` DATE NOT NULL,
  `salonIdSalon` INT NOT NULL,
  PRIMARY KEY (`idSRSalon`),
  INDEX `fk_SRSalon_Salon_idx` (`salonIdSalon` ASC),
  CONSTRAINT `fk_SRSalon_Salon`
    FOREIGN KEY (`salonIdSalon`)
    REFERENCES `ServicioWeb`.`Salon` (`idSalon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`Menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`Menu` (
  `idMenu` INT NOT NULL AUTO_INCREMENT,
  `menuDes` VARCHAR(200) NOT NULL,
  `precio` FLOAT NOT NULL,
  `cantidadPersonas` INT NOT NULL,
  PRIMARY KEY (`idMenu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`SRMenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`SRMenu` (
  `idSRMenu` INT NOT NULL AUTO_INCREMENT,
  `stautsMenu` VARCHAR(45) NOT NULL DEFAULT 'RESERVADO',
  `fechaMenu` DATE NOT NULL,
  `menuIdMenu` INT NOT NULL,
  PRIMARY KEY (`idSRMenu`),
  INDEX `fk_SRMenu_Menu1_idx` (`menuIdMenu` ASC),
  CONSTRAINT `fk_SRMenu_Menu1`
    FOREIGN KEY (`menuIdMenu`)
    REFERENCES `ServicioWeb`.`Menu` (`idMenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`Entretenimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`Entretenimiento` (
  `idEntretenimiento` INT NOT NULL AUTO_INCREMENT,
  `tipoEntretenimiento` VARCHAR(45) NOT NULL,
  `horas` INT NOT NULL,
  `precio` FLOAT NOT NULL,
  PRIMARY KEY (`idEntretenimiento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`SREntrenimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`SREntrenimiento` (
  `idSREntrenimiento` INT NOT NULL AUTO_INCREMENT,
  `fechaEntretenimiento` DATE NOT NULL,
  `statusEntretenimiento` VARCHAR(45) NOT NULL DEFAULT 'RESERVADO',
  `entretenimientoIdEntretenimiento` INT NOT NULL,
  PRIMARY KEY (`idSREntrenimiento`),
  INDEX `fk_SREntrenimiento_Entretenimiento1_idx` (`entretenimientoIdEntretenimiento` ASC),
  CONSTRAINT `fk_SREntrenimiento_Entretenimiento1`
    FOREIGN KEY (`entretenimientoIdEntretenimiento`)
    REFERENCES `ServicioWeb`.`Entretenimiento` (`idEntretenimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
