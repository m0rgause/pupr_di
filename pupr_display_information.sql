-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 07:46 PM
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
-- Database: `pupr_display_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_asesmen`
--

CREATE TABLE `jadwal_asesmen` (
  `id` int(11) NOT NULL,
  `ruang_asesmen_id` int(11) NOT NULL,
  `asesor` varchar(255) DEFAULT NULL,
  `peserta` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_asesmen`
--

INSERT INTO `jadwal_asesmen` (`id`, `ruang_asesmen_id`, `asesor`, `peserta`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmad Baihaki Nur', 'Ridha Talasya Widyanti', '2024-05-23', '2024-05-09 13:44:56', '2024-05-09 13:48:19'),
(3, 2, 'Shinchan', 'Dinda Aryani', NULL, '2024-05-27 13:55:50', '2024-05-27 13:55:50'),
(4, 3, 'Nina Bobo', 'Nacha', NULL, '2024-05-30 08:31:59', '2024-05-30 08:31:59'),
(5, 5, 'Vivi', 'Affa', NULL, '2024-05-30 08:33:10', '2024-05-30 08:33:10'),
(6, 6, 'Couwy', 'arrow', NULL, '2024-05-30 08:33:20', '2024-05-30 08:33:20'),
(7, 7, 'Miya', 'Nana', NULL, '2024-05-30 08:33:29', '2024-05-30 08:33:29'),
(8, 8, 'pororo', 'buni', NULL, '2024-05-30 08:33:48', '2024-05-30 08:33:48'),
(9, 9, 'bubun', 'kapu', NULL, '2024-05-30 08:34:15', '2024-05-30 08:34:15'),
(10, 10, 'jett', 'killjoy', NULL, '2024-05-30 08:34:29', '2024-05-30 08:34:29'),
(11, 11, 'diluc', 'baizhu', NULL, '2024-05-30 08:34:45', '2024-05-30 08:34:45'),
(12, 12, 'zhongli', 'nopal', NULL, '2024-05-30 08:34:57', '2024-05-30 08:34:57'),
(13, 13, 'Raha', 'Galih', NULL, '2024-05-31 09:12:46', '2024-05-31 09:12:46'),
(14, 14, 'dea', 'regi', NULL, '2024-05-31 09:13:20', '2024-05-31 09:13:20'),
(15, 15, 'akali', 'seraphine', NULL, '2024-05-31 09:13:46', '2024-05-31 09:13:46'),
(16, 16, 'master yi', 'nami', NULL, '2024-05-31 09:13:58', '2024-05-31 09:13:58'),
(17, 17, 'zilong', 'alucard', NULL, '2024-05-31 09:14:07', '2024-05-31 09:14:07'),
(18, 18, 'yuji', 'gojo', NULL, '2024-05-31 09:14:18', '2024-05-31 09:14:18'),
(19, 19, 'moka', 'minji', NULL, '2024-05-31 09:14:34', '2024-05-31 09:14:34'),
(20, 20, 'Natasha Wilona', 'Rizky', NULL, '2024-05-31 09:14:57', '2024-05-31 09:14:57'),
(21, 21, 'Mila', 'Gunawan', NULL, '2024-05-31 09:15:08', '2024-05-31 09:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id` int(11) NOT NULL,
  `lantai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id`, `lantai`) VALUES
