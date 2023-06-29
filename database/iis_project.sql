-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 02:00 PM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_data` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_data`, `id`, `name`, `nick`, `email`, `value`) VALUES
(1148, '63039d41b0ccf3208503b006', 'Politeknik Pos Indonesia', 'PPI', NULL, NULL),
(1149, '63039d47b0ccf3208503b022', 'PT ABC', 'ABC', NULL, NULL),
(1150, '6304e31bc41f1808edfd065d', 'PT Alim Rugi', 'ARG', NULL, NULL),
(1151, '63039d74b0ccf3208503b0fa', 'PT GITS INDONESIA', 'GTS', NULL, NULL),
(1152, '63039d792b9d006b0578dd0a', 'PT Indonesia Sejahtera', 'PIS', 'muhammad.akbar@digits.id', 200000000),
(1153, '6304ca3fe57d4632b9207200', 'Sportama', 'SPT', NULL, NULL),
(1154, '63043588b0ccf32085060edd', 'TEST', 'BSM', NULL, NULL),
(1155, '63039d7f2b9d006b0578dd16', 'ULBI Indonesia', 'ULB', NULL, NULL),
(1156, '63039d822b9d006b0578dd3b', 'Ultrajaya', 'UTJ', 'muhammad.akbar@digits.id', 500000000),
(1157, '63039d86fa6cc063faa7144b', 'Welkomsel', 'WKM', 'muhammad.akbar@digits.id', 1250000000),
(1158, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_data` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_data`, `id`, `email`, `name`, `picture`, `status`, `amount`) VALUES
(175, '622d9d9bfb76603c6a52676e', '2193013@std.poltekpos.ac.id', 'Akbar PHP', 'https://img.clockify.me/2022-03-13T14%3A27%3A43.166ZIMG_20210902_135659_307.jpg', 'ACTIVE', 20000),
(176, '63039b192b9d006b0578cd48', 'factasiafootball@gmail.com', 'Factasia Football', 'https://img.clockify.me/no-user-image.png', 'ACTIVE', 1),
(177, '622d9b00fb76603c6a52636c', 'muhammad.akbar5999@gmail.com', 'Akbar CSS', 'https://img.clockify.me/no-user-image.png', 'ACTIVE', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `general_expenses`
--

CREATE TABLE `general_expenses` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_expenses`
--

INSERT INTO `general_expenses` (`id`, `description`, `date`, `amount`) VALUES
(539176551, 'Beban Operasional Kantor', '2021-01-25', 9900000),
(539176552, 'Beban Gaji - Gaji Pokok', '2021-01-25', 1500000),
(539176553, 'Beban Listrik', '2021-01-25', 200000),
(539176554, 'Beban Telepon & Internet', '2021-01-25', 100000),
(539176555, 'Beban Gaji - Gaji Pokok', '2021-02-25', 570000),
(539176556, 'Beban Listrik', '2021-02-25', 1213000),
(539176557, 'Beban Telepon & Internet', '2021-02-25', 120000),
(539176558, 'Beban Operasional Kantor', '2021-02-25', 9400000),
(539176559, 'Beban Gaji - Gaji Pokok', '2021-03-25', 900000),
(539176560, 'Beban Listrik', '2021-03-25', 9300000),
(539176561, 'Beban Telepon & Internet', '2021-03-25', 300000),
(539176562, 'Beban Gaji - Gaji Pokok', '2021-04-25', 800000),
(539176563, 'Beban Listrik', '2021-04-25', 300000),
(539176564, 'Beban Telepon & Internet', '2021-04-25', 9290000),
(539176565, 'Beban Gaji - Gaji Pokok', '2021-05-25', 780000),
(539176566, 'THR & Bonus', '2021-05-25', 600000),
(539176567, 'Beban Listrik', '2021-05-25', 200000),
(539176568, 'Beban Telepon & Internet', '2021-05-25', 9100000),
(539176569, 'Beban Operasional Kantor', '2021-05-25', 400000),
(539176570, 'Beban Gaji - Gaji Pokok', '2021-06-25', 590000),
(539176571, 'Beban Listrik', '2021-06-25', 9120000),
(539176572, 'Beban Telepon & Internet', '2021-06-25', 200000),
(539176573, 'Beban Gaji - Gaji Pokok', '2021-07-25', 9490000),
(539176574, 'Beban Listrik', '2021-07-25', 200000),
(539176575, 'Beban Telepon & Internet', '2021-07-25', 300000),
(539176576, 'Beban Gaji - Gaji Pokok', '2021-08-25', 490000),
(539176577, 'Beban Listrik', '2021-08-25', 9200000),
(539176578, 'Beban Telepon & Internet', '2021-08-25', 300000),
(539176579, 'Beban Operasional Kantor', '2022-01-25', 9900000),
(539176580, 'Beban Gaji - Gaji Pokok', '2022-01-25', 1500000),
(539176581, 'Beban Listrik', '2022-01-25', 200000),
(539176582, 'Beban Telepon & Internet', '2022-01-25', 100000),
(539176583, 'Beban Gaji - Gaji Pokok', '2022-02-25', 570000),
(539176584, 'Beban Listrik', '2022-02-25', 1213000),
(539176585, 'Beban Telepon & Internet', '2022-02-25', 120000),
(539176586, 'Beban Operasional Kantor', '2022-02-25', 9400000),
(539176587, 'Beban Gaji - Gaji Pokok', '2022-03-25', 900000),
(539176588, 'Beban Listrik', '2022-03-25', 9300000),
(539176589, 'Beban Telepon & Internet', '2022-03-25', 300000),
(539176590, 'Beban Gaji - Gaji Pokok', '2022-04-25', 800000),
(539176591, 'Beban Listrik', '2022-04-25', 300000),
(539176592, 'Beban Telepon & Internet', '2022-04-25', 9290000),
(539176593, 'Beban Gaji - Gaji Pokok', '2022-05-25', 780000),
(539176594, 'THR & Bonus', '2022-05-25', 600000),
(539176595, 'Beban Listrik', '2022-05-25', 200000),
(539176596, 'Beban Telepon & Internet', '2022-05-25', 9100000),
(539176597, 'Beban Operasional Kantor', '2022-05-25', 400000),
(539176598, 'Beban Gaji - Gaji Pokok', '2022-06-25', 590000),
(539176599, 'Beban Listrik', '2022-06-25', 9120000),
(539176600, 'Beban Telepon & Internet', '2022-06-25', 200000),
(539176601, 'Beban Gaji - Gaji Pokok', '2022-07-25', 9490000),
(539176602, 'Beban Listrik', '2022-07-25', 200000),
(539176603, 'Beban Telepon & Internet', '2022-07-25', 300000),
(539176604, 'Beban Gaji - Gaji Pokok', '2022-08-25', 490000),
(539176605, 'Beban Listrik', '2022-08-25', 9200000),
(539176606, 'Beban Telepon & Internet', '2022-08-25', 300000);

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
(13, 130),
(13, 131);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_amount` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `project_code` varchar(10) NOT NULL,
  `invoice_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `invoice_date`, `invoice_amount`, `client_name`, `project_code`, `invoice_file`) VALUES
('539178293', 'GITS/001/INV/IV/2022', '2022-04-22', 300000000, 'PT ABC', 'ABC2203', NULL),
('539178294', 'GITS/002/INV/VI/2022', '2022-06-16', 300000000, 'PT ABC', 'ABC2203', NULL),
('539178295', 'GITS/001/INV/III/2022', '2022-03-16', 30000000, 'PT GITS INDONESIA', 'GTS2202', NULL),
('539178296', 'GITS/004/INV/V/2022', '2022-05-20', 30000000, 'PT GITS INDONESIA', 'GTS2202', NULL),
('539178297', 'GITS/004/INV/VIII/2022', '2022-08-25', 30000000, 'PT GITS INDONESIA', 'GTS2202', NULL),
('539178298', 'GITS/001/INV/I/2022', '2022-01-04', 50000000, 'PT Indonesia Sejahtera', 'PIS2201', NULL),
('539178299', 'GITS/002/INV/II/2022', '2022-02-10', 50000000, 'PT Indonesia Sejahtera', 'PIS2201', NULL),
('539178300', 'GITS/001/INV/V/2022', '2022-05-10', 100000000, 'PT Indonesia Sejahtera', 'PIS2201', NULL),
('539178301', 'GITS/006/INV/V/2022', '2022-05-31', 15000000, 'Politeknik Pos Indonesia', 'PPI2205', NULL),
('539178302', 'GITS/001/INV/VI/2022', '2022-06-16', 5000000, 'Politeknik Pos Indonesia', 'PPI2205', NULL),
('539178303', 'GITS/003/INV/VII/2022', '2022-07-22', 5000000, 'Politeknik Pos Indonesia', 'PPI2205', NULL),
('539178304', 'GITS/001/INV/VIII/2022', '2022-08-16', 15000000, 'Politeknik Pos Indonesia', 'PPI2205', NULL),
('539178305', 'GITS/002/INV/IV/2022', '2022-04-22', 10000000, 'ULBI Indonesia', 'ULB2204', NULL),
('539178306', 'GITS/004/INV/VI/2022', '2022-06-24', 40000000, 'ULBI Indonesia', 'ULB2204', NULL),
('539178307', 'GITS/002/INV/VIII/2022', '2022-08-16', 50000000, 'ULBI Indonesia', 'ULB2204', NULL),
('539178308', 'GITS/003/INV/II/2022', '2022-02-24', 100000000, 'Ultrajaya', 'UTJ2202', NULL),
('539178309', 'GITS/002/INV/III/2022', '2022-03-24', 100000000, 'Ultrajaya', 'UTJ2202', NULL),
('539178310', 'GITS/003/INV/IV/2022', '2022-04-27', 100000000, 'Ultrajaya', 'UTJ2202', NULL),
('539178311', 'GITS/005/INV/V/2022', '2022-05-25', 100000000, 'Ultrajaya', 'UTJ2202', NULL),
('539178312', 'GITS/004/INV/VII/2022', '2022-07-29', 100000000, 'Ultrajaya', 'UTJ2202', NULL),
('539178313', 'GITS/001/INV/IX/2021', '2021-09-15', 100000000, 'Welkomsel', 'WKM2108', NULL),
('539178314', 'GITS/001/INV/X/2021', '2021-10-07', 300000000, 'Welkomsel', 'WKM2108', NULL),
('539178315', 'GITS/001/INV/XII/2021', '2021-12-10', 100000000, 'Welkomsel', 'WKM2108', NULL),
('539178316', 'GITS/002/INV/I/2022', '2022-01-12', 100000000, 'Welkomsel', 'WKM2108', NULL),
('539178317', 'GITS/001/INV/II/2022', '2022-02-10', 100000000, 'Welkomsel', 'WKM2108', NULL),
('539178318', 'GITS/002/INV/V/2022', '2022-05-18', 100000000, 'Welkomsel', 'WKM2108', NULL),
('539178319', 'GITS/005/INV/VI/2022', '2022-06-27', 200000000, 'Welkomsel', 'WKM2108', NULL),
('539178320', 'GITS/003/INV/V/2022', '2022-05-19', 15000000, 'Welkomsel', 'WKM2205', NULL),
('539178321', 'GITS/007/INV/VI/2022', '2022-06-29', 15000000, 'Welkomsel', 'WKM2205', NULL),
('539178322', 'GITS/002/INV/VII/2022', '2022-07-21', 20000000, 'Welkomsel', 'WKM2205', NULL),
('539178323', 'GITS/003/INV/VI/2022', '2022-06-22', 50000000, 'Welkomsel', 'WKM2206', NULL),
('539178324', 'GITS/006/INV/VI/2022', '2022-06-28', 50000000, 'Welkomsel', 'WKM2206', NULL),
('539178325', 'GITS/001/INV/VII/2022', '2022-07-21', 50000000, 'Welkomsel', 'WKM2206', NULL),
('539178326', 'GITS/003/INV/VIII/2022', '2022-08-25', 50000000, 'Welkomsel', 'WKM2206', NULL),
('540009244', 'GITS/010/INV/VIII/2022', '2022-08-23', 100000000, 'Sportama', 'SPT2208', 'https://jurnal-quickbook-s3.s3.amazonaws.com/uploads/transaction_attachment/file/11853374/Dummy_PDF.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `logtime`
--

CREATE TABLE `logtime` (
  `id_data` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `timeinterval_start` datetime NOT NULL,
  `timeinterval_end` datetime NOT NULL,
  `timeinterval_duration` time NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logtime`
--

INSERT INTO `logtime` (`id_data`, `id`, `description`, `user_id`, `project_id`, `timeinterval_start`, `timeinterval_end`, `timeinterval_duration`, `rate`, `amount`) VALUES
(2839, '63059c32e57d4632b924bb2f', 'Modul login', '622d9d9bfb76603c6a52676e', '6304cd56c41f1808edfc2da6', '2022-08-23 17:00:00', '2022-08-24 16:00:00', '23:00:00', 20000, 460000),
(2840, '6304e916c41f1808edfd33e1', '123', '622d9d9bfb76603c6a52676e', NULL, '2022-08-23 14:49:00', '2022-08-23 15:00:00', '00:00:00', 20000, 0),
(2841, '6303a31db0ccf3208503d2f9', 'Modul Logout', '622d9d9bfb76603c6a52676e', '63039e1f2b9d006b0578e0d6', '2022-07-13 11:32:00', '2022-07-13 11:59:00', '00:00:00', 20000, 0),
(2842, '6303a387fa6cc063faa73833', 'Modul Logtime 2', '622d9d9bfb76603c6a52676e', '63039df3fa6cc063faa716b9', '2022-05-06 00:00:00', '2022-05-06 09:30:00', '09:30:00', 20000, 190000),
(2843, '6303a4a52b9d006b057904d2', 'coba', '622d9d9bfb76603c6a52676e', '63039e492b9d006b0578e1ea', '2021-11-10 17:00:00', '2021-11-11 14:43:00', '21:43:00', 20000, 434333),
(2844, '6303a5832b9d006b05790955', 'Modul z', '622d9b00fb76603c6a52636c', '63039e1f2b9d006b0578e0d6', '2022-09-12 17:00:00', '2022-09-13 16:59:00', '23:59:00', 10000, 239833),
(2845, '6304cdc8e57d4632b9209642', 'UX', '622d9b00fb76603c6a52636c', '6304cd56c41f1808edfc2da6', '2022-08-22 19:00:00', '2022-08-23 12:52:00', '17:52:00', 10000, 178667),
(2846, '6304e36fc41f1808edfd0964', 'Modul Login', '622d9b00fb76603c6a52636c', '6304e336c41f1808edfd0762', '2022-08-22 17:00:00', '2022-08-23 16:00:00', '23:00:00', 10000, 230000),
(2847, '6304e4b2b3bc7f1f29de1fc2', '', '622d9b00fb76603c6a52636c', NULL, '2022-08-22 17:00:00', '2022-08-23 16:00:00', '23:00:00', 10000, 230000),
(2848, '6304188b2b9d006b057a73f5', 'modul c', '622d9b00fb76603c6a52636c', '63039e5d2b9d006b0578e258', '2022-08-12 15:00:00', '2022-08-13 14:00:00', '23:00:00', 10000, 230000),
(2849, '630418a9fa6cc063faa8b6e6', 'Modul XX', '622d9b00fb76603c6a52636c', '63039df3fa6cc063faa716b9', '2022-08-12 10:00:00', '2022-08-12 12:00:00', '02:00:00', 10000, 20000),
(2850, '63041acffa6cc063faa8c217', 'meeting juli 2', '622d9b00fb76603c6a52636c', NULL, '2022-07-28 17:00:00', '2022-07-29 11:00:00', '18:00:00', 10000, 180000),
(2851, '63041af42b9d006b057a80ed', 'modul logout', '622d9b00fb76603c6a52636c', '63039e3ffa6cc063faa718ad', '2022-07-22 02:30:00', '2022-07-22 17:00:00', '14:30:00', 10000, 145000),
(2852, '63041b5eb0ccf32085055cab', 'modul b', '622d9b00fb76603c6a52636c', '63039e5d2b9d006b0578e258', '2022-07-15 16:00:00', '2022-07-16 15:00:00', '23:00:00', 10000, 230000),
(2853, '63041b882b9d006b057a837f', 'Modul C', '622d9b00fb76603c6a52636c', '63039e1f2b9d006b0578e0d6', '2022-07-14 17:00:00', '2022-07-15 13:44:00', '20:44:00', 10000, 207333),
(2854, '63041b9f2b9d006b057a83f8', 'x', '622d9b00fb76603c6a52636c', '63039df3fa6cc063faa716b9', '2022-07-14 17:00:00', '2022-07-15 10:00:00', '17:00:00', 10000, 170000),
(2855, '63041bbdb0ccf32085055e49', 'Meeting Juli 1', '622d9b00fb76603c6a52636c', NULL, '2022-07-07 02:48:00', '2022-07-07 22:48:00', '20:00:00', 10000, 200000),
(2856, '63041c03fa6cc063faa8c751', 'Tes Without Project', '622d9b00fb76603c6a52636c', NULL, '2022-06-29 17:00:00', '2022-06-30 00:57:00', '07:57:00', 10000, 79500),
(2857, '63041c18b0ccf32085055ffd', 'UI UX', '622d9b00fb76603c6a52636c', '63039dd42b9d006b0578df23', '2022-06-26 17:00:00', '2022-06-27 15:00:00', '22:00:00', 10000, 220000),
(2858, '63041c41fa6cc063faa8c896', 'Meeting juni 2', '622d9b00fb76603c6a52636c', NULL, '2022-06-25 02:47:00', '2022-06-26 01:47:00', '23:00:00', 10000, 230000),
(2859, '63041c552b9d006b057a874c', 'modul a', '622d9b00fb76603c6a52636c', NULL, '2022-06-17 05:00:00', '2022-06-17 17:00:00', '12:00:00', 10000, 120000),
(2860, '63041c6cb0ccf3208505616c', 'Modul A', '622d9b00fb76603c6a52636c', '63039e5d2b9d006b0578e258', '2022-06-16 17:00:00', '2022-06-17 16:00:00', '23:00:00', 10000, 230000),
(2861, '63041d17fa6cc063faa8ccec', 'XX', '622d9b00fb76603c6a52636c', '63039e532b9d006b0578e223', '2022-06-16 16:00:00', '2022-06-17 15:00:00', '23:00:00', 10000, 230000),
(2862, '63041d36b0ccf32085056583', 'sadasds', '622d9b00fb76603c6a52636c', '63039da42b9d006b0578ddff', '2022-06-16 13:00:00', '2022-06-17 12:00:00', '23:00:00', 10000, 230000),
(2863, '63041d5ffa6cc063faa8ce51', 'modul c', '622d9b00fb76603c6a52636c', NULL, '2022-06-09 17:00:00', '2022-06-10 02:30:00', '09:30:00', 10000, 95000),
(2864, '63041d7a2b9d006b057a8cbd', 'Meeting Juni 1', '622d9b00fb76603c6a52636c', NULL, '2022-06-02 02:46:00', '2022-06-02 22:46:00', '20:00:00', 10000, 200000),
(2865, '63041da2b0ccf320850567d2', 'Modul B', '622d9b00fb76603c6a52636c', '63039e1f2b9d006b0578e0d6', '2022-06-01 17:00:00', '2022-06-02 09:43:00', '16:43:00', 10000, 167167),
(2866, '63041deb2b9d006b057a8f2f', 'sss', '622d9b00fb76603c6a52636c', '63039da42b9d006b0578ddff', '2022-05-20 14:00:00', '2022-05-21 13:00:00', '23:00:00', 10000, 230000),
(2867, '63041e03b0ccf320850569ce', 'Meeting May 2', '622d9b00fb76603c6a52636c', NULL, '2022-05-20 02:46:00', '2022-05-20 22:46:00', '20:00:00', 10000, 200000),
(2868, '63041e68fa6cc063faa8d3d5', 'Modul User', '622d9b00fb76603c6a52636c', '63039e1f2b9d006b0578e0d6', '2022-05-17 17:00:00', '2022-05-18 16:59:00', '23:59:00', 10000, 239833),
(2869, '63041e7e2b9d006b057a9239', 'x', '622d9b00fb76603c6a52636c', '63039df3fa6cc063faa716b9', '2022-05-14 12:00:00', '2022-05-15 11:00:00', '23:00:00', 10000, 230000),
(2870, '63041e9e2b9d006b057a92f5', 'modul b', '622d9b00fb76603c6a52636c', '63039e3ffa6cc063faa718ad', '2022-05-13 05:00:00', '2022-05-13 16:00:00', '11:00:00', 10000, 110000),
(2871, '63041ebab0ccf32085056d99', 'modul user', '622d9b00fb76603c6a52636c', '63039e492b9d006b0578e1ea', '2022-05-12 17:00:00', '2022-05-13 05:00:00', '12:00:00', 10000, 120000),
(2872, '63041ed7b0ccf32085056e57', 'Modul login', '622d9b00fb76603c6a52636c', '63039e34b0ccf3208503b535', '2022-05-11 17:00:00', '2022-05-12 16:59:00', '23:59:00', 10000, 239833),
(2873, '63041eedfa6cc063faa8d6c9', 'vsvs', '622d9b00fb76603c6a52636c', '63039e532b9d006b0578e223', '2022-05-11 17:00:00', '2022-05-12 16:00:00', '23:00:00', 10000, 230000),
(2874, '63041f09b0ccf32085056f64', 'Meeting May', '622d9b00fb76603c6a52636c', NULL, '2022-05-06 02:46:00', '2022-05-06 20:46:00', '18:00:00', 10000, 180000),
(2875, '63041f83b0ccf320850572af', 'Modul Login', '622d9b00fb76603c6a52636c', '63039e1f2b9d006b0578e0d6', '2022-05-04 17:00:00', '2022-05-05 16:59:00', '23:59:00', 10000, 239833),
(2876, '63041f992b9d006b057a98c6', 'Modul Logout', '622d9b00fb76603c6a52636c', '63039e34b0ccf3208503b535', '2022-04-27 17:00:00', '2022-04-28 16:59:00', '23:59:00', 10000, 239833),
(2877, '63041fb0b0ccf320850573e2', 'Meeting APril 2', '622d9b00fb76603c6a52636c', NULL, '2022-04-23 02:45:00', '2022-04-23 22:45:00', '20:00:00', 10000, 200000),
(2878, '63041fc7b0ccf32085057487', 'Modul A', '622d9b00fb76603c6a52636c', '63039e34b0ccf3208503b535', '2022-04-21 17:00:00', '2022-04-22 16:59:00', '23:59:00', 10000, 239833),
(2879, '63041fe0fa6cc063faa8dcbf', 'xx', '622d9b00fb76603c6a52636c', '63039da42b9d006b0578ddff', '2022-04-15 15:00:00', '2022-04-16 14:00:00', '23:00:00', 10000, 230000),
(2880, '63041ffcb0ccf320850575f1', 'modul login x', '622d9b00fb76603c6a52636c', '63039df3fa6cc063faa716b9', '2022-04-15 05:00:00', '2022-04-15 17:00:00', '12:00:00', 10000, 120000),
(2881, '630420212b9d006b057a9c1c', 'xx', '622d9b00fb76603c6a52636c', '63039e532b9d006b0578e223', '2022-04-15 05:00:00', '2022-04-15 17:00:00', '12:00:00', 10000, 120000),
(2882, '6304204ab0ccf320850577e7', 'modul b', '622d9b00fb76603c6a52636c', NULL, '2022-04-14 18:00:00', '2022-04-15 05:00:00', '11:00:00', 10000, 110000),
(2883, '63042060fa6cc063faa8dfd9', 'xx', '622d9b00fb76603c6a52636c', '63039e492b9d006b0578e1ea', '2022-04-14 17:00:00', '2022-04-15 05:00:00', '12:00:00', 10000, 120000),
(2884, '6304207efa6cc063faa8e0a8', 'ff', '622d9b00fb76603c6a52636c', '63039e492b9d006b0578e1ea', '2022-04-14 05:00:00', '2022-04-14 17:00:00', '12:00:00', 10000, 120000),
(2885, '630421442b9d006b057aa269', 'Meeting April', '622d9b00fb76603c6a52636c', NULL, '2022-04-13 17:00:00', '2022-04-14 16:30:00', '23:30:00', 10000, 235000),
(2886, '6304215b2b9d006b057aa2f3', 'modul k', '622d9b00fb76603c6a52636c', '63039e12b0ccf3208503b473', '2022-04-06 17:00:00', '2022-04-07 09:00:00', '16:00:00', 10000, 160000),
(2887, '6304216fb0ccf32085057e7e', 'Meeting', '622d9b00fb76603c6a52636c', NULL, '2022-03-30 17:00:00', '2022-03-31 12:00:00', '19:00:00', 10000, 190000),
(2888, '630421832b9d006b057aa3e7', 'xxx', '622d9b00fb76603c6a52636c', '63039e492b9d006b0578e1ea', '2022-03-18 17:00:00', '2022-03-19 11:00:00', '18:00:00', 10000, 180000),
(2889, '6304219ab0ccf32085057f98', 'ss', '622d9b00fb76603c6a52636c', '63039e492b9d006b0578e1ea', '2022-03-18 17:00:00', '2022-03-19 05:00:00', '12:00:00', 10000, 120000),
(2890, '630421ac2b9d006b057aa4fa', 'modul a', '622d9b00fb76603c6a52636c', NULL, '2022-03-17 17:00:00', '2022-03-17 23:00:00', '06:00:00', 10000, 60000),
(2891, '630421c72b9d006b057aa586', 'modul c', '622d9b00fb76603c6a52636c', '63039e12b0ccf3208503b473', '2022-03-15 17:00:00', '2022-03-16 13:00:00', '20:00:00', 10000, 200000),
(2892, '630422b9b0ccf32085058606', 'Modul Login', '622d9b00fb76603c6a52636c', '63039df3fa6cc063faa716b9', '2022-03-11 14:00:00', '2022-03-12 13:00:00', '23:00:00', 10000, 230000),
(2893, '6304225b2b9d006b057aa864', 'Meeting', '622d9b00fb76603c6a52636c', NULL, '2022-03-09 17:00:00', '2022-03-10 14:00:00', '21:00:00', 10000, 210000);

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
(4, 20, 2, 121, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 17, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 15, 1, 0, 'empty', 'DEV', '#', '#', 1),
(43, 13, 2, 92, 'fas fa-user-friends', 'User', 'users', '1', 1),
(44, 14, 2, 92, 'fas fa-angle-double-right', 'Roles', 'groups', '2', 1),
(89, 21, 2, 121, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 12, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 16, 2, 40, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(109, 19, 2, 121, 'fas fa-align-justify', 'Frontend Menu', 'frontend_menu', 'Frontend Menu', 1),
(121, 18, 1, 0, 'fab fa-apper', 'Hidden Menu', '#', '#', 1),
(122, 10, 1, 0, 'fas fa-users', 'Kelola Mentoring', 'kelola_mentoring', 'kelola_mentoring', 1),
(123, 11, 1, 0, 'fas fa-calendar-alt', 'Kelola Internship', 'kelola_internship', 'kelola_internship', 1),
(124, 4, 1, 0, 'fas fa-book', 'kelola Laporan', 'kelola_laporan', 'kelola_laporan', 1),
(125, 6, 1, 0, 'fas fa-pencil-alt', 'Kelola Penilaian', 'kelola_penilaian', 'kelola_penilaian', 1),
(126, 7, 1, 0, 'far fa-sticky-note', 'Kelola Sertifikat', 'kelola_sertifikat', 'kelola_sertifikat', 1),
(127, 2, 1, 0, 'fas fa-user-friends', 'Mentoring', 'mentoring', 'mentoring', 1),
(130, 1, 1, 0, 'fas fa-user-check', 'Internship Role', 'internship_role', 'internship_role', 1),
(131, 3, 1, 0, 'fas fa-box-open', 'Internship Saya', 'internship_saya', 'internship_saya', 1);

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
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `id_data` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `milestone_name` varchar(255) NOT NULL,
  `milestone_value` int(11) NOT NULL,
  `milestone_status` varchar(255) NOT NULL,
  `project_year` year(4) NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `contract_date` varchar(255) DEFAULT NULL,
  `adjustment_date` date DEFAULT NULL,
  `actual_date` date DEFAULT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`id_data`, `id`, `project_code`, `milestone_name`, `milestone_value`, `milestone_status`, `project_year`, `project_status`, `contract_date`, `adjustment_date`, `actual_date`, `created_time`) VALUES
(1782, 'recvxCoaXH4mWMsC5', 'PIS2201', '1. Milestone 1 Pembayaran Pertama', 50000000, 'Paid', 2022, 'Active', '2022-01-03', '2022-01-03', NULL, '2022-06-27 13:57:30'),
(1783, 'recXofITuwIcdLwJa', 'PIS2201', '2. Termin 2', 50000000, 'Paid', 2022, 'Active', '2022-02-09', '2022-02-09', NULL, '2022-06-27 14:41:56'),
(1784, 'recZqc3wzwzfCWEaT', 'PIS2201', '3. Last Payment', 100000000, 'Invoiced', 2022, 'Active', '2022-05-10', '2022-05-10', NULL, '2022-06-27 14:54:20'),
(1785, 'rec0dj8Ym6JO0sjXI', 'WKM2108', '1. Down Payment', 100000000, 'Paid', 2021, 'Active', '2021-09-05', '2021-09-07', NULL, '2022-06-28 01:20:15'),
(1786, 'recDR0IyeNdIuLrMx', 'WKM2108', '2. Milestone 2', 300000000, 'Paid', 2021, 'Active', '2021-10-01', '2021-10-01', NULL, '2022-06-28 01:25:34'),
(1787, 'recVgSciqsGLWJEgw', 'WKM2108', '3. Milestone 3', 100000000, 'Paid', 2021, 'Active', '2021-12-10', '2021-12-10', NULL, '2022-06-28 01:27:32'),
(1788, 'recRtHP1pAJdh1BWy', 'WKM2108', '4. Milestone 4', 100000000, 'Paid', 2021, 'Active', '2022-01-02', '2022-01-02', NULL, '2022-06-28 01:32:54'),
(1789, 'rec3h7kQRtZiOiBsF', 'WKM2108', '5. Milestone 5', 100000000, 'Paid', 2021, 'Active', '2022-02-01', '2022-02-01', NULL, '2022-06-28 01:48:12'),
(1790, 'recwc8cUKkbEAZp6I', 'WKM2108', '6. Milestone 6', 100000000, 'Paid', 2021, 'Active', '2022-05-04', '2022-05-04', NULL, '2022-06-28 01:49:47'),
(1791, 'reczoYl51NUrd6NVv', 'WKM2108', '7. Last Milestone', 200000000, 'Paid', 2021, 'Active', '2022-06-15', '2022-06-24', NULL, '2022-06-28 01:50:52'),
(1792, 'recw1S49YNIM5dglX', 'WKM2205', '1. Down payment', 15000000, 'Paid', 2022, 'Active', '2022-05-12', '2022-05-12', NULL, '2022-06-28 06:47:59'),
(1793, 'recBk2wG4FRFNNM7l', 'WKM2205', '2. Milestone 2', 15000000, 'Paid', 2022, 'Active', '2022-06-01', '2022-06-01', NULL, '2022-06-28 06:48:33'),
(1794, 'recau4SCoQgXbAo9B', 'WKM2205', '3. Milestone 3', 20000000, 'Paid', 2022, 'Active', '2022-07-13', '2022-07-13', NULL, '2022-06-28 06:48:52'),
(1795, 'reciqIobfhCNrVRv6', 'UTJ2202', '1. Down Payment', 100000000, 'Paid', 2022, 'Active', '2022-02-02', '2022-02-02', NULL, '2022-06-28 06:53:08'),
(1796, 'recJjQ9TQLC1svM28', 'UTJ2202', '2. Sprint 3', 100000000, 'Paid', 2022, 'Active', '2022-03-02', '2022-03-02', NULL, '2022-06-28 06:53:44'),
(1797, 'recFqb7PlfrBv9MPo', 'UTJ2202', '3. Milestone 3', 100000000, 'Paid', 2022, 'Active', '2022-04-06', '2022-04-06', NULL, '2022-06-28 06:54:52'),
(1798, 'recVybKmlDQu3CP0d', 'UTJ2202', '4. Milestone 4', 100000000, 'Paid', 2022, 'Active', '2022-05-12', '2022-05-12', NULL, '2022-06-28 06:54:54'),
(1799, 'recvsdudv460VAE60', 'UTJ2202', '5. Last Milestone', 100000000, 'Paid', 2022, 'Active', '2022-07-14', '2022-07-14', NULL, '2022-06-28 06:54:58'),
(1800, 'recjZmWdVRLP8u3Tc', 'ABC2203', '1. DP', 300000000, 'Paid', 2022, 'Active', '2022-04-07', '2022-04-07', NULL, '2022-06-28 07:37:25'),
(1801, 'recWKszbzDYIKuGEH', 'ABC2203', '1. Finish', 300000000, 'Paid', 2022, 'Active', '2022-06-09', '2022-06-09', NULL, '2022-06-28 07:38:06'),
(1802, 'recvcM6rDYe0oCbgZ', 'PPI2205', '1. DP', 15000000, 'Paid', 2022, 'Active', '2022-05-19', '2022-05-19', NULL, '2022-06-28 07:41:43'),
(1803, 'recUzK3dmWZP7EYuX', 'PPI2205', '2. Sprint Half', 5000000, 'Paid', 2022, 'Active', '2022-06-10', '2022-06-10', NULL, '2022-06-28 07:43:23'),
(1804, 'recK1piDa8ymlTGgT', 'PPI2205', '3. Milestone 3', 5000000, 'Paid', 2022, 'Active', '2022-07-15', '2022-07-15', NULL, '2022-06-28 07:43:43'),
(1805, 'rec22rhwdUdPlp0q8', 'PPI2205', '4. Last', 15000000, 'Paid', 2022, 'Active', '2022-08-05', '2022-08-05', NULL, '2022-06-28 07:43:44'),
(1806, 'recYh8WuoHupYpPqL', 'ULB2204', '1. Down Payment', 10000000, 'Paid', 2022, 'Active', '2022-04-15', '2022-04-15', NULL, '2022-06-28 07:46:28'),
(1807, 'reclCXpCONhcn14b5', 'ULB2204', '2. Milestone', 40000000, 'Paid', 2022, 'Active', '2022-06-17', '2022-06-17', NULL, '2022-06-28 07:48:06'),
(1808, 'rece8h9kYqHeIUOP9', 'ULB2204', '3. Last', 50000000, 'Paid', 2022, 'Active', '2022-08-18', '2022-08-18', NULL, '2022-06-28 07:48:07'),
(1809, 'recQ2wuP0kWamIMJj', 'GTS2202', '1. DP', 30000000, 'Paid', 2022, 'Active', '2022-03-02', '2022-03-02', NULL, '2022-06-28 07:50:36'),
(1810, 'recBVFm0X71EXox2x', 'GTS2202', '2. Milestone 2', 30000000, 'Paid', 2022, 'Active', '2022-05-12', '2022-05-12', NULL, '2022-06-28 07:57:17'),
(1811, 'recH3Utsj6qFKm0Wh', 'GTS2202', '3. Finishing', 30000000, 'Paid', 2022, 'Active', '2022-08-11', '2022-08-11', NULL, '2022-06-28 07:57:20'),
(1812, 'recRHmNeCPHiDNnfv', 'WKM2206', '1. Down Payment', 50000000, 'Paid', 2022, 'Active', '2022-06-01', '2022-06-06', NULL, '2022-06-28 07:59:02'),
(1813, 'recY3ZLdBUlUCC2kL', 'WKM2206', '2. Sprint 2', 50000000, 'Paid', 2022, 'Active', '2022-06-28', '2022-06-28', NULL, '2022-06-28 08:01:38'),
(1814, 'recPtLAsJyFBx3YIt', 'WKM2206', '3. Milestone 3', 50000000, 'Paid', 2022, 'Active', '2022-07-15', '2022-07-15', NULL, '2022-06-28 08:01:40'),
(1815, 'recpG3zTwBameoC5T', 'WKM2206', '4. Milestone 4', 50000000, 'Paid', 2022, 'Active', '2022-08-18', '2022-08-18', NULL, '2022-06-28 08:01:42'),
(1816, 'recfG59hMeiwNzbzu', 'SPT2208', '1. Down payment', 90000000, 'Invoiced', 2022, 'Active', '2022-08-23', '2022-08-23', NULL, '2022-08-23 12:47:40'),
(1817, 'rec42dZ2ptOvHStwS', 'ARG2208', '1. DP', 1000000, 'Invoiced', 2022, 'Active', '2022-08-23', '2022-08-23', NULL, '2022-08-23 14:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_data` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_order` varchar(255) DEFAULT NULL,
  `project_value` int(11) DEFAULT NULL,
  `project_start` date DEFAULT NULL,
  `project_finish` date DEFAULT NULL,
  `tribe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_data`, `id`, `project_code`, `name`, `client_id`, `duration`, `client_name`, `note`, `status`, `status_order`, `project_value`, `project_start`, `project_finish`, `tribe`) VALUES
(1756, '63039da42b9d006b0578ddff', 'ABC2203', 'Project Aplikasi Kesehatan ABC', '63039d47b0ccf3208503b022', 'PT69H', 'PT ABC', '', 'Done/Inactive', 'Paid,Paid', 600000000, '2022-04-07', '2022-06-09', 'Health'),
(1757, '6304e336c41f1808edfd0762', 'ARG2208', 'Alim Rugi APPS', '6304e31bc41f1808edfd065d', 'PT23H', 'PT Alim Rugi', '', 'Done/Inactive', 'Invoiced', 90000000, '2022-08-23', '2022-08-23', 'Health'),
(1758, '6304359fb0ccf32085060ff4', 'BSM2208', 'Bismillah App', '63043588b0ccf32085060edd', 'PT0S', 'TEST', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1759, '63039dd42b9d006b0578df23', '', 'Design', '', 'PT22H', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1760, '63039de0b0ccf3208503b349', '', 'General Support', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1761, '63039de7fa6cc063faa71669', '', 'General Task', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1762, '63039df3fa6cc063faa716b9', 'GTS2202', 'Pengembangan GPP System', '63039d74b0ccf3208503b0fa', 'PT86H30M', 'PT GITS INDONESIA', '', 'Done/Inactive', 'Paid,Paid,Paid', 90000000, '2022-03-02', '2022-08-11', 'Enterprise'),
(1763, '63039e082b9d006b0578e059', '', 'Ops', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1764, '63039e12b0ccf3208503b473', 'PIS2201', 'Sehat APPS', '63039d792b9d006b0578dd0a', 'PT82H59M', 'PT Indonesia Sejahtera', '', 'Done/Inactive', 'Paid,Paid,Invoiced', 200000000, '2022-01-03', '2022-05-10', 'Health'),
(1765, '63039e1f2b9d006b0578e0d6', 'PPI2205', 'Integrasi Surat Internal', '63039d41b0ccf3208503b006', 'PT109H51M', 'Politeknik Pos Indonesia', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid', 40000000, '2022-05-19', '2022-08-05', 'Enterprise'),
(1766, '63039e27fa6cc063faa7180f', '', 'Sales', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1767, '6304cd56c41f1808edfc2da6', 'SPT2208', 'Toko Online Sportama', '6304ca3fe57d4632b9207200', 'PT40H52M', 'Sportama', '', 'Done/Inactive', 'Invoiced', 1000000000, '2022-08-23', '2022-08-23', 'Commerce'),
(1768, '63039e34b0ccf3208503b535', 'ULB2204', 'Sistem Kepegawaian', '63039d7f2b9d006b0578dd16', 'PT71H57M', 'ULBI Indonesia', '', 'Done/Inactive', 'Paid,Paid,Paid', 100000000, '2022-04-15', '2022-08-18', 'Enterprise'),
(1769, '63039e3ffa6cc063faa718ad', 'UTJ2202', 'POS Ultra', '63039d822b9d006b0578dd3b', 'PT61H30M', 'Ultrajaya', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid,Paid', 500000000, '2022-02-02', '2022-07-14', 'Commerce'),
(1770, '63039e492b9d006b0578e1ea', 'WKM2108', 'Project A Wekomsel', '63039d86fa6cc063faa7144b', 'PT189H13M', 'Welkomsel', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid,Paid,Paid,Paid', 1000000000, '2021-09-07', '2022-06-24', 'Enterprise'),
(1771, '63039e532b9d006b0578e223', 'WKM2205', 'Project B Wekomsel', '63039d86fa6cc063faa7144b', 'PT58H', 'Welkomsel', '', 'Done/Inactive', 'Paid,Paid,Paid', 50000000, '2022-05-12', '2022-07-13', 'Commerce'),
(1772, '63039e5d2b9d006b0578e258', 'WKM2206', 'Digilearning', '63039d86fa6cc063faa7144b', 'PT69H', 'Welkomsel', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid', 200000000, '2022-06-06', '2022-08-18', 'Enterprise');

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE `project_member` (
  `id_data` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `hourly_rate` int(11) DEFAULT NULL,
  `cost_rate` int(11) DEFAULT NULL,
  `membership_type` varchar(255) NOT NULL,
  `membership_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_member`
--

INSERT INTO `project_member` (`id_data`, `project_id`, `user_id`, `hourly_rate`, `cost_rate`, `membership_type`, `membership_status`) VALUES
(968, '63039da42b9d006b0578ddff', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(969, '6304e336c41f1808edfd0762', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(970, '6304359fb0ccf32085060ff4', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(971, '63039dd42b9d006b0578df23', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(972, '63039de0b0ccf3208503b349', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(973, '63039de7fa6cc063faa71669', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(974, '63039df3fa6cc063faa716b9', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(975, '63039e082b9d006b0578e059', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(976, '63039e12b0ccf3208503b473', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(977, '63039e1f2b9d006b0578e0d6', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(978, '63039e27fa6cc063faa7180f', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(979, '6304cd56c41f1808edfc2da6', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(980, '63039e34b0ccf3208503b535', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(981, '63039e3ffa6cc063faa718ad', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(982, '63039e492b9d006b0578e1ea', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(983, '63039e532b9d006b0578e223', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE'),
(984, '63039e5d2b9d006b0578e258', '63039b192b9d006b0578cd48', NULL, NULL, 'PROJECT', 'ACTIVE');

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_detail_logtime`
-- (See below for the actual view)
--
CREATE TABLE `report_detail_logtime` (
`user_id` varchar(255)
,`description` varchar(255)
,`project_id` varchar(255)
,`project_code` varchar(255)
,`project_name` varchar(255)
,`client_name` varchar(255)
,`name` varchar(255)
,`picture` varchar(255)
,`date` varchar(7)
,`start` datetime
,`end` datetime
,`duration` time
,`amount` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_logtime`
-- (See below for the actual view)
--
CREATE TABLE `report_logtime` (
`user_id` varchar(255)
,`name` varchar(255)
,`picture` varchar(255)
,`time` time
,`date` varchar(7)
,`amount` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_project_cost`
-- (See below for the actual view)
--
CREATE TABLE `report_project_cost` (
`client_name` varchar(255)
,`project_code` varchar(255)
,`project_name` varchar(255)
,`date` varchar(7)
,`duration` time
,`amount` int(11)
);

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_client`
-- (See below for the actual view)
--
CREATE TABLE `v_client` (
`name` varchar(255)
,`value` int(11)
,`nick` varchar(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_direct_cost`
-- (See below for the actual view)
--
CREATE TABLE `v_direct_cost` (
`client_name` varchar(255)
,`project_code` varchar(255)
,`project_name` varchar(255)
,`date` varchar(7)
,`amount` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_employee`
-- (See below for the actual view)
--
CREATE TABLE `v_employee` (
`email` varchar(255)
,`name` varchar(255)
,`picture` varchar(255)
,`status` varchar(255)
,`hourly_rate` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_general_cost`
-- (See below for the actual view)
--
CREATE TABLE `v_general_cost` (
`date` varchar(7)
,`amount` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_milestone`
-- (See below for the actual view)
--
CREATE TABLE `v_milestone` (
`project_code` varchar(255)
,`project_name` varchar(255)
,`milestone_name` varchar(255)
,`milestone_value` int(11)
,`milestone_status` varchar(255)
,`contract_date` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_overhead_cost`
-- (See below for the actual view)
--
CREATE TABLE `v_overhead_cost` (
`date` varchar(7)
,`amount` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_profitability_report`
-- (See below for the actual view)
--
CREATE TABLE `v_profitability_report` (
`client_name` varchar(255)
,`project_code` varchar(255)
,`name` varchar(255)
,`contract_amount` int(11)
,`invoice_amount` int(11)
,`date` varchar(7)
,`running_invoice_amount` decimal(32,0)
,`direct_cost` decimal(54,0)
,`general_cost` decimal(62,0)
,`overhead_cost` decimal(62,0)
,`total_cost` decimal(64,0)
,`EBIT` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_project`
-- (See below for the actual view)
--
CREATE TABLE `v_project` (
`project_code` varchar(255)
,`name` varchar(255)
,`duration` varchar(255)
,`client_name` varchar(255)
,`note` varchar(255)
,`status` varchar(255)
,`project_value` int(11)
,`project_start` date
,`project_finish` date
,`tribe` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_project_member`
-- (See below for the actual view)
--
CREATE TABLE `v_project_member` (
`project_name` varchar(255)
,`employee_name` varchar(255)
,`hourly_rate` int(11)
,`membership_status` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `report_detail_logtime`
--
DROP TABLE IF EXISTS `report_detail_logtime`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_detail_logtime`  AS  select `logtime`.`user_id` AS `user_id`,`logtime`.`description` AS `description`,`logtime`.`project_id` AS `project_id`,`project`.`project_code` AS `project_code`,`project`.`name` AS `project_name`,`client`.`name` AS `client_name`,`employee`.`name` AS `name`,`employee`.`picture` AS `picture`,date_format(`logtime`.`timeinterval_end`,'%Y-%m') AS `date`,`logtime`.`timeinterval_start` AS `start`,`logtime`.`timeinterval_end` AS `end`,`logtime`.`timeinterval_duration` AS `duration`,`logtime`.`amount` AS `amount` from (((`logtime` join `employee` on(`logtime`.`user_id` = `employee`.`id`)) join `project` on(`logtime`.`project_id` = `project`.`id`)) join `client` on(`project`.`client_id` = `client`.`id`)) union select `logtime`.`user_id` AS `user_id`,`logtime`.`description` AS `description`,NULL AS `project_id`,NULL AS `project_code`,'Without Project' AS `project_name`,NULL AS `client_name`,`employee`.`name` AS `name`,`employee`.`picture` AS `picture`,date_format(`logtime`.`timeinterval_end`,'%Y-%m') AS `date`,`logtime`.`timeinterval_start` AS `start`,`logtime`.`timeinterval_end` AS `end`,`logtime`.`timeinterval_duration` AS `duration`,`logtime`.`amount` AS `amount` from (`logtime` join `employee` on(`logtime`.`user_id` = `employee`.`id`)) where `logtime`.`project_id` is null ;

-- --------------------------------------------------------

--
-- Structure for view `report_logtime`
--
DROP TABLE IF EXISTS `report_logtime`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_logtime`  AS  select `logtime`.`user_id` AS `user_id`,`employee`.`name` AS `name`,`employee`.`picture` AS `picture`,`logtime`.`timeinterval_duration` AS `time`,date_format(`logtime`.`timeinterval_end`,'%Y-%m') AS `date`,`logtime`.`amount` AS `amount` from (`logtime` join `employee` on(`logtime`.`user_id` = `employee`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `report_project_cost`
--
DROP TABLE IF EXISTS `report_project_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_project_cost`  AS  (select `client`.`name` AS `client_name`,`project`.`project_code` AS `project_code`,`project`.`name` AS `project_name`,date_format(`logtime`.`timeinterval_end`,'%Y-%m') AS `date`,`logtime`.`timeinterval_duration` AS `duration`,`logtime`.`amount` AS `amount` from ((`logtime` join `project` on(`logtime`.`project_id` = `project`.`id`)) join `client` on(`project`.`client_id` = `client`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_client`
--
DROP TABLE IF EXISTS `v_client`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_client`  AS  (select `client`.`name` AS `name`,`client`.`value` AS `value`,`client`.`nick` AS `nick`,`client`.`email` AS `email` from `client`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_direct_cost`
--
DROP TABLE IF EXISTS `v_direct_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_direct_cost`  AS  (select `report_project_cost`.`client_name` AS `client_name`,`report_project_cost`.`project_code` AS `project_code`,`report_project_cost`.`project_name` AS `project_name`,`report_project_cost`.`date` AS `date`,sum(`report_project_cost`.`amount`) AS `amount` from `report_project_cost` where `report_project_cost`.`project_code` <> '' group by `report_project_cost`.`project_code`,`report_project_cost`.`date`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_employee`
--
DROP TABLE IF EXISTS `v_employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_employee`  AS  (select `employee`.`email` AS `email`,`employee`.`name` AS `name`,`employee`.`picture` AS `picture`,`employee`.`status` AS `status`,`employee`.`amount` AS `hourly_rate` from `employee`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_general_cost`
--
DROP TABLE IF EXISTS `v_general_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_general_cost`  AS  (select date_format(`general_expenses`.`date`,'%Y-%m') AS `date`,sum(`general_expenses`.`amount`) AS `amount` from `general_expenses` group by `general_expenses`.`date`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_milestone`
--
DROP TABLE IF EXISTS `v_milestone`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_milestone`  AS  (select `milestone`.`project_code` AS `project_code`,`project`.`name` AS `project_name`,`milestone`.`milestone_name` AS `milestone_name`,`milestone`.`milestone_value` AS `milestone_value`,`milestone`.`milestone_status` AS `milestone_status`,`milestone`.`contract_date` AS `contract_date` from (`milestone` join `project` on(`milestone`.`project_code` = `project`.`project_code`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_overhead_cost`
--
DROP TABLE IF EXISTS `v_overhead_cost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_overhead_cost`  AS  (select date_format(`logtime`.`timeinterval_end`,'%Y-%m') AS `date`,sum(`logtime`.`amount`) AS `amount` from `logtime` where `logtime`.`project_id` in ('63039dd42b9d006b0578df23','63039de0b0ccf3208503b349','63039de7fa6cc063faa71669','63039e082b9d006b0578e059','63039e27fa6cc063faa7180f') or `logtime`.`project_id` is null group by date_format(`logtime`.`timeinterval_end`,'%Y-%m')) ;

-- --------------------------------------------------------

--
-- Structure for view `v_profitability_report`
--
DROP TABLE IF EXISTS `v_profitability_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_profitability_report`  AS  select `p`.`client_name` AS `client_name`,`p`.`project_code` AS `project_code`,`p`.`name` AS `name`,`p`.`project_value` AS `contract_amount`,`inv`.`invoice_amount` AS `invoice_amount`,(select if(`inv`.`invoice_date`,date_format(`inv`.`invoice_date`,'%Y-%m'),`vdc`.`date`)) AS `date`,(select sum(`invx`.`invoice_amount`) from `invoice` `invx` where `invx`.`project_code` = `inv`.`project_code` and date_format(`invx`.`invoice_date`,'%Y-%m') <= date_format(`inv`.`invoice_date`,'%Y-%m')) AS `running_invoice_amount`,(select if(`vdca`.`amount` is null,0,sum(`vdca`.`amount`)) from `v_direct_cost` `vdca` where `vdca`.`date` <= `vdc`.`date` and `vdca`.`project_code` = `p`.`project_code`) AS `direct_cost`,(select round(`inv`.`invoice_amount` / (select sum(`invoice`.`invoice_amount`) from `invoice` where `invoice`.`invoice_date` = `inv`.`invoice_date`) * (select if(`v_general_cost`.`amount` is null,0,sum(`v_general_cost`.`amount`)) from `v_general_cost` where `v_general_cost`.`date` = date_format(`inv`.`invoice_date`,'%Y-%m')),0)) AS `general_cost`,(select round(`inv`.`invoice_amount` / (select sum(`invoice`.`invoice_amount`) from `invoice` where `invoice`.`invoice_date` = `inv`.`invoice_date`) * (select if(`v_overhead_cost`.`amount` is null,0,sum(`v_overhead_cost`.`amount`)) from `v_overhead_cost` where `v_overhead_cost`.`date` = date_format(`inv`.`invoice_date`,'%Y-%m')),0)) AS `overhead_cost`,(select `direct_cost` + `general_cost` + `overhead_cost`) AS `total_cost`,(select `running_invoice_amount` - `total_cost`) AS `EBIT` from ((`invoice` `inv` join `v_direct_cost` `vdc` on(date_format(`inv`.`invoice_date`,'%Y-%m') = `vdc`.`date` and `inv`.`project_code` = `vdc`.`project_code`)) join `project` `p` on(`inv`.`project_code` = `p`.`project_code`)) union select `p`.`client_name` AS `client_name`,`p`.`project_code` AS `project_code`,`p`.`name` AS `name`,`p`.`project_value` AS `contract_amount`,`inv`.`invoice_amount` AS `invoice_amount`,(select if(`inv`.`invoice_date`,date_format(`inv`.`invoice_date`,'%Y-%m'),`vdc`.`date`)) AS `date`,0 AS `running_invoice_amount`,(select sum(`vdca`.`amount`) from `v_direct_cost` `vdca` where `vdca`.`date` <= `vdc`.`date` and `vdca`.`project_code` = `p`.`project_code`) AS `direct_cost`,0 AS `general_cost`,0 AS `overhead_cost`,(select `direct_cost` + `general_cost` + `overhead_cost`) AS `total_cost`,(select `running_invoice_amount` - `total_cost`) AS `EBIT` from ((`v_direct_cost` `vdc` left join `invoice` `inv` on(date_format(`inv`.`invoice_date`,'%Y-%m') = `vdc`.`date` and `inv`.`project_code` = `vdc`.`project_code`)) join `project` `p` on(`vdc`.`project_code` = `p`.`project_code`)) where `inv`.`invoice_date` is null union select `p`.`client_name` AS `client_name`,`p`.`project_code` AS `project_code`,`p`.`name` AS `name`,`p`.`project_value` AS `contract_amount`,`inv`.`invoice_amount` AS `invoice_amount`,(select if(`inv`.`invoice_date`,date_format(`inv`.`invoice_date`,'%Y-%m'),`vdc`.`date`)) AS `date`,(select sum(`invx`.`invoice_amount`) from `invoice` `invx` where `invx`.`project_code` = `inv`.`project_code` and date_format(`invx`.`invoice_date`,'%Y-%m') <= date_format(`inv`.`invoice_date`,'%Y-%m')) AS `running_invoice_amount`,(select if(`vdca`.`amount` is null,0,sum(`vdca`.`amount`)) from `v_direct_cost` `vdca` where `vdca`.`date` <= `vdc`.`date` and `vdca`.`project_code` = `p`.`project_code`) AS `direct_cost`,(select round(`inv`.`invoice_amount` / (select sum(`invoice`.`invoice_amount`) from `invoice` where `invoice`.`invoice_date` = `inv`.`invoice_date`) * (select if(`v_general_cost`.`amount` is null,0,sum(`v_general_cost`.`amount`)) from `v_general_cost` where `v_general_cost`.`date` = date_format(`inv`.`invoice_date`,'%Y-%m')),0)) AS `general_cost`,(select round(`inv`.`invoice_amount` / (select sum(`invoice`.`invoice_amount`) from `invoice` where `invoice`.`invoice_date` = `inv`.`invoice_date`) * (select if(`v_overhead_cost`.`amount` is null,0,sum(`v_overhead_cost`.`amount`)) from `v_overhead_cost` where `v_overhead_cost`.`date` = date_format(`inv`.`invoice_date`,'%Y-%m')),0)) AS `overhead_cost`,(select `direct_cost` + `general_cost` + `overhead_cost`) AS `total_cost`,(select `running_invoice_amount` - `total_cost`) AS `EBIT` from ((`invoice` `inv` left join `v_direct_cost` `vdc` on(date_format(`inv`.`invoice_date`,'%Y-%m') = `vdc`.`date` and `inv`.`project_code` = `vdc`.`project_code`)) join `project` `p` on(`inv`.`project_code` = `p`.`project_code`)) where `vdc`.`date` is null ;

-- --------------------------------------------------------

--
-- Structure for view `v_project`
--
DROP TABLE IF EXISTS `v_project`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_project`  AS  (select `project`.`project_code` AS `project_code`,`project`.`name` AS `name`,`project`.`duration` AS `duration`,`project`.`client_name` AS `client_name`,`project`.`note` AS `note`,`project`.`status` AS `status`,`project`.`project_value` AS `project_value`,`project`.`project_start` AS `project_start`,`project`.`project_finish` AS `project_finish`,`project`.`tribe` AS `tribe` from `project`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_project_member`
--
DROP TABLE IF EXISTS `v_project_member`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_project_member`  AS  (select `project`.`name` AS `project_name`,`employee`.`name` AS `employee_name`,`employee`.`amount` AS `hourly_rate`,`project_member`.`membership_status` AS `membership_status` from ((`project` join `project_member` on(`project`.`id` = `project_member`.`project_id`)) join `employee` on(`employee`.`id` = `project_member`.`user_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `general_expenses`
--
ALTER TABLE `general_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logtime`
--
ALTER TABLE `logtime`
  ADD PRIMARY KEY (`id_data`);

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
-- Indexes for table `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`id_data`);

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
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1159;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `logtime`
--
ALTER TABLE `logtime`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2894;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `milestone`
--
ALTER TABLE `milestone`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1818;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1773;

--
-- AUTO_INCREMENT for table `project_member`
--
ALTER TABLE `project_member`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=985;

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
