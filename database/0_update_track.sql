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
-- Table structure for table `0_update_track`
--

CREATE TABLE `0_update_track` (
  `update_id` int(100) NOT NULL,
  `industry` varchar(250) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `column_name` varchar(250) NOT NULL,
  `from` varchar(500) NOT NULL,
  `to` varchar(500) NOT NULL,
  `updated_by` bigint(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `0_update_track`
--

INSERT INTO `0_update_track` (`update_id`, `industry`, `company_name`, `column_name`, `from`, `to`, `updated_by`, `date`, `time`) VALUES
(106, 'Govt Veterninary Hospital', 'Frau Dr. Viviane Ehrmann', 'count', '2', '24', 5, '2021-08-28', '23:52:00'),
(107, 'Hotel', '11', 'prefix', 'vishal', 'mr', 3, '2021-08-29', '05:34:43'),
(108, 'Hotel', '11', 'First Name', 'barshi', 'vishal', 3, '2021-08-29', '05:34:43'),
(109, 'Hotel', '11', 'Last Name', '', 'mangade', 3, '2021-08-29', '05:34:43'),
(110, 'Hotel', '11', 'Title', 'mangade', 'admin', 3, '2021-08-29', '05:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_update_track`
--
ALTER TABLE `0_update_track`
  ADD PRIMARY KEY (`update_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_update_track`
--
ALTER TABLE `0_update_track`
  MODIFY `update_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
