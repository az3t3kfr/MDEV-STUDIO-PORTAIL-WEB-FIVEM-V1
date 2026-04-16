-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 avr. 2026 à 16:27
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fivemaz`
--

-- --------------------------------------------------------

--
-- Structure de la table `az_applications`
--

CREATE TABLE `az_applications` (
  `az_id` int(11) NOT NULL,
  `az_discord_tag` varchar(100) NOT NULL,
  `az_nom_irl` varchar(100) NOT NULL,
  `az_prenom_irl` varchar(100) NOT NULL,
  `az_email` varchar(100) NOT NULL,
  `az_age_irl` int(11) NOT NULL,
  `az_nom_rp` varchar(100) NOT NULL,
  `az_prenom_rp` varchar(100) NOT NULL,
  `az_job_target` varchar(50) NOT NULL,
  `az_temps_jeu` varchar(50) NOT NULL,
  `az_histoire_rp` text NOT NULL,
  `az_motivation` text NOT NULL,
  `az_date_sub` datetime NOT NULL DEFAULT current_timestamp(),
  `az_status` enum('en_attente','accepte','refuse') DEFAULT 'en_attente',
  `az_date_soumission` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `az_jobs`
--

CREATE TABLE `az_jobs` (
  `az_id` int(11) NOT NULL,
  `az_job_name` varchar(50) NOT NULL,
  `az_label` varchar(100) NOT NULL,
  `az_description` text DEFAULT NULL,
  `az_is_active` tinyint(1) DEFAULT 0,
  `az_image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `az_jobs`
--

INSERT INTO `az_jobs` (`az_id`, `az_job_name`, `az_label`, `az_description`, `az_is_active`, `az_image_url`) VALUES
(2, 'ems', 'Services Médicaux', 'Secours d\'urgence et soins intensifs.', 1, 'https://imgur.com/GZDIOF1.png'),
(3, 'mecano', 'Benny\'s Luxury', 'Réparation et customisation de véhicules.', 1, 'https://imgur.com/xOzbYZN.png'),
(5, 'taxi', 'TAXI', '', 1, 'https://imgur.com/7OcD9eS.png'),
(6, 'lspd', 'POLICE', 'Los Santos Police Dept', 1, 'https://imgur.com/eSAqlvs.png'),
(7, 'concess', 'Luxury Autos', 'Vente de véhicules de luxe et sportifs.', 1, 'https://imgur.com/rGKpCRM.png'),
(8, 'vigneron', 'Domaine Marlowe', 'Production et dégustation de vins locaux.', 1, 'https://imgur.com/eNxrCKB.png'),
(9, 'journaliste', 'Weazel News', 'Reportages en direct et actualités de la ville.', 1, 'https://imgur.com/XW7uxAV.png'),
(10, 'immo', 'Dynasty 8', 'Vente et location de propriétés immobilières.', 1, 'https://imgur.com/gfHdLT7.png'),
(11, 'avocat', 'Cabinet de Justice', 'Défense juridique et conseil aux citoyens.', 1, 'https://imgur.com/LMrYP8s.png'),
(12, 'burgershot', 'Burger Shot', 'Restauration rapide de renommée mondiale.', 1, 'https://imgur.com/35jomQA.png'),
(13, 'unicorn', 'Vanilla Unicorn', 'Gestion de club privé et vie nocturne.', 1, 'https://imgur.com/gpHnDuh.png'),
(16, 'bahama', 'Bahama Mamas', 'Bar de plage et soirées à thèmes.', 1, 'https://imgur.com/cdZhSQh.png'),
(17, 'bennys', 'Benny\'s Original', 'Mécanique lourde et tuning bas de caisse.', 1, 'https://i.imgur.com/rZpd5rP.jpeg'),
(19, 'securite', 'Gruppe Sechs', 'Transport de fonds et protection rapprochée.', 1, 'https://imgur.com/hYYM13n.png');

-- --------------------------------------------------------

--
-- Structure de la table `az_keys`
--

