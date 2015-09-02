-- Tim Oien Project 4 4/7/15

-- phpMyAdmin SQL Dump
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
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`prod_id` int(11) NOT NULL,
  `catName` varchar(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `catName`, `prod_name`, `description`, `price`, `quantity`, `filename`) VALUES
(24, '2', 'test', 'sdfj', 99, 9999, 'note4.jpg'),
(25, '5', 'gg', 'g', 3, 3, 'nexus9.jpg'),
(26, 'test3', 'test3', 'sdkjf', 888, 8888, 'nexus9.jpg'),
(27, 'Tablets', 'tabletTest', 'dkfj', 9, 9, 'android wear.jpg'),
(28, 'Tablets', 'thisisatest', 'dkfjaKSD', 9, 889, 'asus.jpg'),
(29, 'Tablets', 'testtest', 'dkfjakj', 99089, 0, 'android tv.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
