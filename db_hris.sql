-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: db_hris
-- Generation Time: 2023-09-01 20:47:23.5400
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

INSERT INTO `employees` (`id`, `name`, `email`, `photo`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Tukul', 'tukul@tuku.com', '1693573353_6a989f294288ab29e5f1.jpg', 'staff', '2023-09-01 13:57:00', '2023-09-01 13:02:33'),
(6, 'wkwk 2', 'wkwk@mm.com', '1693573345_ac593b694301990d2e10.jpg', 'staff', '2023-09-01 15:17:17', '2023-09-01 13:02:25'),
(8, 'Azula', 'azula@gmail.com', '1693573337_708976c0dd08d163364e.jpg', 'manager', '2023-09-01 16:08:12', '2023-09-01 13:02:17'),
(9, 'Budiman', 'budiman@gmail.com', '1693572667_9a6d4de3f4133fd85873.jpg', 'staff', '2023-09-01 19:51:07', '2023-09-01 19:51:07');

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-09-01-025804', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1693537518, 1),
(2, '2023-09-01-030938', 'App\\Database\\Migrations\\CreateEmployeesTable', 'default', 'App', 1693538468, 2),
(3, '2023-09-01-032301', 'App\\Database\\Migrations\\ModifyEmployeesTable', 'default', 'App', 1693538768, 3),
(4, '2023-09-01-064721', 'App\\Database\\Migrations\\CreateEmployeeTbl', 'default', 'App', 1693551178, 4);

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'ngadimin', '$2y$10$cOfp4hql8sHu9JJyx.gPOuxeFKytU87JdQWDRI7Ho8QNqUqmRW/Iy', 'admin'),
(2, 'rdmaulana', '$2y$10$PUTq3A85jVC1PU5swotTC.V6YrP2j9gDMfy543461lAjRvky4pUSW', 'admin'),
(5, 'eri.wiana', '$2y$10$DGIw59oTTh528PEB/.Bf9u2A.EcG5LfYyNtJeWd8hLqglpw7Pz/Yy', 'admin');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;