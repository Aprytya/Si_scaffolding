-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2021 pada 15.10
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scaffolding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `role_id`) VALUES
(1, 'Mutya Ariesta', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `satuan`, `ukuran`, `harga_barang`, `stok`, `keluar`, `gambar`) VALUES
(1, 'MF170', 'Main Frame 170', 'Pcs', '170cmX120cm', 1200, 1015, 0, 'MainFrame1704.jpg'),
(2, 'CB220', 'Cross Brace 220', 'Pcs', '220cm', 900, 2304, 1, 'CrossBrace2201.jpg'),
(3, 'JP', 'Join Pin', 'Pcs', '40cm', 100, 4000, 0, 'jointpin1.jpg'),
(4, 'LF90', 'Leader Frame 90', 'Pcs', '90X120cm', 1000, 875, 0, 'LadderFrame901.jpg'),
(5, 'CB193', 'Cross Brace 193', 'Pcs', '193cm', 700, 965, 0, 'CrossBrace1931.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama_penyewa` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `username`, `nama_penyewa`, `alamat`, `pekerjaan`, `no_hp`, `no_ktp`, `password`, `role_id`) VALUES
(1, 'Ahmads', 'Ahmad Subarjo', 'Jalan Raya Bangtan Word No 06', 'Army', '08199999999', '123456789099888', '75a283681e52fb94305e23dfdd72a402', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` varchar(15) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `denda` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_sewa` varchar(15) NOT NULL,
  `status_pengembalian` varchar(15) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
