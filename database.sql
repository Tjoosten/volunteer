-- MySQL dump 10.13  Distrib 5.5.54, for Win64 (AMD64)
--
-- Host: localhost    Database: activisme_be
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.20-MariaDB

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
-- Table structure for table `abilities`
--

DROP TABLE IF EXISTS `abilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abilities`
--

LOCK TABLES `abilities` WRITE;
/*!40000 ALTER TABLE `abilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `abilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bans`
--

DROP TABLE IF EXISTS `bans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bans`
--

LOCK TABLES `bans` WRITE;
/*!40000 ALTER TABLE `bans` DISABLE KEYS */;
/*!40000 ALTER TABLE `bans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `module` varchar(40) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_creator_category` (`creator_id`),
  CONSTRAINT `fk_creator_category` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gov_members`
--

DROP TABLE IF EXISTS `gov_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gov_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Function` varchar(255) DEFAULT NULL,
  `Union_id` int(11) DEFAULT NULL,
  `Information` varchar(500) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_union` (`Union_id`),
  CONSTRAINT `fk_union` FOREIGN KEY (`Union_id`) REFERENCES `gov_unions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gov_members`
--

LOCK TABLES `gov_members` WRITE;
/*!40000 ALTER TABLE `gov_members` DISABLE KEYS */;
INSERT INTO `gov_members` VALUES (1,'Charles Michel','Eerste Minister',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_charles_michel','charles_michel.jpg',NULL,NULL,NULL),(2,'Kris Peeters','Vice-eersteminister en minister van Werk, Economie en Consumenten, belast met Buitenlandse Handel',1,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_kris_peeters','kris_peeters.jpg',NULL,NULL,NULL),(3,'Jan Jambon','Vice-eersteminister en minister van Veiligheid en Binnenlandse Zaken, belast met de Regie der gebouwen',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_jan_jambon','jan_jambon.jpg',NULL,NULL,NULL),(4,'Alexander De Croo','Ontwikkelingssamenwerking, Digitale Agenda, Telecommunicatie en Post',8,'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_alexander#_de#_croo','alexander_de_croo.jpg',NULL,NULL,NULL),(5,'Didier Reynders','Vice-eersteminister en minister van Buitenlandse Zaken en Europese Zaken, belast met Beliris en de Federale Culturele Instellingen',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_didier_reynders','didier_reynders.jpg',NULL,NULL,NULL),(6,'Koen Geens','Minister van Justitie',1,'http://www.belgium.be/nl/over#_belgie/overheid/federale#_overheid/federale#_regering/samenstelling#_regering/index#_koen#_geens','koen_geens.jpg',NULL,NULL,NULL),(7,'Maggie De Block','Minister van Sociale Zaken en Volksgezondheid',8,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_maggie_de_block','maggie_de_block.jpg',NULL,NULL,NULL),(8,'Daniel Bacquelaine','Minister van Pensioenen',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_daniel_bacquelaine','daniel_bacquelaine.jpg',NULL,NULL,NULL),(9,'Johan Van Overtveldt','Minister van Financien, belast met Bestrijding van de fiscale fraude',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_johan_van_overtveldt','johan_van_overtveldt.jpg',NULL,NULL,NULL),(10,'Willy Borsus','Minister van Middenstand, Zelfstandigen, KMO\'s, Landbouw en Maatschappelijke Integratie',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_willy_borsus','willy_borsus.jpg',NULL,NULL,NULL),(11,'Marie Christine Marghem','Minister van Energie, Leefmilieu en Duurzame Ontwikkeling',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_marie_christine_marghem','Marie-christine_marghem.jpg',NULL,NULL,NULL),(12,'Steven Vandeput','Minister van Defensie, belast met Ambtenarenzaken',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_steven_vandeput','steven_vandeput.jpg',NULL,NULL,NULL),(13,'Sophie Wilmes','Minister van Begroting, belast met de Nationale Loterij',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_sophie_wilmes','sophie_wilmes_1.jpg',NULL,NULL,NULL),(14,'Francois Bellot','Minister van Mobiliteit, belast met Belgocontrol en de Nationale Maatschappij der Belgische Spoorwegen',6,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_francois_bellot','bellot.jpg',NULL,NULL,NULL),(15,'Pieter De Crem','Staatssecretaris voor Buitenlandse Handel, toegevoegd aan de minister belast met Buitenlandse Handel',1,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_pieter_de_crem','Pieter_de_crem.jpg',NULL,NULL,NULL),(16,'Elke Sleurs','Staatssecretaris voor Armoedebestrijding, Gelijke Kansen, Personen met een beperking, en Wetenschapsbeleid, belast met Grote Steden, toegevoegd aan de minister van Financien',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_elke_sleurs','Elke_Sleurs.jpg',NULL,NULL,NULL),(17,'Theo Francken','Staatssecretaris voor Asiel en Migratie, belast met Administratieve Vereenvoudiging, toegevoegd aan de minister van Veiligheid en Binnenlandse Zaken',7,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_theo_francken','theo_francken.jpg',NULL,NULL,NULL),(18,'Philipple De Backer','Staatssecretaris voor Bestrijding van de sociale fraude, Privacy en Noordzee, toegevoegd aan de minister van Sociale Zaken en Volksgezondheid',8,'http://www.belgium.be/nl/over_belgie/overheid/federale_overheid/federale_regering/samenstelling_regering/index_philippe_de_backer','de_backer.jpg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `gov_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gov_unions`
--

DROP TABLE IF EXISTS `gov_unions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gov_unions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_full` varchar(255) DEFAULT NULL,
  `name_abbr` varchar(255) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gov_unions`
--

LOCK TABLES `gov_unions` WRITE;
/*!40000 ALTER TABLE `gov_unions` DISABLE KEYS */;
INSERT INTO `gov_unions` VALUES (1,'Christen-Democratisch & Vlaams','CD&V','#f47d2a','label-cdv',NULL,NULL,NULL),(2,'Centre Democrate Humaniste','cdH','#b64330','label-cdh',NULL,NULL,NULL),(3,'Ecologistes Confederes pour l\' Organisation de Luttes Originales','ECOLO','#8cc63f','label-ecolo',NULL,NULL,NULL),(4,'Federalistes Democrates Francophones','FDF','#cb0167','label-fdf',NULL,NULL,NULL),(5,'Groen!','Groen','#008479','label-groen',NULL,NULL,NULL),(6,'Mouvement Reformateur','MR','#044679','label-mr',NULL,NULL,NULL),(7,'Nieuw-Vlaamse Alliantie','N-VA','#f9b919','label-nva',NULL,NULL,NULL),(8,'Open Vlaamse Liberalen en Democraten','Open VLD','#275ca5','label-ovld',NULL,NULL,NULL),(9,'Parti Populaire','PP','#773179','label-pp',NULL,NULL,NULL),(10,'Parti socialiste','PS','#ff0000','label-ps',NULL,NULL,NULL),(11,'Parti du Travail de Belgique - Gauche d\' Ouverture!','ptb-go!','#e8312a','label-ptbgo',NULL,NULL,NULL),(12,'Socialistische partij anders','SP.A','#e20025','label-spa',NULL,NULL,NULL),(13,'Vlaams Belang','Vlaams Belang','#5a9fc1','label-vb',NULL,NULL,NULL);
/*!40000 ALTER TABLE `gov_unions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_abilities`
--

DROP TABLE IF EXISTS `login_abilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `ability_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_abilities` (`ability_id`),
  KEY `fk_abilities_login` (`login_id`),
  CONSTRAINT `fk_abilities` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`),
  CONSTRAINT `fk_abilities_login` FOREIGN KEY (`login_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_abilities`
--

LOCK TABLES `login_abilities` WRITE;
/*!40000 ALTER TABLE `login_abilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_abilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_permissions`
--

DROP TABLE IF EXISTS `login_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permissions_id` int(11) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_permissions` (`permissions_id`),
  KEY `fk_permissions_login` (`login_id`),
  CONSTRAINT `fk_permissions` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `fk_permissions_login` FOREIGN KEY (`login_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_permissions`
--

LOCK TABLES `login_permissions` WRITE;
/*!40000 ALTER TABLE `login_permissions` DISABLE KEYS */;
INSERT INTO `login_permissions` VALUES (1,1,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `login_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_items`
--

DROP TABLE IF EXISTS `new_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_news_creator` (`creator_id`),
  CONSTRAINT `fk_news_creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_items`
--

LOCK TABLES `new_items` WRITE;
/*!40000 ALTER TABLE `new_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_comments`
--

DROP TABLE IF EXISTS `news_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_creator` (`user_id`),
  CONSTRAINT `fk_comment_creator` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_comments`
--

LOCK TABLES `news_comments` WRITE;
/*!40000 ALTER TABLE `news_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `deliver_id` int(11) DEFAULT NULL,
  `is_read` varchar(1) NOT NULL DEFAULT 'N',
  `message` varchar(255) DEFAULT NULL,
  `sub_message` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_creator` (`creator_id`),
  KEY `fk_deliver` (`deliver_id`),
  CONSTRAINT `fk_creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_deliver` FOREIGN KEY (`deliver_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admin','The administrator role for the application.',NULL,NULL,NULL),(2,'guest','The normal permissions role for the application,',NULL,NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_comments`
--

DROP TABLE IF EXISTS `pivot_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_news_item` (`post_id`),
  KEY `fk_item_comment` (`comment_id`),
  CONSTRAINT `fk_item_comment` FOREIGN KEY (`comment_id`) REFERENCES `news_comments` (`id`),
  CONSTRAINT `fk_news_item` FOREIGN KEY (`post_id`) REFERENCES `new_items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_comments`
--

LOCK TABLES `pivot_comments` WRITE;
/*!40000 ALTER TABLE `pivot_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_helpdesk_category`
--

DROP TABLE IF EXISTS `pivot_helpdesk_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_helpdesk_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ticket` (`ticket_id`),
  KEY `fk_ticket_category` (`category_id`),
  CONSTRAINT `fk_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  CONSTRAINT `fk_ticket_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_helpdesk_category`
--

LOCK TABLES `pivot_helpdesk_category` WRITE;
/*!40000 ALTER TABLE `pivot_helpdesk_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_helpdesk_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_items`
--

DROP TABLE IF EXISTS `pivot_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sportsmen_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gov_member` (`sportsmen_id`),
  KEY `fk_item_gov_member` (`item_id`),
  KEY `fk_item_creator` (`creator_id`),
  CONSTRAINT `fk_gov_member` FOREIGN KEY (`sportsmen_id`) REFERENCES `gov_members` (`id`),
  CONSTRAINT `fk_item_creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_item_gov_member` FOREIGN KEY (`item_id`) REFERENCES `new_items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_items`
--

LOCK TABLES `pivot_items` WRITE;
/*!40000 ALTER TABLE `pivot_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_news_categories`
--

DROP TABLE IF EXISTS `pivot_news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categories` (`category_id`),
  KEY `fk_category_news` (`news_id`),
  CONSTRAINT `fk_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_category_news` FOREIGN KEY (`news_id`) REFERENCES `new_items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_news_categories`
--

LOCK TABLES `pivot_news_categories` WRITE;
/*!40000 ALTER TABLE `pivot_news_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_ranking`
--

DROP TABLE IF EXISTS `pivot_ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sportsmen_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ranking_member` (`sportsmen_id`),
  KEY `fk_vote_id` (`item_id`),
  KEY `fk_voter` (`user_id`),
  CONSTRAINT `fk_ranking_member` FOREIGN KEY (`sportsmen_id`) REFERENCES `gov_members` (`id`),
  CONSTRAINT `fk_vote_id` FOREIGN KEY (`item_id`) REFERENCES `points` (`id`),
  CONSTRAINT `fk_voter` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_ranking`
--

LOCK TABLES `pivot_ranking` WRITE;
/*!40000 ALTER TABLE `pivot_ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_ranking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_reaction_report`
--

DROP TABLE IF EXISTS `pivot_reaction_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_reaction_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_report_comment` (`comment_id`),
  KEY `fk_report_data` (`report_id`),
  KEY `fk_report_creator` (`creator_id`),
  CONSTRAINT `fk_report_comment` FOREIGN KEY (`comment_id`) REFERENCES `news_comments` (`id`),
  CONSTRAINT `fk_report_creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_report_data` FOREIGN KEY (`report_id`) REFERENCES `reactions_reports` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_reaction_report`
--

LOCK TABLES `pivot_reaction_report` WRITE;
/*!40000 ALTER TABLE `pivot_reaction_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_reaction_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pivot_reactions`
--

DROP TABLE IF EXISTS `pivot_reactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pivot_reactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ticket_creator2` (`creator_id`),
  KEY `fk_ticket_nr` (`ticket_id`),
  KEY `fk_ticket_comment` (`comment_id`),
  CONSTRAINT `fk_ticket_comment` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  CONSTRAINT `fk_ticket_creator2` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_ticket_nr` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pivot_reactions`
--

LOCK TABLES `pivot_reactions` WRITE;
/*!40000 ALTER TABLE `pivot_reactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `pivot_reactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `sportsmen_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `media_url` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_point_creator` (`creator_id`),
  KEY `fk_point_gov_member` (`sportsmen_id`),
  CONSTRAINT `fk_point_creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_point_gov_member` FOREIGN KEY (`sportsmen_id`) REFERENCES `gov_members` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `points`
--

LOCK TABLES `points` WRITE;
/*!40000 ALTER TABLE `points` DISABLE KEYS */;
/*!40000 ALTER TABLE `points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reactions_reports`
--

DROP TABLE IF EXISTS `reactions_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reactions_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reason` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_report_reaction_author` (`user_id`),
  CONSTRAINT `fk_report_reaction_author` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reactions_reports`
--

LOCK TABLES `reactions_reports` WRITE;
/*!40000 ALTER TABLE `reactions_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reactions_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `TIMESTAMP` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `ci_sessions_TIMESTAMP` (`TIMESTAMP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `publish` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `export_github` varchar(10) NOT NULL DEFAULT 'N',
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ticket_creator` (`creator_id`),
  CONSTRAINT `fk_ticket_creator` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ban_id` int(11) DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `blocked` varchar(1) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ban_users` (`ban_id`),
  CONSTRAINT `fk_ban_users` FOREIGN KEY (`ban_id`) REFERENCES `bans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,NULL,NULL,'Topairy','Tim Joosten','N','2ff78f72c7c4a4c442163fcfeea4568e','Topairy@gmail.com',NULL,NULL,NULL);
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

-- Dump completed on 2017-04-20  2:52:03
