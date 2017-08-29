--
-- Database: `uunch`
--

-- --------------------------------------------------------

--
-- Table structure for table `uunch_users`
--

CREATE TABLE `uunch_users` (
  `userid` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(40) NOT NULL,
  `usertype` int(1) UNSIGNED NOT NULL DEFAULT '1',
  `avatar` int(2) NOT NULL,
  `datereg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dob` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
