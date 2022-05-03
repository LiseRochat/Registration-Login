-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 mai 2022 à 13:11
-- Version du serveur : 5.7.36
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `connection`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `isValid` tinyint(4) NOT NULL,
  `keyValidation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `password`, `role`, `avatar`, `isValid`, `keyValidation`) VALUES
(41, 'Tintin', 'Milou', 'user@milou.fr', '$2y$10$ifX1fsEMaxqaY/WjXTdVJ.v2noQj3Y8fqvXNj4u1n0/4CB3CSb4ZG', 'userVIP', 'profils/profil.png', 0, 6110),
(39, 'Lise', 'Rochat', 'lise@gmail.com', '$2y$10$TvvdoGVOMjcsajml7dEgfu7HoScB/DJK1j/opeCQATv3LNXAQxco6', 'user', 'profils/profil.png', 0, 8442),
(40, 'alexandre', 'vespiasiano', 'alex@gmail.com', '$2y$10$EQmTcl6H4CsNyOlgRWsC9e5YrPEzJpRxtoKnY1.yVcQ.aQbvukRsW', 'user', 'profils/profil.png', 0, 2525),
(38, 'test', 'test', 'admin@gmail.com', '$2y$10$38x8hnp3OoeMeblTxjGm2.RHXlnZZkicIap5aMWcSjdy3lP4CFH06', 'admin', 'profils/profil.png', 1, 4096),
(42, 'laure', 'vitry', 'laure@gmail.com', '$2y$10$9RvPTYxicwz/N67i1v362eDi2XwpM7jz7D/DGnUrzyaA0.bjaqH86', 'user', 'profils/profil.png', 0, 6219);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
