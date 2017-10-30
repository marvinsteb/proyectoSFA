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
-- Table structure for table `repuesto`
--

DROP TABLE IF EXISTS `repuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repuesto` (
  `idrepuesto` int(11) NOT NULL,
  `idtiporeparacion` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `idmarca` int(11) NOT NULL,
  `idmodelo` int(11) NOT NULL,
  PRIMARY KEY (`idrepuesto`),
  KEY `fk_repuesto_marca_idx` (`idmarca`),
  KEY `fk_repuesto_modelo_idx` (`idmodelo`),
  KEY `fk_repuesto_tiporepara_idx` (`idtiporeparacion`),
  CONSTRAINT `fk_repuesto_marca` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_repuesto_modelo` FOREIGN KEY (`idmodelo`) REFERENCES `modelo` (`idmodelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_repuesto_tiporepara` FOREIGN KEY (`idtiporeparacion`) REFERENCES `tiporeparacion` (`idtiporeparacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repuesto`
--

LOCK TABLES `repuesto` WRITE;
/*!40000 ALTER TABLE `repuesto` DISABLE KEYS */;
INSERT INTO `repuesto` VALUES (1,6,'Alternador',1,30,1,1),(2,11,' Amortiguador delantero derecho',1,35,1,1),(3,10,' Amortiguador delantero izquierdo',1,18,1,1),(4,18,' Amortiguador trasero derecho',1,2,1,1),(5,3,' Amortiguador trasero izquierdo',1,73,1,1),(6,22,' Aro del faro derecho',1,41,1,1),(7,20,' Aro del faro izquierdo',1,90,1,1),(8,5,' Arrancador',1,88,1,1),(9,13,' Bobina de ignicion',1,88,1,1),(10,17,' Bomba de combustible',1,22,1,1),(11,2,' Bomba de inyeccion',1,91,1,1),(12,22,' Bomba de paletas electrica de la direccion',1,89,1,1),(13,4,' Caja de engranajes de la direccion',1,77,1,1),(14,7,' Caja de fusibles',1,26,1,1),(15,17,' Calibrador delantero derecho',1,69,1,1),(16,1,' Calibrador delantero izquierdo',1,97,1,1),(17,15,' Calibrador trasero derecho',1,50,1,1),(18,19,' Calibrador trasero izquierdo',1,12,1,1),(19,16,' Carburador',1,14,1,1),(20,17,' Catalizador',1,6,1,1),(21,19,' Cinturon de seguridad del asiento del conductor',1,30,1,1),(22,9,' Cinturon de seguridad del asiento delantero para pasajeros',1,6,1,1),(23,21,' Cinturon de seguridad trasero',1,85,1,1),(24,17,' Columna de direccion',1,16,1,1),(25,19,' Compresor del Aire acondicionado',1,95,1,1),(26,21,' Computador del motor (ECU)',1,87,1,1),(27,7,' Condensador',1,38,1,1),(28,18,' Conjunto del amortiguador del montante',1,72,1,1),(29,18,' Conjunto del amortiguador del montante delantero',1,89,1,1),(30,5,' Conjunto del amortiguador del montante trasero',1,38,1,1),(31,3,' Conjunto del resorte',1,13,1,1),(32,10,' Conjunto del resorte delantero',1,5,1,1),(33,4,' Conjunto del resorte trasero',1,100,1,1),(34,22,' Cuerpo del acelerador',1,25,1,1),(35,13,' Distribuidor',1,87,1,1),(36,7,' Eje de la transmision trasero derecho',1,39,1,1),(37,13,' Eje de la transmision trasero izquierdo',1,42,1,1),(38,14,' Eje impulsor delantero derecho',1,73,1,1),(39,17,' Eje impulsor delantero izquierdo',1,88,1,1),(40,10,' Eje motriz trasero',1,20,1,1),(41,3,' Encendedor',1,53,1,1),(42,11,' Espejo lateral derecho',1,31,1,1),(43,8,' Espejo lateral izquierdo',1,12,1,1),(44,3,' Faro delantero derecho',1,67,1,1),(45,16,' Faro delantero izquierdo',1,76,1,1),(46,3,' Interruptor del levantavidrios electrico',1,28,1,1),(47,14,' Luz de combinacion tracera derecha',1,24,1,1),(48,15,' Luz de combinacion tracera izquierda',1,48,1,1),(49,10,' Luz derecha de indicacion del ancho del vehiculo',1,88,1,1),(50,18,' Luz izquierda de indicacion del ancho del vehiculo',1,72,1,1),(51,6,' Medidor de flujo de aire',1,75,1,1),(52,4,' Montante trasero derecho',1,8,1,1),(53,14,' Montante trasero izquierdo',1,9,1,1),(54,13,' Motor Conjunto',1,26,1,1),(55,10,' Otra unidad de control',1,2,1,1),(56,20,' Otros faros',1,61,1,1),(57,9,' Parabrisa delantero',1,7,1,1),(58,7,' Parabrisa trasero',1,9,1,1),(59,16,' Radiador',1,99,1,1),(60,22,' Resorte delantero derecho',1,58,1,1),(61,4,' Resorte delantero izquierdo',1,75,1,1),(62,6,' Resorte trasero derecho',1,64,1,1),(63,8,' Resorte trasero izquierdo',1,29,1,1),(64,6,' Rotor de disco delantero',1,86,1,1),(65,18,' Rotor de disco trasero',1,21,1,1),(66,1,' Sensor de angulo del ciguenal',1,97,1,1),(67,21,' Sensor de O2',1,92,1,1),(68,7,' Silenciador central del escape',1,97,1,1),(69,6,' Silenciador trasero',1,16,1,1),(70,4,' Suspensiî delantera derecha',1,42,1,1),(71,11,' Suspensiî delantera izquierda',1,47,1,1),(72,4,' Tambor delantero',1,63,1,1),(73,14,' Tambor trasero',1,29,1,1),(74,17,' Tanque de combustible',1,96,1,1),(75,22,' Timî',1,86,1,1),(76,7,' Transmisiî (Caja de cambio)',1,39,1,1),(77,9,' Tubo de escape delantero',1,56,1,1),(78,21,' Turbocargador',1,24,1,1),(79,1,' Velocimetro',1,51,1,1),(80,18,' Ventilador de acoplamiento',1,61,1,1),(81,16,' Ventilador electrico',1,34,1,1),(82,20,' Vidrio de la puerta delantera derecha',1,94,1,1),(83,20,' Vidrio de la puerta delantera izquierda ',1,52,1,1),(84,23,' Vidrio de la puerta derecha',1,56,1,1),(85,12,' Vidrio de la puerta izquierda',1,48,1,1),(86,20,' Vidrio de la puerta trasera izquierda',1,57,1,1),(87,1,' Vidrio de puerta derecha posterior',1,4,1,1);
/*!40000 ALTER TABLE `repuesto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 18:41:55
