-- Tim Oien Project 4 4/7/15 

--phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2015 at 04:59 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project 4`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `list` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `device1` varchar(20) NOT NULL,
  `device2` varchar(20) NOT NULL,
  `device3` varchar(20) NOT NULL,
  `device4` varchar(20) NOT NULL,
  `device5` varchar(20) NOT NULL,
  `device6` varchar(20) NOT NULL,
  `textarea` varchar(200) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(40) NOT NULL,
  `admin` varchar(3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `dob`, `list`, `brand`, `device1`, `device2`, `device3`, `device4`, `device5`, `device6`, `textarea`, `username`, `password`, `admin`) VALUES
(1, 'Tim', 'Oien', 2147483647, 'oien.tim@gmail.com', '2015-03-02', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', 'Hello, I''m an Admin', 'tim', '51abb9636078defbf888d8457a7c76f85c8f114c', 'yes'),
(3, 'hey', 'smith', 2147483647, 'oien.tim@gmail.com', '2015-03-17', 'yes', 'Nexus', 'Android', '', 'iPhone', '', '', '', 'what', 'newTest', '51abb9636078defbf888d8457a7c76f85c8f114c', 'yes'),
(5, 'Tim', 'Oien', 2147483647, 'oien.tim@gmail.com', '2015-03-01', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', '', 'test', '51abb9636078defbf888d8457a7c76f85c8f114c', ''),
(6, 'bob', 'dlkj', 2147483647, 'sdfsdjf@dklafj.com', '2015-03-26', 'NO, leave me alone', 'Nexus', 'Android', 'tablet', '', '', '', '', '', 'test', '51abb9636078defbf888d8457a7c76f85c8f114c', ''),
(7, 'test', 'non-admin', 2147483647, 'sdkjaskd@dkaf.com', '2015-03-10', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', 'Non admin account test hello hello', 'hello', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', NULL),
(8, 'asdklfjkl', 'dsaklfjs', 2147483647, 'dkafj@akldjfa.com', '2015-03-25', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', '', 'dskfja', '9efd3b1a0c2530cca4bb2a0b9eac6e6faf2cf185', NULL),
(9, 'Bbosdklfj', 'asklfjskldjf', 2147483647, 'skfjasklj@dkajl.com', '2015-03-03', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', '', 'kasdjfak', 'a62aa311f7dbf72af0294fdc174afed64a831945', NULL),
(10, 'sdklafj', 'dklfja', 2147483647, 'kdsjfa@daklfjd.com', '2015-03-24', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', '', 'djfaskldfjkl', 'e6cfd5b0d1b24bc09888bc386d9f29ab5f5ce260', NULL),
(11, 'Tim', 'Oien', 612, 'oien.tim@gmail.com', '2015-03-25', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', 'test account', 'dslkfjasdklj', '68e13e5c22e3a624f504975bb8b9b8b665ceda97', NULL),
(12, 'asdklfj', 'dklfjakljdf', 2147483647, 'kajdfk@dakfj.com', '2015-03-16', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', 'test account', 'dklfjasddklfjl', '2fe6f6d69f6cf1f05675b6f704f0a15e35bc610d', NULL),
(13, 'kfjaskld', 'skdjfakljdf', 2147483647, 'kldfja@dkafj.com', '2015-03-09', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', 'test account', 'klafjsd', 'e6685bd47400967d78478f375ca5d4943fc18f86', NULL),
(14, 'dklfjaskj', 'asdklfjasdkl', 2147483647, 'kfjakldfj@dlkafj.com', '2015-03-02', 'YES, I love spam', 'Samsung', 'Android', '', '', '', '', '', 'test account', 'askfja', 'e1bf7bb69ae396fd5ddab06147b6c0d6262ace58', NULL),
(15, 'Tim', 'Oien', 2147483647, 'oien.tim@gmail.com', '2015-03-03', 'YE', 'Please Choose a Devi', 'Android', '', '', '', '', '', '', 'work', '09d77f1e728798c64d3882036c12ffd64d99ac6f', NULL),
(16, 'Taylor', 'Weatherby', 2147483647, 'sdfsfj@dklafj.com', '1993-09-29', '', 'other', 'Android', 'tablet', 'iPhone', 'ipad', 'laptop', 'macbook', 'hello all checkboxes', 'test', '51abb9636078defbf888d8457a7c76f85c8f114c', 'no'),
(17, 'bob', 'villa', 2147483647, 'sdklfj@gmail.com', '1995-01-29', 'YES', 'other', 'Android', 'tablet', '', '', '', '', '', 'test', '51abb9636078defbf888d8457a7c76f85c8f114c', 'no'),
(18, 'nonAdmin', 'dklaj', 2147483647, 'askldfjs@adfj.com', '1998-07-18', 'YES', 'Nexus', 'Android', '', '', 'ipad', '', '', '', 'test1', '51abb9636078defbf888d8457a7c76f85c8f114c', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
