-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 05 oct. 2021 à 13:33
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  `quatite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id`, `id_prod`, `id_utilisateur`, `prix_total`, `quatite`) VALUES
(45, 15, 16, 204, 3),
(46, 16, 16, 68, 1),
(47, 15, 16, 68, 1),
(48, 19, 16, 90, 1),
(49, 15, 16, 136, 2),
(50, 17, 16, 50, 1),
(51, 15, 16, 136, 2),
(52, 16, 16, 68, 1),
(53, 15, 16, 136, 2);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(3000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `dernier_acc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `mdp`, `tel`, `image`, `dernier_acc`) VALUES
(20, 'Wajihhh', 'wajih.mejri@esprit.tn', '$2y$10$7LGGF.DAtY2Vj0YpsF8K8O.Ah0zF0R8DLdPjI2DsGAROikSgw7Zg6', 20332985, './assets/images/admin/164493888_284973556490314_220761501831044655_n.jpg', '2021-09-04 11:05:08'),
(23, 'aaa', 'wajihfidodido@gmail.com', '$2y$10$PoTcKKQ4BFnwIMdG/XcaD.BlgvHCH/8ammP15HT5PmEUBB4DhFbk.', 20332985, './assets/images/admin/191470688_142700451245719_3962380205310844226_n.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` int(11) NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sexe` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_nais` date DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `mdp`, `tel`, `adresse`, `sexe`, `date_nais`, `image`) VALUES
(11, 'WAJ', 'MEJ', 'wajihfidodido@gmail.com', '$2y$10$2NCwik9wI3guRLrlxY0FEesp497RJM40vnbsFNAZzyugub9bYr9R6', 20332985, '6 RUE KAMEROUN', 'Homme', '2021-04-15', './images/client/164493888_284973556490314_220761501831044655_n.jpg'),
(13, 'Mejri', 'Wajih', 'wajih.mejri@esprit.tn', '$2y$10$A/xXuPy2SHnK/5INqLCFKepy8L1O5InsZwW93FMA/zQWsf7/vuEDm', 20332999, '11 rue Côte d\'Ivoire', 'Homme', '2021-05-11', './images/client/cap5.PNG'),
(16, 'samir', 'sami', 'mstore.tn@gmail.com', '$2y$10$ATBzvBT79SFK5DqSdOiTcePeOH3Y/8BqNocDtlE9nJnZ40/gUPYLO', 20332985, '6 RUE KAMEROUN', 'Homme', '2021-08-28', './images/client/194936927_502673810932396_7415969449211285868_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_utilisateur` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quatite` int(11) NOT NULL,
  `prix_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `informations` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `image`, `informations`) VALUES
(15, 'BRAKE DISCS', 68, './assets/images/Produits/1.jpg', 'Opel'),
(16, 'COLD AIR SYSTEM', 68, './assets/images/Produits/6.jpg', 'Toyota'),
(17, 'THERMAL FAN', 50, './assets/images/Produits/5.jpg', 'Audi'),
(18, 'OIL FILTER', 80, './assets/images/Produits/2.jpg', 'Subaru'),
(19, 'FRONT LIGHTING', 90, './assets/images/Produits/4.jpg', 'BMW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
