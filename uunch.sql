-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 03:00 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uunch`
--

-- --------------------------------------------------------

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

--
-- Dumping data for table `uunch_comments`
--

INSERT INTO `uunch_comments` (`commentid`, `userid`, `reviewid`, `comment`, `commentdatereg`) VALUES
(1, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ', '2017-08-31 21:14:12'),
(2, 5, 1, '\r\nPhasellus sodales vel metus et interdum. In bibendum sit amet metus quis egestas. Aenean enim lacus, malesuada feugiat elementum in, faucibus vitae sapien. Proin ultrices hendrerit ex, id sodales mauris dignissim eget.', '2017-08-31 21:58:26'),
(3, 5, 1, 'Testing Comment query', '2017-08-31 23:48:46'),
(4, 3, 1, 'Second test using app.', '2017-08-31 23:51:25'),
(5, 3, 3, 'New Comment', '2017-08-31 23:53:19'),
(6, 3, 1, 'More testing.', '2017-09-01 10:34:50'),
(7, 7, 1, 'Testing login ', '2017-09-01 10:42:06'),
(8, 9, 1, 'New user testing', '2017-09-01 10:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `uunch_poll`
--

CREATE TABLE `uunch_poll` (
  `foodid` int(10) UNSIGNED NOT NULL,
  `foodtitle` varchar(50) NOT NULL,
  `foodscore` int(20) UNSIGNED DEFAULT '0',
  `reviewid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uunch_poll`
--

INSERT INTO `uunch_poll` (`foodid`, `foodtitle`, `foodscore`, `reviewid`) VALUES
(1, 'Chicken and Stuffing Sandwich', 36, 1),
(2, 'Toasted Ham and Cheese', 38, 2),
(3, 'Chicken Sandwhich', 41, 3),
(4, 'Chicken Wrap', 0, 4),
(5, 'Sweet Chili Pasta', 0, 5);

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

--
-- Dumping data for table `uunch_reviews`
--

INSERT INTO `uunch_reviews` (`reviewid`, `reviewtitle`, `reviewsummary`, `reviewcontent`, `reviewimage`, `reviewdatereg`, `userid`) VALUES
(1, 'Chicken and Stuffing Sandwich', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? \r\n\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'images\\chicken_and_stuffing.png', '2017-08-30 01:03:47', 1),
(2, 'Toasted Ham and Cheese', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in eros facilisis, luctus nulla vitae, elementum nulla. Curabitur ut dignissim arcu, sit amet condimentum purus. Fusce quis velit sodales, convallis massa sit amet, tristique augue. Fusce tristique est nec laoreet vulputate. Maecenas faucibus vehicula nulla sed ornare. Mauris risus dolor, cursus in augue at, maximus gravida est. Nunc vestibulum nulla eget leo feugiat, sed scelerisque metus pellentesque. \r\nQuisque imperdiet leo ut ligula feugiat, sit amet pretium velit auctor. Nullam gravida aliquam consectetur. Nam vel sodales eros. Proin laoreet congue condimentum. Maecenas non tempus augue. Vestibulum at ultrices est. Sed erat eros, pretium sit amet ultrices nec, dignissim pellentesque augue. Vestibulum consectetur purus in purus hendrerit, at congue purus finibus. Donec pulvinar enim nibh. Aenean sed dapibus arcu. Nulla maximus nulla erat, at rhoncus magna semper quis. Praesent congue lacinia libero. Nullam a vestibulum odio. Proin rutrum risus at leo condimentum feugiat. Sed quis tortor lorem. Donec ac accumsan purus. \r\nSuspendisse quis dapibus neque. Nam non dapibus nisi. Quisque non tortor vel arcu ornare mollis in at leo. Curabitur eu mauris et nibh malesuada viverra. Nullam porta maximus tellus vitae sollicitudin. Integer felis odio, venenatis nec ultricies id, tincidunt ut quam. Aliquam non orci mauris. Pellentesque vitae massa tellus. Nullam congue commodo lectus, eget consectetur risus placerat sit amet. Aenean mollis nec risus ut vestibulum. Ut laoreet laoreet libero, mattis varius dolor maximus non. Morbi ut justo vitae leo euismod lacinia. Nam consectetur dignissim malesuada. Vestibulum id cursus nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus. ', 'images\\toasted_ham_and_cheese.png', '2017-08-30 01:53:50', 2),
(3, 'Chicken Sandwhich', 'Vivamus accumsan fermentum risus. Fusce ac sollicitudin urna, sed aliquet ipsum. Sed luctus lacus est, ac euismod justo sollicitudin eu. Maecenas quis tellus a eros blandit varius vitae eu felis. Cras id pulvinar ex, eget lacinia mi. Suspendisse vulputate lacus sed nisl malesuada, sit amet consectetur nisl bibendum. Sed vel fermentum lorem. Vestibulum eros sem, pellentesque sed pretium a, efficitur a ante. Donec porta nibh sed lorem dictum viverra. Phasellus efficitur iaculis enim, sit amet ultrices quam mollis sit amet. In eget sapien nibh. ', 'Vivamus accumsan fermentum risus. Fusce ac sollicitudin urna, sed aliquet ipsum. Sed luctus lacus est, ac euismod justo sollicitudin eu. Maecenas quis tellus a eros blandit varius vitae eu felis. Cras id pulvinar ex, eget lacinia mi. Suspendisse vulputate lacus sed nisl malesuada, sit amet consectetur nisl bibendum. Sed vel fermentum lorem. Vestibulum eros sem, pellentesque sed pretium a, efficitur a ante. Donec porta nibh sed lorem dictum viverra. Phasellus efficitur iaculis enim, sit amet ultrices quam mollis sit amet. In eget sapien nibh. \r\nProin ac tortor mattis urna euismod semper hendrerit at nisi. Vivamus ut metus posuere, vehicula ex nec, tincidunt nulla. Sed ultricies, ipsum ut blandit condimentum, eros purus mattis lorem, quis laoreet purus tortor nec erat. Praesent tristique dictum est, dictum aliquet justo tincidunt eget. Mauris sagittis mi ac augue ornare, non faucibus eros laoreet. Cras ut malesuada nunc. In hac habitasse platea dictumst. Fusce at vehicula justo. Maecenas sagittis egestas efficitur. Sed metus felis, viverra tempor sagittis sagittis, sollicitudin at metus. Quisque ac luctus lorem. Duis in massa aliquet, faucibus arcu ut, mollis felis. Praesent lacinia non justo eu pellentesque. Proin risus sapien, pretium quis nulla vitae, placerat imperdiet urna. ', 'images\\chicken_sandwich.png', '2017-08-30 01:57:15', 1),
(4, 'Chicken Wrap', 'Some Text', 'Some More Text', 'images\\chicken_wrap.png', '2017-09-01 13:05:52', 7),
(5, 'Sweet Chili Pasta', 'Testing upload through app', 'Testing upload through app ', 'images\\sweet_chili_pasta.png', '2017-09-01 13:18:56', 7);

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

--
-- Dumping data for table `uunch_users`
--

INSERT INTO `uunch_users` (`userid`, `firstname`, `surname`, `email`, `password`, `usertype`, `avatar`, `datereg`, `dob`) VALUES
(1, 'test', 'test', 'test@test.com', 'test', 1, 'images\\penguin.png', '0000-00-00 00:00:00', '1901-01-01 00:00:00'),
(2, 'abc', 'xyz', 'abc@xyz.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'images\\pirate.png', '0000-00-00 00:00:00', '1901-01-01 00:00:00'),
(3, 'abc', 'xyz', 'abc1@xyz.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'images\\pirate.png', '0000-00-00 00:00:00', '1901-01-01 00:00:00'),
(4, 'abc', 'xyz', 'abc2@xyz.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'images\\propeller.png', '2017-08-29 00:02:15', '1901-01-01 00:00:00'),
(5, 'test', 'test', 'test3@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'images\\angel.png', '2017-08-29 00:54:25', '1901-01-01 00:00:00'),
(6, 'test', 'test', 'test4@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'images\\nurse.png', '2017-08-29 00:55:55', '1901-01-01 00:00:00'),
(7, 'admin', 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 3, 'images\\warrior.png', '2017-09-01 01:20:28', '1976-09-14 00:00:00'),
(8, 'mod', 'mod', 'mod@mod.com', '7dd30f0a95d522bfc058be4e75847f8b6df9f76b', 1, 'images\\mouse.png', '2017-09-01 01:25:59', '1990-12-03 00:00:00'),
(9, 'test', 'user', 'test@user.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'images\\nurse.png', '2017-09-01 10:45:17', '2013-07-28 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uunch_comments`
--
ALTER TABLE `uunch_comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `uunch_poll`
--
ALTER TABLE `uunch_poll`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `uunch_reviews`
--
ALTER TABLE `uunch_reviews`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `uunch_users`
--
ALTER TABLE `uunch_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uunch_comments`
--
ALTER TABLE `uunch_comments`
  MODIFY `commentid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `uunch_poll`
--
ALTER TABLE `uunch_poll`
  MODIFY `foodid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uunch_reviews`
--
ALTER TABLE `uunch_reviews`
  MODIFY `reviewid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uunch_users`
--
ALTER TABLE `uunch_users`
  MODIFY `userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
