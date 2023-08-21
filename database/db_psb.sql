-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2023 pada 06.47
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `nama_panggil` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agama_siswa` varchar(15) NOT NULL,
  `alamat_siswa` varchar(200) NOT NULL,
  `nama_orangtua` varchar(128) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `agama_orangtua` varchar(15) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat_orangtua` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama_siswa`, `nama_panggil`, `tempat_lahir`, `tanggal_lahir`, `jk`, `agama_siswa`, `alamat_siswa`, `nama_orangtua`, `pekerjaan`, `agama_orangtua`, `telp`, `alamat_orangtua`, `status`) VALUES
(1, 'Gage Harmon', 'Dolore ut et tempore', 'Quibusdam commodo co', '1979-10-02', 'Wanita', 'Quisquam nulla ', 'Id ut est beatae ha', 'April Mcgowan', 'Molestias delectus ', 'Inventore sint ', '90', 'Delectus exercitati', 'Menunggu..');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `namalengkap` varchar(128) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `akses` int(3) DEFAULT NULL,
  `isActive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `namalengkap`, `username`, `password`, `akses`, `isActive`) VALUES
(1, 'RIZAL FAUZI', 'admin', '$2y$05$drWIqF01dzjM3euAF/UYH.h/dbnh7v1gpapGB0yPk9sUyx3dn3d72', 1, 1),
(2, 'Gage Harmon', 'gage', '$2y$05$Mbia18qetXbD.57Uci1kBuIvnyVUksM93oY.KRKD7pLURhz1wTOwq', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
