-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 09:04 PM
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `comment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `comment_date`, `user_id`, `resource_id`) VALUES
(1, 'This was an interesting book to read.', '2022-05-12 10:03:50', 1, 5),
(2, 'Very bad experience with this book!!', '2022-05-12 11:04:25', 1, 5),
(3, 'very informative book', '2022-05-12 11:20:33', 1, 14),
(4, 'not bad', '2022-05-12 11:21:42', 4, 14),
(5, 'this is the best book ever!!!!', '2022-05-12 12:12:19', 4, 2),
(6, 'worst', '2022-05-12 12:13:39', 1, 2),
(7, 'goood', '2022-05-12 12:25:19', 1, 12),
(8, 'FU!!', '2022-05-12 12:26:05', 4, 12),
(9, 'Ok', '2022-05-12 12:30:02', 4, 5),
(10, 'Doke', '2022-05-12 12:30:22', 4, 5),
(11, 'lkj;ji', '2022-05-16 19:56:00', 1, 13),
(12, 'test comment', '2022-05-31 08:55:45', 1, 14),
(13, 'good', '2022-06-04 14:32:06', 1, 12),
(14, 'Good book', '2022-06-05 19:24:02', 1, 12);

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

--
-- Dumping data for table `donate_record`
--

INSERT INTO `donate_record` (`record_id`, `donate_date`, `user_id`, `resource_id`) VALUES
(14, '2022-06-06 20:59:01', 1, 45),
(15, '2022-06-08 21:24:50', 15, 50);

-- --------------------------------------------------------

--
-- Table structure for table `download_record`
--

CREATE TABLE `download_record` (
  `download_record_id` int(11) NOT NULL,
  `date_downloaded` datetime NOT NULL,
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `download_record`
--

INSERT INTO `download_record` (`download_record_id`, `date_downloaded`, `resource_id`, `user_id`) VALUES
(6, '2022-06-06 19:53:05', 14, 1),
(7, '2022-06-06 19:53:08', 14, 1),
(8, '2022-06-08 19:30:38', 14, 1),
(9, '2022-06-08 19:30:50', 14, 1),
(10, '2022-06-08 19:30:53', 14, 1),
(11, '2022-06-08 21:21:57', 14, 5),
(12, '2022-06-08 21:26:34', 50, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating`, `user_id`, `resource_id`) VALUES
(1, 5, 1, 12),
(2, 3, 3, 12),
(3, 4, 1, 14),
(4, 3, 1, 36),
(5, 4, 1, 5),
(6, 4, 1, 37),
(7, 4, 10, 14),
(8, 4, 1, 4),
(9, 4, 1, 44),
(10, 4, 5, 12),
(11, 5, 5, 14),
(12, 5, 15, 50);

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

--
-- Dumping data for table `read_record`
--

