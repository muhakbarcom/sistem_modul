-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 05:47 PM
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
-- Database: `sistem_modul`
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
(1, 120),
(12, 120),
(1, 123),
(1, 135),
(1, 136),
(1, 3),
(13, 3),
(14, 3),
(1, 125),
(1, 124),
(1, 141),
(1, 143),
(13, 145),
(14, 145),
(1, 144),
(1, 148),
(15, 146),
(15, 121),
(15, 134),
(1, 142),
(15, 142),
(15, 8),
(15, 121),
(88, 121),
(15, 44),
(15, 43),
(1, 149);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, '1A'),
(8, '3A'),
(9, '2A');

-- --------------------------------------------------------

--
-- Table structure for table `krs_mahasiswa`
--

CREATE TABLE `krs_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs_mahasiswa`
--

INSERT INTO `krs_mahasiswa` (`id`, `id_mahasiswa`, `id_matakuliah`) VALUES
(18, 24, 45),
(19, 48, 45),
(20, 47, 45),
(21, 24, 29),
(22, 20, 29),
(23, 46, 45),
(25, 48, 44);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_matakuliah`, `nama_matakuliah`, `id_dosen`) VALUES
(3, 'KU1612', 'BAHASA INDONESIA (INDONESIAN LANGUAGE)', 33),
(4, 'KU1631', 'BAHASA INGGRIS 1', 32),
(5, 'KU2631', 'BAHASA INGGRIS 2', 32),
(6, 'MI1121', 'SISTEM BASIS DATA 1', 42),
(7, 'MI1122', 'PROYEK 1', 40),
(8, 'MI1211', 'PENGENALAN TEKNOLOGI INFORMASI DAN KOMUNIKASI', 39),
(9, 'MI1212', 'INTERAKSI MANUSIA DAN KOMPUTER', 39),
(10, 'MI1221', 'SISTEM INFORMASI MANAJEMEN', 43),
(11, 'MI1222', 'ANALISIS DAN PERANCANGAN SISTEM INFORMASI', 43),
(12, 'MI1223', 'PERANCANGAN WEB', 41),
(13, 'MI1231', 'APLIKASI PERKANTORAN', 40),
(14, 'MI1232', 'ALGORITMA DAN PEMROGRAMAN', 42),
(15, 'MI1331', 'DASAR AKUNTANSI', 32),
(16, 'MI1521', 'MANAJEMEN RANTAI PASOK', 43),
(17, 'MI1621', 'MATEMATIKA DASAR', 44),
(18, 'MI2122', 'PEMROGRAMAN WEB 1', 41),
(19, 'MI2221', 'JARINGAN KOMPUTER', 39),
(20, 'MI2222', 'SISTEM BASIS DATA 2', 43),
(21, 'MI2223', 'SISTEM INFORMASI ENTERPRISE 1', 43),
(22, 'MI2224', 'ANALISIS DAN PERANCANGAN BERORIENTASI OBJEK', 44),
(23, 'MI2225', 'SISTEM BASIS DATA 3 (DATABASE 3)', 43),
(24, 'MI2226', 'MANAJEMEN DATA DAN INFORMASI (DATA MANAGEMENT AND', 39),
(25, 'MI2227', 'MANAJEMEN PROYEK SISTEM INFORMASI', 41),
(26, 'MI2228', 'PROSES BISNIS', 38),
(27, 'MI2231', 'STATISTIKA BISNIS', 38),
(28, 'MI2232', 'PEMROGRAMAN BERORIENTASI OBJEK', 44),
(29, 'MI2233', 'PROYEK 2 (PROJECT 2)', 43),
(30, 'MI2611', 'ETIKA PROFESI DAN KECAKAPAN ANTAR PERSONAL (PROFES', 38),
(31, 'MI2621', 'SISTEM INFORMASI ENTERPRISE 2', 43),
(32, 'MI31325', 'BISNIS INTELIJEN', 38),
(33, 'MI3211', 'SISTEM INFORMASI GEOGRAFIS', 38),
(34, 'MI3213', 'KEPEMIMPINAN DAN KEWIRAUSAHAAN', 42),
(35, 'MI3214', 'PRAKTEK KERJA LAPANGAN', 41),
(36, 'MI3215', 'TUGAS AKHIR', 41),
(37, 'MI3222', 'PERANCANGAN DATA WAREHOUSE', 39),
(38, 'MI3231', 'PEMROGRAMAN WEB 2', 41),
(39, 'MI3611', 'PANCASILA', 32),
(40, 'MI3711', 'KAPITA SELEKTA', 44),
(41, 'PPI01030', 'PENDIDIKAN KEWARGANEGARAAN', 42),
(42, 'PPI02090', 'BAHASA INGGRIS 4', 32),
(43, 'PPI2035', 'BAHASA INGGRIS 3 (GENERAL ENGLISH 3)', 32),
(44, 'KU1632', 'MATEMATIKA DISKRIT', 44),
(45, 'KU1611', 'AGAMA', 33);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_assign`
--

