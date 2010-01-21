-- phpMyAdmin SQL Dump
-- version 3.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 03 月 01 日 11:25
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
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `gender`, `realname`, `birthday`, `marriage`, `addrees`, `phone`, `mobile`, `email`, `photo`, `memo`, `user_id`, `add_ip`, `created`, `modified`) VALUES
(1, 'admin', '098f6bcd4621d373cade4e832627b4f6', '', '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, 0, 0);
