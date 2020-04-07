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
	ID int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `continent` varchar(255) DEFAULT NULL,
  `price` int DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `descrip` varchar(5000) DEFAULT NULL,
  `rating` int DEFAULT 0,
  `lat` varchar(255) DEFAULT NULL,
  `longti` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `imageURL` varchar(255) DEFAULT NULL ,
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`name`, `country`, `continent`, `rating`, `filename`) VALUES
('Great Barrier Reef', 'Australia', 'Oceania',5,'images/grebarreef'),
('Sydney Harbour Bridge', 'Australia', 'Oceania',5,'images/sydharbridge'),
('CN tower', 'Canada', 'America',5,'images/cntower'),
('Rogers Center', 'Canada', 'America',5,'images/rogcenter'),
('The Berlin Wall', 'Germany', 'Europe',5,'images/berwall'),
('The Black Forest', 'Germany', 'Europe',5,'images/blackforest'),
('Amboseli National Park', 'Kenya', 'Africa',5,'images/amboseli'),
('Samburu National Reserve', 'Kenya', 'Africa',5,'images/samburu'),
('Keukenhof', 'Netherlands', 'Europe',5,'images/keukenhof'),
('Van Gogh Museum', 'Netherlands', 'Europe',5,'images/vangohmuseum'),
('Hawkes Bay', 'NewZealand', 'Oceania',5,'images/hawkesbay'),
('Rotorua, North Island', 'NewZealand', 'Oceania',5,'images/rotnorisland'),
('Awhum Waterfall', 'Nigeria', 'Africa',5,'images/awhum'),
('Obudu Mountain Resort', 'Nigeria', 'Africa',5,'images/obudu'),
('gardens by the bay', 'Singapore', 'Asia',5,'images/gardensbythebay'),
('marina bay sands hotel', 'Singapore', 'Asia',5,'images/marinabayhotel'),
('Maokong Zoo', 'Taiwan', 'Asia',5,'images/maokongzoo'),
('National Palace Museum', 'Taiwan', 'Asia',5,'images/natpalmuseum'),
('Grand Canyon', 'US', 'America',5,'images/grandcanyon'),
('Mount Rushmore', 'US', 'America',5,'images/mountrushmore');

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
