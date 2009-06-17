-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: 10.50.71.21:3306
-- 生成日期: 2009 年 06 月 17 日 20:57
-- 服务器版本: 5.1.22
-- PHP 版本: 5.2.6-2ubuntu4.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dev_weboa`
--

-- --------------------------------------------------------

--
-- 表的结构 `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `address` varchar(220) DEFAULT NULL,
  `phone` varchar(120) DEFAULT NULL,
  `guard` varchar(45) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 导出表中的数据 `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `address`, `phone`, `guard`, `created`, `modified`) VALUES
(1, 'gdsafd', 'fdsaf', 'fdsfa', 'fdsf', 1245040378, 1245040378),
(4, '測試22', '測試22', '測試', '測試', 1245043377, 1245061238),
(5, '是這樣的嗎', '广西贺州', 'fdsa', 'afdsfd', 1245046832, 1245061561),
(13, 'gdsafd', 'fdsfds', 'fdsf', 'fdsfd', 1245217629, 1245217629),
(11, 'gdsafd', 'sfds', 'fdsfads', 'fdsaf', 1245061302, 1245061302),
(12, 'gdsafds', 'fdsafd', 'fdsag', 'gdasfdsaf', 1245061418, 1245061418),
(14, 'gasdf', 'fdsaf', 'fdsaf', 'fdsaf', 1245217658, 1245217658);

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(80) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `description` text,
  `units` varchar(12) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `kgs` decimal(20,4) DEFAULT NULL,
  `photo` varchar(120) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cat_id` (`categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `products`
--


-- --------------------------------------------------------

--
-- 表的结构 `purch_orders`
--

CREATE TABLE IF NOT EXISTS `purch_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `ord_date` date DEFAULT NULL COMMENT '期望收货日期',
  `del_add` varchar(200) DEFAULT NULL COMMENT '收货地址',
  `contact` varchar(200) DEFAULT NULL COMMENT '联系人',
  `status` varchar(8) DEFAULT NULL,
  `memo` text,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_supp_id` (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `purch_orders`
--


-- --------------------------------------------------------

--
-- 表的结构 `purch_order_products`
--

CREATE TABLE IF NOT EXISTS `purch_order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL COMMENT '订单ID',
  `pro_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `delivery_date` date DEFAULT NULL COMMENT '收货日期',
  `unit_price` double DEFAULT NULL COMMENT '单价',
  `quantity_ord` double DEFAULT NULL COMMENT '订购数量',
  `quantity_recd` double DEFAULT NULL COMMENT '实收数量',
  `status` varchar(8) DEFAULT NULL,
  `memo` text,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `purch_order_products`
--


-- --------------------------------------------------------

--
-- 表的结构 `stock_categories`
--

CREATE TABLE IF NOT EXISTS `stock_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `stock_categories`
--


-- --------------------------------------------------------

--
-- 表的结构 `stock_cat_properties`
--

CREATE TABLE IF NOT EXISTS `stock_cat_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT NULL,
  `label` varchar(120) DEFAULT NULL,
  `controltype` varchar(8) DEFAULT NULL,
  `defaultvalue` text,
  `require` tinyint(4) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cat_id` (`categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `stock_cat_properties`
--


-- --------------------------------------------------------

--
-- 表的结构 `stock_products`
--

CREATE TABLE IF NOT EXISTS `stock_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(11) DEFAULT NULL COMMENT '仓库ID',
  `pro_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `quantity` double DEFAULT NULL COMMENT '数量',
  PRIMARY KEY (`id`),
  KEY `fk_pro_id` (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `stock_products`
--


-- --------------------------------------------------------

--
-- 表的结构 `stock_pro_properties`
--

CREATE TABLE IF NOT EXISTS `stock_pro_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL,
  `cat_proper_id` int(11) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pro_id` (`pro_id`),
  KEY `fk_cat_prop_id` (`cat_proper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `stock_pro_properties`
--


-- --------------------------------------------------------

--
-- 表的结构 `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `province` tinyint(4) DEFAULT NULL,
  `city` tinyint(4) DEFAULT NULL,
  `addr` varchar(200) DEFAULT NULL,
  `since` date DEFAULT NULL COMMENT '公司成立日期',
  `bankpartics` varchar(200) DEFAULT NULL COMMENT '银行帐号开户地址',
  `bankact` varchar(200) DEFAULT NULL COMMENT '银行帐号',
  `memo` text COMMENT '备注',
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `suppliers`
--


-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');
