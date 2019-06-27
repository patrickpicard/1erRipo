-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 juin 2019 à 13:22
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcategory`, `description`) VALUES
(1, 'Médical'),
(2, 'Professionnel'),
(3, 'Personnel');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idgroup`, `description`) VALUES
(1, 'Groupe 1'),
(2, 'Groupe 2'),
(3, 'Groupe 3');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `idtask` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  PRIMARY KEY (`idtask`),
  KEY `fk_task_category1` (`idcategory`),
  KEY `fk_task_group1` (`idgroup`),
  KEY `fk_task_user1` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`idtask`, `description`, `idcategory`, `date`, `comment`, `iduser`, `idgroup`) VALUES
(0, 'RDV dentiste', 1, '2019-06-19', 'ça va faire mal ', 12, 1),
(1, 'Anniversaire Nicolas', 3, '2019-05-05', 'Acheter un cadeau', 8, 1),
(2, 'Réunion d\'information', 2, '2019-07-18', 'Prendre un CV', 14, 2),
(3, 'Aller à la plage', 3, '2019-06-22', 'Attention aux coups de soleil', 8, 1),
(4, 'Aller faire les courses', 3, '2019-06-22', 'acheter du chocolat et des glaces', 8, 1),
(5, 'Repas chez Emilie', 3, '2019-06-27', '', 8, 3),
(6, 'Soirée bowling avec Mario et Carl', 3, '2019-06-24', '', 14, 2),
(7, 'Véto pour Roméo', 1, '2019-06-02', 'Rendez-vous à 14h30', 12, 1),
(8, 'Vacances xD', 3, '2019-08-02', 'C\'est les vacances !!!', 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1' COMMENT 'level 1 = user, level 2 = admin',
  `idgroup` int(11) NOT NULL DEFAULT '1' COMMENT '1 = n''appartient à aucun groupe',
  PRIMARY KEY (`iduser`),
  KEY `fk_user_group` (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `name`, `firstname`, `pseudo`, `password`, `level`, `idgroup`) VALUES
(8, 'Stock', 'Carl', 'Carlinou13', '5a105e8b9d40e1329780d62ea2265d8a', 1, 1),
(12, 'Duchemin', 'Luc', 'LucDuc59', '5097bcd4a76a4dffbe1ced838a421cbb', 1, 2),
(14, 'Ka', 'Lucas', 'Kalu', 'e10adc3949ba59abbe56e057f20f883e', 2, 1),
(15, 'Nette', 'Mario', 'Mario95', '123456', 1, 1),
(16, 'Bic', 'Louis', 'BicLou', '123456', 1, 1),
(17, 'Po', 'Emilie', 'Emy25', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(18, 'Jacques', 'Jean', 'JJ25', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(19, 'Chou', 'Misha', 'Michou75', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_category1` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_task_group1` FOREIGN KEY (`idgroup`) REFERENCES `groupe` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_task_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_group` FOREIGN KEY (`idgroup`) REFERENCES `groupe` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
