-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2017 at 06:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(48, 'testinggggg here is is a new one', 'test egsegdsg', 'UserPictures/1509206146dsfdsgdfgfdg.png', '2017-10-28 08:55:46'),
(50, 'g6', 'g6', 'UserPictures/151020443121215840_1438397616276162_1031578615_o.png', '2017-11-08 21:13:51'),
(51, 'g7', 'g7', 'UserPictures/1510204466q2.png', '2017-11-08 21:14:26'),
(52, 'greoup raw', 'grourpw raw', 'UserPictures/1511322158pexels-photo-167491.jpeg', '2017-11-21 19:42:38'),
(53, 'Hanna2', 'H2', 'UserPictures/1511845051pexels-photo-640781.jpeg', '2017-11-27 20:57:31'),
(54, 'Hanna 4444444', '4444444', 'UserPictures/1511845123pexels-photo-660282.jpeg', '2017-11-27 20:58:43'),
(55, 'User3 Test', 'testttttt', 'UserPictures/1511847059pexels-photo-185662.jpeg', '2017-11-27 21:30:59');

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
(46, 1),
(46, 10),
(48, 1),
(48, 10),
(50, 10),
(51, 10),
(52, 1),
(53, 10),
(54, 10),
(55, 29);

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
  `music_title` varchar(50) NOT NULL,
  `music_photo` varchar(250) NOT NULL,
  `private` tinyint(1) NOT NULL,
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

