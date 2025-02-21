DROP TABLE `eorarend`.`users_orig`;

CREATE TABLE `eorarend`.`students` (`id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `educational_id` VARCHAR(20) NOT NULL , `class_id` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;