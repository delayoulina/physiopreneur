-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21 Mar 2017 pada 20.02
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_physiopreneur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_pasien`
--

CREATE TABLE `tb_jenis_pasien` (
  `id` int(11) NOT NULL,
  `jenis_pasien` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_pasien`
--

INSERT INTO `tb_jenis_pasien` (`id`, `jenis_pasien`) VALUES
(1, 'Pelajar'),
(2, 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id` int(11) NOT NULL,
  `jenis_pembayaran` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_pembayaran`
--

INSERT INTO `tb_jenis_pembayaran` (`id`, `jenis_pembayaran`, `biaya`) VALUES
(1, 'Single Visit', 250000),
(2, '5 Cares', 1000000),
(3, '10 Cares', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_manager`
--

CREATE TABLE `tb_manager` (
  `id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_manager` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_metode_pembayaran`
--

CREATE TABLE `tb_metode_pembayaran` (
  `id` int(11) NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_metode_pembayaran`
--

INSERT INTO `tb_metode_pembayaran` (`id`, `metode_pembayaran`) VALUES
(1, 'Cash'),
(2, 'Debet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id` int(11) NOT NULL,
  `kode_pasien` varchar(6) NOT NULL,
  `id_jenis_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` blob NOT NULL,
  `free_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id`, `kode_pasien`, `id_jenis_pasien`, `nama_pasien`, `tanggal_lahir`, `no_hp`, `alamat`, `foto`, `free_pass`) VALUES
(1, '', 1, 'Satrio Wibowo', '1995-06-04', '082331012663', 'Bandung', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `foto` blob NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `id_metode_pembayaran` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_rekam_medik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekam_medik`
--

CREATE TABLE `tb_rekam_medik` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosa` text NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekam_medik_tindakan`
--

CREATE TABLE `tb_rekam_medik_tindakan` (
  `id` int(11) NOT NULL,
  `id_rekam_medik` int(11) NOT NULL,
  `id_tindakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tindakan`
--

CREATE TABLE `tb_tindakan` (
  `id` int(11) NOT NULL,
  `tindakan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tindakan`
--

INSERT INTO `tb_tindakan` (`id`, `tindakan`) VALUES
(1, 'Manual Therapy'),
(2, 'Hot / Ice'),
(3, 'Functional Exercise'),
(4, 'Ultrasound Dithermy'),
(5, 'Infrared'),
(6, 'Tens / ES'),
(7, 'Laser'),
(8, 'Gym'),
(9, 'Drill'),
(10, 'Jogging');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `id_role`) VALUES
(1, 'satrio', 'wibowo', 2),
(2, 'teguh', 'piganta', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`) VALUES
(1, 'Manager'),
(2, 'Physiotherapist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_pasien`
--
ALTER TABLE `tb_jenis_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_manager`
--
ALTER TABLE `tb_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_pasien` (`id_jenis_pasien`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_pembayaran` (`id_jenis_pembayaran`,`id_metode_pembayaran`,`id_pegawai`),
  ADD KEY `id_metode_pembayaran` (`id_metode_pembayaran`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_rekam_medik` (`id_rekam_medik`);

--
-- Indexes for table `tb_rekam_medik`
--
ALTER TABLE `tb_rekam_medik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`,`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_rekam_medik_tindakan`
--
ALTER TABLE `tb_rekam_medik_tindakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rekam_medik` (`id_rekam_medik`,`id_tindakan`),
  ADD KEY `id_tindakan` (`id_tindakan`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_pembayaran` (`id_jenis_pembayaran`,`id_lokasi`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_pasien`
--
ALTER TABLE `tb_jenis_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_manager`
--
ALTER TABLE `tb_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_metode_pembayaran`
--
ALTER TABLE `tb_metode_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_rekam_medik`
--
ALTER TABLE `tb_rekam_medik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_rekam_medik_tindakan`
--
ALTER TABLE `tb_rekam_medik_tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tindakan`
--
ALTER TABLE `tb_tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_manager`
--
ALTER TABLE `tb_manager`
  ADD CONSTRAINT `tb_manager_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD CONSTRAINT `tb_pasien_ibfk_1` FOREIGN KEY (`id_jenis_pasien`) REFERENCES `tb_jenis_pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pegawai_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `tb_jenis_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `tb_metode_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_4` FOREIGN KEY (`id_rekam_medik`) REFERENCES `tb_rekam_medik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rekam_medik`
--
ALTER TABLE `tb_rekam_medik`
  ADD CONSTRAINT `tb_rekam_medik_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekam_medik_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rekam_medik_tindakan`
--
ALTER TABLE `tb_rekam_medik_tindakan`
  ADD CONSTRAINT `tb_rekam_medik_tindakan_ibfk_1` FOREIGN KEY (`id_rekam_medik`) REFERENCES `tb_rekam_medik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekam_medik_tindakan_ibfk_2` FOREIGN KEY (`id_tindakan`) REFERENCES `tb_tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD CONSTRAINT `tb_tarif_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tarif_ibfk_2` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `tb_jenis_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
