CREATE DATABASE servers;

USE servers;

CREATE TABLE `user`
(
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `password`          VARCHAR(255) NOT NULL,
    `email`             VARCHAR(180) NOT NULL,
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

CREATE TABLE api_token
(
    id         INT AUTO_INCREMENT NOT NULL,
    user_id    INT                NOT NULL,
    token      VARCHAR(255)       NOT NULL,
    expires_at DATETIME           NOT NULL,
    INDEX IDX_7BA2F5EBA76ED395 (user_id),
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci
  ENGINE = InnoDB;

ALTER TABLE `servers`.`api_token`
    ADD CONSTRAINT `fk_api_token_1`
        FOREIGN KEY (`user_id`)
            REFERENCES `servers`.`user` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION;
