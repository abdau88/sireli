-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2022 pada 18.28
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sireli`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `NIDN` char(20) NOT NULL,
  `NPAK_NIP` varchar(30) NOT NULL,
  `Nama_Dosen` varchar(50) NOT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT '1',
  `userlevel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`NIDN`, `NPAK_NIP`, `Nama_Dosen`, `id_jurusan`, `password`, `email`, `no_hp`, `activated`, `userlevel`) VALUES
('', '04.17.8028', 'Taufan Ratri Harjanto, S.T., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '04.17.8031', 'Saipul Bahri, S.T., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '04.17.8032', 'Nurlinda Ayu Triwuri, S.T., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '04.17.8037', 'Devi Taufiq Nurrohman, S.Si., M.Sc.', 3, '', NULL, NULL, NULL, NULL),
('', '05.12.3012', 'Eka Dyah Puspitasari, S.Pd., M.Hum.', 1, '', NULL, NULL, NULL, NULL),
('', '05.16.8018', 'Lutfi Syafirullah, S.T. M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '05.16.8019', 'Betti Widianingsih, S.S., M.Hum.', 3, '', NULL, NULL, NULL, NULL),
('', '08.001', 'Dr.Eng. Agus Santoso', 2, '', NULL, NULL, NULL, NULL),
('', '08.002', 'Pujono, S.T., M.Eng.', 2, '', NULL, NULL, NULL, NULL),
('', '08.003', 'Bayu Aji Girawan, S.T., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '08.004', 'Mohammad Nurhilal, S.T., M.Pd., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '08.005', 'Dian Prabowo, S.T., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '08.006', 'Ipung Kurniawan, S.T., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '08.008', 'Arif Ainur Rafiq, ST.,M.T., M.Sc.', 3, '', NULL, NULL, NULL, NULL),
('', '08.010', 'Sugeng Dwi Riyanto, S.T., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '08.011', 'Purwiyanto, S.T., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '08.013', 'Nur wahyu Rahadi, S.Kom., M.Eng.', 1, '', NULL, NULL, NULL, NULL),
('', '08.014', 'Antonius Agung Hartono, S.T., M.Eng.', 1, '', NULL, NULL, NULL, NULL),
('', '08.018', 'Isa Bahroni, S.Kom, M.Eng', 1, '', NULL, NULL, NULL, NULL),
('', '08.16.8020', 'Oto Prasadi, S.Pi., M.Si', 2, '', NULL, NULL, NULL, NULL),
('', '08.16.8021', 'Khoeruddin Wittriansyah, S.Kel., M.Si', 2, '', NULL, NULL, NULL, NULL),
('', '08.17.8040', 'Ayu Pramita, S.T., M.M., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '09.08.1004', 'Fadillah, M.P.', 2, '', NULL, NULL, NULL, NULL),
('', '09.08.1011', 'Ganjar Ndaru Ikhtiagung, S.E., M.M. ', 2, '', NULL, NULL, NULL, NULL),
('', '09.08.3001', 'Joko Setia Pribadi, S.T., M.Eng.', 2, '', NULL, NULL, NULL, NULL),
('', '09.08.3002', 'Dwi Novia Prasetyanti, S.Kom.M.Cs.', 1, '', NULL, NULL, NULL, NULL),
('', '09.10.3008', 'Abdul Rohman Supriyono, S.T., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '09.10.3011', 'Rostika Listyaningrum, S.Si., M.Si.', 1, '', NULL, NULL, NULL, NULL),
('', '10.10.1029', 'Andriansyah Zakaria, M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '198403102019032010', 'Rosita Dwityaningsih, S.Si., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '198403242019031005', 'Jenal Sodikin, S.T., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '198405072019031011', 'Andesita Prihantara, S.T., M.Eng.', 1, '', NULL, NULL, NULL, NULL),
('', '198408302019031003', 'Supriyono, S.T., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '198410252019032010', 'Theresia Evila Purwanti Sri Rahayu, S.T., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '198412012018032001', 'Cahya Vikasari, S.T., M.Eng', 1, '', NULL, NULL, NULL, NULL),
('', '198503182019031013', 'Riyadi Purwanto, S.T., M.Eng.', 1, '', NULL, NULL, NULL, NULL),
('', '198506242019032013', 'Ardhita Fajar Pratiwi, S.T., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '198506272019031006', 'Oman Somantri, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '198509172019031005', 'Galih Mustiko Aji, S.T., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '198509172019032015', 'Ratih Hafsarah Maharrani, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '198601112019032008', 'Ari Kristiningsih, S.Kel., M.Si.', 2, '', NULL, NULL, NULL, NULL),
('', '198603212019031007', 'Zaenurrohman, S.T., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '198604092019032011', 'Hera Susanti, S.T., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '198604282019031005', 'Muhamad Yusuf, S.ST., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '198605142019032008', 'Annisa Romadloni, S.Hum., M.A.', 1, '', NULL, NULL, NULL, NULL),
('', '198612272019032010', 'Ulikaryani, S.Si., M.Eng.', 2, '', NULL, NULL, NULL, NULL),
('', '198711052019032014', 'Murni Handayani, S.P., M.Sc.', 2, '', NULL, NULL, NULL, NULL),
('', '198711172018031001', 'Annas Setiawan Prabowo, S.Kom., M.Eng.', 1, '', NULL, NULL, NULL, NULL),
('', '198803312019032017', 'Hety Dwi hastuti, S.E., M.Si.', 2, '', NULL, NULL, NULL, NULL),
('', '198805072019031009', 'Dodi Satriawan, S.T., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '198809132019032012', 'Laura Sari, S.Si., M.Sc.', 1, '', NULL, NULL, NULL, NULL),
('', '198810102019032020', 'Linda Perdana Wanti, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '198811152019031008', 'Nur Wachid Adi Prasetya, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '198909272019032013', 'Sari Widya Utami, S.P., M.Sc.', 2, '', NULL, NULL, NULL, NULL),
('', '198910282019031019', 'Roy Aries Permana Tarigan, S.T., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '198912122019031014', 'Arif Sumardiono, S.Pd., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '199005012019031013', 'Unggul Satria Jati, S.T., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '199007292019032026', 'Fadhillah Hazrina, S.T., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '199008292019032013', 'Erna Alimudin, S.T., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '199012122019031016', 'Afrizal Abdi Musyafiq, S.Si., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '199103052019031017', 'Nur Akhlis Sarihidaya Laksana, S.Pd., M.T.', 2, '', NULL, NULL, NULL, NULL),
('', '199106022019031015', 'Radhi Ariawan, S.T., M.Eng.', 2, '', NULL, NULL, NULL, NULL),
('', '199109162019031013', 'Agus Susanto, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '199201032019032022', 'Ilma Fadlilah, S.Si., M.Eng.', 4, '', NULL, NULL, NULL, NULL),
('', '199206302019031011', 'Vicky Prasetia, S.ST., M.Eng.', 3, '', NULL, NULL, NULL, NULL),
('', '199207062019031014', 'Saepul Rahmat, S.Pd., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '199211052019032021', 'Novita Asma Ilahi, S.Pd., M.Si.', 3, '', NULL, NULL, NULL, NULL),
('', '199211132019031009', 'Hendi Purnata, S.Pd., M.T.', 3, '', NULL, NULL, NULL, NULL),
('', '199303242019031011', 'Muhammad Nur Faiz, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '199307142019032026', 'Santi Purwaningrum, S.Kom., M.Kom.', 1, '', NULL, NULL, NULL, NULL),
('', '199505082019032022', 'Riyani Prima Dewi, S.T., M.T.', 3, '', NULL, NULL, NULL, NULL),
('0008089002', '12345', 'Prih Diantono Abda`u, S.Kom., M.Kom.', 1, '12345', 'abdau88@gmail.com', '089665555505', 1, 1),
('0008089007', '12345', 'Hendris Agung Prasojo', 1, '12345', 'abdau@pnc.ac.id', '6289665555505', 1, 1),
('0015118803', '198811152019031008', 'Nur Wachid Adi Prasetya, S.Kom., M.Kom.', 1, '12345', 'wachid.pnc@gmail.com', NULL, 1, 1),
('0016099104', '199109162019031013', 'agus susanto, S.Kom., M.Kom', 1, 'agus123', 'gitoe.agus@gmail.com', '085714849565', 1, 1),
('0017098504', '198509172019032015', 'Ratih Hafsarah Maharrani, S.Kom., M.Kom', 1, '040209', 'triemaharrani@gmail.com', '085227289493', 1, 1),
('0609058102', '08.013', 'Nur Wahyu Rahadi', 1, 'wahyuTI', 'n.wahyu.r@pnc.ac.id', '085647718559', 1, 1),
('0624039301', '199303242019031011', 'Muhammad Nur Faiz, S.Kom., M.Kom.', 1, 'asa', 'faiz@pnc.ac.id', '0823240393994', 1, 1),
('0627068903', '198906272019032020', 'Mardiyana, S.Pi, M.Si', 5, '270689YN#', 'mardiyana.alis@gmail.com', '081911762949', 1, 1),
('0631038804', '198803312019032017', 'Hety Dwi Hastuti, S.E, M.Si', 2, 'hetonk', 'hetydwi88@gmail.com', '085600824951', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Mesin'),
(3, 'Teknik Elektronika'),
(4, 'TRPPL'),
(5, 'Pengembangan Produk Agroindustri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panduan`
--

CREATE TABLE `tb_panduan` (
  `id` int(11) NOT NULL,
  `spi` varchar(100) DEFAULT NULL,
  `dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penelitian`
--

CREATE TABLE `tb_penelitian` (
  `id_penelitian` int(3) NOT NULL,
  `NIDN` varchar(30) DEFAULT NULL,
  `anggota1` varchar(50) DEFAULT NULL,
  `anggota2` varchar(50) DEFAULT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `LP` varchar(100) DEFAULT NULL,
  `LK` varchar(100) DEFAULT NULL,
  `output` varchar(100) DEFAULT NULL,
  `chr` varchar(100) DEFAULT NULL,
  `surat_tugas` varchar(100) DEFAULT NULL,
  `sk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_penelitian`
--

INSERT INTO `tb_penelitian` (`id_penelitian`, `NIDN`, `anggota1`, `anggota2`, `id_jurusan`, `judul`, `biaya`, `tahun`, `status`, `LP`, `LK`, `output`, `chr`, `surat_tugas`, `sk`) VALUES
(2, '0008089002', 'Muhammad Nur Faiz, S.Kom., M.Kom.', 'Oman Somantri, S.Kom., M.Kom.', 1, 'Tes 123', 40000000, '2020', 'Diterima', 'RKT 2021.pdf', NULL, NULL, 'BERITA ACARA PEMERIKSAAN KAS Per 30 September 2020.doc', '', NULL),
(3, '0008089002', 'Oman Somantri, S.Kom., M.Kom.', 'Oto Prasadi, S.Pi., M.Si', 1, 'Mencoba', 20000000, '2020', NULL, 'Surat undangan FGD SPI-180820_kelompok 2.pdf', 'Buku Juknis rev_03.pdf', 'Surtug Reviu RKA KL 2021.pdf', '', '', NULL),
(4, '0008089003', 'Prih Diantono Abda\'u, S.Kom., M.Kom.', 'Santi Purwaningrum, S.Kom., M.Kom.', 5, 'Tes', 15000000, '2020', NULL, 'Surat undangan FGD SPI-180820_kelompok 2(1).pdf', NULL, NULL, '', '', NULL),
(5, '0016099104', 'agus susanto', 'santi', 1, 'sistem informasi geografis pelayanan kesehatan di kabupaten cilacap', 8000000, '2021', 'Revisi', 'BAB I.pdf', 'BAB I.pdf', 'BAB I.pdf', '02. AKUN OFFICE 365 SULTRA CERDAS Batch 6-5.pdf', NULL, NULL),
(6, '0011018604', 'Mardiyana', 'santi purwaningrum', 5, 'Studi Proksimat kepala udang', 10000000, '2021', NULL, 'pedoman-penulisan-karya-ilmiah-2019.pdf', NULL, NULL, NULL, NULL, NULL),
(7, '0624039301', 'Abdul Rohman Supriyono', NULL, 1, 'Machine Learning Techniques Applied to Cyber Security', 19500000, '2021', 'Diterima', 'An Ontology Based Framework for Automatic Web Resources Identification.pdf', 'Steganografi_Video_Digital_dengan_Algoritma_LSB__L.pdf', 'Self-Supervised Learning Based Anomaly Detection in Online Social Media.pdf', '6027 Surat Edaran.pdf', NULL, '02. AKUN OFFICE 365 SULTRA CERDAS Batch 6-5(1).pdf'),
(8, '0631038804', 'Sari', 'Laura', 2, 'Masalah dan tantanga pengembangan kewirausahaan', 10000000, '2020', NULL, 'Masalah dan Tantangan Pengembangan Kewirausahaan pada Kalangan MAhasiswa.pdf', NULL, NULL, NULL, NULL, NULL),
(9, '0015118803', 'Mark Zucenberg', 'Bill Gates', 1, 'Dream Virtual Reality for Inception Idea', 1000000000, '2020', NULL, '2183-6336-1-PB.pdf', '37-71-1-SM.pdf', '37-71-1-SM.pdf', NULL, NULL, NULL),
(10, '0627068903', 'Alesha Zahra Widiasputri', 'Uwais Nurrozaq Widiasputra', 5, 'Pengaruh Jarak Tempuh Pemasaran dengan Biaya Sterilisasi Yang Dikeluarkan', 10000000, '2020', NULL, 'STERILISASI.pdf', 'STERILISASI.pdf', 'STERILISASI.pdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengabdian`
--

CREATE TABLE `tb_pengabdian` (
  `id_pengabdian` int(3) NOT NULL,
  `NIDN` char(20) DEFAULT NULL,
  `anggota1` varchar(50) DEFAULT NULL,
  `anggota2` varchar(50) DEFAULT NULL,
  `anggota3` varchar(50) DEFAULT NULL,
  `anggota4` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `LP2` varchar(100) DEFAULT NULL,
  `LK` varchar(100) DEFAULT NULL,
  `output` varchar(100) DEFAULT NULL,
  `chr` varchar(100) DEFAULT NULL,
  `surat_tugas` varchar(100) DEFAULT NULL,
  `sk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_pengabdian`
--

INSERT INTO `tb_pengabdian` (`id_pengabdian`, `NIDN`, `anggota1`, `anggota2`, `anggota3`, `anggota4`, `judul`, `biaya`, `tahun`, `status`, `LP2`, `LK`, `output`, `chr`, `surat_tugas`, `sk`) VALUES
(6, '0008089003', 'Oman Somantri, S.Kom., M.Kom.', 'Ratih Hafsarah Maharrani, S.Kom., M.Kom.', 'Fadillah, M.P.', 'Taufan Ratri Harjanto, S.T., M.Eng.', 'Pemberdayaan Hidroponik', 15000000, '2020', 'Revisi', '1317-2805-1-SM (1).pdf', '3510Chapter6Part1(1).pdf', 'kos_juni.pdf', NULL, NULL, NULL),
(7, '0008089002', 'M. Nur Faiz', 'Oman Somantri', 'Linda P', NULL, 'Tes', 20000000, '2020', NULL, 'Tim Reviu LK Semester I.pdf', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'SPI', '1234', 1),
(2, 'PPM', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`NIDN`,`NPAK_NIP`) USING BTREE;

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`) USING BTREE;

--
-- Indexes for table `tb_panduan`
--
ALTER TABLE `tb_panduan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  ADD PRIMARY KEY (`id_penelitian`) USING BTREE;

--
-- Indexes for table `tb_pengabdian`
--
ALTER TABLE `tb_pengabdian`
  ADD PRIMARY KEY (`id_pengabdian`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_panduan`
--
ALTER TABLE `tb_panduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penelitian`
--
ALTER TABLE `tb_penelitian`
  MODIFY `id_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pengabdian`
--
ALTER TABLE `tb_pengabdian`
  MODIFY `id_pengabdian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
