DROP TABLE `eorarend`.`users_orig`;

CREATE TABLE `eorarend`.`students` (
    `id` INT(11) NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `educational_id` VARCHAR(20) NOT NULL , 
    `class_id` INT(11) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE users ADD COLUMN `educational_id` VARCHAR(20) AFTER `full_name`;

CREATE TABLE `eorarend`.`years_subjects` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `year_id` INT NOT NULL , 
    `subject_id` INT NOT NULL , 
    `lessons_per_week` INT NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `years_subjects` ADD CONSTRAINT `years_sub_year_fk` FOREIGN KEY (`year_id`) REFERENCES `years`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
ALTER TABLE `years_subjects` ADD CONSTRAINT `years_sub_subject_fk` FOREIGN KEY (`subject_id`) REFERENCES `subjects`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `eorarend`.`teacher_availability` (
    `id` INT NOT NULL , 
    `teacher_id` INT NOT NULL , 
    `day` INT NOT NULL , 
    `hour` INT NOT NULL 
) ENGINE = InnoDB;

ALTER TABLE `teacher_availability` ADD CONSTRAINT `teacher_avail_teacher_id_fk` FOREIGN KEY (`teacher_id`) REFERENCES `teachers`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

