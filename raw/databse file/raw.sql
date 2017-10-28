-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 07:22 PM
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
  `group_photo` varchar(250) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_title`, `group_description`, `group_photo`, `created`) VALUES
(44, 'The fox jumped over the fence', 'the brown fox jumped over the fence', 'UserPictures/1509162096setC.png', '2017-10-27 20:41:36'),
(46, 'The brown fox jumped over the fence with a great l', 'The brown fox jumped over the fence with a great leap. The brown fox jumped over the fence with a great leap. The brown fox jumped over the fence with a great leap. The brown fox jumped over the fence with a great leap. The brown fox jumped over the fence with a great leap. The brown fox jumped over the fence with a great leap. The brown fox jumped over the fence with a great leap. ', '', '2017-10-27 20:43:33'),
(48, 'testinggggg here is is a new one', 'test egsegdsg', 'UserPictures/1509206146dsfdsgdfgfdg.png', '2017-10-28 08:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`group_id`, `user_id`) VALUES
(44, 1),
(46, 1),
(48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `music_group`
--

CREATE TABLE `music_group` (
  `group_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `music_file` varchar(150) NOT NULL,
  `music` tinyint(1) DEFAULT NULL,
  `music_uploaded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `g_rock` tinyint(1) NOT NULL,
  `g_rnb` tinyint(1) NOT NULL,
  `g_pop` tinyint(1) NOT NULL,
  `g_punk` tinyint(1) NOT NULL,
  `g_jazz` tinyint(1) NOT NULL,
  `g_metal` tinyint(1) NOT NULL,
  `g_funk` tinyint(1) NOT NULL,
  `g_country` tinyint(1) NOT NULL,
  `g_edm` tinyint(1) NOT NULL,
  `g_classical` tinyint(1) NOT NULL,
  `g_happy` tinyint(1) NOT NULL,
  `g_sad` tinyint(1) NOT NULL,
  `g_angry` tinyint(1) NOT NULL,
  `g_chill` tinyint(1) NOT NULL,
  `g_focus` tinyint(1) NOT NULL,
  `g_workout` tinyint(1) NOT NULL,
  `g_travel` tinyint(1) NOT NULL,
  `g_guitar` tinyint(1) NOT NULL,
  `g_bass` tinyint(1) NOT NULL,
  `g_synth` tinyint(1) NOT NULL,
  `g_pads` tinyint(1) NOT NULL,
  `g_woodwind` tinyint(1) NOT NULL,
  `g_drums` tinyint(1) NOT NULL,
  `g_strings` tinyint(1) NOT NULL,
  `g_brass` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music_group`
--

INSERT INTO `music_group` (`group_id`, `music_id`, `music_file`, `music`, `music_uploaded`, `g_rock`, `g_rnb`, `g_pop`, `g_punk`, `g_jazz`, `g_metal`, `g_funk`, `g_country`, `g_edm`, `g_classical`, `g_happy`, `g_sad`, `g_angry`, `g_chill`, `g_focus`, `g_workout`, `g_travel`, `g_guitar`, `g_bass`, `g_synth`, `g_pads`, `g_woodwind`, `g_drums`, `g_strings`, `g_brass`) VALUES
(48, 23, 'UsersSongs/1509206146ChaCha_Fontanttez.mp3', 1, '2017-10-28 08:55:46', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0);

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
(29, 'Monika', 'Szucs', 'sept29', '2145@hotmail.ca'),
(30, 'Monika', 'MonikaSzucs', 'Super101', 'monika.silvia.s@hotmail.ca');

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
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD UNIQUE KEY `group_id_2` (`group_id`,`user_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `music_group`
--
ALTER TABLE `music_group`
  ADD PRIMARY KEY (`music_id`),
  ADD KEY `group_id` (`group_id`);

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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `music_group`
--
ALTER TABLE `music_group`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_users`
--
ALTER TABLE `group_users`
  ADD CONSTRAINT `group_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_users_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `music_group`
--
ALTER TABLE `music_group`
  ADD CONSTRAINT `music_group_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
