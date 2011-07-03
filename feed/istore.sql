-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 04 月 12 日 05:17
-- 服务器版本: 5.1.30
-- PHP 版本: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `istore`
--

-- --------------------------------------------------------

--
-- 表的结构 `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` tinyint(4) DEFAULT NULL COMMENT '用于标识是应用还是游戏，1为应用，2为游戏',
  `cid` int(11) DEFAULT NULL COMMENT '分类ID',
  `icon` varchar(255) DEFAULT NULL COMMENT '应用程序图标',
  `name` varchar(120) DEFAULT NULL COMMENT '软件名称',
  `score` decimal(3,1) DEFAULT '0.0' COMMENT '综合得分',
  `content` text COMMENT '软件描述',
  `price` decimal(8,2) DEFAULT NULL COMMENT '价格',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `upload_time` int(11) DEFAULT NULL COMMENT '软件更新时间',
  `downloads` int(11) DEFAULT NULL COMMENT '总下载量',
  `size` varchar(10) DEFAULT NULL COMMENT '软件大小',
  `os` varchar(20) DEFAULT NULL COMMENT '支持的OS版本,如：1.5,1.6.....以逗号分隔',
  `apk_url` varchar(255) DEFAULT NULL,
  `published` tinyint(4) DEFAULT '1' COMMENT '是否上架，1为已上架，为已下架',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `modified` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='软件基本信息' AUTO_INCREMENT=61 ;

--
-- 导出表中的数据 `applications`
--

