SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tbl_role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `priority` INT NOT NULL ,
  `url_initial` VARCHAR(100) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `role_id` INT UNSIGNED NOT NULL ,
  `user` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(35) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `town` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(45) NOT NULL ,
  `telephone_number` VARCHAR(10) NOT NULL ,
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
-- Table `tbl_brand`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_brand` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `category_id` INT UNSIGNED NOT NULL ,
  `brand_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(400) NOT NULL ,
  `price` DECIMAL(9,2) NOT NULL ,
  `amount` INT NOT NULL ,
  `url_image` VARCHAR(200) NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_product_tbl_brand_idx` (`brand_id` ASC) ,
  INDEX `fk_tbl_product_tbl_category_idx` (`category_id` ASC) ,
  CONSTRAINT `fk_tbl_product_tbl_brand`
    FOREIGN KEY (`brand_id` )
    REFERENCES `tbl_brand` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_product_tbl_category`
    FOREIGN KEY (`category_id` )
    REFERENCES `tbl_category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_sale`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_sale` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `total_price` DECIMAL(12,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tbl_sale_tbl_user_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_tbl_sale_tbl_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `tbl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tbl_sale_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_sale_product` (
  `sale_id` INT UNSIGNED NOT NULL ,
  `product_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_tbl_sale_product_tbl_sale_idx` (`sale_id` ASC) ,
  INDEX `fk_tbl_sale_product_tbl_product_idx` (`product_id` ASC) ,
  CONSTRAINT `fk_tbl_sale_product_tbl_sale`
    FOREIGN KEY (`sale_id` )
    REFERENCES `tbl_sale` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_sale_product_tbl_product`
    FOREIGN KEY (`product_id` )
    REFERENCES `tbl_product` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
