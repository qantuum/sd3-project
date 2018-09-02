-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 sep. 2018 à 12:44
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sd3-project`
--

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `light_dark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` tinyint(4) NOT NULL,
  `min_stats` json NOT NULL,
  `max_stats` json NOT NULL,
  `spells` json NOT NULL,
  `techs` json NOT NULL,
  `pros` text COLLATE utf8_unicode_ci NOT NULL,
  `cons` text COLLATE utf8_unicode_ci NOT NULL,
  `affiliates` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `characters_chara_class_unique` (`class`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `img_src` (`img_src`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `root$`
--

DROP TABLE IF EXISTS `root$`;
CREATE TABLE IF NOT EXISTS `root$` (
  `root_id$` char(10) NOT NULL,
  `root_pswd$` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` smallint(4) NOT NULL,
  `team_triad` mediumint(6) NOT NULL,
  `team_base_score` smallint(3) NOT NULL,
  `team_final_score` smallint(3) NOT NULL,
  `team_pros` text NOT NULL,
  `team_cons` text NOT NULL,
  `team_quest` text NOT NULL,
  `team_better` text NOT NULL,
  `team_has_spell` mediumint(6) NOT NULL,
  PRIMARY KEY (`team_id`),
  UNIQUE KEY `team_triad` (`team_triad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tips`
--

DROP TABLE IF EXISTS `tips`;
CREATE TABLE IF NOT EXISTS `tips` (
  `tips_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `tips_title` text NOT NULL,
  `tips_text` text NOT NULL,
  PRIMARY KEY (`tips_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
