-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 11 Avril 2019 à 08:52
-- Version du serveur :  10.1.37-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `donnees_vol`
--

-- --------------------------------------------------------

--
-- Structure de la table `autres_appareils`
--

CREATE TABLE `autres_appareils` (
  `id` int(99) NOT NULL,
  `nom_autre` varchar(10) DEFAULT NULL,
  `latitude_autre` varchar(9) DEFAULT NULL,
  `longitude_autre` varchar(10) DEFAULT NULL,
  `dir_lat_autre` varchar(1) DEFAULT NULL,
  `dir_long_autre` varchar(1) DEFAULT NULL,
  `altitude_mer_autre` int(5) DEFAULT NULL,
  `cap_autre` int(3) DEFAULT NULL,
  `nom_important` varchar(10) DEFAULT NULL,
  `latitude_important` varchar(9) DEFAULT NULL,
  `longitude_important` varchar(10) DEFAULT NULL,
  `dir_lat_important` varchar(1) DEFAULT NULL,
  `dir_long_important` varchar(1) DEFAULT NULL,
  `altitude_mer_important` int(5) DEFAULT NULL,
  `cap_important` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historisation`
--

CREATE TABLE `historisation` (
  `id` int(11) NOT NULL,
  `utc` int(6) DEFAULT NULL,
  `latitude` varchar(9) DEFAULT NULL,
  `longitude` varchar(10) DEFAULT NULL,
  `dir_latitude` varchar(1) DEFAULT NULL,
  `dir_longitude` varchar(1) DEFAULT NULL,
  `altitude_mer` int(5) DEFAULT NULL,
  `cap` int(3) DEFAULT NULL,
  `vitesse_sol` int(3) DEFAULT NULL,
  `type_alarme` int(1) DEFAULT NULL,
  `niveau_alarme` int(1) DEFAULT NULL,
  `etat_alimentation` int(1) DEFAULT NULL,
  `latitude_important` varchar(9) DEFAULT NULL,
  `longitude_important` varchar(10) DEFAULT NULL,
  `dir_lat_important` varchar(1) DEFAULT NULL,
  `dir_long_important` int(1) DEFAULT NULL,
  `cap_important` int(3) DEFAULT NULL,
  `altitude_mer_important` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `infos_tr`
--

CREATE TABLE `infos_tr` (
  `id` int(11) NOT NULL,
  `utc` time(6) DEFAULT NULL,
  `latitude` varchar(9) DEFAULT NULL,
  `longitude` varchar(10) DEFAULT NULL,
  `dir_latitude` varchar(1) DEFAULT NULL,
  `dir_longitude` varchar(1) DEFAULT NULL,
  `altitude_mer` int(5) DEFAULT NULL,
  `cap` int(3) DEFAULT NULL,
  `vitesse_sol` int(3) DEFAULT NULL,
  `type_alarme` int(1) DEFAULT NULL,
  `niveau_alarme` int(1) DEFAULT NULL,
  `etat_alimentation` int(1) DEFAULT NULL,
  `latitude_important` varchar(9) DEFAULT NULL,
  `longitude_important` varchar(10) DEFAULT NULL,
  `dir_lat_important` varchar(1) DEFAULT NULL,
  `dir_long_important` varchar(1) DEFAULT NULL,
  `altitude_mer_important` int(5) DEFAULT NULL,
  `cap_important` int(3) DEFAULT NULL,
  `finesse` float DEFAULT NULL,
  `altitude_qfe` int(5) DEFAULT NULL,
  `taux_monte` float DEFAULT NULL,
  `distance_aerodrome` int(5) DEFAULT NULL,
  `pente` int(2) DEFAULT NULL,
  `taux_chute` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `autres_appareils`
--
ALTER TABLE `autres_appareils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historisation`
--
ALTER TABLE `historisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infos_tr`
--
ALTER TABLE `infos_tr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `autres_appareils`
--
ALTER TABLE `autres_appareils`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `historisation`
--
ALTER TABLE `historisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `infos_tr`
--
ALTER TABLE `infos_tr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
