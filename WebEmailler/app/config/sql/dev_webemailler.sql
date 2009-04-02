-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 04 月 02 日 17:59
-- 服务器版本: 5.1.22
-- PHP 版本: 5.2.6-2ubuntu4.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dev_webemailler`
--

-- --------------------------------------------------------

--
-- 表的结构 `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `memo` text,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `customers`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `mail_servers`
--


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
  `created` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `mail_templates`
--

