-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Mai 2015 à 14:51
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `diwoopgalyloki`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(5) NOT NULL AUTO_INCREMENT,
  `id_membre` int(5) DEFAULT NULL,
  `id_salle` int(5) DEFAULT NULL,
  `commentaire` text,
  `note` int(2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `fk_avis_salle_idx` (`id_salle`),
  KEY `fk_avis_membre1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(6) NOT NULL AUTO_INCREMENT,
  `montant` int(5) DEFAULT NULL,
  `id_membre` int(5) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commande_membre1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE IF NOT EXISTS `details_commande` (
  `id_details_commande` int(6) NOT NULL AUTO_INCREMENT,
  `id_commande` int(6) DEFAULT NULL,
  `id_produit` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_details_commande`),
  KEY `fk_details_commande_commande1_idx` (`id_commande`),
  KEY `fk_details_commande_produit1_idx` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) DEFAULT NULL,
  `mdp` varchar(32) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `sexe` enum('m','f') DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `statut` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(5) NOT NULL AUTO_INCREMENT,
  `newslettercol` varchar(45) DEFAULT NULL,
  `id_membre` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_newsletter`),
  KEY `fk_newsletter_membre1_idx` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `date_arrivee` datetime DEFAULT NULL,
  `date_depart` datetime DEFAULT NULL,
  `prix` int(5) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  `id_promo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promo` int(2) NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(6) DEFAULT NULL,
  `reduction` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(5) NOT NULL AUTO_INCREMENT,
  `pays` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ville` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `adress` text CHARACTER SET latin1,
  `cp` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `titre` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `photo` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `capacité` int(3) DEFAULT NULL,
  `categorie` enum('reunion') CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `pays`, `ville`, `adress`, `cp`, `titre`, `description`, `photo`, `capacité`, `categorie`) VALUES
(1, 'France', 'Paris', '10 rue stylo', '75', 'Salle duval', 'Venez chanter votre bonheur dans un appartement du XIXe. La Salle duval est un lieu tout à fait urbain, proche de toute commodités.', 'public/resources/img/salles/salle1.jpg', 50, 'reunion');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_avis_salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `fk_details_commande_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_details_commande_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `fk_newsletter_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