(4, 'Lantai 3'),
(5, 'Lantai 4');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `lantai_id` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `menu_slug` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `is_desc` tinyint(1) DEFAULT NULL,
  `title_desc` varchar(255) DEFAULT NULL,
  `body_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `lantai_id`, `menu`, `menu_slug`, `video`, `is_desc`, `title_desc`, `body_desc`) VALUES
(15, 5, 'Lobi Utama', 'lobi-utama', 'videos/QyEP1CMKABFlLLMLi56Bcgf2BjJXDdOgHLR2ClIk.mp4', 1, 'Pengertian', 'Adalah area sentral atau ruang tunggu utama yang berfungsi sebagai tempat pertemuan, interaksi, dan komunikasi antara pengunjung, pejabat, dan personel terkait,'),
(16, 5, 'Ruang Klasikal', 'ruang-klasikal', 'videos/RVwhp0ol9Wxepnohz4RokqeVnGjuZkEvsCjuOkxN.mp4', 1, 'Pengertian', 'Adalah tempat yang digunakan untuk rapat internal dan eksternal karyawan, seminar dan acara lainnya. dilengkapi dengan meja dan kursi rapat yang nyaman, serta perlengkapan teknologi seperti layar proyeksi dan sound system.'),
(25, 5, 'Ruang Staf', 'ruang-staf', 'videos/HaDdLozeIZENzzogoEV2AvzGGuDTKyTk6dFD6JJY.mp4', 1, 'Pengertian', 'Adalah area kerja yang diperuntukkan bagi para karyawan untuk aktivitas kerja seperti penelitian, perencanaan, koordinasi, dan pelaporan. Ruang ini dilengkapi dengan meja, kursi, dan perlengkapan kantor lainnya.'),
(26, 5, 'Ruang Asesmen', 'ruang-asesmen', 'videos/H9Yy3WAKZjgLT0prFlA6LfjNtssSGgucOY4sKqf4.mp4', 0, NULL, ''),
(27, 5, 'Mushala', 'mushala', 'videos/2OPukNriVZ0wmDDgLXr2GGjpLynHxNiA9ZDmcuHE.mp4', 0, NULL, ''),
(28, 5, 'Toilet', 'toilet', 'videos/iTfGqsbCKWEWNWqi1iSiv3ZHpb3A9V6I9ag0itA0.mp4', 1, 'Pengertian', 'Berbagai kelebihan yang terdapat di toilet Balai Penilaian Kompetensi, antara lain:<br />\r\n1. Sabun<br />\r\n2. Body Lotion<br />\r\n3. Tisu<br />\r\n4. Pembalut<br />\r\n5. Shower<br />\r\n6. Wastafel<br />\r\n7. Tempat Sampah<br />\r\n8. Keran Wudhu'),
(29, 4, 'Ruang Asesmen', 'ruang-asesmen', 'videos/s0spcJL6RLHbQovPpdKbqXkQDtVJotD2Xl5qtwti.mp4', 0, NULL, ''),
(30, 4, 'Ruang Asesor', 'ruang-asesor', 'videos/F5ts25XdXaQnuWu8sC9w0yM7c9eOJof0QJhORY7n.mp4', 1, 'Pengertian', 'Adalah tempat dimana asesor melakukan asesmen terhadap kompetensi seseorang. Asesmen berupa uji kompetensi, sertifikasi, dan penilaian kinerja.'),
(31, 4, 'Ruang LGD', 'ruang-lgd', 'videos/6uSCUCvOxE9YwhxPhjlEnSb1iL9QWAdy4q0b0gaL.mp4', 1, 'Pengertian', 'Adalah ruang yang digunakan untuk diskusi di mana semua orang memiliki kesempatan yang sama untuk menjadi pemimpin. Artinya, tidak perlu adanya inisiatif dari salah satu peserta untuk menjadi leader maupun moderator. Namun, biasanya di akhir diskusi akan ada satu orang yang akan memaparkan kesimpulan dan penutup.'),
(32, 4, 'Ruang Podcast', 'ruang-podcast', 'videos/n0quuZFdkuEw3MOhUaSrZNcbe9TFXf6L3b7fOFJL.mp4', 1, 'Pengertian', 'Adalah ruangan untuk merekam dan menyiarkan podcast tentang topik terkait pekerjaan umum dan perumahan. Digunakan untuk membuat konten youtube Balai Penilaian Kompetensi (BAPENSI).'),
(33, 4, 'Perpustakaan', 'perpustakaan', 'videos/tTkcBe2Karxod0qLTXPtEE0Jd6KLfgnPk1WtpEFz.mp4', 1, 'Pengertian', 'Adalah area tempat penyimpanan dan akses sumber informasi tertulis terkait dengan pekerjaan umum dan perumahan. Ini mencakup buku, jurnal, dokumen, dan materi referensi lainnya. Ruang ini difungsikan untuk mendukung penelitian, pembelajaran, dan pengembangan.'),
(34, 4, 'Mushala', 'mushala', 'videos/wdTrAVJIcapwHzIYiT67jTeJLaTl23NNBw5kOo2B.mp4', 0, NULL, ''),
(35, 4, 'Toilet', 'toilet', 'videos/3YGma6oKgUHSJ74zPYF8jfTdmJVJvNSWbrYHKOuF.mp4', 1, 'Pengertian', 'Berbagai kelebihan yang terdapat di toilet Balai Penilaian Kompetensi, antara lain:<br />\n1. Sabun<br />\n2. Body Lotion<br />\n3. Tisu<br>\n4. Pembalut<br>\n5. Shower<br />\n6. Wastafel<br />\n7. Tempat Sampah<br />\n8. Keran Wudhu');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_asesmen`
--

