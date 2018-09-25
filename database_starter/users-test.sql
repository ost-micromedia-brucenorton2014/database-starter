-- Adminer 3.3.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users-test`;
CREATE TABLE `users-test` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `colour` varchar(64) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users-test` (`userID`, `username`, `name`, `email`, `colour`) VALUES
(1, 'nortonb',  'Bruce Norton', 'nortonb@vanier.college', 'slate blue'),
(2, 'picassop', 'Pablo Picasso',  'pp@montmartre.fr', 'lonely blue');

-- 2018-09-25 14:47:09