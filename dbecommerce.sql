-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 03:37 PM
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
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(8) DEFAULT NULL,
  `kota` varchar(8) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `id_user`, `kota`, `jalan`, `kodepos`, `penerima`, `telp`, `status`) VALUES
(1, 'paqsy', 'KOT002', 'Jl. Nin Aja Dulu No. 10', 60243, 'Paqsy', '12345678', 1),
(2, 'paqsy', 'KOT002', 'Jl. Kenangan No. 4', 60232, 'Samsul', '12345678', 0),
(3, 'paqsy', 'KOT007', 'Jl. Jalan Doang no. 6', 60254, 'Udin', '12345678', 0),
(4, 'akun1', 'KOT012', 'Jl. Jalan Mantap no. 2', 54376, 'Samsul', '0123456789', 1),
(46, 'zerostar', 'KOT002', 'jl pangeran diponegoro 63', 23423, 'Max', '015382638826', 1);

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
  `jenis` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(10) NOT NULL,
  `berat (gr)` int(10) NOT NULL,
  `click` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama`, `stock`, `jenis`, `deskripsi`, `harga`, `berat (gr)`, `click`) VALUES
('MA001', 'KA001', 'Coca-Cola', 64, 'drink', 'Minuman Bersoda Coca Cola', 7500, 400, 5),
('MA002', 'KA001', 'Fanta Strawberry', 20, 'drink', 'Minuman Bersoda Rasa strawberry', 7500, 400, 2),
('MA003', 'KA001', 'Fanta grape', 20, 'drink', 'Minuman Bersoda rasa Anggur', 7500, 400, 3),
('MA004', 'KA001', 'Fanta Orange', 20, 'drink', 'Minuman Bersoda rasa jeruk', 7500, 400, 6),
('MA005', 'KA001', 'Ramune Melon', 30, 'drink', 'Minuman Bersoda rasa Melon dengan sensasi jejepangan', 20500, 400, 6),
('MA006', 'KA001', 'Ramune Lemon', 24, 'drink', 'Minuman Bersoda rasa Lemon dengan sensasi jejepangan', 20500, 400, 8),
('MA007', 'KA001', 'Ramune Sakura', 36, 'drink', 'Minuman Bersoda rasa Bunga Sakura dengan sensasi jejepangan', 20500, 400, 1),
('MA008', 'KA001', 'Pepsi', 24, 'drink', 'Minuman Bersoda Pepsi Original', 6500, 550, 7),
('MA009', 'KA001', 'Pepsi Blue', 24, 'drink', 'Minuman Bersoda Pepsi Blue', 6500, 550, 3),
('MA010', 'KA002', 'Aqua 330ml', 48, 'drink', 'Air mineral Aqua dengan ukuran 240ml', 1000, 240, 5),
('MA011', 'KA002', 'Aqua 500ml', 48, 'drink', 'Air mineral Aqua dengan ukuran 330ml', 1500, 330, 10),
('MA012', 'KA002', 'Aqua 1000ml', 48, 'drink', 'Air mineral Aqua dengan ukuran 500ml', 3500, 500, 3),
('MA013', 'KA002', 'Aqua 1500ml', 48, 'drink', 'Air mineral Aqua dengan ukuran 1000ml', 6500, 1000, 0),
('MA014', 'KA002', 'Aqua 240ml', 60, 'drink', 'Air mineral Aqua dengan ukuran 1500ml', 9500, 1500, 1),
('MA015', 'KA003', 'Avocado Juice', 60, 'drink', 'Jus Alpukat dengan topping susu coklat nikmat', 15500, 500, 5),
('MA016', 'KA003', 'Apple juice', 60, 'drink', 'Jus Apel asli dengan campuran susu dan gula yang nikmat', 15500, 500, 4),
('MA017', 'KA003', 'Orange Juice', 60, 'drink', 'Jus Jeruk yang segar', 14000, 500, 1),
('MA018', 'KA003', 'Melon Juice', 60, 'drink', 'Jus Melon yang segar dipadukan dengan susu yang nikmat', 14000, 500, 6),
('MA019', 'KA003', 'Dragonfruit Juice', 60, 'drink', 'Jus  Buah Naga yang segar dipadukan dengan susu yang nikmat', 14000, 500, 9),
('MA020', 'KA003', 'Durian Juice', 60, 'drink', 'Jus Durian yang nikmat diminum kapanpun', 18000, 500, 8),
('MA021', 'KA004', 'Cheese Cake', 36, 'dessert', 'Ini adalah itu', 20000, 500, 3),
('MA022', 'KA004', 'Choco Lava', 36, 'dessert', 'Ini adalah itu', 20000, 500, 17),
('MA023', 'KA004', 'Strawberry Cheese Cake', 36, 'dessert', 'Ini adalah itu', 0, 500, 6),
('MA024', 'KA004', 'Salad', 36, 'dessert', 'Ini adalah itu', 22000, 500, 4),
('MA025', 'KA004', 'Sour Salad with Cotton Candy', 36, 'dessert', 'Ini adalah itu', 29000, 500, 5),
('MA026', 'KA004', 'Sweet Bird Nest', 36, 'dessert', 'Ini adalah itu', 45000, 500, 1),
('MA027', 'KA005', 'Sweet And Sour Pudding With Berries', 36, 'dessert', 'Ini adalah itu', 30000, 500, 7),
('MA028', 'KA005', 'Chocolate Pudding', 36, 'dessert', 'Ini adalah itu', 20000, 500, 8),
('MA029', 'KA005', 'Triple PUDIDI', 36, 'dessert', 'Ini adalah itu', 25000, 500, 6),
('MA030', 'KA005', 'PUDIDI With Vegies', 36, 'dessert', 'Ini adalah itu', 30000, 500, 5),
('MA031', 'KA005', 'Rainbow Fruit PUDIDI', 36, 'dessert', 'Ini adalah itu', 35000, 500, 16),
('MA032', 'KA006', 'Beef Sirloin Steak', 36, 'main dish', 'Ini adalah itu', 99000, 500, 40),
('MA033', 'KA006', 'Beef Tenderloin Steak', 36, 'main dish', 'Ini adalah itu', 99000, 500, 9),
('MA034', 'KA006', 'Rib Eye', 36, 'main dish', 'Ini adalah itu', 120000, 500, 5),
('MA035', 'KA006', 'Premium A5 Sirloin Steak', 36, 'main dish', 'Ini adalah itu', 125000, 500, 12),
('MA036', 'KA006', 'Premium A5 Tenderloin Steak', 36, 'main dish', 'Ini adalah itu', 125000, 500, 7),
('MA037', 'KA006', 'Premium A5 Rib Eye', 36, 'main dish', 'Ini adalah itu', 175000, 500, 3),
('MA038', 'KA006', 'Beef with Black Pepper Sauce ', 36, 'main dish', 'Ini adalah itu', 50000, 500, 5),
('MA039', 'KA007', 'Ayam Saus Mentega', 36, 'main dish', 'Ini adalah itu', 35000, 500, 2),
('MA040', 'KA007', 'Chicken Kaarage', 36, 'main dish', 'Ini adalah itu', 40000, 500, 7),
('MA041', 'KA007', 'Chicken Yakiniku', 36, 'main dish', 'Ini adalah itu', 40000, 500, 5),
('MA042', 'KA007', 'Crispy Chicken', 36, 'main dish', 'Ini adalah itu', 35000, 500, 9),
('MA043', 'KA007', 'Grilled Chicken', 36, 'main dish', 'Ini adalah itu', 40000, 500, 1),
('MA044', 'KA008', 'Chiken Ramen', 36, 'main dish', 'Ini adalah itu', 50000, 500, 4),
('MA045', 'KA008', 'Beef Ramen', 36, 'main dish', 'Ini adalah itu', 60000, 500, 2),
('MA046', 'KA008', 'Pangsit Mie Ayam', 36, 'main dish', 'Ini adalah itu', 25000, 500, 4),
('MA047', 'KA008', 'Pangsit Mie Bakso', 36, 'main dish', 'Ini adalah itu', 30000, 500, 6),
('MA048', 'KA008', 'Mie Ayam biasa', 36, 'main dish', 'Ini adalah itu', 17500, 500, 7),
('MA049', 'KA008', 'Kwetiau Goreng', 36, 'main dish', 'Ini adalah itu', 30000, 500, 3),
('MA050', 'KA007', 'Kwetiau Siram', 36, 'main dish', 'Ini adalah itu', 30000, 500, 8),
('MA051', 'KA008', 'Indomie Goreng + Telur', 100, 'main dish', 'Hanya mie instan dengan telur', 15000, 200, 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_barang`, `quantity`) VALUES
(7, 'stefan', 'MA033', 2),
(14, 'zerostar', 'MA031', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id_chat` varchar(8) NOT NULL,
  `id_chatroom` varchar(8) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `sender` varchar(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_chatroom`, `pesan`, `sender`, `tanggal`, `status`) VALUES
