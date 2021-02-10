-- phpMyAdmin SQL Dump
-- version 4.0.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2020 at 07:38 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wave_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` longtext NOT NULL,
  `chatbot` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user`, `chatbot`, `date`) VALUES
(1, 'hi', 'hello', '2020-07-31 14:48:06'),
(2, 'hi', 'hello', '2020-07-31 14:52:07'),
(3, 'how are you?', 'i am fine, thank you', '2020-07-31 14:52:17'),
(4, 'skdhfkashdkhfkasdhfkjhakshdfkhasdhfkjahsdkjfhkahskfhkaskfhdkhkshfkhd', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 15:00:29'),
(5, 'i am sorry but i am not exactly clear about how to help you', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 15:05:58'),
(6, 'askjdfljasdlfjlasdjflasjdlfjasdjalsdjlfajsljkljadskljfklasjkljdl', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 15:06:13'),
(7, 'aklsjdlfjaskljflasjlfjsaldjldsfj', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 15:06:20'),
(8, 'i am sorry but i am not exactly clear about how to help youaew', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 15:06:33'),
(9, 'hi', 'hello', '2020-07-31 16:01:49'),
(10, 'hi', 'hello', '2020-07-31 16:03:10'),
(11, 'how are you', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 16:03:19'),
(12, 'name', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 16:03:31'),
(13, 'hi', 'hello', '2020-07-31 16:03:41'),
(14, 'b', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 16:04:13'),
(15, 'hllo', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 16:13:44'),
(16, 'hj', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 16:30:19'),
(17, 'good', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 16:30:34'),
(18, 'good', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 18:07:25'),
(19, '', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 18:16:52'),
(20, '', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 18:16:59'),
(21, '', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 18:18:18'),
(22, '', 'i am sorry but i am not exactly clear about how to help you', '2020-07-31 18:24:34'),
(23, 'hi', 'hello', '2020-07-31 18:56:53'),
(24, 'hi', 'hello', '2020-08-01 14:24:20'),
(25, 'hhj', 'i am sorry but i am not exactly clear about how to help you', '2020-08-01 15:08:17'),
(26, 'yugjkbukbuknguokgyjkbg', 'i am sorry but i am not exactly clear about how to help you', '2020-08-03 14:41:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
