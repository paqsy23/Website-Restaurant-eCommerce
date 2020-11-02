/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - dbecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbecommerce`;

/*Table structure for table `alamat` */

DROP TABLE IF EXISTS `alamat`;

CREATE TABLE `alamat` (
  `id_user` varchar(8) NOT NULL,
  `kota` varchar(8) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kodepos` int(10) NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `kota` (`kota`),
  CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `alamat_ibfk_2` FOREIGN KEY (`kota`) REFERENCES `kota` (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alamat` */

/*Table structure for table `barang` */

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
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`id_kategori`,`nama`,`stock`,`jenis`,`deskripsi`,`harga`,`berat (gr)`,`status`) values 
('MA001','KA001','Coca-Cola',64,'drink','Minuman Bersoda Coca Cola',7500,400,1),
('MA002','KA001','Fanta Strawberry',20,'drink','Minuman Bersoda Rasa strawberry',7500,400,1),
('MA003','KA001','Fanta grape',20,'drink','Minuman Bersoda rasa Anggur',7500,400,1),
('MA004','KA001','Fanta Orange',20,'drink','Minuman Bersoda rasa jeruk',7500,400,1),
('MA005','KA001','Ramune Melon',30,'drink','Minuman Bersoda rasa Melon dengan sensasi jejepangan',20500,400,1),
('MA006','KA001','Ramune Lemon',24,'drink','Minuman Bersoda rasa Lemon dengan sensasi jejepangan',20500,400,1),
('MA007','KA001','Ramune Sakura',36,'drink','Minuman Bersoda rasa Bunga Sakura dengan sensasi jejepangan',20500,400,1),
('MA008','KA001','Pepsi',24,'drink','Minuman Bersoda Pepsi Original',6500,550,1),
('MA009','KA001','Pepsi Blue',24,'drink','Minuman Bersoda Pepsi Blue',6500,550,1),
('MA010','KA002','Aqua 330ml',48,'drink','Air mineral Aqua dengan ukuran 240ml',1000,240,1),
('MA011','KA002','Aqua 500ml',48,'drink','Air mineral Aqua dengan ukuran 330ml',1500,330,1),
('MA012','KA002','Aqua 1000ml',48,'drink','Air mineral Aqua dengan ukuran 500ml',3500,500,1),
('MA013','KA002','Aqua 1500ml',48,'drink','Air mineral Aqua dengan ukuran 1000ml',6500,1000,1),
('MA014','KA002','Aqua 240ml',60,'drink','Air mineral Aqua dengan ukuran 1500ml',9500,1500,1),
('MA015','KA003','Avocado Juice',60,'drink','Jus Alpukat dengan topping susu coklat nikmat',15500,500,1),
('MA016','KA003','Apple juice',60,'drink','Jus Apel asli dengan campuran susu dan gula yang nikmat',15500,500,1),
('MA017','KA003','Orange Juice',60,'drink','Jus Jeruk yang segar',14000,500,1),
('MA018','KA003','Melon Juice',60,'drink','Jus Melon yang segar dipadukan dengan susu yang nikmat',14000,500,1),
('MA019','KA003','Dragonfruit Juice',60,'drink','Jus  Buah Naga yang segar dipadukan dengan susu yang nikmat',14000,500,1),
('MA020','KA003','Durian Juice',60,'drink','Jus Durian yang nikmat diminum kapanpun',18000,500,1),
('MA021','KA004','Cheese Cake',36,'dessert','Ini adalah itu',20000,500,1),
('MA022','KA004','Choco Lava',36,'dessert','Ini adalah itu',20000,500,1),
('MA023','KA004','Strawberry Cheese Cake',36,'dessert','Ini adalah itu',0,500,1),
('MA024','KA004','Salad',36,'dessert','Ini adalah itu',22000,500,1),
('MA025','KA004','Sour Salad with Cotton Candy',36,'dessert','Ini adalah itu',29000,500,1),
('MA026','KA004','Sweet Bird Nest',36,'dessert','Ini adalah itu',45000,500,1),
('MA027','KA005','Sweet And Sour Pudding With Berries',36,'dessert','Ini adalah itu',30000,500,1),
('MA028','KA005','Chocolate Pudding',36,'dessert','Ini adalah itu',20000,500,1),
('MA029','KA005','Triple PUDIDI',36,'dessert','Ini adalah itu',25000,500,1),
('MA030','KA005','PUDIDI With Vegies',36,'dessert','Ini adalah itu',30000,500,1),
('MA031','KA005','Rainbow Fruit PUDIDI',36,'dessert','Ini adalah itu',35000,500,1),
('MA032','KA006','Beef Sirloin Steak',36,'main dish','Ini adalah itu',99000,500,1),
('MA033','KA006','Beef Tenderloin Steak',36,'main dish','Ini adalah itu',99000,500,1),
('MA034','KA006','Rib Eye',36,'main dish','Ini adalah itu',120000,500,1),
('MA035','KA006','Premium A5 Sirloin Steak',36,'main dish','Ini adalah itu',125000,500,1),
('MA036','KA006','Premium A5 Tenderloin Steak',36,'main dish','Ini adalah itu',125000,500,1),
('MA037','KA006','Premium A5 Rib Eye',36,'main dish','Ini adalah itu',175000,500,1),
('MA038','KA006','Beef with Black Pepper Sauce ',36,'main dish','Ini adalah itu',50000,500,1),
('MA039','KA007','Ayam Saus Mentega',36,'main dish','Ini adalah itu',35000,500,1),
('MA040','KA007','Chicken Kaarage',36,'main dish','Ini adalah itu',40000,500,1),
('MA041','KA007','Chicken Yakiniku',36,'main dish','Ini adalah itu',40000,500,1),
('MA042','KA007','Crispy Chicken',36,'main dish','Ini adalah itu',35000,500,1),
('MA043','KA007','Grilled Chicken',36,'main dish','Ini adalah itu',40000,500,1),
('MA044','KA008','Chiken Ramen',36,'main dish','Ini adalah itu',50000,500,1),
('MA045','KA008','Beef Ramen',36,'main dish','Ini adalah itu',60000,500,1),
('MA046','KA008','Pangsit Mie Ayam',36,'main dish','Ini adalah itu',25000,500,1),
('MA047','KA008','Pangsit Mie Bakso',36,'main dish','Ini adalah itu',30000,500,1),
('MA048','KA008','Mie Ayam biasa',36,'main dish','Ini adalah itu',17500,500,1),
('MA049','KA008','Kwetiau Goreng',36,'main dish','Ini adalah itu',30000,500,1),
('MA050','KA007','Kwetiau Siram',36,'main dish','Ini adalah itu',30000,500,1);

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id_barang` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id_chat` varchar(8) NOT NULL,
  `id_chatroom` varchar(8) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `id_chatroom` (`id_chatroom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chat` */

/*Table structure for table `chatroom` */

DROP TABLE IF EXISTS `chatroom`;

CREATE TABLE `chatroom` (
  `id_chatroom` varchar(8) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id_chatroom`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chatroom` */

/*Table structure for table `dtrans` */

DROP TABLE IF EXISTS `dtrans`;

CREATE TABLE `dtrans` (
  `id_dtrans` varchar(8) NOT NULL,
  `id_htrans` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `quantity` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  PRIMARY KEY (`id_dtrans`),
  KEY `id_barang` (`id_barang`),
  KEY `id_htrans` (`id_htrans`),
  CONSTRAINT `dtrans_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `dtrans_ibfk_2` FOREIGN KEY (`id_htrans`) REFERENCES `htrans` (`id_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dtrans` */

/*Table structure for table `gambar_barang` */

DROP TABLE IF EXISTS `gambar_barang`;

CREATE TABLE `gambar_barang` (
  `id_gambar` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  PRIMARY KEY (`id_gambar`),
  CONSTRAINT `gambar_barang_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `barang` (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gambar_barang` */

/*Table structure for table `h_dtrans` */

DROP TABLE IF EXISTS `h_dtrans`;

CREATE TABLE `h_dtrans` (
  `id_htrans` varchar(8) NOT NULL,
  `id_trans` varchar(8) NOT NULL,
  `id_user_pembeli` varchar(8) NOT NULL,
  `nama_ekspedisi` varchar(255) NOT NULL,
  `harga_ekspedisi` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(10) NOT NULL,
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id_htrans`),
  KEY `id_user_pembeli` (`id_user_pembeli`),
  KEY `id_trans` (`id_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `h_dtrans` */

/*Table structure for table `htrans` */

DROP TABLE IF EXISTS `htrans`;

CREATE TABLE `htrans` (
  `id_trans` varchar(8) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(4) NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `htrans` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama`) values 
('KA001','Softdrink'),
('KA002','Mineral Water'),
('KA003','Juice'),
('KA004','Cake'),
('KA005','Pudding'),
('KA006','Beef'),
('KA007','Chicken'),
('KA008','Noodle');

/*Table structure for table `kota` */

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `id_kota` varchar(8) NOT NULL,
  `id_provinsi` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kota`),
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kota` */

/*Table structure for table `promo` */

DROP TABLE IF EXISTS `promo`;

CREATE TABLE `promo` (
  `id_promo` varchar(8) NOT NULL,
  `nama_promo` varchar(50) NOT NULL,
  `potongan_harga` int(10) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `syarat_promo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `promo` */

/*Table structure for table `provinsi` */

DROP TABLE IF EXISTS `provinsi`;

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `provinsi` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id_review` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `id_dtrans` varchar(8) NOT NULL,
  `rating` int(5) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_barang` (`id_barang`),
  KEY `id_dtrans` (`id_dtrans`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `review` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notelp` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`email`,`password`,`notelp`) values 
('paqsy','Paqsy Jalasukma','paqsy@gmail.com','$2y$10$L9hUOQHB2XVMKkPVlMSalOYYVZ22nQaJliHAYkv.tU1/f4Qw6c0q6',1234567890),
('stefan','stefan','stefan@gmail.com','$2y$10$heyPHzNScFJNR0Ei44o0.uilqLP54TqxUkv8Gtgkb3L1QFKdeoXF6',123123);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
