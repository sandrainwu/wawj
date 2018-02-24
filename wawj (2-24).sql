-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-02-24 02:46:32
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
  `account_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户登录账户',
  `account_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '可以作为登录用户名的email，在绑定邮箱后写入本字段以确保唯一性',
  `account_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '可以作为登录用户名的手机号，在绑定手机后写入本字段以确保唯一性',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('SiteAdministrator','SuperAdministrator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SiteAdministrator' COMMENT '用户有2种：1超级管理员（网站管理员受其管理），2网站管理员（负责网站运营，可以管理各类网站用户和机构）',
  `join_to_agency` int(11) DEFAULT NULL COMMENT '中介人员（agent角色）加入（所属）的中介机构',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Active','Disabled','Suspended','Refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active' COMMENT '账户状态：正常（激活的），禁止（被网站管理员或机构管理员禁止），悬而未决（申请并等待激活），被拒（申请激活被管理员拒绝）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`account_username`) USING BTREE,
  UNIQUE KEY `account_phone` (`account_phone`),
  UNIQUE KEY `account_email` (`account_email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户登录账户表';

-- --------------------------------------------------------

--
-- 表的结构 `agency`
--

DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_agent_id` int(10) NOT NULL COMMENT '中介机构管理员的用户id，对应users表id',
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中介结构名称',
  `introduction` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中介机构简介',
  `Active` enum('Active','Disabled','Suspended','Refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disabled' COMMENT '中介机构状态：正常（激活的），禁止（被网站管理员禁止），悬而未决（申请并等待网站管理员激活），被拒（申请激活被管理员拒绝）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='中介机构信息表';

--
-- 转存表中的数据 `agency`
--

INSERT INTO `agency` (`id`, `manager_agent_id`, `agency_name`, `introduction`, `Active`, `created_at`, `updated_at`) VALUES
(1, 1, '我爱我家', '', 'Active', '2018-02-19 10:19:10', '0000-00-00 00:00:00');

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
  `join_to_agency` int(11) DEFAULT NULL COMMENT '中介人员加入的介机构',
  `manage_agency` int(11) DEFAULT NULL COMMENT '所管理的中介机构',
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

INSERT INTO `agent` (`id`, `account_phone`, `real_name`, `sex`, `email`, `id_number`, `id_picture`, `join_to_agency`, `manage_agency`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '15858166251', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$QFYRBIxlwqMG3u.gTN.r/eAOgj.Ur7.NdCL3I0iEWEM8yJL5ATCV2', NULL, 'Active', '2018-02-22 21:12:25', '2018-02-23 07:28:41'),
(3, '15858166252', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$QHbeZBCK71rhTUwEJj.GLuChByNl22NT2q1ZAc2Wc.pXoN3a49rkG', NULL, 'Active', '2018-02-22 21:14:38', '2018-02-22 21:14:38'),
(4, '15858166253', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$zNt8qXfUZUQQNSd3l0W15uf/P83Sij26ABy6jWzZLq4pHJ/UxKZ52', NULL, 'Active', '2018-02-22 21:21:26', '2018-02-22 21:21:26'),
(5, '15858166254', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$TjCCw2kI2geybxO2QMVyNe0zFsmkWiDQj5q/T2uLmCimlHMbmZAsy', NULL, 'Active', '2018-02-22 21:29:43', '2018-02-22 21:29:43'),
(6, '15858166255', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$JHaM14VmsD9Ed22s/Ze3wuwn/jx2WhKpCH0swiuNe2osTKKaRiM/S', NULL, 'Active', '2018-02-22 21:30:15', '2018-02-22 21:30:15'),
(7, '15858166256', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$rhmpVSr4fLiY6ROuH.YyrO45u0XOq6L18V..WeArYyS7jouwuIXw6', NULL, 'Active', '2018-02-22 21:31:50', '2018-02-22 21:31:50'),
(8, '15858166257', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$bvptjrSbOLNsR5h7TPejWe1KqYdLlwywHgBV5LScU20i/zOuAHAX.', NULL, 'Active', '2018-02-22 21:35:17', '2018-02-22 21:35:17');

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='普通用户登录账户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account_phone`, `real_name`, `sex`, `email`, `id_number`, `id_picture`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '13306816366', NULL, 'Secret', '', '', '', '$2y$10$SGkG7LiU/VUNoweu02I4Bu6eRhglj.OB3ctF1z5bzGFb5i5q657uC', 'qpv6b2PdHNpW38TA7luNjYLyUDhDMnF745DeZCeKYbj7VFd0YlHuUAvrcdCd', 'Active', '2018-02-18 13:13:00', '2018-02-23 12:50:17'),
(2, '13306816367', NULL, 'Secret', NULL, NULL, NULL, '$2y$10$vMNxe4MPgs8sbvZ.M2ycP.VpK.PHTG8UGGyfrkH3kmt0KiGmAcJ2q', NULL, 'Active', '2018-02-22 18:26:52', '2018-02-22 18:26:52'),
(3, '13306816368', NULL, 'Secret', NULL, NULL, NULL, '$2y$10$lkoANoRezsjUw/RIHnqVHOcSF4yEaAvIX4zuO4r/jb/IuvVEGQX6O', 'ISjbdSHQ16HBrtkxU5KqwUlQge1mhMf2AaIUFqBEi4hVcGFhEVgrIJNQ9dmJ', 'Active', '2018-02-22 18:32:35', '2018-02-23 02:47:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
