-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2016 at 12:30 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqlserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `birthday` tinytext NOT NULL,
  `cookie` tinytext NOT NULL,
  `ip` tinytext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` tinytext NOT NULL,
  `cash` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `birthday`, `cookie`, `ip`, `time`, `email`, `cash`, `coins`, `posts`) VALUES
(1, 'beaujibby', 'cGFzcw==', '1 June, 2016', 'gIOGbcHxwKZCLLOrfbVy6Rxhtdlk6h3x7SpRu99l13fZX77oR3bOU29CgQdxMhM6qoPkkKZlZisGgk73xTAqYZ65zlmlKnn3Kixo', '::1', '2016-06-20 00:55:31', 'beaujibby@gmail.com', 100, 1000, 23),
(2, 'Magicus', 'cGFzcw==', '1 June, 2016', '5nDd4E99Zh1rCusgMtnEpNfTlVm0ea1iLDRVgD5iw6c8sJvs55Bf4a3viWYxCYSGlhAJwH9fXRxux2Wm6mB0XMYeQsUv2lazK5p4', '::1', '2016-06-20 00:56:08', 'magicus@gmail.com', 100, 1000, 3),
(3, 'beau', 'cGFzcw==', '2 June, 2016', 'JeykiDcjfSFaOtdF6gEipAXoijqMQnfkSEL3hglF0u9KccTQZuLe1DxorYiFtYyMi83IvcxYSEvi8wL1kArlvOSAf4nEOFE1CTIk', '::1', '2016-06-23 06:31:45', 'beau@beau.beau', 100, 1000, 0),
(4, 'admin', 'cGFzcw==', '3 June, 2016', '9sMoPfnRtBHk3fqRxvTpKNXXUTAl6eKrbKcit4Cz2AX495IEWsVlaKd1c8zQpaGKwa0jg5ZhHFzBLwQzvbVKgoKZjaxPYpWKRAi3', '::1', '2016-06-24 22:27:45', 'admin@gmail.com', 100, 1000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `threads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `description`, `threads`) VALUES
(1, 'General Discussions', 'A place to talk about magicus', 0),
(2, 'Help', 'Need help with something? Get help here!', 0),
(3, 'Suggestions & Ideas', 'Have an idea for a new great feature? Let us know!', 0),
(4, 'Programmers', 'A place for programmers to discuss their projects', 0),
(5, 'Off Topic', 'Somewhere to talk about everything not related magicus', 0),
(6, 'Video Games', 'A place for all things video game related.', 0),
(7, 'Item Duscussion', 'Trade items and talk about new items in the catalog.', 0),
(8, 'Exclusive Beta Forum', 'A forum just for discussing the development while magicus is still in beta', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `cookie` text NOT NULL,
  `items` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `username`, `cookie`, `items`) VALUES
(1, 'beaujibby', 'gIOGbcHxwKZCLLOrfbVy6Rxhtdlk6h3x7SpRu99l13fZX77oR3bOU29CgQdxMhM6qoPkkKZlZisGgk73xTAqYZ65zlmlKnn3Kixo', ''),
(2, 'Magicus', '5nDd4E99Zh1rCusgMtnEpNfTlVm0ea1iLDRVgD5iw6c8sJvs55Bf4a3viWYxCYSGlhAJwH9fXRxux2Wm6mB0XMYeQsUv2lazK5p4', ''),
(3, 'beau', 'JeykiDcjfSFaOtdF6gEipAXoijqMQnfkSEL3hglF0u9KccTQZuLe1DxorYiFtYyMi83IvcxYSEvi8wL1kArlvOSAf4nEOFE1CTIk', ''),
(4, 'admin', '9sMoPfnRtBHk3fqRxvTpKNXXUTAl6eKrbKcit4Cz2AX495IEWsVlaKd1c8zQpaGKwa0jg5ZhHFzBLwQzvbVKgoKZjaxPYpWKRAi3', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` tinytext NOT NULL,
  `author` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `poster` text NOT NULL,
  `poster_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `thread_id`, `poster`, `poster_id`, `body`, `time`) VALUES
