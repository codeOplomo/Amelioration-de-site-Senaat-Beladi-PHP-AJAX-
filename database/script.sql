-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: senaat_beladi_db
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artisant`
--

DROP TABLE IF EXISTS `artisant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artisant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_complet` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genre` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categorie_Id` int DEFAULT NULL,
  `ville` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_tel` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorie` (`categorie_Id`),
  CONSTRAINT `fk_categorie` FOREIGN KEY (`categorie_Id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisant`
--

LOCK TABLES `artisant` WRITE;
/*!40000 ALTER TABLE `artisant` DISABLE KEYS */;
INSERT INTO `artisant` VALUES (1,'Jawad Zairi',NULL,'Homme',4,'Taza','0658741286'),(2,'Abdelqodouss Fadli',NULL,'Homme',1,'Marakech','0766858544'),(3,'Rachid Echafaai',NULL,'Homme',2,'Kelaat-M\'Gouna','0787459620'),(4,'Abdlhamid Kosk',NULL,'Homme',3,'Marakech','0606036360'),(5,'Abdo Taouil',NULL,'Homme',5,'Youssoufia','0758124069'),(6,'Omar Ennedi',NULL,'Homme',6,'Mohamedia','0769257400'),(7,'Adnane Roujane',NULL,'Homme',5,'El Jadida','0623417956'),(8,'Ghizlane Meqdar',NULL,'Femme',4,'Beni Mellal','0662104789'),(9,'Sanaa Louafi',NULL,'Femme',6,'Marakech','0726897412'),(10,'Salma Elgmiri',NULL,'Femme',4,'Rabat','0720159873');
/*!40000 ALTER TABLE `artisant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Poterie'),(2,'Bois'),(3,'Cuir'),(4,'Tapis et Tissue'),(5,'Metal'),(6,'Bijouterie');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiment`
--

DROP TABLE IF EXISTS `paiment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paiment` (
  `id` int NOT NULL,
  `vente_Id` int DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `date_paiment` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vente_Id` (`vente_Id`),
  CONSTRAINT `paiment_ibfk_1` FOREIGN KEY (`vente_Id`) REFERENCES `vente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiment`
--

LOCK TABLES `paiment` WRITE;
/*!40000 ALTER TABLE `paiment` DISABLE KEYS */;
/*!40000 ALTER TABLE `paiment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `role_Id` int NOT NULL,
  `permission_Id` int NOT NULL,
  PRIMARY KEY (`role_Id`,`permission_Id`),
  KEY `permission_Id` (`permission_Id`),
  CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `role` (`id`),
  CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`permission_Id`) REFERENCES `permission` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artisant_Id` int DEFAULT NULL,
  `categorie_Id` int DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_Id` (`categorie_Id`),
  KEY `produit_ibfk_1` (`artisant_Id`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`artisant_Id`) REFERENCES `artisant` (`id`),
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`categorie_Id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (3,1,3,'Sac','Un grand sac de cuir maron',NULL),(4,3,2,'Table','Table en bois pour 4 personne',NULL),(5,7,5,'Chaise','Chaise gris en metal(Gaming)',NULL),(6,10,4,'Tapis','Petite taille rouge',NULL),(7,8,4,'Jelaba','Couton',NULL);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_utilisateur`
--

DROP TABLE IF EXISTS `role_utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_utilisateur` (
  `role_Id` int NOT NULL,
  `utilisateur_Id` int NOT NULL,
  PRIMARY KEY (`role_Id`,`utilisateur_Id`),
  KEY `utilisateur_Id` (`utilisateur_Id`),
  CONSTRAINT `role_utilisateur_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_utilisateur_ibfk_2` FOREIGN KEY (`utilisateur_Id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_utilisateur`
--

LOCK TABLES `role_utilisateur` WRITE;
/*!40000 ALTER TABLE `role_utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `motdepasse` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vente`
--

DROP TABLE IF EXISTS `vente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vente` (
  `id` int NOT NULL,
  `utilisateur_Id` int DEFAULT NULL,
  `produit_Id` int DEFAULT NULL,
  `paiment_Id` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_Id` (`utilisateur_Id`),
  KEY `paiment_Id` (`paiment_Id`),
  KEY `vente_ibfk_2` (`produit_Id`),
  CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`utilisateur_Id`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`produit_Id`) REFERENCES `produit` (`id`),
  CONSTRAINT `vente_ibfk_3` FOREIGN KEY (`paiment_Id`) REFERENCES `paiment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vente`
--

LOCK TABLES `vente` WRITE;
/*!40000 ALTER TABLE `vente` DISABLE KEYS */;
/*!40000 ALTER TABLE `vente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-26 23:47:28
