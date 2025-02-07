-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk norma_cuti
CREATE DATABASE IF NOT EXISTS `norma_cuti` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `norma_cuti`;

-- membuang struktur untuk table norma_cuti.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int NOT NULL AUTO_INCREMENT,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL,
  `hak_akses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table norma_cuti.cuti
CREATE TABLE IF NOT EXISTS `cuti` (
  `no_cuti` varchar(30) NOT NULL,
  `npp` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `durasi` int NOT NULL,
  `keterangan` text NOT NULL,
  `leader` varchar(20) NOT NULL,
  `manager` varchar(30) NOT NULL,
  `spv` varchar(20) NOT NULL,
  `stt_cuti` varchar(50) NOT NULL,
  `ket_reject` text NOT NULL,
  `hrd_app` int NOT NULL,
  `lead_app` int NOT NULL,
  `spv_app` int NOT NULL,
  `mng_app` int NOT NULL,
  PRIMARY KEY (`no_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table norma_cuti.jaminan
CREATE TABLE IF NOT EXISTS `jaminan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_agen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_jaminan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_jaminan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table norma_cuti.pengajuan_jaminan
CREATE TABLE IF NOT EXISTS `pengajuan_jaminan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `jaminan_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `type_jaminan` enum('suretybond','bankgaransi','kreditmikro','barangjasa','multiguna') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_ditolak` text COLLATE utf8mb4_general_ci,
  `status` enum('Pending','Di Tolak','Di Setujui','') COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pengajuan_jaminan_user` (`user_id`),
  KEY `fk_pengajuan_jaminan_jaminan` (`jaminan_id`),
  KEY `fk_pengajuan_jaminan_admin` (`admin_id`),
  CONSTRAINT `fk_pengajuan_jaminan_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_adm`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_pengajuan_jaminan_jaminan` FOREIGN KEY (`jaminan_id`) REFERENCES `jaminan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pengajuan_jaminan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table norma_cuti.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp_emp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33334 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
