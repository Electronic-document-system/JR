-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-12-16 08:15:03
-- 服务器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `csv_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_department`
--

CREATE TABLE `t_department` (
  `部门` varchar(2) DEFAULT NULL,
  `密级` varchar(2) DEFAULT NULL,
  `成员数` int(1) DEFAULT NULL,
  `管理人` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_department`
--

INSERT INTO `t_department` (`部门`, `密级`, `成员数`, `管理人`) VALUES
('一处', '绝密', 2, '狼王'),
('二处', '机密', 3, '大红');

-- --------------------------------------------------------

--
-- 表的结构 `t_files`
--

CREATE TABLE `t_files` (
  `发送者` varchar(10) DEFAULT NULL,
  `接受者` varchar(10) DEFAULT NULL,
  `文件名` varchar(10) DEFAULT NULL,
  `时间` varchar(10) DEFAULT NULL,
  `文件状态` varchar(10) DEFAULT NULL,
  `密级` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_files`
--

INSERT INTO `t_files` (`发送者`, `接受者`, `文件名`, `时间`, `文件状态`, `密级`) VALUES
('狼王', '大红', 'chrome_200', '2023-11-29', '已读', '绝密'),
('root', '大红', 'vulkan-1.d', '2023-12-11', '未读', '机密'),
('root', '大红', '20231027.p', '2023-12-11', '未读', '绝密'),
('root', '大红', 'twofish-an', '2023-12-11', '未读', '普通'),
('大红', '大明', '20211120刘钟', '2023-12-11', '未读', '绝密');

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE `t_user` (
  `id` int(1) DEFAULT NULL,
  `username` varchar(7) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `realname` varchar(4) DEFAULT NULL,
  `role` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `realname`, `role`) VALUES
(1, '小红', '123', '大红', '普通'),
(2, '小明', '345', '大明', '秘密'),
(3, 'root', 'liu12345', '狼王', '绝密'),
(4, 'allroot', '123', 'root', '管理员');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
