-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 déc. 2024 à 00:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `travel_agency`
--

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `type` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `garages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `image`, `price`, `type`, `area`, `beds`, `baths`, `garages`) VALUES
(1, 'Radisson Blue', 'assets/images/hotel_image_3.jpg', 200, 'Luxe', '30', 50, 12, 3),
(2, 'Le Louvre Hôtel & Spa', 'assets/images/hotel_image_1.jpg', 300, 'hotel', '30', 4, 2, 1),
(3, 'ibiza hotel ankorondrano', 'assets/images/hotel_image_5.jpg', 345, 'Hotel', '21', 12, 12, 4),
(4, 'Radisson Hotel', 'assets/images/hotel_image_2.jpg', 500, 'hotel', '50', 5, 10, 2),
(5, 'Voyager à l\'étranger', 'assets/images/hotel_image_6.jpg', 200, 'voyage', '300', 0, 0, 0),
(6, 'Partir à en famille', 'assets/images/hotel_image_11.jpg', 450, 'famille', '30', 0, 0, 0),
(7, 'Tourisme amoureux', 'assets/images/hotel_image_9.jpg', 100, '30', '', 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