CREATE TABLE `ruang_asesmen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang_asesmen`
--

INSERT INTO `ruang_asesmen` (`id`, `nama`) VALUES
(1, 'R 01'),
(2, 'R 02'),
(3, 'R 03'),
(5, 'R 04'),
(6, 'R 05'),
(7, 'R 06'),
(8, 'R 07'),
(9, 'R 08'),
(10, 'R 09'),
(11, 'R 10'),
(12, 'R 11'),
(13, 'R 12'),
(14, 'R 13'),
(15, 'R 14'),
(16, 'R 15'),
(17, 'R 16'),
(18, 'R 17'),
(19, 'R 18'),
(20, 'R 19'),
(21, 'R 20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `web_profile_id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `web_profile_id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', '$2a$12$zgnsyvIccBHhJVfOERQQWuYUG6q46NClwSR99eZcL0uDn.dDUfZAO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_profile`
--

CREATE TABLE `web_profile` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `web` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `maskot` varchar(255) DEFAULT NULL,
  `teks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_profile`
--

INSERT INTO `web_profile` (`id`, `title`, `instagram`, `facebook`, `youtube`, `whatsapp`, `twitter`, `web`, `logo`, `banner`, `maskot`, `teks`) VALUES
(1, 'BALAI PENILAIAN KOMPETENSI', 'https://www.instagram.com/kemenpupr/?hl=id', 'https://www.facebook.com/KemenPUPR/?locale=id_ID', 'https://www.youtube.com/channel/UCsu09VO9BJl-nW2-2W4Xvaw', '6281383110575', 'https://twitter.com/KemenPU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://pu.go.id/', '1715344003.png', '1715344035.png', '1715344055.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_asesmen`
--
ALTER TABLE `jadwal_asesmen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKjadwal_ase768107` (`ruang_asesmen_id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmenu573201` (`lantai_id`);

--
-- Indexes for table `ruang_asesmen`
--
ALTER TABLE `ruang_asesmen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKuser304815` (`web_profile_id`);

--
-- Indexes for table `web_profile`
--
ALTER TABLE `web_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_asesmen`
--
ALTER TABLE `jadwal_asesmen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ruang_asesmen`
--
ALTER TABLE `ruang_asesmen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_profile`
--
ALTER TABLE `web_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_asesmen`
--
ALTER TABLE `jadwal_asesmen`
  ADD CONSTRAINT `FKjadwal_ase768107` FOREIGN KEY (`ruang_asesmen_id`) REFERENCES `ruang_asesmen` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FKmenu573201` FOREIGN KEY (`lantai_id`) REFERENCES `lantai` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKuser304815` FOREIGN KEY (`web_profile_id`) REFERENCES `web_profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
