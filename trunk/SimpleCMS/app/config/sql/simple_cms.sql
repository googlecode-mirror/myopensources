-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 02 月 28 日 13:49
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
-- 表的结构 `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_categories_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(120) NOT NULL,
  `contents` text NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `articles`
--

INSERT INTO `articles` (`id`, `article_categories_id`, `title`, `contents`, `photo`, `created`, `modified`) VALUES
(1, 1, 'FDSFD', 'FDSFDSFDS', 'uploads/article/2009/0214/51b1fdabf78c4d62d3bd9b139a349f46.JPG', 1234569644, 1234569644),
(2, 3, '????', '????????????????', 'uploads/article/2009/0214/21fb48c61194e700e845837ea28276e2.JPG', 1234571927, 1234571927),
(3, 1, 'eecccc', 'sssddd', 'uploads/article/2009/0214/361b08945b433fe58f47b333b7e1306f.JPG', 1234573644, 1234573644),
(4, 1, 'sgsff', 'dsafdsf', 'uploads/article/2009/0214/1a7dc4bda6db6e07c493802c7dd99e71.JPG', 1234573693, 1234573693),
(5, 3, 'eeeeeeeee', 'eeeeee', 'uploads/article/2009/0214/2cb3b78987434a8c40bc589e76d70e51.JPG', 1234581638, 1234581638),
(6, 1, 'sdfdsf', 'dsfdsaf', 'uploads/article/2009/0215/67d383529e068fa7f708ee5a552c1a67.JPG', 1234678830, 1234678830),
(7, 1, 'gdsafds', 'fdsadsfa', 'uploads/article/2009/0215/4f17231305dad72f5c1e52709a8a77ed.JPG', 1234678896, 1234678896),
(8, 3, 'test', 'test', 'uploads/article/2009/0215/f3e07d2ac9e838b34c4a5e5f578e32e0.JPG', 1234679132, 1234679132);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- 导出表中的数据 `finance_categories`
--

INSERT INTO `finance_categories` (`id`, `category_name`, `active`, `add_ip`, `created`, `modified`) VALUES
(11, '不错呀', 'live', '127.0.0.1', 1235219288, 1235219288),
(10, '还行dddddd', 'new', '127.0.0.1', 1235214232, 1235260554),
(9, '太好了', 'new', '127.0.0.1', 1235214157, 1235214157);

-- --------------------------------------------------------

--
-- 表的结构 `financies`
--

CREATE TABLE IF NOT EXISTS `financies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `finance_categories_id` int(5) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `amount` tinyint(4) DEFAULT NULL,
  `debit` varchar(4) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `memo` text,
  `active` varchar(8) NOT NULL DEFAULT 'new',
  `access` varchar(8) DEFAULT NULL,
  `groupid` varchar(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `add_ip` varchar(24) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- 导出表中的数据 `financies`
--

INSERT INTO `financies` (`id`, `finance_categories_id`, `create_date`, `amount`, `debit`, `money`, `memo`, `active`, `access`, `groupid`, `user_id`, `add_ip`, `created`, `modified`) VALUES
(3, 11, '2009-02-28', 2, 'P', 5544.00, 'gdsfd', 'new', NULL, '0', 0, '127.0.0.1', 1235819498, 1235819498),
(4, 10, '2009-02-28', 1, 'P', 77.00, '不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧不是吧', 'deleted', NULL, '0', 0, '127.0.0.1', 1235819799, 1235822290),
(5, 9, '2009-02-28', 1, 'I', 55.00, 'gdfd', 'live', NULL, '0', 0, '127.0.0.1', 1235819812, 1235822266),
(6, 11, '2009-02-28', 1, 'P', 44.00, '', 'new', NULL, '0', 0, '127.0.0.1', 1235825822, 1235825822),
(7, 11, '2009-02-28', 1, 'P', 3.00, '', 'new', NULL, '0', 0, '127.0.0.1', 1235825861, 1235825861);

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `groups`
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
(1, 'admin', '098f6bcd4621d373cade4e832627b4f6');
