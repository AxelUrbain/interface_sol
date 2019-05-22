-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 22 Mai 2019 à 11:41
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `interface_sol`
--

-- --------------------------------------------------------

--
-- Structure de la table `information_vol`
--

CREATE TABLE `information_vol` (
  `id` int(11) NOT NULL,
  `utc` time(6) DEFAULT NULL,
  `Latitude` varchar(9) DEFAULT NULL,
  `Longitude` varchar(10) DEFAULT NULL,
  `Altitude_mer` float DEFAULT NULL,
  `Cap` int(3) DEFAULT NULL,
  `Vitesse_sol` int(3) DEFAULT NULL,
  `latitude_important` varchar(9) DEFAULT NULL,
  `longitude_important` varchar(10) DEFAULT NULL,
  `cap_important` int(3) DEFAULT NULL,
  `separation_verticale` int(3) DEFAULT NULL,
  `latitude_aerodrome` varchar(12) DEFAULT NULL,
  `longitude_aerodrome` varchar(11) DEFAULT NULL,
  `altitude_aerodrome` int(4) DEFAULT NULL,
  `id_Vol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `annee` int(11) NOT NULL,
  `finesse` float NOT NULL,
  `immatriculation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `machine`
--

INSERT INTO `machine` (`id`, `type`, `marque`, `modele`, `annee`, `finesse`, `immatriculation`) VALUES
(4, 'Planeur', 'Schleicher', 'ASK 13', 1966, 27, 'F-CBVT'),
(5, 'ULM', 'Ikarus', 'C42B', 2007, 11, 'F-JBVD'),
(6, 'MotoPlaneur', 'Scheibe Falke', 'SF-25E', 1974, 24, 'F-CHCU'),
(7, 'Planeur', 'PZL', 'PW-5', 1993, 32, 'F-CICD'),
(8, 'Planeur', 'Wassmer', 'WA-30 Bijave', 1958, 27, 'F-CDMP'),
(9, 'Planeur', 'Alexander Schleicher', 'K 6E', 1967, 34, 'F-CDRL'),
(10, 'Planeur', 'Alexander Schleicher', 'ASW 15', 1968, 36, 'F-CEGQ'),
(11, 'Planeur', 'Centrair', 'C101 Pégase', 1994, 41, 'F-CHFR');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date_inscription` date NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `password`, `Date_inscription`, `id_role`) VALUES
(7, 'Urbain', 'Axel', '$2y$10$6CO/.pEtD2U5lu.CQ0HyQ.4wxvQYg.b3NrFhTBRN.2yx9rjnqMuVC', '2019-03-13', 4),
(9, 'guerineau', 'corentin', '$2y$10$Bjqwhr6gTzaVfsX84qsR2OrXsQoWkJX8hlkJ2CFzlaCD7O0Z9EKqe', '2019-05-21', 1),
(10, 'GRIVAULT', 'Mévin', '$2y$10$KGfJKzAPm0mKYkewJmv1rOgl6NHCqUBZ7iTgfawMRuSGKRtfv2Zki', '2019-05-21', 4);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'élève'),
(2, 'instructeur'),
(3, 'pilote'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_machine` int(11) NOT NULL,
  `date_vols` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `information_vol`
--
ALTER TABLE `information_vol`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`id_role`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_membre` (`id_membre`),
  ADD KEY `id_machine` (`id_machine`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `information_vol`
--
ALTER TABLE `information_vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
