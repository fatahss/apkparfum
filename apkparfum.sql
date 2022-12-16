-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 04:02 PM
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
-- Database: `apkparfum`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `nomorpo` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `product` varchar(128) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `nomorpo`, `username`, `product`, `jumlah`) VALUES
(26, 'PO2022101122', 'admin', 'sdrwad', 3),
(27, 'PO2022101122', 'admin', 'swdsadswad', 3);

-- --------------------------------------------------------

--
-- Table structure for table `daftarmapel`
--

CREATE TABLE `daftarmapel` (
  `id` int(11) NOT NULL,
  `namamapel` varchar(64) NOT NULL,
  `jurusan` varchar(64) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarmapel`
--

INSERT INTO `daftarmapel` (`id`, `namamapel`, `jurusan`, `semester`) VALUES
(1, 'Matematika', 'Akuntansi dan Keuangan', '6'),
(14, 'Matematika', 'Animasi', '2');

-- --------------------------------------------------------

--
-- Table structure for table `daftarnilai`
--

CREATE TABLE `daftarnilai` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `kelas` varchar(16) NOT NULL,
  `namamapel` varchar(64) NOT NULL,
  `nilaipengetahuan` int(6) NOT NULL,
  `nilaiketerampilan` int(6) NOT NULL,
  `nilaiakhir` int(6) NOT NULL,
  `predikat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarnilai`
--

INSERT INTO `daftarnilai` (`id`, `name`, `kelas`, `namamapel`, `nilaipengetahuan`, `nilaiketerampilan`, `nilaiakhir`, `predikat`) VALUES
(1, 'fatah', 'X-AN-3', 'Matematika', 95, 95, 95, 'A'),
(2, 'afasfsafa', 'X-AN-3', 'Matematika', 95, 95, 95, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_parfum` varchar(64) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `username_requester` varchar(128) NOT NULL,
  `username_receiver` varchar(128) NOT NULL,
  `sub_total` int(16) NOT NULL,
  `ongkir` int(16) NOT NULL,
  `diskon` int(16) NOT NULL,
  `total` int(16) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(5) NOT NULL,
  `namajurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `namajurusan`) VALUES
(1, 'Akuntansi dan Keuangan'),
(2, 'Animasi'),
(3, 'Bisnis Daring dan Pemasaran'),
(4, '2323');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `nama_kategori` varchar(64) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_by`, `created_at`) VALUES
(3, 'Soft', 'admin', '1664717064'),
(4, 'Strong', 'admin', '1664717074');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_paket`
--

CREATE TABLE `kategori_paket` (
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(12) NOT NULL,
  `jurusan` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `jurusan`) VALUES
(1, 'X-AN-3', 'Animasi'),
(2, 'XI-AN-1', 'Animasi');

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
(31, 'ffaadasda', 'test55', '234234343', 'Jl. Fatahillah No. 1A RW 04 Kalijaya Cikarang Barat Bekasi Jawa Barat, Kalijaya, Kec. Cikarang Barat, Kabupaten Bekasi, Jawa Barat 17530', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1659869449, '', 'Sedang di proses', ''),
(32, 'fatah', 'user', '1234', 'sdkafkdjfpdfdffsaf', '10 Lembar', 'Biasa Kab. Bekasi (3 sampai 5 hari) = Rp.35000,00', '38000', 1660004810, '', 'Sudah di terima', ''),
(33, 'fatah', 'user', '1234', 'dsadwad', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660006159, '', 'Belum di proses', ''),
(34, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'regerger', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660009835, '', 'Belum di proses', ''),
(35, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'r2r23r', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660012988, '', 'Belum di proses', ''),
(37, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'Jl. Fatahillah No. 1A RW 04 Kalijaya Cikarang Barat Bekasi Jawa Barat, Kalijaya, Kec. Cikarang Barat, Kabupaten Bekasi, Jawa Barat 17530', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660092418, '', 'Belum di proses', ''),
(38, 'Fatahillah Sholahuddin', 'admin', '082295773985', 'csadasdasdasdwd', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1660092444, '', 'Belum di proses', ''),
(39, 'Fatahillah Sholahuddin', 'admin', '4234233333', 'gergergre', '5 Lembar', 'Cepat Luar Kab. Bekasi (1 hari) = Rp.65000,00', '68000', 1662979673, '', 'Belum di proses', ''),
(40, 'fatah', '111', '', 'sdkafkdjfpdfdfasfasfasfsafs', '5 Lembar', 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00', '53000', 1662993220, '', 'Belum di proses', '');

-- --------------------------------------------------------

--
-- Table structure for table `parfum`
--

CREATE TABLE `parfum` (
  `id` int(10) NOT NULL,
  `nama_parfum` varchar(64) NOT NULL,
  `kategori` varchar(32) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `image` varchar(64) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parfum`
