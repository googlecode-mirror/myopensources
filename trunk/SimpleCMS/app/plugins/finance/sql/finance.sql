-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 02 月 21 日 08:32
-- 服务器版本: 5.1.30
-- PHP 版本: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dev_apf`
--

-- --------------------------------------------------------

--
-- 表的结构 `apf_finance`
--

CREATE TABLE IF NOT EXISTS `apf_finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(5) DEFAULT NULL,
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
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

-- --------------------------------------------------------

--
-- 表的结构 `apf_finance_category`
--

CREATE TABLE IF NOT EXISTS `apf_finance_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) DEFAULT NULL,
  `active` varchar(8) NOT NULL DEFAULT 'new',
  `add_ip` varchar(24) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;
