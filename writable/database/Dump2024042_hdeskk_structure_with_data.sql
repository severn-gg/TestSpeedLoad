-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: hdeskk
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aktivis`
--

LOCK TABLES `aktivis` WRITE;
/*!40000 ALTER TABLE `aktivis` DISABLE KEYS */;
INSERT INTO `aktivis` VALUES (1,'NIA010101','Yensi Kumala','Perempuan','0812774584','Nanga Pinoh'),(2,'NIA020202','Tendo Padagi','Laki-laki','08127734854','Tapang Semadak'),(3,'NIA030303','Ridwan','Laki-laki','0812778345','Sepauk'),(4,'NIA040404','Andi Sianida','Laki-laki','081277834578','Kelam'),(5,'NIA9872345','Hendro Lusianus','Laki-laki','0812784534','Sepuak'),(6,'NIA934954','Riyo Anggri','Laki-laki','0878234657235','Sintang'),(7,'NIA9345834','Popol dan Kupa','Perempuan','08673456','Sintang'),(8,'NIA00349543','Ansilmus','Laki-laki','0823746235','Sekadau'),(9,'NIA943459','Sulaniwati','Perempuan','08234573','Sekadau'),(10,'NIA0102102301','Kristina Norliani','Perempuan','08123766234','Manis Raya'),(11,'NIA934859345','Yohana Feridiana','perempuan','08738465544','Tanah Putih'),(12,'NIA86778678','Baldus Junior','Laki-laki','086672342','Sintang'),(13,'NIA394589345','Anita Carolina','Perempuan','08236472634','Melawi'),(14,'NIA283478234','Mikaria Lestari','Perempuan','08778623478','Sepauk');
/*!40000 ALTER TABLE `aktivis` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `area` VALUES (1,'Sekadau'),(2,'Sintang I'),(3,'Sintang II'),(4,'Kapuas Hulu'),(5,'Melawi'),(6,'Sanggau-PTK');
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabang`
--

