DROP DATABASE IF EXISTS pawel;

CREATE DATABASE pawel;

use pawel;

SET FOREIGN_KEY_CHECKS=0;

START TRANSACTION;

DROP TABLE IF EXISTS `user`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(11) unsigned NOT NULL AUTO_INCREMENT,
  `registered` datetime,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime,
  `pwd_reset_token` varchar(128),
  `pwd_reset_token_creation_date` datetime,
  `user_time` VARCHAR(128),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11),
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;


INSERT INTO `user` (`id`,`registered`,`email`,`password`) VALUES (1,NOW(),'test', sha1('test'));