-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 07:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clm`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_timein` time NOT NULL,
  `attendance_timeout` time NOT NULL,
  `attendance_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`attendance_id`, `employee_id`, `employee_name`, `attendance_date`, `attendance_timein`, `attendance_timeout`, `attendance_hour`) VALUES
(9, '1', 'admin', '2022-12-11', '19:56:24', '12:00:00', 7),
(10, '1', 'admin', '2023-01-07', '20:34:12', '20:34:32', 3),
(11, '1', 'admin', '2023-01-10', '13:25:12', '13:25:15', 5),
(12, '2', 'secretary', '2023-01-10', '14:06:40', '14:06:43', 8),
(13, '3', 'user', '2023-01-11', '14:06:50', '14:06:52', 7),
(14, '3', 'user', '2023-01-10', '14:23:44', '14:23:46', 3);

-- --------------------------------------------------------

--
-- Table structure for table `emp_payroll`
--

CREATE TABLE `emp_payroll` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `monthly_rate` varchar(100) NOT NULL,
  `semi_monthly_rate` varchar(100) NOT NULL,
  `hourly_rate` varchar(100) NOT NULL,
  `total_hrs` varchar(100) NOT NULL,
  `total_deduct` varchar(100) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `payroll` varchar(100) NOT NULL,
  `dateInput` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_payroll`
--

