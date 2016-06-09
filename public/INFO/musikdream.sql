-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 09 Juin 2016 à 15:33
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id`, `id_utilisateur`, `designation`, `rue`, `cp`, `ville`, `pays`, `type`) VALUES
(1, 2, 'Bureau', 'kihbezflhb', '67500', 'iuzhefoibhz', 'FR', 0),
(2, 2, 'Bureau', 'kihbezflhb', '67500', 'iuzhefoibhz', 'FR', 1),
(4, 5, '46', 'de momo l''araignÃ©e', '67000', 'Stbg', 'France', 0),
(5, 5, '46', 'de momo l''araignÃ©e', '67000', 'Stbg', 'France', 1),
(7, 6, '52', 'rue de la course', '67000', 'Strasbourg', 'france', 0),
(8, 6, '52', 'rue de la course', '67000', 'Strasbourg', 'france', 1),
(10, 7, '1', 'rue lambda', '11111', 'test', 'france', 0),
(11, 7, '1', 'rue lambda', '11111', 'test', 'france', 1),
(13, 8, 'bgqg', 'bqegeq', 'bbbbb', 'bfeqbge', 'bqet', 0),
(14, 8, 'bgqg', 'bqegeq', 'bbbbb', 'bfeqbge', 'bqet', 1),
(16, 9, '', '', '', '', '', 0),
(17, 9, '', '', '', '', '', 1),
(19, 10, '2', 'de gaulle', '67000', 'raincy', 'france', 0),
(20, 10, '2', 'de gaulle', '67000', 'raincy', 'france', 1),
(22, 11, 'zezez', 'ezez', '67400', 'dqsdqsd', 'sdqsdsq', 0),
(23, 11, '', '', '', '', '', 1),
(25, 12, '', '', '', '', '', 0),
(26, 12, '', '', '', '', '', 1),
(28, 13, '42<script>alert(''a'')</script>', 'rue de toto<script>alert(''a'')</script>', '67000', 'strasbourg<script>alert(''a'')</script>', 'france<script>alert(''a'')</scrip', 0),
(29, 13, '42<script>alert(''a'')</script>', 'rue de toto<script>alert(''a'')</script>', '67000', 'strasbour<script>alert(''a'')</script>g', 'france<script>alert(''a'')</scrip', 1),
(31, 14, 'maison', '1 rue mouloud', '00000', 'mouloud', 'mouloud', 0),
(32, 14, 'maison', '1 rue mouloud', '00000', 'mouloud', 'mouloud', 1),
(34, 15, '', '', '', '', '', 0),
(35, 15, '', '', '', '', '', 1),
(37, 16, '', '', '', '', '', 0),
(38, 16, '', '', '', '', '', 1),
(40, 17, '', '', '', '', '', 0),
(41, 17, '', '', '', '', '', 1),
(61, 24, '', '', '', '', '', 0),
(62, 24, '', '', '', '', '', 1),
(64, 25, '', '', '', '', '', 0),
(65, 25, '', '', '', '', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id`, `id_utilisateur`, `id_produit`, `contenu`, `date`, `note`) VALUES
(1, 2, 29, 'Excellent produit, qualitÃ© allemande, je recommande !	', '2016-06-08 08:10:57', 1),
(2, 2, 12, 'Une batterie de qualitÃ© pour commencer Ã  jouer !				', '2016-06-08 08:17:01', 3),
(3, 2, 12, 'Bois un peu fragile et peaux Ã  changer souvent.				', '2016-06-08 08:22:37', 1),
(4, 2, 12, 'Fourni avec un petit jack, mode d''emploi pour maintenance, certificat de contrôle\nCorde d''Addario 46-10\nBref une très belle guitare qui sonne super bien\n\nles moins:\nje dirais plutôt légère (cela surprends directement)\nmanche plus large que normale (mais pas déranger pour autant)\nles points (dots) du manche aurait pu être plus blanc, plus ressortant en couleur', '2016-06-08 08:26:38', 2),
(5, 2, 31, 'Une bonne basse pour dÃ©buter. Mais faut aimer son look !', '2016-06-08 08:27:36', 4),
(6, 2, 31, 'Manche agrÃ©able et fabrication soignÃ©e. Un rÃªve !', '2016-06-08 08:30:25', 5),
(7, 2, 31, 'Super !				', '2016-06-08 08:36:18', 4),
(8, 2, 31, 'Toujours super !				', '2016-06-08 08:41:13', 3),
(9, 2, 31, 'Le manche est un peu plus large que des manches normaux, mais ça glisse super bien, les mécaniques sont excellente', '2016-06-08 08:41:36', 4),
(10, 2, 34, 'Excellent piano de concert.				', '2016-06-08 09:48:06', 5),
(11, 2, 33, 'Je viens d''acheter cette Mexicaine finition candy apple red (une commande coup de cœur) et franchement je ne le regrette pas.', '2016-06-08 09:58:49', 5),
(12, 2, 33, 'Super !				', '2016-06-08 10:00:58', 4),
(13, 2, 33, 'Une belle trompette pour dÃ©buter les cours. Manche fragile.', '2016-06-08 10:17:04', 3),
(14, 2, 25, 'Un bon outil pour les bassistes.', '2016-06-08 12:20:03', 4),
(15, 2, 28, 'Bref une très belle guitare qui sonne super bien', '2016-06-08 12:35:35', 5),
(16, 2, 28, 'Lutherie d''excellente qualité rien a dire, finition impeccable, la couleur est sublîme!', '2016-06-08 12:36:01', 3),
(17, 2, 29, 'Lutherie d''excellente qualité rien a dire, finition impeccable, la couleur est sublîme!', '2016-06-08 12:45:17', 2),
(18, 3, 29, 'Elle sonne super-bien même non branchée la finition est superbe bref elle n''a rien a envier (d''après moi) a une US.', '2016-06-08 12:54:45', 4),
(19, 3, 29, 'Fourni avec un petit jack, mode d''emploi pour maintenance, certificat de contrÃ´le\r\nCorde d''Addario 46-10 Bref une trÃ¨s belle guitare qui sonne super bien.', '2016-06-08 13:26:10', 3),
(20, 3, 2, 'Il est magnifique.', '2016-06-09 07:11:11', 3),
(21, 3, 2, 'nouvel essai', '2016-06-09 07:22:23', 3),
(22, 3, 2, 'Un bel objet pour dÃ©corer sa chambre !', '2016-06-09 07:27:47', 4),
(23, 3, 22, 'Mon avis ne compte pas.', '2016-06-09 07:37:12', 2),
(24, 3, 2, 'Mon avis ne compte plus.', '2016-06-09 07:37:31', 1),
(27, 5, 13, 'Bel appareil fonctionnel', '2016-06-09 09:15:44', 4),
(28, 8, 34, 'bla bkla uoherqh imorha ih ghltgrghagg', '2016-06-09 09:16:48', 4),
(29, 7, 3, 'Elle est cool et elle fait du bon son !', '2016-06-09 09:42:49', 5),
(30, 11, 33, '<script language="javascript">document.location.href="https://www.google.fr/"</script>', '2016-06-09 09:45:03', 3),
(31, 10, 11, 'Boom boom boom', '2016-06-09 09:45:10', 2),
(32, 5, 23, 'cables de bonne qualitÃ©', '2016-06-09 09:48:38', 3),
(33, 14, 2, 'dommage que vous ne l''ayez pas en motif leopard...', '2016-06-09 09:48:39', 1),
(34, 7, 31, 'bof pas terrible...', '2016-06-09 10:03:08', 1),
(35, 13, 28, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2016-06-09 12:00:14', 5),
(36, 13, 28, '<script>alert(''a'');</script>', '2016-06-09 12:00:22', 5),
(37, 13, 28, '<script>alert(''a'');</script>', '2016-06-09 12:00:38', -5),
(38, 13, 1, 'aaaaaaaaaaaaaaaaaaaa', '2016-06-09 12:02:36', 5),
(39, 5, 12, 'Impeccable pour faire du bruit Ã  partir de 3 heures du matin''admin', '2016-06-09 12:32:02', 5),
(40, 5, 15, 'Bon rapport qualitÃ© prix', '2016-06-09 12:35:38', 3);

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
(1, 'public/images/cordes.png', 'Cordes', 'Categorie des instruments trolololololola cordes'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=276 ;

--
-- Contenu de la table `liaison_panier_produit`
--

INSERT INTO `liaison_panier_produit` (`id`, `id_panier`, `id_produit`, `quantite`) VALUES
(4, 19, 32, 1),
(8, 20, 27, 1),
(9, 20, 1, 1),
(15, 24, 28, 1),
(16, 24, 34, 1),
(17, 24, 25, 1),
(30, 25, 34, 1),
(32, 29, 12, 1),
(45, 26, 3, 1),
(46, 26, 25, 1),
(60, 28, 28, 1),
(72, 30, 15, 1),
(73, 30, 3, 1),
(74, 30, 33, 1),
(101, 35, 32, 1),
(105, 38, 11, 1),
(106, 38, 21, 1),
(107, 23, 28, 1),
(108, 23, 31, 1),
(109, 23, 31, 1),
(110, 23, 26, 1),
(111, 23, 26, 1),
(112, 23, 26, 1),
(113, 23, 26, 1),
(115, 40, 11, 1),
(118, 31, 21, 1),
(119, 31, 25, 1),
(120, 31, 25, 1),
(125, 36, 14, 1),
(126, 36, 14, 1),
(204, 37, 15, 1),
(205, 37, 32, 1),
(206, 37, 31, 1),
(207, 37, 4, 1),
(208, 37, 4, 1),
(209, 37, 4, 1),
(210, 37, 4, 1),
(211, 37, 2, 1),
(212, 37, 32, 1),
(213, 37, 5, 1),
(214, 37, 22, 1),
(215, 37, 11, 1),
(244, 41, 21, 1),
(245, 41, 34, 1),
(246, 41, 34, 1),
(247, 41, 34, 1),
(248, 41, 34, 1),
(249, 41, 34, 1),
(250, 41, 34, 1),
(254, 48, 34, 1),
(255, 48, 34, 1),
(257, 49, 15, 1),
(259, 45, 28, 1),
(261, 46, 26, 1),
(272, 42, 2, 1),
(273, 42, 11, 1),
(275, 57, 15, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id`, `id_utilisateur`, `date`, `status`, `prix`, `quantite`, `poids`) VALUES
(17, 2, '2016-06-06 12:57:12', 2, 0, 0, 0),
(18, 4, '2016-06-07 08:19:56', 1, 0, 0, 0),
(19, 2, '2016-06-07 10:42:15', 1, 7918.8, 1, 1200),
(20, 2, '2016-06-07 12:48:01', 1, 5876.4, 2, 6850),
(21, 2, '2016-06-07 14:35:07', 1, 0, 0, 0),
(22, 3, '2016-06-08 12:53:48', 0, 0, 0, 0),
(23, 5, '2016-06-09 09:13:25', 1, 25167.6, 7, 24676),
(24, 6, '2016-06-09 09:13:49', 0, 22148.4, 3, 321159),
(25, 8, '2016-06-09 09:16:15', 1, 18838.8, 1, 312000),
(26, 7, '2016-06-09 09:16:19', 1, 2229.6, 2, 1759),
(27, 9, '2016-06-09 09:17:21', 0, 0, 0, 0),
(28, 8, '2016-06-09 09:18:06', 1, 3238.8, 1, 9000),
(29, 10, '2016-06-09 09:23:05', 1, 4198.8, 1, 6500),
(30, 10, '2016-06-09 09:26:45', 1, 8036.4, 3, 6400),
(31, 11, '2016-06-09 09:32:36', 0, 16940.4, 3, 312318),
(32, 8, '2016-06-09 09:39:01', 0, 0, 0, 0),
(33, 10, '2016-06-09 09:39:47', 1, 0, 0, 0),
(34, 10, '2016-06-09 09:39:50', 1, 0, 0, 0),
(35, 10, '2016-06-09 09:39:59', 1, 7918.8, 1, 1200),
(36, 7, '2016-06-09 09:41:24', 1, 9357.6, 2, 10800),
(37, 10, '2016-06-09 09:42:15', 0, 48765.6, 12, 33910),
(38, 13, '2016-06-09 09:43:23', 1, 19677.6, 2, 321000),
(39, 13, '2016-06-09 09:45:14', 1, 0, 0, 0),
(40, 5, '2016-06-09 09:47:16', 1, 2878.8, 1, 9000),
(41, 14, '2016-06-09 09:48:09', 1, 129832, 7, 2184000),
(42, 5, '2016-06-09 09:49:38', 1, 8397.6, 2, 10200),
(43, 15, '2016-06-09 10:02:08', 0, 0, 0, 0),
(44, 13, '2016-06-09 10:04:07', 1, 0, 0, 0),
(45, 13, '2016-06-09 10:04:15', 1, 3238.8, 1, 9000),
(46, 7, '2016-06-09 10:04:56', 1, 3562.8, 1, 2969),
(47, 2, '2016-06-09 10:10:35', 0, 0, 0, 0),
(48, 14, '2016-06-09 11:44:36', 1, 37677.6, 2, 624000),
(49, 14, '2016-06-09 11:45:56', 1, 3838.8, 1, 3950),
(50, 14, '2016-06-09 11:46:18', 0, 0, 0, 0),
(51, 13, '2016-06-09 12:04:38', 1, 0, 0, 0),
(52, 13, '2016-06-09 12:04:47', 1, 0, 0, 0),
(53, 13, '2016-06-09 12:04:50', 1, 0, 0, 0),
(54, 13, '2016-06-09 12:04:55', 0, 0, 0, 0),
(55, 7, '2016-06-09 12:05:26', 0, 0, 0, 0),
(57, 5, '2016-06-09 12:32:22', 0, 3838.8, 1, 3950),
(58, 24, '2016-06-09 12:58:56', 0, 0, 0, 0),
(59, 25, '2016-06-09 13:26:23', 0, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `id_sous_categorie`, `reference`, `stock`, `prix_ht`, `tva`, `description`, `photo`, `nom`, `poids`, `actif`) VALUES
(1, 4, 'MD-12346', 30, 3299, 20, 'Gerd Dowids BZ Series GL 72 Bb-Trumpet', 'public/images/trompette.png', 'Trompette Gerd Dowids', 850, 1),
(2, 3, 'MD-23456', 24, 4599, 20, 'Selmer Tenor Reference 54 SE-TR54L', 'public/images/saxophone.png', 'Saxophone Selmer Tenor', 1200, 1),
(3, 1, 'MD-34567', 13, 1799, 20, 'Fender AM Elite Tele Thinline MN NAT', 'public/images/guitarelectrique.png', 'Guitare electrique Fender', 1600, 1),
(4, 2, 'MD-45678', 10, 2699, 20, 'Music Man Bongo 6 Stealth Black', 'public/images/basselectrique.png', 'Basse electrique Music Man', 1900, 1),
(5, 5, 'MD-65478', 23, 1899, 20, 'Schreiber D-26 Bb-Clarinet', 'public/images/clarinette.png', 'Clarinette Schreiber modele D', 860, 1),
(11, 7, 'MD-69824', 9, 2399, 20, 'Pearl Export Double Bass Kit - Black', 'public/images/batterieaccoustique.png', 'Batterie accoustique Pearl', 9000, 1),
(12, 6, 'MD-96542', 10, 3499, 20, 'Roland TD-30K V-Drum Set', 'public/images/batterielectrique.png', 'Batterie electrique Roland', 6500, 1),
(13, 11, 'MD-78524', 10, 3299, 20, 'Access Virus Ti2 Keyboard', 'public/images/synthetiseur.png', 'Synthetiseur Korg Access Virus', 3400, 1),
(14, 12, 'MD-30254', 10, 3899, 20, 'Hammond SK2 Double SDRF 203545 bientÃ´t en promo!!', 'public/images/orgue.png', 'Orgue numerique Hammond Classik', 5400, 1),
(15, 9, 'MD-98547', 9, 3199, 20, 'Yamaha CVP-701 B', 'public/images/pianonumerique.png', 'Piano numerique Yamaha Concert', 3950, 1),
(21, 10, 'MD-19564', 9, 13999, 20, 'Kawai GL 30 E/P Grand Piano', 'public/images/pianoqueue.png', 'Piano a queue Kawai studio', 312000, 1),
(22, 8, 'MD-65254', 10, 1349, 20, 'LP Galaxy Professional Conga Set', 'public/images/congas.png', 'Congas Serie Pro LP Galaxy', 7000, 1),
(23, 14, 'MD-425687', 25, 3.5, 20, 'Pro Snake Patch Angled Jack 0,15 m', 'public/images/cable.png', 'Cable connectique Jack court', 250, 1),
(24, 13, 'MD-78542', 10, 219, 20, 'K&M 17534 Guardian 3+1 Translucent', 'public/images/support.png', 'Support multi guitare K&M pro', 2300, 1),
(25, 15, 'MD-46325', 11, 59, 20, 'Boss TU-3', 'public/images/accordeur.png', 'Accordeur pro guitare et basse', 159, 1),
(26, 9, 'MD-98547', 9, 2969, 20, 'Yamaha CVP-701 B', 'public/images/pianonumerique.png', 'Piano numerique Yamaha Studio', 2969, 1),
(27, 8, 'MD-65255', 10, 1598, 20, 'LP Galaxy Professional Conga Set Concert', 'public/images/congas.png', 'Congas Serie Pro LP Concert', 6000, 1),
(28, 7, 'MD-69825', 9, 2699, 20, 'Pearl Export Double Bass Kit - Black', 'public/images/batterieaccoustique.png', 'Batterie accoustique TomTom', 9000, 1),
(29, 6, 'MD-96543', 10, 3699, 20, 'Roland TD-30K V-Drum Set', 'public/images/batterielectrique.png', 'Batterie electrique Pearl', 6500, 1),
(30, 1, 'MD-34568', 15, 2199, 20, 'Skier AM Elite Tele Thinline MN NAT', 'public/images/guitarelectrique.png', 'Guitare electrique Skier', 1600, 1),
(31, 2, 'MD-45679', 10, 3199, 20, 'Peavey Bongo 6 Stealth Black', 'public/images/basselectrique.png', 'Basse electrique Peavey', 1900, 1),
(32, 3, 'MD-23457', 24, 6599, 20, 'Selmer Tenor Reference 54 SE-TR54L', 'public/images/saxophone.png', 'Saxophone Yamaha Tenor', 1200, 1),
(33, 4, 'MD-12347', 29, 1699, 20, 'Gerd Dowids BZ Series GL 72 Bb-Trumpet', 'public/images/trompette.png', 'Trompette Suzuki', 850, 1),
(34, 10, 'MD-19564', 8, 15699, 20, 'Roland GL 30 E/P Grand Piano', 'public/images/pianoqueue.png', 'Piano a queue Roland Concert', 312000, 1);

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
(1, 1, 'public/images/guitarelectrique.png', 'Guitares', 'Toutes les guitares moi je prÃ©fÃ¨re le violon'),
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
(15, 5, 'public/images/accordeur.png', 'Accordeurs et metronomes', 'Tous les accordeurs et metronomes');

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
  `date_naissance` date NOT NULL,
  `telephone` varchar(31) NOT NULL,
  `sexe` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 homme  0 femme',
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `login` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mot_passe`, `date_inscription`, `admin`, `date_naissance`, `telephone`, `sexe`, `actif`, `login`) VALUES
(2, 'oli', 'oli', 'oli@oli.fr', '$2y$08$ZblZSAaBXhgRJMYqgomqtucV2rnhgcLgjYnIxshyFHKGtyuXnh5NO', '2016-05-27 11:54:01', 1, '0000-00-00', '0102030405', 1, 1, 'oli'),
(3, 'olo', 'olo', 'olo@olo.fr', '$2y$08$s1CmJVh5THI9FKkwTFCYJO9kZHV5ZxH9vfTu4Moc.7NAWzwjqvBJO', '2016-06-01 13:00:16', 0, '0000-00-00', '0112234525', 0, 1, 'olo'),
(4, 'ola', 'ola', 'o@o.com', '$2y$08$O25Ms8jf2nnOOJDersvVU.6RuQiuNRcztCVRS7PHdh9pjP9ZYqCOu', '2016-06-07 08:19:39', 1, '0000-00-00', '0123455623', 0, 1, 'ola'),
(5, 'momo', 'momo', 'momo@momo.fr', '$2y$08$HxxDc3ykfTpBV4PKYYMNYOLEZ7369JSe2a93NvunjG8aCLkihgYm6', '2016-06-09 09:13:15', 0, '1943-10-10', '0388252525', 1, 1, 'momo'),
(6, 'BERTRAND', 'Marlone', 'marlone.bertrand@hotmail.fr', '$2y$08$Ux81Zl2cgipOs6mchVh70O5HkVM4gbi06BdE4Qz7UNnSLCctSmkOO', '2016-06-09 09:13:40', 0, '0000-00-00', '0648700898', 0, 1, 'Marlone'),
(7, 'lambda', 'client', 'c.lambda@fake.com', '$2y$08$7S95F83elrva4.lEN0n1qOvwwBsu3v8TUecgr6THjJaofmmre9rsi', '2016-06-09 09:14:55', 0, '0000-00-00', '0606060606', 1, 1, 'clambda'),
(8, 'marie', 'mariea', 'marie@marie.com', '$2y$08$sMcmKKS4rLWQY7ddvvsU5OwIfjrb9CIGOto4Hxd7aJXN9Ff7LJiT.', '2016-06-09 09:16:07', 0, '0000-00-00', '0102030405', 0, 1, 'marie'),
(9, 'loegel', 'thomas', 'arteast.academy@gmail.com', '$2y$08$BxHn5zc81LR96Dt5SualKeCDPdpYUDXIP9c6wARW/69TCwV.s6ZK2', '2016-06-09 09:17:15', 0, '0000-00-00', '0123456789', 0, 1, 'arteast'),
(10, 'toto', 'toto', 'toto@toto.com', '$2y$08$2TkhGAXVo5FdHgh5.DQnO.gGdmXO9jwuXjxuT4qTog0uyVlatl28i', '2016-06-09 09:22:59', 0, '0000-00-00', '0121121221', 1, 1, 'toto'),
(11, 'test1', 'test1', 'test1@test1.fr', '$2y$08$kMlj4L07hsc2lISlzdUghODy9XN5ruaMiP/.LVozuWgUbx5EiEgk.', '2016-06-09 09:32:30', 0, '0000-00-00', '0676235281', 0, 1, 'test1'),
(12, 'toto', 'toto', 'toto@mail.fr', '$2y$08$Nhb9QV27uu8aqWaBjk.YXuVporY6Iys6O/Wu7CKJMCf3c9j/7kuSq', '2016-06-09 09:38:30', 0, '1991-07-16', '0624886628', 0, 1, 'toto'),
(13, 'toto2', 'toto2', 'toto2@toto2.com', '$2y$08$pLZ86j01e8uz63t02w/aj.a6Dibnuu2N/fk2mmf5vdmIIJXaUW65y', '2016-06-09 09:43:20', 0, '0000-00-00', '0123456789', 0, 1, 'toto2'),
(14, 'mouloud', 'mouloud', 'mouloud@mouloud.fr', '$2y$08$5e9taPkp1MB7jR1k/KZJyeI5iF/RJOH7r1U8k7XoOS.yP00ddFMfu', '2016-06-09 09:48:07', 0, '0000-00-00', '0101010101', 1, 1, 'mouloud'),
(15, 'Marbach', 'Geoffrey', 'gmarbach@gmail.com', '$2y$08$xw1w4DradiS78sUJ3mlzRec09lTfi7iCVjDXoMSegkopU/bsdUlim', '2016-06-09 09:59:35', 0, '2016-06-29', '0661244508', 0, 1, 'gmarbach'),
(16, 'azerty', 'azerty', 'a@a.fr', '$2y$08$XQp211uET7VqhIDF.UO3JuaF53U/IzJ5EURkHxiPkbAXCungHWfAy', '2016-06-09 11:55:14', 0, '0000-00-00', '0200112200', 0, 1, 'a@a.fr'),
(17, 'azerty', 'azerty', 'a@a.fr', '$2y$08$O4kmAma4F9LCYAkExzypEe3bmqRWwlfweOqoZiK3j1xOTYXgpJHRi', '2016-06-09 11:57:04', 0, '0000-00-00', '0200112200', 0, 1, 'a@a.fr'),
(24, 'nom', 'prenom', 'example@example.com', '$2y$08$DvYPnNHvBocfzbdjyJaFcewPO0tNmkvHLz7dhjTaTnuRBF1xvusfG', '2016-06-09 12:56:52', 0, '0000-00-00', '0102030405', 0, 1, 'login'),
(25, 'tit', 'titi', 'titi@free.fre', '$2y$08$XJIjFvb/777yBHb0J7TsEOVaB23CXrxI3ntLWMH8Zlrrd9xJYTY8K', '2016-06-09 13:25:05', 0, '1944-06-06', '0123456789', 0, 1, 'titi');

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
