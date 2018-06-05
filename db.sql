/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.32-MariaDB : Database - lotusolu_puterako
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lotusolu_puterako` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lotusolu_puterako`;

/*Table structure for table `fjasa_dtl` */

DROP TABLE IF EXISTS `fjasa_dtl`;

CREATE TABLE `fjasa_dtl` (
  `id_fjasa_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jasa` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL DEFAULT '',
  `vol` int(11) NOT NULL DEFAULT '0',
  `hari` int(11) NOT NULL DEFAULT '0',
  `orang` int(11) NOT NULL DEFAULT '0',
  `unit` int(11) NOT NULL DEFAULT '0',
  `status` enum('1','0') DEFAULT '1' COMMENT '1=open,0=close',
  `token` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_fjasa_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `fjasa_dtl` */

insert  into `fjasa_dtl`(`id_fjasa_dtl`,`kd_jasa`,`description`,`vol`,`hari`,`orang`,`unit`,`status`,`token`) values (3,'Jasa 01','service cctv',1,1,1,100000,'1','dhHjdJNG4ZYwfldK0peENZ6RcTJWWMJa3rthahXfhWLwiZhiow'),(4,'jasa02','makan',1,1,5,20000,'1','FyVQkNKyxZMoVk7dHt73YARAmGFepUC4tyUOlFnTF9hAupNcTU'),(5,'jasa02','bensin',1,1,1,25000,'1','FyVQkNKyxZMoVk7dHt73YARAmGFepUC4tyUOlFnTF9hAupNcTU'),(6,'jasa02','makan',1,1,5,20000,'1','1v0s2R2pekZUYdDtHjJy2sC0a1CtrPstksVnjYNxiNsh06KHpt');

/*Table structure for table `fjasa_dtl_tmp` */

DROP TABLE IF EXISTS `fjasa_dtl_tmp`;

CREATE TABLE `fjasa_dtl_tmp` (
  `id_fjasa_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL DEFAULT '',
  `vol` int(11) NOT NULL DEFAULT '0',
  `hari` int(11) NOT NULL DEFAULT '0',
  `orang` int(11) NOT NULL DEFAULT '0',
  `unit` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `id_form` int(11) NOT NULL,
  PRIMARY KEY (`id_fjasa_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `fjasa_dtl_tmp` */

insert  into `fjasa_dtl_tmp`(`id_fjasa_dtl`,`description`,`vol`,`hari`,`orang`,`unit`,`total`,`id_form`) values (1,'bensin',1,1,1,25000,25000,18),(2,'makan',1,1,5,20000,100000,18);

/*Table structure for table `fjasa_hdr` */

DROP TABLE IF EXISTS `fjasa_hdr`;

CREATE TABLE `fjasa_hdr` (
  `id_fjasa_hdr` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jasa` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL DEFAULT '',
  `token` varchar(100) NOT NULL DEFAULT '',
  `status` enum('1','0','2') NOT NULL DEFAULT '0' COMMENT '1=close,0=open,2=batal',
  `alasan_batal` text NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `profit10` int(11) NOT NULL,
  `pph6` int(11) NOT NULL,
  `profit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_fjasa_hdr`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `fjasa_hdr` */

insert  into `fjasa_hdr`(`id_fjasa_hdr`,`kd_jasa`,`deskripsi`,`token`,`status`,`alasan_batal`,`total`,`tgl_input`,`subtotal`,`profit10`,`pph6`,`profit`) values (2,'Jasa 01','Jasa Service CCTV','dhHjdJNG4ZYwfldK0peENZ6RcTJWWMJa3rthahXfhWLwiZhiow','1','',120000,'2018-05-30 14:36:30',100000,111112,118205,0),(3,'jasa02','Jasa pemasangan, test comm, training,dokumentasi,transport dan akomodasi','FyVQkNKyxZMoVk7dHt73YARAmGFepUC4tyUOlFnTF9hAupNcTU','0','',148000,'2018-05-31 12:49:05',125000,138889,147755,10),(4,'jasa02','Jasa pemasangan, test comm, training,dokumentasi,transport dan akomodasi','1v0s2R2pekZUYdDtHjJy2sC0a1CtrPstksVnjYNxiNsh06KHpt','0','',118205,'2018-05-31 14:54:41',100000,111112,118205,10);

/*Table structure for table `form_id` */

DROP TABLE IF EXISTS `form_id`;

CREATE TABLE `form_id` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `kode_form` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

/*Data for the table `form_id` */

insert  into `form_id`(`id_form`,`kode_form`) values (130,1),(131,2),(132,3),(133,4),(134,5),(135,6),(136,7),(137,8),(138,9),(139,10),(140,11),(141,12),(142,13),(143,14),(144,15),(145,16),(146,17),(147,18),(148,19),(149,20),(150,21),(151,22),(152,23),(153,24),(154,25),(155,26),(156,27),(157,28),(158,29),(159,30),(160,31),(161,32),(162,33),(163,34),(164,35),(165,36),(166,37),(167,38),(168,39),(169,40),(170,41),(171,42);

/*Table structure for table `fs_dtl` */

DROP TABLE IF EXISTS `fs_dtl`;

CREATE TABLE `fs_dtl` (
  `id_fs_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `kd_proyek` varchar(50) NOT NULL DEFAULT '',
  `kode_item` varchar(50) NOT NULL DEFAULT '',
  `lokasi` varchar(50) NOT NULL DEFAULT '',
  `qty` int(10) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `satuan` varchar(25) NOT NULL DEFAULT '',
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1=open,0=close',
  `token` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_fs_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `fs_dtl` */

insert  into `fs_dtl`(`id_fs_dtl`,`kd_proyek`,`kode_item`,`lokasi`,`qty`,`note`,`satuan`,`status`,`token`) values (20,'PIB/SV/46/V/18','camera IP','warehouse_1',1,'','unit','1','4c2gzBHRTTEJYdby3ST45Ck4UXInD0CIcEZLgGDaAhTzu47yW1'),(21,'PIB/SV/46/V/18','nvr','wh_2',1,'','unit','1','4c2gzBHRTTEJYdby3ST45Ck4UXInD0CIcEZLgGDaAhTzu47yW1'),(22,'PIB/SV/46/V/18','camera IP','produksi',1,'','unit','1','4c2gzBHRTTEJYdby3ST45Ck4UXInD0CIcEZLgGDaAhTzu47yW1'),(23,'PIB/SV/46/V/18','camera IP','warehouse_1',1,'','unit','1','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K'),(24,'PIB/SV/46/V/18','camera IP','produksi',1,'','unit','1','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K'),(25,'PIB/SV/46/V/18','nvr','wh_2',1,'','unit','1','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K'),(26,'PIB/SV/46/V/18','Handphone','-',3,'','32','1','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K');

/*Table structure for table `fs_dtl_lokasi` */

DROP TABLE IF EXISTS `fs_dtl_lokasi`;

CREATE TABLE `fs_dtl_lokasi` (
  `id_fs_dtl_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_item` varchar(50) NOT NULL,
  `kd_proyek` varchar(50) NOT NULL,
  `token` varchar(100) NOT NULL,
  `Gudang_1` int(11) NOT NULL DEFAULT '0',
  `Gudang_2` int(11) NOT NULL DEFAULT '0',
  `Kamar_1` int(11) NOT NULL DEFAULT '0',
  `Kamar_2` int(11) NOT NULL DEFAULT '0',
  `Kamar_3` int(11) NOT NULL DEFAULT '0',
  `warehouse_1` int(11) NOT NULL DEFAULT '0',
  `wh_2` int(11) NOT NULL DEFAULT '0',
  `produksi` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_fs_dtl_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `fs_dtl_lokasi` */

insert  into `fs_dtl_lokasi`(`id_fs_dtl_lokasi`,`kode_item`,`kd_proyek`,`token`,`Gudang_1`,`Gudang_2`,`Kamar_1`,`Kamar_2`,`Kamar_3`,`warehouse_1`,`wh_2`,`produksi`) values (5,'camera IP','PIB/SV/46/V/18','4c2gzBHRTTEJYdby3ST45Ck4UXInD0CIcEZLgGDaAhTzu47yW1',0,0,0,0,0,1,0,1),(6,'nvr','PIB/SV/46/V/18','4c2gzBHRTTEJYdby3ST45Ck4UXInD0CIcEZLgGDaAhTzu47yW1',0,0,0,0,0,0,1,0),(7,'camera IP','PIB/SV/46/V/18','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K',0,0,0,0,0,1,0,1),(8,'nvr','PIB/SV/46/V/18','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K',0,0,0,0,0,0,1,0);

/*Table structure for table `fs_dtl_tmp` */

DROP TABLE IF EXISTS `fs_dtl_tmp`;

CREATE TABLE `fs_dtl_tmp` (
  `id_fs_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `kode_item` varchar(50) NOT NULL DEFAULT '',
  `lokasi` varchar(50) NOT NULL DEFAULT '',
  `qty` int(10) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `satuan` varchar(25) NOT NULL DEFAULT '',
  `id_form` int(11) NOT NULL,
  PRIMARY KEY (`id_fs_dtl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fs_dtl_tmp` */

/*Table structure for table `fs_hdr` */

DROP TABLE IF EXISTS `fs_hdr`;

CREATE TABLE `fs_hdr` (
  `id_fs_hdr` int(11) NOT NULL AUTO_INCREMENT,
  `kd_proyek` varchar(30) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL DEFAULT '',
  `alamat` varchar(100) NOT NULL DEFAULT '',
  `up` varchar(100) NOT NULL DEFAULT '',
  `jabatan` varchar(100) NOT NULL DEFAULT '',
  `surveyor` varchar(100) NOT NULL DEFAULT '',
  `keterangan` varchar(100) NOT NULL DEFAULT '',
  `token` varchar(100) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('1','0','2') NOT NULL DEFAULT '0' COMMENT '1=close,0=open,2=batal',
  `status_survey` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=survey,0=blm',
  `alasan_batal` text NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT '',
  `lokasi_hdr` varchar(100) NOT NULL,
  `kd_survey` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fs_hdr`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `fs_hdr` */

insert  into `fs_hdr`(`id_fs_hdr`,`kd_proyek`,`nama_proyek`,`alamat`,`up`,`jabatan`,`surveyor`,`keterangan`,`token`,`tanggal`,`status`,`status_survey`,`alasan_batal`,`foto`,`lokasi_hdr`,`kd_survey`) values (5,'PIB/SV/46/V/18','PT Amcor Indonesia','Pasuruan','Vindarno','IT','Bp Irwan','user Pak X','4c2gzBHRTTEJYdby3ST45Ck4UXInD0CIcEZLgGDaAhTzu47yW1','2018-05-31','0','1','','141942','ruang warehouse',''),(6,'PIB/SV/46/V/18','PT Amcor Indonesia','Pasuruan','Vindarno','IT','Bp Irwan','user Pak X','PccWw5XjtHpoop0jx2JCAW2rMXVnPrPuXdJoSE6bOyTrtjBg5K','2018-05-31','0','1','','134721','ruang warehouse 1','');

/*Table structure for table `gambar_pp` */

DROP TABLE IF EXISTS `gambar_pp`;

CREATE TABLE `gambar_pp` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gambar` varchar(200) NOT NULL,
  `kd_proyek` varchar(30) NOT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gambar_pp` */

/*Table structure for table `infrastructure_dtl_tmp` */

DROP TABLE IF EXISTS `infrastructure_dtl_tmp`;

CREATE TABLE `infrastructure_dtl_tmp` (
  `id_penawaran_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `model_item` varchar(100) NOT NULL,
  `description_item` varchar(3000) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL DEFAULT '',
  `harga` int(11) NOT NULL DEFAULT '0',
  `harga_hpp` int(11) NOT NULL DEFAULT '0',
  `profit` int(11) NOT NULL DEFAULT '0',
  `diskon` int(11) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `id_profit` int(11) NOT NULL DEFAULT '0',
  `id_diskon` int(11) NOT NULL DEFAULT '0',
  `id_form` int(11) NOT NULL,
  PRIMARY KEY (`id_penawaran_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `infrastructure_dtl_tmp` */

insert  into `infrastructure_dtl_tmp`(`id_penawaran_dtl`,`model_item`,`description_item`,`qty`,`satuan`,`harga`,`harga_hpp`,`profit`,`diskon`,`note`,`id_profit`,`id_diskon`,`id_form`) values (1,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,650000,866667,866667,'',25,0,11),(2,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,650000,866667,866667,'',25,0,12),(3,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,650000,866667,866667,'',25,0,30),(4,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,0,866667,866667,'',25,0,34),(6,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,0,866667,866667,'',25,0,34);

/*Table structure for table `jasa_dtl_tmp` */

DROP TABLE IF EXISTS `jasa_dtl_tmp`;

CREATE TABLE `jasa_dtl_tmp` (
  `id_penawaran_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `description_item` varchar(100) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL DEFAULT '',
  `harga` int(11) NOT NULL DEFAULT '0',
  `harga_hpp` int(11) NOT NULL DEFAULT '0',
  `profit` int(11) NOT NULL DEFAULT '0',
  `diskon` int(11) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `id_profit` int(11) NOT NULL DEFAULT '0',
  `id_diskon` int(11) NOT NULL DEFAULT '0',
  `id_form` int(11) NOT NULL,
  `kd_jasa` varchar(30) NOT NULL,
  PRIMARY KEY (`id_penawaran_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jasa_dtl_tmp` */

insert  into `jasa_dtl_tmp`(`id_penawaran_dtl`,`description_item`,`qty`,`satuan`,`harga`,`harga_hpp`,`profit`,`diskon`,`note`,`id_profit`,`id_diskon`,`id_form`,`kd_jasa`) values (1,'Jasa Service CCTV',1,'',120000,0,0,0,'',0,0,11,'Jasa 01'),(2,'Jasa Service CCTV',1,'',120000,0,0,0,'',0,0,12,''),(3,'Jasa Service CCTV',1,'',120000,0,0,0,'',0,0,30,''),(4,'Jasa Service CCTV',1,'',120000,0,0,0,'',0,0,34,''),(5,'Jasa Service CCTV',1,'',120000,0,0,0,'',0,0,34,'');

/*Table structure for table `lod_hdr` */

DROP TABLE IF EXISTS `lod_hdr`;

CREATE TABLE `lod_hdr` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `no_lod` varchar(50) NOT NULL DEFAULT '',
  `no_proyek` varchar(50) NOT NULL DEFAULT '',
  `no_so` varchar(50) NOT NULL DEFAULT '',
  `tgl_buat` date NOT NULL DEFAULT '0000-00-00',
  `nama_pelanggan` varchar(50) NOT NULL DEFAULT '',
  `company` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `contact_person` varchar(100) NOT NULL DEFAULT '',
  `task` varchar(50) NOT NULL DEFAULT '',
  `timer_start` time NOT NULL DEFAULT '00:00:00',
  `timer_finnis` time NOT NULL DEFAULT '00:00:00',
  `petugas_load` varchar(100) NOT NULL DEFAULT '',
  `foto` varchar(50) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `status` enum('1','0','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lod_hdr` */

/*Table structure for table `material_dtl_tmp` */

DROP TABLE IF EXISTS `material_dtl_tmp`;

CREATE TABLE `material_dtl_tmp` (
  `id_penawaran_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `description_item` varchar(50) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL DEFAULT '',
  `harga` int(11) NOT NULL DEFAULT '0',
  `harga_hpp` int(11) NOT NULL DEFAULT '0',
  `profit` int(11) NOT NULL DEFAULT '0',
  `diskon` int(11) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `id_profit` int(11) NOT NULL DEFAULT '0',
  `id_diskon` int(11) NOT NULL DEFAULT '0',
  `id_form` int(11) NOT NULL,
  PRIMARY KEY (`id_penawaran_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `material_dtl_tmp` */

insert  into `material_dtl_tmp`(`id_penawaran_dtl`,`description_item`,`qty`,`satuan`,`harga`,`harga_hpp`,`profit`,`diskon`,`note`,`id_profit`,`id_diskon`,`id_form`) values (1,'kabel coaxial',100,'meter',20000,15000,20000,20000,'',25,0,11),(2,'kabel coaxial',100,'meter',20000,15000,20000,20000,'',25,0,12),(3,'kabel coaxial',100,'meter',20000,15000,20000,20000,'',25,0,30),(4,'kabel coaxial',100,'meter',20000,0,20000,20000,'',25,0,34),(5,'kabel coaxial',100,'meter',20000,0,20000,20000,'',25,0,34);

/*Table structure for table `model_item` */

DROP TABLE IF EXISTS `model_item`;

CREATE TABLE `model_item` (
  `id_model` int(11) NOT NULL AUTO_INCREMENT,
  `nama_model_item` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_model`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `model_item` */

/*Table structure for table `penawaran_dtl` */

DROP TABLE IF EXISTS `penawaran_dtl`;

CREATE TABLE `penawaran_dtl` (
  `id_penawaran_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penawaran` varchar(30) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL DEFAULT '',
  `urutan_jb` int(11) NOT NULL DEFAULT '0',
  `model_item` varchar(100) NOT NULL,
  `description_item` varchar(3000) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL DEFAULT '',
  `harga` int(11) NOT NULL DEFAULT '0',
  `profit` int(11) NOT NULL DEFAULT '0',
  `diskon` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `aktif` enum('1','0') NOT NULL DEFAULT '1',
  `token` varchar(150) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `harga_hpp` int(11) NOT NULL,
  `id_profit` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  PRIMARY KEY (`id_penawaran_dtl`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `penawaran_dtl` */

insert  into `penawaran_dtl`(`id_penawaran_dtl`,`kode_penawaran`,`jenis_barang`,`urutan_jb`,`model_item`,`description_item`,`qty`,`satuan`,`harga`,`profit`,`diskon`,`total`,`aktif`,`token`,`note`,`harga_hpp`,`id_profit`,`id_diskon`) values (1,'PIB/SV/46/V/18','Quotation',1,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,866667,866667,1733334,'0','x4iCpTTcAz0YaG5BKvBwDZYio2kS9k2HokkOed1PM1OXITysoa','',650000,25,0),(2,'PIB/SV/46/V/18','Material',2,'','kabel coaxial',100,'meter',20000,20000,20000,2000000,'0','x4iCpTTcAz0YaG5BKvBwDZYio2kS9k2HokkOed1PM1OXITysoa','',15000,25,0),(3,'PIB/SV/46/V/18','Jasa',3,'','Jasa Service CCTV',1,'',120000,0,0,120000,'0','x4iCpTTcAz0YaG5BKvBwDZYio2kS9k2HokkOed1PM1OXITysoa','',0,0,0),(4,'PIB/SV/46/V/18','Quotation',1,'prd770m','lensa 8-11mm, cmos sony, ip66,outdoor,hdcvi',2,'unit',866667,866667,866667,1733334,'0','6C4jHxRhHHiaiqaAcBlO3dA1WqOgB83HK71sFSKmA3xTtItFjO','',0,25,0),(5,'PIB/SV/46/V/18','Material',2,'','kabel coaxial',100,'meter',20000,20000,20000,2000000,'0','6C4jHxRhHHiaiqaAcBlO3dA1WqOgB83HK71sFSKmA3xTtItFjO','',0,25,0),(6,'PIB/SV/46/V/18','Jasa',3,'','Jasa Service CCTV',1,'',120000,0,0,120000,'0','6C4jHxRhHHiaiqaAcBlO3dA1WqOgB83HK71sFSKmA3xTtItFjO','',0,0,0);

/*Table structure for table `penawaran_hdr` */

DROP TABLE IF EXISTS `penawaran_hdr`;

CREATE TABLE `penawaran_hdr` (
  `id_penawaran` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penawaran` varchar(30) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `kepada` varchar(100) NOT NULL DEFAULT '',
  `Up` varchar(100) NOT NULL DEFAULT '',
  `perihal` varchar(100) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `sub_total` int(11) NOT NULL DEFAULT '0',
  `ppn` int(11) NOT NULL DEFAULT '0',
  `diskon_hdr` varchar(255) NOT NULL DEFAULT '',
  `grand_total` int(11) NOT NULL DEFAULT '0',
  `status` enum('1','0','2') NOT NULL DEFAULT '0' COMMENT '1=batal,0=open,2=close',
  `alasan_batal` text NOT NULL,
  `status_survey` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=survey,0=blm',
  `versi` varchar(20) NOT NULL,
  `dengan_hormat` text NOT NULL,
  `status_app` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=blm, 1=approve, 2=buka_approve',
  `ppn_persen` int(11) NOT NULL DEFAULT '0',
  `token` varchar(150) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `user_approved` int(11) NOT NULL,
  `hormat_kami` varchar(100) NOT NULL,
  `tgl_approve` date NOT NULL,
  `diskon_persen` int(11) NOT NULL,
  PRIMARY KEY (`id_penawaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `penawaran_hdr` */

insert  into `penawaran_hdr`(`id_penawaran`,`kode_penawaran`,`tanggal`,`kepada`,`Up`,`perihal`,`note`,`sub_total`,`ppn`,`diskon_hdr`,`grand_total`,`status`,`alasan_batal`,`status_survey`,`versi`,`dengan_hormat`,`status_app`,`ppn_persen`,`token`,`kategori`,`user_approved`,`hormat_kami`,`tgl_approve`,`diskon_persen`) values (1,'PIB/SV/46/V/18','2018-05-30','PT Amcor Indonesia','Vindarno','Penawaran Service','Note : \r\n1. Harga di atas adalah dalam  Rupiah		\r\n2. Penawaran berlaku s/d 2 minggu		\r\n3. Penawaran belum termasuk kabel power		\r\n4. Garansi 1 Tahun (Full Spare Part) yaitu: kerusakan yang disebabkan pabrik pembuatnya.		\r\n    Yang tidak termasuk garansi adalah kerusakan yang diakibatkan karena tegangan tidak stabil,		\r\n    kemasukan air/benda kecil lainnya atau bencana alam		\r\n5. Delivery Time : 6 - 8 Minggu		\r\n	\r\n',3853334,366067,'192667',4026734,'0','','0','1','Bersama ini kami PT. Puterako Inti Buana memberikan penawaran Pemasangan Kabel data di Lazada','0',0,'x4iCpTTcAz0YaG5BKvBwDZYio2kS9k2HokkOed1PM1OXITysoa','Service',0,'Junly ','0000-00-00',5),(2,'PIB/SV/46/V/18','2018-05-30','PT Amcor Indonesia','Vindarno','Penawaran Service','Note : \r\n1. Harga di atas adalah dalam  Rupiah		\r\n2. Penawaran berlaku s/d 2 minggu		\r\n3. Penawaran belum termasuk kabel power		\r\n4. Garansi 1 Tahun (Full Spare Part) yaitu: kerusakan yang disebabkan pabrik pembuatnya.		\r\n    Yang tidak termasuk garansi adalah kerusakan yang diakibatkan karena tegangan tidak stabil,		\r\n    kemasukan air/benda kecil lainnya atau bencana alam		\r\n5. Delivery Time : 6 - 8 Minggu		\r\n	\r\n		\r\n',3853334,366067,'192667',4026734,'0','','0','1','Bersama ini kami PT. Puterako Inti Buana memberikan penawaran Pemasangan Kabel data di Lazada','0',0,'6C4jHxRhHHiaiqaAcBlO3dA1WqOgB83HK71sFSKmA3xTtItFjO','Service',0,'Junly ','0000-00-00',5);

/*Table structure for table `permintaan_penawaran` */

DROP TABLE IF EXISTS `permintaan_penawaran`;

CREATE TABLE `permintaan_penawaran` (
  `id_pp` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pp` varchar(25) NOT NULL DEFAULT '',
  `ref` int(11) DEFAULT NULL,
  `nama_perusahaan` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(100) NOT NULL DEFAULT '',
  `up` varchar(25) NOT NULL DEFAULT '',
  `jabatan` varchar(50) NOT NULL DEFAULT '',
  `contact_person` varchar(25) NOT NULL DEFAULT '0',
  `nama_sales` varchar(25) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `diskripsi` varchar(200) NOT NULL DEFAULT '',
  `aktif` enum('1','0') NOT NULL DEFAULT '1',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=open,1=close,2=batal',
  `status_survey` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1=survey,0=tidak',
  `alasan_batal` varchar(50) NOT NULL DEFAULT '',
  `status_blm_tdk_survey` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1=sudah_survey,0=belum_survey',
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pp`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `permintaan_penawaran` */

insert  into `permintaan_penawaran`(`id_pp`,`kode_pp`,`ref`,`nama_perusahaan`,`alamat`,`up`,`jabatan`,`contact_person`,`nama_sales`,`tanggal`,`diskripsi`,`aktif`,`status`,`status_survey`,`alasan_batal`,`status_blm_tdk_survey`,`kategori`) values (2,'PIB/SV/46/V/18',0,'PT Amcor Indonesia','Pasuruan','Vindarno','IT','081234657382','Junly','2018-05-30','butuh pengecekan 2 kamera mati, dan setting dvr r1','1','1','1','','1','service'),(4,'PIB/SV/46/V/19',0,'PT Senkei Indonesia','Surabaya, indonesia','lorem ipsuim','Genereal Manager','082134432432','Prawira Kusuma','2018-06-19','Segera dilaksanakan','1','0','1','','0','service'),(6,'PIB/JK/2/SV/VI/18',0,'PT Semen Indonesia','Sidoarjo, Jawa Timur','Heri Susanto','Operasional Manager ','08321432432','Prawira Kusuma','2018-06-16','-','1','0','1','','0','service'),(7,'PIB/SD/2/SS/V/18',0,'PT Agrofood','Sidoarjo, Jawa Timur','Heri Muhammad','Operasional Manager ','08321432400','Prawira Kusuma','2018-05-11','-','1','0','1','','0','sales'),(8,'PIB/JK/3/SV/V/18',0,'PT Indofood','Gresik Jawa Timur','Adi','Operasional Manager ','08321432400','Yanti','2018-05-23','-','1','0','1','','0','service'),(9,'PIB/JK/2/SV/VI/18',1,'PT Semen Indonesia','Sidoarjo, Jawa Timur','Heri Susanto','General Manager','08321432432','Dewi Indrayani','2018-06-16','-','1','0','1','','0','service'),(10,'PIB/JK/2/SV/VI/18',2,'PT Semen Indonesia','Sidoarjo, Jawa Timur','Heri Susanto','Operasional Manager ','08321432432','Reni Ningsih','2018-06-16','Dalam tahap awall','1','0','1','','0','service'),(11,'PIB/JK/5/SV/VI/18',0,'PT Digital Asia','Jln Raya Pandegiling, Jawa Timur','Nurmayani','General Manager','0978432432','-','2018-06-15','-','1','0','1','','0','service'),(12,'PIB/JK/5/SV/VI/18',1,'PT Digital Asia','Jln Raya Pandegiling, Jawa Timur','Nurmayani','General Manager','0978432432','Ryansyah Abdullah','2018-06-15','-','1','0','1','','0','service'),(13,'PIB/JK/2/SV/VI/18',3,'PT Semen Indonesia','Sidoarjo, Jawa Timur','Heri Susanto','Operasional Manager ','08321432432','-','2018-06-16','Dalam tahap awall','1','0','1','','0','service');

/*Table structure for table `r_form_pp` */

DROP TABLE IF EXISTS `r_form_pp`;

CREATE TABLE `r_form_pp` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `kode_form` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `r_form_pp` */

/*Table structure for table `so_dtl` */

DROP TABLE IF EXISTS `so_dtl`;

CREATE TABLE `so_dtl` (
  `id_so_dtl` int(11) NOT NULL AUTO_INCREMENT,
  `kode_so` varchar(20) NOT NULL,
  `kode_inventori` varchar(20) NOT NULL,
  `nama_inventori` varchar(25) NOT NULL DEFAULT '',
  `satuan` varchar(20) NOT NULL,
  `jumlah_so` int(11) NOT NULL,
  `harga` decimal(14,2) NOT NULL,
  `total_harga` decimal(14,2) NOT NULL,
  `keterangan_dtl` text NOT NULL,
  `status_dtl` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT 'setuju=1, batal=2, close=3',
  `diskon1` decimal(14,2) NOT NULL,
  `diskon2` int(11) NOT NULL DEFAULT '0',
  `foc` enum('0','1') NOT NULL DEFAULT '0',
  `jumlah_so_batal` int(11) NOT NULL,
  PRIMARY KEY (`id_so_dtl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `so_dtl` */

/*Table structure for table `so_hdr` */

DROP TABLE IF EXISTS `so_hdr`;

CREATE TABLE `so_hdr` (
  `id_so_hdr` int(11) NOT NULL AUTO_INCREMENT,
  `kode_so` varchar(20) NOT NULL,
  `kode_proyek` varchar(50) NOT NULL DEFAULT '',
  `ref` varchar(20) NOT NULL,
  `nama_custemer` varchar(20) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_jht` date NOT NULL,
  `keterangan_hdr` text NOT NULL,
  `user_pencipta` int(11) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT 'setuju=1, batal=2, close=3',
  `aktif` enum('0','1') NOT NULL DEFAULT '1',
  `tgl_input` datetime NOT NULL,
  `ppn` int(11) NOT NULL DEFAULT '0',
  `alasan_batal` text NOT NULL,
  `user_approve` int(11) NOT NULL,
  `po_custemer` varchar(20) NOT NULL,
  `kode_sales` varchar(20) NOT NULL,
  `alamat_penagihan` text NOT NULL,
  `kepada_kota` text NOT NULL,
  `kepada_telpon` text NOT NULL,
  `user_batal` int(11) NOT NULL,
  `tgl_batal` date NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `diskon2` int(11) NOT NULL DEFAULT '0',
  `sub_total` int(11) NOT NULL DEFAULT '0',
  `grand_total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_so_hdr`),
  UNIQUE KEY `kode_pp_hdr` (`kode_so`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `so_hdr` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `kd_user` int(1) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `kode_cabang` varchar(25) NOT NULL DEFAULT '',
  `kode_gudang` varchar(25) NOT NULL DEFAULT '',
  `level` int(1) DEFAULT '1' COMMENT '1=user, 3=super admin',
  `aktif` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`kd_user`,`nm_user`,`username`,`password`,`kode_cabang`,`kode_gudang`,`level`,`aktif`) values (1,'admin','admin','admin','','',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
