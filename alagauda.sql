-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 19 nov. 2020 à 16:14
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alagauda`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(255) NOT NULL,
  `eventLocalisation` text NOT NULL,
  `eventStart` datetime NOT NULL,
  `eventEnd` datetime NOT NULL,
  `eventDescription` text NOT NULL,
  `eventCreator` text NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventLocalisation`, `eventStart`, `eventEnd`, `eventDescription`, `eventCreator`) VALUES
(53, 'bonjour', 'oui', '2020-11-19 12:55:00', '2020-11-19 12:55:00', 'oui oui', '26'),
(52, 'z', 'a', '2020-11-19 10:48:00', '2020-11-19 10:48:00', 'a', ''),
(55, 'nouveau', 'ici', '2020-11-19 16:51:00', '2020-11-19 16:51:00', '', '26'),
(50, 'repas vince', 'antibes', '2020-11-21 12:45:00', '2020-11-21 13:46:00', 'repas', '26'),
(51, 'soirée vince', 'antibes', '2020-11-19 10:45:00', '2020-11-19 10:45:00', 'soirée', '26'),
(45, 'Anniversaire Vince', 'Antibes', '2020-11-13 21:00:00', '2020-11-13 23:00:00', '32 ans Vincent', '26');

-- --------------------------------------------------------

--
-- Structure de la table `jointable`
--

DROP TABLE IF EXISTS `jointable`;
CREATE TABLE IF NOT EXISTS `jointable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `participation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jointable`
--

INSERT INTO `jointable` (`id`, `event_id`, `member_id`, `participation`) VALUES
(75, 55, 26, 'Pas de reponse'),
(73, 55, 29, 'Pas de reponse'),
(72, 55, 28, 'Pas de reponse'),
(54, 45, 26, 'Non'),
(53, 45, 31, 'yes'),
(52, 45, 32, 'yes'),
(51, 45, 30, 'yes'),
(74, 55, 32, 'Pas de reponse');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `password`, `picture`, `statut`, `prenom`, `nom`, `mail`) VALUES
(30, 'ju', 'b93b34d0611d91536c45c8b994cc8de3', 'public/images/uploads/LucasCROCIProfilPicture.png', 'User', 'Julien', 'LEGRAND', 'juju@po.fu'),
(28, 'pascal', '6736a9029fbfb30c44b8e806047a9a25', 'public/images/uploads/LucasCROCIProfilPicture.jpg', 'User', 'Pascal', 'GAUBIAC', 'test'),
(29, 'paul', 'ff639ee0d3c67b2d13eaddc139740f7b', 'public/images/uploads/PaulCROCIProfilPicture.jpg', 'User', 'Paul', 'CROCI', 'paul'),
(26, 'Lucas', 'b93b34d0611d91536c45c8b994cc8de3', 'public/images/uploads/LucasCROCIProfilPicture.png', 'Admin', 'Lucas', 'CROCI', 'crocil@free.fr'),
(32, 'test', '79bd311dd358050b2f6bfad1374d353b', 'public/images/uploads/LucasCROCIProfilPicture.png', 'User', 'Prenom', 'NOM', 'test@test.fr'),
(31, 'vince', '806d780fc11a216706e259ea9415f010', 'public/images/uploads/VincentPOULLOTProfilPicture.jpg', 'User', 'Vincent', 'POULLOT', 'vincent@poullot.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
