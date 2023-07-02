-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juin 2023 à 17:58
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hbetacms`
--

-- --------------------------------------------------------

--
-- Structure de la table `hbeta_badges`
--

CREATE TABLE `hbeta_badges` (
  `id` int(11) NOT NULL,
  `badge_code` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hbeta_fansites`
--

CREATE TABLE `hbeta_fansites` (
  `id` int(11) NOT NULL,
  `type` enum('fansite','rpg') NOT NULL DEFAULT 'fansite',
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hbeta_history`
--

CREATE TABLE `hbeta_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hbeta_news`
--

CREATE TABLE `hbeta_news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `snippet` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hbeta_news_comments`
--

CREATE TABLE `hbeta_news_comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(220) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hbeta_users_complements`
--

CREATE TABLE `hbeta_users_complements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `allow_radio` enum('0','1') NOT NULL DEFAULT '1',
  `token_session` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hbeta_badges`
--
ALTER TABLE `hbeta_badges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hbeta_fansites`
--
ALTER TABLE `hbeta_fansites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hbeta_history`
--
ALTER TABLE `hbeta_history`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hbeta_news`
--
ALTER TABLE `hbeta_news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hbeta_news_comments`
--
ALTER TABLE `hbeta_news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hbeta_users_complements`
--
ALTER TABLE `hbeta_users_complements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hbeta_badges`
--
ALTER TABLE `hbeta_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hbeta_fansites`
--
ALTER TABLE `hbeta_fansites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hbeta_history`
--
ALTER TABLE `hbeta_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hbeta_news`
--
ALTER TABLE `hbeta_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hbeta_news_comments`
--
ALTER TABLE `hbeta_news_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hbeta_users_complements`
--
ALTER TABLE `hbeta_users_complements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
