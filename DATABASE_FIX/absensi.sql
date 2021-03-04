-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 09:57 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `no_bp` int(12) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `status_hadir` text NOT NULL,
  `ruang_kelas` text NOT NULL,
  `tanggal` date NOT NULL,
  `matakuliah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `no_bp`, `nama`, `status_hadir`, `ruang_kelas`, `tanggal`, `matakuliah`) VALUES
(26, 1701092029, 'Satria Rahmat Putra', 'Complate', 'A-02', '2020-11-18', 'Database'),
(27, 1701092011, 'putri rahmadhanii', 'sakit', 'A-02', '2020-11-18', 'Database'),
(28, 1701092022, 'Aini', 'Complate', 'A-01', '2020-11-18', 'Mobile Programming');

-- --------------------------------------------------------

--
-- Table structure for table `tdata_mahasiswa`
--

CREATE TABLE `tdata_mahasiswa` (
  `no_bp` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdata_mahasiswa`
--

INSERT INTO `tdata_mahasiswa` (`no_bp`, `nama`, `kelas`) VALUES
(1701092029, 'Satria Rahmat Putra', '4'),
(1701092022, 'Aini', '2'),
(1701092011, 'putri rahmadhanii', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tjadwal`
--

CREATE TABLE `tjadwal` (
  `id_jadwal` int(12) NOT NULL,
  `mata_kuliah` varchar(128) NOT NULL,
  `ruang_kelas` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `hari` text NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `status_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tjadwal`
--

INSERT INTO `tjadwal` (`id_jadwal`, `mata_kuliah`, `ruang_kelas`, `kelas`, `hari`, `jam_masuk`, `jam_keluar`, `status_kelas`) VALUES
(3, 'Mobile Programming', 'A-01', '2', 'Selasa', '08:05:00', '10:10:00', 1),
(4, 'matematika distrik', 'A-02', '2', 'Jumat', '09:10:00', '10:18:00', 0),
(5, 'Multimedia', 'A-01', '2', 'Selasa', '11:00:00', '12:00:00', 0),
(6, 'Database', 'A-02', '4', 'Selasa', '10:30:00', '12:15:00', 1),
(7, 'nyanyi', 'A-01', '4', 'Selasa', '13:00:00', '14:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tkelas`
--

CREATE TABLE `tkelas` (
  `id_kelas` int(12) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkelas`
--

INSERT INTO `tkelas` (`id_kelas`, `nama_kelas`) VALUES
(2, 'Teknik Komputer 3C'),
(4, 'Manajemen Informatika 3C');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'aini', 'aininj847@gmail.com', 'default.jpg', '$2y$10$tmQKRNf09lmh9dywi0OIH.pBaKFTbw0fAYZzL890luPEl2fs1RMgK', 1, 1, 1601470596),
(6, 'agus', 'Agustimaizol217@gmail.com', 'default.jpg', '$2y$10$1n.GE5LGet4NBVemBCLdPOj.ZZm/GT1WBEwYUaFxTQ1KQlXxrwvkm', 2, 1, 1601653528),
(7, 'satria rahmat putra', 'satriarahmatputra@gmail.com', 'default.jpg', '$2y$10$s8Av9OXZ2KZyTxt7GXkOrOFqLv9eM/YrFmO4WA37fVbmz5R/3.5dy', 2, 1, 1605354561);

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
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5);

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
(2, 'User'),
(3, 'Menu'),
(4, 'Mahasiswa'),
(5, 'Absensi');

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
(1, 'admin'),
(2, 'user');

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
(2, 2, 'Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Data Mahasiswa', 'mahasiswa', 'fas fa-fw fa-user-graduate', 1),
(6, 4, 'Data Kelas', 'kelas', 'fas fa-fw fa-university', 1),
(7, 5, 'Jadwal', 'jadwal', 'far fa-fw fa-calendar-alt', 1),
(8, 5, 'Absensi', 'absensi', 'fas fa-fw fa-user', 1),
(9, 5, 'Rekap Absensi', 'rekapabsen', 'fas fa-fw fa-university', 1),
(10, 5, 'list absen', 'absensi/list', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tjadwal`
--
ALTER TABLE `tjadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tkelas`
--
ALTER TABLE `tkelas`
  ADD PRIMARY KEY (`id_kelas`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tjadwal`
--
ALTER TABLE `tjadwal`
  MODIFY `id_jadwal` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tkelas`
--
ALTER TABLE `tkelas`
  MODIFY `id_kelas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
