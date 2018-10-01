-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2018 at 04:04 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `extrazutaten`
--

CREATE TABLE `extrazutaten` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_german1_ci NOT NULL,
  `preis` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `extrazutaten`
--

INSERT INTO `extrazutaten` (`id`, `name`, `preis`) VALUES
(1, 'rucola', 1.5),
(3, 'hirtenkäse', 2),
(4, 'chilipulver', 0),
(5, 'kapern', 1.1),
(6, 'knoblauch', 0),
(7, 'perperoni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gaestebuch`
--

CREATE TABLE `gaestebuch` (
  `id` int(11) NOT NULL,
  `kundenname` varchar(50) COLLATE latin1_german1_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `note` tinyint(4) NOT NULL,
  `bemerkung` text COLLATE latin1_german1_ci NOT NULL,
  `datum` datetime NOT NULL,
  `freigabe` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `gaestebuch`
--

INSERT INTO `gaestebuch` (`id`, `kundenname`, `email`, `note`, `bemerkung`, `datum`, `freigabe`) VALUES
(1, 'Donald Duck', 'donald@duck.de', 5, 'Das Essen war beschissen!', '2018-09-27 12:31:58', 0),
(7, 'Joel Hecke', 'joel@heimerdingen.org', 1, 'top', '2018-09-27 13:03:57', 0),
(8, 'Tobias Winkler', 'theRealWinkler@walheim.opfer.gov', 4, 'War voll scheiße', '2018-09-27 13:06:02', 1),
(9, 'Tom', 'me@me.de', 3, 'Joa war in Ordnung', '2018-09-27 13:06:27', 0),
(10, 'Jan Rymkuß', 'jan@jan.net', 2, '-', '2018-09-27 13:08:46', 0),
(11, 'aslkdalsmd', 'asldmalsmd', 1, 'Subber', '2018-09-27 14:21:06', 0),
(12, 'Hacker 8', 'hacker@hackmac.org', 5, 'beschissene Pizza', '2018-10-01 12:59:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE latin1_german1_ci NOT NULL,
  `beschreibung` text COLLATE latin1_german1_ci NOT NULL,
  `preis` double NOT NULL,
  `sonderangebot` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `beschreibung`, `preis`, `sonderangebot`) VALUES
(1, 'Regina', 'mit Tomaten, Mozzarella, Champignons, Kochschinken und Oregano nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 5, 0),
(2, 'Margherita', 'mit Tomaten, Mozzarella, Olivenöl und Basilikum nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 4, 0),
(3, 'Napoli', 'mit Tomaten, Mozzarella, Sardellen, Olivenöl und Oregano  nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 6, 0),
(4, 'Salami', 'mit Salami, Tomaten, Mozzarella, Olivenöl und Oregano  nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 4.4, 1),
(5, 'Prosciutto', 'mit Kochschinken, Tomaten, Mozzarella, Olivenöl und Oregano  nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 5.5, 0),
(6, 'Funghi', 'mit Champignons, Tomaten, Mozzarella, Olivenöl und Oregano  nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 4.5, 0),
(7, 'Tonno', 'mit Thunfisch, Tomaten, Mozzarella, Olivenöl und Oregano  nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 6.6, 0),
(8, 'Hawaii ', 'mit Kochschinken, Ananas, Tomaten, Mozzarella und Olivenöl nach original italienischem Rezept (ohne Konservierungsstoffe, nur frische Zutaten)', 5.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wetter`
--

CREATE TABLE `wetter` (
  `id` int(11) NOT NULL,
  `stadt` varchar(20) COLLATE latin1_german1_ci NOT NULL,
  `datum` date NOT NULL,
  `temp_lo` int(11) NOT NULL,
  `temp_hi` int(11) NOT NULL,
  `niederschlag` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `wetter`
--

INSERT INTO `wetter` (`id`, `stadt`, `datum`, `temp_lo`, `temp_hi`, `niederschlag`) VALUES
(1, 'Stuttgart', '2018-09-01', 20, 13, 3.3),
(2, 'Ulm', '2018-09-01', 10, 28, 0),
(3, 'Stuttgart', '2018-09-01', 13, 19, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `extrazutaten`
--
ALTER TABLE `extrazutaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaestebuch`
--
ALTER TABLE `gaestebuch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wetter`
--
ALTER TABLE `wetter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `extrazutaten`
--
ALTER TABLE `extrazutaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gaestebuch`
--
ALTER TABLE `gaestebuch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wetter`
--
ALTER TABLE `wetter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