(1, 1, 'beaujibby', 1, 'agreed1', '2016-06-24 21:16:04'),
(2, 1, 'beaujibby', 1, 'agreed2', '2016-06-24 21:16:15'),
(3, 1, 'beaujibby', 1, 'agreed3', '2016-06-24 21:16:28'),
(4, 2, 'beau', 3, 'disagreed1', '2016-06-24 21:16:39'),
(5, 1, 'Magicus', 2, 'ok try this one too 5', '2016-06-24 22:17:33'),
(6, 1, 'admin', 4, 'i am the site administrator', '2016-06-24 22:28:44'),
(11, 1, 'beaujibby', 1, 'bro', '2016-06-25 01:48:02'),
(11, 1, 'beaujibby', 1, 'bro', '2016-06-25 01:48:20'),
(12, 10, 'beaujibby', 1, 'he yellin out bro yo im hit', '2016-06-25 02:02:39'),
(13, 5, 'beaujibby', 1, 'test', '2016-06-25 02:06:41'),
(14, 5, 'beaujibby', 1, 'yo', '2016-06-25 03:34:07'),
(15, 12, 'beaujibby', 1, 'ok', '2016-06-25 19:41:13'),
(16, 12, 'beaujibby', 1, 'no bb </3', '2016-06-25 19:41:19'),
(17, 12, 'beaujibby', 1, 'noooooo', '2016-06-25 19:41:26'),
(18, 12, 'beaujibby', 1, 'shhhhh', '2016-06-25 19:41:39'),
(19, 12, 'beaujibby', 1, 'yay/no', '2016-06-25 19:41:43'),
(20, 12, 'beaujibby', 1, 'jake the steak', '2016-06-25 19:41:51'),
(21, 12, 'beaujibby', 1, 'wowoowwoow ok cri', '2016-06-25 19:42:00'),
(22, 12, 'beaujibby', 1, ':(', '2016-06-25 19:42:20'),
(23, 12, 'beaujibby', 1, ';-;', '2016-06-25 19:42:26'),
(24, 12, 'beaujibby', 1, ';~;', '2016-06-25 19:42:34'),
(25, 12, 'beaujibby', 1, ':-:', '2016-06-25 19:42:39'),
(26, 12, 'beaujibby', 1, ';_______;', '2016-06-25 19:42:49'),
(27, 12, 'beaujibby', 1, 'noooo000OooOoOOoO0o0o0o0o0o0o0000ooooo', '2016-06-25 19:43:08'),
(28, 12, 'beaujibby', 1, 'greysun=rain', '2016-06-25 19:43:20'),
(29, 12, 'beaujibby', 1, '\\</3', '2016-06-25 19:43:31'),
(30, 12, 'beaujibby', 1, 'exdeh', '2016-06-25 19:44:47'),
(31, 12, 'beaujibby', 1, 'Shawty snap (yeah) T-pain\r\nDamn, shawty snap, Yung joc (shawty)\r\nHey, hey she''s snappin''\r\nSnap ya fingers, do the step, you can do it all by yourself\r\nWoo, baby girl, what''s your name?\r\nLet me talk to you, let me buy you a drink\r\nI''m T-pain, you know me\r\nKonvict music nappy boy ooh\r\nI know the club close at three\r\nWhat''s the chances that you are rollin'' wit'' me?\r\nBack to the crib, show you how I live\r\nLet''s get drunk, forget what we did\r\nI''m a buy you a drank (Then I''m a take you home with me)\r\nI got money in the bank (Shawty, what chu think about that? Find me in the gray Cadillac)\r\nWe in the bed like (Ooh, ooh, ooh, ooh, ooh)\r\nWe in the bed like (Ooh, ooh, ooh, ooh, ooh)', '2016-06-25 19:45:21'),
(32, 13, 'beaujibby', 1, 'lol', '2016-06-25 20:08:39'),
(33, 13, 'beaujibby', 1, '<h1>hi</h1>', '2016-06-25 20:09:18'),
(34, 13, 'beaujibby', 1, '<iframe src=''http://www.roblox.com''></iframe>', '2016-06-25 20:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `cookie` tinytext NOT NULL,
  `blurb` tinytext NOT NULL,
  `status` tinytext NOT NULL,
  `friends` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `username`, `cookie`, `blurb`, `status`, `friends`, `count`) VALUES
