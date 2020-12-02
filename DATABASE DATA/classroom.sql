-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 09:20 AM
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
  `class_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `subject`, `room`, `thumbnail`, `class_code`, `user_id`) VALUES
(3, 'Admin class', 'test', '444', 'The_Notebook_Cover.jpg', 'dYWLqLMm', 1),
(5, 'Web 1', '124q', '215r3w', 'The_Notebook_Cover.jpg', 'oxBRC2bd', 5),
(6, 'Mobile22', 'sdh', 'gdfh', '330px-Jane_Eyre_title_page.jpg', 'xhUK2PIq', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobilenumber`, `password`, `date_time`, `reset_token`, `user_type`) VALUES
(1, 'Dương Minh', 'Ngọc', 'nhoxhoakuter2000@gmail.com', '0999999999', '$2y$10$Xv3CN2ZPNB446NS5pxYmhOzkL9y4xb4zkPhu8FswdJap//K9pML46', '2020-11-29', '', 'admin'),
(2, 'ngoc', 'ngoc', 'oksdnog@gmail.com', '0123456789', '$2y$10$apREhxdLj3Mu1km0mHtJsOhY2.QIHam0wSYOSSDmAEzjk2f4.FuY2', '2020-11-30', '', 'teacher'),
(3, 'eg', 'kjs', 'test@gmail.com', '0987654321', '$2y$10$7cLp1OD.ylRaZ4XSAGUtNO2.r6zUaJ6VQB2RpRdi7ISnxDeDU9y36', '2020-11-30', '', 'teacher'),
(5, 'dgsh', 'wehweh', 'mco09686@cuoly.com', '0888888888', '$2y$10$RmAOjOkQf97swqveWicMbOTCZ7eZOSlHElrgKvrB/MT6FuNItQNKy', '2020-11-30', '', 'teacher'),
(6, 'rfx42372@bcaoo.com', 'rfx42372@bcaoo.com', 'rfx42372@bcaoo.com', '0987656789', '$2y$10$C7vjJ0ay33nvxoRc41ML.u8UmUCxA0Lr/dy/vfOSH7JupwuoOgUbS', '2020-12-01', '', 'student'),
(7, 'fby90654@cuoly.com', 'fby90654@cuoly.com', 'fby90654@cuoly.com', '0887777777', '$2y$10$5C95RmTXgIknTXtSEzdh3O2qaJ38gXFLYnj1N2oitFlipbP.39eTi', '2020-12-01', '', 'student');

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
(6, 6),
(7, 6);

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `Owner of class` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
