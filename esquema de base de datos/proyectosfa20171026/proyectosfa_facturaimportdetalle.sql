-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 192.168.2.254    Database: proyectosfa
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

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
-- Table structure for table `facturaimportdetalle`
--

DROP TABLE IF EXISTS `facturaimportdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturaimportdetalle` (
  `idfacturaimportdetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idfacturaimport` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `precio` decimal(11,2) DEFAULT NULL,
  `subtotal` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`idfacturaimportdetalle`),
  KEY `fk_fcIdetalle_facturaimport_idx` (`idfacturaimport`),
  KEY `fk_fcIdetalle_vehiculo_idx` (`id_vehiculo`),
  CONSTRAINT `fk_fcIdetalle_facturaimport` FOREIGN KEY (`idfacturaimport`) REFERENCES `facturaimport` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fcIdetalle_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`idvehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturaimportdetalle`
--

LOCK TABLES `facturaimportdetalle` WRITE;
/*!40000 ALTER TABLE `facturaimportdetalle` DISABLE KEYS */;
INSERT INTO `facturaimportdetalle` VALUES (1,5,3,30000.00,0.00),(2,6,3,30000.00,0.00);
/*!40000 ALTER TABLE `facturaimportdetalle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 18:41:56
