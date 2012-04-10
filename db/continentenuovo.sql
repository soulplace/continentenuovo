-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 10 apr, 2012 at 04:11 PM
-- Versione MySQL: 5.1.49
-- Versione PHP: 5.3.3-7+squeeze8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `continentenuovo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bio`
--

CREATE TABLE IF NOT EXISTS `bio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` mediumint(8) NOT NULL,
  `bio` text,
  `message` text,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT=' l''email e il nome vengono presi dal db del forum' AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `bio`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` mediumint(8) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` varchar(1) NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `comments`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role` int(2) NOT NULL DEFAULT '3',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `role`
--

INSERT INTO `role` (`role`, `description`) VALUES
(0, 'admin'),
(1, 'moderatore'),
(2, 'concorrente'),
(3, 'utente semplice');

-- --------------------------------------------------------

--
-- Struttura della tabella `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` mediumint(8) DEFAULT NULL,
  `song` varchar(255) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editable` varchar(1) NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `songs`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_phpbb` mediumint(8) NOT NULL DEFAULT '0',
  `role` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_phpbb`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_voter` mediumint(8) DEFAULT NULL,
  `id_voted` int(11) DEFAULT NULL COMMENT 'id della tabella songs',
  `ip` varchar(16) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `votes`
--

