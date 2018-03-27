-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2018 at 08:05 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `consul_doctors`
--

CREATE TABLE `consul_doctors` (
  `consul_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `doctor_id` varchar(250) NOT NULL,
  `questions` varchar(250) NOT NULL,
  `answer_status` varchar(5) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consul_doctors`
--

INSERT INTO `consul_doctors` (`consul_id`, `user_id`, `doctor_id`, `questions`, `answer_status`, `answer`, `created_date`) VALUES
(20, '6', '2', 'mik hallo\r\n', 'true', 'nhnh', '2018-03-25 00:58:23'),
(21, '6', '2', 'hi yuan', 'true', 'nhnh', '2018-03-25 00:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `born_date` date NOT NULL,
  `phone` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `email`, `gender`, `born_date`, `phone`, `created_date`) VALUES
(1, 'Nika Ghea', 'nika21@gmail.com', 'F', '1985-10-06', '089990811303', '2018-03-17 14:16:46'),
(2, 'Yuan Miko', 'mikoyuan@gmail.com', 'M', '1983-01-01', '081211160908', '2018-03-17 14:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `login_histories`
--

CREATE TABLE `login_histories` (
  `login_history_id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_histories`
--

INSERT INTO `login_histories` (`login_history_id`, `user_id`, `created_date`) VALUES
(27, '1', '2018-03-23 08:49:00'),
(30, '1', '2018-03-23 23:30:00'),
(31, '1', '2018-03-25 00:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `born_date` date NOT NULL,
  `password` varchar(250) NOT NULL,
  `level_user` varchar(150) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `gender`, `born_date`, `password`, `level_user`, `profile_picture`, `created_date`) VALUES
(1, 'user_ganteng', 'arifakhri wilaga', 'arifakhri@gmail.com', 'male', '2018-02-21', '1cb70b7d6de510e5f51b194345590504', 'admin', '', '2018-02-27 04:23:42'),
(2, 'tes', 'test', 'test@tes', 'male', '0000-00-00', '6e7906b7fb3f8e1c6366c0910050e595', 'user', '', '2018-02-24 01:32:20'),
(6, 'hana', 'hana', 'hana@gmail.com', 'female', '1998-12-22', '9ea1a379686c75d713a4b8b1a5f2099d', 'user', '/uploads/profile_picture/hanaprofile_picture_20180317125942.png', '2018-03-17 05:59:42'),
(8, 'bnm', 'bnm', 'bnm@bnm', 'male', '1998-12-25', 'a8f5f167f44f4964e6c998dee827110c', 'user', '', '2018-03-02 04:12:56'),
(9, 'ujan', 'ujang nahar niaga', 'ujan@ujan', 'male', '1998-12-24', '047550e02db65c61e9474d11376dec7e', 'user', '', '2018-03-06 05:12:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consul_doctors`
--
ALTER TABLE `consul_doctors`
  ADD PRIMARY KEY (`consul_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`login_history_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consul_doctors`
--
ALTER TABLE `consul_doctors`
  MODIFY `consul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `login_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