--

INSERT INTO `parfum` (`id`, `nama_parfum`, `kategori`, `deskripsi`, `image`, `created_by`, `created_at`) VALUES
(19, 'Baccarat', 'Top Brand', 'dasdasdsa', '', 'admin', '1664561869'),
(20, 'sdrwad', 'Top Brand', 'dadwadwad', '', 'admin', '1664561899'),
(21, 'swdsadswad', 'Top Brand', '', '', 'admin', '1664561903');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(5) NOT NULL,
  `nomorpemesanan` varchar(12) NOT NULL,
  `nis` varchar(24) NOT NULL,
  `namaalumni` varchar(126) NOT NULL,
  `atasnama` varchar(126) NOT NULL,
  `nominal` varchar(12) NOT NULL,
  `buktipembayaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nomorpemesanan`, `nis`, `namaalumni`, `atasnama`, `nominal`, `buktipembayaran`) VALUES
(4, '34', '18732837', 'Fatahillah Sholahuddin', 'ggtgtgegg', '343434211', 'logo_crowelov.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--

CREATE TABLE `preorder` (
  `id` int(10) NOT NULL,
  `nomorpo` varchar(32) NOT NULL,
  `id_requester` int(10) NOT NULL,
  `id_receiver` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preorder`
--

INSERT INTO `preorder` (`id`, `nomorpo`, `id_requester`, `id_receiver`, `created_by`, `created_at`) VALUES
(1, 'PO124214', 15, 8, 15, '1664744686'),
(2, 'PO124214', 15, 8, 15, '1664745083'),
(3, 'PO124214', 15, 8, 15, '1664745174'),
(4, 'PO124214', 15, 8, 15, '1664745175'),
(5, 'PO124214', 15, 8, 15, '1664745657'),
(6, 'PO124214', 15, 8, 15, '1664745843'),
(7, 'PO124214', 15, 8, 15, '1665490008');

-- --------------------------------------------------------

--
-- Table structure for table `preorder_detail`
--

CREATE TABLE `preorder_detail` (
  `nomorpo` varchar(32) NOT NULL,
  `username` varchar(128) NOT NULL,
  `product` varchar(128) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preorder_detail`
--

INSERT INTO `preorder_detail` (`nomorpo`, `username`, `product`, `qty`) VALUES
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'sdrwad', 4),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'sdrwad', 4),
('PO2022100222', 'admin', 'dsadsad', 7),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'sdrwad', 4),
('PO2022100222', 'admin', 'dsadsad', 7),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'sdrwad', 4),
('PO2022100222', 'admin', 'dsadsad', 7),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'sdrwad', 4),
('PO2022100222', 'admin', 'dsadsad', 7),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'sdrwad', 4),
('PO2022100222', 'admin', 'dsadsad', 7),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'Switsal', 1),
('PO2022100222', 'admin', 'dsadsad', 3),
('PO2022100222', 'admin', 'Switsal', 4),
('PO2022100222', 'admin', 'Baccarat', 0),
('PO2022100222', 'admin', 'dsadsad', 5),
('PO2022101122', 'admin', 'sdrwad', 7),
('PO2022101122', 'admin', 'dsadsad', 4),
('PO2022101122', 'admin', 'swdsadswad', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `upline` varchar(128) DEFAULT NULL,
  `notelpon` varchar(15) NOT NULL,
  `email` varchar(126) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(5) NOT NULL,
  `role` varchar(64) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(126) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `upline`, `notelpon`, `email`, `alamat`, `image`, `role_id`, `role`, `is_active`, `date_create`) VALUES
