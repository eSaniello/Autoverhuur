-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 05:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsautoverhuur`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `auto_id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `kenteken_nummer` varchar(100) NOT NULL,
  `chassis_nummer` int(11) NOT NULL,
  `bouwjaar` int(11) NOT NULL,
  `km_stand` int(11) NOT NULL,
  `tarief_per_km` int(11) NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`auto_id`, `merk`, `kenteken_nummer`, `chassis_nummer`, `bouwjaar`, `km_stand`, `tarief_per_km`, `categorie`) VALUES
(1, '4ed5rft6gyCR7TY78U', '5678', 678, 5678, 5678, 5678, '5678'),
(2, '45678', '5678', 5678, 5678, 56789, 567, 'P2'),
(3, '4567', '5678', 5678, 56, 5678, 567, 'P4'),
(4, 'Axio', '66-44-PJ', 2147483647, 2011, 2147483647, 5, 'P2');

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `mobiel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klant_id`, `naam`, `adres`, `mobiel`) VALUES
(1, 'tyui', 'tyu', 98765),
(2, '98', '5678', 987),
(3, 'Shaniel Samadhan', 'Vierkinderenweg 16', 8958112),
(4, '345678', '7651234567', 98765),
(5, 'HAHAHAHAH', 'hhahahah', 8875457),
(6, 'Rai', 'Shrie', 765678);

-- --------------------------------------------------------

--
-- Table structure for table `tarief`
--

CREATE TABLE `tarief` (
  `tarief_id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `tarief` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verhuur`
--

CREATE TABLE `verhuur` (
  `verhuur_id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `oud_km_stand` int(11) NOT NULL,
  `nieuw_km_stand` int(11) NOT NULL,
  `tarief` double NOT NULL,
  `uitgeef_datum` date NOT NULL,
  `inlever_datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexes for table `tarief`
--
ALTER TABLE `tarief`
  ADD PRIMARY KEY (`tarief_id`);

--
-- Indexes for table `verhuur`
--
ALTER TABLE `verhuur`
  ADD PRIMARY KEY (`verhuur_id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `auto_id` (`auto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tarief`
--
ALTER TABLE `tarief`
  MODIFY `tarief_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verhuur`
--
ALTER TABLE `verhuur`
  MODIFY `verhuur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `verhuur`
--
ALTER TABLE `verhuur`
  ADD CONSTRAINT `verhuur_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`klant_id`),
  ADD CONSTRAINT `verhuur_ibfk_2` FOREIGN KEY (`auto_id`) REFERENCES `auto` (`auto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
