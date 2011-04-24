-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2011 a las 15:32:35
-- Versión del servidor: 5.5.11
-- Versión de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `vdl_config`
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
  `id_main` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL,
  KEY `id_main` (`id_main`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `vdl_friends`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_net`
--

CREATE TABLE IF NOT EXISTS `vdl_net` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `net_name` varchar(255) NOT NULL,
  `net_desc` varchar(255) NOT NULL,
  `net_admin` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `vdl_net`
--


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

--
-- Volcar la base de datos para la tabla `vdl_notes`
--


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

--
-- Volcar la base de datos para la tabla `vdl_notes_com`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_updates`
--

CREATE TABLE IF NOT EXISTS `vdl_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `upd_type` int(3) NOT NULL,
  `upd_title` varchar(255) NOT NULL,
  `upd_msg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `vdl_updates`
--


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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `vdl_users`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_user_net`
--

CREATE TABLE IF NOT EXISTS `vdl_user_net` (
  `id_user` int(11) NOT NULL,
  `id_net` int(11) NOT NULL,
  PRIMARY KEY (`id_net`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `vdl_user_net`
--

