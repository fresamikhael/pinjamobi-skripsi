-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `v_regist_number` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `colour` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cars` (`id`, `name`, `users_id`, `categories_id`, `price`, `penalty`, `description`, `status`, `v_regist_number`, `colour`, `deleted_at`, `created_at`, `updated_at`, `slug`, `driver`) VALUES
(3,	'Honda Jazz',	7,	2,	20000,	20000,	'<p>Mobil Lain</p>',	'TERSEDIA',	'B9123HDF',	'Merah',	NULL,	'2021-07-12 19:23:57',	'2021-07-22 02:24:25',	'honda-jazz',	0),
(4,	'BMW i5',	7,	1,	30000,	20000,	'<p>Test</p>',	'TERSEDIA',	'B2012HDB',	'Putih',	NULL,	'2021-07-22 01:31:22',	'2021-07-22 01:36:56',	'bmw-i5',	1),
(5,	'Expander',	2,	3,	50000,	20000,	'<p>Mobil Testing</p>',	'DISEWA',	'B2012HDB',	'Biru',	NULL,	'2021-07-22 01:53:35',	'2021-07-22 02:48:50',	'expander',	1),
(6,	'HIACE',	2,	3,	80000,	15000,	'<p>Hiace mobil keluarga</p>',	'TERSEDIA',	'B2012HDB',	'Putih',	NULL,	'2021-07-22 02:00:11',	'2021-07-22 02:00:11',	'hiace',	1);

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cars_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `car_galleries`;
CREATE TABLE `car_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cars_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `car_galleries` (`id`, `photos`, `cars_id`, `created_at`, `updated_at`) VALUES
(5,	'assets/car/p8g8s1lXmzoxESooCR75FkFrfAzki2kqleO6bnDH.png',	3,	'2021-07-12 19:25:45',	'2021-07-12 19:25:45'),
(6,	'assets/car/VVEGsXSJqGHjf5gmNpLAErfUzy5JIpMRMgB1zAAc.jpg',	4,	'2021-07-22 01:31:22',	'2021-07-22 01:31:22'),
(8,	'assets/car/fClGY6y7RHlDhN5RtXZFu3K0IozzBmZTJQERL4yP.png',	6,	'2021-07-22 02:00:11',	'2021-07-22 02:00:11'),
(9,	'assets/car/9RbeDWqM0ZxR8Wn43xsigMojV5hI1N3CbdAQyKLo.jpg',	5,	'2021-07-22 02:06:45',	'2021-07-22 02:06:45');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `photo`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'City Car',	'assets/category/02SxSt2tbuCw7dMFI6qCl33poC3VjIiPVtU2bGgE.jpg',	'city-car',	NULL,	'2021-07-10 05:09:03',	'2021-07-10 05:20:04'),
(2,	'Mini Bus',	'assets/category/FL0qFDM9xU3Xdo341u8jlMa5qwf3dmq52FsQYhCc.jpg',	'mini-bus',	NULL,	'2021-07-12 19:13:22',	'2021-07-22 01:48:42'),
(3,	'SUV',	'assets/category/oPv8Aq4tluOALo6Uoo4zeifbAtY8T1qghgQvXCs9.jpg',	'suv',	NULL,	'2021-07-22 01:48:56',	'2021-07-22 01:48:56'),
(4,	'Sport',	'assets/category/O0RbkLnrzIVv3YFtfCsuvdBqjkHh58s5ytutRNnR.jpg',	'sport',	NULL,	'2021-07-22 01:49:15',	'2021-07-22 01:49:15'),
(5,	'Hatchback',	'assets/category/qiH6ZoLueGiXhfe77i1xICmi4Nxf9C7nsspG8rMa.jpg',	'hatchback',	NULL,	'2021-07-22 01:49:28',	'2021-07-22 01:49:28'),
(6,	'MPV',	'assets/category/RjVgK6mwDLKHyHmhysGcOXo2VGpKkhhiUHM0a7ny.jpg',	'mpv',	NULL,	'2021-07-22 01:49:44',	'2021-07-22 01:49:44');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2021_07_09_114314_create_categories_table',	1),
(5,	'2021_07_09_114824_create_car_table',	1),
(6,	'2021_07_09_120046_create_car_galleries_table',	1),
(7,	'2021_07_09_120311_create_carts_table',	1),
(8,	'2021_07_09_121136_create_transactions_table',	2),
(9,	'2021_07_09_121148_create_transaction_details_table',	2),
(10,	'2021_07_10_014704_delete_penalty_and_finish_rent_field_at_transactions_table',	3),
(11,	'2021_07_10_015323_add_penalty_finish_date_and_status_to_transaction_details_table',	4),
(12,	'2021_07_10_015953_add_code_to_transactions_table',	5),
(13,	'2021_07_10_020124_add_code_to_transaction_details_table',	5),
(14,	'2021_07_10_020442_add_slug_field_to_car_table',	6),
(15,	'2021_07_10_051738_add_roles_field_to_users_table',	7),
(16,	'2021_07_11_045342_change_nullable_field_at_users_table',	8);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `driver` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transactions` (`id`, `users_id`, `price`, `rent_date`, `return_date`, `driver`, `transaction_status`, `deleted_at`, `created_at`, `updated_at`, `code`) VALUES
(66,	13,	100000,	'2021-07-22',	'2021-07-23',	'PAKAI',	'PENDING',	NULL,	'2021-07-22 02:48:50',	'2021-07-22 02:48:50',	'RENT-5081');

DROP TABLE IF EXISTS `transaction_details`;
CREATE TABLE `transaction_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transactions_id` int(11) NOT NULL,
  `cars_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penalty` int(11) DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transaction_details` (`id`, `transactions_id`, `cars_id`, `price`, `created_at`, `updated_at`, `status`, `penalty`, `finish_date`, `code`) VALUES
