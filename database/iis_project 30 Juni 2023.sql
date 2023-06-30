-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 11:19 AM
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
(13, 130),
(1, 133),
(1, 134),
(1, 136);

-- --------------------------------------------------------

--
-- Table structure for table `internship_program`
--

CREATE TABLE `internship_program` (
  `id_program` int(11) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `program_desc` text DEFAULT NULL,
  `program_start` date NOT NULL,
  `program_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_program`
--

INSERT INTO `internship_program` (`id_program`, `program_name`, `program_desc`, `program_start`, `program_end`) VALUES
(10, 'Coba', 'salkdm', '2023-06-16', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `internship_program_mahasiswa`
--

CREATE TABLE `internship_program_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internship_program_mentor`
--

CREATE TABLE `internship_program_mentor` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internship_program_role`
--

CREATE TABLE `internship_program_role` (
  `id` int(11) NOT NULL,
  `id_i_program` int(11) NOT NULL,
  `id_i_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_program_role`
--

INSERT INTO `internship_program_role` (`id`, `id_i_program`, `id_i_role`) VALUES
(12, 10, 10),
(13, 10, 8);

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
(8, 'Researcher', 'Role Researcher berperan dalam analisis, riset, dan menyajikan data yang berkaitan dengan project yang sedang dikembangkan oleh perusahaan. Selain itu, Researcher juga diharapkan dapat membuat model bisnis berdasarkan hasil riset untuk menunjang kualitas sistem agar dapat memenuhi kebutuhan penggunanya.', 'dummy_-_Copy6.jpg'),
(9, 'General', 'Role General berperan dalam mengurus berbagai hal yang berhubungan dengan kegiatan operasional perusahaan mulai dari perencanaan, eksekusi atau pelaksanaan, dokumentasi, hingga evaluasi program. Seseorang di role General perlu memiliki kemampuan komunikasi yang baik dengan pihak internal maupun eksternal sehingga seluruh kegiatan dapat berjalan dengan baik dan mendapat respons yang positif.', 'abah_botak1.jpg'),
(10, 'Engineer', 'Role Engineer berperan dalam merencanakan, membangun, hingga mengelola jaringan untuk membantu pengoptimalan sistem pada project yang sedang dikembangkan. Tidak hanya jaringan, Engineer juga berperan dalam proses riset, desain, pengembangan, pengujian dan pemeliharaan (maintenance) sebuah perangkat keras agar dapat memenuhi kebutuhan penggunanya.', 'abah_botak.jpg'),
(11, 'Marketing', 'Role Marketing berperan mengidentifikasi, mengembangkan, dan melakukan monitoring strategi pemasaran produk. Tidak hanya itu, Marketing juga perlu memiliki kemampuan membuat konten marketing, mendistribusikannya di berbagai platform pemasaran, serta membangun komunikasi dengan pelanggan dengan SEO untuk mengoptimalkan pemasaran produk.', 'abah_botak2.jpg');

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
(4, 18, 2, 121, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 17, 2, 121, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(43, 12, 1, 0, 'fas fa-user', 'Manage Users', 'users', '1', 1),
(44, 13, 1, 0, 'fas fa-users-cog', 'Manage Roles', 'groups', '2', 1),
(89, 19, 2, 121, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(109, 16, 2, 121, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(121, 15, 1, 0, 'fab fa-apper', 'Hidden Menu', '#', '#', 1),
(122, 10, 2, 133, 'fas fa-users', 'Mentoring', 'kelola_mentoring', 'kelola_mentoring', 1),
(123, 11, 2, 133, 'fas fa-calendar-alt', 'Internship', 'kelola_internship', 'kelola_internship', 1),
(124, 7, 2, 133, 'fas fa-book', 'Laporan', 'kelola_laporan', 'kelola_laporan', 1),
(125, 8, 2, 133, 'fas fa-pencil-alt', 'Penilaian', 'kelola_penilaian', 'kelola_penilaian', 1),
(126, 9, 2, 133, 'far fa-sticky-note', 'Sertifikat', 'kelola_sertifikat', 'kelola_sertifikat', 1),
(127, 2, 1, 0, 'fas fa-user-friends', 'Mentoring', 'mentoring', 'mentoring', 1),
(130, 1, 1, 0, 'fas fa-user-check', 'Internship Role', 'internship_role', 'internship_role', 1),
(131, 3, 1, 0, 'fas fa-box-open', 'Internship Saya', 'internship_saya', 'internship_saya', 1),
(133, 4, 1, 0, 'fas fa-cog', 'Kelola', '#', '#', 1),
(134, 14, 1, 0, 'fas fa-cog', 'Setting Aplikasi', 'Setting', 'Setting', 1),
(135, 6, 2, 133, 'fas fa-database', 'Internship Roles', 'internship_role', 'internship_role', 1),
(136, 5, 2, 133, 'far fa-calendar-alt', 'Internship Program', 'internship_program', 'internship_program', 1);

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
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `nim` varchar(10) DEFAULT NULL,
  `perguruan_tinggi` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `active`, `first_name`, `last_name`, `phone`, `image`, `nim`, `perguruan_tinggi`, `jurusan`) VALUES
(1, '$2y$08$PNwyjmAyqJbdbt9mn.150uZQCqlK5ytySGzxE/5A8/XVkbs9gvf2y', 'admin@muhakbar.com', 1, 'Muhammad', 'Akbar', '123213213', 'akbr_pp_2.jpg', NULL, NULL, NULL),
(20, '$2y$08$TLGUmu.Cj7y6xAhWm9qHhOgyGzT07GpkdYl6XsSPsjXJBLII74EZm', 'fajar@gmail.com', 1, 'fajar', 'mantri', NULL, 'default.jpg', NULL, NULL, NULL),
(24, '$2y$08$7XGvwDMIQqUSm/wF34B3AeXk17wWXdBLZSAFNIIQaFhXqxXVoZRlm', 'mahasiswa@gmail.com', 1, 'Mahasiswa', '1', NULL, 'default.jpg', NULL, NULL, NULL),
(26, '$2y$08$HkR5BUqKp3GQcT4D1tAuiud85Ydurcfhrx5imL294ZLeWWAY/MTu.', 'mahasiswa1@gmail.com', 1, 'Mahasiswa', '1', '08964545453', 'default.jpg', '11111', 'Universitas Telkom', 'Informatika'),
(27, '$2y$08$KWQrVw1B06zDQCcfeJVvuuquDVRaNfqa1zyev9dP5onJkdkU0kcOq', 'mahasiswa2@gmail.com', 1, 'Mahasiswa', '2', '085674533212', 'default.jpg', '22222', 'Universitas Telkom', 'Informatika'),
(28, '$2y$08$3VN/QHbgHhRwF53i2eCbo.pjA1SoB5TKnLeSEBzbOMOcPeIjU/VVW', 'mahasiswa3@gmail.com', 1, 'mahasiswa', '3', '089653426374', 'default.jpg', '33333', 'Universitas Telkom', 'Informatika'),
(29, '$2y$08$vleKoKWKF4XPHDWeNzswOuUcPBSeqSot3u0Uh8Np/fIfCbA8JSjSq', 'mahasiswa4@gmail.com', 1, 'Mahasiswa', '4', '098564335374', 'default.jpg', '44444', 'Universitas Telkom', 'Informatika'),
(30, '$2y$08$q0Er3Vl0Yyt.Iqu8VgndLuFwCq7SLMb0.3/5KSS0QJDrsu/X7Ve9W', 'mahasiswa5@gmail.com', 1, 'Mahasiswa', '5', '0894537343', 'default.jpg', '55555', 'Universitas Telkom', 'Informatika'),
(32, '$2y$08$1dPvpqlCOUC8hoyBPIq5ZeWN6GJCJMjRpfUTn/nPatAzGIHypPsPS', 'mentor1@gmail.com', 1, 'Mentor', '1', '', 'default.jpg', '', '', ''),
(33, '$2y$08$Taby39izpyfRNdYElflV/OfMIDzPAYWHK.Oy1OmDOX0rWExe80p8y', 'mentor2@gmail.com', 1, 'Mentor', '2', '', 'default.jpg', '', '', '');

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
(52, 24, 13),
(54, 26, 13),
(55, 27, 13),
(56, 28, 13),
(57, 29, 13),
(58, 30, 13),
(60, 32, 14),
(61, 33, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internship_program`
--
ALTER TABLE `internship_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `internship_program_mahasiswa`
--
ALTER TABLE `internship_program_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_program_mentor`
--
ALTER TABLE `internship_program_mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_program_role`
--
ALTER TABLE `internship_program_role`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `internship_program`
--
ALTER TABLE `internship_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `internship_program_mahasiswa`
--
ALTER TABLE `internship_program_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_program_mentor`
--
ALTER TABLE `internship_program_mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_program_role`
--
ALTER TABLE `internship_program_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `internship_role`
--
ALTER TABLE `internship_role`
  MODIFY `id_internship_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
