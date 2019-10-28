-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2019 at 06:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse391a3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `name`, `description`, `is_active`) VALUES
(1, 'Group 1', 'Best Group', 1),
(2, 'Group 2', 'Better Group', 1),
(3, 'Group 3', 'Good Group', 1),
(4, 'Group 4', 'Average Group', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `name`, `description`, `is_active`) VALUES
(1, 'Slot 1', 'Monday 15:00-17:00', 1),
(2, 'Slot 2', 'Wednesday 14:00-16:00', 1),
(3, 'Slot 3', 'Thursday 11:00-13:00', 1),
(4, 'Slot 4', 'Sunday 10:00-12:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `sgroup` varchar(255) NOT NULL,
  `slot` varchar(10) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `sid`, `sgroup`, `slot`, `is_active`) VALUES
(1, 'Ashraf', 'Kabir', 'ashrafkabir95@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '16301034', '1', '2', 1),
(3, 'Cristiano', 'Ronaldo', 'cr7@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '3', '1', 1),
(5, 'James', 'Bond', 'jbond007@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '4', '4', 1),
(9, 'David', 'Beckham', 'beckham@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '1', '3', 1),
(10, 'Jose', 'Mourinho', 'jm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '3', '1', 1),
(11, 'Iker', 'Casillas', 'ik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '4', '1', 1),
(12, 'Dani', 'Carvajal', 'danny@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '2', '1', 1),
(13, 'Michael', 'Jackson', 'mj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678', '1', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
