-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 04:37 PM
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
-- Database: `empops`
--

CREATE DATABASE IF NOT EXISTS empops;
use empops;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` int(1) NOT NULL,
  `file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `status`, `file_name`) VALUES
('11', 'Kidanewold Hailu', '12345678', 1, 'nati.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `r_n` varchar(15) NOT NULL,
  `i_date` varchar(50) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`r_n`, `i_date`, `vat`, `address`, `phone`, `name`, `email`, `web`) VALUES
('FT', '12-22-22', '616278282', 'Santiago de Surco\r\nAv.Caminos del Inca 1325\r\nUnited States', 961147131, 'EMPOPS Technologies', 'kidanewoldhailu@gmail.com', 'www.empops.com');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(3) NOT NULL,
  `name` varchar(80) NOT NULL,
  `date` varchar(40) NOT NULL,
  `size` varchar(10) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `date`, `size`, `link`) VALUES
(2, 'google policy', '05 Jan 2019', '25 MB', 'https://www.google.com/googgleleave.pdf'),
(9, 'g', '31/01/2024', '20 MB', 'www.ppp.com.pdf'),
(10, 'g', '31/01/2024', '20 MB', 'www.ppp.com.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `name` text NOT NULL,
  `id` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `birth` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood` varchar(5) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `phone` int(10) NOT NULL,
  `phone2` int(10) NOT NULL,
  `email` varchar(45) NOT NULL DEFAULT 'No',
  `linkedin` varchar(40) NOT NULL DEFAULT 'No',
  `web` varchar(40) NOT NULL,
  `start` varchar(30) NOT NULL,
  `visa` varchar(30) NOT NULL,
  `team` varchar(30) NOT NULL,
  `file_name` varchar(100) NOT NULL DEFAULT 'a',
  `salary` int(10) NOT NULL,
  `job` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`name`, `id`, `nationality`, `birth`, `gender`, `blood`, `password`, `status`, `phone`, `phone2`, `email`, `linkedin`, `web`, `start`, `visa`, `team`, `file_name`, `salary`, `job`) VALUES
('kidanewold hailu', '1', 'Ethiopian', '09/02/2024', 'male', 'o', '123456789', 1, 961147131, 961147131, 'kidanewldhailu@gmail.com', 'linkedin/kidanewold', 'www.empops.com', '10/01/2024', '10/01/2024', 'Cyber', 'design_for_valentines_day_t_shirts_design-removebg-preview (1).png', 16000, 'entry'),
('Gemechis', '2', 'Et', '12/12/2022', 'M', 'O', '12345678', 1, 090000000, 0, 'No@gmail.com', 'linkedIn/No', 'noweb.com', '11/11/2023', '12/11/2024', 'DataBase', 'img-2.jpg', 50000, 'senior');

-- --------------------------------------------------------

--
-- Table structure for table `le`
--

CREATE TABLE `le` (
  `date` varchar(20) NOT NULL,
  `id` int(20) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `le`
--

INSERT INTO `le` (`date`, `id`, `reason`) VALUES
('20 02 2024', 34, '1'),
('20 02 2024', 44, 'gsgsgs\r\nsjsjs\r\nsmm s'),
('20 02 2024', 1572922, 'a ba<br />\r\nlala<br />\r\nka');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `name` varchar(40) NOT NULL,
  `leader` text NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`name`, `leader`, `id`) VALUES
('PHP', '1', 1),
('DataBase', '2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
