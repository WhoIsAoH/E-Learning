-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2022 at 12:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eLearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(5) NOT NULL,
  `news_topic` text NOT NULL,
  `news_description` text NOT NULL,
  `news_types` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsType`
--

CREATE TABLE `newsType` (
  `news_type_id` int(5) NOT NULL,
  `news_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsType`
--

INSERT INTO `newsType` (`news_type_id`, `news_type`) VALUES
(1, 'Announcement'),
(2, 'Critical'),
(3, 'Sponsored');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(5) NOT NULL,
  `user_ids` int(5) NOT NULL,
  `resource_ids` int(5) NOT NULL,
  `record_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(5) NOT NULL,
  `resource_name` text NOT NULL,
  `resource_origin` text NOT NULL,
  `resource_description` text NOT NULL,
  `resource_file_name` varchar(255) NOT NULL,
  `resource_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resourceRequest`
--

CREATE TABLE `resourceRequest` (
  `request_id` int(5) NOT NULL,
  `request_name` varchar(20) NOT NULL,
  `request_origin` varchar(20) NOT NULL,
  `request_description` text NOT NULL,
  `request_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `request_type` text NOT NULL,
  `user_ids` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resourceType`
--

CREATE TABLE `resourceType` (
  `resource_type_id` int(5) NOT NULL,
  `resource_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resourceType`
--

INSERT INTO `resourceType` (`resource_type_id`, `resource_type_name`) VALUES
(1, 'pdf'),
(2, 'word');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` char(60) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_type_ids` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_type_ids`) VALUES
(1, 'admin', 'admin@admin.admin', 'admin', '9876543210', 1),
(2, 'student', 'student@student.student', 'student', '1230456789', 2),
(3, 'test', 'test@test.test', 'test', '987655555', 2),
(6, 'user', 'user@user.user', 'admin', '111111111', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userProfile`
--

CREATE TABLE `userProfile` (
  `user_ids` int(5) NOT NULL,
  `user_bio` text NOT NULL,
  `user_interest` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userProfile`
--

INSERT INTO `userProfile` (`user_ids`, `user_bio`, `user_interest`) VALUES
(1, 'This is admin', 'Intresting'),
(2, 'This is me', 'Dev');

-- --------------------------------------------------------

--
-- Table structure for table `userType`
--

CREATE TABLE `userType` (
  `user_type_id` int(5) NOT NULL,
  `user_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userType`
--

INSERT INTO `userType` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `newsType`
--
ALTER TABLE `newsType`
  ADD PRIMARY KEY (`news_type_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `record_ibfk_1` (`resource_ids`),
  ADD KEY `record_ibfk_2` (`user_ids`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `resourceRequest`
--
ALTER TABLE `resourceRequest`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_ids` (`user_ids`);

--
-- Indexes for table `resourceType`
--
ALTER TABLE `resourceType`
  ADD PRIMARY KEY (`resource_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `type` (`user_type_ids`);

--
-- Indexes for table `userProfile`
--
ALTER TABLE `userProfile`
  ADD PRIMARY KEY (`user_ids`);

--
-- Indexes for table `userType`
--
ALTER TABLE `userType`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsType`
--
ALTER TABLE `newsType`
  MODIFY `news_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resourceRequest`
--
ALTER TABLE `resourceRequest`
  MODIFY `request_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resourceType`
--
ALTER TABLE `resourceType`
  MODIFY `resource_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userType`
--
ALTER TABLE `userType`
  MODIFY `user_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`resource_ids`) REFERENCES `resource` (`resource_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`user_ids`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resourceRequest`
--
ALTER TABLE `resourceRequest`
  ADD CONSTRAINT `resourceRequest_ibfk_1` FOREIGN KEY (`user_ids`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `type` FOREIGN KEY (`user_type_ids`) REFERENCES `userType` (`user_type_id`);

--
-- Constraints for table `userProfile`
--
ALTER TABLE `userProfile`
  ADD CONSTRAINT `userProfile_ibfk_1` FOREIGN KEY (`user_ids`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