CREATE TABLE `matakuliah_assign` (
  `id` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah_assign`
--

INSERT INTO `matakuliah_assign` (`id`, `id_matakuliah`, `id_kelas`) VALUES
(1, 36, 8),
(2, 27, 8),
(3, 10, 8),
(4, 33, 1),
(5, 31, 1),
(6, 21, 8),
(7, 23, 1),
(8, 20, 1),
(9, 8, 8),
(10, 8, 9),
(11, 6, 1),
(12, 29, 9),
(13, 7, 1),
(14, 26, 1),
(15, 35, 8),
(16, 12, 1),
(17, 37, 8),
(18, 41, 8),
(19, 38, 8),
(20, 18, 1),
(21, 28, 9),
(22, 39, 9),
(23, 44, 1),
(24, 17, 1),
(25, 16, 1),
(26, 25, 8),
(27, 24, 9),
(28, 34, 8),
(29, 40, 8),
(30, 19, 1),
(31, 9, 1),
(32, 30, 9),
(33, 15, 1),
(34, 32, 8),
(35, 42, 8),
(36, 43, 9),
(37, 5, 1),
(38, 4, 1),
(39, 3, 9),
(40, 13, 1),
(41, 11, 1),
(42, 22, 9),
(43, 14, 1),
(44, 2, 1),
(45, 2, 9),
(46, 45, 9);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `file_materi` varchar(100) NOT NULL,
  `nomor_pertemuan` int(11) DEFAULT 1,
  `id_matakuliah` int(11) NOT NULL,
  `tanggal_upload` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `file_materi`, `nomor_pertemuan`, `id_matakuliah`, `tanggal_upload`) VALUES
(1, 'Coba_Dummy_PDF_-_Copxys9.pdf', 1, 10, '2023-08-10'),
(6, 'designer.jpg', 2, 10, '2023-08-10'),
(7, 'data_scientist2.jpg', 1, 11, '2023-08-10'),
(8, 'designer1.jpg', 1, 11, '2023-08-10');

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
(4, 10, 2, 121, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 9, 2, 121, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(43, 3, 2, 142, 'fas fa-user', 'Manage Users', 'users', '1', 1),
(44, 4, 2, 142, 'fas fa-users-cog', 'Manage Roles', 'groups', '2', 1),
(89, 11, 2, 121, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(109, 8, 2, 121, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(121, 7, 1, 0, 'fab fa-apper', 'Hidden Menu', '#', '#', 1),
(134, 6, 1, 0, 'fas fa-cog', 'Setting Aplikasi', 'Setting', 'Setting', 1),
(142, 1, 1, 0, 'fas fa-database', 'Master Data', '#', '#', 1),
(143, 2, 2, 142, 'fas fa-book-open', 'Matakuliah', 'Matakuliah', 'Matakuliah', 1),
(144, 5, 1, 0, 'fas fa-user-cog', 'Assign Kelas Matakuliah', 'Matakuliah_assign', 'Matakuliah_assign', 1),
(145, 1, 2, 0, 'fas fa-book', 'Materi', 'Materi', 'materi', 1),
(146, 1, 2, 142, 'fas fa-door-open', 'Kelas', 'Kelas', 'Kelas', 1),
(148, 1, 2, 142, 'fas fa-user-graduate', 'KRS Mahasiswa', 'krs_mahasiswa', 'krs_mahasiswa', 1),
(149, 1, 2, 0, 'fas fa-book-open', 'Laporan', 'Laporan', '#', 1);

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
(1, 'kaprodi', 'KA PRODI'),
(13, 'mahasiswa', 'MAHASISWA'),
(14, 'dosen', 'DOSEN'),
(15, 'admin', 'ADMIN');

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
(1, 'download.png', 'Sistem Pengelolaan Modul', 'www.mi.com');

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
(1, '$2y$08$PNwyjmAyqJbdbt9mn.150uZQCqlK5ytySGzxE/5A8/XVkbs9gvf2y', 'kaprodi@admin.com', 1, 'Kepala', 'Prodi', '123213213', 'dummy_-_Copy.jpg', NULL, NULL, NULL),
(20, '$2y$08$TLGUmu.Cj7y6xAhWm9qHhOgyGzT07GpkdYl6XsSPsjXJBLII74EZm', 'fajar@gmail.com', 1, 'fajarr', 'mantrii', '', 'default.jpg', NULL, NULL, NULL),
(24, '$2y$08$7XGvwDMIQqUSm/wF34B3AeXk17wWXdBLZSAFNIIQaFhXqxXVoZRlm', 'mahasiswa@gmail.com', 1, 'Mahasiswa', 'Aja', NULL, 'default.jpg', NULL, NULL, NULL),
(26, '$2y$08$HkR5BUqKp3GQcT4D1tAuiud85Ydurcfhrx5imL294ZLeWWAY/MTu.', 'mahasiswa1@gmail.com', 1, 'Mahasiswa', '1', '08964545453', 'default.jpg', '11111', 'Universitas Telkom', 'Informatika'),
(27, '$2y$08$KWQrVw1B06zDQCcfeJVvuuquDVRaNfqa1zyev9dP5onJkdkU0kcOq', 'mahasiswa2@gmail.com', 1, 'Mahasiswa', '2', '085674533212', 'default.jpg', '22222', 'Universitas Telkom', 'Informatika'),
(28, '$2y$08$3VN/QHbgHhRwF53i2eCbo.pjA1SoB5TKnLeSEBzbOMOcPeIjU/VVW', 'mahasiswa3@gmail.com', 1, 'mahasiswa', '3', '089653426374', 'default.jpg', '33333', 'Universitas Telkom', 'Informatika'),
(29, '$2y$08$vleKoKWKF4XPHDWeNzswOuUcPBSeqSot3u0Uh8Np/fIfCbA8JSjSq', 'mahasiswa4@gmail.com', 1, 'Mahasiswa', '4', '098564335374', 'default.jpg', '44444', 'Universitas Telkom', 'Informatika'),
(30, '$2y$08$q0Er3Vl0Yyt.Iqu8VgndLuFwCq7SLMb0.3/5KSS0QJDrsu/X7Ve9W', 'mahasiswa5@gmail.com', 1, 'Mahasiswa', '5', '0894537343', 'default.jpg', '55555', 'Universitas Telkom', 'Informatika'),
(32, '$2y$08$1dPvpqlCOUC8hoyBPIq5ZeWN6GJCJMjRpfUTn/nPatAzGIHypPsPS', 'dosen1@gmail.com', 1, 'Dosen', '1', '', 'default.jpg', '', '', ''),
(33, '$2y$08$Taby39izpyfRNdYElflV/OfMIDzPAYWHK.Oy1OmDOX0rWExe80p8y', 'dosen@gmail.com', 1, 'Dosen', '2', '', 'default.jpg', '', '', ''),
(38, '$2y$08$Zx0lR1PA2GgJvhtWqTjiJuGpJw4ctzcfZGyudLeSMhuTr0wml9fOC', 'm.ibnu@gmail.com', 1, 'M.Ibnu', 'Choldun R., S.T. M.T.', '089474646465', 'default.jpg', NULL, NULL, NULL),
(39, '$2y$08$Xpgjx1SNwvInj6XuK.YjWuKbAnrdCO3tfXF7XEIWJvbtmAVl1ucbK', 'virdiandry@gmail.com', 1, 'Virdiandry', 'Putratama S.T.M.Kom', '086534253765', 'default.jpg', NULL, NULL, NULL),
(40, '$2y$08$pUVpT1GjZ2WwnepIBJAfRONJcgLf9WgKz56X1nYrK5YVB/48ZyvXW', 'maniah@gmail.com', 1, 'Maniah', 'M.T.', '0876363532535', 'default.jpg', NULL, NULL, NULL),
(41, '$2y$08$yP4KIT2iY81V9I9FJGVT5epAgBmqp9RuSLP7Wi99yeqcghMIo1I4K', 'supono@gmail.com', 1, 'Supono', 'S.T., M.T.', '0897653426242', 'default.jpg', NULL, NULL, NULL),
(42, '$2y$08$8H5jepN/Q5VaqPmrCvPqL.ar.Xi9kKhhgVQJwgwrYnvJZf0588j/C', 'shiyami@gmail.com', 1, 'Shiyami', 'Milwandhari, S.Kom.', '0873635343453', 'default.jpg', NULL, NULL, NULL),
(43, '$2y$08$HAWwvZ07LVQZx8fEFacc.OfmzgZ45R9UQEb..QccTjLARh13sLf6e', 'sari@gmail.com', 1, 'Sari', 'Armiati, S.T., M.T.', '08542324273', 'default.jpg', NULL, NULL, NULL),
(44, '$2y$08$JINpIpt5P5.LaEJDkaLqt.P1z.hQLWyAauwQZpZrjTD4dHaCRegCK', 'mubassiran@gmail.com', 1, 'Mubassiran', 'S.Si., M.T.', '08542437848', 'default.jpg', NULL, NULL, NULL),
(45, '$2y$08$2jWND7f0XF6mJ3CP1u3zUuftnK/bKONB3LeOzwtzpg.R.h0a8so5G', 'mahasiswa6@gmail.com', 1, 'mahasiswa', '6', '0937893673467', 'default.jpg', NULL, NULL, NULL),
(46, '$2y$08$mhFf3u9DJhrCClKiag6W5.OxpKVbvAMToPJ2g/XatIAjEX.rvWHrG', 'mahasiswa7@gmail.com', 1, 'mahasiswa', '7', '0898764764', 'default.jpg', NULL, NULL, NULL),
(47, '$2y$08$Zh9J.lOwrcaKbNnCYIhqJ.h0GtytVOS2VesZl238O8GPakQ4SQYU2', 'mahasiswa8@gmail.com', 1, 'mahasiswa', '8', '08964545454', 'default.jpg', NULL, NULL, NULL),
(48, '$2y$08$4EFEvjNF9C2B0ILAPOo5gekdRK3JhN0nWTQrIwxLGwBmfow/ZqPrS', 'mahasiswa9@gmail.com', 1, 'mahasiswa', '9', '086746436435', 'default.jpg', NULL, NULL, NULL),
(49, '$2y$08$ybeZ9xLDGSW0V1c5CyzM8uBB0i487G1VXvR5A.EAWM8Tkvyyivl8m', 'mahasiswa10@gmail.com', 1, 'mahasiswa', '10', '0876465454564', 'default.jpg', NULL, NULL, NULL),
(50, '$2y$08$AmQetkRs.POyiB8m6psOreYNhV957IKR5pSO.x4rWZ9hrRdTwiDKy', 'admin@admin.com', 1, 'Admin', 'Admin', '000000', 'default.jpg', NULL, NULL, NULL);

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
(74, 1, 1),
(64, 20, 13),
(52, 24, 13),
(54, 26, 13),
(55, 27, 13),
(56, 28, 13),
(57, 29, 13),
(58, 30, 13),
(72, 32, 14),
(73, 33, 14),
(82, 38, 14),
(76, 39, 14),
(77, 40, 14),
(78, 41, 14),
(79, 42, 14),
(80, 43, 14),
(81, 44, 14),
(83, 45, 13),
(84, 46, 13),
(85, 47, 13),
(86, 48, 13),
(87, 49, 13),
(88, 50, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs_mahasiswa`
--
ALTER TABLE `krs_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah_assign`
--
ALTER TABLE `matakuliah_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `krs_mahasiswa`
--
ALTER TABLE `krs_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `matakuliah_assign`
--
ALTER TABLE `matakuliah_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

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
