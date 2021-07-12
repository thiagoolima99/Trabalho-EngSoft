-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema agenda_contatos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agenda_contatos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agenda_contatos` ;
USE `agenda_contatos` ;

-- -----------------------------------------------------
-- Table `agenda_contatos`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agenda_contatos`.`users` (
  `us_id` INT NOT NULL AUTO_INCREMENT,
  `us_username` VARCHAR(45) NOT NULL,
  `us_password` VARCHAR(32) NOT NULL,
  `us_photo` VARCHAR(45) NULL,
  PRIMARY KEY (`us_id`),
  UNIQUE INDEX `us_username_UNIQUE` (`us_username` ASC)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agenda_contatos`.`contacts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agenda_contatos`.`contacts` (
  `co_id` INT NOT NULL AUTO_INCREMENT,
  `co_name` VARCHAR(45) NULL,
  `co_cellphone` VARCHAR(20) NULL,
  `co_city` VARCHAR(45) NULL,
  `co_email` VARCHAR(100) NULL,
  `co_cep` VARCHAR(10) NULL,
 `co_photo` VARCHAR(20) NULL,
  `user_id` INT NOT NULL,
   `co_grupo` INT NOT NULL,
  PRIMARY KEY (`co_id`, `user_id`),
  INDEX `fk_contacts_users_idx` (`user_id` ASC)
  CONSTRAINT `fk_contacts_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `agenda_contatos`.`users` (`us_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
