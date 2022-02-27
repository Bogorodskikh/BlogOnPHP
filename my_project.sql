-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2022 г., 12:06
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Статья о том, как я погулял', 'Шёл я значит по тротуару, как вдруг...', '2022-02-18 13:54:52'),
(2, 1, 'Пост о жизни', 'Сидел я тут на кухне с друганом и тут он задал такой вопрос...', '2022-02-18 13:54:52'),
(3, 1, 'Статья о том, как я погулял', 'Шёл я значит по тротуару, как вдруг...', '2022-02-18 19:12:22'),
(4, 1, 'Статья о том, как я погулял', 'Шёл я значит по тротуару, как вдруг...', '2022-02-18 19:44:37'),
(5, 1, 'Название статьи 1', 'Текст статьи 1', '2022-02-20 15:48:51'),
(6, 1, 'Название статьи 2', 'Текст статьи 2', '2022-02-20 15:48:51'),
(7, 1, 'Название статьи 3', 'Текст статьи 3', '2022-02-20 15:48:51'),
(8, 1, 'Название статьи 4', 'Текст статьи 4', '2022-02-20 15:48:51'),
(9, 1, 'Название статьи 5', 'Текст статьи 5', '2022-02-20 15:48:51'),
(10, 1, 'Название статьи 6', 'Текст статьи 6', '2022-02-20 15:48:51'),
(11, 1, 'Название статьи 7', 'Текст статьи 7', '2022-02-20 15:48:51'),
(12, 1, 'Название статьи 8', 'Текст статьи 8', '2022-02-20 15:48:51'),
(13, 1, 'Название статьи 9', 'Текст статьи 9', '2022-02-20 15:48:51'),
(14, 1, 'Название статьи 10', 'Текст статьи 10', '2022-02-20 15:48:51'),
(15, 1, 'Название статьи 11', 'Текст статьи 11', '2022-02-20 15:48:51'),
(16, 1, 'Название статьи 12', 'Текст статьи 12', '2022-02-20 15:48:51'),
(17, 1, 'Название статьи 13', 'Текст статьи 13', '2022-02-20 15:48:51'),
(18, 1, 'Название статьи 14', 'Текст статьи 14', '2022-02-20 15:48:51'),
(19, 1, 'Название статьи 15', 'Текст статьи 15', '2022-02-20 15:48:51'),
(20, 1, 'Название статьи 16', 'Текст статьи 16', '2022-02-20 15:48:51'),
(21, 1, 'Название статьи 17', 'Текст статьи 17', '2022-02-20 15:48:51'),
(22, 1, 'Название статьи 18', 'Текст статьи 18', '2022-02-20 15:48:51'),
(23, 1, 'Название статьи 19', 'Текст статьи 19', '2022-02-20 15:48:51'),
(24, 1, 'Название статьи 20', 'Текст статьи 20', '2022-02-20 15:48:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', 'hash1', 'token1', '2022-02-18 13:53:11'),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2022-02-18 13:53:11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
