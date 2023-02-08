-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Des 2022 pada 09.03
-- Versi server: 10.2.44-MariaDB-cll-lve
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kakh6797_emagang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `absen` datetime NOT NULL,
  `keterangan` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_user`, `tgl`, `absen`, `keterangan`) VALUES
(41, 11, '2022-12-03 00:00:00', '2022-12-03 16:51:45', '2'),
(42, 12, '2022-12-07 00:00:00', '0000-00-00 00:00:00', '0'),
(43, 14, '2022-12-07 00:00:00', '0000-00-00 00:00:00', '0'),
(44, 12, '2022-12-10 00:00:00', '0000-00-00 00:00:00', '0'),
(45, 14, '2022-12-10 00:00:00', '0000-00-00 00:00:00', '0'),
(46, 15, '2022-12-10 00:00:00', '2022-12-07 11:55:36', '2'),
(47, 12, '2022-12-12 00:00:00', '0000-00-00 00:00:00', '0'),
(48, 14, '2022-12-12 00:00:00', '0000-00-00 00:00:00', '0'),
(49, 16, '2022-12-12 00:00:00', '2022-12-12 19:37:40', '2'),
(50, 12, '2022-12-13 00:00:00', '0000-00-00 00:00:00', '0'),
(51, 14, '2022-12-13 00:00:00', '0000-00-00 00:00:00', '0'),
(52, 16, '2022-12-13 00:00:00', '2022-12-12 19:47:04', '2'),
(53, 12, '2022-12-14 00:00:00', '0000-00-00 00:00:00', '0'),
(54, 14, '2022-12-14 00:00:00', '0000-00-00 00:00:00', '0'),
(55, 17, '2022-12-14 00:00:00', '2022-12-12 20:13:06', '2'),
(56, 12, '2022-12-15 00:00:00', '0000-00-00 00:00:00', '0'),
(57, 14, '2022-12-15 00:00:00', '0000-00-00 00:00:00', '0'),
(58, 17, '2022-12-15 00:00:00', '2022-12-12 20:13:48', '2'),
(59, 12, '2022-12-30 00:00:00', '0000-00-00 00:00:00', '0'),
(60, 14, '2022-12-30 00:00:00', '0000-00-00 00:00:00', '0'),
(61, 12, '2022-12-22 00:00:00', '0000-00-00 00:00:00', '0'),
(62, 14, '2022-12-22 00:00:00', '0000-00-00 00:00:00', '0'),
(63, 18, '2022-12-22 00:00:00', '2022-12-13 11:45:17', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(5) NOT NULL,
  `nama_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Sekretariat'),
