-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 04:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubesbc2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusData` ()  BEGIN

delete from pemesanan;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusDataUser` ()  BEGIN

delete from user where is_active = 0;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pPelangganSetia` (`idPelanggan` INT)  BEGIN

declare hasil int DEFAULT 0;
declare info VARCHAR(250) DEFAULT "";

SELECT fBanyakOrderB(idPelanggan) into hasil;


if(hasil > 10)THEN
set info = "Pelanggan Setia";
elseif(hasil > 5)THEN
set info = "Pelanggan Biasa";
ELSE
set info = "Pelanggan Kurang Aktif";

end if;

SELECT info;

end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `ambilBanyakOrder` (`tbl` VARCHAR(255), `idUser` INT) RETURNS INT(11) BEGIN

declare jml INTEGER DEFAULT 0;

select count(id_user)INTO jml from `tbl` where id_user = idUser;

return(jml);

end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fBanyakOrderB` (`idUser` INT) RETURNS INT(11) BEGIN

declare jml INTEGER DEFAULT 0;
DECLARE query VARCHAR(255) DEFAULT "";

select count(id_user)INTO jml from transaksi_beauty where id_user = idUser;



return(jml);

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notif_barangbaru`
--

CREATE TABLE `notif_barangbaru` (
  `id_notifikasi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pjasa` int(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `desc_barang` varchar(250) NOT NULL,
  `descmini_barang` varchar(250) NOT NULL,
  `gambar_barang` varchar(250) NOT NULL,
  `tipe_barang` varchar(250) NOT NULL,
  `ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_barangbaru`
--

INSERT INTO `notif_barangbaru` (`id_notifikasi`, `id_barang`, `id_pjasa`, `nama_barang`, `harga_barang`, `desc_barang`, `descmini_barang`, `gambar_barang`, `tipe_barang`, `ket`) VALUES
(1, 21, 6, 'PAKET FACIAL TREATMENT 6', 310000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Pedicure dan Nail Art', 'Pedicure + Nail Art', 'nailTreatment.jpg', 'nails', 'Ada Yang Baru Dari Product Beauty'),
(2, 21, 5, 'PAKET KOST CLEANING 100', 150000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju, Pembersihan kamar mandi', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju ', 'kost1.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(3, 22, 7, 'aaaaaaa', 2121212, 'qwdghq', 'asdsa', '5ea1bf9360cfd.jpeg', 'qddw', 'Ada Yang Baru Dari Product clean'),
(4, 23, 7, 'Paket 1', 21223, 'gfwh3g', 'asdsa', '5ea1bfecaac33.jpeg', 'home', 'Ada Yang Baru Dari Product clean'),
(5, 22, 7, 'Paket 1', 11332, 'sas', 'saa', '5ea5b56779396.png', 'home', 'Ada Yang Baru Dari Product clean'),
(6, 22, 6, 'Paket 1', 22443, 'apa wee', 'sapu + pel + setrika + vacum cleaner', '5ea689c58b49b.png', 'home', 'Ada Yang Baru Dari Product clean'),
(7, 23, 6, 'Paket 1', 2453253, 'apa wee', 'sapu + pel + setrika + vacum cleaner', '', 'home', 'Ada Yang Baru Dari Product clean'),
(8, 24, 4, 'paket uhuy', 10000, 'uhuy in aja kangen', 'uhuy', '', 'home', 'Ada Yang Baru Dari Product clean'),
(9, 25, 6, 'Paket 1', 3233, 'wdd', 'dsfsd', '', 'home', 'Ada Yang Baru Dari Product clean'),
(10, 26, 6, 'Paket 1', 3234, 'gfwh3g', 'sapu + pel + setrika + vacum cleaner', '', 'home', 'Ada Yang Baru Dari Product clean'),
(11, 27, 6, 'Paket 1', 2343, 'sas', 'asdsa', '', 'home', 'Ada Yang Baru Dari Product clean'),
(12, 28, 6, 'Paket 1', 23211, 'apa wee', 'sapu + pel + setrika + vacum cleaner', '5ea68f378c6d5.jpeg', 'home', 'Ada Yang Baru Dari Product clean'),
(13, 29, 6, 'Paket 1', 10000, 'kgn', 'kangen', '5ea68fad57f9f.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(14, 30, 6, 'Paket 1', 34534, 'apa wee', 'sdf', '', 'home', 'Ada Yang Baru Dari Product clean'),
(15, 31, 6, 'er', 23, 'sas', 'ss', '', 'home', 'Ada Yang Baru Dari Product clean'),
(16, 32, 6, 'Paket 1', 23, 'sqw', 'es', '', 'home', 'Ada Yang Baru Dari Product clean'),
(17, 33, 6, 'Paket 1', 345, 'apa wee', 'sapu + pel + setrika + vacum cleaner', '5ea692564cefe.jpeg', 'home', 'Ada Yang Baru Dari Product clean'),
(18, 34, 6, 'Paket 1', 44, 'fds', 'ef', '', 'home', 'Ada Yang Baru Dari Product clean'),
(19, 32, 6, 'Paket 1', 30909, 'hgc', 'vg', '', 'home', 'Ada Yang Baru Dari Product clean'),
(20, 33, 6, 'hsh', 124234, 'dbz', 'kgd', '', 'home', 'Ada Yang Baru Dari Product clean'),
(21, 34, 6, 'Paket 1', 324, 'gfwh3g', 'asdsa', '', 'home', 'Ada Yang Baru Dari Product clean'),
(22, 35, 6, 'Paket 1', 53, 'fdwet', 'eft', '', 'hair', 'Ada Yang Baru Dari Product clean'),
(23, 36, 6, 'Paket 1', 322, 'sd', 'ss', '5ea7253f256a8.jpeg', 'home', 'Ada Yang Baru Dari Product clean'),
(24, 37, 6, 'Paket 111', 325, 'faSC', 'fw', '5ea7256d0cbc5.png', 'home', 'Ada Yang Baru Dari Product clean'),
(25, 38, 6, 'Paket 12', 214, 'sca', 'sa', '', 'hair', 'Ada Yang Baru Dari Product clean'),
(26, 38, 6, 'Paket 11111', 2112, 'qwwqd', 'qw', '', 'home', 'Ada Yang Baru Dari Product clean'),
(27, 39, 6, 'Paket 1', 423, 'efa', 'ss', '', 'home', 'Ada Yang Baru Dari Product clean'),
(28, 40, 6, '32qw', 3223, 'cw', 'dw', '', 'home', 'Ada Yang Baru Dari Product clean'),
(29, 41, 6, 'Paket 1', 323, 'efaec', 'eaf', '', 'home', 'Ada Yang Baru Dari Product clean'),
(30, 22, 6, 'Paket 1', 2434, 'dsfs', 'asdsa', '', 'home', 'Ada Yang Baru Dari Product clean'),
(31, 23, 6, 'Paket 1', 56456, 'tu', 'asdsa', '', 'hair', 'Ada Yang Baru Dari Product clean'),
(32, 24, 6, 'dian', 212, 'apa wee', 'asdsa', '5ea8f4f110fa3.jpeg', 'home', 'Ada Yang Baru Dari Product clean'),
(33, 1, 8, 'Masker muka enak banget', 200000, 'adds', 'aadsa', '606db0e605eb9.png', 'adsasda', 'Ada Yang Baru Dari Product clean'),
(34, 2, 12, 'adas', 123121, 'assad', 'asds', '606dc539c822d.jpeg', 'asdasdas', 'Ada Yang Baru Dari Product clean'),
(35, 1, 12, 'asdas', 20000, 'adsa', 'asdas', '', 'asdsadas', 'Ada Yang Baru Dari Product Beauty'),
(36, 2, 12, 'jasa beauty', 2000, 'dasa', 'assa', '', 'aasdsadsa', 'Ada Yang Baru Dari Product Beauty'),
(37, 3, 12, 'asdas', 20000, 'asdsa', 'asdas', '', '1321312', 'Ada Yang Baru Dari Product Beauty'),
(38, 4, 12, 'asdsa', 20000, 'asdsa', 'asdas', '606dc75ac4e53.jpeg', 'asdsad', 'Ada Yang Baru Dari Product Beauty'),
(39, 5, 12, 'Beauty Banget', 20000, 'asdsa', 'adas', '606dc7a35e85a.jpg', 'asdsasa', 'Ada Yang Baru Dari Product Beauty'),
(40, 6, 12, 'Beauty Banget', 20000, 'haha', 'haha', '606dcd9b8ed48.png', 'haha', 'Ada Yang Baru Dari Product Beauty'),
(41, 3, 14, 'PAKET HOME CLEANING 1', 200000, 'kebersihan bgt', 'kebersihan', '6075bd2e75227.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(42, 4, 21, 'PAKET HOME CLEANING 1', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian dan Mencuci Piring', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring', '6076561fa1c83.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(43, 5, 21, 'PAKET HOME CLEANING 2', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '6076573f8ca9c.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(44, 6, 21, 'PAKET APARTMENT CLEANING 1', 300000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian dan Mencuci Piring', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring', '60765887b3c7b.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(45, 7, 21, 'PAKET APARTMENT CLEANING 2', 300000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '6076595521257.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(46, 8, 21, 'PAKET KOST CLEANING 1', 150000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan', 'Menyapu Ruangan + Mengepel Ruangan', '60765cac027c8.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(47, 9, 21, 'PAKET KOST CLEANING 2', 180000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring,', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju', '60765d33b5485.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(48, 10, 22, 'PAKET HOME 1', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '607664ce2966d.png', 'home', 'Ada Yang Baru Dari Product clean'),
(49, 11, 22, 'PAKET HOME CLEANING 1', 360000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '6076657f4330f.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(50, 12, 22, 'PAKET KEBERSIHAN MAKSIMAL', 550000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '60766770e42e3.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(51, 13, 20, 'PAKET KEBERSIHAN 1', 400000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '607668c012d1f.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(52, 14, 20, 'PAKET KEBERSIHAN 2', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '607669d0eeb23.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(53, 15, 18, 'PAKET KEBERSIHAN APARTMENT 1', 320000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '60766a7eb8bb1.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(54, 16, 20, 'PAKET KEBERSIHAN RUMAH 3', 320000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '60766ed0057c1.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(55, 17, 20, 'PAKET KEBERSIHAN APARTMENT 1', 450000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '60766f71756d2.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(56, 18, 20, 'PAKET KEBERSIHAN APARTMENT 2', 420000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '60766faf38e34.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(57, 19, 20, 'PAKET KEBERSIHAN APARTMENT 3', 460000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '60766fe2afb26.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(58, 20, 20, 'PAKET KEBERSIHAN KOST 1', 250000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan', 'Menyapu Ruangan + Mengepel Ruangan', '607670424a659.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(59, 21, 20, 'PAKET KEBERSIHAN KOST 2', 36000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian', '607670af33f44.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(60, 22, 20, 'PAKET KEBERSIHAN KOST 3', 400000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju, Pembersihan kamar mandi', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '6076711f46807.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(61, 23, 19, 'PAKET BERSIH 1', 400000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring', '607671e97b9f8.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(62, 24, 19, 'PAKET BERSIH 2', 420000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian dan Mencuci Piring', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '607672225d4bf.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(63, 25, 19, 'PAKET BERSIH 3', 450000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '6076728c92597.jpg', 'home', 'Ada Yang Baru Dari Product clean'),
(64, 26, 19, 'PAKET APARTMENT BERSIH 1', 500000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '6076732695c66.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(65, 27, 19, 'PAKET BERSIH APARTMENT 2', 450000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '6076738e058b7.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(66, 28, 19, 'PAKET BERSIH APARTMENT 3', 445000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju, Menyiram tanaman dan Pembersihan Sofa', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju + Pembers', '6076742611a85.jpg', 'apartment', 'Ada Yang Baru Dari Product clean'),
(67, 29, 19, 'PAKET BERSIH KOST 1', 250000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian', '607674e97ecd5.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(68, 30, 19, 'PAKET BERSIH KOST 2', 290000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kaca + Menjemur Baju', '60767593e27b8.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(69, 31, 19, 'PAKET BERSIH KOST 3', 300000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kaca + Menjemur Baju', '607675e3ade6b.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(70, 7, 24, 'PAKET HAIR TREATMENT 1', 600000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Gunting Rambut + Hair colour + Blow Variasi', '60767b48615c1.jpeg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(71, 8, 24, 'PAKET HAIR TREATMENT 1', 400000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Gunting Rambut + Blow Variasi', '60767c8417ebf.jpeg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(72, 9, 24, 'PAKET HAIR TREATMENT 3', 250000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Creambath + Blow Variasi', '60767d6d8d266.jpeg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(73, 10, 24, 'PAKET FACIAL TREATMENT 1', 300000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Masker Collagen dan PDT light 20menit', 'Hydra White', '60767dfcbf8ac.jpeg', 'facial', 'Ada Yang Baru Dari Product Beauty'),
(74, 11, 24, 'PAKET FACIAL TREATMENT 2', 600000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Bio Peel, Vakum komedo, Tea tree gel, Masker tea tree', 'Acne Bio Peel', '60767ef27e281.jpeg', 'facial', 'Ada Yang Baru Dari Product Beauty'),
(75, 12, 24, 'PAKET FACIAL TREATMENT 3', 350000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Microderabrasi, IPL Whitening, Serum whitening dan meso', 'Photo Light Treatment', '60767f7c6d4dc.jpeg', 'facial', 'Ada Yang Baru Dari Product Beauty'),
(76, 13, 24, 'PAKET NAILS TREATMENT 1', 200000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Manicure dan Inglot Polish', 'Manicure + Inglot Polish', '6076802c0cfe9.jpeg', 'nail', 'Ada Yang Baru Dari Product Beauty'),
(77, 14, 24, 'PAKET NAILS TREATMENT 2', 300000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Manicure dan Nail Art', 'Manicure + Nail Art', '60768090bb1be.jpeg', 'nail', 'Ada Yang Baru Dari Product Beauty'),
(78, 15, 24, 'PAKET NAILS TREATMENT 3', 180000, 'Staf membawa peralatan dan product untuk layanan Nails treatment. Layanan meliputi Manicure dan Gel Polish', 'Manicure + Gel Polish', '6076810170627.jpeg', 'nail', 'Ada Yang Baru Dari Product Beauty'),
(79, 16, 25, 'PAKET PERAWATAN 1', 200000, 'Cuci Rambut + Gunting Rambut + Blow Variasi', 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', '6076883bc12c9.jpg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(80, 17, 25, 'PAKET PERAWATAN 2', 320000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Gunting Rambut + Blow Variasi', '6076888f4780e.jpg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(81, 18, 25, 'PAKET PERAWATAN 3', 340000, 'Cuci Rambut + Gunting Rambut + Blow Variasi', 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', '607688cdbef1a.jpg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(82, 19, 25, 'PAKET FACIAL 1', 250000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Microderabrasi, IPL Whitening, Serum whitening dan meso', 'Photo Light Treatment', '6076893176a01.jpeg', 'facial', 'Ada Yang Baru Dari Product Beauty'),
(83, 20, 25, 'PAKET FACIAL 2', 300000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Microdebrasi , oxygen whitening spray dan serum vit c', 'Nutri White', '60768a0bdc08d.jpeg', 'facial', 'Ada Yang Baru Dari Product Beauty'),
(84, 21, 25, 'PAKET FACIAL 3', 350000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Bio Peel, Vakum komedo, Tea tree gel, Masker tea tree', 'Acne Bio Peel', '60768a662d988.jpeg', 'facial', 'Ada Yang Baru Dari Product Beauty'),
(85, 22, 25, 'PAKET PERAWATAN KUKU 1', 280000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Pedicure dan Inglot Polish', 'Pedicure + Inglot Polish', '60768ac5beb04.jpeg', 'nail', 'Ada Yang Baru Dari Product Beauty'),
(86, 23, 25, 'PAKET PERAWATAN KUKU 2', 310000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Manicure dan Nail Art', 'Manicure + Nail Art', '60768b3c8f669.jpeg', 'nail', 'Ada Yang Baru Dari Product Beauty'),
(87, 24, 25, 'PAKET PERAWATAN KUKU 3', 350000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Pedicure dan Nail Art', 'Pedicure + Nail Art', '60768b9cc1616.jpeg', 'nail', 'Ada Yang Baru Dari Product Beauty'),
(88, 32, 19, 'PAKET KOST BERSIH 4', 300000, 'bersih banget', 'bersih bersih', '6116877d5647f.jpg', 'kost', 'Ada Yang Baru Dari Product clean'),
(89, 33, 19, 'PAKET KOST BERSIH 7', 120000, 'panjang', 'minimalis', '611688cdea51b.jpg', 'kosan kayanya', 'Ada Yang Baru Dari Product clean'),
(90, 25, 25, 'asd', 1321, 'asd', 'asd', '61227db21e48a.jpeg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(91, 26, 25, 'asd', 123, 'asd', 'asd', '61227e97a1b3e.jpg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(92, 27, 25, 'asd13', 123, 'asd', 'asd', '61227f9e72b29.jpg', 'hair', 'Ada Yang Baru Dari Product Beauty'),
(93, 34, 20, 'asd', 12321, 'asd', 'asd', '6122817395d0d.jpg', 'home', 'Ada Yang Baru Dari Product clean');

-- --------------------------------------------------------

--
-- Table structure for table `productbeauty`
--

CREATE TABLE `productbeauty` (
  `id_beauty` int(5) NOT NULL,
  `id_pjasa` int(11) NOT NULL,
  `nama_beauty` varchar(30) NOT NULL,
  `harga_beauty` int(15) NOT NULL,
  `desc_beauty` varchar(255) NOT NULL,
  `descmini_beauty` varchar(155) NOT NULL,
  `gambar_beauty` varchar(255) NOT NULL,
  `tipe_product` varchar(15) NOT NULL,
  `status_aktif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productbeauty`
--

INSERT INTO `productbeauty` (`id_beauty`, `id_pjasa`, `nama_beauty`, `harga_beauty`, `desc_beauty`, `descmini_beauty`, `gambar_beauty`, `tipe_product`, `status_aktif`) VALUES
(7, 24, 'PAKET HAIR TREATMENT 1', 600000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Gunting Rambut + Hair colour + Blow Variasi', '60767b48615c1.jpeg', 'hair', 1),
(8, 24, 'PAKET HAIR TREATMENT 2', 400000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Gunting Rambut + Blow Variasi', '60767c8417ebf.jpeg', 'hair', 1),
(9, 24, 'PAKET HAIR TREATMENT 3', 250000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Creambath + Blow Variasi', '60767d6d8d266.jpeg', 'hair', 1),
(10, 24, 'PAKET FACIAL TREATMENT 1', 300000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Masker Collagen dan PDT light 20menit', 'Hydra White', '60767dfcbf8ac.jpeg', 'facial', 1),
(11, 24, 'PAKET FACIAL TREATMENT 2', 600000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Bio Peel, Vakum komedo, Tea tree gel, Masker tea tree', 'Acne Bio Peel', '60767ef27e281.jpeg', 'facial', 1),
(12, 24, 'PAKET FACIAL TREATMENT 3', 350000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Microderabrasi, IPL Whitening, Serum whitening dan meso', 'Photo Light Treatment', '60767f7c6d4dc.jpeg', 'facial', 1),
(13, 24, 'PAKET NAILS TREATMENT 1', 200000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Manicure dan Inglot Polish', 'Manicure + Inglot Polish', '6076802c0cfe9.jpeg', 'nail', 1),
(14, 24, 'PAKET NAILS TREATMENT 2', 300000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Manicure dan Nail Art', 'Manicure + Nail Art', '60768090bb1be.jpeg', 'nail', 1),
(15, 24, 'PAKET NAILS TREATMENT 3', 180000, 'Staf membawa peralatan dan product untuk layanan Nails treatment. Layanan meliputi Manicure dan Gel Polish', 'Manicure + Gel Polish', '6076810170627.jpeg', 'nail', 1),
(16, 25, 'PAKET PERAWATAN RAMBUT 1', 200000, 'Cuci Rambut + Gunting Rambut + Blow Variasi', 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasii', '6076883bc12c9.jpg', 'hair', 1),
(17, 25, 'PAKET PERAWATAN RAMBUT 2', 320000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', 'Cuci Rambut + Gunting Rambut + Blow Variasi', '6076888f4780e.jpg', 'hair', 1),
(18, 25, 'PAKET PERAWATAN RAMBUT 3', 340000, 'Cuci Rambut + Gunting Rambut + Blow Variasi', 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Cuci Rambut + Gunting Rambut + Blow Variasi', '607688cdbef1a.jpg', 'hair', 1),
(19, 25, 'PAKET PERAWATAN WAJAH 1', 250000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Microderabrasi, IPL Whitening, Serum whitening dan meso', 'Photo Light Treatment', '6076893176a01.jpeg', 'facial', 1),
(20, 25, 'PAKET PERAWATAN WAJAH 2', 300000, 'Staf membawa peralatan dan product untuk layanan hair treatment. Layanan meliputi Microdebrasi , oxygen whitening spray dan serum vit c', 'Nutri White', '60768a0bdc08d.jpeg', 'facial', 1),
(21, 25, 'PAKET PERAWATAN WAJAH 3', 350000, 'Staf membawa peralatan dan product untuk layanan facial treatment. Layanan meliputi Bio Peel, Vakum komedo, Tea tree gel, Masker tea tree', 'Acne Bio Peel', '60768a662d988.jpeg', 'facial', 1),
(22, 25, 'PAKET PERAWATAN KUKU 1', 280000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Pedicure dan Inglot Polish', 'Pedicure + Inglot Polish', '60768ac5beb04.jpeg', 'nail', 1),
(23, 25, 'PAKET PERAWATAN KUKU 2', 310000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Manicure dan Nail Art', 'Manicure + Nail Art', '60768b3c8f669.jpeg', 'nail', 1),
(24, 25, 'PAKET PERAWATAN KUKU 3', 350000, 'Staf membawa peralatan dan product untuk layanan nails treatment. Layanan meliputi Pedicure dan Nail Art', 'Pedicure + Nail Art', '60768b9cc1616.jpeg', 'nail', 1);

--
-- Triggers `productbeauty`
--
DELIMITER $$
CREATE TRIGGER `after_beauty_insert` AFTER INSERT ON `productbeauty` FOR EACH ROW BEGIN

INSERT INTO notif_barangbaru



SET id_barang = new.id_beauty,
id_pjasa = new.id_pjasa,
nama_barang = new.nama_beauty,
harga_barang = new.harga_beauty,
desc_barang = new.desc_beauty,
descmini_barang = new.descmini_beauty,
gambar_barang = new.gambar_beauty,
tipe_barang = new.tipe_product,
ket = "Ada Yang Baru Dari Product Beauty";

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productclean`
--

