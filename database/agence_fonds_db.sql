-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 21 sep. 2020 à 12:43
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agence_fonds_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_am_agences`
--

CREATE TABLE `tb_am_agences` (
  `agence_id` int(11) NOT NULL,
  `agence_nom` varchar(75) NOT NULL,
  `agence_adresse` varchar(250) NOT NULL,
  `agence_observation` text NOT NULL,
  `agence_responsable` varchar(75) NOT NULL,
  `agence_code` varchar(10) NOT NULL,
  `agence_type` enum('Provenance','Destination','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_am_agences`
--

INSERT INTO `tb_am_agences` (`agence_id`, `agence_nom`, `agence_adresse`, `agence_observation`, `agence_responsable`, `agence_code`, `agence_type`) VALUES
(1, 'Lubumbashi', '525, Sendwe, Lubumbashi, Haut-Katanga, RDC', 'Agence basee a Lubumbashi dans la province du haut-katanga', 'Kazadi Mwema', 'AG001', ''),
(2, 'Kolwezi', 'Kolwezi, Manika city, Lualaba', '', 'Sarah Kapinga', 'AG002', NULL),
(3, 'Likasi', 'LIKASI, AVENUE DES POIRVRIERS', '', 'Tshinenge', 'AL025', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tb_am_bons`
--

CREATE TABLE `tb_am_bons` (
  `bon_id` int(11) NOT NULL,
  `code_sid` int(11) NOT NULL,
  `bon_created` int(11) NOT NULL,
  `bon_type` enum('Envoie','Retrait') NOT NULL,
  `bon_comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_am_bons`
--

INSERT INTO `tb_am_bons` (`bon_id`, `code_sid`, `bon_created`, `bon_type`, `bon_comments`) VALUES
(1, 1, 2020, 'Envoie', 'Bon d\'entree');

-- --------------------------------------------------------

--
-- Structure de la table `tb_am_clients`
--

CREATE TABLE `tb_am_clients` (
  `client_id` int(11) NOT NULL,
  `client_fullname` varchar(75) NOT NULL,
  `client_email` varchar(75) NOT NULL,
  `client_profession` varchar(75) NOT NULL,
  `client_type` enum('Expediteur','Beneficiaire') NOT NULL,
  `client_phone` varchar(25) NOT NULL,
  `client_adresse` text NOT NULL,
  `client_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_am_clients`
--

INSERT INTO `tb_am_clients` (`client_id`, `client_fullname`, `client_email`, `client_profession`, `client_type`, `client_phone`, `client_adresse`, `client_created`) VALUES
(1, 'Elie Mwez Rubuz', 'eliemwez@congoagile.com', 'Developpeur informatique', 'Beneficiaire', '0858533285', '25, des rosiers, bel-air, kampemba, Lubumbashi, haut-katanga, Republique Democratique du Congo', '0000-00-00 00:00:00'),
(2, 'Betty Mwila', 'betty.mwila@congoagile.com', 'Medecin', 'Expediteur', '0977090011', '25, des rosiers, Manika, Kolwezi, Lualaba Republique Democratique du Congo', '2020-09-19 09:00:00'),
(3, 'Francois cheche', 'francois@gmail.com', 'Medecin', 'Beneficiaire', '082133330', 'kampemba, Lubumbashi, haut-katanga, Republique Democratique du Congo', '2020-09-21 12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tb_am_transactions`
--

CREATE TABLE `tb_am_transactions` (
  `transac_id` int(11) NOT NULL,
  `transac_code` varchar(10) NOT NULL,
  `transac_montant` float NOT NULL,
  `transac_pourc` varchar(25) NOT NULL,
  `transac_taux` varchar(25) NOT NULL,
  `transac_monnaie` enum('USD','CDF') NOT NULL,
  `transac_type` enum('Envoie','Retrait') NOT NULL,
  `provenance` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_retrait` datetime NOT NULL,
  `montant_caisse` float NOT NULL,
  `client_sid` int(11) NOT NULL,
  `agent_sid` int(11) DEFAULT NULL,
  `transac_statut` varchar(25) NOT NULL DEFAULT 'encours',
  `beneficiaire_sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_am_transactions`
--

INSERT INTO `tb_am_transactions` (`transac_id`, `transac_code`, `transac_montant`, `transac_pourc`, `transac_taux`, `transac_monnaie`, `transac_type`, `provenance`, `destination`, `date_created`, `date_retrait`, `montant_caisse`, `client_sid`, `agent_sid`, `transac_statut`, `beneficiaire_sid`) VALUES
(1, 'KL01/20', 95000, '4', '2000', 'CDF', 'Retrait', 1, 2, '2020-09-20 02:30:24', '2020-09-20 03:26:11', 3800, 1, 21, 'validee', 2),
(2, 'KK01/10', 55000, '5', '1950', 'CDF', 'Retrait', 1, 2, '2020-09-21 12:32:08', '2020-09-21 12:34:31', 2750, 1, 26, 'validee', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tb_am_users`
--

CREATE TABLE `tb_am_users` (
  `id_asset` int(11) NOT NULL,
  `asset_fullname` varchar(75) NOT NULL,
  `asset_username` varchar(50) DEFAULT NULL,
  `asset_password` varchar(60) DEFAULT NULL,
  `asset_email` varchar(50) DEFAULT NULL,
  `asset_sexe` varchar(10) DEFAULT NULL,
  `asset_phone` varchar(50) DEFAULT NULL,
  `asset_type` varchar(20) DEFAULT 'agent',
  `date_ajout` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_connected` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `account_activated` varchar(25) DEFAULT 'active',
  `asset_avatar` varchar(75) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `asset_fonction` varchar(75) NOT NULL,
  `asset_matricule` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_am_users`
--

INSERT INTO `tb_am_users` (`id_asset`, `asset_fullname`, `asset_username`, `asset_password`, `asset_email`, `asset_sexe`, `asset_phone`, `asset_type`, `date_ajout`, `date_connected`, `account_activated`, `asset_avatar`, `date_update`, `asset_fonction`, `asset_matricule`) VALUES
(21, 'Elie Mwez', 'eliemwez', '$2y$12$lgSZ78FDfw7MUBBIrMgsfOB2BEBDapoD4jIJEtr.arj6dSYRoBDZG', 'eliemwez.rubuz@gmail.com', 'Masculin', '+243858533285', 'admin', '2020-09-11 10:08:58', '2020-09-21 10:02:11', 'active', 'global/img/avatars/avatar-eliemwez2.jpg', '2020-09-19 14:07:30', 'admin', '11220'),
(26, 'Emma Tshinenge', 'tshinenge', '$2y$12$iYgPuYl0T3Xn6HBQgocdeuFu1ZGN0qGfvzPexk60RU6l.q9YdS9Ju', 'emmabilldo3@gmail.com', 'masculin', '0993076047', 'user', '2020-09-21 09:59:39', '2020-09-21 10:42:27', 'active', NULL, NULL, 'guichetier', '202005'),
(27, 'Administrateur Systeme', 'admin', '$2y$12$bGYGbrhUKpkUVun35wVyq.E3xoHKEsztWso0Hw6xlP4pRPrhNqxpu', 'admin@gmail.com', 'Homme', '+243903774951', 'admin', '2020-09-21 10:01:52', '2020-09-21 10:14:06', 'active', 'global/img/avatars/IMG_20200309_110637_241.jpg', '2020-09-21 12:06:49', 'admin', '2020010');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_am_agences`
--
ALTER TABLE `tb_am_agences`
  ADD PRIMARY KEY (`agence_id`);

--
-- Index pour la table `tb_am_bons`
--
ALTER TABLE `tb_am_bons`
  ADD PRIMARY KEY (`bon_id`),
  ADD KEY `code_sid` (`code_sid`);

--
-- Index pour la table `tb_am_clients`
--
ALTER TABLE `tb_am_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `tb_am_transactions`
--
ALTER TABLE `tb_am_transactions`
  ADD PRIMARY KEY (`transac_id`),
  ADD KEY `client_sid` (`client_sid`),
  ADD KEY `agence_depart` (`provenance`),
  ADD KEY `agence_destination` (`destination`),
  ADD KEY `beneficiaire_sid` (`beneficiaire_sid`);

--
-- Index pour la table `tb_am_users`
--
ALTER TABLE `tb_am_users`
  ADD PRIMARY KEY (`id_asset`),
  ADD UNIQUE KEY `asset_username` (`asset_username`,`asset_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_am_agences`
--
ALTER TABLE `tb_am_agences`
  MODIFY `agence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tb_am_bons`
--
ALTER TABLE `tb_am_bons`
  MODIFY `bon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_am_clients`
--
ALTER TABLE `tb_am_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tb_am_transactions`
--
ALTER TABLE `tb_am_transactions`
  MODIFY `transac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tb_am_users`
--
ALTER TABLE `tb_am_users`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tb_am_bons`
--
ALTER TABLE `tb_am_bons`
  ADD CONSTRAINT `tb_am_bons_ibfk_1` FOREIGN KEY (`code_sid`) REFERENCES `tb_am_transactions` (`transac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tb_am_transactions`
--
ALTER TABLE `tb_am_transactions`
  ADD CONSTRAINT `agence_depart` FOREIGN KEY (`provenance`) REFERENCES `tb_am_agences` (`agence_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agence_destination` FOREIGN KEY (`destination`) REFERENCES `tb_am_agences` (`agence_id`),
  ADD CONSTRAINT `tb_am_transactions_ibfk_1` FOREIGN KEY (`client_sid`) REFERENCES `tb_am_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_am_transactions_ibfk_2` FOREIGN KEY (`beneficiaire_sid`) REFERENCES `tb_am_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