INSERT INTO `emp_payroll` (`id`, `employee_name`, `monthly_rate`, `semi_monthly_rate`, `hourly_rate`, `total_hrs`, `total_deduct`, `dateFrom`, `dateTo`, `payroll`, `dateInput`) VALUES
(86, 'admin', '321', '160.5', '1.319178082191781', '8', '263.83561643835617', '2023-01-01', '2023-01-31', '57.16438356164383', '2023-01-10 05:39:24'),
(90, 'secretary', '12345', '6172.5', '50.73287671232877', '8', '10146.575342465754', '2023-01-01', '2023-01-31', '2198.424657534246', '2023-01-10 06:13:22'),
(91, 'user', '54321', '27160.5', '223.23698630136985', '7', '44870.63424657534', '2023-01-01', '2023-01-31', '9450.36575342466', '2023-01-10 06:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbldirectoperation`
--

CREATE TABLE `tbldirectoperation` (
  `id` int(11) NOT NULL,
  `plateNo` varchar(50) NOT NULL,
  `fromDest` varchar(1000) NOT NULL,
  `toDest` varchar(1000) NOT NULL,
  `beginning` varchar(1000) NOT NULL,
  `ending` varchar(1000) NOT NULL,
  `rates` varchar(1000) NOT NULL,
  `gas` varchar(1000) NOT NULL,
  `tollFee` varchar(1000) NOT NULL,
  `meals` varchar(1000) NOT NULL,
  `accomodation` varchar(1000) NOT NULL,
  `repairs` varchar(1000) NOT NULL,
  `photocopy` varchar(1000) NOT NULL,
  `telephone` varchar(1000) NOT NULL,
  `others` varchar(1000) NOT NULL,
  `totalExpenses` varchar(1000) NOT NULL,
  `grossProfits` varchar(1000) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `dateInput` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldirectoperation`
--

INSERT INTO `tbldirectoperation` (`id`, `plateNo`, `fromDest`, `toDest`, `beginning`, `ending`, `rates`, `gas`, `tollFee`, `meals`, `accomodation`, `repairs`, `photocopy`, `telephone`, `others`, `totalExpenses`, `grossProfits`, `remarks`, `dateInput`) VALUES
(85, 'ABJ 9722', 'dsada', 'cdscd', '100', '123', '100', '4', '5', '3', '6', '3', '12', '3', '1', '37', '63', 'dsadsadsc', '2023-01-06'),
(86, 'AMA 2253', 'sadasda', 'whqhwq', '4', '10', '100', '25', '1', '2', '6', '7', '12', '11', '1', '65', '35', 'vcvvvfv', '2023-01-06'),
(87, 'NDM 6473', 'dsahdsad', 'jaja', '20', '200', '20', '1', '1', '1', '1', '1', '1', '1', '1', '8', '12', 'dsadsaasd', '2023-01-06'),
(88, 'NGT 5637', 'dhsdahas', 'qjqjqj', '30', '212', '60', '1', '1', '1', '1', '1', '1', '1', '1', '8', '52', 'dsdaddsac', '2023-01-06'),
(90, 'AAV 1908', 'dsdsa', 'csaca', '10', '20', '49', '1', '1', '1', '1', '1', '1', '1', '1', '8', '41', 'dsadad', '2023-01-06'),
(91, 'AAW 1908', 'asdan', 'akakak', '30', '50', '80', '1', '1', '11', '1', '1', '1', '1', '1', '18', '62', 'dsdsasasaxa', '2023-01-06'),
(99, 'AMA 2253', 'dsadas', 'dsdsads', '2121', '32321', '100', '1', '1', '1', '1', '1', '1', '1', '1', '8', '92', 'dsaddsadas', '2023-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `tblsuboperation`
--

CREATE TABLE `tblsuboperation` (
  `id` int(11) NOT NULL,
  `plateNo` varchar(50) NOT NULL,
  `fromDest` varchar(1000) NOT NULL,
  `toDest` varchar(1000) NOT NULL,
  `beginning` varchar(1000) NOT NULL,
  `ending` varchar(1000) NOT NULL,
  `rates` varchar(1000) NOT NULL,
  `gas` varchar(1000) NOT NULL,
  `tollFee` varchar(1000) NOT NULL,
  `meals` varchar(1000) NOT NULL,
  `accomodation` varchar(1000) NOT NULL,
  `repairs` varchar(1000) NOT NULL,
  `photocopy` varchar(1000) NOT NULL,
  `telephone` varchar(1000) NOT NULL,
  `others` varchar(1000) NOT NULL,
  `totalExpenses` varchar(1000) NOT NULL,
  `grossProfits` varchar(1000) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `dateInput` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsuboperation`
--

INSERT INTO `tblsuboperation` (`id`, `plateNo`, `fromDest`, `toDest`, `beginning`, `ending`, `rates`, `gas`, `tollFee`, `meals`, `accomodation`, `repairs`, `photocopy`, `telephone`, `others`, `totalExpenses`, `grossProfits`, `remarks`, `dateInput`) VALUES
(25, 'ABJ 9722', 'Laguna', 'Manila', '50', '1000', '100', '1', '1', '2', '3', '4', '5', '6', '7', '29', '71', 'Hello World', '2023-01-03'),
(30, 'AAV 1908', 'DSDAS', 'CSAC', '10', '12', '10', '1', '1', '1', '1', '1', '1', '1', '1', '8', '2', 'SDADSADSAD', '2023-01-06'),
(31, 'AAW 1908', 'dsadjas', 'snajnas', '1', '1', '20', '1', '1', '1', '1', '1', '1', '1', '1', '8', '12', 'ccdsssd', '2023-01-06'),
(32, 'AMA 2253', 'dsadjas', 'snajnas', '1', '1', '30', '1', '1', '1', '1', '1', '1', '1', '1', '8', '22', 'saacaa', '2023-01-06'),
(33, 'NDM 6473', 'dsadjas', 'snajnas', '1', '1', '40', '1', '1', '1', '1', '1', '1', '1', '1', '8', '32', 'dsnajdabjs', '2023-01-06'),
(34, 'NGT 5637', 'dsadjas', 'snajnas', '1', '1', '50', '1', '1', '1', '1', '1', '1', '1', '1', '8', '42', 'nsjancjsancoasco', '2023-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `userID` int(10) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emp_timein` time NOT NULL,
  `emp_timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userID`, `emp_id`, `username`, `email`, `userType`, `password`, `emp_timein`, `emp_timeout`) VALUES
(21, 1, 'admin', 'admin@gmail.com', 'admin', 'c93ccd78b2076528346216b3b2f701e6', '00:00:00', '00:00:00'),
(22, 2, 'secretary', 'secretary@gmail.com', 'secretary', 'fa4cd20d04295a01be155e51172e4b6e', '00:00:00', '00:00:00'),
(23, 3, 'user', 'user@gmail.com', 'user', 'b5b73fae0d87d8b4e2573105f8fbe7bc', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `truckdetailsdirectoperation`
--

CREATE TABLE `truckdetailsdirectoperation` (
  `plateNo` varchar(100) NOT NULL,
  `truckType` varchar(100) NOT NULL,
  `vanType` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `drivername` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truckdetailsdirectoperation`
--

INSERT INTO `truckdetailsdirectoperation` (`plateNo`, `truckType`, `vanType`, `model`, `drivername`) VALUES
('AAV 1908', 'ISUZU TRUCK', 'ALUMINUM WINGVAN', '2015', 'ANTONIO'),
('AAW 1908', 'MITSUBISHI L300', 'VAN TYPE', '2014', 'CRUZ'),
('ABJ 9722', 'ISUZU ELF', '6 WHEELED CLOSED VAN', '2004', 'RIZAL'),
('AMA 2253', 'ISUZU ELF', '6 WHEEL CLOSED VAN', '2004', 'JUAN'),
('NDM 6473', 'ISUZU ELF', 'FB TYPE', '2019', 'CARLO'),
('NGT 5637', 'ISUZU TRUCK', '6 WHEELED CLOSED VAN', '2020', 'PEDRO');

-- --------------------------------------------------------

--
-- Table structure for table `truckdetailssuboperation`
--

CREATE TABLE `truckdetailssuboperation` (
  `plateNo` varchar(100) NOT NULL,
  `truckType` varchar(100) NOT NULL,
  `vanType` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `drivername` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truckdetailssuboperation`
--

INSERT INTO `truckdetailssuboperation` (`plateNo`, `truckType`, `vanType`, `model`, `drivername`) VALUES
('AAV 1908', 'ISUZU TRUCK', 'ALUMINUM WINGVAN', '2015', 'ANTONIO'),
('AAW 1908', 'MITSUBISHI L300', 'VAN TYPE', '2014', 'CRUZ'),
('ABJ 9722', 'ISUZU ELF', '6 WHEELED CLOSED VAN', '2004', 'RIZAL'),
('AMA 2253', 'ISUZU ELF', '6 WHEEL CLOSED VAN', '2004', 'JUAN'),
('NDM 6473', 'ISUZU ELF', 'FB TYPE', '2019', 'CARLO'),
('NGT 5637', 'ISUZU TRUCK', '6 WHEELED CLOSED VAN', '2020', 'PEDRO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `emp_payroll`
--
ALTER TABLE `emp_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldirectoperation`
--
ALTER TABLE `tbldirectoperation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsuboperation`
--
ALTER TABLE `tblsuboperation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `truckdetailsdirectoperation`
--
ALTER TABLE `truckdetailsdirectoperation`
  ADD PRIMARY KEY (`plateNo`);

--
-- Indexes for table `truckdetailssuboperation`
--
ALTER TABLE `truckdetailssuboperation`
  ADD PRIMARY KEY (`plateNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `emp_payroll`
--
ALTER TABLE `emp_payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbldirectoperation`
--
ALTER TABLE `tbldirectoperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tblsuboperation`
--
ALTER TABLE `tblsuboperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
