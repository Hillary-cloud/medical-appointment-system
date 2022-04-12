-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 10:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `pid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gsm` varchar(100) NOT NULL,
  `doctorName` varchar(100) NOT NULL,
  `doctorFee` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `appdate` varchar(100) NOT NULL,
  `apptime` varchar(100) NOT NULL,
  `problem` varchar(500) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `appointment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`pid`, `id`, `firstname`, `lastname`, `gender`, `email`, `gsm`, `doctorName`, `doctorFee`, `specialization`, `appdate`, `apptime`, `problem`, `userStatus`, `doctorStatus`, `payment_status`, `appointment_status`) VALUES
(1, 19, 'obiora', 'hillary', 'male', 'obicj97@gmail.com', '+2348147078588', 'Dr.James', '1000', 'General', '2022-02-22', '08:00:00', 'pain', 1, 2, '', ''),
(1, 20, 'obiora', 'hillary', 'male', 'obicj97@gmail.com', '+2348147078588', 'Dr.James', '1000', 'General', '2022-02-18', '10:00:00', 'pain', 1, 1, '', ''),
(1, 21, 'obiora', 'hillary', 'male', 'obicj97@gmail.com', '+2348147078588', 'Dr.James', '1000', 'General', '2022-02-07', '16:00:00', 'pain', 1, 1, '', ''),
(1, 22, 'obiora', 'hillary', 'male', 'obicj97@gmail.com', '+2348147078588', 'Dr.James', '1000', 'General', '2022-02-10', '12:00:00', 'pain', 1, 2, '', ''),
(20, 23, 'Ekemini', 'Etim', 'Male', 'Kemzydaniels@gmail.com', '+2348038919945', 'Dr.James', '1500', 'General', '2022-02-10', '10:00:00', 'i am pregnant', 1, 2, 'Paid', 'Conducted'),
(20, 24, 'Ekemini', 'Etim', 'Male', 'Kemzydaniels@gmail.com', '+2348038919945', 'Dr.Mary', '1500', 'Gynecology', '2022-02-16', '12:00:00', 'i am hungry\r\n', 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doctorName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gsm` varchar(100) NOT NULL,
  `doctorFee` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctorName`, `email`, `specialization`, `address`, `gsm`, `doctorFee`, `gender`, `dob`, `password`) VALUES
(1, 'Dr.James', 'james@gmail.com', 'General', 'Nsukka', '0909878767', '1200', 'Male', '12/3/1993', 'james123'),
(2, 'Dr.Mary', 'mary@gmail.com', 'Gynecology', 'Enugu', '0808767654', '1500', 'female', '3/4/1991', 'mary123'),
(3, 'Dr.Blessing', 'blessing@gmail.com', 'Neurology', 'imo', '08099556796', '2000', 'Female', '1993-01-11', 'blessing'),
(4, 'Dr.sam', 'sam@gmail.com', 'Neurology', 'enugu', '08099667876', '2000', 'Male', '1992-01-18', 'sam123'),
(26, 'Dr.John', 'john@gmail.com', 'Gynecology', 'No 5 Nsukka road', '09099889878', '1500', 'Male', '1992-01-08', 'john123'),
(35, 'Dr.Charles', 'charles@gmail.com', 'General', 'enugu', '+2348099898787', '1200', 'Male', '1992-02-18', 'charles123');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `doctorName` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `doctorFee` varchar(100) NOT NULL,
  `doctorName_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `doctorName`, `specialization`, `doctorFee`, `doctorName_id`) VALUES
(1, 'Dr.James', 'General', '1000', 1),
(2, 'Dr.Mary', 'Gynecology', '1500', 2),
(3, 'Dr.Blessing', 'Neurology', '2000', 3),
(4, 'Dr.sam', 'Neurology', '2000', 3),
(5, 'Dr.sammy', 'General', '1000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `gsm` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `dob` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `firstname`, `lastname`, `email`, `address`, `gsm`, `gender`, `dob`, `password`, `confirm_password`) VALUES
(1, 'obiora', 'hillary', 'obicj97@gmail.com', 'nsukka', '+2348147078588', 'male', '09/12/1997', 'pass', 'pass'),
(2, 'mike', 'odo', 'mike@gmail.com', 'Nsukka', '+2349098765432', 'Male', '1997-12-09', 'mike123', 'mike123'),
(20, 'Ekemini', 'Etim', 'Kemzydaniels@gmail.com', '15 obollo road', '+2348038919945', 'Male', '2002-02-13', 'kemzymore', 'kemzymore'),
(22, 'John', 'Chinedu', 'john@gmail.com', 'No 7 Nsukka road', '+2348147078588', 'Male', '1983-02-09', 'john123', 'john123'),
(23, 'mark', 'odo', 'mark@gmail.com', 'enugu', '+2348147078588', 'Male', '1997-02-04', 'mark123', 'mark123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pmid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pmid`, `id`, `status`, `reference`, `fullname`, `date`, `email`) VALUES
(1, 0, 'success', '822000407', 'Hillary Obiora', '02/01/2022 11:24:35 pm', 'obicj97@gmail.com'),
(2, 51733984, 'success', '706646289', 'Obiora Hillary', '02/02/2022 12:16:57 am', 'obicj97@gmail.com'),
(3, 51733984, 'success', '474280804', 'Obiora Hillary', '02/02/2022 12:20:16 am', 'obicj97@gmail.com'),
(4, 51733984, 'success', '724552508', 'Obiora Hillary', '02/02/2022 12:26:56 am', 'obicj97@gmail.com'),
(5, 0, 'success', '605446323', 'Obiora Hillary', '02/02/2022 12:44:16 am', 'obicj97@gmail.com'),
(6, 0, 'success', '624157206', 'Obiora Hillary', '02/02/2022 01:25:24 am', 'obicj97@gmail.com'),
(7, 0, 'success', '436725094', 'Obiora Hillary', '02/02/2022 01:27:42 am', 'obicj97@gmail.com'),
(8, 0, 'success', '179221004', 'Obiora Hillary', '02/02/2022 01:29:34 am', 'obicj97@gmail.com'),
(9, 0, 'success', '563497339', 'Obiora Hillary', '02/02/2022 01:57:39 am', 'obicj97@gmail.com'),
(10, 0, 'success', '73580779', 'Obiora Hillary', '02/02/2022 02:07:03 am', 'obicj97@gmail.com'),
(11, 51733984, 'success', '478974975', 'Obiora Hillary', '02/02/2022 02:09:05 am', 'obicj97@gmail.com'),
(12, 0, 'success', '696547285', 'Obiora Hillary', '02/02/2022 02:13:51 am', 'obicj97@gmail.com'),
(13, 0, 'success', '804719902', 'Obiora Hillary', '02/02/2022 03:30:13 pm', 'obicj97@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `spec`
--

CREATE TABLE `spec` (
  `id` int(11) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `doctorFee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spec`
--

INSERT INTO `spec` (`id`, `specialization`, `doctorFee`) VALUES
(1, 'General', '1200'),
(2, 'Gynecology', '1500'),
(3, 'Neurology', '2000'),
(4, 'Cardiology', '2500'),
(5, 'Pediatrician', '1800'),
(8, 'midwive', '1600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pmid`);

--
-- Indexes for table `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `spec`
--
ALTER TABLE `spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
