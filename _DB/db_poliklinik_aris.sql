-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Apr 2018 pada 08.01
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poliklinik_aris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pendaftaran`
--

CREATE TABLE `det_pendaftaran` (
  `NoRecord` int(11) NOT NULL,
  `NoPendaftaran` varchar(50) DEFAULT NULL,
  `IDJenisBiaya` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `det_pendaftaran`
--

INSERT INTO `det_pendaftaran` (`NoRecord`, `NoPendaftaran`, `IDJenisBiaya`) VALUES
(7, '201801060001', 'BY0002'),
(9, '201801060002', 'BY0002'),
(10, '201801060002', 'BY0001'),
(11, '201801060003', 'BY0001'),
(12, '201801060003', 'BY0002'),
(13, '201801060003', 'BY0003'),
(14, '201801080007', 'BY0001'),
(15, '201801080007', 'BY0002'),
(16, '201801090008', 'BY0001'),
(17, '201801090008', 'BY0002'),
(18, '201801110009', 'BY0001'),
(19, '201801110009', 'BY0002'),
(20, '201801110010', 'BY0001'),
(21, '201801110010', 'BY0002'),
(22, '201801250011', 'BY0001'),
(23, '201804110013', 'BY0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_resep`
--

CREATE TABLE `det_resep` (
  `noRecord` int(11) NOT NULL,
  `NoResep` varchar(20) DEFAULT NULL,
  `KodeObat` varchar(20) DEFAULT NULL,
  `dosis` varchar(100) DEFAULT NULL,
  `jumlahObat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `det_resep`
--

INSERT INTO `det_resep` (`noRecord`, `NoResep`, `KodeObat`, `dosis`, `jumlahObat`) VALUES
(7, 'RE201801060001', 'B0001', '3 x 3', 6),
(9, 'RE201801060002', 'B0001', '2 x 2', 3),
(10, 'RE201801060002', 'B0002', '3 x 3', 4),
(11, 'RE201801060003', 'B0001', '2 x 3', 2),
(12, 'RE201801060003', 'B0002', '3 x 4', 1),
(13, 'RE201801060003', 'B0003', '4 x 5', 1),
(14, 'RE201801080004', 'B0001', '3 x 4 / Hari', 10),
(15, 'RE201801080004', 'B0002', '2 x 1 / Hari', 5),
(16, 'RE201801090005', 'B0001', '3 x 3 / hari', 20),
(17, 'RE201801110006', 'B0001', '5 x 5 / hari', 10),
(18, 'RE201801110006', 'B0002', '2 x 2 / hari', 5),
(19, 'RE201801110007', 'B0001', '5 x 5', 1),
(20, 'RE201801110007', 'B0002', '5 x 3', 2),
(21, 'RE201801250008', 'B0001', '5 x 5', 10),
(22, 'RE201804110009', 'B0003', '4 x 4 / hari', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `KodeDokter` varchar(20) NOT NULL,
  `nmDokter` varchar(50) DEFAULT NULL,
  `almDokter` varchar(50) DEFAULT NULL,
  `jnsKelDokter` varchar(20) DEFAULT NULL,
  `telpDokter` varchar(20) DEFAULT NULL,
  `KodePoli` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`KodeDokter`, `nmDokter`, `almDokter`, `jnsKelDokter`, `telpDokter`, `KodePoli`) VALUES
('D0001', 'Dr. Xavier', 'West South Anthem', 'Laki-Laki', '021-123123', 'POLI0002'),
('D0002', 'Macan Kumbang', 'Hutan Rimba', 'Laki-Laki', '021021', 'POLI0001'),
('D0003', 'Dr. Kolor', 'Celana Panjang', 'Laki-Laki', '09123123', 'POLI0001'),
('D0004', 'Dr. Komar', 'Cikomar', 'Laki-Laki', '089123921', 'POLI0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalpraktek`
--

CREATE TABLE `jadwalpraktek` (
  `KodeJadwal` varchar(20) NOT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamSelesai` time DEFAULT NULL,
  `KodeDokter` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwalpraktek`
--

INSERT INTO `jadwalpraktek` (`KodeJadwal`, `hari`, `jamMulai`, `jamSelesai`, `KodeDokter`) VALUES
('J0001', 'Senin', '07:00:00', '12:00:00', 'D0001'),
('J0002', 'Selasa', '07:00:00', '19:00:00', 'D0002'),
('J0003', 'Rabu', '07:00:00', '19:00:00', 'D0003'),
('J0004', 'Kamis', '09:00:00', '16:00:00', 'D0004'),
('J0005', 'Jumat', '07:00:00', '11:00:00', 'D0001'),
('J0006', 'Sabtu', '07:00:00', '20:00:00', 'D0003'),
('J0007', 'Minggu', '00:00:00', '17:00:00', 'D0001'),
('J0008', 'Kamis', '08:00:00', '13:00:00', 'D0003'),
('J0009', 'Kamis', '08:00:00', '21:00:00', 'D0001'),
('J0010', 'Rabu', '18:00:00', '22:00:00', 'D0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbiaya`
--

CREATE TABLE `jenisbiaya` (
  `IDJenisBiaya` varchar(20) NOT NULL,
  `namaBiaya` varchar(50) DEFAULT NULL,
  `tarif` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisbiaya`
--

INSERT INTO `jenisbiaya` (`IDJenisBiaya`, `namaBiaya`, `tarif`) VALUES
('BY0001', 'Cek Rontgen', 40000),
('BY0002', 'Cek Darah', 20000),
('BY0003', 'Cek Jantung', 5000000),
('BY0004', 'Cek Urin', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `noUser` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `typeUser` varchar(20) DEFAULT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`noUser`, `username`, `password`, `typeUser`, `NIP`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'arishasan4', '$2y$10$wFRfgfRf9fiCXV8k.xPqZeybhOohvKjAznBAYr2URJ45kU1zadmCK', 'ADMIN', 'K0001', '0kT2FxwulAjrgZG8HK3Ya5E6EFDrgprHL81fyRlz3lT5D6XM1EhmfP2wb34U', '2018-01-02 19:13:37', '2018-01-02 19:13:37'),
(4, '08080123', '$2y$10$BUOVyRYiiBGpJJMffZn2oOp80fZyVY6MYiD59A1YFbXsIqYajCv3C', 'PEGAWAI', 'K0002', 'qClVN37rhEu8eupuzfEGCZUr9TRU5rhQza72t5hnR0XF2IOuivpzYzs615gY', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `KodeObat` varchar(20) NOT NULL,
  `nmObat` varchar(50) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `hargaJual` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`KodeObat`, `nmObat`, `merk`, `satuan`, `hargaJual`) VALUES
('B0001', 'Paracetamol', 'Konidin', 'Sachet', 2000),
('B0002', 'Amoxilin', 'Topaz', 'Sachet', 4000),
('B0003', 'Antibioticus', 'Anti', 'Sachet', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `NoPasien` varchar(20) NOT NULL,
  `namaPas` varchar(50) DEFAULT NULL,
  `almPas` varchar(50) DEFAULT NULL,
  `telpPas` varchar(20) DEFAULT NULL,
  `tglLahirPas` date DEFAULT NULL,
  `jenisKelPas` varchar(20) DEFAULT NULL,
  `tglRegistrasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`NoPasien`, `namaPas`, `almPas`, `telpPas`, `tglLahirPas`, `jenisKelPas`, `tglRegistrasi`) VALUES
('P0001', 'Ari Rahman', 'Sawah Pandans', '0830123213', '2000-08-02', 'Laki-Laki', '2018-01-03'),
('P0002', 'Denys', 'Gunteng', '0891239123', '2000-05-31', 'Laki-Laki', '2018-01-03'),
('P0003', 'Xon', 'Xoa', '0923', '2018-01-02', 'Laki-Laki', '2018-01-05'),
('P0004', 'Akeboshi', 'Japanese', '0111', '2018-01-01', 'Laki-Laki', '2018-01-06'),
('P0005', 'Alfin', 'Cianjur', '023020032', '1996-05-11', 'Laki-Laki', '2018-01-08'),
('P0006', 'Joang', 'Cianjur', '09030123', '1996-05-13', 'Laki-Laki', '2018-01-09'),
('P0007', 'Faisal', 'Cianjur', '90090213', '1000-05-13', 'Laki-Laki', '2018-01-11'),
('P0008', 'Razix', 'Phantom Generation', '083817122289', '1995-12-01', 'Laki-Laki', '2018-04-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `namaPeg` varchar(50) DEFAULT NULL,
  `almPeg` varchar(50) DEFAULT NULL,
  `telpPeg` varchar(50) DEFAULT NULL,
  `tglLahirPeg` date DEFAULT NULL,
  `jnsKelPeg` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `namaPeg`, `almPeg`, `telpPeg`, `tglLahirPeg`, `jnsKelPeg`) VALUES
('K0001', 'Aris Hasan Ubaidillah', 'Kp.Cilaku Babakan Rt.02/01', '083817122289', '2000-05-13', 'Laki-Laki'),
('K0002', 'Dini Fitri Amalia', 'Cianjur', '08080123', '2000-05-15', 'Perempuan');

--
-- Trigger `pegawai`
--
DELIMITER $$
CREATE TRIGGER `buat_akun` AFTER INSERT ON `pegawai` FOR EACH ROW BEGIN
	
	insert into login (username,typeUser,NIP) VALUES(NEW.telpPeg,'PEGAWAI',NEW.NIP);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `NoPemeriksaan` varchar(50) NOT NULL,
  `keluhan` varchar(225) DEFAULT NULL,
  `diagnosa` varchar(225) DEFAULT NULL,
  `perawatan` varchar(225) DEFAULT NULL,
  `tindakan` varchar(225) DEFAULT NULL,
  `beratBadan` double DEFAULT NULL,
  `tensiDiastolik` int(11) DEFAULT NULL,
  `tensiSistolik` int(11) DEFAULT NULL,
  `NoPendaftaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`NoPemeriksaan`, `keluhan`, `diagnosa`, `perawatan`, `tindakan`, `beratBadan`, `tensiDiastolik`, `tensiSistolik`, `NoPendaftaran`) VALUES
('PM201801060001', 'Sakit mata', 'Kepala Pusing', 'Beri Bodrex', 'Secepatnya', 66, 30, 40, '201801060001'),
('PM201801060002', 'Sakit Pinggang', 'Kebanyakan Duduk', 'Nangtung we', 'Suruh beli obat encok', 70, 20, 30, '201801060002'),
('PM201801060003', 'Sakit Hati', 'Kebanyakan di PHP-in', 'Nyari kesenangan', 'Medis tingkat mendunia', 65, 30, 40, '201801060003'),
('PM201801080004', 'Sakit Pinggang', 'Kebanyakan Berdiri', 'Duduk yang lama', 'Awas ambien', 60, 20, 30, '201801080007'),
('PM201801090005', 'Sakit Pinggang', 'Teluk Patah', 'Lem', 'Secepatnya', 67, 40, 40, '201801090008'),
('PM201801110006', 'Sakit Mata', 'Kebanyakan ngoding', 'Relaksasi', 'Secepatnya', 60, 50, 40, '201801110009'),
('PM201801110007', 'Sakit Mata', 'Ambient', 'Refleksi Otak', 'Pijat Otak', 60, 50, 40, '201801110010'),
('PM201801250008', 'Sakit Gigi', 'Makan Kembang Gula', 'Sikat GIgi', 'ASAP', 65, 44, 45, '201801250011'),
('PM201804110009', 'Sakit Pinggang', 'Tulang Punggung retak', 'Rontgen Darurat', 'Medis secepatnya ASAP', 59, 55, 54, '201804110013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `NoPendaftaran` varchar(50) NOT NULL,
  `tglPendaftaran` date DEFAULT NULL,
  `noUrut` int(11) DEFAULT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `NoPasien` varchar(20) DEFAULT NULL,
  `KodeJadwal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`NoPendaftaran`, `tglPendaftaran`, `noUrut`, `NIP`, `NoPasien`, `KodeJadwal`) VALUES
('201801060001', '2018-01-06', 1, 'K0001', 'P0001', 'J0006'),
('201801060002', '2018-01-06', 2, 'K0001', 'P0002', 'J0006'),
('201801060003', '2018-01-06', 3, 'K0001', 'P0003', 'J0006'),
('201801060004', '2018-01-06', 4, 'K0001', 'P0004', 'J0006'),
('201801070005', '2018-01-07', 1, 'K0001', 'P0001', 'J0007'),
('201801070006', '2018-01-07', 2, 'K0001', 'P0004', 'NOTHING'),
('201801080007', '2018-01-08', 1, 'K0001', 'P0005', 'J0001'),
('201801090008', '2018-01-09', 1, 'K0001', 'P0006', 'J0002'),
('201801110009', '2018-01-11', 1, 'K0001', 'P0007', 'J0009'),
('201801110010', '2018-01-11', 2, 'K0001', 'P0006', 'J0009'),
('201801250011', '2018-01-25', 1, 'K0001', 'P0006', 'J0009'),
('201803050012', '2018-03-05', 1, 'K0001', 'P0004', 'NOTHING'),
('201804110013', '2018-04-11', 1, 'K0001', 'P0008', 'J0010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `KodePoli` varchar(20) NOT NULL,
  `namaPoli` varchar(50) DEFAULT NULL,
  `alamatPoli` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`KodePoli`, `namaPoli`, `alamatPoli`) VALUES
('POLI0001', 'Poliklinik Sehat Sejahtera', 'Kp. Mande'),
('POLI0002', 'Poliklinik Square', 'St. Saint Saiyaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `NoResep` varchar(20) NOT NULL,
  `NoPemeriksaan` varchar(20) NOT NULL,
  `proses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`NoResep`, `NoPemeriksaan`, `proses`) VALUES
('RE201801060001', 'PM201801060001', 'Selesai'),
('RE201801060002', 'PM201801060002', 'Selesai'),
('RE201801060003', 'PM201801060003', 'Selesai'),
('RE201801080004', 'PM201801080004', 'Selesai'),
('RE201801090005', 'PM201801090005', 'Selesai'),
('RE201801110006', 'PM201801110006', 'Selesai'),
('RE201801110007', 'PM201801110007', 'Selesai'),
('RE201801250008', 'PM201801250008', 'Selesai'),
('RE201804110009', 'PM201804110009', 'Selesai');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemasukan_obat`
--
CREATE TABLE `v_pemasukan_obat` (
`NoResep` varchar(20)
,`NoPasien` varchar(20)
,`namaPas` varchar(50)
,`nmObat` varchar(50)
,`jumlahObat` int(11)
,`hargaJual` double
,`Total` double
,`tglPendaftaran` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemasukan_pemeriksaan`
--
CREATE TABLE `v_pemasukan_pemeriksaan` (
`NoPendaftaran` varchar(50)
,`tglPendaftaran` date
,`noUrut` int(11)
,`NoPasien` varchar(20)
,`namaPas` varchar(50)
,`jumlah` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_bayar_obat`
--
CREATE TABLE `v_total_bayar_obat` (
`NoPemeriksaan` varchar(50)
,`NoResep` varchar(20)
,`TotalBayarObat` double
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pemasukan_obat`
--
DROP TABLE IF EXISTS `v_pemasukan_obat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemasukan_obat`  AS  select `resep`.`NoResep` AS `NoResep`,`pendaftaran`.`NoPasien` AS `NoPasien`,`pasien`.`namaPas` AS `namaPas`,`obat`.`nmObat` AS `nmObat`,`det_resep`.`jumlahObat` AS `jumlahObat`,`obat`.`hargaJual` AS `hargaJual`,(`obat`.`hargaJual` * `det_resep`.`jumlahObat`) AS `Total`,`pendaftaran`.`tglPendaftaran` AS `tglPendaftaran` from (((((`resep` join `pemeriksaan` on((`resep`.`NoPemeriksaan` = `pemeriksaan`.`NoPemeriksaan`))) join `pendaftaran` on((`pemeriksaan`.`NoPendaftaran` = `pendaftaran`.`NoPendaftaran`))) join `pasien` on((`pendaftaran`.`NoPasien` = `pasien`.`NoPasien`))) join `det_resep` on((`resep`.`NoResep` = `det_resep`.`NoResep`))) join `obat` on((`det_resep`.`KodeObat` = `obat`.`KodeObat`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pemasukan_pemeriksaan`
--
DROP TABLE IF EXISTS `v_pemasukan_pemeriksaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemasukan_pemeriksaan`  AS  select `pendaftaran`.`NoPendaftaran` AS `NoPendaftaran`,`pendaftaran`.`tglPendaftaran` AS `tglPendaftaran`,`pendaftaran`.`noUrut` AS `noUrut`,`pendaftaran`.`NoPasien` AS `NoPasien`,`pasien`.`namaPas` AS `namaPas`,sum(`jenisbiaya`.`tarif`) AS `jumlah` from (((`pendaftaran` join `pasien` on((`pendaftaran`.`NoPasien` = `pasien`.`NoPasien`))) join `det_pendaftaran` on((`pendaftaran`.`NoPendaftaran` = `det_pendaftaran`.`NoPendaftaran`))) join `jenisbiaya` on((`det_pendaftaran`.`IDJenisBiaya` = `jenisbiaya`.`IDJenisBiaya`))) group by `pendaftaran`.`NoPendaftaran` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_total_bayar_obat`
--
DROP TABLE IF EXISTS `v_total_bayar_obat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_bayar_obat`  AS  select `pemeriksaan`.`NoPemeriksaan` AS `NoPemeriksaan`,`resep`.`NoResep` AS `NoResep`,sum((`obat`.`hargaJual` * `det_resep`.`jumlahObat`)) AS `TotalBayarObat` from (((`pemeriksaan` join `resep` on((`pemeriksaan`.`NoPemeriksaan` = `resep`.`NoPemeriksaan`))) join `det_resep` on((`resep`.`NoResep` = `det_resep`.`NoResep`))) join `obat` on((`det_resep`.`KodeObat` = `obat`.`KodeObat`))) group by `pemeriksaan`.`NoPemeriksaan`,`resep`.`NoResep` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `det_pendaftaran`
--
ALTER TABLE `det_pendaftaran`
  ADD PRIMARY KEY (`NoRecord`);

--
-- Indexes for table `det_resep`
--
ALTER TABLE `det_resep`
  ADD PRIMARY KEY (`noRecord`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`KodeDokter`);

--
-- Indexes for table `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  ADD PRIMARY KEY (`KodeJadwal`);

--
-- Indexes for table `jenisbiaya`
--
ALTER TABLE `jenisbiaya`
  ADD PRIMARY KEY (`IDJenisBiaya`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`noUser`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`KodeObat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`NoPasien`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`NoPemeriksaan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`NoPendaftaran`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`KodePoli`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`NoResep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `det_pendaftaran`
--
ALTER TABLE `det_pendaftaran`
  MODIFY `NoRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `det_resep`
--
ALTER TABLE `det_resep`
  MODIFY `noRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `noUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
