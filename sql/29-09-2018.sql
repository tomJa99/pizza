-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2018 at 06:52 PM
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
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `gaestebuch`
--

INSERT INTO `gaestebuch` (`id`, `kundenname`, `email`, `note`, `bemerkung`, `datum`) VALUES
(1, 'Donald Duck', 'donald@duck.de', 5, 'Das Essen war beschissen!', '2018-09-27 12:31:58'),
(7, 'Joel Hecke', 'joel@heimerdingen.org', 1, 'top', '2018-09-27 13:03:57'),
(8, 'Tobias Winkler', 'theRealWinkler@walheim.opfer.gov', 4, 'War voll scheiße', '2018-09-27 13:06:02'),
(9, 'Tom', 'me@me.de', 3, 'Joa war in Ordnung', '2018-09-27 13:06:27'),
(10, 'Jan Rymkuß', 'jan@jan.net', 2, '-', '2018-09-27 13:08:46'),
(11, 'aslkdalsmd', 'asldmalsmd', 1, 'Subber', '2018-09-27 14:21:06');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wetter`
--
ALTER TABLE `wetter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