CREATE TABLE `productclean` (
  `id_clean` int(5) NOT NULL,
  `id_pjasa` int(11) NOT NULL,
  `nama_clean` varchar(30) NOT NULL,
  `harga_clean` int(15) NOT NULL,
  `desc_clean` varchar(255) NOT NULL,
  `descmini_clean` varchar(155) NOT NULL,
  `gambar_clean` varchar(255) NOT NULL,
  `tipe_product` varchar(50) NOT NULL,
  `status_aktif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productclean`
--

INSERT INTO `productclean` (`id_clean`, `id_pjasa`, `nama_clean`, `harga_clean`, `desc_clean`, `descmini_clean`, `gambar_clean`, `tipe_product`, `status_aktif`) VALUES
(4, 21, 'PAKET HOME CLEANING 1', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian dan Mencuci Piring', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring', '6076561fa1c83.jpg', 'home', 1),
(5, 21, 'PAKET HOME CLEANING 2', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '6076573f8ca9c.jpg', 'home', 1),
(6, 21, 'PAKET APARTMENT CLEANING 1', 300000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian dan Mencuci Piring', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring', '60765887b3c7b.jpg', 'apartment', 1),
(7, 21, 'PAKET APARTMENT CLEANING 2', 300000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '6076595521257.jpg', 'apartment', 1),
(8, 21, 'PAKET KOST CLEANING 1', 150000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan', 'Menyapu Ruangan + Mengepel Ruangan', '60765cac027c8.jpg', 'kost', 1),
(9, 21, 'PAKET KOST CLEANING 2', 180000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring,', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju', '60765d33b5485.jpg', 'kost', 1),
(13, 20, 'PAKET KEBERSIHAN RUMAH 1', 400000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '607668c012d1f.jpg', 'home', 1),
(14, 20, 'PAKET KEBERSIHAN RUMAH 2', 350000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '607669d0eeb23.jpg', 'home', 1),
(16, 20, 'PAKET KEBERSIHAN RUMAH 3', 320000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '60766ed0057c1.jpg', 'home', 1),
(17, 20, 'PAKET KEBERSIHAN APARTMENT 1', 450000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '60766f71756d2.jpg', 'apartment', 1),
(18, 20, 'PAKET KEBERSIHAN APARTMENT 2', 420000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '60766faf38e34.jpg', 'apartment', 1),
(19, 20, 'PAKET KEBERSIHAN APARTMENT 3', 460000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '60766fe2afb26.jpg', 'apartment', 1),
(20, 20, 'PAKET KEBERSIHAN KOST 1', 250000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan', 'Menyapu Ruangan + Mengepel Ruangan', '607670424a659.jpg', 'kost', 1),
(21, 20, 'PAKET KEBERSIHAN KOST 2', 36000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian', '607670af33f44.jpg', 'kost', 1),
(22, 20, 'PAKET KEBERSIHAN KOST 3', 400000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju, Pembersihan kamar mandi', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '6076711f46807.jpg', 'kost', 1),
(23, 19, 'PAKET RUMAH BERSIH 1', 400000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring', '611912deb4ac1.jpg', 'home', 1),
(24, 19, 'PAKET RUMAH BERSIH 2', 420000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian dan Mencuci Piring', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '607672225d4bf.jpg', 'home', 1),
(25, 19, 'PAKET RUMAH BERSIH  3', 450000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring, Pembersihan Kamar Mandi dan Pembersihan Kaca', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca', '6076728c92597.jpg', 'home', 1),
(26, 19, 'PAKET APARTMENT BERSIH 1', 500000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian, Mencuci Piring dan Pembersihan Gudang', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan gudang', '6076732695c66.jpg', 'apartment', 1),
(27, 19, 'PAKET APARTMENT BERSIH 2', 450000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca dan Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju', '6076738e058b7.jpg', 'apartment', 1),
(28, 19, 'PAKET APARTMENT BERSIH  3', 445000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju, Menyiram tanaman dan Pembersihan Sofa', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kamar Mandi + Pembersihan Kaca + Menjemur Baju + Pembers', '6076742611a85.jpg', 'apartment', 1),
(29, 19, 'PAKET KOST BERSIH 1', 250000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian', '607674e97ecd5.jpg', 'kost', 1),
(30, 19, 'PAKET KOST BERSIH 2', 290000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kaca + Menjemur Baju', '60767593e27b8.jpg', 'kost', 1),
(31, 19, 'PAKET KOST BERSIH 3', 300000, 'Staf membawa peralatan dan sabun untuk layanan pembersihan. Layanan meliputi Penyapuan ruangan, pengepelan ruangan,Mencuci Baju, Menyetrika Pakaian , Mencuci Piring , Pembersihan kaca, Menjemur baju', 'Menyapu Ruangan + Mengepel Ruangan + Mencuci Baju + Setrika Pakaian + Mencuci Piring + Pembersihan Kaca + Menjemur Baju', '607675e3ade6b.jpg', 'kost', 1),
(34, 20, 'asd', 12321, 'asd', 'asd', '6122817395d0d.jpg', 'home', 0);

--
-- Triggers `productclean`
--
DELIMITER $$
CREATE TRIGGER `after_clean_insert` AFTER INSERT ON `productclean` FOR EACH ROW BEGIN

INSERT INTO notif_barangbaru



SET id_barang = new.id_clean,
id_pjasa = new.id_pjasa,
nama_barang = new.nama_clean,
harga_barang = new.harga_clean,
desc_barang = new.desc_clean,
descmini_barang = new.descmini_clean,
gambar_barang = new.gambar_clean,
tipe_barang = new.tipe_product,
ket = "Ada Yang Baru Dari Product clean";

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beauty`
--

CREATE TABLE `transaksi_beauty` (
  `id_orderbeauty` int(5) NOT NULL,
  `id_beauty` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `namapengorder` varchar(255) NOT NULL,
  `alamat_pengorder` varchar(255) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `jam_pesan` varchar(250) NOT NULL,
  `nomor_pengorder` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `alasan_tolak` text DEFAULT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_beauty`
--

INSERT INTO `transaksi_beauty` (`id_orderbeauty`, `id_beauty`, `id_user`, `namapengorder`, `alamat_pengorder`, `tanggal_pesan`, `jam_pesan`, `nomor_pengorder`, `jumlah`, `total_harga`, `rating`, `alasan_tolak`, `status`) VALUES
(10, 16, 39, 'Muhammad Abizard', 'asd', '2021-08-25', '16.00', '0813863978551', 1, 200000, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_clean`
--

CREATE TABLE `transaksi_clean` (
  `id_orderclean` int(11) NOT NULL,
  `id_clean` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `namapengorder` varchar(255) NOT NULL,
  `alamat_pengorder` varchar(255) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `jam_pesan` varchar(250) NOT NULL,
  `nomor_pengorder` varchar(255) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `rating` double DEFAULT NULL,
  `alasan_tolak` text DEFAULT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_clean`
--

INSERT INTO `transaksi_clean` (`id_orderclean`, `id_clean`, `id_user`, `namapengorder`, `alamat_pengorder`, `tanggal_pesan`, `jam_pesan`, `nomor_pengorder`, `panjang`, `lebar`, `total_harga`, `rating`, `alasan_tolak`, `status`) VALUES
(23, 23, 39, 'Muhammad Abizard', 'Taman Sari Persada, Cluster Lotus B4/12A', '2021-08-25', '12.30', '081386397855', 5, 5, 415000, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Tanggal` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` varchar(20) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Tanggal`, `id`, `nama`, `username`, `email`, `password`, `image`, `role_id`, `is_active`, `alamat`, `phone_number`) VALUES
('0000-00-00', 7, 'admin', 'admin', 'admin@mail.com', '$2y$10$7USCBZXc1TXlkiH8ZNSJDegKQ/9K3BUWRnNxyNXZOTXEmNuufrQXu', 'default.png', 'admin', 1, 'bandung', '0872123435'),
('2021-04-06', 11, 'asd', 'aaa', 'aa@student.telkomuniversity.ac.id', '$2y$10$gDj7aEptY7lN9Dz0JjX1yeGMXmLTMLlC3OfCCVHYwACOkZe2JfN1q', 'default.png', 'Konsumen', 1, 'aasdsa', '12321312321'),
('2021-04-12', 13, 'dian', 'atikuy', 'dians@gmail.com', '$2y$10$vd643.jsjNmUN6FvLOGu3ukbG94N.iVq7M3ZDAzwTuLNfZxr2mZzq', 'default.png', 'Konsumen', 1, 'bandung', '08222345432'),
('2021-04-13', 16, 'dian', 'dian', 'diann@gmail.com', '$2y$10$1xu9L7zidzEbRRidwivFQu8BYrMKszsMKcIE7dFdunpYi3mSDQa26', 'default.png', 'Konsumen', 1, 'rembang', '08222345432'),
('2021-04-13', 18, 'namadeh', 'namadeh', 'namadeh@gmail.com', '$2y$10$Avn8u/.DVGbE7qKEl5unw.n.00/l/YTcWR5DJ5QU/.gox3J0Slwgq', 'default.png', 'Konsumen', 1, 'bandung', '1212324423243'),
('2021-04-14', 19, 'Grades Home Cleaning', 'gradeshomecleaning', 'gradeshomecleaning@gmail.com', '$2y$10$4W9xYQ1HZ04drXwcDYRUquT/B8/g9YmSr.tD1dcEtqRXZruHL7dBa', 'default.png', 'Clean', 1, 'Jl.Makam Caringin 80 Bandung 40223 Indonesia', '0812131415168'),
('2021-04-14', 20, 'Sapu Bersih ID', 'sapubersih.id', 'sapubersihid@gmail.com', '$2y$10$7USCBZXc1TXlkiH8ZNSJDegKQ/9K3BUWRnNxyNXZOTXEmNuufrQXu', 'default.png', 'Clean', 1, 'Jl Prof Surya Sumantri. Setrasari Mall  Blok B1 No.32 Bandung', '081299115115'),
('2021-04-14', 21, 'Nusantara Cleaning', 'nusantaracleaning', 'nusantaracleaning@gmail.com', '$2y$10$Zg87hx4zkdux00OZP3NNEO3I1WsF1Di0XgcnxQw21QOfLdflQ93ae', 'default.png', 'Clean', 1, 'Jalan Negla No. 50, Isola, Sukasari, Bandung', '0811993324'),
('2021-04-14', 24, 'Anata Salon', 'anatasalon', 'salonanata@gmail.com', '$2y$10$asCfzM4ceA10Q4exskerpefv3u2D1e8/LWuPYIzt6xz74rXAzJXr.', 'default.png', 'Beauty', 1, 'Permata Buah Batu Blok R14-16 Klinik Bona Mitra Keluarga Lt.2&3 Bojongsoang Bandung', '0812131415168'),
('2021-04-14', 25, 'La Maison Salon', 'lamaisonsalon', 'salonlamaison@gmail.com', '$2y$10$7USCBZXc1TXlkiH8ZNSJDegKQ/9K3BUWRnNxyNXZOTXEmNuufrQXu', 'default.png', 'Beauty', 1, 'Bumi Palangkawati, Jl. Parahyangan Raya No.15, Cipeundeuy, Padalarang, Kabupaten Bandung Barat', '0812131415168'),
('2021-06-17', 26, 'Konsumen1', 'konsumendian', 'dianjelek@gmail.com', '$2y$10$94YMDkmtNS8yDSGxeYrdaelM87rlFS9vaWrjCA4OJI2Q3o0t7XwQC', 'default.png', 'Konsumen', 1, 'Semarang', '081316172336'),
('2021-06-18', 27, 'aiai', 'aiai', 'aasdas@gmail.com', '$2y$10$gs4jULVbWZdkYd7I7Cl6bObjq.B.6wpYoMsd3bFb6G9dUSZ4lwykK', 'default.png', 'Konsumen', 1, 'asdsadsa', '123213123123'),
('2021-08-07', 37, 'dianra', 'dianra', 'diantugasta@gmail.com', '$2y$10$7USCBZXc1TXlkiH8ZNSJDegKQ/9K3BUWRnNxyNXZOTXEmNuufrQXu', 'default.png', 'Konsumen', 1, 'Bandung', '082219725530'),
('2021-08-19', 39, 'Muhammad Abizard', 'aabii', 'm.abizard1123@gmail.com', '$2y$10$7USCBZXc1TXlkiH8ZNSJDegKQ/9K3BUWRnNxyNXZOTXEmNuufrQXu', 'default.png', 'Konsumen', 1, 'Taman Sari Persada, Cluster Lotus B4/12A', '0813863978551');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'dianra@gmail.com', '0', '1628319955'),
(4, 'dianrachma014@gmail.com', '0', '1628320017'),
(5, 'diann.ra00@gmail.com', '0', '1628320250'),
(6, 'atkhrnnss@gmail.com', '0', '1628320462'),
(7, 'tugasdian6@gmail.com', '0', '1628320769');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notif_barangbaru`
--
ALTER TABLE `notif_barangbaru`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `productbeauty`
--
ALTER TABLE `productbeauty`
  ADD PRIMARY KEY (`id_beauty`),
  ADD KEY `id_pjasa` (`id_pjasa`);

--
-- Indexes for table `productclean`
--
ALTER TABLE `productclean`
  ADD PRIMARY KEY (`id_clean`);

--
-- Indexes for table `transaksi_beauty`
--
ALTER TABLE `transaksi_beauty`
  ADD PRIMARY KEY (`id_orderbeauty`);

--
-- Indexes for table `transaksi_clean`
--
ALTER TABLE `transaksi_clean`
  ADD PRIMARY KEY (`id_orderclean`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notif_barangbaru`
--
ALTER TABLE `notif_barangbaru`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `productbeauty`
--
ALTER TABLE `productbeauty`
  MODIFY `id_beauty` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `productclean`
--
ALTER TABLE `productclean`
  MODIFY `id_clean` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksi_beauty`
--
ALTER TABLE `transaksi_beauty`
  MODIFY `id_orderbeauty` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi_clean`
--
ALTER TABLE `transaksi_clean`
  MODIFY `id_orderclean` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event_delete_user` ON SCHEDULE EVERY 12 MONTH STARTS '2020-04-15 21:48:45' ON COMPLETION NOT PRESERVE ENABLE DO CALL
`nonActiveDataUser`()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
