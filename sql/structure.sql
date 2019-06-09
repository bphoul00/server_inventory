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
    `user_id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `client_id`         INT UNSIGNED NOT NULL,
    `username`          VARCHAR(255) NOT NULL,
    `password`          VARCHAR(255) NOT NULL,
    `active`            BOOLEAN      NOT NULL DEFAULT TRUE,
    `creation_date`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modification_date` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `username` (`username`)
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