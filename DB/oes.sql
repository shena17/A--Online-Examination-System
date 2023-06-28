-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 09:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answerscript`
--

CREATE TABLE `answerscript` (
  `stuID` varchar(100) NOT NULL,
  `stName` varchar(100) NOT NULL,
  `answerScriptID` int(20) NOT NULL,
  `enrolmentKey` varchar(100) NOT NULL,
  `examID` enum('1','2','3','4','5','6','7','8','9','10','11','12') NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answerscript`
--

INSERT INTO `answerscript` (`stuID`, `stName`, `answerScriptID`, `enrolmentKey`, `examID`, `file`) VALUES
('emp001', 'Shenal', 53, 'en0001', '1', 0x2e2e2f616e73776572536372697074732f2f73743030352e706466),
('emp005', 'Thanuja', 54, 'en0002', '9', 0x2e2e2f616e73776572536372697074732f2f656d703030332e706466);

-- --------------------------------------------------------

--
-- Table structure for table `createexam`
--

CREATE TABLE `createexam` (
  `id` int(11) NOT NULL,
  `exid` varchar(100) NOT NULL,
  `exname` varchar(100) NOT NULL,
  `exdate` varchar(20) NOT NULL,
  `extime` varchar(20) NOT NULL,
  `enroll` varchar(10) NOT NULL,
  `filename` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `createexam`
--

INSERT INTO `createexam` (`id`, `exid`, `exname`, `exdate`, `extime`, `enroll`, `filename`) VALUES
(37, 'ex0011', 'Thanuja', '2022-05-18', '21:24', 'en0001', 0x6578303031322e706466);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_ID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_ID`, `first_name`, `last_name`, `NIC`, `contactNo`, `email`, `username`, `password`) VALUES
(24, 'Shenal', 'de Silva', '207625338273', 754251325, 'shenal@gmail.com', 'shenal@4224', '0510d206f935cfbc7109f4ee7d4d6fb1'),
(25, 'Thanuja ', 'Wickramasinghe', '20001451245', 741245632, 'thanuja@gmail.com', 'thanuja@123', '10383960a5cbcb4fa573a41150dc173c'),
(26, 'Sandeepa', 'Rathnayaka', '20014521152', 745123254, 'sandeepa@gmail.com', 'sandeepa@123', '87bef109940feb2f973e8f29f89e2821'),
(27, 'Sadeepa', 'Ruwanpura', '200142852574', 754112854, 'sadeepa@gmail.com', 'sadeepa@123', '74f61c0fdba3a4d41610dbdd9907446c'),
(28, 'Shashini', 'Wasana', '200074185874', 754854185, 'shashini@gmail.com', 'shashini@123', '3bce259860f542bcb619ffb552a76814'),
(29, 'Michelle', 'Fernando', '200278652865', 745256256, 'michelle@gmail.com', 'michelle@123', 'f244b264e812ec1f147198c9ea84cd76'),
(31, 'User', 'Sample', '200148525456', 741224442, 'user@gmail.com', 'user', 'ba5ef51294fea5cb4eadea5306f3ca3b');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `registration` varchar(300) NOT NULL,
  `feedback_type` varchar(200) NOT NULL,
  `feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`registration`, `feedback_type`, `feedback`) VALUES
('emp001', 'feedback3', ' Kolla awl'),
('emp004', 'feedback1', ' Easy'),
('emp005', 'feedback1', ' User friendly'),
('emp044', 'feedback2', ' Efficient');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `Registration` varchar(150) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(300) NOT NULL,
  `Inquirytype` enum('type1','type2','type3','type4') NOT NULL,
  `subject` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `Registration`, `phone`, `email`, `Inquirytype`, `subject`, `description`, `status`) VALUES
(26, 'Shenal', 'emp001', 754134932, 'examAdmin@gmail.com', 'type3', 'Kollo case', 'Mata kollek one deyyane', ''),
(27, 'Sadeepa', 'emp002', 785265356, 'sadeepa@gmail.com', 'type2', 'Exam paper', 'Exam paper not submitting', NULL),
(28, 'Sandeepa', 'emp004', 748526522, 'sandeepa@gmail.com', 'type3', 'Results', 'Not getting results', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resid` int(11) NOT NULL,
  `stid` varchar(20) NOT NULL,
  `stname` varchar(100) NOT NULL,
  `exid` varchar(20) NOT NULL,
  `enroll` varchar(20) NOT NULL,
  `grade` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resid`, `stid`, `stname`, `exid`, `enroll`, `grade`) VALUES
(36, 'emp001', 'Shenal', 'ex0011', 'en0001', 'A'),
(37, 'emp005', 'Thanuja', 'ex0012', 'en0002', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `first_name`, `last_name`, `NIC`, `contactNo`, `email`, `username`, `password`, `status`) VALUES
(18, 'System', 'Administrator', '299381029389', 786545789, 'admin@gmail.com', 'admin', 'e6e061838856bf47e1de730719fb2609', 'Administrator'),
(22, 'Examiner', 'Sample', '200132145213', 741253325, 'examiner@gmail.com', 'examiner', 'a23078e22ef549c3365d29469ea5b721', 'Examiner'),
(23, 'Exam', 'Administrator', '200245785412', 741245325, 'examAdmin@gmail.com', 'examadmin', 'a75b10712b045756dea2a9936281cd7d', 'ExamAdmin'),
(25, 'Akith', 'Wijesundara', '200145211241', 785412345, 'aktih@gmail.com', 'akith@123', 'a7ce1d300d464820e0aad1e2d4117c12', 'Examiner'),
(26, 'Thanuka', 'Minik', '20024589456', 741245896, 'thanuka@gmail.com', 'thanuka@123', 'a14b94084f74bd30de3f49ec4c492686', 'ExamAdmin'),
(27, 'Mihiradha', 'Jayaweera', '200451245645', 789634152, 'mihi@gmail.com', 'mihi@123', '60ee1fc2b17a625503726694cb25150e', 'SupportOfficer'),
(28, 'Support', 'Officer', '200145812453', 748858564, 'support@gmail.com', 'support', '7a8489429cff6d2bc3ac91ca8ac09ad0', 'SupportOfficer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerscript`
--
ALTER TABLE `answerscript`
  ADD PRIMARY KEY (`answerScriptID`);

--
-- Indexes for table `createexam`
--
ALTER TABLE `createexam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`registration`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answerscript`
--
ALTER TABLE `answerscript`
  MODIFY `answerScriptID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `createexam`
--
ALTER TABLE `createexam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
