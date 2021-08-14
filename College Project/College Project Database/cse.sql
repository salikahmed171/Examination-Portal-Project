-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 04:23 PM
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
-- Database: `cse`
--

-- --------------------------------------------------------

--
-- Table structure for table `5_sem_std`
--

CREATE TABLE `5_sem_std` (
  `Reg Number` bigint(50) NOT NULL,
  `Roll Number` bigint(50) NOT NULL,
  `Student Name` varchar(30) NOT NULL,
  `OPERATING SYSTEM_INTERNAL` float DEFAULT NULL,
  `OPERATING SYSTEM_MIDSEM` float DEFAULT NULL,
  `OPERATING SYSTEM_ENDSEM` float DEFAULT NULL,
  `MICROPROCESSOR_INTERNAL` float DEFAULT NULL,
  `MICROPROCESSOR_MIDSEM` float DEFAULT NULL,
  `MICROPROCESSOR_ENDSEM` float DEFAULT NULL,
  `AUTOMATA_INTERNAL` float DEFAULT NULL,
  `AUTOMATA_MIDSEM` float DEFAULT NULL,
  `AUTOMATA_ENDSEM` float DEFAULT NULL,
  `COMPUTER GRAPHICS_INTERNAL` float DEFAULT NULL,
  `COMPUTER GRAPHICS_MIDSEM` float DEFAULT NULL,
  `COMPUTER GRAPHICS_ENDSEM` float DEFAULT NULL,
  `SCRIPT PROGRAMMING_INTERNAL` float DEFAULT NULL,
  `SCRIPT PROGRAMMING_MIDSEM` float DEFAULT NULL,
  `SCRIPT PROGRAMMING_ENDSEM` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `5_sem_std`
--

INSERT INTO `5_sem_std` (`Reg Number`, `Roll Number`, `Student Name`, `OPERATING SYSTEM_INTERNAL`, `OPERATING SYSTEM_MIDSEM`, `OPERATING SYSTEM_ENDSEM`, `MICROPROCESSOR_INTERNAL`, `MICROPROCESSOR_MIDSEM`, `MICROPROCESSOR_ENDSEM`, `AUTOMATA_INTERNAL`, `AUTOMATA_MIDSEM`, `AUTOMATA_ENDSEM`, `COMPUTER GRAPHICS_INTERNAL`, `COMPUTER GRAPHICS_MIDSEM`, `COMPUTER GRAPHICS_ENDSEM`, `SCRIPT PROGRAMMING_INTERNAL`, `SCRIPT PROGRAMMING_MIDSEM`, `SCRIPT PROGRAMMING_ENDSEM`) VALUES
(20180015627, 1, 'Salik Ahmed', 18, 25, 40, 18, 27, 45, 18, 30, 40, NULL, NULL, NULL, NULL, NULL, NULL),
(20180015628, 2, 'Shahadat Ali', 18, 30, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20180015629, 3, 'Niraj Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20180015630, 4, 'Swapnoneel Sarkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `6_sem_std`
--

CREATE TABLE `6_sem_std` (
  `Reg Number` bigint(50) NOT NULL,
  `Roll Number` bigint(50) NOT NULL,
  `Student Name` varchar(30) NOT NULL,
  `ALGORITHMS_INTERNAL` float DEFAULT NULL,
  `ALGORITHMS_MIDSEM` float DEFAULT NULL,
  `ALGORITHMS_ENDSEM` float DEFAULT NULL,
  `WEB TECHNOLOGY_INTERNAL` float DEFAULT NULL,
  `WEB TECHNOLOGY_MIDSEM` float DEFAULT NULL,
  `WEB TECHNOLOGY_ENDSEM` float DEFAULT NULL,
  `COMPUTER NETWORKS_INTERNAL` float DEFAULT NULL,
  `COMPUTER NETWORKS_MIDSEM` float DEFAULT NULL,
  `COMPUTER NETWORKS_ENDSEM` float DEFAULT NULL,
  `ADV DIGITAL ELEC._INTERNAL` float DEFAULT NULL,
  `ADV DIGITAL ELEC._MIDSEM` float DEFAULT NULL,
  `ADV DIGITAL ELEC._ENDSEM` float DEFAULT NULL,
  `SOFTWARE ENGINEERING_INTERNAL` float DEFAULT NULL,
  `SOFTWARE ENGINEERING_MIDSEM` float DEFAULT NULL,
  `SOFTWARE ENGINEERING_ENDSEM` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `6_sem_std`
--

INSERT INTO `6_sem_std` (`Reg Number`, `Roll Number`, `Student Name`, `ALGORITHMS_INTERNAL`, `ALGORITHMS_MIDSEM`, `ALGORITHMS_ENDSEM`, `WEB TECHNOLOGY_INTERNAL`, `WEB TECHNOLOGY_MIDSEM`, `WEB TECHNOLOGY_ENDSEM`, `COMPUTER NETWORKS_INTERNAL`, `COMPUTER NETWORKS_MIDSEM`, `COMPUTER NETWORKS_ENDSEM`, `ADV DIGITAL ELEC._INTERNAL`, `ADV DIGITAL ELEC._MIDSEM`, `ADV DIGITAL ELEC._ENDSEM`, `SOFTWARE ENGINEERING_INTERNAL`, `SOFTWARE ENGINEERING_MIDSEM`, `SOFTWARE ENGINEERING_ENDSEM`) VALUES
(20180015627, 1, 'Salik Ahmed', 20, NULL, NULL, 20, 30, 50, 20, 30, 45, 18, 30, 45, 20, 30, 39),
(20180015628, 2, 'Shahadat Ali', NULL, NULL, NULL, 20, 30, 50, 20, 30, 47, NULL, NULL, NULL, 20, 30, 50),
(20180015629, 3, 'Niraj Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20180015630, 4, 'Swapnoneel Sarkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reg_hod`
--

CREATE TABLE `reg_hod` (
  `Reg Number` int(50) NOT NULL,
  `Hod Name` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_hod`
--

INSERT INTO `reg_hod` (`Reg Number`, `Hod Name`, `Password`, `Department`) VALUES
(987654321, 'Sunita Sarkar', '$2y$10$89IsckirHHvZdSfmUbjoFOPCcuOaF6MQfAS1DCCwjD1ObCPpOW6JS', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `reg_teachers`
--

CREATE TABLE `reg_teachers` (
  `Teacher` varchar(30) NOT NULL,
  `Aadhar Number` bigint(50) NOT NULL,
  `Mobile Number` bigint(50) NOT NULL,
  `Reg Number` bigint(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_teachers`
--

INSERT INTO `reg_teachers` (`Teacher`, `Aadhar Number`, `Mobile Number`, `Reg Number`, `Password`, `Department`) VALUES
('Ramen Pal', 12344567890, 789456321, 98763, '$2y$10$x7D7uj3uq5Kix0PhGrUGmeKYu4QMbQ4oWtdoxw2VZ3vJ.7scg9DfG', 'CSE'),
('Arnab Paul', 12345678990, 9658741236, 98764, '$2y$10$lwxmSTFFA93TgBMUmIZ6HebGTs./2vyDcQpBbVUsOEaQZsSMKSUAy', 'CSE'),
('Mousum Handique', 12345677890, 9008741236, 98768, '$2y$10$QY5iBBHUcywZN4Ver5EuCOmWgbdh2gHoKLHVkDCNfh9i3/QO3m6Pi', 'CSE'),
('Abhijit Biswas', 12345672590, 7825693699, 98769, '$2y$10$5/4IM4RyBs5eMHrn0EDxZOBQvu3qYKlnlKKN1PQ3VFf5PBew2DUku', 'CSE'),
('Velloree Khuraijam', 15245866685, 9658451236, 98770, '$2y$10$qkglowc8s3Mg9e76pnu7SOSKn82pZWVt1/776zSP1IC7QCN0nfRsm', 'CSE'),
('Niranjan Singh', 12234567890, 9548741236, 98771, '$2y$10$8BfvIxpI1nILRUQhEVOV4.e7jegsD.iwCcJhUFJd9jKrE67J4AAye', 'CSE'),
('Somnath Mukhopadhyay', 18582867890, 9875421471, 98775, '$2y$10$gN6r6fHM6zVxPjUSLRK9leiwxOL9XxkoFbmb7.drUFJ5nuXRvSVTa', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_request`
--

CREATE TABLE `teacher_request` (
  `Name` varchar(50) NOT NULL,
  `Aadhar Number` bigint(50) NOT NULL,
  `Mobile Number` bigint(50) NOT NULL,
  `1_sem` varchar(50) NOT NULL,
  `2_sem` varchar(50) NOT NULL,
  `3_sem` varchar(50) NOT NULL,
  `4_sem` varchar(50) NOT NULL,
  `5_sem` varchar(50) NOT NULL,
  `6_sem` varchar(50) NOT NULL,
  `7_sem` varchar(50) NOT NULL,
  `8_sem` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_request`
--

INSERT INTO `teacher_request` (`Name`, `Aadhar Number`, `Mobile Number`, `1_sem`, `2_sem`, `3_sem`, `4_sem`, `5_sem`, `6_sem`, `7_sem`, `8_sem`, `Password`) VALUES
('Raktim Deb', 12345678090, 9758741236, '', '', '', '', 'COMPUTER GRAPHICS', 'NULL', '', '', '$2y$10$x5zmCv7IbwKwZETQ3WdQruYYaTc.Kmu4hCdsi7BkY9faThJrQOF6q');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `Reg Number` int(30) NOT NULL,
  `Teacher Name` varchar(30) NOT NULL,
  `1_sem` varchar(30) DEFAULT NULL,
  `2_sem` varchar(30) DEFAULT NULL,
  `3_sem` varchar(30) DEFAULT NULL,
  `4_sem` varchar(30) DEFAULT NULL,
  `5_sem` varchar(30) DEFAULT NULL,
  `6_sem` varchar(30) DEFAULT NULL,
  `7_sem` varchar(30) DEFAULT NULL,
  `8_sem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`Reg Number`, `Teacher Name`, `1_sem`, `2_sem`, `3_sem`, `4_sem`, `5_sem`, `6_sem`, `7_sem`, `8_sem`) VALUES
(98763, 'Ramen Pal', NULL, NULL, NULL, NULL, NULL, 'SOFTWARE ENGINEERING', NULL, NULL),
(98764, 'Arnab Paul', NULL, NULL, NULL, NULL, 'SCRIPT PROGRAMMING', 'WEB TECHNOLOGY', NULL, NULL),
(98768, 'Mousum Handique', NULL, NULL, NULL, NULL, NULL, 'ALGORITHMS', NULL, NULL),
(98769, 'Abhijit Biswas', NULL, NULL, NULL, NULL, 'OPERATING SYSTEM', NULL, NULL, NULL),
(98770, 'Velloree Khuraijam', NULL, NULL, NULL, NULL, NULL, 'ADV DIGITAL ELEC.', NULL, NULL),
(98771, 'Niranjan Singh', NULL, NULL, NULL, NULL, 'MICROPROCESSOR', 'COMPUTER NETWORKS', NULL, NULL),
(98775, 'Somnath Mukhopadhyay', NULL, NULL, NULL, NULL, 'AUTOMATA', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `5_sem_std`
--
ALTER TABLE `5_sem_std`
  ADD PRIMARY KEY (`Reg Number`),
  ADD UNIQUE KEY `Roll Number` (`Roll Number`);

--
-- Indexes for table `6_sem_std`
--
ALTER TABLE `6_sem_std`
  ADD PRIMARY KEY (`Reg Number`),
  ADD UNIQUE KEY `Roll Number` (`Roll Number`);

--
-- Indexes for table `reg_hod`
--
ALTER TABLE `reg_hod`
  ADD PRIMARY KEY (`Reg Number`);

--
-- Indexes for table `reg_teachers`
--
ALTER TABLE `reg_teachers`
  ADD PRIMARY KEY (`Reg Number`),
  ADD UNIQUE KEY `Aadhar Number` (`Aadhar Number`);

--
-- Indexes for table `teacher_request`
--
ALTER TABLE `teacher_request`
  ADD PRIMARY KEY (`Aadhar Number`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`Reg Number`),
  ADD UNIQUE KEY `third_sem` (`3_sem`),
  ADD UNIQUE KEY `second_sem` (`2_sem`),
  ADD UNIQUE KEY `fourth_sem` (`4_sem`),
  ADD UNIQUE KEY `fifth_sem` (`5_sem`),
  ADD UNIQUE KEY `sixth_sem` (`6_sem`),
  ADD UNIQUE KEY `seventh_sem` (`7_sem`),
  ADD UNIQUE KEY `eighth_sem` (`8_sem`),
  ADD UNIQUE KEY `third_sem_2` (`3_sem`),
  ADD UNIQUE KEY `first_sem` (`1_sem`),
  ADD UNIQUE KEY `second_sem_2` (`2_sem`),
  ADD UNIQUE KEY `8_sem` (`8_sem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `5_sem_std`
--
ALTER TABLE `5_sem_std`
  MODIFY `Roll Number` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `6_sem_std`
--
ALTER TABLE `6_sem_std`
  MODIFY `Roll Number` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reg_teachers`
--
ALTER TABLE `reg_teachers`
  MODIFY `Reg Number` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98776;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
