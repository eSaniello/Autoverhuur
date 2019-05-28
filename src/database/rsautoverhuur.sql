-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 03:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `categorie` varchar(100) NOT NULL,
  `uitgeleend` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`auto_id`, `merk`, `kenteken_nummer`, `chassis_nummer`, `bouwjaar`, `km_stand`, `categorie`, `uitgeleend`) VALUES
(31, 'Spacio', '77-77 PK', 67867687, 2011, 2147483647, 'P2', 0),
(32, 'Mark X', '42-44-PJ', 675675675, 2010, 876778, 'P2', 1),
(33, 'Axio', '77-22-PA', 7656, 2011, 4657890, 'P2', 0),
(34, 'Prado', '22-11-ZP', 2147483647, 2006, 2147483647, 'P3', 0),
(35, 'Laborghini Huracan', '22-55 PK', 765877687, 2019, 66667323, 'P2', 1),
(36, 'Ford Raptor', '88-33 PB', 7658768, 2005, 7846876, 'P3', 0),
(37, 'Mini Cooper', '63-22-wp', 689675, 2012, 5647656, 'P1', 0),
(38, 'Rosa bus', '77-77 BV', 76586565, 2011, 78658798, 'P4', 0),
(39, 'DAF', '66-65 pA', 765765, 1960, 5547645, 'P2', 1);

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
(8, 'Shaniel Samadhan', 'Vierkinderenweg 16', 8958112),
(9, 'Kenson Latchmansing', 'Kwatta 66', 7677833),
(10, 'Andojo Mack', 'Welgedacht A', 7227332),
(11, 'Lorenzo Amania', 'Noordpoolweg 77', 8862222),
(12, 'Raishrie Ambika', 'Benispark 33', 88225622),
(13, 'Raghosing Sardha', 'idontknow 33', 8832622);

-- --------------------------------------------------------

--
-- Table structure for table `tarief`
--

CREATE TABLE `tarief` (
  `tarief_id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `tarief` int(11) NOT NULL,
  `borg` double NOT NULL,
  `boete` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarief`
--

INSERT INTO `tarief` (`tarief_id`, `categorie`, `tarief`, `borg`, `boete`) VALUES
(1, 'P1', 10, 100, 500),
(2, 'P2', 20, 150, 1000),
(3, 'P3', 30, 250, 1500),
(4, 'P4', 40, 350, 2000);

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
  `borg` double NOT NULL,
  `boete` double NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `uitgeef_datum` date NOT NULL,
  `inlever_datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verhuur`
--

INSERT INTO `verhuur` (`verhuur_id`, `klant_id`, `auto_id`, `oud_km_stand`, `nieuw_km_stand`, `tarief`, `borg`, `boete`, `categorie`, `uitgeef_datum`, `inlever_datum`) VALUES
(1, 3, 4, 2147483647, 0, 20, 150, 0, 'P2', '0000-00-00', '0000-00-00'),
(2, 5, 11, 655656, 0, 40, 350, 0, 'P4', '2019-05-27', '0000-00-00'),
(3, 6, 10, 676, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(4, 6, 29, 56, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(5, 7, 4, 2147483647, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(6, 7, 4, 2147483647, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(7, 5, 9, 76, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(8, 3, 29, 56, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(9, 1, 11, 655656, 0, 40, 350, 0, 'P4', '2019-05-27', '0000-00-00'),
(10, 6, 10, 676, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(11, 5, 14, 547, 0, 40, 350, 0, 'P4', '2019-05-27', '0000-00-00'),
(12, 7, 3, 5678, 0, 40, 350, 0, 'P4', '2019-05-27', '0000-00-00'),
(13, 7, 30, 56, 0, 20, 150, 0, 'P2', '2019-05-27', '0000-00-00'),
(14, 3, 28, 6756, 0, 40, 350, 0, 'P4', '2019-05-27', '0000-00-00'),
(15, 8, 35, 66667323, 0, 20, 150, 0, 'P2', '2019-05-28', '0000-00-00'),
(16, 10, 32, 876778, 0, 20, 150, 0, 'P2', '2019-05-28', '0000-00-00'),
(17, 12, 39, 5547645, 0, 20, 150, 0, 'P2', '2019-05-28', '0000-00-00');

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
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tarief`
--
ALTER TABLE `tarief`
  MODIFY `tarief_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verhuur`
--
ALTER TABLE `verhuur`
  MODIFY `verhuur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
