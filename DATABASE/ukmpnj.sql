-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2019 pada 02.16
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukmpnj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(10) NOT NULL,
  `id_jadwal` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `ukm` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_jadwal`, `nim`, `ukm`, `tanggal`) VALUES
(4, '8', 1316030049, 'pesoet', '2019-01-04'),
(5, '8', 1316030075, 'pesoet', '2019-01-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nim` int(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `ukm` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `ukm`, `hari`, `mulai`, `selesai`, `password`) VALUES
(7, 'pesoet', 'Senin', '17:00:00', '19:00:00', '1234'),
(8, 'pesoet', 'Jumat', '12:00:00', '15:00:00', '456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_prodi` int(10) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_prodi`, `jurusan`, `prodi`) VALUES
(1, 'Teknik Elektro', 'Teknik Telekomunikasi'),
(2, 'Teknik Sipil', 'Teknik Konstruksi Gedung'),
(3, 'Teknik Elektro', 'Teknik Elektronika Industri'),
(4, 'Administrasi Niaga', 'Administrasi Bisnis'),
(5, 'Teknik Mesin', 'Teknik Konversi Energi'),
(6, 'Teknik Mesin', 'Teknik Alat Berat'),
(7, 'Teknik Sipil', 'Manajemen Konstruksi'),
(8, 'Teknik Sipil', 'Perancangan Jalan dan Jembatan'),
(9, 'Teknik Mesin', 'Teknik Mesin'),
(10, 'Teknik Mesin', 'Manufaktur'),
(11, 'Teknik Elektro', 'Teknik Listrik'),
(12, 'Teknik Elektro', 'Broadband Multimedia'),
(13, 'Teknik Informatika dan Komputer', 'Teknik Informatika'),
(14, 'Teknik Informatika dan Komputer', 'Teknik Multimedia dan Jaringan'),
(15, 'Teknik Grafika dan Penerbitan', 'Teknik Grafika'),
(16, 'Teknik Grafika dan Penerbitan', 'Desain Grafis'),
(17, 'Akuntansi', 'Akuntansi'),
(18, 'Akuntansi', 'Akuntansi Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `ukm` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `nama`, `jurusan`, `prodi`, `angkatan`, `no_telpon`, `ukm`, `jabatan`) VALUES
(1234567890, '123', 'andi', 'Akuntansi', 'Akuntansi Keuangan', '2017', '089898989', NULL, NULL),
(1316020021, '123', 'Mantap Jiwa', 'Teknik Mesin', 'Teknik Alat Berat', '2017', '0812311181', 'polbac', 'ketua'),
(1316030041, '123', 'Nur Ramadhan', 'Administrasi Niaga', 'Administrasi Bisnis', '2018', '080889898', NULL, NULL),
(1316030049, '123', 'Ary Utomo', 'Teknik Elektro', 'Teknik Telekomunikasi', '2016', '082121212', 'pesoet', 'ketua'),
(1316030069, '1234', 'Fira', 'Teknik Elektro', 'Teknik Telekomunikasi', '2018', '00909', NULL, NULL),
(1316030070, '123', 'Ganang Wijaya', 'Teknik Elektro', 'Teknik Telekomunikasi', '2016', '08567995371', NULL, NULL),
(1316030072, '123', 'Hilmy Rafi', 'Teknik Elektro', 'Teknik Telekomunikasi', '2016', '087787878', NULL, NULL),
(1316030075, '123', 'Jamariel', 'Teknik Elektro', 'Teknik Telekomunikasi', '2018', '0808989', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE `ukm` (
  `id_ukm` varchar(100) NOT NULL,
  `nama_ukm` varchar(100) NOT NULL,
  `penjelasan_ukm` varchar(10000) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `ketua` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama_ukm`, `penjelasan_ukm`, `jenis`, `ketua`) VALUES
('pesoet', 'Politeknik Soccer Team', 'Politeknik Soccear Teams (PESOET) merupakan UKM yang menaungi olahraga sepak bola dan futsal di PNJ', 'Olahraga', '1316030049'),
('polbac', 'Politeknik Badminton Club', 'Polbac adalah UKM yang bergerak dibidang olahraga khususnya badminton', 'Olahraga', '1316020021');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
