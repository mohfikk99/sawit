-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2021 pada 17.13
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `id_kelompok` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `id_kelompok`, `nama`, `lahan`) VALUES
(25, '5', 'valkri', '5'),
(26, '5', 'eiger', '4'),
(27, '4', 'fikri', '3'),
(28, '4', 'bebas', '5'),
(29, '6', 'ultra', '5'),
(30, '6', 'ila', '2'),
(31, '6', 'fikri', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_sawit`
--

CREATE TABLE `harga_sawit` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_sawit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_sawit`
--

INSERT INTO `harga_sawit` (`id`, `tanggal`, `harga_sawit`) VALUES
(1, '2021-03-08', '200000'),
(3, '2021-07-07', '100000'),
(4, '2021-07-06', '70000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_sawit`
--

CREATE TABLE `hasil_sawit` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `transaksi` varchar(100) NOT NULL,
  `timbangan` varchar(100) NOT NULL,
  `harga_total_sawit` varchar(100) NOT NULL,
  `total_modal` varchar(100) NOT NULL,
  `hasil_bersih` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_sawit`
--

INSERT INTO `hasil_sawit` (`id`, `id_login`, `transaksi`, `timbangan`, `harga_total_sawit`, `total_modal`, `hasil_bersih`) VALUES
(6, 2, 'Transaksi 2', '50 ton', '1200000', '80000', '1120000'),
(8, 2, 'Transaksi 2', '70 ton', '1500000', '80000', '1420000'),
(9, 2, 'Transaksi 3', '20 Kg', '1200000', '1075000', '125000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_kelompok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `id_login`, `nama_kelompok`) VALUES
(4, 3, 'pertama'),
(5, 2, 'kedua'),
(6, 4, 'bunga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `level`) VALUES
(1, 'pendi', '123', 'admin'),
(2, 'ahmad', '123', 'user'),
(3, 'ila', '123', 'user'),
(4, 'ultra', '123', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modal`
--

CREATE TABLE `modal` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `transaksi` varchar(100) NOT NULL,
  `biaya_pupuk` varchar(100) NOT NULL,
  `biaya_obat` varchar(100) NOT NULL,
  `biaya_semprot` varchar(100) NOT NULL,
  `biaya_pupuk_pekerja` varchar(100) NOT NULL,
  `biaya_paras_pekerja` varchar(100) NOT NULL,
  `biaya_lainnya` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modal`
--

INSERT INTO `modal` (`id`, `id_login`, `transaksi`, `biaya_pupuk`, `biaya_obat`, `biaya_semprot`, `biaya_pupuk_pekerja`, `biaya_paras_pekerja`, `biaya_lainnya`, `total`) VALUES
(15, 2, 'Transaksi 1', '20000', '10000', '40000', '20000', '300000', '', '390000'),
(16, 2, 'Transaksi 2', '20000', '20000', '20000', '20000', '', '', '80000'),
(17, 2, 'Transaksi 3', '10000', '30000', '5000', '1000000', '30000', '', '1075000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembagian_lahan`
--

CREATE TABLE `pembagian_lahan` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `transaksi` varchar(100) NOT NULL,
  `hasil_bersih` varchar(100) NOT NULL,
  `total_lokasi` varchar(100) NOT NULL,
  `hasil_pembagi` varchar(100) NOT NULL,
  `lahan_anggota` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `hasil_akhir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembagian_lahan`
--

INSERT INTO `pembagian_lahan` (`id`, `id_login`, `transaksi`, `hasil_bersih`, `total_lokasi`, `hasil_pembagi`, `lahan_anggota`, `nama_anggota`, `hasil_akhir`) VALUES
(5, 2, 'Transaksi 3', '125000', '9', '13888.888888888889', '5', 'valkri', '69444.44444444444'),
(6, 2, 'Transaksi 3', '125000', '9', '13888.888888888889', '4', 'eiger', '55555.555555555555');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga_sawit`
--
ALTER TABLE `harga_sawit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_sawit`
--
ALTER TABLE `hasil_sawit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembagian_lahan`
--
ALTER TABLE `pembagian_lahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `harga_sawit`
--
ALTER TABLE `harga_sawit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hasil_sawit`
--
ALTER TABLE `hasil_sawit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pembagian_lahan`
--
ALTER TABLE `pembagian_lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
