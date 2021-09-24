-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: skripsi
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'admin','admin','admin');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fakultas`
--

DROP TABLE IF EXISTS `tb_fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `nama_fakultas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fakultas`
--

LOCK TABLES `tb_fakultas` WRITE;
/*!40000 ALTER TABLE `tb_fakultas` DISABLE KEYS */;
INSERT INTO `tb_fakultas` VALUES (0,'Amir','Sains dan teknologi','admin','admin');
/*!40000 ALTER TABLE `tb_fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_laporan`
--

DROP TABLE IF EXISTS `tb_laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_telpon` varchar(25) NOT NULL,
  `fak` varchar(25) NOT NULL,
  `deksripsi` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `kode_laporan` text,
  `verified` int(1) NOT NULL DEFAULT '0',
  `readby_fakultas` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_laporan`
--

LOCK TABLES `tb_laporan` WRITE;
/*!40000 ALTER TABLE `tb_laporan` DISABLE KEYS */;
INSERT INTO `tb_laporan` VALUES (1,'as','as','larocca04111998@gmail.com','as','as','as','foto-laporan-1626073305.png','Laporan Tolak','2021-07-12',NULL,1,0),(2,'fs','wer','larocca04111998@gmail.com','wer','qwe','hkh','foto-laporan-1626075159.png','Laporan Terima','2021-07-12','873a420964dbfac72c5b49ce65cb1991',1,1),(3,'fs','wer','larocca04111998@gmail.com','wer','qwe','Ann','foto-laporan-1626076152.png','Laporan Terima','2021-07-12','cedb7f24376214d5fe503683cac8ab74',1,1),(4,'asd','wer','larocca04111998@gmail.com','asd','asd','asd','foto-laporan-1626076307.png','Laporan Baru','2021-07-12','c00193e70e8e27e70601b26161b4ae86',1,0),(5,'asd','wer','larocca04111998@gmail.com','asd','asd','asd','foto-laporan-1626076404.png','Laporan Baru','2021-07-12','a1f0cf94512f963e5ed4edd9af70e2cc',1,0),(6,'asd','wer','larocca04111998@gmail.com','asd','asd','asd','foto-laporan-1626076476.png','Laporan Baru','2021-07-12','ce254528e55ecddb829073c29a8d3a3a',1,0),(7,'fs','wer','larocca04111998@gmail.com','as','as','as','foto-laporan-1626076930.png','Laporan Baru','2021-07-12','3b220b436e5f3d917a1e649a0dc0281c',1,0),(8,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077120.png','Laporan Baru','2021-07-12','5c71dd758876eed351796c7cd2e56a54',1,0),(9,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077166.png','Laporan Baru','2021-07-12','0f34132b15dd02f282a11ea1e322a96d',1,0),(10,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077221.png','Laporan Baru','2021-07-12','aa826555e21b7c95a06600456effd501',1,0),(11,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077282.png','Laporan Baru','2021-07-12','a9a6bc8f86138d7b4c7a186ceb947b62',1,0),(12,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077434.png','Laporan Baru','2021-07-12','8e82ab7243b7c66d768f1b8ce1c967eb',1,0),(13,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077463.png','Laporan Baru','2021-07-12','f7370a6dcf0258acd5d76f594612c249',1,0),(14,'fs','asd','larocca04111998@gmail.com','asd','qwe','asd','foto-laporan-1626077497.png','Laporan Baru','2021-07-12','0fd48905c01efe57e06cef04e3d71038',1,0),(15,'asad','ads','larocca04111998@gmail.com','asd','asd','asd','foto-laporan-1626077912.png','Laporan Baru','2021-07-12','b1c5390a0134fb5edeb8bef14441045b',1,0);
/*!40000 ALTER TABLE `tb_laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'skripsi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-15 21:53:11
