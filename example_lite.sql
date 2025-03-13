-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 4500111_selepowu
-- 生成日期： 2019-12-22 18:41:14
-- 伺服器版本： 5.6.45-log
-- PHP 版本： 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `4500111_selepowu`
--

-- --------------------------------------------------------

--
-- 表的結構 `course`
--

CREATE TABLE `course` (
  `cid` char(6) DEFAULT NULL,
  `cname` varchar(15) DEFAULT NULL,
  `credit` decimal(2,1) DEFAULT NULL,
  `cadd` varchar(20) DEFAULT NULL,
  `did` char(2) DEFAULT NULL,
  `tname` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `course`
--

INSERT INTO `course` (`cid`, `cname`, `credit`, `cadd`, `did`, `tname`) VALUES
('300001', '經濟人類學', '3.0', '中心公教樓106d', '01', '舒萍'),
('300002', '馬克思主義哲學(1)', '3.0', '中心公教樓103d', '01', '馮波'),
('300003', '美學概論', '2.0', '中心理綜樓402d', '01', '李必桂'),
('300004', '社會工作概論', '3.0', '中心理綜樓311d', '01', '任麗新'),
('300005', '社會資料分析', '3.0', '中心理綜樓203d', '01', '張月雲'),
('300006', '社會心理學', '3.0', '中心理綜樓203d', '01', '馬廣海'),
('300007', '社會學概論', '4.0', '中心理綜樓115d', '01', '萬麗麗');

-- --------------------------------------------------------

--
-- 表的結構 `department`
--

CREATE TABLE `department` (
  `did` char(2) DEFAULT NULL,
  `dname` varchar(15) NOT NULL,
  `dadd` varchar(30) DEFAULT NULL,
  `dmng` varchar(10) DEFAULT NULL,
  `dtel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `department`
--

INSERT INTO `department` (`did`, `dname`, `dadd`, `dmng`, `dtel`) VALUES
('01', '哲學與社會發展學院', '中心公教樓106d', '萬興慶', '13310001100'),
('20', '土建與水利學院', '興隆山群樓C座3301d', '羅雅達', '13929298269'),
('23', '基礎醫學院', '趵突泉圖西201d', '尹高軒', '13727524159');

-- --------------------------------------------------------

--
-- 表的結構 `major`
--

CREATE TABLE `major` (
  `did` char(2) DEFAULT NULL,
  `mname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `major`
--

INSERT INTO `major` (`did`, `mname`) VALUES
('01', '哲學'),
('01', '宗教學'),
('01', '社會學'),
('01', '社會工作學'),
('20', '土木工程'),
('20', '工程力學'),
('20', '建築學'),
('20', '水利水電工程');

-- --------------------------------------------------------

--
-- 表的結構 `student`
--

CREATE TABLE `student` (
  `sid` char(12) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sex` char(1) NOT NULL,
  `age` varchar(3) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `idnum` char(18) DEFAULT NULL,
  `did` char(2) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `tel` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `student`
--

INSERT INTO `student` (`sid`, `name`, `sex`, `age`, `class`, `idnum`, `did`, `email`, `tel`) VALUES
('201800131000', '王陽明', '男', '20', '2018', '133120200010115867', '01', NULL, NULL),
('201600012405', '董意遠', '男', '18', '2016', '123120200010115867', '01', NULL, NULL),
('201600012409', '魏千易', '女', '20', '2016', '120878200010177388', '01', NULL, NULL),
('201600012489', '程平彤', '女', '19', '2016', '120492200112101327', '01', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的結構 `student_course`
--

CREATE TABLE `student_course` (
  `sid` char(12) NOT NULL,
  `cid` char(6) NOT NULL,
  `score` int(3) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `student_course`
--

INSERT INTO `student_course` (`sid`, `cid`, `score`, `status`) VALUES
('201600012405', '300001', 76, '0'),
('201800131000', '300002', 0, '0'),
('201800131000', '300003', NULL, '0'),
('201800131000', '300004', NULL, '0'),
('201800131000', '300002', 65, '1'),
('201800131000', '300005', NULL, '0'),
('201800131000', '300001', 99, '1'),
('201800131000', '300002', NULL, '1');
-- --------------------------------------------------------

--
-- 表的結構 `student_log`
--

CREATE TABLE `student_log` (
  `sid` varchar(12) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `reason` varchar(30) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `logdate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `student_log`
--

INSERT INTO `student_log` (`sid`, `type`, `reason`, `detail`, `logdate`, `addtime`) VALUES
('201600012405', '1', '資料庫課程設計表現優秀', '讀一本好書，就如同和一個高尚的人在交談一樣。', '2019-11-02', '2019-12-15 18:33:02'),
('201600012405', '1', '碼代碼', 'PHP是最好的語言!', '2019-11-22', '2019-11-22 17:52:10'),
('201600012405', '1', '科技創新獎', '電腦的發生，到底需要如何做到，不電腦的發生，又會如何產生。', '2019-11-05', '2019-11-25 14:11:46'),
('201800131000', '1', '資料庫課程設計', '資料庫課程設計表現優秀，獲得非常高的評價.', '2019-12-06', '2019-12-21 23:21:10'),
('201800131000', '1', '在設計省份宣傳大賽上獲獎', '宣傳自己的家鄉，熱愛家鄉文化', '2019-12-12', '2019-12-06 10:25:54'),
('201800131000', '1', '程式設計比賽獲一等獎', '程式設計能力優秀，獲得了一等獎,是最好成績', '2019-01-01', '2019-12-16 13:57:45'),
('201800112380', '1', '資料課程設計獲獎', '設計的資料庫功能齊全，在評比中獲獎。', '2019-11-12', '2019-12-15 18:35:27'),
('201800131000', '0', '宿舍衛生扣分', '宿舍內衛生間未清理', '2019-12-12', '2019-12-15 19:24:49'),
('201800131000', '0', '上課遲到', '上課遲到一次,記過', '2019-12-10', '2019-12-16 14:49:29'),
('201800131000', '0', '宿舍違規', '使用違規電器，通報批評一次', '2019-12-12', '2019-12-16 14:28:42'),
('201800131000', '1', '排球比賽團體獎', '排球比賽團體獎', '2019-12-16', '2019-12-16 15:26:32'),
('201800131000', '0', '未按時回學校', '假期結束之後未按時回到學校上課', '2019-12-10', '2019-12-16 15:29:26'),
('201800131000', '1', '測試', '這是一個測試項', '2019-12-21', '2019-12-22 15:24:42');

-- --------------------------------------------------------

--
-- 表的結構 `user_admin`
--

CREATE TABLE `user_admin` (
  `adminID` varchar(15) DEFAULT NULL,
  `adminName` varchar(15) DEFAULT NULL,
  `pwd` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `user_admin`
--

INSERT INTO `user_admin` (`adminID`, `adminName`, `pwd`) VALUES
('admin', 'A先生', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的結構 `user_student`
--

CREATE TABLE `user_student` (
  `sid` char(12) NOT NULL,
  `pwd` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存表中的資料 `user_student`
--

INSERT INTO `user_student` (`sid`, `pwd`) VALUES
('201600012405', 'ba4b2802df460659e9d6d29206bfffa2'),
('201600012409', 'bbee4b099863546c5fd990778fcb7de1'),
('201600012489', '4e0814a1c4a760151f3aca25801fe8be'),
('201800131000', '834bd59018ac969c360c27c5fae4cf8c');

--
-- 轉儲表的索引
--

--
-- 表的索引 `course`
--
ALTER TABLE `course`
  ADD UNIQUE KEY `cid_2` (`cid`),
  ADD KEY `cid` (`cid`);

--
-- 表的索引 `department`
--
ALTER TABLE `department`
  ADD UNIQUE KEY `did_2` (`did`),
  ADD KEY `did` (`did`);

--
-- 表的索引 `major`
--
ALTER TABLE `major`
  ADD UNIQUE KEY `did_2` (`did`,`mname`),
  ADD KEY `did` (`did`);

--
-- 表的索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- 表的索引 `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `sid` (`sid`),
  ADD KEY `cid` (`cid`);

--
-- 表的索引 `student_log`
--
ALTER TABLE `student_log`
  ADD KEY `sid` (`sid`);

--
-- 表的索引 `user_admin`
--
ALTER TABLE `user_admin`
  ADD KEY `adminID` (`adminID`);

--
-- 表的索引 `user_student`
--
ALTER TABLE `user_student`
  ADD UNIQUE KEY `sid` (`sid`),
  ADD KEY `sid_2` (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
