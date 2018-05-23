-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 11:56 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `ID` int(11) NOT NULL,
  `VestID` int(11) NOT NULL,
  `Autor` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `Vreme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`ID`, `VestID`, `Autor`, `Komentar`, `Vreme`) VALUES
(60, 8, 'korisnik', 'korisnik3', '2017-11-25 12:53:03'),
(58, 9, 'korisnik', 'korisnik2', '2017-11-25 12:52:54'),
(56, 10, 'korisnik', 'korisnik1', '2017-11-25 12:52:45'),
(53, 8, 'mihailo', 'Treci komentar', '2017-11-25 12:52:09'),
(51, 10, 'mihailo', 'Prvi komentar', '2017-11-25 12:51:48'),
(52, 9, 'mihailo', 'Drugi komentar', '2017-11-25 12:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Uname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` int(3) NOT NULL DEFAULT '2',
  `Ime` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Prezime` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Uname`, `Pass`, `Admin`, `Ime`, `Prezime`, `email`) VALUES
(6, 'mihailo', '1234', 1, '123', '123', '123'),
(5, 'korisnik', '123', 2, '&lt;br/&gt;df', '3fwf', 'wfwdef'),
(7, 'sava', '123', 2, 'Sava', 'Savanovic', 'zloinaopako@666.com');

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `ID` int(11) NOT NULL,
  `Naslov` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Autor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Vest` text COLLATE utf8_unicode_ci NOT NULL,
  `Vreme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`ID`, `Naslov`, `Autor`, `Vest`, `Vreme`) VALUES
(8, 'Prva vest', 'mihailo', 'Vest vest vest vest vest vest vest vest vest vest vest', '2017-11-25 12:50:39'),
(9, 'Druga vest', 'mihailo', 'Vest  vest vest vest vest vest vest vest', '2017-11-25 12:51:05'),
(10, 'Treca vest', 'mihailo', 'Vest vest vest', '2017-11-25 12:51:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNAME` (`Uname`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
