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
  `avatar` varchar(50) NOT NULL,
  `datereg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dob` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uunch_reviews`
--

CREATE TABLE `uunch_reviews` (
  `reviewid` int(11) UNSIGNED NOT NULL,
  `reviewtitle` varchar(50) NOT NULL,
  `reviewsummary` text NOT NULL,
  `reviewcontent` text NOT NULL,
  `reviewimage` varchar(50) NOT NULL,
  `reviewdatereg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uunch_poll`
--

CREATE TABLE `uunch_poll` (
  `foodid` int(10) UNSIGNED NOT NULL,
  `foodtitle` varchar(50) NOT NULL,
  `foodscore` int(20) NOT NULL,
  `reviewid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


---------------------------------------------------

--
-- Table structure for table `uunch_comments`
--

CREATE TABLE `uunch_comments` (
  `commentid` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `reviewid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commentdatereg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------