-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: CRUDZF2
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(14) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `email` varchar(200) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `ip` int(20) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'38735190892','$2y$14$bTJEdEFoN0FhSWhPWUtEMezP.olke0JSpXr539U38kkj7gFLbB6K2','m2DtAh7AaIhOYKD2DB38BO2OmMKqnSRDbTgtw0aZcjAU2qT6n/lM2TrRLqGsfDvRpgs+ppfysXgycOiKy9NPj/dBy6u+w9blYA7LzvOixAI45dxDcXf6mp5UY1CXwysB','teste@teste.com.br','2015-05-17 21:28:54',2147483647),(22,'38735190892','$2y$14$Y1RCamRRbVNwM1dRaVJ2W.4wY1iIiMeQRQQTmyeYk3BPf7FTOtAey','cTBjdQmSp3WQiRvXEL/ypiFkSlgpBYQwwjwzagY377rvGgJDAgmu2sCe9TdeyZE5jg9oB4dmuDymh9f98PnCDh++sXm9WLagVa28otCU6X3OD3WqCLlMCcNNR/skj9pd','john@1431909505.com.br','2015-05-17 21:31:11',2147483647),(23,'1456714856','$2y$14$NEh0WEYybW04LzFTWlAwae8QpPM0k/pfVC1b1lLcAtK.sE2mQAmwy','4HtXF2mm8/1SZP0j9aeR6r+IOlfTpRsb3VZQmithpbPu4MqgRraOQaWl9zrWFkGe6Oj85tNijXH2mL01nAwCzWtguIFzIM2Qys/ahXUuk7brjppDRhRfHXoMXdU75WEO','john@1431909410.com.br','2015-05-17 21:31:11',2147483647);
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

-- Dump completed on 2015-05-17 22:07:04
