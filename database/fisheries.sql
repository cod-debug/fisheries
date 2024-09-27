-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ans_is_correct` int(11) NOT NULL DEFAULT 0,
  `ans_added_by` int(11) NOT NULL,
  `ans_last_updated_by` int(11) NOT NULL,
  `ans_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ans_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `qs_id`, `ans_desc`, `ans_title`, `ans_is_correct`, `ans_added_by`, `ans_last_updated_by`, `ans_created_at`, `ans_updated_at`) VALUES
(125, 65, '', '1', 0, 0, 0, '2024-09-27 08:54:41', '0000-00-00 00:00:00'),
(126, 65, '', '2', 1, 0, 0, '2024-09-27 08:54:41', '0000-00-00 00:00:00'),
(127, 65, '', '3', 0, 0, 0, '2024-09-27 08:54:41', '0000-00-00 00:00:00'),
(128, 65, '', '4', 0, 0, 0, '2024-09-27 08:54:41', '0000-00-00 00:00:00'),
(129, 66, '', '1', 0, 0, 0, '2024-09-27 08:54:59', '0000-00-00 00:00:00'),
(130, 66, '', '2', 0, 0, 0, '2024-09-27 08:54:59', '0000-00-00 00:00:00'),
(131, 66, '', '3', 1, 0, 0, '2024-09-27 08:54:59', '0000-00-00 00:00:00'),
(132, 66, '', '4', 0, 0, 0, '2024-09-27 08:54:59', '0000-00-00 00:00:00'),
(133, 67, '', '1', 0, 0, 0, '2024-09-27 08:55:07', '0000-00-00 00:00:00'),
(134, 67, '', '2', 0, 0, 0, '2024-09-27 08:55:07', '0000-00-00 00:00:00'),
(135, 67, '', '3', 0, 0, 0, '2024-09-27 08:55:07', '0000-00-00 00:00:00'),
(136, 67, '', '4', 1, 0, 0, '2024-09-27 08:55:07', '0000-00-00 00:00:00'),
(137, 68, '', '1', 1, 0, 0, '2024-09-27 08:55:23', '0000-00-00 00:00:00'),
(138, 68, '', '2', 0, 0, 0, '2024-09-27 08:55:23', '0000-00-00 00:00:00'),
(139, 68, '', '3', 0, 0, 0, '2024-09-27 08:55:23', '0000-00-00 00:00:00'),
(140, 68, '', '4', 0, 0, 0, '2024-09-27 08:55:23', '0000-00-00 00:00:00'),
(141, 69, '', '1', 0, 0, 0, '2024-09-27 08:55:28', '0000-00-00 00:00:00'),
(142, 69, '', '2', 1, 0, 0, '2024-09-27 08:55:28', '0000-00-00 00:00:00'),
(143, 69, '', '3', 0, 0, 0, '2024-09-27 08:55:28', '0000-00-00 00:00:00'),
(144, 69, '', '4', 0, 0, 0, '2024-09-27 08:55:28', '0000-00-00 00:00:00'),
(145, 70, '', '1', 0, 0, 0, '2024-09-27 08:55:33', '0000-00-00 00:00:00'),
(146, 70, '', '2', 0, 0, 0, '2024-09-27 08:55:33', '0000-00-00 00:00:00'),
(147, 70, '', '3', 1, 0, 0, '2024-09-27 08:55:33', '0000-00-00 00:00:00'),
(148, 70, '', '4', 0, 0, 0, '2024-09-27 08:55:33', '0000-00-00 00:00:00'),
(149, 71, '', '1', 1, 0, 0, '2024-09-27 08:55:53', '0000-00-00 00:00:00'),
(150, 71, '', '2', 0, 0, 0, '2024-09-27 08:55:53', '0000-00-00 00:00:00'),
(151, 71, '', '3', 0, 0, 0, '2024-09-27 08:55:53', '0000-00-00 00:00:00'),
(152, 71, '', '4', 0, 0, 0, '2024-09-27 08:55:53', '0000-00-00 00:00:00'),
(153, 72, '', 'A', 0, 0, 0, '2024-09-27 08:56:09', '0000-00-00 00:00:00'),
(154, 72, '', 'C', 0, 0, 0, '2024-09-27 08:56:09', '0000-00-00 00:00:00'),
(155, 72, '', 'E', 1, 0, 0, '2024-09-27 08:56:09', '0000-00-00 00:00:00'),
(156, 72, '', 'D', 0, 0, 0, '2024-09-27 08:56:09', '0000-00-00 00:00:00'),
(157, 73, '', 'A', 0, 0, 0, '2024-09-27 08:56:16', '0000-00-00 00:00:00'),
(158, 73, '', 'C', 0, 0, 0, '2024-09-27 08:56:16', '0000-00-00 00:00:00'),
(159, 73, '', 'B', 1, 0, 0, '2024-09-27 08:56:16', '0000-00-00 00:00:00'),
(160, 73, '', 'D', 0, 0, 0, '2024-09-27 08:56:16', '0000-00-00 00:00:00'),
(161, 74, '', 'A', 0, 0, 0, '2024-09-27 08:56:25', '0000-00-00 00:00:00'),
(162, 74, '', 'Z', 0, 0, 0, '2024-09-27 08:56:25', '0000-00-00 00:00:00'),
(163, 74, '', 'B', 1, 0, 0, '2024-09-27 08:56:25', '0000-00-00 00:00:00'),
(164, 74, '', 'D', 0, 0, 0, '2024-09-27 08:56:25', '0000-00-00 00:00:00'),
(165, 75, '', 'H', 1, 0, 0, '2024-09-27 08:56:35', '0000-00-00 00:00:00'),
(166, 75, '', 'Z', 0, 0, 0, '2024-09-27 08:56:35', '0000-00-00 00:00:00'),
(167, 75, '', 'B', 0, 0, 0, '2024-09-27 08:56:35', '0000-00-00 00:00:00'),
(168, 75, '', 'D', 0, 0, 0, '2024-09-27 08:56:35', '0000-00-00 00:00:00'),
(169, 76, '', 'J', 1, 0, 0, '2024-09-27 08:56:41', '0000-00-00 00:00:00'),
(170, 76, '', 'Z', 0, 0, 0, '2024-09-27 08:56:41', '0000-00-00 00:00:00'),
(171, 76, '', 'B', 0, 0, 0, '2024-09-27 08:56:41', '0000-00-00 00:00:00'),
(172, 76, '', 'D', 0, 0, 0, '2024-09-27 08:56:41', '0000-00-00 00:00:00'),
(173, 77, '', 'D', 1, 0, 0, '2024-09-27 08:56:56', '0000-00-00 00:00:00'),
(174, 77, '', 'Z', 0, 0, 0, '2024-09-27 08:56:56', '0000-00-00 00:00:00'),
(175, 77, '', 'B', 0, 0, 0, '2024-09-27 08:56:56', '0000-00-00 00:00:00'),
(176, 77, '', 'F', 0, 0, 0, '2024-09-27 08:56:56', '0000-00-00 00:00:00'),
(177, 78, '', 'B', 1, 0, 0, '2024-09-27 08:57:38', '0000-00-00 00:00:00'),
(178, 78, '', 'Z', 0, 0, 0, '2024-09-27 08:57:38', '0000-00-00 00:00:00'),
(179, 78, '', 'D', 0, 0, 0, '2024-09-27 08:57:38', '0000-00-00 00:00:00'),
(180, 78, '', 'F', 0, 0, 0, '2024-09-27 08:57:38', '0000-00-00 00:00:00'),
(181, 79, '', 'C', 1, 0, 0, '2024-09-27 08:57:42', '0000-00-00 00:00:00'),
(182, 79, '', 'Z', 0, 0, 0, '2024-09-27 08:57:42', '0000-00-00 00:00:00'),
(183, 79, '', 'D', 0, 0, 0, '2024-09-27 08:57:42', '0000-00-00 00:00:00'),
(184, 79, '', 'F', 0, 0, 0, '2024-09-27 08:57:42', '0000-00-00 00:00:00'),
(185, 80, '', 'K', 1, 0, 0, '2024-09-27 08:57:51', '0000-00-00 00:00:00'),
(186, 80, '', 'Z', 0, 0, 0, '2024-09-27 08:57:51', '0000-00-00 00:00:00'),
(187, 80, '', 'D', 0, 0, 0, '2024-09-27 08:57:51', '0000-00-00 00:00:00'),
(188, 80, '', 'F', 0, 0, 0, '2024-09-27 08:57:51', '0000-00-00 00:00:00'),
(189, 81, '', 'M', 1, 0, 0, '2024-09-27 08:57:59', '0000-00-00 00:00:00'),
(190, 81, '', 'Z', 0, 0, 0, '2024-09-27 08:57:59', '0000-00-00 00:00:00'),
(191, 81, '', 'D', 0, 0, 0, '2024-09-27 08:57:59', '0000-00-00 00:00:00'),
(192, 81, '', 'F', 0, 0, 0, '2024-09-27 08:57:59', '0000-00-00 00:00:00'),
(193, 82, '', 'Q', 1, 0, 0, '2024-09-27 08:58:09', '0000-00-00 00:00:00'),
(194, 82, '', 'Z', 0, 0, 0, '2024-09-27 08:58:09', '0000-00-00 00:00:00'),
(195, 82, '', 'D', 0, 0, 0, '2024-09-27 08:58:09', '0000-00-00 00:00:00'),
(196, 82, '', 'F', 0, 0, 0, '2024-09-27 08:58:09', '0000-00-00 00:00:00'),
(197, 83, '', 'U', 1, 0, 0, '2024-09-27 08:58:16', '0000-00-00 00:00:00'),
(198, 83, '', 'Z', 0, 0, 0, '2024-09-27 08:58:16', '0000-00-00 00:00:00'),
(199, 83, '', 'D', 0, 0, 0, '2024-09-27 08:58:16', '0000-00-00 00:00:00'),
(200, 83, '', 'F', 0, 0, 0, '2024-09-27 08:58:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `batch_type_of_test` varchar(50) NOT NULL,
  `batch_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `batch_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `user_id`, `batch_type_of_test`, `batch_created_at`, `batch_updated_at`) VALUES
