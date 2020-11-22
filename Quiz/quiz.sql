-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Nov 22. 13:36
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
-- Adatbázis: `quiz`
--
CREATE DATABASE IF NOT EXISTS `quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `quiz`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek`
--

DROP TABLE IF EXISTS `kerdesek`;
CREATE TABLE `kerdesek` (
  `id` int(11) NOT NULL,
  `kerdes` text COLLATE utf8_hungarian_ci NOT NULL,
  `valasz1` text COLLATE utf8_hungarian_ci NOT NULL,
  `valasz2` text COLLATE utf8_hungarian_ci NOT NULL,
  `valasz3` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kerdesek`
--

INSERT INTO `kerdesek` (`id`, `kerdes`, `valasz1`, `valasz2`, `valasz3`) VALUES
(1, 'A felsoroltak közül, mi Görögország jellegzetes itala?', 'Beherovka', 'Vodka', 'Ouzo'),
(2, 'Hová sorolható be a béka?', 'Hüllők', 'Kétéltű', 'Puhatestű'),
(3, 'Egy futó hét napon át napi 10 km-t fut. Mennyit fut egy hét alatt összesen?', '7000m', '70000m', '700000m'),
(4, 'Ki volt a gőzgép feltalálója?', 'Robert Fulton', 'George Stephenson', 'James Watt'),
(5, 'Melyik NEM a lúd elnevezése?', 'liba', 'gúnár', 'gácsér'),
(6, 'Melyik városon NEM folyik keresztül a Duna?', 'Komárom', 'Gödöllő', 'Paks'),
(7, 'Melyik elemnek áll egy betűből a vegyjele?', 'réz', 'szén', 'vas'),
(8, 'Hány deciliter 7 és fél liter?', '75dl', '750dl', '7500dl'),
(9, 'Milyen mázzal borították a Majolikákat?', 'Ónmáz', 'Terracolormáz', 'Fazekasmáz'),
(10, 'Mi a fény három alapszíne?', 'Piros-Zöld-Kék', 'Piros-Sárga-Kék', 'Kék-Sárga-Rózsaszín');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megoldasok`
--

DROP TABLE IF EXISTS `megoldasok`;
CREATE TABLE `megoldasok` (
  `id` int(11) NOT NULL,
  `megoldas` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `megoldasok`
--

INSERT INTO `megoldasok` (`id`, `megoldas`) VALUES
(1, 'Ouzo'),
(2, 'Kétéltű'),
(3, '70000m'),
(4, 'James Watt'),
(5, 'gácsér'),
(6, 'Gödöllő'),
(7, 'szén'),
(8, '75dl'),
(9, 'Ónmáz'),
(10, 'Piros-Zöld-Kék');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kerdesek`
--
ALTER TABLE `kerdesek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `megoldasok`
--
ALTER TABLE `megoldasok`
  ADD PRIMARY KEY (`id`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `megoldasok`
--
ALTER TABLE `megoldasok`
  ADD CONSTRAINT `megoldasok_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kerdesek` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
