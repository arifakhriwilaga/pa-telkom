-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 02:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database-5`
--

-- --------------------------------------------------------

--
-- Table structure for table `consul_doctors`
--

CREATE TABLE `consul_doctors` (
  `consul_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `doctor_id` varchar(250) NOT NULL,
  `questions` text NOT NULL,
  `answer` longtext NOT NULL,
  `answer_status` text NOT NULL,
  `send_status` varchar(5) NOT NULL,
  `read_status` varchar(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consul_doctors`
--

INSERT INTO `consul_doctors` (`consul_id`, `user_id`, `doctor_id`, `questions`, `answer`, `answer_status`, `send_status`, `read_status`, `created_date`, `answer_date`) VALUES
(20, '4', '1', 'mengapa kepala selalu pusing jika langsung bangun?', 'bisa saja itu karna gejala anemia, jangan lupa selalu minum air putih', 'true', 'true', 'true', '2018-04-25 09:22:07', '2018-04-25 04:40:30'),
(21, '4', '2', 'mengapa sering bersin-bersin?', 'karna lingkungan sekitar bisa kena', 'true', '', '', '2018-04-25 09:39:14', '2018-04-25 09:39:14');

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `email`, `gender`, `born_date`, `phone`, `created_date`, `answer_date`) VALUES
(1, 'Nika Ghea', 'nika21@gmail.com', 'F', '1985-10-06', '089990811303', '2018-03-17 14:16:46', '0000-00-00 00:00:00'),
(2, 'Yuan Miko', 'mikoyuan@gmail.com', 'M', '1983-01-01', '081211160908', '2018-03-17 14:16:26', '0000-00-00 00:00:00');

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
(1, '2', '2018-04-21 10:39:00'),
(2, '2', '2018-04-22 04:30:00'),
(3, '5', '2018-04-25 13:52:00'),
(4, '5', '2018-04-25 19:52:00');

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
  `remember` varchar(5) NOT NULL,
  `cookie` varchar(300) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_login` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `gender`, `born_date`, `password`, `level_user`, `profile_picture`, `remember`, `cookie`, `created_date`, `status_login`) VALUES
(1, 'user_ganteng', 'ari fakhri wilaga', 'arifakhri97@gmail.com', 'male', '1997-04-21', '68b91a181c612783782742faf60f1dff', 'user', '/uploads/profile_picture/ari_fakhri_wilagaprofile_picture_20180421124701.png', '0', '', '2018-04-23 06:36:34', 1),
(2, 'hana_can', 'hana', 'hanaervani@gmail.com', 'female', '1997-11-26', '898cbb50926087930c6673f71e4bc853', 'admin', '', '0', '', '2018-04-21 01:39:42', 0),
(3, 'lili', 'lili', 'lili@gmail.com', 'male', '1998-12-31', '99cf46dbdbe60cc1aece292bfef61452', 'user', '', '0', '', '2018-04-21 02:31:43', 0),
(4, 'rinez123', 'Rinez Asprinola', 'asprinolarinez@gmail.com', 'female', '1997-04-12', '691c06f1c09915f7144f027d5d662fcb', 'user', '/uploads/profile_picture/Rinez_Asprinolaprofile_picture_20180425113427.jpg', '0', '', '2018-04-25 09:35:04', 0),
(5, 'admin123', 'admin', 'asprinolarinez@yahoo.co.id', 'female', '1997-04-19', '0192023a7bbd73250516f069df18b500', 'admin', '', '0', '', '2018-04-25 07:49:04', 0);

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
  MODIFY `login_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
