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

insert  into `clients`(`id`,`user_id`,`client_name`,`address`,`contact_person`,`contact_number`,`email`,`status`,`created_at`,`updated_at`,`user_access_token`,`waba_id`,`phone_number_id`,`wa_number`,`deleted_at`) values (1,21,'Noman Khan 123','Address','Dawn','03102338276','noman.khan330@gmail.com',1,'2023-01-11 14:22:50','2023-01-19 07:41:59','123','456','789','92310123456789',NULL),(2,22,'Muhammad Noman Khan','ABC','Khawar Khaliq','03102338276','noman123@gmail.com',1,'2023-01-12 21:04:26','2023-01-12 21:05:05',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `contact_groups` */

DROP TABLE IF EXISTS `contact_groups`;

CREATE TABLE `contact_groups` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `group_status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `contact_groups` */

insert  into `contact_groups`(`id`,`user_id`,`fullname`,`group_status`,`created_at`,`updated_at`) values (1,21,'Management',1,NULL,NULL),(2,21,'Finance',1,NULL,NULL),(3,21,'HR',1,NULL,NULL),(4,22,'SD',1,NULL,NULL),(5,21,'My Group',0,'2023-02-03 12:37:52','2023-02-03 12:38:00');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `contact_group_id` int(11) DEFAULT NULL,
  `contact_name` varchar(200) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `contact_status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`user_id`,`contact_group_id`,`contact_name`,`country_code`,`contact_number`,`contact_status`,`created_at`,`updated_at`,`deleted_at`) values (1,21,2,'Khan','1','03102338277','valid','2023-01-17 00:50:00','2023-02-03 12:38:29',NULL),(2,21,2,'dawn','1481','14814555455','valid','2023-01-19 12:09:20','2023-01-19 12:09:20',NULL),(3,22,2,'noamn','khan','03102338276','valid','2023-01-20 05:36:03','2023-01-20 05:36:03',NULL);

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

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `template_id` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `broadcast_name` varchar(255) DEFAULT NULL,
  `message_type` enum('Session','Template') DEFAULT NULL,
  `message` text COMMENT 'this is template name or message',
  `is_sent` tinyint(1) DEFAULT NULL,
  `read_status` enum('Delivered','Read') DEFAULT NULL,
  `message_status` enum('Scheduled','Sent','Failed') DEFAULT 'Sent',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `messages` */

insert  into `messages`(`id`,`user_id`,`template_id`,`template_name`,`whatsapp_number`,`contact_number`,`broadcast_name`,`message_type`,`message`,`is_sent`,`read_status`,`message_status`,`created_at`,`updated_at`) values (1,21,'4','template 4','03102338276','03102338277','Send Single Message','Template','{\"messaging_product\":\"whatsapp\",\"to\":\"03102338277\",\"type\":\"template\",\"template\":{\"name\":\"Issue Resolution\",\"language\":{\"code\":\"en_US\",\"policy\":\"deterministic\"},\"components\":[{\"type\":\"body\",\"parameters\":[{\"type\":\"text\",\"text\":\"body text\"}]}]}}',0,'Delivered','Sent','2023-02-02 06:35:14','2023-02-02 06:35:14'),(2,21,'7','call to action','03102338276','03102338276','Send Single Message 2','Template','{\"messaging_product\":\"whatsapp\",\"to\":\"03102338276\",\"type\":\"template\",\"template\":{\"name\":\"Alert Update\",\"language\":{\"code\":\"af\",\"policy\":\"deterministic\"},\"components\":[{\"type\":\"header\",\"parameters\":[{\"type\":\"image\",\"image\":{\"link\":\"http(s):\\/\\/the-image-url\"}}]},{\"type\":\"body\",\"parameters\":[{\"type\":\"text\",\"text\":\"Dear aa\\r\\n\\r\\nThanks for contacting us. Our team bb will connect you soon.\"}]}]}}',0,'Delivered','Sent','2023-02-02 06:35:39','2023-02-02 06:35:39'),(3,21,'7','call to action','03102338276','03102338277','test','Template','{\"messaging_product\":\"whatsapp\",\"to\":\"03102338277\",\"type\":\"template\",\"template\":{\"name\":\"Alert Update\",\"language\":{\"code\":\"af\",\"policy\":\"deterministic\"},\"components\":[{\"type\":\"header\",\"parameters\":[{\"type\":\"image\",\"image\":{\"link\":\"http(s):\\/\\/the-image-url\"}}]},{\"type\":\"body\",\"parameters\":[{\"type\":\"text\",\"text\":\"Dear noman\\r\\n\\r\\nThanks for contacting us. Our team khan will connect you soon.\"}]}]}}',0,'Delivered','Sent','2023-02-07 11:42:16','2023-02-07 11:42:16');

