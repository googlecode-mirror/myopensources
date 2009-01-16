SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `dev_simple_cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `dev_simple_cms`;

-- -----------------------------------------------------
-- Table `dev_simple_cms`.`article_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_simple_cms`.`article_categories` ;

CREATE  TABLE IF NOT EXISTS `dev_simple_cms`.`article_categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pid` INT NULL ,
  `name` VARCHAR(45) NULL ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
