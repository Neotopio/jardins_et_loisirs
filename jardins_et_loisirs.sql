-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 juin 2023 à 09:21
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jardins_et_loisirs`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 's.leininger@live.fr', '$2y$10$o1RrdnAbRMJyNj6fMAmRE.mzsQ/M.zmLBJ4xnUQ/Xp9LvmIHF5Q32');

-- --------------------------------------------------------

--
-- Structure de la table `bikes`
--

DROP TABLE IF EXISTS `bikes`;
CREATE TABLE IF NOT EXISTS `bikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bike_type` varchar(255) NOT NULL,
  `bike_image` varchar(255) NOT NULL,
  `bike_description` text,
  `bike_price` decimal(10,2) NOT NULL,
  `bike_quantity` int(11) NOT NULL,
  `is_enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bikes`
--

INSERT INTO `bikes` (`id`, `bike_type`, `bike_image`, `bike_description`, `bike_price`, `bike_quantity`, `is_enable`) VALUES
(2, 'VTT éléctrique', 'uploads/vtt-electrique-tout-suspendu-pinarello-nytro-dust-3-green.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel facilisis. Purus gravida quis blandit turpis cursus in. Egestas sed tempus urna et pharetra. Dui accumsan sit amet nulla facilisi. Faucibus purus in massa tempor nec. Amet massa vitae tortor condimentum. Varius duis at consectetur lorem donec massa sapien faucibus. Ut venenatis tellus in metus vulputate eu scelerisque. Nunc aliquet bibendum enim facilisis gravida. Odio facilisis mauris sit amet massa vitae. Congue quisque egestas diam in arcu cursus euismod quis. Urna molestie at elementum eu facilisis sed odio morbi. Quis commodo odio aenean sed adipiscing diam donec adipiscing. Egestas diam in arcu cursus euismod quis viverra nibh cras. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. In tellus integer feugiat scelerisque varius morbi enim nunc. Amet risus nullam eget felis eget nunc lobortis mattis aliquam.', '10.00', 10, 1),
(4, 'VTC éléctrique', 'uploads/vtc-electrique-giant-explore-e3-taille-m.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus vel facilisis. Purus gravida quis blandit turpis cursus in. Egestas sed tempus urna et pharetra. Dui accumsan sit amet nulla facilisi. Faucibus purus in massa tempor nec. Amet massa vitae tortor condimentum. Varius duis at consectetur lorem donec massa sapien faucibus. Ut venenatis tellus in metus vulputate eu scelerisque. Nunc aliquet bibendum enim facilisis gravida. Odio facilisis mauris sit amet massa vitae. Congue quisque egestas diam in arcu cursus euismod quis. Urna molestie at elementum eu facilisis sed odio morbi. Quis commodo odio aenean sed adipiscing diam donec adipiscing. Egestas diam in arcu cursus euismod quis viverra nibh cras. Tempus iaculis urna id volutpat lacus laoreet non curabitur. Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. In tellus integer feugiat scelerisque varius morbi enim nunc. Amet risus nullam eget felis eget nunc lobortis mattis aliquam.', '10.00', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(512) NOT NULL,
  `is_enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carousel`
--

INSERT INTO `carousel` (`id`, `chemin`, `is_enable`) VALUES
(1, 'uploads/IMG_20230607_092511.jpg', 1),
(2, 'uploads/IMG_20230607_092455.jpg', 1),
(3, 'uploads/IMG_20230607_092449.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(250) DEFAULT NULL,
  `description` text,
  `reference` varchar(250) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `ident_orders` int(11) DEFAULT NULL,
  `ident_customer` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gamme_products`
--

