-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2013 a las 15:05:37
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vidali1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_comment`
--

CREATE TABLE IF NOT EXISTS `vdl_comment` (
  `id_user` int(11) NOT NULL,
  `id_msg_ref` int(11) NOT NULL,
  `reply` varchar(140) COLLATE utf8_bin NOT NULL,
  `date_reply` datetime NOT NULL,
  PRIMARY KEY (`id_user`,`id_msg_ref`),
  KEY `fk_vdl_comment_vdl_msg1` (`id_msg_ref`),
  KEY `fk_vdl_comment_vdl_user1` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_config`
--

CREATE TABLE IF NOT EXISTS `vdl_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `config_value` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `vdl_config`
--

INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES
(9, 'STORAGE', 'SERVER'),
(6, 'PRIVACY', 'high'),
(5, 'REGISTER', 'public'),
(4, 'ADMIN', '1'),
(3, 'TITLE', 'Vidali - Red Social Libre'),
(2, 'THEME', 'Default'),
(1, 'LANG', 'ES'),
(10, 'BASEDIR', 'http://127.0.0.1/Vidali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_conver`
--

CREATE TABLE IF NOT EXISTS `vdl_conver` (
  `conver_ref` int(11) NOT NULL,
  KEY `fk_vdl_msg_conver_vdl_conver1` (`conver_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vdl_conver`
--

INSERT INTO `vdl_conver` (`conver_ref`) VALUES
(0),
(0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_event`
--

CREATE TABLE IF NOT EXISTS `vdl_event` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) NOT NULL,
  `event_tittle` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_tittle_UNIQUE` (`event_tittle`),
  KEY `fk_vdl_event_vdl_msg1` (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_file`
--

CREATE TABLE IF NOT EXISTS `vdl_file` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `type` set('image','audio','video','other') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vdl_file_vdl_msg1` (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_friend_of`
--

CREATE TABLE IF NOT EXISTS `vdl_friend_of` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user1`,`user2`),
  KEY `fk_vdl_friend_of_vdl_user1` (`user1`),
  KEY `fk_vdl_friend_of_vdl_user2` (`user2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vdl_friend_of`
--

INSERT INTO `vdl_friend_of` (`user1`, `user2`, `status`) VALUES
(1, 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_group`
--

CREATE TABLE IF NOT EXISTS `vdl_group` (
  `group_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `avatar_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `n_members` int(11) NOT NULL DEFAULT '0',
  `is_private` binary(1) NOT NULL,
  `privacy_level` set('open','close') COLLATE utf8_bin NOT NULL,
  `allow_ext_com` binary(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vdl_group`
--

INSERT INTO `vdl_group` (`group_name`, `avatar_id`, `n_members`, `is_private`, `privacy_level`, `allow_ext_com`) VALUES
('Vidali', 'prof_def', 0, '\0', 'open', '1'),
('test', 'prof_def', 0, '#', 'close', '#');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_msg`
--

CREATE TABLE IF NOT EXISTS `vdl_msg` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_group` varchar(45) COLLATE utf8_bin NOT NULL,
  `date_published` datetime NOT NULL,
  `text` varchar(140) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_msg`,`id_user`,`id_group`,`date_published`),
  KEY `fk_vdl_msg_vdl_user1_idx` (`id_user`),
  KEY `fk_vdl_msg_vdl_group1_idx` (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `vdl_msg`
--

INSERT INTO `vdl_msg` (`id_msg`, `id_user`, `id_group`, `date_published`, `text`) VALUES
(1, 1, 'Vidali', '2012-12-11 15:24:37', 'hola'),
(2, 2, 'Vidali', '2013-03-08 15:31:17', 'Testing'),
(3, 1, 'Vidali', '2013-03-10 20:55:21', 'asdf'),
(4, 1, 'Vidali', '2013-03-10 20:55:37', 'asdf'),
(5, 1, 'Vidali', '2013-03-10 20:55:48', 'Holaa!!!'),
(6, 1, 'Vidali', '2013-03-10 21:00:47', '@test y #Hash'),
(7, 1, 'Vidali', '2013-03-10 21:05:57', 'Hola!'),
(8, 1, 'Vidali', '2013-03-10 21:08:22', 'asd'),
(9, 1, 'Vidali', '2013-03-10 21:08:30', 'asd'),
(10, 1, 'Vidali', '2013-03-10 21:14:36', 'ssss'),
(11, 1, 'Vidali', '2013-03-10 21:15:50', 'assss'),
(12, 1, 'Vidali', '2013-03-10 21:16:15', 'sdd'),
(13, 1, 'Vidali', '2013-03-10 21:16:46', 'asddd'),
(14, 1, 'Vidali', '2013-03-10 21:17:00', 'ssss'),
(15, 1, 'Vidali', '2013-03-10 21:18:36', 'sd'),
(16, 1, 'Vidali', '2013-03-10 21:22:23', ':p'),
(17, 1, 'Vidali', '2013-03-10 21:22:51', '^^'),
(18, 1, 'Vidali', '2013-03-10 21:24:02', 'limpiando'),
(19, 1, 'Vidali', '2013-03-10 21:27:20', 'aaass'),
(20, 1, 'Vidali', '2013-03-10 21:28:30', 'asddvbn'),
(21, 1, 'Vidali', '2013-03-12 22:17:13', 'menu rulando!'),
(22, 1, 'Vidali', '2013-03-12 22:17:35', 'asd'),
(23, 1, 'Vidali', '2013-03-12 22:18:36', 'sdf'),
(24, 1, 'Vidali', '2013-03-12 22:19:51', 'asd'),
(25, 1, 'Vidali', '2013-03-12 22:20:14', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_msg_conver`
--

CREATE TABLE IF NOT EXISTS `vdl_msg_conver` (
  `conver_ref_id` int(11) NOT NULL,
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `pm_msg` text NOT NULL,
  `date_send` datetime NOT NULL,
  PRIMARY KEY (`id_msg`,`conver_ref_id`,`date_send`),
  UNIQUE KEY `date_send_UNIQUE` (`date_send`),
  KEY `fk_vdl_msg_conver_vdl_user1_idx` (`user_id`),
  KEY `fk_vdl_msg_conver_vdl_conver1` (`conver_ref_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vdl_msg_conver`
--

INSERT INTO `vdl_msg_conver` (`conver_ref_id`, `id_msg`, `user_id`, `pm_msg`, `date_send`) VALUES
(0, 1, 1, 'asfgea', '2012-12-13 07:13:11'),
(0, 2, 2, 'asfweagw', '2012-12-29 09:24:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_notify`
--

CREATE TABLE IF NOT EXISTS `vdl_notify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_sender` int(11) NOT NULL,
  `msg_related` int(11) DEFAULT NULL,
  `type` int(10) unsigned NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_sender` (`user_sender`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_place`
--

CREATE TABLE IF NOT EXISTS `vdl_place` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) NOT NULL,
  `name_place` varchar(75) COLLATE utf8_bin NOT NULL,
  `location_coord` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_place_UNIQUE` (`name_place`),
  UNIQUE KEY `location_coord_UNIQUE` (`location_coord`),
  KEY `fk_vdl_place_vdl_msg1` (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_trending`
--

CREATE TABLE IF NOT EXISTS `vdl_trending` (
  `topic` varchar(140) COLLATE utf8_bin NOT NULL,
  `count` int(10) NOT NULL,
  UNIQUE KEY `topic` (`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vdl_trending`
--

INSERT INTO `vdl_trending` (`topic`, `count`) VALUES
('Hash', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_user`
--

CREATE TABLE IF NOT EXISTS `vdl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `age` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `avatar_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `n_views` int(10) unsigned DEFAULT '0',
  `n_contacts` int(10) unsigned DEFAULT '0',
  `n_groups` int(10) unsigned DEFAULT '0',
  `session_key` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `session_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `privacy_level` set('low','medium','high') COLLATE utf8_unicode_ci NOT NULL,
  `mail_notify` binary(1) NOT NULL,
  `color_theme` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_UNIQUE` (`nick`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vdl_user`
--

INSERT INTO `vdl_user` (`id`, `email`, `nick`, `password`, `name`, `birthdate`, `age`, `sex`, `location`, `website`, `description`, `avatar_id`, `n_views`, `n_contacts`, `n_groups`, `session_key`, `session_id`, `privacy_level`, `mail_notify`, `color_theme`) VALUES
(1, 'cristo-mc@hotmail.com', 'cristomc', 'f42e022746368891b10d754c1bd9bcd9523531b1', 'Cristo', '1990-09-26', '22', 'male', 'Tenerife', ' ', 'Hola!', 'prof_def', 0, 0, 0, '0', 'cfatrd9nm44nu9fl1jktte5el1', 'low', '\0', 'white'),
(2, 'test@test.com', 'test', '4028a0e356acc947fcd2bfbf00cef11e128d484a', 'test', '1953-12-16', '58', 'female', 'test', ' ', 'test', 'prof_def', 0, 0, 0, '0', '0', 'low', '\0', 'white');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_u_belong`
--

CREATE TABLE IF NOT EXISTS `vdl_u_belong` (
  `user_id` int(11) NOT NULL,
  `group_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `is_admin` binary(1) NOT NULL,
  KEY `fk_vdl_u_belong_vdl_user1` (`user_id`),
  KEY `fk_vdl_u_belong_vdl_group1` (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vdl_u_belong`
--

INSERT INTO `vdl_u_belong` (`user_id`, `group_name`, `is_admin`) VALUES
(1, 'Vidali', '#'),
(2, 'Vidali', '\0'),
(2, 'test', '\0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vdl_u_conver`
--

CREATE TABLE IF NOT EXISTS `vdl_u_conver` (
  `vdl_user_id` int(11) NOT NULL,
  `vdl_msg_conver_conver_ref` int(11) NOT NULL,
  PRIMARY KEY (`vdl_user_id`,`vdl_msg_conver_conver_ref`),
  KEY `fk_vdl_user_has_vdl_msg_conver_vdl_msg_conver1_idx` (`vdl_msg_conver_conver_ref`),
  KEY `fk_vdl_user_has_vdl_msg_conver_vdl_user1_idx` (`vdl_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vdl_u_conver`
--

INSERT INTO `vdl_u_conver` (`vdl_user_id`, `vdl_msg_conver_conver_ref`) VALUES
(1, 0),
(2, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vdl_comment`
--
ALTER TABLE `vdl_comment`
  ADD CONSTRAINT `fk_vdl_comment_vdl_msg1` FOREIGN KEY (`id_msg_ref`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vdl_comment_vdl_user1` FOREIGN KEY (`id_user`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vdl_event`
--
ALTER TABLE `vdl_event`
  ADD CONSTRAINT `fk_vdl_event_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vdl_file`
--
ALTER TABLE `vdl_file`
  ADD CONSTRAINT `fk_vdl_file_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vdl_friend_of`
--
ALTER TABLE `vdl_friend_of`
  ADD CONSTRAINT `fk_vdl_friend_of_vdl_user1` FOREIGN KEY (`user1`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdl_friend_of_vdl_user2` FOREIGN KEY (`user2`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vdl_msg`
--
ALTER TABLE `vdl_msg`
  ADD CONSTRAINT `fk_vdl_msg_vdl_group1` FOREIGN KEY (`id_group`) REFERENCES `vdl_group` (`group_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdl_msg_vdl_user1` FOREIGN KEY (`id_user`) REFERENCES `vdl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vdl_msg_conver`
--
ALTER TABLE `vdl_msg_conver`
  ADD CONSTRAINT `fk_vdl_msg_conver_vdl_conver1` FOREIGN KEY (`conver_ref_id`) REFERENCES `vdl_conver` (`conver_ref`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdl_msg_conver_vdl_user1` FOREIGN KEY (`user_id`) REFERENCES `vdl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vdl_place`
--
ALTER TABLE `vdl_place`
  ADD CONSTRAINT `fk_vdl_place_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vdl_u_belong`
--
ALTER TABLE `vdl_u_belong`
  ADD CONSTRAINT `fk_vdl_u_belong_vdl_user1` FOREIGN KEY (`user_id`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vdl_u_belong_ibfk_1` FOREIGN KEY (`group_name`) REFERENCES `vdl_group` (`group_name`);

--
-- Filtros para la tabla `vdl_u_conver`
--
ALTER TABLE `vdl_u_conver`
  ADD CONSTRAINT `fk_vdl_user_has_vdl_msg_conver_vdl_msg_conver1` FOREIGN KEY (`vdl_msg_conver_conver_ref`) REFERENCES `vdl_conver` (`conver_ref`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vdl_u_conver_ibfk_1` FOREIGN KEY (`vdl_user_id`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
