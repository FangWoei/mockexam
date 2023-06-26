-- Adminer 4.8.1 MySQL 10.5.17-MariaDB-1:10.5.17+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `questions` (`id`, `question`, `created_at`) VALUES
(1,	'How would you rate the friendliness of our customer service team?',	'2023-05-27 03:47:59'),
(2,	'How would you rate the responsiveness of our customer service team?',	'2023-05-27 03:48:09'),
(3,	'How would you rate the knowledge and expertise of our customer service team?',	'2023-05-27 03:48:17'),
(4,	'How would you rate the timeliness of our customer service team in resolving your issues?',	'2023-05-27 03:48:30'),
(5,	'How would you rate the overall effectiveness of our customer service team in addressing your needs?',	'2023-05-27 03:48:39');

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `results_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `results_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1,	'John',	'john@gmail.com',	'$2y$10$xQ5ZhPmy2MV0UWW.jPjJx.4AZU0c88.Hb6hYavsG0V.Fsz8AiphDO',	'user',	'2023-05-30 10:25:25'),
(2,	'Jack',	'jack@gmail.com',	'$2y$10$G6pMfUjCsrMsDoWjrJxo8.oI9ZmlslrVn/Slsu2Zsns5kOFiDEF8W',	'admin',	'2023-06-19 06:58:08');

-- 2023-06-19 07:56:53