DROP TABLE IF EXISTS `gamme_products`;
CREATE TABLE IF NOT EXISTS `gamme_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `description` text,
  `is_enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gamme_products`
--

INSERT INTO `gamme_products` (`id`, `name`, `picture`, `description`, `is_enable`) VALUES
(1, 'aa', 'uploads/téléchargement (2).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\nelit, sed do eiusmod tempor incididunt ut labore\r\net dolore magna aliqua. Commodo viverra maecenas\r\naccumsan lacus vel facilisis. Purus gravida quis\r\nblandit turpis cursus in. Egestas sed tempus urna\r\net pharetra. Dui accumsan sit amet nulla facilisi.\r\nFaucibus purus in massa tempor nec. Amet massa\r\nvitae tortor condimentum. Varius duis at\r\nconsectetur lorem donec massa sapien faucibus. Ut\r\nvenenatis tellus in metus vulputate eu\r\nscelerisque. Nunc aliquet bibendum enim facilisis\r\ngravida. Odio facilisis mauris sit amet massa\r\nvitae. Congue quisque egestas diam in arcu cursus\r\neuismod quis. Urna molestie at elementum eu\r\nfacilisis sed odio morbi. Quis commodo odio aenean\r\nsed adipiscing diam donec adipiscing. Egestas diam\r\nin arcu cursus euismod quis viverra nibh cras.\r\nTempus iaculis urna id volutpat lacus laoreet non\r\ncurabitur. Laoreet id donec ultrices tincidunt\r\narcu non sodales neque sodales. In tellus integer\r\nfeugiat scelerisque varius morbi enim nunc. Amet\r\nrisus nullam eget felis eget nunc lobortis mattis\r\naliquam.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `illustrate`
--

DROP TABLE IF EXISTS `illustrate`;
CREATE TABLE IF NOT EXISTS `illustrate` (
  `id_product` int(11) DEFAULT NULL,
  `id_picture` int(11) DEFAULT NULL,
  KEY `id_picture` (`id_picture`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `illustrate`
--

INSERT INTO `illustrate` (`id_product`, `id_picture`) VALUES
(13, 24);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `description` text,
  `is_enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `name`, `picture`, `description`, `is_enable`) VALUES
