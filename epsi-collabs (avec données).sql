-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  lun. 19 mars 2018 à 14:39
-- Version du serveur :  10.2.8-MariaDB
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epsi-collabs`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_Article` int(11) NOT NULL AUTO_INCREMENT,
  `id_Personne` int(11) NOT NULL,
  `Titre` varchar(20) NOT NULL,
  `Contenu` mediumtext NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_Article`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_Article`, `id_Personne`, `Titre`, `Contenu`, `Date`) VALUES
(1, 1, 'form', 'blablbablalbalablabalbbalablablabla', '2018-03-19 12:55:34');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_Categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_Categorie`, `Titre`, `Date`) VALUES
(1, 'PHP', '2018-03-19 13:04:59'),
(2, 'Linux', '2018-03-19 13:05:16');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

DROP TABLE IF EXISTS `competences`;
CREATE TABLE IF NOT EXISTS `competences` (
  `id_Competence` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Competence`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id_Competence`, `Nom`) VALUES
(1, 'PHP'),
(2, 'JS'),
(3, 'HTML');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `id_Competence` int(11) NOT NULL,
  `id_Personne` int(11) NOT NULL,
  PRIMARY KEY (`id_Competence`,`id_Personne`),
  KEY `id_Personne` (`id_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_Competence`, `id_Personne`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `est_sur`
--

DROP TABLE IF EXISTS `est_sur`;
CREATE TABLE IF NOT EXISTS `est_sur` (
  `id_Personne` int(11) NOT NULL,
  `id_Reseau` int(11) NOT NULL,
  `Lien` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Personne`,`id_Reseau`),
  KEY `id_Reseau` (`id_Reseau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `est_sur`
--

INSERT INTO `est_sur` (`id_Personne`, `id_Reseau`, `Lien`) VALUES
(1, 1, '@JP');

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `id_Forum` int(11) NOT NULL AUTO_INCREMENT,
  `id_Categorie` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  PRIMARY KEY (`id_Forum`),
  UNIQUE KEY `id_Categorie` (`id_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `forums`
--

INSERT INTO `forums` (`id_Forum`, `id_Categorie`, `Titre`, `Description`) VALUES
(1, 1, 'help me !', 'pls'),
(4, 2, 'oki', 'pkpk');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id_Image` int(11) NOT NULL AUTO_INCREMENT,
  `Lien` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Image`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_Image`, `Lien`) VALUES
(1, 'image/default.png');

-- --------------------------------------------------------

--
-- Structure de la table `parle`
--

DROP TABLE IF EXISTS `parle`;
CREATE TABLE IF NOT EXISTS `parle` (
  `id_Categorie` int(11) NOT NULL,
  `id_Article` int(11) NOT NULL,
  PRIMARY KEY (`id_Categorie`,`id_Article`),
  KEY `id_Article` (`id_Article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parle`
--

INSERT INTO `parle` (`id_Categorie`, `id_Article`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id_Personne` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  `Niveau` varchar(20) NOT NULL,
  `Campus` varchar(20) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_Personne`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_Personne`, `Nom`, `Prenom`, `Email`, `MDP`, `Niveau`, `Campus`, `Description`, `Photo`) VALUES
(1, 'Jules', 'Peguet', 'jules.peguet@epsi.fr', '123', 'B1', 'Nantes', 'Workshop', 'image.png');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `id_Article` int(11) NOT NULL,
  `id_Image` int(11) NOT NULL,
  PRIMARY KEY (`id_Article`,`id_Image`),
  KEY `id_Image` (`id_Image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`id_Article`, `id_Image`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_Post` int(11) NOT NULL AUTO_INCREMENT,
  `id_Personne` int(11) NOT NULL,
  `id_Forum` int(11) NOT NULL,
  `Contenu` varchar(500) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_Post`),
  KEY `id_Personne` (`id_Personne`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_Post`, `id_Personne`, `id_Forum`, `Contenu`, `Date`) VALUES
(1, 1, 1, 'merde', '2018-03-19 13:18:26'),
(2, 1, 2, 'pb?', '2018-03-19 13:39:15');

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

DROP TABLE IF EXISTS `propose`;
CREATE TABLE IF NOT EXISTS `propose` (
  `id_Competence` int(11) NOT NULL,
  `id_Personne` int(11) NOT NULL,
  PRIMARY KEY (`id_Competence`,`id_Personne`),
  KEY `id_Personne` (`id_Personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `propose`
--

INSERT INTO `propose` (`id_Competence`, `id_Personne`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reseaux`
--

DROP TABLE IF EXISTS `reseaux`;
CREATE TABLE IF NOT EXISTS `reseaux` (
  `id_Reseau` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Reseau`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reseaux`
--

INSERT INTO `reseaux` (`id_Reseau`, `Nom`) VALUES
(1, 'Twitter'),
(2, 'Facebook');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `Demande_ibfk_1` FOREIGN KEY (`id_Personne`) REFERENCES `personnes` (`id_Personne`);

--
-- Contraintes pour la table `est_sur`
--
ALTER TABLE `est_sur`
  ADD CONSTRAINT `Est_sur_ibfk_1` FOREIGN KEY (`id_Personne`) REFERENCES `personnes` (`id_Personne`),
  ADD CONSTRAINT `Est_sur_ibfk_2` FOREIGN KEY (`id_Reseau`) REFERENCES `reseaux` (`id_Reseau`);

--
-- Contraintes pour la table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_3` FOREIGN KEY (`id_Categorie`) REFERENCES `categories` (`id_Categorie`);

--
-- Contraintes pour la table `parle`
--
ALTER TABLE `parle`
  ADD CONSTRAINT `Parle_ibfk_1` FOREIGN KEY (`id_Article`) REFERENCES `articles` (`id_Article`),
  ADD CONSTRAINT `Parle_ibfk_2` FOREIGN KEY (`id_Categorie`) REFERENCES `categories` (`id_Categorie`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `Possede_ibfk_1` FOREIGN KEY (`id_Article`) REFERENCES `articles` (`id_Article`),
  ADD CONSTRAINT `Possede_ibfk_2` FOREIGN KEY (`id_Image`) REFERENCES `images` (`id_Image`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`id_Personne`) REFERENCES `personnes` (`id_Personne`);

--
-- Contraintes pour la table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `Propose_ibfk_1` FOREIGN KEY (`id_Competence`) REFERENCES `competences` (`id_Competence`),
  ADD CONSTRAINT `Propose_ibfk_2` FOREIGN KEY (`id_Personne`) REFERENCES `personnes` (`id_Personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
