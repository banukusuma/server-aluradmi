-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aluradmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alur`
--

CREATE TABLE `alur` (
  `id_alur` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `urut` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alur`
--

INSERT INTO `alur` (`id_alur`, `nama`, `id_kategori`, `id_jurusan`, `urut`, `timestamp`) VALUES
(30, 'Mengecek Tagihan', 7, 7, 1, '2017-03-15 04:35:41'),
(31, 'Membayar di Bank', 7, 7, 2, '2017-03-15 04:35:41'),
(32, 'Melakukan Registrasi Online', 7, 7, 3, '2017-03-15 04:35:41'),
(33, 'Persyaratan', 8, 7, 1, '2017-03-15 04:38:08'),
(34, 'Mengambil Blangko KRS', 8, 7, 2, '2017-03-15 04:38:08'),
(35, 'Mengisi Blangko KRS', 8, 7, 3, '2017-03-15 04:38:08'),
(36, 'Meminta Persetujuan Dosen PA', 8, 7, 4, '2017-03-15 04:38:08'),
(37, 'Mengisi KRS Online', 8, 7, 5, '2017-03-15 04:38:08'),
(38, 'Mencetak KRS', 8, 7, 6, '2017-03-15 04:38:08'),
(39, 'Persyaratan', 9, 7, 1, '2017-03-15 04:40:54'),
(40, 'Mencari Tempat PI', 9, 7, 2, '2017-03-15 04:40:54'),
(41, 'Mengisi Blangko Pelaksanaan PI', 9, 7, 3, '2017-03-15 04:40:54'),
(42, 'Meminta Surat Permohonan Ijin PI dari Fakultas', 9, 7, 4, '2017-03-15 04:40:54'),
(43, 'Menyerahkan Surat Permohonan dan Persyaratan', 9, 7, 5, '2017-03-15 04:40:54'),
(44, 'Melaksanakan PI', 9, 7, 6, '2017-03-15 04:40:55'),
(45, 'Konsultasi Judul Laporan PI', 9, 7, 7, '2017-03-15 04:40:55'),
(46, 'Menyusun Laporan PI', 9, 7, 8, '2017-03-15 04:40:55'),
(47, 'Mengurus Berkas Selesai Melaksanakan PI', 9, 7, 9, '2017-03-15 04:40:55'),
(48, 'Melaksanakan Ujian PI', 9, 7, 10, '2017-03-15 04:40:55'),
(49, 'Persyaratan', 10, 7, 1, '2017-03-15 04:44:59'),
(50, 'Konsultasi Judul Skripsi', 10, 7, 2, '2017-03-15 04:45:00'),
(51, 'Menyusun Proposal Skripsi', 10, 7, 3, '2017-03-15 04:45:00'),
(52, 'Menyusun Instrumen/Media Penelitian', 10, 7, 4, '2017-03-15 04:45:00'),
(53, 'Validasi Instrumen / Media Penelitian', 10, 7, 5, '2017-03-15 04:45:00'),
(54, 'Mengurus Izin Penelitian', 10, 7, 6, '2017-03-15 04:45:00'),
(55, 'Mengambil Data Penelitian', 10, 7, 7, '2017-03-15 04:45:00'),
(56, 'Mengolah dan Menyusun Hasil Penelitian', 10, 7, 8, '2017-03-15 04:45:00'),
(57, 'Mendaftar Ujian/Sidang', 10, 7, 9, '2017-03-15 04:45:00'),
(58, 'Melaksanakan Ujian/Sidang', 10, 7, 10, '2017-03-15 04:45:00'),
(59, 'Revisi Naskah Skripsi', 10, 7, 11, '2017-03-15 04:45:00'),
(60, 'Menggandakan dan Menjilid Naskah Skripsi', 10, 7, 12, '2017-03-15 04:45:00'),
(61, 'Membuat Jurnal', 10, 7, 13, '2017-03-15 04:45:00'),
(62, 'Mengurus Nilai Skripsi', 10, 7, 14, '2017-03-15 04:45:00'),
(63, 'Persyaratan', 11, 7, 1, '2017-03-15 04:46:56'),
(64, 'Mengisi Blangko Bebas Teori', 11, 7, 2, '2017-03-15 04:46:56'),
(65, 'Mencetak DHS', 11, 7, 3, '2017-03-15 04:46:56'),
(66, 'Menyerahkan DHS ke Pengajaran', 11, 7, 4, '2017-03-15 04:46:56'),
(67, 'Meminta TTD Dosen PA', 11, 7, 5, '2017-03-15 04:46:56'),
(68, 'Meminta TTD Kaprodi', 11, 7, 6, '2017-03-15 04:46:56'),
(69, 'Meminta Surat Keterangan Bebas Teori', 11, 7, 7, '2017-03-15 04:46:56'),
(70, 'Meminta TTD Kasibbag Akademik FT', 11, 7, 8, '2017-03-15 04:46:56'),
(71, 'Menyimpan Surat Keterangan Bebas Teori dan DHS', 11, 7, 9, '2017-03-15 04:46:56'),
(72, 'Membeli Buku Sumbangan', 12, 7, 1, '2017-03-15 04:48:22'),
(73, 'Bebas Perpustakaan Jurusan', 12, 7, 2, '2017-03-15 04:48:23'),
(74, 'Bebas Perpustakaan Pusat', 12, 7, 3, '2017-03-15 04:48:23'),
(75, 'Persyaratan', 13, 7, 1, '2017-03-15 04:49:59'),
(76, 'Meminta TTD Kaprodi', 13, 7, 2, '2017-03-15 04:49:59'),
(77, 'Mengurus Bebas Teori', 13, 7, 3, '2017-03-15 04:49:59'),
(78, 'Persyaratan', 14, 7, 1, '2017-03-15 04:51:38'),
(79, 'Mengisi Data Yudisium', 14, 7, 2, '2017-03-15 04:51:38'),
(80, 'Membayar di Bank', 14, 7, 3, '2017-03-15 04:51:38'),
(81, 'Mencetak Data Yudisium', 14, 7, 4, '2017-03-15 04:51:38'),
(82, 'Menyerahkan Data Yudisium', 14, 7, 5, '2017-03-15 04:51:38'),
(83, 'Mengecek Tagihan', 7, 8, 1, '2017-03-21 20:35:07'),
(84, 'Membayar di Bank', 7, 8, 2, '2017-03-21 20:35:07'),
(85, 'Melakukan Registrasi Online', 7, 8, 3, '2017-03-21 20:35:07'),
(86, 'Persyaratan', 8, 8, 1, '2017-03-21 20:36:29'),
(87, 'Mengambil Blangko KRS', 8, 8, 2, '2017-03-21 20:36:29'),
(88, 'Mengisi Blangko KRS', 8, 8, 3, '2017-03-21 20:36:29'),
(89, 'Meminta Persetujuan Dosen PA', 8, 8, 4, '2017-03-21 20:36:29'),
(90, 'Mengisi KRS Online', 8, 8, 5, '2017-03-21 20:36:29'),
(91, 'Meminta Stempel di Pengajaran', 8, 8, 6, '2017-03-21 20:36:30'),
(92, 'Persyaratan', 9, 8, 1, '2017-03-26 01:19:22'),
(93, 'Mencari Tempat PI', 9, 8, 2, '2017-03-26 01:19:22'),
(94, 'Mengisi Blangko Pelaksanaan PI', 9, 8, 3, '2017-03-26 01:19:22'),
(95, 'Meminta Surat Permohonan Ijin PI dari Fakultas', 9, 8, 4, '2017-03-26 01:19:22'),
(96, 'Menyerahkan Surat Permohonan dan Persyaratan', 9, 8, 5, '2017-03-26 01:19:22'),
(97, 'Melaksanakan PI', 9, 8, 6, '2017-03-26 01:19:22'),
(98, 'Konsultasi Judul Laporan PI', 9, 8, 7, '2017-03-26 01:19:22'),
(99, 'Menyusun Laporan PI', 9, 8, 8, '2017-03-26 01:19:22'),
(100, 'Mengurus Berkas Selesai Melaksanakan PI', 9, 8, 9, '2017-03-26 01:19:23'),
(101, 'Melaksanakan Ujian PI', 9, 8, 10, '2017-03-26 01:19:23'),
(102, 'Persyaratan', 11, 8, 1, '2017-03-26 02:07:55'),
(103, 'Mengisi Blangko Bebas Teori', 11, 8, 2, '2017-03-26 02:07:55'),
(104, 'Mencetak DHS', 11, 8, 3, '2017-03-26 02:07:56'),
(106, 'Meminta TTD Kaprodi', 11, 8, 5, '2017-03-26 02:07:56'),
(107, 'Meminta Surat Keterangan Bebas Teori', 11, 8, 6, '2017-03-26 02:07:56'),
(108, 'Meminta TTD Kasubbag Akademik FT', 11, 8, 7, '2017-03-26 02:07:56'),
(109, 'Menyimpan Surat Keterangan Bebas Teori dan DHS', 11, 8, 8, '2017-03-26 02:07:56'),
(110, 'Meminta TTD Dosen PA', 11, 8, 4, '2017-03-26 02:07:56'),
(111, 'Persyaratan', 12, 8, 1, '2017-03-26 02:15:34'),
(112, 'Membeli Buku Sumbangan', 12, 8, 2, '2017-03-26 02:15:34'),
(113, 'Bebas Perpustakaan Media FT', 12, 8, 3, '2017-03-26 02:15:34'),
(114, 'Bebas Perpustakaan Pusat UNY', 12, 8, 4, '2017-03-26 02:15:34'),
(115, 'Persyaratan', 13, 8, 1, '2017-03-26 02:29:35'),
(116, 'Meminta TTD Kaprodi', 13, 8, 2, '2017-03-26 02:29:35'),
(117, 'Mengurus Bebas Teori', 13, 8, 3, '2017-03-26 02:29:35'),
(118, 'Persyaratan', 14, 8, 1, '2017-03-26 02:30:42'),
(119, 'Mengisi Data yudisium', 14, 8, 2, '2017-03-26 02:30:42'),
(120, 'Membayar di Bank', 14, 8, 3, '2017-03-26 02:30:42'),
(121, 'Mencetak Data Yudisium', 14, 8, 4, '2017-03-26 02:30:42'),
(122, 'Menyerahkan Data Yudisium', 14, 8, 5, '2017-03-26 02:30:42'),
(123, 'Persyaratan', 10, 8, 1, '2017-03-26 13:48:58'),
(124, 'Konsultasi Judul Skripsi', 10, 8, 2, '2017-03-26 14:01:59'),
(125, 'Menyusun Proposal Skripsi', 10, 8, 3, '2017-03-26 14:01:59'),
(126, 'Menyusun Instrumen / Media Penelitian', 10, 8, 4, '2017-03-26 14:01:59'),
(127, 'Validasi Instrumen / Media Penelitian', 10, 8, 5, '2017-03-26 14:01:59'),
(128, 'Mengurus Izin Penelitian', 10, 8, 6, '2017-03-26 14:01:59'),
(129, 'Mengambil Data Penelitian', 10, 8, 7, '2017-03-26 14:01:59'),
(130, 'Mengolah dan Menyusun Hasil Penelitian', 10, 8, 8, '2017-03-26 14:01:59'),
(131, 'Mendaftar Ujian TAS', 10, 8, 9, '2017-03-26 14:02:00'),
(132, 'Melaksanakan Ujian', 10, 8, 10, '2017-03-26 14:02:00'),
(133, 'Revisi Naskah Skripsi', 10, 8, 11, '2017-03-26 14:02:00'),
(134, 'Menggandakan dan Jilid Naskah Skripsi', 10, 8, 12, '2017-03-26 14:02:00'),
(135, 'Membuat Jurnal', 10, 8, 13, '2017-03-26 14:02:00'),
(136, 'Mengurus Nilai Skripsi', 10, 8, 14, '2017-03-26 14:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_keterangan` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `nama`, `id_keterangan`, `timestamp`) VALUES
(13, 'Reguler : Kuitansi pembayaran tagihan / UKT dari bank', 35, '2017-03-15 06:24:51'),
(14, 'Bidikmisi : print out bukti registrasi online', 35, '2017-03-15 06:11:51'),
(16, 'Blangko KRS yang sudah diisi', 38, '2017-03-15 06:12:27'),
(17, 'Blangko KRS yang sudah diisi dan telah disetujui oleh Dosen PA', 41, '2017-03-15 06:25:35'),
(18, 'Blangko KRS manual ', 37, '2017-03-15 06:25:59'),
(19, 'Blangko surat permohonan ijin PI', 49, '2017-03-15 06:53:10'),
(20, 'Blangko surat permohonan ijin PI yang sudah ditanda tangani oleh Dosen Pembimbing PI dan Koordinator PI Jurusan', 50, '2017-03-15 06:53:41'),
(21, 'Surat permohonan ijin PI dari fakultas', 51, '2017-03-15 06:54:13'),
(22, 'Surat permohonan ijin PI dari fakultas yang sudah diperbanyak', 52, '2017-03-15 06:54:36'),
(23, 'Surat permohonan ijin PI dari Fakultas', 53, '2017-03-15 06:55:31'),
(24, 'Berkas persyaratan lainnya, misalnya : proposal(jika disyaratkan oleh industri/proyek)', 53, '2017-03-15 06:55:31'),
(25, 'Format penilaian pembimbing industri(lihat di panduan praktik industri)', 54, '2017-03-15 06:56:18'),
(26, 'Lembar catatan harian (lihat di buku panduan PI)', 55, '2017-03-15 06:56:49'),
(27, 'Lembar konsultasi', 56, '2017-03-15 06:57:04'),
(28, 'Lembar catatan harian', 57, '2017-03-15 06:57:18'),
(29, 'Laporan PI', 58, '2017-03-15 06:57:36'),
(30, 'Lembar catatan harian', 58, '2017-03-15 06:57:36'),
(31, 'Laporan PI yang telah di acc dosen pembimbing', 59, '2017-03-15 06:57:52'),
(32, 'Laporan PI yang telah digandakan dan dijilid hardcover', 60, '2017-03-15 06:58:13'),
(33, 'Laporan PI yang telah digandakan dan dijilid hardcover', 61, '2017-03-15 06:58:26'),
(34, 'Laporan PI yang telah ditanda tangani dosen pembimbing dan pembimbing industri (diberi stempel basah industri)', 62, '2017-03-15 06:58:57'),
(35, 'Laporan PI yang telah ditanda tangani oleh dosen pembimbing, pembimbing industri dan koordinator PI jurusan', 63, '2017-03-15 06:59:26'),
(36, 'Laporan PI yang telah ditanda tangani oleh dosen pembimbing, pembimbing industri dan koordinator PI jurusan', 64, '2017-03-15 06:59:47'),
(37, 'Laporan PI yang telah ditanda tangani oleh Wakil Dekan I FT UNY', 65, '2017-03-15 06:59:56'),
(38, 'Laporan PI yang telah distempel', 66, '2017-03-15 07:00:04'),
(39, 'Map berisi lembar penilaian dari pembimbing industri', 69, '2017-03-15 07:00:23'),
(40, 'Surat keterangan selesai melaksanakan PI dari industri', 70, '2017-03-15 07:00:32'),
(41, 'Laporan PI', 71, '2017-03-15 07:00:53'),
(42, 'Sumbangan 1 buah buku', 73, '2017-03-15 07:09:50'),
(43, 'Lembar permohonan nilai skripsi', 73, '2017-03-15 07:09:50'),
(44, 'Buku sumbangan 1 buah', 74, '2017-03-15 07:10:08'),
(45, 'Surat keterangan bebas teori dan print out DHS yang telah didapatkan sebelum melaksanakan ujian Tugas Akhir Skripsi (TAS)', 77, '2017-03-15 07:14:22'),
(46, 'Surat keterangan bebas teori dan print out DHS yang telah ditanda tangani oleh Ketua Jurusan', 78, '2017-03-15 07:14:42'),
(47, 'Blangko permohonan bebas teori', 89, '2017-03-15 15:59:15'),
(48, 'Blangko permohonan bebas teori', 90, '2017-03-15 16:00:23'),
(49, 'KRS semester terakhir (jika KRS tidak ada/hilang, terlebih dahulu mengurus surat kehilangan ke Polsek Bulaksumur)', 90, '2017-03-15 16:00:23'),
(50, 'Bukti pembayaran semester terakhir. Bagi mahasiswa bidikmisi tidak perlu, cukup menyebutkan mahasiswa bidikmisi', 90, '2017-03-15 16:00:23'),
(51, 'Naskah skripsi yang telah di acc oleh dosen pembimbing skripsi', 90, '2017-03-15 16:00:23'),
(52, 'Print out DHS', 91, '2017-03-15 16:00:52'),
(53, 'KRS seluruh semester (jika ada KRS yang hilang, terlebih dahulu mengurus surat kehilangan ke Polsek Bulaksumur)', 91, '2017-03-15 16:00:52'),
(54, 'Print out DHS yang telah dicocokan oleh petugas pengajaran', 92, '2017-03-15 16:02:09'),
(55, 'Print out DHS yang telah di tanda tangani oleh Dosen PA', 93, '2017-03-15 16:02:20'),
(56, 'Print out DHS yang telah ditanda tangani oleh Dosen PA dan Kajur', 94, '2017-03-15 16:02:32'),
(57, 'Surat keterangan bebas teori', 95, '2017-03-15 16:02:49'),
(58, 'Surat keterangan bebas teori yang telah ditanda tangani oleh Kasubbag Akademik FT UNY', 96, '2017-03-15 16:03:05'),
(59, 'Print out lembar 1, 2 dan 3 data yudisium dari SIAKAD', 85, '2017-03-15 16:05:37'),
(60, 'Surat keterangan bebas teori dan print out DHS yang telah divalidasi oleh petugas loket 1', 85, '2017-03-15 16:05:37'),
(61, 'Ijazah terakhir (SMA/SMK)', 85, '2017-03-15 16:05:37'),
(62, 'Naskah skripsi yang telah dijilid dan disahkan oleh Dekan FT', 154, '2017-03-15 17:17:52'),
(63, 'CD berisi file skripsi, jurnal dan biodata jurnal', 154, '2017-03-15 17:17:52'),
(64, 'Abstrak yang telah dilaminating', 154, '2017-03-15 17:17:52'),
(65, 'Amplop berperangko dan alamat orang tua', 154, '2017-03-15 17:17:52'),
(66, 'Fotokopi sertifikat ProTEFL dari UNY minimal skor 425', 154, '2017-03-15 17:17:52'),
(67, 'Naskah skripsi yang telah dijilid dan disahkan oleh Dekan FT', 153, '2017-03-15 17:18:08'),
(68, 'CD berisi file skripsi, jurnal dan biodata jurnal', 153, '2017-03-15 17:18:08'),
(69, 'Abstrak bahasa Indonesia dan Inggris', 152, '2017-03-15 17:18:18'),
(70, 'Blangko permohonan nilai skripsi yang didapatkan dari Sekjur saat mendaftar ujian/sidang', 150, '2017-03-15 17:18:32'),
(71, 'Biodata jurnal (pdf)', 149, '2017-03-15 17:18:48'),
(72, 'Naskah jurnal (pdf)', 149, '2017-03-15 17:18:49'),
(73, 'File skripsi dalam 1 file dengan format pdf', 148, '2017-03-15 17:36:44'),
(74, 'Biodata jurnal (pdf)', 148, '2017-03-15 17:19:07'),
(75, 'Naskah jurnal (pdf)', 148, '2017-03-15 17:19:07'),
(76, 'Naskah skripsi', 147, '2017-03-15 17:19:20'),
(77, 'Abstrak bahasa Indonesia', 146, '2017-03-15 17:19:28'),
(78, 'Naskah skripsi yang telah divalidasi oleh petugas loket 3 dan JPTK FT', 145, '2017-03-15 17:19:39'),
(79, 'Naskah skripsi yang telah ditanda tangani oleh dosen pembimbing dan kaprodi', 144, '2017-03-15 17:19:51'),
(80, 'Naskah skripsi yang telah ditanda tangani oleh dosen pembimbing dan kaprodi', 143, '2017-03-15 17:20:06'),
(82, 'Naskah skripsi yang telah ditanda tangani oleh dosen pembimbing', 142, '2017-03-15 17:21:03'),
(83, 'Naskah skripsi yang telah dijilid', 141, '2017-03-15 17:21:10'),
(84, 'Lembar saran dan masukan dari dosen penguji', 138, '2017-03-15 17:21:26'),
(85, 'Naskah skripsi yang digunakan saat ujian/sidang', 138, '2017-03-15 17:21:26'),
(86, 'Lembar saran dan masukan dari dosen penguji', 139, '2017-03-15 17:21:55'),
(87, 'Naskah skripsi yang telah direvisi', 139, '2017-03-15 17:21:55'),
(88, 'Lembar halaman pengesahan (bisa dilihat di buku panduan tugas akhir skripsi) 3 atau 5 rangkap', 139, '2017-03-15 17:21:55'),
(89, 'Naskah Skripsi', 134, '2017-03-15 17:23:37'),
(90, 'Surat Undangan', 134, '2017-03-15 17:23:37'),
(91, 'SK ujian/sidang (bisa menyusul)', 134, '2017-03-15 17:23:37'),
(92, 'Naskah skripsi yang telah di acc oleh dosen pembimbing', 133, '2017-03-15 17:23:47'),
(93, 'Blangko pendaftaran ujian/sidang yang telah diisi', 132, '2017-03-15 17:23:52'),
(94, 'Blangko pendaftaran ujian/sidang', 131, '2017-03-15 17:24:01'),
(95, 'Surat keterangan bebas teori', 130, '2017-03-15 17:24:07'),
(96, 'Hasil Penelitian', 128, '2017-03-15 17:24:36'),
(97, 'Lembar Konsultasi', 128, '2017-03-15 17:24:37'),
(98, 'Hasil Penelitian', 127, '2017-03-15 17:24:55'),
(99, 'Buku panduan tugas akhir skripsi', 127, '2017-03-15 17:24:55'),
(100, 'Instrumen penelitian / media penelitian (bagi mahasiswa skripsi media)', 126, '2017-03-15 17:25:10'),
(101, 'Surat ijin penelitian dari fakultas, dari provinsi dan dari kota/kabupaten', 124, '2017-03-15 17:25:37'),
(102, 'Berkas lain yang disyaratkan oleh sekolah', 124, '2017-03-15 17:25:37'),
(103, 'Naskah proposal skripsi', 123, '2017-03-15 17:26:09'),
(104, 'Surat ijin penelitian dari fakultas dan dari provinsi', 123, '2017-03-15 17:26:10'),
(105, 'Berkas lain yang disyaratkan oleh kota/ kabupaten (aturan setiap kota/kabupaten berbeda-beda)', 123, '2017-03-15 17:26:10'),
(106, 'Naskah proposal skripsi', 122, '2017-03-15 17:26:29'),
(107, 'Surat ijin penelitian dari fakultas', 122, '2017-03-15 17:26:29'),
(108, 'Berkas lain yang disyaratkan oleh provinsi (aturan setiap provinsi berbeda-beda)', 122, '2017-03-15 17:26:29'),
(109, 'Blangko penelitian yang telah ditanda tangani oleh dosen Pembimbing', 121, '2017-03-15 17:26:52'),
(110, 'Fotokopi halaman cover dan halaman persetujuan yang telah Distempel', 121, '2017-03-15 17:26:52'),
(111, 'Blangko penelitian yang telah diisi', 120, '2017-03-15 17:27:01'),
(112, 'Blangko penelitian', 119, '2017-03-15 17:27:06'),
(113, 'Naskah proposal skripsi yang telah ditanda tangani oleh Dekan FT dan telah digandakan pada halaman persetujuan', 117, '2017-03-15 17:27:30'),
(114, 'Naskah proposal skripsi yang telah ditanda tangani oleh Dekan FT', 116, '2017-03-15 17:27:38'),
(115, 'Naskah proposal skripsi yang telah divalidasi oleh petugas loket 3', 115, '2017-03-15 17:27:45'),
(116, 'Naskah proposal skripsi yang telah ditanda tangani oleh dosen pembimbing dan kaprodi', 114, '2017-03-15 17:28:07'),
(117, 'Naskah proposal skripsi yang telah ditanda tangani oleh dosen pembimbing', 113, '2017-03-15 17:28:18'),
(118, 'Naskah proposal skripsi yang telah dijilid', 112, '2017-03-15 17:28:27'),
(119, 'Map berisi print out surat permohonan validasi beserta lampirannya', 109, '2017-03-15 17:28:47'),
(120, 'Print out surat permohonan validasi beserta lampirannya', 108, '2017-03-15 17:28:55'),
(121, 'Print out surat permohonan validasi beserta lampirannya', 107, '2017-03-15 17:29:02'),
(122, 'Instrumen penelitian/media penelitian', 103, '2017-03-15 17:29:21'),
(123, ' Lembar konsultasi', 103, '2017-03-15 17:29:21'),
(124, 'Naskah proposal skripsi', 101, '2017-03-15 17:29:49'),
(125, 'Lembar konsultasi (format bisa di lihat di buku panduan tugas akhir skripsi)', 101, '2017-03-15 17:29:49'),
(126, 'Buku panduan tugas akhir skripsi', 100, '2017-03-15 17:29:57'),
(127, 'Reguler : Kwitansi pembayaran tagihan/UKT dari bank', 162, '2017-03-21 20:51:45'),
(128, 'Bidikmisi : Print out bukti registrasi online', 162, '2017-03-21 20:51:45'),
(129, 'Blangko KRS', 164, '2017-03-21 20:52:02'),
(130, 'Blangko KRS manual sudah diisi', 165, '2017-03-21 20:52:17'),
(131, 'Blangko KRS yang sudah diisi dan disetujui oleh Dosen PA', 167, '2017-03-21 20:52:40'),
(132, 'Blangko KRS yang sudah ditanda tangani oleh Dosen PA', 168, '2017-03-21 20:52:55'),
(133, 'Blangko surat permohonan ijin PI', 172, '2017-03-26 01:45:58'),
(134, 'Blangko surat permohonan ijin PI yang sudah ditanda tangani oleh Koordinator PI Jurusan', 173, '2017-03-26 01:46:29'),
(135, 'Surat permohonan ijin PI dari fakultas', 174, '2017-03-26 01:46:44'),
(136, 'Surat permohonan ijin PI dari fakultas yang sudah diperbanyak', 175, '2017-03-26 01:46:53'),
(137, 'Surat permohonan ijin PI dari fakultas', 176, '2017-03-26 01:47:28'),
(138, 'Berkas persyaratan, misalnya: proposal (jika disyaratkan oleh industri)', 176, '2017-03-26 01:47:28'),
(139, 'Format penilaian pembimbing industri (lihat di panduan praktik industri)', 177, '2017-03-26 01:47:49'),
(140, 'Lembar catatan harian (lihat di buku panduan praktik industri)', 178, '2017-03-26 01:47:58'),
(141, 'Lembar konsultasi', 179, '2017-03-26 01:48:13'),
(142, 'Lembar catatan harian', 180, '2017-03-26 01:48:30'),
(143, 'Laporan PI', 181, '2017-03-26 01:48:54'),
(144, 'Lembar catatan harian', 181, '2017-03-26 01:48:54'),
(145, 'Laporan PI yang telah di setujui dosen pembimbing', 182, '2017-03-26 01:49:20'),
(146, 'Laporan PI yang telah digandakan dan dijilid hardcover', 183, '2017-03-26 01:49:30'),
(147, 'Laporan PI yang telah digandakan dan dijilid hardcover', 184, '2017-03-26 01:49:40'),
(148, 'Laporan PI yang telah ditanda tangani dosen pembimbing dan pembimbing industri (diberi stempel basah industri)', 185, '2017-03-26 01:50:00'),
(149, 'Laporan PI yang telah ditanda tangani oleh dosen pembimbing, pembimbing industri dan koordinator PI jurusan', 186, '2017-03-26 01:50:21'),
(150, 'Laporan PI yang telah ditanda tangani oleh dosen pembimbing, pembimbing industri dan koordinator PI jurusan', 187, '2017-03-26 01:50:35'),
(151, 'Laporan PI yang telah ditanda tangani oleh Wakil Dekan I FT UNY', 188, '2017-03-26 01:50:45'),
(152, 'Laporan PI yang telah distempel', 189, '2017-03-26 01:50:54'),
(153, 'Map berisi lembar penilaian dari pembimbing industri', 192, '2017-03-26 01:51:20'),
(154, 'Surat keterangan selesai melaksanakan PI dari industri', 193, '2017-03-26 01:51:29'),
(155, 'Laporan PI', 194, '2017-03-26 01:51:40'),
(156, 'Blangko permohonan bebas teori', 198, '2017-03-26 02:23:31'),
(157, 'Blangko permohonan bebas teori', 199, '2017-03-26 02:24:49'),
(158, 'KRS semester terakhir (jika KRS tidak ada/hilang, terlebih dahulu mengurus surat kehilangan ke Polsek Bulaksumur)', 199, '2017-03-26 02:24:50'),
(159, 'Bukti pembayaran semester terakhir. Bagi mahasiswa bidikmisi tidak perlu, cukup menyebutkan mahasiswa bidikmisi', 199, '2017-03-26 02:24:50'),
(160, 'Naskah skripsi yang telah di setujui oleh dosen pembimbing skripsi', 199, '2017-03-26 02:24:50'),
(161, 'Print out DHS dari loket 1', 201, '2017-03-26 02:25:13'),
(162, 'Print out DHS yang telah di tanda tangani oleh Dosen PA', 200, '2017-03-26 02:25:24'),
(163, 'Print out DHS yang telah ditanda tangani oleh Dosen PA dan Kajur', 202, '2017-03-26 02:25:33'),
(164, 'Surat keterangan bebas teori', 203, '2017-03-26 02:25:47'),
(165, 'Surat keterangan bebas teori yang telah ditanda tangani oleh Kasubbag Akademik FT UNY', 204, '2017-03-26 02:25:59'),
(166, 'Buku sumbangan satu buah', 209, '2017-03-26 02:26:42'),
(167, 'CD Softcopy Skripsi', 209, '2017-03-26 02:27:04'),
(168, 'Abstrak Bahasa Indonesia 2 lembar', 208, '2017-03-26 02:28:11'),
(169, 'Abstrak Bahasa Inggris 2 lembar', 208, '2017-03-26 02:28:11'),
(170, 'CD Softcopy Skripsi', 208, '2017-03-26 02:28:11'),
(171, 'Hardcopy Skripsi apabila mendapat nilai A', 208, '2017-03-26 02:28:11'),
(172, 'Surat keterangan bebas teori dan print out DHS yang telah didapatkan sebelum melaksanakan ujian Tugas Akhir Skripsi (TAS)', 211, '2017-03-26 02:37:59'),
(173, 'Surat keterangan bebas teori dan print out DHS yang telah ditanda tangani oleh Ketua Prodi', 212, '2017-03-26 02:38:25'),
(174, 'Print out lembar 1, 2 dan 3 data yudisium dari SIAKAD', 219, '2017-03-26 02:39:24'),
(175, 'Surat keterangan bebas teori dan print out DHS yang telah divalidasi oleh petugas loket 1', 219, '2017-03-26 02:39:24'),
(176, 'Fotocopy ijazah terakhir (SMA/SMK)', 219, '2017-03-26 02:39:24'),
(177, 'Buku panduan tugas akhir skripsi', 222, '2017-03-26 14:58:14'),
(178, 'Naskah proposal skripsi', 223, '2017-03-26 14:58:27'),
(179, 'Kartu Bimbingan', 223, '2017-03-26 14:58:27'),
(180, 'Instrumen penelitian/media penelitian', 225, '2017-03-26 14:58:56'),
(181, 'Kartu Bimbingan', 225, '2017-03-26 14:58:56'),
(182, 'Print out surat permohonan validasi beserta lampirannya', 234, '2017-03-26 14:59:35'),
(183, 'Print out surat permohonan validasi beserta lampirannya', 235, '2017-03-26 14:59:43'),
(184, 'Map berisi print out surat permohonan validasi beserta lampirannya', 236, '2017-03-26 15:00:13'),
(185, 'Naskah proposal skripsi yang telah dijilid', 239, '2017-03-26 15:01:59'),
(186, 'Naskah proposal skripsi yang telah ditanda tangani oleh dosen pembimbing', 240, '2017-03-26 15:02:13'),
(187, 'Naskah proposal skripsi yang telah ditanda tangani oleh dosen pembimbing dan kaprodi', 241, '2017-03-26 15:02:28'),
(188, 'Naskah proposal skripsi yang telah divalidasi oleh petugas loket 3', 242, '2017-03-26 15:02:41'),
(189, 'Naskah proposal skripsi yang telah ditanda tangani oleh Dekan FT', 243, '2017-03-26 15:02:56'),
(190, 'Naskah proposal skripsi yang telah ditanda tangani oleh Dekan FT dan telah digandakan pada halaman persetujuan', 244, '2017-03-26 15:03:41'),
(191, 'Blangko penelitian', 246, '2017-03-26 15:03:54'),
(192, 'Blangko penelitian yang telah diisi', 247, '2017-03-26 15:04:09'),
(193, 'Blangko penelitian yang telah ditanda tangani oleh dosen Pembimbing', 248, '2017-03-26 15:04:48'),
(194, 'Fotokopi halaman cover dan halaman persetujuan yang telah Distempel', 248, '2017-03-26 15:04:48'),
(195, 'Naskah proposal skripsi', 249, '2017-03-26 15:05:15'),
(196, 'Surat ijin penelitian dari fakultas', 249, '2017-03-26 15:05:15'),
(197, 'Berkas lain yang disyaratkan oleh provinsi (aturan setiap provinsi berbeda-beda)', 249, '2017-03-26 15:05:15'),
(198, 'Surat ijin penelitian dari fakultas dan dari provinsi', 250, '2017-03-26 15:07:58'),
(199, 'Berkas lain yang disyaratkan oleh kota/ kabupaten (aturan setiap kota/kabupaten berbeda-beda)', 250, '2017-03-26 15:08:26'),
(200, 'Naskah proposal skripsi', 250, '2017-03-26 15:08:44'),
(201, 'Surat ijin penelitian dari fakultas, dari provinsi dan dari kota/kabupaten', 251, '2017-03-26 15:09:03'),
(202, 'Berkas lain yang disyaratkan oleh sekolah atau instansi', 251, '2017-03-26 15:09:03'),
(203, 'Instrumen penelitian / media penelitian (bagi mahasiswa skripsi media)', 253, '2017-03-26 15:09:24'),
(204, 'Hasil penelitian', 254, '2017-03-26 15:09:38'),
(205, 'Buku panduan tugas akhir skripsi', 254, '2017-03-26 15:09:38'),
(206, 'Hasil penelitian', 255, '2017-03-26 15:09:50'),
(207, 'Kartu Bimbingan', 255, '2017-03-26 15:09:50'),
(208, 'Naskah Skripsi', 257, '2017-03-26 15:13:29'),
(209, 'Blangko pendaftaran ujian', 259, '2017-03-26 15:13:51'),
(210, 'Skripsi 3 bendel', 260, '2017-03-26 15:15:17'),
(211, 'Kartu Bimbingan', 260, '2017-03-26 15:15:46'),
(212, 'Surat Keterangan Bebas Teori', 260, '2017-03-26 15:15:34'),
(213, 'Blangko pendaftaran ujian', 260, '2017-03-26 15:15:04'),
(214, 'Map', 261, '2017-03-26 15:16:14'),
(215, 'Naskah skripsi yang digunakan saat ujian/sidang', 267, '2017-03-26 15:17:11'),
(216, 'Naskah skripsi yang telah direvisi', 268, '2017-03-26 15:17:35'),
(217, 'Lembar halaman pengesahan (bisa dilihat di buku panduan tugas  akhir skripsi) 3 atau 5 rangkap', 268, '2017-03-26 15:17:35'),
(218, 'Naskah skripsi yang telah dijilid', 271, '2017-03-26 15:18:07'),
(219, 'Naskah skripsi yang telah ditanda tangani oleh dosen pembimbing', 272, '2017-03-26 15:18:27'),
(220, 'Naskah skripsi yang telah ditanda tangani oleh dosen pembimbing dan kaprodi', 273, '2017-03-26 15:18:36'),
(221, 'Naskah skripsi yang telah ditanda tangani oleh dosen pembimbing dan kaprodi', 274, '2017-03-26 15:18:48'),
(222, 'Naskah skripsi yang telah divalidasi oleh petugas loket 3 dan JPTK FT', 275, '2017-03-26 15:18:55'),
(223, 'Abstrak bahasa Indonesia', 276, '2017-03-26 15:20:06'),
(224, 'Naskah skripsi', 277, '2017-03-26 15:20:11'),
(225, 'abstrak bahasa inggris', 278, '2017-03-26 15:21:42'),
(226, 'abstrak bahasa indonesia', 278, '2017-03-26 15:21:42'),
(227, 'jurnal', 278, '2017-03-26 15:21:42'),
(228, 'Naskah Skripsi', 278, '2017-03-26 15:21:42'),
(229, '1 CD cover Biru', 279, '2017-03-26 15:22:24'),
(230, 'Jurnal yang di TTD', 279, '2017-03-26 15:22:24'),
(231, 'Sertifikat Pro TEFL dan fotocopynya', 279, '2017-03-26 15:22:24'),
(232, 'Lembar bukti telah menyerahkan CD', 280, '2017-03-26 15:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama`, `timestamp`, `latitude`, `longitude`) VALUES
(99, 'Tidak Ada', '2017-01-26 14:41:16', NULL, NULL),
(100, 'KPLT FT UNY', '2017-03-15 04:52:57', -7.769207488589718, 110.38812970742583),
(101, 'Jurusan PTSP', '2017-03-15 06:09:28', -7.769821764700907, 110.38765043020248),
(102, 'Perpustakaan Pusat UNY', '2017-03-15 07:07:37', -7.7758514061172095, 110.38686722517014),
(103, 'Pengajaran Jurusan PT. Elektronika dan Informatika dan Jurusan PT. Elektro', '2017-03-26 04:57:58', -7.771004014261442, 110.38740031421185),
(104, 'LPTK FT UNY', '2017-03-26 04:56:09', -7.7715302141122, 110.38681827485561),
(105, 'Gedung 3 Lantai PT. Sipil dan Perencanaan', '2017-03-26 04:58:47', -7.76959283867866, 110.38719646632671),
(106, 'Pengajaran Jurusan PT. Otomotif dan Jurusan PT. Mesin', '2017-03-26 04:59:19', -7.770355565053418, 110.38751296699047),
(107, 'Pengajaran Jurusan PT. Boga dan Busana', '2017-03-26 04:59:50', -7.768939072111931, 110.38756929337978),
(108, 'Pusat Komputer (Puskom) UNY', '2017-03-26 05:00:17', -7.77266765396008, 110.38705095648766),
(109, 'LPPMP UNY', '2017-03-26 05:05:13', -7.772556036167454, 110.3865896165371),
(110, 'LPPM UNY', '2017-03-26 05:01:00', -7.7726490509967, 110.38722328841686),
(111, 'Rektorat UNY', '2017-03-26 05:06:03', -7.775601596721048, 110.38758002221584);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama`, `timestamp`) VALUES
(0, 'semua', '0000-00-00 00:00:00'),
(7, 'Pendidikan Teknik Sipil dan Perencanaan', '2017-03-15 04:30:26'),
(8, 'Pendidikan Teknik Elektronika dan Informatika', '2017-03-21 20:33:39'),
(9, 'Pendidikan Teknik Boga dan Busana', '2017-07-06 00:31:37'),
(10, 'Pendidikan Teknik Otomotif', '2017-07-06 00:31:37'),
(11, 'Pendidikan Teknik Elektro', '2017-07-06 00:31:37'),
(12, 'Pendidikan Teknik Mesin', '2017-07-06 00:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `timestamp`) VALUES
(7, 'Registrasi Ulang', '2017-03-15 04:34:18'),
(8, 'Pengisian KRS', '2017-03-15 04:34:19'),
(9, 'Praktik Industri', '2017-03-15 04:34:19'),
(10, 'Tugas Akhir Skripsi (TAS)', '2017-03-15 04:34:19'),
(11, 'Bebas Teori Sebelum Ujian', '2017-03-15 04:34:19'),
(12, 'Bebas Perpustakaan', '2017-03-15 04:34:19'),
(13, 'Bebas Teori Sebelum Yudisium', '2017-03-15 04:34:19'),
(14, 'Yudisium', '2017-03-15 04:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text,
  `id_alur` int(10) UNSIGNED NOT NULL,
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `urut` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `nama`, `keterangan`, `id_alur`, `id_ruang`, `urut`, `timestamp`) VALUES
(25, 'Langkah 1', 'Membuka web tagihan.uny.ac.id.\r\nCatatan : Bagi mahasiswa bidikmisi tidak perlu', 30, 99, 1, '2017-03-15 05:51:56'),
(26, 'Langkah 2', 'Mengecek tagihan dengan memasukkan NIM.\r\nCatatan: Bagi mahasiswa bidikmisi tidak perlu', 30, 99, 2, '2017-03-15 05:51:43'),
(29, 'Detail', 'Membayar tagihan di bank (BPD DIY/BNI/Mandiri/BTN) dengan menyebutkan NIM atau menunjukkan KTM. \r\nCatatan: Bagi mahasiswa Bidikmisi tidak perlu', 31, 99, 1, '2017-03-15 05:54:14'),
(30, 'Langkah 1', 'Membuka web registrasi  online di registrasi.uny.ac.id', 32, 99, 1, '2017-03-15 05:56:26'),
(31, 'Langkah 2', 'Masuk dengan klik "Login SSO (Mahasiswa)" , dengan memasukkan UNY ID dan Password', 32, 99, 2, '2017-03-15 05:56:26'),
(32, 'Langkah 3', 'Melakukan registrasi online dengan melakukan update biodata', 32, 99, 3, '2017-03-15 05:56:26'),
(33, 'Syarat 1', 'Sudah membayar tagihan/UKT di bank', 33, 99, 1, '2017-03-15 05:57:23'),
(34, 'Syarat 2', 'Sudah melakukan registrasi online di registrasi.uny.ac.id', 33, 99, 2, '2017-03-15 05:57:23'),
(35, 'Keterangan', 'Non Bidikmisi : mengambil blangko KRS manual dengan menunjukkan kuitansi pembayaran dari bank.\r\n\r\nBidikmisi : mengambil blangko KRS manual dengan menunjukkan print out bukti registrasi online', 34, 100, 1, '2017-03-15 16:22:06'),
(36, 'Langkah 1', 'Melihat mata kuliah yang ditawarkan pada semester yang akan diambil pada papan pengumuman jurusan', 35, 99, 1, '2017-03-15 06:04:11'),
(37, 'Langkah 2', 'Mengisi blangko KRS manual sesuai dengan mata kuliah, kode dan dosen pengampu pada semester yang akan diambil', 35, 99, 2, '2017-03-15 06:04:11'),
(38, 'Keterangan', 'Meminta tanda tangan Dosen PA pada blangko KRS yang sudah diisi', 36, 99, 1, '2017-03-15 06:05:18'),
(39, 'Langkah 1', 'Membuka website SIAKAD UNY di siakad2013.uny.ac.id', 37, 99, 1, '2017-03-15 06:07:02'),
(40, 'Langkah 2', 'Masuk ke SIAKAD dengan memasukkan NIM dan Password', 37, 99, 2, '2017-03-15 06:07:02'),
(41, 'Langkah 3', 'Mengisi mata kuliah yang diambil dengan cara mencentang pada mata kuliah tersebut, sesuai dengan yang tertera pada blangko KRS manual.', 37, 99, 3, '2017-03-15 06:07:02'),
(42, 'Keterangan', 'Menyerahkan blangko KRS yang sudah di tanda tangani oleh Dosen PA kepada petugas pengajaran jurusan , untuk mendapatkan print out KRS', 38, 106, 1, '2017-03-15 06:10:33'),
(43, 'Syarat 1', 'Telah mengikuti pembekalan PI', 39, 99, 1, '2017-03-15 06:27:24'),
(44, 'Syarat 2', 'Telah mendapatkan sertifikat pembekalan PI', 39, 99, 2, '2017-03-15 06:34:05'),
(45, 'Syarat 3', 'Telah mendapatkan pembagian Dosen Pembimbing PI', 39, 99, 3, '2017-03-15 06:34:15'),
(46, 'Keterangan', 'Mencari industri/proyek untuk melaksanakan PI serta menanyakan persyaratan dan kuota pesertanya', 40, 99, 1, '2017-03-15 06:33:48'),
(47, 'Langkah 1', 'Mendownload blangko “Surat Permohonan Ijin PI” di  http://pendidikan-teknik-sipilperencanaan.ft.uny.ac.id/download\r\n', 41, 99, 1, '2017-03-15 06:33:25'),
(48, 'Langkah 2', 'Mencetak blangko surat permohonan ijin PI dan mengisinya', 41, 99, 2, '2017-03-15 06:29:04'),
(49, 'Langkah 3', 'Meminta tanda tangan Dosen Pembimbing PI dan Koordinator PI\r\n  Jurusan pada blangko surat permohonan ijin PI', 41, 99, 3, '2017-03-15 06:29:04'),
(50, 'Langkah 1', 'Menyerahkan blangko surat permohonan ijin PI yang sudah ditanda tangani oleh Dosen Pembimbing PI dan Koordinator PI Jurusan kepada petugas loket 3, untuk mendapatkan surat permohonan ijin PI dari  fakultas\r\n', 42, 102, 1, '2017-03-15 06:33:06'),
(51, 'Langkah 2', 'Memperbanyak surat permohonan ijin PI dari fakultas sesuai kebutuhan\r\n', 42, 99, 2, '2017-03-15 06:33:06'),
(52, 'Langkah 3', 'Meminta stempel basah pada surat permohonan ijin PI dari fakultas yang telah diperbanyak\r\n', 42, 104, 3, '2017-03-15 06:33:06'),
(53, 'Keterangan', '1). Menyerahkan surat permohonan ijin PI dari fakultas dan berkas persyaratan kepada industri/proyek tempat pelaksanaan PI\r\n\r\n2). Menanyakan apakah diperbolehkan melaksanakan PI di tempat tersebut\r\n\r\n3). Jika Ya : Menanyakan kapan bisa mulai melaksanakan PI. Jika Tidak :  Ulangi dari langkah 1 (dengan industri/proyek yang berbeda)\r\n', 43, 99, 1, '2017-03-15 16:23:42'),
(54, 'Langkah 1', 'Menyerahkan lembar penilaian pembimbing industri kepada pembimbing industri untuk dijadikan sebagai panduan dalam menilai mahasiswa', 44, 99, 1, '2017-03-15 06:39:02'),
(55, 'Langkah 2', '1). Melaksanakan PI sesuai dengan tugas yang diberikan oleh pembimbing industri\r\n\r\n2). Mengisi lembar catatan harian setelah melaksanakan PI di hari tersebut\r\n\r\n3). Meminta tanda tangan pembimbing industri pada lembar catatan harian', 44, 99, 2, '2017-03-15 16:23:54'),
(56, 'Keterangan', '1). Mengkonsultasikan judul laporan PI yang akan dibuat kepada dosen pembimbing PI\r\n\r\n2). Meminta tanda tangan dosen pembimbing pada lembar konsultasi\r\n\r\n3). Pelaksanaan konsultasi bisa dilakukan saat masih melaksanakan PI ataupun setelah selesai melaksanakan PI\r\n', 45, 99, 1, '2017-03-15 16:35:09'),
(57, 'Langkah 1', '1). Menyusun laporan PI sesuai dengan judul yang telah di acc oleh Dosen pembimbing PI\r\n\r\n2). Format laporan bisa dilihat di buku panduan praktik industri\r\n', 46, 99, 1, '2017-03-15 16:24:26'),
(58, 'Langkah 2', 'Mengkonsultasikan laporan PI yang telah disusun kepada dosen pembimbing dan pembimbing industri (jika diperlukan), hingga laporan di acc\r\n', 46, 99, 2, '2017-03-15 06:48:18'),
(59, 'Langkah 3', 'Setelah laporan PI mendapatkan acc dari dosen pembimbing, laporan digandakan dan dijilid hardcover sejumlah kebutuhan (lihat di panduan praktik industri)\r\n', 46, 99, 3, '2017-03-15 06:48:19'),
(60, 'Langkah 4', 'Meminta tanda tangan dosen pembimbing PI pada laporan yang telah digandakan dan dijilid hardcover\r\n', 46, 99, 4, '2017-03-15 06:48:19'),
(61, 'Langkah 5', '1). Meminta tanda tangan pembimbing industri pada laporan yang telah digandakan dan dijilid hardcover\r\n\r\n2). Meminta stempel basah industri pada laporan yang telah ditanda tangani oleh pembimbing industri\r\n', 46, 99, 5, '2017-03-15 16:24:10'),
(62, 'Langkah 6', 'Meminta tanda tangan Koordinator PI Jurusan pada laporan yang telah digandakan dan dijilid hardcover\r\n', 46, 99, 6, '2017-03-15 06:48:19'),
(63, 'Langkah 7', 'Meminta persetujuan petugas loket 3 pada nama dan NIP Wakil Dekan I FT UNY pada laporan yang telah ditanda tangani dosen pembimbing, pembimbing industri dan koordinator PI jurusan\r\n', 46, 102, 7, '2017-03-15 06:48:19'),
(64, 'Langkah 8', 'Meminta tanda tangan Wakil Dekan I FT UNY pada laporan yang telah disetujui oleh petugas loket 3\r\n', 46, 107, 8, '2017-03-15 06:48:19'),
(65, 'Langkah 9', 'Meminta stempel basah fakultas pada laporan PI di bagian tanda tangan Wakil Dekan I FT UNY\r\n', 46, 104, 9, '2017-03-15 06:48:19'),
(66, 'Langkah 10', 'Menyerahkan Laporan PI kepada dosen pembimbing, koordinator PI jurusan (atau yang lainnya sesuai dengan kebutuhan dan ketentuan)\r\n', 46, 99, 10, '2017-03-15 06:48:19'),
(67, 'Langkah 1', '1). Meminta hasil penilaian pembimbing industri sesuai dengan lembar penilaian yang telah diberikan pada saat pelaksanaan praktik industri\r\n\r\n2). Lembar penilaian dimasukan ke dalam map (lihat panduan praktik industri)\r\n', 47, 99, 1, '2017-03-15 16:24:02'),
(68, 'Langkah 2', 'Meminta surat keterangan selesai melaksanakan PI dari industri/proyek', 47, 99, 2, '2017-03-15 06:51:22'),
(69, 'Langkah 3', 'Memberikan blangko penilaian dosen dan map yang berisi lembar penilaian dari pembimbing industri kepada dosen pembimbing\r\n', 47, 99, 3, '2017-03-15 06:51:22'),
(70, 'Langkah 4', 'Memberikan surat keterangan selesai melaksanakan PI dari industri kepada fakultas\r\n', 47, 102, 4, '2017-03-15 06:51:22'),
(71, 'Keterangan', '1). Melaksanakan ujian PI sesuai dengan ketentuan dosen pembimbing\r\n\r\n2). Tidak semua dosen pembimbing melaksanakan ujian PI\r\n', 48, 99, 1, '2017-03-15 16:25:05'),
(72, 'Keterangan', 'Membeli satu buku sumbangan, maksimal cetakan 3 atau 4 tahun sebelumnya untuk:\r\n1). Perpustakaan pusat/universitas (minimal harga Rp 25.000,-  disertai kuitansi pembelian)\r\n2). Perpustakaan jurusan (tidak ada ketentuan)\r\n', 72, 99, 1, '2017-03-15 07:05:53'),
(73, 'Keterangan', 'Meminta keterangan bebas perpustakaan jurusan kepada petugas perpustakaan jurusan dan mengisi data alumni untuk mendapatkan tanda tangan bebas perpustakaan jurusan pada lembar permohonan nilai skripsi\r\n', 73, 108, 1, '2017-03-15 07:06:43'),
(74, 'Keterangan', 'Menyerah buku sumbangan dan CD berisi file skripsi kepada petugas perpustakaan pusat untuk mendapatkan keterangan bebas perpustakaan pusat\r\n', 74, 109, 1, '2017-03-15 07:08:51'),
(75, 'Syarat 1', 'Telah mendapatkan keterangan bebas perpustakaan (pusat dan jurusan)', 75, 99, 1, '2017-03-15 07:11:49'),
(76, 'Syarat 2', 'Semua nilai di SIAKAD tidak ada yang kosong, termasuk nilai Tugas Akhir Skripsi (TAS)', 75, 99, 2, '2017-03-15 07:11:50'),
(77, 'Keterangan', 'Meminta tanda tanga ketua program studi pada surat keterangan bebas teori yang telah didapatkan sebelum melaksanakan ujian Tugas Akhir Skripsi (TAS)\r\n', 76, 99, 1, '2017-03-15 07:12:25'),
(78, 'Keterangan', 'Menyerahkan surat keterangan bebas teori dan print out DHS yang telah ditanda tangani oleh Ketua Jurusan, untuk mendapatkan validasi dari petugas loket 1 pada surat keterangan bebas teori dan print out  DHS\r\n', 77, 100, 1, '2017-03-15 07:13:06'),
(79, 'Keterangan', '1). Telah mengurus bebas teori sebelum yudisium\r\n\r\n2). Nilai Pro TEFL UNY minimal 425\r\n', 78, 99, 1, '2017-03-15 16:25:16'),
(80, 'Langkah 1', 'Membuka siakad2013.uny.ac.id dan login dengan memasukkan NIM dan Password', 79, 99, 1, '2017-03-15 15:46:43'),
(81, 'Langkah 2', '1). Mengisi data yudisium\r\n\r\n2). Mendapatkan kode untuk pembayaran di bank\r\n     Catatan: Bagi mahasiswa bidikmisi tidak perlu\r\n', 79, 99, 2, '2017-03-15 16:25:22'),
(82, 'Keterangan', 'Membayar di bank (BPD DIY/BNI/Mandiri/BTN) dengan menyerahkan kode yang didapatkan setelah mengisi data yudisium di SIAKAD\r\nCatatan : Bagi mahasiswa bidikmisi tidak perlu\r\n', 80, 99, 1, '2017-03-15 15:47:18'),
(83, 'Langkah 1', 'Membuka website siakad2013.uny.ac.id dan login dengan memasukkan NIM dan Password', 81, 99, 1, '2017-03-15 15:49:20'),
(84, 'Langkah 2', 'Mencetak data yudisium yang terdiri dari 3 lembar data (lembar 1 untuk mahasiswa, lembar 2 dan 3 diserahkan ke loket 4 )\r\n', 81, 99, 2, '2017-03-15 15:49:20'),
(85, 'Keterangan', '1). Meminta paraf petugas loket 4 pada lembar 1, 2 dan 3 data yudisium dari SIAKAD\r\n\r\n2). Menyerahkan lembar 2 dan 3 data yudisium dari SIAKAD, surat keterangan bebas teori, print out DHS yang telah divalidasi oleh loket 1 dan ijazah terakhir (SMA/SMK) kepada petugas loket 4\r\n', 82, 103, 1, '2017-03-15 16:25:27'),
(86, 'Keterangan', '1). Telah mendapatkan acc dari dosen pembimbing skripsi untuk melaksanakan ujian\r\n2). Semua nilai di SIAKAD tidak ada yang kosong, kecuali nilai Tugas Akhir Skripsi (TAS)\r\n3). Telah menempuh jumlah SKS tertentu sesuai panduan akademik\r\n4). Mata kuliah yang wajib lulus telah terpenuhi\r\n5). Jumlah nilai D tidak melebihi batas maksimal yang diizinkan\r\n', 63, 99, 1, '2017-03-15 15:51:10'),
(87, 'Langkah 1', 'Mendownload blangko “Permohonan Bebas Teori” di http://pendidikan-teknik-sipilperencanaan.ft.uny.ac.id/download\r\n', 64, 99, 1, '2017-03-15 15:53:08'),
(88, 'Langkah 2', 'Mencetak blangko permohonan bebas teori dan mengisinya', 64, 99, 2, '2017-03-15 15:53:08'),
(89, 'Langkah 3', 'Meminta tanda tangan Dosen Pembimbing Skripsi dan Dosen Penasehat Akademik pada blangko permohonan bebas teori\r\n', 64, 99, 3, '2017-03-15 15:53:08'),
(90, 'Keterangan', 'Menyerahkan blangko permohonan bebas teori yang telah ditanda tangani beserta berkas persyaratan lainnya ke petugas loket 1, untuk mendapatkan print out DHS\r\n', 65, 100, 1, '2017-03-15 15:54:11'),
(91, 'Keterangan', 'Menyerahkan map berisi print out DHS dan KRS seluruh semester kepada petugas pengajaran jurusan untuk dicocokan\r\n', 66, 106, 1, '2017-03-15 15:55:25'),
(92, 'Keterangan', 'Meminta tanda tangan Dosen Penasehat Akademik pada print out DHS yang telah dicocokan oleh petugas pengajaran\r\n', 67, 99, 1, '2017-03-15 15:55:47'),
(93, 'Keterangan', 'Meminta tanda tangan Ketua Program studi pada print out DHS yang telah ditanda tangani oleh Dosen PA\r\n', 68, 99, 1, '2017-03-15 15:56:07'),
(94, 'Keterangan', 'Menyerahkan print out DHS yang telah ditanda tangani oleh Dosen PA dan Kajur untuk mendapatkan surat keterangan bebas teori kepada petugas loket 1\r\n', 69, 100, 1, '2017-03-15 15:56:44'),
(95, 'Langkah 1', 'Meminta tanda tangan Kasubbag Akademik FT UNY pada surat keterangan bebas teori\r\n', 70, 105, 1, '2017-03-15 15:57:54'),
(96, 'Langkah 2', 'Meminta stempel basah pada tanda tangan Kasubbag Akademik FT UNY di surat keterangan bebas teori\r\n', 70, 104, 2, '2017-03-15 15:57:54'),
(97, 'Keterangan', 'Surat keterangan bebas teori dan DHS disimpan untuk keperluan Mengurus bebas teori sebelum yudisium\r\n', 71, 99, 1, '2017-03-15 15:58:11'),
(98, 'Keterangan', '1) Sudah mengikuti seminar penyusuna TAS\r\n\r\n2) Sudah menempuh mata kuliah Statistika dan Metodologi Penelitian Pendidikan.\r\n\r\n3) Telah menyelesaikan beban studi sekurang-kurangnya 120 sks.\r\n\r\n4) Indeks prestasi kumulatif (IPK) sekurang-kurangnya 2,50.', 49, 99, 1, '2017-03-15 16:45:41'),
(99, 'Keterangan', 'Menemui dosen pembimbing skripsi untuk mengkonsultasikan judul skripsi yang akan diambil\r\n', 50, 99, 1, '2017-03-15 16:46:11'),
(100, 'Langkah 1', '1). Penyusunan proposal skripsi untuk setiap dosen pembimbing berbeda-beda (ada yang penyusunannya per bab, ada juga yang langsung sampai bab 3)\r\n\r\n2). Aturan penyusunan proposal skripsi lihat di buku panduan Tugas Akhir Skripsi\r\n', 51, 99, 1, '2017-03-15 16:48:07'),
(101, 'Langkah 2', '1). Mengkonsultasikan proposal skripsi kepada dosen pembimbing, untuk mendapatkan acc atas naskah proposal skripsi tersebut\r\n\r\n2). Meminta tanda tangan dosen pembimbing pada lembar konsultasi\r\n\r\n3). Lakukan terus langkah ini hingga seluruh naskan proposal skripsi disetujui/di acc oleh dosen pembimbing\r\n', 51, 99, 2, '2017-03-15 16:48:07'),
(102, 'Langkah 1', '1). Bagi mahasiswa skripsi non-media: Menyusun instrumen penelitian sesuai dengan kisi-kisi yang terdapat pada Bab III proposal skripsi\r\n\r\n2). Bagi mahasiswa skripsi media:  Menyusun media penelitian sesuai dengan yang dijabarkan di naskah proposal skripsi\r\n', 52, 99, 1, '2017-03-15 16:50:25'),
(103, 'Langkah 2', '1). Bagi mahasiswa skripsi non-media: Mengkonsultasikan instrumen penelitian kepada dosen pembimbing\r\n2). Bagi mahasiswa skripsi media: Mengkonsultasikan media penelitian kepada dosen pembimbing\r\n3). Meminta tanda tangan dosen pembimbing pada lembar konsultasi\r\n4). Lakukan terus langkah ini hingga instrumen penelitian/media penelitian disetujui/di acc oleh dosen pembimbing\r\n', 52, 99, 2, '2017-03-15 16:50:25'),
(104, 'Langkah 1', 'Menanyakan kepada dosen pembimbing untuk menentukan dosen validator\r\n', 53, 99, 1, '2017-03-15 16:53:03'),
(105, 'Langkah 2 ', 'Setelah mendapatkan nama dosen validator, selanjutnya membuat suratpermohonan validasi beserta lampiran (format bisa dilihat di buku panduan tugas akhir skripsi)\r\n', 53, 99, 2, '2017-03-15 16:53:03'),
(106, 'Langkah 3', 'Mencetak surat permohonan validasi beserta lampirannya', 53, 99, 3, '2017-03-15 16:53:03'),
(107, 'Langkah 4', 'Meminta tanda tangan dosen pembimbing pada surat permohonan validasi \r\n', 53, 99, 4, '2017-03-15 16:53:03'),
(108, 'Langkah 5', 'Meminta tanda tangan ketua jurusan pada surat permohonan validasi yang telah ditanda tangani oleh dosen pembimbing\r\n', 53, 99, 5, '2017-03-15 16:53:03'),
(109, 'Langkah 6', '1). Menyerahkan map beirisi surat permohonan validasi beserta lampirannya kepada dosen validator\r\n\r\n 2). Menanyakan kepada dosen validator kapan lembar validasi dapat diambil\r\n', 53, 99, 6, '2017-03-15 16:53:03'),
(110, 'Langkah 7', '1). Mengambil lembar validasi dari dosen validator\r\n\r\n2). Jika terdapat revisi, maka lakukanlah revisi pada instrumen/media penelitian sesuai dengan saran dan masukan dosen validator\r\n\r\n3). Lakukan revisi hingga instrumen/media penelitian disetujui/di acc oleh dosen validator\r\n', 53, 99, 7, '2017-03-15 16:53:03'),
(111, 'Langkah 1', 'Menggandakan dan menjilid naskah proposal skripsi sejumlah yang dibutuhkan\r\nCatatan: Setiap lokasi penelitian memiliki aturan yang berbeda-beda\r\n', 54, 99, 1, '2017-03-15 16:59:30'),
(112, 'Langkah 2', 'Meminta tanda tangan dosen pembimbing skripsi pada proposal skripsi yang telah dijilid\r\n', 54, 99, 2, '2017-03-15 16:59:30'),
(113, 'Langkah 3', 'Meminta tanda tangan Ketua Program Studi pada proposal skripsi yang telah ditanda tangani oleh dosen pembimbing\r\n', 54, 99, 3, '2017-03-15 16:59:31'),
(114, 'Langkah 4', 'Meminta validasi kepada petugas loket 3 pada nama dan NIP Dekan', 54, 102, 4, '2017-03-15 16:59:31'),
(115, 'Langkah 5', 'Meminta tanda tangan Dekan FT UNY pada proposal yang telah Disetujui oleh petugas loket 3\r\n', 54, 107, 5, '2017-03-15 16:59:31'),
(116, 'Langkah 6', 'Menggandakan halaman cover dan halaman persetujuan sejumlah kebutuhan\r\n', 54, 99, 6, '2017-03-15 16:59:31'),
(117, 'Langkah 7', 'Halaman persetujuan pada naskah proposal dan yang telah digandakan distempel basah pada bagian tanda tangan Dekan\r\n', 54, 99, 7, '2017-03-15 16:59:31'),
(118, 'Langkah 8', 'Mengambil blangko penelitian di loket 3', 54, 102, 8, '2017-03-15 16:59:31'),
(119, 'Langkah 9', 'Mengisi blangko penelitian', 54, 99, 9, '2017-03-15 16:59:31'),
(120, 'Langkah 10 ', 'Meminta tanda tangan dosen pembimbing pada blangko penelitian yang telah diisi\r\n', 54, 99, 10, '2017-03-15 16:59:31'),
(121, 'Langkah 11', 'Menyerahkan blangko penelitian yang telah ditanda tangani oleh dosen pembimbing, fotokopi halaman cover dan fotokopi halaman persetujuan yang telah distempel untuk mendaptkan Surat Ijin Penelitian dari Fakultas\r\n', 54, 102, 11, '2017-03-15 16:59:31'),
(122, 'Langkah 12', 'Mengurus ijin penelitian di provinsi di mana lokasi penelitian berada\r\nCatatan: Jika penelitian dilakukan di FT UNY tidak diperlukan\r\n', 54, 99, 12, '2017-03-15 16:59:31'),
(123, 'Langkah 13', 'Mengurus ijin penelitian di kota/ kabupaten di mana lokasi penelitianberada\r\nCatatan: Jika penelitian dilakukan di FT UNY tidak diperlukan\r\n', 54, 99, 13, '2017-03-15 16:59:31'),
(124, 'Langkah 14', 'Mengurus ijin penelitian di sekolah/industri / lokasi penelitian\r\nCatatan: Jika penelitian dilakukan di FT UNY tidak diperlukan\r\n', 54, 99, 14, '2017-03-15 16:59:31'),
(125, 'Langkah 1', 'Menghubungi guru/ bagian yang ditunjuk untuk membantu proses pengambilan data\r\n', 55, 99, 1, '2017-03-15 17:00:29'),
(126, 'Langkah 2', 'Melakukan pengambilan data pada responden yang telah direncanakan', 55, 99, 2, '2017-03-15 17:00:29'),
(127, 'Langkah 1', '1). Penyusunan hasil penelitian pada Bab 4 dan Bab 5 (untuk setiap dosen pembimbing berbeda-beda, ada yang penyusunannya per bab, ada juga yang langsung keduanya)\r\n\r\n2). Aturan penyusunan Bab 4 dan Bab 5 lihat di buku panduan Tugas Akhir Skripsi\r\n', 56, 99, 1, '2017-03-15 17:01:44'),
(128, 'Langkah 2', '1). Mengkonsultasikan hasil penelitian kepada dosen pembimbing, untuk mendapatkan acc atas hasil penelitian yang telah disusun\r\n2). Meminta tanda tangan dosen pembimbing pada lembar konsultasi\r\n3). Lakukan terus langkah ini hingga seluruh hasil penelitian disetujui/di acc oleh dosen pembimbing\r\n', 56, 99, 2, '2017-03-15 17:01:44'),
(129, 'Langkah 1', 'Mengurus bebas teori sebelum ujian (bisa dilihat di bagian alur “Bebas Teori Sebelum Ujian)\r\n', 57, 99, 1, '2017-03-15 17:04:57'),
(130, 'Langkah 2', '1). Menemui Sekretaris Jurusan untuk mengajukan ujian/sidang skripsi dengan menyerahkan surat keterangan bebas teori dan mendapatkan blangko pendaftaran ujian/sidang\r\n\r\n2). Sekjur akan menunjuk Dosen Penguji I dan II \r\n', 57, 99, 2, '2017-03-15 17:04:57'),
(131, 'Langkah 3', '1). Mengisi blangko pendaftaran ujian/sidang\r\n\r\n2). Mencatat ruangan yang bisa digunakan untuk ujian/sidang\r\n\r\n3). Menanyakan kepada dosen penguji I, dosen penguji II dan dosen pembimbing untuk menentukan hari dan jam ujian/sidang disesuaikan dengan ketersediaan ruang yang ada\r\n', 57, 99, 3, '2017-03-15 17:04:58'),
(132, 'Langkah 4', '1). Menyerahkan blangko pendaftaran ujian kepada petugas pengajaran untuk mendapatkan surat undangan dan SK Ujian/Sidang\r\n\r\n2). Mengisi buku perijininan ruang dan perlengkapan ruang\r\n\r\n3). Mengisi buku permohonan snack untuk ujian/sidang\r\n', 57, 106, 4, '2017-03-15 17:04:58'),
(133, 'Langkah 5', 'Menggandakan naskah skripsi untuk dosen pembimbing, penguji dan mahasiswa sendiri\r\n', 57, 99, 5, '2017-03-15 17:04:58'),
(134, 'Langkah 6', 'Menyerahkan berkas skripsi kepada dosen pembimbing dan dosen penguji\r\n', 57, 99, 6, '2017-03-15 17:04:58'),
(135, 'Langkah 1', 'Membuat presentasi dan menyiapkan kelengkapan lainnya yang dirasa perlu untuk mendukung pelaksanaan ujian/sidang\r\n', 58, 99, 1, '2017-03-15 17:06:30'),
(136, 'Langkah 2', 'Mengkonfirmasi dosen penguji dan dosen pembimbing apakah benar benar bisa menguji skripsi sesuai dengan jam yang tertera di surat undangan yang telah diberikan\r\n', 58, 99, 2, '2017-03-15 17:06:31'),
(137, 'Langkah 3', 'Melaksanakan ujian/sidang skripsi sesuai dengan yang telah diagendakan\r\n', 58, 99, 3, '2017-03-15 17:06:31'),
(138, 'Langkah 1', 'Melakukan revisi pada naskah skripsi, sesuai dengan saran dan masukan dosen penguji I dan II\r\n', 59, 99, 1, '2017-03-15 17:07:47'),
(139, 'Langkah 2', '1). Mengkonsultasikan hasil revisi naskah skripsi kepada dosen penguji, untuk mendapatkan acc atas naskah skripsi yang telah direvisi\r\n\r\n2). Lakukan terus langkah ini hingga seluruh naskah skripsi revisi disetujui/di acc oleh dosen penguji\r\n\r\n3). Jika naskah telah di acc oleh dosen penguji, selanjutnya meminta dosen penguji dan pembimbing tanda tangan di lembar halaman pengesahan\r\n', 59, 99, 2, '2017-03-15 17:07:48'),
(140, 'Langkah 1', 'Menggandakan dan menjilid hardcover naskah skripsi sejumlah dibutuhkan (1 untuk dosen pembimbing dan 1 untuk sekjur)\r\n', 60, 99, 1, '2017-03-15 17:10:35'),
(141, 'Langkah 2', 'Meminta tanda tangan dosen pembimbing skripsi pada naskah skripsi yang telah dijilid\r\n', 60, 99, 2, '2017-03-15 17:10:35'),
(142, 'Langkah 3', 'Meminta tanda tangan Ketua Program Studi pada naskah skripsi yang telah ditanda tangani oleh dosen pembimbing\r\n', 60, 99, 3, '2017-03-15 17:10:35'),
(143, 'Langkah 4', 'Meminta validasi kepada petugas loket 3 pada nama dan NIP Dekan', 60, 102, 4, '2017-03-15 17:10:35'),
(144, 'Langkah 5', 'Meminta validasi kepada petugas JPTK FT pada bagian daftar pustaka', 60, 110, 5, '2017-03-15 17:10:35'),
(145, 'Langkah 6', 'Meminta tanda tangan Dekan FT UNY pada naskah yang telah disetujui oleh petugas loket 3\r\n', 60, 107, 6, '2017-03-15 17:10:35'),
(146, 'Langkah 1', 'Membuat abstrak dalam bahasa inggris', 61, 99, 1, '2017-03-15 17:12:14'),
(147, 'Langkah 2', 'Membuat biodata jurnal dan naskah jurnal berdasarkan naskah skripsi yang telah disetujui.\r\nFormat biodata jurnal dan format penulisan jurnal download di http://pendidikan-teknik-sipilperencanaan.ft.uny.ac.id/download\r\n', 61, 99, 2, '2017-03-15 17:12:14'),
(148, 'Langkah 1', 'Memasukan semua file skripsi, biodata jurnal dan naskah jurnal ke dalam CD (CD dibuat 3 rangkap: 1 untuk dosen pembimbing, 1 untuk sekjur dan 1 untuk perpustakaan pusat)\r\n', 62, 99, 1, '2017-03-15 17:15:54'),
(149, 'Langkah 2', 'Mengirim naskah jurnal dan biodata jurnal ke email berikut ta.sipil.uny@gmail.com dengan subject: (nama naskah)_Nama_NIM\r\n', 62, 99, 2, '2017-03-15 17:15:54'),
(150, 'Langkah 3', 'Melakukan validasi pengiriman jurnal dan biodata ke petugas pengajaran untuk mendapatkan tanda tangan petugas pengajaran di lembar permohonan nilai skripsi\r\n', 62, 99, 3, '2017-03-15 17:15:54'),
(151, 'Langkah 4', 'Bebas perpustakaan jurusan (lihat pada alur “Bebas Perpustakaan” pada langkah bebas teori perpustakaan jurusan), untuk mendapatkan tanda tangan petugas perpustakaan pada blangko permohonan nilai skripsi\r\n', 62, 99, 4, '2017-03-15 17:15:54'),
(152, 'Langkah 5', 'Abstrak dalam bahasa Indonesia dan Inggris dilaminating bolak-balik', 62, 99, 5, '2017-03-15 17:15:55'),
(153, 'Langkah 6', 'Menyerahkan naskah skripsi yang telah dijilid dan disahkan oleh Dekan FT dan CD berisi file skripsi, jurnal dan biodata jurnal untuk mendapatkan tanda tangan dosen pembimbing pada blangko bukti penyerahan laporan skripsi\r\n', 62, 99, 6, '2017-03-15 17:15:55'),
(154, 'Langkah 7', 'Menyerahkan buku sumbangan, naskah skripsi yang telah dijilid dan disahkan oleh Dekan FT, abstrak yang telah dilaminating, amplop berperangko dan alamat orang tua, fotokopi sertifikat Pro TEFL dari UNY dan CD berisi file skripsi, jurnal dan biodata jurnal untuk mendapatkan tanda tangan sekjur pada blangko permohonan nilai skripsi dan mendapatkan nilai skripsi\r\n', 62, 99, 7, '2017-03-15 17:15:55'),
(155, 'Langkah 1', 'Membuka web tagihan di tagihan.uny.ac.id \r\nCatatan : Bagi mahasiswa bidikmisi tidak perlu\r\n', 83, 99, 1, '2017-03-21 20:37:53'),
(156, 'Langkah 2', 'Mengecek tagihan dengan memasukkan NIM\r\nCatatan : Bagi mahasiswa bidikmisi tidak perlu\r\n', 83, 99, 2, '2017-03-21 20:37:54'),
(157, 'Keterangan', 'Membayar tagihan di bank (BPD DIY/BNI/Mandiri/BTN) dengan menyebutkan NIM atau menunjukkan KTM\r\nCatatan : Bagi mahasiswa bidikmisi tidak perlu\r\n', 84, 99, 1, '2017-03-21 20:39:55'),
(158, 'Langkah 1', 'Membuka web registrasi online di https://registrasi.uny.ac.id', 85, 99, 1, '2017-03-21 20:41:04'),
(159, 'Langkah 2', 'Masuk dengan klik “Login SSO (Mahasiswa)”, memasukkan UNY ID dan Password\r\n', 85, 99, 2, '2017-03-21 20:41:04'),
(160, 'Langkah 3', 'Melakukan registrasi online dengan melakukan update biodata', 85, 99, 3, '2017-03-21 20:41:04'),
(161, 'Keterangan', '1). Sudah membayar tagihan/UKT di bank\r\nCatatan: bagi mahasiswa bidikmisi tidak perlu\r\n\r\n2). Sudah melakukan registrasi online di https://registrasi.uny.ac.id\r\n', 86, 99, 1, '2017-03-21 20:44:38'),
(162, 'Keterangan', '1). Reguler : mengambil blangko KRS manual dengan menunjukkan kwitansi\r\n\r\n2). Bidikmisi : mengambil blangko KRS manual dengan menunjukkan print out bukti registrasi online\r\n', 87, 100, 1, '2017-03-21 20:45:42'),
(163, 'Langkah 1', 'Melihat mata kuliah yang ditawarkan pada semester yang akan diambil di  papan pengumuman jurusan\r\n', 88, 99, 1, '2017-03-21 20:47:41'),
(164, 'Langkah 2', 'Mengisi blangko KRS manual sesuai dengan mata kuliah, kode dan dosen pengampu pada semester yang akan diambil\r\n', 88, 99, 2, '2017-03-21 20:47:41'),
(165, 'Keterangan', 'Meminta tanda tangan Dosen PA pada blangko KRS manual yang sudah diisi\r\n', 89, 99, 1, '2017-03-21 20:48:21'),
(166, 'Langkah 1', 'Membuka SIAKAD di https://siakad2013.uny.ac.id dan Masuk ke SIAKAD dengan memasukkan NIM dan password\r\n', 90, 99, 1, '2017-03-21 20:49:13'),
(167, 'Langkah 2', 'Mengisi mata kuliah yang diambil dengan cara mencentang pada mata kuliah tersebut, sesuai dengan yang tertera pada blangko KRS manual\r\n', 90, 99, 2, '2017-03-21 20:49:13'),
(168, 'Keterangan', 'Menyerahkan blangko KRS manual yang sudah ditanda tangani oleh Dosen PA kepada petugas pengajaran jurusan, untuk mendapatkan stempel pada blangko KRS sebagai tanda KRS sudah disahkan\r\n', 91, 99, 1, '2017-03-21 20:50:38'),
(169, 'Keterangan', '1). Telah mengikuti pembekalan PI\r\n\r\n2). Telah mendapatkan sertifikat pembekalan PI\r\n\r\n3). Telah mendapatkan pembagian Dosen Pembimbing PI\r\n', 92, 99, 1, '2017-03-26 01:20:43'),
(170, 'Keterangan', 'Mencari industri untuk melaksanakan PI serta menanyakan persyaratan dan kuota pesertanya\r\n', 93, 99, 1, '2017-03-26 01:21:20'),
(171, 'Meminta Blangko', 'Meminta blangko surat ijin PI di kantor pengajaran jurusan kemudian diisi', 94, 111, 1, '2017-03-26 01:28:51'),
(172, 'Meminta Tanda Tangan Koor. PI', 'Meminta tanda tangan koordinator praktik industri pada surat permohonan yang telah diisi', 94, 99, 2, '2017-03-26 01:28:51'),
(173, 'Langkah 1', 'Menyerahkan blangko surat permohonan ijin PI yang sudah ditanda tangani oleh Dosen Pembimbing PI dan Koordinator PI Jurusan kepada petugas loket 3, untuk mendapatkan surat permohonan ijin PI dari fakultas\r\n', 95, 102, 1, '2017-03-26 01:31:37'),
(174, 'Langkah 2', 'Memperbanyak surat permohonan ijin PI dari fakultas sesuai kebutuhan\r\n', 95, 99, 2, '2017-03-26 01:31:37'),
(175, 'Langkah 3', 'Meminta stempel basah pada surat permohonan ijin PI dari fakultas yang telah diperbanyak\r\n', 95, 104, 3, '2017-03-26 01:31:37'),
(176, 'Keterangan', '1). Menyerahkan surat permohonan ijin PI dari fakultas dan berkas persyaratan kepada industri/proyek tempat pelaksanaan PI\r\n\r\n2). Menanyakan apakah diperbolehkan melaksanakan PI di tempat tersebut\r\n\r\n3). Jika Ya : Menanyakan kapan bisa mulai melaksanakan PI. Jika Tidak: Ulangi dari mengisi blangko (dengan industri yang berbeda)\r\n', 96, 99, 1, '2017-03-26 01:33:23'),
(177, 'Langkah 1', 'Menyerahkan lembar penilaian pembimbing industri kepada pembimbing industri untuk dijadikan sebagai panduan dalam menilai mahasiswa\r\n', 97, 99, 1, '2017-03-26 01:34:48'),
(178, 'Langkah 2', '1). Melaksanakan PI sesuai dengan tugas yang diberikan oleh pembimbing industri\r\n\r\n2). Mengisi lembar catatan harian setelah melaksanakan PI di hari tersebut\r\n\r\n3). Meminta tanda tangan pembimbing industri pada lembar catatan harian\r\n', 97, 99, 2, '2017-03-26 01:34:48'),
(179, 'Keterangan', '1). Mengkonsultasikan judul laporan PI yang akan dibuat kepada dosen pembimbing PI\r\n\r\n2). Meminta tanda tangan dosen pembimbing pada lembar konsultasi\r\n\r\n3). Pelaksanaan konsultasi bisa dilakukan saat masih melaksanakan PI ataupun setelah selesai melaksanakan PI\r\n', 98, 99, 1, '2017-03-26 01:36:44'),
(180, 'Langkah 1', '1). Menyusun laporan PI sesuai dengan judul yang telah di setujui oleh Dosen pembimbing PI\r\n\r\n2). Format laporan bisa dilihat di buku panduan praktik industri\r\n', 99, 99, 1, '2017-03-26 01:41:14'),
(181, 'Langkah 2', 'Mengkonsultasikan laporan PI yang telah disusun kepada dosen pembimbing dan pembimbing industri (jika diperlukan), hingga laporan di setujui\r\n', 99, 99, 2, '2017-03-26 01:41:14'),
(182, 'Langkah 3', 'Setelah laporan PI mendapatkan acc dari dosen pembimbing, laporan digandakan dan dijilid hardcover sejumlah kebutuhan (lihat di panduan praktik industri)\r\n', 99, 99, 3, '2017-03-26 01:41:14'),
(183, 'Langkah 4', 'Meminta tanda tangan dosen pembimbing PI pada laporan yang telah digandakan dan dijilid hardcover\r\n', 99, 99, 4, '2017-03-26 01:41:14'),
(184, 'Langkah 5', '1). Meminta tanda tangan pembimbing industri pada laporan yang telah digandakan dan dijilid hardcover\r\n\r\n2). Meminta stempel basah industri pada laporan yang telah ditanda tangani oleh pembimbing industri\r\n', 99, 99, 5, '2017-03-26 01:41:14'),
(185, 'Langkah 6', 'Meminta tanda tangan Koordinator PI Jurusan pada laporan yang telah digandakan dan dijilid hardcover\r\n', 99, 99, 6, '2017-03-26 01:41:14'),
(186, 'Langkah 7', 'Meminta persetujuan petugas loket 3 pada nama dan NIP Wakil Dekan I FT UNY pada laporan yang telah ditanda tangani dosen pembimbing, pembimbing industri dan koordinator PI jurusan\r\n', 99, 102, 7, '2017-03-26 01:41:14'),
(187, 'Langkah 8', 'Meminta tanda tangan Wakil Dekan I FT UNY pada laporan yang telah disetujui oleh petugas loket 3\r\n', 99, 107, 8, '2017-03-26 01:41:14'),
(188, 'Langkah 9', 'Meminta stempel basah fakultas pada laporan PI di bagian tanda tangan Wakil Dekan I FT UNY\r\n', 99, 104, 9, '2017-03-26 01:41:14'),
(189, 'Langkah 10', 'Menyerahkan Laporan PI kepada dosen pembimbing, koordinator PI jurusan (atau yang lainnya sesuai dengan kebutuhan dan ketentuan)\r\n', 99, 99, 10, '2017-03-26 01:41:14'),
(190, 'Langkah 1', '1). Meminta hasil penilaian pembimbing industri sesuai dengan lembar penilaian yang telah diberikan pada awal pelaksanaan PI\r\n\r\n2). Lembar penilaian dimasukan ke dalam map (lihat panduan praktik industri)\r\n', 100, 99, 1, '2017-03-26 01:44:08'),
(191, 'Langkah 2', 'Meminta surat keterangan selesai melaksanakan PI dari industri', 100, 99, 2, '2017-03-26 01:44:08'),
(192, 'Langkah 3', 'Memberikan blangko penilaian dosen dan map yang berisi lembar penilaian dari pembimbing industri kepada dosen pembimbing\r\n', 100, 99, 3, '2017-03-26 01:44:08'),
(193, 'Langkah 4', 'Memberikan surat keterangan selesai melaksanakan PI dari industri kepada fakultas\r\n', 100, 102, 4, '2017-03-26 01:44:08'),
(194, 'Keterangan', '1). Melaksanakan ujian PI sesuai dengan ketentuan dosen pembimbing\r\n\r\n2). Tidak semua dosen pembimbing melaksanakan ujian PI\r\n', 101, 99, 1, '2017-03-26 01:44:34'),
(195, 'Keterangan', '1). Telah mendapatkan acc dari dosen pembimbing skripsi untuk melaksanakan ujian\r\n\r\n2). Semua nilai di SIAKAD tidak ada yang kosong, kecuali nilai Tugas Akhir Skripsi (TAS)\r\n\r\n3). Telah menempuh jumlah SKS tertentu sesuai panduan akademik\r\n\r\n4). Mata kuliah yang wajib lulus telah terpenuhi\r\n\r\n5). Jumlah nilai D tidak melebihi batas maksimal yang diizinkan\r\n', 102, 99, 1, '2017-03-26 02:00:20'),
(196, 'Langkah 1', 'Meminta Blangko Bebas Teori di pengajaran jurusan', 103, 111, 1, '2017-03-26 02:01:48'),
(197, 'Langkah 2', 'Mengisi Blangko Bebas Teori', 103, 99, 2, '2017-03-26 02:01:48'),
(198, 'Langkah 3', 'Meminta tanda tangan Dosen Pembimbing Skripsi dan Dosen Penasehat Akademik pada blangko permohonan bebas teori\r\n', 103, 99, 3, '2017-03-26 02:01:48'),
(199, 'Keterangan', 'Menyerahkan blangko permohonan bebas teori yang telah ditanda tangani beserta berkas persyaratan lainnya ke petugas loket 1, untuk mendapatkan print out DHS\r\n', 104, 100, 1, '2017-03-26 02:04:36'),
(200, 'Keterangan', 'Meminta tanda tangan Ketua Program studi pada print out DHS yang telah ditanda tangani oleh Dosen PA\r\n\r\n', 106, 99, 1, '2017-03-26 02:09:23'),
(201, 'Keterangan', 'Meminta tanda tangan Dosen Penasehat Akademik pada print out DHS dari loket 1', 110, 99, 1, '2017-03-26 02:08:56'),
(202, 'Keterangan', 'Menyerahkan print out DHS yang telah ditanda tangani oleh Dosen PA dan Kajur untuk mendapatkan surat keterangan bebas teori kepada petugas loket 1\r\n', 107, 100, 1, '2017-03-26 02:11:20'),
(203, 'Langkah 1', 'Meminta tanda tangan Kasubbag Akademik FT UNY pada surat keterangan bebas teori\r\n', 108, 105, 1, '2017-03-26 02:12:16'),
(204, 'Langkah 2', 'Meminta stempel basah pada tanda tangan Kasubbag Akademik FT UNY di surat keterangan bebas teori\r\n', 108, 104, 2, '2017-03-26 02:12:16'),
(205, 'Keterangan', 'Surat keterangan bebas teori dan DHS disimpan untuk keperluan Mengurus bebas teori sebelum yudisium\r\n', 109, 99, 1, '2017-03-26 02:12:33'),
(206, 'Keterangan', 'Naskah Skripsi telah disetujui oleh Pembimbing, Sekretaris Penguji dan Penguji Utama', 111, 99, 1, '2017-03-26 02:16:44'),
(207, 'Keterangan', 'Membeli satu buku sumbangan, maksimal cetakan 3 atau 4 tahun sebelumnya untuk perpustakaan pusat UNY seharga minimal Rp. 25.000,-\r\n', 112, 99, 1, '2017-03-26 02:17:32'),
(208, 'Keterangan', '1) Menunjukan nilai skripsi, jika mendapatkan nilai A maka wajib mengumpulkan hardcopy skripsi  \r\n\r\n2) Menyerahkan abstrak bahasa indonesia dan bahasa inggris masing-masing 2 lembar\r\n \r\n3) CD Softcopy Skripsi dengan warna cover biru', 113, 112, 1, '2017-03-26 02:20:28'),
(209, 'Keterangan', '1) Menyerahkan CD Softcopy Skripsi dengan cover CD warna putih (format dapat dilihat pada papan pengumuman jurusan)\r\n\r\n2) Menyerahkan buku sumbangan dan menunjukkan struk pembelian', 114, 109, 1, '2017-03-26 02:22:05'),
(210, 'Keterangan', '1). Telah mendapatkan keterangan bebas perpustakaan (pusat dan jurusan)\r\n\r\n2). Semua nilai di SIAKAD tidak ada yang kosong, termasuk nilai Tugas Akhir Skripsi (TAS)\r\n', 115, 99, 1, '2017-03-26 02:31:46'),
(211, 'Keterangan', 'Meminta tanda tanga ketua program studi pada surat keterangan bebas teori yang telah didapatkan sebelum melaksanakan ujian Tugas Akhir Skripsi (TAS)\r\n', 116, 99, 1, '2017-03-26 02:32:10'),
(212, 'Keterangan', 'Menyerahkan surat keterangan bebas teori dan print out DHS yang telah ditanda tangani oleh Ketua Jurusan, untuk mendapatkan validasi dari petugas loket 1 pada surat keterangan bebas teori dan print out DHS\r\n', 117, 100, 1, '2017-03-26 02:32:55'),
(213, 'Keterangan', '1). Telah mengurus bebas teori sebelum yudisium\r\n\r\n2). Nilai Pro TEFL UNY minimal 425\r\n', 118, 99, 1, '2017-03-26 02:33:45'),
(214, 'Langkah 1', 'Membuka SIAKAD di https://siakad2013.uny.ac.id dan masuk dengan mengisi NIM dan Password', 119, 99, 1, '2017-03-26 02:35:21'),
(215, 'Langkah 2', '1). Mengisi data yudisium\r\n\r\n2). Mendapatkan kode untuk pembayaran di bank. Bagi mahasiswa bidikmisi tidak perlu\r\n', 119, 99, 2, '2017-03-26 02:35:21'),
(216, 'Keterangan', 'Membayar di bank (BPD DIY/BNI/Mandiri/BTN) dengan menyerahkan kode yang didapatkan setelah mengisi data yudisium di SIAKAD. Bagi mahasiswa bidikmisi tidak perlu\r\n', 120, 99, 1, '2017-03-26 02:35:52'),
(217, 'Langkah 1', 'Membuka SIAKAD di https://siakad2013.uny.ac.id dan masuk dengan mengisi NIM dan Password', 121, 99, 1, '2017-03-26 02:36:44'),
(218, 'Langkah 2', 'Mencetak data yudisium yang terdiri dari 3 lembar data (lembar 1 untuk mahasiswa, lembar 2 dan 3 diserahkan ke loket 4)\r\n', 121, 99, 2, '2017-03-26 02:36:44'),
(219, 'Keterangan', '1). Meminta paraf petugas loket 4 pada lembar 1, 2 dan 3 data yudisium dari SIAKAD\r\n\r\n2). Menyerahkan lembar 2 dan 3 data yudisium dari SIAKAD, surat keterangan bebas teori, print out DHS yang telah divalidasi oleh loket 1 dan fotocopy ijazah terakhir (SMA/SMK) kepada petugas loket 4\r\n', 122, 103, 1, '2017-03-26 02:37:33'),
(220, 'Keterangan', '1) Sudah mengikuti seminar penyusuna TAS \r\n\r\n2) Sudah menempuh mata kuliah Statistika dan Metodologi Penelitian Pendidikan. \r\n\r\n3) Telah menyelesaikan beban studi sekurang-kurangnya 120 sks. \r\n\r\n4) Indeks prestasi kumulatif (IPK) sekurang-kurangnya 2,50.', 123, 99, 1, '2017-03-26 13:49:22'),
(221, 'Keterangan', 'Menemui dosen pembimbing skripsi untuk mengkonsultasikan judul skripsi yang akan diambil\r\n', 124, 99, 1, '2017-03-26 14:03:10'),
(222, 'Langkah 1', '1). Penyusunan proposal skripsi untuk setiap dosen pembimbing berbeda-beda (ada yang penyusunannya per bab, ada juga yang langsung sampai bab 3)\r\n\r\n2). Aturan penyusunan proposal skripsi lihat di buku panduan Tugas Akhir Skripsi\r\n', 125, 99, 1, '2017-03-26 14:04:43'),
(223, 'Langkah 2', '1). Mengkonsultasikan proposal skripsi kepada dosen pembimbing, untuk mendapatkan acc atas naskah proposal skripsi tersebut\r\n\r\n2). Meminta tanda tangan dosen pembimbing pada kartu bimbingan skripsi\r\n\r\n3). Lakukan terus langkah ini hingga seluruh naskan proposal skripsi disetujui/di acc oleh dosen pembimbing\r\n', 125, 99, 2, '2017-03-26 14:04:43'),
(224, 'Langkah 1', '1). Bagi mahasiswa skripsi non-media:  Menyusun instrumen penelitian sesuai dengan kisi-kisi yang terdapat pada Bab III proposal skripsi\r\n\r\n2). Bagi mahasiswa skripsi media: Menyusun media penelitian sesuai dengan yang dijabarkan di naskah proposal skripsi\r\n', 126, 99, 1, '2017-03-26 14:15:21'),
(225, 'Langkah 2', '1). Bagi mahasiswa skripsi non-media: Mengkonsultasikan instrumen penelitian kepada dosen pembimbing\r\n\r\n2). Bagi mahasiswa skripsi media: Mengkonsultasikan media penelitian kepada dosen pembimbing\r\n\r\n3). Meminta tanda tangan dosen pembimbing pada kartu bimbingan\r\n\r\n*) Lakukan terus langkah ini hingga instrumen penelitian/media penelitian disetujui/di acc oleh dosen pembimbing\r\n', 126, 99, 2, '2017-03-26 14:15:21'),
(231, 'Langkah 1', 'Menanyakan kepada dosen pembimbing untuk menentukan dosen validator untuk angkatan 2012 atau sebelumnya. Bagi angkatan 2013 dan seterusnya tidak perlu\r\n', 127, 99, 1, '2017-03-26 14:18:35'),
(232, 'Langkah 2', 'Setelah mendapatkan nama dosen validator, selanjutnya membuat surat permohonan validasi beserta lampiran (format bisa dilihat di buku panduan tugas akhir skripsi)\r\n', 127, 99, 2, '2017-03-26 14:18:35'),
(233, 'Langkah 3', 'Mencetak surat permohonan validasi beserta lampirannya', 127, 99, 3, '2017-03-26 14:18:35'),
(234, 'Langkah 4', 'Meminta tanda tangan dosen pembimbing pada surat permohonan validasi \r\n', 127, 99, 4, '2017-03-26 14:18:35'),
(235, 'Langkah 5', 'Meminta tanda tangan kaprodi pada surat permohonan validasi yang telah ditanda tangani oleh dosen pembimbing\r\n', 127, 99, 5, '2017-03-26 14:18:35'),
(236, 'Langkah 6', '1). Menyerahkan map beirisi surat permohonan validasi beserta lampirannya kepada dosen validator\r\n\r\n2). Menanyakan kepada dosen validator kapan lembar validasi dapat diambil\r\n', 127, 99, 6, '2017-03-26 14:18:35'),
(237, 'Langkah 7', '1). Mengambil lembar validasi dari dosen validator\r\n\r\n2). Jika terdapat revisi, maka lakukanlah revisi pada instrumen/media penelitian sesuai dengan saran dan masukan dosen validator\r\n\r\n 3). Lakukan revisi hingga instrumen/media penelitian disetujui/di acc oleh dosen validator\r\n', 127, 99, 7, '2017-03-26 14:18:35'),
(238, 'Langkah 1', 'Menggandakan dan menjilid naskah proposal skripsi sejumlah yang dibutuhkan.\r\nCatatan: Setiap lokasi penelitian memiliki aturan yang berbeda-beda\r\n', 128, 99, 1, '2017-03-26 14:23:58'),
(239, 'Langkah 2', 'Meminta tanda tangan dosen pembimbing skripsi pada proposal skripsi yang telah dijilid\r\n', 128, 99, 2, '2017-03-26 14:23:58'),
(240, 'Langkah 3', 'Meminta tanda tangan Ketua Program Studi pada proposal skripsi yang telah ditanda tangani oleh dosen pembimbing\r\n', 128, 99, 3, '2017-03-26 14:23:58'),
(241, 'Langkah 4', 'Meminta validasi kepada petugas loket 3 pada nama dan NIP Dekan', 128, 102, 4, '2017-03-26 14:23:58'),
(242, 'Langkah 5', 'Meminta tanda tangan Dekan FT UNY pada proposal yang telah Disetujui oleh petugas loket 3\r\n', 128, 107, 5, '2017-03-26 14:23:58'),
(243, 'Langkah 6', 'Menggandakan halaman cover dan halaman persetujuan sejumlah Kebutuhan\r\n', 128, 99, 6, '2017-03-26 14:23:58'),
(244, 'Langkah 7', 'Halaman persetujuan pada naskah proposal dan yang telah digandakan distempel basah pada bagian tanda tangan Dekan\r\n', 128, 99, 7, '2017-03-26 14:23:58'),
(245, 'Langkah 8', 'Mengambil blangko penelitian di loket 3', 128, 102, 8, '2017-03-26 14:23:58'),
(246, 'Langkah 9', 'Mengisi blangko penelitian', 128, 99, 9, '2017-03-26 14:23:59'),
(247, 'Langkah 10', 'Meminta tanda tangan dosen pembimbing pada blangko penelitian yang telah diisi\r\n', 128, 99, 10, '2017-03-26 14:23:59'),
(248, 'Langkah 11', 'Menyerahkan blangko penelitian yang telah ditanda tangani oleh dosen pembimbing, fotokopi halaman cover dan fotokopi halaman persetujuan yang telah distempel untuk mendaptkan Surat Ijin Penelitian dari Fakultas\r\n', 128, 102, 11, '2017-03-26 14:23:59'),
(249, 'Langkah 12', 'Mengurus ijin penelitian di provinsi di mana lokasi penelitian berada.\r\nCatatan: Jika penelitian dilakukan di FT UNY tidak diperlukan\r\n', 128, 99, 12, '2017-03-26 14:23:59'),
(250, 'Langkah 13', 'Mengurus ijin penelitian di kota/ kabupaten di mana lokasi penelitian berada. \r\nCatatan: Jika penelitian dilakukan di FT UNY tidak diperlukan\r\n', 128, 99, 13, '2017-03-26 14:23:59'),
(251, 'Langkah 14', 'Mengurus ijin penelitian di sekolah/industri / lokasi penelitian. \r\nCatatan: Jika penelitian dilakukan di FT UNY tidak diperlukan\r\n', 128, 99, 14, '2017-03-26 14:23:59'),
(252, 'Langkah 1', 'Menghubungi guru/ bagian yang ditunjuk untuk membantu proses pengambilan data\r\n', 129, 99, 1, '2017-03-26 14:24:47'),
(253, 'Langkah 2', 'Melakukan pengambilan data pada responden yang telah direncanakan', 129, 99, 2, '2017-03-26 14:24:47'),
(254, 'Langkah 1', '1). Penyusunan hasil penelitian pada Bab 4 dan Bab 5 (untuk setiap dosen pembimbing berbeda-beda, ada yang penyusunannya per bab, ada juga yang langsung keduanya)\r\n\r\n2). Aturan penyusunan Bab 4 dan Bab 5 lihat di buku panduan Tugas Akhir Skripsi\r\n', 130, 99, 1, '2017-03-26 14:25:32'),
(255, 'Langkah 2', '1). Mengkonsultasikan hasil penelitian kepada dosen pembimbing, untuk mendapatkan acc atas hasil penelitian yang telah disusun\r\n\r\n2). Meminta tanda tangan dosen pembimbing pada lembar konsultasi\r\n\r\n3). Lakukan terus langkah ini hingga seluruh hasil penelitian disetujui/di acc oleh dosen pembimbing\r\n', 130, 99, 2, '2017-03-26 14:26:07'),
(256, 'Langkah 1', 'Mengurus bebas teori sebelum ujian (bisa dilihat di bagian alur “Bebas Teori Sebelum Ujian)\r\n', 131, 99, 1, '2017-03-26 14:35:04'),
(257, 'Langkah 2', 'Naskah Skripsi yang sudah di tanda tangani oleh kaprodi dan dosen pembimbing di gandakan sebanyak 3 bendel', 131, 99, 2, '2017-03-26 14:35:04'),
(258, 'Langkah 3', 'Mengambil blangko pendaftaran ujian di pengajaran jurusan', 131, 111, 3, '2017-03-26 14:35:04'),
(259, 'Langkah 4', 'Mengisi blangko pendaftaran ujian', 131, 99, 4, '2017-03-26 14:35:04'),
(260, 'Langkah 5', '1) Masukkan naskah Skripsi 3 bendel tadi, Kartu Bimbingan, Surat Keterangan Bebas Teori, dan blanko pendaftaran ujian dimasukkan dalam satu map\r\n\r\n2) Map diberi Nama, NIM, No.HP, e-mail, dan tanggal pendaftaran ujian\r\n', 131, 99, 5, '2017-03-26 14:35:04'),
(261, 'Langkah 6', 'Berikan Map yang berisi Skripsi 3 bendel tadi, Kartu Bimbingan, Surat Keterangan Bebas Teori, dan blanko pendaftaran ujian ke pengajaran jurusan', 131, 111, 6, '2017-03-26 14:35:04'),
(262, 'Keterangan Pengumuman Tanggal Ujian', 'Tanggal ujian akan diberitahukan kepada mahasiswa melalui email, sms atau melalui pengumuman di website jurusan. ', 131, 99, 7, '2017-03-26 14:35:04'),
(263, 'Langkah 1', 'Memastikan Ketua Penguji, Sekertaris Penguji dan Penguji Utama dapat hadir pada ujian. Kemudian memastikan ruangan yang dipakai untuk ujian (Menghubungi pengurus Gedung LPTK)', 132, 99, 1, '2017-03-26 14:40:08'),
(264, 'Langkah 2', 'Membuat presentasi dan menyiapkan kelengkapan lainnya yang dirasa perlu untuk mendukung pelaksanaan ujian/sidang\r\n', 132, 99, 2, '2017-03-26 14:40:08'),
(265, 'Langkah 3', 'Menyiapkan ruangan tempat ujian dan mengambil snack untuk dosen di pengajaran jurusan', 132, 99, 3, '2017-03-26 14:40:08'),
(266, 'Langkah 4', 'Melaksanakan ujian/sidang skripsi sesuai dengan yang telah diagendakan\r\n', 132, 99, 4, '2017-03-26 14:40:08'),
(267, 'Langkah 1', 'Melakukan revisi pada naskah skripsi, sesuai dengan saran dan masukan dari Ketua Penguji, Sekertaris Penguji dan Penguji Utama\r\n', 133, 99, 1, '2017-03-26 14:42:02'),
(268, 'Langkah 2', '1). Mengkonsultasikan hasil revisi naskah skripsi kepada  Ketua Penguji, Sekertaris Penguji dan Penguji Utama\r\n, untuk mendapatkan acc atas naskah skripsi yang telah direvisi\r\n\r\n2). Lakukan terus langkah ini hingga seluruh naskah skripsi revisi disetujui/di acc oleh dosen penguji\r\n\r\n3). Jika naskah telah di acc oleh dosen penguji, selanjutnya meminta dosen penguji dan pembimbing tanda tangan di lembar halaman pengesahan\r\n', 133, 99, 2, '2017-03-26 14:42:02'),
(270, 'Langkah 1', 'Menggandakan dan menjilid hardcover naskah skripsi sejumlah yang dibutuhkan \r\n', 134, 99, 1, '2017-03-26 14:44:58'),
(271, 'Langkah 2', 'Meminta tanda tangan dosen pembimbing skripsi pada naskah skripsi yang telah dijilid\r\n', 134, 99, 2, '2017-03-26 14:44:58'),
(272, 'Langkah 3', 'Meminta tanda tangan Ketua Program Studi pada naskah skripsi yang telah ditanda tangani oleh dosen pembimbing\r\n', 134, 99, 3, '2017-03-26 14:44:58'),
(273, 'Langkah 4', 'Meminta validasi kepada petugas loket 5 pada nama dan NIP Dekan', 134, 104, 4, '2017-03-26 14:44:58'),
(274, 'Langkah 5', 'Meminta validasi kepada petugas JPTK FT pada bagian daftar pustaka', 134, 110, 5, '2017-03-26 14:44:58'),
(275, 'Langkah 6', 'Meminta tanda tangan Dekan FT UNY pada naskah yang telah disetujui oleh petugas loket 5\r\n', 134, 107, 6, '2017-03-26 14:44:58'),
(276, 'Langkah 1', 'Membuat abstrak dalam bahasa inggris', 135, 99, 1, '2017-03-26 14:46:26'),
(277, 'Langkah 2', 'Membuat naskah jurnal berdasarkan naskah skripsi yang telah disetujui (format di journal.student.uny.ac.id). \r\n\r\nBimbingan Jurnal hanya ke Dosen Pembimbing dan Penguji Utama\r\n', 135, 99, 2, '2017-03-26 14:47:11'),
(278, 'Langkah 1', 'Memasukkan abstrak bahasa inggris , abstrak bahasa indonesia , jurnal dan Naskah Skripsi ke dalam CD. lalu CD tersebut digandakan sejumlah 4 buah. \r\n\r\n*) Cover tempat CD 2 warna BIRU dan 2 warna PUTIH. Cover CD warna putih seperti biasanya', 136, 99, 1, '2017-03-26 14:57:11'),
(279, 'Langkah 2', 'Memberikan 1 CD cover Biru, 1 buah jurnal hardcopy, dan sertifikat Pro TEFL beserta fotocopy nya ke pengajaran untuk mendapatkan bukti telah menyerahkan CD dari pengajaran', 136, 111, 2, '2017-03-26 14:57:12'),
(280, 'Langkah 3', 'Membawa bukti telah menyerahkan CD tersebut ke Sekretaris Penguji untuk dikeluarkan nilai skripsi.', 136, 99, 3, '2017-03-26 14:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id_lantai` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `link` varchar(2083) DEFAULT NULL,
  `id_gedung` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumbnail` varchar(2083) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id_lantai`, `nama`, `link`, `id_gedung`, `timestamp`, `thumbnail`) VALUES
(99, 'Tidak Ada', NULL, 99, '2017-01-26 14:41:44', NULL),
(100, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 100, '2017-03-15 04:52:57', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(101, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 100, '2017-03-15 04:52:57', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(102, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 100, '2017-03-15 04:52:57', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(103, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 101, '2017-03-15 06:09:29', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(104, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 102, '2017-03-15 07:07:37', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(105, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 102, '2017-03-15 07:07:37', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(106, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 102, '2017-03-15 07:07:37', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(107, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 103, '2017-03-26 01:26:06', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(108, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 104, '2017-03-26 02:18:13', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(109, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 104, '2017-03-26 02:18:13', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(110, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 104, '2017-03-26 02:18:13', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(111, '4', 'http://localhost/aluradmi/denah/no-thumbnail.png', 104, '2017-03-26 02:18:14', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(112, '5', 'http://localhost/aluradmi/denah/no-thumbnail.png', 104, '2017-03-26 02:18:14', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(113, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 105, '2017-03-26 04:58:48', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(114, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 105, '2017-03-26 04:58:48', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(115, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 105, '2017-03-26 04:58:48', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(116, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 106, '2017-03-26 04:59:19', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(117, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 107, '2017-03-26 04:59:50', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(118, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 107, '2017-03-26 04:59:50', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(119, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 107, '2017-03-26 04:59:50', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(120, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 108, '2017-03-26 05:00:17', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(121, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 108, '2017-03-26 05:00:17', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(122, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 109, '2017-03-26 05:00:36', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(123, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 110, '2017-03-26 05:01:00', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(124, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 110, '2017-03-26 05:01:00', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(125, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 109, '2017-03-26 05:01:11', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(126, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 109, '2017-03-26 05:01:11', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(127, '4', 'http://localhost/aluradmi/denah/no-thumbnail.png', 109, '2017-03-26 05:01:12', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(128, '5', 'http://localhost/aluradmi/denah/no-thumbnail.png', 109, '2017-03-26 05:01:12', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(129, '1', 'http://localhost/aluradmi/denah/no-thumbnail.png', 111, '2017-03-26 05:06:03', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(130, '2', 'http://localhost/aluradmi/denah/no-thumbnail.png', 111, '2017-03-26 05:06:04', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png'),
(131, '3', 'http://localhost/aluradmi/denah/no-thumbnail.png', 111, '2017-03-26 05:06:04', 'http://localhost/aluradmi/denah/no-thumbnail_thumb.png');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `id_lantai` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama`, `id_lantai`, `timestamp`) VALUES
(99, 'Tidak Ada', 99, '2017-01-26 14:42:28'),
(100, 'Loket 1', 100, '2017-03-15 04:54:19'),
(101, 'Loket 2', 100, '2017-03-15 04:54:19'),
(102, 'Loket 3', 100, '2017-03-15 04:54:19'),
(103, 'Loket 4', 100, '2017-03-15 04:54:19'),
(104, 'Loket 5', 100, '2017-03-15 04:54:19'),
(105, 'Kasubbag Akademik', 100, '2017-03-15 04:54:19'),
(106, 'Pengajaran', 103, '2017-03-15 06:10:23'),
(107, 'Sekretaris Dekan', 101, '2017-03-15 06:47:09'),
(108, 'Perpustakaan', 103, '2017-03-15 07:05:38'),
(109, 'Layanan Bebas Pustaka', 104, '2017-03-15 07:08:00'),
(110, 'JPTK', 101, '2017-03-15 17:08:59'),
(111, 'Pengajaran Jurusan Teknik Elektronika dan Informatika', 107, '2017-03-26 01:27:42'),
(112, 'Perpustakaan Media FT', 108, '2017-03-26 02:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `id_jurusan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `id_jurusan`) VALUES
(1, 'admin', '$2y$10$2BNpx4AzlfvMgkAxrUpY5utqxZQYMtXIwckynrK6ttizf.tfVQohu', '1', 0),
(4, 'sipil', '$2y$10$kPeyGRPu2HRFYAWaMwBZcO.8O646AzkxZ1shx8Qt9S3OsmjSrgz12', '2', 7),
(5, 'elektronika', '$2y$10$Gs/YWio3vC0ewEW3ymNvLuFohEcL780K.y54L.SZTRPkf.5MhpxHO', '2', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alur`
--
ALTER TABLE `alur`
  ADD PRIMARY KEY (`id_alur`,`id_kategori`,`id_jurusan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`,`id_keterangan`),
  ADD KEY `id_keterangan` (`id_keterangan`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`,`id_alur`,`id_ruang`),
  ADD KEY `id_alur` (`id_alur`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id_lantai`,`id_gedung`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`,`id_lantai`),
  ADD KEY `id_lantai` (`id_lantai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`id_jurusan`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur`
--
ALTER TABLE `alur`
  MODIFY `id_alur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id_lantai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alur`
--
ALTER TABLE `alur`
  ADD CONSTRAINT `alur_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alur_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`id_keterangan`) REFERENCES `keterangan` (`id_keterangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`id_alur`) REFERENCES `alur` (`id_alur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keterangan_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lantai`
--
ALTER TABLE `lantai`
  ADD CONSTRAINT `lantai_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ruang`
--
ALTER TABLE `ruang`
  ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`id_lantai`) REFERENCES `lantai` (`id_lantai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
