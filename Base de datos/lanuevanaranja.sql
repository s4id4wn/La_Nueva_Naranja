SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tbl_electrodomestico`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_electrodomestico` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `precio` DECIMAL(7,2) NOT NULL ,
  `activo` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_customer` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `last_name` VARCHAR(50) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_venta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_venta` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `fecha` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_historial_ventas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_historial_ventas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `priority` INT NOT NULL ,
  `url_initial` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_user` (
  `id` INT UNSIGNED NULL AUTO_INCREMENT ,
  `role_id` INT UNSIGNED NOT NULL ,
  `user` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(35) NOT NULL ,
  `name` VARCHAR(70) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `telephone_number` VARCHAR(10) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(200) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_user_tbl_role_idx` (`role_id` ASC) ,
  CONSTRAINT `fk_tbl_user_tbl_role`
    FOREIGN KEY (`role_id` )
    REFERENCES `tbl_role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_lineablanca`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_lineablanca` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
