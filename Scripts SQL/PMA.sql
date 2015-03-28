-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 03 Juillet 2013 à 06:17
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ressocutt`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `idCompetence` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la compétence',
  `idCompte` int(10) NOT NULL,
  `idTypeCompetence` int(10) NOT NULL COMMENT 'Nom de la compétence',
  PRIMARY KEY (`idCompetence`),
  KEY `idCompte` (`idCompte`),
  KEY `idTypeCompetence` (`idTypeCompetence`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`idCompetence`, `idCompte`, `idTypeCompetence`) VALUES
(54, 0, 10),
(55, 0, 12),
(56, 0, 13);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID du compte',
  `identifiant` char(30) NOT NULL COMMENT 'Identifiant utilisé pour le compte',
  `motDePasse` char(30) NOT NULL COMMENT 'Mot de passe utilisé pour le compte',
  `prenom` char(30) NOT NULL COMMENT 'Prénom de l''utilisateur du compte',
  `nom` char(30) NOT NULL COMMENT 'Nom de l''utilisateur du compte',
  `sexe` char(10) NOT NULL COMMENT 'Sexe de l''utilisateur du compte',
  `programme` char(10) NOT NULL COMMENT 'Programme de l''utilisateur du compte',
  `semestre` int(10) NOT NULL COMMENT 'Semestre de l''utilisateur du compte',
  `idVisibiliteProgramme` int(10) NOT NULL COMMENT 'Identifiant de visibilité du programme du compte',
  `idVisibiliteSemestre` int(10) NOT NULL COMMENT 'Identifiant de visibilité du semestre du compte',
  `idVisibiliteCompetences` int(10) NOT NULL COMMENT 'Identifiant de visibilité des compétences du compte',
  `idVisibilitePhotos` int(10) NOT NULL COMMENT 'Identifiant de visibilité des photos du compte',
  PRIMARY KEY (`idCompte`),
  UNIQUE KEY `login` (`identifiant`),
  KEY `idCompte` (`idCompte`),
  KEY `idCompte_2` (`idCompte`),
  KEY `idVisibiliteProgramme` (`idVisibiliteProgramme`),
  KEY ` 	idVisibiliteSemestre` (`idVisibiliteSemestre`),
  KEY `idVisibiliteCompetences` (`idVisibiliteCompetences`),
  KEY `idVisibilitePhotos` (`idVisibilitePhotos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `identifiant`, `motDePasse`, `prenom`, `nom`, `sexe`, `programme`, `semestre`, `idVisibiliteProgramme`, `idVisibiliteSemestre`, `idVisibiliteCompetences`, `idVisibilitePhotos`) VALUES
