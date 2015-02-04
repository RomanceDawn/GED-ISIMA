-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Janvier 2015 à 23:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ged_isima`
--

-- --------------------------------------------------------

--
-- Structure de la table `ged_compte`
--

CREATE TABLE IF NOT EXISTS `ged_compte` (
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ged_compte`
--

INSERT INTO `ged_compte` (`login`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `ged_rapport`
--

CREATE TABLE IF NOT EXISTS `ged_rapport` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  `nom_origin` varchar(200) DEFAULT NULL,
  `nom_server` varchar(200) DEFAULT NULL,
  `auteur` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `sujet` varchar(200) DEFAULT NULL,
  `mots_clefs` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `ajouteur` varchar(200) DEFAULT NULL,
  `texte` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `motsClefs` (`nom_origin`,`mots_clefs`,`auteur`,`sujet`,`titre`,`description`,`texte`),
  FULLTEXT KEY `auteur` (`auteur`),
  FULLTEXT KEY `titre` (`titre`),
  FULLTEXT KEY `sujet` (`sujet`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=305 ;

