-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-10-06 10:02:09
-- 服务器版本： 5.7.21-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wawj`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '可以作为登录用户名的手机号，在绑定手机后写入本字段以确保唯一性',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '可以作为登录用户名的email，在绑定邮箱后写入本字段以确保唯一性',
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户登录账户',
  `sex` enum('Man','Woman','Secret') COLLATE utf8mb4_unicode_ci DEFAULT 'Secret' COMMENT '性别',
  `role` enum('SiteAdministrator','SuperAdministrator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SiteAdministrator' COMMENT '用户有2种：1超级管理员（网站管理员受其管理），2网站管理员（负责网站运营，可以管理各类网站用户和机构）',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Active','Disabled','Suspended','Refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active' COMMENT '账户状态：正常（激活的），禁止（被网站管理员或机构管理员禁止），悬而未决（申请并等待激活），被拒（申请激活被管理员拒绝）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_phone` (`account_phone`) USING BTREE,
  UNIQUE KEY `account_email` (`account_email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户登录账户表';

--
-- 转存表中的数据 `administrator`
--

INSERT INTO `administrator` (`id`, `account_phone`, `password`, `account_email`, `real_name`, `sex`, `role`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '13306816366', '$2y$10$SGkG7LiU/VUNoweu02I4Bu6eRhglj.OB3ctF1z5bzGFb5i5q657uC', 'wjj@zufe.edu.cn', '吴建军', 'Secret', 'SuperAdministrator', 'KSlVOKflaqhDsmf3lfgG8LS2QNFUd4JAl8uFLXRSy1oynPgZ4kQY8CR6DvdQ', 'Active', '2018-09-25 06:12:34', '2018-09-25 08:38:35');

-- --------------------------------------------------------

--
-- 表的结构 `agency`
--

DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_agent_id` int(10) NOT NULL COMMENT '中介机构管理员的用户id，对应agent表id',
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中介结构名称',
  `introduction` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中介机构简介',
  `address` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Active','Disabled','Suspended','Refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disabled' COMMENT '中介机构状态：正常（激活的），禁止（被网站管理员禁止），悬而未决（申请并等待网站管理员激活），被拒（申请激活被管理员拒绝）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='中介机构信息表';

--
-- 转存表中的数据 `agency`
--

INSERT INTO `agency` (`id`, `manager_agent_id`, `agency_name`, `introduction`, `address`, `phone`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, '我爱我家', '使用laravel的Eloquent模型获取数据库的指定列 - river_r..._博客园\r\n2016年8月14日 - 使用laravel的Eloquent模型获取数据库的指定列 使用Laravel的ORM——Eloquent时,时常遇到的一个操作是取模型中的其中一些属性,对应的就是在数据库中取...\r\nhttps://www.cnblogs.com/riverr...  - 百度快照\r\nLaravel Eloquent ORM 时如何查询表中指定的字段 - CSDN博客', '', '0571-88001111', 'Active', '2018-02-19 10:19:10', '2018-08-27 03:11:44'),
(2, 1, '我爱我家1', '我爱我家1我爱我家1我爱我家1我爱我家1我爱我家1我爱我家1我爱我家1我爱我家1我爱我家1', '', '0571-88001111', 'Active', '2018-02-19 10:19:10', '2018-08-27 03:11:44'),
(3, 1, '我爱我家2', '我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2我爱我家2', '', '0571-88001111', 'Active', '2018-02-19 10:19:10', '2018-08-27 03:11:44'),
(4, 1, '我爱我家3', '我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3我爱我家3', '', '0571-88001111', 'Active', '2018-02-19 10:19:10', '2018-08-27 03:11:44');

-- --------------------------------------------------------

--
-- 表的结构 `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('Man','Woman','Secret') COLLATE utf8mb4_unicode_ci DEFAULT 'Secret',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `belong_to_agency` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '中介人员加入的中介机构',
  `apply_to_agency` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '申请中的加盟',
  `manage_agency` int(11) DEFAULT NULL COMMENT '所管理的中介机构表agency的id',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Active','Disabled','Suspended','Refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active' COMMENT '账户状态：正常（激活的），禁止（被网站管理员或机构管理员禁止），悬而未决（申请并等待激活），被拒（申请激活被管理员拒绝）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_phone_unique` (`account_phone`) USING BTREE,
  UNIQUE KEY `id_number_unique` (`id_number`) USING BTREE,
  UNIQUE KEY `account_email_unique` (`email`) USING BTREE,
  UNIQUE KEY `id_picture_unique` (`id_picture`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='中介用户登录账户表';

--
-- 转存表中的数据 `agent`
--

INSERT INTO `agent` (`id`, `account_phone`, `real_name`, `sex`, `email`, `id_number`, `id_picture`, `introduction`, `belong_to_agency`, `apply_to_agency`, `manage_agency`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '15858166251', '章三', 'Secret', NULL, NULL, NULL, '章三15858166251', '|3|', '|2||4||1|', NULL, '$2y$10$27EOw773koMXPerafAA4MuN.02hpXoYyt/4C5Uy995VYTTc4wGvLm', '9ttGfxqQhuyQKSIx7KNZtzmDSfDkqguh2GxkoFy83py0dc65vkxexUKxigHh', 'Active', '2018-02-22 21:12:25', '2018-10-05 03:58:51'),
(3, '15858166252', '张三', 'Secret', NULL, NULL, NULL, '张三15858166252', NULL, NULL, NULL, '$2y$10$QHbeZBCK71rhTUwEJj.GLuChByNl22NT2q1ZAc2Wc.pXoN3a49rkG', '2e6ihWwQNJPtDdbfxjinoj7KLHOtjQEx3Oibdk0isY3M5Aa1yIC5WVTQE7yg', 'Active', '2018-02-22 21:14:38', '2018-09-05 00:51:01'),
(4, '15858166253', '张三', 'Secret', NULL, NULL, NULL, '张三15858166253', NULL, NULL, NULL, '$2y$10$zNt8qXfUZUQQNSd3l0W15uf/P83Sij26ABy6jWzZLq4pHJ/UxKZ52', 'AYeZP8gXvHhxaESEwMNuCaTjhlNeC8UJqBZJUClmVTM92HoqV6vqMJMg3NRR', 'Active', '2018-02-22 21:21:26', '2018-09-05 00:51:47'),
(5, '15858166254', '张三', 'Secret', NULL, NULL, NULL, '张三15858166254', NULL, NULL, NULL, '$2y$10$TjCCw2kI2geybxO2QMVyNe0zFsmkWiDQj5q/T2uLmCimlHMbmZAsy', '7DkI3lueuuGW8vojp8ymelULdSKgwpR9hdb6nEi3lsoZdlYv8z8chw85usAc', 'Active', '2018-02-22 21:29:43', '2018-09-05 01:20:44'),
(6, '15858166255', '张三', 'Secret', NULL, NULL, NULL, '张三15858166255', NULL, NULL, NULL, '$2y$10$JHaM14VmsD9Ed22s/Ze3wuwn/jx2WhKpCH0swiuNe2osTKKaRiM/S', NULL, 'Active', '2018-02-22 21:30:15', '2018-08-27 03:29:38'),
(7, '15858166256', '张三', 'Secret', NULL, NULL, NULL, '张三15858166256', NULL, NULL, NULL, '$2y$10$rhmpVSr4fLiY6ROuH.YyrO45u0XOq6L18V..WeArYyS7jouwuIXw6', NULL, 'Active', '2018-02-22 21:31:50', '2018-08-27 03:29:38'),
(8, '15858166257', '张三', 'Secret', NULL, NULL, NULL, '张三15858166257', NULL, NULL, NULL, '$2y$10$bvptjrSbOLNsR5h7TPejWe1KqYdLlwywHgBV5LScU20i/zOuAHAX.', NULL, 'Active', '2018-02-22 21:35:17', '2018-08-27 03:29:38');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reply_to_id` int(10) DEFAULT NULL COMMENT '回复给message某id的消息',
  `from_id` int(10) NOT NULL COMMENT '发送消息的id',
  `from_group` enum('user','agent','agency','administrator') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '发送消息的团体',
  `to_id` int(10) NOT NULL COMMENT '接收消息的用户id',
  `to_group` enum('user','agent','agency','administrator') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '接收消息的团体',
  `subject` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '消息主题',
  `message_type` enum('请求加盟','回复','咨询','同意','请求代理业务','拒绝') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '咨询' COMMENT '消息类型',
  `appendix` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '消息附件',
  `readed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否阅读过',
  `replyed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已回复',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `reply_to_id`, `from_id`, `from_group`, `to_id`, `to_group`, `subject`, `message_type`, `appendix`, `readed`, `replyed`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:16:31', '2018-03-06 14:55:56'),
(2, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:19:32', '2018-03-06 14:57:31'),
(3, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:23:14', '2018-03-04 06:23:14'),
(4, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:23:48', '2018-03-04 06:23:48'),
(5, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:24:30', '2018-03-04 06:24:30'),
(6, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:25:04', '2018-03-04 06:25:04'),
(7, NULL, 1, 'user', 0, 'user', '', '请求加盟', NULL, 0, 0, '2018-03-04 06:25:16', '2018-03-04 06:25:16'),
(8, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:23:29', '2018-08-21 00:23:29'),
(9, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:31:45', '2018-08-21 00:31:45'),
(10, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:32:00', '2018-08-21 00:32:00'),
(11, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:34:19', '2018-08-21 00:34:19'),
(12, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:34:19', '2018-08-21 00:34:19'),
(13, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:35:16', '2018-08-21 00:35:16'),
(14, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:35:16', '2018-08-21 00:35:16'),
(15, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:42:06', '2018-08-21 00:42:06'),
(16, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:42:06', '2018-08-21 00:42:06'),
(17, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:42:16', '2018-08-21 00:42:16'),
(18, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 00:42:16', '2018-08-21 00:42:16'),
(19, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:28:55', '2018-08-21 02:28:55'),
(20, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:28:55', '2018-08-21 02:28:55'),
(21, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:29:41', '2018-08-21 02:29:41'),
(22, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:29:41', '2018-08-21 02:29:41'),
(23, NULL, 1, 'user', 3, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:29:41', '2018-08-21 02:29:41'),
(24, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:35:27', '2018-08-21 02:35:27'),
(25, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:35:40', '2018-08-21 02:35:40'),
(26, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:36:56', '2018-08-21 02:36:56'),
(27, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:36:56', '2018-08-21 02:36:56'),
(28, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:37:52', '2018-08-21 02:37:52'),
(29, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:37:52', '2018-08-21 02:37:52'),
(30, NULL, 1, 'user', 3, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:37:52', '2018-08-21 02:37:52'),
(31, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:37:56', '2018-08-21 02:37:56'),
(32, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:37:56', '2018-08-21 02:37:56'),
(33, NULL, 1, 'user', 3, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:37:56', '2018-08-21 02:37:56'),
(34, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:22', '2018-08-21 02:38:22'),
(35, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:22', '2018-08-21 02:38:22'),
(36, NULL, 1, 'user', 3, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:22', '2018-08-21 02:38:22'),
(37, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:24', '2018-08-21 02:38:24'),
(38, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:24', '2018-08-21 02:38:24'),
(39, NULL, 1, 'user', 3, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:24', '2018-08-21 02:38:24'),
(40, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:28', '2018-08-21 02:38:28'),
(41, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:35', '2018-08-21 02:38:35'),
(42, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:38:42', '2018-08-21 02:38:42'),
(43, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:39:41', '2018-08-21 02:39:41'),
(44, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:39:42', '2018-08-21 02:39:42'),
(45, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:40:21', '2018-08-21 02:40:21'),
(46, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:40:29', '2018-08-21 02:40:29'),
(47, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:40:29', '2018-08-21 02:40:29'),
(48, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:40:38', '2018-08-21 02:40:38'),
(49, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:40:38', '2018-08-21 02:40:38'),
(50, NULL, 1, 'user', 3, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 02:40:38', '2018-08-21 02:40:38'),
(51, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 17:33:33', '2018-08-21 17:33:33'),
(52, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 17:33:36', '2018-08-21 17:33:36'),
(53, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 17:33:43', '2018-08-21 17:33:43'),
(54, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 17:33:47', '2018-08-21 17:33:47'),
(55, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 17:33:47', '2018-08-21 17:33:47'),
(56, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 18:26:41', '2018-08-21 18:26:41'),
(57, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 18:26:41', '2018-08-21 18:26:41'),
(58, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 18:34:46', '2018-08-21 18:34:46'),
(59, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 18:36:24', '2018-08-21 18:36:24'),
(60, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:02:59', '2018-08-21 19:02:59'),
(61, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:09:14', '2018-08-21 19:09:14'),
(62, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:27:52', '2018-08-21 19:27:52'),
(63, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:28:11', '2018-08-21 19:28:11'),
(64, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:29:36', '2018-08-21 19:29:36'),
(65, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:29:44', '2018-08-21 19:29:44'),
(66, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 19:30:18', '2018-08-21 19:30:18'),
(67, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:26:01', '2018-08-21 21:26:01'),
(68, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:26:01', '2018-08-21 21:26:01'),
(69, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:26:01', '2018-08-21 21:26:01'),
(70, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:29:24', '2018-08-21 21:29:24'),
(71, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:29:24', '2018-08-21 21:29:24'),
(72, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:31:01', '2018-08-21 21:31:01'),
(73, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:31:01', '2018-08-21 21:31:01'),
(74, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:31:01', '2018-08-21 21:31:01'),
(75, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-21 21:33:43', '2018-08-21 21:33:43'),
(76, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-22 01:43:29', '2018-08-22 01:43:29'),
(77, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-22 01:43:29', '2018-08-22 01:43:29'),
(78, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-22 01:43:29', '2018-08-22 01:43:29'),
(79, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-22 22:03:24', '2018-08-22 22:03:24'),
(80, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-22 22:03:24', '2018-08-22 22:03:24'),
(81, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-22 22:03:24', '2018-08-22 22:03:24'),
(82, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:19', '2018-08-23 00:13:19'),
(83, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:19', '2018-08-23 00:13:19'),
(84, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:31', '2018-08-23 00:13:31'),
(85, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:31', '2018-08-23 00:13:31'),
(86, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:58', '2018-08-23 00:13:58'),
(87, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:58', '2018-08-23 00:13:58'),
(88, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:13:58', '2018-08-23 00:13:58'),
(89, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:16:28', '2018-08-23 00:16:28'),
(90, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:16:28', '2018-08-23 00:16:28'),
(91, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:19:25', '2018-08-23 00:19:25'),
(92, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:20:25', '2018-08-23 00:20:25'),
(93, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:21:16', '2018-08-23 00:21:16'),
(94, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:21:59', '2018-08-23 00:21:59'),
(95, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:23:37', '2018-08-23 00:23:37'),
(96, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:25:41', '2018-08-23 00:25:41'),
(97, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:25:47', '2018-08-23 00:25:47'),
(98, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:26:10', '2018-08-23 00:26:10'),
(99, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:26:10', '2018-08-23 00:26:10'),
(100, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:36:18', '2018-08-23 00:36:18'),
(101, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:48:21', '2018-08-23 00:48:21'),
(102, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:49:08', '2018-08-23 00:49:08'),
(103, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:49:49', '2018-08-23 00:49:49'),
(104, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 00:59:00', '2018-08-23 00:59:00'),
(105, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:10:27', '2018-08-23 01:10:27'),
(106, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:11:46', '2018-08-23 01:11:46'),
(107, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:12:12', '2018-08-23 01:12:12'),
(108, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:12:28', '2018-08-23 01:12:28'),
(109, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:15:33', '2018-08-23 01:15:33'),
(110, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:16:11', '2018-08-23 01:16:11'),
(111, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:16:11', '2018-08-23 01:16:11'),
(112, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:16:24', '2018-08-23 01:16:24'),
(113, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:16:24', '2018-08-23 01:16:24'),
(114, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:17:39', '2018-08-23 01:17:39'),
(115, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:17:39', '2018-08-23 01:17:39'),
(116, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:17:39', '2018-08-23 01:17:39'),
(117, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:41:42', '2018-08-23 01:41:42'),
(118, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:41:42', '2018-08-23 01:41:42'),
(119, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:41:42', '2018-08-23 01:41:42'),
(120, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:45:13', '2018-08-23 01:45:13'),
(121, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:45:13', '2018-08-23 01:45:13'),
(122, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 01:45:13', '2018-08-23 01:45:13'),
(123, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:11:24', '2018-08-23 02:11:24'),
(124, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:11:24', '2018-08-23 02:11:24'),
(125, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:11:24', '2018-08-23 02:11:24'),
(126, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:11:54', '2018-08-23 02:11:54'),
(127, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:11:54', '2018-08-23 02:11:54'),
(128, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:11:54', '2018-08-23 02:11:54'),
(129, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:12:27', '2018-08-23 02:12:27'),
(130, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:12:27', '2018-08-23 02:12:27'),
(131, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:12:27', '2018-08-23 02:12:27'),
(132, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:13:15', '2018-08-23 02:13:15'),
(133, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:13:15', '2018-08-23 02:13:15'),
(134, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:13:15', '2018-08-23 02:13:15'),
(135, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:13:25', '2018-08-23 02:13:25'),
(136, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:13:25', '2018-08-23 02:13:25'),
(137, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:16:32', '2018-08-23 02:16:32'),
(138, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:16:32', '2018-08-23 02:16:32'),
(139, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 02:16:32', '2018-08-23 02:16:32'),
(140, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 17:53:48', '2018-08-23 17:53:48'),
(141, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 17:53:48', '2018-08-23 17:53:48'),
(142, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 17:53:48', '2018-08-23 17:53:48'),
(143, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 17:54:35', '2018-08-23 17:54:35'),
(144, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 17:54:40', '2018-08-23 17:54:40'),
(145, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-23 17:54:40', '2018-08-23 17:54:40'),
(146, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-24 00:44:53', '2018-08-24 00:44:53'),
(147, NULL, 1, 'user', 2, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-24 00:44:53', '2018-08-24 00:44:53'),
(148, NULL, 1, 'user', 4, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-24 00:44:53', '2018-08-24 00:44:53'),
(149, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-08-24 01:19:37', '2018-08-24 01:19:37'),
(150, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-09-01 22:00:43', '2018-09-01 22:00:43'),
(151, NULL, 1, 'user', 2, 'agent', 'test', '咨询', NULL, 0, 0, '2018-09-02 07:07:41', NULL),
(152, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', '|2||4|', 0, 0, '2018-09-02 07:38:34', NULL),
(153, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', '|2||4|', 0, 0, '2018-09-02 07:39:49', NULL),
(154, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', '|2||4|', 0, 0, '2018-09-02 07:44:07', NULL),
(155, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', 'all|59', 0, 0, '2018-09-02 08:13:49', NULL),
(156, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', 'all|59', 0, 0, '2018-09-02 08:14:08', NULL),
(157, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', 'all|59', 0, 0, '2018-09-02 08:14:30', NULL),
(158, NULL, 1, 'user', 1, 'agent', NULL, '请求代理业务', '|49||54|', 1, 0, '2018-09-02 08:14:55', '2018-09-18 08:07:46'),
(159, NULL, 1, 'user', 1, 'agent', NULL, '请求代理业务', '|49||54|', 1, 1, '2018-09-02 08:29:33', '2018-09-18 07:20:27'),
(160, NULL, 1, 'user', 2, 'agency', NULL, '请求代理业务', 'before|59', 0, 0, '2018-09-02 08:29:47', NULL),
(161, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-09-04 23:24:12', '2018-09-04 23:24:12'),
(162, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-09-04 23:33:16', '2018-09-04 23:33:16'),
(163, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-09-05 23:57:51', '2018-09-05 23:57:51'),
(164, NULL, 1, 'user', 1, 'user', NULL, '请求加盟', NULL, 0, 0, '2018-09-05 23:57:57', '2018-09-05 23:57:57'),
(165, NULL, 1, 'agent', 1, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-06 13:41:33', NULL),
(166, NULL, 1, 'agent', 1, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-06 13:42:15', NULL),
(167, NULL, 1, 'agent', 2, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-06 13:42:15', NULL),
(168, NULL, 1, 'agent', 4, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-06 13:42:15', NULL),
(169, NULL, 1, 'user', 1, 'agent', NULL, '请求代理业务', 'all|59', 1, 1, '2018-09-12 11:26:12', '2018-09-18 07:19:57'),
(170, NULL, 1, 'agent', 1, 'user', NULL, '咨询', NULL, 0, 0, '2018-09-16 20:29:42', '2018-09-16 20:29:42'),
(171, NULL, 1, 'agent', 1, 'user', NULL, '咨询', NULL, 0, 0, '2018-09-16 20:30:08', '2018-09-16 20:30:08'),
(172, NULL, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 20:49:33', '2018-09-16 20:49:33'),
(173, NULL, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 20:51:29', '2018-09-16 20:51:29'),
(174, NULL, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 20:58:16', '2018-09-16 20:58:16'),
(175, NULL, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 20:58:17', '2018-09-16 20:58:17'),
(176, NULL, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 21:03:48', '2018-09-16 21:03:48'),
(177, NULL, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 21:08:49', '2018-09-16 21:08:49'),
(178, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-16 21:10:44', '2018-09-16 21:10:44'),
(179, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:10:12', '2018-09-17 00:10:12'),
(180, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 00:21:54', '2018-09-17 00:21:54'),
(181, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:30:01', '2018-09-17 00:30:01'),
(182, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:31:44', '2018-09-17 00:31:44'),
(183, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:33:44', '2018-09-17 00:33:44'),
(184, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:35:03', '2018-09-17 00:35:03'),
(185, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:35:18', '2018-09-17 00:35:18'),
(186, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:35:59', '2018-09-17 00:35:59'),
(187, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:36:29', '2018-09-17 00:36:29'),
(188, 158, 1, 'agent', 1, 'user', '444', '同意', NULL, 0, 0, '2018-09-17 00:41:19', '2018-09-17 00:41:19'),
(189, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 00:56:05', '2018-09-17 00:56:05'),
(190, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 00:56:13', '2018-09-17 00:56:13'),
(191, 158, 1, 'agent', 1, 'user', '55555555', '拒绝', NULL, 0, 0, '2018-09-17 20:27:43', '2018-09-17 20:27:43'),
(192, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:28:31', '2018-09-17 20:28:31'),
(193, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:36:05', '2018-09-17 20:36:05'),
(194, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:38:39', '2018-09-17 20:38:39'),
(195, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:40:04', '2018-09-17 20:40:04'),
(196, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 20:40:34', '2018-09-17 20:40:34'),
(197, 169, 1, 'agent', 1, 'user', '你的孩子', '拒绝', NULL, 0, 0, '2018-09-17 20:45:18', '2018-09-17 20:45:18'),
(198, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 20:56:08', '2018-09-17 20:56:08'),
(199, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:56:23', '2018-09-17 20:56:23'),
(200, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:58:52', '2018-09-17 20:58:52'),
(201, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:59:24', '2018-09-17 20:59:24'),
(202, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 20:59:38', '2018-09-17 20:59:38'),
(203, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:00:14', '2018-09-17 21:00:14'),
(204, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:02:08', '2018-09-17 21:02:08'),
(205, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:07:47', '2018-09-17 21:07:47'),
(206, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:08:46', '2018-09-17 21:08:46'),
(207, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:08:52', '2018-09-17 21:08:52'),
(208, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:09:39', '2018-09-17 21:09:39'),
(209, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:09:51', '2018-09-17 21:09:51'),
(210, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:10:30', '2018-09-17 21:10:30'),
(211, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:11:04', '2018-09-17 21:11:04'),
(212, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:11:29', '2018-09-17 21:11:29'),
(213, 159, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:12:12', '2018-09-17 21:12:12'),
(214, 159, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:12:44', '2018-09-17 21:12:44'),
(215, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:18:48', '2018-09-17 21:18:48'),
(216, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:18:49', '2018-09-17 21:18:49'),
(217, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 21:18:50', '2018-09-17 21:18:50'),
(218, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:18:53', '2018-09-17 21:18:53'),
(219, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:18:53', '2018-09-17 21:18:53'),
(220, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:18:53', '2018-09-17 21:18:53'),
(221, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:18:54', '2018-09-17 21:18:54'),
(222, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:18:55', '2018-09-17 21:18:55'),
(223, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:18:56', '2018-09-17 21:18:56'),
(224, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:19:24', '2018-09-17 21:19:24'),
(225, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:20:18', '2018-09-17 21:20:18'),
(226, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:21:11', '2018-09-17 21:21:11'),
(227, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:21:38', '2018-09-17 21:21:38'),
(228, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:22:32', '2018-09-17 21:22:32'),
(229, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:24:03', '2018-09-17 21:24:03'),
(230, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:24:21', '2018-09-17 21:24:21'),
(231, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:25:41', '2018-09-17 21:25:41'),
(232, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:27:05', '2018-09-17 21:27:05'),
(233, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:57:29', '2018-09-17 21:57:29'),
(234, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:57:45', '2018-09-17 21:57:45'),
(235, 159, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:58:24', '2018-09-17 21:58:24'),
(236, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:58:41', '2018-09-17 21:58:41'),
(237, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 21:58:59', '2018-09-17 21:58:59'),
(238, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:00:05', '2018-09-17 22:00:05'),
(239, 159, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:03:24', '2018-09-17 22:03:24'),
(240, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:03:59', '2018-09-17 22:03:59'),
(241, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:05:46', '2018-09-17 22:05:46'),
(242, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:06:54', '2018-09-17 22:06:54'),
(243, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:16:28', '2018-09-17 22:16:28'),
(244, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:20:08', '2018-09-17 22:20:08'),
(245, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:20:43', '2018-09-17 22:20:43'),
(246, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:20:59', '2018-09-17 22:20:59'),
(247, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:21:22', '2018-09-17 22:21:22'),
(248, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:23:31', '2018-09-17 22:23:31'),
(249, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:23:48', '2018-09-17 22:23:48'),
(250, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:25:04', '2018-09-17 22:25:04'),
(251, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:26:31', '2018-09-17 22:26:31'),
(252, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:26:52', '2018-09-17 22:26:52'),
(253, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:28:32', '2018-09-17 22:28:32'),
(254, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:30:50', '2018-09-17 22:30:50'),
(255, 158, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:31:05', '2018-09-17 22:31:05'),
(256, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:32:21', '2018-09-17 22:32:21'),
(257, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:39:10', '2018-09-17 22:39:10'),
(258, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:39:42', '2018-09-17 22:39:42'),
(259, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:40:09', '2018-09-17 22:40:09'),
(260, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:40:34', '2018-09-17 22:40:34'),
(261, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:40:56', '2018-09-17 22:40:56'),
(262, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:41:01', '2018-09-17 22:41:01'),
(263, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:41:05', '2018-09-17 22:41:05'),
(264, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:42:06', '2018-09-17 22:42:06'),
(265, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:42:39', '2018-09-17 22:42:39'),
(266, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:44:59', '2018-09-17 22:44:59'),
(267, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:45:14', '2018-09-17 22:45:14'),
(268, 169, 1, 'agent', 1, 'user', NULL, '拒绝', NULL, 0, 0, '2018-09-17 22:45:27', '2018-09-17 22:45:27'),
(269, 159, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 22:56:26', '2018-09-17 22:56:26'),
(270, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:19:56', '2018-09-17 23:19:56'),
(271, 159, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:20:27', '2018-09-17 23:20:27'),
(272, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:20:46', '2018-09-17 23:20:46'),
(273, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:50:48', '2018-09-17 23:50:48'),
(274, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:53:03', '2018-09-17 23:53:03'),
(275, 169, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:53:34', '2018-09-17 23:53:34'),
(276, 158, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-17 23:58:16', '2018-09-17 23:58:16'),
(277, NULL, 1, 'agent', 1, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-22 08:29:32', NULL),
(278, NULL, 1, 'agent', 1, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-22 08:30:54', NULL),
(279, NULL, 1, 'agent', 1, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-22 08:31:01', NULL),
(280, NULL, 1, 'agent', 1, 'agency', NULL, '请求加盟', NULL, 0, 0, '2018-09-22 08:31:08', NULL),
(281, NULL, 1, 'user', 1, 'agent', NULL, '请求代理业务', '|49||54|', 1, 1, '2018-09-23 12:43:06', '2018-09-24 06:25:16'),
(282, 281, 1, 'agent', 1, 'user', NULL, '同意', NULL, 0, 0, '2018-09-23 22:25:16', '2018-09-23 22:25:16');

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('Man','Woman','Secret') COLLATE utf8mb4_unicode_ci DEFAULT 'Secret',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '身份证号',
  `id_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '身份证照片',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Active','Disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active' COMMENT '账户正常，禁止',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_phone_unique` (`account_phone`) USING BTREE,
  UNIQUE KEY `id_picture_unique` (`id_picture`) USING BTREE,
  UNIQUE KEY `id_number_unique` (`id_number`) USING BTREE,
  UNIQUE KEY `account_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='普通用户登录账户表';

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '发布信息的用户ID',
  `transaction` set('sale','buy','let','rent','query','consult') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sale' COMMENT '交易类型，卖、买、出租、租入、查询、咨询',
  `community` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '住宅小区名称',
  `house_type` enum('别墅','排屋','普通住宅','公寓','商住楼','写字楼','商铺','工业物业','不限') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '普通住宅' COMMENT '物业类型',
  `area` decimal(14,2) NOT NULL COMMENT '建筑面积',
  `certificate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '房产证编号',
  `feature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '房产特点',
  `price` float NOT NULL COMMENT '价格',
  `agent_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `transaction` (`transaction`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `transaction`, `community`, `house_type`, `area`, `certificate_number`, `feature`, `price`, `agent_id`, `created_at`, `updated_at`) VALUES
(49, 1, 'sale', '22222222', '普通住宅', '222222.00', '111111', '1111', 1111110, NULL, '2018-08-14 21:04:35', '2018-08-14 21:04:35'),
(54, 1, 'buy', '222222222', '普通住宅', '222222.00', '22222', '2222222', 22222, NULL, '2018-08-24 01:56:57', '2018-08-24 01:56:57'),
(56, 1, 'buy', '222222111111', '普通住宅', '2222222.00', '2222222', '2222222', 222222, NULL, '2018-08-24 02:39:17', '2018-08-24 02:39:17'),
(57, 1, 'sale', 'qqqqqqqqqqq', '普通住宅', '222222.00', '222222', '222222222', 222222, NULL, '2018-08-24 02:39:47', '2018-08-24 02:39:47'),
(58, 1, 'rent', 'zzzzzzzzzzz', '普通住宅', '2222222.00', '22222222', '222222222', 22222, NULL, '2018-08-24 02:40:05', '2018-08-24 02:40:05'),
(59, 1, 'let', 'cccccccc', '排屋', '2222222.00', '22222222', '2222222', 2222220, NULL, '2018-08-24 02:40:17', '2018-08-24 02:40:17');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('Man','Woman','Secret') COLLATE utf8mb4_unicode_ci DEFAULT 'Secret',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '身份证号',
  `id_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '身份证照片',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Active','Disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active' COMMENT '账户正常，禁止',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_phone_unique` (`account_phone`) USING BTREE,
  UNIQUE KEY `id_picture_unique` (`id_picture`) USING BTREE,
  UNIQUE KEY `id_number_unique` (`id_number`) USING BTREE,
  UNIQUE KEY `account_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='普通用户登录账户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account_phone`, `real_name`, `sex`, `email`, `id_number`, `id_picture`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '13306816366', '吴建军', 'Secret', '', '', '', '$2y$10$SGkG7LiU/VUNoweu02I4Bu6eRhglj.OB3ctF1z5bzGFb5i5q657uC', 'sQc6yZXGv6jGOvusqkwQVUuBhlIHzo83ZzATbVXeojPPY5w5b12FDv6IDH2P', 'Active', '2018-02-18 13:13:00', '2018-10-05 03:58:10'),
(2, '13306816367', NULL, 'Secret', NULL, NULL, NULL, '$2y$10$vMNxe4MPgs8sbvZ.M2ycP.VpK.PHTG8UGGyfrkH3kmt0KiGmAcJ2q', NULL, 'Active', '2018-02-22 18:26:52', '2018-02-22 18:26:52'),
(3, '13306816368', NULL, 'Secret', NULL, NULL, NULL, '$2y$10$lkoANoRezsjUw/RIHnqVHOcSF4yEaAvIX4zuO4r/jb/IuvVEGQX6O', 'ISjbdSHQ16HBrtkxU5KqwUlQge1mhMf2AaIUFqBEi4hVcGFhEVgrIJNQ9dmJ', 'Active', '2018-02-22 18:32:35', '2018-02-23 02:47:47');

-- --------------------------------------------------------

--
-- 表的结构 `user_config`
--

DROP TABLE IF EXISTS `user_config`;
CREATE TABLE IF NOT EXISTS `user_config` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_type` enum('transaction') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '配置类型',
  `active` enum('Active','Disabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active' COMMENT '账户正常，禁止',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户配置信息';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
