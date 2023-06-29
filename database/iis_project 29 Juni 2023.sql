-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 04:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iis_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 89),
(1, 95),
(5, 95),
(1, 96),
(5, 96),
(1, 100),
(5, 100),
(1, 101),
(5, 101),
(1, 102),
(5, 102),
(1, 104),
(5, 104),
(1, 105),
(5, 105),
(1, 106),
(5, 106),
(1, 4),
(2, 4),
(3, 4),
(5, 4),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(1, 116),
(12, 116),
(1, 119),
(12, 119),
(1, 117),
(10, 117),
(1, 92),
(8, 92),
(1, 107),
(8, 107),
(1, 40),
(8, 40),
(1, 8),
(8, 8),
(1, 44),
(8, 44),
(1, 120),
(12, 120),
(1, 121),
(1, 43),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(13, 127),
(14, 127),
(13, 131),
(1, 135),
(13, 130);

-- --------------------------------------------------------

--
-- Table structure for table `internship_role`
--

CREATE TABLE `internship_role` (
  `id_internship_role` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `role_description` text DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_role`
--

INSERT INTO `internship_role` (`id_internship_role`, `role_name`, `role_description`, `image`) VALUES
(5, 'Developer', 'Role Developer berperan membangun dan mengembangkan perangkat lunak dan aplikasi. Developer tidak hanya memahami berbagai kode pemograman tetapi juga menjaga pemeliharaan, kinerja, dan ketahanan pengimplementasian desain menjadi produk layanan digital.', 'dummy_-_Copy3.jpg'),
(6, 'Data Scientist', 'Role Data Scientist berperan dalam mengumpulkan, menganalisis, menginterpretasi, memprediksi dan melakukan data modelling untuk membantu mendorong pengoptimalan pengambilan keputusan pada berbagai project yang sedang dikembangkan perusahaan. Data Scientist menggabungkan kemampuan meliputi pemahaman bisnis, matematika, statistika, dan computer programming.', 'dummy_-_Copy4.jpg'),
(7, 'Designer', 'Role Designer berperan dalam merancang bentuk visual atau desain berupa tampilan website, desain grafis, tata penulisan, hingga video sesuai dengan kebutuhan proyek.', 'dummy_-_Copy5.jpg'),
(8, 'Researcher', 'Role Researcher berperan dalam analisis, riset, dan menyajikan data yang berkaitan dengan project yang sedang dikembangkan oleh perusahaan. Selain itu, Researcher juga diharapkan dapat membuat model bisnis berdasarkan hasil riset untuk menunjang kualitas sistem agar dapat memenuhi kebutuhan penggunanya.', 'dummy_-_Copy6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(3, 0, 1, 0, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 17, 2, 121, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 16, 2, 121, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(43, 11, 1, 0, 'fas fa-user', 'Manage Users', 'users', '1', 1),
(44, 12, 1, 0, 'fas fa-users-cog', 'Manage Roles', 'groups', '2', 1),
(89, 18, 2, 121, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(109, 15, 2, 121, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(121, 14, 1, 0, 'fab fa-apper', 'Hidden Menu', '#', '#', 1),
(122, 9, 2, 133, 'fas fa-users', 'Mentoring', 'kelola_mentoring', 'kelola_mentoring', 1),
(123, 10, 2, 133, 'fas fa-calendar-alt', 'Internship', 'kelola_internship', 'kelola_internship', 1),
(124, 6, 2, 133, 'fas fa-book', 'Laporan', 'kelola_laporan', 'kelola_laporan', 1),
(125, 7, 2, 133, 'fas fa-pencil-alt', 'Penilaian', 'kelola_penilaian', 'kelola_penilaian', 1),
(126, 8, 2, 133, 'far fa-sticky-note', 'Sertifikat', 'kelola_sertifikat', 'kelola_sertifikat', 1),
(127, 2, 1, 0, 'fas fa-user-friends', 'Mentoring', 'mentoring', 'mentoring', 1),
(130, 1, 1, 0, 'fas fa-user-check', 'Internship Role', 'internship_role', 'internship_role', 1),
(131, 3, 1, 0, 'fas fa-box-open', 'Internship Saya', 'internship_saya', 'internship_saya', 1),
(133, 4, 1, 0, 'fas fa-cog', 'Kelola', '#', '#', 1),
(134, 13, 1, 0, 'fas fa-cog', 'Setting Aplikasi', 'Setting', 'Setting', 1),
(135, 5, 2, 133, 'fas fa-database', 'Internship Roles', 'internship_role', 'internship_role', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Admin'),
(13, 'mahasiswa', 'Mahasiswa'),
(14, 'mentor_spv', 'Mentor / Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'channels4_profile.jpg', 'Telkom Internship Information System', 'www.tiis.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `active`, `first_name`, `last_name`, `phone`, `image`) VALUES
(1, '$2y$08$PNwyjmAyqJbdbt9mn.150uZQCqlK5ytySGzxE/5A8/XVkbs9gvf2y', 'admin@muhakbar.com', 1, 'Muhammad', 'Akbar', '123213213', 'akbr_pp_2.jpg'),
(20, '$2y$08$TLGUmu.Cj7y6xAhWm9qHhOgyGzT07GpkdYl6XsSPsjXJBLII74EZm', 'fajar@gmail.com', 1, 'fajar', 'mantri', NULL, 'default.jpg'),
(21, '$2y$08$krvXwJ6uSoIZoA1xAei9POvcouRCujlpJLUhBWd85jKz6Vh7xl4sq', 'cobarole@gmail.com', 1, 'cobaRole', 'asdsad', NULL, 'default.jpg'),
(22, '$2y$08$JFt2s1q4TR9CknbUrF3KAuCmsaE2U5McPKw9kZJikw5hRbW14miRu', 'mentor@gmail.com', 1, 'coba mentor', 'mentor', NULL, 'default.jpg'),
(23, '$2y$08$AMSF.FnwbTyJigUQRCCpre8.JaqbKzzDLOwBcaIjUIrVgOKLfSUUS', 'mentor2@gmail.com', 1, 'mentor', '2', NULL, 'default.jpg'),
(24, '$2y$08$7XGvwDMIQqUSm/wF34B3AeXk17wWXdBLZSAFNIIQaFhXqxXVoZRlm', 'mahasiswa@gmail.com', 1, 'Mahasiswa', '1', NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(36, 1, 1),
(48, 20, 13),
(49, 21, 1),
(50, 22, 1),
(51, 23, 14),
(52, 24, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship_role`
--
ALTER TABLE `internship_role`
  ADD PRIMARY KEY (`id_internship_role`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internship_role`
--
ALTER TABLE `internship_role`
  MODIFY `id_internship_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
