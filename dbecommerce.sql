-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 09:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecommerce`
--
CREATE DATABASE IF NOT EXISTS `dbecommerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

DROP TABLE IF EXISTS `alamat`;
CREATE TABLE `alamat` (
  `id_user` varchar(8) NOT NULL,
  `kota` varchar(8) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kodepos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` varchar(8) NOT NULL,
  `id_kategori` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stock` int(10) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(10) NOT NULL,
  `berat (gr)` int(10) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama`, `stock`, `deskripsi`, `harga`, `berat (gr)`, `status`) VALUES
('BA001', 'KA001', 'Coca-Cola', 64, 'Minuman Bersoda Coca Cola', 7500, 400, 1),
('BA002', 'KA001', 'Fanta Strawberry', 20, 'Minuman Bersoda Rasa strawberry', 7500, 400, 1),
('BA003', 'KA001', 'Fanta grape', 20, 'Minuman Bersoda rasa Anggur', 7500, 400, 1),
('BA004', 'KA001', 'Fanta Orange', 20, 'Minuman Bersoda rasa jeruk', 7500, 400, 1),
('BA005', 'KA001', 'Ramune Melon', 30, 'Minuman Bersoda rasa Melon dengan sensasi jejepangan', 20500, 400, 1),
('BA006', 'KA001', 'Ramune Lemon', 24, 'Minuman Bersoda rasa Lemon dengan sensasi jejepangan', 20500, 400, 1),
('BA007', 'KA001', 'Ramune Sakura', 36, 'Minuman Bersoda rasa Bunga Sakura dengan sensasi jejepangan', 20500, 400, 1),
('BA008', 'KA001', 'Pepsi', 24, 'Minuman Bersoda Pepsi Original', 6500, 550, 1),
('BA009', 'KA001', 'Pepsi Blue', 24, 'Minuman Bersoda Pepsi Blue', 6500, 550, 1),
('BA010', 'KA002', 'Aqua 330ml', 48, 'Air mineral Aqua dengan ukuran 240ml', 1000, 240, 1),
('BA011', 'KA002', 'Aqua 500ml', 48, 'Air mineral Aqua dengan ukuran 330ml', 1500, 330, 1),
('BA012', 'KA002', 'Aqua 1000ml', 48, 'Air mineral Aqua dengan ukuran 500ml', 3500, 500, 1),
('BA013', 'KA002', 'Aqua 1500ml', 48, 'Air mineral Aqua dengan ukuran 1000ml', 6500, 1000, 1),
('BA014', 'KA002', 'Aqua 240ml', 60, 'Air mineral Aqua dengan ukuran 1500ml', 9500, 1500, 1),
('BA015', 'KA003', 'Avocado Juice', 60, 'Jus Alpukat dengan topping susu coklat nikmat', 15500, 500, 1),
('BA016', 'KA003', 'Apple juice', 60, 'Jus Apel asli dengan campuran susu dan gula yang nikmat', 15500, 500, 1),
('BA017', 'KA003', 'Orange Juice', 60, 'Jus Jeruk yang segar', 14000, 500, 1),
('BA018', 'KA003', 'Melon Juice', 60, 'Jus Melon yang segar dipadukan dengan susu yang nikmat', 14000, 500, 1),
('BA019', 'KA003', 'Dragonfruit Juice', 60, 'Jus  Buah Naga yang segar dipadukan dengan susu yang nikmat', 14000, 500, 1),
('BA020', 'KA003', 'Durian Juice', 60, 'Jus Durian yang nikmat diminum kapanpun', 18000, 500, 1),
('BA021', 'KA004', 'Cheese Cake', 36, 'Ini adalah itu', 20000, 500, 1),
('BA022', 'KA004', 'Choco Lava', 36, 'Ini adalah itu', 20000, 500, 1),
('BA023', 'KA004', 'Strawberry Cheese Cake', 36, 'Ini adalah itu', 0, 500, 1),
('BA024', 'KA004', 'Salad', 36, 'Ini adalah itu', 22000, 500, 1),
('BA025', 'KA004', 'Sour Salad with Cotton Candy', 36, 'Ini adalah itu', 29000, 500, 1),
('BA026', 'KA004', 'Sweet Bird Nest', 36, 'Ini adalah itu', 45000, 500, 1),
('BA027', 'KA005', 'Sweet And Sour Pudding With Berries', 36, 'Ini adalah itu', 30000, 500, 1),
('BA028', 'KA005', 'Chocolate Pudding', 36, 'Ini adalah itu', 20000, 500, 1),
('BA029', 'KA005', 'Triple PUDIDI', 36, 'Ini adalah itu', 25000, 500, 1),
('BA030', 'KA005', 'PUDIDI With Vegies', 36, 'Ini adalah itu', 30000, 500, 1),
('BA031', 'KA005', 'Rainbow Fruit PUDIDI', 36, 'Ini adalah itu', 35000, 500, 1),
('BA032', 'KA006', 'Beef Sirloin Steak', 36, 'Ini adalah itu', 99000, 500, 1),
('BA033', 'KA006', 'Beef Tenderloin Steak', 36, 'Ini adalah itu', 99000, 500, 1),
('BA034', 'KA006', 'Rib Eye', 36, 'Ini adalah itu', 120000, 500, 1),
('BA035', 'KA006', 'Premium A5 Sirloin Steak', 36, 'Ini adalah itu', 125000, 500, 1),
('BA036', 'KA006', 'Premium A5 Tenderloin Steak', 36, 'Ini adalah itu', 125000, 500, 1),
('BA037', 'KA006', 'Premium A5 Rib Eye', 36, 'Ini adalah itu', 175000, 500, 1),
('BA038', 'KA006', 'Beef with Black Pepper Sauce ', 36, 'Ini adalah itu', 50000, 500, 1),
('BA039', 'KA007', 'Ayam Saus Mentega', 36, 'Ini adalah itu', 35000, 500, 1),
('BA040', 'KA007', 'Chicken Kaarage', 36, 'Ini adalah itu', 40000, 500, 1),
('BA041', 'KA007', 'Chicken Yakiniku', 36, 'Ini adalah itu', 40000, 500, 1),
('BA042', 'KA007', 'Crispy Chicken', 36, 'Ini adalah itu', 35000, 500, 1),
('BA043', 'KA007', 'Grilled Chicken', 36, 'Ini adalah itu', 40000, 500, 1),
('BA044', 'KA008', 'Chiken Ramen', 36, 'Ini adalah itu', 50000, 500, 1),
('BA045', 'KA008', 'Beef Ramen', 36, 'Ini adalah itu', 60000, 500, 1),
('BA046', 'KA008', 'Pangsit Mie Ayam', 36, 'Ini adalah itu', 25000, 500, 1),
('BA047', 'KA008', 'Pangsit Mie Bakso', 36, 'Ini adalah itu', 30000, 500, 1),
('BA048', 'KA008', 'Mie Ayam biasa', 36, 'Ini adalah itu', 17500, 500, 1),
('BA049', 'KA008', 'Kwetiau Goreng', 36, 'Ini adalah itu', 30000, 500, 1),
('BA050', 'KA007', 'Kwetiau Siram', 36, 'Ini adalah itu', 30000, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id_barang` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `pesan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id_chat` varchar(8) NOT NULL,
  `id_chatroom` varchar(8) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

DROP TABLE IF EXISTS `chatroom`;
CREATE TABLE `chatroom` (
  `id_chatroom` varchar(8) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dtrans`
--

DROP TABLE IF EXISTS `dtrans`;
CREATE TABLE `dtrans` (
  `id_dtrans` varchar(8) NOT NULL,
  `id_htrans` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `pesan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_barang`
--

DROP TABLE IF EXISTS `gambar_barang`;
CREATE TABLE `gambar_barang` (
  `id_gambar` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `htrans`
--

DROP TABLE IF EXISTS `htrans`;
CREATE TABLE `htrans` (
  `id_trans` varchar(8) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `h_dtrans`
--

DROP TABLE IF EXISTS `h_dtrans`;
CREATE TABLE `h_dtrans` (
  `id_htrans` varchar(8) NOT NULL,
  `id_trans` varchar(8) NOT NULL,
  `id_user_pembeli` varchar(8) NOT NULL,
  `nama_ekspedisi` varchar(255) NOT NULL,
  `harga_ekspedisi` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(10) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
('KA001', 'Softdrink'),
('KA002', 'Mineral Water'),
('KA003', 'Juice'),
('KA004', 'Cake'),
('KA005', 'Pudding'),
('KA006', 'Beef'),
('KA007', 'Chicken'),
('KA008', 'Noodle');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `id_kota` varchar(8) NOT NULL,
  `id_provinsi` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE `promo` (
  `id_promo` varchar(8) NOT NULL,
  `nama_promo` varchar(50) NOT NULL,
  `potongan_harga` int(10) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `syarat_promo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi` (
  `id_provinsi` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id_review` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `id_dtrans` varchar(8) NOT NULL,
  `rating` int(5) NOT NULL,
  `pesan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notelp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `notelp`) VALUES
('stefan', 'stefan', 'stefan@gmail.com', '$2y$10$heyPHzNScFJNR0Ei44o0.uilqLP54TqxUkv8Gtgkb3L1QFKdeoXF6', 123123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kota` (`kota`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_chatroom` (`id_chatroom`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`id_chatroom`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dtrans`
--
ALTER TABLE `dtrans`
  ADD PRIMARY KEY (`id_dtrans`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_htrans` (`id_htrans`);

--
-- Indexes for table `gambar_barang`
--
ALTER TABLE `gambar_barang`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `h_dtrans`
--
ALTER TABLE `h_dtrans`
  ADD PRIMARY KEY (`id_htrans`),
  ADD KEY `id_user_pembeli` (`id_user_pembeli`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_dtrans` (`id_dtrans`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `alamat_ibfk_2` FOREIGN KEY (`kota`) REFERENCES `kota` (`id_kota`);

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `dtrans`
--
ALTER TABLE `dtrans`
  ADD CONSTRAINT `dtrans_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `dtrans_ibfk_2` FOREIGN KEY (`id_htrans`) REFERENCES `htrans` (`id_trans`);

--
-- Constraints for table `gambar_barang`
--
ALTER TABLE `gambar_barang`
  ADD CONSTRAINT `gambar_barang_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
