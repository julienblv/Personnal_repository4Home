-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 juil. 2019 à 13:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `annuaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire_comite_alerte`
--

DROP TABLE IF EXISTS `annuaire_comite_alerte`;
CREATE TABLE IF NOT EXISTS `annuaire_comite_alerte` (
  `id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(26) COLLATE utf8_unicode_ci DEFAULT NULL,
  `portable` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fixe` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `batiment` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etage` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(23) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveau` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cpam`
--

DROP TABLE IF EXISTS `cpam`;
CREATE TABLE IF NOT EXISTS `cpam` (
  `id_cpam` int(11) NOT NULL,
  `libelle_cpam` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cpam`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gestion_des_comptes`
--

DROP TABLE IF EXISTS `gestion_des_comptes`;
CREATE TABLE IF NOT EXISTS `gestion_des_comptes` (
  `id_utilisateur` int(11) NOT NULL,
  `mdp_utilisateur` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `admin_or_not` tinyint(1) NOT NULL,
  `login_utilisateur` int(16) NOT NULL,
  `id_cpam` int(2) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
