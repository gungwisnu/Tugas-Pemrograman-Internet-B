/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.32-MariaDB-log : Database - kampus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kampus` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `kampus`;

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id`,`nim`,`nama`,`prodi`) values 
(1,'2405551106','Anak Agung Gede Wisnu Mahadhiva','Teknologi Informasi'),
(2,'2405551053','Ida Bagus Dio Gloria','Teknologi Informasi'),
(3,'2405551089','I Nyoman Restu Dharmayasa','Teknologi Informasi'),
(4,'2405551150','Jason Adriel ','Teknologi Informasi'),
(11,'2405551098','Dewa Made Pandu Diotama','Teknologi Informasi');

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mahasiswa_id` int(11) NOT NULL,
  `mata_kuliah` varchar(100) NOT NULL,
  `sks` tinyint(4) NOT NULL,
  `nilai_huruf` enum('A','B','C','D','E') NOT NULL,
  `nilai_angka` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `nilai` */

insert  into `nilai`(`id`,`mahasiswa_id`,`mata_kuliah`,`sks`,`nilai_huruf`,`nilai_angka`) values 
(25,1,'Pemrograman Internet',3,'A',4.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
