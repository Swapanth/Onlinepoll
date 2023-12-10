-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 01:40 PM
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
-- Database: `webdevolpment`
--

-- --------------------------------------------------------

--
-- Table structure for table `createpoll`
--

CREATE TABLE `createpoll` (
  `poll_ID` int(4) NOT NULL,
  `question` varchar(333) NOT NULL,
  `option1` varchar(333) NOT NULL,
  `option2` varchar(33) NOT NULL,
  `option3` varchar(333) NOT NULL,
  `option4` varchar(333) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `createpoll`
--

INSERT INTO `createpoll` (`poll_ID`, `question`, `option1`, `option2`, `option3`, `option4`) VALUES
(108, 'knjclskfn', 'lfnlEF', 'fncs,', 'fefcef', 'fefe'),
(121, ' Which of the following data types is not supported in Python?', ' double', 'int', 'float', 'str'),
(5009, 'who is pspk', 'god', 'hero', 'actor', 'potician');

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `faculty_name` varchar(122) NOT NULL,
  `faculty_ID` int(33) NOT NULL,
  `faculty_email` varchar(122) NOT NULL,
  `faculty_password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultydetails`
--

INSERT INTO `facultydetails` (`faculty_name`, `faculty_ID`, `faculty_email`, `faculty_password`) VALUES
('kiran', 101, 'kiran@math', '1212'),
('edada', 3333, 'avcva@wfa', 'dcadc');

-- --------------------------------------------------------

--
-- Table structure for table `pollresponse`
--

CREATE TABLE `pollresponse` (
  `student_ID` int(11) NOT NULL,
  `poll_ID` int(11) NOT NULL,
  `answer` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pollresponse`
--

INSERT INTO `pollresponse` (`student_ID`, `poll_ID`, `answer`) VALUES
(1, 108, 'fefe'),
(2, 108, 'fncs,'),
(3, 108, 'lfnlEF'),
(4, 108, 'fncs,'),
(5, 108, 'fefe'),
(333, 108, 'fefcef');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `student_name` varchar(333) NOT NULL,
  `student_ID` int(33) NOT NULL,
  `student_email` varchar(333) NOT NULL,
  `student_password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`student_name`, `student_ID`, `student_email`, `student_password`) VALUES
('yeswanth', 1, 'yesw@', '1'),
('shyam', 2, 'shy@e', '2'),
('lakshman', 3, 'lak@', '3'),
('nikil', 4, 'nik@', '4'),
('sandy', 5, 'san@', '5'),
('ddddd', 333, 'avcva@wfa', 'dsdxs'),
('rithin', 2222, 'nxjqljjk@Mlk', '12345'),
('kiran', 30303, 'swapanth@999', 'one'),
('swapanth', 5097664, 'swapanthvakapalli@gmail.com', 'Swapanth@999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createpoll`
--
ALTER TABLE `createpoll`
  ADD PRIMARY KEY (`poll_ID`);

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`faculty_ID`);

--
-- Indexes for table `pollresponse`
--
ALTER TABLE `pollresponse`
  ADD UNIQUE KEY `student_ID` (`student_ID`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`student_ID`),
  ADD UNIQUE KEY `pasword` (`student_password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createpoll`
--
ALTER TABLE `createpoll`
  MODIFY `poll_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5010;

--
-- AUTO_INCREMENT for table `facultydetails`
--
ALTER TABLE `facultydetails`
  MODIFY `faculty_ID` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3334;

--
-- AUTO_INCREMENT for table `pollresponse`
--
ALTER TABLE `pollresponse`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5097665;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `student_ID` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5097665;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