(175, 'REV-Y7FLRYSUJJ', 2, 'pre', '2024-09-27 09:00:46', '0000-00-00 00:00:00'),
(176, 'REV-REV-Y7FLRYSUJJ', 2, 'review', '2024-09-27 09:01:02', '0000-00-00 00:00:00'),
(177, 'REV-REV-REV-Y7FLRYSUJJ', 2, 'post', '2024-09-27 09:01:16', '0000-00-00 00:00:00');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `chat_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `qa_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`qa_id`, `qa_batch`, `qa_question`, `qa_answer`, `qa_answer_is_correct`, `qa_user`, `qa_created_at`) VALUES
(1094, 'REV-Y7FLRYSUJJ', 65, 126, 1, 2, '2024-09-27 09:00:46'),
(1095, 'REV-Y7FLRYSUJJ', 66, 131, 1, 2, '2024-09-27 09:00:46'),
(1096, 'REV-Y7FLRYSUJJ', 67, 136, 1, 2, '2024-09-27 09:00:46'),
(1097, 'REV-Y7FLRYSUJJ', 72, 155, 1, 2, '2024-09-27 09:00:46'),
(1098, 'REV-Y7FLRYSUJJ', 73, 159, 1, 2, '2024-09-27 09:00:46'),
(1099, 'REV-Y7FLRYSUJJ', 74, 162, 0, 2, '2024-09-27 09:00:46'),
(1100, 'REV-Y7FLRYSUJJ', 78, 177, 1, 2, '2024-09-27 09:00:46'),
(1101, 'REV-Y7FLRYSUJJ', 79, 181, 1, 2, '2024-09-27 09:00:46'),
(1102, 'REV-Y7FLRYSUJJ', 80, 185, 1, 2, '2024-09-27 09:00:46'),
(1103, 'REV-REV-Y7FLRYSUJJ', 68, 137, 1, 2, '2024-09-27 09:01:02'),
(1104, 'REV-REV-Y7FLRYSUJJ', 69, 142, 1, 2, '2024-09-27 09:01:02'),
(1105, 'REV-REV-Y7FLRYSUJJ', 70, 148, 0, 2, '2024-09-27 09:01:02'),
(1106, 'REV-REV-Y7FLRYSUJJ', 75, 165, 1, 2, '2024-09-27 09:01:02'),
(1107, 'REV-REV-Y7FLRYSUJJ', 76, 169, 1, 2, '2024-09-27 09:01:02'),
(1108, 'REV-REV-Y7FLRYSUJJ', 81, 189, 1, 2, '2024-09-27 09:01:02'),
(1109, 'REV-REV-Y7FLRYSUJJ', 82, 193, 1, 2, '2024-09-27 09:01:02'),
(1110, 'REV-REV-REV-Y7FLRYSUJJ', 71, 149, 1, 2, '2024-09-27 09:01:16'),
(1111, 'REV-REV-REV-Y7FLRYSUJJ', 77, 173, 1, 2, '2024-09-27 09:01:16'),
(1112, 'REV-REV-REV-Y7FLRYSUJJ', 83, 197, 1, 2, '2024-09-27 09:01:16');

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
  `qs_status` varchar(50) NOT NULL,
  `qs_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qs_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qs_added_by` int(11) NOT NULL DEFAULT 1,
  `qs_last_updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qs_id`, `qs_title`, `qs_subtitle`, `type_of_test`, `qs_category`, `qs_status`, `qs_created_at`, `qs_updated_at`, `qs_added_by`, `qs_last_updated_by`) VALUES
