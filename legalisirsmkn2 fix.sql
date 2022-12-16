-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 10:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legalisirsmkn2`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_paket`
--

CREATE TABLE `kategori_paket` (
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `legalisir`
--

CREATE TABLE `legalisir` (
  `id` int(11) NOT NULL,
  `name` varchar(126) NOT NULL,
  `ijazah` varchar(50) DEFAULT NULL,
  `notelpon` varchar(22) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `jumlahlegalisir` varchar(20) DEFAULT NULL,
  `kategoripaket` varchar(70) NOT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `waktu` int(125) NOT NULL,
  `buktipembayaran` varchar(126) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pdfijazah` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legalisir`
--

INSERT INTO `legalisir` (`id`, `name`, `ijazah`, `notelpon`, `alamat`, `jumlahlegalisir`, `kategoripaket`, `harga`, `waktu`, `buktipembayaran`, `status`, `pdfijazah`) VALUES
(31, 'ffaadasda', 'test55', '234234343', 'Jl. Fatahillah No. 1A RW 04 Kalijaya Cikarang Barat Bekasi Jawa Barat, Kalijaya, Kec. Cikarang Barat, Kabupaten Bekasi, Jawa Barat 17530', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1659869449, '', 'Belum di proses', ''),
(32, 'fatah', 'user', '1234', 'sdkafkdjfpdfdffsaf', '10 Lembar', 'Biasa Kab. Bekasi (3 sampai 5 hari) = Rp.35000,00', '38000', 1660004810, '', 'Sudah di terima', ''),
(33, 'fatah', 'user', '1234', 'dsadwad', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660006159, '', 'Belum di proses', ''),
(34, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'regerger', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660009835, '', 'Belum di proses', ''),
(35, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'r2r23r', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660012988, '', 'Belum di proses', ''),
(37, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'Jl. Fatahillah No. 1A RW 04 Kalijaya Cikarang Barat Bekasi Jawa Barat, Kalijaya, Kec. Cikarang Barat, Kabupaten Bekasi, Jawa Barat 17530', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660092418, '', 'Belum di proses', ''),
(38, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'csadasdasdasdwd', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660092444, '', 'Belum di proses', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `ijazah` varchar(32) NOT NULL,
  `notelpon` varchar(16) NOT NULL,
  `namaortu` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `pdfijazah` varchar(126) NOT NULL,
  `role_id` int(5) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(126) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `ijazah`, `notelpon`, `namaortu`, `image`, `pdfijazah`, `role_id`, `is_active`, `date_create`) VALUES
(7, 'Fatahillah Sholahuddin', '$2y$10$nGaZlNDal2htyLvo/XoFju9E.yDvx4I7YMPKm5ytdpiTPa6tRF2AK', '12412412', '082295773985', 'dsadsa', 'default.jpg', '', 1, 1, 0),
(8, 'Fatah', '$2y$10$qFm/323cOr2hk.lNYi2S0e3aKWj.ViBe4p..tuGOVRQEqaIcn5I7u', 'SMK-DS31/4189283', '25323432433', 'rgegrgerg', 'default.jpg', '', 1, 1, 1658572227),
(15, 'Fatahillah Sholahuddin', '$2y$10$UXvSGXMTf/007Rqv01Q1ie5esBuNE79hE5SCVIAzdy2HtaYKqLgy.', 'admin', '082295773985', 'Belum di proses', 'use_case_2_page-0001.jpg', '39158da2f807feeceacb4c504c684108.jpg', 1, 1, 1658593682),
(44, 'fatah', '$2y$10$4JOf/okgu0kiirRim0raqOsWUy4i5bPp6xhoYyHN2F4.6tJHXyok2', 'user', '1234', 'rjojo', 'default.jpg', '', 2, 1, 1660004594),
(47, 'eqfefew', '$2y$10$iB8n4/nxRX6XFpghEUVZGuqniCc2O.oM27Qzcs9v8ywIqKvD/DlFW', '34234324', '423423', 'ewfwefe', 'default.jpg', 'proses_tree.pdf', 2, 1, 1660093441),
(57, 'fewfewf', '$2y$10$YRTuXcvWOxezeFJZRvamEexe84gWKie9xVjSXk9Dd4CnnTyJI53ri', '2342423', '4234234', 'fewfwefew', 'default.jpg', '30000001.pdf', 2, 1, 1660117600),
(58, 'wfwefwefe', '$2y$10$qaeRKnE3pfXhLSD08/45Ze4GAvT5bHgs5cMRt3E6i4uAQZqhLx02m', '242423', '234234234', 'wfewfwefew', 'default.jpg', 'sdsdsd.pdf', 2, 1, 1660117650);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'Menu', 'fas fa-fw fa-chevron-circle-down', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-ellipsis-h', 1),
(12, 2, 'Change password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(13, 2, 'Pengajuan Legalisir', 'user/legalisir', 'fas fa-solid fa-file', 1),
(14, 1, 'Menu Legalisir Admin', 'admin/menulegalisiradmin', 'fas fa-solid fa-list', 1),
(15, 1, 'Menu User', 'admin/menuuser', 'fas fa-solid fa-users', 1),
(16, 2, 'Menu Legalisir', 'user/menulegalisiruser', 'fas fa-solid fa-list', 1),
(17, 1, 'Register Account', 'admin/register', 'fas fa-solid fa-user-plus', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `legalisir`
--
ALTER TABLE `legalisir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ijazah` (`ijazah`,`notelpon`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `legalisir`
--
ALTER TABLE `legalisir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
