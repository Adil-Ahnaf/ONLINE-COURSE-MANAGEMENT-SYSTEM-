-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 06:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdip_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`course_id`, `course_name`, `course_fee`) VALUES
(101, 'Mobile App design step by step\r\nfrom beginner', 16000),
(102, 'UI/UX design with Adobe XD with Anderson', 12000),
(103, 'Wordpress theme development\r\nfrom scratch', 16000),
(104, 'Mobile App design step by step\r\nfrom beginner', 12000),
(105, 'How to complete user research\r\nand make work flow', 10000),
(106, 'Commitment to dedicated\r\nSupport', 16000);

-- --------------------------------------------------------

--
-- Table structure for table `course_payment`
--

CREATE TABLE `course_payment` (
  `payment_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_payment`
--

INSERT INTO `course_payment` (`payment_id`, `course_id`, `user_id`, `card_number`, `amount`) VALUES
(1, 102, 8, 456789, 12000),
(2, 102, 8, 456789, 12000),
(3, 101, 8, 456780, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `firstname`, `lastname`, `phone`, `skill`, `email`, `password`, `gender`) VALUES
(1, 'Adil', 'Ahnaf', 1715656565, 'Laravel, Python', 'adilahnaf433@gmail.com', '81dc9bdb52', 'Male'),
(2, 'Toni', 'Akter', 1714444444, 'java', 'toni123@gmail.com', '202cb962ac', 'Female'),
(3, 'Risad', 'Khan', 1715022222, 'Laravel, Python', 'risad123@gmail.com', '202cb962ac', 'Male'),
(4, 'Rakib', 'Hasan', 1915252525, 'Laravel', 'rakib1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male'),
(5, 'Monir', 'Khan', 1715099999, 'Python', 'monir456@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Male'),
(6, 'Apurbo', 'Sarkar', 1572072000, 'Responsive Web Design', 'apurbouiu5@gmail.com', '0f58ac9489ac8dd26d01025d74207ea9', 'Male'),
(7, 'Anam', 'Islam', 1718888888, 'Laravel, Python', 'anam123@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male'),
(8, 'Rafiqul', 'Islam', 1715033333, 'Laravel,Java,Javascript', 'rafiq456@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_payment`
--
ALTER TABLE `course_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `course_payment`
--
ALTER TABLE `course_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_payment`
--
ALTER TABLE `course_payment`
  ADD CONSTRAINT `course_payment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_list` (`course_id`),
  ADD CONSTRAINT `course_payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
