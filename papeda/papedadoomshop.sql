-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2024 pada 13.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papedadoomshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `email`, `kata_sandi`) VALUES
(1, 'Antonius Afrialdi Seran', 'admin', 'antoniusseran60@gmail.com', '$2y$10$LauRIo4XhOOnr5PUFZJovu4FIxtjcAT6apVd5uxMf9xAJxuYgiIIW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `baner_utama`
--

CREATE TABLE `baner_utama` (
  `id_banner_utama` int(11) NOT NULL,
  `gambar_banner_utama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `baner_utama`
--

INSERT INTO `baner_utama` (`id_banner_utama`, `gambar_banner_utama`) VALUES
(1, 'slide1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bank`
--

CREATE TABLE `data_bank` (
  `id_data_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_bank`
--

INSERT INTO `data_bank` (`id_data_bank`, `nama_bank`, `nama_pengguna`, `no_rekening`) VALUES
(1, 'Mandiri', 'antonius Afrialdi Seran', '1600837940'),
(2, 'Mandiri', 'Daud', '16008494893');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keranjang`
--

CREATE TABLE `detail_keranjang` (
  `id_detail_keranjang` int(11) NOT NULL,
  `id_keranjang` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `nama_gambar`) VALUES
(1, 12, 'Jellyfish.jpg'),
(2, 12, 'Penguins.jpg'),
(3, 13, 'Tulips.jpg'),
(4, 14, 'Koala.jpg'),
(5, 15, 'Lighthouse.jpg'),
(6, 16, 'library-1147815_1280.jpg'),
(10, 19, 'Penguins.jpg'),
(11, 19, 'Koala.jpg'),
(14, 19, 'Jellyfish.jpg'),
(15, 20, 'Desert.jpg'),
(17, 20, 'Penguins.jpg'),
(22, 22, 'g18bulk3.jpg'),
(23, 22, 'g18bulk2.jpg'),
(24, 22, 'g18bulk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'aksesoris'),
(2, 'pakaian'),
(3, 'lainnya'),
(4, 'info');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_warna` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `tanggal_ditambah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pembeli`, `id_produk`, `id_warna`, `id_ukuran`, `jumlah`, `total`, `tanggal_ditambah`) VALUES
(18, 1, 22, 30, 27, 3, 300000.00, '2024-01-14 17:58:13'),
(19, 1, 19, 0, 0, 2, 600000.00, '2024-01-15 12:51:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` char(12) DEFAULT NULL,
  `gambar_pembeli` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email`, `no_hp`, `gambar_pembeli`, `username`, `kata_sandi`, `alamat`) VALUES
(1, 'aldi', 'aldi@gmail.com', '082399553291', 'koala.jpg', 'user', '$2y$10$WLH/xoykxiX/n4TaxEPt0OYM0kXsw4iZQgBn.N.3zvG8XE7cv5dS6', 'jalan.osok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_data_bank` int(11) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` char(12) DEFAULT NULL,
  `alamat_penjual` varchar(50) NOT NULL,
  `gambar_penjual` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `id_toko`, `id_data_bank`, `nama_penjual`, `username`, `email`, `no_hp`, `alamat_penjual`, `gambar_penjual`, `kata_sandi`) VALUES
(1, 1, 1, 'antonius', 'anton', 'aldiseran@gmail.com', '082399553291', 'doom', 'profil.jpg', '$2y$10$oleSynCjb4k8c0WiU3tSLuFHhj5aTXeBMKdg6miniLj8CcbgLJ6ty'),
(2, 2, 2, 'daud', 'daud', 'daud@gmail.com', '082399553291', 'doom', 'profil.jpg', '$2y$10$eCPYB3rjYANCQ.04tSYZne66B5PCio5VMDY7dlXT6/pl9KyoljdYO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_produk_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(10) UNSIGNED NOT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_produk_kategori`, `nama_produk`, `deskripsi`, `gambar_produk`, `harga`, `stok`, `ukuran`, `warna`) VALUES
(12, 1, 1, 'Bendo', 'buatan doom', 'Jellyfish.jpg', 10000.00, 2, 's', 'merah'),
(13, 3, 1, 'coba', 'barang ori', 'Tulips.jpg', 10000.00, 5, 's', 'ungu'),
(14, 1, 1, 'headphone', 'bisaaa', 'Koala.jpg', 200000.00, 3, 'kecil', 'merah'),
(15, 1, 1, 'Bendo', 'yoi', 'Lighthouse.jpg', 70000.00, 3, 's', 'merah'),
(16, 2, 1, 'kamera', 'canon', 'library-1147815_1280.jpg', 300000.00, 1, 's', 'hitam'),
(19, 3, 2, 'hewan', 'fauna', 'Jellyfish.jpg', 300000.00, 3, 'xl', 'coklat'),
(20, 2, 1, 'Bando', 'bchgcags', 'Desert.jpg', 10000.00, 100, 'kecil', 'merah'),
(22, 2, 2, 'baju', 'baju bagus dan kuat', 'g18bulk3.jpg', 100000.00, 3, 'xl', 'putih');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_produk_kategori` int(11) NOT NULL,
  `nama_kategori_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_produk_kategori`, `nama_kategori_produk`) VALUES
(1, 'anak'),
(2, 'orang tua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_penjual`
--

CREATE TABLE `produk_penjual` (
  `id_produk_penjual` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_penjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_penjual`
--

INSERT INTO `produk_penjual` (`id_produk_penjual`, `id_produk`, `id_penjual`) VALUES
(1, 1, 1),
(2, 13, 1),
(3, 14, 1),
(4, 15, 2),
(5, 16, 2),
(8, 19, 1),
(9, 20, 1),
(11, 22, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `deskrip_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `deskrip_toko`, `alamat_toko`) VALUES
(1, 'AntStore', 'AntStore menyediakan produk produk dari doom berupa pakaian buatan tangan', 'pulau doom rk 6'),
(2, 'DudStore', 'DaudStore menyediakan produk produk dari doom berupa aksesoris buatan tangan', 'pulau doom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tanggal_pemesanan` datetime DEFAULT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_ukuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `id_produk`, `nama_ukuran`) VALUES
(10, 12, 's'),
(11, 12, 'm'),
(12, 13, 's'),
(13, 13, 's'),
(14, 14, 'kecil'),
(15, 15, 's'),
(16, 16, 's'),
(20, 19, 'kecil'),
(21, 19, 'sedang'),
(22, 19, 'xl'),
(25, 20, 'kecil'),
(27, 22, 'xl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_penjual` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `rating_produk` int(11) DEFAULT NULL,
  `rating_toko` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_produk`, `id_penjual`, `id_pengguna`, `rating_produk`, `rating_toko`, `komentar`) VALUES
(1, 1, 1, NULL, 2, 2, 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id_warna`, `id_produk`, `nama_warna`) VALUES
(10, 12, 'merah'),
(11, 12, 'hitam'),
(12, 13, 'merah'),
(13, 13, 'ungu'),
(14, 14, 'merah'),
(15, 15, 'merah'),
(16, 16, 'hitam'),
(20, 19, 'merah'),
(21, 19, 'hitam'),
(22, 19, 'coklat'),
(26, 19, 'coklat'),
(27, 20, 'merah'),
(29, 22, 'putih'),
(30, 22, 'htitam'),
(31, 22, 'biru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `baner_utama`
--
ALTER TABLE `baner_utama`
  ADD PRIMARY KEY (`id_banner_utama`);

--
-- Indeks untuk tabel `data_bank`
--
ALTER TABLE `data_bank`
  ADD PRIMARY KEY (`id_data_bank`);

--
-- Indeks untuk tabel `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD PRIMARY KEY (`id_detail_keranjang`),
  ADD KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_pengguna` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_data_bank` (`id_data_bank`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id_produk_kategori`);

--
-- Indeks untuk tabel `produk_penjual`
--
ALTER TABLE `produk_penjual`
  ADD PRIMARY KEY (`id_produk_penjual`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pembeli`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `baner_utama`
--
ALTER TABLE `baner_utama`
  MODIFY `id_banner_utama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_bank`
--
ALTER TABLE `data_bank`
  MODIFY `id_data_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  MODIFY `id_detail_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id_produk_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk_penjual`
--
ALTER TABLE `produk_penjual`
  MODIFY `id_produk_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD CONSTRAINT `detail_keranjang_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`),
  ADD CONSTRAINT `detail_keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `penjual_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`),
  ADD CONSTRAINT `penjual_ibfk_2` FOREIGN KEY (`id_data_bank`) REFERENCES `data_bank` (`id_data_bank`);

--
-- Ketidakleluasaan untuk tabel `produk_penjual`
--
ALTER TABLE `produk_penjual`
  ADD CONSTRAINT `produk_penjual_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `produk_penjual_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

--
-- Ketidakleluasaan untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `ulasan_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
