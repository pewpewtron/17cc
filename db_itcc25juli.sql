/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.32-MariaDB : Database - db_itcc
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
-- CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_itcc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `itccuday_itcc2018`;

/*Table structure for table `admin_massages` */

DROP TABLE IF EXISTS `admin_massages`;

CREATE TABLE `admin_massages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_massages` */

/*Table structure for table `admin_message_temporaries` */

DROP TABLE IF EXISTS `admin_message_temporaries`;

CREATE TABLE `admin_message_temporaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_message_temporaries` */

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competition_id` tinyint(4) DEFAULT NULL,
  `privilege` enum('lomba','sekre','humas','juri') COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`fullname`,`competition_id`,`privilege`,`username`,`password`,`email`,`is_login`,`last_login_at`,`created_at`,`updated_at`,`remember_token`) values (1,'Admin PROG',1,'lomba','prog','$2y$10$h4ik3y6yPQ3MR7NjVLpyVeUPmtP/I2Iu8JyvI3pTxirRXhzIPflqW','admin@gmail.com',NULL,NULL,NULL,NULL,'ezcRzIjB7RO69UJAkxbwI4tMpqt4mLH5oP8f8X3AAeYXpRoT3w2Adb5qXsyc'),(2,'Admin WEB',2,'lomba','web','$2y$10$h4ik3y6yPQ3MR7NjVLpyVeUPmtP/I2Iu8JyvI3pTxirRXhzIPflqW','',NULL,NULL,NULL,NULL,'j1uTpENjrE3USKWqzzZGHQBOVOYaoXxcpDofbJczRhW1WXwgQl8iogwWiPYx'),(3,'Admin LCC',3,'lomba','lcc','$2y$10$h4ik3y6yPQ3MR7NjVLpyVeUPmtP/I2Iu8JyvI3pTxirRXhzIPflqW','',NULL,NULL,NULL,NULL,NULL),(4,'Admin IDEA',4,'lomba','idea','$2y$10$h4ik3y6yPQ3MR7NjVLpyVeUPmtP/I2Iu8JyvI3pTxirRXhzIPflqW','',NULL,NULL,NULL,NULL,'GJBsldfj9qcrVGcQN5H85DN89vusn3BMMShyFor2Uuu3qW56QU8LQ9EAZkgY'),(5,'Admin PAA',5,'lomba','android','$2y$10$h4ik3y6yPQ3MR7NjVLpyVeUPmtP/I2Iu8JyvI3pTxirRXhzIPflqW','',NULL,NULL,NULL,NULL,'Zl5LuaRkmIWdjXxe0ADrY81aW9i6XtICwRktjFxBVTqOteGCEfamct8vZbMS');

/*Table structure for table `competitions` */

DROP TABLE IF EXISTS `competitions`;

CREATE TABLE `competitions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_name` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regist_cost` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `competitions` */

insert  into `competitions`(`id`,`short_name`,`long_name`,`regist_cost`,`description`,`created_at`,`updated_at`) values (1,'PROG','Pemrograman',75000,'Cabang Lomba Pemrograman merupakan salah satu perlombaan yang ada dalam kegiatan ITCC 2018 yang dikhususkan untuk pelajar tingkat SMA/SMK sederajat Se-Bali. Cabang lomba pemrograman bertujuan untuk menjaring siswa/siswi SMA/SMK Sederajat seluruh Bali yang memiliki kompetensi di bidang komputer khususnya logika komputasi dan pemrograman.',NULL,NULL),(2,'WEB','Desain Web',75000,'',NULL,NULL),(3,'LCC','Cerdas Cermat',140000,'',NULL,NULL),(4,'IDEA','Pengembangan Ide Bisnis TIK',150000,'Pengembangan Ide Bisnis TIK merupakan salah satu perlombaan yang diselenggarakan pada kegiatan ITCC 2017 untuk mengajak masyarakat Indonesia mengembangkan bisnis melalui produk TIK. Lomba ini diperuntukkan untuk umum (maksimal umur 24 tahun) dengan cara membuat proposal bisnis serta prototype produk.',NULL,'2018-07-24 06:07:24'),(5,'PAA','Pengembangan Aplikasi Android',150000,'',NULL,NULL);

/*Table structure for table `detail_score_lists` */

DROP TABLE IF EXISTS `detail_score_lists`;

CREATE TABLE `detail_score_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `score_list_id` int(11) DEFAULT NULL,
  `part` enum('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_score_lists` */

