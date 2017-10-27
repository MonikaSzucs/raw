-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 06:30 AM
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
(6, 'xxxx444', 'ttttttttttttttt', '', '2017-10-26 20:43:56'),
(11, '123', '132', '', '2017-10-26 20:43:56'),
(14, '123xxxx', '132', '', '2017-10-26 20:43:56'),
(15, 'Get', '132', '', '2017-10-26 20:43:56'),
(16, 'Getwww', '132', '', '2017-10-26 20:43:56'),
(17, 'Getwwwxxx', '132', '', '2017-10-26 20:43:56'),
(18, 'Getwwwxxxxxx', '132', '', '2017-10-26 20:43:56'),
(19, '456', '456', '', '2017-10-26 20:43:56'),
(21, '4444434325', '4443254345', '', '2017-10-26 20:43:56'),
(23, 'zzzzzzzzzzzz', 'sssss', '', '2017-10-26 20:43:56'),
(24, 'qqqqq', 'zzzz', 'UserPictures/AAEAAQAAAAAAAAobAAAAJGZmYjJmYjgzLTZmOGUtNDY1NS04MzJlLTkyZjM5NDE3MThhYw.jpg', '2017-10-26 20:43:56'),
(25, 'sfsdfds', 'sdfsdfdsf', 'UserPictures/0ca5025.jpg', '2017-10-26 20:43:56'),
(26, 'dfgfd', 'fdgdfg', 'UserPictures/bird.png', '2017-10-26 20:43:56'),
(27, 'Tessstt', 'bbbbbbbbbbbbbbbbbbbbbbb', 'UserPictures/dsfdsgdfgfdg.png', '2017-10-26 20:43:56'),
(28, 'Tessstttttttttttttttttttttt', 'bbbbbbbbbbbbbbbbbbbbbbbffffffffffff', 'UserPictures/birddyyyyddd.png', '2017-10-26 20:43:56'),
(29, 'yyyyyyyyyyyyyyyyyyyyyyy', 'yyyyrr', 'UserPictures/setC.png', '2017-10-26 20:43:56'),
(30, 'yyyyyyyyyyyyyyyyyyyyyyy77', 'yyyyrr7777', 'UserPictures/q2.png', '2017-10-26 20:43:56'),
(31, 'uuuuuuuuuuuuuuu', 'tttttttttttttttt', '', '2017-10-26 20:43:56'),
(32, 'uuuuuuuuuuuuuuuccccc', 'ttttttttttttttttcccc', '', '2017-10-26 20:43:56'),
(33, 'uuuuuuuuuuuuuuucccccdddsss', 'ttttttttttttttttccccdddss', '', '2017-10-26 20:43:56'),
(34, '1233444342', '123324', 'UserPictures/q2.png', '2017-10-26 20:43:56'),
(35, '1233444342bbbbbbbbb', '123324bbbbbbbbbbbbb', 'UserPictures/meeting.png', '2017-10-26 20:43:56'),
(36, 'qqqqqq', 'qqqqqqqq', 'UserPictures/setC.png', '2017-10-26 20:43:56'),
(37, 'SSSSSSSSSSSSSSSSSSS', 'SSAAAAAAAAAAAAAAAAAAAAA', 'UserPictures/1509075575download.jpg', '2017-10-26 20:43:56'),
(38, '13213', '3123213', 'UserPictures/1509075683initial.png', '2017-10-26 20:43:56'),
(39, 'new', 'new', 'UserPictures/1509075874meeting.png', '2017-10-26 20:44:34'),
(40, 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa', 'UserPictures/1509077267dsfdsgdfgfdg.png', '2017-10-26 21:07:48'),
(41, 'aaaaaaaaaaaaaaaddd', 'aaaaaaaaaaaaaaaaaaaaddd', '', '2017-10-26 21:09:30'),
(42, 'aaaaaaaaaaaaaaadddttttttttttt', 'aaaaaaaaaaaaaaaaaaaadddtttttt', '', '2017-10-26 21:12:36');

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
(6, 1),
(11, 1),
(14, 1),
(15, 1),
(17, 1),
(17, 9),
(18, 1),
(18, 10),
(24, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1);

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
  `g_classical` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music_group`
--

INSERT INTO `music_group` (`group_id`, `music_id`, `music_file`, `music`, `music_uploaded`, `g_rock`, `g_rnb`, `g_pop`, `g_punk`, `g_jazz`, `g_metal`, `g_funk`, `g_country`, `g_edm`, `g_classical`) VALUES
(26, 1, '', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 2, 'UsersSongs/ChaCha_Fontanez.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 3, '', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 4, '', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 5, 'UsersSongs/ChaCha_Fontanttez.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 6, 'UsersSongs/Pachabel333ly.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 7, 'UsersSongs/censor-beep-01.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 8, 'UsersSongs/censor-besssep-01.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 9, 'UsersSongs/censor-bess3333s22222ep-01.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 10, 'UsersSongs/Pachabel333ly.mp3', NULL, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 11, 'UsersSongs/censor-erebess3333s22222ep-01.mp3', 1, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 12, 'UsersSongs/1509075575censor-erebess3333s22222ep-01.mp3', 1, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 13, 'UsersSongs/1509075683censor-erebess3333s22222ep-01.mp3', 0, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 14, 'UsersSongs/1509075874censor-erebess3333s22222ep-01.mp3', 0, '2017-10-26 20:46:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 15, 'UsersSongs/1509077267ChaCha_Fontanttez.mp3', 1, '2017-10-26 21:07:48', 1, 1, 0, 0, 0, 0, 0, 0, 1, 0),
(41, 16, '', 1, '2017-10-26 21:09:30', 1, 1, 0, 0, 0, 0, 1, 1, 1, 0),
(42, 17, '', 0, '2017-10-26 21:12:36', 0, 1, 0, 0, 0, 1, 1, 1, 1, 0);

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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `music_group`
--
ALTER TABLE `music_group`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