('CH001', 'CR001', 'coba', 'paqsy', '2020-12-01 09:03:56', 1),
('CH002', 'CR001', 'alo', 'paqsy', '2020-12-01 09:07:26', 1),
('CH003', 'CR001', 'alo juga', 'admin', '2020-12-01 09:09:13', 1),
('CH004', 'CR001', 'testing', 'admin', '2020-12-01 09:12:59', 1),
('CH005', 'CR001', 'coba lagi', 'paqsy', '2020-12-01 09:21:11', 1),
('CH006', 'CR001', 'sikat terus', 'paqsy', '2020-12-01 09:21:17', 1),
('CH007', 'CR001', 'ok mantap', 'admin', '2020-12-01 09:22:25', 1),
('CH008', 'CR001', 'lanjutkan', 'admin', '2020-12-01 09:22:31', 1),
('CH009', 'CR001', 'ok bang', 'paqsy', '2020-12-01 09:22:39', 1),
('CH010', 'CR001', 'ini coba chat panjang bang moga aja berhasil', 'paqsy', '2020-12-01 09:30:15', 1),
('CH011', 'CR001', 'mantap gan', 'admin', '2020-12-01 09:31:47', 1),
('CH012', 'CR001', 'tes', 'admin', '2020-12-01 09:51:48', 1),
('CH013', 'CR001', 'alo bang', 'paqsy', '2020-12-01 09:53:52', 1),
('CH014', 'CR001', 'tarek sist', 'admin', '2020-12-01 09:57:39', 1),
('CH015', 'CR001', 'tes', 'paqsy', '2020-12-01 09:59:30', 1),
('CH016', 'CR001', 'coba', 'paqsy', '2020-12-01 10:02:15', 1),
('CH017', 'CR001', 'masuk', 'admin', '2020-12-01 10:02:53', 1),
('CH018', 'CR001', 'bang', 'paqsy', '2020-12-01 10:16:33', 1),
('CH019', 'CR001', 'apa bang', 'admin', '2020-12-01 10:17:08', 1),
('CH020', 'CR001', 'gapapa bang', 'paqsy', '2020-12-01 10:17:50', 1),
('CH021', 'CR001', 'ok bang', 'admin', '2020-12-01 10:17:59', 1),
('CH022', 'CR001', 'alo alo', 'paqsy', '2020-12-01 10:21:06', 1);

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

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`id_chatroom`, `id_user`, `status`) VALUES
('CR001', 'paqsy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtrans`
--

DROP TABLE IF EXISTS `dtrans`;
CREATE TABLE `dtrans` (
  `id_dtrans` int(10) UNSIGNED NOT NULL,
  `id_htrans` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtrans`
--

INSERT INTO `dtrans` (`id_dtrans`, `id_htrans`, `id_barang`, `quantity`, `subtotal`) VALUES
(1, 'TR002', 'MA035', 3, 375000),
(2, 'TR002', 'MA022', 5, 100000),
(3, 'TR002', 'MA015', 3, 46500),
(4, 'TR003', 'MA051', 2, 30000),
(5, 'TR004', 'MA029', 4, 100000),
(6, 'TR005', 'MA034', 2, 240000),
(7, 'TR006', 'MA034', 2, 240000),
(8, 'TR006', 'MA024', 2, 44000),
(9, 'TR007', 'MA032', 1, 99000);

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
  `id_user` varchar(8) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kota` varchar(8) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `diskon` int(11) NOT NULL DEFAULT 0,
  `total` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `htrans`
--

INSERT INTO `htrans` (`id_trans`, `id_user`, `jalan`, `kota`, `penerima`, `telp`, `diskon`, `total`, `status`) VALUES
('TR002', 'paqsy', 'Jl. Nin Aja Dulu No. 10', 'KOT002', 'Paqsy', '12345678', 0, 521500, 0),
('TR003', 'akun1', 'Jl. Jalan Mantap no. 2', 'KOT012', 'Samsul', '0123456789', 50, 30000, 0),
('TR004', 'akun1', 'Jl. Jalan Mantap no. 2', 'KOT012', 'Samsul', '0123456789', 0, 100000, 0),
('TR005', 'guest', 'Jl. Jalan Kemana no. 10', 'KOT011', 'Budi', '0123456789', 0, 240000, 0),
('TR006', 'guest', 'Jl. Jalan Kemana no. 10', 'KOT011', 'Budi', '0123456789', 0, 284000, 0),
('TR007', 'zerostar', 'jl pangeran diponegoro 63', 'KOT002', 'Max', '015382638826', 0, 99000, 0);

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

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama`) VALUES
('KOT001', 'PROV008', 'Jakarta'),
('KOT002', 'PROV010', 'Surabaya'),
('KOT003', 'PROV004', 'Medan'),
('KOT004', 'PROV007', 'Bandung'),
('KOT005', 'PROV012', 'Makassar'),
('KOT006', 'PROV009', 'Semarang'),
('KOT007', 'PROV005', 'Palembang'),
('KOT008', 'PROV006', 'Bandar Lampung'),
('KOT009', 'PROV003', 'Batam'),
('KOT010', 'PROV002', 'Pekanbaru'),
('KOT011', 'PROV001', 'Padang'),
('KOT012', 'PROV010', 'Malang');

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
  `syarat_promo` varchar(255) NOT NULL,
  `kategori_promo` varchar(255) NOT NULL,
  `minimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `potongan_harga`, `detail`, `syarat_promo`, `kategori_promo`, `minimal`) VALUES
('PR001', 'Diskon 20% untuk Pengguna Baru', 20, 'Pengguna yang baru mendaftarkan diri akan dapat diskon sebesar 20% untuk 2x pemesanan. Minimal pembelian Rp30rb.', 'Minimal pembelian Rp 30.000, Berlaku untuk pengguna baru', 'new user', 30000),
('PR002', 'Diskon Murah Meriah 40%', 40, 'Nikmati diskon sebesar 40% untuk minimal pembelian Rp55rb!', 'Minimal pembelian Rp 55.000, Berlaku untuk semua jenis menu', 'all', 55000),
('PR003', 'Diskon Membahana 50%', 50, 'Nikmati diskon membahana sebesar 50% untuk minimal pembelian seharga Rp100rb!', 'Minimal pembelian Rp 100.000, Berlaku untuk semua jenis menu', 'all', 100000),
('PR004', 'Promo Kejut Rayakan Halloween 45%', 45, 'Dalam rangka Halloween, Rasakan Potongan Harga Mengejutkan sebesar 45% untuk minimal pembelian seharga Rp70rb!', 'Minimal pembelian Rp 70.000, Berlaku untuk semua jenis menu', 'all', 70000),
('PR005', 'Diskon Dessert 20%', 20, 'Ini diskon untuk dessert saja', 'Minimal pembelian Rp 15.000, Hanya untuk jenis makanan dessert saja', 'dessert', 15000),
('PR006', 'Promo Hari Pahlawan 50%', 50, 'Nikmati hari pahlawan dengan makanan yang berlimpah dengan diskon 50% khusus menu main dish apa saja!', 'Minimal pembelian Rp 30.000, Berlaku untuk menu main dish saja', 'main dish', 30000),
('PR007', 'Promo 50% Semua Makanan Khusus Pengguna Baru', 50, 'Nikmati diskon 50% untuk semua jenis makanan, khusus pengguna baru', 'Minimal pembelian Rp 20.000, berlaku untuk semua jenis makanan', 'new user', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi` (
  `id_provinsi` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama`) VALUES
('PROV001', 'Sumatra Barat'),
('PROV002', 'Riau'),
('PROV003', 'Kepulauan Riau'),
('PROV004', 'Sumatra Utara'),
('PROV005', 'Sumatra Selatan'),
('PROV006', 'Lampung'),
('PROV007', 'Jawa Barat'),
('PROV008', 'DKI Jakarta'),
('PROV009', 'Jawa Tengah'),
('PROV010', 'Jawa Timur'),
('PROV011', 'Sulawesi Utara'),
('PROV012', 'Sulawesi Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `id_dtrans` varchar(8) NOT NULL,
  `rating` int(5) NOT NULL,
  `pesan` varchar(500) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_barang`, `id_dtrans`, `rating`, `pesan`) VALUES
(1, 'zerostar', 'MA032', '9', 4, 'assa');

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
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `notelp`) VALUES
('akun1', 'Akun1', 'akun1@example.test', '$2y$10$SSoLeUMwJPldUy33a9ApB.y0YCEVM17Iw0T2HqFQBJvFnGCrmTrnS', '12345678'),
('paqsy', 'Paqsy Jalasukma', 'paqsy@gmail.com', '$2y$10$L9hUOQHB2XVMKkPVlMSalOYYVZ22nQaJliHAYkv.tU1/f4Qw6c0q6', '1234567890'),
('stefan', 'stefan', 'stefan@gmail.com', '$2y$10$heyPHzNScFJNR0Ei44o0.uilqLP54TqxUkv8Gtgkb3L1QFKdeoXF6', '123123'),
('zerostar', 'Maximillianus H', 'maximillianhermawan@gmail.com', '$2y$10$BlrHl9aVrtBSSmbb4wckBehfVBnWp7R5FIkOgwb0nxLnfyDatBt5m', '081230182354');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dtrans`
--
ALTER TABLE `dtrans`
  MODIFY `id_dtrans` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