INSERT INTO `read_record` (`read_record_id`, `date_read`, `resource_id`, `user_id`) VALUES
(5, '2022-05-17 08:24:06', 14, 1),
(6, '2022-05-17 08:25:49', 14, 1),
(7, '2022-05-17 08:27:12', 14, 1),
(8, '2022-05-17 08:27:52', 14, 1),
(9, '2022-05-17 08:29:25', 14, 1),
(10, '2022-05-17 08:29:27', 14, 1),
(11, '2022-05-17 08:29:34', 14, 1),
(12, '2022-05-17 08:29:59', 14, 1),
(13, '2022-05-17 08:47:53', 14, 1),
(14, '2022-05-17 08:48:50', 14, 1),
(15, '2022-05-17 08:49:00', 12, 1),
(16, '2022-05-17 08:49:30', 14, 1),
(17, '2022-05-17 08:49:59', 19, 1),
(18, '2022-05-17 09:00:00', 19, 1),
(19, '2022-05-17 09:00:04', 19, 1),
(20, '2022-05-17 09:01:16', 19, 1),
(21, '2022-05-17 09:05:28', 19, 1),
(22, '2022-05-17 09:05:31', 19, 1),
(23, '2022-05-17 09:06:44', 19, 1),
(24, '2022-05-17 09:06:44', 19, 1),
(25, '2022-05-17 09:08:33', 19, 1),
(26, '2022-05-17 09:14:00', 19, 1),
(27, '2022-05-17 09:14:00', 19, 1),
(28, '2022-05-17 09:14:18', 19, 1),
(29, '2022-05-17 09:15:46', 19, 1),
(30, '2022-05-17 09:16:36', 14, 1),
(31, '2022-05-17 09:19:43', 14, 1),
(32, '2022-05-17 09:19:45', 14, 1),
(33, '2022-05-17 09:20:21', 13, 1),
(34, '2022-05-17 09:20:45', 13, 1),
(35, '2022-05-17 09:21:08', 13, 1),
(36, '2022-05-17 09:21:15', 13, 1),
(37, '2022-05-17 09:21:40', 13, 1),
(38, '2022-05-17 09:21:49', 13, 1),
(39, '2022-05-17 09:22:10', 14, 1),
(40, '2022-05-17 09:25:01', 19, 1),
(41, '2022-05-17 09:26:52', 5, 1),
(42, '2022-05-17 09:47:34', 22, 1),
(43, '2022-05-17 09:56:02', 4, 1),
(44, '2022-05-17 09:56:10', 14, 1),
(45, '2022-05-17 09:56:20', 22, 1),
(46, '2022-05-17 09:56:30', 4, 1),
(47, '2022-05-17 09:56:47', 35, 1),
(48, '2022-05-19 13:50:33', 36, 1),
(49, '2022-05-24 09:17:51', 37, 1),
(50, '2022-06-04 14:32:33', 14, 1),
(51, '2022-06-06 19:23:44', 14, 1),
(52, '2022-06-06 19:23:44', 14, 1),
(53, '2022-06-06 19:25:31', 14, 1),
(54, '2022-06-06 19:25:31', 14, 1),
(55, '2022-06-06 19:29:34', 14, 1),
(56, '2022-06-06 19:29:37', 14, 1),
(57, '2022-06-06 19:29:40', 14, 1),
(61, '0000-00-00 00:00:00', 14, 1),
(62, '0000-00-00 00:00:00', 14, 1),
(63, '0000-00-00 00:00:00', 14, 1),
(64, '2022-06-06 19:44:58', 14, 1),
(65, '2022-06-06 19:45:01', 14, 1),
(66, '2022-06-06 19:45:03', 14, 1),
(67, '2022-06-06 19:47:00', 14, 1),
(68, '2022-06-06 19:48:10', 14, 1),
(69, '0000-00-00 00:00:00', 2, 3),
(70, '2022-06-06 19:49:18', 2, 3),
(71, '2022-06-06 19:51:02', 14, 1),
(72, '2022-06-06 19:51:35', 14, 1),
(73, '2022-06-06 20:23:35', 38, 1),
(74, '2022-06-06 20:50:20', 44, 1),
(75, '2022-06-07 20:14:27', 12, 1),
(76, '2022-06-07 20:14:33', 12, 1),
(77, '2022-06-07 20:14:34', 12, 1),
(78, '2022-06-07 21:05:29', 12, 1),
(79, '2022-06-08 19:14:29', 12, 1),
(80, '2022-06-08 19:14:40', 14, 1),
(81, '2022-06-08 21:21:06', 2, 5),
(82, '2022-06-08 21:21:42', 14, 5),
(83, '2022-06-08 21:26:26', 50, 15),
(84, '2022-06-08 21:32:48', 4, 1),
(85, '2022-06-08 21:37:13', 4, 1),
(86, '2022-06-08 21:40:54', 4, 1),
(87, '2022-06-08 21:40:56', 4, 1),
(88, '2022-06-08 21:41:19', 4, 1),
(89, '2022-06-08 21:41:48', 4, 1),
(90, '2022-06-08 21:47:25', 12, 1),
(91, '2022-06-08 21:51:54', 12, 1),
(92, '2022-06-08 22:00:10', 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_id` int(11) NOT NULL,
  `resource_type` varchar(15) NOT NULL,
  `resource_title` varchar(60) NOT NULL,
  `resource_author` varchar(30) NOT NULL,
  `resource_desc` longtext NOT NULL,
  `resource_cover` varchar(60) NOT NULL,
  `resource_file` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resource_id`, `resource_type`, `resource_title`, `resource_author`, `resource_desc`, `resource_cover`, `resource_file`, `user_id`) VALUES
