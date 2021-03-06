-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Octobre 2017 à 17:50
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `share-app`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id_events` int(11) NOT NULL,
  `name_events` varchar(255) DEFAULT NULL,
  `date_events` datetime DEFAULT CURRENT_TIMESTAMP,
  `cost_event` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id_events`, `name_events`, `date_events`, `cost_event`) VALUES
(1, 'test event', NULL, 0),
(2, 'test event', NULL, 0),
(3, 'etette', '2017-10-02 15:59:57', 50.2);

-- --------------------------------------------------------

--
-- Structure de la table `events_user`
--

CREATE TABLE IF NOT EXISTS `events_user` (
  `id_events` int(11) NOT NULL COMMENT 'Primary Key: id_events for event.',
  `id_user` int(11) NOT NULL COMMENT 'Primary Key: id_user for user.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id_groupe` int(11) NOT NULL,
  `name_groupe` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `name_groupe`) VALUES
(1, 'test groupe'),
(2, 'grope 2'),
(3, 'test grupe 1'),
(4, 'test grupe 1'),
(5, 'test grupe 1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `firstname_user` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `firstname_user`, `username_user`, `password_user`, `id_groupe`) VALUES
(18, 'test', 'toto', 'toto_test', '$2y$10$4SZAxrO/oVbb/AFVc.2aR.fujrchE2Untt7T1wH4z8QIq40zC7P5C', 0),
(19, 'test', 'toto', 'toto_test', '$2y$10$XOrLSbz2f/8nTaVxJhgCK.elKlAtKmOHCB7BbSalufmvnyQO1tco.', 0),
(20, 'test', 'toto', 'toto_test', '$2y$10$cTssC6kWxW/H/zfodL/mBOCBaYm2Qg13gnZClFxA8dTfxlSwoW8ge', 0),
(21, 'test', 'toto', 'toto_test', '$2y$10$k/rih2cpoIwum2eaP9R9N.hUdjaxTHf6FfycCzvhZkmXUwcmtd9U2', 10),
(22, 'test', 'toto', 'toto_test', '$2y$10$JwP0VftK6Jj7PzHP9fhY1.Zr5jlwW09HMVQjuVHzhy4WleOsWVp/O', 1),
(23, 'test', 'totofsfs', 'totofsfs_test', '$2y$10$Z8Tk6t6JGBqDh1tp55c4g.qTgwQODT2130uanXc1Hso.wzCUDi/1e', 1),
(24, 'test', 'totofsfs', 'totofsfs_test', '$2y$10$jsAc9ZqCA5xLoTu7N841cOgGj2BuasjStvzdqsfY4F6mtga29WcJy', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_events`);

--
-- Index pour la table `events_user`
--
ALTER TABLE `events_user`
  ADD PRIMARY KEY (`id_events`,`id_user`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
