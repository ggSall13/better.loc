CREATE TABLE `better.loc`.`users` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`username` VARCHAR(255) NOT NULL , 
`email` VARCHAR(255) NOT NULL , 
`password` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`id`), UNIQUE (`email`)) ENGINE = InnoDB;


CREATE TABLE `better.loc`.`posts` (
`id` INT NOT NULL AUTO_INCREMENT , 
`userId` INT NOT NULL , 
`title` VARCHAR(255) NOT NULL , 
`text` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `posts` ADD `createAt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `text`;

ALTER TABLE `posts` CHANGE `text` `text` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL;

ALTER TABLE `posts` ADD `imgPath` VARCHAR(255) NULL AFTER `text`;

CREATE TABLE `better.loc`.`comments` (
`id` INT NOT NULL AUTO_INCREMENT , 
`userId` INT NOT NULL , 
`postId` INT NOT NULL , 
`text` TEXT NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `comments` ADD `username` VARCHAR(255) NULL DEFAULT NULL AFTER `text`;

ALTER TABLE `comments` CHANGE `userId` `userId` INT NULL DEFAULT NULL;
