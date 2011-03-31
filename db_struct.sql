-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2011 a las 01:35:48
-- Versión del servidor: 5.1.49
-- Versión de PHP: 5.3.3-1ubuntu9.3

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `vdl_config`
--

INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'TITLE', 'Vidali Social Network'),
(2, 'DESCR', 'Pre-Alpha: 0.4.95-310311'),
(3, 'LANG', 'ES'),
(4, 'ADMIN', 'demo'),
(5, 'BASE_DIR', 'http://127.0.1/vidali'),
(6, 'ADMIN_DIR', 'http://127.0.1/vidali/vdl-admin'),
(7, 'THEME', 'default'),
(8, 'REGMODE', 'closed');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `vdl_notes`
--

INSERT INTO `vdl_notes` (`id`, `title`, `resume`, `main_img`, `content`, `author`, `date`) VALUES
(1, 'Probando estabilidad!', 'Probando la estabilidad en las entradas del blog', '', 'Si se crean esta entrada bien no hay problema!', 0, '2010-11-06 00:15:03'),
(2, 'Funciona!', 'Sistema de Blog funcionando de manera correcta!', '', 'AVISO: Aun queda mucho por pulir, pero el sistema se encuentra en buen estado! y aun queda por implementar el sistema multimedia en el blog!', 0, '2010-11-06 00:16:16');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `vdl_notes_com`
--

INSERT INTO `vdl_notes_com` (`id`, `id_post`, `user`, `email`, `adress`, `comment`, `date`) VALUES
(1, 0, 'troll', 'hola@mail.com', 'http://www.google.es', 'comentario de prueba', '2011-02-09 17:38:15');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcar la base de datos para la tabla `vdl_updates`
--

INSERT INTO `vdl_updates` (`id`, `user_id`, `upd_type`, `upd_title`, `upd_msg`, `date`) VALUES
(1, 'demo', 0, '', 'Publicando mi primer estado!', '2010-10-13 22:14:53'),
(2, 'demo', 0, '', 'Parece que esto ya funciona bien :D, dentro de poco pondre otras cosas!', '2010-10-13 23:28:16'),
(3, 'demo', 0, '', 'actualizaré para que salga un pequeño titulo o algo :P', '2010-10-13 23:28:35'),
(4, 'demo', 0, '', 'Si... la red seguira en estado pre-alpha hasta que no prepare el tema de seguridad y amigos', '2010-10-13 23:29:12'),
(5, 'demo', 0, '', 'De momento tengo que evitar que se repitan los estados al paginar...', '2010-10-13 23:30:22'),
(6, 'demo', 0, '', 'pasando a la segunda parte del algoritmo de actualizaciones...', '2010-10-13 23:31:32'),
(7, 'demo', 0, '', 'Ahora si funciona como dios manda! :D', '2010-10-14 00:21:26'),
(8, 'demo', 0, '', 'creando el sistema de blog!', '2010-11-03 20:59:28'),
(9, 'demo', 0, '', 'probando cambio basico', '2010-11-03 21:36:59'),
(10, 'demo', 0, '', 'mostrando ultimo cambio', '2010-11-03 21:42:55'),
(11, 'demo', 0, '', 'Mejorado el blog!, ya se puede traducir!, dentro de poco cambiamos a la siguiente fase...', '2010-11-04 18:17:12'),
(12, 'demo', 0, '', 'actualizando estado', '2010-11-05 16:48:58'),
(13, 'USERID', 0, '', 'probando cambios...', '2011-02-06 20:07:25'),
(14, 'USERID', 0, '', 'Ahora mejorando la encapsulacion!!!', '2011-02-06 20:07:49'),
(15, 'USERID', 0, '', 'probando tildes y acentos Ã¡ Ã© Ã­ Ã³ Ãº Ã± Ã‘', '2011-02-07 00:45:05'),
(16, 'USERID', 0, '', 'Ultimando cambios para la version Alpha!, este serÃ¡ el diseÃ±o definitivo, falta mejorar la base de datos, y el sistema de archivos...', '2011-02-26 10:58:33'),
(17, 'USERID', 0, '', 'NO LimitarÃ© a 140 caracteres las actualizaciones!', '2011-02-26 10:59:10');

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
  `id_net` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `vdl_users`
--

INSERT INTO `vdl_users` (`id`, `user_id`, `passwd`, `nickname`, `name`, `location`, `genre`, `bday`, `age`, `email`, `website`, `bio`, `group`, `id_net`) VALUES
(1, 'demo', '2c722afdb9172a9a703362d8c1579b77c354d48e', 'demo', 'Cristo G&oacute;mez', 'Tenerife', 'male', '2010-09-15', 0, 'demo@vidali.es', 'www.vidali.es', 'Este usuario es una cuenta para mostrar el uso de Vidali.', 0, 0);

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

