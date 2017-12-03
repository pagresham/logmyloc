-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2017 at 04:42 AM
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

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`f_id`, `f_1`, `f_2`) VALUES
(5, 19, 19),
(6, 19, 12),
(96, 12, 19),
(98, 25, 25),
(101, 25, 26),
(102, 25, 12),
(103, 25, 19),
(104, 26, 26);

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
(108, 19, 35.210533399999996, -75.6940518, 'Hatteras', 'North Carolina', 'United States', '27953', '2017-06-25 01:43:19', '', ''),
(109, 19, 35.2105161, -75.6940359, 'Hatteras', 'North Carolina', 'United States', '27953', '2017-06-25 01:50:42', '', ''),
(114, 12, 38.8901393, -75.4388756, 'Milford', 'Delaware', 'United States', '19963', '2017-07-01 22:21:45', '', ''),
(115, 25, 42.8105356, -83.0790865, '', 'Michigan', 'United States', '48065', '2017-07-02 00:12:39', '', ''),
(116, 25, 42.8105356, -83.0790865, '', 'Michigan', 'United States', '48065', '2017-07-02 00:13:09', '', ''),
(117, 25, 42.8105356, -83.0790865, '', 'Michigan', 'United States', '48065', '2017-07-02 00:13:35', '', ''),
(118, 25, 42.8105356, -83.0790865, '', 'Michigan', 'United States', '48065', '2017-07-02 00:16:06', '', ''),
(119, 12, 42.8105356, -83.0790865, '', 'Michigan', 'United States', '48065', '2017-07-02 02:24:37', '', ''),
(120, 12, 42.8105356, -83.0790865, '', 'Michigan', 'United States', '48065', '2017-07-02 02:27:03', '', ''),
(121, 12, 42.1427037, -72.1223021, 'Sturbridge', 'Massachusetts', 'United States', '01518', '2017-07-02 14:43:11', '', '');

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
(12, 'Pierce', 'Gresham', 'pagresham', '$2y$10$J9qQyxI3nAmfg1kpUjUrUOQnZtOLXNw1as7l9qPeMyIRMhRQuNnVK', '2017-07-01'),
(19, 'Phoebe', 'Gresham', 'phoebegresham', '$2y$10$PcSj33xizBRP8jDk0uPa6eSmvt4Cc98qJ5leoDp1f18eLQ4XHTH8q', '2017-06-25'),
(25, 'new', 'user', 'newuser1', '$2y$10$N5m6xuop.2kZnKvqLaiMFu1kE2ulu53ydizNwP41RCHcCRmR9P97y', '2017-07-02'),
(26, 'pierce', 'gresham', 'piercegresham', '$2y$10$9nTN1NXlsmAtD2rriHVD5uef3fQHTiA0rzP.CzBZeZgZvHH6ykv9C', '2017-12-03');

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
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '		', AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
