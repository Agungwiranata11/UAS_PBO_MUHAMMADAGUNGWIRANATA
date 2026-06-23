-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2026 at 01:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1b_muhammadagungwiranata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('K001', 'Aditya Pratama', 'IT Support', 22, '150000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('K002', 'Budi Santoso', 'Finance', 20, '160000.00', 'Kontrak', 6, 'PT Global Solusi', NULL, NULL, NULL, NULL),
('K003', 'Citra Lestari', 'Marketing', 21, '145000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('K004', 'Deni Wijaya', 'Operations', 23, '140000.00', 'Kontrak', 24, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
('K005', 'Eka Wahyuni', 'HRD', 22, '155000.00', 'Kontrak', 6, 'PT Global Solusi', NULL, NULL, NULL, NULL),
('K006', 'Fajar Nugraha', 'Procurement', 19, '150000.00', 'Kontrak', 12, 'PT Sumber Daya', NULL, NULL, NULL, NULL),
('K007', 'Gita Permata', 'Creative', 21, '165000.00', 'Kontrak', 6, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('M001', 'Oki Setiawan', 'Software Engineering', 20, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1800000.00', 'Sertifikat MSIB Batch 5'),
('M002', 'Putri Amelia', 'Quality Assurance', 18, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB Batch 5'),
('M003', 'Rian Hidayat', 'Marketing', 22, '70000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat Internal Corp'),
('M004', 'Siti Aminah', 'HRD', 21, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1600000.00', 'Sertifikat MSIB Batch 6'),
('M005', 'Taufik Hidayat', 'IT Support', 19, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1800000.00', 'Sertifikat Kampus Merdeka Mandiri'),
('M006', 'Vina Panduwinata', 'Creative', 20, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB Batch 6'),
('T001', 'Hendra Kusuma', 'Software Engineering', 22, '300000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-001', NULL, NULL),
('T002', 'Indah Rahayu', 'Quality Assurance', 22, '250000.00', 'Tetap', NULL, NULL, '450000.00', 'ESOP-002', NULL, NULL),
('T003', 'Joko Susilo', 'Data Science', 20, '350000.00', 'Tetap', NULL, NULL, '600000.00', 'ESOP-003', NULL, NULL),
('T004', 'Kurniawati', 'Product Management', 21, '320000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-004', NULL, NULL),
('T005', 'Lukman Hakim', 'DevOps', 23, '310000.00', 'Tetap', NULL, NULL, '550000.00', 'ESOP-005', NULL, NULL),
('T006', 'Mega Utami', 'Legal', 22, '280000.00', 'Tetap', NULL, NULL, '450000.00', 'ESOP-006', NULL, NULL),
('T007', 'Nugroho Adi', 'Security', 22, '240000.00', 'Tetap', NULL, NULL, '400000.00', 'ESOP-007', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
