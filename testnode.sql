-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2015 at 01:14 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testnode`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` text NOT NULL,
  `ipadd` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `ipadd`, `created_at`) VALUES
(1, 16, 0, 'Sayawan na :icena:', '', '2015-10-07 07:45:47'),
(2, 16, 0, 'a', '', '2015-10-07 07:51:44'),
(3, 16, 0, 'a', '', '2015-10-07 07:51:45'),
(4, 16, 0, 'a', '', '2015-10-07 07:51:45'),
(5, 16, 0, 'a', '', '2015-10-07 07:51:45'),
(6, 16, 0, 'a', '', '2015-10-07 07:51:45'),
(7, 16, 0, 'a', '', '2015-10-07 07:51:45'),
(8, 16, 0, 'a', '', '2015-10-07 07:51:45'),
(9, 16, 0, 'a', '', '2015-10-07 07:51:46'),
(10, 16, 0, 'a', '', '2015-10-07 07:51:46'),
(11, 16, 0, ':icena:', '', '2015-10-07 08:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `avatar`, `user_name`, `pass_word`, `status`, `created_at`) VALUES
(16, 'Spanky', '', 'spanky', 'spanky', 1, '2015-10-07 08:05:58'),
(18, 'Admin', '', 'icena', 'icena', 0, '2015-10-07 07:18:18'),
(19, 'Mang Juan', '', 'john', 'john', 0, '2015-10-06 09:46:51'),
(20, 'Kanor', '', 'kanor', 'kanor', 0, '2015-10-07 07:20:28'),
(21, 'Boy Bato', '', 'boy', 'boy', 0, '2015-10-07 02:29:10'),
(22, 'Mack', '', 'carlos', '1111', 0, '2015-10-06 03:44:09'),
(23, 'Ryan', '', 'ryan', 'ryan123', 1, '2015-10-06 08:52:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `display_name` (`display_name`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
