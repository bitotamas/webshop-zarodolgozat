-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 20. 18:47
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
  `permission` tinyint(1) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`id`, `permission`, `name`, `password`, `email`, `phone`) VALUES
(1, 1, 'admin', '$2y$10$PsJmTDELFM5qphw0D5t1kuuKHw7X1f/aPXRSXFmRG6MrjJ4GZ2RI.', 'mtwebaruhaz@gmail.com', '0620696969'),
(25, 0, 'Mari Ilona', '$2y$10$6SVy/ouTxB1FOdTiw.sEH.bXA/CfGl2SiJQ.agS7L00.MPJb9uvzi', 'ilona.mari01@gmail.com', '06209515452'),
(26, 0, 'Bitó Tamás', '$2y$10$srQGnuw3VK0isQMyZrht1Ofv8U6Uc.kBgdfRWXb5STLHtBzj9Gx7i', 'bito.tamas51@gmail.com', '62069696969'),
(27, 0, 'teszter', '$2y$10$9/exMNrNIimtupVBe47BHOikptPcXy5cy1bLoTls4C2zqba0XaaKC', 'igen@igen.igen', '0620961121451');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `status` date NOT NULL,
  `postcode` int(4) NOT NULL,
  `city` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `street` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `housenumber` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `postcode`, `city`, `street`, `housenumber`) VALUES
(36, 26, 280000, '2021-03-31', 6000, 'Kecskemét', 'Bogovics köz', 15),
(37, 26, 72000, '2021-04-11', 6000, 'Kecskemét', 'Igen', 69),
(38, 26, 200000, '2021-04-12', 1234, 'asd', 'asd', 12);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(55, 36, 20, 1),
(56, 37, 73, 1),
(57, 38, 16, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(11) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `price` int(100) NOT NULL,
  `picture` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `picture`, `quantity`) VALUES
