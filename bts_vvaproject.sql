-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 oct. 2021 à 09:34
-- Version du serveur :  10.5.12-MariaDB-1:10.5.12+maria~buster
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bts_vvaproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `etats_reservations`
--

CREATE TABLE `etats_reservations` (
  `code` varchar(2) NOT NULL,
  `nom` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hebergements`
--

CREATE TABLE `hebergements` (
  `id` int(4) NOT NULL,
  `id_type` varchar(5) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `nb_place` int(2) DEFAULT NULL,
  `surface` int(3) DEFAULT NULL,
  `internet` enum('oui','non') DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `secteur` varchar(15) DEFAULT NULL,
  `orientation` varchar(5) DEFAULT NULL,
  `etat` varchar(32) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `tarif_semaine` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hebergements`
--

INSERT INTO `hebergements` (`id`, `id_type`, `nom`, `nb_place`, `surface`, `internet`, `annee`, `secteur`, `orientation`, `etat`, `description`, `photo`, `tarif_semaine`) VALUES
(3, '1', 'La petite boiserie', 40, 234, 'oui', 2014, 'Alpes', 'Ouest', 'En rénovation', 'Une brève description de l\'hébergement', NULL, '5999.99'),
(4, '2', 'Petite maison dans la prairie', 80, 77, 'non', 1970, 'Pyrénées', 'Sud', 'Disponible', 'Tout est dans le nom, rien de plus, rien de moins', NULL, '11947.87'),
(5, '3', 'Au loups en ski', 15, 197, 'oui', 2020, 'Jura', 'Nord', 'Réservé', 'Un village de chalet avec la compagnie de la mascotte loup', NULL, '537.34'),
(6, '4', 'Résidence Margueritte', 73, 58, 'oui', 2006, 'Alpes', 'Est', 'Indisponible', 'Description de ce lieu qui devrait être assez longue pour pouvoir tester le tableau', NULL, '128.55');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `numero` int(5) NOT NULL,
  `id_utilisateur` int(8) NOT NULL,
  `date_debut_semaine` date NOT NULL,
  `num_hebergement` int(4) NOT NULL,
  `code_etat` varchar(2) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `date_arrivee` int(11) DEFAULT NULL,
  `montant_arrivee` decimal(7,2) DEFAULT NULL,
  `nb_occupant` int(2) DEFAULT NULL,
  `tarif_semaine` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `semaines`
--

CREATE TABLE `semaines` (
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_hebergements`
--

CREATE TABLE `types_hebergements` (
  `id` varchar(5) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_hebergements`
--

INSERT INTO `types_hebergements` (`id`, `nom`) VALUES
('', NULL),
('1', 'Chalet'),
('2', 'Mobil-Home'),
('3', 'Bungalow'),
('4', 'Appartement');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(8) NOT NULL,
  `fournisseur_oauth` enum('github','google') NOT NULL,
  `uid_oauth` varchar(100) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT 'NULL',
  `numero_tel` varchar(15) DEFAULT 'NULL',
  `type_compte` varchar(10) DEFAULT 'NULL',
  `cree_le` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifie_le` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `fournisseur_oauth`, `uid_oauth`, `nom`, `prenom`, `email`, `avatar`, `mot_de_passe`, `numero_tel`, `type_compte`, `cree_le`, `modifie_le`) VALUES
(1, 'github', 'default', 'Denissot', 'Cédric', 'edrow6@gmail.com', '7c148a43e924ada3fdbdfe3ac8137975.png', '$2y$10$AJxUxqeQk.O77dT4u3GsneyAWSc0pOxThmX4ouiIyKF2cQQcqpdR.', '0648916750', 'admin', '2021-09-17 17:35:08', '2021-10-17 17:52:37'),
(2, 'github', 'default', 'De Amorim', 'Marie', 'gestion@gmail.com', 'NULL', '$2y$10$JnTPz4kXLG8TpJDoRfg29.5eOqLWU8HIF784mwYuzrtJR2G/CHAly', '0670971852', 'gestion', '2021-09-24 09:23:15', '2021-09-27 07:58:54'),
(3, 'github', 'default', 'Varozki', 'Nikita', 'client@gmail.com', 'null', '$2y$10$JnTPz4kXLG8TpJDoRfg29.5eOqLWU8HIF784mwYuzrtJR2G/CHAly', '0731987455', 'vacancier', '2021-09-24 09:23:15', '2021-09-27 08:00:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etats_reservations`
--
ALTER TABLE `etats_reservations`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `hebergements`
--
ALTER TABLE `hebergements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_types_hebergements_hebergements` (`id_type`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `fk_etats_reservations_reservations` (`code_etat`),
  ADD KEY `fk_reservations_hebergements` (`num_hebergement`),
  ADD KEY `fk_semaines_reservations` (`date_debut_semaine`),
  ADD KEY `fk_utilisateurs_reservations` (`id_utilisateur`);

--
-- Index pour la table `semaines`
--
ALTER TABLE `semaines`
  ADD PRIMARY KEY (`date_debut`);

--
-- Index pour la table `types_hebergements`
--
ALTER TABLE `types_hebergements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `numero` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `hebergements`
--
ALTER TABLE `hebergements`
  ADD CONSTRAINT `fk_types_hebergements_hebergements` FOREIGN KEY (`id_type`) REFERENCES `types_hebergements` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_etats_reservations_reservations` FOREIGN KEY (`code_etat`) REFERENCES `etats_reservations` (`code`),
  ADD CONSTRAINT `fk_reservations_hebergements` FOREIGN KEY (`num_hebergement`) REFERENCES `hebergements` (`id`),
  ADD CONSTRAINT `fk_semaines_reservations` FOREIGN KEY (`date_debut_semaine`) REFERENCES `semaines` (`date_debut`),
  ADD CONSTRAINT `fk_utilisateurs_reservations` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
