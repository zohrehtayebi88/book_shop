-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Aug 2021 um 09:19
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `con`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'admin', '2021-08-05 19:25:47', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buch`
--

CREATE TABLE `buch` (
  `id` int(255) NOT NULL,
  `name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thema` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letzte_datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preis` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschreibung` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `discount` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `discount_preis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `buch`
--

INSERT INTO `buch` (`id`, `name`, `autor`, `thema`, `img`, `letzte_datum`, `preis`, `beschreibung`, `quantity`, `discount`, `discount_preis`) VALUES
(1, 'pepapig', 'maria      ', 'Kinder', '106Unbenannt3.png', '2021-08-27 11:12:18', '8.10', 'test testtest testtest testfdgfdfgd', 0, '1', '3.00'),
(2, 'Löwe', 'SARA       ', 'Natur', '106Unbenannt3.png', '2021-08-27 11:11:20', '5.00', 'teeeeeest\r\nteeeeeeeeeeeeeeeeeeeeeeeeeest', 9, '1', '2.00'),
(3, 'sell', 'j.p.sali  ', 'IT', 'sell.jpg', '2021-08-27 08:44:00', '13.99', 'xcsdadasd', 3, '1', '8.99'),
(4, 'test', 'test', 'Kinder', 'image3.jpg', '2021-08-12 19:50:47', '20.00', 'ztrtz', 1, '0', '0'),
(5, 'hallo world', 'mr.joe     ', 'Natur', 'image1.jpg', '2021-08-12 19:51:00', '10.50', 'gtgtgtgt', 5, '1', '2.50'),
(106, 'leben', 'SARA', 'Roman', 'Unbenannt3.png', '2021-08-10 13:21:35', '6.00', 'test test testtest test testtest test test\r\ntest test testtest test testtest test test\r\ntest test testtest test testtest test testtest test test\r\ntest test testtest test testtest test test\r\ntest test testtest test testtest test test\r\n', 8, '0', '0'),
(107, 'berge', 'tim tim  ', 'IT', 'image3.jpg', '2021-08-10 13:21:41', '12.30', 'eeeee', 6, '0', ''),
(109, 'libe', 'f.j.k', 'Roman', 'image3.jpg', '2021-08-17 07:16:48', '5.50', '<b>mmm</b>vbhgfk g  hgjdfkgndfjkgh dfjfhd jfhjdkfjd hjfsd jfhsdjf sdgfjsdjf sjfsdjf sdfhsdjf sds fhsdfgsdj hjsdgfsd fhjs ', 3, '0', '0');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id_category` varchar(20) COLLATE utf8_bin NOT NULL,
  `thema_category` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id_category`, `thema_category`) VALUES
