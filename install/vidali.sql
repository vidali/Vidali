SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `vidali` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `vidali` ;

-- -----------------------------------------------------
-- Table `vidali`.`vdl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NOT NULL ,
  `nick` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `birthdate` DATE NOT NULL ,
  `age` VARCHAR(45) NULL ,
  `sex` ENUM('male','female') NOT NULL ,
  `location` VARCHAR(75) NOT NULL ,
  `website` VARCHAR(50) NOT NULL ,
  `description` VARCHAR(140) NOT NULL ,
  `avatar_id` VARCHAR(45) NULL ,
  `n_views` INT ZEROFILL NOT NULL DEFAULT 0 ,
  `n_contacts` INT ZEROFILL NOT NULL DEFAULT 0 ,
  `n_groups` INT ZEROFILL NOT NULL DEFAULT 0 ,
  `session_key` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `session_id` VARCHAR(45) NOT NULL ,
  `privacy_level` SET('low','medium','high') NOT NULL ,
  `mail_notify` BINARY NOT NULL ,
  `color_theme` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nick_UNIQUE` (`nick` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_group`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_group` (
  `group_name` VARCHAR(45) NOT NULL ,
  `avatar_id` VARCHAR(45) NOT NULL ,
  `n_members` INT NOT NULL DEFAULT 0 ,
  `is_private` BINARY NOT NULL ,
  `privacy_level` SET('open','close') NOT NULL ,
  `allow_ext_com` BINARY NOT NULL DEFAULT true ,
  PRIMARY KEY (`group_name`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_u_belong`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_u_belong` (
  `user_id` INT NOT NULL ,
  `group_id` VARCHAR(45) NOT NULL ,
  `is_admin` BINARY NOT NULL ,
  PRIMARY KEY (`user_id`, `group_id`) ,
  INDEX `fk_vdl_u_belong_vdl_user1` (`user_id` ASC) ,
  INDEX `fk_vdl_u_belong_vdl_group1` (`group_id` ASC) ,
  CONSTRAINT `fk_vdl_u_belong_vdl_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `vidali`.`vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_vdl_u_belong_vdl_group1`
    FOREIGN KEY (`group_id` )
    REFERENCES `vidali`.`vdl_group` (`group_name` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_friend_of`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_friend_of` (
  `user1` INT NOT NULL ,
  `user2` INT NOT NULL ,
  `status` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`user1`, `user2`) ,
  INDEX `fk_vdl_friend_of_vdl_user1` (`user1` ASC) ,
  INDEX `fk_vdl_friend_of_vdl_user2` (`user2` ASC) ,
  CONSTRAINT `fk_vdl_friend_of_vdl_user1`
    FOREIGN KEY (`user1` )
    REFERENCES `vidali`.`vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_friend_of_vdl_user2`
    FOREIGN KEY (`user2` )
    REFERENCES `vidali`.`vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_msg`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_msg` (
  `id_msg` INT NOT NULL AUTO_INCREMENT ,
  `date_published` DATETIME NOT NULL ,
  `text` VARCHAR(140) NOT NULL ,
  PRIMARY KEY (`id_msg`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_publish`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_publish` (
  `id_user` INT NOT NULL ,
  `id_msg` INT NOT NULL ,
  `id_group` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_msg`, `id_user`, `id_group`) ,
  INDEX `fk_vdl_publish_vdl_user1` (`id_user` ASC) ,
  INDEX `fk_vdl_publish_vdl_group1` (`id_group` ASC) ,
  INDEX `fk_vdl_publish_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_publish_vdl_user1`
    FOREIGN KEY (`id_user` )
    REFERENCES `vidali`.`vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_publish_vdl_group1`
    FOREIGN KEY (`id_group` )
    REFERENCES `vidali`.`vdl_group` (`group_name` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vdl_publish_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vidali`.`vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_comment` (
  `id_user` INT NOT NULL ,
  `id_msg_ref` INT NOT NULL ,
  `reply` VARCHAR(140) NOT NULL ,
  `date_reply` DATETIME NOT NULL ,
  PRIMARY KEY (`id_user`, `id_msg_ref`) ,
  INDEX `fk_vdl_comment_vdl_msg1` (`id_msg_ref` ASC) ,
  INDEX `fk_vdl_comment_vdl_user1` (`id_user` ASC) ,
  CONSTRAINT `fk_vdl_comment_vdl_msg1`
    FOREIGN KEY (`id_msg_ref` )
    REFERENCES `vidali`.`vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_vdl_comment_vdl_user1`
    FOREIGN KEY (`id_user` )
    REFERENCES `vidali`.`vdl_user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_file`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_file` (
  `id` VARCHAR(50) NOT NULL ,
  `id_msg` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `type` SET('image','audio','video','other') NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_vdl_file_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_file_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vidali`.`vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_place`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_place` (
  `id` VARCHAR(50) NOT NULL ,
  `id_msg` INT NOT NULL ,
  `name_place` VARCHAR(75) NOT NULL ,
  `location_coord` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_place_UNIQUE` (`name_place` ASC) ,
  UNIQUE INDEX `location_coord_UNIQUE` (`location_coord` ASC) ,
  INDEX `fk_vdl_place_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_place_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vidali`.`vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `vidali`.`vdl_event`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vidali`.`vdl_event` (
  `id` VARCHAR(50) NOT NULL ,
  `id_msg` INT NOT NULL ,
  `event_tittle` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `event_tittle_UNIQUE` (`event_tittle` ASC) ,
  INDEX `fk_vdl_event_vdl_msg1` (`id_msg` ASC) ,
  CONSTRAINT `fk_vdl_event_vdl_msg1`
    FOREIGN KEY (`id_msg` )
    REFERENCES `vidali`.`vdl_msg` (`id_msg` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
