-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2025 at 08:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `norma_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'norma', 'gfgfg'),
(2, 'M.Yudhistia Rahman', '908021', 'user', 'user', 'ghgjhg');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `no_cuti` varchar(30) NOT NULL,
  `npp` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `leader` varchar(20) NOT NULL,
  `manager` varchar(30) NOT NULL,
  `spv` varchar(20) NOT NULL,
  `stt_cuti` varchar(50) NOT NULL,
  `ket_reject` text NOT NULL,
  `hrd_app` int(2) NOT NULL,
  `lead_app` int(2) NOT NULL,
  `spv_app` int(2) NOT NULL,
  `mng_app` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`no_cuti`, `npp`, `tgl_pengajuan`, `tgl_awal`, `tgl_akhir`, `durasi`, `keterangan`, `leader`, `manager`, `spv`, `stt_cuti`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`) VALUES
('13012025221229', '12345', '2025-01-13', '2025-01-14', '2025-01-17', 4, 'kjjjj', '', '33333', '', 'Rejected', 'malas', 0, 0, 0, 0),
('26012022003318', '12345', '2022-01-26', '2022-01-26', '2022-01-30', 5, '1', '', '33333', '', 'Approved', '', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `id` int(11) NOT NULL,
  `nama_agen` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `jenis_jaminan` varchar(255) NOT NULL,
  `nilai_jaminan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`id`, `nama_agen`, `nama_perusahaan`, `no_telp`, `jenis_jaminan`, `nilai_jaminan`) VALUES
(26, 'junai update', 'udin', '08981194430', 'usaha', '2000000'),
(27, 'junai', 'CV udin', '0898222998', 'dsaf', '3842834'),
(28, 'junai', 'CV udin', '0898222998', 'dsaf', '3842834'),
(29, 'fdsafsadf', 'dsafsef', 'eafaef', 'fesafseaf', '324324'),
(30, 'fdsafsadf', 'dsafsef', 'eafaef', 'fesafseaf', '324324');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_jaminan`
--

CREATE TABLE `pengajuan_jaminan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jaminan_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `type_jaminan` enum('suretybond','bankgaransi','kreditmikro','barangjasa','multiguna') NOT NULL,
  `status` enum('Pending','Di Tolak','Di Setujui','') NOT NULL,
  `create_at` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  `update_at` TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_jaminan`
--

INSERT INTO `pengajuan_jaminan` (`id`, `user_id`, `jaminan_id`, `admin_id`, `type_jaminan`, `status`, `create_at`, `update_at`) VALUES
(1, 12345, 26, NULL, 'suretybond', 'Pending', '2025-02-03', '2025-02-03 08:50:25'),
(2, 33333, 27, NULL, 'bankgaransi', 'Pending', '2025-02-03', '2025-02-02 19:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp_emp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `telp_emp`, `alamat`, `hak_akses`, `password`, `active`) VALUES
(12345, 'Test Pegawai', 'junai@mail.com', '0812983198', 'Jakarta', 'Pegawai', '12345', 'Aktif'),
(33333, 'Test Manager', 'udin@mail.com', '081287189898', 'Jakarta', 'Manager', '33333', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`no_cuti`);

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_jaminan`
--
ALTER TABLE `pengajuan_jaminan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33334;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;