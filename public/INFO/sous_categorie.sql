-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 01 Juin 2016 à 13:47
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
-- Structure de la table `sous_categorie`
--

CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categorie` int(10) unsigned NOT NULL,
  `photo` varchar(1023) NOT NULL,
  `nom` varchar(31) NOT NULL,
  `description` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id`, `id_categorie`, `photo`, `nom`, `description`) VALUES
(1, 1, 'public/images/djembe.png', 'Guitares', 'Toutes les guitares'),
(2, 1, 'public/images/djembe.png', 'Basses', 'Toutes les basses'),
(3, 2, 'public/images/djembe.png', 'Saxophones', 'Tous les saxophones'),
(4, 2, 'public/images/djembe.png', 'Trompettes', 'Toutes les trompettes'),
(5, 2, 'public/images/djembe.png', 'Clarinettes', 'Toutes les clarinettes'),
(6, 3, 'public/images/djembe.png', 'Batteries electriques', 'Toutes les batteries electriques'),
(7, 3, 'public/images/djembe.png', 'Batteries acoustiques', 'Toutes les batteries acoustiques'),
(8, 3, 'public/images/djembe.png', 'Percussions', 'Toutes les percussions'),
(9, 4, 'public/images/djembe.png', 'Pianos numeriques', 'Tous les pianos numeriques'),
(10, 4, 'public/images/djembe.png', 'Pianos a queue', 'Tous les pianos a queue'),
(11, 4, 'public/images/djembe.png', 'Synthetiseurs', 'Tous les synthetiseurs'),
(12, 4, 'public/images/djembe.png', 'Orgues', 'Tous les orgues'),
(13, 5, 'public/images/djembe.png', 'Pieds et supports', 'Tous les pieds et supports'),
(14, 5, 'public/images/djembe.png', 'Cables et casques', 'Tous les cables et casques'),
(15, 5, 'public/images/djembe.png', 'Accordeurs et métronomes', 'Tous les accordeurs et métronomes');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `sous_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
