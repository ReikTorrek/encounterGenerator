-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 24 2022 г., 23:10
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `encountergenerator`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abilities`
--

CREATE TABLE `abilities` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `dice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `abilities`
--

INSERT INTO `abilities` (`id`, `userId`, `name`, `description`, `dice`) VALUES
(3, 2, 'Усиление', 'Увеличивает твою силу, что позволяет наносить дополнительный урон 1d4', '1d4'),
(4, 2, 'Магчиеская стрела', 'Магическая стрела, наносящая 1д6 урона', '1d6'),
(5, 2, 'Ослабление', 'Ослабляет врага, заставляя его наносить на 1д6 меньше урона.', '1d6'),
(6, 2, 'Таран', 'Таранит врага и наносит 1д10 урона', '1d10');

-- --------------------------------------------------------

--
-- Структура таблицы `areals`
--

CREATE TABLE `areals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `buffs`
--

CREATE TABLE `buffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `encounter`
--

CREATE TABLE `encounter` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `race` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `lvl` varchar(255) DEFAULT NULL,
  `aligment` varchar(255) DEFAULT NULL,
  `HP` int(11) NOT NULL,
  `AC` int(11) DEFAULT NULL,
  `armor` int(11) DEFAULT NULL,
  `actions` int(11) DEFAULT NULL,
  `defenceActions` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `abilities` varchar(255) DEFAULT NULL,
  `areals` varchar(255) DEFAULT NULL,
  `buffs` varchar(255) DEFAULT NULL,
  `loot` varchar(255) DEFAULT NULL,
  `mods` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `encounter`
--

INSERT INTO `encounter` (`id`, `name`, `race`, `type`, `class`, `lvl`, `aligment`, `HP`, `AC`, `armor`, `actions`, `defenceActions`, `userId`, `abilities`, `areals`, `buffs`, `loot`, `mods`) VALUES
(3, 'Болк', 'волк', 'зверь', '', '2', 'голодный', 12, 7, 0, 3, 1, 2, NULL, NULL, NULL, NULL, NULL),
(12, 'asd', 'asd', 'asd', 'asd', '21', 'sda', 12, 12, 12, 12, 12, 2, '[\"Магчиеская стрела\",\"Таран\"]', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `loot`
--

CREATE TABLE `loot` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `mods`
--

CREATE TABLE `mods` (
  `id` int(11) NOT NULL,
  `statId` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `statsettings`
--

CREATE TABLE `statsettings` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `statName` varchar(255) NOT NULL,
  `statMod` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `statsettings`
--

INSERT INTO `statsettings` (`id`, `userId`, `statName`, `statMod`) VALUES
(1, 2, 'Сила', '10'),
(2, 2, 'Ловкость', '10'),
(3, 2, 'Выносливость', '10'),
(4, 2, 'Харизма', '10'),
(5, 2, 'Интеллект', '10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `avatar`) VALUES
(1, 'test', 'test', NULL),
(2, 'jimwia', '123123', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `areals`
--
ALTER TABLE `areals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `buffs`
--
ALTER TABLE `buffs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `encounter`
--
ALTER TABLE `encounter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `loot`
--
ALTER TABLE `loot`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statsettings`
--
ALTER TABLE `statsettings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `encounter`
--
ALTER TABLE `encounter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `mods`
--
ALTER TABLE `mods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `statsettings`
--
ALTER TABLE `statsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