(2, 'Book', 'Harry Potter and The Sorcerer\'s Stone', 'J.K. Rowling', 'Harry Potter has never been the star of a Quidditch team, scoring points while riding a broom far above the ground. He knows no spells, has never helped to hatch a dragon, and has never worn a cloak of invisibility. All he knows is a miserable life with the Dursleys, his horrible aunt and uncle, and their abominable son, Dudley-a great big swollen spoiled bully. Harry\'s room is a tiny closet at the foot of the stairs, and he hasn\'t had a birthday party in eleven years. But all that is about to change when a mysterious letter arrives by owl messenger: a letter with an invitation to an incredible place that Harry-and anyone who reads about him-will find unforgettable. For it\'s there that he finds not only friends, aerial sports, and magic in everything from classes to meals, but a great destiny that\'s been waiting for him... if Harry can survive the encounter.', 'cover.jpg', 'harry-potter-sorcerer-stone.pdf', 1),
(4, 'Book', 'The Client', 'John Grisham', 'An eleven-year-old has discovered a secret that not even an adult should know. A US State Senator is dead, and Mark Sway is the only one who knows where the body is hidden. The FBI want him to tell them where it is at whatever cost to Mark and his family. The killer wants him silenced forever. Reggie Love has been practising law for less than five years. Only she can save Mark from these twin threats. Together, they must take on the might of the State and the wiles of a cold-blooded killer.', 'the_client.jpg', 'the-client-john-grisham.pdf', 1),
(5, 'Book', 'My Test', 'Nahom Habtamu', 'My Description', '', '62781ba2a62a89.52888877.pdf', 1),
(12, 'Book', 'Requirements Engineering for Software and Systems', 'Phillip A. Laplante', 'Solid requirements engineering has increasingly been recognized as the key to improved, on-time, and on-budget delivery of software and systems projects. This textbook provides a comprehensive treatment of the theoretical and practical aspects of discovering, analyzing, modeling, validating, testing, and writing requirements for systems of all kinds, with an intentional focus on software-intensive systems. It brings into play a variety of formal methods, social models, and modern requirements for writing techniques to be useful to the practicing engineer.', 'req-eng-cover.jpg', 'req-eng-book-resource.pdf', 1),
(13, 'Assignment', 'SRE Phase I', 'Nahom Habtamu', 'this is SRE phase I assignment', '6278225f008521.76565102.jpg', '6278225f005fd5.97197232.pdf', 1),
(14, 'Book', 'PHP: Learn PHP in One Day', 'Jamie Chan', 'Learn PHP Fast and Learn It Well. Master PHP Programming with a unique Hands-On Project New Book by Best Selling Author Jamie Chan. Book 6 of the Learn Coding Fast Series.  Do you want to learn PHP fast but are overwhelmed by all the information you find online? Or perhaps you have completed numerou', '627836b7355684.07623968.jpg', '627836b7352e37.06056031.pdf', 1),
(15, 'Assignment', 'SRE Phase I', 'Nahom', 'this is SRE phase I assignment', '62783a58699897.22805597.jpg', '62783a58696390.73583105.pdf', 1),
(19, 'Test and Quiz', 'fds', 'fds', 'dsf', '', '6282bbfe969725.40108911.pdf', 1),
(22, 'Research', 'sdfds', 'sdf', 'dsaf', '', '62834155383722.56455617.pdf', 1),
(35, 'Test and Quiz', 'sdf', 'sdf', 'My Description', '62834695d31ae8.24236180.jpg', '62834695d2f102.51230121.pdf', 1),
(36, 'Test and Quiz', 'Civil Engineering Book', 'Nahom Hailu (Babi)', 'This is civil engineering book.', '628620ea6cf589.14289003.jpg', '628620ea6cb3a0.68309031.pdf', 1),
(37, 'Test and Quiz', 'kjhj', 'klhkln', 'lkjli', '628c7878450946.67315253.png', '628c78784495b7.95200861.pdf', 1),
(38, 'Test and Quiz', 'Final Test Schedule', 'ETS0505/12', 'this is SRE phase I assignment.', '629e37ee99e263.23901956.png', '629e37ee99a0f3.53970250.pdf', 1),
(40, 'Test and Quiz', 'Resource Title', 'ETS0505/12', 'My Description.', '629e3bd01d6e61.42263465.png', '629e3bd01bb252.04369283.pdf', 1),
(42, 'Test and Quiz', 'Resource Title', 'ETS0505/12', 'My Description.', '629e3d59414ac8.44739966.png', '629e3d593d8001.90050653.pdf', 1),
(43, 'Test and Quiz', 'Resource Title', 'ETS0505/12', 'My Description.', '629e3d7ed22964.30930092.png', '629e3d7ed0fbe8.86769132.pdf', 1),
(44, 'Test and Quiz', 'hellloooooo, can you hear me, iw as', 'ETS0505/12', 'this is SRE phase I assignment', '629e3e46dee7d1.26022150.png', '629e3e46ddbdb5.71595180.pdf', 1),
(45, 'Test and Quiz', 'ukyfyj', 'ETS0505/12', 'this is SRE phase I assignment.', '629e3f443b0ec4.66541936.png', '629e3f44386607.45727747.pdf', 1),
(48, 'Test and Quiz', 'ukyfyj', 'ETS0505/12', 'this is SRE phase I assignment.', '629e403746ec12.34147098.png', '629e403745c906.65839518.pdf', 1),
(49, 'Test and Quiz', 'ukyfyj', 'ETS0505/12', 'this is SRE phase I assignment.', '629e40655d0f97.46731446.png', '629e40655caf42.45951459.pdf', 1),
(50, 'Assignment', 'Frameworks Presentation', 'mahletAnbessie', 'This is 3rd year IP group assignment - prepare a presentation on Frameworks.', '', '62a0e972a17829.72693467.pdf', 15);