INSERT INTO `applications` (`id`, `pid`, `cid`, `icon`, `name`, `score`, `content`, `price`, `author`, `upload_time`, `downloads`, `size`, `os`, `apk_url`, `published`, `created`, `modified`) VALUES
(1, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '0联通手机营业厅', 8.0, '0联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(2, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '1联通手机营业厅', 8.0, '1联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(3, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '2联通手机营业厅', 8.0, '2联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(4, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '3联通手机营业厅', 8.0, '3联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(5, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '4联通手机营业厅', 8.0, '4联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(6, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '5联通手机营业厅', 8.0, '5联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(7, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '6联通手机营业厅', 8.0, '6联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(8, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '7联通手机营业厅', 8.0, '7联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(9, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '8联通手机营业厅', 8.0, '8联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(10, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '9联通手机营业厅', 8.0, '9联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(11, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '10联通手机营业厅', 8.0, '10联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(12, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '11联通手机营业厅', 8.0, '11联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(13, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '12联通手机营业厅', 8.0, '12联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(14, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '13联通手机营业厅', 8.0, '13联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(15, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '14联通手机营业厅', 8.0, '14联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(16, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '15联通手机营业厅', 8.0, '15联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(17, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '16联通手机营业厅', 8.0, '16联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(18, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '17联通手机营业厅', 8.0, '17联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(19, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '18联通手机营业厅', 8.0, '18联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(20, 1, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '19联通手机营业厅', 8.0, '19联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585069, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585069, 1302585069),
(21, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '20联通手机营业厅', 8.0, '20联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(22, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '21联通手机营业厅', 8.0, '21联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(23, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '22联通手机营业厅', 8.0, '22联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(24, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '23联通手机营业厅', 8.0, '23联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(25, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '24联通手机营业厅', 8.0, '24联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(26, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '25联通手机营业厅', 8.0, '25联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(27, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '26联通手机营业厅', 8.0, '26联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(28, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '27联通手机营业厅', 8.0, '27联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(29, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '28联通手机营业厅', 8.0, '28联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(30, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '29联通手机营业厅', 8.0, '29联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(31, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '30联通手机营业厅', 8.0, '30联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(32, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '31联通手机营业厅', 8.0, '31联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(33, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '32联通手机营业厅', 8.0, '32联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(34, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '33联通手机营业厅', 8.0, '33联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(35, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '34联通手机营业厅', 8.0, '34联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(36, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '35联通手机营业厅', 8.0, '35联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(37, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '36联通手机营业厅', 8.0, '36联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(38, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '37联通手机营业厅', 8.0, '37联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(39, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '38联通手机营业厅', 8.0, '38联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167),
(40, 2, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//4776035a85de4-f4f8-4bed-96d0-39c3ddaab066_icon.png', '39联通手机营业厅', 8.0, '39联通手机营业厅,它集各种常见查询功能于一身：查话费、查流量、查套餐、查积分、查账单、查缴费记录、查业务受理记录等都能轻松实现。', 0.00, '优友', 1302585167, 8000, '594.57 K', '1.6,2.0,2.0.1,2.1,2.', 'http://apk.gfan.com/Aspx/UserApp/DownLoad.aspx?apk=AkqtpCS6j5MSMzEtghuTl0add0lvvIC/Y3i51gaY9HKSl0add0lhidIetBc/RoIynBat/Dl0add0lfl0add0ltLDxYp17LEkUJh4R7uv5FvhBRrRdJl0add0lwSUGPABrSm9V1JWw=', 1, 1302585167, 1302585167);

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `pid` tinyint(4) DEFAULT NULL COMMENT '所属类别：1 为应用； 2 为游戏',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `modified` int(11) DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='软件分类信息' AUTO_INCREMENT=50 ;

--
-- 导出表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `name`, `pid`, `created`, `modified`) VALUES
(1, '浏览器', 1, 1302583931, 1302583931),
(2, '主题桌面', 1, 1302583931, 1302583931),
(3, '词典翻译', 1, 1302583931, 1302583931),
(4, '安全防护', 1, 1302583931, 1302583931),
(5, '输入法', 1, 1302583931, 1302583931),
(6, '交通导航', 1, 1302583931, 1302583931),
(7, '教育阅读', 1, 1302583931, 1302583931),
(8, '健康医疗', 1, 1302583931, 1302583931),
(9, '影音播放', 1, 1302583931, 1302583931),
(10, '生活娱乐', 1, 1302583931, 1302583931),
(11, '聊天社区', 1, 1302583931, 1302583931),
(12, '通话通信', 1, 1302583931, 1302583931),
(13, '金融理财', 1, 1302583931, 1302583931),
(14, '体育竞技', 1, 1302583931, 1302583931),
(15, '电子办公', 1, 1302583931, 1302583931),
(16, '资讯新闻', 1, 1302583931, 1302583931),
(17, '拍照摄影', 1, 1302583931, 1302583931),
(18, '系统工具', 1, 1302583931, 1302583931),
(19, '窗口小部件', 1, 1302583931, 1302583931),
(20, '实用工具', 1, 1302583931, 1302583931),
(21, '事务管理', 1, 1302583931, 1302583931),
(22, '模拟器', 2, 1302583931, 1302583931),
(23, '体育', 2, 1302583931, 1302583931),
(24, '休闲', 2, 1302583931, 1302583931),
(25, '益智', 2, 1302583931, 1302583931),
(26, '角色扮演', 2, 1302583931, 1302583931),
(27, '战略', 2, 1302583931, 1302583931),
(28, '动作', 2, 1302583931, 1302583931),
(29, '射击', 2, 1302583931, 1302583931),
(30, '经营', 2, 1302583931, 1302583931),
(31, '养成', 2, 1302583931, 1302583931),
(32, '冒险', 2, 1302583931, 1302583931),
(33, '网游', 2, 1302583931, 1302583931),
(34, '棋牌', 2, 1302583931, 1302583931),
(35, '创意游戏荟萃', 3, 1302583931, 1302583931),
(36, '本周热门游戏', 3, 1302583931, 1302583931),
(37, '精品动态壁纸', 3, 1302583931, 1302583931),
(38, 'QQ产品系列', 3, 1302583931, 1302583931),
(39, '假期出行宝典', 3, 1302583931, 1302583931),
(40, '魅族M9完美游戏', 3, 1302583931, 1302583931),
(41, '2010年最热游戏', 3, 1302583931, 1302583931),
(42, '2010年最热应用', 3, 1302583931, 1302583931),
(43, '影音播放', 3, 1302583931, 1302583931),
(44, '装机必备', 3, 1302583931, 1302583931),
(45, '精品游戏大作', 3, 1302583931, 1302583931),
(46, '模拟器集结号', 3, 1302583931, 1302583931),
(47, '消磨时光小游戏', 3, 1302583931, 1302583931),
(48, '社区交友', 3, 1302583931, 1302583931),
(49, '生活娱乐', 3, 1302583931, 1302583931);

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL COMMENT '应用程序ID',
  `content` text COMMENT '评论的内容',
  `uid` int(11) DEFAULT NULL COMMENT '发表评论的用户ID',
  `nickname` varchar(150) DEFAULT NULL COMMENT '用户发表评论时用的昵称',
  `addip` varchar(24) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `comments`
--


-- --------------------------------------------------------

--
-- 表的结构 `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL COMMENT '对应于Applications表的ID',
  `uri` varchar(255) DEFAULT NULL COMMENT '图片的URI位置',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `modified` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='应用程序截图' AUTO_INCREMENT=201 ;

--
-- 导出表中的数据 `images`
--

INSERT INTO `images` (`id`, `aid`, `uri`, `created`, `modified`) VALUES
(1, 1, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(2, 1, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(3, 1, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(4, 1, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(5, 1, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(6, 2, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(7, 2, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(8, 2, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(9, 2, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(10, 2, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(11, 3, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(12, 3, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(13, 3, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(14, 3, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(15, 3, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(16, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(17, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(18, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(19, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(20, 4, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(21, 5, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(22, 5, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(23, 5, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(24, 5, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(25, 5, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(26, 6, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(27, 6, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(28, 6, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(29, 6, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(30, 6, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(31, 7, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(32, 7, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(33, 7, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(34, 7, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(35, 7, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(36, 8, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(37, 8, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(38, 8, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(39, 8, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(40, 8, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(41, 9, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(42, 9, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(43, 9, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(44, 9, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(45, 9, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(46, 10, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(47, 10, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(48, 10, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(49, 10, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(50, 10, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(51, 11, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(52, 11, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(53, 11, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(54, 11, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(55, 11, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(56, 12, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(57, 12, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(58, 12, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(59, 12, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(60, 12, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(61, 13, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(62, 13, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(63, 13, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(64, 13, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(65, 13, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(66, 14, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(67, 14, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(68, 14, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(69, 14, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(70, 14, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(71, 15, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(72, 15, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(73, 15, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(74, 15, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(75, 15, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(76, 16, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(77, 16, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(78, 16, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(79, 16, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(80, 16, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(81, 17, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(82, 17, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(83, 17, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(84, 17, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(85, 17, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(86, 18, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(87, 18, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(88, 18, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(89, 18, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(90, 18, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(91, 19, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(92, 19, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(93, 19, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(94, 19, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(95, 19, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(96, 20, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(97, 20, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(98, 20, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(99, 20, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(100, 20, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(101, 21, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(102, 21, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(103, 21, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(104, 21, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(105, 21, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(106, 22, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(107, 22, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(108, 22, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(109, 22, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(110, 22, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(111, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(112, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(113, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(114, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(115, 23, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(116, 24, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(117, 24, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585288, 1302585288),
(118, 24, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585288, 1302585288),
(119, 24, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585288, 1302585288),
(120, 24, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585288, 1302585288),
(121, 25, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585288, 1302585288),
(122, 25, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(123, 25, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(124, 25, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(125, 25, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(126, 26, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(127, 26, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(128, 26, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(129, 26, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(130, 26, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(131, 27, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(132, 27, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(133, 27, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(134, 27, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(135, 27, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(136, 28, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(137, 28, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(138, 28, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(139, 28, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(140, 28, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(141, 29, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(142, 29, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(143, 29, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(144, 29, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(145, 29, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(146, 30, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(147, 30, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(148, 30, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(149, 30, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(150, 30, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(151, 31, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(152, 31, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(153, 31, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(154, 31, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(155, 31, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(156, 32, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(157, 32, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(158, 32, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(159, 32, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(160, 32, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(161, 33, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(162, 33, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(163, 33, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(164, 33, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(165, 33, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(166, 34, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(167, 34, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(168, 34, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(169, 34, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(170, 34, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(171, 35, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(172, 35, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(173, 35, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(174, 35, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(175, 35, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(176, 36, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(177, 36, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(178, 36, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(179, 36, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(180, 36, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(181, 37, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(182, 37, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(183, 37, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(184, 37, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(185, 37, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(186, 38, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(187, 38, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(188, 38, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(189, 38, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(190, 38, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(191, 39, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(192, 39, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(193, 39, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(194, 39, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(195, 39, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289),
(196, 40, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_216efb919-d935-4e34-bcd3-e9edc2f7e8f7.jpg', 1302585289, 1302585289),
(197, 40, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_3a6c7d44e-1c25-45fd-8335-be20fbe39f54.jpg', 1302585289, 1302585289),
(198, 40, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_426ada43c-79ff-4733-b759-d8c8d4d8495a.jpg', 1302585289, 1302585289),
(199, 40, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_57ede301c-473b-4e28-bc52-24eee18d62d2.jpg', 1302585289, 1302585289),
(200, 40, 'http://apk.gfan.com/asdf/PImages/2010/12//47760_6df967585-6c6c-44fc-9762-3351de77250f.jpg', 1302585289, 1302585289);

-- --------------------------------------------------------

--
-- 表的结构 `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL COMMENT '应用程序id',
  `score` decimal(1,1) DEFAULT NULL COMMENT '所评分数',
  `addip` varchar(24) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户评分表' AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `scores`
--

