-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 03:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `room` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `subject`, `room`, `thumbnail`, `class_code`, `user_id`) VALUES
(7, 'Lý thuyết web', 'Tìm hiểu về web, học ca 1', 'F405', 'Pinterest-Cover-De-Post-Del-Blog-Web-Design-Trends-1280x720px.jpg', 'cCyM1Ydo', 9),
(8, 'Lý thuyết công nghệ phần mềm', 'Tìm hiểu cách làm phần mềm', 'F701', 'unnamed.png', '08QLUD73', 9),
(9, 'Đường lối đảng cộng sản', 'Nghiên cứu về đảng', 'C208', 'thanh-lap-dang.jpg', '5VOT0PJ5', 10),
(10, 'Tư tưởng Hồ Chí Minh', 'Học về sự vĩ đại của người', 'B202', 'CN Mac Lenin.jpg', 'LYnV89GB', 10),
(11, 'Thực hành web', 'Should have been shift', 'A504', 'woman-typing-on-laptop-3.jpg', 'Gt1aV3bI', 11),
(12, 'Thực hành phân tích giải thuật', 'Shift 2', 'A606', 'what-is-an-algorithm-featured-1587563495931325032820.png', 'urFP0FdN', 11);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `commenter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commenter`, `datetime`, `content`, `posts_id`) VALUES
(5, 'Đặng Minh Thắng', '02-12-2020 21:17:12', 'Các bạn tải file về', 10),
(6, 'Vương Gia Hào', '02-12-2020 21:18:15', 'Tải sao thầy', 10),
(7, 'Hoàng Gia Huy', '02-12-2020 21:18:38', 'Bấm nút Download', 10),
(8, 'Hoàng Gia Huy', '02-12-2020 21:18:54', 'Và comment này để mai mốt thuyết trình để test xóa', 10),
(9, 'Đặng Minh Thắng', '02-12-2020 21:20:25', 'stando powah zenkai da', 10),
(10, 'Đặng Minh Thắng', '02-12-2020 21:21:10', 'baka na', 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author`, `datetime`, `content`, `file`, `class_id`, `user_id`) VALUES
(10, 'Đặng Minh Thắng', '02-12-2020 21:16:51', 'Nộp bài 2/12', 'sunflower.png', 7, 9),
(11, 'Đặng Minh Thắng', '02-12-2020 21:19:59', 'Bài này không có đính kèm file nên không có nút download', '', 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date_time` date NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobilenumber`, `password`, `date_time`, `reset_token`, `user_type`) VALUES
(8, 'Dương Minh', 'Ngọc', 'nhoxhoakuter2000@gmail.com', '0999999999', '$2y$10$S34ekO2dv5j/QToWRiycE.1j4C/SPjHMOb8SYFikFqmS0oUrRaoPO', '2020-12-02', '', 'admin'),
(9, 'Đặng Minh', 'Thắng', 'dangminhthang@tdtu.edu.vn', '0888888888', '$2y$10$ayr3wMAaiJHXvR8LUP9WKeWUKwjHB.s0daT4MYqFprevAfmKDZilK', '2020-12-02', '', 'teacher'),
(10, 'Ngô Bá', 'Khiêm', 'ngobakhiem@tdtu.edu.vn', '0777777777', '$2y$10$hjcEZ.4IFp7qO1ICAZBUw.FhspDpZh1YaQYYRw6//oFwEWczLMqQ2', '2020-12-02', '', 'teacher'),
(11, 'Bhagawan', 'Nath', 'nath@tdtu.edu.vn', '0666666666', '$2y$10$YH6tkeAOA/b.b4gNfftV9.Pau6IPJB1gxVrwucdDHx0Xrc4bnL8x6', '2020-12-02', '', 'teacher'),
(12, 'Vũ Bích', 'Nga', '718h0541@student.tdtu.edu.vn', '0123456789', '$2y$10$RikbxoI8ysedCYaltLMXC.JpucF2YvqYgr5FQ82tkc3cP8/qTzcey', '2020-12-02', '', 'student'),
(13, 'Vương Gia', 'Hào', '518h0003@student.tdtu.edu.vn', '0987654321', '$2y$10$exxDT.m0PCMHIne5Rby6o.nQCBePLjPmqMFjdd1smhfP3Gi.yeiuy', '2020-12-02', '', 'student'),
(14, 'Hoàng Gia', 'Huy', '518H0626@student.tdtu.edu.vn', '0111111111', '$2y$10$ROzjau6X9lOu8fFCVFumQ.zRqH0Y1Rh8YT01Bs5g/eZBKasfTnPmm', '2020-12-02', '', 'student'),
(15, 'Nguyễn Minh', 'Phú', 'truongkhac@uit.edu.vn', '0222222222', '$2y$10$6Xo/jYZGf6GdwTBpL2wsPeX.VXvuIQ5v45SgFiMMoFatpOlKFj6mm', '2020-12-02', '', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `users_class`
--

CREATE TABLE `users_class` (
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_class`
--

INSERT INTO `users_class` (`user_id`, `class_id`) VALUES
(12, 10),
(13, 7),
(13, 8),
(13, 9),
(14, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to posts` (`posts_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `To class` (`class_id`),
  ADD KEY `To user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_class`
--
ALTER TABLE `users_class`
  ADD PRIMARY KEY (`user_id`,`class_id`),
  ADD KEY `To class` (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `Owner of class` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `from comment to post` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `From post to class` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `From post to user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_class`
--
ALTER TABLE `users_class`
  ADD CONSTRAINT `To class` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `To users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