LOCK TABLES `cabang` WRITE;
/*!40000 ALTER TABLE `cabang` DISABLE KEYS */;
INSERT INTO `cabang` VALUES (1,'BO. RUMAH PUNYUNG','JL. KAPITAN KWEE JIU HOI SINTANG',2),(2,'HEAD OFFICE','JLN OEVANG OERAY NO 33 KEL.BANING KOTA KEC.SINTANG',2),(3,'BO. KANTOR PUSAT','JLN.SEKADAU-SINTANG KM 27,DSA TAPANG SEMADAK',1),(4,'BO. SEKADAU BERSATU','JL. SINTANG-PONTIANAK',1),(5,'BO. BATU SADO MACAN','JLN.KAYU LAPIS KM 23,DSA NANGA PEMBULUH LOTONG',1),(6,'BO. BENUO PANTA BAJU','JLN.POROS DSN PUDUK DSA BEDAYAN SEPAUK',3),(7,'BO. SINGA MACAN','JL. SUNGAI KURA DSN LAYANG MENTARI DSA BENUA KENCANA',3),(8,'BO. JELAYAN KAKI KUTA','SELEBAK BINTANG TANI DSA.BENUA BARU',3),(9,'BO. RUMAH SEPAN','JL.JUANG DALAM BLOK D NO.3-4 TJ.NIAGA',5),(10,'BO. SILA NAGA','JL. KAMPUNG LANGAN KEC.BELIMBING',5),(11,'BO. LENGKENAT','JLN.RAYA SINTANG - SEKADAU DESA LENGKENAT',3),(12,'BO. SEMUNTAI','JLN MASJID , SEMUNTAI KEC.SEPAUK',3),(13,'BO. MUKOK','JLN TRANS SP 1 MUKOK KAB.SANGGAU',6),(14,'BO. Nanga Pari 62','JL. KAYU LAPIS KM.62',2),(15,'BO. SIMPANG EMPAT','JLN. POROS SINTANG DS. GONIS BUTUN KEC. SEKADAU',1),(16,'BO. KEDEMBAK AIR TABUN','JL. RAYA KEDEMBAK AIR TABUN',2),(17,'BO. Sinar Pekayau','JL. KM 46 Sinar Pekayau',3),(18,'BO. NANGA TEMPUNAK','DSN.FAJAR DESA TEMPUNAK KAPUAS',3),(19,'BO. SUNGAI LAWAK','DSN. SUNGAI LAWAK KEC. NANGA TAMAN',1),(20,'BO. GURUNG MALI','JL. KAMPUNG RIAM BERSI DESA GURUNG MALI KEC. TEMPUNAK',3),(21,'BO. KOTA BARU','JLN H. ABANG BAKRI DESA SUKA MAJU - KOTA BARU',5),(22,'BO. MENUKUNG','JL.PENDIDIKAN MENUKUNG KEC. MENUKUNG',5),(23,'BO. PIAWAS','JL.KAMPUNG PIAWAS-DS PIAWAS KEC.BELIMBING HULU',5),(24,'BO. Rawak','JL. Rawak - Nanga Taman',1),(25,'BO. MANGKURAT BARU','JLN SEMANGKA  MANGKURAT KEC.SEPAUK',3),(26,'BO. PELAIK KERUAP','DESA PELAIK KERUAP KEC.MENUKUNG KAB.MELAWI',5),(27,'BO. TEMBAWANG ALAK','JL. RAYA KETUNGAU HILIR',3),(28,'BO. NANGA MAHAP','JL. NANGA MAHAP - NANGA TAMAN',1),(29,'BO. BELITANG BERSATU','JLN HM SALEH ALI KEL. BELITANG 2',1),(30,'BO. NANGA ELLA','JLN TANJUNG BERINGIN- ELLA KEC. ELLA KAB. MELAWI',5),(31,'BO. SOLAM RAYA','DUSUN LAMAI NATAI DESA SOLAM RAYA KEC.SUNGAI TEBELIAN',5),(32,'BO. SAYAN','DUSUN TANJUNG PINOH - SAYAN KEC. SAYAN KAB. MELAWI',5),(33,'BO. SIMPANG SILAT','JL. SIMPANG NAGA SILAT',4),(34,'BO. JANGKANG','JL.POROS SP4 JANGKANG',6),(35,'BO. SENANING','JL. JALAN PAHLAWAN SENANING KETUNGAU HULU',3),(36,'BO. NANGA TEBIDAH','DSA. ENTOGONG - NANGA TEBIDAH',2),(37,'BO. BALAI SEPUAK','JLN. RAYA BALAI SEPUAK - KUMPANG ILONG.',1),(38,'BO. LANJAK','JL.LINTAS UTARA- DESA LANJAK DERAS',4),(39,'BO. SUNGAI UTIK','JL. LINTAS UTARA SUNGAI UTIK',4),(40,'BO. Putussibau','JL. KOM YOS SUDARSO',4),(41,'BO. BADAU','Kec. Badau - Putusibau',4),(42,'BO. NANGA KANTUK','JL. SINTANG-PONTIANAK',4),(43,'BO. KELAM','JL. LINGKAR KELAM, DSN. KENUKUT, DESA KEBONG, KEC. KELAM PERMAI',2),(44,'BO. NANGA MERAKAI','JL.SILIWANGI KEC. MERAKAI KAB. SINTANG',3),(45,'BO. Tekalong','Dsa. Tekalong',4),(46,'BO. BENUA MARTINUS','JL.RAYA BENUA MARTINUS KEC.EMBALOH HULU',4),(47,'BO. SIANTAN','JL.GUSTI HAMZAH RUKO NO 2 PONTIANAK',6),(48,'BO. NANGA MAU','JL. TEMBAWANG MALOH',3),(49,'BO. MENTUNAI','JL. DESA MENTUNAI KEC. KAYAN HILIR',3),(50,'BO. TIMPUK','JL. TRANS SP3 TIMPUK',1),(51,'BO. BELIKAI','JL. SINTANG-PONTIANAK',4),(52,'BO. NANGA DANGKAN','JL. POROS PUTUSSIBAU',4),(53,'BO. NANGA TAMAN','JL. NANGA TAMAN-NANGA MAHAP',1),(54,'BO. SANGGAU','JL. SINTANG-PONTIANAK',6),(55,'BO. KANTOR SENTRAL','JL. OEVANG OERAY',2),(56,'BO. AHMAD YANI','JALAN AHMAD YANI PONTIANAK',6),(57,'BO. SIMPANG PINOH','JL. SINTANG-PONTIANAK',3),(58,'BO. Pasar Sekadau','JL. KAPUAS SEKADAU',1),(59,'BO. PINTAS KELADAN','JL. RAYA PINTAS KELADAN',3),(60,'BO. BALAI KARANGAN','BALAI KARANGAN',6),(61,'BO. MANIS RAYA','JL. SINTANG-PONTIANAK',3),(62,'BO. Batu Buil','Jl. Pinoh - Sintang, Simpang SDK Dsa. Batu Buil',5),(63,'BO. KEMBAYAN','Dusun Tapang Raya Desa Tanap Kec. Kembayan Kab. Sanggau',6),(64,'BO. TEMANANG','Dsn. Temanang Sekenuh, Dsa. Sekubang, Kec. Sepauk Kab. Sintang',1),(65,'BO. TAPANG PULAU','SP 4 TAPANG PULAU',1),(66,'BO. MELIAU','Kec. Meliau, Kab. Sanggau',6),(67,'BO. ANJUNGAN','Alamat kantor Anjungan Jln. Anjungan Melancar, Rt/005/ Rw/002 Kelurahan Anjungan melancar, Kecamatan Anjungan, Kabupaten Mempawah. No ruko 88.',6),(68,'BO. SOSOK','Kec. Sosok, Kab Sanggau',6),(69,'BO. KEJAME','KEJAME, KALIMANTAN TENGAH',5),(70,'BO. SIMPANG INDUNG','SIMPANG INDUNG',5),(71,'BO. BODOK','BODOK KOTA',6),(72,'BO. BATANG TARANG','BATANG TARANG',6),(73,'BO. TUMBANG MANJUL','TUMBANG MANJUL',5),(74,'BO. MABOH PERMAI','SP 2 - SUNGAI MABOH',1),(75,'BO. SEMITAU','Kec. Semitau',4);
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
INSERT INTO `cabangaktivis` VALUES (8,47,'2024-06-13 07:55:14'),(9,47,'2024-06-13 07:55:14'),(10,3,'2024-06-13 07:55:14'),(11,3,'2024-06-13 07:55:14'),(12,55,'2024-06-13 07:55:14'),(13,55,'2024-06-13 07:55:14'),(14,11,'2024-06-13 07:55:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'OB'),(2,'FO'),(3,'Cashier'),(4,'Admin'),(5,'Accountant'),(6,'Branch Manager'),(7,'Staf HO'),(8,'Kadep'),(9,'');
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
INSERT INTO `jabatanaktivis` VALUES (1,7,'2024-06-13 15:53:35'),(2,7,'2024-06-13 15:53:35'),(3,7,'2024-06-13 15:53:35'),(4,7,'2024-06-13 15:53:35'),(5,7,'2024-06-13 15:53:35'),(6,7,'2024-06-13 15:53:35'),(7,7,'2024-06-13 15:53:35'),(8,6,'2024-06-13 15:53:35'),(9,5,'2024-06-13 15:53:35'),(10,6,'2024-06-13 15:53:35'),(11,3,'2024-06-13 15:53:35'),(12,6,'2024-06-13 15:53:35'),(13,5,'2024-06-13 15:53:35'),(14,4,'2024-06-13 15:53:35');
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
  `user_id` int NOT NULL,
  `komen` text NOT NULL,
  `tgl_komen` datetime NOT NULL,
  PRIMARY KEY (`komentar_id`),
  KEY `komentar_ibfk_1_idx` (`tiket_id`),
  KEY `komentar_ibfk_2_idx` (`user_id`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`tiket_id`) REFERENCES `tiket` (`tiket_id`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
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
 1 AS `nama_pengguna`,
 1 AS `username`,
 1 AS `active`,
 1 AS `password_hash`,
 1 AS `cabang_id`,
 1 AS `kantor`,
 1 AS `jabatan_id`,
 1 AS `posisi`,
 1 AS `namagroup_id`,
 1 AS `nama_group`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pic` (
  `user_id` int DEFAULT NULL,
  `area_id` int DEFAULT NULL,
  KEY `pic_ibfk_2_idx` (`area_id`),
  KEY `pic_ibfk_1_idx` (`user_id`),
  CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pic_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pic`
--

LOCK TABLES `pic` WRITE;
/*!40000 ALTER TABLE `pic` DISABLE KEYS */;
INSERT INTO `pic` VALUES (2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(3,1),(3,2),(3,3),(3,4),(3,5),(3,6),(4,1),(5,2),(6,1),(6,2),(6,3),(6,4),(6,5),(6,6);
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
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrator'),(2,'Software'),(3,'Hardware'),(4,'Network'),(5,'LKD'),(6,'Validators'),(7,'Jer BO'),(8,'Acc BO');
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
  `aktivis_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `jabatan_id` int NOT NULL,
  `tiket_kategori` enum('Network','Software','Hardware','LKD','POLJAK') NOT NULL,
  `deskripsi` text NOT NULL,
  `aktivis_yg_salah` int NOT NULL,
  `file_document` varchar(255) DEFAULT NULL,
  `file_image` varchar(255) DEFAULT NULL,
  `status` enum('Open','In Progress','Resolved','Closed') NOT NULL DEFAULT 'Open',
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiket`
--

LOCK TABLES `tiket` WRITE;
/*!40000 ALTER TABLE `tiket` DISABLE KEYS */;
INSERT INTO `tiket` VALUES (1,8,47,6,'Software','salah input setoran',9,'form.docx','sulan.png','Open','2024-05-29 00:00:00',NULL),(3,10,3,6,'Hardware','printer kasir error',11,'form.docx','yo.png','Closed','2024-05-23 00:00:00',NULL),(4,12,55,6,'Software','salah TAK',13,'form.docx','anita.png','Open','2024-05-30 00:00:00',NULL),(5,10,11,6,'Software','Salah input master ',14,'form.docx','mika.png','Open','2024-05-30 00:00:00',NULL);
/*!40000 ALTER TABLE `tiket` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'yensi','123456!',2,1),(2,2,'tendo','123456!',2,3),(3,3,'ridwan','123456!',2,4),(4,4,'andi','123456!',2,2),(5,5,'hendro','123456!',2,2),(6,6,'riyo','123456!',2,5),(7,7,'kupa','123456!',2,6),(8,8,'ansil','123456!',2,7),(33,10,'kristin','123456!',2,7),(34,12,'baldus','123456!',2,7);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_tiket_details`
--

DROP TABLE IF EXISTS `view_tiket_details`;
/*!50001 DROP VIEW IF EXISTS `view_tiket_details`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_tiket_details` AS SELECT 
 1 AS `tiket_id`,
 1 AS `aktivis_id`,
 1 AS `nama_aktivis`,
 1 AS `nama_cabang`,
 1 AS `nama_jabatan`,
 1 AS `area_id`,
 1 AS `area`,
 1 AS `tiket_kategori`,
 1 AS `deskripsi`,
 1 AS `aktivis_id_salah`,
 1 AS `aktivis_yg_salah`,
 1 AS `file_document`,
 1 AS `file_image`,
 1 AS `status`,
 1 AS `tgl_input`,
 1 AS `tgl_update`*/;
SET character_set_client = @saved_cs_client;

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
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `login_view` AS select `user`.`user_id` AS `user_id`,`aktivis`.`aktivis_id` AS `aktivis_id`,`aktivis`.`nama_aktivis` AS `nama_pengguna`,`user`.`username` AS `username`,`user`.`active` AS `active`,`user`.`password_hash` AS `password_hash`,`cabang`.`cabang_id` AS `cabang_id`,`cabang`.`nama_cabang` AS `kantor`,`jabatan`.`jabatan_id` AS `jabatan_id`,`jabatan`.`nama_jabatan` AS `posisi`,`role`.`role_id` AS `namagroup_id`,`role`.`role_name` AS `nama_group` from ((((((`user` join `aktivis` on((`user`.`aktivis_id` = `aktivis`.`aktivis_id`))) join `jabatanaktivis` on((`aktivis`.`aktivis_id` = `jabatanaktivis`.`aktivis_id`))) join `jabatan` on((`jabatanaktivis`.`jabatan_id` = `jabatan`.`jabatan_id`))) join `cabangaktivis` on((`aktivis`.`aktivis_id` = `cabangaktivis`.`aktivis_id`))) join `cabang` on((`cabangaktivis`.`cabang_id` = `cabang`.`cabang_id`))) join `role` on((`user`.`role_id` = `role`.`role_id`))) where (`user`.`active` = 2) */;
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
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_tiket_details` AS select `t`.`tiket_id` AS `tiket_id`,`t`.`aktivis_id` AS `aktivis_id`,`a`.`nama_aktivis` AS `nama_aktivis`,`c`.`nama_cabang` AS `nama_cabang`,`j`.`nama_jabatan` AS `nama_jabatan`,`ar`.`area_id` AS `area_id`,`ar`.`nama_area` AS `area`,`t`.`tiket_kategori` AS `tiket_kategori`,`t`.`deskripsi` AS `deskripsi`,`t`.`aktivis_yg_salah` AS `aktivis_id_salah`,`salah`.`nama_aktivis` AS `aktivis_yg_salah`,`t`.`file_document` AS `file_document`,`t`.`file_image` AS `file_image`,`t`.`status` AS `status`,`t`.`tgl_input` AS `tgl_input`,`t`.`tgl_update` AS `tgl_update` from (((((`tiket` `t` join `aktivis` `a` on((`t`.`aktivis_id` = `a`.`aktivis_id`))) left join (select `ca`.`aktivis_id` AS `aktivis_id`,group_concat(distinct `c`.`nama_cabang` order by `c`.`nama_cabang` ASC separator ', ') AS `nama_cabang` from (`cabangaktivis` `ca` join `cabang` `c` on((`ca`.`cabang_id` = `c`.`cabang_id`))) group by `ca`.`aktivis_id`) `c` on((`a`.`aktivis_id` = `c`.`aktivis_id`))) left join (select `ja`.`aktivis_id` AS `aktivis_id`,group_concat(distinct `j`.`nama_jabatan` order by `j`.`nama_jabatan` ASC separator ', ') AS `nama_jabatan` from (`jabatanaktivis` `ja` join `jabatan` `j` on((`ja`.`jabatan_id` = `j`.`jabatan_id`))) group by `ja`.`aktivis_id`) `j` on((`a`.`aktivis_id` = `j`.`aktivis_id`))) left join `area` `ar` on((`c`.`aktivis_id` = `ar`.`area_id`))) left join `aktivis` `salah` on((`t`.`aktivis_yg_salah` = `salah`.`aktivis_id`))) where (`t`.`status` = 'Open') */;
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

-- Dump completed on 2024-07-01 12:34:36