insert  into `detail_score_lists`(`id`,`score_list_id`,`part`,`score`,`created_at`,`updated_at`) values (1,1,'a',2,'2018-05-20 18:41:25','2018-05-20 18:42:03'),(2,1,'b',2,'2018-05-20 18:41:25','2018-05-20 18:42:03'),(3,1,'c',2,'2018-05-20 18:41:25','2018-05-20 18:42:03'),(4,1,'d',2,'2018-05-20 18:41:25','2018-05-20 18:42:03'),(5,1,'e',2,'2018-05-20 18:41:26','2018-05-20 18:42:04'),(6,1,'f',2,'2018-05-20 18:41:26','2018-05-20 18:42:04'),(7,1,'g',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(8,1,'h',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(9,1,'i',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(10,1,'j',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(11,1,'k',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(12,1,'l',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(13,1,'m',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(14,1,'n',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(15,1,'o',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(16,1,'p',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(17,1,'q',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(18,1,'r',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(19,1,'s',1,'2018-05-20 18:41:26','2018-05-20 18:41:26'),(20,1,'t',1,'2018-05-20 18:41:26','2018-05-20 18:41:26');

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `etc` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `files` */

insert  into `files`(`id`,`group_id`,`title`,`link`,`etc`,`status`,`created_at`,`updated_at`) values (3,1,'Aplikasi Satu','berkas_1.pdf','Aplikasi satu dua tiga','N','2018-05-19 16:04:42','2018-05-19 16:04:42'),(4,1,'Aplikasi Dua','berkas_1.pdf','Aplikasi dua dari tim','N','2018-05-24 10:49:51','2018-05-24 10:49:51'),(10,3,'Tunify','berkas_3.pdf',NULL,'N','2018-07-25 14:13:45','2018-07-25 14:13:45'),(11,5,'Proposal Kami','berkas_5.pdf',NULL,'N','2018-07-25 18:52:05','2018-07-25 18:52:05');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_email` tinyint(4) NOT NULL DEFAULT '0',
  `email_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `competition_id` tinyint(4) NOT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verifying_admin` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regist_cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `groups` */

insert  into `groups`(`id`,`group_name`,`institution`,`username`,`password`,`verified_email`,`email_token`,`email`,`u_token`,`online`,`last_login_at`,`competition_id`,`verified`,`verified_at`,`verifying_admin`,`created_at`,`updated_at`,`remember_token`,`regist_cost`) values (2,'I Made Rama Pradana','SMA NEgeri 2 Amlapura','admin','$2y$10$EEJ8rqYPZMdDKmuM3.3V.ughcIcBAtpWKciSnEwszqEMs/Le2kZZG',1,'a2b71fb15f074cf8f35b440c231af121eb7e17d917d77419474a4ea9600e','ramapradana67@gmail.com',NULL,NULL,NULL,1,1,'2018-07-24 23:15:53',1,'2018-07-17 16:09:55','2018-07-24 23:15:53','9KrI7SqRFp7qIdcs6cDGkk8ass309Qc5xX41dxut6gCCauO5vqHEIJpjR1cr',NULL),(3,'embon tim','Universitas Udayana','admin1','$2y$10$h4ik3y6yPQ3MR7NjVLpyVeUPmtP/I2Iu8JyvI3pTxirRXhzIPflqW',1,'4baf0be7770153ae64f944feb36077b92040a86debcd46edc2e9ba5f8eb3','ramapradana67@hotmail.com',NULL,NULL,NULL,5,0,'2018-07-25 10:53:18',5,'2018-07-17 16:12:31','2018-07-25 10:53:18','ACjiFjX7Ta44Yl3IwdRs5JE4hNVuOYD0arpGDbjf1pwLtJ3tJsVfhfXkNDQp',150000),(4,'I Made Rama Pradanas','SMA NEgeri 2 Amlapura','ramap','$2y$10$8Gc4B9YvSWBGKT1o1gwgyuRcfEiyHziyn4u0kFoBKDgcDMjp8zdjm',1,'5a13c6f1f24377004627ccb944ac6a122f7e2d16174e9357709354dfd4b2','vivi1@gmail.com',NULL,NULL,NULL,1,1,'2018-07-24 23:16:17',1,'2018-07-24 22:10:35','2018-07-24 23:16:17','hjjjiElQz5BMiwrjxH2ukvurOTQKEfvMsulA5oEQkVZhFTGkVtw8keBuqC16',75000),(5,'Halo Bang','Universitas Indosesia','pesidea','$2y$10$XFYfti/ddno1KPLzN9liMu/QSmZqFMlLghxfYN0kEy8oSHAqoriJO',1,'69ff546b59f2a8288a19f43edec4441165b6a2de7a0f1db3369ce0eca0af','ramapradana67@gmail.com',NULL,NULL,NULL,4,1,'2018-07-25 18:30:38',4,'2018-07-25 16:41:54','2018-07-25 18:30:38','aqBPpGZPOsvKEMmrx77kkYtMHWeQrFMItzvX5Jd91xxJArSB8wPxPB7XHpXZ',150000);

/*Table structure for table `juries` */

DROP TABLE IF EXISTS `juries`;

CREATE TABLE `juries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competition_id` tinyint(4) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `juries` */

insert  into `juries`(`id`,`fullname`,`competition_id`,`username`,`password`,`email`,`is_login`,`last_login_at`,`created_at`,`updated_at`,`remember_token`) values (1,'Juri',4,'juri1','$2y$10$L5sy82N18RaRj.MnZxAC..fe8rC/eDdi91Js4uSRBKmQASCTou.5q','juri@gmail.com',NULL,NULL,NULL,NULL,'N5wmeZWsHyrqAUS8wfQfr15ZOwk8OJoKc7fx9QeZfE70LAepFZn16HpMiWRI');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (33,'2018_05_16_180745_create_users_activations_table',1),(102,'2014_10_12_100000_create_password_resets_table',2),(103,'2018_04_02_075657_create_group_table',2),(104,'2018_04_02_082006_create_competition_table',2),(105,'2018_04_02_082545_create_participant_table',2),(106,'2018_04_02_083616_create_admins_table',2),(107,'2018_04_13_165314_create_juries_table',2),(108,'2018_04_21_041722_create_verified_reqs_table',2),(109,'2018_04_21_105812_create_shirts_table',2),(110,'2018_04_27_023156_create_objects_table',2),(111,'2018_04_27_024116_create_score_lists_table',2),(112,'2018_04_27_031814_create_detail_score_lists_table',2),(113,'2018_05_05_000424_create_score_reqs_table',2),(114,'2018_05_08_180356_create_user_massages_table',2),(115,'2018_05_08_181702_create_admin_massages_table',2),(116,'2018_05_09_034857_create_user_message_temporaries_table',2),(117,'2018_05_09_120559_create_admin_message_temporaries_table',2),(118,'2018_05_17_100237_create_files_table',2),(119,'2018_05_17_102016_change_score_req_column',2),(120,'2018_05_17_102037_rename_score_req_column',2),(122,'2018_05_17_220339_add_email_verification_to_user_table',3),(123,'2018_05_17_200906_add_verif_req_column',4),(124,'2018_05_18_235651_add_competition_cost',5),(125,'2018_05_19_104440_add_competition_desc',5);

/*Table structure for table `objects` */

DROP TABLE IF EXISTS `objects`;

CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `etc` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `objects` */

/*Table structure for table `participants` */

DROP TABLE IF EXISTS `participants`;

CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `captain` tinyint(1) NOT NULL,
  `group_id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `vegetarian` tinyint(1) NOT NULL,
  `buy_shirt` tinyint(1) NOT NULL,
  `size` enum('XS','S','M','L','XL','XXL') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `participants` */

insert  into `participants`(`id`,`captain`,`group_id`,`code`,`full_name`,`birthdate`,`email`,`contact`,`photo`,`active`,`vegetarian`,`buy_shirt`,`size`,`created_at`,`updated_at`) values (1,1,2,'PROG_02','I Made Rama Pradana','2018-07-18','ramapradana67@gmail.com','082236255233','1_I Made Rama Pradana.jpg',NULL,0,0,NULL,'2018-07-17 16:10:03','2018-07-24 23:15:53'),(2,1,3,'PAA_03','I Made Rama Pradanasadsadsad','2018-07-03','ramapradana67@hotmail.com','082236255233','5_I Made Rama Pradana.jpg',NULL,0,1,NULL,'2018-07-17 16:12:36','2018-07-25 22:01:32'),(3,1,4,'PROG_03','I Made Rama Pradana','2018-07-15','vivi1@gmail.com','082236255233','1_I Made Rama Pradana.jpg',NULL,0,1,'S','2018-07-24 22:10:43','2018-07-25 09:48:31'),(5,0,3,'PAA_05','Trio Putra','2018-07-08','vivi1@gmail.comsd','082236255233','_Trio Putra.png',NULL,0,1,NULL,'2018-07-25 10:51:45','2018-07-25 22:01:32'),(6,1,5,'IDEA_01','Pradani Gayatri','2018-07-09','ihiud@gmail.com','082236255233','4_Pradani Gayatri.jpg',NULL,1,0,NULL,'2018-07-25 16:42:01','2018-07-25 18:30:39'),(7,0,5,'IDEA_02','Pandika Pinata','2018-07-02','rama12998@hotmail.comssd','082236255233','_Pandika Pinata.png',NULL,0,0,NULL,'2018-07-25 16:54:05','2018-07-25 18:30:39'),(8,0,5,'IDEA_03','Bagus Pramana','2018-07-04','rama12998@hotmail.comsds','082236255233','_Bagus Pramana.jpg',NULL,0,0,NULL,'2018-07-25 16:54:25','2018-07-25 18:30:39'),(10,0,3,NULL,'Bagus Pramana','2018-07-17','ramapradana67@hotmail.comsd','082236255233','3_Bagus Pramana.jpg',NULL,0,1,NULL,'2018-07-25 22:23:08','2018-07-25 22:23:08');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `posters` */

DROP TABLE IF EXISTS `posters`;

CREATE TABLE `posters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `posters` */

insert  into `posters`(`id`,`group_id`,`file`,`created_at`,`updated_at`) values (2,5,'poster_Proposal Kami.jpg','2018-07-25 18:59:04','2018-07-25 18:59:04');

/*Table structure for table `score_lists` */

DROP TABLE IF EXISTS `score_lists`;

CREATE TABLE `score_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `score_req_id` int(11) NOT NULL,
  `stage` enum('elemination','final') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `score_lists` */

insert  into `score_lists`(`id`,`score_req_id`,`stage`,`created_at`,`updated_at`) values (1,3,'elemination','2018-05-20 18:41:25','2018-05-20 18:41:25');

/*Table structure for table `score_reqs` */

DROP TABLE IF EXISTS `score_reqs`;

CREATE TABLE `score_reqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `jury_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `score_reqs` */

insert  into `score_reqs`(`id`,`file_id`,`jury_id`,`created_at`,`updated_at`,`status`) values (3,3,1,'2018-05-19 16:04:42','2018-05-20 18:40:28','1'),(4,4,1,'2018-05-24 10:49:51','2018-05-24 10:53:31','0'),(5,11,1,'2018-07-25 18:52:05','2018-07-25 18:52:05','0');

/*Table structure for table `shirts` */

DROP TABLE IF EXISTS `shirts`;

CREATE TABLE `shirts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shirts` */

insert  into `shirts`(`id`,`size`,`price`,`created_at`,`updated_at`) values (1,'s',50000,NULL,NULL);

/*Table structure for table `user_massages` */

DROP TABLE IF EXISTS `user_massages`;

CREATE TABLE `user_massages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_massages` */

/*Table structure for table `user_message_temporaries` */

DROP TABLE IF EXISTS `user_message_temporaries`;

CREATE TABLE `user_message_temporaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_message_temporaries` */

/*Table structure for table `users_activations` */

DROP TABLE IF EXISTS `users_activations`;

CREATE TABLE `users_activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users_activations` */

insert  into `users_activations`(`id`,`group_id`,`token`,`create_at`) values (1,1,'N6tO4kuqjuL9OJO93mXUiYcpsaTphc','2018-05-16 21:33:53'),(2,2,'lAnYoBZOjhxhjfRpSFWYlgc4qLh318','2018-05-16 22:22:07'),(3,3,'igN721CSrUWAfgipAwLdtQrnR2lk4s','2018-05-16 22:22:54');

/*Table structure for table `verified_reqs` */

DROP TABLE IF EXISTS `verified_reqs`;

CREATE TABLE `verified_reqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `request_at` datetime NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `verified_reqs` */

insert  into `verified_reqs`(`id`,`group_id`,`request_at`,`filename`,`note`,`created_at`,`updated_at`) values (1,1,'2018-05-19 15:58:01','verif_1.jpeg','request pembayaran','2018-05-19 15:58:01','2018-05-19 15:58:01'),(4,2,'2018-07-24 10:07:56','verif_2.jpg',NULL,'2018-07-24 10:07:56','2018-07-24 10:07:56'),(10,4,'2018-07-24 23:04:48','verif_4.jpg',NULL,'2018-07-24 23:04:48','2018-07-24 23:04:48'),(12,5,'2018-07-25 18:30:22','verif_5.jpg',NULL,'2018-07-25 18:30:22','2018-07-25 18:30:22');

/*Table structure for table `videoapks` */

DROP TABLE IF EXISTS `videoapks`;

CREATE TABLE `videoapks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `link` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `videoapks` */

insert  into `videoapks`(`id`,`group_id`,`link`,`created_at`,`updated_at`) values (2,3,'https://www.google.com/apaan','2018-07-25 15:11:53','2018-07-25 15:11:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
