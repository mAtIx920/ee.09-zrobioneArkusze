-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Sty 2022, 16:18
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `malarz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `malowanie`
--

CREATE TABLE `malowanie` (
  `id_pomieszczenia` int(11) NOT NULL,
  `id_sciany` int(11) NOT NULL,
  `id_farby` int(11) NOT NULL,
  `liczba puszek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `malowanie`
--

INSERT INTO `malowanie` (`id_pomieszczenia`, `id_sciany`, `id_farby`, `liczba puszek`) VALUES
(1, 1, 1, 3),
(1, 2, 3, 2),
(1, 3, 1, 3),
(1, 4, 1, 2),
(2, 1, 7, 4),
(2, 2, 6, 3),
(2, 3, 5, 5),
(2, 4, 3, 2),
(3, 1, 5, 2),
(3, 2, 2, 2),
(4, 4, 5, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `malowanie`
--
ALTER TABLE `malowanie`
  ADD PRIMARY KEY (`id_pomieszczenia`,`id_sciany`),
  ADD KEY `id_farby` (`id_farby`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `malowanie`
--
ALTER TABLE `malowanie`
  MODIFY `id_pomieszczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `malowanie`
--
ALTER TABLE `malowanie`
  ADD CONSTRAINT `malowanie_ibfk_1` FOREIGN KEY (`id_farby`) REFERENCES `farby` (`id_farby`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
