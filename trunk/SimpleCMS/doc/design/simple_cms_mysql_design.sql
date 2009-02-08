SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `dev_simple_cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dev_simple_cms`;

-- -----------------------------------------------------
-- Table `dev_simple_cms`.`article_categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dev_simple_cms`.`article_categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `parent_id` INT(11) NOT NULL DEFAULT '0' ,
  `lft` INT(11) NOT NULL DEFAULT '0' ,
  `rght` INT(11) NOT NULL DEFAULT '0' ,
  `name` VARCHAR(45) NULL DEFAULT NULL ,
  `created` INT(11) NULL DEFAULT NULL ,
  `modified` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_simple_cms`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dev_simple_cms`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` CHAR(50) NULL DEFAULT NULL ,
  `password` CHAR(50) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_simple_cms`.`articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `dev_simple_cms`.`articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `article_categories_id` INT(11) NOT NULL DEFAULT '0' ,
  `title` VARCHAR(120) NOT NULL ,
  `contents` TEXT NOT NULL ,
  `photo` VARCHAR(100) NULL ,
  `created` INT(11) NULL ,
  `modified` INT(11) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
