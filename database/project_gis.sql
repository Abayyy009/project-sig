-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Apr 2025 pada 02.53
-- Versi server: 8.0.30
-- Versi PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `maps`
--

CREATE TABLE `maps` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `info` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `maps`
--

INSERT INTO `maps` (`id`, `title`, `description`, `info`, `image`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(14, 'Kinara Kost Cozy', 'CPMJ+QQ8, Jl. Lkr. Perwira, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680', '<p>Harga 1.800.000</p>\r\n<p>&nbsp;</p>', 'img-1741764230.jpg', '-6.5655986', '106.7317443', '2025-03-12 07:23:49', '2025-03-13 03:00:12'),
(15, 'Kost Wisma Intan', 'Jl. Cibeureum Situ Leutik No.88, Dramaga, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680, Indonesia', 'https://maps.app.goo.gl/Y7tzGC3o4aXRzeKeA', 'img-1741775403.jpg', '-6.5665644', '106.7319725', '2025-03-12 10:30:02', NULL),
(17, 'Kost Putri - Puri Rahadini', 'Jl. Raya Dramaga No.23A, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680', 'https://maps.app.goo.gl/rqcSxX9asgmPdWEY9', 'img-1741786321.png', '-6.5639022', '106.7310968', '2025-03-12 13:20:18', '2025-03-12 13:32:01'),
(21, 'Kost Nabila', 'CPPJ+7M3, Jl. Lkr. Perwira, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680', '<p>https://maps.app.goo.gl/d2A8HzUa5uwQE7BK9</p>', 'img-1743513067.jpg', '-6.5643615', '106.7323254', '2025-04-01 13:11:07', '2025-04-01 13:15:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `web_title` varchar(100) NOT NULL,
  `web_description` text NOT NULL,
  `map_zoom` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`web_title`, `web_description`, `map_zoom`, `updated_at`) VALUES
('GeoKost.Id', 'Sistem Informasi Geografis Pemetaan Kost di Kecamatan Dramaga', 15, '2025-03-12 13:25:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Akbar Firdaus', 'admin', '$2y$10$DyHK6sokP6zes8VGD7j5Ue5Z3FRTQjRx.t0A8CupIaT2MhI0KXiO2', 'img-1744085372.jpg', '2018-05-02 14:00:00', '2025-04-08 04:09:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
