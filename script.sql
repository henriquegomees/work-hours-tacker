DROP DATABASE IF EXISTS solidesPonto;
CREATE DATABASE solidesPonto;
USE solidesPonto;

CREATE TABLE `solidesponto`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);

CREATE TABLE `solidesponto`.`time_records` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `date_time` DATETIME NOT NULL DEFAULT NOW(),
  `entry` BOOLEAN NOT NULL,
  `createdAt` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `solidesponto`.`users`(`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE
);