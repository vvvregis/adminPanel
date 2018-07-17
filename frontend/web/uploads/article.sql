-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 26 2018 г., 14:27
-- Версия сервера: 5.7.22-0ubuntu0.17.10.1
-- Версия PHP: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `news_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `slug` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `prev_text` text COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail_base_url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `slug`, `title`, `body`, `prev_text`, `view`, `category_id`, `thumbnail_base_url`, `thumbnail_path`, `status`, `created_by`, `updated_by`, `published_at`, `created_at`, `updated_at`, `source_id`, `key`) VALUES
(1, 'gdsfgsd', 'gdsfgsd', '<p>gsdfgsdf</p>', '<p>gsdfgsdfgs</p>', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'afyvafy', 'афывафы', '<p>аыфвафыва</p>', '<p>афывафыва</p>', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'novost-1', 'Новость 1', '<p>аыфвафыва</p>', '<p>афывафыва</p>', NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'novost-2', 'Новость 2', '<p>аыфвафыва</p>', '<p>афывафывафы</p>', NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'novost-23', 'Новость 23', '<p>аыфваыфвафы</p>', '<p>афывафыва</p>', NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'novost-4', 'Новость 4', '<p>фывафывафы</p>', '<p>фывафыва</p>', NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'novost-5', 'Новость 5', '<p>ыфвафывафыва</p>', '<p>афывафывафы</p>', NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'novost-6', 'Новость 6', '<p>афывафыва</p>', '<p>афывафывафы</p>', NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'novost-7', 'Новость 7', '<p>афывафывафы</p>', '<p>афывафывафыва</p>', NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'novost-7', 'Новость 7', '<p>афывафывафыв</p>', '<p>аыфвафывафыв</p>', NULL, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'novost-8', 'Новость 8', '<p>аыфвафывафыв</p>', '<p>афывафываыф</p>', NULL, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'novost-9', 'Новость 9', '<p>фывафывафыва</p>', '<p>афывафываф</p>', NULL, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'novost-9', 'Новость 9', '<p>аыфвафывафы</p>', '<p>аыфвафывафыв</p>', NULL, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'novost-10', 'Новость 10', '<p>аыфвафыва</p>', '<p>афывафывафы</p>', NULL, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'novost-11', 'Новость 11', '<p>афывафывафыва</p>', '<p>афывафывафыва</p>', NULL, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'novost-12', 'Новость 12', '<p>аыфвафывафыв</p>', '<p>афывафывафыва</p>', NULL, 6, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'novost-13', 'Новость 13', '<p>афывафывафыва</p>', '<p>афывафывафыва</p>', NULL, 6, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'novost-14', 'Новость 14', '<p>фывафывафыва</p>', '<p>аыфвафывафыв</p>', NULL, 6, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_author` (`created_by`),
  ADD KEY `fk_article_updater` (`updated_by`),
  ADD KEY `fk_article_category` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_author` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_updater` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