(3, 'vedvefvdf', 'uploads/téléchargement (2).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\nelit, sed do eiusmod tempor incididunt ut labore\r\net dolore magna aliqua. Commodo viverra maecenas\r\naccumsan lacus vel facilisis. Purus gravida quis\r\nblandit turpis cursus in. Egestas sed tempus urna\r\net pharetra. Dui accumsan sit amet nulla facilisi.\r\nFaucibus purus in massa tempor nec. Amet massa\r\nvitae tortor condimentum. Varius duis at\r\nconsectetur lorem donec massa sapien faucibus. Ut\r\nvenenatis tellus in metus vulputate eu\r\nscelerisque. Nunc aliquet bibendum enim facilisis\r\ngravida. Odio facilisis mauris sit amet massa\r\nvitae. Congue quisque egestas diam in arcu cursus\r\neuismod quis. Urna molestie at elementum eu\r\nfacilisis sed odio morbi. Quis commodo odio aenean\r\nsed adipiscing diam donec adipiscing. Egestas diam\r\nin arcu cursus euismod quis viverra nibh cras.\r\nTempus iaculis urna id volutpat lacus laoreet non\r\ncurabitur. Laoreet id donec ultrices tincidunt\r\narcu non sodales neque sodales. In tellus integer\r\nfeugiat scelerisque varius morbi enim nunc. Amet\r\nrisus nullam eget felis eget nunc lobortis mattis\r\naliquam.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(250) DEFAULT NULL,
  `reference` varchar(250) DEFAULT NULL,
  `description` text,
  `price` decimal(5,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name_customer` varchar(250) DEFAULT NULL,
  `first_name_customer` varchar(50) DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_picture` varchar(250) NOT NULL,
  `path` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `name_picture`, `path`) VALUES
(22, 'téléchargement (2).jpg', 'uploads/téléchargement (2).jpg'),
(23, 'téléchargement (2).jpg', 'uploads/téléchargement (2).jpg'),
(24, 'téléchargement (2).jpg', 'uploads/téléchargement (2).jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `ident_time` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `characteristic_1` varchar(512) DEFAULT NULL,
  `characteristic_2` varchar(512) DEFAULT NULL,
  `characteristic_3` varchar(512) DEFAULT NULL,
  `reference` varchar(250) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `is_enable` int(11) NOT NULL,
  `id_subcategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_subcategory` (`id_subcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_product`, `ident_time`, `name`, `description`, `characteristic_1`, `characteristic_2`, `characteristic_3`, `reference`, `price`, `is_enable`, `id_subcategory`) VALUES
(13, 1684224060, 'zfvdsvsdv', 'sdvsdvsdvsd', 'sdvdsvsdvsd', '', '', 'sdvsdvsdvsd', '555.00', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bike_id` int(11) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_lastname` varchar(250) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `quantity` int(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bike` (`bike_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `description` text,
  `is_enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `picture`, `description`, `is_enable`) VALUES
(5, 'aaa', 'uploads/téléchargement (2).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\nelit, sed do eiusmod tempor incididunt ut labore\r\net dolore magna aliqua. Commodo viverra maecenas\r\naccumsan lacus vel facilisis. Purus gravida quis\r\nblandit turpis cursus in. Egestas sed tempus urna\r\net pharetra. Dui accumsan sit amet nulla facilisi.\r\nFaucibus purus in massa tempor nec. Amet massa\r\nvitae tortor condimentum. Varius duis at\r\nconsectetur lorem donec massa sapien faucibus. Ut\r\nvenenatis tellus in metus vulputate eu\r\nscelerisque. Nunc aliquet bibendum enim facilisis\r\ngravida. Odio facilisis mauris sit amet massa\r\nvitae. Congue quisque egestas diam in arcu cursus\r\neuismod quis. Urna molestie at elementum eu\r\nfacilisis sed odio morbi. Quis commodo odio aenean\r\nsed adipiscing diam donec adipiscing. Egestas diam\r\nin arcu cursus euismod quis viverra nibh cras.\r\nTempus iaculis urna id volutpat lacus laoreet non\r\ncurabitur. Laoreet id donec ultrices tincidunt\r\narcu non sodales neque sodales. In tellus integer\r\nfeugiat scelerisque varius morbi enim nunc. Amet\r\nrisus nullam eget felis eget nunc lobortis mattis\r\naliquam.', 1),
(6, 'fdczdscds', 'uploads/téléchargement (2).jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing\r\nelit, sed do eiusmod tempor incididunt ut labore\r\net dolore magna aliqua. Commodo viverra maecenas\r\naccumsan lacus vel facilisis. Purus gravida quis\r\nblandit turpis cursus in. Egestas sed tempus urna\r\net pharetra. Dui accumsan sit amet nulla facilisi.\r\nFaucibus purus in massa tempor nec. Amet massa\r\nvitae tortor condimentum. Varius duis at\r\nconsectetur lorem donec massa sapien faucibus. Ut\r\nvenenatis tellus in metus vulputate eu\r\nscelerisque. Nunc aliquet bibendum enim facilisis\r\ngravida. Odio facilisis mauris sit amet massa\r\nvitae. Congue quisque egestas diam in arcu cursus\r\neuismod quis. Urna molestie at elementum eu\r\nfacilisis sed odio morbi. Quis commodo odio aenean\r\nsed adipiscing diam donec adipiscing. Egestas diam\r\nin arcu cursus euismod quis viverra nibh cras.\r\nTempus iaculis urna id volutpat lacus laoreet non\r\ncurabitur. Laoreet id donec ultrices tincidunt\r\narcu non sodales neque sodales. In tellus integer\r\nfeugiat scelerisque varius morbi enim nunc. Amet\r\nrisus nullam eget felis eget nunc lobortis mattis\r\naliquam.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `is_enable` int(11) NOT NULL,
  `id_gamme_products` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_gamme_products` (`id_gamme_products`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `is_enable`, `id_gamme_products`) VALUES
(2, 'aadd', 1, 1),
(3, 'cscsd', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `validate`
--

DROP TABLE IF EXISTS `validate`;
CREATE TABLE IF NOT EXISTS `validate` (
  `id_validate` int(11) NOT NULL AUTO_INCREMENT,
  `id_bike` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `customer_name` varchar(512) NOT NULL,
  `customer_last_name` varchar(512) NOT NULL,
  `customer_email` varchar(512) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_validate`) USING BTREE,
  KEY `id_bike_validate` (`id_bike`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `validate`
--

INSERT INTO `validate` (`id_validate`, `id_bike`, `date_start`, `date_end`, `customer_name`, `customer_last_name`, `customer_email`, `customer_phone`, `quantity`) VALUES
(1, 2, '2023-06-27', '2023-06-29', 'a', 'a', 's.leininger@live.fr', 2111, 2),
(2, 2, '2023-06-27', '2023-06-29', 'a', 'a', 's.leininger@live.fr', 2111, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `illustrate`
--
ALTER TABLE `illustrate`
  ADD CONSTRAINT `id_picture` FOREIGN KEY (`id_picture`) REFERENCES `picture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_subcategory` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `id_bike` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `id_gamme_products` FOREIGN KEY (`id_gamme_products`) REFERENCES `gamme_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `validate`
--
ALTER TABLE `validate`
  ADD CONSTRAINT `id_bike_validate` FOREIGN KEY (`id_bike`) REFERENCES `bikes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