(58,	66,	5,	100000,	'2021-07-22 02:48:50',	'2021-07-22 02:57:00',	'SELESAI',	5000,	'2021-07-26',	'TRX-6621');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(12) CHARACTER SET utf8mb4 DEFAULT NULL,
  `rent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_status` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone_number`, `rent_name`, `rent_status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `roles`, `photo`) VALUES
(2,	'9530121',	'Fresa Coba',	'fresa@gmail.com',	NULL,	'$2y$10$bQ0bXOXeiO49KmRKe406Ge3qLjb2NPVgIdaZ.8PWG9/RqVaaviWh2',	'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3964.452264287149!2d107.04118684422433!3d-6.464246448057829!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x87457ec9dfa66399!2sBukit%20Jasmine!5e0!3m2!1sid!2sid!4v1626949503217!5m2!1sid!2sid',	'081952012341',	'Citra Jaya',	1,	NULL,	NULL,	'2021-07-10 23:26:35',	'2021-07-22 03:25:29',	'OWNER',	'assets/user/nT9js4Fqgy3y6NJjO8BLGMZGjnCNQ6c8Ul9k5dkS.jpg'),
(3,	'12391',	'Mikael',	'mikael@gmail.com',	NULL,	'$2y$10$kDv223XYUkTTlNS1YV3KA.Hc7rjnSVLe0yzP.zQqE1phvP5JXU0Ue',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-07-12 22:12:30',	'2021-07-12 22:12:30',	'USER',	''),
(5,	'123321',	'Karni',	'bangaw@gmail.com',	NULL,	'$2y$10$WIkh1QdBE2MK.oKjhdnpuuON7RXbObXrMt3MRwjgjoOr5m.5N.xzK',	'Bukit Putra, GK10/5',	'082394238128',	NULL,	NULL,	NULL,	NULL,	'2021-07-13 00:47:32',	'2021-07-15 00:34:57',	'ADMIN',	''),
(6,	'12345',	'Vani',	'vani@gmail.com',	NULL,	'$2y$10$WmXh6yt/jo8INentnidFXOBUaRw2qfJQVIMlvOPRwXl5jJEytj9Z2',	'Citra Jaya 01/15, Test 1',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-07-13 01:11:09',	'2021-07-13 01:11:09',	'USER',	''),
(7,	'1234556821',	'Panji',	'panji@gmail.com',	NULL,	'$2y$10$bCgjWfveBBlmCV60l1E8yOEbAlINdrUPZQpRe.PPap.ncJQF3T/Gi',	'Bukit Putra, GK10/9',	'081952012341',	'Kimi Rental',	1,	NULL,	NULL,	'2021-07-14 05:47:04',	'2021-07-22 02:20:36',	'OWNER',	'assets/user/lu128kwwSMGYnhdeqgQzli9hvnyxtIE7U77KNiGP.png'),
(8,	'92382834123489230',	'Fresa Mikhael',	'mikhael@gmail.com',	NULL,	'$2y$10$ir7SjnkVHFiXDf9iFopIueLaDa7.wveTX2DbMrNJKtriplnMUrtly',	'Bougenville',	'081952012341',	NULL,	NULL,	NULL,	NULL,	'2021-07-15 02:58:24',	'2021-07-22 01:45:43',	'USER',	'assets/user/EJYyxaKwG8X3OhqG2GG7gIxFEpAeEvQSkX2B2s2i.png'),
(9,	'1234567812345678',	'Admin',	'admin@gmail.com',	NULL,	'$2y$10$G43lUgM5PQUDk6rK70su.eDDIPdiBNFK/lblytrhtBez68Nw8vyK2',	'Admin',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-07-18 22:11:17',	'2021-07-18 22:11:17',	'ADMIN',	''),
(10,	'1234567890123456',	'Bambang',	'bambang@gmail.com',	NULL,	'$2y$10$abl4OnlKg0L3RVyn1vHL1OHoa180uMU8nyU.A1XqRTCC.azQFCiFq',	'Markisa',	NULL,	NULL,	NULL,	NULL,	NULL,	'2021-07-20 00:24:52',	'2021-07-20 00:24:52',	'USER',	''),
(11,	'1234567',	'Sugeng Marko',	'sugeng@gmail.com',	NULL,	'$2y$10$hfNjGGmqSRNAbv4WKPFAW./P0hWMk58UwLPHJpdGq04vLA.dFGpDu',	'Perum TNI AL',	'081938217348',	NULL,	NULL,	NULL,	NULL,	'2021-07-20 02:47:34',	'2021-07-20 02:49:03',	'USER',	''),
(12,	'1234567899876543',	'Karmin',	'karmin@gmail.com',	NULL,	'$2y$10$PmnSpt80zgp3IC/Ml4rXcudRTvfVG01GZ.TIH.py7KD76pHCO4up6',	'Kandang Ayam',	'081528371623',	NULL,	NULL,	NULL,	NULL,	'2021-07-20 20:37:23',	'2021-07-20 20:37:58',	'USER',	NULL),
(13,	'123341234771238',	'Fresa',	'fresa1@gmail.com',	NULL,	'$2y$10$RXdLiHZFA4JjMpzm2e/z3ecOplX5y2TMIUdO9pt7stZdb2pT4kkua',	'Coba',	'081952012341',	NULL,	NULL,	NULL,	NULL,	'2021-07-22 02:45:30',	'2021-07-22 02:48:50',	'USER',	NULL);

-- 2021-07-22 14:23:47
