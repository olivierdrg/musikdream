-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 02 Juin 2016 à 14:50
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
-- Structure de la table `adresse`
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
-- Structure de la table `avis`
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
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(1023) NOT NULL,
  `nom` varchar(31) NOT NULL,
  `description` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `photo`, `nom`, `description`) VALUES
(1, 'public/images/cordes.png', 'Cordes', 'Categorie des instruments a cordes'),
(2, 'public/images/vents.png', 'Vents', 'Categorie des instruments a vents'),
(3, 'public/images/batteries.png', 'Batteries', 'Categorie des instruments de percussions'),
(4, 'public/images/claviers.png', 'Claviers', 'Categorie des instruments a touches'),
(5, 'public/images/accessoires.png', 'Accessoires', 'Categorie des accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `liaison_panier_produit`
--

CREATE TABLE IF NOT EXISTS `liaison_panier_produit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_panier` int(10) unsigned NOT NULL,
  `id_produit` int(10) unsigned NOT NULL,
  `quantite` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_panier` (`id_panier`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `prix` float NOT NULL DEFAULT '0',
  `quantite` int(3) NOT NULL DEFAULT '0',
  `poids` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `id_utilisateur`, `date`, `status`, `prix`, `quantite`, `poids`) VALUES
(7, 2, '2016-06-02 10:45:57', 0, 88374, 0, 79950);

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
(1, 1, 'public/images/guitarelectrique.png', 'Guitares', 'Toutes les guitares'),
(2, 1, 'public/images/basselectrique.png', 'Basses', 'Toutes les basses'),
(3, 2, 'public/images/saxophone.png', 'Saxophones', 'Tous les saxophones'),
(4, 2, 'public/images/trompette.png', 'Trompettes', 'Toutes les trompettes'),
(5, 2, 'public/images/clarinette.png', 'Clarinettes', 'Toutes les clarinettes'),
(6, 3, 'public/images/batterielectrique.png', 'Batteries electriques', 'Toutes les batteries electriques'),
(7, 3, 'public/images/batterieaccoustique.png', 'Batteries acoustiques', 'Toutes les batteries acoustiques'),
(8, 3, 'public/images/djembe.png', 'Percussions', 'Toutes les percussions'),
(9, 4, 'public/images/pianonumerique.png', 'Pianos numeriques', 'Tous les pianos numeriques'),
(10, 4, 'public/images/pianoqueue.png', 'Pianos a queue', 'Tous les pianos a queue'),
(11, 4, 'public/images/synthetiseur.png', 'Synthetiseurs', 'Tous les synthetiseurs'),
(12, 4, 'public/images/orgue.png', 'Orgues', 'Tous les orgues'),
(13, 5, 'public/images/support.png', 'Pieds et supports', 'Tous les pieds et supports'),
(14, 5, 'public/images/cable.png', 'Cables et casques', 'Tous les cables et casques'),
(15, 5, 'public/images/accordeur.png', 'Accordeurs et métronomes', 'Tous les accordeurs et métronomes');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(31) NOT NULL,
  `prenom` varchar(31) NOT NULL,
  `email` varchar(63) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_naissance` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `telephone` varchar(31) NOT NULL,
  `sexe` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 homme  0 femme',
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `login` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mot_passe`, `date_inscription`, `admin`, `date_naissance`, `telephone`, `sexe`, `actif`, `login`) VALUES
(2, 'oli', 'oli', 'oli@oli.fr', '$2y$08$ZblZSAaBXhgRJMYqgomqtucV2rnhgcLgjYnIxshyFHKGtyuXnh5NO', '2016-05-27 11:54:01', 1, '0000-00-00 00:00:00', '1', 0, 1, 'oli'),
(3, 'olo', 'olo', 'olo@olo.fr', '$2y$08$s1CmJVh5THI9FKkwTFCYJO9kZHV5ZxH9vfTu4Moc.7NAWzwjqvBJO', '2016-06-01 13:00:16', 0, '0000-00-00 00:00:00', '0112234525', 0, 1, 'olo');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liaison_panier_produit`
--
ALTER TABLE `liaison_panier_produit`
  ADD CONSTRAINT `liaison_panier_produit_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaison_panier_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `sous_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
