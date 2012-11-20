/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `vdl_comment` (
  `id_user` int(11) NOT NULL,
  `id_msg_ref` int(11) NOT NULL,
  `reply` varchar(140) COLLATE utf8_bin NOT NULL,
  `date_reply` datetime NOT NULL,
  PRIMARY KEY (`id_user`,`id_msg_ref`),
  KEY `fk_vdl_comment_vdl_msg1` (`id_msg_ref`),
  KEY `fk_vdl_comment_vdl_user1` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `vdl_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `config_value` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY `config_id` (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6;
INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'LANG', 'ES'),
(2, 'THEME', 'default'),
(3, 'TITLE', 'Vidali - Red Social Libre');
CREATE TABLE IF NOT EXISTS `vdl_event` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) NOT NULL,
  `event_tittle` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_tittle_UNIQUE` (`event_tittle`),
  KEY `fk_vdl_event_vdl_msg1` (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `vdl_file` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_msg` int(11) NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `type` set('image','audio','video','other') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vdl_file_vdl_msg1` (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `vdl_friend_of` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user1`,`user2`),
  KEY `fk_vdl_friend_of_vdl_user1` (`user1`),
  KEY `fk_vdl_friend_of_vdl_user2` (`user2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `vdl_group` (
  `group_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `avatar_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `n_members` int(11) NOT NULL DEFAULT '0',
  `is_private` binary(1) NOT NULL,
  `privacy_level` set('open','close') COLLATE utf8_bin NOT NULL,
  `allow_ext_com` binary(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
INSERT INTO `vdl_group` (`group_name`, `avatar_id`, `n_members`, `is_private`, `privacy_level`, `allow_ext_com`) VALUES
('Vidali', 'prof_def', 0, '\0', 'open', '1');
CREATE TABLE IF NOT EXISTS `vdl_msg` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `date_published` datetime NOT NULL,
  `text` varchar(140) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;
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
CREATE TABLE IF NOT EXISTS `vdl_publish` (
  `id_user` int(11) NOT NULL,
  `id_msg` int(11) NOT NULL,
  `id_group` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_msg`,`id_user`,`id_group`),
  KEY `fk_vdl_publish_vdl_user1` (`id_user`),
  KEY `fk_vdl_publish_vdl_group1` (`id_group`),
  KEY `fk_vdl_publish_vdl_msg1` (`id_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
  `n_views` int(10) unsigned NULL DEFAULT '0',
  `n_contacts` int(10) unsigned NULL DEFAULT '0',
  `n_groups` int(10) unsigned NULL DEFAULT '0',
  `session_key` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `session_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `privacy_level` set('low','medium','high') COLLATE utf8_unicode_ci NOT NULL,
  `mail_notify` binary(1) NOT NULL,
  `color_theme` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick_UNIQUE` (`nick`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `vdl_u_belong` (
  `user_id` int(11) NOT NULL,
  `group_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `is_admin` binary(1) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `fk_vdl_u_belong_vdl_user1` (`user_id`),
  KEY `fk_vdl_u_belong_vdl_group1` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `vdl_comment`
  ADD CONSTRAINT `fk_vdl_comment_vdl_msg1` FOREIGN KEY (`id_msg_ref`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vdl_comment_vdl_user1` FOREIGN KEY (`id_user`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `vdl_event`
  ADD CONSTRAINT `fk_vdl_event_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `vdl_file`
  ADD CONSTRAINT `fk_vdl_file_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `vdl_friend_of`
  ADD CONSTRAINT `fk_vdl_friend_of_vdl_user1` FOREIGN KEY (`user1`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdl_friend_of_vdl_user2` FOREIGN KEY (`user2`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `vdl_place`
  ADD CONSTRAINT `fk_vdl_place_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `vdl_publish`
  ADD CONSTRAINT `fk_vdl_publish_vdl_user1` FOREIGN KEY (`id_user`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdl_publish_vdl_group1` FOREIGN KEY (`id_group`) REFERENCES `vdl_group` (`group_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdl_publish_vdl_msg1` FOREIGN KEY (`id_msg`) REFERENCES `vdl_msg` (`id_msg`) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE `vdl_u_belong`
  ADD CONSTRAINT `fk_vdl_u_belong_vdl_user1` FOREIGN KEY (`user_id`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vdl_u_belong_vdl_group1` FOREIGN KEY (`group_id`) REFERENCES `vdl_group` (`group_name`) ON DELETE CASCADE ON UPDATE CASCADE;
CREATE TABLE IF NOT EXISTS `vdl_trending` (
  `topic` varchar(140) COLLATE utf8_bin NOT NULL,
  `count` int(10) NOT NULL,
  UNIQUE KEY `topic` (`topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3;

/* PARTE NUEVA */

CREATE TABLE IF NOT EXISTS `vdl_conver` (
  `id_conver` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `user3` int(11) DEFAULT NULL,
  `user4` int(11) DEFAULT NULL,
  `user5` int(11) DEFAULT NULL,
  `user6` int(11) DEFAULT NULL,
  `user7` int(11) DEFAULT NULL,
  `user8` int(11) DEFAULT NULL,
  `user9` int(11) DEFAULT NULL,
  `user10` int(11) DEFAULT NULL,
  `user11` int(11) DEFAULT NULL,
  `user12` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_conver`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `vdl_msg_conver` (
  `conver_ref` int(11) NOT NULL,
  `user_ref` int(11) NOT NULL,
  `date_published` datetime NOT NULL,
  `text` varchar (140) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`conver_ref`,`user_ref`,`date_published`),
  KEY `fk_vdl_msg_conver_vdl_conver1` (`conver_ref`),
  KEY `fk_vdl_msg_conver_vdl_user1` (`user_ref`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `vdl_msg_conver`
  ADD CONSTRAINT `fk_vdl_msg_conver_vdl_conver1` FOREIGN KEY (`conver_ref`) REFERENCES `vdl_conver` (`id_conver`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vdl_msg_conver_vdl_user1` FOREIGN KEY (`user_ref`) REFERENCES `vdl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 