-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: siloker
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (1,'sample berita update','uploads/berita/han.jpg','sasdasd','2021-07-17 20:01:31'),(2,'sample berita dua','uploads/berita/Screenshot_from_2021-07-09_22-38-56.png','asdasd asdasd asdasd','2021-07-17 20:07:44');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bidang_usaha`
--

DROP TABLE IF EXISTS `bidang_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bidang_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang_usaha`
--

LOCK TABLES `bidang_usaha` WRITE;
/*!40000 ALTER TABLE `bidang_usaha` DISABLE KEYS */;
INSERT INTO `bidang_usaha` VALUES (1,'Teknologi Informasi dan Komunikasi'),(2,'Perbankan'),(3,'Pendidikan'),(4,'Transporasi'),(5,'Industri Nasional'),(6,'Internasional');
/*!40000 ALTER TABLE `bidang_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keahlian`
--

DROP TABLE IF EXISTS `keahlian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keahlian`
--

LOCK TABLES `keahlian` WRITE;
/*!40000 ALTER TABLE `keahlian` DISABLE KEYS */;
INSERT INTO `keahlian` VALUES (1,'Programmer'),(2,'Infrastruktur & Jaringan'),(3,'Soft Skill'),(4,'Bahasa Inggris'),(5,'Database'),(6,'Web Design');
/*!40000 ALTER TABLE `keahlian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan`
--

DROP TABLE IF EXISTS `lowongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi_pekerjaan` text DEFAULT NULL,
  `deskripsi_kualifikasi_pekerjaan` text DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `mitra_id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lowongan_mitra1_idx` (`mitra_id`),
  CONSTRAINT `fk_lowongan_mitra1` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan`
--

LOCK TABLES `lowongan` WRITE;
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
INSERT INTO `lowongan` VALUES (1,'Dibutuhkan tenaga programmer/analyst',NULL,'2021-07-01',2,'hrd@bukalapak.go.id'),(3,'posisi backend developer','memahami php dasar, terbiasa menggunakan framework, paham database','2021-07-31',2,'hrd@gmail.com'),(4,'dicari fullstack developer','memahami semua bahasa pemrograman','2021-07-31',4,'hrd@gmail.com');
/*!40000 ALTER TABLE `lowongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_keahlian`
--

DROP TABLE IF EXISTS `lowongan_keahlian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lowongan_keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keahlian_id` int(11) NOT NULL,
  `lowongan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lowongan_keahlian_keahlian1_idx` (`keahlian_id`),
  KEY `fk_lowongan_keahlian_lowongan1_idx` (`lowongan_id`),
  CONSTRAINT `fk_lowongan_keahlian_keahlian1` FOREIGN KEY (`keahlian_id`) REFERENCES `keahlian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lowongan_keahlian_lowongan1` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_keahlian`
--

LOCK TABLES `lowongan_keahlian` WRITE;
/*!40000 ALTER TABLE `lowongan_keahlian` DISABLE KEYS */;
INSERT INTO `lowongan_keahlian` VALUES (1,1,1),(2,5,1),(14,5,3),(15,3,3),(16,1,3),(17,6,4),(18,5,4),(19,4,4),(20,3,4),(21,2,4),(22,1,4);
/*!40000 ALTER TABLE `lowongan_keahlian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL,
  `telpon` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `bidang_usaha_id` int(11) NOT NULL,
  `sektor_usaha_id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mitra_bidang_usaha_idx` (`bidang_usaha_id`),
  KEY `fk_mitra_sektor_usaha1_idx` (`sektor_usaha_id`),
  CONSTRAINT `fk_mitra_bidang_usaha` FOREIGN KEY (`bidang_usaha_id`) REFERENCES `bidang_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mitra_sektor_usaha1` FOREIGN KEY (`sektor_usaha_id`) REFERENCES `sektor_usaha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra`
--

LOCK TABLES `mitra` WRITE;
/*!40000 ALTER TABLE `mitra` DISABLE KEYS */;
INSERT INTO `mitra` VALUES (1,'PT Rekayasa Industri','Jl Makam Pahlawan xbata No 182','Aries P','0812-8882329','hrd@rekin.go.id','www.rekin.go.id',5,2,NULL),(2,'PT Bukalapak','Jl Kemang No. 12','Zaki F','0859-42029','hrd@bukalapak.com','bukalapak.com',1,4,NULL),(4,'PT Makmur Jaya','Perumahan Pamulang Permai I (baru) Blok D3 No','Budi setiadi','083873037477','habibijaelani05@gmail.com','makmurjaya.com',6,3,3);
/*!40000 ALTER TABLE `mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminat_lowongan`
--

DROP TABLE IF EXISTS `peminat_lowongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminat_lowongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `prodi_id` int(11) NOT NULL,
  `lowongan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_peminat_lowongan_prodi1_idx` (`prodi_id`),
  KEY `fk_peminat_lowongan_lowongan1_idx` (`lowongan_id`),
  CONSTRAINT `fk_peminat_lowongan_lowongan1` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_peminat_lowongan_prodi1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminat_lowongan`
--

LOCK TABLES `peminat_lowongan` WRITE;
/*!40000 ALTER TABLE `peminat_lowongan` DISABLE KEYS */;
/*!40000 ALTER TABLE `peminat_lowongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,'SI','Sistem Informasi'),(2,'TI','Teknik Informatika'),(3,'BD','Bisnis Digital');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sektor_usaha`
--

DROP TABLE IF EXISTS `sektor_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sektor_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sektor_usaha`
--

LOCK TABLES `sektor_usaha` WRITE;
/*!40000 ALTER TABLE `sektor_usaha` DISABLE KEYS */;
INSERT INTO `sektor_usaha` VALUES (1,'Pemerintahan'),(2,'BUMN'),(3,'Swasta'),(4,'Startup'),(5,'Pendidikan');
/*!40000 ALTER TABLE `sektor_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','mitra','admin') NOT NULL DEFAULT 'user',
  `date_created` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Habibi','habibi@gmail.com','$2y$10$NYzUcHkAROdvmHsBQ2oVseSXOAM.C11rYcAeyjaLZyGFsquhO9QHC','admin','0000-00-00 00:00:00',1),(3,'roni','roni@gmail.com','$2y$10$S7oyoEaYXfJT6Gnb5QZVkuvXu7zjnmoO8sFIUKg/tQFtbqE6tLQjm','mitra','0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-18  3:39:37