/*Table structure for table `messages_bulk` */

DROP TABLE IF EXISTS `messages_bulk`;

CREATE TABLE `messages_bulk` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `template_id` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(50) DEFAULT NULL,
  `broadcast_name` varchar(255) DEFAULT NULL,
  `broadcast_type` enum('Now','Later') DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL,
  `scheduled_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `messages_bulk` */

insert  into `messages_bulk`(`id`,`user_id`,`template_id`,`template_name`,`whatsapp_number`,`broadcast_name`,`broadcast_type`,`is_completed`,`scheduled_at`,`created_at`,`updated_at`) values (1,21,'4','template 4','03102338276','Send Bulk Message','Now',NULL,NULL,'2023-02-02 06:50:10','2023-02-02 06:50:10');

/*Table structure for table `messages_bulk_details` */

DROP TABLE IF EXISTS `messages_bulk_details`;

CREATE TABLE `messages_bulk_details` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `bulk_id` bigint(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `template_id` bigint(20) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `broadcast_name` varchar(255) DEFAULT NULL,
  `message_type` enum('Session','Template') DEFAULT 'Template',
  `message` text COMMENT 'this is template name or message',
  `is_sent` tinyint(1) DEFAULT '0',
  `read_status` enum('Delivered','Read') DEFAULT 'Delivered',
  `message_status` enum('Sent','Failed','Scheduled') DEFAULT 'Scheduled',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `messages_bulk_details` */

insert  into `messages_bulk_details`(`id`,`bulk_id`,`user_id`,`contact_number`,`template_id`,`template_name`,`broadcast_name`,`message_type`,`message`,`is_sent`,`read_status`,`message_status`,`created_at`,`updated_at`) values (1,1,21,'923102338276',4,'template 4','Send Bulk Message','Template','{\"messaging_product\":\"whatsapp\",\"to\":923102338276,\"type\":\"template\",\"template\":{\"name\":\"Issue Resolution\",\"language\":{\"code\":\"en_US\",\"policy\":\"deterministic\"},\"components\":[{\"type\":\"body\",\"parameters\":[{\"type\":\"text\",\"text\":\"body text\"}]}]}}',0,'Delivered','Failed','2023-02-02 06:50:10','2023-02-02 06:50:10'),(2,1,21,'923102338278',4,'template 4','Send Bulk Message','Template','{\"messaging_product\":\"whatsapp\",\"to\":923102338276,\"type\":\"template\",\"template\":{\"name\":\"Issue Resolution\",\"language\":{\"code\":\"en_US\",\"policy\":\"deterministic\"},\"components\":[{\"type\":\"body\",\"parameters\":[{\"type\":\"text\",\"text\":\"body text\"}]}]}}',0,'Delivered','Sent','2023-02-02 06:50:10','2023-02-02 06:50:10'),(4,NULL,NULL,NULL,NULL,NULL,NULL,'Template',NULL,0,'Delivered','Scheduled',NULL,NULL);

/*Table structure for table `messages_incomes` */

DROP TABLE IF EXISTS `messages_incomes`;

CREATE TABLE `messages_incomes` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `whatsapp_contact_no` varchar(50) DEFAULT NULL,
  `sender_name` varchar(50) DEFAULT NULL,
  `text` text,
  `type` enum('Text') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `messages_incomes` */

insert  into `messages_incomes`(`id`,`user_id`,`whatsapp_contact_no`,`sender_name`,`text`,`type`,`created_at`,`update_at`) values (1,21,'923102338276','Noman','Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit	','Text','2023-02-10 11:35:24','2023-02-10 11:35:26');

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

/*Table structure for table `templates` */

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `template_category` int(11) DEFAULT NULL,
  `template_language` int(11) DEFAULT NULL,
  `header_type` varchar(150) DEFAULT NULL,
  `header_value` varchar(255) DEFAULT NULL,
  `header_type_ext` varchar(255) DEFAULT NULL,
  `body_text` text,
  `footer_text` tinytext,
  `template_status` varchar(20) DEFAULT NULL,
  `button_type` varchar(50) DEFAULT NULL,
  `button_value` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `templates` */

insert  into `templates`(`id`,`user_id`,`template_name`,`template_category`,`template_language`,`header_type`,`header_value`,`header_type_ext`,`body_text`,`footer_text`,`template_status`,`button_type`,`button_value`,`created_at`,`updated_at`,`deleted_at`) values (2,21,'template 2',2,52,'media','uploads/templates/21/20230120075017-01-2023 01_10_08_valid_Contact_Report.csv',NULL,'Dear {{3}}\r\n\r\nThanks for contacting us. Our team {{5}} will connect you soon.\r\n\r\nPlease visit our link for more information;\r\nwww.google.com','Thanks Team Demo\r\n\r\n','Approved','call_to_action','{\"website_button_text\":\"web button text\",\"website_type\":\"static\",\"website_link\":\"http:\\/\\/whatsapp.techcore.test:81\\/template\",\"phone_button_text\":\"call button text\",\"phone_phone_number\":\"123\"}','2023-01-20 07:50:52','2023-01-20 07:50:52',NULL),(3,21,'template 3',10,2,'text','this is text',NULL,'test {{2}} {{2}}','footer','Approved',NULL,'','2023-01-20 09:56:35','2023-01-20 09:56:35',NULL),(4,21,'template 4',7,1,'none','',NULL,'body text','footer text','Approved',NULL,'','2023-01-20 09:58:05','2023-01-20 09:58:05',NULL),(6,21,'bodylink',10,3,'media','uploads/templates/21/2023012319051655209709.jpg',NULL,'Dear {{1}}\r\n\r\nThanks for contacting us. Our team {{2}} will connect you soon.\r\n\r\nPlease visit our link for more information;\r\nwww.google.com\r\n{{3}}','Thanks Team Demo','Approved','quick_reply','{\"quick_reply_button_text_1\":\"Received\",\"quick_reply_button_text_2\":\"Interested\",\"quick_reply_button_text_3\":\"Not Interested\"}','2023-01-23 19:05:06','2023-01-23 19:05:06',NULL),(7,21,'call to action',11,8,'media','uploads/templates/21/202301231939Client-Create-Edit.png',NULL,'Dear {{1}}\r\n\r\nThanks for contacting us. Our team {{2}} will connect you soon.','footer here','Approved','call_to_action','{\"website_button_text\":\"click here\",\"website_type\":\"static\",\"website_link\":\"https:\\/\\/go2market.in\\/\",\"phone_button_text\":\"Call Phone Text\",\"phone_phone_number\":\"917982204459\"}','2023-01-23 19:39:17','2023-01-23 19:39:17',NULL),(8,21,'template for preview',1,52,'text','this is header text',NULL,'this is body {{ 3 }} for testing {{ 6 }}','this is footer text','Pending','quick_reply','{\"quick_reply_button_text_1\":\"one\",\"quick_reply_button_text_2\":\"two\",\"quick_reply_button_text_3\":\"three\"}','2023-02-08 12:44:25','2023-02-08 12:44:25',NULL);

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

insert  into `users`(`id`,`name`,`email`,`contact_no`,`profile_picture`,`user_type`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`last_login`) values (1,'Administrator','admin@gmail.com','03456148756','blank.png',1,NULL,'$2y$10$E9nXRXLBNxpfW9QfldH06Ox2dzu4atr5mKH9dsdbk5sh3oe8AVpMO',NULL,'2023-01-05 18:58:51','2023-02-03 07:43:17',NULL,'2023-02-03 07:43:17'),(21,'Noman Khan 123','noman.khan330@gmail.com','03102338276','blank.png',2,NULL,'$2y$10$GL7AT5vIbxRsrm1uCkubSuoKkMLiFFhtes7wYrIWLnIYAvIZKymDm',NULL,'2023-01-11 14:22:50','2023-02-14 11:56:42',NULL,'2023-02-14 11:56:42'),(22,'Muhammad Noman Khan','noman123@gmail.com','03102338276','blank.png',2,NULL,'$2y$10$K..eP.6ZMFpwSWDg2KXoGek2DKt17jn.8HgejZETS6D06kewyOdCq',NULL,'2023-01-12 21:04:26','2023-01-12 21:05:05',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