(8, 'gpu', 'GIGABYTE GeForce GTX 1650', 60000, 'gtx1650.jpg', 3),
(9, 'gpu', 'GIGABYTE GeForce GTX 1650 SUPER', 70000, 'gtx1650super.jpg', 15),
(10, 'gpu', 'GIGABYTE GeForce GTX 1660', 80000, 'gtx1660.jpg', 2),
(11, 'gpu', 'GIGABYTE GeForce GTX 1660 SUPER', 90000, 'gtx1660super.jpg', 7),
(12, 'gpu', 'GIGABYTE GeForce GTX 1660 Ti', 110000, 'gtx1660ti.jpg', 8),
(13, 'gpu', 'GIGABYTE GeForce RTX 2060', 130000, 'rtx2060.jpg', 9),
(14, 'gpu', 'GIGABYTE GeForce RTX 2060 SUPER', 150000, 'rtx2060super.jpg', 0),
(15, 'gpu', 'GIGABYTE GeForce RTX 2070', 170000, 'rtx2070.jpg', 0),
(16, 'gpu', 'GIGABYTE GeForce RTX 2070 SUPER', 200000, 'rtx2070super.jpg', 9),
(17, 'gpu', 'GIGABYTE GeForce RTX 2080', 230000, 'rtx2080.jpg', 8),
(18, 'gpu', 'GIGABYTE GeForce RTX 2080 SUPER', 250000, 'rtx2080super.jpg', 9),
(19, 'gpu', 'GIGABYTE GeForce RTX 2080 Ti', 341000, 'rtx2080ti.jpg', 10),
(20, 'gpu', 'GIGABYTE GeForce RTX 3060 Ti', 280000, 'rtx3060ti.jpg', 9),
(21, 'gpu', 'GIGABYTE GeForce RTX 3070', 360000, 'rtx3070.jpg', 9),
(22, 'gpu', 'GIGABYTE GeForce RTX 3080', 420000, 'rtx3080.jpg', 10),
(23, 'gpu', 'GIGABYTE GeForce RTX 3090', 780000, 'rtx3090.jpg', 10),
(24, 'gpu', 'SAPPHIRE Radeon RX 570', 62000, 'rx570.jpg', 10),
(25, 'gpu', 'SAPPHIRE Radeon RX 580', 72000, 'rx580.jpg', 10),
(26, 'gpu', 'SAPPHIRE Radeon RX 590', 89000, 'rx590.jpg', 10),
(27, 'gpu', 'SAPPHIRE Radeon RX Vega 56', 140000, 'rxvega56.jpg', 10),
(28, 'gpu', 'SAPPHIRE Radeon RX Vega 64', 160000, 'rxvega64.jpg', 10),
(29, 'gpu', 'SAPPHIRE Radeon RX 5500 XT', 80000, 'rx5500xt.jpg', 10),
(30, 'gpu', 'SAPPHIRE Radeon RX 5600 XT', 120000, 'rx5600xt.jpg', 10),
(31, 'gpu', 'SAPPHIRE Radeon RX 5700', 150000, 'rx5700.jpg', 10),
(32, 'gpu', 'SAPPHIRE Radeon RX 5700 XT', 180000, 'rx5700xt.jpg', 10),
(33, 'gpu', 'SAPPHIRE Radeon RX 6800 XT', 380000, 'rx6800xt.jpg', 10),
(34, 'gpu', 'SAPPHIRE Radeon RX 6900 XT', 620000, 'rx6900xt.jpg', 10),
(35, 'cpu', 'Intel Core i9-10900K', 150000, 'i9-10900k.jpg', 10),
(36, 'cpu', 'Intel Core i9-10900KF', 145000, 'i9-10900kf.jpg', 10),
(37, 'cpu', 'Intel Core i9-10900', 140000, 'i9-10900.jpg', 9),
(38, 'cpu', 'Intel Core i9-10900F', 135000, 'i9-10900f.jpg', 10),
(39, 'cpu', 'Intel Core i9-10900T', 138000, 'i9-10900t.jpg', 10),
(40, 'cpu', 'Intel Core i9-10850K', 139000, 'i9-10850k.jpg', 10),
(41, 'cpu', 'Intel Core i7-10700K', 120000, 'i7-10700k.jpg', 10),
(42, 'cpu', 'Intel Core i7-10700KF', 115000, 'i7-10700kf.jpg', 10),
(43, 'cpu', 'Intel Core i7-10700', 110000, 'i7-10700.jpg', 10),
(44, 'cpu', 'Intel Core i7-10700F', 100000, 'i7-10700f.jpg', 10),
(45, 'cpu', 'Intel Core i7-10700T', 101000, 'i7-10700t.jpg', 10),
(46, 'cpu', 'Intel Core i5-10600K', 90000, 'i5-10600k.jpg', 10),
(47, 'cpu', 'Intel Core i5-10600KF', 91000, 'i5-10600kf.jpg', 0),
(48, 'cpu', 'Intel Core i5-10600', 85000, 'i5-10600.jpg', 0),
(49, 'cpu', 'Intel Core i5-10600T', 86000, 'i5-10600t.jpg', 10),
(50, 'cpu', 'Intel Core i5-10500', 81000, 'i5-10500.jpg', 10),
(51, 'cpu', 'Intel Core i5-10500T', 83000, 'i5-10500t.jpg', 10),
(52, 'cpu', 'Intel Core i5-10400', 80000, 'i5-10400.jpg', 10),
(53, 'cpu', 'Intel Core i5-10400F', 78000, 'i5-10400f.jpg', 10),
(54, 'cpu', 'Intel Core i3-10320', 68000, 'i3-10320.jpg', 0),
(55, 'cpu', 'Intel Core i3-10300', 69000, 'i3-10300.jpg', 10),
(56, 'cpu', 'Intel Core i3-10100', 56000, 'i3-10100.jpg', 10),
(57, 'cpu', 'Intel Core i3-10100F', 60000, 'i3-10100f.jpg', 10),
(58, 'cpu', 'Intel Core i3-10100E', 62000, 'i3-10100e.jpg', 0),
(59, 'cpu', 'AMD Ryzen 3 1200', 30000, 'ryzen-3-1200.jpg', 10),
(60, 'cpu', 'AMD Ryzen 3 1300X', 35000, 'ryzen-3-1300x.jpg', 8),
(61, 'cpu', 'AMD Ryzen 5 1400', 40000, 'ryzen-5-1400.jpg', 10),
(62, 'cpu', 'AMD Ryzen 5 1500X', 42000, 'ryzen-5-1500x.jpg', 0),
(63, 'cpu', 'AMD Ryzen 5 1600 ', 45000, 'ryzen-5-1600.jpg', 10),
(64, 'cpu', 'AMD Ryzen 5 1600X', 47000, 'ryzen-5-1600x.jpg', 10),
(65, 'cpu', 'AMD Ryzen 7 1700', 48000, 'ryzen-7-1700.jpg', 0),
(66, 'cpu', 'AMD Ryzen 7 1700X', 49000, 'ryzen-7-1700x.jpg', 10),
(67, 'cpu', 'AMD Ryzen 1800X', 50000, 'ryzen-7-1800x.jpg', 0),
(68, 'cpu', 'AMD Ryzen 5 2600', 55000, 'ryzen-5-2600.jpg', 10),
(69, 'cpu', 'AMD Ryzen 5 2600X', 60000, 'ryzen-5-2600x.jpg', 10),
(70, 'cpu', 'AMD Ryzen 7 2700', 70000, 'ryzen-7-2700.jpg', 10),
(71, 'cpu', 'AMD Ryzen 7 2700X', 75000, 'ryzen-7-2700x.jpg', 10),
(72, 'cpu', 'AMD Ryzen 3 3100', 70000, 'ryzen-3-3100.jpg', 0),
(73, 'cpu', 'AMD Ryzen 3 3300X', 72000, 'ryzen-3-3300x.jpg', 9),
(74, 'cpu', 'AMD Ryzen 5 3600', 78000, 'ryzen-5-3600.jpg', 10),
(75, 'cpu', 'AMD Ryzen 5 3600X', 85000, 'ryzen-5-3600x.jpg', 0),
(76, 'cpu', 'AMD Ryzen 5 3600XT', 90000, 'ryzen-5-3600xt.jpg', 10),
(77, 'cpu', 'AMD Ryzen 7 3700X', 110000, 'ryzen-7-3700x.jpg', 10),
(78, 'cpu', 'AMD Ryzen 7 3800X', 130000, 'ryzen-7-3800x.jpg', 10),
(79, 'cpu', 'AMD Ryzen 7 3800XT', 140000, 'ryzen-7-3800xt.jpg', 10),
(80, 'cpu', 'AMD Ryzen 3900X', 150000, 'ryzen-9-3900x.jpg', 10),
(81, 'cpu', 'AMD Ryzen 3900XT', 160000, 'ryzen-9-3900xt.jpg', 10),
(82, 'cpu', 'AMD Ryzen 3950X', 162000, 'ryzen-9-3950x.jpg', 0),
(83, 'cpu', 'AMD Ryzen 5 5600X', 142000, 'ryzen-5-5600x.jpg', 10),
(84, 'cpu', 'AMD Ryzen 7 5800', 180000, 'ryzen-7-5800.jpg', 10),
(85, 'cpu', 'AMD Ryzen 7 5800X', 200000, 'ryzen-7-5800x.jpg', 0),
(86, 'cpu', 'AMD Ryzen 9 5900X', 230000, 'ryzen-9-5900x.jpg', 10),
(87, 'cpu', 'AMD Ryzen 9 5950X', 240000, 'ryzen-9-5950x.jpg', 10),
(88, 'memory', 'Kingston HyperX FURY 16GB (2x8GB) DDR4 3200MHz', 34000, 'kingston-hyperx-fury-16gb-2x8gb-ddr4-3200mhz.jpg', 10),
(89, 'memory', 'Kingston HyperX FURY 8GB (1x8GB) DDR4 3200MHz', 28000, 'kingston-hyperx-fury-8gb-ddr4-3200mhz.jpg', 10),
(90, 'memory', 'Kingston HyperX FURY 8GB (2x4GB) DDR4 3200MHz', 17000, 'kingston-hyperx-fury-8gb-2x4gb-ddr4-3200mhz.jpg', 0),
(91, 'memory', 'Kingston HyperX FURY 64GB (4x16GB) DDR4 3200MHz', 130000, 'kingston-hyperx-fury-64gb-4x16gb-ddr4-3200mhz.jpg', 10),
(92, 'memory', 'Kingston HyperX FURY 16GB (2x8GB) DDR4 2933MHz', 32000, 'kingston-hyperx-fury-16gb-2x8gb-ddr4-2933mhz.jpg', 10),
(93, 'memory', 'Kingston HyperX FURY 8GB (1x8GB) DDR4 2933MHz', 26000, 'kingston-hyperx-fury-8gb-ddr4-2933mhz.jpg', 10),
(94, 'memory', 'Kingston HyperX FURY 8GB (2x4GB) DDR4 2933MHz', 16000, 'kingston-hyperx-fury-8gb-2x4gb-ddr4-2933mhz.jpg', 0),
(95, 'memory', 'Kingston HyperX FURY 16GB (1x16GB) DDR4 2933MHz', 23000, 'kingston-hyperx-fury-16gb-ddr4-2933mhz.jpg', 8),
(96, 'memory', 'Kingston HyperX Predator 16GB (2x8GB) DDR4 3000MHz', 36000, 'kingston-hyperx-predator-16gb-2x8gb-ddr4-3000mhz.jpg', 9),
(97, 'memory', 'Kingston HyperX Predator 16GB (1x16GB) DDR4 3200MHz', 38000, 'kingston-hyperx-predator-16gb-1x16gb-ddr4-3200mhz.jpg', 10),
(98, 'memory', 'Kingston HyperX Predator 16GB (2x8GB) DDR4 3200MHz', 37000, 'kingston-hyperx-predator-16gb-2x8gb-ddr4-3200mhz.jpg', 0),
(99, 'memory', 'Kingston HyperX Predator RGB 16GB (2x8GB) DDR4 3200MHz', 38000, 'kingston-hyperx-predator-rgb-16gb-2x8gb-ddr4-3200mhz.jpg', 10),
(100, 'memory', 'Kingston HyperX Predator RGB 8GB (1x8GB) DDR4 3200MHz', 32000, 'kingston-hyperx-predator-rgb-8gb-ddr4-3200mhz.jpg', 0),
(101, 'memory', 'Kingston HyperX Predator 16GB (2x8GB) DDR4 2933MHz', 36000, 'kingston-hyperx-predator-16gb-2x8gb-ddr4-2933mhz.jpg', 10),
(102, 'memory', 'Kingston HyperX Predator 8GB (1x8GB) DDR4 2933MHz', 30000, 'kingston-hyperx-predator-8gb-ddr4-2933mhz.jpg', 10),
(109, 'gpu', 'TESZT', 9999999, 'teszt.gif', 10),
(111, 'storage', 'Seagate BarraCuda 3.5 2TB 7200rpm 256MB SATA3', 18212, 'segatebarracuda2tb.jpg', 8),
(112, 'storage', 'Western Digital Caviar Blue 3.5 1TB 7200rpm 64MB SATA3', 13392, 'wdblue1tb.jpg', 6),
(113, 'storage', 'Western Digital Purple 3.5 10TB 7200rpm 256MB SATA3', 125420, 'wdpurple10tb.jpg', 9),
(114, 'storage', 'Toshiba P300 3.5 3TB 7200rpm 64MB SATA3', 21500, 'toshiba3tb.jpg', 12),
(115, 'storage', 'Seagate BarraCuda 2.5 1TB 5400rpm 128MB SATA3', 13790, 'segatebarracuda1tb.jpg', 11),
(116, 'storage', 'Western Digital Red 3.5 4TB 5400rpm 64MB SATA3', 40800, 'wdred4tb.jpg', 1),
(117, 'storage', 'Toshiba P300 3.5 1TB 7200rpm 64MB SATA3', 11990, 'toshiba1tb.jpg', 2),
(118, 'storage', 'Western Digital?Blue 3.5 4TB 5400rpm 64MB SATA3', 29100, 'wdblue4tb.jpg', 3),
(119, 'storage', 'Western Digital?Blue 2TB 256MB 5400rpm SATA3', 16680, 'wdblue2tb.jpg', 3),
(120, 'storage', 'Toshiba P300 3.5 2TB 7200rpm 64MB SATA3', 17590, 'toshiba2tb.jpg', 3),
(121, 'storage', 'Kingston A400 2.5 240GB SATA3', 11890, 'kingston240gb.jpg', 7),
(122, 'storage', 'Samsung 970 EVO Plus 500GB', 32390, 'samsung970evo500gb.jpg', 5),
(123, 'storage', 'Samsung 870 QVO 2.5 1TB', 33630, 'samsung870qvo1tb.jpg', 5),
(124, 'storage', 'Kingston A400 2.5 480GB SATA3', 18990, 'kingston480gb.jpg', 4),
(125, 'storage', 'Kingston A2000 1TB', 39990, 'kingstona2000-1tb.jpg', 4),
(126, 'storage', 'Samsung 2.5 870 EVO 500GB SATA3', 22990, 'samsung870-500gb.jpg', 4),
(127, 'storage', 'Western Digital Blue 3D NAND 2.5 500GB SATA3', 21690, 'wdblue500gb.jpg', 0),
(128, 'storage', 'Western Digital Green 2.5 240GB SATA3', 12290, 'wdgreen240gb.jpg', 9),
(129, 'storage', 'Western Digital Blue 3D NAND 2.5 250GB SATA3', 13690, 'wdblue250gb.jpg', 7),
(130, 'storage', 'Western Digital Green 2.5 120GB SATA3', 10290, 'wdgreen120gb.jpg', 5),
(131, 'category', 'name', 0, 'picture', 0),
(132, 'psu', 'Cooler Master Elite V3 600W', 17390, 'cm600w.jpg', 5),
(133, 'psu', 'Corsair RM750 750W', 42300, 'corsairrm750w.jpg', 7),
(134, 'psu', 'SilentiumPC Supremo FM2 750W Gold', 37990, 'silentium750wgold.jpg', 7),
(135, 'psu', 'Seasonic Core GC 650W Gold', 25990, 'seasonic650wgold.jpg', 8),
(136, 'psu', 'Seasonic FOCUS GX-850W Gold', 55030, 'seasonic850wgold.jpg', 0),
(137, 'psu', 'FSP Hydro PRO 700W Bronze', 24180, 'fsp700w.jpg', 0),
(138, 'psu', 'Cooler Master Elite V3 230V 500W', 13780, 'cm500w.jpg', 1),
(139, 'psu', 'Corsair TX-M Series TX750M 750W Gold', 37090, 'corsairtx-m750w.jpg', 9),
(140, 'psu', 'Corsair AX1600i 1600W Titanium', 215840, 'corsairax1600w.jpg', 2),
(141, 'psu', 'Seasonic FOCUS GX-550W Gold', 33340, 'seasonicfocus550w.jpg', 3),
(142, 'psu', 'Corsair RM850 850W', 52390, 'corsair850w.jpg', 7),
(143, 'psu', 'Approx APP500LITEB02 500W', 5390, 'approx500w.jpg', 4),
(144, 'psu', 'SilentiumPC Supremo FM2 650W Gold', 35490, 'silentium650wgold.jpg', 6),
(145, 'psu', 'Zalman ZM1200-ARX 1200W Platinum', 74663, 'zalman1200w.jpg', 8),
(146, 'psu', 'GIGABYTE P850GM 850w 80 Plus Gold', 43190, 'gigabyte850w.jpg', 11),
(147, 'psu', 'be quiet! Pure Power 11 CM 600W Gold', 32950, 'bequiet600w.jpg', 30),
(148, 'psu', 'FSP Hydro GSM Lite Pro 750W 80 Plus Gold', 33970, 'fsphydro750.jpg', 20),
(149, 'psu', 'Kolink Core 600W', 14150, 'kolink600w.jpg', 8),
(150, 'psu', 'Corsair RMx Series RM850x 2018 850W Gold', 60990, 'corsairrmx850.jpg', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

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