(1, 'beaujibby', 'gIOGbcHxwKZCLLOrfbVy6Rxhtdlk6h3x7SpRu99l13fZX77oR3bOU29CgQdxMhM6qoPkkKZlZisGgk73xTAqYZ65zlmlKnn3Kixo', '', 'on cam', '', 0),
(2, 'Magicus', '5nDd4E99Zh1rCusgMtnEpNfTlVm0ea1iLDRVgD5iw6c8sJvs55Bf4a3viWYxCYSGlhAJwH9fXRxux2Wm6mB0XMYeQsUv2lazK5p4', '', 'Welcome to Magicus.xyz!', '', 0),
(3, 'beau', 'JeykiDcjfSFaOtdF6gEipAXoijqMQnfkSEL3hglF0u9KccTQZuLe1DxorYiFtYyMi83IvcxYSEvi8wL1kArlvOSAf4nEOFE1CTIk', '', 'hi val', '', 0),
(4, 'admin', '9sMoPfnRtBHk3fqRxvTpKNXXUTAl6eKrbKcit4Cz2AX495IEWsVlaKd1c8zQpaGKwa0jg5ZhHFzBLwQzvbVKgoKZjaxPYpWKRAi3', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `poster` text NOT NULL,
  `poster_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `forum_id`, `poster`, `poster_id`, `title`, `body`, `time`, `updated`) VALUES
(1, 1, 'beaujibby', 1, 'testing1', 'hi1', '2016-06-23 21:06:45', '2016-06-24 17:46:20'),
(2, 1, 'beaujibby', 1, 'testing2', 'hi2', '2016-06-23 21:06:55', '2016-06-24 17:46:20'),
(3, 1, 'beaujibby', 1, 'testing3', 'hi3', '2016-06-23 21:07:12', '2016-06-24 17:46:20'),
(4, 2, 'beau', 3, 'testing4', 'hi4', '2016-06-23 21:07:27', '2016-06-24 17:46:20'),
(5, 1, 'beaujibby', 1, 'hello there', 'I''m cool kthx', '2016-06-24 23:27:27', '2016-06-25 03:34:07'),
(6, 1, 'beaujibby', 1, 'whats up everyone', 'how are you doing', '2016-06-24 23:30:18', '2016-06-24 23:30:18'),
(7, 1, 'beaujibby', 1, 'hello ppl', 'how r u\r\n', '2016-06-24 23:34:14', '2016-06-24 23:34:14'),
(8, 1, 'beaujibby', 1, 'testing with line breaks', 'ok\r\nhere goes nothing\r\npls work\r\nbb', '2016-06-24 23:34:54', '2016-06-24 23:34:54'),
(9, 1, 'beaujibby', 1, 'what', 'ok', '2016-06-24 23:39:41', '2016-06-24 23:39:41'),
(10, 1, 'beaujibby', 1, 'please work', 'bbpls', '2016-06-25 01:27:23', '2016-06-25 01:27:23'),
(11, 9, 'beaujibby', 1, 'what', 'ok', '2016-06-25 19:05:52', '2016-06-25 19:05:52'),
(12, 3, 'beaujibby', 1, 'we should give grayson', '$6', '2016-06-25 19:41:03', '2016-06-25 19:45:21'),
(13, 8, 'beaujibby', 1, 'Welcome to summoners drift!', 'jk xd', '2016-06-25 20:08:33', '2016-06-25 20:10:16'),
(14, 3, 'beaujibby', 1, 'bro', 'thats lit', '2016-06-25 22:09:31', '2016-06-25 22:09:31'),
(15, 3, 'beaujibby', 1, 'woowwo', 'ok', '2016-06-25 22:09:42', '2016-06-25 22:09:42'),
(16, 3, 'beaujibby', 1, 'lol', 'that', '2016-06-25 22:11:05', '2016-06-25 22:11:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
