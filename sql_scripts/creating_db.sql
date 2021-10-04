CREATE DATABASE directoryDB;

USE directoryDB;
CREATE TABLE `account` (
	`account_id` INT NOT NULL AUTO_INCREMENT,
	`phone_number` varchar(255) NOT NULL UNIQUE,
	`tariff_id` INT NOT NULL,
	`balance` FLOAT(10) NOT NULL DEFAULT '0',
	`minutes` INT(10) NOT NULL DEFAULT '0',
	PRIMARY KEY (`account_id`)
);

CREATE TABLE `tariff` (
	`tariff_id` INT NOT NULL AUTO_INCREMENT,
	`tariff_name` varchar(255) NOT NULL,
	`per_minute` FLOAT(10) NOT NULL,
	`per_minute_rouming` FLOAT(10) NOT NULL,
	PRIMARY KEY (`tariff_id`)
);

CREATE TABLE `owner` (
	`owner_id` INT NOT NULL AUTO_INCREMENT,
	`owner_name` varchar(255) NOT NULL,
	`face` varchar(255) NOT NULL,
	`address` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	PRIMARY KEY (`owner_id`)
);

CREATE TABLE `directory` (
	`directory_id` INT NOT NULL AUTO_INCREMENT,
	`owner_id` INT NOT NULL UNIQUE,
	`account_id` INT NOT NULL,
	`status` varchar(255),
	PRIMARY KEY (`directory_id`)
);

CREATE TABLE `log` (
	`log_id` INT NOT NULL AUTO_INCREMENT,
	`account_id` INT NOT NULL,
	`new_balance` FLOAT(10) NOT NULL,
	`log_date` DATE NOT NULL,
	PRIMARY KEY (`log_id`)
);

ALTER TABLE `account` ADD CONSTRAINT `account_fk0` FOREIGN KEY (`tariff_id`) REFERENCES `tariff`(`tariff_id`) ON DELETE CASCADE;

ALTER TABLE `directory` ADD CONSTRAINT `directory_fk0` FOREIGN KEY (`owner_id`) REFERENCES `owner`(`owner_id`) ON DELETE CASCADE;

ALTER TABLE `directory` ADD CONSTRAINT `directory_fk1` FOREIGN KEY (`account_id`) REFERENCES `account`(`account_id`) ON DELETE CASCADE;

ALTER TABLE `log` ADD CONSTRAINT `log_fk0` FOREIGN KEY (`account_id`) REFERENCES `account`(`account_id`) ON DELETE CASCADE;
