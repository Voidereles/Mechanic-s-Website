-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lut 2019, 16:52
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `szkola`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawy`
--

CREATE TABLE `naprawy` (
  `id` int(11) NOT NULL,
  `idk` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `idn` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `car` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opisU` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opisN` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `koszt` int(11) NOT NULL,
  `etap` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `naprawy`
--

INSERT INTO `naprawy` (`id`, `idk`, `idn`, `tel`, `car`, `opisU`, `opisN`, `koszt`, `etap`) VALUES
(1, 'AJK78', 'DHA37', 537381922, 'Passat B5 kombi srebrny', 'Uszczelka pod gÅ‚owicÄ…', 'Naprawione', 2000, 'Odebrany'),
(2, 'AJK78', 'DHA38', 537381922, 'Passat B5 kombi srebrny', 'Hamulce w zÅ‚ym stanie', 'Wymiana tarcz hamulcowych', 280, 'Czeka na czÄ™Å›ci');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `naprawy`
--
ALTER TABLE `naprawy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `naprawy`
--
ALTER TABLE `naprawy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
