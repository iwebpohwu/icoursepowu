-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `edu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `edu`;

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `cid` varchar(3) NOT NULL COMMENT '課程編號',
  `tid` varchar(6) NOT NULL COMMENT '教師編號',
  `cname` varchar(50) NOT NULL COMMENT '課程名稱',
  `credit` decimal(2,1) NOT NULL COMMENT '課程學分',
  `term` varchar(100) NOT NULL COMMENT '學年學期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='課程表';

INSERT INTO `course` (`id`, `cid`, `tid`, `cname`, `credit`, `term`) VALUES
(1,	'001',	'100036',	'C語言程式設計',	3.0,	'2018年下學期'),
(2,	'002',	'100036',	'java程式設計實踐',	4.0,	'2019年上學期'),
(3,	'003',	'100033',	'資料庫系統概念',	2.5,	'2019年下學期'),
(4,	'004',	'100030',	'高等數學',	6.0,	'2018年下學期'),
(5,	'005',	'100020',	'大學英語視聽說教程',	1.0,	'2018年下學期'),
(6,	'006',	'100036',	'C++程式實踐',	4.5,	'2018年下學期'),
(7,	'007',	'100030',	'離散數學',	3.0,	'2018年下學期'),
(8,	'008',	'100020',	'大學英語讀寫',	3.0,	'2019年上學期'),
(9,	'009',	'100033',	'資料庫索引優化',	3.0,	'2018年下學期'),
(10,	'010',	'100010',	'大學體育',	2.0,	'2018年下學期');

DROP TABLE IF EXISTS `course_student`;
CREATE TABLE `course_student` (
  `sid` varchar(10) NOT NULL COMMENT '學號',
  `cid` varchar(3) NOT NULL COMMENT '課程編號'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `course_student` (`sid`, `cid`) VALUES
('2015551427',	'006'),
('2015551401',	'010'),
('2015551401',	'005'),
('2015551403',	'001'),
('2015551401',	'001'),
('2015551427',	'001'),
('2015551427',	'003'),
('2015551401',	'007'),
('2015551405',	'001'),
('2015551405',	'010'),
('2015551405',	'006'),
('2015551405',	'005'),
('2015551401',	'003'),
('2015551427',	'005'),
('2015551427',	'008'),
('2015551403',	'010'),
('2015551403',	'006'),
('2015551403',	'004');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sid` varchar(10) NOT NULL COMMENT '學號',
  `sname` varchar(100) NOT NULL COMMENT '姓名',
  `password` varchar(20) NOT NULL COMMENT '密碼',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='學生表';

INSERT INTO `student` (`id`, `sid`, `sname`, `password`) VALUES
(1,	'2015551427',	'潘俚璋',	'123456'),
(2,	'2015551401',	'柏強',	'123456'),
(3,	'2015551405',	'孫佳甯',	'123456'),
(4,	'2015551402',	'朱文武',	'123456'),
(5,	'2015551417',	'吳彌鑫',	'123456'),
(8,	'2015551403',	'林濱',	'123456');

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(10) unsigned NOT NULL COMMENT 'id',
  `tname` varchar(100) NOT NULL COMMENT '教師姓名',
  `tel` varchar(11) NOT NULL COMMENT '教師電話'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `teacher` (`id`, `tname`, `tel`) VALUES
(100036,	'李志清',	'13202025580'),
(100033,	'劉新',	'15278781111'),
(100030,	'王凱',	'15865657821'),
(100020,	'胡軍',	'13867602550'),
(100010,	'張強',	'13203213554');

-- 2018-11-17 08:14:58
