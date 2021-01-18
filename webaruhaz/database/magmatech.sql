-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 18. 09:08
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
(12, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062096164841', 'asddsaasdsdas'),
(13, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062046418455', '548554dfsdfsd'),
(14, 'asdasdasdasda', NULL, 'bito.tamas51@gmail.com', '062046158', '1545154dfgds'),
(15, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062065451651', 'sdfsdfsdgfg4df854'),
(16, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062659656', 'sdfdg5sdf985d'),
(17, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062096154', 'sdf4sdf854s'),
(18, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '0620191444541', 'asdasdf54fg65sdf'),
(19, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '062096125151', 'fsdfhasds154'),
(20, 'Bitó Tamás', NULL, 'bito.tamas51@gmail.com', '06204845484', 'fuhasdasdjeudha'),
(21, 'Bitó Tamás', NULL, 'laszlo.bito@kramp.com', '06254854165', 'asfdffasddf');

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
(12, 12, 320000, '2021-01-14'),
(13, 13, 280000, '2021-01-14'),
(14, 14, 140000, '2021-01-14'),
(15, 15, 170000, '2021-01-14'),
(16, 16, 200000, '2021-01-14'),
(17, 17, 150000, '2021-01-14'),
(18, 18, 360000, '2021-01-14'),
(19, 19, 80000, '2021-01-14'),
(20, 20, 220000, '2021-01-14'),
(21, 21, 910000, '2021-01-14');

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
(27, 12, 29, 1),
(28, 13, 20, 1),
(29, 14, 27, 1),
(30, 15, 15, 1),
(31, 16, 16, 1),
(32, 17, 31, 1),
(33, 18, 21, 1),
(34, 19, 29, 1),
(35, 20, 12, 2),
(36, 21, 17, 2),
(37, 21, 31, 3);

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
(34, 'gpu', 'SAPPHIRE Radeon RX 6900 XT', 620000, 'rx6900xt.jpg'),
(35, 'cpu', 'Intel Core i9-10900K', 150000, 'i9-10900k.jpg'),
(36, 'cpu', 'Intel Core i9-10900KF', 145000, 'i9-10900kf.jpg'),
(37, 'cpu', 'Intel Core i9-10900', 140000, 'i9-10900.jpg'),
(38, 'cpu', 'Intel Core i9-10900F', 135000, 'i9-10900f.jpg'),
(39, 'cpu', 'Intel Core i9-10900T', 138000, 'i9-10900t.jpg'),
(40, 'cpu', 'Intel Core i9-10850K', 139000, 'i9-10850k.jpg'),
(41, 'cpu', 'Intel Core i7-10700K', 120000, 'i7-10700k.jpg'),
(42, 'cpu', 'Intel Core i7-10700KF', 115000, 'i7-10700kf.jpg'),
(43, 'cpu', 'Intel Core i7-10700', 110000, 'i7-10700.jpg'),
(44, 'cpu', 'Intel Core i7-10700F', 100000, 'i7-10700f.jpg'),
(45, 'cpu', 'Intel Core i7-10700T', 101000, 'i7-10700t.jpg'),
(46, 'cpu', 'Intel Core i5-10600K', 90000, 'i5-10600k.jpg'),
(47, 'cpu', 'Intel Core i5-10600KF', 91000, 'i5-10600kf.jpg'),
(48, 'cpu', 'Intel Core i5-10600', 85000, 'i5-10600.jpg'),
(49, 'cpu', 'Intel Core i5-10600T', 86000, 'i5-10600t.jpg'),
(50, 'cpu', 'Intel Core i5-10500', 81000, 'i5-10500.jpg'),
(51, 'cpu', 'Intel Core i5-10500T', 83000, 'i5-10500t.jpg'),
(52, 'cpu', 'Intel Core i5-10400', 80000, 'i5-10400.jpg'),
(53, 'cpu', 'Intel Core i5-10400F', 78000, 'i5-10400f.jpg'),
(54, 'cpu', 'Intel Core i3-10320', 68000, 'i3-10320.jpg'),
(55, 'cpu', 'Intel Core i3-10300', 69000, 'i3-10300.jpg'),
(56, 'cpu', 'Intel Core i3-10100', 56000, 'i3-10100.jpg'),
(57, 'cpu', 'Intel Core i3-10100F', 60000, 'i3-10100f.jpg'),
(58, 'cpu', 'Intel Core i3-10100E', 62000, 'i3-10100e.jpg'),
(59, 'cpu', 'AMD Ryzen 3 1200', 30000, 'ryzen-3-1200.jpg'),
(60, 'cpu', 'AMD Ryzen 3 1300X', 35000, 'ryzen-3-1300x.jpg'),
(61, 'cpu', 'AMD Ryzen 5 1400', 40000, 'ryzen-5-1400.jpg'),
(62, 'cpu', 'AMD Ryzen 5 1500X', 42000, 'ryzen-5-1500x.jpg'),
(63, 'cpu', 'AMD Ryzen 5 1600 ', 45000, 'ryzen-5-1600.jpg'),
(64, 'cpu', 'AMD Ryzen 5 1600X', 47000, 'ryzen-5-1600x.jpg'),
(65, 'cpu', 'AMD Ryzen 7 1700', 48000, 'ryzen-7-1700.jpg'),
(66, 'cpu', 'AMD Ryzen 7 1700X', 49000, 'ryzen-7-1700x.jpg'),
(67, 'cpu', 'AMD Ryzen 1800X', 50000, 'ryzen-7-1800x.jpg'),
(68, 'cpu', 'AMD Ryzen 5 2600', 55000, 'ryzen-5-2600.jpg'),
(69, 'cpu', 'AMD Ryzen 5 2600X', 60000, 'ryzen-5-2600x.jpg'),
(70, 'cpu', 'AMD Ryzen 7 2700', 70000, 'ryzen-7-2700.jpg'),
(71, 'cpu', 'AMD Ryzen 7 2700X', 75000, 'ryzen-7-2700x.jpg'),
(72, 'cpu', 'AMD Ryzen 3 3100', 70000, 'ryzen-3-3100.jpg'),
(73, 'cpu', 'AMD Ryzen 3 3300X', 72000, 'ryzen-3-3300x.jpg'),
(74, 'cpu', 'AMD Ryzen 5 3600', 78000, 'ryzen-5-3600.jpg'),
(75, 'cpu', 'AMD Ryzen 5 3600X', 85000, 'ryzen-5-3600x.jpg'),
(76, 'cpu', 'AMD Ryzen 5 3600XT', 90000, 'ryzen-5-3600xt.jpg'),
(77, 'cpu', 'AMD Ryzen 7 3700X', 110000, 'ryzen-7-3700x.jpg'),
(78, 'cpu', 'AMD Ryzen 7 3800X', 130000, 'ryzen-7-3800x.jpg'),
(79, 'cpu', 'AMD Ryzen 7 3800XT', 140000, 'ryzen-7-3800xt.jpg'),
(80, 'cpu', 'AMD Ryzen 3900X', 150000, 'ryzen-9-3900x.jpg'),
(81, 'cpu', 'AMD Ryzen 3900XT', 160000, 'ryzen-9-3900xt.jpg'),
(82, 'cpu', 'AMD Ryzen 3950X', 162000, 'ryzen-9-3950x.jpg'),
(83, 'cpu', 'AMD Ryzen 5 5600X', 142000, 'ryzen-5-5600x.jpg'),
(84, 'cpu', 'AMD Ryzen 7 5800', 180000, 'ryzen-7-5800.jpg'),
(85, 'cpu', 'AMD Ryzen 7 5800X', 200000, 'ryzen-7-5800x.jpg'),
(86, 'cpu', 'AMD Ryzen 9 5900X', 230000, 'ryzen-9-5900x.jpg'),
(87, 'cpu', 'AMD Ryzen 9 5950X', 240000, 'ryzen-9-5950x.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
