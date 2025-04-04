-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2024 pada 08.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kirana-fitness`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_metode_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `id_user`, `id_paket`, `id_metode_pembayaran`) VALUES
(1718951080, 47, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_anggota`
--

CREATE TABLE `kartu_anggota` (
  `tgl_selesai` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kartu_anggota`
--

INSERT INTO `kartu_anggota` (`tgl_selesai`, `id_user`) VALUES
('2024-07-21', 47);

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL,
  `metode_bayar` varchar(5) NOT NULL,
  `no_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `metode_bayar`, `no_bayar`) VALUES
(1, 'Gopay', '0895355276543'),
(2, 'Dana', '0895322768964'),
(3, 'OVO', '0895355789652');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `durasi` varchar(8) NOT NULL,
  `harga` int(6) NOT NULL,
  `sesi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `durasi`, `harga`, `sesi`) VALUES
(1, '1 Bulan', 120000, '1'),
(2, '3 Bulan', 360000, '3'),
(3, '6 Bulan', 720000, '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `jtempo` date NOT NULL,
  `status` varchar(8) NOT NULL,
  `bukti` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tgl_pembayaran`, `jml_bayar`, `jtempo`, `status`, `bukti`) VALUES
(1718951080, '2024-06-21', 120000, '2024-06-22', 'Lunas', 'bukti1718951090.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `tgl_pendaftaran`, `id_user`, `id_paket`) VALUES
(1718951080, '2024-06-21', 47, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpanjangan`
--

CREATE TABLE `perpanjangan` (
  `id` int(11) NOT NULL,
  `tgl_perpanjangan` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'pelanggan'),
(3, 'member'),
(4, 'pemilik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jkel` varchar(9) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `jkel`, `alamat`, `notelp`, `image`, `role_id`, `tanggal_input`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$tbkQNi3CoP279LSICE/cpuwoMOkSChkYTJpPu6atboA65F9pUM482', '', '', '0895355209353', 'default.jpg', 1, 1713520098),
(38, 'pemilik', 'pemilik@gmail.com', '$2y$10$OD7AmVQF8DzqsP12dcg6Muw5Gu74szSVOUWdPf2HItZ.QBYoWTySa', '', '', '', 'default.jpg', 4, 1717739673),
(47, 'Khaurel', 'khaurel@gmail.com', '$2y$10$3m606guvZqUPQgflQTxLweErdM6ECYkgsTFxC5hkkQsc8IyIw0An6', 'Perempuan', 'Jl.Babengket, Kp.Cinangneng, Desa Cihideung Udik, RT04/RW02', '0895366787654', 'default.jpg', 3, 1718950242);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perpanjangan`
--
ALTER TABLE `perpanjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1718951081;

--
-- AUTO_INCREMENT untuk tabel `perpanjangan`
--
ALTER TABLE `perpanjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
