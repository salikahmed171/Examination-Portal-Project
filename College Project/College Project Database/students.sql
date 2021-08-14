-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 04:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

CREATE TABLE `student_request` (
  `Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Mobile Number` bigint(50) NOT NULL,
  `Aadhar Number` bigint(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_request`
--

INSERT INTO `student_request` (`Name`, `Department`, `Mobile Number`, `Aadhar Number`, `Password`) VALUES
('Sayeedul Laskar', 'CSE', 9652741236, 18596867890, '$2y$10$k7qs8VZihwqc4959SKA6k.3TW6lkwbfsIvWJN0HsjYvmubboxWJOW');

-- --------------------------------------------------------

--
-- Table structure for table `st_data`
--

CREATE TABLE `st_data` (
  `Reg Number` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Mobile Number` bigint(20) NOT NULL,
  `Aadhar Number` bigint(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `st_data`
--

INSERT INTO `st_data` (`Reg Number`, `Name`, `Department`, `Mobile Number`, `Aadhar Number`, `Password`, `Date`) VALUES
(20180015627, 'Salik Ahmed', 'CSE', 9632587410, 99887744556, '$2y$10$1FF8OplA5OKrrS3pAnMC6uWQFVFgGX/G9jgsRJoPW.drXFQLYnpk6', '2021-08-10 02:40:55'),
(20180015628, 'Shahadat Ali', 'CSE', 6002063635, 90020525200, '$2y$10$Zsb5izDvlrnMJbj2pemwi.f7yGC1pCTGf1R0bauLdMn9vKbMx6ZKO', '2021-08-10 02:41:05'),
(20180015629, 'Niraj Singh', 'CSE', 7788996655, 22336655449, '$2y$10$8SFR7PRkiT8MGS63Ad/6LOQipOv9D9xe25k6tkp96Abw8uYxk9hd.', '2021-08-12 12:04:17'),
(20180015630, 'Swapnoneel Sarkar', 'CSE', 9658741252, 18582867510, '$2y$10$0U7BXwz.mWxAeDV3SCjvhue9CFzTGkjMOHZMESZ34vYPY4kzbovYG', '2021-08-12 21:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_request`
--
ALTER TABLE `student_request`
  ADD PRIMARY KEY (`Aadhar Number`),
  ADD UNIQUE KEY `Mobile Number` (`Mobile Number`);

--
-- Indexes for table `st_data`
--
ALTER TABLE `st_data`
  ADD PRIMARY KEY (`Reg Number`),
  ADD UNIQUE KEY `Mobile Number` (`Mobile Number`),
  ADD UNIQUE KEY `Aadhar Number` (`Aadhar Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `st_data`
--
ALTER TABLE `st_data`
  MODIFY `Reg Number` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20180015631;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
