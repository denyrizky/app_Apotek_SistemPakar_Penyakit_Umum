-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 07:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `det_pendaftaran`
--

CREATE TABLE `det_pendaftaran` (
  `NoRecord` int(11) NOT NULL,
  `NoPendaftaran` varchar(50) DEFAULT NULL,
  `IDJenisBiaya` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pendaftaran`
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
(23, '201804110013', 'BY0001'),
(24, '202206210014', 'BY0001'),
(25, '202206220015', 'BY0001'),
(26, '202206220015', 'BY0002'),
(27, '202206220017', 'BY0002'),
(28, '202206220017', 'BY0002'),
(29, '202206220017', 'BY0002'),
(30, '202206220017', 'BY0002'),
(31, '202206220017', 'BY0002'),
(32, '202206220017', 'BY0002'),
(33, '202206220017', 'BY0002'),
(34, '202206220017', 'BY0002'),
(35, '202206220017', 'BY0002'),
(36, '202206220017', 'BY0004');

-- --------------------------------------------------------

--
-- Table structure for table `det_resep`
--

CREATE TABLE `det_resep` (
  `noRecord` int(11) NOT NULL,
  `NoResep` varchar(20) DEFAULT NULL,
  `KodeObat` varchar(20) DEFAULT NULL,
  `dosis` varchar(100) DEFAULT NULL,
  `jumlahObat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_resep`
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
(22, 'RE201804110009', 'B0003', '4 x 4 / hari', 20),
(23, 'RE202206210010', 'B0001', NULL, 0),
(24, 'RE202206220011', 'B0001', NULL, 0),
(25, 'RE202206220021', 'B0003', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
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
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`KodeDokter`, `nmDokter`, `almDokter`, `jnsKelDokter`, `telpDokter`, `KodePoli`) VALUES
('D0001', 'Dr. Xavier', 'West South Anthem', 'Laki-Laki', '021-123123', 'POLI0002'),
('D0002', 'Macan Kumbang', 'Hutan Rimba', 'Laki-Laki', '021021', 'POLI0001'),
('D0003', 'Dr. Kolor', 'Celana Panjang', 'Laki-Laki', '09123123', 'POLI0001'),
('D0004', 'Dr. Komar', 'Cikomar', 'Laki-Laki', '089123921', 'POLI0002'),
('D0005', 'aaada', 'BTN Gunteng Blok AH 10', 'Laki-Laki', '43112', 'POLI0001');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpraktek`
--

CREATE TABLE `jadwalpraktek` (
  `KodeJadwal` varchar(20) NOT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamSelesai` time DEFAULT NULL,
  `KodeDokter` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalpraktek`
--

INSERT INTO `jadwalpraktek` (`KodeJadwal`, `hari`, `jamMulai`, `jamSelesai`, `KodeDokter`) VALUES
('J0001', 'Senin', '07:00:00', '12:00:00', 'D0001'),
('J0002', 'Selasa', '07:00:00', '19:00:00', 'D0002'),
('J0003', 'Senin', '07:00:00', '19:00:00', 'D0003'),
('J0004', 'Kamis', '09:00:00', '16:00:00', 'D0004'),
('J0005', 'Jumat', '07:00:00', '11:00:00', 'D0001'),
('J0006', 'Sabtu', '07:00:00', '20:00:00', 'D0003'),
('J0007', 'Minggu', '00:00:00', '17:00:00', 'D0001'),
('J0008', 'Kamis', '08:00:00', '13:00:00', 'D0003'),
('J0010', 'Rabu', '18:00:00', '22:00:00', 'D0004'),
('J0011', 'Selasa', '18:13:00', '23:00:00', 'D0002'),
('J0013', 'Rabu', '20:00:00', '23:00:00', 'D0001');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbiaya`
--

CREATE TABLE `jenisbiaya` (
  `IDJenisBiaya` varchar(20) NOT NULL,
  `namaBiaya` varchar(50) DEFAULT NULL,
  `tarif` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisbiaya`
--

INSERT INTO `jenisbiaya` (`IDJenisBiaya`, `namaBiaya`, `tarif`) VALUES
('BY0001', 'Cek Rontgen', 40000),
('BY0002', 'Cek Darah', 20000),
('BY0003', 'Cek Jantung', 5000000),
('BY0004', 'Cek Urin', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
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
-- Dumping data for table `login`
--

INSERT INTO `login` (`noUser`, `username`, `password`, `typeUser`, `NIP`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'arishasan4', '$2a$10$SQIQiNceAZ0SNmjiDlq6Z.b3.Qi99zrWq0XF.Rdq1UIdC6iuyEm3W', 'ADMIN', 'K0001', 'oYHPi6ScSMjW4mzf3e1xaLKEQvm3PDxx31upOJ9jC3XlMKrcn3ppal8FQd1h', '2018-01-02 19:13:37', '2018-01-02 19:13:37'),
(4, '08080123', '$2y$10$BUOVyRYiiBGpJJMffZn2oOp80fZyVY6MYiD59A1YFbXsIqYajCv3C', 'PEGAWAI', 'K0002', 'qClVN37rhEu8eupuzfEGCZUr9TRU5rhQza72t5hnR0XF2IOuivpzYzs615gY', NULL, NULL),
(5, '08123456', '$2a$10$E.ANSgXfTyDwP6oa4z.4EO36fM.zn1AvayH2SN9ZPBGWLmxcDcXm.', 'PEGAWAI', 'K0003', 'pWyIwe3jmICis4J8ThMDMPEj1D3f9CrHJaZXmjgDPz2P1e0dge7uZZFgZvzf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `KodeObat` varchar(20) NOT NULL,
  `nmObat` varchar(50) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `hargaJual` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`KodeObat`, `nmObat`, `merk`, `satuan`, `hargaJual`) VALUES
('B0001', 'Paracetamol', 'Konidin', 'Sachet', 2000),
('B0002', 'Amoxilin', 'Topaz', 'Sachet', 4000),
('B0003', 'Antibioticus', 'Anti', 'Sachet', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
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
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`NoPasien`, `namaPas`, `almPas`, `telpPas`, `tglLahirPas`, `jenisKelPas`, `tglRegistrasi`) VALUES
('P0002', 'Denys', 'Gunteng', '0891239123', '2000-05-31', 'Laki-Laki', '2018-01-03'),
('P0003', 'Xon', 'Xoa', '0923', '2018-01-02', 'Laki-Laki', '2018-01-05'),
('P0004', 'Akeboshi', 'Japanese', '0111', '2018-01-01', 'Laki-Laki', '2018-01-06'),
('P0005', 'Alfin', 'Cianjur', '023020032', '1996-05-11', 'Laki-Laki', '2018-01-08'),
('P0006', 'Joang', 'Cianjur', '09030123', '1996-05-13', 'Laki-Laki', '2018-01-09'),
('P0007', 'Faisal', 'Cianjur', '90090213', '1000-05-13', 'Laki-Laki', '2018-01-11'),
('P0008', 'Razix', 'Phantom Generation', '083817122289', '1995-12-01', 'Laki-Laki', '2018-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `namaPeg`, `almPeg`, `telpPeg`, `tglLahirPeg`, `jnsKelPeg`) VALUES
('K0001', 'Deny Rizky R', 'Kp.Cilaku Babakan Rt.02/01', '083817122289', '2000-05-13', 'Laki-Laki'),
('K0002', 'Dini Fitri Amalia', 'Cianjur', '08080123', '2000-05-15', 'Perempuan'),
('K0003', 'Nisa', 'Kp.durian runtuh', '321123', '2000-03-01', 'Perempuan');

--
-- Triggers `pegawai`
--
DELIMITER $$
CREATE TRIGGER `buat_akun` AFTER INSERT ON `pegawai` FOR EACH ROW BEGIN
	
	insert into login (username,typeUser,NIP) VALUES(NEW.telpPeg,'PEGAWAI',NEW.NIP);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
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
-- Dumping data for table `pemeriksaan`
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
('PM201804110009', 'Sakit Pinggang', 'Tulang Punggung retak', 'Rontgen Darurat', 'Medis secepatnya ASAP', 59, 55, 54, '201804110013'),
('PM202206210010', 'sakit pingang', '2020', '2121', 'suntik mati', 80, 80, 200, '202206210014'),
('PM202206220011', 'sakit kepala', 'geger otak', 'obat obatan', 'operasi', 187, 120, 123, '202206220015'),
('PM202206220012', 'asd', 'qasd', 'sad', 'asd', 123, 21, 21, '202206220016'),
('PM202206220013', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220014', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220015', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220016', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220017', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220018', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220019', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220020', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220021', 'ads', 'asd', 'dsa', 'sa', 12, 21, 21, '202206220017'),
('PM202206220022', 'asd', 'ads', 'as', 'as', 12, 21, 21, '202206220017');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
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
-- Dumping data for table `pendaftaran`
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
('201804110013', '2018-04-11', 1, 'K0001', 'P0008', 'J0010'),
('202206210014', '2022-06-21', 1, 'K0001', 'P0001', 'J0011'),
('202206220015', '2022-06-22', 1, 'K0001', 'P0002', 'J0013'),
('202206220016', '2022-06-22', 2, 'K0001', 'P0008', 'J0013'),
('202206220017', '2022-06-22', 3, 'K0001', 'P0001', 'J0013'),
('202206230018', '2022-06-23', 1, 'K0001', 'P0002', 'J0004'),
('202206230019', '2022-06-23', 2, 'K0001', 'P0003', 'NOTHING'),
('202207130020', '2022-07-13', 1, 'K0001', 'P0002', 'NOTHING');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `KodePoli` varchar(20) NOT NULL,
  `namaPoli` varchar(50) DEFAULT NULL,
  `alamatPoli` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`KodePoli`, `namaPoli`, `alamatPoli`) VALUES
('POLI0001', 'Poliklinik Sehat Sejahtera', 'Kp. Mande'),
('POLI0002', 'Poliklinik Square', 'St. Saint Saiyaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `NoResep` varchar(20) NOT NULL,
  `NoPemeriksaan` varchar(20) NOT NULL,
  `proses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
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
('RE201804110009', 'PM201804110009', 'Selesai'),
('RE202206210010', 'PM202206210010', 'Selesai'),
('RE202206220011', 'PM202206220011', 'Menuju Apoteker'),
('RE202206220012', 'PM202206220013', 'Selesai'),
('RE202206220013', 'PM202206220014', 'Menuju Apoteker'),
('RE202206220014', 'PM202206220015', 'Menuju Apoteker'),
('RE202206220015', 'PM202206220016', 'Menuju Apoteker'),
('RE202206220016', 'PM202206220017', 'Menuju Apoteker'),
('RE202206220017', 'PM202206220018', 'Menuju Apoteker'),
('RE202206220018', 'PM202206220019', 'Menuju Apoteker'),
('RE202206220019', 'PM202206220020', 'Menuju Apoteker'),
('RE202206220020', 'PM202206220021', 'Menuju Apoteker'),
('RE202206220021', 'PM202206220022', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala_1`
--

CREATE TABLE `tb_gejala_1` (
  `id` int(5) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala_1`
--

INSERT INTO `tb_gejala_1` (`id`, `kode`, `gejala`) VALUES
(1, 'G001', 'Demam'),
(2, 'G002', 'Mengigil'),
(3, 'G003', 'Berkeringat \r\n'),
(4, 'G004', 'Sakit Kepala\r\n'),
(5, 'G005', 'Hilang Kesadaran /Pingsan\r\n'),
(6, 'G006', 'Anemia\r\n'),
(7, 'G007', 'Panas Iregular\r\n'),
(8, 'G008', 'parasitemia\r\n'),
(9, 'G009', 'Splenomigali\r\n'),
(10, 'G010', 'Muka merah\r\n'),
(11, 'G011', 'muntah\r\n'),
(12, 'G012', 'diare\r\n'),
(13, 'G013', 'pegal-pegal\r\n'),
(14, 'G014', 'kejang-kejang\r\n'),
(15, 'G015', 'dehidrasi\r\n'),
(16, 'G016', 'sesak nafas\r\n'),
(17, 'G017', 'mual\r\n'),
(18, 'G018', 'gagal ginjal\r\n'),
(19, 'G019', 'pendarahan\r\n'),
(20, 'G020', 'kurang nafsu makan\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int(11) NOT NULL,
  `kode_pen` varchar(50) DEFAULT NULL,
  `penyakit` varchar(50) DEFAULT NULL,
  `info` longtext NOT NULL,
  `solusi` longtext NOT NULL,
  `gejala` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `kode_pen`, `penyakit`, `info`, `solusi`, `gejala`) VALUES
(2, 'S002', 'Malaria Quartana', 'Malaria quartana merupakan salah satu jenis malaria yang disebabkan oleh adanya plasmodium malariae. Jenis malara kuartana juga bisadikatakan merupakan salah satu jenis malaria yang tingkat keparahannya bisa lebih besar dibandingkan dengan jenis malaria yang lain. Masa inkubasi yang terjadi pada malaria jneis quartana ini juga lebih lama dibandingkan dengan jenis malaria yang lain.', 'Jika anda akan menggunakan cara medis berarti anda harus melakukan pengobatan oleh dokter, biasanya dalam pemberian obat dokter akan memberikan obat yang memiliki funsii untuk membunuh semua parasit yang ada kemudian akan memberikan obat yang bisa menyembuhka infeksi yang ada. Obat-bat yang biasanya dianjurkan oleh dokter untuk pengobatan malaria khususnya malaria quartana ialah seperti  vaksin, Primakuin dll.', 'G001,G002,G004,G005,G013,G014,G016,G019,G020'),
(3, 'S003', 'Malaria Tropika', 'penyebab utama dari malaria jenis tropika adalah parasit yang bernama Plasmodium falciparum di mana jenis malaria inilah yang paling sering terjadi komplikasi. Seluruh bentuk eritrosit juga diketahui diserang oleh malaria tropika berbeda dari jenis malaria tertiana yang hanya menyerang eritrosit muda.', 'Kina 3×2 tablet yang perlu dikonsumsi selama 7 hari.\r\nKombinasi sulfadoksin 1000 mg bersama dengan 25 mg akan pirimetamin per tablet dengan dosis tunggal yang perlu dikonsumsi sebanyak 2-3 tablet.\r\nKombinasi tetrasiklin dan kina.\r\nJenis obat antibiotik seperti tetrasiklin selama 7-10 hari dengan dosis 4 x 250 mg per hari, serta minosiklin dengan dosis 2 x 100 mg per hari yang juga dikonsumsi seminggu.', 'G001,G002,G005,G006,G007,G008,G009,G011,G012,G013,G014,G015,G017,G018,G020'),
(4, 'S004', 'Malaria Ovale', 'malaria ovale hampir memiliki kesamaan dengan malaria jenis vivax, perbedaanya ialah pada perubahan pada eritrosit yang dihinggapi parasit mirip dengan plasmodium vivax. D', 'Minum air yang cukup, Monitoring temperature,Pemberian obat anti malaria', 'G001,G003,G005,G006,G013,G016,G020'),
(29, 'S005', 'sad', 'asdasdasd', 'dsada', 'G001,G002,G003,G004,G012'),
(39, 'S006', 'sad', 'asd', 'sad', 'G003,G005,G012,G013'),
(40, 'S007', 'saddsa', 'asdsda', 'asddas', 'G001,G002,G003'),
(41, 'S008', 'sadsda', 'ads', 'asd', 'G001,G002,G012'),
(42, 'S009', 'asdas', 'asddsa', 'adsasd', 'G001,G002,G003,G004'),
(43, 'S010', 'asd', 'sad', 'saaa', 'G001,G002,G003,G019'),
(45, 'S012', 'ads', 'ads', 'ads', 'G001,G002'),
(46, 'S013', 'asddsa', 'asaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'G001'),
(47, 'S014', 'saadsda', 'asdsad', 'asdsad', 'G001,G002'),
(48, 'S015', 'sadsad', '213123', 'asddas', 'G001,G002,G003'),
(49, 'S016', 'sadsda', 'asdasd', 'asdads', 'G001,G002,G003'),
(50, 'S017', 'asd', 'sad', 'das', 'G001,G003,G004'),
(51, 'S018', 'asd', 'sad', 'das', 'G001,G003,G004'),
(52, 'S019', 'asd', 'sad', 'das', 'G001,G003,G004'),
(53, 'S020', 'asd', 'sad', 'das', 'G001,G003,G004'),
(54, 'S021', 'asd', 'sad', 'dasd', 'G001,G003,G004'),
(55, 'S022', 'asd', 'sadasdads', 'dassdad', 'G001,G002,G003,G004,G008'),
(56, 'S023', 'asd', 'sad', 'dassdad', 'G001,G003,G004,G015'),
(57, 'S024', 'asd', 'sad', 'dassdad', 'G001,G003,G004,G015'),
(58, 'S025', 'asdasd', 'asdasd', 'asddas', 'G001'),
(59, 'S026', 'asda', 'asas', 'asas', 'G001');

-- --------------------------------------------------------

--
-- Table structure for table `v_pemasukan_pemeriksaan`
--

CREATE TABLE `v_pemasukan_pemeriksaan` (
  `NoPendaftaran` varchar(50) DEFAULT NULL,
  `tglPendaftaran` date DEFAULT NULL,
  `noUrut` int(11) DEFAULT NULL,
  `NoPasien` varchar(20) DEFAULT NULL,
  `namaPas` varchar(50) DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `v_total_bayar_obat`
--

CREATE TABLE `v_total_bayar_obat` (
  `NoPemeriksaan` varchar(50) DEFAULT NULL,
  `NoResep` varchar(20) DEFAULT NULL,
  `TotalBayarObat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tb_gejala_1`
--
ALTER TABLE `tb_gejala_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `det_pendaftaran`
--
ALTER TABLE `det_pendaftaran`
  MODIFY `NoRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `det_resep`
--
ALTER TABLE `det_resep`
  MODIFY `noRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `noUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gejala_1`
--
ALTER TABLE `tb_gejala_1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
