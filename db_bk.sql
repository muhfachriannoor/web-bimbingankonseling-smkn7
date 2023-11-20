-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Okt 2018 pada 13.47
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_angket`
--

CREATE TABLE `tb_angket` (
  `id_angket` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `gid` int(11) NOT NULL,
  `nomor_induk` varchar(50) NOT NULL,
  `nama_guru` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `foto_guru` text NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`gid`, `nomor_induk`, `nama_guru`, `email`, `foto_guru`, `username`) VALUES
(1, '123', 'Administrator', 'admin@gmail.com', '', 'admin'),
(2, '989', 'Test', 'muhammadfachriannoor@gmail.com', '', 'test'),
(3, '456', 'Asus Laptop', 'asus@gmail.com', 'asus_logo_ISOI.png', 'asus'),
(4, '789', 'Logitech', 'logitech@gmail.com', 'Logitech.jpg', 'logitech'),
(5, '0676', 'Syaiful', 'syaiful@gmail.com', '', 'syaiful');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_pelanggaran`
--

CREATE TABLE `tb_jenis_pelanggaran` (
  `jid` int(11) NOT NULL,
  `jenis_pelanggaran` text NOT NULL,
  `kpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_pelanggaran`
--

INSERT INTO `tb_jenis_pelanggaran` (`jid`, `jenis_pelanggaran`, `kpid`) VALUES
(1, 'Terlambat', 1),
(2, 'Tidak Hadir', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_pelanggaran`
--

CREATE TABLE `tb_kategori_pelanggaran` (
  `kpid` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_pelanggaran`
--

INSERT INTO `tb_kategori_pelanggaran` (`kpid`, `nama_kategori`) VALUES
(1, 'Tata Tertib');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kid` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `gid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kid`, `nama_kelas`, `gid`, `status`) VALUES
(1, 'XII RPL 2', 2, 1),
(2, 'XII RPL 1', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mail`
--

CREATE TABLE `tb_mail` (
  `mid` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `subjek` text NOT NULL,
  `isi` text NOT NULL,
  `waktu_mail` date NOT NULL,
  `nama_file` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mail`
--

INSERT INTO `tb_mail` (`mid`, `nama_kelas`, `subjek`, `isi`, `waktu_mail`, `nama_file`, `status`) VALUES
(1, 'XII RPL 2', 'Data Pelanggaran XII RPL 2', '<p>hasil</p>', '2017-11-23', 'Data_Pelanggaran_XII_RPL_2.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggaran`
--

CREATE TABLE `tb_pelanggaran` (
  `pid` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `waktu_pelanggaran` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `foto_pelanggaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggaran`
--

INSERT INTO `tb_pelanggaran` (`pid`, `jid`, `sid`, `uid`, `waktu_pelanggaran`, `keterangan`, `status`, `foto_pelanggaran`) VALUES
(1, 1, 1, 1, '2017-11-23', '<p>terlambat</p>', 1, ''),
(2, 2, 2, 1, '2017-11-23', '<p>20 Hari tidak masuk</p>', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `peid` int(11) NOT NULL,
  `nama_pengaturan` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `waktu_ubah` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `sid` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kid` int(11) NOT NULL,
  `foto_siswa` text NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`sid`, `nisn`, `nama_siswa`, `jenis_kelamin`, `kid`, `foto_siswa`, `username`) VALUES
(1, '0037', 'Muhammad Fachrian Noor', 'Laki-laki', 1, '', '0037'),
(2, '3212112', 'Patrick', 'Laki-laki', 2, '', '3212112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `desc_soal` text NOT NULL,
  `kid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `uid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` int(11) NOT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`uid`, `username`, `password`, `level`, `status_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 3, 1),
(3, 'asus', '936aa2d51122f827004e568af835d1c6', 4, 2),
(4, 'logitech', 'e484c7843b4d1a4bc3c6c6851cb4ed40', 4, 2),
(5, 'syaiful', 'b6963c5c79188269d9054a7aa4192fe8', 3, 1),
(6, '0037', '66ff67ba2a11f6975dd7293039ed593e', 5, 2),
(7, '3212112', '9405549c239c1bed52a9747bdbc8a1fe', 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angket`
--
ALTER TABLE `tb_angket`
  ADD PRIMARY KEY (`id_angket`),
  ADD KEY `sid` (`sid`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `id_soal_2` (`id_soal`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_jenis_pelanggaran`
--
ALTER TABLE `tb_jenis_pelanggaran`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `kpid` (`kpid`);

--
-- Indexes for table `tb_kategori_pelanggaran`
--
ALTER TABLE `tb_kategori_pelanggaran`
  ADD PRIMARY KEY (`kpid`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `tb_mail`
--
ALTER TABLE `tb_mail`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `kid` (`nama_kelas`);

--
-- Indexes for table `tb_pelanggaran`
--
ALTER TABLE `tb_pelanggaran`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `jid` (`jid`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`peid`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `kid` (`kid`),
  ADD KEY `uid` (`username`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `kid` (`kid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_angket`
--
ALTER TABLE `tb_angket`
  MODIFY `id_angket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_jenis_pelanggaran`
--
ALTER TABLE `tb_jenis_pelanggaran`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kategori_pelanggaran`
--
ALTER TABLE `tb_kategori_pelanggaran`
  MODIFY `kpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_mail`
--
ALTER TABLE `tb_mail`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pelanggaran`
--
ALTER TABLE `tb_pelanggaran`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `peid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_angket`
--
ALTER TABLE `tb_angket`
  ADD CONSTRAINT `tb_angket_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_angket_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `tb_siswa` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `tb_guru_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jenis_pelanggaran`
--
ALTER TABLE `tb_jenis_pelanggaran`
  ADD CONSTRAINT `tb_jenis_pelanggaran_ibfk_1` FOREIGN KEY (`kpid`) REFERENCES `tb_kategori_pelanggaran` (`kpid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mail`
--
ALTER TABLE `tb_mail`
  ADD CONSTRAINT `tb_mail_ibfk_1` FOREIGN KEY (`nama_kelas`) REFERENCES `tb_kelas` (`nama_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pelanggaran`
--
ALTER TABLE `tb_pelanggaran`
  ADD CONSTRAINT `tb_pelanggaran_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pelanggaran_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `tb_siswa` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pelanggaran_ibfk_3` FOREIGN KEY (`jid`) REFERENCES `tb_jenis_pelanggaran` (`jid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`kid`) REFERENCES `tb_kelas` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`kid`) REFERENCES `tb_kelas` (`kid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
