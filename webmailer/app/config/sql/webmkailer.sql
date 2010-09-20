-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 04 月 07 日 14:16
-- 服务器版本: 5.1.30
-- PHP 版本: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test_webmkailer`
--

-- --------------------------------------------------------

--
-- 表的结构 `mail_customers`
--

DROP TABLE IF EXISTS `mail_customers`;
CREATE TABLE IF NOT EXISTS `mail_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_customer_category_id` int(11) NOT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `memo` text,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `mail_customer_categories_id` (`mail_customer_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `mail_templates`
--

DROP TABLE IF EXISTS `mail_templates`;
CREATE TABLE IF NOT EXISTS `mail_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(120) NOT NULL,
  `from` varchar(120) NOT NULL,
  `from_name` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `subject` varchar(120) DEFAULT NULL,
  `content` text,
  `plain_text` int(1) DEFAULT NULL COMMENT '是否只為文本格式',
  `attachments` text NOT NULL,
  `created` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(50) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `realname` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `marriage` char(1) NOT NULL,
  `addrees` varchar(150) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `mobile` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `memo` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_ip` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
INSERT INTO `users` (`id`, `username`, `password`, `gender`, `realname`, `birthday`, `marriage`, `addrees`, `phone`, `mobile`, `email`, `photo`, `memo`, `user_id`, `add_ip`, `created`, `modified`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, 0, 0);


--
-- 表的结构 `mail_logs`
--

CREATE TABLE IF NOT EXISTS `mail_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
