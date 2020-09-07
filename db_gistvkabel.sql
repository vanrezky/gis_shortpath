-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2020 pada 09.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gistvkabel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `id_costumer` varchar(100) NOT NULL,
  `jenis_tvkabel` int(11) NOT NULL,
  `nama_costumer` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal_insert` date NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_costumer`
--

INSERT INTO `tb_costumer` (`id_costumer`, `jenis_tvkabel`, `nama_costumer`, `latitude`, `longitude`, `alamat`, `no_telp`, `foto`, `tanggal_insert`, `tanggal_update`) VALUES
('C-TVK-0001', 1, 'Suparta Kampreto ST. MT', '0.5527133306735109', '101.44731013602295', 'Jl Limbungan, KM 100 Desa Mana Aja Halal.', '082268262017', 'rumah.jpg', '2020-05-16', '2020-05-16'),
('C-TVK-0002', 2, 'Masna Rina', '0.5357625344923695', '101.42027346915283', 'Jl Riau ', '081234131251321', 'rumah_2.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0003', 1, 'Ridwan Simarmata', '0.5110443278095039', '101.44679515189209', 'Jl Pepaya Ujung', '0931201313121', 'rumah_kita.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0004', 1, 'Rina Nose', '0.5386806496229009', '101.45430533713379', 'Jl Tanjung Datuk', '083151312352', 'rumahan.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0005', 2, 'Firdaud Hutahuruk', '0.508297854444708', '101.49992434805908', 'Jl. Hangtuah Ujung', '08329517319231', 'rumahan1.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0006', 1, 'Riswan Sibarani', '0.5264932184248656', '101.47520510977783', 'Jl . Hangtuah, Dekat LPMP Riau', '0831513159831', 'rumahku_amin.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0007', 2, 'Wawan Sinulingga', '0.5858423406556733', '101.42310588187256', 'Jl. Barito Sari', '088391031312', 'rumahku1.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0008', 1, 'Yensiska Tobing', '0.49799856897591965', '101.41838519400635', 'Jl. Soekarno Hatta Dekat SKA', '08913719313', 'rumahan2.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0009', 2, 'Sadewa Nababan', '0.5184254691411022', '101.42104594534912', 'Jl. Soekarno Hatta, Persimpangan Simpang Durian', '0895183951913', 'rumahan3.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0010', 3, 'Winda Sitorus Pane', '0.5880738214574959', '101.40821425742188', 'Jl. Padat Karya, Dekat Perumahan The Valley', '0851718411223', 'rumahku_amin1.jpg', '2020-05-20', '2020-05-20'),
('C-TVK-0011', 3, 'Retno Puji Astuti', '0.5139195408550095', '101.397249386969', 'Jl. Lintas Samudra', '897547437', 'rumahan4.jpg', '2020-05-20', '2020-05-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_tvkabel`
--

CREATE TABLE `tb_jenis_tvkabel` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_tvkabel`
--

INSERT INTO `tb_jenis_tvkabel` (`id`, `jenis`, `deskripsi`) VALUES
(1, 'Basic', 'Jenis TV Kabel ini adalah basic, dimana peralatan yang terdapat hanya reciver, remote, parabola dan card pelanggan'),
(2, 'Medium', 'Jenis TV Kabel ini adalah medium, dimana peralatan yang terdapat hanya reciver, remote, parabola dan card pelanggan serta beberapa kelebihan lain'),
(3, 'Advanced', 'Jenis Berlangganan Advanced');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
(1, '2020-05-18 14:16:33', '1', 3, 'Edit Data User Administrator Aplikasi '),
(2, '2020-05-18 14:20:03', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(3, '2020-05-18 15:00:59', '1', 3, 'Edit Data User Administrator Aplikasi '),
(4, '2020-05-18 16:16:25', NULL, 1, 'Keluar Dari Aplikasi '),
(5, '2020-05-18 16:16:29', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(6, '2020-05-18 16:19:11', '1', 1, 'Keluar Dari Aplikasi '),
(7, '2020-05-18 16:19:16', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(8, '2020-05-19 03:49:01', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(9, '2020-05-19 04:14:02', '1', 3, 'Edit Data User Administrator Aplikasi '),
(10, '2020-05-19 04:15:09', '1', 3, 'Edit Data User Administrator Aplikasi '),
(11, '2020-05-19 04:30:19', '1', 3, 'Edit Nama Administrator Aplikasi '),
(12, '2020-05-19 04:30:36', '1', 3, 'Edit Nama Administrator Aplikasi '),
(13, '2020-05-19 04:30:36', '1', 1, 'Keluar Dari Aplikasi '),
(14, '2020-05-19 04:33:41', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(15, '2020-05-19 04:33:51', '1', 3, 'Edit Nama Administrator Aplikasi '),
(16, '2020-05-19 04:33:54', '1', 1, 'Keluar Dari Aplikasi '),
(17, '2020-05-19 04:36:54', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(18, '2020-05-19 04:55:06', '1', 1, 'Keluar Dari Aplikasi '),
(19, '2020-05-19 04:55:13', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(20, '2020-05-19 04:57:01', '1', 1, 'Keluar Dari Aplikasi '),
(21, '2020-05-19 04:57:06', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(22, '2020-05-19 04:57:25', '1', 1, 'Keluar Dari Aplikasi '),
(23, '2020-05-19 04:57:30', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(24, '2020-05-19 05:22:04', NULL, 1, 'Keluar Dari Aplikasi '),
(25, '2020-05-19 05:22:43', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(26, '2020-05-19 05:23:35', '1', 3, 'Edit Nama Administrator Aplikasi '),
(27, '2020-05-19 05:23:37', '1', 1, 'Keluar Dari Aplikasi '),
(28, '2020-05-19 05:23:47', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(29, '2020-05-19 05:33:50', '1', 3, 'Edit Nama Administrator Aplikasi '),
(30, '2020-05-19 05:33:53', '1', 1, 'Keluar Dari Aplikasi '),
(31, '2020-05-19 05:38:09', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(32, '2020-05-19 05:40:18', '1', 1, 'Keluar Dari Aplikasi '),
(33, '2020-05-19 05:40:30', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(34, '2020-05-19 06:25:18', '1', 2, 'Menambahkan Data Petugas '),
(35, '2020-05-19 06:25:50', '1', 2, 'Menambahkan Data Petugas '),
(36, '2020-05-19 06:27:36', '1', 3, 'Edit Data User Administrator Aplikasi '),
(37, '2020-05-19 06:27:45', '1', 3, 'Edit Data User Administrator Aplikasi '),
(38, '2020-05-19 06:27:55', '1', 3, 'Edit Data User Administrator Aplikasi '),
(39, '2020-05-19 06:37:38', '1', 3, 'Edit Data User Administrator Aplikasi '),
(40, '2020-05-19 06:37:51', '1', 3, 'Edit Data User Administrator Aplikasi '),
(41, '2020-05-19 06:38:12', '1', 3, 'Edit Data User Administrator Aplikasi '),
(42, '2020-05-19 06:44:15', '1', 2, 'Menambahkan Data Petugas '),
(43, '2020-05-19 06:44:30', '1', 4, 'Delete Data Administrator Aplikasi'),
(44, '2020-05-19 06:55:18', '1', 1, 'Keluar Dari Aplikasi '),
(45, '2020-05-19 06:56:25', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(46, '2020-05-19 07:05:53', '1', 4, 'Delete Data Petugas'),
(47, '2020-05-19 07:06:43', '1', 3, 'Ubah Nama Petugas '),
(48, '2020-05-19 08:14:20', NULL, 1, 'Keluar Dari Aplikasi '),
(49, '2020-05-19 08:14:30', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(50, '2020-05-19 09:16:26', NULL, 1, 'Keluar Dari Aplikasi '),
(51, '2020-05-19 09:16:33', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(52, '2020-05-19 09:56:19', NULL, 1, 'Keluar Dari Aplikasi '),
(53, '2020-05-19 10:29:10', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(54, '2020-05-19 10:44:35', '1', 2, 'Menambahkan Data User Administrator Aplikasi '),
(55, '2020-05-19 10:45:59', '1', 3, 'Edit Data User Administrator Aplikasi '),
(56, '2020-05-19 12:28:13', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(57, '2020-05-19 14:19:17', NULL, 1, 'Keluar Dari Aplikasi '),
(58, '2020-05-19 14:19:33', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(59, '2020-05-19 14:26:17', '1', 1, 'Keluar Dari Aplikasi '),
(60, '2020-05-19 14:48:38', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(61, '2020-05-19 14:49:03', '1', 2, 'Menambahkan Data Petugas '),
(62, '2020-05-19 14:49:16', '1', 1, 'Keluar Dari Aplikasi '),
(63, '2020-05-19 14:49:23', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(64, '2020-05-19 14:52:11', '11', 1, 'Keluar Dari Aplikasi '),
(65, '2020-05-19 14:52:36', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(66, '2020-05-19 15:02:21', '11', 1, 'Keluar Dari Aplikasi '),
(67, '2020-05-19 15:02:35', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(68, '2020-05-19 15:02:45', '11', 1, 'Keluar Dari Aplikasi'),
(69, '2020-05-19 15:03:14', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(70, '2020-05-19 15:03:56', '11', 1, 'Keluar Dari Aplikasi '),
(71, '2020-05-19 15:04:11', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(72, '2020-05-19 15:16:00', '11', 1, 'Keluar Dari Aplikasi '),
(73, '2020-05-19 15:16:58', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(74, '2020-05-19 15:17:29', '11', 1, 'Keluar Dari Aplikasi '),
(75, '2020-05-19 15:18:03', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(76, '2020-05-19 15:29:57', '11', 3, 'Ubah Nama Petugas '),
(77, '2020-05-19 15:30:14', '11', 1, 'Keluar Dari Aplikasi '),
(78, '2020-05-19 15:31:00', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(79, '2020-05-19 15:31:35', '11', 1, 'Keluar Dari Aplikasi '),
(80, '2020-05-19 15:31:41', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(81, '2020-05-19 15:31:50', '11', 1, 'Keluar Dari Aplikasi '),
(82, '2020-05-19 15:32:53', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(83, '2020-05-19 15:50:49', '11', 1, 'Keluar Dari Aplikasi '),
(84, '2020-05-19 15:50:52', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(85, '2020-05-19 15:51:33', '1', 1, 'Keluar Dari Aplikasi '),
(86, '2020-05-19 15:51:37', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(87, '2020-05-19 15:56:21', '1', 1, 'Keluar Dari Aplikasi '),
(88, '2020-05-19 15:56:35', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(89, '2020-05-19 16:22:20', '11', 1, 'Keluar Dari Aplikasi '),
(90, '2020-05-19 16:22:47', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(91, '2020-05-19 16:23:42', '1', 1, 'Keluar Dari Aplikasi '),
(92, '2020-05-19 16:54:23', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(93, '2020-05-20 03:43:08', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(94, '2020-05-20 03:43:20', '1', 1, 'Keluar Dari Aplikasi '),
(95, '2020-05-20 03:43:47', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(96, '2020-05-20 03:45:21', '1', 1, 'Keluar Dari Aplikasi '),
(97, '2020-05-20 03:45:26', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(98, '2020-05-20 04:03:21', '11', 1, 'Keluar Dari Aplikasi '),
(99, '2020-05-20 04:03:27', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(100, '2020-05-20 08:08:53', NULL, 1, 'Keluar Dari Aplikasi '),
(101, '2020-05-20 08:08:57', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(102, '2020-05-20 08:12:59', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(103, '2020-05-20 08:28:18', '1', 1, 'Keluar Dari Aplikasi '),
(104, '2020-05-20 08:48:14', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(105, '2020-05-20 10:20:01', NULL, 1, 'Keluar Dari Aplikasi '),
(106, '2020-05-20 10:20:05', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(107, '2020-05-20 10:41:05', NULL, 1, 'Keluar Dari Aplikasi '),
(108, '2020-05-20 10:41:09', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(109, '2020-05-20 11:24:29', NULL, 1, 'Keluar Dari Aplikasi '),
(110, '2020-05-20 11:24:33', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(111, '2020-05-20 12:29:16', '1', 2, 'Menambahkan Data Costumer '),
(112, '2020-05-20 12:32:59', '1', 2, 'Menambahkan Data Costumer '),
(113, '2020-05-20 12:34:13', '1', 2, 'Menambahkan Data Costumer '),
(114, '2020-05-20 12:35:07', '1', 2, 'Menambahkan Data Costumer '),
(115, '2020-05-20 12:36:16', '1', 2, 'Menambahkan Data Costumer '),
(116, '2020-05-20 12:38:17', '1', 2, 'Menambahkan Data Costumer '),
(117, '2020-05-20 12:40:49', '1', 2, 'Menambahkan Data Costumer '),
(118, '2020-05-20 12:41:39', '1', 2, 'Menambahkan Data Costumer '),
(119, '2020-05-20 12:44:32', '1', 2, 'Menambahkan Data Costumer '),
(120, '2020-05-20 13:28:01', '1', 3, ' Update Data Costumer'),
(121, '2020-05-20 14:24:52', NULL, 1, 'Keluar Dari Aplikasi '),
(122, '2020-05-20 14:24:56', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(123, '2020-05-20 15:19:22', '1', 1, 'Keluar Dari Aplikasi '),
(124, '2020-05-20 15:19:35', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(125, '2020-05-20 15:28:55', '11', 1, 'Keluar Dari Aplikasi '),
(126, '2020-05-20 15:31:59', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(127, '2020-05-20 15:35:59', '11', 1, 'Keluar Dari Aplikasi'),
(128, '2020-05-20 15:36:53', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(129, '2020-05-20 15:38:24', '11', 1, 'Keluar Dari Aplikasi '),
(130, '2020-05-20 15:38:29', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(131, '2020-05-20 16:02:07', '1', 2, 'Menambahkan Data Costumer '),
(132, '2020-05-20 16:02:51', '1', 1, 'Keluar Dari Aplikasi '),
(133, '2020-05-20 16:03:01', '11', 0, 'Petugas Berhasil Masuk Aplikasi '),
(134, '2020-05-20 16:35:40', '11', 1, 'Keluar Dari Aplikasi '),
(135, '2020-05-20 16:35:44', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(136, '2020-05-20 16:37:17', '1', 1, 'Keluar Dari Aplikasi '),
(137, '2020-05-20 16:37:56', '1', 0, 'Admin Berhasil Masuk Aplikasi '),
(138, '2020-05-20 16:38:33', '1', 1, 'Keluar Dari Aplikasi '),
(139, '2020-05-20 16:38:40', '11', 0, 'Petugas Berhasil Masuk Aplikasi ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`) VALUES
(1, 'Administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `id_role`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lala', 1, '2020-05-20 18:37:56'),
(2, 'van', '957d2fa52c19a5aff4ccf5d9a959adab', 'Van Si Cakep', 1, '2020-05-18 14:27:13'),
(3, 'alvin', '202cb962ac59075b964b07152d234b70', 'Ridho Rhoma Kelapa', 1, '2020-05-18 15:17:54'),
(4, 'ferdi', '8bf4bb0e2efad01abe522bf314504a49', 'Ferdi Ardian S. Teller', 1, '2020-05-18 16:05:56'),
(6, 'alwianda', 'alwi', 'alvin m', 2, '2020-05-19 13:17:31'),
(10, 'cekgu', 'aeee414af8dfa3c501c1e29b00e40873', 'Cekgu garang', 1, '2020-05-19 12:05:35'),
(11, 'petugas', '202cb962ac59075b964b07152d234b70', 'Ridwan', 2, '2020-05-20 18:38:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_website`
--

CREATE TABLE `tb_website` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `zoom` tinyint(4) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_website`
--

INSERT INTO `tb_website` (`id`, `nama_website`, `deskripsi`, `zoom`, `logo`) VALUES
(1, 'TV Sakura Cable', 'Televisi kabel atau cable television adalah sistem penyiaran acara televisi lewat isyarat frekuensi radio yang ditransmisikan melalui serat optik yang tetap atau kabel coaxial dan bukan lewat udara seperti siaran televisi biasa yang harus ditangkap antena (over-the-air).', 11, 'TV_Sakura.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indeks untuk tabel `tb_jenis_tvkabel`
--
ALTER TABLE `tb_jenis_tvkabel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_website`
--
ALTER TABLE `tb_website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_tvkabel`
--
ALTER TABLE `tb_jenis_tvkabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_website`
--
ALTER TABLE `tb_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
