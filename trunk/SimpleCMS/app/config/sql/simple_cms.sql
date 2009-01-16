-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 01 月 16 日 14:36
-- 服务器版本: 5.1.22
-- PHP 版本: 5.2.6-2ubuntu4

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
