-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 192.168.7.150    Database: hdeskk
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aktivis`
--

DROP TABLE IF EXISTS `aktivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aktivis` (
  `aktivis_id` int NOT NULL AUTO_INCREMENT,
  `nia` varchar(45) DEFAULT NULL,
  `nama_aktivis` varchar(100) NOT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `asal` text,
  PRIMARY KEY (`aktivis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aktivis`
--

LOCK TABLES `aktivis` WRITE;
/*!40000 ALTER TABLE `aktivis` DISABLE KEYS */;
INSERT INTO `aktivis` VALUES (1,'NIA01','SYSTEM','Laki-laki','0808','SERVER'),(2,'SPA23000929382','Yensi Kumalasari','Perempuan','08126767222','Melawi'),(3,'NIA00000001','Andreas Andi','Laki-laki','08236767622','Merpak, Kelam'),(4,'NIA003887787','Hendro Sekius','Laki-laki','08125465656','Engkabang Muntek'),(5,'NIA000090909','Indra Setiawan Gumelang','Laki-laki','08126767222','Paoh Benua'),(6,'NIA01010101777','Chicka Sanca Kembang','Perempuan','08126767222','Mungguk Serantung'),(7,'NIA01010101322','Gregorius Niarwin','Laki-laki','08236767622','Sekadau'),(8,'NIA00009090912','Riyo Papa Riva','Laki-laki','08129982932','Sintang Kota'),(9,'NIA98982392','Ridwan Hamil','Laki-laki','08566572342','Nanga Tempunak'),(10,'NIA6273467263','Yanto Simalungun','Laki-laki','085665672342','Entikong'),(11,'NIA78787872222','Evan Budiargo','Laki-laki','081266767633','Isekai'),(12,'NIA202300909012','Heronimus Hardiyanto Chandra','Laki-laki','085536532211','Pontianak'),(13,'NIA0101010101333','Goprid Tendo Padagi','Laki-laki','08152625262','Tapang Sambas, Tapang Semadak'),(14,'NIA892348523985','Kristina Norliani','Perempuan','082364527346234','Tapang Sambas, Tapang Semadak'),(15,'NIA7827348723874','Eki After Oyon','Laki-laki','0823846278323','Sekadau'),(16,'NIA902348502395','Alex Nyadup','Laki-laki','08123676237462','Melawi, aruk'),(17,'NIA723845723','Yohana Veridiana Marehat','Perempuan','082323647234','Tanah Putih'),(18,'SK21700909','H. Prof. Dr. Severinus Grata Gandi, M.Si, S.SOS, S.Kom, MBA, M.Hum, S.Ak, S.Pd','Laki-laki','0812676749895','Valhalla'),(19,'NIA00398493776','Paulina Erni','Perempuan','087627345623','Sintang'),(20,'sk707900111','Abet Nego, S.Kom','Laki-laki','08129883745','Penyangkak II');
/*!40000 ALTER TABLE `aktivis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `aktivis_cabang_view`
--

