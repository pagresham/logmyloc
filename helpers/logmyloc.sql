-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2017 at 01:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logmyloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `f_id` int(11) NOT NULL,
  `f_1` int(11) NOT NULL,
  `f_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL COMMENT '		',
  `u_id` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comments` varchar(255) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `u_id`, `lat`, `lng`, `city`, `state`, `country`, `zip`, `time`, `comments`, `title`) VALUES
(13, 12, 41.0895249, -73.8419063, 'Tarrytown', 'New York', 'United States', '10591', '2017-06-20 18:44:14', '', ''),
(14, 12, 41.0895249, -73.8419063, 'Tarrytown', 'New York', 'United States', '10591', '2017-06-20 19:31:11', '', ''),
(15, 12, 44.311160199999996, -73.246831, 'Charlotte', 'Vermont', 'United States', '05445', '2017-06-20 19:32:17', '', ''),
(16, 12, 44.3151275, -73.227358, 'Charlotte', 'Vermont', 'United States', '05445', '2017-06-20 19:33:31', '', ''),
(17, 12, 44.3197307, -73.1922737, 'Charlotte', 'Vermont', 'United States', '05445', '2017-06-20 19:35:57', '', ''),
(18, 12, 44.3197307, -73.1922737, 'Charlotte', 'Vermont', 'United States', '05445', '2017-06-20 19:37:10', '', ''),
(19, 12, 44.328640899999996, -73.11357939999999, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:41:53', '', ''),
(20, 12, 44.328640899999996, -73.11357939999999, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:42:23', '', ''),
(21, 12, 44.328640899999996, -73.11357939999999, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:42:26', '', ''),
(22, 12, 44.328640899999996, -73.11357939999999, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:42:32', '', ''),
(23, 12, 44.328640899999996, -73.11357939999999, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:43:03', '', ''),
(24, 12, 44.328640899999996, -73.11357939999999, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:43:58', '', ''),
(25, 12, 44.3294107, -73.1103536, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:44:12', '', ''),
(26, 12, 44.341299, -73.117265, 'Hinesburg', 'Vermont', 'United States', '05461', '2017-06-20 19:46:11', '', ''),
(27, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:49:10', '', ''),
(28, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:49:13', '', ''),
(29, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:49:27', '', ''),
(30, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:49:53', '', ''),
(31, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:50:11', '', ''),
(32, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:50:19', '', ''),
(33, 12, 44.370986599999995, -73.1278978, 'Saint George', 'Vermont', 'United States', '05495', '2017-06-20 19:51:39', '', ''),
(34, 12, 44.408535300000004, -73.12523709999999, 'Williston', 'Vermont', 'United States', '05495', '2017-06-20 19:52:08', '', ''),
(35, 12, 44.4156893, -73.124348, 'Williston', 'Vermont', 'United States', '05495', '2017-06-20 19:52:21', '', ''),
(36, 12, 44.4344472, -73.1174163, 'Williston', 'Vermont', 'United States', '05495', '2017-06-20 19:54:05', '', ''),
(37, 12, 44.370494900000004, -72.86547829999999, 'Bolton', 'Vermont', 'United States', '05676', '2017-06-20 20:07:37', '', ''),
(38, 12, 44.370494900000004, -72.86547829999999, 'Bolton', 'Vermont', 'United States', '05676', '2017-06-20 20:08:41', '', ''),
(39, 12, 44.370494900000004, -72.86547829999999, 'Bolton', 'Vermont', 'United States', '05676', '2017-06-20 20:09:12', '', ''),
(40, 12, 44.370494900000004, -72.86547829999999, 'Bolton', 'Vermont', 'United States', '05676', '2017-06-20 20:10:40', '', ''),
(41, 12, 44.370494900000004, -72.86547829999999, 'Bolton', 'Vermont', 'United States', '05676', '2017-06-20 20:12:34', '', ''),
(42, 12, 44.341815700000005, -72.7587691, 'Waterbury', 'Vermont', 'United States', '05676', '2017-06-20 20:12:59', '', ''),
(43, 12, 44.3418309, -72.7583535, 'Waterbury', 'Vermont', 'United States', '05676', '2017-06-20 20:14:25', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `p_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `p_title` varchar(45) DEFAULT NULL,
  `p_comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `f_name` varchar(45) NOT NULL,
  `l_name` varchar(45) NOT NULL,
  `u_name` varchar(45) NOT NULL,
  `p_word` varchar(255) NOT NULL,
  `memsince` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `f_name`, `l_name`, `u_name`, `p_word`, `memsince`) VALUES
(12, 'Pierce', 'Gresham', 'pagresham', '$2y$10$WCswoS5DhEPabD5DK6gghep12LdFL0Oz544Gkx5h5KYKxQTgsj5T6', '2017-06-20'),
(13, 'Robin', 'Gresham', 'robinlgresham', '$2y$10$DRogzj6h/w2Vg7z2tetTsuvCcznCOvjZJkdCUlwn/PjbHfw7qMHo.', '2017-06-20'),
(14, 'first', 'last', 'username', '$2y$10$rm/RmC/qBkJma56Ok0M6xemQ20iP9PfDcGDxBEn5Tcwq8gtTP/9oW', '2017-06-20'),
(15, 'iiiiiiii', 'iiiiiiii', 'iiiiiiii', '$2y$10$s5Fl5KFhpMrZyhcIHF6mbOj0iCs48AhWzhoWhMPlcloz9IzbVKH/i', '2017-06-20'),
(16, 'jjj', 'jjj', 'jjjjjjjj', '$2y$10$tFSD84W76brVMF5obTG.OO6h.WsrBlCVLM.O3eyKfC09AOLVXA8kO', '2017-06-20'),
(17, 'kkkkkk', 'kkk', '', '$2y$10$S/7Yt36MAs/7caIhDdo8auaEOWK86jfkvWrHOfil3rmmh5Mkjo.7O', '2017-06-20'),
(18, 'asdf', 'asdf', 'thisissomething', '$2y$10$OEzvc4iMAxTbiltW0ZuFquw/wwTKIRTg0DL3gJrnKNw9geAbS1djG', '2017-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `fk_friends_users1_idx` (`f_1`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_log_users1_idx` (`u_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_photos_log_idx` (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		', AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_friends_users1` FOREIGN KEY (`f_1`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_log_users1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Create User Script

-- CREATE USER 'log_my_loc'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';
-- GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, 
-- CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, 
-- ALTER ROUTINE, EXECUTE ON *.* TO 'log_my_loc'@'localhost' 
-- REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
-- GRANT ALL PRIVILEGES ON `logmyloc`.* TO 'log_my_loc'@'localhost';