(2, 'Pelayanan Bidang Pengujian Kendaraan Bermotor'),
(3, 'Pelayanan Bidang Angkutan Jalan'),
(4, 'Pelayanan Bidang Lalu Lintas Jalan'),
(5, 'Pelayanan Bidang Perhubungan Laut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kriteria` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `deskripsi`) VALUES
(7, 'Disiplin', ''),
(8, 'Kerja Sama', ''),
(9, 'Inisiatif', ''),
(10, 'Kerapian', ''),
(11, 'Tanggung Jawab', ''),
(22, 'Penyelesaian Tugas', ''),
(23, 'Kerajinan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `kegiatan` text NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logbook`
--

INSERT INTO `logbook` (`id_logbook`, `id_user`, `tgl`, `kegiatan`, `nilai`) VALUES
(16, 11, '2022-12-03', '', 0),
(17, 15, '2022-12-07', '', 0),
(18, 16, '2022-12-12', 'pppp\r\nkkkk\r\nmmm', 90),
(19, 16, '2022-12-12', 'mmmm', 80),
(20, 17, '2022-12-12', 'mnmn', 99),
(21, 17, '2022-12-12', 'bbbbbb', 70),
(22, 18, '2022-12-13', 'bv', 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `magang`
--

CREATE TABLE `magang` (
  `id_magang` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL,
  `id_bidang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `magang`
--

INSERT INTO `magang` (`id_magang`, `id_user`, `awal`, `akhir`, `id_bidang`) VALUES
(15, 11, '2022-12-28', '2022-12-13', 3),
(16, 12, '2022-12-27', '2022-12-07', 3),
(17, 14, '2022-12-01', '2022-12-31', 3),
(18, 15, '2022-12-07', '2022-12-31', 2),
(19, 16, '2022-12-12', '2022-12-31', 1),
(20, 17, '2022-12-13', '2022-12-31', 5),
(21, 18, '2022-12-14', '2023-03-15', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_user`, `id_kriteria`, `nilai`) VALUES
(170, 11, 7, 100),
(171, 11, 8, 100),
(172, 11, 9, 100),
(173, 11, 10, 100),
(174, 11, 11, 90),
(175, 11, 22, 80),
(176, 11, 23, 80),
(177, 15, 7, 100),
(178, 15, 8, 90),
(179, 15, 9, 90),
(180, 15, 10, 90),
(181, 15, 11, 100),
(182, 15, 22, 90),
(183, 15, 23, 90),
(184, 16, 7, 100),
(185, 16, 8, 98),
(186, 16, 9, 89),
(187, 16, 10, 88),
(188, 16, 11, 96),
(189, 16, 22, 85),
(190, 16, 23, 88),
(191, 17, 7, 100),
(192, 17, 8, 90),
(193, 17, 9, 76),
(194, 17, 10, 67),
(195, 17, 11, 80),
(196, 17, 22, 85),
(197, 17, 23, 70),
(198, 18, 7, 100),
(199, 18, 8, 80),
(200, 18, 9, 78),
(201, 18, 10, 78),
(202, 18, 11, 80),
(203, 18, 22, 98),
(204, 18, 23, 88);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_user`, `tanggal`) VALUES
(3, 11, '2022-12-03'),
(4, 15, '2022-12-07'),
(5, 16, '2022-12-12'),
(6, 17, '2022-12-12'),
(7, 18, '2022-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_staf` int(5) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text NOT NULL,
  `file_staf` text NOT NULL,
  `file_peserta` text NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('belum','sudah','proses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_user`, `id_staf`, `judul`, `keterangan`, `file_staf`, `file_peserta`, `tgl`, `status`) VALUES
(12, 15, 0, 'jkhjkhk', 'gjhgjh', '1670389829_859e9af60243cb37d85d.jpeg', '1670389886_8730e678e5b4b3276d91.jpg', '2022-12-07', 'sudah'),
(13, 16, 0, 'bbb', 'bbb', '1670848704_007b22bc8edda862ca39.docx', '1670848748_40089f29aac22cc8a6f4.pdf', '2022-12-12', 'sudah'),
(14, 16, 0, 'bbbb', 'zzzz', '1670849122_53d293f3822606297c6f.xlsx', '', '2022-12-12', 'belum'),
(15, 16, 0, 'xxxee', 'eee', '1670849258_f9be3cccf32aae1b3549.pptx', '', '2022-12-12', 'belum'),
(16, 16, 0, 'xxqq', 'qq', '1670849317_d18eacf1615d3c99eaa4.pptx', '', '2022-12-12', 'belum'),
(17, 16, 0, 'cc', 'cc', '1670849354_cb0b9221d6cfdb9d5b23.pptx', '', '2022-12-12', 'belum'),
(18, 17, 0, 'xq', 'q', '1670850633_c9326c31ce8619ade0c5.pptx', '1670850689_07b5dba29e938401014c.pdf', '2022-12-12', 'sudah'),
(19, 18, 0, 'nnn', 'nnn', '1670906764_36a4bcd86d8b692ad60a.pptx', '1670906836_f52a22cd382ce6f67254.docx', '2022-12-13', 'sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nim` bigint(15) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` enum('peserta','staf') NOT NULL,
  `nama` text NOT NULL,
  `ttl` text NOT NULL,
  `no_hp` text NOT NULL,
  `alamat` text NOT NULL,
  `jurusan` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `file_rekom` text NOT NULL,
  `photo` text NOT NULL,
  `email` text NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nim`, `username`, `password`, `level`, `nama`, `ttl`, `no_hp`, `alamat`, `jurusan`, `asal_sekolah`, `file_rekom`, `photo`, `email`, `status`) VALUES
(8, 181250000241, 'asa', 'asa', 'staf', 'Asa Sulaidah', 'jepara, 08 agus2999', '09809890', 'depok', 'kjhasjkhajkshkj', 'unis', '1668735649_5008335b2fc90005f1dd.jpg', '', '', '2'),
(11, 181250000251, 'sulis', 'sulis', 'peserta', 'Sulaiman Salk', 'Jepara, 29 Agustus 2002', '085333034958', 'Desamlonggo', 'Sistem Informasi', 'SMA MLONGGO', '1670060694_c4849d505eb390d981e3.jpg', '1670067578_3d95a0f553295b722cf3.png', 'syaifudinrosyad29@gmail.com', '2'),
(12, 98789, 'kj', 'h', 'peserta', 'kjhjkh', 'kjhkjh', 'kjhkjh', 'kjh', 'kjh', 'kj', '1670071361_8341db6254f962d2af85.png', '', 'kjh', '1'),
(13, 18728127187, 'susu', 'susu', 'peserta', 'nana', 'jepara, 29 agus 2022', '089898293892', 'jepara', 'elektro', 'unisnu', '1670071423_5dc9eb054c886b50213b.png', '', 'syaifudinrosyad29@gmail.com', '0'),
(14, 98897987, 'dayat', 'dayat', 'peserta', 'hgjhgjhg', 'Jepara, 1 Juni 2000', '87688686', 'hgfhghgfhgfffffffhgfh', 'jhgjhg', 'kjgjhg', '1670072443_bd74a749c8ad865b1a69.png', '', 'aulyashabrina@gmail.com', '1'),
(15, 181, 'aulya', 'aulya', 'peserta', 'aulya', 'jepara 10 okt', '0891234567', 'hshsjsjs', 'jsjsjsj', 'smk 1 jepara', '1670388349_11e811bfc597e1f752ba.jpg', '', 'aulyashabrina@gmail.com', '2'),
(16, 1818181, 'sasa', 'sasa', 'peserta', 'Sasa', 'Jepara, 20 Desember 1999', '0808080', 'Jln. Kalinyamat Jepara', 'Sistem Informasi', 'Universitas Islam Nahdlatul Ulama Jepara', '1670848509_8f3a25428360cb2811ec.jpg', '1670849608_9b6eb566d82dd91ce99b.jpg', 'aulyashabrina@gmail.com', '2'),
(17, 9999, 'babecabita', 'babe123', 'peserta', 'Babe', 'Jepara, 20 Desember 1999', '898989', 'Jln. Melati', 'Sistem Informasi', 'Universitas Islam Nahdlatul Ulama Jepara', '1670850503_076e392e7cbc88b583b7.jpg', '1670850565_bb9fcc9ecbe49a29efcd.jpg', 'aulyashabrina@gmail.com', '2'),
(18, 121212, 'cecep', 'cecep90', 'peserta', 'cecep', 'jepara, 1 oktober 2002', '090909', 'jalan bersama', 'sistem informasi', 'unisnu', '1670906613_5ce6480ce19bf2a34a76.jpeg', '', 'aulyashabrina@gmail.com', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indeks untuk tabel `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id_magang`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id_logbook` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `magang`
--
ALTER TABLE `magang`
  MODIFY `id_magang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
