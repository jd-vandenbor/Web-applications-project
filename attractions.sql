-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2020 at 04:39 AM
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
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `imageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`ID`, `name`, `country`, `imageURL`) VALUES
(1, 'Amboseli National Park', 'Kenya', 'https://www.andbeyond.com/wp-content/uploads/sites/5/elephant-bull-front-of-kilimanjaro-amboseli.jpg'),
(2, 'Awhum Waterfall', 'Nigeria', 'https://afrotourism.com/wp-content/uploads/2015/09/Awhum-feature-pic.jpg'),
(3, 'CN tower', 'Canada', 'https://assets.simpleviewinc.com/simpleview/image/upload/c_fit,w_1000,h_1000/crm/toronto/Summer-2015-Skyline0_5e954389-5056-a36f-234589b46e9b25ae.jpg'),
(4, 'gardens by the bay', 'Singapore', 'https://d36tnp772eyphs.cloudfront.net/blogs/1/2019/06/Walkway-at-The-Supertree-Grove-at-Gardens-by-the-Bay-in-Singapore.jpg'),
(5, 'Grand Canyon', 'US', 'https://46yuuj40q81w3ijifr45fvbe165m-wpengine.netdna-ssl.com/wp-content/uploads/2018/08/horseshoe-bend-600x370.jpg'),
(6, 'Great Barrier Reef', 'Australia', 'https://images.barrons.com/im-58246?width=1260&size=1.5'),
(7, 'Hawkes Bay', 'NewZealand', 'https://www.newzealand.com/assets/Tourism-NZ/Hawkes-Bay/fa2da74f81/img-1542257541-1976-16608-29D20817-FFFE-FADE-9DB79CC11AE1C12E__FocalPointCropWzQyNyw2NDAsNTAsNTAsODUsImpwZyIsNjUsMi41XQ.jpg'),
(8, 'Keukenhof', 'Netherlands', 'https://cdn.getyourguide.com/img/tour_img-422958-146.jpg'),
(9, 'Maokong Zoo', 'Taiwan', 'https://mytanfeet.com/wp-content/uploads/2014/12/Maokong-Gondola-and-Taipei-Zoo-6.jpg'),
(10, 'marina bay sands hotel', 'Singapore', 'https://live.staticflickr.com/3666/14105889940_c0d19900dd_b.jpg'),
(11, 'Mount Rushmore', 'US', 'https://mediad.publicbroadcasting.net/p/shared/npr/styles/x_large/nprshared/202001/783094582.jpg'),
(12, 'National Palace Museum', 'Taiwan', 'https://live.staticflickr.com/3121/4562564991_9106b7994d_b.jpg'),
(13, 'Obudu Mountain Resort', 'Nigeria', 'https://thumbnails.trvl-media.com/9E1GcoBNoWM_Pu0_D-dM755Kq9A=/582x388/smart/filters:quality(60)/images.trvl-media.com/hotels/3000000/2240000/2233000/2232938/fab92d25_y.jpg'),
(14, 'Rogers Center', 'Canada', 'https://s3.amazonaws.com/btoimage/prism-thumbnails/articles/449b-2016331-skydome.jpg-resize_then_crop-_frame_bg_color_FFF-h_1365-gravity_center-q_70-preserve_ratio_true-w_2048_.webp'),
(15, 'Rotorua, North Island', 'NewZealand', 'https://www.newzealand.com/assets/Operator-Database/27993bb8a3/img-1536190805-6985-30507-p-06F32FED-F909-FACC-132BD828B851D7E9-2544003__CropResizeWzUwMCxudWxsLDg1LCJqcGciXQ.jpg'),
(16, 'Samburu National Reserve', 'Kenya', 'https://www.naturaltoursandsafaris.com/wp-content/uploads/2016/10/NAIROBI-SAMBURU-FLIGHT-SAFARI.jpg'),
(17, 'Sydney Harbour Bridge', 'Australia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Sydney_harbour_bridge_new_south_wales.jpg/1200px-Sydney_harbour_bridge_new_south_wales.jpg'),
(18, 'The Berlin Wall', 'Germany', 'https://i0.wp.com/www.nationalreview.com/wp-content/uploads/2019/11/berlin-wall-remnant.jpg?fit=789%2C460&ssl=1'),
(19, 'The Black Forest', 'Germany', 'https://www.planetware.com/wpimages/2019/02/germany-black-forest-top-attractions-exploring-black-forest-by-car.jpg'),
(20, 'Van Gogh Museum', 'Netherlands', 'https://lh3.ggpht.com/jAUOOWuKXUr4qvnLh0Cbmw0xVuiupNiQEU9CX4-MtGKolvOguvEiyq_CWPhgH4GRYUkkxRldqKZ5HmGameCn0GdH9IXZlXjr5Nna3jmoRQ=s528');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `country` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