-- --------------------------------------------------------

--
-- Table structure for table `resource_tag`
--

CREATE TABLE `resource_tag` (
  `resource_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resource_tag`
--

INSERT INTO `resource_tag` (`resource_id`, `tag_id`) VALUES
(2, 1),
(2, 4),
(2, 5),
(2, 6),
(4, 3),
(4, 4),
(35, 3),
(35, 4),
(35, 6),
(36, 7),
(36, 8),
(37, 4),
(37, 6),
(37, 8),
(45, 1),
(45, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(1, 'Fantasy'),
(2, 'Science Fiction'),
(3, 'Action'),
(4, 'Adventure'),
(5, 'Children'),
(6, 'Young-Adult'),
(7, 'Mathematics'),
(8, 'Civil Engineering ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `first_name`, `last_name`, `gender`, `username`, `password`, `email`, `phone`) VALUES
(1, 'user', 'Nahom', 'Habtamu', 'M', 'ETS0505/12', '$2y$10$z03P9X.piiK2mKaP7oxdNeSiwxDS157EScQr3H5J4MvjZIwtVubYy', 'nhabtamu42@gmail.com', '0900111111'),
(2, 'admin', 'Nahom ', 'Getachew', 'M', 'NahomGetachew@admin', 'nahomg', 'garinahomgetachew@gmail.com', '0941606496'),
(3, 'user', 'Mikeyas', 'Alemu', 'M', 'mikeyas@user', 'mikeyasa', 'mikeyasalemu@gmail.com', '0941474186'),
(4, 'user', 'Nahom', 'Getachew', 'M', 'nahomgetachew', 'NA606496', 'nahigetachew@gmail.com', '0941606496'),
(5, 'admin', 'Nahom', 'Habtamu', 'M', 'NahomHabtamu@admin', '$2y$10$rGSvnsfzqL1sx5xaiVKWcOcl8iC/xnCEzGF0epbGfEb2GWd3ldLWW', 'nhabtamu42@gmail.com', '0939656144'),
(9, 'user', 'Jack', 'Bauer', 'M', 'Jack24', '$2y$10$3jRXa1qAI1so0B330kwDF.cLH8Q1gCfnZhubSbcAKSZWhuIYQna3.', '24@gmail.com', '0911111111'),
(10, 'user', 'Ethan', 'Hunt', 'M', 'IMF', '$2y$10$/hMeNsU2w2KGM9n3e08UQetpr5hBuxTlE3PQ5obVaj4lx5m20mhsG', 'missionimpossible@gmail.com', '0911111111'),
(15, 'user', 'Mahlet', 'Anbessie', 'F', 'mahletAnbessie', '$2y$10$Nqs0z3cl.i/fvHOFZPml0OYT8H0aj0etH3vbe3s/nFizgeoAZEWsm', 'test@gmail.com', '0900111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
-- Indexes for table `download_record`
--
ALTER TABLE `download_record`
  ADD PRIMARY KEY (`download_record_id`),
  ADD KEY `download_record_with_user_id` (`user_id`),
  ADD KEY `download_record_with_resource_id` (`resource_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_with_user_id` (`user_id`),
  ADD KEY `rating_with_resource_id` (`resource_id`);

--
-- Indexes for table `read_record`
--
ALTER TABLE `read_record`
  ADD PRIMARY KEY (`read_record_id`),
  ADD KEY `read_record_with_resource_id` (`resource_id`),
  ADD KEY `read_record_with_user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donate_record`
--
ALTER TABLE `donate_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `download_record`
--
ALTER TABLE `download_record`
  MODIFY `download_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `read_record`
--
ALTER TABLE `read_record`
  MODIFY `read_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `resource`
--
ALTER TABLE `resource`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `comment_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `donate_record`
--
ALTER TABLE `donate_record`
  ADD CONSTRAINT `donate_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `donate_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `download_record`
--
ALTER TABLE `download_record`
  ADD CONSTRAINT `download_record_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `download_record_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `rating_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `read_record`
--
ALTER TABLE `read_record`
  ADD CONSTRAINT `read_record_with_resource_id` FOREIGN KEY (`resource_id`) REFERENCES `resource` (`resource_id`),
  ADD CONSTRAINT `read_record_with_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
