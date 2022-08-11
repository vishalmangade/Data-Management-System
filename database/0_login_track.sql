-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2022 at 07:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u977028740_corivalCRM`
--

-- --------------------------------------------------------

--
-- Table structure for table `0_login_track`
--

CREATE TABLE `0_login_track` (
  `session_id` int(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `start_time` time NOT NULL DEFAULT current_timestamp(),
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `end_time` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `0_login_track`
--

INSERT INTO `0_login_track` (`session_id`, `emp_id`, `status`, `start_date`, `start_time`, `end_date`, `end_time`) VALUES
(1, 3, '1', '0000-00-00', '00:00:00', '2021-08-28', '23:37:50'),
(2, 5, '0', '2021-08-28', '23:48:49', '0000-00-00', '00:00:00'),
(3, 5, '1', '2021-08-28', '23:49:30', '2021-08-29', '00:17:11'),
(4, 3, '1', '2021-08-28', '23:58:01', '2021-08-29', '01:11:15'),
(5, 3, '1', '2021-08-29', '00:17:22', '2021-08-29', '00:31:50'),
(6, 5, '1', '2021-08-29', '00:52:16', '2021-08-29', '01:11:05'),
(7, 3, '1', '2021-08-28', '20:14:13', '2021-08-29', '01:59:55'),
(8, 3, '1', '2021-08-28', '20:17:41', '2021-08-29', '01:58:31'),
(9, 3, '1', '2021-08-28', '20:29:09', '2021-08-29', '01:59:39'),
(10, 3, '1', '2021-08-29', '04:58:52', '2021-08-29', '10:35:25'),
(11, 3, '1', '2021-08-29', '05:01:16', '2021-08-29', '10:36:05'),
(12, 3, '1', '2021-08-29', '05:05:25', '2021-08-29', '11:02:12'),
(13, 5, '1', '2021-08-29', '05:12:22', '2021-08-29', '10:55:00'),
(14, 3, '1', '2021-08-29', '05:18:34', '2021-08-29', '10:53:34'),
(15, 5, '1', '2021-08-29', '10:54:49', '2021-08-29', '11:06:17'),
(16, 3, '1', '2021-08-29', '10:55:11', '2021-08-29', '12:01:06'),
(17, 5, '0', '2021-08-29', '11:06:35', '2021-08-29', '11:06:35'),
(18, 5, '0', '2021-08-29', '11:09:40', '2021-08-29', '11:09:40'),
(19, 5, '0', '2021-08-29', '11:11:19', '2021-08-29', '11:11:19'),
(20, 5, '1', '2021-08-29', '11:12:10', '2021-08-29', '11:15:55'),
(21, 5, '1', '2021-08-29', '11:17:51', '2021-08-29', '12:01:16'),
(22, 3, '1', '2021-08-29', '11:19:10', '2021-08-29', '12:01:29'),
(23, 5, '1', '2021-08-29', '12:03:08', '2021-08-29', '12:03:16'),
(24, 5, '1', '2021-08-29', '12:04:13', '2021-08-29', '12:10:13'),
(25, 3, '1', '2021-08-29', '13:20:17', '2021-08-29', '18:34:06'),
(26, 3, '1', '2021-08-29', '21:19:05', '2021-08-29', '21:59:47'),
(27, 3, '1', '2021-09-04', '18:33:27', '2021-09-04', '18:35:46'),
(28, 3, '1', '2021-09-05', '21:04:13', '2021-09-05', '21:23:31'),
(29, 3, '1', '2021-09-05', '21:07:43', '2021-09-05', '22:47:13'),
(30, 3, '1', '2021-09-12', '02:17:09', '2021-09-12', '02:32:02'),
(31, 3, '1', '2021-12-04', '10:09:08', '2021-12-04', '10:09:45'),
(32, 3, '1', '2022-07-18', '22:30:10', '2022-07-18', '22:30:10'),
(33, 3, '1', '2022-07-18', '22:30:30', '2022-07-18', '22:30:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_login_track`
--
ALTER TABLE `0_login_track`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_login_track`
--
ALTER TABLE `0_login_track`
  MODIFY `session_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
