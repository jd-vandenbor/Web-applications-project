CREATE TABLE `users` (
	ID int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL UNIQUE,
  `password` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL ,
  PRIMARY KEY (ID)
)

INSERT INTO users (name, username, password, address, phone, email, salt) VALUES ("admin", "admin", "goodpassword", "nowhere", "0","", "234" )