-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2016 at 08:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `green_work`
--

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `menu_home_id`, `alias`) VALUES
(1, 1, 'مدیر ارشد سیستم');

--
-- Dumping data for table `group_has_menu_static`
--

INSERT INTO `group_has_menu_static` (`group_id`, `menu_static_id`, `order`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7);

--
-- Dumping data for table `menu_home`
--

INSERT INTO `menu_home` (`id`, `name`) VALUES
(1, 'administrator');

--
-- Dumping data for table `menu_static`
--

INSERT INTO `menu_static` (`id`, `name`, `type`, `alias`, `icon`, `info`, `group_alias`, `group_icon`) VALUES
(1, 'user', 'FORM', 'کاربران', 'fa fa-user', 'ویرایش کاربران', 'سطوح دسترسی', 'fa fa-user-plus'),
(2, 'group', 'FORM', 'گروه ها', 'fa fa-users', 'ویرایش گروه ها', 'سطوح دسترسی', 'fa fa-user-plus'),
(3, 'task', 'FORM', 'وظایف', 'fa fa-tasks', 'ویرایش وظایف', 'عملیات ها', 'fa fa-balance-scale'),
(4, 'permission', 'FORM', 'مجوزها', 'fa fa-key', 'ویرایش مجوزها', 'عملیات ها', 'fa fa-balance-scale'),
(5, 'role', 'FORM', 'نقشها', 'fa fa-male', 'ویرایش نقشها', 'عملیات ها', 'fa fa-balance-scale'),
(6, 'dossier', 'FORM', 'پرونده ها', 'fa fa-folder', 'ویرایش پرونده ها', 'اسناد و مدارک', 'fa fa-suitcase'),
(7, 'document', 'FORM', 'اسناد', 'fa fa-file-text', 'ویرایش اسناد', 'اسناد و مدارک', 'fa fa-suitcase');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'administrator@mail.com', '$2y$10$V6UqC1n0jeJe.jB5zlQrye.yf9Iod3VN4LXPHEujXBY/MSAT5LGnK', 'vGmkIiGqF33nFujXVQG5f5IecIIMH9XL7PgejDwDMruOQbCyVHyYLw1yjqE5', '2015-12-26 04:19:04', '2016-01-09 19:04:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
