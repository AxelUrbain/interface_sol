-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 mars 2019 à 17:20
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `coordonnées` varchar(255) NOT NULL,
  `altitudeQFE` float NOT NULL,
  `altitudeQNH` float NOT NULL,
  `derive` float NOT NULL,
  `finessePratique` float NOT NULL,
  `vitHorizontalSol` float NOT NULL,
  `vitHorizontalAir` float NOT NULL,
  `vitVertical` float NOT NULL,
  `Pression` float NOT NULL,
  `id_Vol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Marque` varchar(255) NOT NULL,
  `Modèle` varchar(255) NOT NULL,
  `Année` int(11) NOT NULL,
  `FinesseThéorique` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `machine`
--

INSERT INTO `machine` (`id`, `Type`, `Marque`, `Modèle`, `Année`, `FinesseThéorique`) VALUES
(1, 'Planeur', 'Schleicher', 'ASK 13', 2002, 33),
(2, 'Moto-Plabeur', 'Schleicher', 'ASK 25', 1997, 30);

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
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `password`, `Date_inscription`, `id_role`) VALUES
(2, 'toto', 'toto', 'toto', '2019-02-15', 2),
(7, 'Urbain', 'Axel', '$2y$10$6CO/.pEtD2U5lu.CQ0HyQ.4wxvQYg.b3NrFhTBRN.2yx9rjnqMuVC', '2019-03-13', 4),
(8, 'Auzereau', 'Théo', '$2y$10$Gdi5Pyi7HGjGnxnRkReiq./G7O8lXyFLsFk6EJiZ/a7TE4naSZmm.', '2019-03-13', 1),
(9, 'Grivault', 'Mévin', '$2y$10$7eVCm21ZuL5xdEjNjRQiO.sCLE//hN11KXdgpdYCvMyrPk46.ez8m', '2019-03-13', 4),
(10, 'Baron', 'Quentin', '$2y$10$hSWdmBYBNZexl8u5C1lq.u8HEWAJfEh8a2C4XJJzLYdp25oMULTL6', '2019-03-13', 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'élèves'),
(2, 'instructeurs'),
(3, 'pilote_breveté'),
(4, 'bureau');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_machine` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `information_vol`
--
ALTER TABLE `information_vol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vol` (`id_Vol`) USING BTREE;

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `information_vol`
--
ALTER TABLE `information_vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `vols_ibfk_2` FOREIGN KEY (`id_machine`) REFERENCES `machine` (`id`),
  ADD CONSTRAINT `vols_ibfk_3` FOREIGN KEY (`id`) REFERENCES `information_vol` (`id_Vol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