(0, 'admin', 'admin', 'Florent', 'Lucet', 'Homme', 'ISI', 2, 1, 2, 1, 2),
(42, 'Robertmitchum', 'ISI2', 'Jimmy', 'Pauphilet', 'Homme', 'ISI', 2, 2, 1, 0, 0),
(43, 'Unidentifiant', 'unmotdepasse', 'Julie', 'Romero', 'Femme', 'SRT', 4, 0, 1, 0, 0),
(44, 'Lamafia', 'carigolepas', 'Tony', 'Soprano', 'Homme', 'TC', 8, 2, 2, 0, 0),
(45, 'IA', 'LISP', 'John', 'McCarthy', 'Homme', 'ISI', 5, 0, 0, 0, 0),
(46, 'Reddit', 'reddit', 'Aaron', 'Swartz', 'Homme', 'ISI', 6, 0, 0, 0, 0),
(48, 'Suis', 'azert', 'Bonjour', 'Je', 'Femme', 'PMOM', 3, 1, 2, 0, 0),
(49, 'Flolu', 'Flolu', 'Flo', 'Lucet', 'Homme', 'SIT', 3, 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''évènement',
  `idCompte` int(10) NOT NULL COMMENT 'Identifiant du compte ayant effectué l''évènement',
  `idTypeEvenement` int(10) NOT NULL COMMENT 'Description de l''évènement',
  `descriptionEvenement` char(120) NOT NULL COMMENT 'Identifiant du type d''évènement',
  `dateEvenement` datetime NOT NULL COMMENT 'Date de l''évènement',
  PRIMARY KEY (`idEvenement`),
  KEY `idCompte` (`idCompte`),
  KEY `idTypeEvenement` (`idTypeEvenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `idCompte`, `idTypeEvenement`, `descriptionEvenement`, `dateEvenement`) VALUES
(0, 0, 1, 'Modif', '2013-06-24 01:56:58'),
(2, 0, 1, '', '2013-06-24 04:55:04'),
(3, 0, 2, '', '2013-06-24 05:06:32'),
(4, 0, 2, '', '2013-06-24 05:30:37'),
(5, 42, 2, '', '2013-06-24 05:31:30'),
(6, 0, 2, '', '2013-07-02 14:37:33'),
(7, 0, 1, '', '2013-07-02 21:12:35'),
(8, 0, 3, '', '2013-07-02 23:22:36'),
(9, 0, 3, '', '2013-07-02 23:22:48'),
(10, 0, 3, '', '2013-07-02 23:23:02'),
(11, 0, 3, '', '2013-07-02 23:23:13'),
(12, 0, 3, '', '2013-07-02 23:23:24'),
(13, 0, 2, '', '2013-07-03 00:15:39'),
(14, 44, 2, '', '2013-07-03 00:16:20'),
(15, 49, 0, '', '2013-07-03 05:27:09');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la photo',
  `idCompte` int(10) NOT NULL,
  `lien` char(150) NOT NULL COMMENT 'Lien de la photo sur le serveur du site Web',
  PRIMARY KEY (`idPhoto`),
  UNIQUE KEY `lien` (`lien`),
  KEY `idCompte` (`idCompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `idCompte`, `lien`) VALUES
(32, 0, '../images/photos/0/3c59c578ebf839c7c0a2d53d12d63b59.jpg'),
(33, 0, '../images/photos/0/11c0eb4872505822c2d55317a6a4d63f.jpg'),
(34, 0, '../images/photos/0/8f8ff607c6a474d3c66f15bab6f32067.jpg'),
(35, 0, '../images/photos/0/54e3418deee0cf902140d7803ff708f2.jpg'),
(36, 0, '../images/photos/0/8ef43d4ffbe6cc29200a319965bed31f.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `idRelation` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la relation',
  `idCompteSource` int(10) NOT NULL COMMENT 'Identifiant du compte source de la relation',
  `idCompteDestinataire` int(10) NOT NULL COMMENT 'Identifiant du compte destinataire de la relation',
  `idTypeRelation` int(10) NOT NULL COMMENT 'Identifiant du type de la relation',
  PRIMARY KEY (`idRelation`),
  KEY `idCompteSource` (`idCompteSource`),
  KEY `idCompteDestinataire` (`idCompteDestinataire`),
  KEY `idTypeRelation` (`idTypeRelation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `relation`
--

INSERT INTO `relation` (`idRelation`, `idCompteSource`, `idCompteDestinataire`, `idTypeRelation`) VALUES
(3, 0, 45, 2),
(5, 0, 45, 0),
(6, 0, 45, 3),
(7, 0, 42, 2),
(8, 0, 42, 1),
(9, 42, 0, 1),
(10, 0, 43, 0),
(11, 0, 44, 1),
(12, 44, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_competence`
--

CREATE TABLE IF NOT EXISTS `type_competence` (
  `idTypeCompetence` int(10) NOT NULL COMMENT 'Identifiant du type de compétence du compte',
  `nomTypeCompetence` char(30) NOT NULL COMMENT 'Nom du type de compétence du compte',
  PRIMARY KEY (`idTypeCompetence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_competence`
--

INSERT INTO `type_competence` (`idTypeCompetence`, `nomTypeCompetence`) VALUES
(0, 'Access'),
(1, 'Ajax'),
(2, 'ASM'),
(3, 'C'),
(4, 'CSS'),
(5, 'HTML'),
(6, 'Java'),
(7, 'LaTeX'),
(8, 'Linux'),
(9, 'OCaml'),
(10, 'Merise'),
(11, 'PHP'),
(12, 'PL/SQL'),
(13, 'SQL'),
(14, 'UML'),
(15, 'Visual Basic'),
(16, 'Reseaux'),
(17, 'Shell'),
(18, 'Connaissance des materiaux'),
(19, 'Gestion des organisations'),
(20, 'Economie'),
(21, 'Creation d''entreprise'),
(22, 'Mercatique'),
(23, 'Droit');

-- --------------------------------------------------------

--
-- Structure de la table `type_evenement`
--

CREATE TABLE IF NOT EXISTS `type_evenement` (
  `idTypeEvenement` int(10) NOT NULL,
  `nomTypeEvenement` char(50) NOT NULL,
  PRIMARY KEY (`idTypeEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_evenement`
--

INSERT INTO `type_evenement` (`idTypeEvenement`, `nomTypeEvenement`) VALUES
(0, 'Inscription'),
(1, 'Ajout ou modification de paramètres'),
(2, 'Ajout d''une ou plusieurs relations'),
(3, 'Ajout ou suppression d''une photographie');

-- --------------------------------------------------------

--
-- Structure de la table `type_relation`
--

CREATE TABLE IF NOT EXISTS `type_relation` (
  `idTypeRelation` int(10) NOT NULL COMMENT 'Identifiant du type de relation',
  `nomTypeRelation` char(30) NOT NULL COMMENT 'Nom du type de relation',
  PRIMARY KEY (`idTypeRelation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_relation`
--

INSERT INTO `type_relation` (`idTypeRelation`, `nomTypeRelation`) VALUES
(0, 'Je le connais'),
(1, 'Je travaille avec'),
(2, 'Je suis ami(e) avec'),
(3, 'Je flashe sur');

-- --------------------------------------------------------

--
-- Structure de la table `type_visibilite`
--

CREATE TABLE IF NOT EXISTS `type_visibilite` (
  `idTypeVisibilite` int(10) NOT NULL COMMENT 'Identifiant du type de visibilité',
  `nomTypeVisibilite` char(20) NOT NULL COMMENT 'Nom du type de visibilité',
  PRIMARY KEY (`idTypeVisibilite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_visibilite`
--

INSERT INTO `type_visibilite` (`idTypeVisibilite`, `nomTypeVisibilite`) VALUES
(0, 'Public'),
(1, 'Amis'),
(2, 'Prive');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `competence_ibfk_2` FOREIGN KEY (`idTypeCompetence`) REFERENCES `type_competence` (`idTypeCompetence`),
  ADD CONSTRAINT `competence_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`idCompte`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_5` FOREIGN KEY (`idVisibiliteSemestre`) REFERENCES `type_visibilite` (`idTypeVisibilite`),
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idVisibiliteProgramme`) REFERENCES `type_visibilite` (`idTypeVisibilite`),
  ADD CONSTRAINT `compte_ibfk_3` FOREIGN KEY (`idVisibiliteCompetences`) REFERENCES `type_visibilite` (`idTypeVisibilite`),
  ADD CONSTRAINT `compte_ibfk_4` FOREIGN KEY (`idVisibilitePhotos`) REFERENCES `type_visibilite` (`idTypeVisibilite`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_4` FOREIGN KEY (`idTypeEvenement`) REFERENCES `type_evenement` (`idTypeEvenement`),
  ADD CONSTRAINT `evenement_ibfk_3` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`idCompte`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`idCompte`);

--
-- Contraintes pour la table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_3` FOREIGN KEY (`idTypeRelation`) REFERENCES `type_relation` (`idTypeRelation`),
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`idCompteSource`) REFERENCES `compte` (`idCompte`),
  ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`idCompteDestinataire`) REFERENCES `compte` (`idCompte`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
