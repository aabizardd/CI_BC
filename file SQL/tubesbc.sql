-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 07:03 AM
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
-- Database: `tubesbc`
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
(40, 6, 12, 'Beauty Banget', 20000, 'haha', 'haha', '606dcd9b8ed48.png', 'haha', 'Ada Yang Baru Dari Product Beauty');

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
  `tipe_product` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productbeauty`
--

INSERT INTO `productbeauty` (`id_beauty`, `id_pjasa`, `nama_beauty`, `harga_beauty`, `desc_beauty`, `descmini_beauty`, `gambar_beauty`, `tipe_product`) VALUES
(6, 12, 'Beauty Banget', 20000, 'haha', 'haha', '606dcd9b8ed48.png', 'haha');

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
  `tipe_product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productclean`
--

INSERT INTO `productclean` (`id_clean`, `id_pjasa`, `nama_clean`, `harga_clean`, `desc_clean`, `descmini_clean`, `gambar_clean`, `tipe_product`) VALUES
(1, 8, 'Masker muka enak banget', 200000, 'asdasdas', 'aadsa', '606db0e605eb9.png', 'kost');

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
  `nomor_pengorder` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `rating` double NOT NULL,
  `status` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nomor_pengorder` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(12) NOT NULL,
  `rating` double NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_clean`
--

INSERT INTO `transaksi_clean` (`id_orderclean`, `id_clean`, `id_user`, `namapengorder`, `alamat_pengorder`, `nomor_pengorder`, `jumlah`, `total_harga`, `rating`, `status`) VALUES
(3, 1, 11, 'asd', 'aasdsa', '12321312321', 1, 200000, 4.5, 1),
(4, 1, 11, 'asd', 'aasdsa', '12321312321', 1, 200000, 5, 1);

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
('0000-00-00', 7, 'admin', 'admin', 'admin@mail.com', '$2y$10$gDj7aEptY7lN9Dz0JjX1yeGMXmLTMLlC3OfCCVHYwACOkZe2JfN1q', 'default.png', 'admin', 1, 'bandung', '0872123435'),
('2021-04-06', 8, 'Clean n Care', 'pencari', 'm.abizard1123@gmail.com', '$2y$10$rwDMEOJH4Bwn/mhtSzNVtO9BBVdmWronKZoXSc0edmuOyUrT.YrYG', 'default.png', 'Clean', 1, 'Taman Sari Persada, Cluster Lotus B4/12A', '081386397855'),
('2021-04-06', 11, 'asd', 'aaa', 'abizard@student.telkomuniversity.ac.id', '$2y$10$gDj7aEptY7lN9Dz0JjX1yeGMXmLTMLlC3OfCCVHYwACOkZe2JfN1q', 'default.png', 'Konsumen', 1, 'aasdsa', '12321312321'),
('2021-04-07', 12, 'Klinik Beauty Care Mas Gondrong', 'beauty_masgon', 'apajaa@gmail.com', '$2y$10$tZiV/YmfzDsliYF1DyajiuWBs5KkvVRJ.KNs3C1KKnzanO73Rsj7m', 'default.png', 'Beauty', 1, 'Bandung', 'apajaa@gmail.co');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notif_barangbaru`
--
ALTER TABLE `notif_barangbaru`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `productbeauty`
--
ALTER TABLE `productbeauty`
  MODIFY `id_beauty` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productclean`
--
ALTER TABLE `productclean`
  MODIFY `id_clean` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_beauty`
--
ALTER TABLE `transaksi_beauty`
  MODIFY `id_orderbeauty` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_clean`
--
ALTER TABLE `transaksi_clean`
  MODIFY `id_orderclean` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
