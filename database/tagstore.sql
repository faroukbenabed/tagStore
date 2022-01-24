-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2022 at 09:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `self` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `category`, `description`) VALUES
(1, 'earphone', NULL, NULL),
(2, 'Smartphone', NULL, NULL),
(3, 'PC', NULL, NULL),
(4, 'TV', NULL, NULL),
(5, 'Mouse', NULL, NULL),
(6, 'Keyboard', NULL, NULL),
(7, 'Watch', NULL, NULL),
(8, 'Console', NULL, NULL),
(9, 'Game', NULL, NULL),
(10, 'Card', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `img` varchar(400) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `solde` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sd` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `start_date`, `end_date`, `description`, `img`, `user`, `solde`) VALUES
(1, 'Restocking', '2021-12-01 19:00:00', NULL, 'Be ready, we have new products and new gifts for you.\r\nCollect more points to be ready when we announce the new gifts.', '../img/restock-restocking.gif', NULL, NULL),
(53, 'You are lucky', '2022-01-24 19:04:00', NULL, 'Pick a product to get it for free hurry up', NULL, 12, 100),
(54, 'You are lucky', '2022-01-24 03:23:00', NULL, 'Pick a product to get it for free hurry up', NULL, 18, 100),
(55, 'You are lucky', '2022-01-24 04:10:00', '2022-01-24 09:12:52', 'Pick a product to get it for free hurry up', NULL, 22, 100);

-- --------------------------------------------------------

--
-- Table structure for table `event_object`
--

DROP TABLE IF EXISTS `event_object`;
CREATE TABLE IF NOT EXISTS `event_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `solde` int(11) DEFAULT NULL,
  `event` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aze` (`event`),
  KEY `ze` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_object`
--

DROP TABLE IF EXISTS `image_object`;
CREATE TABLE IF NOT EXISTS `image_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` int(11) DEFAULT NULL,
  `url` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `object` (`object`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_object`
--

INSERT INTO `image_object` (`id`, `object`, `url`) VALUES
(1, 1, '../img/products/iconix-bt.jpg'),
(2, 1, '../img/products/iconix-bt-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manufactory`
--

DROP TABLE IF EXISTS `manufactory`;
CREATE TABLE IF NOT EXISTS `manufactory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(800) DEFAULT NULL,
  `nationality` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufactory`
--

INSERT INTO `manufactory` (`id`, `name`, `description`, `nationality`) VALUES
(1, 'Iconix', NULL, NULL),
(2, 'Asus', NULL, NULL),
(3, 'Sumsung', NULL, NULL),
(4, 'Apple', NULL, NULL),
(5, 'Sony', NULL, NULL),
(6, 'HP', NULL, NULL),
(7, 'LG', NULL, NULL),
(8, 'Dell', NULL, NULL),
(9, 'MSI', NULL, NULL),
(10, 'Huawei', NULL, NULL),
(11, 'Lenovo', NULL, NULL),
(12, 'Toshiba', NULL, NULL),
(13, 'JBL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item` (`item`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `item`, `quantity`, `order_id`) VALUES
(21, 1, 1, 21),
(22, 1, 1, 22),
(23, 1, 1, 23),
(24, 1, 1, 24),
(25, 1, 1, 25),
(26, 1, 1, 26),
(27, 1, 1, 27),
(28, 1, 1, 28),
(29, 1, 1, 29),
(30, 54, 1, 30),
(31, 60, 1, 31),
(32, 65, 1, 32),
(33, 63, 1, 33),
(34, 59, 1, 34),
(35, 62, 1, 35),
(36, 62, 1, 36),
(37, 58, 1, 37),
(38, 62, 1, 38),
(39, 58, 1, 39),
(40, 61, 1, 40),
(41, 62, 1, 41),
(42, 65, 1, 42),
(43, 58, 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `order_t`
--

DROP TABLE IF EXISTS `order_t`;
CREATE TABLE IF NOT EXISTS `order_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordered_by` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `delivered` datetime DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1` (`ordered_by`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_t`
--

INSERT INTO `order_t` (`id`, `ordered_by`, `order_date`, `status`, `delivered`, `price`, `payment_type`) VALUES
(21, 1, '2021-12-31 11:52:41', 'En cours', NULL, 400, 'ts'),
(22, 1, '2021-12-31 11:52:50', 'En cours', NULL, 149, 'dt'),
(23, 1, '2021-12-31 11:57:07', 'En cours', NULL, 400, 'ts'),
(24, 1, '2022-01-01 12:00:07', 'En cours', NULL, 400, 'ts'),
(25, 1, '2022-01-01 12:00:17', 'En cours', NULL, 400, 'ts'),
(26, 1, '2022-01-01 12:01:09', 'En cours', NULL, 400, 'ts'),
(27, 1, '2022-01-01 12:04:38', 'En cours', NULL, 400, 'ts'),
(28, 15, '2022-01-24 01:10:41', 'En cours', NULL, 400, 'ts'),
(29, 15, '2022-01-24 01:16:40', 'En cours', NULL, 400, 'ts'),
(30, 12, '2022-01-24 07:05:48', 'En cours', NULL, 30, 'ts'),
(31, 12, '2022-01-24 07:08:51', 'En cours', NULL, 18, 'ts'),
(32, 12, '2022-01-24 07:09:31', 'En cours', NULL, 25, 'ts'),
(33, 12, '2022-01-24 07:10:35', 'En cours', NULL, 19, 'ts'),
(34, 12, '2022-01-24 07:10:52', 'En cours', NULL, 20, 'ts'),
(35, 18, '2022-01-24 08:00:10', 'En cours', NULL, 9, 'ts'),
(36, 19, '2022-01-24 08:18:54', 'En cours', NULL, 9, 'ts'),
(37, 18, '2022-01-24 08:27:29', 'En cours', NULL, 60, 'ts'),
(38, 22, '2022-01-24 08:45:30', 'En cours', NULL, 9, 'ts'),
(39, 22, '2022-01-24 08:53:14', 'En cours', NULL, 60, 'ts'),
(40, 22, '2022-01-24 08:53:24', 'En cours', NULL, 11, 'ts'),
(41, 24, '2022-01-24 09:04:03', 'En cours', NULL, 9, 'ts'),
(42, 24, '2022-01-24 09:09:05', 'En cours', NULL, 25, 'ts'),
(43, 22, '2022-01-24 09:12:18', 'En cours', NULL, 60, 'ts');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `fi_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(600) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `reference` varchar(200) DEFAULT NULL,
  `manufactory` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkk` (`category`),
  KEY `manufactory` (`manufactory`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `quantity`, `name`, `description`, `price`, `coin`, `fi_date`, `img`, `category`, `color`, `reference`, `manufactory`) VALUES
(1, 445, 'ÉCOUTEURS SANS FIL ICONIX - BLANC', 'Écouteurs Sans Fil ICONIX - Technologie de connectivité: Sans-Fil (Bluetooth) - Sensibilité: 103dB +3 a 1khz - Distance de connectivité: jusqu\'au 12 mètres - Temps de charge: 45 minutes - Temps de vie: 180 Minutes continue en musique; 80 heures Connecté au téléphone en pause; 720 heures sans être connecté aucune appareil - Couleur: Blanc - Garantie: 1 an', 149, 400, NULL, '../img/products/iconix-bt.jpg', 1, 'White', 'ICONIX-BT', 1),
(53, 5, 'PC PORTABLE GAMER ASUS F571', 'PC PORTABLE GAMER ASUS F571 I5 9Ã‰ GÃ‰N 16GO 512GO SSD - NOIR Ã‰TOILE (F571GT-HN962T)', 2500, 2000, NULL, '../img/f571gt-hn962t.jpg', 3, 'Black', 'F571', 2),
(54, 10, 'SOURIS ASUS SANS FIL WT425 - NOIR\r\n', 'Souris ASUS WT425 - Connectivité: Sans Fil - Type de souris: Optique - Résolution optique: 1600 Dpi - Nombre de boutons: 3 ', 41, 30, '2022-01-24 15:53:08', '../img/azuuu.jpg', 5, 'Black', 'WT425', 2),
(55, 5, 'SMARTPHONE SAMSUNG GALAXY A72 - BLEU', 'Ecran 6.7\" Super AMOLED - Résolution: (1080 x 2400) - Systéme d\'exploitation: Android 11 - Processeur: Qualcomm SM7125 Snapdragon 720G Octa-core', 1700, 1000, '2022-01-24 15:55:24', '../img/1_1037.jpg', 2, 'Blue', 'BU-SM-A72-BLUE', 3),
(56, 10, 'TÉLÉVISEUR TOSHIBA 43\" FULL HD - NOIR', 'Téléviseur TOSHIBA 43\" Full HD - Résolution: 1920 x 1080 pixels - Taille d\'image: 16:09 - Luminosité: 260 cd / m2 - Moteur Video: CEVO', 1000, 700, '2022-01-24 15:57:44', '../img/93183_bhq3l9mr8edmnbfl.jpg', 4, 'Black', 'TV-TSH-43S2850', 12),
(57, 15, 'PLAYSTATION 5 EDITION STANDARD - BLANC', 'Playstation 5 Edition Standard - Processeur: AMD Ryzen Zen 2 - Chipset graphique: AMD RDNA 2 10.28 TFLOPs - Mémoire RAM: 16 Go ', 3600, 3000, '2022-01-24 16:00:23', '../img/asusss_28_2.jpg', 8, 'White', '78741513833', 5),
(58, 20, 'CARTE PLAYSTATION PLUS - ABONNEMENT DE 3 MOIS', 'Carte d\'abonnement de 3 mois Prépayée - Multijoueur en ligne sur PlayStation 4 - 24 jeux PS4 par an sans coût supplémentaire', 110, 60, '2022-01-24 16:02:49', '../img/dsgrg.jpg', 10, NULL, '60050092140', 5),
(59, 10, 'Far Cry 6: Standard Edition PS4 PS5', 'Achetez pas cher Far Cry 6: Standard Edition pour PS4 & PS5. Prix le moins cher.', 41, 20, '2022-01-24 16:05:20', '../img/far-cry-6-standard-edition-ps4-ps5.jpg', 9, NULL, NULL, NULL),
(60, 20, 'NBA 2K22 PS4', 'Achetez pas cher NBA 2K22 pour PS4 & PS5. Prix le moins cher.', 38, 18, '2022-01-24 16:06:49', '../img/nba-2k22-ps4.jpg', 9, NULL, NULL, NULL),
(61, 20, 'Grand Theft Auto V PS4 PS5', 'Achetez Grand Theft Auto V pour PS4 & PS5. Meilleur prix garanti.', 16, 11, '2022-01-06 16:09:02', '../img/grand-theft-auto-v-ps4.jpg', 9, NULL, NULL, NULL),
(62, 20, 'HITMAN The Full Experience PS4 PS5', 'Achetez HITMAN The Full Experience pour PS4 & PS5. Meilleur prix garanti.', 14, 9, '2022-01-06 16:09:02', '../img/hitman-the-full-experience-ps4.jpg', 9, NULL, NULL, NULL),
(63, 20, 'No Man\'s Sky PS4 PS5', 'Achetez pas cher No Man\'s Sky pour PS4 & PS5. Prix le moins cher.', 23, 19, '2022-01-04 16:10:36', '../img/no-man-s-sky-ps4.jpg', 9, NULL, NULL, NULL),
(64, 20, 'Minecraft: PlayStation4 Edition PS4 PS5', 'Achetez Minecraft: PlayStation4 Edition pour PS4 & PS5. Meilleur prix garanti.', 10, 6, '2022-01-05 16:12:02', '../img/minecraft-playstation4-edition-ps4.jpg', 9, NULL, NULL, NULL),
(65, 30, 'ÉCOUTEUR INTRA-AURICULAIRE JBL T110', 'Ecouteurs JBL T110 - Connectivité: Filaire - Style de casque portable: In-ear - Fréquence des écouteurs: 20-20000 Hz', 40, 25, '2022-01-04 16:16:16', '../img/defefeffef.jpg', 1, 'Black', '0191892', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pw` varchar(200) NOT NULL,
  `sign_up_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_point_date` date DEFAULT NULL,
  `points` int(11) DEFAULT '10',
  `solde` double DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `pw`, `sign_up_date`, `last_point_date`, `points`, `solde`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', '2021-12-09 12:24:06', '2022-01-06', -1030, 0),
(12, 'ahmed', 'Benahmed', 'ahmedbenahmed@elicite.frk', 'ahmed', '2021-12-31 01:07:19', '2021-12-31', 55, 0),
(13, 'monta', 'benmonta', 'montabenmonta@elicite.frk', 'monta', '2021-12-31 01:07:46', '2021-12-31', 30, 0),
(14, 'Ali', 'Benali', 'alibenali@elicite.frk', 'ali', '2022-01-24 11:37:24', NULL, 10, 0),
(15, 'Ali', 'Benali', 'alibenali@elicite.tn', 'ali', '2022-01-24 11:38:41', '2022-01-24', 200, 0),
(16, 'med', 'benmed', 'med@elicite.tn', 'med', '2022-01-24 12:13:41', NULL, 10, 0),
(18, 'Mourad', 'Benmourad', 'moursddadbenmourad@elicite.frk', 'mourad', '2022-01-24 07:56:24', '2022-01-24', 11, 0),
(19, 'Mourad', 'Benmourad', 'mouradbenmourad@elicite.frk', 'mourad', '2022-01-24 08:15:42', '2022-01-24', 111, 0),
(20, 'Saleh', 'bensaleh', 'saleh@elicite', '', '2022-01-24 08:20:28', NULL, 10, 0),
(21, 'Saleh', 'bensaleh', 'saleh@elicite.tn', 'saleh', '2022-01-24 08:20:39', '2022-01-24', 20, 0),
(22, 'Jamel', 'Benjamel', 'jamelbenjamel@elicite.frk', 'jamel', '2022-01-24 08:41:55', '2022-01-24', 40, 0),
(24, 'Farouk', 'Ben Abed', 'faroukbenabed@elicite.frk', 'farouk', '2022-01-24 08:59:59', '2022-01-24', 76, 0),
(25, 'Ammar', 'Benammar', 'ammar@elicite.frk', 'ammar', '2022-01-24 09:07:38', NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

DROP TABLE IF EXISTS `user_progress`;
CREATE TABLE IF NOT EXISTS `user_progress` (
  `user` int(11) NOT NULL,
  `points_streak` int(11) NOT NULL DEFAULT '0',
  `link_sharing` int(11) NOT NULL DEFAULT '0',
  `purchased_products` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`user`, `points_streak`, `link_sharing`, `purchased_products`) VALUES
(15, 15, 6, 9),
(16, 0, 0, 0),
(19, 0, 1, 1),
(20, 0, 0, 0),
(21, 0, 0, 0),
(22, 0, 1, 4),
(24, 0, 1, 2),
(25, 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `self` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `sd` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `event_object`
--
ALTER TABLE `event_object`
  ADD CONSTRAINT `aze` FOREIGN KEY (`event`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `ze` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`item`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_t` (`id`);

--
-- Constraints for table `order_t`
--
ALTER TABLE `order_t`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`ordered_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fkk` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufactory`) REFERENCES `manufactory` (`id`);

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
