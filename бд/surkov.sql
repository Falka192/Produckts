-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2023 г., 23:14
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `surkov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `prodcuts`
--

CREATE TABLE `prodcuts` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `type_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `prodcuts`
--

INSERT INTO `prodcuts` (`id`, `path`, `title`, `price`, `weight`, `type_id`) VALUES
(1, 'bottle-water2.png', 'Вода негазированная Buxton', '30', '0,5 л', '1'),
(2, 'bottle-water2.png', 'Вода негазированная Buxton', '30', '0,5 л', '1'),
(3, 'bottle-water1.png', 'Вода негазированная Aquafina', '33', '0,5 л', '1'),
(4, 'pngwing.com.png', 'Хлеб нарезной', '50', '100 г', '2'),
(5, 'pngwing.com.png', 'Хлеб нарезной', '50', '100 г', '2'),
(6, 'pngwing.com (1).png', 'Мясной фарш', '99', '100 г', '3'),
(7, 'pngwing.com.png', 'Хлеб нарезной', '33', '100 г', '2'),
(8, 'pngwing.com.png', 'Хлеб нарезной', '42', '100 г', '2'),
(9, 'pngwing.com.png', 'Хлеб', '32', '100 г', '2'),
(10, 'pngwing.com.png', 'Хлеб', '123', '123 г', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(1233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Вода'),
(2, 'Хлеб'),
(3, 'Мясо'),
(4, 'Алкоголь');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'admin', 'admin@admin.ru', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `user_number` varchar(55) NOT NULL,
  `user_address` varchar(55) NOT NULL,
  `total_price` varchar(55) NOT NULL,
  `order_status` varchar(55) NOT NULL DEFAULT '0',
  `order_data` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_order`
--

INSERT INTO `user_order` (`id`, `user_id`, `user_name`, `user_number`, `user_address`, `total_price`, `order_status`, `order_data`) VALUES
(5, '1', 'admin', '', '', '30', '10', '2023-05-28'),
(6, '1', 'admin', '', '', '63', '1', '2023-05-28'),
(7, '1', 'admin', '', '', '30', '5', '2023-05-28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `prodcuts`
--
ALTER TABLE `prodcuts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `prodcuts`
--
ALTER TABLE `prodcuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
