CREATE DATABASE url_shortener;
USE url_shortener;
DROP TABLE IF EXISTS `url_list`;
CREATE TABLE `url_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(255) DEFAULT NULL,
  `long` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_list_short_uindex` (`short`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;