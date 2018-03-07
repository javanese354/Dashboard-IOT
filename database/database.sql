/*
SQLyog Community
MySQL - 10.1.29-MariaDB : Database - flammabl_cek
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`flammabl_cek` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `flammabl_cek`;

/*Table structure for table `data_loger` */

DROP TABLE IF EXISTS `data_loger`;

CREATE TABLE `data_loger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gas` decimal(5,2) NOT NULL,
  `api` enum('BAHAYA','AMAN','','') NOT NULL,
  `berat` double(10,2) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posisi` enum('TERPASANG','TERLEPAS') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `data_loger` */

insert  into `data_loger`(`id`,`gas`,`api`,`berat`,`waktu`,`posisi`) values 
(1,90.00,'BAHAYA',4500.00,'2018-02-12 15:09:33','TERPASANG'),
(2,90.00,'BAHAYA',6500.00,'2018-02-12 15:09:52','TERPASANG'),
(3,909.00,'BAHAYA',6500.00,'2018-02-12 15:10:03','TERPASANG'),
(4,99.00,'BAHAYA',6500.00,'2018-02-12 15:10:12','TERPASANG');

/*Table structure for table `kendali_regulator` */

DROP TABLE IF EXISTS `kendali_regulator`;

CREATE TABLE `kendali_regulator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posisi_regulator` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kendali_regulator` */

insert  into `kendali_regulator`(`id`,`posisi_regulator`) values 
(1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
