-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 10 nov. 2022 à 19:36
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `simless`
--

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `conf_id` int(11) NOT NULL,
  `lib` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `idspeaker` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `lib` int(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `lieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event_jour`
--

CREATE TABLE `event_jour` (
  `evjo_id` int(11) NOT NULL,
  `lib` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `heure_deb` time NOT NULL,
  `heure_fin` time NOT NULL,
  `lieu` enum('tunis','sousse','sfax') NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `formateurid` int(11) NOT NULL,
  `specialite` int(25) NOT NULL,
  `fonction` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marq_opp`
--

CREATE TABLE `marq_opp` (
  `id_mo` int(11) NOT NULL,
  `mat_fiscl` int(13) NOT NULL,
  `type` enum('operateur','marque') NOT NULL,
  `bio` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `med_id` int(11) NOT NULL,
  `med_nom` varchar(50) NOT NULL,
  `med_taille` varchar(25) NOT NULL,
  `med_type` longblob NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `part_id` int(11) NOT NULL,
  `naiss_date` date NOT NULL,
  `genre` enum('f','h') NOT NULL DEFAULT 'f',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `ses_id` int(11) NOT NULL,
  `lib` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `id_mo` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `speaker`
--

CREATE TABLE `speaker` (
  `speakerid` int(11) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `lieutrav` varchar(50) NOT NULL,
  `naiss_date` date NOT NULL,
  `genre` enum('f','h') NOT NULL DEFAULT 'h',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` binary(0) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(8) NOT NULL,
  `photo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `adresse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `workshop`
--

CREATE TABLE `workshop` (
  `wor_mo` int(11) NOT NULL,
  `lib` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`conf_id`),
  ADD KEY `idspeaker` (`idspeaker`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Index pour la table `event_jour`
--
ALTER TABLE `event_jour`
  ADD PRIMARY KEY (`evjo_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`formateurid`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `marq_opp`
--
ALTER TABLE `marq_opp`
  ADD PRIMARY KEY (`id_mo`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ses_id`),
  ADD KEY `id_mo` (`id_mo`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`speakerid`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`wor_mo`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conference`
--
ALTER TABLE `conference`
  MODIFY `conf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `event_jour`
--
ALTER TABLE `event_jour`
  MODIFY `evjo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `formateurid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marq_opp`
--
ALTER TABLE `marq_opp`
  MODIFY `id_mo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `speakerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `wor_mo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`idspeaker`) REFERENCES `speaker` (`speakerid`),
  ADD CONSTRAINT `conference_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Contraintes pour la table `event_jour`
--
ALTER TABLE `event_jour`
  ADD CONSTRAINT `event_jour_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Contraintes pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD CONSTRAINT `formateur_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `marq_opp`
--
ALTER TABLE `marq_opp`
  ADD CONSTRAINT `marq_opp_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_mo`) REFERENCES `marq_opp` (`id_mo`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Contraintes pour la table `speaker`
--
ALTER TABLE `speaker`
  ADD CONSTRAINT `speaker_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
