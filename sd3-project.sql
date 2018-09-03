-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 02 Septembre 2018 à 14:56
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.2.9-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sd3-project`
--
CREATE DATABASE IF NOT EXISTS `sd3-project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sd3-project`;

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_src` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `light_dark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `score` tinyint(4) NOT NULL,
  `min_stats` json NOT NULL,
  `max_stats` json NOT NULL,
  `spells` json NOT NULL,
  `techs` json NOT NULL,
  `pros` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cons` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `affiliates` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `root$`
--

DROP TABLE IF EXISTS `root$`;
CREATE TABLE `root$` (
  `root_id$` char(10) NOT NULL,
  `root_pswd$` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `team_id` smallint(4) NOT NULL,
  `team_triad` mediumint(6) NOT NULL,
  `team_base_score` smallint(3) NOT NULL,
  `team_final_score` smallint(3) NOT NULL,
  `team_pros` text NOT NULL,
  `team_cons` text NOT NULL,
  `team_quest` text NOT NULL,
  `team_better` text NOT NULL,
  `team_has_spell` mediumint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tips`
--

DROP TABLE IF EXISTS `tips`;
CREATE TABLE `tips` (
  `tips_id` smallint(3) NOT NULL,
  `tips_title` text NOT NULL,
  `tips_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `characters`
--
ALTER TABLE `characters`
  ADD UNIQUE KEY `characters_chara_class_unique` (`class`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `img_src` (`img_src`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `team_triad` (`team_triad`);

--
-- Index pour la table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`tips_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tips`
--
ALTER TABLE `tips`
  MODIFY `tips_id` smallint(3) NOT NULL AUTO_INCREMENT;

--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour la table characters
--

--
-- Métadonnées pour la table root$
--

--
-- Métadonnées pour la table teams
--

--
-- Métadonnées pour la table tips
--

--
-- Métadonnées pour la base de données sd3-project
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
