-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2016 at 11:45 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musikdream`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(10) unsigned NOT NULL,
  `designation` varchar(63) NOT NULL,
  `rue` varchar(127) NOT NULL,
  `cp` varchar(15) NOT NULL,
  `ville` varchar(63) NOT NULL,
  `pays` varchar(31) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 adresse de facturation  1 adresse de livraison',
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(10) unsigned NOT NULL,
  `id_produit` int(10) unsigned NOT NULL,
  `contenu` varchar(1023) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(1023) NOT NULL,
  `nom` varchar(31) NOT NULL,
  `description` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `liaison_panier_produit`
--

CREATE TABLE IF NOT EXISTS `liaison_panier_produit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_panier` int(10) unsigned NOT NULL,
  `id_produit` int(10) unsigned NOT NULL,
  `quantite` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_panier` (`id_panier`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) NOT NULL,
  `prix` float NOT NULL,
  `quantite` int(3) NOT NULL,
  `poids` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sous_categorie`
--

CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_categorie` int(10) unsigned NOT NULL,
  `photo` varchar(1023) NOT NULL,
  `nom` varchar(31) NOT NULL,
  `description` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(31) NOT NULL,
  `prenom` varchar(31) NOT NULL,
  `email` varchar(63) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` varchar(15) NOT NULL,
  `date_naissance` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `telephone` varchar(31) NOT NULL,
  `sexe` tinyint(1) DEFAULT NULL COMMENT '1 homme  0 femme',
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `login` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liaison_panier_produit`
--
ALTER TABLE `liaison_panier_produit`
  ADD CONSTRAINT `liaison_panier_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaison_panier_produit_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `sous_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
