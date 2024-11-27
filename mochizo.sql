-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2024 pada 20.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mochizo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id`, `name`, `created`, `modified`, `image`) VALUES
(17, 'myob', '2024-02-25 01:42:23', '2024-02-25 03:32:11', 'client-1.png'),
(18, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(19, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(20, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(21, 'myob\r\n', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(22, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 04:17:55', 'client-2.png'),
(23, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(24, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(25, 'myob', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(26, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(27, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(28, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(29, 'myob\r\n', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(30, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(31, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(32, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(33, 'myob', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(34, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(35, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(36, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(37, 'myob\r\n', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(38, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(39, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(40, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(41, 'myob', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(42, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(43, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(44, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png'),
(45, 'myob\r\n', '2024-02-25 01:42:23', '2024-02-25 02:00:22', 'client-1.png'),
(46, 'Belimo', '2024-02-25 01:50:14', '2024-02-25 01:50:14', 'client-2.png'),
(47, 'Litegrup', '2024-02-25 01:50:23', '2024-02-25 01:50:23', 'client-3.png'),
(48, 'Lilly', '2024-02-25 01:53:55', '2024-02-25 01:53:55', 'client-4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id`, `name`, `category`, `image`, `created`, `modified`) VALUES
(3, 'desain', 'Desain', 'IMG-20220325-WA0003-removebg.png', '2024-02-25 05:47:14', '2024-02-25 05:56:40'),
(4, 'branding', 'Branding', 'vbg_lomba_poster_gerigi_a6_dech.png', '2024-02-25 05:47:43', '2024-02-25 05:47:43'),
(5, 'photograpy', 'Photography', 'VBG_uiux_(7).png', '2024-02-25 05:47:56', '2024-02-25 05:47:56'),
(6, 'desain', 'Desain', 'IMG-20220325-WA0003-removebg.png', '2024-02-25 05:47:14', '2024-02-25 05:56:40'),
(7, 'branding', 'Branding', 'vbg_lomba_poster_gerigi_a6_dech.png', '2024-02-25 05:47:43', '2024-02-25 05:47:43'),
(8, 'photograpy', 'Photography', 'VBG_uiux_(7).png', '2024-02-25 05:47:56', '2024-02-25 05:47:56'),
(9, 'desain', 'Desain', 'IMG-20220325-WA0003-removebg.png', '2024-02-25 05:47:14', '2024-02-25 05:56:40'),
(10, 'branding', 'Branding', 'vbg_lomba_poster_gerigi_a6_dech.png', '2024-02-25 05:47:43', '2024-02-25 05:47:43'),
(11, 'photograpy', 'Photography', 'VBG_uiux_(7).png', '2024-02-25 05:47:56', '2024-02-25 05:47:56'),
(12, 'desain', 'Desain', 'IMG-20220325-WA0003-removebg.png', '2024-02-25 05:47:14', '2024-02-25 05:56:40'),
(13, 'branding', 'Branding', 'vbg_lomba_poster_gerigi_a6_dech.png', '2024-02-25 05:47:43', '2024-02-25 05:47:43'),
(14, 'photograpy', 'Photography', 'VBG_uiux_(7).png', '2024-02-25 05:47:56', '2024-02-25 05:47:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role_id` int(100) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `role_id`, `date_create`) VALUES
(4, 'nugroho', 'dwi', 'nugroho@gmail.com', '$2y$10$nhzzOpHOwhDUNR67DObOHe/BoDwgN.4bixrjpxNnhSPDnrDP6FMOq', 'default.png', 1, '2024-02-18 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
