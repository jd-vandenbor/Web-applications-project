CREATE TABLE `reviews` (
	ID int NOT NULL AUTO_INCREMENT,
  `attractionname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` INT DEFAULT 0,
  `reviewtext` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (ID)
);