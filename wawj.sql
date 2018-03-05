-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-02-22 05:06:51
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='中介用户登录账户表';

--
-- 转存表中的数据 `agent`
--

INSERT INTO `agent` (`id`, `account_phone`, `real_name`, `sex`, `email`, `id_number`, `id_picture`, `join_to_agency`, `manage_agency`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '15858166251', NULL, 'Secret', NULL, NULL, NULL, NULL, NULL, '$2y$10$SGkG7LiU/VUNoweu02I4Bu6eRhglj.OB3ctF1z5bzGFb5i5q657uC', NULL, 'Active', '2018-02-21 15:00:28', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='普通用户登录账户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account_phone`, `real_name`, `sex`, `email`, `id_number`, `id_picture`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '13306816366', NULL, 'Secret', '', '', '', '$2y$10$SGkG7LiU/VUNoweu02I4Bu6eRhglj.OB3ctF1z5bzGFb5i5q657uC', '10uBq3LFMwLEsBcIpUmoTG6AX3P1LpUPiZYOxPfQ8oRnmMhvKgcgNzCxNK8Q', 'Active', '2018-02-18 13:13:00', '2018-02-21 15:22:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
