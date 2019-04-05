-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 05 avr. 2019 à 11:43
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
  `UTC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Latitude` varchar(25) NOT NULL,
  `Longitude` varchar(25) NOT NULL,
  `DirLatitude` varchar(25) NOT NULL,
  `DirLongitude` varchar(25) NOT NULL,
  `Altitude` varchar(25) NOT NULL,
  `Cap` varchar(25) NOT NULL,
  `Vitesse` varchar(25) NOT NULL,
  `TypeAlarme` varchar(25) NOT NULL,
  `NiveauAlarme` varchar(25) NOT NULL,
  `EtatFLARM` varchar(25) NOT NULL,
  `PositionAutre` varchar(25) NOT NULL,
  `LongitudeAutre` varchar(25) NOT NULL,
  `LatitudeAutre` varchar(25) NOT NULL,
  `CapAutre` varchar(25) NOT NULL,
  `DirLatAutre` varchar(25) NOT NULL,
  `DirLongAutre` varchar(25) NOT NULL,
  `id_Vol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `information_vol`
--

INSERT INTO `information_vol` (`id`, `UTC`, `Latitude`, `Longitude`, `DirLatitude`, `DirLongitude`, `Altitude`, `Cap`, `Vitesse`, `TypeAlarme`, `NiveauAlarme`, `EtatFLARM`, `PositionAutre`, `LongitudeAutre`, `LatitudeAutre`, `CapAutre`, `DirLatAutre`, `DirLongAutre`, `id_Vol`) VALUES
(1, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(2, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(3, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(4, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(5, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(6, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 1),
(7, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(8, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(9, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(10, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(11, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 1),
(12, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 1),
(13, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(14, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(15, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(16, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(17, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(18, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(19, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(20, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(21, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(22, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(23, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(24, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(25, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(26, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(27, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(28, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(29, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(30, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(31, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(32, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(33, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(34, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(35, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(36, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(37, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(38, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(39, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(40, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(41, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(42, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(43, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(44, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(45, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(46, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(47, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(48, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(49, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(50, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(51, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(52, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(53, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(54, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(55, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(56, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(57, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(58, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(59, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(60, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(61, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(62, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(63, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(64, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(65, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(66, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(67, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(68, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(69, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(70, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(71, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(72, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(73, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(74, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(75, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(76, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(77, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(78, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(79, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(80, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(81, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(82, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(83, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(84, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(85, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(86, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(87, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(88, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(89, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(90, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(91, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(92, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(93, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(94, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(95, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 2),
(96, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 2),
(109, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(110, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(111, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(112, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(113, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(114, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 4),
(115, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(116, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(117, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(118, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(119, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 4),
(120, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 4),
(121, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(122, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(123, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(124, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(125, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(126, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 5),
(127, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(128, '0000-00-00 00:00:00', '01', '22', '45', '57', '110', '122', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(129, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(130, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(131, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 5),
(132, '0000-00-00 00:00:00', '01', '23', '45', '56', '100', '12', '50', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'TEST', 5);

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
-- Déchargement des données de la table `machine`
--

INSERT INTO `machine` (`id`, `type`, `marque`, `modele`, `annee`, `finesse`, `immatriculation`) VALUES
(1, 'Planeur', 'Schleicher', 'ASK 13', 2002, 33, '122'),
(2, 'Moto-Planeur', 'Schleicher', 'ASK 25', 1997, 30, '125'),
(3, 'ULM', 'Roland Aircraft', 'Z-602', 2019, 40, 'AF20');

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
(7, 'Urbain', 'Axel', '$2y$10$6CO/.pEtD2U5lu.CQ0HyQ.4wxvQYg.b3NrFhTBRN.2yx9rjnqMuVC', '2019-03-13', 4),
(9, 'Grivault', 'Mévin', '$2y$10$7eVCm21ZuL5xdEjNjRQiO.sCLE//hN11KXdgpdYCvMyrPk46.ez8m', '2019-03-13', 4),
(17, 'roland', 'Claude', '$2y$10$41U0HzkJERvPajaTVogTbeSX/iel5M2vX5Tfi53N7oYJuCz9pa1qO', '2019-03-15', 4),
(22, 'Baron', 'Quentin', '$2y$10$YPl9X/jysM.k7NRtt3MIc.tGgDVrco78dyuNLXN3mUoeub3m.z9rK', '2019-03-15', 2),
(31, 'Turchau', 'Paul', '$2y$10$.u/8tyw91gZ/NGHo/3vU4Ok4Tu0Jbub8R9fmuMQO.Sv5y9.dlHsoG', '2019-03-20', 3),
(32, 'Guerineau', 'Corentin', '$2y$10$p43alhYR/bl65waz2QLtOeO8ZaokyxOBYQbixIBYCoTnRmCkVKsj.', '2019-03-20', 1),
(33, 'Paquinet', 'Valentin', '$2y$10$0zEgL7cOqms.vBk3l3eKbePWQiL5R0rK7OeMgKVsBi3Exa5.k7rnS', '2019-03-20', 1),
(34, 'Fer', 'Vincent', '$2y$10$2s.9f7jTGrEQZDj/QeyomegBTuPFlHmnHuqsii8S00ZQCAAg8jEya', '2019-03-20', 2),
(35, 'Gouscagniol', 'Basille', '$2y$10$VrGlq9fulpIF.VfDwEOx8uOsK/hDTH7UHc55DjXg5T.DtETNg3tC.', '2019-03-20', 3),
(36, 'Chrétien', 'Kylian', '$2y$10$wUf0YPONKz9GvIg.I3NfMuIViu44TheJManJbzdn7TkO6va1l9zom', '2019-03-20', 1),
(38, 'test', 'test', '$2y$10$VJi9yq2zjIL5A/oQVNIGyO6.Kkg6vjvNwJ7deGY/5VMgjOJBUPK3q', '2019-03-21', 1),
(39, 'eleve', 'eleve', '$2y$10$shq4DKbIIjMiPAoJ.Cvd6uf.tRNKztVnfNlRIZYAatuPmm2OSfGji', '2019-03-21', 1);

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
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id`, `id_membre`, `id_machine`, `date_vols`, `description`) VALUES
(1, 38, 0, '2019-04-05 07:00:13', 'Oui c\'est bien'),
(2, 38, 0, '2019-04-05 07:07:23', '2ème vol'),
(4, 38, 2, '2019-04-05 07:35:16', 'Temps clair, bonne visibilitée '),
(5, 7, 3, '2019-04-05 07:37:04', 'J\'aime beaucoup');

--
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `information_vol`
--
ALTER TABLE `information_vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT pour la table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
