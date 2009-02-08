-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 02 月 08 日 02:34
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
-- 表的结构 `article_categories`
--

CREATE TABLE IF NOT EXISTS `article_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rght` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `article_categories`
--

INSERT INTO `article_categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `created`, `modified`) VALUES
(1, 0, 1, 4, '一级', 1232086996, 1232086996),
(2, 1, 2, 3, '二级', 1232087009, 1232087182),
(3, 0, 7, 8, '三级', 1232087020, 1232087191),
(4, 0, 5, 6, '同一级', 1232087032, 1232087032);

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
(1, 'admin', '098f6bcd4621d373cade4e832627b4f6');
