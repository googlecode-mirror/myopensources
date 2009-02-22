-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 02 月 22 日 14:50
-- 服务器版本: 5.1.30
-- PHP 版本: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dev_simple_cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `finance_categories`
--

CREATE TABLE IF NOT EXISTS `finance_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) DEFAULT NULL,
  `active` varchar(8) NOT NULL DEFAULT 'new',
  `add_ip` varchar(24) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `finance_categories`
--


-- --------------------------------------------------------

--
-- 表的结构 `financies`
--

CREATE TABLE IF NOT EXISTS `financies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `finance_category_id` int(5) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `amount` tinyint(4) DEFAULT NULL,
  `debit` varchar(4) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `memo` text,
  `active` varchar(8) NOT NULL DEFAULT 'new',
  `access` varchar(8) DEFAULT NULL,
  `groupid` varchar(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `add_ip` varchar(24) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `financies`
--

