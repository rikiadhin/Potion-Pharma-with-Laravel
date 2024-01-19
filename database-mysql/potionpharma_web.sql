-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2023 pada 09.47
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
-- Database: `potionpharma_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bentukobat`
--

CREATE TABLE `tb_bentukobat` (
  `nomor` int(10) NOT NULL,
  `id_bentuk` varchar(30) NOT NULL,
  `bentuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bentukobat`
--

INSERT INTO `tb_bentukobat` (`nomor`, `id_bentuk`, `bentuk`) VALUES
(1, 'KAPSULE', 'Bentuk Kapsule'),
(3, 'LARUTAN', 'Larutan'),
(4, 'PIL', 'Pil'),
(6, 'SALEP', 'Salep'),
(5, 'SERBUK', 'Serbuk'),
(2, 'TABLET', 'Bentuk Tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosis`
--

CREATE TABLE `tb_dosis` (
  `nomor` int(30) NOT NULL,
  `id_dosis` varchar(30) NOT NULL,
  `dosis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dosis`
--

INSERT INTO `tb_dosis` (`nomor`, `id_dosis`, `dosis`) VALUES
(3, '1X1', '1 kali sehari'),
(2, '2X1', '2 kali sehari'),
(1, '3X1', '3 kali sehari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `nomor` int(10) NOT NULL,
  `id_golongan` varchar(30) NOT NULL,
  `golongan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_golongan`
--

INSERT INTO `tb_golongan` (`nomor`, `id_golongan`, `golongan`) VALUES
(1, 'BEBAS', 'Obat Bebas'),
(7, 'HERBAL', 'Obat Herbal'),
(3, 'KERAS', 'Obat Keras'),
(5, 'NARKOTIKA', 'Obat Golongan Narkotika'),
(6, 'PSIKOTROPIKA', 'Obat Psikotropika'),
(2, 'TERBATAS', 'Obat Bebas Terbatas'),
(4, 'WAJIB_APOTIK', 'Obat Wajib Apotek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kemasan`
--

CREATE TABLE `tb_kemasan` (
  `nomor` int(10) NOT NULL,
  `id_kemasan` varchar(30) NOT NULL,
  `kemasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kemasan`
--

INSERT INTO `tb_kemasan` (`nomor`, `id_kemasan`, `kemasan`) VALUES
(2, 'DOS10', 'Dos isi 10 Pcs'),
(1, 'DOS5', 'Dos isi 5 Pcs'),
(3, 'Pcs', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_obat` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `username`, `id_obat`, `gambar`, `nama_obat`, `jumlah`, `harga`) VALUES
(65, 'rikiadhin', '211', 'product_01.png', 'Ultraflu', '8', '48000'),
(66, 'rikiadhin', '1234577', 'product_02.png', 'Paramex', '10', '70000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `numbering` int(10) NOT NULL,
  `gambar` text NOT NULL,
  `id_toko` int(10) NOT NULL,
  `id_obat` varchar(30) NOT NULL,
  `nama_obat` text NOT NULL,
  `nama_standar_MIMS` text NOT NULL,
  `deskripsi` text NOT NULL,
  `manfaat` text NOT NULL,
  `jumlah_kemasan` int(10) NOT NULL,
  `id_kemasan` varchar(30) NOT NULL,
  `id_dosis` varchar(30) NOT NULL,
  `id_penyajian` varchar(30) NOT NULL,
  `id_golongan` varchar(30) NOT NULL,
  `id_bentuk` varchar(30) NOT NULL,
  `nomor_izin_edar` varchar(30) NOT NULL,
  `komposisi` text NOT NULL,
  `jumlah_stok` int(30) NOT NULL,
  `expired` date NOT NULL,
  `harga` varchar(30) NOT NULL,
  `referensi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`numbering`, `gambar`, `id_toko`, `id_obat`, `nama_obat`, `nama_standar_MIMS`, `deskripsi`, `manfaat`, `jumlah_kemasan`, `id_kemasan`, `id_dosis`, `id_penyajian`, `id_golongan`, `id_bentuk`, `nomor_izin_edar`, `komposisi`, `jumlah_stok`, `expired`, `harga`, `referensi`) VALUES
(18, 'product_02.png', 17, '1234577', 'Paramex', '65464', 'obat', 'meredakan batuk', 2, 'DOS10', '1X1', 'SBLM_MKN', 'BEBAS', 'KAPSULE', '123456', 'Psikotoprika', 45, '0000-00-00', '7000', 'PT Kimia Farma'),
(17, 'product_01.png', 17, '211', 'Ultraflu', '65464', 'obat', 'meredakan batuk', 1, 'DOS10', '1X1', 'SBLM_MKN', 'BEBAS', 'KAPSULE', '1234567', 'Psikotoprika', 50, '0000-00-00', '6000', 'PT Kimia Farma'),
(23, 'low-poly-planet-earth-3d-model-low-poly-obj-fbx-stl-blend-dae.jpg', 18, '23132113', 'Bodrex 111111111', '547044443', 'Obat Panas', 'Meredakan Obat Panas', 4, 'Pcs', '3X1', 'STLH_MKN', 'TERBATAS', 'TABLET', '9072454225', 'a9u0rjscsdv', 45, '2026-07-09', '3000', 'jhfjfnf'),
(25, '1.jpg', 22, '87264924', 'Paracetamol', '5453543', 'obat', 'meredakan pusing', 5, 'DOS5', '3X1', 'STLH_MKN', 'HERBAL', 'PIL', '76575', 'obat', 90, '2023-12-14', '6000', 'obat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `userid` int(10) NOT NULL,
  `foto_profil` varchar(30) NOT NULL,
  `usernameUser` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`userid`, `foto_profil`, `usernameUser`, `email`, `kota`, `provinsi`) VALUES
(97, 'parent.png', 'pembeli', 'mrsquarepain@gmail.com', 'Surakarta', 'Jawa Tengah'),
(98, '', 'pembeli10', '', '', ''),
(99, '', 'pembeli102', '', '', ''),
(107, '', 'pembeli11', 'mrsquarepain@gmail.com', 'Surakarta', 'Jawa Tengah'),
(103, '', 'pfdadodned', '', '', ''),
(100, 'profil.jpeg', 'rikiadhin', 'rikiadhin@gmail.com', 'Karanganyar', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjual`
--

CREATE TABLE `tb_penjual` (
  `userid` int(10) NOT NULL,
  `foto_profil` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penjual`
--

INSERT INTO `tb_penjual` (`userid`, `foto_profil`, `username`, `email`, `kota`, `provinsi`) VALUES
(101, '', 'adhinugroho', 'mrsquarepain@gmail.com', 'Surakarta', 'Jawa Tengah'),
(106, '', 'deddj0e9d', '', '', ''),
(96, '', 'penjual', '', '', ''),
(108, '', 'penjual20', 'penjual20@gmail.com', 'Solo', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyajian`
--

CREATE TABLE `tb_penyajian` (
  `nomor` int(10) NOT NULL,
  `id_penyajian` varchar(30) NOT NULL,
  `penyajian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penyajian`
--

INSERT INTO `tb_penyajian` (`nomor`, `id_penyajian`, `penyajian`) VALUES
(2, 'SBLM_MKN', 'Diminum sebelum makan'),
(1, 'STLH_MKN', 'Diminum setelah makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_obat` varchar(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `username`, `id_obat`, `jumlah`, `harga`, `waktu`, `status`) VALUES
(65, 'rikiadhin', '211', 8, '48000', '2023-12-25 09:19:39', 'In Order'),
(66, 'rikiadhin', '1234577', 10, '70000', '2023-12-25 09:19:58', 'In Order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(10) NOT NULL,
  `namatoko` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `usernameUser` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `namatoko`, `alamat`, `pemilik`, `usernameUser`) VALUES
(17, NULL, NULL, NULL, 'penjual'),
(18, 'INDAH SEKALI 123', 'Surakarta 123', 'rikiadhin 123', 'adhinugroho'),
(21, '', '', '', 'deddj0e9d'),
(22, 'Pharma Indah', 'Banjar', 'Utas Prasojo', 'penjual20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nomortelepon` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'pembeli'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `fullname`, `username`, `nomortelepon`, `password`, `role`) VALUES
(101, 'Riki Adhi Nugroho', 'adhinugroho', '089522993032', '$2y$12$e1FPTM4glSe.kre6iqo5qeks3xeC8fvLnZ9gpKQIH73Xs1r47q9VO', 'penjual'),
(106, 'ihodied', 'deddj0e9d', '9083469824', '$2y$12$sXlAKAukGrs7OuqDvr369.yM.q5xfcmmJfkC5vQC3AI5w7AralWpu', 'penjual'),
(97, 'pembeli', 'pembeli', '089522993032', '$2y$12$Yq4MNKqUjuAOhuQ5Txs8AO01ROSMBaQDpkS9lsrXu4rT6FSvXGN3i', 'pembeli'),
(98, 'pembeli10', 'pembeli10', '8888888888888', '$2y$12$hUa14CFdg21yos6OU7Uu0eEjpPexGv9STsoqDOEtxRS9APoed4rK.', 'pembeli'),
(99, 'pembeli102', 'pembeli102', '9090909090', '$2y$12$vGVcZSpTB9QYykox7t/55.fvh/lwW4IvWC51VnVuWWN5IvEc6oCPW', 'pembeli'),
(107, 'pembeli11', 'pembeli11', '089522993032', '$2y$12$OKsPWbsCFd.kfcXa9Jk6/uLxNEjkU22gj6IrrLew1EsDfECaQZd7q', 'pembeli'),
(96, 'penjual', 'penjual', '089522993032', '$2y$12$UxNtioE50Ytowkpba4fYA.v53s8zi2M8O1ALRaa3tKLR/dz.j8JuG', 'penjual'),
(108, 'penjual20', 'penjual20', '8791946333333', '$2y$12$Dp1GTgElRrPTI28zGfeRuekY7Bd8RgVZ4u7qYq/alSR/sRP24lt8m', 'penjual'),
(103, 'pfdadodned', 'pfdadodned', '8102793333342', '$2y$12$8lHDLnRPgZF7Kebg.RNYfuvPJ.7wOWbqEowNkGNjhwklXrsKGDSoW', 'pembeli'),
(100, 'Riki Adhi Nugroho', 'rikiadhin', '087736440044', '$2y$12$ZTFqLqLAgRyHLAasVDB0p.uckc65gudbN3k5Sm2tun7dLrmMg3VRK', 'pembeli'),
(16, 'upin', 'upin', '1234567', '$2y$10$ERaGCnSNZdlEyi/Kk/9a.Ozm/mgidZWpK.c.ZUUX..LfkpsjmemvS', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bentukobat`
--
ALTER TABLE `tb_bentukobat`
  ADD PRIMARY KEY (`id_bentuk`),
  ADD KEY `nomor` (`nomor`);

--
-- Indeks untuk tabel `tb_dosis`
--
ALTER TABLE `tb_dosis`
  ADD PRIMARY KEY (`id_dosis`),
  ADD KEY `nomor` (`nomor`) USING BTREE;

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`),
  ADD KEY `nomor` (`nomor`);

--
-- Indeks untuk tabel `tb_kemasan`
--
ALTER TABLE `tb_kemasan`
  ADD PRIMARY KEY (`id_kemasan`),
  ADD KEY `nomor` (`nomor`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `nomor` (`numbering`),
  ADD KEY `id_kemasan` (`id_kemasan`),
  ADD KEY `id_dosis` (`id_dosis`),
  ADD KEY `id_penyajian` (`id_penyajian`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_bentuk` (`id_bentuk`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`usernameUser`),
  ADD KEY `userid` (`userid`),
  ADD KEY `username` (`usernameUser`);

--
-- Indeks untuk tabel `tb_penjual`
--
ALTER TABLE `tb_penjual`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `tb_penyajian`
--
ALTER TABLE `tb_penyajian`
  ADD PRIMARY KEY (`id_penyajian`),
  ADD KEY `nomor` (`nomor`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD UNIQUE KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `username_2` (`username`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD UNIQUE KEY `id_toko_2` (`id_toko`),
  ADD KEY `usernameUser` (`usernameUser`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bentukobat`
--
ALTER TABLE `tb_bentukobat`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_dosis`
--
ALTER TABLE `tb_dosis`
  MODIFY `nomor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kemasan`
--
ALTER TABLE `tb_kemasan`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `numbering` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_penyajian`
--
ALTER TABLE `tb_penyajian`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_keranjang_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `tb_obat_ibfk_2` FOREIGN KEY (`id_golongan`) REFERENCES `tb_golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_3` FOREIGN KEY (`id_penyajian`) REFERENCES `tb_penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_4` FOREIGN KEY (`id_dosis`) REFERENCES `tb_dosis` (`id_dosis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_5` FOREIGN KEY (`id_kemasan`) REFERENCES `tb_kemasan` (`id_kemasan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_6` FOREIGN KEY (`id_toko`) REFERENCES `tb_toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_7` FOREIGN KEY (`id_bentuk`) REFERENCES `tb_bentukobat` (`id_bentuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD CONSTRAINT `tb_pembeli_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penjual`
--
ALTER TABLE `tb_penjual`
  ADD CONSTRAINT `tb_penjual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penjual_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `tb_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pesanan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD CONSTRAINT `tb_toko_ibfk_1` FOREIGN KEY (`usernameUser`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
