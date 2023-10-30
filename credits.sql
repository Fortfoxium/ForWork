-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3303
-- Время создания: Окт 30 2023 г., 21:14
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `credits`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bank`
--

CREATE TABLE `bank` (
  `id_bank` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bank`
--

INSERT INTO `bank` (`id_bank`, `name`) VALUES
(1, 'ПАО \"Сбербанк\"'),
(2, 'ПАО \"ВТБ\"'),
(5, '\"Кидалово и обман\" ПАО');

-- --------------------------------------------------------

--
-- Структура таблицы `borrower`
--

CREATE TABLE `borrower` (
  `id_borrower` int NOT NULL,
  `name` text NOT NULL,
  `fname` text NOT NULL,
  `otchname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Заёмщики';

--
-- Дамп данных таблицы `borrower`
--

INSERT INTO `borrower` (`id_borrower`, `name`, `fname`, `otchname`) VALUES
(1, 'Владислав', 'Антипин', 'Денисович'),
(2, 'НеВладислав', 'НеАнтипин', 'НеДенисович');

-- --------------------------------------------------------

--
-- Структура таблицы `dealer`
--

CREATE TABLE `dealer` (
  `id_dealer` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Диллеры';

--
-- Дамп данных таблицы `dealer`
--

INSERT INTO `dealer` (`id_dealer`, `name`) VALUES
(1, '\"Хочу на работу\" ОАО'),
(2, '\"Рога и копыта\" ООО');

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id_employee` int NOT NULL,
  `fk_dealer` int DEFAULT NULL,
  `name` text NOT NULL,
  `fname` text NOT NULL,
  `otchname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id_employee`, `fk_dealer`, `name`, `fname`, `otchname`) VALUES
(1, 1, 'Маргарита', 'Пелипенко', 'Олеговна'),
(2, 2, 'Эрик', 'Крист', 'Григорьевич');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id_request` int NOT NULL,
  `fk_bank` int DEFAULT NULL,
  `sum_credit` int NOT NULL,
  `term_credit` int NOT NULL COMMENT 'срок в месяцах',
  `procent` float NOT NULL,
  `create_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_status` int NOT NULL,
  `reason` text NOT NULL,
  `fk_borrower` int DEFAULT NULL,
  `fk_employee` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Всё для заявок на кредит';

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id_request`, `fk_bank`, `sum_credit`, `term_credit`, `procent`, `create_date`, `update_date`, `fk_status`, `reason`, `fk_borrower`, `fk_employee`) VALUES
(1, 5, 100000, 20, 50, '2023-10-30', '2023-10-30 00:00:00', 3, 'Просто так:)', 1, 1),
(2, 5, 100000, 25, 50, '2023-10-30', '2023-10-30 00:00:00', 3, 'Тестим', 2, 2),
(3, 1, 12423, 13, 21, '2023-10-30', '2023-10-30 00:00:00', 2, ' fddff', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name`) VALUES
(1, 'Одобрена'),
(2, 'Отклонена'),
(3, 'Новая'),
(4, 'В процессе');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Индексы таблицы `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id_borrower`);

--
-- Индексы таблицы `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id_dealer`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `fk_dealers` (`fk_dealer`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `fk_banks` (`fk_bank`),
  ADD KEY `fk_borrower` (`fk_borrower`),
  ADD KEY `fk_worker` (`fk_employee`),
  ADD KEY `fk_statuses` (`fk_status`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id_borrower` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id_dealer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_dealers` FOREIGN KEY (`fk_dealer`) REFERENCES `dealer` (`id_dealer`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_banks` FOREIGN KEY (`fk_bank`) REFERENCES `bank` (`id_bank`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_borrower` FOREIGN KEY (`fk_borrower`) REFERENCES `borrower` (`id_borrower`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_statuses` FOREIGN KEY (`fk_status`) REFERENCES `status` (`id_status`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_worker` FOREIGN KEY (`fk_employee`) REFERENCES `employee` (`id_employee`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
