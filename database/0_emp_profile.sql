-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2022 at 06:36 PM
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
-- Table structure for table `0_emp_profile`
--

CREATE TABLE `0_emp_profile` (
  `emp_id` int(100) NOT NULL,
  `name` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `title` varchar(110) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `created_at` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `0_emp_profile`
--

INSERT INTO `0_emp_profile` (`emp_id`, `name`, `email`, `keyword`, `title`, `status`, `created_on`, `created_at`) VALUES
(3, 'admin', 'admin@ca.com', '$2y$10$PK7fmt6LrqS6NHJsA5ud7OVBUrnlZGQfipHDtiHVa2zrHcnIhLZ6K', 'administrator', 1, '2021-08-11', '03:45:19'),
(5, 'analyst1', 'analyst@ca.com', '$2y$10$7d1FiZx5YmPlpsxGy/1uK.cE7.oPFfXlKrA1rg7Yxe6etsUAk85nm', 'analyst', 1, '2021-08-28', '23:48:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_emp_profile`
--
ALTER TABLE `0_emp_profile`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_emp_profile`
--
ALTER TABLE `0_emp_profile`
  MODIFY `emp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
