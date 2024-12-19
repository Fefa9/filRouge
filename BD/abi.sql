-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 19 déc. 2024 à 13:07
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abi`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idClient` int NOT NULL,
  `raisonSociale` varchar(50) DEFAULT NULL,
  `adresseClient` varchar(50) DEFAULT NULL,
  `codePostal` varchar(50) DEFAULT NULL,
  `villeClient` varchar(50) DEFAULT NULL,
  `CA` int DEFAULT NULL,
  `effectifClient` int DEFAULT NULL,
  `telephoneClient` varchar(50) DEFAULT NULL,
  `typeClient` varchar(50) DEFAULT NULL,
  `natureClient` varchar(50) DEFAULT NULL,
  `commentaireClient` varchar(50) DEFAULT NULL,
  `idSect` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `raisonSociale`, `adresseClient`, `codePostal`, `villeClient`, `CA`, `effectifClient`, `telephoneClient`, `typeClient`, `natureClient`, `commentaireClient`, `idSect`) VALUES
(2, 'Le Duff', '[value-3]', '[value-4]', '[value-5]', 2000, 30000, '[value-8]', '[value-9]', '[value-10]', '[value-11]', 1),
(7, 'Bigard', '[value-3]', '[value-4]', '[value-5]', 4853, 13510, '[value-8]', '[value-9]', '[value-10]', '[value-11]', 2),
(32, 'Cooper', NULL, NULL, NULL, 2450, 7570, NULL, NULL, NULL, NULL, 2),
(33, 'HJJD', NULL, NULL, NULL, 488, 778, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE `commander` (
  `codeProjet` int NOT NULL,
  `idClient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `idContact` int NOT NULL,
  `nomContact` varchar(50) DEFAULT NULL,
  `prenomContact` varchar(50) DEFAULT NULL,
  `telContact` varchar(50) DEFAULT NULL,
  `emailContact` varchar(50) DEFAULT NULL,
  `duree` int DEFAULT NULL,
  `idFonc` int NOT NULL,
  `idClient` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`idContact`, `nomContact`, `prenomContact`, `telContact`, `emailContact`, `duree`, `idFonc`, `idClient`) VALUES
(2, 'Dupont', NULL, NULL, 'pierre.dupont@gmail.fr', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `idDoc` int NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `dateEdition` date DEFAULT NULL,
  `resume` varchar(50) DEFAULT NULL,
  `titreDoc` varchar(50) DEFAULT NULL,
  `codeProjet` int NOT NULL,
  `idContact` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `idFonc` int NOT NULL,
  `fonction` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`idFonc`, `fonction`) VALUES
(1, 'commerciale');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `codeProjet` int NOT NULL,
  `abrege` varchar(50) DEFAULT NULL,
  `nomProjet` varchar(50) DEFAULT NULL,
  `typeProjet` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idRole` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secteursActivite`
--

CREATE TABLE `secteursActivite` (
  `idSect` int NOT NULL,
  `activite` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `secteursActivite`
--

INSERT INTO `secteursActivite` (`idSect`, `activite`) VALUES
(1, 'Boulangerie'),
(2, 'Boucherie'),
(3, 'Fruits&Légumes');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `loginUser` varchar(50) DEFAULT NULL,
  `passUser` varchar(50) DEFAULT NULL,
  `idRole` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `idSect` (`idSect`);

--
-- Index pour la table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`codeProjet`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idFonc` (`idFonc`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`idDoc`),
  ADD KEY `codeProjet` (`codeProjet`),
  ADD KEY `idContact` (`idContact`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`idFonc`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`codeProjet`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `secteursActivite`
--
ALTER TABLE `secteursActivite`
  ADD PRIMARY KEY (`idSect`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `commander`
--
ALTER TABLE `commander`
  MODIFY `codeProjet` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContact` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `idDoc` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `idFonc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `codeProjet` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`idSect`) REFERENCES `secteursActivite` (`idSect`);

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`codeProjet`) REFERENCES `projets` (`codeProjet`),
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`);

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`idFonc`) REFERENCES `fonctions` (`idFonc`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`codeProjet`) REFERENCES `projets` (`codeProjet`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
