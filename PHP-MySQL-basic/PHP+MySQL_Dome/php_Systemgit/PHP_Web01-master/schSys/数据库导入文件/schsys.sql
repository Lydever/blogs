-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-12-12 11:19:16
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schsys`
--

-- --------------------------------------------------------

--
-- 表的结构 `c`
--

CREATE TABLE `c` (
  `cno` char(4) COLLATE utf8_bin NOT NULL COMMENT '课程号',
  `cname` char(20) COLLATE utf8_bin NOT NULL COMMENT '课程名',
  `credit` int(4) DEFAULT NULL COMMENT '学分',
  `cmajor` char(20) COLLATE utf8_bin DEFAULT NULL COMMENT '所属专业'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='课程表';

--
-- 转存表中的数据 `c`
--

INSERT INTO `c` (`cno`, `cname`, `credit`, `cmajor`) VALUES
('0001', '数据库概论', 4, '计算机科学与技术'),
('0002', '计算机网络', 4, '计算机科学与技术'),
('0003', 'JSP编程技术', 4, '计算机科学与技术'),
('0004', '物联网软件', 4, '物联网工程'),
('0005', '物联网概论', 2, '物联网工程'),
('0006', '通信技术', 3, '物联网工程');

-- --------------------------------------------------------

--
-- 表的结构 `s`
--

CREATE TABLE `s` (
  `username` char(6) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `sno` char(6) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `name` char(10) COLLATE utf8_bin DEFAULT NULL COMMENT '姓名',
  `sex` char(4) COLLATE utf8_bin DEFAULT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `tel` char(11) COLLATE utf8_bin DEFAULT NULL COMMENT '联系方式',
  `dept` char(10) COLLATE utf8_bin DEFAULT NULL COMMENT '院系',
  `major` char(20) COLLATE utf8_bin NOT NULL COMMENT '专业',
  `grade` int(4) NOT NULL DEFAULT '0' COMMENT '总学分'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='学生表';

--
-- 转存表中的数据 `s`
--

INSERT INTO `s` (`username`, `sno`, `name`, `sex`, `age`, `tel`, `dept`, `major`, `grade`) VALUES
('10001', '172093', '陈旭', '男', 21, '13879962331', '计算机', '计算机科学与技术', 8),
('10002', '172090', '李立', '男', 20, '15278561258', '计算机', '计算机科学与技术', 0),
('10003', '172088', '张达', '男', 20, '13021153321', '计算机', '物联网工程', 2),
('10004', '172022', '李华', '男', 20, NULL, '计算机', '物联网工程', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sc`
--

CREATE TABLE `sc` (
  `sno` char(6) COLLATE utf8_bin NOT NULL COMMENT '学号',
  `cno` char(4) COLLATE utf8_bin NOT NULL COMMENT '课程号',
  `cgrade` int(4) NOT NULL DEFAULT '0' COMMENT '成绩'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='选课表';

--
-- 转存表中的数据 `sc`
--

INSERT INTO `sc` (`sno`, `cno`, `cgrade`) VALUES
('172022', '0004', 0),
('172088', '0005', 2),
('172090', '0002', 0),
('172090', '0003', 0),
('172093', '0001', 4),
('172093', '0002', 0),
('172093', '0003', 4);

-- --------------------------------------------------------

--
-- 表的结构 `t`
--

CREATE TABLE `t` (
  `username` char(6) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `tno` char(6) COLLATE utf8_bin NOT NULL COMMENT '工号',
  `name` char(10) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `sex` char(4) COLLATE utf8_bin NOT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `tel` char(11) COLLATE utf8_bin DEFAULT NULL COMMENT '联系方式',
  `dept` char(10) COLLATE utf8_bin NOT NULL COMMENT '院系',
  `class` char(20) COLLATE utf8_bin DEFAULT NULL COMMENT '教授课程',
  `cno` char(4) COLLATE utf8_bin DEFAULT NULL COMMENT '对应课程号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='老师表';

--
-- 转存表中的数据 `t`
--

INSERT INTO `t` (`username`, `tno`, `name`, `sex`, `age`, `tel`, `dept`, `class`, `cno`) VALUES
('20001', '170001', '王丽', '女', 42, '15278561252', '计算机', '数据库概论', '0001'),
('20002', '170002', '张亮', '男', 26, '13265474458', '计算机', '计算机网络', '0002'),
('20003', '170003', '王智', '男', 22, '13870526631', '计算机', 'JSP编程技术', '0003'),
('20004', '170004', '王纲', '男', 38, '17356481002', '计算机', '物联网软件', '0004'),
('20005', '170005', '刘英', '女', 35, '13779952001', '计算机', '物联网概论', '0005'),
('20006', '170006', '张淑芳', '女', 38, '13221145565', '计算机', '通信技术', '0006');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `username` char(6) COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `password` char(6) COLLATE utf8_bin NOT NULL DEFAULT '123456' COMMENT '密码',
  `role` char(6) COLLATE utf8_bin NOT NULL DEFAULT '学生' COMMENT '角色'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('00000', '000000', '系统管理员'),
('10001', '123456', '学生'),
('10002', '123456', '学生'),
('10003', '123456', '学生'),
('10004', '123456', '学生'),
('20001', '123456', '老师'),
('20002', '123456', '老师'),
('20003', '123456', '老师'),
('20004', '123456', '老师'),
('20005', '123456', '老师'),
('20006', '123456', '老师');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c`
--
ALTER TABLE `c`
  ADD PRIMARY KEY (`cno`);

--
-- Indexes for table `s`
--
ALTER TABLE `s`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `sc`
--
ALTER TABLE `sc`
  ADD PRIMARY KEY (`sno`,`cno`);

--
-- Indexes for table `t`
--
ALTER TABLE `t`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
