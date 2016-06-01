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
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sous_categorie` int(10) unsigned NOT NULL,
  `reference` varchar(31) NOT NULL,
  `stock` int(3) NOT NULL,
  `prix_ht` float NOT NULL,
  `tva` float NOT NULL,
  `description` varchar(1023) NOT NULL,
  `photo` varchar(1023) NOT NULL,
  `nom` varchar(31) NOT NULL,
  `poids` float NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 actif  0 inactif',
  PRIMARY KEY (`id`),
  KEY `id_sous_categorie` (`id_sous_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `id_sous_categorie`, `reference`, `stock`, `prix_ht`, `tva`, `description`, `photo`, `nom`, `poids`, `actif`) VALUES
(1, 4, 'MD-12346', 30, 3299, 20, 'Gerd Dowids BZ Series GL 72 Bb-Trumpet', 'public/images/trompette.png', 'Trompette Gerd Dowids', 850, 1),
(2, 3, 'MD-23456', 25, 4599, 20, 'Selmer Tenor Reference 54 SE-TR54L', 'public/images/saxophone.png', 'Saxophone Selmer Tenor', 1200, 1),
(3, 1, 'MD-34567', 15, 1799, 20, 'Fender AM Elite Tele Thinline MN NAT', 'public/images/guitarelectrique.png', 'Guitare electrique Fender', 1600, 1),
(4, 2, 'MD-45678', 8, 2699, 20, 'Music Man Bongo 6 Stealth Black', 'public/images/basselectrique.png', 'Basse electrique Music Man', 1900, 1),
(5, 5, 'MD-65478', 23, 1899, 20, 'Schreiber D-26 Bb-Clarinet', 'public/images/clarinette.png', 'Clarinette Schreiber modele D', 860, 1),
(11, 7, 'MD-69824', 4, 2399, 20, 'Pearl Export Double Bass Kit - Black', 'public/images/batterieaccoustique.png', 'Batterie accoustique Pearl', 9000, 1),
(12, 6, 'MD-96542', 2, 3499, 20, 'Roland TD-30K V-Drum Set', 'public/images/batterielectrique.png', 'Batterie electrique Roland', 6500, 1),
(13, 11, 'MD-78524', 6, 3299, 20, 'Access Virus Ti2 Keyboard', 'public/images/synthetiseur.png', 'Synthetiseur Korg Access Virus', 3400, 1),
(14, 12, 'MD-30254', 4, 3899, 20, 'Hammond SK2 Double SDRF 203545', 'public/images/orgue.png', 'Orgue numerique Hammond Classik', 5400, 1),
(15, 9, 'MD-98547', 3, 3199, 20, 'Yamaha CVP-701 B', 'public/images/pianonumerique.png', 'Piano numerique Yamaha Concert', 3950, 1),
(21, 10, 'MD-19564', 1, 13999, 20, 'Kawai GL 30 E/P Grand Piano', 'public/images/pianoqueue.png', 'Piano a queue Kawai studio', 312000, 1),
(22, 8, 'MD-65254', 5, 1349, 20, 'LP Galaxy Professional Conga Set', 'public/images/congas.png', 'Congas Serie Pro LP Galaxy', 7000, 1),
(23, 14, 'MD-425687', 25, 3.5, 20, 'Pro Snake Patch Angled Jack 0,15 m', 'public/images/cable.png', 'Cable connectique Jack court', 250, 1),
(24, 13, 'MD-78542', 3, 219, 20, 'K&M 17534 Guardian 3+1 Translucent', 'public/images/support.png', 'Support multi guitare K&M pro', 2300, 1),
(25, 15, 'MD-46325', 12, 59, 20, 'Boss TU-3', 'public/images/accordeur.png', 'Accordeur pro guitare et basse', 159, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
