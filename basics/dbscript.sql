create table USERS (id int PRIMARY key not null AUTO_INCREMENT , username VARCHAR(50), password varchar(50))

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) DEFAULT NULL,
 `password` varchar(50) DEFAULT NULL,
 PRIMARY KEY (`id`)
) 

--ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1

CREATE TABLE `list` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `details` varchar(50) NOT NULL,
 `date_posted` date NOT NULL,
 `time_posted` time NOT NULL,
 `public` varchar(10) NOT NULL,
 `date_edited` date NOT NULL,
 `time_edited` time NOT NULL,
 PRIMARY KEY (`id`)
) 

--ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1