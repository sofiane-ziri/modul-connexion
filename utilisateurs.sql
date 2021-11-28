-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 28 nov. 2021 à 19:16
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin@admin.tn', 'Boss', 'admin', '$2y$12$AD0Fgfy1o2t9Wo9kgWO8BuvCUfbPGRHuBJ.LMCla0f/dXaWPzH/bK'),
(34, 'soso@soso.fr', 'sofiane', 'soso', '$2y$12$CnbeWq8B7qaY6lM8u8wJAOi0DvuXWMG7rPQBO.Ut7KIg6lYUXEcgO'),
(35, 'lol@lol.fr', 'lol', 'lol', '$2y$12$wvl1m8eGcz//8YsRiaaEauWRLR0figRIc.fqxDy.wnMAosQAXdzGy'),
(36, 'lil@lil.fr', 'lil', 'lil', '$2y$12$drlt.quAI6kTnniTd20h3u9ng71t1fNvUomGHncjVhCD8PhTJhUn2'),
(37, 'caca@caca.fr', 'caca', 'caca', '$2y$12$.UjiaLyWI80uys0x81.a1OveCDlfljB3PFfYE4v4wPhoFb1o7WjDe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
