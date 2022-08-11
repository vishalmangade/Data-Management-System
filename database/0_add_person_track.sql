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
-- Table structure for table `0_add_person_track`
--

CREATE TABLE `0_add_person_track` (
  `add_p_id` int(50) NOT NULL,
  `industry` varchar(500) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `prefix` varchar(500) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `added_by` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `0_add_person_track`
--

INSERT INTO `0_add_person_track` (`add_p_id`, `industry`, `company_name`, `prefix`, `first_name`, `last_name`, `title`, `email`, `added_by`, `date`, `time`) VALUES
(9, 'Govt Veterinary Hospital', 'Frau Dr. Viviane Ehrmann', 'dfgg', 'fghgfh', 'fghgfh', 'xdfg', 'dgh', 5, '2021-08-28', '23:52:56'),
(10, 'Salon and Spa', 'Michael Anthony Salon Spa State', '', 'vishala', '', '', '', 3, '2021-08-28', '20:18:20'),
(11, 'Hotels', '11', 'vishal', 'barshi', '', 'mangade', '', 3, '2021-08-29', '05:32:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_add_person_track`
--
ALTER TABLE `0_add_person_track`
  ADD PRIMARY KEY (`add_p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_add_person_track`
--
ALTER TABLE `0_add_person_track`
  MODIFY `add_p_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
