-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2025 pada 14.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'norma', ''),
(2, 'yudis', '908021', 'user', 'user', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
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
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`no_cuti`, `npp`, `tgl_pengajuan`, `tgl_awal`, `tgl_akhir`, `durasi`, `keterangan`, `leader`, `manager`, `spv`, `stt_cuti`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`) VALUES
('13012025221229', '12345', '2025-01-13', '2025-01-14', '2025-01-17', 4, 'kjjjj', '', '33333', '', 'Rejected', 'malas', 0, 0, 0, 0),
('26012022003318', '12345', '2022-01-26', '2022-01-26', '2022-01-30', 5, '1', '', '33333', '', 'Approved', '', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `npwp` varchar(20) NOT NULL,
  `nama_emp` varchar(100) NOT NULL,
  `telp_emp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`npwp`, `nama_emp`, `telp_emp`, `alamat`, `hak_akses`, `password`, `active`, `id_adm`) VALUES
('12345', 'Test Pegawai', '0812983198', 'Jakarta', 'Pegawai', '12345', 'Aktif', 1),
('33333', 'Test Manager', '081287189898', 'Jakarta', 'Manager', '33333', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`no_cuti`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`npwp`);

--
-- Indeks untuk tabel `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