('1', 'Kinder'),
('2', 'Natur'),
('3', 'IT'),
('4', 'Roman');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shop`
--

CREATE TABLE `shop` (
  `id` int(255) NOT NULL,
  `shop_n` int(255) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_preis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `exp_datum` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `shop`
--

INSERT INTO `shop` (`id`, `shop_n`, `user_id`, `product_id`, `product_preis`, `product_name`, `quantity`, `datum`, `exp_datum`) VALUES
(60, 58, '211', 2, '', 'Löwe', '3', '2021-01-31 23:00:00', '2021-05-11 22:00:00'),
(61, 59, '211', 1, '', 'pepa', '3', '2021-08-02 22:00:00', '2021-07-12 22:00:00'),
(62, 59, '211', 5, '', 'hj', '1', '2021-08-02 22:00:00', '2021-07-12 22:00:00'),
(63, 59, '211', 4, '', 'xc ', '2', '2021-08-02 22:00:00', '2021-07-12 22:00:00'),
(64, 59, '211', 106, '', 'leben', '2', '2021-08-02 22:00:00', '2021-07-12 22:00:00'),
(65, 60, '211', 2, '', 'Löwe', '2', '2021-08-02 22:00:00', '2021-11-09 23:00:00'),
(96, 61, '211', 106, '6', 'leben', '3', '2021-08-04 06:45:11', '2021-08-04 08:23:51'),
(97, 62, '211', 1, '8', 'pepa', '1', '2021-08-04 08:09:59', '2021-08-04 08:23:51'),
(98, 63, '211', 2, '5', 'Löwe', '2', '2021-08-04 08:25:27', '2021-08-04 08:25:27'),
(99, 64, '210', 2, '5.55', 'Löwe', '1', '2021-08-04 10:19:58', '2021-08-04 10:19:58'),
(100, 65, '210', 2, '5.99', 'Löwe', '2', '2021-08-04 10:24:05', '2021-11-04 11:24:05'),
(101, 66, '210', 5, '10.35', 'hj', '3', '2021-08-04 10:25:07', '2021-11-04 11:25:07'),
(102, 66, '210', 4, '20.00', 'xc ', '2', '2021-08-04 10:25:07', '2021-11-04 11:25:07'),
(103, 66, '210', 1, '8.00', 'pepa', '1', '2021-08-04 10:25:07', '2021-11-04 11:25:07'),
(105, 67, '210', 4, '20.00', 'xc ', '0', '2021-08-12 11:26:37', '2021-11-12 12:26:37'),
(106, 68, '210', 4, '20.00', 'xc ', '1', '2021-08-12 12:19:11', '2021-11-12 13:19:11'),
(107, 68, '210', 2, '5.00', 'Löwe', '3', '2021-08-12 12:19:11', '2021-11-12 13:19:11'),
(108, 69, '210', 4, '20.00', 'test', '2', '2021-08-16 07:49:45', '2021-11-16 08:49:45'),
(109, 70, '210', 4, '20.00', 'test', '3', '2021-08-16 08:38:06', '2021-11-16 09:38:06'),
(110, 71, '210', 4, '20.00', 'test', '1', '2021-08-16 09:25:17', '2021-11-16 10:25:17'),
(111, 72, '210', 4, '20.00', 'test', '3', '2021-08-17 07:29:33', '2021-11-17 08:29:33'),
(112, 72, '210', 106, '6.00', 'leben', '1', '2021-08-17 07:29:33', '2021-11-17 08:29:33'),
(113, 72, '210', 109, '5.50', 'libe', '2', '2021-08-17 07:29:33', '2021-11-17 08:29:33'),
(114, 72, '210', 110, '12.00', 'maria', '3', '2021-08-17 07:29:33', '2021-11-17 08:29:33'),
(115, 72, '210', 3, '13.99', 'sell', '2', '2021-08-17 07:29:33', '2021-11-17 08:29:33'),
(116, 72, '210', 2, '5.00', 'Löwe', '1', '2021-08-17 07:29:33', '2021-11-17 08:29:33'),
(117, 73, '213', 4, '20.00', 'test', '3', '2021-08-17 07:39:28', '2021-11-17 08:39:28'),
(118, 73, '213', 2, '2.00', 'Löwe', '2', '2021-08-17 07:39:28', '2021-11-17 08:39:28'),
(119, 73, '213', 106, '6.00', 'leben', '2', '2021-08-17 07:39:28', '2021-11-17 08:39:28'),
(120, 73, '213', 110, '12.00', 'maria', '2', '2021-08-17 07:39:28', '2021-11-17 08:39:28'),
(121, 74, '213', 3, '8.99', 'sell', '1', '2021-08-17 07:58:13', '2021-11-17 08:58:13'),
(122, 75, '213', 2, '2.00', 'Löwe', '1', '2021-08-17 08:06:39', '2021-11-17 09:06:39'),
(123, 76, '213', 4, '20.00', 'test', '0', '2021-08-17 10:05:45', '2021-11-17 11:05:45'),
(124, 76, '213', 106, '6.00', 'leben', '0', '2021-08-17 10:05:45', '2021-11-17 11:05:45'),
(125, 76, '213', 109, '5.50', 'libe', '0', '2021-08-17 10:05:45', '2021-11-17 11:05:45'),
(126, 76, '213', 110, '12.00', 'maria', '0', '2021-08-17 10:05:45', '2021-11-17 11:05:45'),
(127, 77, '213', 106, '6.00', 'leben', '0', '2021-08-17 10:08:32', '2021-11-17 11:08:32'),
(128, 77, '213', 109, '5.50', 'libe', '0', '2021-08-17 10:08:32', '2021-11-17 11:08:32'),
(129, 78, '213', 4, '20.00', 'test', '0', '2021-08-17 10:09:29', '2021-11-17 11:09:29'),
(130, 79, '213', 4, '20.00', 'test', '2', '2021-08-27 06:50:48', '2021-11-27 07:50:48'),
(131, 79, '213', 107, '12.30', 'berge', '3', '2021-08-27 06:50:48', '2021-11-27 07:50:48');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anrede` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plz` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strasse` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `n_name`, `pass`, `email`, `anrede`, `land`, `plz`, `strasse`) VALUES
(210, 'q', 'q', '$2y$10$tH4ogrNjQZO1f1La12wzlOsnJsucvPLjOY1Qfgmtk8Mtu27Qmh0Ue', 'q@q', 'Herr', 'Italien', 'q', 'q'),
(211, 'zohre', 'tayebi', '$2y$10$UBZPY7a/B607gIUOM7053uLGwaxlSPeoQH02pH3c2wiJiVaHhNmvu', 't@t', 'Frau', 'Deutchland', '100', 't'),
(213, 'test', 'test', '$2y$10$/a8a3Q/U15gnpnNuErA0PuFOrQk3vfQgY4ZX63XNAWvBZg5GhhR0a', 'test@test', 'Frau', 'England', '100', 'test');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `buch`
--
ALTER TABLE `buch`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indizes für die Tabelle `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `buch`
--
ALTER TABLE `buch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT für Tabelle `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
