CREATE TABLE IF NOT EXISTS `#__glossary` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`word` VARCHAR(255)  NOT NULL ,
`desc` TEXT NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

