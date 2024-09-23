-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 12:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(500) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `session_id`) VALUES
(1, 'test', 'test', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'nhi5bn1vl3jo4s2tls01hevit6');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` int(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `units` int(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `priority` int(2) NOT NULL,
  `request_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `blood_group`, `units`, `hospital`, `priority`, `request_status`) VALUES
(7, 'B+', 20, 'testt', 0, 'rejected'),
(8, 'AB+', 30, 'testt', 0, 'rejected'),
(21, 'B-', 20, 'testt', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `blood_units`
--

CREATE TABLE `blood_units` (
  `id` int(200) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `units` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_units`
--

INSERT INTO `blood_units` (`id`, `blood_group`, `units`) VALUES
(1, 'A+', 14),
(2, 'A-', 75),
(3, 'B+', 26),
(4, 'B-', 87),
(5, 'AB+', 8),
(6, 'AB-', 1),
(7, 'O+', 56),
(8, 'O-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_admin`
--

CREATE TABLE `contact_admin` (
  `id` int(200) NOT NULL,
  `query_name` varchar(30) NOT NULL,
  `query_phone` int(10) NOT NULL,
  `query_email` varchar(40) NOT NULL,
  `query_message` varchar(1000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `query_status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_admin`
--

INSERT INTO `contact_admin` (`id`, `query_name`, `query_phone`, `query_email`, `query_message`, `date_time`, `query_status`) VALUES
(10, 'test', 2147483647, 'abcd@gmail.com', 'osdfojdso', '2023-06-29 15:22:31', 'resolved');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `query_id` int(11) NOT NULL,
  `query_name` varchar(100) NOT NULL,
  `query_number` varchar(120) NOT NULL,
  `query_mail` char(11) NOT NULL,
  `query_message` longtext NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `query_status` varchar(11) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`query_id`, `query_name`, `query_number`, `query_mail`, `query_message`, `query_date`, `query_status`) VALUES
(6, 'test3', '7777777777', 'test@gmail.', 'hello this is a test mesage', '2023-06-08 17:21:39', 'read'),
(7, 'test3', '7777777777', 'test@gmail.', 'test', '2023-06-08 17:24:21', 'resolved'),
(10, 'ewoijowejf', '798798333', 'jasfajs@gma', 'aoijdoiasjdoijasoijdoasjodja', '2023-06-12 14:09:00', 'resolved'),
(11, 'ewoijowejf', '798798333', 'jasfajs@gma', 'aoijdoiasjdoijasoijdoasjodja', '2023-06-12 11:08:48', 'pending'),
(12, '', 'test@gmail.com', '', 'test message', '2023-06-29 14:37:02', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `mail_id` varchar(50) DEFAULT NULL,
  `age` int(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_details`
--

INSERT INTO `donor_details` (`id`, `name`, `mobile`, `mail_id`, `age`, `gender`, `blood_group`, `address`, `city`, `state`) VALUES
(226, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(227, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(228, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(229, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(230, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(231, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(232, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(233, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(234, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(235, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(236, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(237, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(238, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(239, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(240, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(241, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(242, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(243, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(244, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(245, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(246, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(247, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(248, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(249, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(250, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(251, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(252, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(253, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(254, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha'),
(255, 'testsss', '3333333333', 'test@gmail.com', 23, 'Male', 'B-', 'ww', 'qq', 'Odisha');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(100) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `user_name`, `name`, `phone`, `mail_id`, `password`, `session_id`) VALUES
(34, 'test', 'testt', '4444444444', 'test@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'vf1etqre5va89me2bcvk1o9e05'),
(35, 'ab', 'abcd', '4444444444', 'abcd@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_units`
--
ALTER TABLE `blood_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_admin`
--
ALTER TABLE `contact_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact_admin`
--
ALTER TABLE `contact_admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
