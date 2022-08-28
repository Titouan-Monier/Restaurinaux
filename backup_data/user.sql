-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 août 2022 à 21:18
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurinaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `admin`, `email`, `password`, `first_name`, `last_name`, `gender`, `country`, `city`, `zip`, `adress`) VALUES
(1, 0, 'root@gmail.com', '$2y$10$R4fsv5oSRaIh1edYQRyNBuBQd', 'Monier', 'Titouan', 'm', 'France', 'Gradignan', '33170', '23 rue des coquelicots'),
(2, 1, 'titouan@gmail.com', 'titou', 'Titouan', 'MONIER', 'm', 'France', 'Gradignan', '33170', '26 rue des myrtilles'),
(3, 0, 'roger@gmail.com', '$2y$10$lU5t2K6toMM3TJdtNSROHOZA8NXwC/rPSZ5NN99u6BMcGRMp0vLXC', 'Jean', 'Roger', 'm', 'france', 'bordeaux ', '33170', '23 rue des abricots'),
(4, 0, 'gwen@gmail.com', '$2y$10$I6HffLlGH7hwoBvbn9Xqr.B7ZPZsT.pKbhdqruKSHMUuXv4DS2XwS', 'Minelli', 'Gwenael', 'm', 'France', 'Pessac', '33000', '23 rue des poussins');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
