-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 12:34 PM
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

INSERT INTO `group` (`id`, `sub_system_id`, `menu_home_id`, `alias`, `menu_order`) VALUES
(1, 1, 1, 'ارباب رجوع', 'SD'),
(2, 1, 2, 'کارمند', 'SD'),
(3, 1, 3, 'مدیر', 'SD'),
(4, 1, 4, 'مدیر ارشد', 'SD');

--
-- Dumping data for table `group_has_menu_static`
--

INSERT INTO `group_has_menu_static` (`group_id`, `menu_static_id`, `order`) VALUES
(4, 1, 45),
(4, 2, 46);

--
-- Dumping data for table `group_has_role`
--

INSERT INTO `group_has_role` (`group_id`, `role_id`) VALUES
(4, 1),
(4, 2);

--
-- Dumping data for table `menu_home`
--

INSERT INTO `menu_home` (`id`, `name`) VALUES
(1, 'client'),
(2, 'jobholder'),
(3, 'manager'),
(4, 'system');

--
-- Dumping data for table `menu_static`
--

INSERT INTO `menu_static` (`id`, `name`, `type`, `alias`, `icon`, `info`) VALUES
(1, 'user', 'FORM', 'کاربران', 'fa fa-user', 'ویرایش کاربران'),
(2, 'group', 'FORM', 'گروه ها', 'fa fa-users', 'ویرایش گروه ها');

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `table_name`, `access_type`) VALUES
(1, 'group', 'C'),
(2, 'group', 'R'),
(3, 'group', 'U'),
(4, 'group', 'D'),
(5, 'users', 'C'),
(6, 'users', 'R'),
(7, 'users', 'U'),
(8, 'users', 'D');

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `sub_system_id`, `name`) VALUES
(1, 1, 'CLIENT_GUEST'),
(2, 1, 'SYSTEM_ADMIN');

--
-- Dumping data for table `role_has_permission`
--

INSERT INTO `role_has_permission` (`role_id`, `permission_id`) VALUES
(2, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 5),
(2, 6),
(2, 7);

--
-- Dumping data for table `role_has_task`
--

INSERT INTO `role_has_task` (`role_id`, `task_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4);

--
-- Dumping data for table `sub_system`
--

INSERT INTO `sub_system` (`id`, `alias`) VALUES
(1, 'پژوهشی');

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `action`, `access_type`) VALUES
(1, 'GROUP', 'C'),
(2, 'SELF', 'R'),
(3, 'SELF', 'U'),
(4, 'GROUP', 'D');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 1, 'ارباب رجوع جدید', 'client@mail.com', '$2y$10$x817mVLMOcA6Shf/CuMXcuUNCq68MWdMNhijldfEgMV.sHZhhIY7C', 'UyrM26JsApKCU9GOH49i4BVhiQqt2J0zuWvGRm3PV7ifHpkb3zGCMkf2BaxX', '2015-11-05 06:48:40', '2015-11-05 11:10:00'),
(7, 2, 'کارمند جدید', 'jobholder@mail.com', '$2y$10$.mxQfqojAMsr42TyYQF5QeBzKvWQQbchx.UulFp78Q2h.hQ2W/Wti', 'NKFAsl3yUyWoxeXD6df2Gxxh2tm7hgZBF1l0oczZkg8quyzAZp9TdkNBevET', '2015-11-05 11:14:21', '2015-11-05 11:23:11'),
(8, 3, 'مدیر جدید', 'manager@mail.com', '$2y$10$s1jHdHlpoDaHofp.sx4GkOSLgIuiznBx1CGxMANk31VVpZ.ys17Ui', 'kXzuSc8DKufJCrtTtRUFkuwx6gVjQtA8wEPo8fGaEuJyo8zj75WFjx69ifoX', '2015-11-05 11:24:06', '2015-11-05 11:24:28'),
(9, 4, 'مدید ارشد جدید', 'system@mail.com', '$2y$10$utdkqmc8jQZVHhGaM383RuFn.j8wPG3ZQNjF1YfUfUQ2Yy1YLuPzK', 'KwzlzrIWu55tbzDpeOLNEeEkR7UVmHJ9ZHcaZo53urSzPua9WmcnQTmZq4Ec', '2015-11-05 11:25:25', '2015-11-06 09:16:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
