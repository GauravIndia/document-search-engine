
CREATE TABLE `documents` (
  `id` int(11) AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `author` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `file_name` varchar(30) NOT NULL,
  `date` timestamp  DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `userID` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY(userID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
