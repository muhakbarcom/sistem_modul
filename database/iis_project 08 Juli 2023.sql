-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 02:35 PM
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
(1, 123),
(13, 127),
(14, 127),
(13, 131),
(1, 135),
(13, 130),
(1, 133),
(1, 134),
(1, 136),
(1, 3),
(13, 3),
(14, 3),
(13, 137),
(14, 137),
(14, 138),
(1, 125),
(1, 124);

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
(10, 'Magang DDP Telkom Batch 2', 'tes', '2023-06-05', '2023-07-28'),
(11, 'Program 2', 'xxx', '2023-06-05', '2023-06-30'),
(16, 'program januari', 'hahahha', '2023-01-01', '2023-03-01'),
(17, 'program januari - maret', 'hahahha', '2023-01-01', '2023-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `internship_program_mahasiswa`
--

CREATE TABLE `internship_program_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `step` int(11) NOT NULL DEFAULT 0,
  `cv` varchar(100) DEFAULT NULL,
  `link_interview` text DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_program_mahasiswa`
--

INSERT INTO `internship_program_mahasiswa` (`id`, `id_program`, `id_role`, `id_user`, `step`, `cv`, `link_interview`, `nilai_akhir`, `created_at`) VALUES
(1, 10, 11, 24, 3, 'Coba_Dummy_(PDF)1.pdf', 'https://www.youtube.com/watch?v=q3qIjHa_ye0', 0, '2023-06-30 16:23:28'),
(6, 10, 10, 27, 3, 'Coba_Dummy_PDF_-_Copxys.pdf', 'https://www.youtube.com/watch?v=r8OipmKFDeM&list=RDj_MlBCb9-m8&index=4&ab_channel=Oasis', 0, '2023-07-03 21:03:37'),
(15, 11, 8, 24, 4, 'Coba_Dummy_(PDF).pdf', 'https://www.youtube.com/watch?v=S1EyXQWDBEQ&list=RDHWmOYG6T5-g&index=12', 100, '2023-07-04 10:06:33'),
(16, 11, 8, 29, 3, 'Coba_Dummy_PDF_-_Copxys1.pdf', 'https://www.youtube.com/watch?v=wCbyRUTI4Lg', 0, '2023-07-04 14:43:59'),
(17, 16, 5, 26, 4, 'Aplikasi.pdf', 'https://www.youtube.com/watch?v=Oextk-If8HQ&list=RDj_MlBCb9-m8&index=7&ab_channel=KeaneVEVO', 90, '2023-07-05 10:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `internship_program_mahasiswa_detail`
--

CREATE TABLE `internship_program_mahasiswa_detail` (
  `id` int(11) NOT NULL,
  `id_program_mahasiswa` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_program_mahasiswa_detail`
--

INSERT INTO `internship_program_mahasiswa_detail` (`id`, `id_program_mahasiswa`, `step`, `created_at`, `status`) VALUES
(2, 1, 1, '2023-07-02', 1),
(3, 1, 2, '2023-07-02', 1),
(4, 1, 3, '2023-07-02', 1),
(5, 6, 1, '2023-07-03', 1),
(6, 6, 2, '2023-07-03', 1),
(7, 6, 2, '2023-07-03', 1),
(8, 6, 3, '2023-07-03', 1),
(9, 1, 0, '2023-07-02', 1),
(13, 15, 0, '2023-07-04', 1),
(14, 15, 1, '2023-07-04', 1),
(15, 15, 2, '2023-07-04', 1),
(16, 15, 3, '2023-07-04', 1),
(30, 15, 4, '2023-07-04', 1),
(31, 16, 0, '2023-07-04', 1),
(32, 16, 1, '2023-07-04', 1),
(33, 16, 2, '2023-07-04', 1),
(34, 16, 3, '2023-07-04', 1),
(35, 17, 0, '2023-07-05', 1),
(36, 17, 1, '2023-07-05', 1),
(37, 17, 2, '2023-07-05', 1),
(38, 17, 3, '2023-07-05', 1),
(39, 17, 4, '2023-07-05', 1);

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
(15, 12, 10),
(16, 12, 8),
(17, 13, 10),
(18, 13, 8),
(24, 11, 11),
(27, 10, 10),
(28, 10, 8),
(33, 17, 10),
(34, 17, 9);

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
(10, 'Engineer', 'Role Engineer berperan dalam merencanakan, membangun, hingga mengelola jaringan untuk membantu pengoptimalan sistem pada project yang sedang dikembangkan. Tidak hanya jaringan, Engineer juga berperan dalam proses riset, desain, pengembangan, pengujian dan pemeliharaan (maintenance) sebuah perangkat keras agar dapat memenuhi kebutuhan penggunanya.', 'abah_botak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akhir`
--

CREATE TABLE `laporan_akhir` (
  `id` int(11) NOT NULL,
  `id_program_mahasiswa` int(11) NOT NULL,
  `tanggal_pengumpulan` datetime NOT NULL DEFAULT current_timestamp(),
  `file` text NOT NULL,
  `komentar_mentor` text DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'REVIEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_akhir`
--

INSERT INTO `laporan_akhir` (`id`, `id_program_mahasiswa`, `tanggal_pengumpulan`, `file`, `komentar_mentor`, `status`) VALUES
(2, 15, '2023-07-04 10:56:33', 'Coba_Dummy_PDF_-_Copxys.pdf', NULL, 'REVIEW'),
(3, 15, '2023-07-04 10:58:32', 'Coba_Dummy_PDF_-_Copxys1.pdf', NULL, 'DITOLAK'),
(4, 15, '2023-07-04 10:58:54', 'Coba_Dummy_PDF_-_Copxys2.pdf', NULL, 'DISETUJUI'),
(5, 16, '2023-07-04 14:48:13', 'Coba_Dummy_PDF_-_Copxys3.pdf', 'asdsa', 'DITOLAK'),
(6, 17, '2023-07-05 11:14:55', 'Aplikasi.pdf', 'Haaaaaaa', 'DITOLAK'),
(7, 17, '2023-07-05 11:18:38', 'Coba_Dummy_PDF_-_Copxys4.pdf', 'Haaaa', 'DITOLAK'),
(8, 17, '2023-07-05 11:20:50', 'Coba_Dummy_PDF_-_Copxys5.pdf', 'Haaaaaaaa', 'DISETUJUI');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_harian`
--

CREATE TABLE `laporan_harian` (
  `id` int(11) NOT NULL,
  `id_program_mahasiswa` int(11) NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `aktivitas` text DEFAULT NULL,
  `status_kehadiran` int(11) NOT NULL DEFAULT 1,
  `alasan_kehadiran` varchar(100) DEFAULT NULL,
  `keterangan_kehadiran` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_harian`
--

INSERT INTO `laporan_harian` (`id`, `id_program_mahasiswa`, `jam_mulai`, `jam_selesai`, `tanggal`, `aktivitas`, `status_kehadiran`, `alasan_kehadiran`, `keterangan_kehadiran`, `created_at`) VALUES
(2, 1, '15:04:00', '15:06:00', '2023-07-03', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(4, 1, '08:34:00', '10:35:00', '2023-06-27', 'asdas', 1, NULL, NULL, '2023-07-05 21:55:29'),
(5, 1, '08:38:00', '08:38:00', '2023-06-26', 'xxx', 1, NULL, NULL, '2023-07-05 21:55:29'),
(6, 1, NULL, NULL, '2023-06-28', NULL, 0, '1', 'hehe', '2023-07-05 21:55:29'),
(7, 1, '20:44:00', '20:44:00', '2023-06-29', 'asdasdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(8, 6, '09:22:00', '10:18:00', '2023-07-03', 'jfvuifvhuidfhvfh', 1, NULL, NULL, '2023-07-05 21:55:29'),
(9, 6, NULL, NULL, '2023-06-05', NULL, 0, '1', 'uihuhihiuhu', '2023-07-05 21:55:29'),
(10, 6, '22:21:00', '21:21:00', '2023-06-06', 'ytf6tf56ft', 1, NULL, NULL, '2023-07-05 21:55:29'),
(11, 6, NULL, NULL, '2023-06-07', NULL, 0, '3', 'jbiyhugyugyug', '2023-07-05 21:55:29'),
(12, 6, NULL, NULL, '2023-06-08', NULL, 0, '2', 'hjygugyggy', '2023-07-05 21:55:29'),
(13, 6, '23:25:00', '23:25:00', '2023-06-09', 'ygftyfftyfytt', 1, NULL, NULL, '2023-07-05 21:55:29'),
(14, 1, NULL, NULL, '2023-06-30', NULL, 0, '1', 'p', '2023-07-05 21:55:29'),
(15, 15, '22:22:00', '22:22:00', '2023-06-26', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(16, 15, '22:24:00', '22:24:00', '2023-06-27', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(17, 15, '10:24:00', '22:24:00', '2023-06-28', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(18, 15, '22:23:00', '22:23:00', '2023-06-29', 'asdas', 1, NULL, NULL, '2023-07-05 21:55:29'),
(19, 15, '10:23:00', '22:24:00', '2023-06-30', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(20, 15, '10:23:00', '22:24:00', '2023-06-30', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(21, 15, '22:23:00', '22:25:00', '2023-06-19', 'asdasdassa', 1, NULL, NULL, '2023-07-05 21:55:29'),
(22, 15, '22:25:00', '22:25:00', '2023-06-20', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(23, 15, NULL, NULL, '2023-06-21', NULL, 0, '2', 'asdasd', '2023-07-05 21:55:29'),
(24, 15, '22:26:00', '22:26:00', '2023-06-22', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(25, 15, '22:26:00', '22:27:00', '2023-06-23', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(26, 15, '22:26:00', '22:29:00', '2023-06-12', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(27, 15, NULL, NULL, '2023-06-13', NULL, 0, '1', 'asdsad', '2023-07-05 21:55:29'),
(28, 15, '22:28:00', '10:29:00', '2023-06-14', 'asdsa', 1, NULL, NULL, '2023-07-05 21:55:29'),
(29, 15, '22:28:00', '22:29:00', '2023-06-15', 'asdsa', 1, NULL, NULL, '2023-07-05 21:55:29'),
(30, 15, '22:28:00', '22:28:00', '2023-06-16', 'asds', 1, NULL, NULL, '2023-07-05 21:55:29'),
(31, 15, '22:28:00', '22:28:00', '2023-06-05', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(32, 15, '22:28:00', '22:28:00', '2023-06-05', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(33, 15, '22:28:00', '22:28:00', '2023-06-06', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(34, 15, '22:28:00', '23:27:00', '2023-06-07', 'asd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(35, 15, '22:28:00', '22:28:00', '2023-06-08', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(36, 15, '22:28:00', '22:29:00', '2023-06-09', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(37, 16, '02:46:00', '02:46:00', '2023-06-05', 'asd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(38, 16, '02:46:00', '02:46:00', '2023-06-05', 'asd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(39, 16, '02:45:00', '02:45:00', '2023-06-06', 'asd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(40, 16, NULL, NULL, '2023-06-07', NULL, 0, '1', 'asd', '2023-07-05 21:55:29'),
(41, 16, '02:47:00', '02:46:00', '2023-06-08', 'adsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(42, 16, '02:46:00', '02:46:00', '2023-06-09', 'aasdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(43, 16, '02:46:00', '02:46:00', '2023-06-09', 'aasdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(44, 16, '14:46:00', '02:45:00', '2023-06-12', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(45, 16, '02:47:00', '02:47:00', '2023-06-13', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(46, 16, '02:46:00', '14:46:00', '2023-06-14', 'asd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(47, 16, '02:46:00', '02:46:00', '2023-06-15', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(48, 16, '14:47:00', '14:48:00', '2023-06-16', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(49, 16, '02:46:00', '14:47:00', '2023-06-19', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(50, 16, '02:47:00', '02:47:00', '2023-06-20', 'asdasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(51, 16, '02:46:00', '14:49:00', '2023-06-21', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(52, 16, '02:47:00', '14:49:00', '2023-06-22', 'asdsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(53, 16, '02:47:00', '02:49:00', '2023-06-23', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(54, 16, '14:48:00', '14:49:00', '2023-06-26', 'sadasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(55, 16, '14:48:00', '14:49:00', '2023-06-26', 'sadasd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(56, 16, '02:47:00', '14:49:00', '2023-06-27', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(57, 16, '02:47:00', '14:49:00', '2023-06-27', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(58, 16, '02:47:00', '14:49:00', '2023-06-28', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(59, 16, '02:47:00', '14:49:00', '2023-06-28', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(60, 16, '02:47:00', '02:47:00', '2023-06-29', 'sadsa', 1, NULL, NULL, '2023-07-05 21:55:29'),
(61, 16, '02:47:00', '02:47:00', '2023-06-30', 'sadsad', 1, NULL, NULL, '2023-07-05 21:55:29'),
(62, 17, '08:00:00', '16:00:00', '2023-01-02', 'jjjjjjjjjjadsjbkadbjk', 1, NULL, NULL, '2023-07-05 21:55:29'),
(63, 17, NULL, NULL, '2023-01-03', NULL, 0, '2', 'kjewhfuiwefhwueifh', '2023-07-05 21:55:29'),
(64, 17, '08:00:00', '16:00:00', '2023-01-04', 'kyukuykuikui', 1, NULL, NULL, '2023-07-05 21:55:29'),
(65, 17, '07:55:00', '16:00:00', '2023-01-05', 'uyyuyuyuyuyu', 1, NULL, NULL, '2023-07-05 21:55:29'),
(66, 17, '08:00:00', '16:05:00', '2023-01-06', 'ppppppppppppppp', 1, NULL, NULL, '2023-07-05 21:55:29'),
(67, 17, '08:00:00', '16:00:00', '2023-01-09', 'tetetetetete', 1, NULL, NULL, '2023-07-05 21:55:29'),
(68, 17, '08:00:00', '16:00:00', '2023-01-10', 'bbbbbbbbbbb', 1, NULL, NULL, '2023-07-05 21:55:29'),
(69, 17, '07:56:00', '16:00:00', '2023-01-11', 'kkkkkkkkkkkk', 1, NULL, NULL, '2023-07-05 21:55:29'),
(70, 17, '08:00:00', '16:00:00', '2023-01-12', 'llllllllllllllllllllllll', 1, NULL, NULL, '2023-07-05 21:55:29'),
(71, 17, '08:00:00', '16:00:00', '2023-01-13', 'nnnnnnnnnnnnnnnnnnn', 1, NULL, NULL, '2023-07-05 21:55:29'),
(72, 17, '08:00:00', '16:00:00', '2023-01-16', 'jajajajajaja', 1, NULL, NULL, '2023-07-05 21:55:29'),
(73, 17, '08:00:00', '16:00:00', '2023-01-17', 'yhjuykjuykuykuyk', 1, NULL, NULL, '2023-07-05 21:55:29'),
(74, 17, NULL, NULL, '2023-01-18', NULL, 0, '1', 'sakit hati', '2023-07-05 21:55:29'),
(75, 17, '08:00:00', '16:00:00', '2023-01-19', 'fdghregerger', 1, NULL, NULL, '2023-07-05 21:55:29'),
(76, 17, '08:00:00', '16:00:00', '2023-01-20', 'gtgrthrthrthrthtr', 1, NULL, NULL, '2023-07-05 21:55:29'),
(77, 17, '08:00:00', '16:00:00', '2023-01-23', 'kklnjkddjk', 1, NULL, NULL, '2023-07-05 21:55:29'),
(78, 17, '08:00:00', '16:00:00', '2023-01-24', 'uuykuikiukyi', 1, NULL, NULL, '2023-07-05 21:55:29'),
(79, 17, '08:00:00', '16:00:00', '2023-01-25', 'hjhyghjhgjhgjhg', 1, NULL, NULL, '2023-07-05 21:55:29'),
(80, 17, '08:00:00', '16:00:00', '2023-01-26', 'vregrewgwefwe', 1, NULL, NULL, '2023-07-05 21:55:29'),
(81, 17, '08:00:00', '16:00:00', '2023-01-27', 'vcvfgvbgbfgbfg', 1, NULL, NULL, '2023-07-05 21:55:29'),
(82, 17, '08:00:00', '16:00:00', '2023-01-30', 'mmbnmnnmnmn', 1, NULL, NULL, '2023-07-05 21:55:29'),
(83, 17, '08:00:00', '16:00:00', '2023-01-31', 'bgfbfghbfgvbfd', 1, NULL, NULL, '2023-07-05 21:55:29'),
(84, 17, '08:00:00', '16:00:00', '2023-02-01', 'gfgergerger', 1, NULL, NULL, '2023-07-05 21:55:29'),
(85, 17, '08:00:00', '16:00:00', '2023-02-02', 'qqqqqqqqqqqqqqqq', 1, NULL, NULL, '2023-07-05 21:55:29'),
(86, 17, '08:00:00', '16:00:00', '2023-02-03', 'vvdfvdvvsdvsv', 1, NULL, NULL, '2023-07-05 21:55:29'),
(87, 17, '08:00:00', '16:00:00', '2023-02-06', 'kefkewklewkj', 1, NULL, NULL, '2023-07-05 21:55:29'),
(88, 17, '08:00:00', '16:00:00', '2023-02-07', 'mjkujykuykuyk', 1, NULL, NULL, '2023-07-05 21:55:29'),
(89, 17, '08:00:00', '16:00:00', '2023-02-08', 'nbvmnhmjhmhjm', 1, NULL, NULL, '2023-07-05 21:55:29'),
(90, 17, '08:00:00', '16:00:00', '2023-02-09', 'xcsxcxcxcxcxc', 1, NULL, NULL, '2023-07-05 21:55:29'),
(91, 17, NULL, NULL, '2023-02-10', NULL, 0, '2', 'mau mastiin dia ga sama yang lain', '2023-07-05 21:55:29'),
(92, 17, '08:00:00', '16:00:00', '2023-02-13', 'jsjjsjsjs', 1, NULL, NULL, '2023-07-05 21:55:29'),
(93, 17, '08:00:00', '16:00:00', '2023-02-14', 'xbxbxb', 1, NULL, NULL, '2023-07-05 21:55:29'),
(94, 17, '08:00:00', '16:00:00', '2023-02-15', 'boleh', 1, NULL, NULL, '2023-07-05 21:55:29'),
(95, 17, '08:00:00', '16:00:00', '2023-02-16', 'jadi gini', 1, NULL, NULL, '2023-07-05 21:55:29'),
(96, 17, '08:00:00', '16:00:00', '2023-02-17', 'hahaha', 1, NULL, NULL, '2023-07-05 21:55:29'),
(97, 17, '08:00:00', '16:00:00', '2023-02-20', 'hehe', 1, NULL, NULL, '2023-07-05 21:55:29'),
(98, 17, '08:00:00', '16:00:00', '2023-02-21', 'wow', 1, NULL, NULL, '2023-07-05 21:55:29'),
(99, 17, '08:00:00', '16:00:00', '2023-02-22', 'ooouwo', 1, NULL, NULL, '2023-07-05 21:55:29'),
(100, 17, '08:00:00', '16:00:00', '2023-02-23', 'mamamamama', 1, NULL, NULL, '2023-07-05 21:55:29'),
(101, 17, '08:00:00', '16:00:00', '2023-02-24', 'bhbdhdhdg', 1, NULL, NULL, '2023-07-05 21:55:29'),
(102, 17, '08:00:00', '16:00:00', '2023-02-27', 'hhuhuhuhuhuhuh', 1, NULL, NULL, '2023-07-05 21:55:29'),
(103, 17, '08:00:00', '16:00:00', '2023-02-28', 'nnnnn', 1, NULL, NULL, '2023-07-05 21:55:29'),
(104, 17, '08:00:00', '16:00:00', '2023-03-01', 'Lopeeeeeeeeeeeeeee', 1, NULL, NULL, '2023-07-05 21:55:29'),
(105, 17, '08:00:00', '16:00:00', '2023-03-02', 'love sekebon', 1, NULL, NULL, '2023-07-05 21:55:29'),
(106, 17, NULL, NULL, '2023-03-03', NULL, 0, '2', 'Gabisa tidur abis di kirim pap sama dia :)', '2023-07-05 21:55:29'),
(107, 1, NULL, NULL, '2023-06-19', NULL, 0, '1', 'xxx', '2023-07-05 21:55:29'),
(108, 1, '09:55:00', '21:56:00', '2023-06-20', 'xxxxx', 1, NULL, NULL, '2023-07-06 22:56:46'),
(109, 1, '18:08:00', '16:08:00', '2023-07-04', 'djchfudsjhdsj', 1, NULL, NULL, '2023-07-08 17:36:44'),
(110, 1, '18:08:00', '16:08:00', '2023-07-04', 'djchfudsjhdsj', 1, NULL, NULL, '2023-07-08 17:36:46'),
(111, 1, '05:39:00', '05:40:00', '2023-07-05', 'bhnjas dhjbhjasbd', 1, NULL, NULL, '2023-07-08 17:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_mingguan`
--

CREATE TABLE `laporan_mingguan` (
  `id` int(11) NOT NULL,
  `id_program_mahasiswa` int(11) NOT NULL,
  `weekStart` date NOT NULL,
  `weekEnd` date NOT NULL,
  `laporan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_mingguan`
--

INSERT INTO `laporan_mingguan` (`id`, `id_program_mahasiswa`, `weekStart`, `weekEnd`, `laporan`) VALUES
(1, 1, '2023-06-26', '2023-06-30', 'tes'),
(2, 15, '2023-06-26', '2023-06-30', 'asdasd'),
(3, 15, '2023-06-19', '2023-06-23', 'asdsad'),
(4, 15, '2023-06-12', '2023-06-16', 'asdasd'),
(5, 15, '2023-06-05', '2023-06-09', 'asdsad'),
(6, 16, '2023-06-05', '2023-06-09', 'as'),
(7, 16, '2023-06-12', '2023-06-16', 'asdasd'),
(8, 16, '2023-06-19', '2023-06-23', 'sad'),
(9, 16, '2023-06-26', '2023-06-30', 'asdasd'),
(10, 17, '2023-01-02', '2023-01-06', 'tes'),
(11, 17, '2023-01-09', '2023-01-13', 'yeyeyeye'),
(12, 17, '2023-01-16', '2023-01-20', 'wowowowowow'),
(13, 17, '2023-01-23', '2023-01-27', 'yayayaya'),
(14, 17, '2023-01-30', '2023-02-03', 'hehehehe'),
(15, 17, '2023-02-06', '2023-02-10', 'huhuhuhu'),
(16, 17, '2023-02-13', '2023-02-17', 'asikk'),
(17, 17, '2023-02-20', '2023-02-24', 'yeahh'),
(18, 17, '2023-02-27', '2023-03-03', 'haaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `mentoring`
--

CREATE TABLE `mentoring` (
  `mentoring_id` int(11) NOT NULL,
  `id_program` int(11) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentoring`
--

INSERT INTO `mentoring` (`mentoring_id`, `id_program`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(1, 10, '2023-07-08', NULL, NULL),
(2, 11, '2023-07-08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mentoring_komentar`
--

CREATE TABLE `mentoring_komentar` (
  `komentar_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentoring_komentar`
--

INSERT INTO `mentoring_komentar` (`komentar_id`, `materi_id`, `user_id`, `tanggal`, `komentar`) VALUES
(12, 9, 33, '2023-07-08 19:06:47', 'asdasd'),
(13, 9, 29, '2023-07-08 19:08:06', 'nkasjdnkjsa');

-- --------------------------------------------------------

--
-- Table structure for table `mentoring_materi`
--

CREATE TABLE `mentoring_materi` (
  `materi_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `mentoring_id` int(11) DEFAULT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentoring_materi`
--

INSERT INTO `mentoring_materi` (`materi_id`, `mentor_id`, `deskripsi`, `tanggal`, `mentoring_id`, `file`) VALUES
(9, 33, 'hasdhjbhjasd', '2023-07-08 19:06:45', 2, 'dummy_-_Copy.jpg');

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
(123, 11, 2, 133, 'fas fa-calendar-alt', 'Internship', 'kelola_internship', 'kelola_internship', 1),
(124, 7, 2, 133, 'fas fa-book', 'Laporan', 'LaporanAkhir', 'kelola_laporan', 1),
(125, 8, 2, 133, 'fas fa-pencil-alt', 'Penilaian', 'Penilaian', 'kelola_penilaian', 1),
(127, 2, 1, 0, 'fas fa-user-friends', 'Mentoring', 'mentoring', 'mentoring', 1),
(130, 1, 1, 0, 'fas fa-user-check', 'Internship Role', 'internship_role', 'internship_role', 1),
(131, 3, 1, 0, 'fas fa-box-open', 'Internship Saya', 'internship_saya', 'internship_saya', 1),
(133, 4, 1, 0, 'fas fa-cog', 'Kelola', '#', '#', 1),
(134, 14, 1, 0, 'fas fa-cog', 'Setting Aplikasi', 'Setting', 'Setting', 1),
(135, 6, 2, 133, 'fas fa-database', 'Internship Roles', 'internship_role', 'internship_role', 1),
(136, 5, 2, 133, 'far fa-calendar-alt', 'Internship Program', 'internship_program', 'internship_program', 1),
(137, 1, 2, 0, 'fas fa-pencil-alt', 'Penilaian', 'Penilaian', 'Penilaian', 1),
(138, 1, 2, 0, 'fas fa-save', 'List Laporan Akhir', 'LaporanAkhir', 'LaporanAkhir', 1);

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
(1, '$2y$08$PNwyjmAyqJbdbt9mn.150uZQCqlK5ytySGzxE/5A8/XVkbs9gvf2y', 'admin@admin.com', 1, 'Admin', 'Admin', '123213213', 'dummy_-_Copy.jpg', NULL, NULL, NULL),
(20, '$2y$08$TLGUmu.Cj7y6xAhWm9qHhOgyGzT07GpkdYl6XsSPsjXJBLII74EZm', 'fajar@gmail.com', 1, 'fajarr', 'mantrii', '', 'default.jpg', NULL, NULL, NULL),
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
(64, 20, 13),
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
-- Indexes for table `internship_program_mahasiswa_detail`
--
ALTER TABLE `internship_program_mahasiswa_detail`
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
-- Indexes for table `laporan_akhir`
--
ALTER TABLE `laporan_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentoring`
--
ALTER TABLE `mentoring`
  ADD PRIMARY KEY (`mentoring_id`);

--
-- Indexes for table `mentoring_komentar`
--
ALTER TABLE `mentoring_komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `mentoring_materi`
--
ALTER TABLE `mentoring_materi`
  ADD PRIMARY KEY (`materi_id`);

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
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `internship_program_mahasiswa`
--
ALTER TABLE `internship_program_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `internship_program_mahasiswa_detail`
--
ALTER TABLE `internship_program_mahasiswa_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `internship_program_mentor`
--
ALTER TABLE `internship_program_mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internship_program_role`
--
ALTER TABLE `internship_program_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `internship_role`
--
ALTER TABLE `internship_role`
  MODIFY `id_internship_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laporan_akhir`
--
ALTER TABLE `laporan_akhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `laporan_mingguan`
--
ALTER TABLE `laporan_mingguan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mentoring`
--
ALTER TABLE `mentoring`
  MODIFY `mentoring_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mentoring_komentar`
--
ALTER TABLE `mentoring_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mentoring_materi`
--
ALTER TABLE `mentoring_materi`
  MODIFY `materi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
