CREATE DATABASE servers;

USE servers;

CREATE TABLE `user`
(
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `password`          VARCHAR(255) NOT NULL,
    `email`             VARCHAR(180) NOT NULL,
    `api_token`         VARCHAR(255) NOT NULL,
    `roles`             JSON         NOT NULL,
    `active`            BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE = InnoDB;

CREATE TABLE `server`
(
    `server_id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `address`           VARCHAR(255)          DEFAULT NULL,
    `active`            BOOLEAN      NOT NULL DEFAULT TRUE,
    `creation_date`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modification_date` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`server_id`)
) ENGINE = InnoDB;

