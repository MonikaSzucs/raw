-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2017 at 08:15 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raw`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_title` varchar(50) NOT NULL,
  `group_description` varchar(500) NOT NULL,
  `group_photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_title`, `group_description`, `group_photo`) VALUES
(6, 'xxxx444', 'ttttttttttttttt', ''),
(11, '123', '132', ''),
(14, '123xxxx', '132', ''),
(15, 'Get', '132', ''),
(16, 'Getwww', '132', ''),
(17, 'Getwwwxxx', '132', ''),
(18, 'Getwwwxxxxxx', '132', ''),
(19, '456', '456', ''),
(21, '4444434325', '4443254345', ''),
(23, 'zzzzzzzzzzzz', 'sssss', ''),
(24, 'qqqqq', 'zzzz', 'UserPictures/AAEAAQAAAAAAAAobAAAAJGZmYjJmYjgzLTZmOGUtNDY1NS04MzJlLTkyZjM5NDE3MThhYw.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`) VALUES
(19, 1),
(23, 1),
(24, 1),
(17, 1),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `username`, `password`, `email`) VALUES
(1, 'Monika', 'Moni', '111', '123@hotmail.ca'),
(9, 'asdasd', 'asdasd', 'asdasd', 'asdsad@sss.ghhh'),
(10, 'Hanna', 'test', '1234', 'hanna123@hotmail.ca'),
(21, 'zfcsdfs', 'fdsf', 'sdf', 'dsfsdf@hotmail.ca'),
(22, 'sasdfas', 'asaf', 'adsfads', 'asfasf@hotmail.ca'),
(23, 'sfdsfdsf', 'dsfdsf', 'sdfds', '43tgfterg@hotmail.ca'),
(24, 'dsfdf', 'sdfdsf', 'sdfdsfsd', 'sdfsdf@hotmail.ca'),
(25, 'sfdsf', 'dsfsdf', 'dsfdsf', 'asdasd@hotmail.ca'),
(26, 'asfdsaf', 'dsfasdf', 'dasf', 'dsaf@hotmail.com'),
(27, 'sda', 'sadfsdaf', '123', 'afsafd@hotmail.ca'),
(28, 'sfgdgfd', 'fdgdfg', '111', 'fdgfdg@hotmail.ca'),
(29, 'Monika', 'Szucs', 'sept29', '2145@hotmail.ca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `group_title` (`group_title`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_user_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
