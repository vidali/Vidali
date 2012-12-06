/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE  TABLE IF NOT EXISTS `vdl_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `nick` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `password` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `birthdate` DATE NOT NULL ,
  `age` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `sex` ENUM('male','female') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `location` VARCHAR(75) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `website` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `description` VARCHAR(140) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `avatar_id` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
  `n_views` INT(10) UNSIGNED NULL DEFAULT '0' ,
  `n_contacts` INT(10) UNSIGNED NULL DEFAULT '0' ,
  `n_groups` INT(10) UNSIGNED NULL DEFAULT '0' ,
  `session_key` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `session_id` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `privacy_level` SET('low','medium','high') NOT NULL ,
  `mail_notify` BINARY(1) NOT NULL ,
  `color_theme` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nick_UNIQUE` (`nick` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;
CREATE  TABLE IF NOT EXISTS `vdl_group` (
  `group_name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `avatar_id` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `n_members` INT(11) NOT NULL DEFAULT '0' ,
  `is_private` BINARY(1) NOT NULL ,
  `privacy_level` SET('open','close') NOT NULL ,
  `allow_ext_com` BINARY(1) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`group_name`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
INSERT INTO `vdl_group` (`group_name`, `avatar_id`, `n_members`, `is_private`, `privacy_level`, `allow_ext_com`) VALUES
('Vidali', 'prof_def', 0, '\0', 'open', '1');
CREATE  TABLE IF NOT EXISTS `vdl_msg` (
  `id_msg` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_user` INT(11) NOT NULL ,
  `id_group` VARCHAR(45) NOT NULL ,
  `date_published` DATETIME NOT NULL ,
  `text` VARCHAR(140) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`id_msg`, `id_user`, `id_group`, `date_published`) ,
  INDEX `fk_vdl_msg_vdl_user1_idx` (`id_user` ASC) ,
  INDEX `fk_vdl_msg_vdl_group1_idx` (`id_group` ASC) ,
  CONSTRAINT `fk_vdl_msg_vdl_user1`
    FOREIGN KEY (`id_user` )
    REFERENCES `vdl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_msg_vdl_group1`
    FOREIGN KEY (`id_group` )
    REFERENCES `vdl_group` (`group_name` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_comment` (
  `id_user` INT(11) NOT NULL ,
  `id_msg_ref` INT(11) NOT NULL ,
  `reply` VARCHAR(140) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `date_reply` DATETIME NOT NULL ,
  PRIMARY KEY (`id_user`, `id_msg_ref`) ,
  INDEX `fk_vdl_comment_vdl_msg1` (`id_msg_ref` ASC) ,
  INDEX `fk_vdl_comment_vdl_user1` (`id_user` ASC) ,
  CONSTRAINT `fk_vdl_comment_vdl_msg1`
    FOREIGN KEY (`id_msg_ref` )
    REFERENCES `vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_vdl_comment_vdl_user1`
    FOREIGN KEY (`id_user` )
    REFERENCES `vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_config` (
  `config_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `config_name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `config_value` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`config_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
INSERT INTO `vdl_config` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'LANG', 'ES'),
(2, 'THEME', 'default'),
(3, 'TITLE', 'Vidali - Red Social Libre');
CREATE  TABLE IF NOT EXISTS `vdl_event` (
  `id` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `id_msg` INT(11) NOT NULL ,
  `event_tittle` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `event_tittle_UNIQUE` (`event_tittle` ASC) ,
  INDEX `fk_vdl_event_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_event_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_file` (
  `id` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `id_msg` INT(11) NULL DEFAULT NULL ,
  `name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `type` SET('image','audio','video','other') NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_vdl_file_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_file_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_friend_of` (
  `user1` INT(11) NOT NULL ,
  `user2` INT(11) NOT NULL ,
  `status` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`user1`, `user2`) ,
  INDEX `fk_vdl_friend_of_vdl_user1` (`user1` ASC) ,
  INDEX `fk_vdl_friend_of_vdl_user2` (`user2` ASC) ,
  CONSTRAINT `fk_vdl_friend_of_vdl_user1`
    FOREIGN KEY (`user1` )
    REFERENCES `vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_friend_of_vdl_user2`
    FOREIGN KEY (`user2` )
    REFERENCES `vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_place` (
  `id` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `id_msg` INT(11) NOT NULL ,
  `name_place` VARCHAR(75) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `location_coord` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_place_UNIQUE` (`name_place` ASC) ,
  UNIQUE INDEX `location_coord_UNIQUE` (`location_coord` ASC) ,
  INDEX `fk_vdl_place_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_place_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_u_belong` (
  `user_id` INT(11) NOT NULL ,
  `group_id` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `is_admin` BINARY(1) NOT NULL ,
  PRIMARY KEY (`user_id`, `group_id`) ,
  INDEX `fk_vdl_u_belong_vdl_user1` (`user_id` ASC) ,
  INDEX `fk_vdl_u_belong_vdl_group1` (`group_id` ASC) ,
  CONSTRAINT `fk_vdl_u_belong_vdl_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_vdl_u_belong_vdl_group1`
    FOREIGN KEY (`group_id` )
    REFERENCES `vdl_group` (`group_name` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_trending` (
  `topic` VARCHAR(140) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `count` INT(10) NOT NULL ,
  UNIQUE INDEX `topic` (`topic` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_notify` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `user_sender` INT(11) NOT NULL ,
  `msg_related` INT(11) NULL DEFAULT NULL ,
  `type` INT(10) UNSIGNED NOT NULL ,
  `checked` TINYINT(1) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  INDEX `user_id` (`user_id` ASC) ,
  INDEX `user_sender` (`user_sender` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_conver` (
  `conver_ref` INT(11) NOT NULL ,
  INDEX `fk_vdl_msg_conver_vdl_conver1` (`conver_ref` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
CREATE  TABLE IF NOT EXISTS `vdl_u_conver` (
  `vdl_user_id` INT(11) NOT NULL ,
  `vdl_msg_conver_conver_ref` INT(11) NOT NULL ,
  PRIMARY KEY (`vdl_user_id`, `vdl_msg_conver_conver_ref`) ,
  INDEX `fk_vdl_user_has_vdl_msg_conver_vdl_msg_conver1_idx` (`vdl_msg_conver_conver_ref` ASC) ,
  INDEX `fk_vdl_user_has_vdl_msg_conver_vdl_user1_idx` (`vdl_user_id` ASC) ,
  CONSTRAINT `fk_vdl_user_has_vdl_msg_conver_vdl_user1`
    FOREIGN KEY (`vdl_user_id` )
    REFERENCES `vdl_user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_user_has_vdl_msg_conver_vdl_msg_conver1`
    FOREIGN KEY (`vdl_msg_conver_conver_ref` )
    REFERENCES `vdl_conver` (`conver_ref` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;
CREATE  TABLE IF NOT EXISTS `vdl_msg_conver` (
  `conver_ref_id` INT NOT NULL ,
  `id_msg` VARCHAR(45) NOT NULL ,
  `user_id` INT(11) NULL ,
  `pm_msg` TEXT NOT NULL ,
  `date_send` DATETIME NOT NULL ,
  PRIMARY KEY (`conver_ref_id`, `id_msg`, `date_send`) ,
  INDEX `fk_vdl_msg_conver_1_idx` (`user_id` ASC, `conver_ref_id` ASC) ,
  UNIQUE INDEX `date_send_UNIQUE` (`date_send` ASC) ,
  CONSTRAINT `fk_vdl_msg_conver_vdl_conver1`
    FOREIGN KEY (`conver_ref_id` )
    REFERENCES `vdl_conver` (`conver_ref` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_msg_conver_1`
    FOREIGN KEY (`user_id` , `conver_ref_id` )
    REFERENCES `vdl_user_has_vdl_msg_conver` (`vdl_user_id` , `vdl_msg_conver_conver_ref` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
