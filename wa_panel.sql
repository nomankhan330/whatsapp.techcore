/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.33 : Database - wa_panel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wa_panel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wa_panel`;

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `address` text,
  `contact_person` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_access_token` text,
  `waba_id` varchar(200) DEFAULT NULL,
  `phone_number_id` varchar(200) DEFAULT NULL,
  `wa_number` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`id`,`user_id`,`client_name`,`address`,`contact_person`,`contact_number`,`email`,`status`,`created_at`,`updated_at`,`user_access_token`,`waba_id`,`phone_number_id`,`wa_number`,`deleted_at`) values (1,21,'Noman Khan 123','Address','Dawn','03102338276','noman.khan330123@gmail.com',1,'2023-01-11 14:22:50','2023-01-13 07:24:23',NULL,NULL,NULL,NULL,NULL),(2,22,'Muhammad Noman Khan','ABC','Khawar Khaliq','03102338276','noman123@gmail.com',1,'2023-01-12 21:04:26','2023-01-12 21:05:05',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `contact_name` varchar(200) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `contact_status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`client_id`,`contact_name`,`contact_number`,`contact_status`,`created_at`,`updated_at`,`deleted_at`) values (1,21,'noman','03102338276','valid','2023-01-17 00:50:00','2023-01-16 00:50:03',NULL);

/*Table structure for table `country_codes` */

DROP TABLE IF EXISTS `country_codes`;

CREATE TABLE `country_codes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

/*Data for the table `country_codes` */

insert  into `country_codes`(`id`,`name`,`code`,`status`) values (1,'BD','880',1),(2,'BE','32',1),(3,'BF','226',1),(4,'BG','359',1),(5,'BA','387',1),(6,'BB','246',1),(7,'WF','681',1),(8,'BL','590',1),(9,'BM','441',1),(10,'BN','673',1),(11,'BO','591',1),(12,'BH','973',1),(13,'BI','257',1),(14,'BJ','229',1),(15,'BT','975',1),(16,'JM','876',1),(17,'JM','876',1),(18,'BW','267',1),(19,'WS','685',1),(20,'BQ','599',1),(21,'BR','55',1),(22,'BS','242',1),(23,'JE','1534',1),(24,'BY','375',1),(25,'BZ','501',1),(26,'RU','7',1),(27,'RW','250',1),(28,'RS','381',1),(29,'TL','670',1),(30,'RE','262',1),(31,'TM','993',1),(32,'TJ','992',1),(33,'RO','40',1),(34,'TK','690',1),(35,'GW','245',1),(36,'GU','671',1),(37,'GT','502',1),(38,'GT','502',1),(39,'GR','30',1),(40,'GQ','240',1),(41,'GP','590',1),(42,'JP','81',1),(43,'GY','592',1),(44,'GG','1481',1),(45,'GF','594',1),(46,'GE','995',1),(47,'GD','473',1),(48,'GB','44',1),(49,'GA','241',1),(50,'SV','503',1),(51,'GN','224',1),(52,'GM','220',1),(53,'GL','299',1),(54,'GI','350',1),(55,'GH','233',1),(56,'OM','968',1),(57,'TN','216',1),(58,'JO','962',1),(59,'HR','385',1),(60,'HT','509',1),(61,'HU','36',1),(62,'HK','852',1),(63,'HN','504',1),(65,'VE','58',1),(66,'PR','787 and 1-939',1),(67,'PS','970',1),(68,'PW','680',1),(69,'PT','351',1),(70,'SJ','47',1),(71,'PY','595',1),(72,'IQ','964',1),(73,'PA','507',1),(74,'PF','689',1),(75,'PG','675',1),(76,'PE','51',1),(77,'PK','92',1),(78,'PH','63',1),(79,'PN','870',1),(80,'PL','48',1),(81,'PM','508',1),(82,'ZM','260',1),(83,'EH','212',1),(84,'EE','372',1),(85,'EG','20',1),(86,'ZA','27',1),(87,'EC','593',1),(88,'IT','39',1),(89,'VN','84',1),(90,'SB','677',1),(91,'ET','251',1),(92,'SO','252',1),(93,'ZW','263',1),(94,'SA','966',1),(95,'ES','34',1),(96,'ER','291',1),(97,'ME','382',1),(98,'MD','373',1),(99,'MG','261',1),(100,'MF','590',1),(101,'MA','212',1),(102,'MC','377',1),(103,'UZ','998',1),(104,'MM','95',1),(105,'ML','223',1),(106,'MO','853',1),(107,'MN','976',1),(108,'MH','692',1),(109,'MK','389',1),(110,'MU','230',1),(111,'MT','356',1),(112,'MW','265',1),(113,'MV','960',1),(114,'MQ','596',1),(115,'MP','670',1),(116,'MS','664',1),(117,'MR','222',1),(118,'IM','1624',1),(119,'UG','256',1),(120,'TZ','255',1),(121,'MY','60',1),(122,'MX','52',1),(123,'IL','972',1),(124,'FR','33',1),(125,'IO','246',1),(126,'SH','290',1),(127,'FI','358',1),(128,'FJ','679',1),(129,'FK','500',1),(130,'FM','691',1),(131,'FO','298',1),(132,'NI','505',1),(133,'NL','31',1),(134,'NO','47',1),(135,'NA','264',1),(136,'VU','678',1),(137,'NC','687',1),(138,'NE','227',1),(139,'NF','672',1),(140,'NG','234',1),(141,'NZ','64',1),(142,'NP','977',1),(143,'NR','674',1),(144,'NU','683',1),(145,'CK','682',1),(146,'CK','682',1),(147,'CI','225',1),(148,'CH','41',1),(149,'CO','57',1),(150,'CN','86',1),(151,'CM','237',1),(152,'CL','56',1),(153,'CC','61',1),(154,'CA','1',1),(155,'CG','242',1),(156,'CF','236',1),(157,'CD','243',1),(158,'CZ','420',1),(159,'CY','357',1),(160,'CX','61',1),(161,'CR','506',1),(162,'CW','599',1),(163,'CV','238',1),(164,'CU','53',1),(165,'SZ','268',1),(166,'SY','963',1),(167,'SX','599',1),(168,'KG','996',1),(169,'KE','254',1),(170,'SS','211',1),(171,'SR','597',1),(172,'KI','686',1),(173,'KH','855',1),(174,'KN','869',1),(175,'KM','269',1),(176,'ST','239',1),(177,'SK','421',1),(178,'KR','82',1),(179,'SI','386',1),(180,'KP','850',1),(181,'KW','965',1),(182,'SN','221',1),(183,'SM','378',1),(184,'SL','232',1),(185,'SC','248',1),(186,'KZ','7',1),(187,'KY','345',1),(188,'SG','65',1),(189,'SE','46',1),(190,'SD','249',1),(191,'DO','809 and 1-829',1),(192,'DM','767',1),(193,'DJ','253',1),(194,'DK','45',1),(195,'VG','284',1),(196,'DE','49',1),(197,'YE','967',1),(198,'DZ','213',1),(199,'US','1',1),(200,'UY','598',1),(201,'YT','262',1),(202,'UM','1',1),(203,'LB','961',1),(204,'LC','758',1),(205,'LA','856',1),(206,'TV','688',1),(207,'TW','886',1),(208,'TT','868',1),(209,'TR','90',1),(210,'LK','94',1),(211,'LI','423',1),(212,'LV','371',1),(213,'TO','676',1),(214,'LT','370',1),(215,'LU','352',1),(216,'LR','231',1),(217,'LS','266',1),(218,'TH','66',1),(219,'TH','66',1),(220,'TG','228',1),(221,'TD','235',1),(222,'TC','649',1),(223,'LY','218',1),(224,'VA','379',1),(225,'VC','784',1),(226,'AE','971',1),(227,'AD','376',1),(228,'AG','268',1),(229,'AF','93',1),(230,'AI','264',1),(231,'VI','340',1),(232,'IS','354',1),(233,'IR','98',1),(234,'AM','374',1),(235,'AL','355',1),(236,'AO','244',1),(237,'AO','244',1),(238,'AS','684',1),(239,'AR','54',1),(240,'AU','61',1),(241,'AT','43',1),(242,'AW','297',1),(243,'IN','91',1),(245,'AZ','994',1),(246,'IE','353',1),(247,'ID','62',1),(248,'UA','380',1),(249,'QA','974',1),(250,'MZ','258',1);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_01_05_124532_laratrust_setup_tables',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(1,2),(2,2),(3,2),(4,2),(1,3),(2,3),(3,3),(4,3);

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'users-create','Create Users','Create Users','2023-01-05 13:07:04','2023-01-05 13:07:04'),(2,'users-read','Read Users','Read Users','2023-01-05 13:07:04','2023-01-05 13:07:04'),(3,'users-update','Update Users','Update Users','2023-01-05 13:07:04','2023-01-05 13:07:04'),(4,'users-delete','Delete Users','Delete Users','2023-01-05 13:07:04','2023-01-05 13:07:04');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values (1,1,'App\\Models\\User'),(2,16,'App\\Models\\User'),(2,17,'App\\Models\\User'),(2,18,'App\\Models\\User'),(2,19,'App\\Models\\User'),(2,20,'App\\Models\\User'),(2,21,'App\\Models\\User'),(2,22,'App\\Models\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values (1,'admin','Admin','Admin','2023-01-05 13:07:04','2023-01-05 13:07:04'),(2,'client','Client','Client','2023-01-05 13:07:04','2023-01-05 13:07:04'),(3,'agent','Agent','Agent','2023-01-05 13:07:04','2023-01-05 13:07:04');

/*Table structure for table `templates_categories` */

DROP TABLE IF EXISTS `templates_categories`;

CREATE TABLE `templates_categories` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `templates_categories` */

insert  into `templates_categories`(`id`,`fullname`,`status`) values (1,'Auto Reply',1),(2,'Account Update',1),(3,'Payment Update',1),(4,'Personal Finance Update',1),(5,'Shipping Update',1),(6,'Reservation Update',1),(7,'Issue Resolution',1),(8,'Appointment Update',1),(9,'Transportation Update',1),(10,'Ticket Update',1),(11,'Alert Update',1);

/*Table structure for table `templates_languages` */

DROP TABLE IF EXISTS `templates_languages`;

CREATE TABLE `templates_languages` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(50) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `templates_languages` */

insert  into `templates_languages`(`id`,`shortname`,`fullname`,`status`) values (1,'en_US','English (US)',1),(2,'en_GB','English (UK)',1),(3,'en','English',1),(4,'nl','Dutch',1),(5,'ga','Irish',1),(6,'pt_BR','Portuguese (BR)',1),(7,'th','Thai',1),(8,'af','Afrikaans',1),(9,'kn','Kannada',1),(10,'ro','Romanian',1),(11,'ur','Urdu',1),(12,'az','Azerbaijani',1),(13,'fi','Finnish',1),(14,'lo','Lao',1),(15,'sk','Slovak',1),(16,'zu','Zulu',1),(17,'ca','Catalan',1),(18,'el','Greek',1),(19,'mk','Macedonian',1),(20,'es_AR','Spanish (ARG)',1),(21,'zh_TW','Chinese (TAI)',1),(22,'he','Hebrew',1),(23,'mr','Marathi',1),(24,'sw','Swahili',1),(25,'da','Danish',1),(26,'id','Indonesian',1),(27,'pl','Polish',1),(28,'te','Telugu',1),(29,'ja','Japanese',1),(30,'pa','Punjabi',1),(31,'uk','Ukrainian',1),(32,'ar','Arabic',1),(33,'fil','Filipino',1),(34,'ko','Korean',1),(35,'sr','Serbian',1),(36,'vi','Vietnamese',1),(37,'bg','Bulgarian',1),(38,'de','German',1),(39,'lt','Lithuanian',1),(40,'es','Spanish',1),(41,'zh_HK','Chinese (HKG)',1),(42,'ha','Hausa',1),(43,'ml','Malayalam',1),(44,'es_MX','Spanish (MEX)',1),(45,'cs','Czech',1),(46,'hu','Hungarian',1),(47,'fa','Persian',1),(48,'ta','Tamil',1),(49,'it','Italian',1),(50,'pt_PT','Portuguese (POR)',1),(51,'tr','Turkish',1),(52,'sq','Albanian',1),(53,'et','Estonian',1),(54,'kk','Kazakh',1),(55,'ru','Russian',1),(56,'uz','Uzbek',1),(57,'bn','Bengali',1),(58,'fr','French',1),(59,'lv','Latvian',1),(60,'sl','Slovenian',1),(61,'zh_CN','Chinese (CHN)',1),(62,'gu','Gujarati',1),(63,'ms','Malay',1),(64,'es_ES','Spanish (SPA)',1),(65,'hr','Croatian',1),(66,'hi','Hindi',1),(67,'nb','Norwegian',1),(68,'sv','Swedish',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `user_type` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`contact_no`,`profile_picture`,`user_type`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`last_login`) values (1,'Administrator','admin@gmail.com','03456148756','blank.png',1,NULL,'$2y$10$E9nXRXLBNxpfW9QfldH06Ox2dzu4atr5mKH9dsdbk5sh3oe8AVpMO',NULL,'2023-01-05 18:58:51','2023-01-17 09:20:37',NULL,'2023-01-17 09:20:37'),(21,'Noman Khan 123','noman.khan330123@gmail.com','03102338276','blank.png',2,NULL,'$2y$10$D1n732c6PSuJawBOWFNz6u4EE995ibz5NmKABXnkxXOxhAhywt5LG',NULL,'2023-01-11 14:22:50','2023-01-13 07:24:23',NULL,NULL),(22,'Muhammad Noman Khan','noman123@gmail.com','03102338276','blank.png',2,NULL,'$2y$10$K..eP.6ZMFpwSWDg2KXoGek2DKt17jn.8HgejZETS6D06kewyOdCq',NULL,'2023-01-12 21:04:26','2023-01-12 21:05:05',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
