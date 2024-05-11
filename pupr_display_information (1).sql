-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Bulan Mei 2024 pada 06.44
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `jadwal_asesmen`
--

CREATE TABLE `jadwal_asesmen` (
  `id` int NOT NULL,
  `ruang_asesmen_id` int NOT NULL,
  `asesor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_asesmen`
--

INSERT INTO `jadwal_asesmen` (`id`, `ruang_asesmen_id`, `asesor`, `peserta`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmad Baihaki Nur', 'Ridha Talasya Widyanti', '2024-05-09 13:44:56', '2024-05-09 13:48:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lantai`
--

CREATE TABLE `lantai` (
  `id` int NOT NULL,
  `lantai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lantai`
--

INSERT INTO `lantai` (`id`, `lantai`) VALUES
(4, 'Lantai 3'),
(5, 'Lantai 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `lantai_id` int NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_desc` tinyint(1) DEFAULT NULL,
  `title_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_desc` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `lantai_id`, `menu`, `menu_slug`, `video`, `is_desc`, `title_desc`, `body_desc`) VALUES
(2, 4, 'Asesmen', 'asesmen', 'videos/c4TWNccgBvkSJzqRZgAJc8B7EG8dohCyZiEeRrN2.mp4', 0, NULL, NULL),
(3, 4, 'Ruang Asesor', 'ruang-asesor', 'videos/i0MjM6NNsepoMlKiunGCYxwEzv0gf5Uc3sgabIiu.mp4', 1, 'Pengertian', 'Adalah tempat dimana asesor melakukan asesmen terhadap kompetensi seseorang. Asesmen berupa uji kompetensi, sertifikasi, dan penilaian kerja.'),
(4, 4, 'Ruang LGD', 'ruang-lgd', 'videos/DjTvHzV35FByB5vfybeNwabkG0YE9V2Wywz807ER.mp4', 1, 'Pengertian', 'Adalah ruang yang digunakan untuk diskusi di mana semua orang memiliki kesempatan yang sama untuk menjadi pemimpin. Artinya, tidak perlu adanya inisiatif dari salah satu peserta untuk menjadi leader maupun moderator. Namun, biasanya di akhir diskusi akan ada satu orang yang akan memaparkan kesimpulan dan penutup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_asesmen`
--

CREATE TABLE `ruang_asesmen` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruang_asesmen`
--

INSERT INTO `ruang_asesmen` (`id`, `nama`) VALUES
(1, 'R 01'),
(2, 'R 02'),
(3, 'R 03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `web_profile_id` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `web_profile_id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', '$2a$12$zgnsyvIccBHhJVfOERQQWuYUG6q46NClwSR99eZcL0uDn.dDUfZAO', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_profile`
--

CREATE TABLE `web_profile` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `youtube` text COLLATE utf8mb4_unicode_ci,
  `whatsapp` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `web` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maskot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `web_profile`
--

INSERT INTO `web_profile` (`id`, `title`, `instagram`, `facebook`, `youtube`, `whatsapp`, `twitter`, `web`, `logo`, `banner`, `maskot`, `teks`) VALUES
(1, 'BALAI PENILAIAN KOMPETENSI', 'https://www.instagram.com/kemenpupr/?hl=id', 'https://www.facebook.com/KemenPUPR/?locale=id_ID', 'https://www.youtube.com/channel/UCsu09VO9BJl-nW2-2W4Xvaw', '6281383110575', 'https://twitter.com/KemenPU?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://pu.go.id/', '1715344003.png', '1715344035.png', '1715344055.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_asesmen`
--
ALTER TABLE `jadwal_asesmen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKjadwal_ase768107` (`ruang_asesmen_id`);

--
-- Indeks untuk tabel `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmenu573201` (`lantai_id`);

--
-- Indeks untuk tabel `ruang_asesmen`
--
ALTER TABLE `ruang_asesmen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKuser304815` (`web_profile_id`);

--
-- Indeks untuk tabel `web_profile`
--
ALTER TABLE `web_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_asesmen`
--
ALTER TABLE `jadwal_asesmen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ruang_asesmen`
--
ALTER TABLE `ruang_asesmen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `web_profile`
--
ALTER TABLE `web_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_asesmen`
--
ALTER TABLE `jadwal_asesmen`
  ADD CONSTRAINT `FKjadwal_ase768107` FOREIGN KEY (`ruang_asesmen_id`) REFERENCES `ruang_asesmen` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FKmenu573201` FOREIGN KEY (`lantai_id`) REFERENCES `lantai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKuser304815` FOREIGN KEY (`web_profile_id`) REFERENCES `web_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