CREATE TABLE `az_keys` (
  `az_id` int(11) NOT NULL,
  `az_key_name` varchar(20) NOT NULL,
  `az_key_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `az_keys`
--

INSERT INTO `az_keys` (`az_id`, `az_key_name`, `az_key_desc`) VALUES
(1, 'F1', 'Ouvrir le téléphone portable'),
(2, 'F2', 'Accéder à l\'inventaire'),
(3, 'F3', 'Menu des animations / emotes'),
(4, 'E', 'Interagir avec l\'environnement'),
(5, 'G', 'Mettre ou enlever la ceinture de sécurité'),
(6, 'X', 'Lever les mains / Annuler l\'action'),
(7, 'K', 'Ouvrir le menu des clés du véhicule'),
(8, 'Y', 'Changer la portée de la voix (Proximité)'),
(9, 'T', 'Ouvrir le chat textuel'),
(10, 'ECHAP', 'Menu pause et carte de la ville');

-- --------------------------------------------------------

--
-- Structure de la table `az_rules`
--

CREATE TABLE `az_rules` (
  `az_id` int(11) NOT NULL,
  `az_title` varchar(255) NOT NULL,
  `az_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `az_rules`
--

INSERT INTO `az_rules` (`az_id`, `az_title`, `az_content`) VALUES
(1, 'Fair-Play', 'Le but est de créer une scène amusante pour tout le monde. Gagner n\'est pas l\'objectif principal du RP.'),
(2, 'Le Fear-RP', 'Vous devez simuler la peur lorsque votre vie est réellement en danger (ex: braqué par une arme).'),
(3, 'PowerGaming', 'Interdiction de réaliser des actions impossibles dans la vraie vie (ex: rouler en montagne avec une Ferrari).'),
(4, 'MetaGaming', 'Interdiction d\'utiliser des informations apprises hors-jeu (Discord, Stream) pour les utiliser en personnage.'),
(5, 'Pain-RP', 'Vous devez simuler la douleur physique après un accident, une chute ou une blessure par balle.'),
(6, 'Comportement', 'Tout manque de respect envers un autre joueur ou un membre du staff entraînera une sanction immédiate.'),
(7, 'Revenge Kill', 'Si vous mourrez, vous oubliez la scène et vous n\'avez pas le droit de retourner tuer votre agresseur.'),
(8, 'Stream Hack', 'Regarder le live d\'un autre joueur pour obtenir un avantage en jeu est strictement interdit et banni.');

-- --------------------------------------------------------

--
-- Structure de la table `az_settings`
--

CREATE TABLE `az_settings` (
  `az_id` int(11) NOT NULL,
  `az_server_name` varchar(100) NOT NULL,
  `az_discord_url` varchar(255) NOT NULL,
  `az_logo_url` varchar(255) DEFAULT '',
  `az_hero_image` varchar(255) DEFAULT 'https://images.wallpaperscraft.com/image/single/gta_v_gta_5_rockstar_games_93564_1920x1080.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `az_settings`
--

INSERT INTO `az_settings` (`az_id`, `az_server_name`, `az_discord_url`, `az_logo_url`, `az_hero_image`) VALUES
(1, 'MDEV', 'https://discord.gg/bSk3zGzj7j', 'https://imgur.com/5jMdkCl.png', 'https://imgur.com/nhH3xhI.png');

-- --------------------------------------------------------

--
-- Structure de la table `az_users`
--

CREATE TABLE `az_users` (
  `az_id` int(11) NOT NULL,
  `az_email` varchar(100) NOT NULL,
  `az_password` varchar(255) NOT NULL,
  `az_last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `az_users`
--

INSERT INTO `az_users` (`az_id`, `az_email`, `az_password`, `az_last_login`) VALUES
(1, 'admin@serveur.fr', '$2y$10$gbTpIkNN.QNI4WrAd4FA9.eFy/008rKJUZBMmROHMnbfqOyzQqWOu', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `az_applications`
--
ALTER TABLE `az_applications`
  ADD PRIMARY KEY (`az_id`),
  ADD KEY `fk_az_job_target` (`az_job_target`);

--
-- Index pour la table `az_jobs`
--
ALTER TABLE `az_jobs`
  ADD PRIMARY KEY (`az_id`),
  ADD UNIQUE KEY `az_job_name` (`az_job_name`);

--
-- Index pour la table `az_keys`
--
ALTER TABLE `az_keys`
  ADD PRIMARY KEY (`az_id`);

--
-- Index pour la table `az_rules`
--
ALTER TABLE `az_rules`
  ADD PRIMARY KEY (`az_id`);

--
-- Index pour la table `az_settings`
--
ALTER TABLE `az_settings`
  ADD PRIMARY KEY (`az_id`);

--
-- Index pour la table `az_users`
--
ALTER TABLE `az_users`
  ADD PRIMARY KEY (`az_id`),
  ADD UNIQUE KEY `az_email` (`az_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `az_applications`
--
ALTER TABLE `az_applications`
  MODIFY `az_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `az_jobs`
--
ALTER TABLE `az_jobs`
  MODIFY `az_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `az_keys`
--
ALTER TABLE `az_keys`
  MODIFY `az_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `az_rules`
--
ALTER TABLE `az_rules`
  MODIFY `az_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `az_users`
--
ALTER TABLE `az_users`
  MODIFY `az_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `az_applications`
--
ALTER TABLE `az_applications`
  ADD CONSTRAINT `fk_az_job_target` FOREIGN KEY (`az_job_target`) REFERENCES `az_jobs` (`az_job_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
