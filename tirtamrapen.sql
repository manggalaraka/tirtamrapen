-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 05:50 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tirtamrapen`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_bio_tm`
--

CREATE TABLE `akun_bio_tm` (
  `id_akun` int(11) NOT NULL,
  `nama_awal_akun` text NOT NULL,
  `nama_akhir_akun` text NOT NULL,
  `alamat_akun` varchar(100) NOT NULL,
  `tempat_lahir_akun` text NOT NULL,
  `tanggal_lahir_akun` datetime NOT NULL,
  `telepon_1_akun` varchar(20) NOT NULL,
  `telepon_2_akun` varchar(20) NOT NULL,
  `profile_picture_akun` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_bio_tm`
--

INSERT INTO `akun_bio_tm` (`id_akun`, `nama_awal_akun`, `nama_akhir_akun`, `alamat_akun`, `tempat_lahir_akun`, `tanggal_lahir_akun`, `telepon_1_akun`, `telepon_2_akun`, `profile_picture_akun`) VALUES
(1, 'manggala', 'raka', 'Jl watuwila 1 EIII no 14', 'Banjarmasin', '1992-05-14 00:00:00', '085641305000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `akun_user_tm`
--

CREATE TABLE `akun_user_tm` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` text NOT NULL,
  `email_akun` varchar(75) NOT NULL,
  `password_akun` varchar(64) NOT NULL,
  `previlege_akun` varchar(50) NOT NULL DEFAULT 'default',
  `pertanyaan_pemulih_akun` varchar(200) NOT NULL,
  `jawaban_pemulih_akun` varchar(200) NOT NULL,
  `login_time_akun` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banned_akun` enum('0','1') NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_user_tm`
--

INSERT INTO `akun_user_tm` (`id_akun`, `nama_akun`, `email_akun`, `password_akun`, `previlege_akun`, `pertanyaan_pemulih_akun`, `jawaban_pemulih_akun`, `login_time_akun`, `banned_akun`, `ip_address`) VALUES
(1, 'manggala', 'manggalaraka@gmail.com', '12345', 'default', 'siapa nama pertamamu kucingmu', 'rocky', '2016-11-27 03:39:09', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `denah_tm`
--

CREATE TABLE `denah_tm` (
  `id_denah_tm` varchar(10) NOT NULL,
  `id_galeri_tm` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denah_tm`
--

INSERT INTO `denah_tm` (`id_denah_tm`, `id_galeri_tm`) VALUES
('Gazebo4', 'galeri_1002');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_tm`
--

CREATE TABLE `galeri_tm` (
  `id_galeri_tm` varchar(150) NOT NULL,
  `judul_galeri_tm` varchar(50) NOT NULL,
  `info_galeri_tm` varchar(350) NOT NULL,
  `kategori_galeri_tm` varchar(25) NOT NULL,
  `foto_galeri_tm` varchar(30) NOT NULL DEFAULT 'galeri_default.jpg',
  `galeri_is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_tm`
--

INSERT INTO `galeri_tm` (`id_galeri_tm`, `judul_galeri_tm`, `info_galeri_tm`, `kategori_galeri_tm`, `foto_galeri_tm`, `galeri_is_deleted`) VALUES
('galeri_1001', 'Gazebo TM', 'tidak ada data', 'area_pengunjung', 'photo_galeri_1001.jpg', 'no'),
('galeri_1002', 'Gazebo Belakang', 'tidak ada data', 'area_pengunjung', 'photo_galeri_1002.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `menu_tm`
--

CREATE TABLE `menu_tm` (
  `id_menu_tm` varchar(10) NOT NULL,
  `nama_menu_tm` varchar(75) NOT NULL,
  `harga_menu_tm` bigint(10) NOT NULL,
  `info_menu_tm` varchar(1000) NOT NULL,
  `jenis_menu_tm` enum('makanan','minuman') NOT NULL,
  `kategori_menu_tm` enum('seafood','nonseafood','minuman') NOT NULL,
  `foto_menu_tm` varchar(20) NOT NULL DEFAULT 'default_menupic.jpg',
  `menu_is_deleted` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_tm`
--

INSERT INTO `menu_tm` (`id_menu_tm`, `nama_menu_tm`, `harga_menu_tm`, `info_menu_tm`, `jenis_menu_tm`, `kategori_menu_tm`, `foto_menu_tm`, `menu_is_deleted`) VALUES
('menu_1001', 'Cumi Bakar ', 50000, 'tidak ada', 'makanan', 'seafood', 'foodpic_1001.JPG', 'no'),
('menu_1002', 'Sambal Dabu Dabu', 5000, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1002.JPG', 'no'),
('menu_1003', 'Taoge Ikan Asin', 25000, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1003.JPG', 'no'),
('menu_1004', 'Sapo Tahu Ayam', 35000, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1004.JPG', 'no'),
('menu_1005', 'Udang Rica Rica', 75000, 'tidak ada', 'makanan', 'seafood', 'foodpic_1005.jpg', 'no'),
('menu_1006', 'Ca Kangkung Udang', 21000, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1006.jpg', 'no'),
('menu_1007', 'Lele Krez', 27500, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1007.jpg', 'no'),
('menu_1008', 'Bandeng Bakar Cabut Tulang', 45000, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1008.jpg', 'no'),
('menu_1009', 'Udang Goreng Tepung', 35000, 'tidak ada', 'makanan', 'seafood', 'foodpic_1009.jpg', 'no'),
('menu_1010', 'Ca Kangkung Tirta Mrapen', 12500, 'tidak ada', 'makanan', 'nonseafood', 'foodpic_1010.jpg', 'no'),
('menu_1011', 'Mie Goreng Seafood', 18500, 'tidak ada', 'makanan', 'seafood', 'foodpic_1011.jpg', 'no'),
('menu_1012', 'Gurame Sambal Rujak', 75000, 'tidak ada', 'makanan', 'seafood', 'foodpic_1012.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `photohead_profile_tm`
--

CREATE TABLE `photohead_profile_tm` (
  `id_photo` varchar(20) NOT NULL,
  `filename_photo` varchar(25) NOT NULL,
  `extension_photo` varchar(5) NOT NULL,
  `fullpath_photo` varchar(300) NOT NULL,
  `thumb_width_photo` int(4) NOT NULL,
  `thumb_height_photo` int(4) NOT NULL,
  `thumb_x_photo` int(5) NOT NULL DEFAULT '0',
  `thumb_y_photo` int(5) NOT NULL DEFAULT '0',
  `headphoto_is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photohead_profile_tm`
--

INSERT INTO `photohead_profile_tm` (`id_photo`, `filename_photo`, `extension_photo`, `fullpath_photo`, `thumb_width_photo`, `thumb_height_photo`, `thumb_x_photo`, `thumb_y_photo`, `headphoto_is_deleted`) VALUES
('BackgroundCover_1001', 'profile_main_1001.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 150, 226, 0, 0, '0'),
('BackgroundCover_1002', 'profile_main_1002.jpg', '.jpg', '', 0, 0, 0, 0, '0'),
('BackgroundCover_1003', 'profile_main_1003.jpg', '.jpg', '', 0, 0, 0, 0, '1'),
('BackgroundCover_1004', 'profile_main_1004.jpeg', '.jpeg', '', 0, 0, 0, 0, '0'),
('BackgroundCover_1005', 'profile_main_1005.jpg', '.jpg', '', 0, 0, 0, 0, '1'),
('BackgroundCover_1006', 'profile_main_1006.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 1024, 768, 0, 0, '1'),
('BackgroundCover_1007', 'profile_main_1007.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 1024, 768, 0, 0, '1'),
('BackgroundCover_1008', 'profile_main_1008.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 540, 156, 0, 0, '0'),
('BackgroundCover_1009', 'profile_main_1009.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 1011, 1011, 0, 0, '0'),
('BackgroundCover_1010', 'profile_main_1010.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 800, 604, 0, 0, '0'),
('BackgroundCover_1011', 'profile_main_1011.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 989, 691, 0, 0, '0'),
('BackgroundCover_1012', 'profile_main_1012.jpg', '.jpg', 'C:/xampp/htdocs/tirtamrapen/assets/TM_Public/img/background-head/', 960, 720, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `profile_tm`
--

CREATE TABLE `profile_tm` (
  `id_profile_tm` int(1) NOT NULL,
  `info_judul_tm` varchar(75) NOT NULL,
  `info_ketjudul_tm` varchar(75) NOT NULL,
  `info_cover_tm` varchar(250) NOT NULL,
  `info_tentang_tm` varchar(1000) NOT NULL,
  `info_galeri_tm` varchar(1000) NOT NULL,
  `info_telepon_tm` varchar(75) NOT NULL,
  `info_tm` varchar(200) NOT NULL,
  `info_lokasi_tm` varchar(750) NOT NULL,
  `gmap_lat_tm` float NOT NULL,
  `gmap_lng_tm` float NOT NULL,
  `gmap_zoom_tm` float NOT NULL,
  `profile_is_deleted` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_tm`
--

INSERT INTO `profile_tm` (`id_profile_tm`, `info_judul_tm`, `info_ketjudul_tm`, `info_cover_tm`, `info_tentang_tm`, `info_galeri_tm`, `info_telepon_tm`, `info_tm`, `info_lokasi_tm`, `gmap_lat_tm`, `gmap_lng_tm`, `gmap_zoom_tm`, `profile_is_deleted`) VALUES
(1, 'Tirta Mrapen', 'Ikan Bakar dan Pemancingan', 'BackgroundCover_1004', 'tidak ada data', 'tidak ada data', '085866353888', 'tidak ada data', 'Jl. Blabak Raya', -7.54794, 110.269, 14, '0');

-- --------------------------------------------------------

--
-- Table structure for table `webconfig_tm`
--

CREATE TABLE `webconfig_tm` (
  `id_config` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_bio_tm`
--
ALTER TABLE `akun_bio_tm`
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indexes for table `akun_user_tm`
--
ALTER TABLE `akun_user_tm`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `email_akun` (`email_akun`),
  ADD UNIQUE KEY `nama_akun` (`nama_akun`(75));

--
-- Indexes for table `denah_tm`
--
ALTER TABLE `denah_tm`
  ADD PRIMARY KEY (`id_denah_tm`);

--
-- Indexes for table `galeri_tm`
--
ALTER TABLE `galeri_tm`
  ADD PRIMARY KEY (`id_galeri_tm`);

--
-- Indexes for table `menu_tm`
--
ALTER TABLE `menu_tm`
  ADD UNIQUE KEY `id_menu_tm` (`id_menu_tm`),
  ADD UNIQUE KEY `nama_menu_tm` (`nama_menu_tm`);

--
-- Indexes for table `photohead_profile_tm`
--
ALTER TABLE `photohead_profile_tm`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `profile_tm`
--
ALTER TABLE `profile_tm`
  ADD PRIMARY KEY (`id_profile_tm`),
  ADD UNIQUE KEY `info_cover_tm` (`info_cover_tm`);

--
-- Indexes for table `webconfig_tm`
--
ALTER TABLE `webconfig_tm`
  ADD PRIMARY KEY (`id_config`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_user_tm`
--
ALTER TABLE `akun_user_tm`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile_tm`
--
ALTER TABLE `profile_tm`
  MODIFY `id_profile_tm` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webconfig_tm`
--
ALTER TABLE `webconfig_tm`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_bio_tm`
--
ALTER TABLE `akun_bio_tm`
  ADD CONSTRAINT `akun_bio_tm_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun_user_tm` (`id_akun`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