(7, 'Fatahillah Sholahuddin', '12412412', '$2y$10$nGaZlNDal2htyLvo/XoFju9E.yDvx4I7YMPKm5ytdpiTPa6tRF2AK', '0', '', '', 'dsadsa', 'default.jpg', 1, '', 1, 0),
(8, 'Fatah', 'SMK-DS31/4189283', '$2y$10$qFm/323cOr2hk.lNYi2S0e3aKWj.ViBe4p..tuGOVRQEqaIcn5I7u', '0', '', '', 'rgegrgerg', 'default.jpg', 1, '', 1, 1658572227),
(15, 'Fatahillah Sholahuddin', 'admin', '$2y$10$e.ZRDrt5doKqoRptzmKxVeXzEnvZNOyMemZ8Kv.uP3udQPNyimAW.', '8', '4234233333', 'fatahfirja11@gmail.com', 'dsadasdas', 'use_case_2_page-0001.jpg', 1, '', 1, 1658593682),
(44, 'fatah', 'user', '$2y$10$4JOf/okgu0kiirRim0raqOsWUy4i5bPp6xhoYyHN2F4.6tJHXyok2', '0', '', '', 'rjojo', 'default.jpg', 2, '', 1, 1660004594),
(47, 'eqfefew', '34234324', '$2y$10$iB8n4/nxRX6XFpghEUVZGuqniCc2O.oM27Qzcs9v8ywIqKvD/DlFW', '0', '', '', 'ewfwefe', 'default.jpg', 2, '', 1, 1660093441),
(57, 'fewfewf', '2342423', '$2y$10$YRTuXcvWOxezeFJZRvamEexe84gWKie9xVjSXk9Dd4CnnTyJI53ri', '0', '', '', 'fewfwefew', 'default.jpg', 2, '', 1, 1660117600),
(58, 'wfwefwefe', '242423', '$2y$10$qaeRKnE3pfXhLSD08/45Ze4GAvT5bHgs5cMRt3E6i4uAQZqhLx02m', '0', '', '', 'wfewfwefew', 'default.jpg', 2, '', 1, 1660117650),
(60, 'wefwewewewew', '42324234', '$2y$10$zghHjVIVvUAM7oZ9sAHjeeMY1HoTi9D4pk24VWYWJBu1LId6vo3q2', '0', '', '', 'fwefwefew', 'default.jpg', 2, '', 1, 1662897813),
(61, 'Yusri Anita', '1234', '$2y$10$P03G9GxTDuhoPy9nyIxQXu8VRvHGSkGhIBljjp1CgnT3z9ay4m79a', '60', '', '', '', 'default.jpg', 3, '', 1, 1662903116),
(62, 'afasfsafa', 'afasfsafa', '$2y$10$9qimXm5buXKgKMUZYMqCvOB5VBcsx961UBn1rl9ExZXebGnktaw3q', '61', '', '', 'dfdfsdfsdf', 'default.jpg', 4, 'Distributor', 1, 1662947960),
(63, 'fatah', '111', '$2y$10$zwYBzuIoag6IS54AdPTJoOcdWu72M9xzJtQRuk3jx64Gw3iCIDxUu', '0', '', '', 'dsfdsfdsf', 'default.jpg', 5, '', 1, 1662987424),
(68, 'Fatahillah Sholahuddin', 'f23f23f23', '$2y$10$aMpJD6ZVaBDvstqdCRzV6.IZldNoNO1jHgCiJ/hCq1L0pCDfoCOKi', '62', '323423433', 'eefwefwe@gmail.com', 'efdewfwee', 'default.jpg', 5, 'Reseller', 1, 1664375873);

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
(8, 1, 2),
(9, 1, 4),
(13, 4, 4),
(14, 3, 3),
(15, 1, 5),
(16, 5, 5);

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
(2, 'Founder'),
(3, 'Supplier'),
(4, 'Distributor'),
(5, 'Reseller');

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
(2, 'Founder'),
(3, 'Supplier'),
(4, 'Distributor'),
(5, 'Reseller');

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
(2, 2, 'Profile Founder', 'founder', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile Founder', 'founder/edit', 'fas fa-fw fa-user-edit', 1),
(11, 1, 'Menu Kategori', 'admin/menukategori', '', 1),
(12, 2, 'Change Password Founder', 'founder/changepassword', 'fas fa-fw fa-key', 1),
(13, 2, 'Pengajuan Legalisir Ijazah', 'founder/legalisir', 'fas fa-solid fa-file', 1),
(14, 1, 'Menu Legalisir Admin', 'admin/menulegalisiradmin', 'fas fa-solid fa-list', 1),
(15, 1, 'Menu Alumni', 'admin/menuuser', 'fas fa-solid fa-graduation-cap', 1),
(16, 2, 'Menu Legalisir', 'user/menulegalisiruser', 'fas fa-solid fa-list', 1),
(17, 1, 'Register Akun Alumni', 'admin/register', 'fas fa-solid fa-user-graduate', 1),
(19, 1, 'Menu Mata Pelajaran', 'admin/daftarmapel', 'fas fa-solid fa-book', 1),
(20, 1, 'Menu Parfum', 'admin/menuparfum', 'fas fa-duotone fa-copy', 1),
(21, 1, 'Menu Kelas', 'admin/menukelas', 'fas fa-solid fa-school', 1),
(22, 1, 'Register Akun Guru', 'admin/registerguru', 'fas fa-solid fa-user-tie', 1),
(23, 1, 'Menu Guru', 'admin/menuguru', 'fas fa-solid fa-id-badge', 1),
(24, 1, 'Menu Siswa', 'admin/menusiswa', 'fas fa-solid fa-address-card', 1),
(25, 1, 'Register Akun Siswa', 'admin/registersiswa', 'fas fa-solid fa-user-plus', 1),
(26, 2, 'Konfirmasi Pembayaran', 'user/pembayaran', 'fas fa-solid fa-comment-dollar', 1),
(27, 4, 'Profile Distributor', 'distributor', 'fas fa-fw fa-user', 1),
(28, 1, 'Menu Pembayaran', 'admin/menupembayaran', 'fas fa-solid fa-file-invoice-dollar', 1),
(29, 4, 'Edit Profile Distributor', 'distributor/edit', 'fas fa-fw fa-user-edit', 1),
(30, 4, 'Change Password Distributor', 'distributor/changepassword', 'fas fa-fw fa-key', 1),
(32, 5, 'Profile Reseller', 'reseller', 'fas fa-fw fa-user', 1),
(33, 5, 'Edit Profile Reseller', 'reseller/edit', 'fas fa-fw fa-user-edit', 1),
(34, 5, 'Change Password Reseller', 'reseller/changepassword', 'fas fa-fw fa-key', 1),
(38, 4, 'Menu Member Distributor', 'distributor/menumember', 'fas fa-solid fa-layer-group', 1),
(40, 3, 'Profile Supplier', 'supplier', 'fas fa-fw fa-user', 1),
(41, 3, 'Edit Profile Supplier', 'supplier/edit', 'fas fa-fw fa-user-edit', 1),
(42, 3, 'Change Password Supplier', 'supplier/changepassword', 'fas fa-fw fa-key', 1),
(43, 5, 'Pengajuan Preorder Reseller', 'reseller/preorder', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarmapel`
--
ALTER TABLE `daftarmapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarnilai`
--
ALTER TABLE `daftarnilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legalisir`
--
ALTER TABLE `legalisir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parfum`
--
ALTER TABLE `parfum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preorder`
--
ALTER TABLE `preorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `daftarmapel`
--
ALTER TABLE `daftarmapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daftarnilai`
--
ALTER TABLE `daftarnilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `legalisir`
--
ALTER TABLE `legalisir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `parfum`
--
ALTER TABLE `parfum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `preorder`
--
ALTER TABLE `preorder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
