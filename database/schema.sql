-- Linkify.Bio database bootstrap
-- Matches the current PHP code paths in this repository.

CREATE DATABASE IF NOT EXISTS `linkify.bio`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `linkify.bio`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(64) NOT NULL,
  `full_name` VARCHAR(255) DEFAULT NULL,
  `image_url` VARCHAR(2048) DEFAULT NULL,
  `bio` TEXT,
  `instagram_id` VARCHAR(64) DEFAULT NULL,
  `instagram_access_token` VARCHAR(255) DEFAULT NULL,
  `twitter_id` VARCHAR(64) DEFAULT NULL,
  `twitter_oauth_token` VARCHAR(255) DEFAULT NULL,
  `twitter_oauth_token_secret` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_instagram_id_index` (`instagram_id`),
  KEY `users_twitter_id_index` (`twitter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `links` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `url` VARCHAR(2048) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `impressions` INT UNSIGNED NOT NULL DEFAULT 0,
  `clicks` INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `links_user_id_index` (`user_id`),
  CONSTRAINT `links_user_id_foreign`
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
