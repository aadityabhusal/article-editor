-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 03:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articleeditor`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(36) NOT NULL,
  `date` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `category` varchar(32) NOT NULL,
  `tags` varchar(64) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author_id`, `title`, `image`, `date`, `updated`, `category`, `tags`, `views`) VALUES
(1568734818, 254, 'Title of the Article', '1568734818.png', '2019-09-17 17:28:28', '2019-09-19 05:59:20', 'Home', 'all,web,hello', 0),
(1568794023, 254, 'This is the main title for the article of this page', '1568794023.jpg', '2019-09-18 10:00:53', '0000-00-00 00:00:00', 'Home', 'all,web,hello', 0),
(1568795789, 254, 'This is the last main title for the article of my Article Editor', '1568795789.jpg', '2019-09-18 10:31:38', '2019-09-19 06:01:40', 'Home', 'all,web,hello', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
