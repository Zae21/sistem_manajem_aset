/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.29-0ubuntu0.16.04.1 : Database - dp_ims
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dp_ims` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dp_ims`;

/*Table structure for table `asset` */

DROP TABLE IF EXISTS `asset`;

CREATE TABLE `asset` (
  `id_asset` varchar(50) NOT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `id_jenis_asset` varchar(50) DEFAULT NULL,
  `id_kategori_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` enum('Tersedia','Rusak','Maintenance') DEFAULT NULL,
  PRIMARY KEY (`id_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `asset` */

insert  into `asset`(`id_asset`,`nama_asset`,`id_jenis_asset`,`id_kategori_asset`,`jumlah`,`status`) values 
('ASST-1910-0001','Mobil','HRG-1910-0001','KTG-1910-0001',5,'Tersedia'),
('ASST-1910-0002','Gedung A','HRG-1910-0004','KTG-1910-0002',2,'Tersedia');

/*Table structure for table `det_inventarisasi` */

DROP TABLE IF EXISTS `det_inventarisasi`;

CREATE TABLE `det_inventarisasi` (
  `id_det_inventarisasi` varchar(50) NOT NULL,
  `id_inventarisasi` varchar(50) DEFAULT NULL,
  `id_pengajuan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_inventarisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_inventarisasi` */

/*Table structure for table `det_pengadaan` */

DROP TABLE IF EXISTS `det_pengadaan`;

CREATE TABLE `det_pengadaan` (
  `id_det_pengadaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengadaan` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_pengadaan` double DEFAULT NULL,
  `harga_realisasi` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  PRIMARY KEY (`id_det_pengadaan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `det_pengadaan` */

insert  into `det_pengadaan`(`id_det_pengadaan`,`id_pengadaan`,`nama_asset`,`jumlah`,`harga_pengadaan`,`harga_realisasi`,`total_harga`) values 
(1,'TRPD19110001','Data Tester2. ',3,NULL,20000,1),
(2,'TRPD19110001','Data Tester. ',2,NULL,30000,2),
(3,'TRPD19110002','Data Tester2. ',3,NULL,2000,1),
(4,'TRPD19110002','Data Tester. ',2,NULL,3000,2),
(5,'TRPD19110003','Tester3. ',3,NULL,150000,1),
(6,'TRPD19110003','Tester2. ',5,NULL,100000,1),
(7,'TRPD19110003','Tester. ',2,NULL,100000,5),
(8,'TRPD19110004','Data Tester2. ',3,15000,10000,5),
(9,'TRPD19110004','Data Tester. ',2,10000,10000,0);

/*Table structure for table `det_pengelolaan` */

DROP TABLE IF EXISTS `det_pengelolaan`;

CREATE TABLE `det_pengelolaan` (
  `id_det_pengelolaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengelolaan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_pengelolaan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `det_pengelolaan` */

insert  into `det_pengelolaan`(`id_det_pengelolaan`,`id_pengelolaan`,`id_asset`,`jumlah`) values 
(1,NULL,'ASST-1910-0001',2),
(2,NULL,'ASST-1910-0002',2),
(3,NULL,'ASST-1910-0001',2),
(4,NULL,'ASST-1910-0002',2),
(5,NULL,'ASST-1910-0002',1),
(6,'T','ASST-1910-0002',2),
(7,'P','ASST-1910-0002',2),
(8,'TPL19110007','ASST-1910-0002',2),
(9,'TPL19110007','ASST-1910-0001',3);

/*Table structure for table `det_penghapusan` */

DROP TABLE IF EXISTS `det_penghapusan`;

CREATE TABLE `det_penghapusan` (
  `id_det_penghapusan` varchar(50) NOT NULL,
  `id_penghapusan` varchar(50) DEFAULT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis_hapus` varchar(50) DEFAULT NULL,
  `nilai_asset` double DEFAULT NULL,
  PRIMARY KEY (`id_det_penghapusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `det_penghapusan` */

/*Table structure for table `det_perencanaan` */

DROP TABLE IF EXISTS `det_perencanaan`;

CREATE TABLE `det_perencanaan` (
  `id_det_perencanaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_perencanaan` varchar(50) DEFAULT NULL,
  `id_kategori_asset` varchar(50) DEFAULT NULL,
  `id_jenis_asset` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  PRIMARY KEY (`id_det_perencanaan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `det_perencanaan` */

insert  into `det_perencanaan`(`id_det_perencanaan`,`id_perencanaan`,`id_kategori_asset`,`id_jenis_asset`,`nama_asset`,`jumlah`,`harga`,`total_harga`) values 
(1,'TRP19110001','KTG-1910-0002','HRG-1910-0001','sadasd',3,NULL,20000),
(2,'TRP19110001','KTG-1910-0002','HRG-1910-0001','wqeqeqw',NULL,NULL,450000),
(3,'TRP19110002','KTG-1910-0001','HRG-1910-0001','dadasda',3,NULL,20000),
(4,'TRP19110002','KTG-1910-0002','HRG-1910-0001','hdhfddfh',NULL,NULL,45000),
(5,'TRP19110003','KTG-1910-0001','HRG-1910-0002','asdada',3,10000,30000),
(6,'TRP19110003','KTG-1910-0002','HRG-1910-0002','fgdfgdfgfd',5,10000,50000),
(7,'TRP19110004','KTG-1910-0001','HRG-1910-0001','Data Tester. ',2,10000,20000),
(8,'TRP19110004','KTG-1910-0001','HRG-1910-0003','Data Tester2. ',3,15000,45000),
(9,'TRP19110005','KTG-1910-0001','HRG-1910-0004','Tester. ',2,5000,10000),
(10,'TRP19110005','KTG-1910-0002','HRG-1910-0001','Tester2. ',5,10000,50000),
(11,'TRP19110005','KTG-1910-0002','HRG-1910-0001','Tester3. ',3,15000,45000);

/*Table structure for table `inventarisasi` */

DROP TABLE IF EXISTS `inventarisasi`;

CREATE TABLE `inventarisasi` (
  `id_inventarisasi` varchar(50) NOT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `id_pengajuan` varchar(50) DEFAULT NULL,
  `status` enum('Sudah Diinput','Belum Diinput') DEFAULT NULL,
  PRIMARY KEY (`id_inventarisasi`),
  CONSTRAINT `inventarisasi_ibfk_1` FOREIGN KEY (`id_inventarisasi`) REFERENCES `det_inventarisasi` (`id_det_inventarisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inventarisasi` */

/*Table structure for table `jenis_asset` */

DROP TABLE IF EXISTS `jenis_asset`;

CREATE TABLE `jenis_asset` (
  `id_jenis_asset` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenis_asset` */

insert  into `jenis_asset`(`id_jenis_asset`,`nama_jenis`) values 
('HRG-1910-0001','Peralatan'),
('HRG-1910-0002','Perlengkapan'),
('HRG-1910-0003','Kendaraan'),
('HRG-1910-0004','Gedung/Bangunan'),
('HRG-1910-0005','Tanah'),
('HRG-1910-0006','Lain - Lain');

/*Table structure for table `kategori_asset` */

DROP TABLE IF EXISTS `kategori_asset`;

CREATE TABLE `kategori_asset` (
  `id_kategori_asset` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_asset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_asset` */

insert  into `kategori_asset`(`id_kategori_asset`,`nama_kategori`) values 
('KTG-1910-0001','Asset Bergerak'),
('KTG-1910-0002','Asset Tak Bergerak');

/*Table structure for table `nilai_penyusutan` */

DROP TABLE IF EXISTS `nilai_penyusutan`;

CREATE TABLE `nilai_penyusutan` (
  `id_nilai_penyusutan` varchar(50) NOT NULL,
  `id_asset` varchar(50) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `nilai_penyusutan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_penyusutan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `nilai_penyusutan` */

insert  into `nilai_penyusutan`(`id_nilai_penyusutan`,`id_asset`,`umur`,`nilai_penyusutan`) values 
('NPS-0001','ASST-1910-0001','2','2'),
('NPS-0002','ASST-1910-0002','2','5');

/*Table structure for table `pengadaan` */

DROP TABLE IF EXISTS `pengadaan`;

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(50) NOT NULL,
  `tgl_pengadaan` date DEFAULT NULL,
  `tgl_perencanaan` date DEFAULT NULL,
  `total_harga_diajukan` double DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengadaan` */

insert  into `pengadaan`(`id_pengadaan`,`tgl_pengadaan`,`tgl_perencanaan`,`total_harga_diajukan`,`total_harga`,`id_user`) values 
('TRPD19110001','2019-11-06','2019-11-04',65000,120000,'1'),
('TRPD19110002','2019-11-06','2019-11-04',65000,12000,'1'),
('TRPD19110003','2019-11-12','2019-11-04',105000,1150000,'4'),
('TRPD19110004','2019-11-12','2019-11-04',65000,50000,'4');

/*Table structure for table `pengelolaan` */

DROP TABLE IF EXISTS `pengelolaan`;

CREATE TABLE `pengelolaan` (
  `id_pengelolaan` varchar(50) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `total_barang` int(11) DEFAULT NULL,
  `peminjam` varchar(50) DEFAULT NULL,
  `status_pengelolaan` varchar(50) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pengelolaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengelolaan` */

insert  into `pengelolaan`(`id_pengelolaan`,`tgl_transaksi`,`total_barang`,`peminjam`,`status_pengelolaan`,`id_user`) values 
('TPL19110001','2019-11-06',5,'Customer','Pinjam','1'),
('TPL19110002','2019-11-06',4,'Customer','Pinjam','1'),
('TPL19110003','2019-11-06',3,'Iframe Bantul','Maintenance','1'),
('TPL19110004','2019-11-06',4,'Iframe Bantul','Maintenance','1'),
('TPL19110005','2019-11-06',3,'Customer','Maintenance','1'),
('TPL19110006','2019-11-06',4,'Customer','Pinjam','1'),
('TPL19110007','2019-11-06',5,'Customer','Maintenance','1');

/*Table structure for table `penghapusan` */

DROP TABLE IF EXISTS `penghapusan`;

CREATE TABLE `penghapusan` (
  `id_penghapusan` varchar(50) NOT NULL,
  `tgl_hapus` datetime DEFAULT NULL,
  `id_staff` varchar(50) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `status` enum('Sudah Dihapus','Pending','Proses') DEFAULT NULL,
  PRIMARY KEY (`id_penghapusan`),
  CONSTRAINT `penghapusan_ibfk_1` FOREIGN KEY (`id_penghapusan`) REFERENCES `det_penghapusan` (`id_det_penghapusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penghapusan` */

/*Table structure for table `penyusutan` */

DROP TABLE IF EXISTS `penyusutan`;

CREATE TABLE `penyusutan` (
  `id_penyusutan` varchar(50) NOT NULL,
  `nilai_penyusutan` double DEFAULT NULL,
  PRIMARY KEY (`id_penyusutan`),
  CONSTRAINT `penyusutan_ibfk_1` FOREIGN KEY (`id_penyusutan`) REFERENCES `nilai_penyusutan` (`id_nilai_penyusutan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penyusutan` */

/*Table structure for table `perencanaan` */

DROP TABLE IF EXISTS `perencanaan`;

CREATE TABLE `perencanaan` (
  `id_perencanaan` varchar(50) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tgl_rencana_pengadaan` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tujuan` text,
  `total_perencanaan` double DEFAULT NULL,
  `status_data` enum('Dibatalkan','Disetujui') DEFAULT 'Disetujui',
  PRIMARY KEY (`id_perencanaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perencanaan` */

insert  into `perencanaan`(`id_perencanaan`,`tgl_transaksi`,`tgl_rencana_pengadaan`,`id_user`,`tujuan`,`total_perencanaan`,`status_data`) values 
('TRP19110001','2019-11-02','2019-11-03',1,'asdasdas',470000,'Dibatalkan'),
('TRP19110002','2019-11-02','2019-11-03',1,'asdasdas',65000,'Dibatalkan'),
('TRP19110003','2019-11-02','2019-11-03',1,'dadasd',80000,'Dibatalkan'),
('TRP19110004','2019-11-04','2019-11-08',1,'Data Tester. ',65000,'Disetujui'),
('TRP19110005','2019-11-04','2019-11-18',1,'Tester. ',105000,'Disetujui');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id_staff` varchar(50) NOT NULL,
  `nama_staff` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`id_staff`,`nama_staff`,`alamat`,`no_hp`,`jabatan`,`id_user`) values 
('STF-1910-0003','Test Dev','Test','87382738192','Pegawai',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Manajer','Gudang','Pegawai','Admin') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`nama_user`,`password`,`email`,`telepon`,`foto`,`hak_akses`,`status`,`created_at`,`updated_at`) values 
(1,'superadmin','superadmin','17c4520f6cfd1ab53d8745e84681eb49','superadmin@gmail.com','12345678','user-default.png','Admin','aktif','2017-04-01 15:15:15','2019-11-12 06:23:40'),
(4,'admin','Admin','21232f297a57a5a743894a0e4a801fc3','admin@example.com','123456789',NULL,'Admin','aktif','2019-11-12 06:18:50','2019-11-12 06:23:37'),
(5,'pegawai','pegawai','047aeeb234644b9e2d4138ed3bc7976a','pegawai@example.com','3456789',NULL,'Pegawai','aktif','2019-11-12 06:57:09','2019-11-12 06:57:09'),
(6,'manajer','manajer','69b731ea8f289cf16a192ce78a37b4f0','manajer@example.com','34567890',NULL,'Manajer','aktif','2019-11-12 06:57:36','2019-11-12 06:57:36');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
