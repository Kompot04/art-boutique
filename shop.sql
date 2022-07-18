-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2022 г., 14:30
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 4, 'Катерина', 'katrin@gmail.com', '06305441212', 'Хочу подивитися ще більше сюжетів картин'),
(3, 2, 'Іван', 'ivan@gmail.com', '0630711414', 'Дуже сподобалися картини');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `address_delivery` varchar(100) NOT NULL,
  `total_products` text NOT NULL,
  `total_price` int(50) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'в очікуванні'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `payment_method`, `address_delivery`, `total_products`, `total_price`, `order_date`, `payment_status`) VALUES
(2, 4, 'Іваненко Катерина', '06305441212', 'katrin@gmail.com', 'післяплата', 'Відділення №21: вул. Космонавтів, 108/1, Миколаїв', ', Картина за номерами Прогулянка човном (1) , Картина за номерами Розумний песик (1) , Картина за номерами Джентльмен (1) ', 675, '29-May-2022', 'завершено'),
(4, 2, 'Сидорчук Іван', '0630711414', 'ivan@gmail.com', 'оплата картою', 'Відділення №21: вул. Космонавтів, 108/1, Миколаїв', ', Картина за номерами Розумний песик (1) , Картина за номерами Котик Захисник (1) ', 450, '30-May-2022', 'в очікуванні');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(4, ' Картина за номерами Місячний котик', '                    \r\nРозмір: 40x50 см;\r\nСкладність: ****', 225, 'IMG-6.jpg'),
(5, 'Картина за номерами Джентльмен', 'Розмір: 40x50 см; \r\n Складність: ***', 225, 'IMG-11.jpg'),
(6, 'Картина за номерами Фруктовий круасан', 'Розмір: 40x50 см; Складність: ***', 225, 'IMG-7.jpg'),
(7, 'Картина за номерами Флетлей з трояндами', 'Розмір: 40x50 см; Складність: ***', 225, 'IMG-5.jpg'),
(8, 'Картина за номерами Розумний песик', 'Розмір: 40x50 см; Складність: ***', 225, 'IMG-3.jpg'),
(9, 'Картина за номерами Котик Захисник', 'Розмір: 40x50 см; Складність: ****', 225, 'IMG-2.jpg'),
(12, 'Картина за номерами Прогулянка човном', 'Розмір: 40x50 см; Складність: ***', 240, 'IMG-10.png'),
(13, 'Картина за номерами Улюблений котик', 'Розмір: 40x50 см; Складність: ***', 225, 'IMG-8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Олена', 'lenab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'Іван', 'ivan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(3, 'Наталі', 'natali@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(4, 'Катя', 'katrin@gmail.com', '6fb42da0e32e07b61c9f0251fe627a9c', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `id_product`, `name`, `price`, `image`) VALUES
(6, 2, 5, 'Картина за номерами Джентльмен', 225, 'IMG-11.jpg'),
(7, 2, 13, 'Картина за номерами Улюблений котик', 225, 'IMG-8.jpg'),
(8, 2, 12, 'Картина за номерами Прогулянка човном', 240, 'IMG-10.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
