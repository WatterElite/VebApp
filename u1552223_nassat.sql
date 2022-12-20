-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 16 2022 г., 20:31
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1552223_nassat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `api_info_users`
--

CREATE TABLE `api_info_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `api_id` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT NULL,
  `refferer` varchar(255) DEFAULT NULL,
  `ammout` float(11,2) NOT NULL DEFAULT '0.00',
  `referralCode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `api_info_users`
--

INSERT INTO `api_info_users` (`id`, `user_id`, `api_id`, `creationDate`, `refferer`, `ammout`, `referralCode`, `created_at`, `updated_at`) VALUES
(9, 31, '6375dfba03e1e223bf97f15a', '2022-11-17 04:16:10', 'Ольга🐞ДавыдоваДавыдова | ЧатБоты | Группы | Магазины', 10000.00, 'hI5gRAhyG', '2022-12-16 17:09:49', '2022-12-16 17:09:49'),
(10, 32, '61a0abdc5a87b32107543296', '2021-11-26 06:41:48', 'Jess от GS ®️', 350.00, 's9NcN4b8e', '2022-12-16 17:29:28', '2022-12-16 17:29:28');

-- --------------------------------------------------------

--
-- Структура таблицы `basket_items`
--

CREATE TABLE `basket_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `col` int(11) NOT NULL DEFAULT '1',
  `product_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `basket_items`
--

INSERT INTO `basket_items` (`id`, `user_id`, `col`, `product_id`, `created_at`, `updated_at`) VALUES
(16, 29, 1, '637d8bb587e85cd4faa89c88', '2022-12-16 16:55:20', '2022-12-16 16:55:20'),
(17, 29, 1, '637d8c0e87e85cd4faa8a139', '2022-12-16 16:55:24', '2022-12-16 16:55:24');

-- --------------------------------------------------------

--
-- Структура таблицы `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link_img` varchar(255) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `consultations`
--

INSERT INTO `consultations` (`id`, `user_id`, `link_img`, `text`, `created_at`, `updated_at`) VALUES
(1, 28, NULL, '123', '2022-12-16 03:03:23', '2022-12-16 03:03:23'),
(2, 28, '-152320843.png', '123', '2022-12-16 03:04:18', '2022-12-16 03:04:18'),
(3, 28, '/var/www/u1552223/data/www/webapp.garandsystem.com/laravel/public/temple/img/consultation/1671159938.png', '123', '2022-12-16 03:05:38', '2022-12-16 03:05:38'),
(4, 28, '/temple/img/consultation/1671159953.png', '123', '2022-12-16 03:05:53', '2022-12-16 03:05:53'),
(5, 28, NULL, '123123', '2022-12-16 03:35:16', '2022-12-16 03:35:16'),
(6, 26, NULL, 'Привет', '2022-12-16 03:36:38', '2022-12-16 03:36:38'),
(7, 26, NULL, 'Вопрос', '2022-12-16 03:38:32', '2022-12-16 03:38:32'),
(8, 29, NULL, '123', '2022-12-16 05:32:48', '2022-12-16 05:32:48'),
(9, 26, NULL, 'Привет', '2022-12-16 05:37:37', '2022-12-16 05:37:37'),
(10, 31, NULL, 'qewqe', '2022-12-16 17:25:31', '2022-12-16 17:25:31'),
(11, 31, NULL, 'Здравствуйте, меня заинтересовал товар \'Проект под ключ\'! Можете рассказать о нём больше?', '2022-12-16 17:25:42', '2022-12-16 17:25:42'),
(12, 31, '/temple/img/consultation/1671211572.jpg', 'Здравствуйте, меня заинтересовал товар \'Проект под ключ\'! Можете рассказать о нём больше?', '2022-12-16 17:26:12', '2022-12-16 17:26:12');

-- --------------------------------------------------------

--
-- Структура таблицы `consultation_phones`
--

CREATE TABLE `consultation_phones` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `consultation_phones`
--

INSERT INTO `consultation_phones` (`id`, `user_id`, `phone`, `created_at`, `updated_at`) VALUES
(1, 29, '+7(932) 307-40-40', '2022-12-16 07:39:22', '2022-12-16 07:39:22'),
(2, 26, '+7(960) 998-88-46', '2022-12-16 07:40:47', '2022-12-16 07:40:47'),
(3, 29, '+7(932) 307-40-40', '2022-12-16 07:43:04', '2022-12-16 07:43:04'),
(4, 31, '+7(932) 307-40-40', '2022-12-16 17:26:36', '2022-12-16 17:26:36');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `tg_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `language_code` varchar(4) NOT NULL DEFAULT 'ru',
  `userProfilePhoto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `tg_id`, `first_name`, `last_name`, `language_code`, `userProfilePhoto`, `remember_token`, `created_at`, `updated_at`) VALUES
(31, 1098228849, 'Виктор', 'Инспектор по...', 'ru', 'https://api.botboom.ru/www/uploads/GarandSystembot/file_202.jpg', 'UAf4webgydsjXlERb8V6Lym2XPcm7OZXyoOVP9MO3zddTPed1ITinxLHqhvm', '2022-12-16 17:09:49', '2022-12-16 17:09:49'),
(32, 304710365, 'Dmitry', 'T', 'ru', 'https://api.botboom.ru/www/uploads/progrewbot/file_5.jpg', 'dV2O7nuRHBZYxb5o64NOWVzMRVFv53KqoIHjAKZMIPfOiyVl6Z9QpkT8LVkX', '2022-12-16 17:29:28', '2022-12-16 17:29:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `api_info_users`
--
ALTER TABLE `api_info_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket_items`
--
ALTER TABLE `basket_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `consultation_phones`
--
ALTER TABLE `consultation_phones`
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
-- AUTO_INCREMENT для таблицы `api_info_users`
--
ALTER TABLE `api_info_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `basket_items`
--
ALTER TABLE `basket_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `consultation_phones`
--
ALTER TABLE `consultation_phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
