-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: localhost    Database: 10119276_kepegawaian
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuti` (
  `nip` int(11) NOT NULL,
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  KEY `nip` (`nip`),
  CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` VALUES (2,'2020-12-23','2020-12-27',5,'Merayakan Hari Raya Natal'),(1,'2021-06-14','2021-06-17',4,'Merayakan Hari Raya Idul Fitri'),(6,'2021-06-12','2021-06-15',4,'Merayakan Hari Raya Idul Fitri');
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departemen` (
  `kd_departemen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_departemen` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_departemen`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departemen`
--

LOCK TABLES `departemen` WRITE;
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
INSERT INTO `departemen` VALUES (6,'Sales & Marketing'),(7,'HRD'),(8,'Production'),(9,'Accounting'),(10,'IT');
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gaji`
--

DROP TABLE IF EXISTS `gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gaji` (
  `nip` int(11) NOT NULL,
  `kd_departemen` int(11) NOT NULL,
  `kd_jabatan` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `uang_transport` int(11) NOT NULL,
  `uang_lembur` int(11) NOT NULL,
  `uang_cuti` int(11) NOT NULL,
  `potongan_gaji` int(11) NOT NULL,
  `tanggal_gajian` date NOT NULL,
  `total_gaji` int(11) NOT NULL,
  KEY `nip` (`nip`),
  KEY `kd_departemen` (`kd_departemen`),
  KEY `kd_jabatan` (`kd_jabatan`),
  CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`),
  CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`kd_departemen`) REFERENCES `departemen` (`kd_departemen`),
  CONSTRAINT `gaji_ibfk_3` FOREIGN KEY (`kd_jabatan`) REFERENCES `jabatan` (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gaji`
--

LOCK TABLES `gaji` WRITE;
/*!40000 ALTER TABLE `gaji` DISABLE KEYS */;
INSERT INTO `gaji` VALUES (1,1,1,450000,200000,1000000,300000,100000,'2021-05-01',1850000),(6,10,2,450000,200000,1000000,600000,0,'2021-08-04',2250000);
/*!40000 ALTER TABLE `gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'Advertising Manager',9500000,2500000),(2,'Promotion Manager',7500000,2300000);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keterangan`
--

DROP TABLE IF EXISTS `keterangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keterangan` (
  `nip` int(11) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `keterangan_absen` enum('Sakit','Izin','Tanpa Keterangan') NOT NULL,
  KEY `nip` (`nip`),
  CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keterangan`
--

LOCK TABLES `keterangan` WRITE;
/*!40000 ALTER TABLE `keterangan` DISABLE KEYS */;
INSERT INTO `keterangan` VALUES (2,'2021-01-27','Tanpa Keterangan'),(4,'2020-03-30','Izin'),(2,'2021-01-27','Tanpa Keterangan'),(6,'2021-03-03','Sakit'),(1,'2021-08-10','Izin');
/*!40000 ALTER TABLE `keterangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lembur`
--

DROP TABLE IF EXISTS `lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lembur` (
  `nip` int(11) NOT NULL,
  `tanggal_lembur` date NOT NULL,
  `jumlah_jam_lembur` int(11) NOT NULL,
  KEY `nip` (`nip`),
  CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lembur`
--

LOCK TABLES `lembur` WRITE;
/*!40000 ALTER TABLE `lembur` DISABLE KEYS */;
INSERT INTO `lembur` VALUES (6,'2021-08-18',3),(1,'2021-08-11',3),(2,'2021-08-04',6);
/*!40000 ALTER TABLE `lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(100) NOT NULL,
  `menu_uri` varchar(100) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_allowed` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Dashboard','dashboard','fa fa-dashboard','+1+2+'),(2,'Data Pegawai','item','fa fa-user','+1+'),(3,'Absensi','save','fa fa-book','+1+'),(4,'Cuti','jadwal','fa fa-calendar-o','+1+'),(5,'Lembur','harus','fa fa-file-text-o','+1+'),(6,'Penggajian','gaji','fa fa-money','+1+');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `nip` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,'Andi','Bandung','1990-09-07','Laki-laki','Islam','Jl. Mangga Raya No. 10','089474642435'),(2,'Robby','Jakarta','1993-06-04','Laki-laki','Katholik','Jl. Apel No. 11','089765362727'),(4,'Gusti','Bali','1992-02-04','Laki-laki','Hindu','Jl. Semangka No. 13','083273738219'),(5,'Gina','Banjarmasin','1998-06-07','Perempuan','Protestan','Jl. Leci No. 14','087512452525'),(6,'Jingga Bhatara','Surabaya','1991-09-07','Laki-laki','Islam','Jl. Manggis Selatan No. 10','089474642433'),(7,'Raina Khansa','Makassar','1993-10-26','Perempuan','Islam','Jl. Mars Utama','083094002003');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_alamat` varchar(100) NOT NULL,
  `user_kota` varchar(15) NOT NULL,
  `user_kodepos` varchar(10) NOT NULL,
  `user_telepon` varchar(15) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_level` int(5) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'Peter Kavinsky','supervisor','13200cfba0547e7ad146481614bd7caa','Jalan Dipatiukur','Bandung','40000','(022) - xxxxx','xxx@yyy.com',1,'Product Development Manager'),(2,'Lara Jean Song Covey','manager','e2336778d01b115657df7bdd7cae2444','Jalan xxx','Bandung','40000','022-xxx','xxx@zzz.com',2,'Kepala Gudang'),(1,'Nasthasa Wulan Ghani Sopian','admin','21232f297a57a5a743894a0e4a801fc3','Malabar','Bandung','54321','(022)123456','nasthasa@mail.com',1,'Administrator and Product Developer');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 21:56:59
