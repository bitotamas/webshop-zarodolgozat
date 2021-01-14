-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 14. 13:43
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `magmatech`
--
CREATE DATABASE IF NOT EXISTS `magmatech` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `magmatech`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `email`, `phone`, `address`) VALUES
(1, 'asd', NULL, 'dsa@dsa.dsa', '54854516468', 'nemn'),
(2, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '06209622341', 'NemMondomMeg'),
(3, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '06209622341', 'NemMondomMeg'),
(4, 'Mari Ilona', NULL, 'ilona.mari01@gmail.com', '06208513071', 'Nagykőrös'),
(5, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '485461848', 'sdudgsududshd'),
(6, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '485461848', 'sdudgsududshd'),
(7, 'Bito Tamás', NULL, 'bito.tamas51@gmail.com', '062095154', 'NemTudom'),
(8, 'asfsdfsdfas', NULL, 'fdfgsddfasdsd', 'fdfgsddas', 'sdfgdfgsdf'),
(9, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '06209451445', 'Nem'),
(10, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '06209518461', 'asddsaasd'),
(11, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062095146', 'asddsa'),
(12, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062096164841', 'asddsaasdsdas');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `status` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`) VALUES
(9, 9, 851000, '2021-01-14'),
(10, 10, 1500000, '2021-01-14'),
(11, 11, 430000, '2021-01-14'),
(12, 12, 320000, '2021-01-14');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(15, 9, 19, 1),
(16, 9, 31, 1),
(17, 9, 21, 1),
(18, 10, 18, 2),
(19, 10, 29, 1),
(20, 10, 33, 2),
(21, 10, 28, 1),
(22, 11, 9, 1),
(23, 11, 12, 1),
(24, 11, 18, 1),
(25, 12, 9, 1),
(26, 12, 15, 1),
(27, 12, 29, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(11) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `price` int(100) NOT NULL,
  `picture` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `picture`) VALUES
(8, 'gpu', 'GIGABYTE GeForce GTX 1650', 60000, 'gtx1650.jpg'),
(9, 'gpu', 'GIGABYTE GeForce GTX 1650 SUPER', 70000, 'gtx1650super.jpg'),
(10, 'gpu', 'GIGABYTE GeForce GTX 1660', 80000, 'gtx1660.jpg'),
(11, 'gpu', 'GIGABYTE GeForce GTX 1660 SUPER', 90000, 'gtx1660super.jpg'),
(12, 'gpu', 'GIGABYTE GeForce GTX 1660 Ti', 110000, 'gtx1660ti.jpg'),
(13, 'gpu', 'GIGABYTE GeForce RTX 2060', 130000, 'rtx2060.jpg'),
(14, 'gpu', 'GIGABYTE GeForce RTX 2060 SUPER', 150000, 'rtx2060super.jpg'),
(15, 'gpu', 'GIGABYTE GeForce RTX 2070', 170000, 'rtx2070.jpg'),
(16, 'gpu', 'GIGABYTE GeForce RTX 2070 SUPER', 200000, 'rtx2070super.jpg'),
(17, 'gpu', 'GIGABYTE GeForce RTX 2080', 230000, 'rtx2080.jpg'),
(18, 'gpu', 'GIGABYTE GeForce RTX 2080 SUPER', 250000, 'rtx2080super.jpg'),
(19, 'gpu', 'GIGABYTE GeForce RTX 2080 Ti', 341000, 'rtx2080ti.jpg'),
(20, 'gpu', 'GIGABYTE GeForce RTX 3060 Ti', 280000, 'rtx3060ti.jpg'),
(21, 'gpu', 'GIGABYTE GeForce RTX 3070', 360000, 'rtx3070.jpg'),
(22, 'gpu', 'GIGABYTE GeForce RTX 3080', 420000, 'rtx3080.jpg'),
(23, 'gpu', 'GIGABYTE GeForce RTX 3090', 780000, 'rtx3090.jpg'),
(24, 'gpu', 'SAPPHIRE Radeon RX 570', 62000, 'rx570.jpg'),
(25, 'gpu', 'SAPPHIRE Radeon RX 580', 72000, 'rx580.jpg'),
(26, 'gpu', 'SAPPHIRE Radeon RX 590', 89000, 'rx590.jpg'),
(27, 'gpu', 'SAPPHIRE Radeon RX Vega 56', 140000, 'rxvega56.jpg'),
(28, 'gpu', 'SAPPHIRE Radeon RX Vega 64', 160000, 'rxvega64.jpg'),
(29, 'gpu', 'SAPPHIRE Radeon RX 5500 XT', 80000, 'rx5500xt.jpg'),
(30, 'gpu', 'SAPPHIRE Radeon RX 5600 XT', 120000, 'rx5600xt.jpg'),
(31, 'gpu', 'SAPPHIRE Radeon RX 5700', 150000, 'rx5700.jpg'),
(32, 'gpu', 'SAPPHIRE Radeon RX 5700 XT', 180000, 'rx5700xt.jpg'),
(33, 'gpu', 'SAPPHIRE Radeon RX 6800 XT', 380000, 'rx6800xt.jpg'),
(34, 'gpu', 'SAPPHIRE Radeon RX 6900 XT', 620000, 'rx6900xt.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- A tábla indexei `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Megkötések a táblához `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
