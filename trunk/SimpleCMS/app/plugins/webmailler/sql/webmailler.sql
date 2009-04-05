-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 04 月 05 日 05:18
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
-- 表的结构 `mail_customers`
--

DROP TABLE IF EXISTS `mail_customers`;
CREATE TABLE IF NOT EXISTS `mail_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_customer_categories_id` int(11) NOT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `memo` text,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `mail_customer_categories_id` (`mail_customer_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- 表的结构 `mail_customer_categories`
--

DROP TABLE IF EXISTS `mail_customer_categories`;
CREATE TABLE IF NOT EXISTS `mail_customer_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `active` varchar(8) NOT NULL DEFAULT 'new',
  `add_ip` varchar(24) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `mail_servers`
--

DROP TABLE IF EXISTS `mail_servers`;
CREATE TABLE IF NOT EXISTS `mail_servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(120) DEFAULT NULL,
  `ssl` int(1) DEFAULT NULL,
  `port` varchar(4) DEFAULT NULL,
  `account` varchar(120) DEFAULT NULL,
  `passwd` varchar(60) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `host` (`host`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `mail_templates`
--

DROP TABLE IF EXISTS `mail_templates`;
CREATE TABLE IF NOT EXISTS `mail_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `subject` varchar(120) DEFAULT NULL,
  `content` text,
  `plain_text` int(1) DEFAULT NULL COMMENT '是否只為文本格式',
  `attachments` text NOT NULL,
  `created` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