(65, 'Answer is 2', '2', 'pre', 10, '', '2024-09-27 08:54:41', '2024-09-27 08:54:41', 1, 1),
(66, 'The answer is 3', '', 'pre', 10, '', '2024-09-27 08:54:59', '2024-09-27 08:54:59', 1, 1),
(67, 'The answer is 4', '', 'pre', 10, '', '2024-09-27 08:55:07', '2024-09-27 08:55:07', 1, 1),
(68, 'The answer is 1 [final]', '', 'review', 10, '', '2024-09-27 08:55:23', '2024-09-27 08:55:23', 1, 1),
(69, 'The answer is 2 [final]', '', 'review', 10, '', '2024-09-27 08:55:28', '2024-09-27 08:55:28', 1, 1),
(70, 'The answer is 4 [final]', '', 'review', 10, '', '2024-09-27 08:55:33', '2024-09-27 08:55:33', 1, 1),
(71, 'The answer is 1 [posttest]', '', 'post', 10, '', '2024-09-27 08:55:53', '2024-09-27 08:55:53', 1, 1),
(72, 'Answer is E', '', 'pre', 11, '', '2024-09-27 08:56:09', '2024-09-27 08:56:09', 1, 1),
(73, 'Answer is B', '', 'pre', 11, '', '2024-09-27 08:56:16', '2024-09-27 08:56:16', 1, 1),
(74, 'Answer is Z', '', 'pre', 11, '', '2024-09-27 08:56:25', '2024-09-27 08:56:25', 1, 1),
(75, 'Answer is H', '', 'review', 11, '', '2024-09-27 08:56:35', '2024-09-27 08:56:35', 1, 1),
(76, 'Answer is J', '', 'review', 11, '', '2024-09-27 08:56:41', '2024-09-27 08:56:41', 1, 1),
(77, 'Answer is D', '', 'post', 11, '', '2024-09-27 08:56:56', '2024-09-27 08:56:56', 1, 1),
(78, 'Ang sagot ay B', '', 'pre', 12, '', '2024-09-27 08:57:38', '2024-09-27 08:57:38', 1, 1),
(79, 'Ang sagot ay C', '', 'pre', 12, '', '2024-09-27 08:57:42', '2024-09-27 08:57:42', 1, 1),
(80, 'Ang sagot ay K', '', 'pre', 12, '', '2024-09-27 08:57:51', '2024-09-27 08:57:51', 1, 1),
(81, 'Ang sagot ay M', '', 'review', 12, '', '2024-09-27 08:57:59', '2024-09-27 08:57:59', 1, 1),
(82, 'Ang sagot ay Q', '', 'review', 12, '', '2024-09-27 08:58:09', '2024-09-27 08:58:09', 1, 1),
(83, 'Ang sagot ay U', '', 'post', 12, '', '2024-09-27 08:58:16', '2024-09-27 08:58:16', 1, 1);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `approved_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

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
  MODIFY `qa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
