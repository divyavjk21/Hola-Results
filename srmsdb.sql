-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 07:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` int(11) NOT NULL,
  `A_pwd` int(20) NOT NULL,
  `A_email` varchar(50) NOT NULL,
  `A_ph` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `A_pwd`, `A_email`, `A_ph`) VALUES
(1, 134, 'a', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `F_id` int(11) NOT NULL,
  `F_pwd` int(11) NOT NULL,
  `F_name` varchar(100) DEFAULT NULL,
  `F_email` varchar(50) DEFAULT NULL,
  `F_des` varchar(50) DEFAULT NULL,
  `C_id` int(11) NOT NULL,
  `C_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`F_id`, `F_pwd`, `F_name`, `F_email`, `F_des`, `C_id`, `C_name`) VALUES
(1, 145, 'viajya', '1@gmail.com', 'proff', 12, 'math'),
(2, 234, 'lavanya', '23@gmail.com', 'proff', 13, 'algebra');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `S_id` int(11) NOT NULL,
  `P_name` varchar(100) NOT NULL,
  `P_pwd` int(11) NOT NULL,
  `P_ph` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`S_id`, `P_name`, `P_pwd`, `P_ph`) VALUES
(1, 'ws', 156, 3456);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Sem_no` int(11) NOT NULL,
  `C_id` int(11) NOT NULL,
  `C_name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL,
  `SGPA` int(11) NOT NULL,
  `CGPA` int(11) NOT NULL,
  `att_ap` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `S_id` int(11) NOT NULL,
  `F_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`Sem_no`, `C_id`, `C_name`, `credits`, `SGPA`, `CGPA`, `att_ap`, `grade`, `status`, `S_id`, `F_id`) VALUES
(3, 13, 'algebra', 3, 9, 8, 89, 96, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_id` int(11) NOT NULL,
  `S_name` varchar(100) NOT NULL,
  `S_pwd` int(20) NOT NULL,
  `S_email` varchar(50) NOT NULL,
  `S_age` int(100) NOT NULL,
  `S_gender` varchar(6) NOT NULL,
  `S_att` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_id`, `S_name`, `S_pwd`, `S_email`, `S_age`, `S_gender`, `S_att`) VALUES
(1, 'Sai', 123, 'a', 20, '1', 85),
(2, 'divya', 256, 'asdf@gmail.com', -100, '0', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`F_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `F_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
