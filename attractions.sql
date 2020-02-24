-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2020 at 09:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `places`
--

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `name` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`name`, `country`) VALUES
('Great Barrier Reef', 'Australia'),
('Sydney Harbour Bridge', 'Australia'),
('CN tower', 'Canada'),
('Rogers Center', 'Canada'),
('The Berlin Wall', 'Germany'),
('The Black Forest', 'Germany'),
('Amboseli National Park', 'Kenya'),
('Samburu National Reserve', 'Kenya'),
('Keukenhof', 'Netherlands'),
('Van Gogh Museum', 'Netherlands'),
('Hawkes Bay', 'NewZealand'),
('Rotorua, North Island', 'NewZealand'),
('Awhum Waterfall', 'Nigeria'),
('Obudu Mountain Resort', 'Nigeria'),
('gardens by the bay', 'Singapore'),
('marina bay sands hotel', 'Singapore'),
('Maokong Zoo', 'Taiwan'),
('National Palace Museum', 'Taiwan'),
('Grand Canyon', 'US'),
('Mount Rushmore', 'US');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`name`),
  ADD KEY `country` (`country`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attractions`
--
ALTER TABLE `attractions`
  ADD CONSTRAINT `attractions_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
