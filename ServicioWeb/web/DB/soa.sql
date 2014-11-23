SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `ServicioWeb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ServicioWeb` ;

-- -----------------------------------------------------
-- Table `ServicioWeb`.`Salon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`Salon` (
  `idSalon` INT NOT NULL AUTO_INCREMENT,
  `nombreSalon` VARCHAR(45) NOT NULL,
  `precio` FLOAT NOT NULL,
  `direccion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idSalon`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`StatusReservacionSalon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`StatusReservacionSalon` (
  `idStatusReservacion` INT NOT NULL AUTO_INCREMENT,
  `fechaReservacion` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'RESERVADO',
  `Salon_idSalon` INT NOT NULL,
  PRIMARY KEY (`idStatusReservacion`),
  INDEX `fk_StatusReservacion_Salon_idx` (`Salon_idSalon` ASC),
  CONSTRAINT `fk_StatusReservacion_Salon`
    FOREIGN KEY (`Salon_idSalon`)
    REFERENCES `ServicioWeb`.`Salon` (`idSalon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`PaqueteComida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`PaqueteComida` (
  `idPaqueteComida` INT NOT NULL AUTO_INCREMENT,
  `menu` VARCHAR(500) NOT NULL,
  `precio` FLOAT NOT NULL,
  `cantidadPersonas` INT NULL,
  PRIMARY KEY (`idPaqueteComida`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`StatusReservacionComida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`StatusReservacionComida` (
  `idStatusReservacion` INT NOT NULL AUTO_INCREMENT,
  `fechaReservacion` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'RESERVADO',
  `PaqueteComida_idPaqueteComida` INT NOT NULL,
  PRIMARY KEY (`idStatusReservacion`),
  INDEX `fk_StatusReservacion_PaqueteComida1_idx` (`PaqueteComida_idPaqueteComida` ASC),
  CONSTRAINT `fk_StatusReservacion_PaqueteComida1`
    FOREIGN KEY (`PaqueteComida_idPaqueteComida`)
    REFERENCES `ServicioWeb`.`PaqueteComida` (`idPaqueteComida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`Entretenimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`Entretenimiento` (
  `idEntretenimiento` INT NOT NULL AUTO_INCREMENT,
  `tipoEntretenimiento` VARCHAR(150) NOT NULL,
  `horas` VARCHAR(45) NOT NULL,
  `precio` FLOAT NOT NULL,
  PRIMARY KEY (`idEntretenimiento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ServicioWeb`.`StatusReservacionEntre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ServicioWeb`.`StatusReservacionEntre` (
  `idStatusReservacion` INT NOT NULL AUTO_INCREMENT,
  `fechaReservacion` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'RESERVADO',
  `Entretenimiento_idEntretenimiento` INT NOT NULL,
  PRIMARY KEY (`idStatusReservacion`),
  INDEX `fk_StatusReservacion_Entretenimiento1_idx` (`Entretenimiento_idEntretenimiento` ASC),
  CONSTRAINT `fk_StatusReservacion_Entretenimiento1`
    FOREIGN KEY (`Entretenimiento_idEntretenimiento`)
    REFERENCES `ServicioWeb`.`Entretenimiento` (`idEntretenimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
