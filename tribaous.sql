-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 03 nov. 2020 à 12:06
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
-- Base de données :  `tribaous`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(255) NOT NULL,
  `eventLocalisation` text NOT NULL,
  `eventStart` datetime NOT NULL,
  `eventEnd` datetime NOT NULL,
  `eventDescription` text NOT NULL,
  `eventMember` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `eventName`, `eventLocalisation`, `eventStart`, `eventEnd`, `eventDescription`, `eventMember`) VALUES
(14, 'z', 'z', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'z', '28'),
(13, 'z', 'a', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'e', '29'),
(12, 'z', 'a', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'e', '28'),
(10, 'a', 'a', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'a', '29'),
(9, 'a', 'a', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'a', '28'),
(8, 'a', 'a', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'a', '30'),
(11, 'z', 'a', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'e', '30'),
(15, 'z', 'z', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'z', '27'),
(16, 'z', 'z', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'z', '28'),
(17, 'z', 'z', '2020-11-02 00:00:00', '2020-11-02 00:00:00', 'z', '27'),
(18, 't', 't', '2020-11-03 00:00:00', '2020-11-03 00:00:00', 't', '29'),
(19, 't', 't', '2020-11-03 00:00:00', '2020-11-03 00:00:00', 't', '27'),
(20, 't', 't', '2020-11-03 09:52:00', '2020-11-03 00:00:00', 't', '29'),
(21, 't', 't', '2020-11-03 09:52:00', '2020-11-03 00:00:00', 't', '27');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `password`, `picture`, `statut`, `prenom`, `nom`, `mail`) VALUES
(30, 'ju', 'dfbb7d0d467d06fbb4d5b7fb1617a145', 'public/images/imgProfil.jpg', 'User', 'Julien', 'LEGRAND', 'juju@po.fu'),
(28, 'p', '5f3e594ad17df5044bd15b18794002e2', 'public/images/uploads/PascalGAUBIACProfilPicture.jpg', 'User', 'Pascal', 'GAUBIAC', 'test'),
(29, 'paul', 'ff639ee0d3c67b2d13eaddc139740f7b', 'public/images/uploads/PaulCROCIProfilPicture.jpg', 'User', 'Paul', 'CROCI', 'paul'),
(26, 'Luc', 'b93b34d0611d91536c45c8b994cc8de3', 'public/images/imgProfil.jpg', 'Admin', 'Lucas', 'CROCI', 'crocil@free.fr'),
(27, 'juuuu', '4e6b26fa75b4b6861ec3974b3010911b', '', 'User', 'Julien', 'MASSA', 'juju'),
(31, 'vince', '806d780fc11a216706e259ea9415f010', 'public/images/uploads/VincentPOULLOTProfilPicture.jpg', 'User', 'Vincent', 'POULLOT', 'vincent@poullot.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
