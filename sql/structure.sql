CREATE DATABASE servers;

USE servers;

CREATE TABLE `client`
(
    `client_id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`              VARCHAR(255)          DEFAULT NULL,
    `active`            BOOLEAN      NOT NULL DEFAULT TRUE,
    `creation_date`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modification_date` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`client_id`)
) ENGINE = InnoDB;

CREATE TABLE `user`
(
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `client_id`         INT UNSIGNED NOT NULL,
    `password`          VARCHAR(255) NOT NULL,
    `email`             VARCHAR(180) NOT NULL,
    `roles`             JSON         NOT NULL,
    `active`            BOOLEAN      NOT NULL DEFAULT TRUE,
    PRIMARY KEY (`id`),
    UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE = InnoDB;

CREATE TABLE `application`
(
    `application_id`       INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `client_id`            INT UNSIGNED NOT NULL,
    `application_key`      VARCHAR(255) NOT NULL,
    `authentication_token` VARCHAR(255) NOT NULL,
    `active`               BOOLEAN      NOT NULL DEFAULT TRUE,
    `creation_date`        DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modification_date`    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`application_id`),
    UNIQUE KEY `application_key` (`application_key`)
) ENGINE = InnoDB;

CREATE TABLE `server`
(
    `server_id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `client_id`         INT UNSIGNED NOT NULL,
    `address`           VARCHAR(255)          DEFAULT NULL,
    `active`            BOOLEAN      NOT NULL DEFAULT TRUE,
    `creation_date`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modification_date` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`server_id`)
) ENGINE = InnoDB;

ALTER TABLE `servers`.`user`
    ADD CONSTRAINT `fk_user_1`
        FOREIGN KEY (`client_id`)
            REFERENCES `servers`.`client` (`client_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION;

ALTER TABLE `servers`.`application`
    ADD CONSTRAINT `fk_application_1`
        FOREIGN KEY (`client_id`)
            REFERENCES `servers`.`client` (`client_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION;

ALTER TABLE `servers`.`server`
    ADD CONSTRAINT `fk_server_1`
        FOREIGN KEY (`client_id`)
            REFERENCES `servers`.`client` (`client_id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION;