INSERT INTO `music_group` (`group_id`, `music_id`, `music_file`, `music`, `music_uploaded`, `music_title`, `music_photo`, `private`, `g_rock`, `g_rnb`, `g_pop`, `g_punk`, `g_jazz`, `g_metal`, `g_funk`, `g_country`, `g_edm`, `g_classical`, `g_happy`, `g_sad`, `g_angry`, `g_chill`, `g_focus`, `g_workout`, `g_travel`, `g_guitar`, `g_bass`, `g_synth`, `g_pads`, `g_woodwind`, `g_drums`, `g_strings`, `g_brass`) VALUES
(48, 23, 'UsersSongs/1509206146ChaCha_Fontanttez.mp3', 1, '2017-10-28 08:55:46', '', '', 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0),
(44, 25, 'UsersSongs/1509509160ChaCha_Fontanttez.mp3', 1, '2017-10-31 21:06:00', 'sdgfdgdf', 'UserPictures/1509509160meeting.png', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(48, 26, 'UsersSongs/1509519096censor-erebess3333s22222ep-01.mp3', 1, '2017-10-31 23:51:36', 'retretertret', 'UserPictures/1509519096q2.png', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 28, 'UsersSongs/1510113696censor-erebess3333s22222ep-01.mp3', 1, '2017-11-07 20:01:36', 'testtt', 'UserPictures/1510113696initial.png', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 29, 'UsersSongs/1510117191Pachabel333ly.mp3', 1, '2017-11-07 20:59:51', 'song3', 'UserPictures/1510117191Untitledsfsdfd.png', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(50, 30, 'UsersSongs/1510204431Pachabel333ly.mp3', 1, '2017-11-08 21:13:51', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(51, 31, 'UsersSongs/1510204466censor-erebess3333s22222ep-01.mp3', 1, '2017-11-08 21:14:26', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(52, 32, 'UsersSongs/1511322158Where_She_Walks.mp3', 1, '2017-11-21 19:42:38', '', '', 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0),
(50, 33, '', 1, '2017-11-21 20:44:32', 'sdfdsfdsf', 'UserPictures/1511325872pexels-photo-167491.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(50, 34, 'UsersSongs/1511325903Marvin_s_Dance.mp3', 1, '2017-11-21 20:45:03', 'gdfgfdg', 'UserPictures/1511325903pexels-photo-179112.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(44, 35, 'UsersSongs/1511390293Stinger.mp3', 1, '2017-11-22 14:38:13', 'm1', 'UserPictures/1511390293pexels-photo-179114.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 36, 'UsersSongs/1511390332Where_She_Walks.mp3', 1, '2017-11-22 14:38:52', 'm3', 'UserPictures/1511390332pexels-photo-96857.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 37, 'UsersSongs/1511390365Infrared.mp3', 1, '2017-11-22 14:39:25', 'm5', 'UserPictures/1511390365mobile-phone-iphone-music-38295.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1),
(44, 38, 'UsersSongs/1511390397Garden_Walk.mp3', 1, '2017-11-22 14:39:57', 'm7', 'UserPictures/1511390397pexels-photo-63703.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 39, 'UsersSongs/1511581566Sleep Away.mp3', 0, '2017-11-24 19:46:06', 'Sample', 'UserPictures/1511581566Koala.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(46, 40, 'UsersSongs/1511586340Maid with the Flaxen Hair.mp3', 1, '2017-11-24 21:05:40', '0000', 'UserPictures/1511586340Lighthouse.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(46, 41, 'UsersSongs/1511586373Sleep Away.mp3', 0, '2017-11-24 21:06:13', '1', 'UserPictures/1511586373Penguins.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 42, 'UsersSongs/1511836155Infrared.mp3', 0, '2017-11-27 18:29:15', 'much20', 'UserPictures/1511836155pexels-photo-179114.jpeg', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1),
(44, 43, 'UsersSongs/1511837312Strolling_Through.mp3', 1, '2017-11-27 18:48:32', 'testing333333', 'UserPictures/1511837312guitar-classical-guitar-acoustic-guitar-electric-guitar.jpg', 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(44, 44, 'UsersSongs/1511837358Infrared.mp3', 0, '2017-11-27 18:49:18', 'testing666666', 'UserPictures/1511837358pexels-photo-63703.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(46, 45, 'UsersSongs/1511838989Trips.mp3', 1, '2017-11-27 19:16:29', 't2', 'UserPictures/1511838989pexels-photo-179112.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(46, 46, 'UsersSongs/1511839022Heart_Break.mp3', 1, '2017-11-27 19:17:02', 't3', 'UserPictures/1511839022pexels-photo-96857.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(46, 47, 'UsersSongs/1511839055Stinger.mp3', 1, '2017-11-27 19:17:35', 't4', 'UserPictures/1511839055night-vintage-music-bokeh.jpg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(46, 48, 'UsersSongs/1511839090Heart_Break.mp3', 0, '2017-11-27 19:18:10', 't5', 'UserPictures/1511839090pexels-photo-63703.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(48, 49, 'UsersSongs/1511839967Infrared.mp3', 0, '2017-11-27 19:32:47', 'sample2', 'UserPictures/1511839967pexels-photo-167491.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(51, 50, 'UsersSongs/1511840039Heart_Break.mp3', 0, '2017-11-27 19:33:59', 'ssssss', 'UserPictures/1511840039mobile-phone-iphone-music-38295.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(51, 51, 'UsersSongs/1511843915You_re_not_that_Funky.mp3', 0, '2017-11-27 20:38:35', 'M7777', 'UserPictures/1511843915pexels-photo-179912.jpeg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1),
(53, 52, '', 1, '2017-11-27 20:57:31', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(54, 53, 'UsersSongs/1511845123Marvin_s_Dance.mp3', 1, '2017-11-27 20:58:43', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(54, 54, 'UsersSongs/1511845156Where_She_Walks.mp3', 0, '2017-11-27 20:59:16', 'sample Hanna', 'UserPictures/1511845156pexels-photo-96857.jpeg', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(55, 55, 'UsersSongs/1511847059Strolling_Through.mp3', 1, '2017-11-27 21:30:59', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `music_public`
--

CREATE TABLE `music_public` (
  `music_public_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_title` varchar(50) NOT NULL,
  `music_file` varchar(150) NOT NULL,
  `music` tinyint(1) NOT NULL,
  `music_uploaded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `music_photo` varchar(250) NOT NULL,
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
-- Dumping data for table `music_public`
--

INSERT INTO `music_public` (`music_public_id`, `user_id`, `song_title`, `music_file`, `music`, `music_uploaded`, `music_photo`, `g_rock`, `g_rnb`, `g_pop`, `g_punk`, `g_jazz`, `g_metal`, `g_funk`, `g_country`, `g_edm`, `g_classical`, `g_happy`, `g_sad`, `g_angry`, `g_chill`, `g_focus`, `g_workout`, `g_travel`, `g_guitar`, `g_bass`, `g_synth`, `g_pads`, `g_woodwind`, `g_drums`, `g_strings`, `g_brass`) VALUES
(9, 1, 'm1', 'GlobalSongs/1510199716Pachabel333ly.mp3', 1, '2017-11-08 19:55:16', 'GlobalPictures/1510199716rawwww.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 'm3', 'GlobalSongs/1510199743Pachabel333ly.mp3', 1, '2017-11-08 19:55:43', 'GlobalPictures/1510199743test.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 1, 'm4', 'GlobalSongs/1510199777Pachabel333ly.mp3', 1, '2017-11-08 19:56:17', 'GlobalPictures/1510199777bird.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(12, 1, 'b7', 'GlobalSongs/1510203040censor-erebess3333s22222ep-01.mp3', 1, '2017-11-08 20:50:40', 'GlobalPictures/1510203040download.jpg', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(13, 1, '55555', 'GlobalSongs/1510203451ChaCha_Fontanttez.mp3', 1, '2017-11-08 20:57:31', 'GlobalPictures/1510203451Untitledsfsdfd.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(14, 1, 'm6', 'GlobalSongs/1510203496ChaCha_Fontanttez.mp3', 1, '2017-11-08 20:58:16', 'GlobalPictures/1510203496sdfdsfdsfdsf.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(15, 1, 'm7', 'GlobalSongs/1510203797ChaCha_Fontanttez.mp3', 1, '2017-11-08 21:03:17', 'GlobalPictures/1510203797rawwww.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 10, 'hanaaaa', 'GlobalSongs/1510982358Pachabel333ly.mp3', 1, '2017-11-17 21:19:18', 'GlobalPictures/1510982358youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 10, 'Hana titleeee', 'GlobalSongs/1510982788Pachabel333ly.mp3', 1, '2017-11-17 21:26:28', 'GlobalPictures/1510982788youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(22, 10, 'testtttt14325', 'GlobalSongs/1510983168Wandering.mp3', 1, '2017-11-17 21:32:48', 'GlobalPictures/1510983168youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(23, 1, 'test568769780980', 'GlobalSongs/1510983569ChaCha_Fontanttez.mp3', 1, '2017-11-17 21:39:29', 'GlobalPictures/1510983569youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(24, 1, 'Music 1', 'GlobalSongs/1510984365Pachabel333ly.mp3', 1, '2017-11-17 21:52:45', 'GlobalPictures/1510984365youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(25, 1, 'test568769780980', 'GlobalSongs/1510984748ChaCha_Fontanttez.mp3', 1, '2017-11-17 21:59:08', 'GlobalPictures/1510984748youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(26, 1, 'muisc 22', 'GlobalSongs/1510985130Wandering.mp3', 1, '2017-11-17 22:05:30', 'GlobalPictures/1510985130youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(27, 1, 'music100', 'GlobalSongs/1510989857Pachabel333ly.mp3', 1, '2017-11-17 23:24:17', 'GlobalPictures/1510989857Untitledsfsdfd.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(28, 1, 'test', 'GlobalSongs/1511024855Pachabel333ly.mp3', 1, '2017-11-18 09:07:35', 'GlobalPictures/1511024855youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(29, 1, '', '', 1, '2017-11-18 16:09:34', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(30, 1, '', '', 1, '2017-11-18 16:11:08', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(31, 1, '', '', 1, '2017-11-18 16:12:37', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(32, 1, '', '', 1, '2017-11-18 16:13:49', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(33, 1, '', '', 1, '2017-11-18 16:16:18', 'GlobalPictures/1511050578pexels-photo-219998.jpeg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(34, 1, 'testtt', '', 1, '2017-11-18 16:16:43', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(35, 1, 'Music100', '', 1, '2017-11-18 16:18:28', 'GlobalPictures/1511050708pexels-photo-386025.jpeg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(36, 1, 'Music100', 'GlobalSongs/1511051383Pachabel333ly.mp3', 1, '2017-11-18 16:29:43', 'GlobalPictures/1511051383pexels-photo-386025.jpeg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(37, 1, 'Music10000', 'GlobalSongs/1511051407music1.mp3', 1, '2017-11-18 16:30:07', 'GlobalPictures/1511051407youtubechannel.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(38, 1, '', 'GlobalSongs/1511051703Don_t_Look.mp3', 1, '2017-11-18 16:35:03', 'GlobalPictures/1511051703bird.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(39, 1, '', 'GlobalSongs/1511051724music2.mp3', 1, '2017-11-18 16:35:24', 'GlobalPictures/1511051724sunrise-2923012_960_720.jpg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(40, 1, 'fdgfdgh', 'GlobalSongs/1511051742music3.mp3', 1, '2017-11-18 16:35:42', 'GlobalPictures/1511051742rawwww.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(41, 1, '345345', 'GlobalSongs/1511051763censor-erebess3333s22222ep-01.mp3', 1, '2017-11-18 16:36:03', 'GlobalPictures/1511051763meeting.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(42, 1, '8o879', 'GlobalSongs/1511051783censor-erebess3333s22222ep-01.mp3', 1, '2017-11-18 16:36:23', 'GlobalPictures/1511051783q2.png', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(43, 1, '', 'GlobalSongs/1511054121music3.mp3', 1, '2017-11-18 17:15:21', 'GlobalPictures/1511054121lone-tree-1934897_960_720.jpg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 1, 'wow', 'GlobalSongs/1511064360music3.mp3', 1, '2017-11-18 20:06:00', 'GlobalPictures/1511064360pexels-photo-219998.jpeg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(45, 1, 'New Raw folder path', 'GlobalSongs/1511320722Marvin_s_Dance.mp3', 1, '2017-11-21 19:18:42', 'GlobalPictures/1511320722setC.png', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(46, 1, 'sample', 'GlobalSongs/1511332997Trips.mp3', 0, '2017-11-21 22:43:17', 'GlobalPictures/1511332997126443.png', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(47, 1, 'Country song 1', 'GlobalSongs/1511921590Trips.mp3', 1, '2017-11-28 18:13:10', 'GlobalPictures/1511921590guitar-classical-guitar-acoustic-guitar-electric-guitar.jpg', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(48, 1, 'Country sample1', 'GlobalSongs/1511921634Garden_Walk.mp3', 0, '2017-11-28 18:13:54', 'GlobalPictures/1511921634Desert.jpg', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(40) NOT NULL,
  `biography` varchar(500) DEFAULT NULL,
  `hobbies` varchar(250) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `biography`, `hobbies`, `skills`) VALUES
(1, 'name1', 'lastname1', 'username1', '111', '123@hotmail.ca', 'testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography testing biography ', 'hobbie 1, hobbie 2, hobbie 3,', 'skills 1, skill 2, skill 3,'),
(10, 'Hanna', NULL, 'test', '1234', 'hanna123@hotmail.ca', NULL, NULL, NULL),
(29, 'Monika', NULL, 'Szucs', 'sept29', '2145@hotmail.ca', NULL, NULL, NULL);

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
-- Indexes for table `music_public`
--
ALTER TABLE `music_public`
  ADD PRIMARY KEY (`music_public_id`),
  ADD UNIQUE KEY `music_public_id` (`music_public_id`),
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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `music_group`
--
ALTER TABLE `music_group`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `music_public`
--
ALTER TABLE `music_public`
  MODIFY `music_public_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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

--
-- Constraints for table `music_public`
--
ALTER TABLE `music_public`
  ADD CONSTRAINT `music_public_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
