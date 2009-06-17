SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `dev_weboa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `dev_weboa`;

-- -----------------------------------------------------
-- Table `dev_weboa`.`suppliers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`suppliers` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`suppliers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(200) NULL ,
  `province` TINYINT NULL ,
  `city` TINYINT NULL ,
  `addr` VARCHAR(200) NULL ,
  `since` DATE NULL COMMENT '公司成立日期' ,
  `bankpartics` VARCHAR(200) NULL COMMENT '银行帐号开户地址' ,
  `bankact` VARCHAR(200) NULL COMMENT '银行帐号' ,
  `memo` TEXT NULL COMMENT '备注' ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `dev_weboa`.`stock_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`stock_categories` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`stock_categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `code` VARCHAR(45) NULL ,
  `description` VARCHAR(80) NULL ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_weboa`.`stock_cat_properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`stock_cat_properties` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`stock_cat_properties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `categoryid` INT NULL ,
  `label` VARCHAR(120) NULL ,
  `controltype` VARCHAR(8) NULL ,
  `defaultvalue` TEXT NULL ,
  `require` TINYINT NULL ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cat_id` (`categoryid` ASC) ,
  CONSTRAINT `fk_cat_id`
    FOREIGN KEY (`categoryid` )
    REFERENCES `dev_weboa`.`stock_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_weboa`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`products` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `code` VARCHAR(80) NULL ,
  `categoryid` INT NULL ,
  `description` TEXT NULL ,
  `units` VARCHAR(12) NULL ,
  `barcode` VARCHAR(50) NULL ,
  `kgs` DECIMAL(20,4) NULL ,
  `photo` VARCHAR(120) NULL ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cat_id` (`categoryid` ASC) ,
  CONSTRAINT `fk_cat_id`
    FOREIGN KEY (`categoryid` )
    REFERENCES `dev_weboa`.`stock_categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_weboa`.`stock_pro_properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`stock_pro_properties` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`stock_pro_properties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pro_id` INT NULL ,
  `cat_proper_id` INT NULL ,
  `value` VARCHAR(200) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_pro_id` (`pro_id` ASC) ,
  INDEX `fk_cat_prop_id` (`cat_proper_id` ASC) ,
  CONSTRAINT `fk_pro_id`
    FOREIGN KEY (`pro_id` )
    REFERENCES `dev_weboa`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_prop_id`
    FOREIGN KEY (`cat_proper_id` )
    REFERENCES `dev_weboa`.`stock_cat_properties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_weboa`.`purch_orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`purch_orders` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`purch_orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `supplier_id` INT NOT NULL ,
  `ord_date` DATE NULL COMMENT '期望收货日期' ,
  `del_add` VARCHAR(200) NULL COMMENT '收货地址' ,
  `contact` VARCHAR(200) NULL COMMENT '联系人' ,
  `status` VARCHAR(8) NULL ,
  `memo` TEXT NULL ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_supp_id` (`supplier_id` ASC) ,
  CONSTRAINT `fk_supp_id`
    FOREIGN KEY (`supplier_id` )
    REFERENCES `dev_weboa`.`suppliers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_weboa`.`purch_order_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`purch_order_products` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`purch_order_products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `order_id` INT NULL COMMENT '订单ID' ,
  `pro_id` INT NULL COMMENT '商品ID' ,
  `delivery_date` DATE NULL COMMENT '收货日期' ,
  `unit_price` DOUBLE NULL COMMENT '单价' ,
  `quantity_ord` DOUBLE NULL COMMENT '订购数量' ,
  `quantity_recd` DOUBLE NULL COMMENT '实收数量' ,
  `status` VARCHAR(8) NULL ,
  `memo` TEXT NULL ,
  `created` INT NULL ,
  `modified` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ord_id` (`order_id` ASC) ,
  INDEX `fk_pro_id` (`pro_id` ASC) ,
  CONSTRAINT `fk_ord_id`
    FOREIGN KEY (`order_id` )
    REFERENCES `dev_weboa`.`purch_orders` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pro_id`
    FOREIGN KEY (`pro_id` )
    REFERENCES `dev_weboa`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `dev_weboa`.`stock_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dev_weboa`.`stock_products` ;

CREATE  TABLE IF NOT EXISTS `dev_weboa`.`stock_products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `inventory_id` INT NULL COMMENT '仓库ID' ,
  `pro_id` INT NULL COMMENT '商品ID' ,
  `quantity` DOUBLE NULL COMMENT '数量' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_pro_id` (`pro_id` ASC) ,
  CONSTRAINT `fk_pro_id`
    FOREIGN KEY (`pro_id` )
    REFERENCES `dev_weboa`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
