-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 31 Mai 2016 à 14:34
-- Version du serveur: 5.6.28-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `musikdream`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(1023) NOT NULL,
  `nom` varchar(31) NOT NULL,
  `description` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `photo`, `nom`, `description`) VALUES
(1, 'public/images/cordes.png', 'Cordes', 'Catégorie des instruments à cordes'),
(2, 'public/images/vents.png', 'Vents', 'Catégorie des instruments à vents'),
(3, 'public/images/batteries.png', 'Batteries', 'Catégorie des instruments de percussions'),
(4, 'public/images/claviers.png', 'Claviers', 'Catégorie des instruments à touches'),
(5, 'public/images/accessoires.png', 'Accessoires', 'Catégorie des accessoires');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
