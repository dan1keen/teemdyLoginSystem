-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 15 2019 г., 09:12
-- Версия сервера: 5.7.26
-- Версия PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `teemdy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `number` int(11) NOT NULL,
  `text1` text CHARACTER SET utf8mb4 NOT NULL,
  `text2` text CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `date`, `number`, `text1`, `text2`, `user_id`, `created`) VALUES
(19, '2019-08-15', 22, 'Some text 1 related to Daniyar!', 'Text 2 related to Daniyar', 1, '2019-08-14 18:00:00'),
(20, '2019-08-16', 21, '$stmt-&gt;bindParam(\':created\', $this-&gt;created);', '$stmt-&gt;bindParam(\':created\', $this-&gt;created);', 1, '2019-08-15 04:06:57'),
(21, '2019-08-16', 22, 'асд', 'асд', 8, '2019-08-15 04:43:12'),
(23, '2019-08-18', 22, 'асд', 'асд', 1, '2019-08-15 04:51:40'),
(24, '2019-01-01', 22, 'asd', 'qwe', 2, '2019-08-15 07:22:09'),
(25, '2019-08-18', 22, 'asd', 'qwe', 18, '2019-08-15 07:38:33'),
(26, '2019-08-11', 21, 'asd', 'qwe', 18, '2019-08-15 07:39:18'),
(27, '2019-08-30', 25, 'asd', 'asd', 18, '2019-08-15 07:39:39'),
(28, '2019-08-25', 27, 'sad', 'sda', 18, '2019-08-15 07:39:49'),
(29, '2019-08-25', 29, 'das', 'sad', 18, '2019-08-15 07:40:00'),
(30, '2019-08-31', 31, 'asd', 'asd', 18, '2019-08-15 07:40:11'),
(31, '2019-08-15', 22, 'asd', 'qwe', 2, '2019-08-15 08:21:58');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `access_level` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `access_code` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `access_level`, `access_code`, `status`, `created`) VALUES
(1, 'Daniyar', 'dan1ar3110@gmail.com', '$2y$10$TLULXzZ8EVVN/O2mKPgBBePIZebPfwmvz9u0aRysAsPZn6gsQ.LBm', 'Admin', '', 1, '2019-08-15 07:24:25'),
(2, 'user', 'daniklimtonov@gmail.com', '$2y$10$TLULXzZ8EVVN/O2mKPgBBePIZebPfwmvz9u0aRysAsPZn6gsQ.LBm', 'Customer', '', 1, '2019-08-14 22:26:32'),
(3, 'user', 'user@user.com', '$2y$10$TLULXzZ8EVVN/O2mKPgBBePIZebPfwmvz9u0aRysAsPZn6gsQ.LBm', 'Customer', '', 1, '2019-08-15 00:27:26'),
(18, 'Данияр', 'slamegg@mail.ru', '$2y$10$kbTE/4Ohy9CRCYdLBCFFGeY.yUhf4HhLhVw5aVGuUL/KJqa4u95w6', 'Customer', NULL, 1, '2019-08-15 05:20:21'),
(19, 'Ктото', 'asd@asd.com', '$2y$10$1/G0FrnpNvBO2vlnld5X7ulsxZcGo2dNDgrm9gSEQS2zVAIFOTCHm', 'Customer', NULL, 1, '2019-08-15 07:18:59'),
(20, 'Ктото', 'asd@asd.ru', '$2y$10$8cgxr60vr1kFcTRyL8O8heb3q9DNrabx3KnbcyqRM8Zhrjb/jZtdu', 'Customer', NULL, 1, '2019-08-15 07:19:05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
