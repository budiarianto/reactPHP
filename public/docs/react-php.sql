-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2015 at 07:10 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `react-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `text`, `posted_on`) VALUES
(1, 'Amit', 'This is a test comment', '2015-10-28 00:00:00'),
(2, 'Amit1', 'Testing', '0000-00-00 00:00:00'),
(3, 'John', 'Doe', '2015-10-28 13:02:54'),
(4, 'amit', 'vauyvdkcsdy', '2015-10-28 13:08:57'),
(5, 'Amit', 'amits new comment from web interface', '2015-10-28 13:09:29'),
(6, 'Sujit', 'amitn nbdlijfbv lsjdbnf', '2015-10-28 13:45:48'),
(7, 'Bootstrap', 'Bootstrap comment from web', '2015-10-28 17:06:26'),
(8, 'comment', 'Bootsrp comment', '2015-10-28 17:06:59'),
(9, 'lksbhdlvshvdl', 'jvqkhgvkgvl', '2015-10-28 17:07:19'),
(10, 'LJHBL', 'kjblkjblJHB', '2015-10-28 17:07:25'),
(11, 'Amit', 'amit  sdnf;sjdf', '2015-10-28 17:07:46'),
(12, 'Amit', 'Amit s new test', '2015-10-28 17:08:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
