-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2020 at 03:08 AM
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
  `country` varchar(255) DEFAULT NULL,
  `imageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`name`, `country`, `imageURL`) VALUES
('Amboseli National Park', 'Kenya', 'https://www.andbeyond.com/wp-content/uploads/sites/5/elephant-bull-front-of-kilimanjaro-amboseli.jpg'),
('Awhum Waterfall', 'Nigeria', NULL),
('CN tower', 'Canada', 'https://assets.simpleviewinc.com/simpleview/image/upload/c_fit,w_1000,h_1000/crm/toronto/Summer-2015-Skyline0_5e954389-5056-a36f-234589b46e9b25ae.jpg'),
('gardens by the bay', 'Singapore', NULL),
('Grand Canyon', 'US', 'https://46yuuj40q81w3ijifr45fvbe165m-wpengine.netdna-ssl.com/wp-content/uploads/2018/08/horseshoe-bend-600x370.jpg'),
('Great Barrier Reef', 'Australia', NULL),
('Hawkes Bay', 'NewZealand', NULL),
('Keukenhof', 'Netherlands', 'https://cdn.getyourguide.com/img/tour_img-422958-146.jpg'),
('Maokong Zoo', 'Taiwan', NULL),
('marina bay sands hotel', 'Singapore', NULL),
('Mount Rushmore', 'US', 'https://mediad.publicbroadcasting.net/p/shared/npr/styles/x_large/nprshared/202001/783094582.jpg'),
('National Palace Museum', 'Taiwan', NULL),
('Obudu Mountain Resort', 'Nigeria', NULL),
('Rogers Center', 'Canada', NULL),
('Rotorua, North Island', 'NewZealand', NULL),
('Samburu National Reserve', 'Kenya', 'https://www.naturaltoursandsafaris.com/wp-content/uploads/2016/10/NAIROBI-SAMBURU-FLIGHT-SAFARI.jpg'),
('Sydney Harbour Bridge', 'Australia', NULL),
('The Berlin Wall', 'Germany', NULL),
('The Black Forest', 'Germany', NULL),
('Van Gogh Museum', 'Netherlands', NULL);

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
