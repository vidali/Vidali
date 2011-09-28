-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-09-2011 a las 18:05:38
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vidali`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_config`
--

CREATE TABLE IF NOT EXISTS `vdl_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `config_value` varchar(255) COLLATE utf8_bin NOT NULL,
  KEY `config_id` (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `vdl_config`
--

INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'LANG', 'ES'),
(2, 'THEME', 'default'),
(3, 'TITLE', 'Vidali - Red Social Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_friends`
--

CREATE TABLE IF NOT EXISTS `vdl_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_main` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_main` (`id_main`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_net`
--

CREATE TABLE IF NOT EXISTS `vdl_net` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `net_name` varchar(255) NOT NULL,
  `net_sdesc` varchar(30) NOT NULL,
  `net_desc` varchar(255) NOT NULL,
  `net_admin` int(3) NOT NULL,
  `net_privacy` int(11) NOT NULL DEFAULT '0',
  `net_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `vdl_net`
--

INSERT INTO `vdl_net` (`id`, `net_name`, `net_sdesc`, `net_desc`, `net_admin`, `net_privacy`, `net_img`) VALUES
(1, 'Vidali', 'Comunidad Vidali', 'Comunidad donde puedes comunicarte con otros usuarios del servicio.', 1, 0, 'prof_def');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_notes`
--

CREATE TABLE IF NOT EXISTS `vdl_notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `resume` varchar(255) COLLATE utf8_bin NOT NULL,
  `main_img` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `author` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_notes_com`
--

CREATE TABLE IF NOT EXISTS `vdl_notes_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `adress` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_notify`
--

CREATE TABLE IF NOT EXISTS `vdl_notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_notify_rel`
--

CREATE TABLE IF NOT EXISTS `vdl_notify_rel` (
  `id_notify` int(11) NOT NULL,
  `id_receptor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_updates`
--

CREATE TABLE IF NOT EXISTS `vdl_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `upd_type` int(3) NOT NULL,
  `upd_title` varchar(255) NOT NULL,
  `upd_msg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_users`
--

CREATE TABLE IF NOT EXISTS `vdl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `location` varchar(255) NOT NULL,
  `genre` enum('male','female') NOT NULL,
  `bday` date NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `group` int(11) NOT NULL,
  `img_prof` varchar(255) NOT NULL,
  `prof_visits` int(11) NOT NULL,
  `prof_friends` int(11) NOT NULL,
  `prof_nets` int(11) NOT NULL,
  `log_keytime` int(6) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_user_net`
--

CREATE TABLE IF NOT EXISTS `vdl_user_net` (
  `id_user` int(11) NOT NULL,
  `id_net` int(11) NOT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vdl_user_net`
--

INSERT INTO `vdl_user_net` (`id_user`, `id_net`) VALUES
(1, 1);

-- --------------------------------------------------------
