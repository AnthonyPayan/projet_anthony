-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 fév. 2022 à 18:39
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
-- Base de données : `recipe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Attente'),
(2, 'Entrées'),
(3, 'Plats'),
(4, 'Desserts'),
(5, 'Soupes & Potages'),
(6, 'Collations'),
(7, 'Boissons');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `ranked` int(10) DEFAULT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recette_id` (`recipe_id`),
  KEY `comment_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `ranked`, `recipe_id`, `user_id`) VALUES
(1, 'J\'aime ce plat', 5, 1, 1),
(2, 'J\'adore cette recette', 5, 8, 1),
(3, 'J\'aime beaucoup', 3, 8, 3),
(4, 'je n\'aime pas', 1, 8, 2),
(5, 'Super recette !', 3, 8, 1),
(6, 'test', 4, 8, 1),
(7, '♥', 5, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(265) NOT NULL,
  `description` text NOT NULL,
  `image` text,
  `date_recipe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_category_id` (`category_id`),
  KEY `recipe_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `image`, `date_recipe`, `user_id`, `category_id`) VALUES
(1, 'Cassoulet', '1er étape de la recette du cassoulet', 'cassoulet.jpg', '2022-02-03 18:15:42', 1, 3),
(2, 'Frites', 'premièrement couper les pommes de terres en forme de frites', 'frites.jpeg', '2022-02-03 18:18:23', 1, 3),
(3, 'Gâteau au chocolat ', 'Faire fondre le chocolat', 'gateau.jpg', '2022-02-03 18:20:12', 1, 4),
(4, 'Potage aux orties', 'Découper soigneusement les feuilles d\'ortie', 'potage_ortie.jpg', '2022-02-03 18:22:24', 1, 5),
(5, 'Quiche lorraine', 'Le secret est dans la préparation de le pâte', 'quiche_lorraine.jpg', '2022-02-03 18:23:56', 2, 3),
(6, 'Cookies', '1er étape mélanger la farine est le sucre', 'cookies.jpg', '2022-02-03 18:25:48', 3, 6),
(7, 'Mojito', 'Couper les citrons', 'mojito-11-350x350.jpg', '2022-02-03 18:27:28', 3, 2),
(8, 'Gâteau aux fraises', 'Placer les fraises soigneusement au fond du moule est primordial', 'gateau_fraise.jpeg', '2022-02-03 18:29:01', 3, 4),
(9, 'Vinaigrette au romarin', 'Le secret est dans le choix de l\'huile pour cette vinaigrette', 'vinaigrette.jpg', '2022-02-03 18:31:56', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL DEFAULT '3',
  `avatar` varchar(255) NOT NULL,
  `registration_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `role`, `avatar`, `registration_at`) VALUES
(1, 'admin', '$2y$10$rs1/tYF7tTSnrcGBbYqZ4.DhB..tuygwZbPiPINUyXb44Owq3/kbK', 1, '1', '2021-12-28 16:07:00'),
(2, 'user', '$2y$10$u.noNjbAS0nAuMZf9DOtAuTgl4taRQE8fCRjAdHb0.evg3iG.U6NG', 3, '23', '2022-02-01 10:33:03'),
(3, 'user2', '$2y$10$ziibcyF3VDSW5DDF0fTcFu4TUB4j7swQVxIoZDGl7Q4ergh.x6NRq', 3, '2', '2022-02-03 18:24:17');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_recette_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipe_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `recipe_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
