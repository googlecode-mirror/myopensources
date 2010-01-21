SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `dev_webemailler` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dev_webemailler`;

-- -----------------------------------------------------
-- Table `dev_webemailler`.`mail_servers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_webemailler`.`mail_servers` ;

CREATE  TABLE IF NOT EXISTS `dev_webemailler`.`mail_servers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `host` VARCHAR(120) NULL ,
  `ssl` INT(1) NULL ,
  `port` VARCHAR(4) NULL ,
  `account` VARCHAR(120) NULL ,
  `passwd` VARCHAR(60) NULL ,
  `created` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `dev_webemailler`.`customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_webemailler`.`customers` ;

CREATE  TABLE IF NOT EXISTS `dev_webemailler`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nickname` VARCHAR(45) NULL ,
  `gender` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `tel` VARCHAR(45) NULL ,
  `memo` TEXT NULL ,
  `created` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_webemailler`.`mail_templates`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_webemailler`.`mail_templates` ;

CREATE  TABLE IF NOT EXISTS `dev_webemailler`.`mail_templates` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(120) NOT NULL ,
  `subject` VARCHAR(120) NULL ,
  `content` TEXT NULL ,
  `plain_text` INT(1) NULL COMMENT '是否只為文本格式' ,
  `created` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`, `title`) )
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
