-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2022 pada 17.14
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cateringin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'Kelompok5-SE', '72f6410f98eef65498ca9729c1226206');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `halaman`
--

INSERT INTO `halaman` (`id`, `judul`, `kutipan`, `isi`, `tgl_isi`) VALUES
(6, 'Nikmati Berbagai Menu Spesial!', '', '<p><span style=\"color: rgb(0, 0, 0); font-family: Poppins, sans-serif; font-size: 18px;\">CATERINGIN hadir untuk menyediakan berbagai menu catering yang lezat, sehat, dan bergizi buat kamu! Pesen CATERINGIN sekarang juga!!</span></p><p><img src=\"../gambar/makanan.png\" data-filename=\"makanan.png\"><span style=\"color: rgb(0, 0, 0); font-family: Poppins, sans-serif; font-size: 18px;\"><br></span></p>', '2022-05-19 03:03:12'),
(11, 'Logo cateringin', '', '<p><img src=\"../gambar/logo cateringin.png\" data-filename=\"logo cateringin.png\"><br></p>', '2022-05-16 08:34:33'),
(12, 'Berbagai Pilihan Catering', '', '<p><span style=\"font-family: Poppins, sans-serif; text-align: center; background-color: rgb(221, 255, 188);\">Di CATERINGIN, ada banyak banget pilihan catering! Kamu tinggal pilih catering yang kamu mau!</span></p><p><img src=\"../gambar/Wrapper + Icon Berbagai Pilihan Catering.png\" data-filename=\"Wrapper + Icon Berbagai Pilihan Catering.png\"><span style=\"font-family: Poppins, sans-serif; text-align: center; background-color: rgb(221, 255, 188);\"><br></span><br></p>', '2022-05-16 08:46:31'),
(13, 'Custom Menu Catering', '', '<p><span style=\"font-family: Poppins, sans-serif; text-align: center; background-color: rgb(221, 255, 188);\">Setelah memilih catering yang kamu mau, kamu bisa nentuin menu cateringmu untuk lima hari!</span></p><p><img src=\"../gambar/Wrapper + Icon Custom Menu Catering.png\" data-filename=\"Wrapper + Icon Custom Menu Catering.png\"><span style=\"font-family: Poppins, sans-serif; text-align: center; background-color: rgb(221, 255, 188);\"><br></span><br></p>', '2022-05-16 08:49:32'),
(14, 'Pengiriman Catering', '', '<p><span style=\"font-family: Poppins, sans-serif; text-align: center; background-color: rgb(221, 255, 188);\">Habis kamu pilih catering dan menu catering, kami akan anterin makananmu! Kamu tinggal nunggu dan makanan dateng deh!</span></p><p><img src=\"../gambar/Wrapper + Icon Pengiriman Catering.png\" data-filename=\"Wrapper + Icon Pengiriman Catering.png\"><span style=\"font-family: Poppins, sans-serif; text-align: center; background-color: rgb(221, 255, 188);\"><br></span><br></p>', '2022-05-16 08:53:07'),
(15, 'Logo instagram', '', '<p><img src=\"../gambar/InstagramLogo.png\" data-filename=\"InstagramLogo.png\"><br></p>', '2022-05-16 08:55:18'),
(16, 'Logo facebook', '', '<p><img src=\"../gambar/FacebookLogo.png\" data-filename=\"FacebookLogo.png\"><br></p>', '2022-05-16 08:56:37'),
(17, 'Logo Twitter', '', '<p><img src=\"../gambar/TwitterLogo.png\" data-filename=\"TwitterLogo.png\"><br></p>', '2022-05-16 08:56:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_pesan`
--

CREATE TABLE `halaman_pesan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `halaman_pesan`
--

INSERT INTO `halaman_pesan` (`id`, `judul`, `kutipan`, `isi`, `tgl_isi`) VALUES
(2, 'Pemesanan Menu Catering', '', '<p><span style=\"font-family: Poppins, sans-serif; font-size: 18px;\">Pilihlah 5 Makanan untuk 5 Hari (1 Hari 1 Makanan)!</span><br></p>', '2022-05-19 12:27:52'),
(4, 'isi1', '', '<ul style=\"font-family: Poppins, sans-serif; font-size: 18px;\"><li>Waktu Pemesanan Catering Periode Ini:</li></ul>', '2022-05-19 02:49:34'),
(5, 'isi2', '', '<p><span style=\"font-family: Poppins, sans-serif; font-size: 18px;\">Senin, 13 Juni 2022 00.01 WIB - Jumat, 17 Juni 2022 18.00 WIB</span><br></p>', '2022-05-19 03:03:59'),
(6, 'isi3', '', '<ul style=\"font-family: Poppins, sans-serif; font-size: 18px;\"><li>Status Pemesanan Catering Periode Ini: Dibuka</li></ul>', '2022-05-19 12:28:32'),
(7, 'isi4', '', '<ul style=\"font-family: Poppins, sans-serif; font-size: 18px;\"><li>Periode Catering: Senin, 20 Juni 2022 - Jumat, 24 Juni 2022</li></ul>', '2022-05-19 03:07:59'),
(8, 'isi 5', '', '<ul style=\"font-family: Poppins, sans-serif; font-size: 18px;\"><li>Harga 5 Hari Catering: Rp 150.000</li></ul>', '2022-05-19 03:08:55'),
(9, 'Menu Catering', '', '<p><img src=\"../gambar/logo cateringin.png\" data-filename=\"logo cateringin.png\"><br></p>', '2022-05-19 03:10:06'),
(10, 'Mie Goreng Aceh', '', '<p><img src=\"../gambar/miegorengaceh.png\" data-filename=\"miegorengaceh.png\"><br></p>', '2022-05-19 03:13:52'),
(11, 'Nasi Bogana', '', '<p><img src=\"../gambar/nasibogana.png\" data-filename=\"nasibogana.png\"><br></p>', '2022-05-19 03:15:01'),
(12, 'Nasi Goreng', '', '<p><img src=\"../gambar/nasigoreng.png\" data-filename=\"nasigoreng.png\"><br></p>', '2022-05-19 03:17:12'),
(13, 'Nasi Uduk', '', '<p><img src=\"../gambar/nasiuduk.png\" data-filename=\"nasiuduk.png\"><br></p>', '2022-05-19 03:19:01'),
(14, 'Nasi Liwet', '', '<p><img src=\"../gambar/nasiliwet.png\" data-filename=\"nasiliwet.png\"><br></p>', '2022-05-19 03:19:49'),
(15, 'Nasi Gudeg', '', '<p><img src=\"../gambar/nasigudeg.png\" data-filename=\"nasigudeg.png\"><br></p>', '2022-05-19 03:21:48'),
(16, 'Logo instagram', '', '<p><img src=\"../gambar/InstagramLogo.png\" data-filename=\"InstagramLogo.png\"><br></p>', '2022-05-19 03:29:34'),
(17, 'Logo facebook', '', '<p><img src=\"../gambar/FacebookLogo.png\" data-filename=\"FacebookLogo.png\"><br></p>', '2022-05-19 03:30:49'),
(18, 'Logo Twitter', '', '<p><img src=\"../gambar/TwitterLogo.png\" data-filename=\"TwitterLogo.png\"><br></p>', '2022-05-19 03:31:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_riwayat`
--

CREATE TABLE `halaman_riwayat` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `halaman_riwayat`
--

INSERT INTO `halaman_riwayat` (`id`, `judul`, `kutipan`, `isi`, `tgl_isi`) VALUES
(1, 'Riwayat Pesanan', '', '<p><img src=\"../gambar/logo cateringin.png\" data-filename=\"logo cateringin.png\"><br></p>', '2022-05-19 06:10:47'),
(2, 'Logo instagram', '', '<p><img src=\"../gambar/InstagramLogo.png\" data-filename=\"InstagramLogo.png\"><br></p>', '2022-05-19 07:40:44'),
(3, 'Logo facebook', '', '<p><img src=\"../gambar/FacebookLogo.png\" data-filename=\"FacebookLogo.png\"><br></p>', '2022-05-19 07:41:46'),
(4, 'Logo Twitter', '', '<p><img src=\"../gambar/TwitterLogo.png\" data-filename=\"TwitterLogo.png\"><br></p>', '2022-05-19 07:42:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id_pesanan` int(11) NOT NULL,
  `makanan1` varchar(255) NOT NULL,
  `makanan2` varchar(255) NOT NULL,
  `makanan3` varchar(255) NOT NULL,
  `makanan4` varchar(255) NOT NULL,
  `makanan5` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL,
  `token_ganti_password` text NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp(),
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `makanan1` varchar(255) NOT NULL,
  `makanan2` varchar(255) NOT NULL,
  `makanan3` varchar(255) NOT NULL,
  `makanan4` varchar(255) NOT NULL,
  `makanan5` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_pesan` timestamp NULL DEFAULT current_timestamp(),
  `saldo` int(11) DEFAULT 0,
  `metode_pembayaran` int(11) NOT NULL,
  `telepon_akun` varchar(15) NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `email`, `nama_lengkap`, `password`, `status`, `token_ganti_password`, `tgl_isi`, `telepon`, `alamat`, `makanan1`, `makanan2`, `makanan3`, `makanan4`, `makanan5`, `catatan`, `tgl_pesan`, `saldo`, `metode_pembayaran`, `telepon_akun`, `id_pembayaran`) VALUES
(30, 'rizkyhertama@gmail.com', 'Rizky h', 'e10adc3949ba59abbe56e057f20f883e', '1', '', '2022-05-22 14:23:20', '0812313131431', 'Jl bintang raya no 91', 'Mie Goreng Aceh', 'Nasi Uduk', 'Nasi Liwet', 'Nasi Gudeg', 'Nasi Goreng', 'Jangan pedas', '2022-05-22 14:28:09', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `saldo` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_pesan`
--
ALTER TABLE `halaman_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `halaman_riwayat`
--
ALTER TABLE `halaman_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `halaman_pesan`
--
ALTER TABLE `halaman_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `halaman_riwayat`
--
ALTER TABLE `halaman_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `members` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
