-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 20 Septembre 2018 à 23:15
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

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE `characters` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_src` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `light_dark` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `score` tinyint(4) NOT NULL,
  `min_stats` json NOT NULL,
  `max_stats` json NOT NULL,
  `spells` json NOT NULL,
  `techs` json NOT NULL,
  `pros` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cons` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `affiliates` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `characters`
--

INSERT INTO `characters` (`id`, `name`, `class`, `img_src`, `light_dark`, `score`, `min_stats`, `max_stats`, `spells`, `techs`, `pros`, `cons`, `affiliates`) VALUES
(9, 'Angela', 'Archmage', 'Archmage.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(16, 'Carlie', 'Bishop', 'Bishop.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(2, 'Kevin', 'Death Hand', 'DeathHand.gif', 'x', 0, '[\"x\"]', '[\"x\"]', '[\"x\"]', '[\"x\"]', 'x', 'x', 'x'),
(3, 'Kevin', 'Dervish', 'Dervish.gif', 'x', 0, '[\"x\"]', '[\"x\"]', '[\"x\"]', '[\"x\"]', 'x', 'x', 'x'),
(14, 'Lise', 'Dragon Master', 'DragonMaster.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(7, 'Duran', 'Duellist', 'Duellist.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(19, 'Carlie', 'Evil Shaman', 'EvilShaman.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(15, 'Lise', 'Fenrir Knight', 'FenrirKnight.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(0, 'Kevin', 'God Hand', 'GodHand.gif', 'x', 0, '[\"x\"]', '[\"x\"]', '[\"x\"]', '[\"x\"]', 'x', 'x', 'x'),
(8, 'Angela', 'Grand Divina', 'GrandDivina.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(11, 'Angela', 'Magus', 'Magus.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(18, 'Carlie', 'Necromancer', 'Necromancer.gif', 'DL', 30, '[\"13\", \"14\", \"13\", \"17\", \"17\", \"17\"]', '[\"16\", \"15\", \"18\", \"19\", \"21\", \"20\"]', '[\"MT heal light\", \"MT tinkle rain\", \"dark saber\", \"various Invocations\", \"black curse\"]', '[\"bonkle\", \"dash+\", \"craaaazy++\"]', 'sample', 'sample', 'sample'),
(23, 'Hawk', 'Night Blade', 'NightBlade.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(22, 'Hawk', 'Ninja Master', 'NinjaMaster.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(4, 'Duran', 'Paladin', 'Paladin.gif', 'x', 0, '[\"x\"]', '[\"x\"]', '[\"x\"]', '[\"x\"]', 'x', 'x', 'x'),
(21, 'Hawk', 'Rogue', 'Rogue.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(10, 'Angela', 'Rune Master', 'RuneMaster.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(17, 'Carlie', 'Sage', 'Sage.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(13, 'Lise', 'Star Lancer', 'StarLancer.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(6, 'Duran', 'Swordsmaster', 'Swordsmaster.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(12, 'Lise', 'Vanadies', 'Vanadies.gif', 'LL', 15, '[\"17\", \"16\", \"16\", \"15\", \"16\", \"14\"]', '[\"20\", \"19\", \"20\", \"17\", \"19\", \"16\"]', '[\"ST stats ups\", \"freya (transform effect)\"]', '[\"whirlwind lance\", \"FST vacuum surge spear+\", \"FST light shot spear++\"]', 'sample', 'sample', 'sample'),
(20, 'Hawk', 'Wanderer', 'Wanderer.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(5, 'Duran', 'Warlord', 'Warlord.gif', '', 0, '[\" \"]', '[\" \"]', '[\" \"]', '[\" \"]', ' ', ' ', ' '),
(1, 'Kevin', 'Warrior Monk', 'WarriorMonk.gif', 'LD', 20, '[\"15\", \"14\", \"18\", \"13\", \"14\", \"14\"]', '[\"17\", \"16\", \"22\", \"16\", \"16\", \"17\"]', '[\"MT heal light\", \"tree saber\", \"pressure point\"]', '[\"ashura dream fist\", \"FST whirlwind kick+\", \"tornado throw+\", \"genbu-100 kick++\"]', 'Can be used as a great support for healing HP AND MP', 'Low attack power, worst stats of all the final classes', 'Any spell-caster ! Magic-focused team benefit a lot from the Warrior Monk');

-- --------------------------------------------------------

--
-- Structure de la table `root$`
--

CREATE TABLE `root$` (
  `root_id$` char(10) NOT NULL,
  `root_pswd$` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

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

--
-- Contenu de la table `teams`
--

INSERT INTO `teams` (`team_id`, `team_triad`, `team_base_score`, `team_final_score`, `team_pros`, `team_cons`, `team_quest`, `team_better`, `team_has_spell`) VALUES
(1, 421, 0, 0, 'x', 'x', 'x', 'x', 0),
(2, 917, 0, 0, 'x', 'x', 'x', 'x', 0),
(3, 31722, 0, 0, 'x', 'x', 'x', 'x', 0),
(4, 51221, 15, 0, 'x', 'x', 'x', 'x', 0),
(5, 71019, 0, 0, 'x', 'x', 'x', 'x', 0),
(6, 71422, 0, 0, 'x', 'x', 'x', 'x', 0),
(7, 81920, 0, 0, 'x', 'x', 'x', 'x', 0),
(8, 131820, 30, 0, 'x', 'x', 'x', 'x', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tips`
--

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
  ADD PRIMARY KEY (`team_triad`),
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
