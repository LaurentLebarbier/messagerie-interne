CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `lire` varchar(10) NOT NULL,
  `autre` varchar(20) NOT NULL,
  `num` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;