DROP TABLE IF EXISTS `aktivis_cabang_view`;
/*!50001 DROP VIEW IF EXISTS `aktivis_cabang_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `aktivis_cabang_view` AS SELECT 
 1 AS `cabang_id`,
 1 AS `nama_cabang`,
 1 AS `nama_jabatan`,
 1 AS `nama_area`,
 1 AS `aktivis_id`,
 1 AS `nia`,
 1 AS `nama_aktivis`,
 1 AS `jk`,
 1 AS `no_hp`,
 1 AS `asal`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `area_id` int NOT NULL AUTO_INCREMENT,
  `nama_area` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Sekadau'),(2,'Sintang I'),(3,'Sintang II'),(4,'Kapuas Hulu'),(5,'Sanggau - Pontianak'),(6,'Melawi');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabang`
--

DROP TABLE IF EXISTS `cabang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabang` (
  `cabang_id` int NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(100) NOT NULL,
  `alamat_cabang` text,
  `area_id` int DEFAULT NULL,
  PRIMARY KEY (`cabang_id`),
  KEY `branch_office_ibfk_1_idx` (`area_id`),
  CONSTRAINT `cabang_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabang`
--

LOCK TABLES `cabang` WRITE;
/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` VALUES (1,'BO. KANTOR PUSAT','JLN.SEKADAU-SINTANG KM 27,DSA TAPANG SEMADAK',1),(2,'BO HEAD OFFICE','JLN OEVANG OERAY NO 33 KEL.BANING KOTA KEC.SINTANG',2),(3,'BO. RUMAH PUNYUNG','JL. KAPITAN KWEE JIU HOI SINTANG, Sungai Durian',1),(4,'BO. SEKADAU BERSATU','JL. SINTANG-PONTIANAK',1),(5,'BO. BATU SADO MACAN','JLN.KAYU LAPIS KM 23,DSA NANGA PEMBULUH LOTONG',1),(6,'BO. BENUO PANTA BAJU','JLN.POROS DSN PUDUK DSA BEDAYAN SEPAUK',3),(7,'BO. SINGA MACAN','JL. SUNGAI KURA DSN LAYANG MENTARI DSA BENUA KENCANA',3),(8,'BO. JELAYAN KAKI KUTA','SELEBAK BINTANG TANI DSA.BENUA BARU',3),(9,'BO. RUMAH SEPAN','JL.JUANG DALAM BLOK D NO.3-4 TJ.NIAGA',5),(10,'BO. SILA NAGA','JL. KAMPUNG LANGAN KEC.BELIMBING',5),(11,'BO. LENGKENAT','JLN.RAYA SINTANG - SEKADAU DESA LENGKENAT',3),(12,'BO. SEMUNTAI','JLN MASJID , SEMUNTAI KEC.SEPAUK',3),(13,'BO. MUKOK','JLN TRANS SP 1 MUKOK KAB.SANGGAU',6),(14,'BO. Nanga Pari 62','JL. KAYU LAPIS KM.62',2),(15,'BO. SIMPANG EMPAT','JLN. POROS SINTANG DS. GONIS BUTUN KEC. SEKADAU',1),(16,'BO. KEDEMBAK AIR TABUN','JL. RAYA KEDEMBAK AIR TABUN',2),(17,'BO. Sinar Pekayau','JL. KM 46 Sinar Pekayau',3),(18,'BO. NANGA TEMPUNAK','DSN.FAJAR DESA TEMPUNAK KAPUAS',3),(19,'BO. SUNGAI LAWAK','DSN. SUNGAI LAWAK KEC. NANGA TAMAN',1),(20,'BO. GURUNG MALI','JL. KAMPUNG RIAM BERSI DESA GURUNG MALI KEC. TEMPUNAK',3),(21,'BO. KOTA BARU','JLN H. ABANG BAKRI DESA SUKA MAJU - KOTA BARU',5),(22,'BO. MENUKUNG','JL.PENDIDIKAN MENUKUNG KEC. MENUKUNG',5),(23,'BO. PIAWAS','JL.KAMPUNG PIAWAS-DS PIAWAS KEC.BELIMBING HULU',5),(24,'BO. Rawak','JL. Rawak - Nanga Taman',1),(25,'BO. MANGKURAT BARU','JLN SEMANGKA  MANGKURAT KEC.SEPAUK',3),(26,'BO. PELAIK KERUAP','DESA PELAIK KERUAP KEC.MENUKUNG KAB.MELAWI',5),(27,'BO. TEMBAWANG ALAK','JL. RAYA KETUNGAU HILIR',3),(28,'BO. NANGA MAHAP','JL. NANGA MAHAP - NANGA TAMAN',1),(29,'BO. BELITANG BERSATU','JLN HM SALEH ALI KEL. BELITANG 2',1),(30,'BO. NANGA ELLA','JLN TANJUNG BERINGIN- ELLA KEC. ELLA KAB. MELAWI',5),(31,'BO. SOLAM RAYA','DUSUN LAMAI NATAI DESA SOLAM RAYA KEC.SUNGAI TEBELIAN',5),(32,'BO. SAYAN','DUSUN TANJUNG PINOH - SAYAN KEC. SAYAN KAB. MELAWI',5),(33,'BO. SIMPANG SILAT','JL. SIMPANG NAGA SILAT',4),(34,'BO. JANGKANG','JL.POROS SP4 JANGKANG',6),(35,'BO. SENANING','JL. JALAN PAHLAWAN SENANING KETUNGAU HULU',3),(36,'BO. NANGA TEBIDAH','DSA. ENTOGONG - NANGA TEBIDAH',2),(37,'BO. BALAI SEPUAK','JLN. RAYA BALAI SEPUAK - KUMPANG ILONG.',1),(38,'BO. LANJAK','JL.LINTAS UTARA- DESA LANJAK DERAS',4),(39,'BO. SUNGAI UTIK','JL. LINTAS UTARA SUNGAI UTIK',4),(40,'BO. Putussibau','JL. KOM YOS SUDARSO',4),(41,'BO. BADAU','Kec. Badau - Putusibau',4),(42,'BO. NANGA KANTUK','JL. SINTANG-PONTIANAK',4),(43,'BO. KELAM','JL. LINGKAR KELAM, DSN. KENUKUT, DESA KEBONG, KEC. KELAM PERMAI',2),(44,'BO. NANGA MERAKAI','JL.SILIWANGI KEC. MERAKAI KAB. SINTANG',3),(45,'BO. Tekalong','Dsa. Tekalong',4),(46,'BO. BENUA MARTINUS','JL.RAYA BENUA MARTINUS KEC.EMBALOH HULU',4),(47,'BO. SIANTAN','JL.GUSTI HAMZAH RUKO NO 2 PONTIANAK',6),(48,'BO. NANGA MAU','JL. TEMBAWANG MALOH',3),(49,'BO. MENTUNAI','JL. DESA MENTUNAI KEC. KAYAN HILIR',3),(50,'BO. TIMPUK','JL. TRANS SP3 TIMPUK',1),(51,'BO. BELIKAI','JL. SINTANG-PONTIANAK',4),(52,'BO. NANGA DANGKAN','JL. POROS PUTUSSIBAU',4),(53,'BO. NANGA TAMAN','JL. NANGA TAMAN-NANGA MAHAP',1),(54,'BO. SANGGAU','JL. SINTANG-PONTIANAK',6),(55,'BO. KANTOR SENTRAL','JL. OEVANG OERAY',2),(56,'BO. AHMAD YANI','JALAN AHMAD YANI PONTIANAK',6),(57,'BO. SIMPANG PINOH','JL. SINTANG-PONTIANAK',2),(58,'BO. Pasar Sekadau','JL. KAPUAS SEKADAU',1),(59,'BO. PINTAS KELADAN','JL. RAYA PINTAS KELADAN',3),(60,'BO. BALAI KARANGAN','BALAI KARANGAN',6),(61,'BO. MANIS RAYA','JL. SINTANG-PONTIANAK',3),(62,'BO. Batu Buil','Jl. Pinoh - Sintang, Simpang SDK Dsa. Batu Buil',5),(63,'BO. KEMBAYAN','Dusun Tapang Raya Desa Tanap Kec. Kembayan Kab. Sanggau',6),(64,'BO. TEMANANG','Dsn. Temanang Sekenuh, Dsa. Sekubang, Kec. Sepauk Kab. Sintang',1),(65,'BO. TAPANG PULAU','SP 4 TAPANG PULAU',1),(66,'BO. MELIAU','Kec. Meliau, Kab. Sanggau',6),(67,'BO. ANJUNGAN','Alamat kantor Anjungan Jln. Anjungan Melancar, Rt/005/ Rw/002 Kelurahan Anjungan melancar, Kecamatan Anjungan, Kabupaten Mempawah. No ruko 88.',6),(68,'BO. SOSOK','Kec. Sosok, Kab Sanggau',6),(69,'BO. KEJAME','KEJAME, KALIMANTAN TENGAH',5),(70,'BO. SIMPANG INDUNG','SIMPANG INDUNG',5),(71,'BO. BODOK','BODOK KOTA',6),(72,'BO. BATANG TARANG','BATANG TARANG',6),(73,'BO. TUMBANG MANJUL','TUMBANG MANJUL',5),(74,'BO. MABOH PERMAI','SP 2 - SUNGAI MABOH',1),(75,'BO. SEMITAU','Kec. Semitau',4),(76,'Balai Berkuak','Balai Berkuak, Ketapang',7),(77,'1','JL. KAPITAN KWEE JIU HOI SINTANG',1),(78,'1','JL. KAPITAN KWEE JIU HOI SINTANG',1),(79,'77','JL. KAPITAN KWEE JIU HOI SINTANG',4),(80,'BO. Sungai Ayak ','Ds. Sungai Ayak II, Kec. Belitang Hilir, Kab.Sekadau, Prov. Kalimantan Barat',1);
/*!40000 ALTER TABLE `cabang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabangaktivis`
--

DROP TABLE IF EXISTS `cabangaktivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabangaktivis` (
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aktivis_id`),
  KEY `cabang_id` (`cabang_id`),
  CONSTRAINT `cabangaktivis_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `cabangaktivis_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabangaktivis`
--

LOCK TABLES `cabangaktivis` WRITE;
/*!40000 ALTER TABLE `cabangaktivis` DISABLE KEYS */;
INSERT INTO `cabangaktivis` VALUES (1,1,'2024-09-04 00:00:00'),(2,2,'2022-08-08 00:00:00'),(3,2,'2015-01-01 00:00:00'),(4,2,'2013-01-01 00:00:00'),(5,2,'2022-01-01 00:00:00'),(6,2,'2022-01-01 00:00:00'),(7,2,'2015-01-01 00:00:00'),(8,2,'2017-01-01 00:00:00'),(9,2,'2015-01-01 00:00:00'),(10,2,'2015-01-01 00:00:00'),(11,2,'2015-01-01 00:00:00'),(12,2,'2021-01-01 00:00:00'),(13,2,'2017-01-01 00:00:00'),(14,1,'2023-01-01 00:00:00'),(15,2,'2015-01-01 00:00:00'),(16,57,'2022-01-01 00:00:00'),(17,1,'2022-01-01 00:00:00'),(18,2,'2017-01-01 00:00:00'),(19,57,'2015-01-01 00:00:00'),(20,2,'2013-01-01 00:00:00');
/*!40000 ALTER TABLE `cabangaktivis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cabangaktivis_history`
--

DROP TABLE IF EXISTS `cabangaktivis_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cabangaktivis_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aktivis_id` (`aktivis_id`),
  KEY `cabang_id` (`cabang_id`),
  CONSTRAINT `cabangaktivis_history_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `cabangaktivis_history_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabangaktivis_history`
--

LOCK TABLES `cabangaktivis_history` WRITE;
/*!40000 ALTER TABLE `cabangaktivis_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `cabangaktivis_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan` (
  `jabatan_id` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(45) NOT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'SYSTEM'),(2,'Field Officer'),(3,'Cashier'),(4,'Admin'),(5,'Accountant'),(6,'Branch Manager'),(7,'Head Office Staf'),(8,'Unit Staf'),(9,'Head Of Department'),(10,'Area Manager'),(11,'CEO'),(12,'Pengurus'),(13,'Office Boy');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatanaktivis`
--

DROP TABLE IF EXISTS `jabatanaktivis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatanaktivis` (
  `aktivis_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aktivis_id`),
  KEY `jabatan_id` (`jabatan_id`),
  CONSTRAINT `jabatanaktivis_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `jabatanaktivis_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatanaktivis`
--

LOCK TABLES `jabatanaktivis` WRITE;
/*!40000 ALTER TABLE `jabatanaktivis` DISABLE KEYS */;
INSERT INTO `jabatanaktivis` VALUES (1,1,'2024-09-04 00:00:00'),(2,7,'2022-08-08 00:00:00'),(3,7,'2015-01-01 00:00:00'),(4,7,'2013-01-01 00:00:00'),(5,7,'2022-01-01 00:00:00'),(6,7,'2022-01-01 00:00:00'),(7,7,'2015-01-01 00:00:00'),(8,7,'2017-01-01 00:00:00'),(9,7,'2015-01-01 00:00:00'),(10,7,'2015-01-01 00:00:00'),(11,7,'2015-01-01 00:00:00'),(12,7,'2021-01-01 00:00:00'),(13,7,'2017-01-01 00:00:00'),(14,6,'2023-01-01 00:00:00'),(15,7,'2015-01-01 00:00:00'),(16,6,'2022-01-01 00:00:00'),(17,3,'2022-01-01 00:00:00'),(18,7,'2017-01-01 00:00:00'),(19,4,'2015-01-01 00:00:00'),(20,7,'2013-01-01 00:00:00');
/*!40000 ALTER TABLE `jabatanaktivis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatanaktivis_history`
--

DROP TABLE IF EXISTS `jabatanaktivis_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatanaktivis_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aktivis_id` (`aktivis_id`),
  KEY `jabatan_id` (`jabatan_id`),
  CONSTRAINT `jabatanaktivis_history_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `jabatanaktivis_history_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatanaktivis_history`
--

LOCK TABLES `jabatanaktivis_history` WRITE;
/*!40000 ALTER TABLE `jabatanaktivis_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatanaktivis_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `komentar` (
  `komentar_id` int NOT NULL AUTO_INCREMENT,
  `tiket_id` int NOT NULL,
  `aktivis_id` int DEFAULT NULL,
  `komen` text,
  `status` enum('Submited','Reject','Reviewed','Confirmed','In Progress','Solved','Closed') NOT NULL,
  `tgl_komen` datetime NOT NULL,
  PRIMARY KEY (`komentar_id`),
  KEY `komentar_ibfk_1_idx` (`tiket_id`),
  KEY `komentar_ibfk_2` (`aktivis_id`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
INSERT INTO `komentar` VALUES (1,1,14,'Tiket di Submit','Submited','2024-09-19 12:36:33'),(2,1,15,'good, lanjut ke PIC','Confirmed','2024-09-19 12:37:15'),(3,1,3,'ok, on progres','In Progress','2024-09-19 12:37:48'),(4,1,3,'done, silahkan cekj lagi di SIP','Solved','2024-09-19 12:39:09'),(5,1,14,'Dinyatakan Selesai dari BO','Closed','2024-09-19 12:40:11'),(6,2,16,'Tiket di Submit','Submited','2024-09-20 15:47:59'),(7,2,15,'ganti gambarnya, gak apropriate','Reject','2024-09-20 15:49:43'),(8,2,16,'Tiket di Submit','Submited','2024-09-20 15:52:18'),(9,2,15,'ok, lajut ke PIC','Confirmed','2024-09-20 15:52:58'),(10,2,4,'baik,sdang dikerjakan, mohon ditunggu','In Progress','2024-09-20 15:55:50'),(11,2,4,'done, silahkan dicek algi di SIP','Solved','2024-09-20 15:57:39'),(12,2,16,'Dinyatakan Selesai dari BO','Closed','2024-09-20 15:58:04');
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `login_view`
--

DROP TABLE IF EXISTS `login_view`;
/*!50001 DROP VIEW IF EXISTS `login_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `login_view` AS SELECT 
 1 AS `user_id`,
 1 AS `aktivis_id`,
 1 AS `nia`,
 1 AS `nama_pengguna`,
 1 AS `jk`,
 1 AS `no_hp`,
 1 AS `asal`,
 1 AS `username`,
 1 AS `active`,
 1 AS `password_hash`,
 1 AS `cabang_id`,
 1 AS `kantor`,
 1 AS `jabatan_id`,
 1 AS `posisi`,
 1 AS `namagroup_id`,
 1 AS `nama_group`,
 1 AS `area_ids`,
 1 AS `nama_areas`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pic` (
  `pic_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `area_id` int DEFAULT NULL,
  PRIMARY KEY (`pic_id`),
  KEY `pic_ibfk_2_idx` (`area_id`),
  KEY `pic_ibfk_1_idx` (`user_id`),
  CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pic_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pic`
--

LOCK TABLES `pic` WRITE;
/*!40000 ALTER TABLE `pic` DISABLE KEYS */;
INSERT INTO `pic` VALUES (3,5,3),(4,6,4),(5,7,5),(6,8,6),(7,9,1),(8,10,6),(9,11,2),(12,18,2),(13,9,3),(14,18,3),(15,10,4),(17,13,5),(18,18,4),(20,3,1),(21,13,6),(22,9,5),(23,18,1),(24,4,2);
/*!40000 ALTER TABLE `pic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'SISTEM'),(2,'Administrator'),(3,'PIC Software'),(4,'PIC Hardware'),(5,'PIC Network'),(6,'PIC LKD'),(7,'Validators'),(9,'BO');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiket`
--

DROP TABLE IF EXISTS `tiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiket` (
  `tiket_id` int NOT NULL AUTO_INCREMENT,
  `noTiket` varchar(255) DEFAULT NULL,
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `tiket_kategori` enum('Network','Software','Hardware','LKD','POLJAK','SISTEM') NOT NULL,
  `deskripsi` text NOT NULL,
  `aktivis_yg_salah` int NOT NULL,
  `file_document` varchar(255) DEFAULT NULL,
  `file_image` varchar(255) DEFAULT NULL,
  `status` enum('Open','Submited','Reject','Reviewed','Confirmed','In Progress','Solved','Closed') NOT NULL DEFAULT 'Open',
  `tgl_input` datetime NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`tiket_id`),
  KEY `tiket_ibfk_1_idx` (`aktivis_id`),
  KEY `tiket_ibfk_2_idx` (`cabang_id`),
  KEY `tiket_ibfk_3_idx` (`jabatan_id`),
  KEY `tiket_ibfk_4_idx` (`aktivis_yg_salah`),
  CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`),
  CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`),
  CONSTRAINT `tiket_ibfk_4` FOREIGN KEY (`aktivis_yg_salah`) REFERENCES `aktivis` (`aktivis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiket`
--

LOCK TABLES `tiket` WRITE;
/*!40000 ALTER TABLE `tiket` DISABLE KEYS */;
INSERT INTO `tiket` VALUES (1,'SOF-000002',14,1,6,'Software','salah TAK',17,'tiket_file_1726724193.xlsx','tiket_img_1726724193.png','Closed','2024-09-19 12:36:33','2024-09-19 12:40:11'),(2,'SOF-000003',16,57,6,'Software','Salah Input MAter Simpanan',19,'tiket_file_1726822338.xlsx','tiket_img_1726822338.png','Closed','2024-09-20 15:52:18','2024-09-20 15:58:04');
/*!40000 ALTER TABLE `tiket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tikethistory`
--

DROP TABLE IF EXISTS `tikethistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tikethistory` (
  `tikethistory_id` int NOT NULL AUTO_INCREMENT,
  `tiket_id` int DEFAULT NULL,
  `komentar_id` int DEFAULT NULL,
  `state` enum('Open','Submited','Reject','Reviewed','Confirmed','In Progress','Solved','Closed') NOT NULL,
  PRIMARY KEY (`tikethistory_id`),
  KEY `fk_tikethistory_1_idx` (`tiket_id`),
  KEY `fk_tikethistory_2_idx` (`komentar_id`),
  CONSTRAINT `fk_tikethistory_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`),
  CONSTRAINT `fk_tikethistory_2` FOREIGN KEY (`komentar_id`) REFERENCES `komentar` (`komentar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tikethistory`
--

LOCK TABLES `tikethistory` WRITE;
/*!40000 ALTER TABLE `tikethistory` DISABLE KEYS */;
INSERT INTO `tikethistory` VALUES (1,1,1,'Submited'),(2,1,2,'Confirmed'),(3,1,3,'In Progress'),(4,1,4,'Solved'),(5,1,5,'Closed'),(6,2,6,'Submited'),(7,2,7,'Reject'),(8,2,8,'Submited'),(9,2,9,'Confirmed'),(10,2,10,'In Progress'),(11,2,11,'Solved'),(12,2,12,'Closed');
/*!40000 ALTER TABLE `tikethistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tugastiket`
--

DROP TABLE IF EXISTS `tugastiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tugastiket` (
  `tugastiket_id` int NOT NULL AUTO_INCREMENT,
  `tiket_id` int NOT NULL,
  `tugaskan_ke` int NOT NULL,
  `tgl_penugasan` datetime NOT NULL,
  PRIMARY KEY (`tugastiket_id`),
  KEY `tugastiket_ibfk_1_idx` (`tiket_id`),
  KEY `tugastiket_ibfk_2_idx` (`tugaskan_ke`),
  CONSTRAINT `tugastiket_ibfk_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`),
  CONSTRAINT `tugastiket_ibfk_2` FOREIGN KEY (`tugaskan_ke`) REFERENCES `user` (`aktivis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugastiket`
--

LOCK TABLES `tugastiket` WRITE;
/*!40000 ALTER TABLE `tugastiket` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugastiket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `aktivis_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `active` int DEFAULT '1',
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_ibfk_1_idx` (`aktivis_id`),
  KEY `user_ibfk_2_idx` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`aktivis_id`) REFERENCES `aktivis` (`aktivis_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'keling','kumang',2,1),(2,2,'yensi','123456!',2,2),(3,3,'andreas','123456!',2,3),(4,4,'hendro','123456!',2,3),(5,5,'indra','123456!',2,3),(6,6,'chicka','123456!',2,3),(7,7,'gregorius','123456!',2,3),(8,8,'riyo','123456!',2,3),(9,9,'ridwan','123456!',2,5),(10,10,'yanto','123456!',2,5),(11,11,'evan','123456!',2,5),(12,12,'heronimus','123456!',2,5),(13,13,'goprid','123456!',2,4),(14,14,'udoi','123456!',2,9),(15,15,'eki','123456!',2,7),(16,16,'alex','123456!',2,9),(17,18,'yamete','kudashai',2,6),(18,20,'abet','123456!',2,4);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `user_aktivis`
--

DROP TABLE IF EXISTS `user_aktivis`;
/*!50001 DROP VIEW IF EXISTS `user_aktivis`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `user_aktivis` AS SELECT 
 1 AS `user_id`,
 1 AS `username`,
 1 AS `aktivis_id`,
 1 AS `nia`,
 1 AS `nama_aktivis`,
 1 AS `jk`,
 1 AS `no_hp`,
 1 AS `asal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_cabang`
--

DROP TABLE IF EXISTS `view_cabang`;
/*!50001 DROP VIEW IF EXISTS `view_cabang`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_cabang` AS SELECT 
 1 AS `cabang_id`,
 1 AS `nama_cabang`,
 1 AS `alamat_cabang`,
 1 AS `cabang_area_id`,
 1 AS `nama_area`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_pic_detail`
--

DROP TABLE IF EXISTS `view_pic_detail`;
/*!50001 DROP VIEW IF EXISTS `view_pic_detail`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_pic_detail` AS SELECT 
 1 AS `PIC_Software_pic_id`,
 1 AS `PIC_Software`,
 1 AS `PIC_Software_user_id`,
 1 AS `PIC_Hardware_pic_id`,
 1 AS `PIC_Hardware`,
 1 AS `PIC_Hardware_user_id`,
 1 AS `PIC_Network_pic_id`,
 1 AS `PIC_Network`,
 1 AS `PIC_Network_user_id`,
 1 AS `area_id`,
 1 AS `nama_area`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_tiket_details`
--

DROP TABLE IF EXISTS `view_tiket_details`;
/*!50001 DROP VIEW IF EXISTS `view_tiket_details`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_tiket_details` AS SELECT 
 1 AS `tiket_id`,
 1 AS `no_tiket`,
 1 AS `aktivis_id`,
 1 AS `nama_aktivis`,
 1 AS `cabang_id`,
 1 AS `nama_cabang`,
 1 AS `jabatan_id`,
 1 AS `nama_jabatan`,
 1 AS `area_id`,
 1 AS `area`,
 1 AS `tiket_kategori`,
 1 AS `deskripsi`,
 1 AS `aktivis_id_salah`,
 1 AS `aktivis_yg_salah`,
 1 AS `jabatan_aktivis_yg_salah`,
 1 AS `file_document`,
 1 AS `file_image`,
 1 AS `status`,
 1 AS `tgl_input`,
 1 AS `tgl_update`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_tiket_history`
--

DROP TABLE IF EXISTS `view_tiket_history`;
/*!50001 DROP VIEW IF EXISTS `view_tiket_history`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_tiket_history` AS SELECT 
 1 AS `tiket_id`,
 1 AS `komentar_id`,
 1 AS `aktivis_id`,
 1 AS `nama_aktivis`,
 1 AS `komen`,
 1 AS `tgl_komen`,
 1 AS `state`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `aktivis_cabang_view`
--

/*!50001 DROP VIEW IF EXISTS `aktivis_cabang_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `aktivis_cabang_view` AS select `cb`.`cabang_id` AS `cabang_id`,`cb`.`nama_cabang` AS `nama_cabang`,`jb`.`nama_jabatan` AS `nama_jabatan`,`ar`.`nama_area` AS `nama_area`,`a`.`aktivis_id` AS `aktivis_id`,`a`.`nia` AS `nia`,`a`.`nama_aktivis` AS `nama_aktivis`,`a`.`jk` AS `jk`,`a`.`no_hp` AS `no_hp`,`a`.`asal` AS `asal` from (((((`aktivis` `a` join `cabangaktivis` `c` on((`a`.`aktivis_id` = `c`.`aktivis_id`))) join `jabatanaktivis` `j` on((`a`.`aktivis_id` = `j`.`aktivis_id`))) join `cabang` `cb` on((`c`.`cabang_id` = `cb`.`cabang_id`))) join `jabatan` `jb` on((`j`.`jabatan_id` = `jb`.`jabatan_id`))) join `area` `ar` on((`cb`.`area_id` = `ar`.`area_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `login_view`
--

/*!50001 DROP VIEW IF EXISTS `login_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `login_view` AS select `user`.`user_id` AS `user_id`,`aktivis`.`aktivis_id` AS `aktivis_id`,`aktivis`.`nia` AS `nia`,`aktivis`.`nama_aktivis` AS `nama_pengguna`,`aktivis`.`jk` AS `jk`,`aktivis`.`no_hp` AS `no_hp`,`aktivis`.`asal` AS `asal`,`user`.`username` AS `username`,`user`.`active` AS `active`,`user`.`password_hash` AS `password_hash`,`cabang`.`cabang_id` AS `cabang_id`,`cabang`.`nama_cabang` AS `kantor`,`jabatan`.`jabatan_id` AS `jabatan_id`,`jabatan`.`nama_jabatan` AS `posisi`,`role`.`role_id` AS `namagroup_id`,`role`.`nama_role` AS `nama_group`,group_concat(distinct `pic`.`area_id` order by `pic`.`area_id` ASC separator ',') AS `area_ids`,group_concat(distinct `area`.`nama_area` order by `area`.`nama_area` ASC separator ',') AS `nama_areas` from ((((((((`user` join `aktivis` on((`user`.`aktivis_id` = `aktivis`.`aktivis_id`))) join `jabatanaktivis` on((`aktivis`.`aktivis_id` = `jabatanaktivis`.`aktivis_id`))) join `jabatan` on((`jabatanaktivis`.`jabatan_id` = `jabatan`.`jabatan_id`))) join `cabangaktivis` on((`aktivis`.`aktivis_id` = `cabangaktivis`.`aktivis_id`))) join `cabang` on((`cabangaktivis`.`cabang_id` = `cabang`.`cabang_id`))) join `role` on((`user`.`role_id` = `role`.`role_id`))) left join `pic` on((`user`.`user_id` = `pic`.`user_id`))) left join `area` on((`pic`.`area_id` = `area`.`area_id`))) group by `user`.`user_id`,`aktivis`.`aktivis_id`,`aktivis`.`nia`,`aktivis`.`nama_aktivis`,`aktivis`.`jk`,`aktivis`.`no_hp`,`aktivis`.`asal`,`user`.`username`,`user`.`active`,`user`.`password_hash`,`cabang`.`cabang_id`,`cabang`.`nama_cabang`,`jabatan`.`jabatan_id`,`jabatan`.`nama_jabatan`,`role`.`role_id`,`role`.`nama_role` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `user_aktivis`
--

/*!50001 DROP VIEW IF EXISTS `user_aktivis`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `user_aktivis` AS select `u`.`user_id` AS `user_id`,`u`.`username` AS `username`,`a`.`aktivis_id` AS `aktivis_id`,`a`.`nia` AS `nia`,`a`.`nama_aktivis` AS `nama_aktivis`,`a`.`jk` AS `jk`,`a`.`no_hp` AS `no_hp`,`a`.`asal` AS `asal` from (`aktivis` `a` join `user` `u` on((`a`.`aktivis_id` = `u`.`aktivis_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_cabang`
--

/*!50001 DROP VIEW IF EXISTS `view_cabang`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_cabang` AS select `cabang`.`cabang_id` AS `cabang_id`,`cabang`.`nama_cabang` AS `nama_cabang`,`cabang`.`alamat_cabang` AS `alamat_cabang`,`cabang`.`area_id` AS `cabang_area_id`,`area`.`nama_area` AS `nama_area` from (`cabang` join `area`) where (`cabang`.`area_id` = `area`.`area_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_pic_detail`
--

/*!50001 DROP VIEW IF EXISTS `view_pic_detail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_pic_detail` AS select max((case when ((`role`.`role_id` = 3) and (`aktivis`.`nama_aktivis` is not null)) then `pic`.`pic_id` else NULL end)) AS `PIC_Software_pic_id`,max((case when (`role`.`role_id` = 3) then `aktivis`.`nama_aktivis` else NULL end)) AS `PIC_Software`,max((case when (`role`.`role_id` = 3) then `user`.`user_id` else NULL end)) AS `PIC_Software_user_id`,max((case when ((`role`.`role_id` = 4) and (`aktivis`.`nama_aktivis` is not null)) then `pic`.`pic_id` else NULL end)) AS `PIC_Hardware_pic_id`,max((case when (`role`.`role_id` = 4) then `aktivis`.`nama_aktivis` else NULL end)) AS `PIC_Hardware`,max((case when (`role`.`role_id` = 4) then `user`.`user_id` else NULL end)) AS `PIC_Hardware_user_id`,max((case when ((`role`.`role_id` = 5) and (`aktivis`.`nama_aktivis` is not null)) then `pic`.`pic_id` else NULL end)) AS `PIC_Network_pic_id`,max((case when (`role`.`role_id` = 5) then `aktivis`.`nama_aktivis` else NULL end)) AS `PIC_Network`,max((case when (`role`.`role_id` = 5) then `user`.`user_id` else NULL end)) AS `PIC_Network_user_id`,`area`.`area_id` AS `area_id`,`area`.`nama_area` AS `nama_area` from ((((`area` left join `pic` on((`pic`.`area_id` = `area`.`area_id`))) left join `user` on((`user`.`user_id` = `pic`.`user_id`))) left join `aktivis` on((`aktivis`.`aktivis_id` = `user`.`aktivis_id`))) left join `role` on((`role`.`role_id` = `user`.`role_id`))) group by `area`.`area_id`,`area`.`nama_area` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_tiket_details`
--

/*!50001 DROP VIEW IF EXISTS `view_tiket_details`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_tiket_details` AS select `t`.`tiket_id` AS `tiket_id`,`t`.`noTiket` AS `no_tiket`,`t`.`aktivis_id` AS `aktivis_id`,`a`.`nama_aktivis` AS `nama_aktivis`,`c`.`cabang_id` AS `cabang_id`,`c`.`nama_cabang` AS `nama_cabang`,`j`.`jabatan_id` AS `jabatan_id`,`j`.`nama_jabatan` AS `nama_jabatan`,`ar`.`area_id` AS `area_id`,`ar`.`nama_area` AS `area`,`t`.`tiket_kategori` AS `tiket_kategori`,`t`.`deskripsi` AS `deskripsi`,`t`.`aktivis_yg_salah` AS `aktivis_id_salah`,`salah`.`nama_aktivis` AS `aktivis_yg_salah`,`salah_j`.`nama_jabatan` AS `jabatan_aktivis_yg_salah`,`t`.`file_document` AS `file_document`,`t`.`file_image` AS `file_image`,`t`.`status` AS `status`,`t`.`tgl_input` AS `tgl_input`,`t`.`tgl_update` AS `tgl_update` from ((((((`tiket` `t` join `aktivis` `a` on((`t`.`aktivis_id` = `a`.`aktivis_id`))) join `cabang` `c` on((`t`.`cabang_id` = `c`.`cabang_id`))) join `jabatan` `j` on((`t`.`jabatan_id` = `j`.`jabatan_id`))) left join `area` `ar` on((`c`.`area_id` = `ar`.`area_id`))) left join `aktivis` `salah` on((`t`.`aktivis_yg_salah` = `salah`.`aktivis_id`))) left join (select `ja_salah`.`aktivis_id` AS `aktivis_id`,group_concat(distinct `j_salah`.`nama_jabatan` order by `j_salah`.`nama_jabatan` ASC separator ', ') AS `nama_jabatan` from (`jabatanaktivis` `ja_salah` join `jabatan` `j_salah` on((`ja_salah`.`jabatan_id` = `j_salah`.`jabatan_id`))) group by `ja_salah`.`aktivis_id`) `salah_j` on((`salah`.`aktivis_id` = `salah_j`.`aktivis_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_tiket_history`
--

/*!50001 DROP VIEW IF EXISTS `view_tiket_history`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`development`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_tiket_history` AS select `k`.`tiket_id` AS `tiket_id`,`k`.`komentar_id` AS `komentar_id`,`a`.`aktivis_id` AS `aktivis_id`,`a`.`nama_aktivis` AS `nama_aktivis`,`k`.`komen` AS `komen`,`k`.`tgl_komen` AS `tgl_komen`,`th`.`state` AS `state` from ((`tikethistory` `th` join `komentar` `k` on((`k`.`komentar_id` = `th`.`komentar_id`))) join `aktivis` `a` on((`a`.`aktivis_id` = `k`.`aktivis_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-03 15:58:22

-- trigger for table komentar
CREATE DEFINER=`development`@`%` TRIGGER `after_komentar_insert` AFTER INSERT ON `komentar` FOR EACH ROW BEGIN
    -- Insert into tikethistory using the newly inserted data from komentar
    INSERT INTO tikethistory (tiket_id, komentar_id, state)
    VALUES (NEW.tiket_id, NEW.komentar_id, NEW.status);
END
