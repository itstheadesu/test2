-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 02:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_type` enum('Citizen','Business','Government') NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `age` int(11) NOT NULL,
  `region` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `client_type`, `sex`, `age`, `region`, `service`) VALUES
(1, 'test', 'Business', 'Male', 22, 'test', 'test'),
(2, 'Staff', 'Citizen', 'Male', 11, 'sas', 'sas');

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `control_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `cc1` enum('option1','option2','option3','option4') NOT NULL,
  `cc2` enum('option1','option2','option3','option4','option5') NOT NULL,
  `cc3` enum('option1','option2','option3','option4') NOT NULL,
  `likert_sqd0` enum('sqd0_strong_agree','sqd0_agree','sqd0_neutral','sqd0_disagree','sqd0_strong_disagree','sqd0_na') NOT NULL,
  `likert_sqd1` enum('sqd1_strong_agree','sqd1_agree','sqd1_neutral','sqd1_disagree','sqd1_strong_disagree','sqd1_na') NOT NULL,
  `likert_sqd2` enum('sqd2_strong_agree','sqd2_agree','sqd2_neutral','sqd2_disagree','sqd2_strong_disagree','sqd2_na') NOT NULL,
  `likert_sqd3` enum('sqd3_strong_agree','sqd3_agree','sqd3_neutral','sqd3_disagree','sqd3_strong_disagree','sqd3_na') NOT NULL,
  `likert_sqd4` enum('sqd4_strong_agree','sqd4_agree','sqd4_neutral','sqd4_disagree','sqd4_strong_disagree','sqd4_na') NOT NULL,
  `likert_sqd5` enum('sqd5_strong_agree','sqd5_agree','sqd5_neutral','sqd5_disagree','sqd5_strong_disagree','sqd5_na') NOT NULL,
  `likert_sqd6` enum('sqd6_strong_agree','sqd6_agree','sqd6_neutral','sqd6_disagree','sqd6_strong_disagree','sqd6_na') NOT NULL,
  `likert_sqd7` enum('sqd7_strong_agree','sqd7_agree','sqd7_neutral','sqd7_disagree','sqd7_strong_disagree','sqd7_na') NOT NULL,
  `likert_sqd8` enum('sqd8_strong_agree','sqd8_agree','sqd8_neutral','sqd8_disagree','sqd8_strong_disagree','sqd8_na') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`control_id`, `client_id`, `dept_id`, `date`, `comment`, `contact`, `cc1`, `cc2`, `cc3`, `likert_sqd0`, `likert_sqd1`, `likert_sqd2`, `likert_sqd3`, `likert_sqd4`, `likert_sqd5`, `likert_sqd6`, `likert_sqd7`, `likert_sqd8`) VALUES
(1, 1, 18, '2024-04-11 11:43:02', '', '', 'option1', 'option1', 'option4', 'sqd0_strong_agree', 'sqd1_strong_agree', 'sqd2_strong_agree', 'sqd3_strong_agree', 'sqd4_strong_agree', 'sqd5_strong_agree', 'sqd6_strong_agree', 'sqd7_strong_agree', 'sqd8_strong_agree'),
(2, 2, 20, '2024-04-17 14:12:11', '', '', 'option1', 'option1', 'option1', 'sqd0_agree', 'sqd1_strong_agree', 'sqd2_strong_agree', 'sqd3_strong_agree', 'sqd4_strong_agree', 'sqd5_strong_agree', 'sqd6_strong_agree', 'sqd7_strong_agree', 'sqd8_strong_agree');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Accounting Unit'),
(2, 'Administrative Offive V'),
(3, 'ALS'),
(4, 'Assistant Schools Division Superintendent Office'),
(5, 'BAC'),
(6, 'Budget Unit'),
(7, 'Cash Unit'),
(8, 'Curriculum Implementation Division'),
(9, 'Engineering & DRMM Unit'),
(10, 'GSU'),
(11, 'Health Unit'),
(12, 'Personnel Unit'),
(13, 'HRMPSB'),
(14, 'Information Technology Office'),
(15, 'Legal Unit'),
(16, 'Local School Board'),
(17, 'LRMS'),
(18, 'Planning Research ME & E'),
(19, 'PSDS'),
(20, 'Records Unit'),
(21, 'School Governance Office Division'),
(22, 'Schools Division Superintendent Office'),
(23, 'Supply Unit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`control_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `control_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `control_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
