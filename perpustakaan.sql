-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2022 pada 19.39
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_anggota` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `foto`, `nama_anggota`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(30, 'AP0001', 'team-img1.jpg', 'Anang Syah Amirul Haqim', 'Laki-laki', 'Jepara', 89670068639),
(31, 'AP0002', 'team-img2.jpg', 'Zainuddin', 'Laki-laki', 'Wedelan', 8274928477),
(32, 'AP0003', 'team-img3.jpg', 'Muhammad Reza Nur Aditya', 'Laki-laki', 'Krasak Bangsri', 85747928849),
(33, 'AP0004', 'team-img4.jpg', 'Ariandita Hadi Nugroho', 'Laki-laki', 'Bondo', 89564727487),
(35, 'AP0005', 'nft1.jpg', 'Havis ', 'Laki-laki', 'Kembang', 89277189948),
(42, 'AP0007', 'nft2.png', 'reza aditya pratama', 'Laki-laki', 'krasak', 85637167811),
(44, 'AP0009', 'nft7.jpg', 'zahra naswa', 'Perempuan', 'bandung', 8535162733),
(45, 'AP0010', 'nft6.jpg', 'Airlangga', 'Laki-laki', 'Malang', 85789299274),
(47, 'AP0011', 'nft5.jpg', 'Fitri', 'Perempuan', 'Surabaya', 858827738);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `id_pengarang` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `id_pengarang`, `id_penerbit`, `judul_buku`, `tahun_terbit`, `jumlah`) VALUES
(18, 'BK0001', 7, 2, 'Belajar Laravel', 2022, 9),
(19, 'BK0002', 5, 2, 'Belajar React native', 2021, 5),
(20, 'BK0003', 8, 4, 'Pemrograman java', 2020, 2),
(21, 'BK0004', 9, 5, 'Harry Poter', 2010, 19),
(23, 'BK0006', 9, 2, 'Belajar MERN stack', 2022, 4),
(25, 'BK0007', 9, 3, 'Belajar React JS', 2022, 29),
(26, 'BK0008', 10, 7, 'Cerita Mistis Gunung Salak', 2022, 29),
(27, 'BK0009', 11, 8, 'Misteri Pulau Yang Menghilang', 2017, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'petugas', 'petugas', '570c396b3fc856eceb8aa7357f32af1a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `kode_peminjaman` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `kode_peminjaman`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
(24, 'PM0002', 44, 26, '2022-05-04', '2022-05-11');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `jmlh_after_pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW UPDATE buku SET buku.jumlah = buku.jumlah -1 WHERE buku.id_buku = new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(2, 'dika firnanda'),
(3, 'Tatang Sutarman'),
(4, 'Sherand'),
(5, 'Peter'),
(6, 'yudha'),
(7, 'joseph'),
(8, 'Lintang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(5, 'yudi huh'),
(8, 'Rais'),
(9, 'John'),
(10, 'erza'),
(11, 'Yayan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `kode_pengembalian` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `kode_pengembalian`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembalikan`) VALUES
(8, '', 30, 18, '2022-04-29', '2022-05-06', '2022-04-29'),
(9, '', 35, 22, '2022-04-30', '2022-05-07', '2022-04-30'),
(10, '', 32, 20, '2022-04-30', '2022-05-07', '2022-05-04'),
(11, '', 30, 21, '2022-05-04', '2022-05-11', '2022-05-04'),
(12, '', 30, 23, '2022-04-30', '2022-05-07', '2022-05-04'),
(13, '', 45, 22, '2022-05-04', '2022-05-11', '2022-05-04'),
(14, '', 35, 20, '2022-05-04', '2022-05-11', '2022-05-04'),
(15, '', 31, 25, '2022-05-04', '2022-05-11', '2022-05-04'),
(16, '', 47, 27, '2022-05-06', '2022-05-13', '2022-05-06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
