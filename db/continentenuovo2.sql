-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: sql.downloaddeimieisogni.it
-- Generato il: 04 set, 2012 at 07:43 AM
-- Versione MySQL: 5.1.39
-- Versione PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `downloaddeimieisogniit`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bio`
--

CREATE TABLE IF NOT EXISTS `bio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` mediumint(8) NOT NULL,
  `nome_band` varchar(255) DEFAULT NULL,
  `bio` text,
  `message` text,
  `video` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `upload_timestamp` timestamp NULL DEFAULT NULL COMMENT 'atttenzione: inserire solo il time di upload,non di modifica',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT=' l''email e il nome vengono presi dal db del forum' AUTO_INCREMENT=12 ;

--
-- Dump dei dati per la tabella `bio`
--

INSERT INTO `bio` (`id`, `id_user`, `nome_band`, `bio`, `message`, `video`, `image`, `upload_timestamp`) VALUES
(1, 1, 'Band test', 'bio test', 'message test', 'http://vimeo.com/38514156', '', '2012-05-23 14:46:14'),
(2, 2, 'band test 2', '&lt;p&gt;\r\n	bio test 2 modificata test inserimento multiplo&lt;/p&gt;\r\n', '&lt;p&gt;\r\n	message test2&lt;/p&gt;\r\n', '    http://www.youtube.com/watch?v=VznlDlNPw4Q&feature=g-vrec', NULL, '2012-05-23 14:49:39'),
(3, 3, 'band test 3', 'bio test 3', 'message test 3', NULL, NULL, '2012-05-23 14:49:39'),
(8, 4, 'test 4', 'bio 4', 'message tes 4', NULL, NULL, '2012-05-23 14:49:02'),
(9, 5, 'band 5', 'bio 5 test', 'test message 5', NULL, NULL, '2012-05-23 14:49:02'),
(10, 53, 'band test da registrazione', '&lt;p&gt;\r\n	siamo troppo fighi 1111!!!11onenee&lt;/p&gt;\r\n', '&lt;p&gt;\r\n	buu la pirateria buuu!!&lt;/p&gt;\r\n', '', '53.jpg', NULL),
(11, 55, 'fabio''s band', '\r\n	&nbsp;\r\n\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem elit, rhoncus semper vulputate nec, cursus ac purus. Aenean mi sem, luctus nec laoreet eu, mollis ac est. Sed consectetur orci convallis ipsum volutpat molestie. Nullam enim augue, vestibulum a gravida facilisis, vehicula ac augue. Curabitur auctor euismod tempor. Cras hendrerit risus vitae arcu eleifend pellentesque et eget magna. In tincidunt massa id leo placerat a eleifend odio bibendum. Donec id mattis felis. Nulla facilisi. Nam auctor lacus quis dolor rhoncus eu gravida elit feugiat. Mauris iaculis bibendum orci, eget molestie enim viverra eu.\r\n\r\n	&nbsp;\r\n', '\r\n	&nbsp;\r\n\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sem elit, rhoncus semper vulputate nec, cursus ac purus. Aenean mi sem, luctus nec laoreet eu, mollis ac est. Sed consectetur orci convallis ipsum volutpat molestie. Nullam enim augue, vestibulum a gravida facilisis, vehicula ac augue. Curabitur auctor euismod tempor. Cras hendrerit risus vitae arcu eleifend pellentesque et eget magna. In tincidunt massa id leo placerat a eleifend odio bibendum. Donec id mattis felis. Nulla facilisi. Nam auctor lacus quis dolor rhoncus eu gravida elit feugiat. Mauris iaculis bibendum orci, eget molestie enim viverra eu.\r\n\r\n	&nbsp;\r\n', ' http://www.youtube.com/watch?v=chysEoANK7c', '55.jpg', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` mediumint(8) NOT NULL,
  `id_commented` mediumint(8) DEFAULT NULL,
  `message` text NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` varchar(1) NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_commented`, `message`, `ip`, `time`, `approved`) VALUES
(1, 2, 1, 'ASFSDG', '192.168.0.32', '2012-06-27 09:05:15', 'n'),
(2, 2, 1, 'grwdfasd', '192.168.0.32', '2012-06-27 09:14:48', 'n'),
(3, 2, 1, 'miaoajsdpaklf\n', '192.168.0.32', '2012-06-27 09:25:42', 'n'),
(4, 2, 1, 'fasa', '192.168.0.32', '2012-06-27 09:56:43', 'n'),
(5, 2, 1, 'asfafas', '192.168.0.32', '2012-06-27 10:05:15', 'n'),
(6, 2, 1, 'wdasf', '192.168.0.32', '2012-06-27 10:06:52', 'n'),
(7, 2, 1, 'test', '192.168.0.32', '2012-06-27 10:06:59', 'y'),
(8, 2, 1, 'adf', '192.168.0.32', '2012-06-27 10:07:57', 'y'),
(9, 2, 1, 'prova aggiunta', '192.168.0.32', '2012-06-27 10:14:05', 'y'),
(10, 2, 1, 'test senza ol', '192.168.0.32', '2012-06-27 10:17:40', 'y'),
(11, 53, 1, 'aggiunta commento test', '192.168.0.19', '2012-06-27 13:10:28', 'n'),
(12, 53, 1, 'test con refresh', '192.168.0.19', '2012-06-27 13:11:29', 'y'),
(13, 53, 3, 'altra pagina', '192.168.0.19', '2012-06-27 13:11:46', 'y'),
(14, 55, 1, 'test', '94.82.150.70', '2012-08-30 03:59:47', 'n'),
(15, 55, 1, 'test', '94.82.150.70', '2012-08-30 05:01:28', 'n'),
(16, 55, 1, 'proviamo', '94.82.150.70', '2012-08-30 05:24:15', 'y');

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role` int(2) NOT NULL DEFAULT '3',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `title` varchar(255) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editable` varchar(1) NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dump dei dati per la tabella `songs`
--

INSERT INTO `songs` (`id`, `id_user`, `song`, `title`, `upload_time`, `editable`) VALUES
(1, 1, 'someday.mp3', 'canzone test', '2012-04-18 17:28:32', 'y'),
(0, 3, 'someday.mp3', 'canzone test 3', '2012-04-18 17:28:32', 'y'),
(7, 2, '2.mp3', 'canzone test 2', '2012-06-18 16:04:51', 'Y'),
(4, 4, 'someday.mp3', 'canzone test 4', '2012-04-18 17:28:32', 'y'),
(5, 5, 'someday.mp3', 'canzone test 5', '2012-04-18 17:28:32', 'y'),
(8, 53, '53.mp3', 'bella proprio cioè', '2012-06-20 14:23:55', 'Y'),
(14, 55, '55.mp3', 'skyrim', '2012-08-31 03:31:49', 'Y');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_phpbb` mediumint(8) NOT NULL DEFAULT '0',
  `role` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_phpbb`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_phpbb`, `role`) VALUES
(5, 2),
(4, 2),
(3, 2),
(1, 0),
(2, 0),
(55, 0),
(53, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `votes`
--

INSERT INTO `votes` (`id`, `id_voter`, `id_voted`, `ip`, `time`) VALUES
(1, 5, 1, '192.168.0.31', '2012-05-23 14:45:17'),
(2, 4, 1, '192.168.0.31', '2012-05-23 14:56:34'),
(3, 7, 1, '192.168.0.31', '2012-05-23 14:56:34');

