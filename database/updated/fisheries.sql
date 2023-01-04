-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 03:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fisheries`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `ans_desc` text NOT NULL,
  `ans_title` text NOT NULL,
  `ans_is_correct` int(11) NOT NULL DEFAULT '0',
  `ans_added_by` int(11) NOT NULL,
  `ans_last_updated_by` int(11) NOT NULL,
  `ans_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ans_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `qs_id`, `ans_desc`, `ans_title`, `ans_is_correct`, `ans_added_by`, `ans_last_updated_by`, `ans_created_at`, `ans_updated_at`) VALUES
(89, 56, '', 'choice 1', 0, 0, 0, '2022-12-28 04:44:34', '0000-00-00 00:00:00'),
(90, 56, '', 'choice 2', 0, 0, 0, '2022-12-28 04:44:34', '0000-00-00 00:00:00'),
(91, 56, '', 'choice 3', 0, 0, 0, '2022-12-28 04:44:34', '0000-00-00 00:00:00'),
(92, 56, '', 'choice 4', 1, 0, 0, '2022-12-28 04:44:34', '0000-00-00 00:00:00'),
(93, 57, '', '1', 0, 0, 0, '2022-12-28 05:28:42', '0000-00-00 00:00:00'),
(94, 57, '', '2', 0, 0, 0, '2022-12-28 05:28:42', '0000-00-00 00:00:00'),
(95, 57, '', '3', 1, 0, 0, '2022-12-28 05:28:42', '0000-00-00 00:00:00'),
(96, 57, '', '4', 0, 0, 0, '2022-12-28 05:28:42', '0000-00-00 00:00:00'),
(97, 58, '', '11', 0, 0, 0, '2022-12-28 05:29:06', '0000-00-00 00:00:00'),
(98, 58, '', '12', 1, 0, 0, '2022-12-28 05:29:06', '0000-00-00 00:00:00'),
(99, 58, '', '13', 0, 0, 0, '2022-12-28 05:29:06', '0000-00-00 00:00:00'),
(100, 58, '', '14', 0, 0, 0, '2022-12-28 05:29:06', '0000-00-00 00:00:00'),
(101, 59, '', 'English', 1, 0, 0, '2022-12-28 05:29:55', '0000-00-00 00:00:00'),
(102, 59, '', 'Eng', 0, 0, 0, '2022-12-28 05:29:55', '0000-00-00 00:00:00'),
(103, 59, '', 'Lish', 0, 0, 0, '2022-12-28 05:29:55', '0000-00-00 00:00:00'),
(104, 59, '', 'Eng eng', 0, 0, 0, '2022-12-28 05:29:55', '0000-00-00 00:00:00'),
(105, 60, '', 'ans 1', 1, 0, 0, '2022-12-28 12:53:43', '0000-00-00 00:00:00'),
(106, 60, '', 'ans 2', 0, 0, 0, '2022-12-28 12:53:43', '0000-00-00 00:00:00'),
(107, 60, '', 'ans 3', 0, 0, 0, '2022-12-28 12:53:43', '0000-00-00 00:00:00'),
(108, 60, '', 'ans 4', 0, 0, 0, '2022-12-28 12:53:43', '0000-00-00 00:00:00'),
(109, 61, '', 'ans 11', 0, 0, 0, '2022-12-28 12:54:03', '0000-00-00 00:00:00'),
(110, 61, '', 'ans 12', 1, 0, 0, '2022-12-28 12:54:03', '0000-00-00 00:00:00'),
(111, 61, '', 'ans 13', 0, 0, 0, '2022-12-28 12:54:03', '0000-00-00 00:00:00'),
(112, 61, '', 'ans 14', 0, 0, 0, '2022-12-28 12:54:03', '0000-00-00 00:00:00'),
(113, 62, '', 'ans 111', 0, 0, 0, '2022-12-28 12:54:18', '0000-00-00 00:00:00'),
(114, 62, '', 'ans 122', 0, 0, 0, '2022-12-28 12:54:18', '0000-00-00 00:00:00'),
(115, 62, '', 'ans 133', 1, 0, 0, '2022-12-28 12:54:18', '0000-00-00 00:00:00'),
(116, 62, '', 'ans 144', 0, 0, 0, '2022-12-28 12:54:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `batch_type_of_test` varchar(50) NOT NULL,
  `batch_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `batch_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `user_id`, `batch_type_of_test`, `batch_created_at`, `batch_updated_at`) VALUES
