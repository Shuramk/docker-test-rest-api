-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 24 2021 г., 22:59
-- Версия сервера: 10.3.22-MariaDB-log
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`) VALUES
(1, 'USD'),
(2, 'EUR');

-- --------------------------------------------------------

--
-- Структура таблицы `currency_rate`
--

CREATE TABLE `currency_rate` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `rate` double NOT NULL,
  `currency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `currency_rate`
--

INSERT INTO `currency_rate` (`id`, `date`, `rate`, `currency_id`) VALUES
(1, '2021-01-17', 22.1, 1),
(2, '2021-01-18', 22.75, 1),
(3, '2021-01-19', 22.67, 1),
(4, '2021-01-20', 22.7, 1),
(5, '2021-01-21', 23.7, 1),
(6, '2021-01-22', 22.75, 1),
(7, '2021-01-23', 22.67, 1),
(8, '2021-01-24', 22.7, 1),
(9, '2021-01-25', 23.7, 1),
(10, '2021-01-17', 29.1, 2),
(11, '2021-01-18', 30.75, 2),
(12, '2021-01-19', 31.67, 2),
(13, '2021-01-20', 32.7, 2),
(14, '2021-01-21', 32.7, 2),
(15, '2021-01-22', 31.75, 2),
(16, '2021-01-23', 30.67, 2),
(17, '2021-01-24', 30.7, 2),
(18, '2021-01-25', 31.7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'Test', '$2y$13$N2Ct43KmtqehxpF4NR3/3eNledPA6cOdbL2A1YR/wdVylBriT4ESC', 'test@com.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_555B7C4D38248176` (`currency_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  ADD CONSTRAINT `FK_555B7C4D38248176` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
