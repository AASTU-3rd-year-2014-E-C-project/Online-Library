-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 07:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aastu_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment_and_rating`
--

CREATE TABLE `comment_and_rating` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donate_record`
--

CREATE TABLE `donate_record` (
  `record_id` int(11) NOT NULL,
  `donate_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `read_record`
--

CREATE TABLE `read_record` (
  `read_record_id` int(11) NOT NULL,
  `date_read` datetime NOT NULL,
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL,
  `resource_type` varchar(15) NOT NULL,
  `resource_title` varchar(30) NOT NULL,
  `resource_author` varchar(30) NOT NULL,
  `resource_desc` varchar(300) NOT NULL,
  `resource_cover` mediumblob NOT NULL,
  `resource_file` longblob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resource_tag`
--

CREATE TABLE `resource_tag` (
  `resource_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment_and_rating`
--
ALTER TABLE `comment_and_rating`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_with_user_id` (`user_id`),
  ADD KEY `comment_with_resource_id` (`resource_id`);

--
-- Indexes for table `donate_record`
--
ALTER TABLE `donate_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `donate_with_user_id` (`user_id`),
  ADD KEY `donate_with_resource_id` (`resource_id`);

--
-- Indexes for table `read_record`
--
ALTER TABLE `read_record`
  ADD PRIMARY KEY (`read_record_id`),
  ADD KEY `read_date_with_resource_id` (`resource_id`),
  ADD KEY `read_date_with_user_id` (`user_id`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `resource_with_user_id` (`user_id`);

--
-- Indexes for table `resource_tag`
--
ALTER TABLE `resource_tag`
  ADD KEY `tag_with_tag_id` (`tag_id`),
  ADD KEY `tag_with_resource_id` (`resource_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_and_rating`
--
ALTER TABLE `comment_and_rating`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donate_record`
--
ALTER TABLE `donate_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_record`
--
ALTER TABLE `read_record`
  MODIFY `read_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_and_rating`
--
ALTER TABLE `comment_and_rating`
  ADD CONSTRAINT `comment_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `comment_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `donate_record`
--
ALTER TABLE `donate_record`
  ADD CONSTRAINT `donate_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `donate_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `read_record`
--
ALTER TABLE `read_record`
  ADD CONSTRAINT `read_date_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `read_date_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `resource_tag`
--
ALTER TABLE `resource_tag`
  ADD CONSTRAINT `tag_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `tag_with_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