(162, 'REV-BORW29QZMM', 2, 'pre', '2022-12-28 12:52:10', '2022-12-28 12:52:10'),
(163, 'REV-JU8CNKIVD9', 3, 'pre', '2022-12-28 12:52:13', '2022-12-28 12:52:13'),
(164, 'REV-XMZJFIMSAR', 3, 'review', '2022-12-28 12:54:36', '0000-00-00 00:00:00'),
(165, 'REV-RDHSVWCX01', 2, 'review', '2022-12-28 15:28:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_aka` varchar(200) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `cat_status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_aka`, `cat_desc`, `cat_status`, `created_at`) VALUES
(10, 'MATH', 'MTH', 'DESC', 'active', '2022-11-17 05:05:28'),
(11, 'ENGLISH', 'ENG', 'ENGLISH SUBJECT', 'active', '2022-11-17 05:05:46'),
(12, 'FILIPINO', 'FIL-2', 'sample', 'active', '2022-12-01 11:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `chat_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `message`, `user_from`, `user_to`, `chat_created_at`, `status`) VALUES
(29, 'hey!', 1, 2, '2022-11-18 19:52:31', ''),
(30, 'How can I help you?', 1, 3, '2022-11-18 19:52:40', ''),
(31, 'can you help me with that?', 1, 1, '2022-11-18 19:54:05', ''),
(32, 'hey!', 1, 3, '2022-11-18 19:54:15', ''),
(33, 'hey!', 3, 1, '2022-11-18 19:55:57', ''),
(34, 'asd', 3, 1, '2022-11-18 19:56:07', ''),
(35, 'how are you?', 1, 2, '2022-12-01 07:27:07', ''),
(36, 'All goods!', 2, 1, '2022-12-01 07:27:40', ''),
(37, 'how are you?!', 3, 1, '2022-12-01 11:11:15', ''),
(38, 'I\'m fine', 1, 3, '2022-12-01 11:11:41', ''),
(39, 'wala gd da thank you?', 3, 1, '2022-12-01 11:11:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `file_id` int(11) NOT NULL,
  `file_title` text NOT NULL,
  `file_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`file_id`, `file_title`, `file_name`, `created_at`) VALUES
(10, 'SAMPLE MODULE', 'NONC annex 4.pdf', '2022-12-28 05:08:29'),
(11, 'SAMPLE MODULE 2', 'CallySuare IVR Designer.pdf', '2022-12-28 05:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `qa_id` int(11) NOT NULL,
  `qa_batch` text NOT NULL,
  `qa_question` int(11) NOT NULL,
  `qa_answer` int(11) NOT NULL,
  `qa_answer_is_correct` tinyint(1) NOT NULL,
  `qa_user` int(11) NOT NULL,
  `qa_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`qa_id`, `qa_batch`, `qa_question`, `qa_answer`, `qa_answer_is_correct`, `qa_user`, `qa_created_at`) VALUES
(1047, 'REV-BORW29QZMM', 56, 91, 0, 2, '2022-12-28 05:30:24'),
(1048, 'REV-BORW29QZMM', 57, 94, 0, 2, '2022-12-28 05:30:24'),
(1049, 'REV-BORW29QZMM', 58, 100, 0, 2, '2022-12-28 05:30:24'),
(1050, 'REV-BORW29QZMM', 59, 104, 0, 2, '2022-12-28 05:30:24'),
(1051, 'REV-JU8CNKIVD9', 56, 92, 1, 3, '2022-12-28 05:32:19'),
(1052, 'REV-JU8CNKIVD9', 57, 95, 1, 3, '2022-12-28 05:32:19'),
(1053, 'REV-JU8CNKIVD9', 58, 98, 1, 3, '2022-12-28 05:32:19'),
(1054, 'REV-JU8CNKIVD9', 59, 101, 1, 3, '2022-12-28 05:32:19'),
(1059, 'REV-XMZJFIMSAR', 60, 105, 1, 3, '2022-12-28 12:54:36'),
(1060, 'REV-XMZJFIMSAR', 61, 109, 0, 3, '2022-12-28 12:54:36'),
(1061, 'REV-XMZJFIMSAR', 62, 115, 1, 3, '2022-12-28 12:54:36'),
(1062, 'REV-RDHSVWCX01', 60, 105, 1, 2, '2022-12-28 15:28:50'),
(1063, 'REV-RDHSVWCX01', 61, 110, 1, 2, '2022-12-28 15:28:50'),
(1064, 'REV-RDHSVWCX01', 62, 115, 1, 2, '2022-12-28 15:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qs_id` int(11) NOT NULL,
  `qs_title` varchar(255) NOT NULL,
  `qs_subtitle` varchar(255) NOT NULL,
  `type_of_test` varchar(50) NOT NULL,
  `qs_category` int(11) NOT NULL,
  `qs_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qs_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `qs_added_by` int(11) NOT NULL DEFAULT '1',
  `qs_last_updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qs_id`, `qs_title`, `qs_subtitle`, `type_of_test`, `qs_category`, `qs_created_at`, `qs_updated_at`, `qs_added_by`, `qs_last_updated_by`) VALUES
(56, 'Filipino pre-test 1', 'test', 'pre', 12, '2022-12-28 04:44:34', '0000-00-00 00:00:00', 1, 1),
(57, 'Pre test 1 for math ', 'test 1', 'pre', 10, '2022-12-28 05:28:42', '0000-00-00 00:00:00', 1, 1),
(58, 'Pre test 2 for math ', 'test 2', 'pre', 10, '2022-12-28 05:29:06', '0000-00-00 00:00:00', 1, 1),
(59, 'English Pre test', 'english test 1', 'pre', 11, '2022-12-28 05:29:55', '0000-00-00 00:00:00', 1, 1),
(60, 'Sample main test 1', 'no', 'review', 10, '2022-12-28 12:53:43', '0000-00-00 00:00:00', 1, 1),
(61, 'Sample main test 2', 'NO', 'review', 11, '2022-12-28 12:54:03', '0000-00-00 00:00:00', 1, 1),
(62, 'Sample main test 3', 'NO', 'review', 12, '2022-12-28 12:54:18', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `student_id_num` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `approved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `fname`, `mname`, `lname`, `email`, `phone`, `student_id_num`, `password`, `created_at`, `updated_at`, `approved_by`) VALUES
(1, 'admin', 'John', 'T', 'Doe', 'quensed@gmail.com', '09123456789', '0093903', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-11-17 07:26:28', '2022-11-17 07:26:28', 0),
(2, 'student', 'Foe', 'F', 'F', 'email@gmail.com', '09123456789', '0093903', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-11-17 07:26:34', '2022-11-17 07:26:34', 0),
(3, 'student', 'EMMA', 'GUALDRAPA', 'DUEÃ‘AS', 'email@email.com', '09123456789', '00939032', '5f4dcc3b5aa765d61d8327deb882cf99', '2022-11-17 07:26:36', '2022-11-17 07:26:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`qa_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `qa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1065;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
